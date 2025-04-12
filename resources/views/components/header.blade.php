<header class="col_12">
        <div class="container">
            @include('/components/logo', ['firstName' => 'Bagio', 'secondName' => 'Seguros', 'cssClass' => 'col_6'])
            <nav id="menu_navegacao_mobile" class="col_7 menu_fechado">

                <a class="centralize_item col_3 {{ !request()->routeIs('home*') ?: 'ativo'}}" href="{{ route('home') }}">
                    <h4>Home</h4>
                </a>
                <a class="centralize_item col_3 {{ !request()->routeIs('sobre*') ?: 'ativo'}}" href="{{ route('sobre') }}">
                    <h4>Sobre</h4>
                </a>
                @guest
                <a class="centralize_item col_3 {{ !request()->routeIs('login*') ?: 'ativo'}}" href="{{ route('login') }}">
                    <h4>Login</h4>
                </a>
                @endguest
                @auth
                <a class="centralize_item col_3 {{ !request()->routeIs('gerenciamento*') ?: 'ativo'}}" href="{{ route('gerenciamento.dashboard') }}">
                    <h4>Gerenciamento</h4>
                </a>
                <a class="centralize_item col_3 {{ !request()->routeIs('sair*') ?: 'ativo'}}" href="{{ route('sair') }}">
                    <h4>Sair</h4>
                </a>
                @endauth
                <div >
                    <a class="centralize_item" href="/instagram" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></a>
                </div>
            </nav>
            <button class="centralize_item" id="btn_abre_fecha_menu_mobile" onclick="Principal.controlaMenuNavegacaoMobile()"><i class="btn_hamburguer_cross"></i></button>
        </div>
    </header>
