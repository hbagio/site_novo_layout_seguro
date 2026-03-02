@section('title', 'Bagio Seguros | Parceiros')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Parceiros</h1><br>
            <div class="card flex_col">
                <div class="flex_row col_12">

                    {{--<form class="container flex_row menu_fechado" id="menu_filtro_mobile"
                        action="/events/pesquisaParceiroFiltro/" method="GET" enctype="multipart/form-data">
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
                                    placeholder="pesquisar parceiro">
                            </div>
                            <button type="submit" class="campo_acao"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>

                    <div class="flex_row col_1">
                    </div> --}}
                    <a href="/events/cadastrarParceiros" class="card_acao  col_2" style="margin-right:5px">Cadastrar
                        Parceiro</a>
                    <a href="/events/gerenciamento" class="card_acao muted col_1" style="margin-right:5px">Voltar</a>
                </div>

                <br>
                <table class="lista_consulta">
                    <tr>
                        {{-- <th>Código</th> --}}
                        <th>Cpf/Cnpj</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Percentual</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Situação</th>
                        <th>Ações</th>
                    </tr>
                    @foreach ($parceiros as $parceiro)
                        <tr>
                            {{-- <td> {{ $parceiro->id }} </td> --}}
                            <td> {{ $parceiro->cpfcnpj }} </td>
                            <td> {{ $parceiro->nome }} </td>
                            @if ($parceiro->tipo == 0)
                                <td>Fisica</td>
                            @else
                                <td>Juridica</td>
                            @endif

                            <td> {{ $parceiro->percentual }} %</td>
                            <td> {{ $parceiro->telefone }} </td>
                            <td> {{ $parceiro->email }} </td>
                            @if ($parceiro->situacao == 1)
                                <td>Ativo</td>
                            @else
                                <td>Inativo</td>
                            @endif

                            <td>

                                <a class="lista_consulta_acao editar" href="/events/visutalizarParceiro/{{ $parceiro->id }}"
                                    role="button"><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="lista_consulta_acao editar" href="/events/alterarParceiro/{{ $parceiro->id }}"
                                    role="button"> <i class="fa-solid fa-pen"></i></a>
                                <a class="lista_consulta_acao  editar" href="/events/desativarParceiro/{{ $parceiro->id }}"
                                    role="button"> <i class="fa-solid fa-arrows-rotate"></i></a>
                                <a class="lista_consulta_acao excluir" href="/events/excluirParceiro/{{ $parceiro->id }}"
                                    role="button"> <i class="fa-solid fa-trash"></i></a>


                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="produto_nome" style="text-align: center">
            <div class="div_paginacao">
                <a class="link_paginacao" href="/events/consultaparceiros">Primeira</a>
                <a disabled class="link_paginacao" href="{{ $parceiros->previousPageUrl() }}">Anterior</a>
                <a class="link_paginacao" href="{{ $parceiros->nextPageUrl() }}">Próxima</a>
                <a class="link_paginacao" href="{{ $parceiros->url($parceiros->lastPage()) }}">Última</a>
            </div>
            <div class="div_paginacao">
                <p>Página {{ $parceiros->currentPage() }} de {{ $parceiros->lastPage() }}.</p>
            </div>
            <br>
        </div>


    </section>
@endsection
