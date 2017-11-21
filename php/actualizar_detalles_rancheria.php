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
    $lat_r = $_POST['latitud_r'];
    $lon_r = $_POST['longitud_r'];

    $query_f = pg_Exec($db, "select id_fuente_hidrica, latitud_fh, longitud_fh from wintig.fuente_hidrica where id_rancheria = '$id_rancheria'");

    if(pg_Num_Rows($query_f) > 0){
        while($row = pg_fetch_assoc($query_f)){
            $id_fh = $row['id_fuente_hidrica'];
            $lat_fh = $row['latitud_fh'];
            $long_fh = $row['longitud_fh'];
        }
    }

    $distancia = calcular_distancia($lat_r,$lon_r,$lat_fh,$lon_fh);

    // Updaste rancheria detalles
    $query = "UPDATE wintig.rancheria SET id_municipio = '$id_municipio', nom_rancheria = '$nom_rancheria', cantidad_personas = '$cantidad_personas', representante = '$representante', latitud_r = '$latitud_r', longitud_r = '$longitud_r' WHERE id_rancheria = '$id_rancheria'";

    $query2 = "UPDATE wintig.accesibilidad set distancia = $distancia where wintig.accesibilidad.id_accesibilidad = $id_fh";

    pg_query($conexion, $query);
    
}

function calcular_distancia($lat_r,$lon_r,$lat_fh,$lon_fh){
    $radio = 6378137;
    $dLat = deg2rad($lat_r - $lat_fh);
    $dLong = deg2rad($lon_r - $lon_fh);
    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat_fh)) * cos(deg2rad($lat_r)) * sin($dLong / 2) * sin($dLong / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distancia = ($radio * $c)/1000;
    return $distancia;
}