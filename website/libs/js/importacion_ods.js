function odsexcel() {
    var datados = new FormData();
    jQuery.each($('input[type=file]')[0].files, function (i, file) {
        datados.append('ods-' + i, file);
    });

    jQuery.ajax({
        url: 'mostrar_ods.php',
        data: datados,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (respuesta) {
            // console.log("Este es el resultado:"+respuesta);
            // $("#tablaEjecucion").html(respuesta);
            $(".dataTable").html(respuesta);
        }
    });
}