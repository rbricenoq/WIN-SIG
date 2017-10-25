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

    $id_rancheria = $_POST['id_rancheria'];
    $id_municipio = $_POST['id_municipio'];
    $nom_rancheria = $_POST['nom_rancheria'];
    $cantidad_personas = $_POST['cantidad_personas'];
    $representante = $_POST['representante'];
    $latitud_r = $_POST['latitud_r'];
    $longitud_r = $_POST['longitud_r'];

    // Updaste rancheria detalles
    $query = "UPDATE wintig.rancheria SET id_municipio = '$id_municipio', nom_rancheria = '$nom_rancheria', cantidad_personas = '$cantidad_personas', representante = '$representante', latitud_r = '$latitud_r', longitud_r = '$longitud_r' WHERE id_rancheria = '$id_rancheria'";
    pg_query($conexion, $query);
    
}