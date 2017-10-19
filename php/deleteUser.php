<?php
if(isset($_POST['id_usuario']) && isset($_POST['id_usuario']) != "")
{
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
	if (!$conexion) {
		echo 'Ha ocurrido un error de conexión con la base de datos.';
		exit;
	}
	$user_id = $_POST['id_usuario'];
	
	$query = "DELETE FROM wintig.usuario WHERE id_usuario = '$user_id'";
	pg_query($conexion,$query);
}
?>