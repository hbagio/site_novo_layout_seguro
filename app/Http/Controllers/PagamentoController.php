<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Contrato;
use App\Models\Parceiro;
use App\Models\Pagamento;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

const  REGISTROS_POR_PAGINA = 12;

class PagamentoController extends Controller
{
    public function pagamentosParceiro($id)
    {

        $contrato =  DB::table('contratos')
            ->select(
                'contratos.*',
                'pessoas.nome as pessoa_nome',
                'pessoas.cpfcnpj as pessoa_cpfcnpj',
                'parceiros.nome as parceiro_nome',
                'parceiros.cpfcnpj as parceiro_cpfcnpj'
            )
            ->join('pessoas', 'pessoas.id', '=', 'contratos.idpessoa')
            ->join('parceiros', 'parceiros.id', '=', 'contratos.parceiro_id')
            ->where('contratos.id', $id)
            ->first();

        $pagamentos = Pagamento::where('idcontrato', $id)->orderBy('data_pagamento', 'desc')->get();

        $totalPago = Pagamento::where('idcontrato', $id)
            ->where('situacao', 'pago') // Se quiser apenas pagos
            // ->orWhere('situacao', 'pendente') // Se quiser incluir pendentes
            ->sum('valor');

        $saldoRestante = $contrato->valorapagarparceiro - $totalPago;

        return view('events/cadastrarPagamento', [
            'contrato' => $contrato,
            'pagamentos' => $pagamentos,
            'totalPago' => $totalPago,
            'saldoRestante' => $saldoRestante
        ]);
    }

    public function deletePagamento($id)
    {

        $pagamento =  Pagamento::findOrFail($id);
        $pagamento->delete();
        return back()->with('msg', 'Pagamento excluido com sucesso!');
    }

    public function storePagamento(Request $request)
    {

        $pagamento = new Pagamento;

        $pagamento->data_pagamento = $request->data_pagamento;
        $pagamento->valor = $request->valor;
        $pagamento->observacao = $request->observacao;
        $pagamento->idcontrato = $request->idcontrato;
        $pagamento->situacao = 'pago';

        if ($request->hasFile('comprovante') && $request->file('comprovante')->isValid()) {
            $pagamento->comprovante = $this->validaAnexo($request->comprovante);
        }

        $pagamento->save();
        return back()->with('msg', 'Pgamento Registrado com Sucesso');
    }

    public function validaAnexo($apolice)
    {
        $extensao = $apolice->extension();
        $apoliceNome = md5($apolice->getClientOriginalName() . strtotime("now")) . "." . $extensao;
        $apolice->move(public_path('img/comprovante'), $apoliceNome);
        return $apoliceNome;
    }
}
