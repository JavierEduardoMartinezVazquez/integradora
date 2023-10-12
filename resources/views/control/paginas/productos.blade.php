@extends('plantilla')
@section('titulo')
    Productos
@endsection
    @section('additionals_css')
@endsection
@section('content')
    <div class="content-wrapper"> 
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!--<div class="col-sm-6">
                        <h1>Boxed Layout</h1>
                    </div>-->
                    <div class="col-sm-6">
                        <!--<ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Boxed Layout</li>
                        </ol>-->
                    </div>
                </div>
            </div>
        </section> 

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h4>Control de Productos</h4>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-success" onclick="alta()">Agregar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tablelist" class=" tablelist table table-bordered table-striped display nowrap">
                                <thead>
                                    <tr>
                                        <th ><div style="width:90px !important;">Operación </div></th>
                                        <th>Id</th>
                                        <th>Paquete</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Existencias</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('control.modal.modal_alta')
    @include('control.modal.modal_baja')
@endsection
@section('additionals_js')
    <script>
    //detectar cuando en el input de buscar por codigo de producto el usuario presione la tecla enter, si es asi se realizara la busqueda con el codigo escrito
        $(document).ready(function(){
        $("#hor").addClass('active');
        });
    </script>
    <script>
        var obtener_ultimo_id_productos = '{!!URL::to('obtener_ultimo_id_productos')!!}';
        var guardar_productos = '{!!URL::to('guardar_productos')!!}';
        var listar_productos = '{!!URL::to('listar_productos')!!}';
        var obtener_productos = '{!!URL::to('obtener_productos')!!}';
        var modificar_productos = '{!!URL::to('modificar_productos')!!}';
        var verificar_baja_productos = '{!!URL::to('verificar_baja_productos')!!}';
        var baja_productos = '{!!URL::to('baja_productos')!!}';     
    </script> 
    <script src="scripts/productos.js"></script>
@endsection    