<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informacao;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Exception;

class GerenciamentoController extends Controller
{
    public function gerenciamento()
    {
        return view('events.gerenciamento');
    }

    public function dadosEmpresa()
    {
        $retorno = \DB::select('select count(1) as contador from informacoes ');
        if ($retorno[0]->contador >= 1) {
            $dadosEmpresa = $this->buscaDadosEmpresa();

            return view('events.dadosEmpresaAlteracao', ['dadosEmpresa' => $dadosEmpresa]);
        }
        return view('events.dadosEmpresa');
    }

    public function sobre()
    {
        $retorno = \DB::select('select count(1) as contador from informacoes ');
        $dadosEmpresa = $this->buscaDadosEmpresa();

        if ($retorno[0]->contador >= 1) {
            $url = $this->urlContato('whatsapp');
            return view('events.sobre', ['dadosEmpresa' => $dadosEmpresa, 'whatsapp' => $url]);
        } else {
            $produtos = Produto::all();
            $categoria = Categoria::all();
            //retorna para aviwe
            return view('welcome', ['produtos' =>  $produtos, 'categorias' => $categoria]);
        }
    }

    public function store(Request $request)
    {
        $dadosEmpresa = new Informacao;

        $dadosEmpresa->cnpj = $request->cnpj;
        $dadosEmpresa->instagram = $request->instagram;
        $dadosEmpresa->facebook = $request->facebook;
        $dadosEmpresa->telefone = $request->telefone;
        $dadosEmpresa->whatsapp = $request->whatsapp;
        $dadosEmpresa->email = $request->email;
        $dadosEmpresa->endereco = $request->endereco;

        $dadosEmpresa->save();

        return view('events.gerenciamento');
    }

    public function update(Request $request)
    {
        $dadosEmpresa = Informacao::findOrFail($request->id);

        $dadosEmpresa->cnpj      = $request->cnpj;
        $dadosEmpresa->instagram = $request->instagram;
        $dadosEmpresa->facebook = $request->facebook;
        $dadosEmpresa->telefone = $request->telefone;
        $dadosEmpresa->whatsapp = $request->whatsapp;
        $dadosEmpresa->email = $request->email;
        $dadosEmpresa->endereco = $request->endereco;

        $dadosEmpresa->save();

        return redirect('/events/gerenciamento')->with('msg', 'Dados da Empresa foram alterados!');
    }


    public function whatsapp()
    {
        $url = $this->urlContato('whatsapp');
        return view('events.abrirPaginaContato', ['url' => $url]);
    }

    public function instagram()
    {
        $url = $this->urlContato('instagram');
        return view('events.abrirPaginaContato', ['url' => $url]);
    }

    public function facebook()
    {
        $url = $this->urlContato('facebook');
        return view('events.abrirPaginaContato', ['url' => $url]);
    }

    public function urlContato($tipoContato)
    {
        if ($tipoContato == 'whatsapp') {
            $retorno = \DB::select('select whatsapp  from informacoes where id = (select MAX(id) from informacoes)');
            $whatsapp =  $retorno[0];
            $numero =   preg_replace('/[^0-9]/', '', $whatsapp->whatsapp);
            $url = 'https://wa.me/55' . $numero;
            return  $url;
        } elseif ($tipoContato == 'instagram') {
            $retorno = \DB::select('select instagram  from informacoes where id = (select MAX(id) from informacoes)');
            $instagram =  $retorno[0];
            return $url = $instagram->instagram;
        } elseif ($tipoContato == 'facebook') {
            $retorno = \DB::select('select facebook  from informacoes where id = (select MAX(id) from informacoes)');
            $facebook =  $retorno[0];
            return $url = $facebook->facebook;
        }
    }

    public function buscaDadosEmpresa()
    {
        $dadosEmpresa =  \DB::select('select *  from informacoes where id = (select MAX(id) from informacoes)');
        return $dadosEmpresa[0];
    }


}
