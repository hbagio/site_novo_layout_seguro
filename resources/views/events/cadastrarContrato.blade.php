@section('title', 'Fazendo Festa | Venda')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
<<<<<<< HEAD
    <h1 class="titulo_grande cor_escuro_50">Nova Venda</h1><br>
=======
    <h1 class="titulo_grande cor_escuro_50">Cadastro de Contrato</h1><br>
>>>>>>> 7ab758063d90c7734e4a95eb6fbe0dd4b937d39c
    <form class="card flex_col col_12" action="/events/storeContrato" method="POST" enctype="multipart/form-data">
            {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
            @csrf
            <div class="container_campo col_10">
                <label class="campo_label col_3">Código Cliente</label>
                <div class="campo">
                    <input type="text" class="form-control" name="idpessoa" id="idpessoa" value="{{$pessoa->id}}" readonly required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Nome Cliente</label>
                <div class="campo">
                    <input type="text" class="form-control" name="nome_cliente" id="nome_cliente" value="{{$pessoa->nome}}" readonly required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Cpf/Cnpj Cliente</label>
                <div class="campo">
                    <input type="text" class="form-control" name="cpfcnpj_cliente" id="cpfcnpj_cliente" value="{{$pessoa->cpfcnpj}}" readonly required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Nome Seguradora</label>
                <div class="campo">
                    <input type="text" class="form-control" name="seguradora" id="seguradora"   required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10 campo_text_area" style="height: 5em;">
                <label class="campo_label col_3">Descrição</label>
                <div class="campo">
                    <textarea name="descricao" rows="7" name="descricao"  required></textarea>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Valor da Apólice R$</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="valor" id="valor" required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Valor da Comissão R$</label>
                <div class="campo">
                    <input type="number" step="0.01" min="0.01" class="form-control"name="comissao" id="comissao"  required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10 campo_text_area" style="height: 5em;">
                <label class="campo_label col_3">Data Inicio</label>
                <div class="campo">
                    <input type="date" name="datainicio"  name="datainicio" placeholder="Data Inicio Apolice" required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10 campo_text_area" style="height: 5em;">
                <label class="campo_label col_3">Data Vencimento</label>
                <div class="campo">
                    <input type="date" name="datafim"  name="datafim" placeholder="Data Vencimento Apolice" required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Documento Apólice</label>
                <div class="campo">
                    <input type="file" name="apolice" id="apolice" required>
                </div>
            </div>

            <br>
            <div class="flex_row col_10">
            <input type="submit" class="card_acao" value="Cadastrar" style="margin-right:5px">
            <a href="/events/consultaPessoas" class="card_acao muted col_5">Voltar</a>
            </div>
        </form>
    </div>
</section>
@endsection



