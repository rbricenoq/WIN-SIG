<?php
if(isset($_POST['id_rancheria']) && isset($_POST['id_rancheria']) != "")
{
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
	if (!$conexion) {
		echo 'Ha ocurrido un error de conexión con la base de datos.';
		exit;
	}
	$rancheria_id = $_POST['id_rancheria'];
	
	$query = "DELETE FROM wintig.rancheria WHERE id_rancheria = '$rancheria_id'";
	pg_query($conexion,$query);

	if($query){ 
	}
	else{ 
		echo '
		<SCRIPT LANGUAGE="javascript">
		alert("No se puede eliminar la Rancheria porque esta asociada a una Fuente Hidrica");
		history.go(-1);
		</SCRIPT>';
		die(); 
	} 

}
?>