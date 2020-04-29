<nav class="pcoded-navbar">
	<div class="nav-list">
		<div class="pcoded-inner-navbar main-menu">
			<ul class="pcoded-item pcoded-left-item">
				<li class="@yield('dashboard')">
					<a href="{{ url('/user') }}" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-home"></i></span>
						<span class="pcoded-mtext">Principal</span>
					</a>
				</li>

                <li class="pcoded-hasmenu @yield('mificha')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                        <span class="pcoded-mtext">Mi ficha de evaluación</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('ver-actual')">
                            <a href="{{ url('/user/actual') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Ver situacion actual</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="pcoded-submenu">
                        <li class="@yield('periodos')">
                            <a href="{{ url('/user/mificha') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Mi ficha</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pcoded-hasmenu @yield('reportes')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-save"></i></span>
                        <span class="pcoded-mtext">Reportes</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('reporte-fechas')">
                            <a href="{{ url('/user/reporte') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Reporte por fecha</span>
                            </a>
                        </li>
                    </ul>
                </li>
			</ul>

		</div>
	</div>
</nav>
