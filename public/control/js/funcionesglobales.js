//CONVERTIR EN MAYUSCULAS O MINUCULAS DEPENDIENDO DE LA CONFIGURACION DEL SISTEMA
function tipoLetra(e) {
    //if(mayusculas_sistema == 'S'){
        var start = e.selectionStart;
        var end = e.selectionEnd;
        e.value = e.value.toUpperCase();
        e.setSelectionRange(start, end);
        //e.value = e.value.toUpperCase();
   // }
}
//CONVERTIR EN MINUCULAS O MAYUSCULAS
function tipoMinusculas(e) {
    //if(mayusculas_sistema == 'S'){
        var start = e.selectionStart;
        var end = e.selectionEnd;
        e.value = e.value.toLowerCase();
        e.setSelectionRange(start, end);
        //e.value = e.value.toUpperCase();
   // }
}

