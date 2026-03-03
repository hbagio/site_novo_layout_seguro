<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Contrato;
use App\Models\Parceiro;
use Illuminate\Support\Facades\DB;

const  REGISTROS_POR_PAGINA = 12;
class ContratoController extends Controller
{

    public function incluirContrato($id)
    {

        $pessoa =  Pessoa::findOrFail($id);
        $parceiros = Parceiro::where('situacao', 1)->orderBy('nome', 'asc')->get();

        return view('events/cadastrarContrato', ['pessoa' => $pessoa, 'parceiros' => $parceiros]);
    }
    public function storeContrato(Request $request)
    {

        $contrato = new Contrato;
        $contrato->numeroapolice = $request->numeroapolice;
        $contrato->ramo = $request->ramo;
        $contrato->seguradora = $request->seguradora;
        $contrato->valor = $request->valor;
        $contrato->valorliquido = $request->valorliquido;
        $contrato->comissao = $request->comissao;
        $contrato->idpessoa = $request->idpessoa;
        $contrato->parceiro_id = $request->parceiro_id;
        $contrato->parcelas = $request->parcelas;
        $contrato->percentual_admin = $request->percentual_admin;
        $contrato->percentualparceiro = $request->percentualparceiro;
        $contrato->percentualcomissao = $request->percentualcomissao;
        $contrato->forma_pagamento = $request->forma_pagamento;
        $contrato->valorapagarparceiro = $request->valorapagarparceiro;
        $contrato->observacoes = $request->observacoes;
        $contrato->datainicio = $request->datainicio;
        $contrato->datafim = $request->datafim;
        $contrato->situacao = 1;

        if ($request->hasFile('apolice') && $request->file('apolice')->isValid()) {
            $contrato->apolice = $this->validaAnexo($request->apolice);
        }


        $contrato->save();

        return redirect('/events/consultaContratos')->with('msg', 'Contrato Cadastrado com Sucesso!');
    }

    public function validaAnexo($apolice)
    {
        $extensao = $apolice->extension();
        $apoliceNome = md5($apolice->getClientOriginalName() . strtotime("now")) . "." . $extensao;
        $apolice->move(public_path('img/apolice'), $apoliceNome);
        return $apoliceNome;
    }

    public function consultaContratos()
    {

        $contratos = DB::table('contratos')
            ->select('contratos.*', 'pessoas.nome', 'pessoas.cpfcnpj')
            ->join('pessoas', 'pessoas.id', '=', 'contratos.idpessoa')
            ->orderBy('contratos.id', 'desc')
            ->Paginate(REGISTROS_POR_PAGINA);

        return view('events.consultaContratos', ['contratos' =>  $contratos]);
    }

    public function consultaContratosDataFim()
    {

        $contratos = DB::table('contratos')
            ->select('contratos.*', 'pessoas.nome', 'pessoas.cpfcnpj')
            ->join('pessoas', 'pessoas.id', '=', 'contratos.idpessoa')
            ->orderBy('contratos.datafim', 'asc')
            ->Paginate(REGISTROS_POR_PAGINA);

        return view('events.consultaContratos', ['contratos' =>  $contratos]);
    }

    public function visualizarContrato($id)
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
        return view('events.visualizarContratos', ['contrato' =>  $contrato]);
    }

    public function alterarContrato($id)
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
        return view('events.alterarContratos', ['contrato' =>  $contrato]);
    }

    public function deleteContrato($id)
    {

        $contrato =  Contrato::findOrFail($id);
        $contrato->delete();
        return back()->with('msg', 'Contrato excluido com sucesso!');
    }

     public function desativarContrato($id)
    {

        $contrato =  Contrato::findOrFail($id);
        if($contrato->situacao == 1) {
            $contrato->situacao = 0;
             $contrato->save();
            return back()->with('msg', 'Contrato Desativado com sucesso!');
        }else{
            $contrato->situacao = 1;
            $contrato->save();
            return back()->with('msg', 'Contrato Ativado com sucesso!');
        }

    }

    public function updateContrato(Request $request)
    {

        $contrato = Contrato::findOrFail($request->id);

        $contrato->numeroapolice = $request->numeroapolice;
        $contrato->ramo = $request->ramo;
        $contrato->seguradora = $request->seguradora;
        $contrato->valor = $request->valor;
        $contrato->valorliquido = $request->valorliquido;
        $contrato->comissao = $request->comissao;
        $contrato->idpessoa = $request->idpessoa;
        $contrato->parceiro_id = $request->parceiro_id;
        $contrato->parcelas = $request->parcelas;
        $contrato->percentual_admin = $request->percentual_admin;
        $contrato->percentualparceiro = $request->percentualparceiro;
        $contrato->percentualcomissao = $request->percentualcomissao;
        $contrato->forma_pagamento = $request->forma_pagamento;
        $contrato->valorapagarparceiro = $request->valorapagarparceiro;
        $contrato->observacoes = $request->observacoes;
        $contrato->datainicio = $request->datainicio;
        $contrato->datafim = $request->datafim;


        if ($request->hasFile('apolice') && $request->file('apolice')->isValid()) {
            $contrato->apolice = $this->validaAnexo($request->apolice);
        }


        $contrato->save();

        return redirect('/events/consultaContratos')->with('msg', 'Contrato Alterado com Sucesso!');
    }

    public function pesquisaContratoFiltro(Request $request)
    {
        $tipoBusca = $request->tipo_busca;
        $filtro_pesquisa = $request->filtro_pesquisa;
        //echo( $filtro_pesquisa . $tipoBusca);

        if (strlen($filtro_pesquisa) == 0) {

            $contratos = DB::table('contratos')
                ->select('contratos.*', 'pessoas.nome', 'pessoas.cpfcnpj')
                ->join('pessoas', 'pessoas.id', '=', 'contratos.idpessoa')
                ->orderBy('contratos.id', 'desc')
                ->Paginate(REGISTROS_POR_PAGINA);

            return view('events.consultaContratos', ['contratos' =>  $contratos]);
        } elseif ($tipoBusca == 0) {
            //busca por nome
            $contratos = DB::table('contratos')
                ->select('contratos.*', 'pessoas.nome', 'pessoas.cpfcnpj')
                ->join('pessoas', 'pessoas.id', '=', 'contratos.idpessoa')
                ->where('nome', 'LIKE', ['%' . $filtro_pesquisa . '%'])
                ->orderBy('id', 'asc')
                ->Paginate(REGISTROS_POR_PAGINA);
            return view('events.consultaContratos', ['contratos' =>  $contratos]);
        } elseif ($tipoBusca == 1) {
            // busca por Cpf
            $contratos = DB::table('contratos')
                ->select('contratos.*', 'pessoas.nome', 'pessoas.cpfcnpj')
                ->join('pessoas', 'pessoas.id', '=', 'contratos.idpessoa')
                ->where('cpfcnpj', 'LIKE', ['%' . $filtro_pesquisa . '%'])
                ->orderBy('id', 'asc')
                ->Paginate(REGISTROS_POR_PAGINA);
            return view('events.consultaContratos', ['contratos' =>  $contratos]);
        }
    }
}
