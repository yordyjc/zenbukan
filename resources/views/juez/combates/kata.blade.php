<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('juez.includes.css')
    @include('juez.includes.data')
    <title>Combates | Zenbukan</title>
</head>
<body style="background:#fff">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header col-md-12">
                        <h3 class="text-center">Calificaciones</h3>

                    </div>
                    <div class="card-block offset-md-1">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="btn btn-outline-primary btn-block">Milthon Choquehuanca</div>
                                <br>
                                <form action="#" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group {{ $errors->has('atletico') ? ' has-danger' : '' }} row">

                                        <label class="col-md-4 col-form-label" for="atletico">
                                            Nivel atletico
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('tecnico1') ? ' form-control-danger' : '' }}" id="tecnico" name="tecnico" value="{{ old('tecnico') }}">
                                            @if ($errors->has('tecnico1'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico1') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('tecnico2') ? ' form-control-danger' : '' }}" id="tecnico" name="tecnico" value="{{ old('tecnico') }}">
                                            @if ($errors->has('tecnico2'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico2') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('tecnico') ? ' has-danger' : '' }} row">

                                        <label class="col-md-4 col-form-label" for="tecnico">
                                            Nivel atletico
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('tecnico1') ? ' form-control-danger' : '' }}" id="tecnico" name="tecnico" value="{{ old('tecnico') }}">
                                            @if ($errors->has('tecnico1'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico1') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('tecnico2') ? ' form-control-danger' : '' }}" id="tecnico" name="tecnico" value="{{ old('tecnico') }}">
                                            @if ($errors->has('tecnico2'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico2') }}
                                            </div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-sm-10 offset-sm-1">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary btn-round btn-block m-b-0">
                                                    <i class="icofont icofont-save"></i> Calificar
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
                            <div class="col-md-2">
                                <div class="text-center">VS</div>
                            </div>
                            <div class="col-md-5">
                                <div class="btn btn-outline-danger btn-block">Javier Giramay</div>
                                <br>
                                <form action="#" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group {{ $errors->has('atletico') ? ' has-danger' : '' }} row">

                                        <label class="col-md-4 col-form-label" for="atletico">
                                            Nivel atletico
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('tecnico1') ? ' form-control-danger' : '' }}" id="tecnico" name="tecnico" value="{{ old('tecnico') }}">
                                            @if ($errors->has('tecnico1'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico1') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('tecnico2') ? ' form-control-danger' : '' }}" id="tecnico" name="tecnico" value="{{ old('tecnico') }}">
                                            @if ($errors->has('tecnico2'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico2') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('tecnico') ? ' has-danger' : '' }} row">

                                        <label class="col-md-4 col-form-label" for="tecnico">
                                            Nivel atletico
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('tecnico1') ? ' form-control-danger' : '' }}" id="tecnico" name="tecnico" value="{{ old('tecnico') }}">
                                            @if ($errors->has('tecnico1'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico1') }}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('tecnico2') ? ' form-control-danger' : '' }}" id="tecnico" name="tecnico" value="{{ old('tecnico') }}">
                                            @if ($errors->has('tecnico2'))
                                            <div class="col-form-label">
                                                {{ $errors->first('tecnico2') }}
                                            </div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-sm-10 offset-sm-1">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary btn-round btn-block m-b-0">
                                                    <i class="icofont icofont-save"></i> Calificar
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
            </div>
        </div>
    </div>
    @include('juez.includes.js')
</body>
</html>
