@extends('juez.layouts.app')

@section('title')
    Torneos asignados
@endsection

@section('torneos')
active pcoded-trigger
@endsection

@section('ver-torneos')
active
@endsection

@section('content')

@php
use Carbon\Carbon;
setlocale(LC_TIME, 'es_ES.UTF-8');
Carbon::setLocale('es');

function concatenar($numero){
    $n=strlen($numero);
    if ($n==1) {
        $a='0000'.$numero;
    }
    else if ($n==2) {
        $a='000'.$numero;
    }
    else if ($n==3) {
        $a='00'.$numero;
    }
    else if ($n==4) {
        $a='0'.$numero;
    }
    else{
        $a=$numero;
    }
    return $a;
}
@endphp

Holas
@endsection
