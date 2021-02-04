@extends('admin.layouts.app')

@section('title')
Categorias
@endsection

@section('torneos')
active pcoded-trigger
@endsection

@section('lista-torneos')
active
@endsection

@php
$primeramodalidad= $modalidades->first();
$torneo = $primeramodalidad->torneo->nombre;
@endphp

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('title')</h5>
            </div>
            <div class="card-block">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h4>{{$torneo}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        @if($modalidades->count()>0)
                        <table class="table table-bordered table-striped table-hover table-sm text-center">
                            <thead>
                                <tr>
                                    <td>Edad mínima</td>
                                    <td>Edad máxima</td>
                                    <td>Grado mínimo</td>
                                    <td>Grado máximo</td>
                                    <td>Sexo</td>
                                    <td>Kata</td>
                                    <td>Kumite</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($modalidades as $modalidad)
                                <tr>
                                    <td>{{$modalidad->edad_min}}</td>
                                    <td>{{$modalidad->edad_max}}</td>
                                    <td>{{$modalidad->grado_min}}</td>
                                    <td>{{$modalidad->grado_max}}</td>
                                    <td>{{$modalidad->sexo}}</td>
                                    <td>{{$modalidad->kata}}</td>
                                    <td>{{$modalidad->kumite}}</td>
                                    <td>
                                        <a href="{{url('admin/agregar-jueces/'.$modalidad->id)}}">
                                        <i class="icon feather icon-user-plus f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Agregar jueces"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            No hay categorias registradas
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
