@extends('plantilla')
@section('titulo')
    Vacaciones
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
                                    <h4>Vacaciones</h4>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-danger" onclick="alta()">Agregar</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tablelist" class=" tablelist table table-bordered table-striped display nowrap">
                                <thead>
                                    <tr>
                                        <th ><div style="width:90px !important;">Operación </div></th>
                                        <th>#</th>
                                        <th>Nombre Empleado</th>
                                        <th>A.Paterno</th>
                                        <th>A.Materno</th>
                                        <th>F. Solicitud</th>
                                        <th>Sucursal</th>
                                        <th>Area</th>
                                        <th>F. Ingreso</th>
                                        <th>Inicio</th>
                                        <th>Final</th>
                                        <th>Total de días</th>
                                        <th>Ininio de labores</th>
                                        <th>Días disponibles</th>
                                        <th>Pago de nomina</th>
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
        var obtener_ultimo_id_holidays = '{!!URL::to('obtener_ultimo_id_holidays')!!}';
        var guardar_holidays = '{!!URL::to('guardar_holidays')!!}';
        var listar_holidays = '{!!URL::to('listar_holidays')!!}';
        var obtener_holidays = '{!!URL::to('obtener_holidays')!!}';
        var modificar_holidays = '{!!URL::to('modificar_holidays')!!}';
        var verificar_baja_holidays = '{!!URL::to('verificar_baja_holidays')!!}';
        var baja_holidays = '{!!URL::to('baja_holidays')!!}';     
    </script> 
    <script src="scripts/holidays.js"></script>
@endsection    