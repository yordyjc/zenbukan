@extends('front.layouts.app')

@section('titulo')
Evaluación Física Nutricional
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

<section class="xs-pt-xs xs-pb-sm">
    <div class="container">
        <div class="xs-bmi xs-bmi-light">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="xs-colummn-heading">
                        <h2>Calcula tu <span>Índice de Masa Corporal</span> online</h2>
                        <p>Ingresa tus datos para calcular tu IMC de forma inmediata.</p>
                    </div>
                    <form action="#" class="xs-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="heightWrap" class="form-group xs-form-anim">
                                    <label class="input-label" for="altura">Altura en cm</label>
                                    <input type="number" id="altura" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="weightWrap" class="form-group xs-form-anim">
                                    <label class="input-label" for="peso">Peso en kg</label>
                                    <input type="number" id="peso" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group xs-form-anim">
                                    <label class="input-label" for="xs-bmi-age">Edad</label>
                                    <input type="number" id="xs-bmi-age" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="row">
                                    <div class="col-12 xs-mt-80 xs-mb-20">

                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <label class="input-label">
                                                <input class="form-check-input" type="radio" name="sex" id="male" value="male" checked="">Hombre
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <label class="input-label">
                                                <input class="form-check-input" type="radio" name="sex" id="female" value="female">Mujer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group xs-mt-20">
                                    <button type="submit" id="calcular-imc" class="btn btn-primary">Calcular</button>
                                </div>
                                <div id="resultado-imc" class="clearfix" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="xs-colummn-heading">
                        <h2>Tabla <span>IMC</span></h2>
                    </div>
                    <div class="table-responsive xs-bmi-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Estado</th>
                                    <th scope="col">IMC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="alert-warning">
                                    <td>Delgadez</td>
                                    <td>Menos de 18.5</td>
                                </tr>
                                <tr class="alert-success">
                                    <td>Normal</td>
                                    <td>18.5 - 24.9</td>
                                </tr>
                                <tr class="alert-warning">
                                    <td>Sobrepeso</td>
                                    <td>25.0 - 29.9</td>
                                </tr>
                                <tr class="alert-danger">
                                    <td>Obesidad Grado I</td>
                                    <td>30.0 - 34.9</td>
                                </tr>
                                <tr class="alert-danger">
                                    <td>Obesidad Grado II</td>
                                    <td>35.0 - 39.9</td>
                                </tr>
                                <tr class="alert-danger">
                                    <td>Obesidad Grado III</td>
                                    <td>Más de 40.0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="xs-black-white xs-section-padding-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2><span>Transformaciones</span></h2>    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="/resources/img/index/imc/tra1.png" alt="">
            </div>
            <div class="col-md-4">
                <img src="/resources/img/index/imc/tra2.png" alt="">
            </div>
            <div class="col-md-4">
                <img src="/resources/img/index/imc/tra3.png" alt="">
            </div>

        </div>
    </div>
</section>
<section class="xs-black-white xs-section-padding-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2><span>Sistema muscular hombres</span></h2>    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/resources/img/index/imc/mus1.png" alt="">
            </div>
            <div class="col-md-6">
                <img src="/resources/img/index/imc/mus2.png" alt="">
            </div>
        </div>
    </div>
</section>

<section class="xs-black-white xs-section-padding-xs">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="xs-section-heading text-center">
                    <h2><span>Etapas de una transformación</span></h2>    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="/resources/img/index/imc/fase1.png" alt="">
                <div class="text-center" >
                    </br>
                    <h6>Fase 1: Evaluación</h6>
                </div>
            </div>
            <div class="col-md-3">
                <img src="/resources/img/index/imc/fase2.png" alt="">
                <div class="text-center" >
                    </br>
                    <h6>Fase 2: Dieta</h6>
                </div>
            </div>
            <div class="col-md-3">
                <img src="/resources/img/index/imc/fase3.png" alt="">
                <div class="text-center" >
                    </br>
                    <h6>Fase 3: Entrenamiento</h6>
                </div>
            </div>
            <div class="col-md-3">
                <img src="/resources/img/index/imc/fase4.png" alt="">
                <div class="text-center" >
                    </br>
                    <h6>Fase 4: Seguimiento</h6>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
{!! Html::script("assets/js/imc.js") !!}
@endsection

