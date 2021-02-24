<nav class="pcoded-navbar">
	<div class="nav-list">
		<div class="pcoded-inner-navbar main-menu">
			<ul class="pcoded-item pcoded-left-item">
				<li class="@yield('dashboard')">
					<a href="{{ url('/juez/torneos') }}" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="feather icon-home"></i></span>
						<span class="pcoded-mtext">Principal</span>
					</a>
				</li>

                <li class="pcoded-hasmenu @yield('torneos')">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                        <span class="pcoded-mtext">Torneos asignados</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="@yield('ver-torneos')">
                            <a href="{{ url('/juez/torneos') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Ver torneos asignados</span>
                            </a>
                        </li>
                    </ul>
                </li>
			</ul>

		</div>
	</div>
</nav>
