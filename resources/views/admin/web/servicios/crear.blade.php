@extends('admin.layouts.app')

@section('title')
Agregar servicio
@endsection

@section('servicios')
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

                <form action="{{ url('/admin/servicios') }}" method="post" enctype="multipart/form-data">
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
    document.getElementById('foto').addEventListener('change', archivoFile, false);

    var editor = textboxio.replace('#descripcion');
</script>
@endsection
