@extends('front.layouts.app')

@section('titulo')
Nuestro horario
@endsection

@section('contenido')
<section class="xs-bg-cover" style="background: url({{ $fondo ? $fondo : '/resources/img/fondos/default.jpg' }}) center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="xs-banner-area">
                    <h1 class="xs-banner-title">@yield('titulo')</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Class Schedule -->
<section class="xs-section-padding xs-bg-cover class-schedule-area parallaxie parallaxie"  data-scrollax-parent="true" id="schedule">
    <div class="xs-water-mark" data-scrollax="properties: { translateY: '-250px' }">GYMvast</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2><span>fitness 10</span></h2>
                    <p></span>Contamos con entrenamientos variados que se acomodar a ti.</span></p>
                </div>
            </div>
        </div><!-- .row END -->

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive xs-schedule-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="xs-calendar-index"><i class="icon icon-calendar1"></i></th>
                                <th scope="col"><span>Lunes</span></th>
                                <th scope="col"><span>Martes</span></th>
                                <th scope="col"><span>Miercoles</span></th>
                                <th scope="col"><span>Jueves</span></th>
                                <th scope="col"><span>Viernes</span></th>
                                <th scope="col"><span>Sábados</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">6:00 - 7:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Proferor</h3>
                                        <h4>Musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Proferor</h3>
                                        <h4>Musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Proferor</h3>
                                        <h4>Musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Proferor</h3>
                                        <h4>Musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Proferor</h3>
                                        <h4>Musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Proferor</h3>
                                        <h4>Musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">7:30 - 8:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>tae bo</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>tae bo</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>tae bo</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">8:00 - 9:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">09:00 - 10:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>Taller de abdominales</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>Danzas peruanas</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>Taller de abdominales</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>Danzas peruanass</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>Taller de abdominales</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Prof. Edgard</h3>
                                        <h4>Evaluaciones y seguimiento</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">10:00 - 11:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>profesor</h3>
                                        <h4>musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>profesor</h3>
                                        <h4>musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>profesor</h3>
                                        <h4>musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>profesor</h3>
                                        <h4>musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>profesor</h3>
                                        <h4>musculación</h4>
                                        <p>Sala de maquinas</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>prof. edgard</h3>
                                        <h4>Evaluaciones y seguimiento</h4>
                                        <p>consultorio</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">11:00 - 12:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">18:00 - 19:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">19:00 - 20:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>baile</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>baile</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>baile</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>baile</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>danza arabe</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>danza arabe</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">20:00 - 21:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>tae bo</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>danzas peruanas</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>tae bo</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>danzas peruanas</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>tae bo</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>danzas peruanas</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">21:00 - 22:00</th>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>baile</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional fighter</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>baile</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>funcional fighter</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="xs-schedule-info">
                                        <h3>Profesor</h3>
                                        <h4>baile</h4>
                                        <p>Salón de baile</p>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- .row END -->
    </div><!-- .container END -->
</section><!-- Class Schedule end -->

@include('front.include.call-login')

@endsection
