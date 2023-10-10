@extends('plantilla')
@section('titulo')
   Reporte de Asistencias
@endsection
    @section('additionals_css')
@endsection
@section('content')

<style>
    .titulo{
    justify-content: center;
    text-align: center;
    font-size: 20px;
    color: rgb(255, 255, 255);
    }
</style>
    <!--comentario-->
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
                        <div class="card-header" style="background-color: #d5ffab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="titulo">Reporte de Asistencias</div>
                                </div>
                            </div>
                        </div>
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
                                <div class="col-sm-3">
                                    <input type="text" class="form-control divorinputmodxl inputnextdet" id="buscarcodigo" placeholder="ID del Empleado" autocomplete="off">
                                </div>
                                <div class="col-md-7">
                                </div>
                                <div class="col-md-2">
                                    <center>
                                    <a class="btn  btn-success waves-effect" href="{{route('export_excel')}}" target="_blank" style="width: 45%">
                                         Excel
                                    </a>
                                    <button type="submit" class="btn btn-secondary" onclick="lector()">Escaner</button>
                                    </center>
                                </div>
                            </div>
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
                                    <div class="card-body table-responsive">
                                        <table id="tablelist" class=" tablelist table table-bordered table-striped display nowrap">
                                            <thead>
                                                <tr>
                                                    <th><div style="width:90px !important;">Operación</div></th>
                                                    <th>Orden</th>
                                                    <th>Empleado</th>
                                                    <th>Empresa</th>
                                                    <th>Fecha</th>
                                                    <th>Entrada</th>
                                                    <th>Salida</th>
                                                    <th>Observaciones</th>
                                                    <th>Estatus</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- <div id="result_strip">
                Resultado:
                <ul class="thumbnails"></ul>
                <ul class="collector"></ul>
                <div id="code"></div>
            </div> --}}
    </div>
    @include('control.modal.modal_alta')
    @include('control.modal.modal_baja')
    @include('control.modal.modal_lector')
@endsection
@section('additionals_js')
    <script>
    //detectar cuando en el input de buscar por codigo de producto el usuario presione la tecla enter, si es asi se realizara la busqueda con el codigo escrito
        $(document).ready(function(){
        $("#bus").addClass('active');
        });
    </script>
    <script>
        var obtener_ultimo_id_assistances = '{!!URL::to('obtener_ultimo_id_assistances')!!}';
        var guardar_assistances = '{!!URL::to('guardar_assistances')!!}';
        var listar_assistances = '{!!URL::to('listar_assistances')!!}';
        var obtener_assistances = '{!!URL::to('obtener_assistances')!!}';
        var modificar_assistances = '{!!URL::to('modificar_assistances')!!}';
        var verificar_baja_assistances = '{!!URL::to('verificar_baja_assistances')!!}';
        var baja_assistances = '{!!URL::to('baja_assistances')!!}';
        var obtener_fecha_actual_datetimelocal = '{!!URL::to('obtener_fecha_actual_datetimelocal')!!}';
        var leercodigo = '{!!URL::to('leercodigo')!!}';
        //var obtener_users = '{!!URL::to('obtener_users')!!}';
    </script>
    <script src="scripts/assistances.js"></script>

    <section class="d-flex justify-content-center">
{{--         {{ $assistances->appends(request()->only('business', 'entry_date_from', 'entry_date_to'))->links() }} --}}
    </section>
@endsection
