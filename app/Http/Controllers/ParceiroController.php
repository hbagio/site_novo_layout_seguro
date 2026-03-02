<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parceiro;
use Illuminate\Support\Facades\DB;

const  REGISTROS_POR_PAGINA = 12;

class ParceiroController extends Controller
{
    public function consultaParceiros()
    {

        $parceiros = DB::table('parceiros')->orderBy('id', 'asc')->Paginate(REGISTROS_POR_PAGINA);

        return view('events.consultaParceiros', ['parceiros' =>  $parceiros]);
    }

    public function cadastrarParceiros()
    {

        return view('events.cadastroParceiro');
    }

    public function incluirParceiro(Request $request)
    {

        $parceiro = new Parceiro();

        $parceiro->nome = $request->nome;
        $parceiro->cep = $request->cep;
        $parceiro->cpfcnpj = $request->cpfcnpj;
        $parceiro->endereco = $request->endereco;
        $parceiro->telefone = $request->telefone;
        $parceiro->bairro = $request->bairro;
        $parceiro->estado = $request->estado;
        $parceiro->tipo = $request->tipo;
        $parceiro->cidade = $request->cidade;
        $parceiro->email = $request->email;
        $parceiro->banco = $request->banco;
        $parceiro->agencia = $request->agencia;
        $parceiro->conta = $request->conta;
        $parceiro->pix = $request->pix;
        $parceiro->percentual = $request->percentual;
        $parceiro->rg = $request->rg;
        $parceiro->data_nascimento = $request->data_nascimento;
        $parceiro->observacoes = $request->observacoes;
        $parceiro->situacao = 1;
        if ($request->hasFile('contrato') && $request->file('contrato')->isValid()) {
            $parceiro->contrato = $this->validaContrato($request->contrato);
        }

        $parceiro->save();
        $parceiros = DB::table('parceiros')->orderBy('id', 'asc')->Paginate(REGISTROS_POR_PAGINA);

        return redirect('/events/consultaParceiros')->with('msg', 'Parceito Cadastrado com Sucesso!');
    }

    public function validaContrato($contrato)
    {
        $extensao = $contrato->extension();
        $contratoNome = md5($contrato->getClientOriginalName() . strtotime("now")) . "." . $extensao;
        $contrato->move(public_path('img/contrato'), $contratoNome);
        return $contratoNome;
    }

    public function delete($id)
    {

        $parceiro =  Parceiro::findOrFail($id);
        $parceiro->delete();
        return back()->with('msg', 'Parceiro excluido com sucesso!');
    }

   public function desativarParceiro($id)
    {

        $parceiro =  Parceiro::findOrFail($id);
        if($parceiro->situacao == 1) {
            $parceiro->situacao = 0;
             $parceiro->save();
            return back()->with('msg', 'Parceiro Desativado com sucesso!');
        }else{
            $parceiro->situacao = 1;
            $parceiro->save();
            return back()->with('msg', 'Parceiro Ativado com sucesso!');
        }

    }

    public function alterarParceiro($id)
    {

       $parceiro = Parceiro::findOrFail($id);
        return view('events/alterarParceiro', ['parceiro' => $parceiro]);
    }

    public function visualizarParceiro($id)
    {

        $parceiro =  DB::table('parceiros')
            ->select('*')
            ->where('parceiros.id', $id)
            ->first();
        return view('events.visualizarParceiro', ['parceiro' =>  $parceiro]);
    }

     public function update(Request $request)
    {
        echo($request->codigo);

        $pessoa = Pessoa::findOrFail($request->codigo);
        echo($request->codigo);
        $pessoa->nome = $request->nome;
        $pessoa->cpfcnpj = $request->cpfcnpj;
        $pessoa->endereco =  $request->endereco;
        $pessoa->bairro = $request->bairro  ;
        $pessoa->cidade = $request->cidade;
        $pessoa->estado = $request->estado;
        $pessoa->telefone =  $request->telefone;
        $pessoa->email =  $request->email;
        $pessoa->save();

         return redirect('/events/consultaPessoas')->with('msg', 'Usuário alterado com sucesso!');

    }


     public function updateParceiro(Request $request)
    {


        $parceiro =  Parceiro::findOrFail( $request->codigo);


        $parceiro->nome = $request->nome;
        $parceiro->cep = $request->cep;
        $parceiro->cpfcnpj = $request->cpfcnpj;
        $parceiro->endereco = $request->endereco;
        $parceiro->telefone = $request->telefone;
        $parceiro->bairro = $request->bairro;
        $parceiro->estado = $request->estado;
        $parceiro->cidade = $request->cidade;
        $parceiro->email = $request->email;
        $parceiro->banco = $request->banco;
        $parceiro->agencia = $request->agencia;
        $parceiro->conta = $request->conta;
        $parceiro->pix = $request->pix;
        $parceiro->percentual = $request->percentual;
        $parceiro->rg = $request->rg;
        $parceiro->data_nascimento = $request->data_nascimento;
        $parceiro->observacoes = $request->observacoes;

        if ($request->hasFile('contrato') && $request->file('contrato')->isValid()) {
            $parceiro->contrato = $this->validaContrato($request->contrato);
        }

        $parceiro->save();
        $parceiros = DB::table('parceiros')->orderBy('id', 'asc')->Paginate(REGISTROS_POR_PAGINA);

        return redirect('/events/consultaParceiros')->with('msg', 'Usuário alterado com sucesso!');

    }
}
