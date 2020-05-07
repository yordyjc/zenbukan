<header class="elementskit-header xs-header">
    <div class="xs-container">
        <div class="xs-navbar">
            <a class="xs-navbar-brand" href="{{ url('/') }}">
                <img src="{{ $configuracion->logo }}" width="60px;" alt="{{ $configuracion->titulo }}">
            </a>
            <nav class="elementskit-navbar ml-auto">

                <button class="elementskit-menu-hamburger elementskit-menu-toggler">
                    <span class="elementskit-menu-hamburger-icon"></span>
                    <span class="elementskit-menu-hamburger-icon"></span>
                    <span class="elementskit-menu-hamburger-icon"></span>
                </button>

                <div class="elementskit-menu-container elementskit-menu-offcanvas-elements">
                    <ul class="elementskit-navbar-nav nav-alignment-dynamic">

                        <li>
                            <a href="{{ url('/planes') }}">Planes</a>
                        </li>
                        <li>
                            <a href="{{ url('/clases') }}">Clases</a>
                        </li>
                        <li class="elementskit-dropdown-has">
                            <a href="{{ url('/nosotros') }}">Nosotros</a>
                            <ul class="elementskit-dropdown elementskit-submenu-panel">
                                <li><a href="{{ url('/mision-vision') }}">Misión y vision</a></li>
                                <li><a href="{{ url('/servicios') }}">Beneficios y clases</a></li>
                                <li><a href="{{url('/galerias-videos')}}">Galería de videos</a></li>
                                <li><a href="{{url('/horarios')}}">Horarios</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('/imc') }}">Ev. Física Nutricional</a></li>
                        <li class="elementskit-dropdown-has">
                            <a href="{{ url('/servicios') }}">Servicios</a>
                            <ul class="elementskit-dropdown elementskit-submenu-panel">
                                <li><a href="{{ url('/productos') }}">Suplementos deportivos</a></li>
                                <li><a href="{{ url('/maternidad-fitness') }}">Maternidad fitness</a></li>
                                <li><a href="{{ url('/entrenamiento-kids') }}">Entrenamiento kids</a></li>
                                <li><a href="{{ url('/corporativo') }}">Corporativo</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/contacto') }}">Contacto</a>
                        </li>
                        <li>
                            <a href="{{ url('/pase-gratis') }}" style="color: red;">Pase Gratis</a>
                        </li>
                        @if (Auth::check())
                            @if (Auth::user()->tipo==1) {{-- Admin --}}
                            <li class="elementskit-dropdown-has">
                                <a href="{{ url('/user/mificha') }}">Mi cuenta</a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel">
                                    <li><a>Bienvenido, {{ Auth::user()->nombres }}</a></li>
                                    <li><a href="{{ url('/admin/inscritos') }}">Administrar</a></li>
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
                                <a href="{{ url('/user/mificha') }}">Mi cuenta</a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel">
                                    <li><a>Bienvenido, {{ Auth::user()->nombres }}</a></li>
                                    <li><a href="{{ url('user/mificha') }}">Panel de usuario</a></li>
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
                            <a href="{{ url('/login') }}">Clientes</a>
                        </li>
                        @endif
                    </ul>

                    <div class="elementskit-nav-identity-panel">
                        <h1 class="elementskit-site-title">
                            <a class="elementskit-nav-logo" href="{{ url('/') }}">
                                <img src="{{ $configuracion->logo }}" width="60px;" alt="{{ $configuracion->titulo }}">
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
</header>
