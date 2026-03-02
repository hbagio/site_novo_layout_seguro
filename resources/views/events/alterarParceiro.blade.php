@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Parceiro</h1><br>
            <form class="card flex_col col_12" action="/events/updateParceiro/" method="POST" enctype="multipart/form-data">
                {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
                @csrf

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Código</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $parceiro->id }}"
                             readonly required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cpf/Cnpj Parceiro *</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="cpfcnpj" id="cpfcnpj"
                            value="{{ $parceiro->cpfcnpj }}" readonly required>
                    </div>
                    <label class="campo_label col_3">RG Parceiro</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="rg" id="rg" value="{{ $parceiro->rg }}"
                            >
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Nome Parceiro</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="nome" id="nome"
                            value="{{ $parceiro->nome }}" required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Tipo Parceiro *</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="tipo" id="tipo"
                            @if ($parceiro->tipo == 0) value="Fisica"
                    @else
                       value = "Juridico" @endif
                            required>
                    </div>
                    <label class="campo_label col_3">Data de Nascimento</label>
                    <div class="campo">
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento"
                            value="{{ $parceiro->data_nascimento }}" >
                    </div>

                </div>
                <br>



                <div class="container_campo col_10">
                    <label class="campo_label col_3">Situação Parceiro *</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="situacao" id="situacao"
                            @if ($parceiro->situacao == 1) value="Ativo"
                    @else
                       value = "Inativo" @endif
                            readonly required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Logradouro</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="endereco" id="endereco"
                            value="{{ $parceiro->endereco }}" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Bairro</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="bairro" id="bairro"
                            value="{{ $parceiro->bairro }}" required>
                    </div>
                    <label class="campo_label col_3">Cidade</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="cidade" id="cidade"
                            value="{{ $parceiro->cidade }}" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cep</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="cep" id="cep"
                            value="{{ $parceiro->cep }}" required>
                    </div>
                    <label class="campo_label col_3">Estado</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="estado" id="estado"
                            value="{{ $parceiro->estado }}" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Telefone</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="telefone" id="telefone"
                            value="{{ $parceiro->telefone }}" required>
                    </div>
                    <label class="campo_label col_3">E-mail</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ $parceiro->email }}" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Banco</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="banco" id="banco"
                            value="{{ $parceiro->banco }}" >
                    </div>
                    <label class="campo_label col_3">Agência</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="agencia" id="agencia"
                            value="{{ $parceiro->agencia }}" >
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Conta</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="conta" id="conta"
                            value="{{ $parceiro->conta }}" >
                    </div>
                    <label class="campo_label col_3">Chave Pix</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="pix" id="pix"
                            value="{{ $parceiro->pix }}" >
                    </div>
                </div>
                <br>


                <div class="container_campo col_10">
                    <label class="campo_label col_3">Pecentual Acordo</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="percentual" id="percentual"
                            value="{{ $parceiro->percentual }}" required>
                    </div>

                    <label class="campo_label col_3">Contrato Atual</label>
                    <div class="campo">
                        @if (isset($parceiro->contrato) && !empty($parceiro->contrato))
                            <a href="/img/contrato/{{ $parceiro->contrato }}" target="_blank" class="btn-link">
                                Ver Contrato
                            </a>
                        @else
                            <span style="color: #999; font-style: italic;">Não possui contrato</span>
                        @endif
                    </div>
                    <label class="campo_label col_4">Novo Contrato</label>
                    <div class="campo">
                        <input type="file" accept= ".pdf" name="contrato" id="contrato">
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Informações Adicionais</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="observacoes" id="observacoes"
                            value="{{ $parceiro->observacoes }}" >
                    </div>
                </div>
                <br>

                <div class="flex_row col_10">
                    <input type="submit" class="card_acao" value="Alterar" style="margin-right:30px">
                    <a class="card_acao muted " href="/events/consultaParceiros" style="margin-right:30px">Voltar</a>
                </div>
            </form>
        </div>
    </section>
@endsection
