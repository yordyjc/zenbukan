@extends('admin.layouts.app')

@section('title')
Agregar Torneo
@endsection

@section('torneos')
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

                <form action="{{ url('/admin/torneos') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-10 offset-sm-1">
                        <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="nombre">
                                Nombre
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

                        <div class="form-group {{ $errors->has('descripcion') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="descripcion">
                                Descripción
                            </label>
                            <div class="col-md-10">
                                <textarea  rows="10" class="form-control {{ $errors->has('descripcion') ? ' form-control-danger' : '' }}" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                                @if ($errors->has('descripcion'))
                                <div class="col-form-label">
                                    {{ $errors->first('descripcion') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('foto') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="foto">
                                Foto
                            </label>
                            <div class="col-md-10">
                                <input type="file"id="foto" class="form-control form-control-round {{ $errors->has('foto') ? ' form-control-danger' : '' }}" name="foto"  accept=".png, .jpg, .jpeg">
                                @if ($errors->has('foto'))
                                <div class="col-form-label">
                                    {{ $errors->first('foto') }}
                                </div>
                                @endif
                                <h6>Previsualización:</h6><img id="img-foto" src="/resources/img/default.jpg" style="width:300px;" alt="Previsualización" class="img-fluid">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('portada') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="portada">
                                Portada
                            </label>
                            <div class="col-md-10">
                                <input type="file"id="portada" class="form-control form-control-round {{ $errors->has('portada') ? ' form-control-danger' : '' }}" name="portada"  accept=".png, .jpg, .jpeg">
                                @if ($errors->has('portada'))
                                <div class="col-form-label">
                                    {{ $errors->first('portada') }}
                                </div>
                                @endif
                                <h6>Previsualización:</h6><img id="img-portada" src="/resources/img/default.jpg" style="width:300px;" alt="Previsualización" class="img-fluid">
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('bases') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="bases">
                                Bases
                            </label>
                            <div class="col-md-10">
                                <input type="file" class="form-control form-control-round {{ $errors->has('bases') ? ' form-control-danger' : '' }}" id="bases" name="bases" value="{{ old('bases') }}" accept=".pdf">
                                @if ($errors->has('bases'))
                                <div class="col-form-label">
                                    {{ $errors->first('bases') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('fecha' ? 'has-danger' : '')}} row">
                            <label for="fecha" class="col-md-2 col-form-label">
                                Fecha del torneo
                            </label>
                            <div class="col-md-4">
                                <input type="date" class="form-control form-control-round {{$errors->has('fecha') ? 'form-control-danger' : ''}}" id="fecha" name="fecha" value="{{old('fecha')}}">
                            </div>
                            @if ($errors->has('fecha'))
                            <label class="col-form-label">
                                {{$errors->first('fecha')}}
                            </label>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('precio') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="precio">
                                Precio
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('precio') ? ' form-control-danger' : '' }}" id="precio" name="precio" value="{{ old('precio') }}">
                                @if ($errors->has('precio'))
                                <div class="col-form-label">
                                    {{ $errors->first('precio') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('lugar') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="lugar">
                                Lugar
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('lugar') ? ' form-control-danger' : '' }}" id="lugar" name="lugar" value="{{ old('lugar') }}">
                                @if ($errors->has('lugar'))
                                <div class="col-form-label">
                                    {{ $errors->first('lugar') }}
                                </div>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row {{ $errors->has('kumite') || $errors->has('kata') ? 'has-danger' : ''}}">
                            <label class="col-md-2 col-form-label" for="modalidad">
                                Modalidad
                            </label>
                            <div class="col-md-10">
                                <div class="form-check form-check-inline {{ $errors->has('kata') ? 'form-control-danger' : ''}}">
                                    <input class="form-check-input {{ $errors->has('kata') ? 'is-invalid' : ''}}" type="checkbox" id="kata" value="1" name="kata">
                                    <label class="form-check-label" for="kata">Kata</label>
                                </div>
                                 <div class="form-check form-check-inline {{ $errors->has('kumite') ? 'form-control-danger' : ''}}">
                                    <input class="form-check-input {{ $errors->has('kumite') ? 'is-invalid' : ''}}" type="checkbox" id="kumite" value="1" name= "kumite">
                                    <label class="form-check-label" for="kumite">Kumite</label>
                                </div>
                                @if ($errors->has('kumite') || $errors->has('kata'))
                                <div class="col-form-label">
                                    {{ $errors->first('kumite') }}
                                    {{ $errors->first('kata') }}
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
    document.getElementById('portada').addEventListener('change', archivoFile, false);
    document.getElementById('foto').addEventListener('change', archivoFile, false);

    var editor = textboxio.replace('#descripcion');
</script>
@endsection
