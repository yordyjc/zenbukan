<nav class="pcoded-navbar">
	<div class="nav-list">
		<div class="pcoded-inner-navbar main-menu">

			<ul class="pcoded-item pcoded-left-item">
				<li class="@yield('dashboard')">
					<a href="{{ url('/admin') }}" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-home"></i></span>
						<span class="pcoded-mtext">Principal</span>
					</a>
				</li>
            </ul>

            <div class="pcoded-navigation-label">Gestión de usuarios</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="@yield('administradores')">
                    <a href="{{ url('/admin/lista-administrador') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                        <span class="pcoded-mtext">Administradores</span>
                    </a>
                </li>

                <li class="pcoded-hasmenu @yield('inscritos')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                        <span class="pcoded-mtext">Inscritos</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('lista-inscritos')">
                            <a href="{{ url('/admin/inscritos') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Lista de inscritos</span>
                            </a>
                        </li>
                        <li class="@yield('agregar-inscrito')">
                            <a href="{{ url('/admin/inscritos/create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Agregar inscrito</span>
                            </a>
                        </li>
                    </ul>
                </li>

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
                <li class="pcoded-hasmenu @yield('lubes')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                        <span class="pcoded-mtext">Clubes</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('lista-torneos')">
                            <a href="{{ url('/admin/clubes') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Lista de clubes</span>
                            </a>
                        </li>
                        <li class="@yield('nuevo-torneo')">
                            <a href="{{ url('/admin/clubes/create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Nuevo Club</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="pcoded-navigation-label">Gestión de reportes</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu @yield('reportes')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-save"></i></span>
                        <span class="pcoded-mtext">Reportes</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('reporte-fechas')">
                            <a href="{{url('admin/sorteo')}}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Reporte por fecha</span>
                            </a>
                        </li>
                    </ul>
                </li>

			</ul>
	</div>
</nav>
