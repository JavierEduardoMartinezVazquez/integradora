'use strict'
    var tabla;
    var form;

    function init(){
        listarcompras();
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
    function obtenerultimoidcompras(){
        $.get(obtener_ultimo_id_compras, function(numero){
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
        $("#titulomodal").html('compras');
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
                                    '<label>ID:<b style="color:#F44336 !important;">*</b></label>'+                             
                                    '<input type="text" class="form-control" name="numero" id="txtnumero" required  readonly>'+ 
                                '</div>'+
                                '<div class="col-md-7">'+ 
                                    '<label>Producto<b style="color:#F44336 !important;">*</b></label>'+ 
                                    '<input type="text" class="form-control" name="producto" id="txtproducto" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '<div class="col-md-4">'+ 
                                '<label>Precio<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="text" class="form-control" name="precio" id="txtprecio" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+
                            '<div class="col-md-4">'+ 
                            '<label>Cantidad<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="number" class="form-control" name="cantidadcompra" id="txtcantidadcompra" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+
                            '<div class="col-md-4">'+ 
                                '<label>Total<b style="color:#F44336 !important;">*</b></label>'+ 
                                '<input type="text" class="form-control" name="total" id="txttotal" onkeyup="tipoLetra(this);" required>'+
                            '</div>'+
                    '</div>'+    
                '</div>'+
            '</div>'+ 
        '</div>';
        $("#tabsform").html(tabs);//tabsform es el ID del DIV donde se muestra el formulario del archivo JS <2>
        obtenerultimoidcompras();
    }
    $("#btnGuardar").on('click', function (e) {
        e.preventDefault(); //       ID del formulario donde se muestra el modal
        var formData = new FormData($("#form_Modal_pricipal")[0]);
        var form = $("#form_Modal_pricipal");
        if (form.parsley().isValid()){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: guardar_compras,
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
    function listarcompras() {
        $("#tablelist").DataTable({
          "autoWidth": false,
          "sScrollX": "110%",
          "sScrollY": "350px",
          'language': {
              "url": "control/plugins/datatables/es_es.json",
        },
        ajax: listar_compras,
        "createdRow": function( row, data){
            if( data.status ==  `BAJA`){ $(row).css('font-weight','bold').css('color','#dc3545');}
        },
        columns: [
            { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
            { data: 'id', name: 'id', orderable: true, searchable: true },
            { data: 'producto', name: 'producto', orderable: true, searchable: true },
            { data: 'precio', name: 'precio', orderable: true, searchable: true },
            { data: 'cantidadcompra', name: 'cantidadcompra', orderable: true, searchable: true },
            { data: 'total', name: 'total', orderable: true, searchable: true },
            { data: 'status', name: 'status', orderable: true, searchable: true },
            { data: 'total_final', name: 'total_final', orderable: false, searchable: false },

        ],
        "order": [[ 1, "asc" ]]
        })
    }
    function obtenercompras(numero){
        $("#titulomodal").html('Modificación');
        $.get(obtener_compras,{numero:numero },function(data){
            //se crea al formlario
            var tabs =
            '<div class="card-body">'+
                '<div class="tab-content">'+
                    '<div class="tab-pane active" id="datosgenerales">'+
                        '<div class="container">'+
                            '<div class="form-group row">'+
                            '<div class="col-md-4">'+ 
                            '<label>Cantidad<b style="color:#F44336 !important;">*</b></label>'+ 
                            '<input type="number" class="form-control" name="cantidadcompra" id="txtcantidadcompra" onkeyup="tipoLetra(this);" required>'+
                    '</div>'+
                    '</div>'+    
                '</div>'+
            '</div>'+ 
        '</div>';
            $("#tabsform").html(tabs);
            console.log(data);//mandas el arreglo
            $("#txtnumero").val(data.compras.id);
            $("#txtproducto").val(data.compras.producto);
            $("#txtprecio").val(data.compras.precio);
            $("#txtcantidadcompra").val(data.compras.cantidadcompra);
            $("#txttotal").val(data.compras.total);
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
            url:modificar_compras,
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
 function recargarVista() {
    // Recarga la vista actual después de un breve período de tiempo (puedes ajustar el valor en milisegundos según tus necesidades)
    setTimeout(function() {
      location.reload();
    }, 5000);
  }
function eliminarCompra(compraId) {
    // Confirmar con el usuario antes de eliminar
    if (confirm("¿Estás seguro de que deseas eliminar esta compra?")) {
        // Realizar la petición AJAX para eliminar la compra
        $.ajax({
            type: 'POST',
            url: '/eliminar-compra', // Ruta en la que manejas la eliminación en tu controlador
            data: {
                _token: '{{ csrf_token() }}', // Asegúrate de incluir el token CSRF en la petición
                compra_id: compraId
            },
            success: function(response) {
                // Manejar la respuesta del servidor (puede ser redireccionar a la página de compras, actualizar la interfaz, etc.)
                console.log(response);
                // Por ejemplo, recargar la página después de la eliminación
                location.reload();
            },
            error: function(error) {
                console.error('Error al eliminar la compra:', error);
            }
        });
    }
}
function verificarbajacompras(numero){
    $.get(verificar_baja_compras, {numero:numero}, function(data){
        if(data.status == 'BAJA'){
            //ID del input que esta dentro del formulario del modal de baja
            $("#num").val();
            //<h5 id="textobaja"></h5> etiqueta dentro del formulario del modal de baja
            $("#textobaja").html("El producto ya fue dado de baja.");
            // id de boton para la baja dentro del formulario del modal de baja
            $("#aceptar").hide();
            // id del div del modal id="estatusregistro"
            $('#estatusregistro').modal('show');
        }else{
            $("#num").val(numero);
            $("#textobaja").html("¿Esta seguro?");
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
            url:baja_compras,
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