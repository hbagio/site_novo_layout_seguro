<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        {{-- CSS da Aplicação --}}
            <link rel="stylesheet" href="/css/estilo_global.css">
        {{-- Scripts da Aplicação --}}
            <script src="/js/Principal.js"></script>
            {{-- JQuery --}}
                
                <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
            {{-- Font Awesome --}}
                <script src="https://kit.fontawesome.com/dbe0b3e2fa.js" crossorigin="anonymous"></script>
            {{-- Google Analitycs --}}

                <script async src="https://www.googletagmanager.com/gtag/js?id=G-8DD2ZC910C"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag() {
                        dataLayer.push(arguments);
                    }
                    gtag('js', new Date());
                    gtag('config', 'G-8DD2ZC910C');
                </script>



                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-242749656-1"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag() {
                        dataLayer.push(arguments);
                    }
                    gtag('js', new Date());
                    gtag('config', 'UA-242749656-1');
                </script>
    </head>
    <body>

        @include('/components/header')
        @if (session('msg'))
            @include('/components/mensagem', ['isVisivelInicialmente' => true, 'mensagem' => session('msg')])
        @endif
        @yield('content')
        @include('/components/footer')

    </body>
</html>
