<div class="col-4">
    <select class="form-select mr-sm-2" name="business" id="business"></select>
</div>

<div class="col-3">
    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Desde:</span>
                <input type="date" class="form-control" id="entrydate_from">
    </div>
</div>
    <div class="col-3">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Hasta:</span>
                <input type="date" class="form-control" id="entrydate_to">
              </div>
        </div>
    <div class="col-2">
        <button class="btn btn-danger mr-sm-2" onclick="filtrar()">
            <i class="fas fa-search"></i> Filtrar
        </button>
        <a class="btn btn-secondary" onclick="reiniciar()">
            <i class="fas fa-sync-alt"></i>
        </a>
    </div>

<script>
    var obtener_business = '{!!URL::to('obtener_business')!!}';
</script>
