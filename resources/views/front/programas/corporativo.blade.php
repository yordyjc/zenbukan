@extends('front.layouts.app')

@section('titulo')
Corporativo
@endsection

@section('contenido')
<audio src="/resources/audio/bebes.mp3" autoplay loop></audio>
<section>
    <div style="height=100%; width=900px;">
        <img src="/resources/img/index/corporativo/portada.png"alt ="" width=100%;>
    </div>
</section>

<section class="xs-pt-xs xs-pb-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="xs-team">
                    <div>
                        <img src="resources/img/index/corporativo/co3.png" alt="" />
                    </div>
                    <div class="xs-team-content">
                        <h5>
                            CLASES CORPORATIVAS 
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="xs-team">
                    <div>
                        <img src="resources/img/index/corporativo/co2.png" alt="" />
                    </div>
                    <div class="xs-team-content">
                        <h5>
                            INTEGRACIÓN DE EQUIPOS - JORNADAS DE ENTRENAMIENTO 
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section style="background-color:#0083AD;">
    <div class="container">
        <div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    </br>
                    </br>
                    </br>
                    <div class="xs-section-heading text-center"style="color:#ffffff">
                        <h2 style="color:#ffffff">Importancia de la gimnasia laboral</h2>
                        <p>La gimnasia laboral o también conocida como pausas activas, consiste en la ejecución de ejercicios físicos correctamente estructurados que actúan de manera terapéutica y preventiva, propiciando el bienestar general de sus trabajadores.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</br>
<section class="xs-pt-xs xs-pb-sm">
    <div class="container">
    <div class="xs-help xs-strength">
        <div class="row">
            <div class="col-lg-6 text-center">
                <img src="resources/img/index/corporativo/co1.png" alt=""/>
            </div>
            <div class="col-lg-6 text-center">

                <div class="xs-pl-15 xs-pr-15">
                    <h2>
                        Beneficios
                    </h2>
                    <ul>
                        <li>Disminuye el estrés laboral</li>
                        <li>Favorece el cambio de posturas y rutina.</li>
                        <li>Libera estrés articular y muscular.</li>
                        <li>Estimula y favorece la circulación.</li>
                        <li>Mejora la postura.</li>
                        <li>Favorece la autoestima y capacidad de concentración.</li>
                        <li>Motiva y mejora las relaciones interpersonales y promueve la integración social.</li>
                        <li>Mejora el desempeño laboral.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- .xs-help END -->
    </div>

</section>

<!-- .container END -->

@endsection
