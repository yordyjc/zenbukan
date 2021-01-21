@extends('admin.layouts.app')

@section('title')
Editar usuario: {{ $user->nombres }} {{ $user->apellidos }}
@endsection

@section('administradores')
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

                <form action="{{ url('/admin/lista-administrador/'.$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-sm-10 offset-sm-1">

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="estado">
                                Estado
                            </label>
                            <div class="col-md-10 form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="suspendido" id="suspendido" value="1" {{ $user->activo == '1' ? 'checked="checked"' : '' }}>
                                    <i class="helper"></i>Administrador con permisos
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="suspendido" id="suspendido" value="0" {{ $user->activo == '0' ? 'checked="checked"' : '' }}>
                                    <i class="helper"></i>Administrador suspendido
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('nombres') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="nombres">
                                Nombres
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('nombres') ? ' form-control-danger' : '' }}" id="nombres" name="nombres" value="{{ $user->nombres }}">
                                @if ($errors->has('nombres'))
                                <div class="col-form-label">
                                    {{ $errors->first('nombres') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('apellidos') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="apellidos">
                                Apellidos
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('apellidos') ? ' form-control-danger' : '' }}" id="apellidos" name="apellidos" value="{{ $user->apellidos }}">
                                @if ($errors->has('apellidos'))
                                <div class="col-form-label">
                                    {{ $errors->first('apellidos') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telefono') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="telefono">
                                Fono / Cel
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-round {{ $errors->has('telefono') ? ' form-control-danger' : '' }}" id="telefono" name="telefono" value="{{ $user->telefono }}">
                                @if ($errors->has('telefono'))
                                <div class="col-form-label">
                                    {{ $errors->first('telefono') }}
                                </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="email">
                                E-mail
                            </label>
                            <div class="col-md-10">
                                <input type="email" class="form-control form-control-round {{ $errors->has('email') ? ' form-control-danger' : '' }}" value="{{ $user->email }}" id="email" name="email" required>
                                @if ($errors->has('email'))
                                <div class="col-form-label">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-10 offset-sm-1">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary btn-round btn-block m-b-0">
                                    <i class="icofont icofont-save"></i> Actualizar
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
