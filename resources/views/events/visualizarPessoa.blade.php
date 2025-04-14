@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Alterar Pessoa</h1><br>
            <form class="card flex_col col_12" action="/events/updatePessoa/" method="POST" enctype="multipart/form-data">
                {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
                @csrf

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Código</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $pessoa->id }}"
                             readonly required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Nome</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ $pessoa->nome }}"
                        readonly required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Tipo</label>
                    <div class="campo">

                        <input name="tipo" style="text-align: left" readonly
                            @switch($pessoa->tipo)
                            @case(0)
                                value= 'Fisica'
                                @break
                            @case(1)
                                value='Juridico'
                                @break
                            @default     
                        @endswitch
                            required>

                    </div>
                </div>

                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cpf/Cnpj</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cpfcnpj" id="cpfcnpj"
                            value="{{ $pessoa->cpfcnpj }}" readonly required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Endereço</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="endereco" id="endereco"
                            value="{{ $pessoa->endereco }}" readonly required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cep</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cep" id="cep" value="{{ $pessoa->cpfcnpj }}"
                        readonly required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Bairro</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="bairro" id="bairro" value="{{ $pessoa->bairro }}"
                        readonly required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cidade</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cidade" id="cidade" value="{{ $pessoa->cidade }}"
                        readonly required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Estado</label>
                    <div class="campo">
                        <div class="campo">
                            <select name="estado" style="text-align: left" readonly required>
                                <option value="{{$pessoa->estado}}">{{$pessoa->estado}}</option>
                              
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Telefone</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="telefone" id="telefone" required readonly
                            value="{{ $pessoa->telefone }}">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Email</label>
                    <div class="campo">
                        <input type="email" class="form-control"name="email" id="email" required readonly
                            value="{{ $pessoa->email }}"">
                    </div>
                </div>

                <br>

                <div class="flex_row col_10">
                    <a class="card_acao muted " href="/events/consultaPessoas" style="margin-right:5px">Voltar</a>
                    <a href="/events/incluirContrato/{{ $pessoa->id }}" class="card_acao  col_2" style="margin-right:5px">Cadastrar Contrato</a>
                        
                </div>

            </form>
        </div>
    </section>
@endsection
