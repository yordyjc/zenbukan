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
                                <p><a class="xs-phone-number" href="tel:{{ $configuracion->telefono }}">{{ $configuracion->telefono }}</a></p>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h3 class="widget-title">Páginas</h3>
                        <div class="media">
                            <div class="media-body">
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/') }}">Inicio</a></li>
                                    <li><a href="{{ url('/planes') }}">Planes</a></li>
                                    <li><a href="{{ url('/clases') }}">Clases</a></li>
                                    <li><a href="{{ url('/nosotros') }}">Nosotros</a></li>
                                </ul>
                            </div>
                            <div class="media-body">
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/imc') }}">Calcula tu IMC</a></li>
                                    <li><a href="{{ url('/productos') }}">Suplementos deportivos</a></li>
                                    <li><a href="{{ url('/contacto') }}">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget xs-footer-subscribe">
                        <h3 class="widget-title">Boletín Gratuito</h3>
                        <p>Suscríbete a nuestro boletín para recibir información de entrenamientos, nutrición y promociones.</p>
                        <form action="#" method="POST" class="xs-subscribe-form">
                            <div class="form-group">
                                <input type="email" name="email" id="sub-input2" class="form-control" placeholder="Ingrese su e-mail">
                            </div>
                            <label for="sub-input2"></label>
                            <div class="form-group">

                            <button type="submit">Suscribirse</button>
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