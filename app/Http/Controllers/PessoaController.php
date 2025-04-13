<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

const  REGISTROS_POR_PAGINA = 12;

class PessoaController extends Controller
{
    public function consultaPessoas()
    {

        $pessoas = DB::table('pessoas')->orderBy('id', 'asc')->Paginate(REGISTROS_POR_PAGINA);

        return view('events.consultaPessoas', ['pessoas' =>  $pessoas]);
    }

    public function cadastrarPessoas()
    {

        return view('events.cadastroPessoa');
    }

    public function pesquisaPessoaFiltro( Request $request){
        $tipoBusca = $request->tipo_busca;
        $filtro_pesquisa = $request->filtro_pesquisa;
        //echo( $filtro_pesquisa . $tipoBusca);

        if ( strlen( $filtro_pesquisa) == 0 ){

            $pessoas = DB::table('pessoas')->orderBy('id', 'asc')->Paginate(REGISTROS_POR_PAGINA);
            return view('events.consultaPessoas', ['pessoas' =>  $pessoas]);

        }
        elseif($tipoBusca == 0 ){
           //busca por nome
            $pessoas = DB::table('pessoas')
            ->select('*')
            ->where('nome', 'LIKE', ['%' . $filtro_pesquisa . '%'])
            ->orderBy('id', 'asc')
            ->Paginate(REGISTROS_POR_PAGINA);
            return view('events.consultaPessoas', ['pessoas' =>  $pessoas]);
        }elseif($tipoBusca == 1 ){
            // busca por Cpf
            $pessoas = DB::table('pessoas')
            ->select('*')
            ->where('cpfcnpj', 'LIKE', ['%' . $filtro_pesquisa . '%'])
            ->orderBy('id', 'asc')
            ->Paginate(REGISTROS_POR_PAGINA);
            return view('events.consultaPessoas', ['pessoas' =>  $pessoas]);
        }


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
        $pessoas = DB::table('pessoas')->orderBy('id', 'asc')->Paginate(REGISTROS_POR_PAGINA);

        return view('events.consultaPessoas', ['pessoas' =>  $pessoas]);
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
