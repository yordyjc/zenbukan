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
                                <li><a href="{{ url('/entrenadores') }}">Entrenadores</a></li>
                            </ul>
                        </li>
                        <li class="elementskit-dropdown-has">
                            <a href="{{ url('/productos') }}">Servicios</a>
                            <ul class="elementskit-dropdown elementskit-submenu-panel">
                                <li><a href="{{ url('/productos') }}">Suplementos deportivos</a></li>
                                <li><a href="{{ url('/imc') }}">Evaluación Física Nutricional</a></li>
                                <li><a href="{{ url('/maternidad-fitness') }}">Maternidad Fitness</a></li>
                                <li><a href="{{ url('/adulto-mayor-fitness') }}">Adulto Mayor Fitness</a></li>
                                <li><a href="{{ url('/ninos-fitness') }}">Niños Fitness</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/contacto') }}">Contacto</a>
                        </li>
                        <li>
                            <a href="{{ url('/login') }}">Clientes</a>
                        </li>
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
