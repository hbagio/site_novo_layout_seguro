<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    public function consultaPessoas()
    {

        $pessoas = DB::table('pessoas')->orderBy('id', 'asc')->simplePaginate(15);

        return view('events.consultaPessoas', ['pessoas' =>  $pessoas]);
    }

    public function cadastrarPessoas()
    {

        return view('events.cadastroPessoa');
    }
    public function pesquisaPessoaFiltro(){
        echo('Tetse');

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


    public function incluirPessoas(Request $request)
    {

        $pessoa = new Pessoa();

        $pessoa->nome = $request->nome;
        $pessoa->cep = $request->cep;
        $pessoa->cpfcnpj = $request->cpfcnpj;
        $pessoa->endereco = $request->endereco;
        $pessoa->telefone = $request->telefone;
        $pessoa->bairro = $request->bairro;
        $pessoa->estado = $request->estado;
        $pessoa->tipo = $request->tipo;
        $pessoa->cidade = $request->cidade;
        $pessoa->email = $request->email;
        $pessoa->save();
        return view('events.cadastroPessoa');
    }

    public function delete($id)
    {

        $pessoa =  Pessoa::findOrFail($id);
        $pessoa->delete();
        return back()->with('msg', 'Cliente excluido com sucesso!');
    }



    public function alterar($id)
    {

        $pessoa =  Pessoa::findOrFail($id);



        return view('events/alterarPessoa', ['pessoa' => $pessoa]);
    }
}
