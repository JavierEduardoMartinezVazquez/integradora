'use strict'
    var tabla;
    var form;

    function init(){
        listarbusiness();
     }

    function mostrarmodalformulario(movimiento, businesstirmodificacion){
        $("#Form_Modal").modal('show');
        if(movimiento=='ALTA'){
            $('#btnGuardar').show();
            $('#btnGuardarModificacion').hide();
        }else if(movimiento == 'MODIFICACION'){
            if(businesstirmodificacion == 1){
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
    function obtenerultimoidbusiness(){
        $.get(obtener_ultimo_id_business, function(numero){
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
        $("#titulomodal").html('Alta de Empresas');
        mostrarmodalformulario('ALTA');
        mostrarformulario();
        //formulario alta
        var tabs =
            '<div class="card-body">'+
                '<div class="tab-content">'+
                    '<div class="tab-pane active" id="datosgenerales">'+
                        '<div class="container">'+
                            '<div class="form-group row">'+
                                '<div class="col-md-2">'+
                                    '<label>Numero<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="text" class="form-control" name="numero" id="txtnumero" required  readonly>'+
                                '</div>'+
                                '<div class="col-md-10">'+
                                '<label>Empresa<b style="color:#F44336 !important;">*</b></label>'+
                                '<input type="text" class="form-control" name="empresa" id="txtempresa" placeholder="Nombre de la empresa" maxlength="50" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+
                            '<form action = "{{route(control.paginas.business)}}" method="POST"enctype="multipart/form-data">'+
                                '<div class="col-md-6">'+
                                '<label>Logo<b style="color:#F44336 !important;">*</b></label>'+
                                '<input type="file" class="form-control" name="logo" id="txtlogo" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '</form>'+
                            '<div class="col-md-6">'+
                                '<label>Dirección<b style="color:#F44336 !important;">*</b></label>'+
                                '<input type="text" class="form-control" name="direccion" id="txtdireccion" placeholder="Dirección" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+
                            '<div class="col-md-6">'+
                                '<label>RFC<b style="color:#F44336 !important;">*</b></label>'+
                                '<input type="text" class="form-control" name="rfc_e" id="txtrfc_e" placeholder="R.F.C" maxlength="30" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
        $("#tabsform").html(tabs);//tabsform es el ID del DIV donde se muestra el formulario del archivo JS <2>
        obtenerultimoidbusiness();
    }
    $("#btnGuardar").on('click', function (e) {
        e.preventDefault(); //       ID del formulario donde se muestra el modal
        var formData = new FormData($("#form_Modal_pricipal")[0]);
        var form = $("#form_Modal_pricipal");
        if (form.parsley().isValid()){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: guardar_business,
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
    function listarbusiness() {
        $("#tablelist").DataTable({
          "autoWidth": false,
          "sScrollX": "110%",
          "sScrollY": "350px",
          'language': {
              "url": "control/plugins/datatables/es_es.json",
        },
        ajax: listar_business,
        "createdRow": function( row, data){
            if( data.status ==  `BAJA`){ $(row).css('font-weight','bold').css('color','#dc3545');}
        },
        columns: [
            { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
            { data: 'id', name: 'id', orderable: true, searchable: true },
            { data: 'empresa', name: 'empresa', orderable: true, searchable: true },
            { data: 'logo', name: 'logo', orderable: true, searchable: true },
            { data: 'direccion', name: 'direccion', orderable: true, searchable: true },
            { data: 'rfc_e', name: 'rfc_e', orderable: true, searchable: true },
            { data: 'status', name: 'status', orderable: true, searchable: true },
        ],
        "order": [[ 1, "asc" ]]
        })
    }
    function obtenerbusiness(numero){
        $("#titulomodal").html('Modificación');
        $.get(obtener_business,{numero:numero },function(data){
            //se crea al formlario
            var tabs =
            '<div class="card-body">'+
                '<div class="tab-content">'+
                    '<div class="tab-pane active" id="datosgenerales">'+
                        '<div class="container">'+
                            '<div class="form-group row">'+
                                '<div class="col-md-2">'+
                                    '<label>Numero<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="text" class="form-control" name="numero" id="txtnumero" required  readonly>'+
                                '</div>'+
                                '<div class="col-md-10">'+
                                    '<label>Empresa<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="text" class="form-control" name="empresa" id="txtempresa" placeholder="" maxlength="50" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                    '<label>Dirección<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="text" class="form-control" name="direccion" id="txtdireccion" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                    '<label>RFC<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="text" class="form-control" name="rfc_e" id="txtrfc_e" placeholder="" maxlength="30" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+

                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
            $("#tabsform").html(tabs);
            console.log(data);//mandas el arreglo
            $("#txtnumero").val(data.business.id);
            $("#txtempresa").val(data.business.empresa);
            $("#txtlogo").val(data.business.logo);
            $("#txtdireccion").val(data.business.direccion);
            $("#txtrfc_e").val(data.business.rfc_e);

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
            url:modificar_business,
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
function verificarbajabusiness(numero){
    $.get(verificar_baja_business, {numero:numero}, function(data){
        if(data.status == 'BAJA'){
            //ID del input que esta dentro del formulario del modal de baja
            $("#num").val();
            //<h5 id="textobaja"></h5> etiqueta dentro del formulario del modal de baja
            $("#textobaja").html("Lo sentimos, esta empresa esta dada de baja.");
            // id de boton para la baja dentro del formulario del modal de baja
            $("#aceptar").hide();
            // id del div del modal id="estatusregistro"
            $('#estatusregistro').modal('show');
        }else{
            $("#num").val(numero);
            $("#textobaja").html("¿Desea realizar la baja?");
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
            url:baja_business,
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
