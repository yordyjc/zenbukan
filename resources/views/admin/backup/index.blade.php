@extends('admin.layouts.app')

@section('title')
Generar backup
@endsection

@section('backup')
active
@endsection

@section('content')
@php
use Carbon\Carbon;
setlocale(LC_TIME, 'es_ES.UTF-8');
Carbon::setLocale('es');
@endphp

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('title')</h5>
            </div>
            <div class="card-block">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            <a href="http://localhost/phpmyadmin/db_export.php?db=fitness" class="btn btn-block btn-info" target="_blank">Descargar backup en formato SQL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
