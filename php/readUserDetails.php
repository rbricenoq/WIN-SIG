<?php
// include Database connection file
include("db_connection.php");
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
if (!$conexion) {
  echo 'Ha ocurrido un error de conexión con la base de datos.';
  exit;
}

// check request
if(isset($_POST['id_usuario']) && isset($_POST['id_usuario']) != ""){
    // get User ID
  $user_id = $_POST['id_usuario'];
    // Get User Details

  $query = "SELECT nombre, apellido, tel_usuario, correo_usuario, nom_usuario FROM wintig.usuario WHERE id_usuario = '$user_id'";
  $result= pg_query($conexion, $query);

  $response = array();
  if(pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
     echo $row[$nom];
     echo $row[$apellido];
     echo $row[$tel_usuario];
     echo $row[$correo_usuario];
     echo $row[$nom_usuario];
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