<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GerenciamentoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ContratoController;
use App\Models\Contrato;
use GuzzleHttp\Middleware;

rotasMenuHome();
rotasMenuSobre();
rotasRedesSociais();
rotasUsuarioConvidado();
rotasUsuarioAutenticado();

/**
 * Rota(s) para quando o Usuário estiver Autenticado (Auth).
 */
function rotasUsuarioAutenticado()
{
    Route::group(['middleware' => ['auth']], function () {
        rotasMenuGerenciamento();
        rotasMenuSair();
    });
}

/**
 * Rota(s) para quando o Usuário não estiver Autenticado, ou seja, for Convidado (Guest).
 */
function rotasUsuarioConvidado()
{
    Route::group(['middleware' => ['guest']], function () {
        rotasMenuLogin();
    });
}

/**
 * Rota(s) das Redes Sociais.
 */
function rotasRedesSociais()
{
    Route::get('/whatsapp', [GerenciamentoController::class, 'whatsapp']);
    Route::get('/instagram', [GerenciamentoController::class, 'instagram']);
    Route::get('/facebook', [GerenciamentoController::class, 'facebook']);
}

/**
 * Rotas(s) do Menu HOME.
 */
function rotasMenuHome()
{
    Route::get('/', [ProdutoController::class, 'index'])->name('home');
    Route::get('/p', [ProdutoController::class, 'buscaComCategoria'])->name('home.ajax.filtraCategoria');
    Route::get('/getDadosProduto/{id}', [ProdutoController::class, 'getDadosProduto'])->name('home.ajax.getDadosProduto');
    Route::get('/events/detalhes/{id}', [ProdutoController::class, 'show']);
}

/**
 * Rotas(s) do Menu SOBRE.
 */
function rotasMenuSobre()
{
    Route::get('/events/sobre', [GerenciamentoController::class, 'sobre'])->name('sobre');
}
/**
 * Rotas(s) do Menu LOGIN.
 */
function rotasMenuLogin()
{
    Route::get('/usuario', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.logado');
    Route::get('/recuperacaoSenha', [UserController::class, 'recuperacaoSenha'])->name('login.recuperaSenha');
    Route::post('/events/recuperaSenhaUsuario', [UserController::class, 'recuperaSenhaUsuario'])->name('login.recuperaSenhaUsuario');
    //Route::post('/events/validaEmailUsuario', [UserController::class, 'validaEmailUsuario'])->name('login.validaEmail');
    //Rota get quando evento é pelo botão
    Route::get('/events/validaEmailUsuario', [UserController::class, 'validaEmailUsuario'])->name('login.validaEmail');
    //Route::post('/events/validaEmailUsuarioAjax', [UserController::class, 'validaEmailUsuario']);
}
/**
 * Rotas(s) do Menu GERENCIAMENTO.
 */
function rotasMenuGerenciamento()
{
    Route::get('/events/gerenciamento', [GerenciamentoController::class, 'gerenciamento'])->name('gerenciamento.dashboard');
    rotasCategoria();
    rotasProduto();
    rotasEmpresa();
    rotasUsuario();
    rotasPessoa();
    rotasContratos();
}

/**
 * Rotas(s) do Menu SAIR.
 */
function rotasMenuSair()
{
    Route::get('/logout', [UserController::class, 'logout'])->name('sair');
}

/**
 * Rota(s) de Categoria.
 */
function rotasCategoria()
{
    Route::get('/events/cadastroCategoria', [CategoriaController::class, 'cadastroCategoria'])->name('gerenciamento.categoria');
    Route::post('/events/insereCategoria', [CategoriaController::class, 'store'])->name('gerenciamento.categoria.insere');
    Route::get('/events/excluirCategoria/{id}', [CategoriaController::class, 'delete'])->name('gerenciamento.categoria.deleta');
    Route::post('/events/updateCategoria', [CategoriaController::class, 'update'])->name('gerenciamento.categoria.altera');
    Route::get('/events/alterarCategoria/{id}', [CategoriaController::class, 'alterarCategoria'])->name('gerenciamento.categoria.formulario.altera');
}

/**
 * Rota(s) de Produto.
 */
function rotasProduto()
{
    Route::get('/events/listarProduto', [ProdutoController::class, 'listarProduto'])->name('gerenciamento.produto');
    Route::post('/events/store', [ProdutoController::class, 'store'])->name('gerenciamento.produto.insere');
    Route::get('/events/excluirProduto/{id}', [ProdutoController::class, 'destroy'])->name('gerenciamento.produto.deleta');
    Route::post('/events/updateProduto', [ProdutoController::class, 'update'])->name('gerenciamento.produto.altera');
    Route::get('/events/cadastroProduto', [ProdutoController::class, 'cadastroProduto'])->name('gerenciamento.produto.formulario.insere');
    Route::get('/events/alterarProduto/{id}', [ProdutoController::class, 'alterarProduto'])->name('gerenciamento.produto.formulario.altera');
}

/**
 * Rota(s) de Empresa.
 */
function rotasEmpresa()
{
    Route::get('/events/dadosEmpresa', [GerenciamentoController::class, 'dadosEmpresa'])->name('gerenciamento.empresa');
    Route::post('/events/dadosEmpresa/store', [GerenciamentoController::class, 'store'])->name('gerenciamento.empresa.insere');
    Route::post('/events/dadosEmpresa/update', [GerenciamentoController::class, 'update'])->name('gerenciamento.empresa.altera');
}

/**
 * Rota(s) de Usuário.
 */
function rotasUsuario()
{
    Route::get('/events/consultaUsuario', [UserController::class, 'consultaUsuario'])->name('gerenciamento.usuario');
    Route::post('events/storeUsuario', [UserController::class, 'store'])->name('gerenciamento.usuario.insere');
    Route::post('/events/updateUsuario', [UserController::class, 'update'])->name('gerenciamento.usuario.altera');
    Route::get('events/excluirUsuario/{id}', [UserController::class, 'delete'])->name('gerenciamento.usuario.deleta');
    Route::get('/events/alterarUsuario/{id}', [UserController::class, 'alterarUsuario'])->name('gerenciamento.usuario.formulario.altera');
    Route::get('/inserirUsuario', [UserController::class, 'inserirUsuario'])->name('gerenciamento.usuario.formulario.insere');
}

function rotasPessoa()
{
    Route::get('/events/consultaPessoas', [PessoaController::class, 'consultaPessoas'])->name('gerenciamento.consulta_pessoa');
    Route::get('/events/cadastrarPessoas', [PessoaController::class, 'cadastrarPessoas'])->name('gerenciamento.cadastrar_pessoa');
    Route::post('/events/incluirPessoas', [PessoaController::class, 'incluirPessoas'])->name('gerenciamento.incluir_pessoa');
    Route::get('/events/alterar/{id}', [PessoaController::class, 'alterar'])->name('gerenciamento.pessoa.altera');
    Route::get('/events/excluirPessoa/{id}', [PessoaController::class, 'delete'])->name('gerenciamento.pessoa.deleta');
    Route::post('/events/updatePessoa/', [PessoaController::class, 'update'])->name('gerenciamento.pessoa.update');
    Route::get('/events/visualizarPessoa/{id}', [PessoaController::class, 'visualizarPessoa'])->name('gerenciamento.pessoa.visualizar');
    Route::get('/events/pesquisaPessoaFiltro/', [PessoaController::class, 'pesquisaPessoaFiltro'])->name('gerenciamento.pessoa.pesquisa_pessoa_filtro');
    //Route::get('/events/alterarUsuario/{id}', [UserController::class, 'alterarUsuario'])->name('gerenciamento.usuario.formulario.altera');
    //Route::get('/inserirUsuario', [UserController::class, 'inserirUsuario'])->name('gerenciamento.usuario.formulario.insere');
}

function rotasContratos()
{
    Route::get('/events/incluirContrato/{id}', [ContratoController::class, 'incluirContrato'])->name('gerenciamento.incluir_contrato');
    Route::post('/events/storeContrato', [ContratoController::class, 'storeContrato'])->name('gerenciamento.incluir_contrato');
    Route::get('/events/consultaContratos', [ContratoController::class, 'consultaContratos'])->name('gerenciamento.consulta_contrato');
    Route::get('/events/visualizarContrato/{id}', [ContratoController::class, 'visualizarContrato'])->name('gerenciamento.visualizar_contrato');
    Route::get('/events/pesquisaContratoFiltro/', [ContratoController::class, 'pesquisaContratoFiltro'])->name('gerenciamento.contrato.pesquisa_contrato_filtro');
    Route::get('/events/alterarContrato/{id}', [ContratoController::class, 'alterarContrato'])->name('gerenciamento.visualizar_contrato');
    Route::post('/events/updateContrato', [ContratoController::class, 'updateContrato'])->name('gerenciamento.update_contrato');
    Route::get('/events/consultaContratosDataFim', [ContratoController::class, 'consultaContratosDataFim'])->name('gerenciamento.consulta_contrato');

}
