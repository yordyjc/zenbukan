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

                <form id="form-submit" action="{{ url('/admin/inscripciones') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="torneo" value="{{$torneo->id}}">
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
                        @if(Auth::user()->tipo ==1)
                            <div class="form-group {{ $errors->has('club') ? ' has-danger' : '' }} row">
                                <label class="col-md-2 col-form-label" for="club">
                                    Club
                                </label>
                                <div class="col-md-10">
                                    {!! Form::select('club',$clubes,old('club'),["class"=>"sector form-control form-control-round fill select2 ",'placeholder' => '-- Clubes --',"required"=>"","id"=>"club"]) !!}
                                    @if ($errors->has('club'))
                                        <div class="col-form-label">
                                            {{ $errors->first('club') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif


                        <div class="form-group {{ $errors->has('grado') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="grado">
                                Grado
                            </label>
                            <div class="col-md-10">
                                <select name="grado" id="grado" class="sector form-control form-control-round fill select2">
                                    <option value=NULL selected>--Seleccione--</option>
                                    <option value="9">9º Kyu</option>
                                    <option value="8">8º Kyu</option>
                                    <option value="7">7º Kyu</option>
                                    <option value="6">6º Kyu</option>
                                    <option value="5">5º Kyu</option>
                                    <option value="4">4º Kyu</option>
                                    <option value="3">3º Kyu</option>
                                    <option value="2">2º Kyu</option>
                                    <option value="1">1º Kyu</option>
                                </select>
                                @if ($errors->has('club'))
                                    <div class="col-form-label">
                                        {{ $errors->first('club') }}
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
                                    <div id="kata"></div>
                                    <label class="form-check-label" for="kata"><div id="modalidad_kata"></div>
                                    </label>
                                </div>
                                 <div class="form-check form-check-inline {{ $errors->has('kumite') ? 'form-control-danger' : ''}}">
                                    <input class="form-check-input {{ $errors->has('kumite') ? 'is-invalid' : ''}}" type="checkbox" id="kumite" value="1" name= "kumite">
                                    <div id="kumite"></div>
                                    <label class="form-check-label" for="kumite"><div id="modalidad_kumite"></div>
                                    </label>
                                </div>
                                @if ($errors->has('kumite') || $errors->has('kata'))
                                <div class="col-form-label">
                                    {{ $errors->first('kumite') }}
                                    {{ $errors->first('kata') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="cabeza_serie">
                                Cabeza de serie
                            </label>
                            <div class="col-md-10 form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="cabeza_serie" id="cabeza_serie" value="1" >
                                    <i class="helper"></i>Si
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                    <input type="radio" name="cabeza_serie" id="cabeza_serie" value="0" checked="checked">
                                    <i class="helper"></i>No
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
<script>
    function obtenerCategoria()
    {
        var route = URLs+'/admin/inscripciones/categoria';
        var method = 'POST';
        var frmData= $("#form-submit").serialize();
        sendRequest(route, frmData, method, function(data, textStatus){
            if(data.status==200)
            {
                data=data.responseJSON;
                $("#modalidad_kata").html(data.kata);
                $("#modalidad_kumite").html(data.kumite);


            }
            else
            {
                alert('hasta el tux csm');
            }
        });

    }
    $('#grado').change(function(){
        obtenerCategoria();
    });

</script>
@endsection
