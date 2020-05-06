@extends('admin.layouts.app')

@section('title')
    Lista de videos
@endsection
@php

Use App\Models\Video;
Use App\Models\Galeria;

@endphp

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>@yield('title')</h5>
                    <div class="card-header-right">
                        <a href="{{url('admin/galeria-videos/videos/subir')}}" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm"><i class="icofont icofont-ui-add" style="color:#4680ff;"></i> Agregar Video</a>
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Galeria</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($videos)
                                    @foreach($videos as $video)
                                        <tr>
                                            <td>{{$video->nombre}}</td>
                                            <td>{{$video->galeria->galeria}}</td>
                                            <td>{{$video->descripcion}}</td>
                                            <td class="text-center">
                                                @if(Auth::user()->id==1||Auth::user()->id==2)
                                                   
                                                    @if(Auth::user()->activo==1||Auth::user()->id!=2)
                                                        <a href="#" onclick="eliminarModal({{$video->id}})" data-toggle="modal" data-target="#eliminarModal">
                                                            <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="Desabilitar galeria"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
                                                    <p>Esta acción no podrá deshacerse. ¿Quieres continuar?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger btn-round">
                                                        <i class="icofont icofont-ui-delete"></i> Sí, eliminar
                                                    </button>
                                                    <button class="btn btn-outline-primary btn-round" data-dismiss="modal">
                                                        <i class="icofont icofont-circled-left"></i> Cancelar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#fitnessTable').DataTable({
                "padding": false,
                "info":false,
                            // "searching": false,
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

        function eliminarModal(id)
        {
            var formModal=$("#form-modal");
            var url=location.origin;
            var path=location.pathname
            formModal.attr('action',url+path+'/'+id);
        }
    </script>
@endsection