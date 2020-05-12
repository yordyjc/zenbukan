<footer class="footer-1">
    <div class="xs-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget xs-mr-35">
                        <div class="xs-footer-logo">
                            <img src="{{ $configuracion->logo }}" width="80px;" alt="{{ $configuracion->titulo }}">
                        </div>
                        @if ($configuracion->descripcion)
                        <p>{{ $configuracion->descripcion }}</p>
                        @endif
                        <ul class="xs-footer-contact-info">
                            @if ($configuracion->direccion)
                            <li>
                                <i class="icon icon-location"></i>
                                <p>{{ $configuracion->direccion }}</p>
                            </li>
                            @endif
                            @if ($configuracion->telefono)
                            <li>
                                <i class="icon icon-phone"></i>
                                <p>{{ $configuracion->telefono }}</p>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                        <div id="xs-map" class="xs-map-contact"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget xs-footer-subscribe">
                        <h3 class="widget-title">Boletín Gratuito</h3>
                        <p>Suscríbete a nuestro boletín para recibir información de entrenamientos, nutrición y promociones.</p>
                        <form action="#" class="xs-subscribe-form" id="form-subscribe">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Ingrese su e-mail" required>
                            </div>
                            <div class="form-group">
                                <label for="submit"></label>
                                <div class="sendmessage-subscribe"></div>
                                <div class="errormessage-subscribe"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit-subscribe">Suscribirse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
    use Carbon\Carbon;
    setlocale(LC_TIME, 'es_ES.UTF-8');
    Carbon::setLocale('es');
    @endphp

    <div class="xs-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p>Copyright &copy; {{ Carbon::now()->format('Y') }} {{ $configuracion->titulo }}. Todos los derechos reservados</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline text-center text-md-right">
                        <li></li>
                        @if ($configuracion->facebook)
                            <li><a href="{{ $configuracion->facebook }}" class="icon icon-facebook"></a></li>
                        @endif
                        @if ($configuracion->twitter)
                            <li><a href="{{ $configuracion->twitter }}" class="icon icon-twitter"></a></li>
                        @endif
                        @if ($configuracion->instagram)
                            <li><a href="{{ $configuracion->instagram }}" class="icon icon-instagram"></a></li>
                        @endif
                        @if ($configuracion->youtube)
                            <li><a href="{{ $configuracion->youtube }}" class="icon icon-youtube"></a></li>
                        @endif
                        @if ($configuracion->linkedin)
                            <li><a href="{{ $configuracion->linkedin }}" class="icon icon-linkedin"></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
