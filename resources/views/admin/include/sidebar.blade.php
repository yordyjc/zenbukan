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

				<li class="@yield('configuracion')">
					<a href="{{ url('/admin/configuracion-general') }}" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-settings"></i></span>
						<span class="pcoded-mtext">Configuración general</span>
					</a>
				<li>
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

                <li class="pcoded-hasmenu @yield('fichas')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                        <span class="pcoded-mtext">Fichas de evaluación</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('lista-fichas')">
                            <a href="{{ url('/admin/fichas') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Fichas activas</span>
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
                            <a href="{{ url('/admin/reporte-fechas') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Reporte por fecha</span>
                            </a>
                        </li>
                        <li class="@yield('reporte-sexo')">
                            <a href="{{ url('/admin/reporte-sexo') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Reporte por sexo</span>
                            </a>
                        </li>
                        <li class="@yield('reporte-objetivo')">
                            <a href="{{ url('/admin/reporte-objetivo') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Reporte por objetivo</span>
                            </a>
                        </li>
                        <li class="@yield('cumpleanos-mes')">
                            <a href="{{ url('/admin/cumpleanos-mes') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Reporte cumpleaños del mes</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="@yield('backup')">
                    <a href="{{ url('/admin/backup') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-download"></i></span>
                        <span class="pcoded-mtext">Generar backup</span>
                    </a>
                </li>

			</ul>

            <div class="pcoded-navigation-label">Gestión de página web</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="@yield('fondos')">
                    <a href="{{ url('/admin/fondos') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-image"></i></span>
                        <span class="pcoded-mtext">Fondos</span>
                    </a>
                </li>

            </ul>


		</div>
	</div>
</nav>
