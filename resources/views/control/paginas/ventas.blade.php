@extends('plantilla')
@section('titulo')
    Ventas
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
                                    <h4>Control de Ventas</h4>
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
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th>Metodo de pago</th>
                                        <th>Usuario</th>
                                        <th>Tel.</th>
                                        <th>Direccion</th>
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
        var obtener_ultimo_id_ventas = '{!!URL::to('obtener_ultimo_id_ventas')!!}';
        var guardar_ventas = '{!!URL::to('guardar_ventas')!!}';
        var listar_ventas = '{!!URL::to('listar_ventas')!!}';
        var obtener_ventas = '{!!URL::to('obtener_ventas')!!}';
        var modificar_ventas = '{!!URL::to('modificar_ventas')!!}';
        var verificar_baja_ventas = '{!!URL::to('verificar_baja_ventas')!!}';
        var baja_ventas = '{!!URL::to('baja_ventas')!!}';     
    </script> 
    <script src="scripts/ventas.js"></script>
@endsection    