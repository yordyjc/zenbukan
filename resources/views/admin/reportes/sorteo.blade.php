@extends('admin.layouts.app')

@section('title')
Sorteo por categorias
@endsection

@section('reportes')
active pcoded-trigger
@endsection

@section('reporte-fechas')
active
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
@php
use Carbon\Carbon;
setlocale(LC_TIME, 'es_ES.UTF-8');
Carbon::setLocale('es');

function concatenar($numero){
    $n=strlen($numero);
    if ($n==1) {
        $a='0000'.$numero;
    }
    else if ($n==2) {
        $a='000'.$numero;
    }
    else if ($n==3) {
        $a='00'.$numero;
    }
    else if ($n==4) {
        $a='0'.$numero;
    }
    else{
        $a=$numero;
    }
    return $a;
}
@endphp

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>@yield('title')</h5>
            </div>
            <div class="card-block">

                <div class="col-sm-10 offset-sm-1">
                    <form action="{{ url('/admin/sorteo') }}" method="post" class="form-inline" id="form-sorteo" onsubmit="return false;">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mb-2 {{ $errors->has('torneos') ? ' has-danger' : '' }}">
                                    <label for="torneos" class="col-form-label">Torneos </label>
                                    {!! Form::select('nombre',$torneos,old('torneos'),["class"=>"sector form-control input-sm form-control-round fill select2 ",'placeholder' => '-- Torneos --',"required"=>"","id"=>"torneos"]) !!}
                                    @if ($errors->has('torneos'))
                                        <div class="col-form-label">
                                            {{ $errors->first('torneos') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group mb-2 {{ $errors->has('categorias') ? ' has-danger' : '' }}">
                                    <label for="desde" class="col-form-label">Categorias </label>
                                    {!! Form::select('categoria',$categorias,old('categorias'),["class"=>"sector form-control input-sm form-control-round fill select2 ",'placeholder' => '-- Categorias --',"required"=>"","id"=>"categorias"]) !!}
                                    @if ($errors->has('categorias'))
                                        <div class="col-form-label">
                                            {{ $errors->first('categorias') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group" style="margin-top: 36px;">
                                    <button type="submit" id="button-submit" class="btn btn-primary btn-sm">
                                        Generar
                                    </button>
                                    <a href="#" class="descarga btn btn-success btn-sm ml-2">Descargar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <br />
                <div class="alert alert-info background-info text-center">
                    <h5 id="titulo">Sorteo</h5>
                </div>
                <!-- <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody id="sorteo">
                        </tbody>
                    </table>
                </div> -->
                <div class="col-md-4">
                    <div id="contenido">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    $( ".select2" ).select2({
        theme: "bootstrap4"
    });
</script>
<script type="text/javascript">
    // $(document).ready( function () {
    //     var formData=$("#form-reporte").serialize();
    //     var excel=URLs+'/admin/reporte-fechas-excel?'+formData;
    //     $(".descarga").attr('href', excel);
    // });
</script>
<script>
    $(document).ready( function () {
        $('#fitnessTable').DataTable({
            "paging":    false,
            "info":      false,
            "searching": false,
            "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
            "language": {
                "lengthMenu": "Mostrar  _MENU_  registros por página",
                "zeroRecords": "Ningún registro encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "Sin registros",
                "infoFiltered": "(búsqueda realizada en _MAX_  registros)",
                "search": "Buscar: ",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            },
            "order":[]
        });
    });
    function eliminarModal(id){
        var formModal=$("#form-modal");
        var url=location.origin;
        var path=location.pathname
        formModal.attr('action',url+path+'/'+id);
    }
</script>
<script>
    //Llenado del listado de categorias segun el torneo seleccionado
    $(document).ready(function(){
        $('#torneos').on('change',function(){
            var torneo_id = $(this).val();
            var route = URLs+'/admin/sorteo/'+torneo_id;
            if($.trim(torneo_id) != '')
            {
               //alert(route);
                $.get(route, function(data){
                    $('#categorias').empty();
                    var html_select = '<option value = "">-- Categorias--</option>';
                    for(var i=0; i<data.length; ++i)
                    {
                        html_select += '<option value ="'+ data[i].id +'">'+data[i].kumite+'</option>'
                    }
                    $('#categorias').html(html_select);
                });
            }
        });
    });
    //Calculo del sorteo
    $('#form-sorteo').submit(function(e){
        e.preventDefault();
        var route = $('#form-sorteo').attr('action');
        var method = $('#form-sorteo').attr('method');
        var frmData = $('#form-sorteo').serialize();
        var titulo = $('#torneos option:selected').text();
        $('#titulo').html(titulo);
        //alert('holi');
        $("#button-submit").attr('disabled', 'disabled');
        sendRequest(route,frmData,method, function(data, textStatus){
            $("#button-submit").removeAttr('disabled');
            $('#contenido').empty();
            if(data.status == 200)
            {
                $('#sorteo').empty();
                data=data.responseJSON;

                $.each(data, function(index, value){
                    //$('#sorteo').append('<tr> <td>'+index+'</td> <td>'+value['competidor']['nombres']+' '+value['competidor']['apellidos']+'</td> </tr>');
                    if(index%2 == 1)
                    {
                        $('#contenido').append('<div class="btn btn-outline-primary btn-block">'+index+'. '+value['competidor']['nombres']+' '+value['competidor']['apellidos']+'</div>');
                    }
                    else
                    {
                        $('#contenido').append('<div class="btn btn-outline-danger btn-block">'+index+'. '+value['competidor']['nombres']+' '+value['competidor']['apellidos']+'</div>'+'<br>');
                    }

                });
            }
        });
    });

</script>
@endsection
