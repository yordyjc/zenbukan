@extends('admin.layouts.app')

@section('title')
Agregar periodo a {{ $ficha->usuario->nombres }} {{ $ficha->usuario->apellidos }}
@endsection

@section('fichas')
active pcoded-trigger
@endsection

@section('lista-fichas')
active
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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

<div class="row">
    <div class="col-sm-12">
        <h5>@yield('title') - Ficha Nro. {{ concatenar($ficha->correlativo) }}</h5>
        <br />
    </div>
</div>

<form action="{{ url('/admin/periodos') }}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" id="ficha" name="ficha" value="{{ $ficha->id }}" />
<input type="hidden" id="talla" name="talla" value="{{ $ficha->talla }}" />

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="col-sm-10 offset-sm-1">
                    <div class="row">

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('peso') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Peso
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('peso') ? ' form-control-danger' : '' }}" id="peso" name="peso" value="{{ old('peso') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">Kg.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('peso'))
                                    <div class="col-form-label">
                                        {{ $errors->first('peso') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('presion') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Presión
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-round {{ $errors->has('presion') ? ' form-control-danger' : '' }}" id="presion" name="presion" value="{{ old('presion') }}">
                                        <span class="input-group-append">
                                            <label class="input-group-text">mmHg</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('presion'))
                                    <div class="col-form-label">
                                        {{ $errors->first('presion') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('grasa') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Grasa corporal
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('grasa') ? ' form-control-danger' : '' }}" id="grasa" name="grasa" value="{{ old('grasa') }}" step="0.01" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">%</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('grasa'))
                                    <div class="col-form-label">
                                        {{ $errors->first('grasa') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                         <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('ritmo') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Ritmo cardíaco
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('ritmo') ? ' form-control-danger' : '' }}" id="ritmo" name="ritmo" value="{{ old('ritmo') }}" step="1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">lat/min</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('ritmo'))
                                    <div class="col-form-label">
                                        {{ $errors->first('ritmo') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>MONITOREO</h5>
            </div>
            <div class="card-block">
                <div class="col-sm-10 offset-sm-1">
                    <h4 class="sub-title">Parte superior</h4>
                    <div class="row">

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('pecho') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Pecho
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('pecho') ? ' form-control-danger' : '' }}" id="pecho" name="pecho" value="{{ old('pecho') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">cm.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('pecho'))
                                    <div class="col-form-label">
                                        {{ $errors->first('pecho') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('espalda') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Espalda
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('espalda') ? ' form-control-danger' : '' }}" id="espalda" name="espalda" value="{{ old('espalda') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">cm.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('espalda'))
                                    <div class="col-form-label">
                                        {{ $errors->first('espalda') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('hombros') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Hombros
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('hombros') ? ' form-control-danger' : '' }}" id="hombros" name="hombros" value="{{ old('hombros') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">cm.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('hombros'))
                                    <div class="col-form-label">
                                        {{ $errors->first('hombros') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                         <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('biceps') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Bíceps
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('biceps') ? ' form-control-danger' : '' }}" id="biceps" name="biceps" value="{{ old('biceps') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">cm.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('biceps'))
                                    <div class="col-form-label">
                                        {{ $errors->first('biceps') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <h4 class="sub-title">Parte media</h4>

                    <div class="row">

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('cintura') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Cintura
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('cintura') ? ' form-control-danger' : '' }}" id="cintura" name="cintura" value="{{ old('cintura') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">cm.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('cintura'))
                                    <div class="col-form-label">
                                        {{ $errors->first('cintura') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <h4 class="sub-title">Parte inferior</h4>

                    <div class="row">

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('gluteos') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Glúteos
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('gluteos') ? ' form-control-danger' : '' }}" id="gluteos" name="gluteos" value="{{ old('gluteos') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">cm.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('gluteos'))
                                    <div class="col-form-label">
                                        {{ $errors->first('gluteos') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('pierna') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Pierna
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('pierna') ? ' form-control-danger' : '' }}" id="pierna" name="pierna" value="{{ old('pierna') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">cm.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('pierna'))
                                    <div class="col-form-label">
                                        {{ $errors->first('pierna') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-3">
                            <div class="form-group {{ $errors->has('pantorrilla') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Pantorrilla
                                </label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-round {{ $errors->has('pantorrilla') ? ' form-control-danger' : '' }}" id="pantorrilla" name="pantorrilla" value="{{ old('pantorrilla') }}" step="0.1" min="0">
                                        <span class="input-group-append">
                                            <label class="input-group-text">cm.</label>
                                        </span>
                                    </div>
                                    @if ($errors->has('pantorrilla'))
                                    <div class="col-form-label">
                                        {{ $errors->first('pantorrilla') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>EXAMEN FÍSICO</h5>
            </div>
            <div class="card-block">
                <div class="col-sm-10 offset-sm-1">

                    <div class="row">

                        <div class="col-sm-12 col-xl-4">
                            <h4 class="sub-title">Parte superior</h4>
                            <div class="form-group {{ $errors->has('planchas') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="planchas">
                                    Planchas
                                </label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control form-control-round {{ $errors->has('planchas') ? ' form-control-danger' : '' }}" id="planchas" name="planchas" value="{{ old('planchas') }}" step="1" min="0">
                                    @if ($errors->has('planchas'))
                                    <div class="col-form-label">
                                        {{ $errors->first('planchas') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-4">
                            <h4 class="sub-title">Parte inferior</h4>

                            <div class="form-group {{ $errors->has('sentadillas') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="sentadillas">
                                    Sentadillas
                                </label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control form-control-round {{ $errors->has('sentadillas') ? ' form-control-danger' : '' }}" id="sentadillas" name="sentadillas" value="{{ old('sentadillas') }}" step="1" min="0">
                                    @if ($errors->has('sentadillas'))
                                    <div class="col-form-label">
                                        {{ $errors->first('sentadillas') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-4">
                            <h4 class="sub-title">Parte media</h4>

                            <div class="form-group {{ $errors->has('abdominales') ? ' has-danger' : '' }} row">
                                <label class="col-md-12 col-form-label" for="abdominales">
                                    Abdominales
                                </label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control form-control-round {{ $errors->has('abdominales') ? ' form-control-danger' : '' }}" id="abdominales" name="abdominales" value="{{ old('abdominales') }}" step="1" min="0">
                                    @if ($errors->has('abdominales'))
                                    <div class="col-form-label">
                                        {{ $errors->first('abdominales') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="col-sm-10 offset-sm-1">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-round btn-block m-t-10">
                                <i class="icofont icofont-save"></i> Guardar
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button type="reset" class="btn btn-outline-primary btn-round btn-block m-t-10">
                                <i class="icofont icofont-refresh"></i> Limpiar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
    });

    $( ".select2" ).select2({
        theme: "bootstrap4"
    });
</script>
@endsection
