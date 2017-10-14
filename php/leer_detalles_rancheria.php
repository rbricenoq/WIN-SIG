<?php
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
if (!$conexion) {
  echo 'Ha ocurrido un error de conexión con la base de datos.';
  exit;
}

// check request
if(isset($_POST['id_racncheria']) && isset($_POST['id_racncheria']) != ""){

  $rancheria_id = $_POST['id_racncheria'];

  $query = "SELECT wintig.municipio.nom_municipio, wintig.rancheria.nom_rancheria, wintig.rancheria.cantidad_personas, wintig.rancheria.representante, wintig.rancheria.latitud_r, wintig.rancheria.longitud_r  from wintig.rancheria, wintig.municipio WHERE wintig.rancheria.id_rancheria = '$rancheria_id' and wintig.municipio.id_municipio = wintig.rancheria.id_municipio ";

  $result= pg_query($conexion, $query);

  $response = array();
  if(pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
     $response = $row;
   }
 }
 else{
  $response['status'] = 200;
  $response['message'] = "No hay registros!";
}
    // display JSON data
echo json_encode($response);
}

else{
  $response['status'] = 200;
  $response['message'] = "Error de consulta!";
}