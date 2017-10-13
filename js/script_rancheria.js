// READ records
function readRecords() {
    $.get("php/registros_rancheria.php", {}, function (data, status) {
        $(".records_content_r").html(data);
    });
}


function borrar_rancheria(id_rancheria) {
    var conf = confirm("¿Esta seguro que desea eliminar esta rancheria?");
    if (conf == true) {
        $.post("php/borrar_rancheria.php", {
            id_rancheria: id_rancheria
        },
        function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
            );
    }
}

function detalles_rancheria(id_rancheria) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_rancheria_id").val(id_rancheria);
    $.post("php/leer_detalles_rancheria.php", {        
        id_rancheria: id_rancheria
    },
    function (data, status) {
            // PARSE json data
            var rancheria = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nom_municipio").val(rancheria.nom_municipio);
            $("#update_nom_rancheria").val(rancheria.nom_rancheria);
            $("#update_cantidad_personas").val(rancheria.cantidad_personas);
            $("#update_representante").val(rancheria.representante);
            $("#update_latitud_r").val(rancheria.latitud_r);
            $("#update_longitud_r").val(rancheria.longitud_r);
        }
        );
    // Open modal popup
    $("#detalles_rancheria").modal("show");
}

function actualizar_detalles_rancheria() {
    // get values    
    var nom_municipio = $("#update_nom_municipio").val();
    var id_municipio = $("#update_id_municipio").val();
    var nom_rancheria = $("#update_nom_rancheria").val();
    var cantidad_personas = $("#update_cantidad_personas").val();
    var representante = $("#update_representante").val();
    var latitud_r = $("#update_latitud_r").val();
    var longitud_r = $("#update_longitud_r").val();
    // get hidden field value
    var id_rancheria = $("#hidden_rancheria_id").val();
    // Update the details by requesting to the server using php
    $.post("php/actualizar_detalles_rancheria.php", {
        id_rancheria: id_rancheria,
        id_municipio: id_municipio,
        nom_municipio: nom_municipio,
        nom_rancheria: nom_rancheria,
        cantidad_personas: cantidad_personas,
        representante: representante,
        latitud_r: latitud_r,
        longitud_r: longitud_r
    },
    function (data, status) {
            // hide modal popup
            $("#detalles_rancheria").modal("hide");
            readRecords();
        }
        );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});