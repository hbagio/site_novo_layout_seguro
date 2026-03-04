@section('title', 'Bagio Seguros | Vendas')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Vendas</h1><br>
            <div class="card flex_col">
                <div class="flex_row col_12">

                    <form class="container flex_row menu_fechado" id="menu_filtro_mobile"
                        action="/events/pesquisaContratoFiltro/" method="GET" enctype="multipart/form-data">
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
                                    placeholder="pesquisar contrato">
                            </div>
                            <button type="submit" class="campo_acao"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                    <a href="/events/consultaPessoas" class="card_acao  col_2" style="margin-right:5px">Consultar
                        Cliente</a>




                </div>
                <br>
                <h3 style="color: rgb(64, 126, 241)"> Consulte o Cliente para Incluir uma Nova Venda </h3>
                <br>
                <div class="flex_row col_12">



                    <br>
                    <table class="lista_consulta">
                        <tr>

                            <th>Nome Cliente</th>
                            <th>Cpf/Cnpj Cliente</th>
                            <th>Seguradora</th>
                            <th>Ramo</th>
                            <th>Data Inicio</th>
                            <th>Data Fim</th>
                            <th>Valor Liquido R$</th>
                            <th>Comissão R$</th>
                            <th>Parceiro a Pagar R$</th>
                            <th>Parceiro Pago R$</th>
                            <th>Situacao</th>
                            <th>Ações</th>
                        </tr>
                        @foreach ($contratos as $contrato)
                            <tr>

                                <td> {{ $contrato->nome }} </td>
                                <td> {{ $contrato->cpfcnpj }} </td>
                                <td> {{ $contrato->seguradora }} </td>
                                <td> {{ $contrato->ramo }} </td>
                                <td> {{ $contrato->datainicio }} </td>
                                <td> {{ $contrato->datafim }} </td>
                                <td> {{ number_format($contrato->valorliquido, 2, ',', '.') }} </td>
                                <td> {{ number_format($contrato->comissao, 2, ',', '.') }} </td>
                                <td> {{ number_format($contrato->valorapagarparceiro, 2, ',', '.') }} </td>
                                <td> {{ number_format($contrato->totalPago, 2, ',', '.') }} </td>
                                @if ($contrato->situacao == 1)
                                    <td>Ativo</td>
                                @elseif ($contrato->situacao != 1)
                                    <td>Inativo</td>
                                @endif

                                <td>
                                    <a class="lista_consulta_acao editar"
                                        href="/events/visualizarContrato/{{ $contrato->id }}" role="button"><i
                                            class="fa-solid fa-magnifying-glass"></i></a>
                                    <a class="lista_consulta_acao editar"
                                        href="/events/alterarContrato/{{$contrato->id }}" role="button"> <i
                                            class="fa-solid fa-pen"></i></a>
                                    <a class="lista_consulta_acao  excluir"
                                        href="/events/desativarContrato/{{$contrato->id }}" role="button"> <i
                                            class="fa-solid fa-arrows-rotate"></i></a>
                                    <a class="lista_consulta_acao excluir"
                                        href="/events/excluirContrato/{{ $contrato->id }}" role="button"> <i
                                            class="fa-solid fa-trash"></i></a>
                                     <a class="lista_consulta_acao editar"
                                        href="/events/pagamentosParceiro/{{$contrato->id }}" role="button"> <i
                                            class="fa-solid fa-brazilian-real-sign"></i></a>



                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <br>
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
