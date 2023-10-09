'use strict'
    var tabla;
    var form;

    function init(){
        listaruser();
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
    function obtenerultimoiduser(){
        $.get(obtener_ultimo_id_user, function(numero){
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
    function obtenerempresa(){
        ocultarformulario();
        var tablaempresas= '<div class="modal-header ">'+
                                '<h4 class="modal-title">Empresa</h4>'+
                            '</div>'+
                            '<div class="modal-body">'+
                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<div class="table-responsive">'+
                                            '<table id="tbllistadoempresas" class="tbllistadoempresas table table-bordered table-striped table-hover" style="width:100% !important;">'+
                                                '<thead >'+
                                                    '<tr>'+
                                                        '<th>Operaciones</th>'+
                                                        '<th>#</th>'+
                                                        '<th>Nombre</th>'+
                                                        '<th>status</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody></tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-danger btn-sm" onclick="mostrarformulario();">Regresar</button>'+
                            '</div>';
          $("#contenidomodaltablas").html(tablaempresas);
          var tagen = $('#tbllistadoempresas').DataTable({
              "lengthMenu": [ 10, 50, 100, 250, 500 ],
              "pageLength": 250,
              "sScrollX": "110%",
              "sScrollY": "370px",
              "bScrollCollapse": true,
              processing: true,
              'language': {
                "url": "control/plugins/datatables/es_es.json",
              },
              serverSide: true,
              ajax: {
                  url: obtener_empresa,
              },
              columns: [
                  { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
                  { data: 'id', name: 'id' },
                  { data: 'nombre', name: 'nombre' },
                  { data: 'status', name: 'status' }
              ],
              "initComplete": function() {
                  var $buscar = $('div.dataTables_filter input');
                  $buscar.unbind();
                  $buscar.bind('keyup change', function(e) {
                      if(e.keyCode == 13 || this.value == "") {
                      $('#tbllistadoempresas').DataTable().search( this.value ).draw();
                      }
                  });
              },
          });
          //seleccionar registro al dar doble click
          $('#tbllistadoempresas tbody').on('dblclick', 'tr', function () {
              var data = tagen.row( this ).data();
              seleccionarempresa(data.id, data.nombre);
          });
    }
    function seleccionarempresa(id, nombre){

        $("#txtempresa").val(id);
        $("#txtnom").html(nombre);
        $("#txtnamee").val(nombre);
        //if(nombre != null){
         // $("#txtcliente").html(nombre.substring(0, 40));
        //}
        mostrarformulario();
      }

      function obtenerhorario(){
        ocultarformulario();
        var tablahorarios= '<div class="modal-header ">'+
                                '<h4 class="modal-title">Horario</h4>'+
                            '</div>'+
                            '<div class="modal-body">'+
                                '<div class="row">'+
                                    '<div class="col-md-12">'+
                                        '<div class="table-responsive">'+
                                            '<table id="tbllistadohorario" class="tbllistadohorario table table-bordered table-striped table-hover" style="width:100% !important;">'+
                                                '<thead >'+
                                                    '<tr>'+
                                                        '<th>Operaciones</th>'+
                                                        '<th>#</th>'+
                                                        '<th>Entrada</th>'+
                                                        '<th>Salida</th>'+
                                                        '<th>status</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody></tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-danger btn-sm" onclick="mostrarformulario();">Regresar</button>'+
                            '</div>';
          $("#contenidomodaltablas").html(tablahorarios);
          var tagen = $('#tbllistadohorario').DataTable({
              "lengthMenu": [ 10, 50, 100, 250, 500 ],
              "pageLength": 250,
              "sScrollX": "110%",
              "sScrollY": "370px",
              "bScrollCollapse": true,
              processing: true,
              'language': {
                "url": "control/plugins/datatables/es_es.json",
              },
              serverSide: true,
              ajax: {
                  url: obtener_horario,
              },
              columns: [
                  { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
                  { data: 'id', name: 'id' },
                  { data: 'entrada', name: 'entrada' },
                  { data: 'salida', name: 'salida' },
                  { data: 'status', name: 'status' }
              ],
              "initComplete": function() {
                  var $buscar = $('div.dataTables_filter input');
                  $buscar.unbind();
                  $buscar.bind('keyup change', function(e) {
                      if(e.keyCode == 13 || this.value == "") {
                      $('#tbllistadohorario').DataTable().search( this.value ).draw();
                      }
                  });
              },
          });
          //seleccionar registro al dar doble click
          $('#tbllistadohorario tbody').on('dblclick', 'tr', function () {
              var data = tagen.row( this ).data();
              seleccionarhorario(data.id);
          });
    }
    function seleccionarhorario(id){

        $("#txthorario").val(id);
        //if(nombre != null){
         // $("#txtcliente").html(nombre.substring(0, 40));
        //}
        mostrarformulario();
      }
      function obtenerroles(){
        $.get(obtener_roles, function(select_roles){
            $("#txtrol").html(select_roles);
        })
    }

    function obtenerempresaid(){
        $.get(obtener_empresaid, function(select_empresaid){
            $("#txtempresa_id").html(select_empresaid);
            console.log(selectempresaid);
        })
    }

    function alta(){
        $("#titulomodal").html('Alta de Usuario');
        mostrarmodalformulario('ALTA');
        mostrarformulario();
        //formulario alta
        var tabs =
        '<div class="row">'+
        '<div class="col-12 col-sm-12">'+
                '<div class="card-body">'+
                    '<div class="tab-content" id="custom-tabs-one-tabContent">'+

                        '<div class="tab-pane fade show active" id="p_datos" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">'+

                            '<div class="container">'+
                                '<div class="form-group row">'+
                                    '<div class="col-md-1">'+
                                        '<label>Id</label>'+
                                        '<input type="text" class="form-control" name="numero" id="txtnumero" placeholder="ID" onkeyup="tipoLetra(this);" required readonly>'+
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                        '<label>Nombre(s):<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="text" class="form-control" name="nombre" id="txtnombre" placeholder="Nombre" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                        '<label>A. Paterno<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="text" class="form-control" name="paterno" id="txtpaterno" placeholder="Paterno" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-3">'+
                                        '<label>A. Materno<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="text" class="form-control" name="materno" id="txtmaterno" placeholder="Materno"" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="container">'+
                                '<div class="form-group row">'+
                                    '<div class="col-md-4">'+
                                        '<label>Correo Electrónico<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="text" class="form-control" name="email" id="txtemail" placeholder="Email" required autocomplete="Email" data-parsley-type="email" onkeyup="tipoMinusculas(this);">'+
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                        '<label>Contraseña<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="password" class="form-control" name="pass" id="txtpass" required autocomplete="new-password" placeholder="Contraseña">'+
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                        '<label>Confirmar contraseña<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="password" class="form-control" name="pass2" id="txtpass2" required autocomplete="new-password" data-parsley-equalto="#txtpass" placeholder="Confirmar contraseña">'+
                                    '</div>'+

                                    '<div class="col-md-9">'+
                                        '<label>NSS<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="text" class="form-control" name="nss" id="txtnss"  onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-3">'+
                                        '<label>Fecha de ingreso<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="date" class="form-control" name="ingreso" id="txtingreso" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                        '<label>Tel<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="number" class="form-control" name="tel" id="txttel" required autocomplete="tel" placeholder="Tel"  value="" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">'+
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                                    '<label>CURP<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="curp" id="txtcurp" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-4">'+
                                                    '<label>RFC<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="rfc" id="txtrfc" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-12">'+
                                        '<label>Empresa<b style="color:#F44336 !important;">*</b></label>'+
                                        '<select class="form-select" name="empresa_id" id="txtempresa_id" onkeyup="tipoLetra(this);" required>'+
                                        '</select>'+
                                '</div>'+
                                    '<div class="col-md-3">'+
                                        '<label>Puesto<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="text" class="form-control" name="puesto" id="txtsucursal" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                '<div class="col-md-3">'+
                                    '<label>D. Vacaciones<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="number" class="form-control" name="diasvacaciones" id="txtdiasvacaciones" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '<div class="col-md-3">'+
                                        '<label>Horario L-V<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="time" class="form-control" name="horariolv_id" id="txthorariolv_id" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                    '</div>'+
                                    '<div class="col-md-3">'+
                                    '<label>Horario Sabado<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="time" class="form-control" name="horariosab_id" id="txthorariosab_id" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '<div class="col-md-3">'+
                                    '<label>Rol<b style="color:#F44336 !important;">*</b></label>'+
                                        '<select class="form-select" name="rol" id="txtrol" placeholder="Rol" onkeyup="tipoLetra(this);" required>'+
                                        '</select>'+
                                        '</div>'+
                            '<form action = "{{route(control.paginas.store)}}" method="POST"enctype="multipart/form-data">'+
                                        '<div class="col-md-6">'+
                                        '<label>Fotografía<b style="color:#F44336 !important;">*</b></label>'+
                                        '<input type="file" class="form-control" name="foto" id="txtfoto" onkeyup="tipoLetra(this);" required>'+
                                        '</div>'+
                                        '</form>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>';
        $("#tabsform").html(tabs);//tabsform es el ID del DIV donde se muestra el formulario del archivo JS <2>
        obtenerultimoiduser();
        obtenerroles();
        obtenerempresaid();
    }
    $("#btnGuardar").on('click', function (e) {
        e.preventDefault(); //       ID del formulario donde se muestra el modal
        var formData = new FormData($("#form_Modal_pricipal")[0]);
        var form = $("#form_Modal_pricipal");
        if (form.parsley().isValid()){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:guardar_user,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data == 1){
                        toastr.error( "Aviso, el Correo Electrónico ya existe", "Mensaje", {
                            "timeOut": "6000",
                            "progressBar": true,
                            "extendedTImeout": "6000"
                        });
                    }else{
                        toastr.success( "Datos guardados correctamente", "Mensaje", {
                            "timeOut": "6000",
                            "progressBar": true,
                            "extendedTImeout": "6000"
                        });
                        var tabla = $('.tbllistado').DataTable();
                        tabla.ajax.reload();
                        limpiar();
                        ocultarmodalformulario();
                        limpiarmodales();
                    }
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

    function listaruser() {
        $("#tablelist").DataTable({
          "autoWidth": false,
          "sScrollX": "110%",
          "sScrollY": "350px",
          'language': {
              "url": "control/plugins/datatables/es_es.json",
        },
        ajax: listar_user,
        "createdRow": function( row, data){
            if( data.status ==  `BAJA`){ $(row).css('font-weight','bold').css('color','#dc3545');}
        },
        columns: [
            { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
            { data: 'id', name: 'id', orderable: true, searchable: true },
            { data: 'foto', name: 'foto', orderable: true, searchable: true },
            { data: 'name', name: 'name', orderable: true, searchable: true },
            { data: 'lastname_p', name: 'lastname_p', orderable: true, searchable: true },
            { data: 'lastname_m', name: 'lastname_m', orderable: true, searchable: true },
            { data: 'email', name: 'email', orderable: true, searchable: true },
            { data: 'nss', name: 'nss', orderable: true, searchable: true },
            { data: 'tel', name: 'tel', orderable: true, searchable: true },
            { data: 'curp', name: 'curp', orderable: true, searchable: true },
            { data: 'rfc', name: 'rfc', orderable: true, searchable: true },
            { data: 'empresa_id', name: 'empresa_id', orderable: true, searchable: true },
            { data: 'puesto', name: 'puesto', orderable: true, searchable: true },
            { data: 'ingreso', name: 'ingreso', orderable: true, searchable: true },
            { data: 'horariolv_id', name: 'horariolv_id', orderable: true, searchable: true },
            { data: 'horariosab_id', name: 'horariosab_id', orderable: true, searchable: true },
            { data: 'diasvacaciones', name: 'diasvacaciones', orderable: true, searchable: true },
            { data: 'rol', name: 'rol', orderable: true, searchable: true },
            { data: 'status', name: 'status', orderable: true, searchable: true },
        ],
        "order": [[ 1, "asc" ]]
        })
    }
    function obteneruser(numero){
        $("#titulomodal").html('Modificación del Usuario');
        $.get(obtener_user,{numero:numero },function(data){
            //se crea al formulario
            var tabs =
                    '<div class="row">'+
                    '<div class="col-12 col-sm-12">'+
                            '<div class="card-body">'+
                                '<div class="tab-content" id="custom-tabs-one-tabContent">'+
                                    '<div class="tab-pane fade show active" id="p_datos" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">'+
                                        '<div class="container">'+
                                            '<div class="form-group row">'+
                                                '<div class="col-md-1">'+
                                                    '<label>Id <b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="numero" id="txtnumero" placeholder="ID" onkeyup="tipoLetra(this);" required readonly>'+
                                                '</div>'+
                                                '<div class="col-md-3">'+
                                                    '<label>Nombre(s)<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="nombre" id="txtnombre" placeholder="Nombre" onkeyup="tipoLetra(this);" required>'+
                                                '</div>'+
                                                '<div class="col-md-3">'+
                                                    '<label>A. Paterno<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="paterno" id="txtpaterno" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                                '</div>'+
                                                '<div class="col-md-3">'+
                                                    '<label>A. Materno<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="materno" id="txtmaterno" placeholder=""" onkeyup="tipoLetra(this);" required>'+
                                                '</div>'+
                                                '<div class="col-md-2">'+
                                                '<label>D.Vacaciones<b style="color:#F44336 !important;">*</b></label>'+
                                                '<input type="number" class="form-control" name="diasvacaciones" id="txtdiasvacaciones" placeholder="" readonly onkeyup="tipoLetra(this);" required>'+
                                             '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="container">'+
                                            '<div class="form-group row">'+
                                                '<div class="col-md-4">'+
                                                    '<label>Correo Electrónico<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="email" id="txtemail" placeholder="Email" readonly autocomplete="Email" data-parsley-type="email" onkeyup="tipoMinusculas(this);">'+
                                                '</div>'+
                                                '<div class="col-md-8">'+
                                                    '<label>Sucursal<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="sucursal" id="txtsucursal" readonly onkeyup="tipoMinusculas(this);">'+
                                            '</div>'+
                                            '<div class="col-md-3">'+
                                                    '<label>Fecha de ingreso<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="date" class="form-control" name="ingreso" id="txtingreso" placeholder="" readonly onkeyup="tipoLetra(this);" >'+
                                                '</div>'+
                                            '<div class="col-md-3" hidden>'+
                                                    '<label>Horario L-V<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="time" class="form-control" name="horariolv_id" id="txthorariolv_id" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                                '</div>'+
                                                '<div class="col-md-3" hidden>'+
                                                '<label>Horario Sabado<b style="color:#F44336 !important;">*</b></label>'+
                                                '<input type="time" class="form-control" name="horariosab_id" id="txthorariosab_id" placeholder="" onkeyup="tipoLetra(this);" required>'+
                                            '</div>'+
                                            '<div class="col-md-3">'+
                                                    '<label>Tel<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="number" class="form-control" name="tel" id="txttel" placeholder="Tel" onkeyup="tipoLetra(this);" maxlength="10" required>'+
                                                '</div>'+
                                            '<div class="col-md-3">'+
                                                    '<label>CURP<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<input type="text" class="form-control" name="curp" id="txtcurp" placeholder="CURP" onkeyup="tipoLetra(this);" required>'+
                                                '</div>'+
                                            '<div class="col-md-3">'+
                                                '<label>R.F.C.<b style="color:#F44336 !important;">*</b></label>'+
                                                '<input type="text" class="form-control" name="rfc" id="txtrfc" placeholder="RFC" onkeyup="tipoLetra(this);" required>'+
                                            '</div>'+

                                            '<div class="col-md-3" hidden>'+
                                                '<label>Rol<b style="color:#F44336 !important;">*</b></label>'+
                                                    '<select class="form-select" name="rol" id="txtrol" placeholder="Rol" onkeyup="tipoLetra(this);" required>'+
                                            '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
            $("#tabsform").html(tabs);
            $("#txtnumero").val(data.user.id);
            $("#txtnombre").val(data.user.name);
            $("#txtpaterno").val(data.user.lastname_p);
            $("#txtmaterno").val(data.user.lastname_m);
            $("#txtemail").val(data.user.email);
            $("#txtnss").val(data.user.nss);
            $("#txttel").val(data.user.tel);
            $("#txtcurp").val(data.user.curp);
            $("#txtrfc").val(data.user.rfc);
            $("#txtpuesto").val(data.user.puesto);
            $("#txtingreso").val(data.user.ingreso);
            $("#txthorariolv_id").val(data.user.horariolv_id);
            $("#txthorariosab_id").val(data.user.horariosab_id);
            $("#txtdiasvacaciones").val(data.user.diasvacaciones);
            $("#txtrol").html(data.select_roles);
            $("#txtempresa_id").html(data.select_empresaid);
            $("#txtfoto").val(data.user.foto);
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
            url:modificar_user,
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
function verificarbajauser(numero){
    $.get(verificar_baja_user, {numero:numero}, function(data){
        if(data.status == 'BAJA'){
            //ID del input que esta dentro del formulario del modal de baja
            $("#num").val();
            //<h5 id="textobaja"></h5> etiqueta dentro del formulario del modal de baja
            $("#textobaja").html("Este empleado ya fue dado de baja.");
            // id de boton para la baja dentro del formulario del modal de baja
            $("#aceptar").hide();
            // id del div del modal id="estatusregistro"
            $('#estatusregistro').modal('show');
        }else{
            $("#num").val(numero);
            $("#textobaja").html("¿Esta seguro de dar de baja este empleado?");
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
            url:baja_user,
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
