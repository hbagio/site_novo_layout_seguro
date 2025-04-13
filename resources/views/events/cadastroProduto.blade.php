@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
<section class="galeria">
    <div class="container">
    <h1 class="titulo_grande cor_escuro_50">Novo Produto</h1><br>
    <form class="card flex_col col_12" action="/events/store" method="POST" enctype="multipart/form-data">
            {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
            @csrf
            <div class="container_campo col_10">
                <label class="campo_label col_3">Categoria</label>
                <div class="campo">
                    <select name="categoria">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Nome</label>
                <div class="campo">
                    <input type="text" class="form-control" name="identificacao" id="identificacao" placeholder="Identificação do Produto" required>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Destaque</label>
                <div class="campo">
                    <select name="destaque" required>
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Valor R$</label>
                <div class="campo">
                    <input type="number" class="form-control"name="valor" id="valor" placeholder="Valor do Produto">
                </div>
            </div>
            <br>
            <div class="container_campo col_10 campo_text_area" style="height: 5em;">
                <label class="campo_label col_3">Descrição</label>
                <div class="campo">
                    <textarea name="descricao" rows="5" name="descricao" placeholder="Descrição detalhada do Produto" required></textarea>
                </div>
            </div>
            <br>
            <div class="container_campo col_10">
                <label class="campo_label col_3">Imagem Principal</label>
                <div class="campo">
                    <input type="file" name="imagem" required>
                </div>
            </div>
            
            <br>
            <input type="submit" class="card_acao col_10" value="Cadastrar"><br>
            <a href="/events/listarProduto" class="card_acao muted col_5">Voltar</a>
        </form>
    </div>
</section>
@endsection



