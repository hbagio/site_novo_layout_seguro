<header class="col_12">
        <div class="container">
            @include('/components/logo', ['firstName' => 'Bagio', 'secondName' => 'Seguros', 'cssClass' => 'col_6'])
            <nav id="menu_navegacao_mobile" class="col_7 menu_fechado">


                @guest
                <a class="centralize_item col_3 {{ !request()->routeIs('login*') ?: 'ativo'}}" href="{{ route('login') }}">
                    <h4>Login</h4>
                </a>
                @endguest
                @auth
                   <a class="centralize_item col_3 {{ !request()->routeIs('home*') ?: 'ativo'}}" href="{{ route('home') }}">
                    <h4>Home</h4>
                </a>


                <a class="centralize_item col_3 {{ !request()->routeIs('sair*') ?: 'ativo'}}" href="{{ route('sair') }}">
                    <h4>Sair</h4>
                </a>
                @endauth
    
            </nav>
            <button class="centralize_item" id="btn_abre_fecha_menu_mobile" onclick="Principal.controlaMenuNavegacaoMobile()"><i class="btn_hamburguer_cross"></i></button>
        </div>
    </header>
