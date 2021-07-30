<nav class="pcoded-navbar">
	<div class="nav-list">
		<div class="pcoded-inner-navbar main-menu">
            @if(Auth::user()->tipo == 1)
			<ul class="pcoded-item pcoded-left-item">
				<li class="@yield('dashboard')">
					<a href="{{ url('/admin') }}" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-home"></i></span>
						<span class="pcoded-mtext">Principal</span>
					</a>
				</li>
            </ul>
            @endif

            <div class="pcoded-navigation-label">Gestión de plataforma</div>
            <ul class="pcoded-item pcoded-left-item">
                @if(Auth::user()->tipo == 1)
                <li class="@yield('administradores')">
                    <a href="{{ url('/admin/lista-administrador') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                        <span class="pcoded-mtext">Usuarios</span>
                    </a>
                </li>
                @endif

                <li class="pcoded-hasmenu @yield('inscritos')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                        <span class="pcoded-mtext">Inscripciones</span>
                    </a>
                    <ul class="pcoded-submenu">
                        @if(Auth::user()->tipo == 1)
                        <li class="@yield('lista-inscritos')">
                            <a href="{{ url('/admin/inscripciones/lista-inscritos') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Lista de inscritos</span>
                            </a>
                        </li>
                        @endif
                        <li class="@yield('lista-torneos-vigentes')">
                            <a href="{{url('/admin/inscripciones/torneos-vigentes/')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Inscribir a torneo vigente</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(Auth::user()->tipo == 1)
                <li class="pcoded-hasmenu @yield('torneos')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                        <span class="pcoded-mtext">Torneos</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('lista-torneos')">
                            <a href="{{ url('/admin/torneos') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Lista de torneos</span>
                            </a>
                        </li>
                        <li class="@yield('nuevo-torneo')">
                            <a href="{{ url('/admin/torneos/create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Nuevo torneo</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->tipo == 1)
                <li class="pcoded-hasmenu @yield('clubes')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                        <span class="pcoded-mtext">Clubes</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('lista-clubes')">
                            <a href="{{ url('/admin/clubes') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Lista de clubes</span>
                            </a>
                        </li>
                        <li class="@yield('nuevo-club')">
                            <a href="{{ url('/admin/clubes/create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Nuevo Club</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>

            @if(Auth::user()->tipo == 1)
            <div class="pcoded-navigation-label">Gestión de reportes</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu @yield('sorteos')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-save"></i></span>
                        <span class="pcoded-mtext">Sorteos</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('reporte-fechas')">
                            <a href="{{url('admin/sorteo')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Sorteo Kumite por categoria</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="pcoded-submenu">
                        <li class="@yield('sorteo-kata')">
                            <a href="{{url('admin/sorteo/kata')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Sorteo kata por categoria</span>
                            </a>
                        </li>
                    </ul>
                </li>

			</ul>
            @endif
	</div>
</nav>
