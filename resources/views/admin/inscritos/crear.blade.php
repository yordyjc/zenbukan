@extends('admin.layouts.app')

@section('title')
Agregar inscrito
@endsection

@section('inscritos')
active pcoded-trigger
@endsection

@section('agregar-inscrito')
active
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('title')</h5>
            </div>
            <div class="card-block">

                <form action="{{ url('/admin/inscritos') }}" method="post" enctype="multipart/form-data">
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

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script src="/resources/lib/textboxio/textboxio.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
    var editor = textboxio.replace('#observaciones');

    $(document).ready(function() {
        $('.select2').select2();
    });

    $( ".select2" ).select2({
        theme: "bootstrap4"
    });

    function archivoFile(evt) {
        var files = evt.target.files;
        var frame=$("#img-"+evt.target.name);

        if (files.length==0) {
            frame.attr('src','/resources/img/default.jpg');
        }
        else{
            pdffile_url=URL.createObjectURL(files[0]);
            frame.attr('src',pdffile_url);
        }
    }
    document.getElementById('foto').addEventListener('change', archivoFile, false);
</script>
@endsection
