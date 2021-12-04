@extends('admin.layouts.app')

@section('title')
Agregar Modalidades a Torneo
@endsection

@section('torneos')
active pcoded-trigger
@endsection

@section('lista-torneos')
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

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3><strong>Torneo:</strong> {{ $torneo->nombre }}</h3>
                        </div>
                        <div class="col-sm-3">
                            <h3>Identificador: {{ $torneo->id }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 alert bg-warning text-dark">
                            En la columna "torneo_id" debe colocar {{ $torneo->id }}.<br>
                            En la columna "sexo" considere 1 para varones y 0 para mujeres.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            <a href="{{ url('/formato-modalidades.xlsx') }}" class="btn btn-success btn-block" download>Descargar formato en Excel</a>
                        </div>
                    </div>

                </div>
                <br><hr><br>
                <form action="{{ url('/admin/agregar-modalidades') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="torneo" value="{{ $torneo->id }}">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="form-group {{ $errors->has('foto') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="file">
                                Archivo
                            </label>
                            <div class="col-md-10">
                                <input type="file" id="file" class="form-control form-control-round {{ $errors->has('file') ? ' form-control-danger' : '' }}" name="file"  accept=".xlsx" required>
                                @if ($errors->has('file'))
                                <div class="col-form-label">
                                    {{ $errors->first('file') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 offset-sm-1">
                        <div class="form-group row">
                            <div class="col-sm-6 offset-sm-3">
                                <button type="submit" class="btn btn-primary btn-round btn-block m-b-0">
                                    <i class="icofont icofont-save"></i> Subir
                                </button>
                            </div>
                        </div>
                    </div><!-- /.col-sm-10 offset-sm-1 -->

                </form>

                @if (count($modalidades)>0)
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h4>Modalidades actuales</h4>
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped table-hover table-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Edad mínima</td>
                                        <td>Edad máxima</td>
                                        <td>Grado mínimo</td>
                                        <td>Grado máximo</td>
                                        <td>Sexo</td>
                                        <td>Kata</td>
                                        <td>Kumite</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modalidades as $modalidad)
                                        <tr>
                                            <td>{{ $modalidad->nombre }}</td>
                                            <td>{{ $modalidad->edad_min }}</td>
                                            <td>{{ $modalidad->edad_max }}</td>
                                            <td>{{ $modalidad->grado_min }}</td>
                                            <td>{{ $modalidad->grado_max }}</td>
                                            <td>{{ $modalidad->sexo == 1 ? 'M' : 'F' }}</td>
                                            <td>{{ $modalidad->kata }}</td>
                                            <td>{{ $modalidad->kumite }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
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
