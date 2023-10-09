'use strict'
    var tabla;
    var form;

    function init(){
        listarholidays();
     }

    function mostrarmodalformulario(movimiento, permitirmodificacion){
        $("#Form_Modal").modal('show');
        if(movimiento=='ALTA'){
            $('#btnGuardar').show();
            $('#btnGuardarModificacion').hide();
        }else if(movimiento == 'MODIFICACION'){
            if(permitirmodificacion == 1){
                $('#btnGuardar').hide();
                $('#btnGuardarModificacion').show();
            }else{
                $("#btnGuardar").hide();
                $("#btnGuardarModificacion").hide();
            }    
        }
    }
    //mostrar formulario en modal y ocultar tabla de seleccion
    function mostrarformulario(){
        $("#formulario").show();// $("#formulario") es el ID del DIV del formulario del modal <1> 
        $("#contenidomodaltablas").hide();
    }

    //mostrar tabla de seleccion y ocultar formulario en modal
    function ocultarformulario(){
        $("#formulario").hide();
        $("#contenidomodaltablas").show();
    }
    function obtenerultimoidholidays(){
        $.get(obtener_ultimo_id_holidays, function(numero){
          $("#txtnumero").val(numero);
        })  
    }
    //limpiar todos los inputs del formulario alta
    function limpiar(){
        $("#form_Modal_pricipal")[0].reset();   
        //Resetear las validaciones del formulario alta
        form = $("#form_Modal_pricipal");
        form.parsley().reset();
    }
    function ocultarmodalformulario(){
        $("#Form_Modal").modal('hide');
    }
    function limpiarmodales(){
        $("#tabsform").empty();
    }
    function alta(){
        $("#titulomodal").html('Alta Vacaciones');
        mostrarmodalformulario('ALTA');
        mostrarformulario();
        //formulario alta
        var tabs =
            '<div class="card-body">'+
                '<div class="tab-content">'+
                    '<div class="tab-pane active" id="datosgenerales">'+
                        '<div class="container">'+
                            '<div class="form-group row">'+
                                '<div class="col-md-1">'+
                                    '<label>Id:<b style="color:#F44336 !important;">*</b></label>'+                             
                                    '<input type="text" class="form-control" name="numero" id="txtnumero" required  readonly>'+ 
                                    '</div>'+ 
                                    '<div class="col-md-1">'+
                                    '</div>'+ 
                                    '<div class="col-md-3">'+ 
                                        '<label>Nombre<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="text" class="form-control" name="empleado" id="txtempleado" placeholder="Empleado" onkeyup="tipoLetra(this);" required>'+
                                        '</div>'+ 
                                    '<div class="col-md-3">'+ 
                                        '<label>A.Paterno<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="text" class="form-control" name="paterno" id="txtpaterno" placeholder="Paterno" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-3">'+ 
                                        '<label>A.Materno<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="text" class="form-control" name="materno" id="txtmaterno" placeholder="Materno" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-1">'+
                                '</div>'+ 
                                '<div class="col-md-3">'+ 
                                    '<label>F. Solicitud<b style="color:#F44336 !important;">*</b></label>'+ 
                                    '<input type="date" class="form-control" name="solicitud" id="txtsolicitud" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+ 
                                '<div class="col-md-8">'+ 
                                '<label>Sucursal<b style="color:#F44336 !important;">*</b></label>'+
                                '<select class="form-select" name="sucursal" id="txtsucursal" placeholder="Nombre de la sucursal" onkeyup="tipoLetra(this);" required>'+
                                '<option value="SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.">SOLUCIONES INTGEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.</option>'+
                                '<option value="SOCASA TOLUCA">SOCASA TOLUCA</option>'+
                                '<option value="SOCASA REFACCIONARIA">SOCASA REFACCIONARIA</option>'+
                                '<option value="UTP USADOS">UTP USADOS</option>'+
                                '<option value="UTP SEMINUEVOS">UTP SEMINUEVOS</option>'+
                                '</select>'+
                                '</div>'+ 
                                    '<div class="col-md-5">'+ 
                                        '<label>Area<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="text" class="form-control" name="area" id="txtarea" placeholder="Area" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    
                                '<div class="col-md-3">'+ 
                                    '<label>Inicio<b style="color:#F44336 !important;">*</b></label>'+ 
                                    '<input type="date" class="form-control" name="inicio" id="txtinicio" placeholder="Inicio" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+ 
                                '<div class="col-md-3">'+ 
                                '<label>Final<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="date" class="form-control" name="final" id="txtfinal" placeholder="Final" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+ 
                            '<div class="col-md-3">'+ 
                                        '<label>F. Ingreso<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="date" class="form-control" name="ingreso" id="txtingreso" placeholder="Ingreso" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                            '<div class="col-md-2">'+ 
                                '<label>Totalde días<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="number" class="form-control" name="totaldias" id="txttotaldias" required >'+
                            '</div>'+ 
                                '<div class="col-md-4">'+ 
                                '<label>Inicio de labores<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="date" class="form-control" name="inlabores" id="txtinlabores" placeholder="Inicio de labores" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+ 
                                '<div class="col-md-2">'+ 
                                '<label>Disponibles<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="number" class="form-control" name="disponibles" id="txtdisponibles" required >'+
                            '</div>'+
                                '<div class="col-md-3">'+ 
                                    '<label>Pago<b style="color:#F44336 !important;">*</b></label>'+ 
                                    '<select class="form-select" name="pago" id="txtempresa" placeholder="Pago" onkeyup="tipoLetra(this);" required>'+ 
                                  '<option value="SI">SI</option>'+
                                  '<option value="NO">NO</option>'+
                                '</select>'+

                            '</div>'+


                            '</div>'+
                        '</div>'+    
                    '</div>'+
                '</div>'+ 
            '</div>';
        $("#tabsform").html(tabs);//tabsform es el ID del DIV donde se muestra el formulario del archivo JS <2>
        obtenerultimoidholidays();
    }
    $("#btnGuardar").on('click', function (e) {
        e.preventDefault(); //       ID del formulario donde se muestra el modal
        var formData = new FormData($("#form_Modal_pricipal")[0]);
        var form = $("#form_Modal_pricipal");
        if (form.parsley().isValid()){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: guardar_holidays,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    toastr.success("Datos guardados correctamente", "Mensaje",{
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000"
                    });
                    var tabla = $('.tablelist').DataTable(); //classe tbreadyCustomer de la tabla donde se muestran los registros
                    tabla.ajax.reload();
                    limpiar();
                    ocultarmodalformulario();
                    limpiarmodales();
                },
                error:function(data){
                    if(data.status == 403){
                        toastr.error( "No tiene permisos para realizar esta acción, contacta al administrador del sistema", "Mensaje", {
                            "timeOut": "6000",
                            "progressBar": true,
                            "extendedTImeout": "6000"
                        });
                    }else{
                        toastr.error( "Aviso, estamos experimentando problemas, contacta al administrador del sistema", "Mensaje", {
                            "timeOut": "600",        
                            "progressBar": true,
                            "extendedTImeout": "6000"
                        });
                    }
                }
            })
        }else{
                form.parsley().validate();
        }
    });
    function listarholidays() {
        $("#tablelist").DataTable({
          "autoWidth": false,
          "sScrollX": "110%",
          "sScrollY": "350px",
          'language': {
              "url": "control/plugins/datatables/es_es.json",
        },
        ajax: listar_holidays,
        "createdRow": function( row, data){
            if( data.status ==  `BAJA`){ $(row).css('font-weight','bold').css('color','#dc3545');}
        },
        columns: [
            { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
            { data: 'id', name: 'id', orderable: true, searchable: true },
            { data: 'empleado', name: 'empleado', orderable: true, searchable: true },
            { data: 'paterno', name: 'paterno', orderable: true, searchable: true },
            { data: 'materno', name: 'materno', orderable: true, searchable: true },
            { data: 'solicitud', name: 'solicitud', orderable: true, searchable: true },
            { data: 'sucursal', name: 'sucursal', orderable: true, searchable: true },
            { data: 'area', name: 'area', orderable: true, searchable: true },
            { data: 'ingreso', name: 'ingreso', orderable: true, searchable: true },
            { data: 'inicio', name: 'inicio', orderable: true, searchable: true },
            { data: 'final', name: 'final', orderable: true, searchable: true },
            { data: 'totaldias', name: 'totaldias', orderable: true, searchable: true },
            { data: 'inlabores', name: 'inlabores', orderable: true, searchable: true },
            { data: 'disponibles', name: 'disponibles', orderable: true, searchable: true },
            { data: 'pago', name: 'pago', orderable: true, searchable: true },
            { data: 'status', name: 'status', orderable: true, searchable: true },
        ],
        "order": [[ 1, "asc" ]]
        })
    }
    function obtenerholidays(numero){
        $("#titulomodal").html('Modificación Vacaciones');
        $.get(obtener_holidays,{numero:numero },function(data){
            //se crea al formlario
            var tabs =
            '<div class="card-body">'+
                '<div class="tab-content">'+
                    '<div class="tab-pane active" id="datosgenerales">'+
                        '<div class="container">'+
                            '<div class="form-group row">'+
                                '<div class="col-md-1">'+
                                    '<label>Id:<b style="color:#F44336 !important;">*</b></label>'+                             
                                    '<input type="text" class="form-control" name="numero" id="txtnumero" required  readonly>'+ 
                                    '</div>'+ 
                                    '<div class="col-md-1">'+
                                    '</div>'+ 
                                    '<div class="col-md-3">'+ 
                                        '<label>Nombre<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="text" class="form-control" name="empleado" id="txtempleado" placeholder="Empleado" onkeyup="tipoLetra(this);" required>'+
                                        '</div>'+ 
                                    '<div class="col-md-3">'+ 
                                        '<label>A.Paterno<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="text" class="form-control" name="paterno" id="txtpaterno" placeholder="Paterno" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-3">'+ 
                                        '<label>A.Materno<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="text" class="form-control" name="materno" id="txtmaterno" placeholder="Materno" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-1">'+
                                '</div>'+ 
                                '<div class="col-md-3">'+ 
                                    '<label>F. Solicitud<b style="color:#F44336 !important;">*</b></label>'+ 
                                    '<input type="date" class="form-control" name="solicitud" id="txtsolicitud" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+ 
                                '<div class="col-md-8">'+ 
                                '<label>Sucursal<b style="color:#F44336 !important;">*</b></label>'+
                                '<select class="form-select" name="sucursal" id="txtsucursal" placeholder="Nombre de la sucursal" onkeyup="tipoLetra(this);" required>'+
                                '<option value="SOLUCIONES INTEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.">SOLUCIONES INTGEGRALES PARA TU CAMIÓN SOCASA S.A. DE C.V.</option>'+
                                '<option value="SOCASA TOLUCA">SOCASA TOLUCA</option>'+
                                '<option value="SOCASA REFACCIONARIA">SOCASA REFACCIONARIA</option>'+
                                '<option value="UTP USADOS">UTP USADOS</option>'+
                                '<option value="UTP SEMINUEVOS">UTP SEMINUEVOS</option>'+
                                '</select>'+
                                '</div>'+ 
                                    '<div class="col-md-5">'+ 
                                        '<label>Area<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="text" class="form-control" name="area" id="txtarea" placeholder="Area" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    
                                '<div class="col-md-3">'+ 
                                    '<label>Inicio<b style="color:#F44336 !important;">*</b></label>'+ 
                                    '<input type="date" class="form-control" name="inicio" id="txtinicio" placeholder="Inicio" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+ 
                                '<div class="col-md-3">'+ 
                                '<label>Final<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="date" class="form-control" name="final" id="txtfinal" placeholder="Final" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+ 
                            '<div class="col-md-3">'+ 
                                        '<label>F. Ingreso<b style="color:#F44336 !important;">*</b></label>'+ 
                                        '<input type="date" class="form-control" name="ingreso" id="txtingreso" placeholder="Ingreso" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                            '<div class="col-md-2">'+ 
                                '<label>Totalde días<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="number" class="form-control" name="totaldias" id="txttotaldias" required >'+
                            '</div>'+ 
                                '<div class="col-md-4">'+ 
                                '<label>Inicio de labores<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="date" class="form-control" name="inlabores" id="txtinlabores" placeholder="Inicio de labores" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+ 
                                '<div class="col-md-2">'+ 
                                '<label>Disponibles<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="number" class="form-control" name="disponibles" id="txtdisponibles" required >'+
                            '</div>'+
                                '<div class="col-md-3">'+ 
                                    '<label>Pago<b style="color:#F44336 !important;">*</b></label>'+ 
                                    '<select class="form-select" name="pago" id="txtempresa" placeholder="Pago" onkeyup="tipoLetra(this);" required>'+ 
                                  '<option value="SI">SI</option>'+
                                  '<option value="NO">NO</option>'+
                                '</select>'+

                            '</div>'+


                            '</div>'+
                        '</div>'+    
                    '</div>'+
                '</div>'+ 
            '</div>';
            $("#tabsform").html(tabs);
            console.log(data);//mandas el arreglo
            $("#txtnumero").val(data.holidays.id);
            $("#txtempleado").val(data.holidays.empleado);
            $("#txtpaterno").val(data.holidays.paterno);
            $("#txtmaterno").val(data.holidays.materno);
            $("#txtsolicitud").val(data.holidays.solicitud);
            $("#txtsucursal").val(data.holidays.sucursal);
            $("#txtarea").val(data.holidays.area);
            $("#txtingreso").val(data.holidays.ingreso);
            $("#txtinicio").val(data.holidays.inicio);
            $("#txtfinal").val(data.holidays.final);
            $("#txttotaldias").val(data.holidays.totaldias);
            $("#txtinlabores").val(data.holidays.inlabores);
            $("#txtdisponibles").val(data.holidays.disponibles);
            $("#txtpago").val(data.holidays.pago);
            mostrarmodalformulario('MODIFICACION', data.permitirmodificacion);
            mostrarformulario();
        }).fail( function() {
            toastr.error( "Aviso, estamos experimentando problemas, contacta al administrador del sistema", "Mensaje", {
                "timeOut": "6000",
                "progressBar": true,
                "extendedTImeout": "6000"
            });
        })
    }

    //guardar modificaciones
$("#btnGuardarModificacion").on('click', function (e) {
    e.preventDefault();
    var formData = new FormData($("#form_Modal_pricipal")[0]);//
    var form = $("#form_Modal_pricipal");
    if (form.parsley().isValid()){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:modificar_holidays,
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                toastr.success( "Datos guardados correctamente", "Mensaje", {
                    "timeOut": "6000",
                    "progressBar": true,
                    "extendedTImeout": "6000"
                });
                var tabla = $('.tablelist').DataTable();
                tabla.ajax.reload();
                limpiar();
                ocultarmodalformulario();
                limpiarmodales();
            },
            error:function(data){
                if(data.status == 403){
                    toastr.error( "No tiene permisos para realizar esta acción, contacta al administrador del sistema", "Mensaje", {
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000"
                    });
                }else{
                    toastr.error( "Aviso, estamos experimentando problemas, contacta al administrador del sistema", "Mensaje", {
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000"
                    });
                }
            }    
        })
    }else{
        form.parsley().validate();
    }
});
function verificarbajaholidays(numero){
    $.get(verificar_baja_holidays, {numero:numero}, function(data){
        if(data.status == 'BAJA'){
            //ID del input que esta dentro del formulario del modal de baja
            $("#num").val();
            //<h5 id="textobaja"></h5> etiqueta dentro del formulario del modal de baja
            $("#textobaja").html("Baja exitosa");
            // id de boton para la baja dentro del formulario del modal de baja
            $("#aceptar").hide();
            // id del div del modal id="estatusregistro"
            $('#estatusregistro').modal('show');
        }else{
            $("#num").val(numero);
            $("#textobaja").html("¿Esta seguro de realizar la baja?");
            $("#aceptar").show();
            $('#estatusregistro').modal('show');
        }
    })
}
$("#aceptar").on('click', function(e){
    e.preventDefault();//          #formdeactivate ID del formulario que se encuantra en el modal de la baja
    var formData = new FormData($("#formdeactivate")[0]);
    var form = $("#formdeactivate");
    if (form.parsley().isValid()){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url:baja_holidays,
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#estatusregistro').modal('hide');
                toastr.success( "La baja se realizo correctamente", "Mensaje", {
                    "timeOut": "6000",
                    "progressBar": true,
                    "extendedTImeout": "6000"
                });
                var tabla = $('.tablelist').DataTable();
                tabla.ajax.reload();
            },
            error:function(data){
                if(data.status == 403){
                    toastr.error( "No tiene permisos para realizar esta acción, contacta al administrador del sistema", "Mensaje", {
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000" 
                    });
                }else{
                    toastr.error( "Aviso, estamos experimentando problemas, contacta al administrador del sistema", "Mensaje", {
                        "timeOut": "6000",
                        "progressBar": true,
                        "extendedTImeout": "6000"
                    });
                }
                $('#estatusregistro').modal('hide');
            }
        })
    }else{
        form.parsley().validate();
    }
});
    
init();