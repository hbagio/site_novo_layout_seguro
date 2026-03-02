<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//App tem de ser letra maiscula
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

const  REGISTROS_POR_PAGINA = 12;
class ProdutoController extends Controller
{


    public function index1()
    {
        //pega os dados do model
        $produtos  = DB::table('produtos')
            //Campos de deseja
            ->select('produtos.*', 'categorias.descricao as descricaoCategoria')
            //Join com a tabela e comparação
            ->Join('categorias', 'categorias.id', '=', 'produtos.idcategoria')
            //Ordenação
            ->orderBy('destaque', 'desc')
            //Executa com paginação
            ->Paginate(REGISTROS_POR_PAGINA);



        $categoria = Categoria::all();
        //retorna para aviwe
        return view('welcome', ['produtos' =>  $produtos, 'categorias' => $categoria]);
    }

    public function index()
    {

            return view('events.gerenciamento');
    }


    public function cadastroProduto()
    {
        $categoria = Categoria::all();

        return view('events.cadastroProduto', ['categorias' => $categoria]);
    }

    public function listarProduto()
    {
        //pega os dados do model
        //pega os dados do model
        $produtos  = DB::table('produtos')
            //Campos de deseja
            ->select('produtos.*', 'categorias.descricao as descricaoCategoria')
            //Join com a tabela e comparação
            ->Join('categorias', 'categorias.id', '=', 'produtos.idcategoria')
            //Ordenação
            ->orderBy('destaque', 'desc')
            //Executa com paginação
            ->Paginate(REGISTROS_POR_PAGINA);

        $categoria = Categoria::all();
        //retorna para aviwe
        return view('events.listarProduto', ['produtos' =>  $produtos, 'categorias' => $categoria]);
    }


    public function store(Request $request)
    {
        $produto = new Produto;

        $produto->nome = $request->identificacao;
        if ($request->valor > 0) {
            $produto->valor = $request->valor;
        } else {
            $produto->valor = 0;
        }

        $produto->descricao = $request->descricao;
        $produto->destaque = $request->destaque;
        $produto->idcategoria = $request->categoria;


        //Upload controle
        //Verifica se tem uma imagem da requisição e se ela é valida
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $produto->imagem = $this->validaImagem($request->imagem);
        }

        if ($request->hasFile('imagem2') && $request->file('imagem2')->isValid()) {
            $produto->imagem2 = $this->validaImagem($request->imagem2);
        }

        if ($request->hasFile('imagem3') && $request->file('imagem3')->isValid()) {
            $produto->imagem3 = $this->validaImagem($request->imagem3);
        }

        if ($request->hasFile('imagem4') && $request->file('imagem4')->isValid()) {
            $produto->imagem4 = $this->validaImagem($request->imagem4);
        }

        if ($request->hasFile('imagem5') && $request->file('imagem5')->isValid()) {
            $produto->imagem5 = $this->validaImagem($request->imagem5);
        }

        $produto->save();

        return redirect('events/listarProduto')->with('msg', 'Produto Cadastrado com Sucesso!');
    }

    public function validaImagem($imagem)
    {
        $extensao = $imagem->extension();
        $imagemNome = md5($imagem->getClientOriginalName() . strtotime("now")) . "." . $extensao;
        $imagem->move(public_path('img/produtos'), $imagemNome);
        return $imagemNome;
    }

    public function getDadosProduto($id)
    {
        $produto   = Produto::findOrFail($id);
        $categoria = Categoria::findOrFail($produto->idcategoria);

        $retorno = DB::select('select whatsapp from informacoes where id = (select MAX(id) from informacoes)');
        $whatsapp =  $retorno[0];
        $numero =   preg_replace('/[^0-9]/', '', $whatsapp->whatsapp);
        $url = 'https://wa.me/55' . $numero . '?text=Ola! Tenho Interresse no Produto: ' . $produto->id . ' - ' . $produto->nome;

        return array(
            'nome' => $produto->nome,
            'descricao' => $produto->descricao,
            'valor' => ($produto->valor > 0) ? "R$ " . number_format($produto->valor, 2, ',') : 'À Combinar',
            'imagem' => "/img/produtos/" . $produto->imagem,
            'categoria' => $categoria->descricao,
            'urlContato' => $url
        );
    }

    public function buscaComCategoria(Request $request)
    {
        $filtro_pesquisa = $request->filtro_pesquisa;
        $categoriaSelect = $request->categoriaSelect;

        if (strlen($filtro_pesquisa) > 0) {

            $produtos =  DB::table('produtos')
                //Campos de deseja
                ->select('produtos.*', 'categorias.descricao as descricaoCategoria')
                //Join com a tabela e comparação
                ->Join('categorias', 'categorias.id', '=', 'produtos.idcategoria')
                //Ordenação
                ->where('nome', 'LIKE', ['%' . $filtro_pesquisa . '%'])
                ->orderBy('destaque', 'desc')
                //Executa com paginação
                ->Paginate(REGISTROS_POR_PAGINA);
        } elseif ($categoriaSelect > 0) {

            $produtos =  DB::table('produtos')
                //Campos de deseja
                ->select('produtos.*', 'categorias.descricao as descricaoCategoria')
                //Join com a tabela e comparação
                ->Join('categorias', 'categorias.id', '=', 'produtos.idcategoria')
                //Ordenação
                ->where('idcategoria', '=', [$categoriaSelect])

                ->orderBy('destaque', 'desc')
                //Executa com paginação
                ->Paginate(REGISTROS_POR_PAGINA);
        } else {
            $produtos =  DB::table('produtos')
                //Campos de deseja
                ->select('produtos.*', 'categorias.descricao as descricaoCategoria')
                //Join com a tabela e comparação
                ->Join('categorias', 'categorias.id', '=', 'produtos.idcategoria')
                //Ordenação
                ->where('idcategoria', '>=', [0])

                ->orderBy('destaque', 'desc')
                //Executa com paginação
                ->Paginate(REGISTROS_POR_PAGINA);
        }

        $categoria = Categoria::all();


        return view('welcome', ['produtos' => $produtos, 'categorias' => $categoria]);
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        $categoria = Categoria::findOrFail($produto->idcategoria);

        $retorno = \DB::select('select whatsapp  from informacoes where id = (select MAX(id) from informacoes)');
        $whatsapp =  $retorno[0];
        $numero =   preg_replace('/[^0-9]/', '', $whatsapp->whatsapp);
        $url = 'https://wa.me/55' . $numero;

        return view('events.visualizarProduto', ['produto' => $produto, 'categoria' => $categoria, 'url' => $url]);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id)->delete();

        return redirect('events/listarProduto')->with('msg', 'Produto excluido com sucesso!');
    }



    public function alterarProduto($id)
    {
        $produto = Produto::findOrFail($id);

        $categoria = Categoria::findOrFail($produto->idcategoria);

        return view('events/alterarProduto', ['produto' => $produto, 'categoria' => $categoria]);
    }

    public function update(Request $request)
    {
        $produto = Produto::findOrFail($request->id);
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->descricao = $request->descricao;
        $produto->destaque = $request->destaque;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $produtoOld = $produto->imagem;

            $requestImage = $request->imagem;
            $extensao = $requestImage->extension();
            $imagemNome = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $request->imagem->move(public_path('img/produtos'), $imagemNome);
            $produto->imagem = $imagemNome;

            //Excluir a imagem antiga
            $path = "img/produtos/";
            $diretorio = dir($path);
            while ($arquivo = $diretorio->read()) {
                if (strpos($arquivo,  $produtoOld) !== false) {
                    unlink($path . $arquivo);
                }
            }

            $diretorio->close();
        }

        $produto->save();



        $produtos = Produto::Paginate(REGISTROS_POR_PAGINA);
        //retorna para aviwe
        return redirect('/events/listarProduto');
    }
}
