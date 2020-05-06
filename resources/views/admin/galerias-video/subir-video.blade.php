@extends('admin.layouts.app')

@section('title')
Agregar video
@endsection

@section('videos')
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

                <form action="{{ url('/admin/galeria-videos/videos/guardar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-10 offset-sm-1">
                        <div class="form-group {{ $errors->has('sector') ? ' has-danger' : '' }} row">
                                <label class="col-md-2 col-form-label" for="sector">
                                    Galería
                                </label>
                                <div class="col-md-10">
                                    {!! Form::select('galeria',$galerias,old('galeria'),["class"=>"galeria form-control form-control-round fill select2 ",'placeholder' => '-- Galerias --',"required"=>"","id"=>"galeria"]) !!}
                                    @if ($errors->has('galeria'))
                                        <div class="col-form-label">
                                            {{ $errors->first('galeria') }}
                                        </div>
                                    @endif
                                </div>
                        </div>
                        
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

                        <div class="form-group {{ $errors->has('url') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="url">
                                ID de YouTube
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('url') ? ' form-control-danger' : '' }}" id="url" name="url" value="{{ old('url') }}">
                                @if ($errors->has('url'))
                                <div class="col-form-label">
                                    {{ $errors->first('url') }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $( ".select2" ).select2({
            theme: "bootstrap4"
        });
    </script>
@endsection
