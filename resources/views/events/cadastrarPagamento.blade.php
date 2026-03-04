@section('title', 'Bagio Seguros | Pagamentos')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Pagamentos</h1><br>

            {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
            @csrf
            <div class="container_campo col_12">
                <label class="campo_label col_3">Código Contrato</label>
                <div class="campo">
                    <input type="text" class="form-control" name="id" id="id" value="{{ $contrato->id }}"
                        readonly required>
                </div>
                <label class="campo_label col_3">Código Cliente</label>
                <div class="campo">
                    <input type="text" class="form-control" name="idpessoa" id="idpessoa"
                        value="{{ $contrato->idpessoa }}" readonly required>
                </div>
                <label class="campo_label col_5">Situação</label>
                <div class="campo">
                    <input type="text" class="form-control" name="situacao" id="situacao"
                        @if ($contrato->situacao == 1) value="Ativo"
                    @else
                       value = "Inativo" @endif
                        readonly required>

                </div>

                    <a class="card_acao col_6" href="/events/consultaContratos" >Voltar</a>

            </div>
            <br>

            <div class="container_campo $col_12">
                <label class="campo_label col_3">Nome Cliente</label>
                <div class="campo">
                    <input type="text" class="form-control" name="pessoa_nome" id="pessoa_nome"
                        value="{{ $contrato->pessoa_nome }}" readonly required>
                </div>

                <label class="campo_label col_3">Cpf/Cnpj </label>
                <div class="campo">
                    <input type="text" class="form-control" name="pessoa_cpfcnpj" id="pessoa_cpfcnpj"
                        value="{{ $contrato->pessoa_cpfcnpj }}" readonly required>
                </div>
            </div>
            <br>
            <div class="container_campo $col_12 ">
                <input type="hidden" name="parceiro_id" value="{{ $contrato->parceiro_id }}">
                <label class="campo_label col_5">Nome Parceiro</label>
                <div class="campo">
                    <input type="text" name="parceiro_nome" id="parceiro_nome" value="{{ $contrato->parceiro_nome }}"
                        readonly required>
                </div>

                <label class="campo_label col_5">Cpf/Cnpj Parceiro</label>
                <div class="campo">
                    <input type="text" name="parceiro_cpfcnpj" name="parceiro_cpfcnpj"
                        value="{{ $contrato->parceiro_cpfcnpj }}" readonly required>
                </div>
                <label class="campo_label col_5">% Parceiro</label>
                <div class="campo">
                    <input type="text" name="percentualparceiro" name="percentualparceiro"
                        value="{{ $contrato->percentualparceiro }}" readonly required>
                </div>

            </div>
            <br>
            <div class="container_campo $col_12">


                <label class="campo_label col_5">Seguradora</label>
                <div class="campo">
                    <input type="text" class="form-control" name="seguradora" id="seguradora"
                        value="{{ $contrato->seguradora }}" readonly required>
                </div>

                <label class="campo_label col_5">Ramo</label>
                <div class="campo">
                    <input type="text" class="form-control" name="ramo" id="ramo" value="{{ $contrato->ramo }}"
                        readonly required>
                </div>
                <label class="campo_label col_5">Apólice</label>
                <div class="campo">
                    <input type="text" class="form-control" name="numeroapolice" id="numeroapolice"
                        value="{{ $contrato->numeroapolice }}" readonly required>
                </div>
            </div>
            <br>

            <div class="container_campo $col_12 ">
                <label class="campo_label col_5">% Comissão</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="percentualcomissao"
                        id="percentualcomissao" value="{{ $contrato->percentualcomissao }}" required>
                </div>

                <label class="campo_label col_5">Comissão R$</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="comissao"
                        id="comissao" value="{{ $contrato->comissao }}" required>
                </div>

                <label class="campo_label col_5">Apólice Atual</label>
                <div class="campo">
                    @if (isset($contrato->apolice) && !empty($contrato->apolice))
                        <a href="/img/apolice/{{ $contrato->apolice }}" target="_blank" class="btn-link">
                            Ver Contrato
                        </a>
                    @else
                        <span style="color: #999; font-style: italic;">Não possui contrato</span>
                    @endif
                </div>
            </div>
            <br>

            <div class="container_campo $col_12 ">
                <label class="campo_label col_5">Valor a Pagar</label>
                <div class="campo">
                    <input type="text" name="valorapagarparceiro" id="valorapagarparceiro"
                        value="{{ $contrato->valorapagarparceiro }}" required>
                </div>
                <label class="campo_label col_5">Valor Pago</label>
                <div class="campo">
                    <input type="text" id="totalPago" name="totalPago" value="{{ $totalPago }}" required>
                </div>
                <label class="campo_label col_5">Saldo Devedor</label>
                <div class="campo">
                    <input type="text" name="saldoRestante" id="saldoRestante" value="{{ $saldoRestante }}"
                        required>
                </div>
            </div>
            <br>
            <h3 style="color: rgb(64, 126, 241) ; text-align: center"> Registro de Novo Pagamento</h3>

            <form action="/events/storePagamento/" method="POST" enctype="multipart/form-data"
                style="border: 1px solid rgb(64, 126, 241); padding: 20px; background-color: #f9f9f9; border-radius: 5px;">
                @csrf
                <div class="container_campo col_12">
                    <label class="campo_label col_4">Data Pagamento</label>
                    <div class="campo">
                        <input type="date" name="data_pagamento" id="data_pagamento" required>
                    </div>
                    <input type="hidden" class="form-control" name="idcontrato" id="idcontrato"
                        value="{{ $contrato->id }}">
                    <label class="campo_label col_4">Valor</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control" name="valor"
                            id="valor" required>
                    </div>
                    <label class="campo_label col_4">Comprovante</label>
                    <div class="campo">
                        <input type="file" name="comprovante" id="comprovante" required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_12">
                    <label class="campo_label col_4">Observações</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="observacao" id="observacao"
                            {{ $totalPago >= $contrato->valorapagarparceiro ? 'readonly' : '' }}>
                    </div>

                    @if ($totalPago >= $contrato->valorapagarparceiro)
                        <div class="col_2"
                            style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold; border: 1px solid #c3e6cb; margin-left: 5px;">
                            <i class="fa-solid fa-check-double"></i> TOTALMENTE PAGO
                        </div>
                    @else
                        <input type="submit" class="card_acao col_2" value="Cadastrar" style="margin-left:5px">
                    @endif
                </div>

            </form>
            <br>
            <h3 style="color: rgb(64, 126, 241) ; text-align: center"> Pagamentos Realizados</h3>

            <div class="flex_row col_12">
                <br>
                <table class="lista_consulta">
                    <tr>
                        <th>Data Pagamento</th>
                        <th>Valor</th>
                        <th>Situação</th>
                        <th>Comprovante</th>
                        <th>Observação</th>
                        <th>Ações</th>
                    </tr>
                    @foreach ($pagamentos as $pagamento)
                        <tr>

                            <td> {{ $pagamento->data_pagamento }} </td>
                            <td> {{ number_format($pagamento->valor, 2, ',', '.') }} </td>
                            <td style="text-transform: capitalize;"> {{ $pagamento->situacao }} </td>
                            <td> <a href="/img/comprovante/{{ $pagamento->comprovante }}" target="_blank">Comprovante</a>
                            </td>
                            <td> {{ $pagamento->observacao }} </td>
                            <td>

                                <a class="lista_consulta_acao excluir" href="/events/excluirPagamento/{{ $pagamento->id }}"
                                    role="button"> <i class="fa-solid fa-trash"></i></a>




                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>


        </div>
    </section>
@endsection
