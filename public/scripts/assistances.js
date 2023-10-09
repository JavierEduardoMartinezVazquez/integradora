
'use strict'
    var tabla;
    var form;

    function init(){
        listarassistances();
        obtenerbusiness();
    }

    function lector(){
        var modal = new bootstrap.Modal(document.getElementById("modal_lector"),{
            backdrop: 'static'
        });
        var boton = document.getElementById("closeModal");
        modal.show();
        $(function() {
            var App = {
                init: function() {
                    var self = this;

                    Quagga.init(this.state, function(err) {
                        if (err) {
                            return self.handleError(err);
                        }
                        App.attachListeners();
                        App.checkCapabilities();
                        Quagga.start();
                        console.log("Se inicializo la camara");
                    });
                },
                handleError: function(err) {
                    console.log(err);
                },
                checkCapabilities: function() {
                    var track = Quagga.CameraAccess.getActiveTrack();
                    var capabilities = {};
                    if (typeof track.getCapabilities === 'function') {
                        capabilities = track.getCapabilities();
                    }
                    this.applySettingsVisibility('zoom', capabilities.zoom);
                    this.applySettingsVisibility('torch', capabilities.torch);
                },
                updateOptionsForMediaRange: function(node, range) {
                    console.log('updateOptionsForMediaRange', node, range);
                    var NUM_STEPS = 6;
                    var stepSize = (range.max - range.min) / NUM_STEPS;
                    var option;
                    var value;
                    while (node.firstChild) {
                        node.removeChild(node.firstChild);
                    }
                    for (var i = 0; i <= NUM_STEPS; i++) {
                        value = range.min + (stepSize * i);
                        option = document.createElement('option');
                        option.value = value;
                        option.innerHTML = value;
                        node.appendChild(option);
                    }
                },
                applySettingsVisibility: function(setting, capability) {
                    // depending on type of capability
                    if (typeof capability === 'boolean') {
                        var node = document.querySelector('input[name="settings_' + setting + '"]');
                        if (node) {
                            node.parentNode.style.display = capability ? 'block' : 'none';
                        }
                        return;
                    }
                    if (window.MediaSettingsRange && capability instanceof window.MediaSettingsRange) {
                        var node = document.querySelector('select[name="settings_' + setting + '"]');
                        if (node) {
                            this.updateOptionsForMediaRange(node, capability);
                            node.parentNode.style.display = 'block';
                        }
                        return;
                    }
                },
                initCameraSelection: function(){
                    var streamLabel = Quagga.CameraAccess.getActiveStreamLabel();

                    return Quagga.CameraAccess.enumerateVideoDevices()
                    .then(function(devices) {
                        function pruneText(text) {
                            return text.length > 30 ? text.substr(0, 30) : text;
                        }
                        var $deviceSelection = document.getElementById("deviceSelection");
                        while ($deviceSelection.firstChild) {
                            $deviceSelection.removeChild($deviceSelection.firstChild);
                        }
                        devices.forEach(function(device) {
                            var $option = document.createElement("option");
                            $option.value = device.deviceId || device.id;
                            $option.appendChild(document.createTextNode(pruneText(device.label || device.deviceId || device.id)));
                            $option.selected = streamLabel === device.label;
                            $deviceSelection.appendChild($option);
                        });
                    });
                },
                attachListeners: function() {
                    var self = this;

                    self.initCameraSelection();
                    $(".controls").on("click", "button.stop", function(e) {
                        e.preventDefault();
                        Quagga.stop();
                        self._printCollectedResults();
                    });

                    $(".controls .reader-config-group").on("change", "input, select", function(e) {
                        e.preventDefault();
                        var $target = $(e.target),
                            value = $target.attr("type") === "checkbox" ? $target.prop("checked") : $target.val(),
                            name = $target.attr("name"),
                            state = self._convertNameToState(name);

                        console.log("Value of "+ state + " changed to " + value);
                        self.setState(state, value);
                    });
                },
                _printCollectedResults: function() {
                    var results = resultCollector.getResults(),
                        $ul = $("#result_strip ul.collector");

                    results.forEach(function(result) {
                        var $li = $('<li><div class="thumbnail"><div class="imgWrapper"><img /></div><div class="caption"><h4 class="code"></h4></div></div></li>');

                        $li.find("img").attr("src", result.frame);
                        $li.find("h4.code").html(result.codeResult.code + " (" + result.codeResult.format + ")");
                        $ul.prepend($li);
                    });
                },
                _accessByPath: function(obj, path, val) {
                    var parts = path.split('.'),
                        depth = parts.length,
                        setter = (typeof val !== "undefined") ? true : false;

                    return parts.reduce(function(o, key, i) {
                        if (setter && (i + 1) === depth) {
                            if (typeof o[key] === "object" && typeof val === "object") {
                                Object.assign(o[key], val);
                            } else {
                                o[key] = val;
                            }
                        }
                        return key in o ? o[key] : {};
                    }, obj);
                },
                _convertNameToState: function(name) {
                    return name.replace("_", ".").split("-").reduce(function(result, value) {
                        return result + value.charAt(0).toUpperCase() + value.substring(1);
                    });
                },
                detachListeners: function() {
                    $(".controls").off("click", "button.stop");
                    $(".controls .reader-config-group").off("change", "input, select");
                },
                applySetting: function(setting, value) {
                    var track = Quagga.CameraAccess.getActiveTrack();
                    if (track && typeof track.getCapabilities === 'function') {
                        switch (setting) {
                        case 'zoom':
                            return track.applyConstraints({advanced: [{zoom: parseFloat(value)}]});
                        case 'torch':
                            return track.applyConstraints({advanced: [{torch: !!value}]});
                        }
                    }
                },
                setState: function(path, value) {
                    var self = this;

                    if (typeof self._accessByPath(self.inputMapper, path) === "function") {
                        value = self._accessByPath(self.inputMapper, path)(value);
                    }

                    if (path.startsWith('settings.')) {
                        var setting = path.substring(9);
                        return self.applySetting(setting, value);
                    }
                    self._accessByPath(self.state, path, value);

                    console.log(JSON.stringify(self.state));
                    App.detachListeners();
                    Quagga.stop();
                    App.init();
                },
                inputMapper: {
                    inputStream: {
                        constraints: function(value){
                            if (/^(\d+)x(\d+)$/.test(value)) {
                                var values = value.split('x');
                                return {
                                    width: {min: parseInt(values[0])},
                                    height: {min: parseInt(values[1])}
                                };
                            }
                            return {
                                deviceId: value
                            };
                        }
                    },
                    numOfWorkers: function(value) {
                        return parseInt(value);
                    },
                    decoder: {
                        readers: function(value) {
                            if (value === 'ean_extended') {
                                return [{
                                    format: "ean_reader",
                                    config: {
                                        supplements: [
                                            'ean_5_reader', 'ean_2_reader'
                                        ]
                                    }
                                }];
                            }
                            return [{
                                format: value + "_reader",
                                config: {}
                            }];
                        }
                    }
                },
                state: {
                    inputStream: {
                        type : "LiveStream",
                        constraints: {
                            width: {min: 640},
                            height: {min: 480},
                            facingMode: "environment",
                            aspectRatio: {min: 1, max: 2}
                        }
                    },
                    locator: {
                        patchSize: "medium",
                        halfSample: true
                    },
                    numOfWorkers: 2,
                    frequency: 10,
                    decoder: {
                        readers : [{
                            format: "code_128_reader",
                            config: {}
                        }]
                    },
                    locate: true
                },
                lastResult : null
            };

            App.init();

            boton.addEventListener("click", function() {
                Quagga.stop();
                modal.hide();
              });

            Quagga.onDetected(function (result) {
                var code = result.codeResult.code;
                console.log("El id ingresado fue:",code);
                $('#buscarcodigo').val(code);
                // simularEnter();
                buscaEmpleado(code);
                Quagga.stop();
                modal.hide();

            });

        });

    }

    function asignarfechaactual(){
        $.get(obtener_fecha_actual_datetimelocal, function(fechas){
          $("#txtFecha").val(fechas.fecha_actual_input_date);
          $("#txtSalida").val(fechas.input_salida);
          $("#txtEntrada").val(fechas.input_entrada);
        })
    }

    function reportedeexcel(){
        var $business_id = $("#business").val();
        var $entrydate_from = $("#entrydate_from").val();
        var $entrydate_to = $("#entrydate_to").val();
        $("#excel").attr("href", export_excel+'?business_id='+$business_id+'&entrydate_from='+$entrydate_from+'&entrydate_to='+$entrydate_to);
        /* $("#excel").click(); */
    }

    function obtenerultimoidassistances(){
        $.get(obtener_ultimo_id_assistances, function(numero){
          $("#txtnumero").val(numero);
        })
    }

    function obtenerbusiness(){
        $.get(obtener_business, function(select_business){
            $("#business").html(select_business);
        })
    }

    function limpiarmodales(){
        $("#tabsform").empty();
    }

    function simularEnter() {
        var enterEvent = new KeyboardEvent("keydown", { key: "Enter" });
        document.dispatchEvent(enterEvent);
      }

    //Funcion para leer codigo de barras con ambos lectores
    function alta(){
        //$("#tabsform").html(tabs);//tabsform es el ID del DIV donde se muestra el formulario del archivo JS <2>
        obtenerultimoidassistances();
        asignarfechaactual();

    }
    setTimeout(function(){
    $("#buscarcodigo").focus();},500);
    $('#buscarcodigo').on('change', function(e){
        e.preventDefault();
        var buscarcodigo = $("#buscarcodigo").val();
        buscaEmpleado(buscarcodigo);//union de ambas funciones para ambos codigos
    });

    function buscaEmpleado(code){
         var buscarcodigo = code;
        $.get(leercodigo, {buscarcodigo:buscarcodigo}, function(data){
            var tabla = $('.tablelist').DataTable(); //classe tbreadyCustomer de la tabla donde se muestran los registros
                    tabla.ajax.reload();//RECARGAR

        });
        toastr.success( "Registro de asistencia", "Mensaje", {
            "timeOut": "6000",
            "progressBar": true,
            "extendedTImeout": "6000"});
            $('#buscarcodigo').val("");//volver a dejar vacio el campo
    }


    $("#btnGuardar").on('click', function (e) {
        e.preventDefault(); //       ID del formulario donde se muestra el modal
        var formData = new FormData($("#form_Modal_pricipal")[0]);
        var form = $("#form_Modal_pricipal");
        if (form.parsley().isValid()){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: guardar_assistances,
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
    function listarassistances() {
        $("#tablelist").DataTable({
          "autoWidth": false,
          "sScrollX": "110%",
          "sScrollY": "350px",
          'language': {
              "url": "control/plugins/datatables/es_es.json",
        },
        ajax: {
            url: listar_assistances,
            data: function (d) {
                d.business_id = $("#business").val();
                d.entrydate_from = $("#entrydate_from").val();
                d.entrydate_to = $("#entrydate_to").val();
            }
          },
        "createdRow": function( row, data){
            if( data.status ==  `BAJA`){ $(row).css('font-weight','bold').css('color','#dc3545');}
        },
        columns: [
            { data: 'operaciones', name: 'operaciones', orderable: false, searchable: false },
            { data: 'id', name: 'id', orderable: true, searchable: true },
            { data: 'Usuario', name: 'Usuario', orderable: true, searchable: true },
            { data: 'business', name: 'business', orderable: true, searchable: true },
            { data: 'Fecha', name: 'Fecha', orderable: true, searchable: true },
            { data: 'Entrada', name: 'Entrada', orderable: true, searchable: true },
            { data: 'Salida', name: 'Salida', orderable: true, searchable: true },
            { data: 'Observaciones', name: 'Observaciones', orderable: true, searchable: true },
            { data: 'status', name: 'status', orderable: true, searchable: true },
        ],
        "order": [[ 1, "asc" ]]
        })
    }

    function reiniciar(){
        $('#business').val("0");
        $('#entrydate_from').val('')
        .attr('type', 'text')
        .attr('type', 'date');
        $('#entrydate_to').val('')
        .attr('type', 'text')
        .attr('type', 'date');

    }

    function filtrar(){
        $('#tablelist').DataTable().clear().destroy();
            listarassistances();
    }

    function obtenerassistances(numero){
        $("#titulomodal").html('Modificación');
        $.get(obtener_assistances,{numero:numero },function(data){
            //se crea al formlario
            var tabs =
            '<div class="card-body">'+
                '<div class="tab-content">'+
                    '<div class="tab-pane active" id="datosgenerales">'+
                        '<div class="container">'+
                            '<div class="form-group row">'+
                                '<div class="col-md-1">'+
                                    '<label>Numero:<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="text" class="form-control" name="numero" id="txtnumero" required  readonly>'+
                                '</div>'+
                                '<div class="col-md-1">'+
                                '</div>'+
                                '<div class="col-md-2">'+
                                    '<label>Usuario<b style="color:#F44336 !important;">*</b></label>'+
                                    '<input type="numeric" class="form-control" name="Usuario" id="txtUsuario" readonly placeholder="" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '<div class="col-md-4">'+
                                '<label>Fecha<b style="color:#F44336 !important;">*</b></label>'+
                                '<input type="date" class="form-control" name="Fecha" id="txtFecha" readonly placeholder="Fecha" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '<div class="col-md-4">'+
                                '<label>Entrada<b style="color:#F44336 !important;">*</b></label>'+
                                '<input type="time" class="form-control" name="Entrada" id="txtEntrada" readonly placeholder="Entrada" onkeyup="tipoLetra(this);" required>'+
                                '</div>'+
                                '<div class="col-md-5">'+
                                '<label>Salida<b style="color:#F44336 !important;">*</b></label>'+
                                '<input type="time" class="form-control" name="Salida" id="txtSalida" placeholder="Salida" onkeyup="tipoLetra(this);" required readonly>'+
                                '</div>'+
                                '<div class="col-md-7">'+
                                '<label>Observaciones<b style="color:#F44336 !important;">*</b></label>'+
                                '<select class="form-select" name="Observaciones" id="txtObservaciones" placeholder="Observaciones" onkeyup="tipoLetra(this);" required>'+
                                '<option value="NINGUNA">NINGUNA</option>'+
                                '<option value="RETARDO">RETARDO</option>'+
                                '<option value="INCAPACIDAD">INCAPACIDAD</option>'+
                                '<option value="FALTA">FALTA</option>'+
                                '</select>'+
                            '</div>'+

                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';
            $("#tabsform").html(tabs);
            console.log(data);//mandas el arreglo
            $("#txtnumero").val(data.assistances.id);
            $("#txtUsuario").val(data.assistances.Usuario);
            $("#txtbusiness").val(data.assistances.business);
            $("#txtFecha").val(data.assistances.Fecha);
            $("#txtEntrada").val(data.assistances.Entrada);
            $("#txtSalida").val(data.assistances.Salida);
            $("#txtObservaciones").val(data.assistances.Observaciones);
            $("#business").html(data.select_business);

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
            url:modificar_assistances,
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                toastr.success( "Hola", "Mensaje", {
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
function verificarbajaassistances(numero){
    $.get(verificar_baja_assistances, {numero:numero}, function(data){
        if(data.status == 'BAJA'){
            //ID del input que esta dentro del formulario del modal de baja
            $("#num").val();
            //<h5 id="textobaja"></h5> etiqueta dentro del formulario del modal de baja
            $("#textobaja").html("Lo sentimos, esta Fecha esta dada de baja.");
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
            url:baja_assistances,
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

