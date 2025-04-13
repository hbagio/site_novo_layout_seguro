@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Clientes</h1><br>
            <div class="card flex_col">
                <div class="flex_row col_12">

                <br>
                <table class="lista_consulta">
                    <tr>
                        <th>Código Contrato</th>
                        <th>Nome Cliente</th>
                        <th>Seguradora</th>
                        <th>Data Inicio</th>
                        <th>Data Fim</th>
                        <th>Valor R$</th>
                        <th>Apólice</th>
                        <th>Ações</th>
                    </tr>
                    @foreach ($contratos as $contrato)
                        <tr>
                            <td> {{ $contrato->id }} </td>
                            <td> {{ $contrato->nome }} </td>
                            <td> {{ $contrato->seguradora }} </td>
                            <td> {{ $contrato->datainicio }} </td>
                            <td> {{ $contrato->datafim }} </td>
                            <td> {{ $contrato->valor }} </td>
                            <td> <a href="/img/produtos/{{$contrato->apolice}}" target="_blank">Apólice</a>
                            </td>
                            <td>

                                <a class="lista_consulta_acao editar" href="/events/visualizarContrato/{{ $contrato->id }}"
                                    role="button"><i class="fa-solid fa-magnifying-glass"></i></a>
                                <a class="lista_consulta_acao editar" href="/events/alterar/{{ $contrato->id }}"
                                    role="button"> <i class="fa-solid fa-pen"></i></a>
                                <a class="lista_consulta_acao excluir" href="/events/excluirPessoa/{{$contrato->id }}"
                                    role="button"> <i class="fa-solid fa-trash"></i></a>

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
                <a class="link_paginacao" href="{{$contratos->url($contratos->lastPage()) }}">Última</a>
            </div>
            <div class="div_paginacao">
                <p>Página {{$contratos->currentPage() }} de {{ $contratos->lastPage() }}.</p>
            </div>
            <br>
        </div>




    </section>
@endsection
