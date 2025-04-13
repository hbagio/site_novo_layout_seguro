<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Contrato;
use Illuminate\Support\Facades\DB;

const  REGISTROS_POR_PAGINA = 12;
class ContratoController extends Controller
{

    public function incluirContrato($id)
    {

        $pessoa =  Pessoa::findOrFail($id);
        return view('events/cadastrarContrato', ['pessoa' => $pessoa]);
    }
    public function storeContrato(Request $request)
    {
        $situacaoAtivo  = 1;
        $contrato = new Contrato;

        $contrato->descricao = $request->descricao;
        $contrato->seguradora = $request->seguradora;
        $contrato->valor = $request->valor;
        $contrato->comissao = $request->comissao;
        $contrato->idpessoa = $request->idpessoa;
        $contrato->datainicio = $request->datainicio;
        $contrato->datafim = $request->datafim;
        $contrato->situacao = $situacaoAtivo;

        if ($request->hasFile('apolice') && $request->file('apolice')->isValid()) {
            $contrato->apolice = $this->validaAnexo($request->apolice);
        }


        $contrato->save();

        return redirect('/events/consultaPessoas')->with('msg', 'Contrato Cadastrado com Sucesso!');
    }

    public function validaAnexo($apolice)
    {
        $extensao = $apolice->extension();
        $apoliceNome = md5($apolice->getClientOriginalName() . strtotime("now")) . "." . $extensao;
        $apolice->move(public_path('img/produtos'), $apoliceNome );
        return $apoliceNome ;
    }

    public function consultaContratos(){

        $contratos = DB::table('contratos')
        ->select('contratos.*','pessoas.nome')
        ->join('pessoas','pessoas.id', '=', 'contratos.idpessoa')
        ->orderBy('contratos.id', 'desc')
        ->Paginate(REGISTROS_POR_PAGINA);

        return view('events.consultaContratos', ['contratos' =>  $contratos]);

    }

    public function visualizarContrato($id){

        $contrato =  DB::table('contratos')
        ->select('contratos.*','pessoas.nome')
        ->join('pessoas','pessoas.id', '=', 'contratos.idpessoa')
        ->where('contratos.id', $id)
        ->first();
        return view('events.visualizarContratos', ['contrato' =>  $contrato]);

    }
}
