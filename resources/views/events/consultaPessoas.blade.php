@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Clientes</h1><br>
            <div class="card flex_col">
                <div class="flex_row col_12">

                    <form class="container flex_row menu_fechado" id="menu_filtro_mobile"
                        action="/events/pesquisaPessoaFiltro/" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="container_campo col_5">
                            <label class="campo_label col_5">Pesquisar por:</label>
                            <div class="campo">
                                <select name="tipo_busca" id = "tipo_busca" style="text-align: left" required>
                                    <option value="0"> Nome</option>
                                    <option value="1"> Cpf/Cnpj</option>
                                </select>

                            </div>
                        </div>
                        <div class="container_campo col_8">
                            <div class="campo">
                                <input type="text" name="filtro_pesquisa" id="filtro_pesquisa"
                                    placeholder="pesquisar cliente">
                            </div>
                            <button type="submit" class="campo_acao"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>

                    <div class="flex_row col_1"></div>

                    <a href="/events/cadastrarPessoas" class="card_acao  col_2" style="margin-right:5px">Cadastrar Cliente</a>

                    <a  href="/events/consultaContratos" class="card_acao  col_1" style="margin-right:5px">Contratos</a>

                    <a href="/events/gerenciamento" class="card_acao muted col_1" style="margin-right:5px">Voltar</a>
                </div>

                <br>
                <table class="lista_consulta">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Cpf/Cnpj</th>
                        {{-- <th>Endereço</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Cep</th> --}}
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                    @foreach ($pessoas as $pessoa)
                        <tr>
                            <td> {{ $pessoa->id }} </td>
                            <td> {{ $pessoa->nome }} </td>
                            @if ($pessoa->tipo == 0)
                                <td>Fisica</td>
                            @else
                                <td>Juridica</td>
                            @endif
                            <td> {{ $pessoa->cpfcnpj }} </td>
                            {{-- <td> {{ $pessoa->endereco}} </td>
                            <td> {{ $pessoa->bairro}} </td>
                            <td> {{ $pessoa->cidade}} </td>
                            <td> {{ $pessoa->estado}} </td>
                            <td> {{ $pessoa->cep}} </td> --}}
                            <td> {{ $pessoa->telefone }} </td>
                            <td> {{ $pessoa->email }} </td>
                            <td>

                                <a class="lista_consulta_acao editar" href="/events/visualizarPessoa/{{ $pessoa->id }}"
                                    role="button"><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="lista_consulta_acao editar" href="/events/alterar/{{ $pessoa->id }}"
                                    role="button"> <i class="fa-solid fa-pen"></i></a>
                                <a class="lista_consulta_acao excluir" href="/events/excluirPessoa/{{ $pessoa->id }}"
                                    role="button"> <i class="fa-solid fa-trash"></i></a>
                                <a class="lista_consulta_acao editar" href="/events/incluirContrato/{{ $pessoa->id }}"
                                        role="button"> <i class="fa-solid fa-paste"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="produto_nome" style="text-align: center">
            <div class="div_paginacao">
                <a class="link_paginacao" href="/events/consultaPessoas">Primeira</a>
                <a disabled class="link_paginacao" href="{{ $pessoas->previousPageUrl() }}">Anterior</a>
                <a class="link_paginacao" href="{{ $pessoas->nextPageUrl() }}">Próxima</a>
                <a class="link_paginacao" href="{{ $pessoas->url($pessoas->lastPage()) }}">Última</a>
            </div>
            <div class="div_paginacao">
                <p>Página {{ $pessoas->currentPage() }} de {{ $pessoas->lastPage() }}.</p>
            </div>
            <br>
        </div>


    </section>
@endsection
