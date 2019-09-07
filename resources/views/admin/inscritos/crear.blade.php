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

                <form {{-- action="{{ url('/admin/instructores') }} --}}" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control form-control-round {{ $errors->has('telefono') ? ' form-control-danger' : '' }}" id="telefono" name="telefono" value="{{ old('telefono') }}">
                                @if ($errors->has('telefono'))
                                <div class="col-form-label">
                                    {{ $errors->first('telefono') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-md-2 col-form-label" for="region">
                                Región
                            </label>
                            <div class="col-md-10">
                                <select class="region form-control form-control-round fill select2 " required="" id="region" name="region"><option selected="selected" value="">-- SELECCIONE --</option><option value="10000">Amazonas</option><option value="20000">Áncash</option><option value="30000">Apurímac</option><option value="40000">Arequipa</option><option value="50000">Ayacucho</option><option value="60000">Cajamarca</option><option value="70000">Callao</option><option value="80000">Cusco</option><option value="90000">Huancavelica</option><option value="100000">Huánuco</option><option value="110000">Ica</option><option value="120000">Junín</option><option value="130000">La Libertad</option><option value="140000">Lambayeque</option><option value="150000">Lima</option><option value="160000">Loreto</option><option value="170000">Madre de Dios</option><option value="180000">Moquegua</option><option value="190000">Pasco</option><option value="200000">Piura</option><option value="210000">Puno</option><option value="220000">San Martín</option><option value="230000">Tacna</option><option value="240000">Tumbes</option><option value="250000">Ucayali</option></select>
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-md-2 col-form-label" for="provincia">
                                Provincia
                            </label>
                            <div class="col-md-10">
                                <select name="provincia" id="provincia" class="form-control form-control-round fill select2" required>
                                    <option>-- SELECCIONE --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-md-2 col-form-label" for="distrito">
                                Distrito
                            </label>
                            <div class="col-md-10">
                                <select name="distrito" id="distrito" class="form-control form-control-round fill select2" required>
                                    <option>-- SELECCIONE --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-md-2 col-form-label" for="direccion">
                                Dirección
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round " id="direccion" name="direccion" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="estado">
                                Interesado en
                            </label>
                            <div class="col-md-10 form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="suspendido" id="suspendido" value="0" checked=&quot;checked&quot;>
                                    <i class="helper"></i>Perder peso
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="suspendido" id="suspendido" value="1" >
                                    <i class="helper"></i>Tonificar
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="suspendido" id="suspendido" value="1" >
                                    <i class="helper"></i>Musculación
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="suspendido" id="suspendido" value="1" >
                                    <i class="helper"></i>Competencia
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="suspendido" id="suspendido" value="1" >
                                    <i class="helper"></i>Otro
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nacimiento') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="nacimiento">
                                Fecha de nacimiento
                            </label>
                            <div class="col-md-10">
                                <input type="date" class="form-control form-control-round {{ $errors->has('nacimiento') ? ' form-control-danger' : '' }}" id="nacimiento" name="nacimiento" value="{{ old('nacimiento') }}">
                                @if ($errors->has('nacimiento'))
                                <div class="col-form-label">
                                    {{ $errors->first('nacimiento') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('talla') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="talla">
                                Talla
                            </label>
                            <div class="col-md-10">
                                <textarea  rows="2" class="form-control {{ $errors->has('talla') ? ' form-control-danger' : '' }}" id="talla" name="talla">{{ old('talla') }}</textarea>
                                @if ($errors->has('talla'))
                                <div class="col-form-label">
                                    {{ $errors->first('talla') }}
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
                        <div class="form-group {{ $errors->has('contenido') ? ' has-danger' : '' }} row">
                            <label class="col-form-label" for="contenido">Observaciones</label>
                            <textarea name="contenido" id="contenido" class="form-control {{ $errors->has('contenido') ? ' form-control-danger' : '' }}" cols="30" rows="10">{{ old('contenido') }}</textarea>
                            @if ($errors->has('contenido'))
                            <div class="col-form-label">
                                {{ $errors->first('contenido') }}
                            </div>
                            @endif
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
    var editor = textboxio.replace('#contenido');

    $(document).ready(function() {
        $('#titulo').select2();
        $('#pais').select2();
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
