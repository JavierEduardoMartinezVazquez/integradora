@extends('plantilla')
@section('titulo')
    Compras
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
                                <div class="col-sm-7">
                                    <h4><i class="nav-icon fas fa-shopping-cart"></i>  Carrito de compras</h4>
                                </div>
                                <div class="col-md-2">
                                    <h5>Total del carrito:</h5>
                                    <div class="col-4">
                                        <div class="card">$     .00</div>
                                    </div>
                                </div> 
                                <div class="col-md-1">
                                    <a href="{{ route('home') }}" class="btn btn-secondary">Volver a tienda</a>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('VaciarCarrito') }}" class="btn btn-danger">Vaciar Carrito</a>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ url('recibo_pdf') }}" class="btn btn-success">Finalizar compra</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tablelist" class=" tablelist table table-bordered table-striped display nowrap">
                                <thead>
                                    <tr>
                                        <th><div style="width:90px !important;">Operación </div></th>
                                        <th>Id</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
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
    {{-- <script>
    //detectar cuando en el input de buscar por codigo de producto el usuario presione la tecla enter, si es asi se realizara la busqueda con el codigo escrito
        $(document).ready(function(){
        $("#hor").addClass('active');
        });
    </script> --}}
    <script>
        var obtener_ultimo_id_compras = '{!!URL::to('obtener_ultimo_id_compras')!!}';
        var guardar_compras = '{!!URL::to('guardar_compras')!!}';
        var listar_compras = '{!!URL::to('listar_compras')!!}';
        var obtener_compras = '{!!URL::to('obtener_compras')!!}';
        var modificar_compras = '{!!URL::to('modificar_compras')!!}';
        var verificar_baja_compras = '{!!URL::to('verificar_baja_compras')!!}';
        var baja_compras = '{!!URL::to('baja_compras')!!}';     
    </script> 
    <script src="scripts/compras.js"></script>
@endsection    