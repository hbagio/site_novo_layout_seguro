@section('title', 'Bagio Seguros | Gerenciar')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container grid_container">
            {{--  <div class="card animate grid_container_item flex_col">
            <h1 class="card_titulo"><i class="fa-solid fa-bookmark card_icone"></i>Categoria</h1>
            <a href="/events/cadastroCategoria" class="card_acao titulo_medio"> Acessar</a>
        </div>
        <div class="card animate grid_container_item flex_col">
            <h1 class="card_titulo"><i class="fa-solid fa-tag card_icone"></i>Produto</h1>
            <a href="/events/listarProduto" class="card_acao titulo_medio"> Acessar</a>
        </div>
        <div class="card animate grid_container_item flex_col">
            <h1 class="card_titulo"><i class="fa-solid fa-shop card_icone"></i>Empresa</h1>
            <a href="/events/dadosEmpresa" class="card_acao titulo_medio"> Acessar</a>
        </div>  --}}
        <div class="card animate grid_container_item flex_col">
            <h1 class="card_titulo"><i class="fa-solid fa-user card_icone"></i>Usuário</h1>
            <a href="/events/consultaUsuario" class="card_acao titulo_medio"> Acessar</a>
        </div>

            <div class="card animate grid_container_item flex_col">
                <h1 class="card_titulo"><i class="fa-solid fa-user card_icone"></i>Parceiros</h1>
                <a href="/events/consultaParceiros" class="card_acao titulo_medio">Acessar</a>
            </div>
            <div class="card animate grid_container_item flex_col">
                <h1 class="card_titulo"><i class="fa-solid fa-user card_icone"></i>Clientes</h1>
                <a href="/events/consultaPessoas" class="card_acao titulo_medio">Acessar</a>
            </div>

            <div class="card animate grid_container_item flex_col">
                <h1 class="card_titulo"><i class="fa-solid fa-paste card_icone"></i>Vendas</h1>
                <a href="/events/consultaContratos" class="card_acao titulo_medio">Acessar</a>
            </div>
        </div>
    </section>
@endsection
