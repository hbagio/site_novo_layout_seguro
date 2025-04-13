@section('title', 'Fazendo Festa | Categoria')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
        <h1 class="titulo_grande cor_escuro_50">Categoria</h1><br>
        <div class="card flex_col">

            <br>
            <form class="col_12" action="/events/insereCategoria" method="POST">
                @csrf
                <div class="container_campo">
                    <label class="campo_label col_3">Descrição : </label>
                    <div class="campo">
                        <input type="text" id="descricaoCategoria" name="descricaoCategoria"  required placeholder="Nova Categoria...">
                    </div>
                    <input class="campo_acao" type="submit" value="Cadastrar" />
                </div>
            </form>
            <br>
            <table class="lista_consulta">
                <tr>
                    <th class="lista_consulta_cabecalho">Código</th>
                    <th class="lista_consulta_cabecalho">Descrição</th>
                    <th class="lista_consulta_cabecalho">Ações</th>
                </tr>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->descricao }}</td>
                    <td>
                        
                            <a class="lista_consulta_acao editar" href="/events/alterarCategoria/{{ $categoria->id }}">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="lista_consulta_acao excluir" href="/events/excluirCategoria/{{ $categoria->id }}">Excluir <i class="fa-solid fa-trash"></i></a>

                    </td>
                </tr>
                @endforeach
            </table>
            <div class="flex_row col_12">
            <a href="/events/gerenciamento" class="card_acao muted col_6">Voltar </a>
            <a href="/events/listarProduto" class="card_acao muted col_6">Produtos</a>
            </div>
        </div>
    </div>
</section>
@endsection
