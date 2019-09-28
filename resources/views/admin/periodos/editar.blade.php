@extends('admin.layouts.app')

@section('title')
Editando periodo {{ $periodo->id }} de la Ficha Nro. {{ concatenar($periodo->ficha->correlativo) }} | {{ $periodo->ficha->usuario->nombres }} {{ $periodo->ficha->usuario->apellidos }}
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
        <h5>@yield('title')</h5>
        <br />
    </div>
</div>
<form action="{{ url('/admin/periodos/'.$periodo->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>MONITOREO</h5>
            </div>
            <div class="card-block">

                {{-- <form action="{{ url('/admin/inscritos') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-sm-10 offset-sm-1">

                        <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="nombre">
                                Nombres
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('nombre') ? ' form-control-danger' : '' }}" id="nombre" name="nombre" value="{{ old('nombre') }}">
                                @if ($errors->has('nombre'))
                                <div class="col-form-label">
                                    {{ $errors->first('nombre') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('apellido') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="apellido">
                                Apellidos
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('apellido') ? ' form-control-danger' : '' }}" id="apellido" name="apellido" value="{{ old('apellido') }}">
                                @if ($errors->has('apellido'))
                                <div class="col-form-label">
                                    {{ $errors->first('apellido') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="sexo">
                                Sexo
                            </label>
                            <div class="col-md-10 form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="sexo" id="sexo" value="1" checked="checked">
                                    <i class="helper"></i>Hombre
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="sexo" id="sexo" value="0" >
                                    <i class="helper"></i>Mujer
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="email">
                                E-mail
                            </label>
                            <div class="col-md-10">
                                <input type="email" class="form-control form-control-round {{ $errors->has('email') ? ' form-control-danger' : '' }}" id="email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <div class="col-form-label">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telefono') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="telefono">
                                Celular
                            </label>
                            <div class="col-md-10">
                                <input type="number" class="form-control form-control-round {{ $errors->has('telefono') ? ' form-control-danger' : '' }}" id="telefono" name="telefono" value="{{ old('telefono') }}">
                                @if ($errors->has('telefono'))
                                <div class="col-form-label">
                                    {{ $errors->first('telefono') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('sector') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="sector">
                                Vive en
                            </label>
                            <div class="col-md-10">
                                {!! Form::select('sector',$sectores,old('sector'),["class"=>"sector form-control form-control-round fill select2 ",'placeholder' => '-- Sector --',"required"=>"","id"=>"sector"]) !!}
                                @if ($errors->has('sector'))
                                    <div class="col-form-label">
                                        {{ $errors->first('sector') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="interes">
                                Interesado en
                            </label>
                            <div class="col-md-10 form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="interes" id="interes" value="1" checked="checked">
                                    <i class="helper"></i>Perder peso
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="interes" id="interes" value="2" >
                                    <i class="helper"></i>Tonificar
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="interes" id="interes" value="3" >
                                    <i class="helper"></i>Musculación
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="interes" id="interes" value="4" >
                                    <i class="helper"></i>Competencia
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="interes" id="interes" value="5" >
                                    <i class="helper"></i>Otro
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nacimiento') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="nacimiento">
                                Fecha de Nac.
                            </label>
                            <div class="col-md-4">
                                <input type="date" class="form-control form-control-round {{ $errors->has('nacimiento') ? ' form-control-danger' : '' }}" id="nacimiento" name="nacimiento" value="{{ old('nacimiento') }}">
                                @if ($errors->has('nacimiento'))
                                <div class="col-form-label">
                                    {{ $errors->first('nacimiento') }}
                                </div>
                                @endif
                            </div>
                            <label class="col-md-2 col-form-label" for="edad">
                                o edad
                            </label>
                            <div class="col-md-4">
                                <input type="number" class="form-control form-control-round {{ $errors->has('edad') ? ' form-control-danger' : '' }}" id="edad" name="edad" value="{{ old('edad') }}">
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('talla') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="talla">
                                Talla
                            </label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-round {{ $errors->has('talla') ? ' form-control-danger' : '' }}" id="talla" name="talla" value="{{ old('talla') }}" step="0.01" min="0.60" max="2.20">
                                    <span class="input-group-append">
                                        <label class="input-group-text">metros</label>
                                    </span>
                                </div>
                                @if ($errors->has('talla'))
                                <div class="col-form-label">
                                    {{ $errors->first('talla') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('enfermedad') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="enfermedad">
                                Enfermedad o lesión
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('enfermedad') ? ' form-control-danger' : '' }}" id="enfermedad" name="enfermedad" value="{{ old('enfermedad') }}">
                                @if ($errors->has('enfermedad'))
                                <div class="col-form-label">
                                    {{ $errors->first('enfermedad') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('observaciones') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="observaciones">
                                Observaciones
                            </label>
                            <div class="col-md-10">
                                <textarea  rows="10" class="form-control {{ $errors->has('observaciones') ? ' form-control-danger' : '' }}" id="observaciones" name="observaciones">{{ old('observaciones') }}</textarea>
                                @if ($errors->has('observaciones'))
                                <div class="col-form-label">
                                    {{ $errors->first('observaciones') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('foto') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="foto">
                                Fotografía
                            </label>
                            <div class="col-md-10">
                                <input type="file"id="foto" class="form-control form-control-round {{ $errors->has('foto') ? ' form-control-danger' : '' }}" name="foto"  accept=".png, .jpg, .jpeg">
                                @if ($errors->has('foto'))
                                <div class="col-form-label">
                                    {{ $errors->first('foto') }}
                                </div>
                                @endif
                                <h6>Previsualización:</h6><img id="img-foto" src="/resources/img/default.jpg" style="width:120px;height:120px;" alt="Previsualización" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 offset-sm-1">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary btn-round btn-block m-b-0">
                                    <i class="icofont icofont-save"></i> Guardar
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button type="reset" class="btn btn-outline-primary btn-round btn-block m-b-0">
                                    <i class="icofont icofont-refresh"></i> Limpiar
                                </button>
                            </div>
                        </div>
                    </div><!-- /.col-sm-10 offset-sm-1 -->

                </form> --}}
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

                    <h4 class="sub-title">Parte superior</h4>

                    <div class="form-group {{ $errors->has('planchas') ? ' has-danger' : '' }} row">
                        <label class="col-md-2 col-form-label" for="planchas">
                            Planchas
                        </label>
                        <div class="col-md-10">
                            <input type="number" class="form-control form-control-round {{ $errors->has('planchas') ? ' form-control-danger' : '' }}" id="planchas" name="planchas" value="{{ $periodo->planchas }}" step="1" min="0">
                            @if ($errors->has('planchas'))
                            <div class="col-form-label">
                                {{ $errors->first('planchas') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <h4 class="sub-title">Parte inferior</h4>

                    <div class="form-group {{ $errors->has('sentadillas') ? ' has-danger' : '' }} row">
                        <label class="col-md-2 col-form-label" for="sentadillas">
                            Sentadillas
                        </label>
                        <div class="col-md-10">
                            <input type="number" class="form-control form-control-round {{ $errors->has('sentadillas') ? ' form-control-danger' : '' }}" id="sentadillas" name="sentadillas" value="{{ $periodo->sentadillas }}" step="1" min="0">
                            @if ($errors->has('sentadillas'))
                            <div class="col-form-label">
                                {{ $errors->first('sentadillas') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <h4 class="sub-title">Parte media</h4>

                    <div class="form-group {{ $errors->has('abdominales') ? ' has-danger' : '' }} row">
                        <label class="col-md-2 col-form-label" for="abdominales">
                            Abdominales
                        </label>
                        <div class="col-md-10">
                            <input type="number" class="form-control form-control-round {{ $errors->has('abdominales') ? ' form-control-danger' : '' }}" id="abdominales" name="abdominales" value="{{ $periodo->abdominales }}" step="1" min="0">
                            @if ($errors->has('abdominales'))
                            <div class="col-form-label">
                                {{ $errors->first('abdominales') }}
                            </div>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-sm-10 offset-sm-1">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary btn-round btn-block m-b-0">
                                <i class="icofont icofont-save"></i> Guardar
                            </button>
                        </div>
                        <div class="col-sm-6">
                            <button type="reset" class="btn btn-outline-primary btn-round btn-block m-b-0">
                                <i class="icofont icofont-refresh"></i> Limpiar
                            </button>
                        </div>
                    </div>
                </div><!-- /.col-sm-10 offset-sm-1 -->

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
