@section('title', 'Fazendo Festa | Usuário')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
        <h1 class="titulo_grande cor_escuro_50">Usuários</h1><br>
        <div class="card flex_col">
            <div class="flex_row col_12">
                <a class="card_acao muted col_6" href="/events/gerenciamento" style="margin-right:5px">Voltar</a>
                <a class="card_acao" href="/inserirUsuario">Novo Usuário</a>
            </div>
            <br>
            <table class="lista_consulta">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td> {{ $usuario->id }} </td>
                    <td> {{ $usuario->name }} </td>
                    <td> {{ $usuario->email }} </td>
                    <td>
                       <div >
                            <a class="lista_consulta_acao editar" href="/events/alterarUsuario/{{ $usuario->id }}">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="lista_consulta_acao excluir" href="/events/excluirUsuario/{{ $usuario->id }}">Excluir <i class="fa-solid fa-trash"></i></a>
                       </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
<!-- 
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <a class="btn btn-secondary btn-sm" href="/inserirUsuario" role="button"><i class="fa-solid fa-pen"></i>Novo Usuário
        </a>


        <a class="btn btn-secondary btn-sm" href="/events/gerenciamento" role="button"><i
                class="fa-solid fa-pen"></i>Gerenciamento
        </a>
        <br>
        <br>
        <h5>Lista de Usuários</h5>

        @csrf


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td> {{ $usuario->id }} </td>
                    <td> {{ $usuario->name }} </td>
                    <td> {{ $usuario->email }} </td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="/events/alterarUsuario/{{ $usuario->id }}"
                            role="button"><i class="fa-solid fa-pen"></i>Alterar</a>
                    </td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="/events/excluirUsuario/{{ $usuario->id }}"
                            role="button"><i class="fa-solid fa-pen"></i> Excluir</a>
                    </td>


                </tr>
            @endforeach

        </table> -->

    
