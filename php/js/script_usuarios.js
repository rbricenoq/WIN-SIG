// READ records
function readRecords() {
    $.get("php/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(id_usuario) {
    var conf = confirm("¿Esta seguro que desea eliminar este usuario?");
    if (conf == true) {
        $.post("php/deleteUser.php", {
            id_usuario: id_usuario
        },
        function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
            );
    }
}

function GetUserDetails(id_usuario) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id_usuario);
    $.post("php/readUserDetails.php", {        
        id_usuario: id_usuario
    },
    function (data, status) {
            // PARSE json data
            var usuario = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nombre").val(usuario.nombre);
            $("#update_apellido").val(usuario.apellido);
            $("#update_tel_usuario").val(usuario.tel_usuario);
            $("#update_correo_usuario").val(usuario.correo_usuario);
            $("#update_nom_usuario").val(usuario.nom_usuario);
            $("#update_estado").val(usuario.estado);
        }
        );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values    
    var nombre = $("#update_nombre").val();
    var apellido = $("#update_apellido").val();
    var tel_usuario = $("#update_tel_usuario").val();
    var correo_usuario = $("#update_correo_usuario").val();
    var nom_usuario = $("#update_nom_usuario").val();

    // get hidden field value
    var id_usuario = $("#hidden_user_id").val();
    // Update the details by requesting to the server using php
    $.post("php/updateUserDetails.php", {
        id_usuario: id_usuario,
        nombre: nombre,
        apellido: apellido,
        tel_usuario: tel_usuario,
        correo_usuario: correo_usuario,
        nom_usuario: nom_usuario
    },
    function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
        );
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});