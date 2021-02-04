@extends('admin.layouts.app')

@section('title')
Agregar Club
@endsection

@section('clubes')
active pcoded-trigger
@endsection

@section('nuevo-club')
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

                <form action="{{ url('/admin/clubes') }}" method="post" enctype="multipart/form-data">
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

                        <div class="form-group {{ $errors->has('sector') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="sector">
                                País
                            </label>
                            <div class="col-md-10">
                                {!! Form::select('pais',$pais,old('pais'),["class"=>"sector form-control form-control-round fill select2 ",'placeholder' => '-- Paises --',"required"=>"","id"=>"pais"]) !!}
                                @if ($errors->has('pais'))
                                    <div class="col-form-label">
                                        {{ $errors->first('pais') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="nombre">
                                Dirección
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('direccion') ? ' form-control-danger' : '' }}" id="direccion" name="direccion" value="{{ old('direccion') }}">
                                @if ($errors->has('direccion'))
                                <div class="col-form-label">
                                    {{ $errors->first('direccion') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="nombre">
                                Foto
                            </label>
                            <div class="col-md-10">
                                <input type="file" class="form-control form-control-round {{ $errors->has('foto') ? ' form-control-danger' : '' }}" id="foto" name="foto" value="{{ old('foto') }}" accept=".png, .jpg, .jpeg">
                                @if ($errors->has('foto'))
                                <div class="col-form-label">
                                    {{ $errors->first('foto') }}
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

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="/resources/lib/textboxio/textboxio.js"></script>
<script type="text/javascript">
    var editor = textboxio.replace('#observaciones');
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

    var editor = textboxio.replace('#descripcion');
</script>
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
