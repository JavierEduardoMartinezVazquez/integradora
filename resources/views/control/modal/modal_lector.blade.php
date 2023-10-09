<!-- Modal -->
<div class="modal fade" id="modal_lector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="modal-header" style="background-color: #a90018">
                                <div class="titulo">Escanear con la camára del dispositivo</div>
                                <button id="closeModal" type="button" class="btn-close" data-dismiss="modal"/>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script src="/scripts/quaga/example/vendor/jquery-1.9.0.min.js" type="text/javascript"></script>
            <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
            <script src="/scripts/quaga/dist/quagga.min.js"></script>
            <script src="/scripts/assistances.js" type="text/javascript"></script>
                <section>
                    <center>
                        <div id="result_strip">
                            <ul class="thumbnails"></ul>
                            {{-- <ul class="collector"></ul>
                            <div id="code"></div> --}}
                        </div>
                        <div id="interactive" class="viewport"></div>
                    </center>
                </section>
            {{-- <form id="form_Modal_pricipal" action="#">
                <div class="container">
                    <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">Cerrar</button>
                            <button type="button" class="btn btn-danger btn-sm" id="cerrar">Hola</button>
                            <button id="closeModal" type="button" class="btn-close" data-dismiss="modal"></button>
                    </div>
                </div>
            </form> --}}
        </div>
    </div>
</div>
