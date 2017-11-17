<?php
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
if (!$conexion) {
  echo 'Ha ocurrido un error de conexión con la base de datos.';
  exit;
}

// check request
if(isset($_POST['id_fuente_hidrica']) && isset($_POST['id_fuente_hidrica']) != ""){

  $fh_id = $_POST['id_fuente_hidrica'];

  $query = "SELECT * 
  FROM wintig.fuente_hidrica, wintig.tipo_fuente_hidrica, wintig.usuario, wintig.muestra, wintig.ica, wintig.irca, wintig.accesibilidad, wintig.tipo_acceso, wintig.uso, wintig.tipo_uso, wintig.rancheria, wintig.municipio, wintig.departamento
  where 
  wintig.fuente_hidrica.id_fuente_hidrica = '$fh_id'
  and wintig.fuente_hidrica.id_tipo_fuente_hidrica = wintig.tipo_fuente_hidrica.id_tipo_fuente_hidrica 
  and wintig.fuente_hidrica.id_muestra = wintig.muestra.id_muestra 
  and wintig.muestra.id_ica = wintig.ica.id_ica
  and wintig.muestra.id_irca = wintig.irca.id_irca
  and wintig.fuente_hidrica.id_uso = wintig.uso.id_uso
  and wintig.fuente_hidrica.id_tipo_fuente_hidrica = wintig.tipo_fuente_hidrica.id_tipo_fuente_hidrica 
  and wintig.uso.id_tipo_uso = wintig.tipo_uso.id_tipo_uso
  and wintig.fuente_hidrica.id_accesibilidad = wintig.accesibilidad.id_accesibilidad
  and wintig.accesibilidad.id_tipo_acceso = wintig.tipo_acceso.id_tipo_acceso
  and wintig.fuente_hidrica.id_rancheria = wintig.rancheria.id_Rancheria
  and wintig.fuente_hidrica.id_usuario = wintig.usuario.id_usuario
  and wintig.rancheria.id_municipio = wintig.municipio.id_municipio
  and wintig.municipio.id_departamento = wintig.departamento.id_departamento";


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