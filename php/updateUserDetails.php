<?php
// include Database connection file
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
if (!$conexion) {
    echo 'Ha ocurrido un error de conexión con la base de datos.';
    exit;
}

// check request
if(isset($_POST)){

    // get values
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tel_usuario = $_POST['tel_usuario'];
    $correo_usuario = $_POST['correo_usuario'];
    $nom_usuario = $_POST['nom_usuario'];
    $estado = $_POST['estado'];

    // Updaste User details
    $query = "UPDATE wintig.usuario SET nombre = '$nombre', apellido = '$apellido', tel_usuario = '$tel_usuario', correo_usuario = '$correo_usuario', nom_usuario = '$nom_usuario', estado = '$estado'  WHERE id_usuario = '$id_usuario'";
    pg_query($conexion, $query);
    
}
