
function ejecucionexcel() {    
    $("#buttonImpo").hide();
    $("#loading").show();
    try {
        var datauno = new FormData();

        jQuery.each($('input[type=file]')[0].files, function (i, file) {        
            datauno.append('ejecucion-' + i, file);
        });
    
    } catch (error) {
        console.error(error);        
    }
    
    jQuery.ajax({
        url: 'mostrar_eje.php',
        data: datauno,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (respuesta) {
            // console.log("Este es el resultado:"+respuesta);

            var obj = JSON.parse(respuesta);            
            // console.log('Estado es:' + obj.estado);
            if (obj.estado == 1) {                
                Swal.fire({
                    title: 'Algo salió mal!',
                    text: obj.mensaje,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                })
            } else if (obj.estado == 0) {
                Swal.fire({
                    title: 'La importación terminó con éxito',
                    text: "Fueron importados " + obj.total + " de registos",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    })


            }

            $("#buttonImpo").show();
            $("#loading").hide();
        }
    });

}

// function progressbar() {    
//     var porcentajeinicial = 0;
//     $("#progress").attr('aria-valuenow', parseInt(porcentajeinicial));
//     $("#progress").attr('style', 'width: ' + parseInt(porcentajeinicial) + '%');
//     $("#progress").html(parseInt(porcentajeinicial) + "%");
//     var Total = 100;
//     for (i = 1; i <= Total; i++) {
//         calculaPorcentaje(Total,i);
//     }
// }

// function calculaPorcentaje(totalRegistros, proceso) {

//     var totalRegistros = parseInt(totalRegistros);
//     var proceso = parseInt(proceso);
//     var proceso = proceso + 1;
//     var porcentaje = proceso * 100 / totalRegistros;
    
//     console.log("Porcentaje: " + porcentaje);
//     loading(porcentaje);
//     if (porcentaje == 100) {       
//         alert("Finalizo");
//     }

// }

// function loading(porcentaje) {
//     var totalRegistros = 100;
//     $("#progressbars").html('<div class="progress">' +
//         '<div class="progress-bar" role="progressbar" aria-valuenow="' + parseInt(porcentaje) + '" aria-valuemin="0" aria-valuemax="' + totalRegistros + '" style="width: ' + parseInt(porcentaje) + '%;">' + parseInt(porcentaje) + '%' +
//         '</div>' +
//         '</div>');
// }

// function hagoAlgo(callback) {
//     callback('Hola Anexsoft !!');
// }

// hagoAlgo(function (valorQueMeSetearon) {
//     console.log(valorQueMeSetearon);
// })