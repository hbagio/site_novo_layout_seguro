@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Consulta de Contratos</h1><br>
            <div class="card flex_col">
                <div class="flex_row col_12">

                    <form class="container flex_row menu_fechado" id="menu_filtro_mobile"
                        action="/events/pesquisaContratoFiltro/" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="container_campo col_5">
                            <label class="campo_label col_5">Busca por:</label>
                            <div class="campo">
                                <select name="tipo_busca" id = "tipo_busca" style="text-align: left" required>
                                    <option value="0"> Nome</option>
                                    <option value="1"> Cpf/Cnpj</option>
                                </select>
                            </div>
                        </div>

                        <div class="container_campo col_10">
                            <div class="campo">
                                <input type="text" name="filtro_pesquisa" id="filtro_pesquisa"
                                    placeholder="pesquisar contrato">
                            </div>
                            <button type="submit" class="campo_acao"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>

                    <a href="/events/consultaPessoas" class="card_acao  col_2">Consultar Cliente</a>
                </div>
                    <br>


                    <table class="lista_consulta">
                        <tr>
                            <th>Código Contrato</th>
                            <th>Nome Cliente</th>
                            <th>Cpf/Cnpj Cliente</th>
                            <th>Seguradora</th>
                            <th>Data Inicio</th>
                            <th>Data Fim</th>
                            <th>Valor R$</th>
                            <th>Situacao</th>
                            <th>Ações</th>
                        </tr>
                        @foreach ($contratos as $contrato)
                            <tr>
                                <td> {{ $contrato->id }} </td>
                                <td> {{ $contrato->nome }} </td>
                                <td> {{ $contrato->cpfcnpj }} </td>
                                <td> {{ $contrato->seguradora }} </td>
                                <td> {{ $contrato->datainicio }} </td>
                                <td> {{ $contrato->datafim }} </td>
                                <td> {{ $contrato->valor }} </td>
                                @if ($contrato->situacao == 1)
                                    <td>Ativo</td>
                                @elseif ($contrato->situacao != 1)
                                    <td>Inativo</td>
                                @endif

                                <td>

                                    <a class="lista_consulta_acao editar"
                                        href="/events/visualizarContrato/{{ $contrato->id }}" role="button"><i
                                            class="fa-solid fa-magnifying-glass"></i></a>
                                    <a class="lista_consulta_acao editar" href="/events/alterarContrato/{{ $contrato->id }}"
                                        role="button"> <i class="fa-solid fa-pen"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="produto_nome" style="text-align: center">
                <div class="div_paginacao">
                    <a class="link_paginacao" href="/events/consultaContratos">Primeira</a>
                    <a disabled class="link_paginacao" href="{{ $contratos->previousPageUrl() }}">Anterior</a>
                    <a class="link_paginacao" href="{{ $contratos->nextPageUrl() }}">Próxima</a>
                    <a class="link_paginacao" href="{{ $contratos->url($contratos->lastPage()) }}">Última</a>
                </div>
                <div class="div_paginacao">
                    <p>Página {{ $contratos->currentPage() }} de {{ $contratos->lastPage() }}.</p>
                </div>
                <br>
            </div>




    </section>
@endsection
