@extends('layouts.main')
@section('title', 'Bagio Seguros | Home')
@section('content')
    <section class="galeria">
        @include('/components/toolbar')
        <div class="grid_container container">
            @foreach ($produtos as $produto)
                @include('/components/cardProduto')
            @endforeach

            @if (count($produtos) == 0)
                <h3 class="card_titulo titulo_grande">Nehum produto encontrados para os filtros utilizados. <a
                        href="/">Clique aqui para ver todos</a> </h3>
            @endif
            <br>


        </div>

        <div class="div_paginacao">
            <a class="link_paginacao" href="/">Primeira</a>
            <a disabled class="link_paginacao" href="{{$produtos->previousPageUrl() }}">Anterior</a>
            <a class="link_paginacao" href="{{ $produtos->nextPageUrl() }}">Próxima</a>
            <a class="link_paginacao" href="{{ $produtos->url($produtos->lastPage()) }}">Última</a>
        </div>
        <div class="div_paginacao">
            <p>Página {{ $produtos->currentPage() }} de {{ $produtos->lastPage() }}.</p>
        </div>
        <br>


    </section>


    @include('/components/modal')


@endsection
