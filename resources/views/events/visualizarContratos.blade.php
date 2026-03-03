@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Contrato</h1><br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Código Contrato</label>
                <div class="campo">
                    <input type="text" class="form-control" name="idpessoa" id="idpessoa" value="{{ $contrato->id }}"
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
            </div>
            <br>

            <div class="container_campo col_10">
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
            <div class="container_campo col_10">


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

            <div class="container_campo col_10">
                <label class="campo_label col_5">Valor Bruto R$</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="valor" id="valor"
                        value="{{ $contrato->valor }}" readonly required>
                </div>

                <label class="campo_label col_5">Valor Liquido R$</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="valorliquido"
                        id="valorliquido" value="{{ $contrato->valorliquido }}" readonly required>
                </div>
                <label class="campo_label col_5">% Repasse ADM</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="percentual_admin"
                        id="percentual_admin" value="{{ $contrato->percentual_admin }}" readonly required>
                </div>


            </div>
            <br>

            <div class="container_campo col_10">


                <label class="campo_label col_5">Comissão R$</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="comissao" id="comissao"
                        value="{{ $contrato->comissao }}" readonly required>
                </div>

                <label class="campo_label col_5">Parcelas</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="parcelas" id="parcelas"
                        value="{{ $contrato->parcelas }}" readonly required>
                </div>


                <label class="campo_label col_5">Forma Pagamento</label>
                <div class="campo">
                    <input type="text" class="form-control" name="forma_pagamento" id="forma_pagamento"
                        value="{{ $contrato->forma_pagamento }}" readonly required>
                </div>
            </div>
            <br>


            <div class="container_campo col_10 ">
                <label class="campo_label col_5">Nome Parceiro</label>
                <div class="campo">
                    <input type="text" name="parceiro_nome" name="parceiro_nome"
                        value="{{ $contrato->parceiro_nome }}" readonly required>
                </div>

                <label class="campo_label col_5">Cpf/Cnpj Parceiro</label>
                <div class="campo">
                    <input type="text" name="parceiro_cpfcnpj" name="parceiro_cpfcnpj"
                        value="{{ $contrato->parceiro_cpfcnpj }}" readonly required>
                </div>


            </div>
            <br>

            <div class="container_campo col_10 ">
                <label class="campo_label col_5">% Parceiro</label>
                <div class="campo">
                    <input type="text" name="percentualparceiro" name="percentualparceiro"
                        value="{{ $contrato->percentualparceiro }}" readonly required>
                </div>

                <label class="campo_label col_5">Valor a Pagar Parceiro</label>
                <div class="campo">
                    <input type="text" name="valorapagarparceiro" name="valorapagarparceiro"
                        value="{{ $contrato->valorapagarparceiro }}" readonly required>
                </div>


            </div>

            <br>
            <div class="container_campo col_10 campo_text_area">
                <label class="campo_label col_5">Data Inicio</label>
                <div class="campo">
                    <input type="date" name="datainicio" name="datainicio" placeholder="Data Inicio Apolice"
                        value="{{ $contrato->datainicio }}" readonly required>
                </div>

                <label class="campo_label col_5">Data Fim</label>
                <div class="campo">
                    <input type="date" name="datafim" name="datafim" placeholder="Data Vencimento Apolice"
                        value="{{ $contrato->datafim }}" readonly required>
                </div>

                <label class="campo_label col_5">Documento Apólice</label>
                <div class="campo">
                    <a href="/img/apolice/{{ $contrato->apolice }}" target="_blank">Documento da Apólice</a>
                </div>
            </div>
            <br>
            <div class="flex_row col_10">
                <a class="card_acao muted " href="/events/consultaContratos" style="margin-right:5px">Voltar</a>
                <a href="/events/alterarContrato/{{ $contrato->id }}" class="card_acao "
                    style="margin-right:5px">Alterar Contrato</a>
            </div>

        </div>
    </section>
@endsection
