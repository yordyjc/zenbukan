@extends('admin.layouts.app')

@section('title')
Agregar jueces a Categoria {{$modalidad->kata}} {{$modalidad->kumite}}
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
                <h5><strong>@yield('title')</strong></h5>
            </div>
            <div class="card-block">

                <form action="{{url('admin/agregar-juez/')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="modalidad" value="{{ $modalidad->id }}">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="form-group row {{$errors->has('jueces') ? 'has-danger' : ''}}">
                            <label class="col-sm-1 col-form-label" for="jueces">
                                Juez
                            </label>
                            <div class="col-sm-4">
                                {!! Form::select('jueces',$jueces,old('jueces'),["class"=>"form-control input-sm form-control-round fill select2 ",'placeholder' => '-- Jueces --',"required"=>"","id"=>"jueces"]) !!}
                                @if ($errors->has('jueces'))
                                    <div class="col-form-label">
                                        {{ $errors->first('jueces') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" id="button-submit" class="btn btn-primary btn-sm">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </div>

                </form>

                        <div class="table-responsive">
                            <table id="juecesTable" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nombre</th>
                                        <th>Contacto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($modalidad->jueces->count() > 0 )
                                    @foreach($modalidad->jueces as $juez)
                                    <tr>
                                        <td>{{concatenar($juez->id)}}</td>
                                        <td>
                                            {{$juez->nombres}}
                                            <p>Registrado el {{ Carbon::parse($juez->created_at)->format('d/m/Y h:i a') }}</p>
                                        </td>
                                        <td>
                                            {{$juez->telefono}}
                                            <p>{{$juez->email}}</p>
                                        </td>
                                        <td>
                                            <a href="#" onclick="eliminarModal({{ $juez->id }})" data-toggle="modal" data-target="#eliminarModal">
                                                <i class="feather icon-trash-2 f-w-600 f-16 text-c-red"  data-toggle="tooltip" data-placement="left" data-original-title="¿Eliminar?"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">¡Alto!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST" id="form-modal">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>¿Desea eliminar el juez para esta categoria?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger btn-round">
                                                            <i class="icofont icofont-ui-delete"></i> Sí, eliminar juez
                                                        </button>
                                                        <button class="btn btn-outline-primary btn-round" data-dismiss="modal">
                                                            <i class="icofont icofont-circled-left"></i> Cancelar
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready( function () {
        $('#juecesTable').DataTable({
            // "paging":    false,
            //"info":      false,
            // "searching": false,
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
