<?php
if(isset($_POST['id_fuente_hidrica']) && isset($_POST['id_fuente_hidrica']) != "")
{
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
	if (!$conexion) {
		echo 'Ha ocurrido un error de conexión con la base de datos.';
		exit;
	}
	$fh_id = $_POST['id_fuente_hidrica'];
	
	$query1 = "DELETE FROM wintig.fuente_hidrica WHERE id_fuente_hidrica = '$fh_id'";
	$query2 = "DELETE FROM wintig.accesibilidad WHERE id_accesibilidad = '$fh_id'";
	$query3 = "DELETE FROM wintig.ica WHERE id_ica = '$fh_id'";
	$query4 = "DELETE FROM wintig.irca WHERE id_irca = '$fh_id'";
	$query5 = "DELETE FROM wintig.uso WHERE id_uso = '$fh_id'";
	pg_query($conexion,$query1);
	pg_query($conexion,$query2);
	pg_query($conexion,$query3);
	pg_query($conexion,$query4);
	pg_query($conexion,$query5);
}
?>