<header class="elementskit-header xs-header">
        <div class="xs-navbar fixed-top">
            <div class="container">
                <div class="row">
                <a class="xs-navbar-brand" href="{{ url('/') }}">
                <img src="{{ $configuracion->logo }}" width="60px;" alt="{{ $configuracion->titulo }}"> {{-- <span style="color: #0084B0; font-size: 28px; font-weight: 700; vertical-align: middle;">Fitness 10</span> --}}
            </a>
            <nav class="elementskit-navbar ml-auto">

                <button class="elementskit-menu-hamburger elementskit-menu-toggler">
                    <span class="elementskit-menu-hamburger-icon"></span>
                    <span class="elementskit-menu-hamburger-icon"></span>
                    <span class="elementskit-menu-hamburger-icon"></span>
                </button>

                <div class="elementskit-menu-container elementskit-menu-offcanvas-elements">
                    <ul class="elementskit-navbar-nav nav-alignment-dynamic">

                        @if (Auth::check())
                            @if (Auth::user()->tipo==1 || Auth::user()->tipo==2) {{-- Admin --}}
                            <li class="elementskit-dropdown-has">
                                <a href="{{ url('/user/mificha') }}">Mi cuenta</a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel">
                                    <li><a>Bienvenido, {{ Auth::user()->nombres }}</a></li>
                                    <li><a href="{{ url('/admin/inscripciones/torneos-vigentes') }}">Administrar</a></li>
                                    <li>
                                        <form action="{{ url('/logout') }}" method="post">
                                        <a href="">
                                            @csrf
                                            <button type="submit" class="btn btn-link" style="   padding-top: 15px;padding-left: 15px;padding-bottom: 15px;padding-right: 15px;color: #101010;font-weight: 700;font-size: 14px;text-transform: uppercase;letter-spacing: 1px;">
                                                Cerrar sesión
                                            </button>
                                        </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            @else {{-- Usuario --}}
                            <li class="elementskit-dropdown-has">
                                <a href="{{ url('/juez/categorias') }}">Mi cuenta</a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel">
                                    <li><a>Bienvenido, {{ Auth::user()->nombres }}</a></li>
                                    <li><a href="{{ url('juez/categorias') }}">Panel de usuario</a></li>
                                    <li>
                                        <form action="{{ url('/logout') }}" method="post">
                                        <a href="">
                                            @csrf
                                            <button type="submit" class="btn btn-link" style="   padding-top: 15px;padding-left: 15px;padding-bottom: 15px;padding-right: 15px;color: #101010;font-weight: 700;font-size: 14px;text-transform: uppercase;letter-spacing: 1px;">
                                                Cerrar sesión
                                            </button>
                                        </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        @else
                        <li>
                            <a href="{{ url('/login') }}">Inicia sesión</a>
                        </li>
                        @endif
                    </ul>

                    <div class="elementskit-nav-identity-panel">
                        <h1 class="elementskit-site-title">
                            <a class="elementskit-nav-logo" href="{{ url('/') }}">
                                <img src="{{ $configuracion->logo }}" width="60px;" alt="{{ $configuracion->titulo }}"> <span style="color: #0084B0; font-size: 28px; font-weight: 700; vertical-align: middle;">Fitness 10</span>
                            </a>
                        </h1>
                        <button class="elementskit-menu-close elementskit-menu-toggler" type="button">
                            <i class="icon icon-cancel"></i>
                        </button>
                    </div>
                </div>

                <div class="elementskit-menu-overlay elementskit-menu-offcanvas-elements elementskit-menu-toggler">
                </div>

            </nav>
                </div>
            </div>
        </div>
</header>
