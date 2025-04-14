@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Alterar Contrato</h1><br>

            <form class="card flex_col col_12" action="/events/updateContrato/" method="POST" enctype="multipart/form-data">
                {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
                @csrf

            <div class="container_campo col_10">
                <label class="campo_label col_3">Código Contrato</label>
                <div class="campo">
                    <input type="text" class="form-control" name="id" id="id" value="{{ $contrato->id }}"
                        readonly required>
                </div>
            </div>
            <br>

            <div class="container_campo col_10">
                <label class="campo_label col_3">Nome Cliente</label>
                <div class="campo">
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $contrato->nome }}"
                        readonly required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Cpf/Cnpj Cliente</label>
                <div class="campo">
                    <input type="text" class="form-control" name="nome" id="nome"
                        value="{{ $contrato->cpfcnpj }}" readonly required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Situação Contrato</label>
                <div class="campo">
                    <select name="situacao" id="situacao" style="text-align: left" required>
                        @if ($contrato->situacao == 1)
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        @else
                            <option value="0">Inativo</option>
                            <option value="1">Ativo</option>
                        @endif
                    </select>

                </div>
            </div>
            <br>

            <div class="container_campo col_10">
                <label class="campo_label col_3">Nome Seguradora</label>
                <div class="campo">
                    <input type="text" class="form-control" name="seguradora" id="seguradora"
                        value="{{ $contrato->seguradora }}" required>
                </div>
            </div>
            <br>

            <div class="container_campo col_10 campo_text_area" style="height: 5em;">
                <label class="campo_label col_3">Descrição</label>
                <div class="campo">
                    <textarea name="descricao" rows="7" name="descricao" required>{{ $contrato->descricao }}</textarea>
                </div>
            </div>
            <br>

            <div class="container_campo col_10">
                <label class="campo_label col_3">Valor da Apólice R$</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="valor" id="valor"
                        value="{{ $contrato->valor }}" required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Valor da Comissão R$</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="comissao" id="comissao"
                        value="{{ $contrato->comissao }}" required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10 campo_text_area" style="height: 5em;">
                <label class="campo_label col_3">Data Inicio</label>
                <div class="campo">
                    <input type="date" name="datainicio" name="datainicio" placeholder="Data Inicio Apolice"
                        value="{{ $contrato->datainicio }}" required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10 campo_text_area" style="height: 5em;">
                <label class="campo_label col_3">Data Vencimento</label>
                <div class="campo">
                    <input type="date" name="datafim" name="datafim" placeholder="Data Vencimento Apolice"
                        value="{{ $contrato->datafim }}" required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Documento Apólice</label>
                <div class="campo">
                    <a href="/img/produtos/{{ $contrato->apolice }}" target="_blank">Documento da Apólice</a>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Novo Documento Apólice</label>
                <div class="campo">
                    <input type="file" name="apolice" id="apolice">
                </div>
            </div>
            <br>
            <div class="flex_row col_10">
                <input type="submit" class="card_acao" value="Alterar" style="margin-right:5px">
                <a class="card_acao muted col_6" href="/events/consultaContratos" style="margin-right:5px">Voltar</a>
            </div>
            </form>
        </div>
    </section>
@endsection
