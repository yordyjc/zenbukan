@extends('admin.layouts.app')

@section('title')
    Lista de galerias
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>@yield('title')</h5>
                    <div class="card-header-right">
                        <a href="{{url('admin/galeria-videos/create')}}" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm"><i class="icofont icofont-ui-add" style="color:#4680ff;"></i> Agregar galeria</a>
                    </div>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table id="fitnessTable" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Foto</th>
                                    <th>Numero de videos</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Funcional</td>
                                    <td>fotito</td>
                                    <td>5</td>
                                    <td class="text-center">
                                        <span class="label label-success" data-toggle="tooltip" data-placement="left" data-original-title="Categoria de videos activa">Activo</span>
                                    </td>
                                    <td class="text-center">
                                        @if(Auth::user()->id==1||Auth::user()->id==2)
                                            <a href="#">
                                                <i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue" data-toggle="tooltip" data-placement="left" data-original-title="Editar"></i>
                                            </a>
                                            @if(Auth::user()->activo==1||Auth::user()->id!=2)
                                                <a href="#" onclick="eliminarModal()" data-toggle="modal" data-target="#eliminarModal">
                                                    <i class="feather icon-trash-2 f-w-600 f-16 text-c-red" data-toggle="tooltip" data-placement="left" data-original-title="Desabilitar galeria"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
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

        function modaleliminar(id)
        {
            var formModal=$("#form-modal");
            var url=location.origin;
            var path=location.pathname
            formModal.attr('action',url+path+'/'+id);
        }
    </script>
@endsection