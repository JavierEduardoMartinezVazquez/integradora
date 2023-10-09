<div class="modal fade" data-backdrop="static" data-keyboard="false" id="Form_Modal" role="dialog"><!--<3>-->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div id="formulario"><!--el ID se coloca en la funcio function mostrarformulario <1>-->
                <div class="modal-header">
                    <h5 class="modal-title" id="titulomodal"></h5>
                </div>
                <form id="form_Modal_pricipal" action="#"><!--formparsley--<4>-->
                    <div class="modal-body">
                        <div class="col-md-12" id="tabsform"><!--el ID se coloca al final del formulario del archivo JS ($("#tabsform").html(tabs);) <2>-->
                            <!-- aqui van los formularios de alta o modificacion y se agregan automaticamente con jquery -->
                        </div>
                    </div>
                    <div class="container">
                        <div class="modal-footer">
                                <button type="button" class="btn btn-success btn-sm" id="btnGuardar">Guardar</button>
                                <button type="button" class="btn btn-danger btn-sm" id="btnGuardarModificacion">Actualizar</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close" onclick="limpiar();limpiarmodales();ocultarmodalformulario();">Cerrar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="contenidomodaltablas">
                <!-- aqui van las tablas de seleccion y se agregan automaticamente con jquery -->
            </div>
        </div>
    </div>
</div>
