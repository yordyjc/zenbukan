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

                <form id="form-submit" action="{{ url('/admin/inscripciones/store-inscripcion') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="torneo" value="{{$torneo->id}}">
                    <input type="hidden" name="modalidad" id="modalidad">
                    <div class="col-md-10 offset-sm-1">
                        <div class="form-group {{ $errors->has('dni') ? ' has-danger' : '' }} row">
                            <label class="col-md-2 col-form-label" for="newDni">
                                DNI
                            </label>
                            <div class="col-md-4">
                                {!!Form::select('dniComp',$dniComp, old('dniComp'), ["class"=>"form-control input-sm form-control-round fill select2", 'placeholder'=>'--Seleccione dni--',"id"=>"dniComp"])!!}
                                @if ($errors->has('dniComp'))
                                <div class="col-form-label">
                                    {{ $errors->first('dniComp') }}
                                </div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm" data-toggle="modal" data-target="#nuevocompModal">
                                    <i class="icofont icofont-ui-add" style="color:#4680ff;"></i> Nuevo
                                </a>
                            </div>
                            <label class="col-md-4 col-form-label">
                                <div id="nomComp"></div>
                            </label>
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
                                    <option value="" selected>--Seleccione--</option>
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
                                @if ($errors->has('grado'))
                                    <div class="col-form-label">
                                        {{ $errors->first('grado') }}
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
                <div class="modal fade" id="nuevocompModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title">
                                    <h5>Nuevo competidor</h5>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="form-modal" onsubmit="return false;" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="Dni" class="col-md-3 col-form-label">DNI</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-round" id="Dni" name="Dni">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nombres" class="col-md-3 col-form-label">Nombres</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-round {{$errors->has('nombres') ? 'form-control-danger' : ''}}" id="nombres" name="nombres" value="{{old('nombres')}}">
                                            @if ($errors->has('nombres'))
                                            <div class="col-form-label">
                                                {{ $errors->first('nombres') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="apellidos" class="col-md-3 col-form-label">Apellidos</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-round {{$errors->has('apellidos') ? 'form-control-danger' : ''}}" id="apellidos" name="apellidos" value="{{old('apellidos')}}">
                                            @if ($errors->has('apellidos'))
                                            <div class="col-form-label">
                                                {{ $errors->first('apellidos') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="sexo">
                                            Sexo
                                        </label>
                                        <div class="col-md-9 form-radio">
                                            <div class="radio radio-inline">
                                                <label>
                                                <input type="radio" name="sexo" id="sexo" value="1" >
                                                <i class="helper"></i>Masculino
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label>
                                                <input type="radio" name="sexo" id="sexo" value="0" checked="checked">
                                                <i class="helper"></i>Femenino
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('nacimiento') ? ' has-danger' : '' }} row">
                                        <label class="col-md-3 col-form-label" for="nacimiento">
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
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-round {{ $errors->has('edad') ? ' form-control-danger' : '' }}" id="edad" name="edad" value="{{ old('edad') }}">
                                            @if ($errors->has('edad'))
                                            <div class="col-form-label">
                                                {{ $errors->first('edad') }}
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
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary btn-round" id=button-submit>
                                    <i class="icofont icofont-circled-left"></i> Aceptar
                                </button>
                                <button class="btn btn-danger btn-round" data-dismiss="modal">
                                    <i class="icofont icofont-ui-delete"></i> Cancelar
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    function getNombre()
    {
        var id =$('#dniComp').val();
        var route = URLs+'/admin/inscripciones/getNombre/'+id;
        var method = 'GET';
        sendRequest(route, null, method, function(data, textStatus){
            if(data.status==200)
            {
                data=data.responseJSON;
                $("#nomComp").html(data[0].nombres + ' '+ data[0].apellidos);
            }
            else
            {

            }
        });

    }

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
                $("#modalidad").val(data.id);


            }
            else
            {

            }
        });

    }
    $('#form-modal').submit(function(e){
        var route = URLs+'/admin/inscripciones/store-competidor';
        var method = 'POST';
        //var frmData= $("#form-modal").serialize();
        var frmData= new FormData($('#form-modal')[0]);
        $.ajax({
            type: "POST",
            url: URLs+'/admin/inscripciones/store-competidor',
            cache:false,
            data: frmData,
            contentType: false,
            processData: false,
            success: function(data){
                    data=data.responseJSON;
                    $('#nuevocompModal').modal('hide');
                    location.reload();
            },
            error:function(data)
            {
                if(data.status==422)
                {
                    var errors=data.responseJSON;
                    $.each(errors, function(index, val) {
                        printError(index,val[0]);
                    });
                }
                else
                {
                    swal({
                            title: "Error al realizar la operación",
                            type:  "error",
                            button: "Cerrar",
                            timer: "3000",
                            backdrop: "rgba(242, 116, 116, 0.45)"
                        });
                }
            }
        });

    });
    document.getElementById('foto').addEventListener('change', archivoFile, false);
    $('#grado').change(function(){
        obtenerCategoria();
    });
    $('#dniComp').change(function(){
        getNombre();
    });

</script>
@endsection
