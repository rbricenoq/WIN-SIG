<?php  
$db = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root"); 

$id_municipio = $_POST['select_id_municipio'];
$nom_rancheria = $_POST['nom_rancheria'];
$cantidad_personas = $_POST['cantidad_personas'];
$representante = $_POST['representante'];
$latitud_r = $_POST['latitud_r'];
$longitud_r = $_POST['longitud_r'];

$checkrancheria = pg_query("SELECT nom_rancheria FROM wintig.rancheria WHERE nom_rancheria ='$nom_rancheria'"); 
$rancheria_exist = pg_num_rows($checkrancheria); 

if ($rancheria_exist>0) { 
	echo '
	<SCRIPT LANGUAGE="javascript">
	alert("Esta Rancheria ya esta registrada, intente con otro nombre");
	history.go(-1);
	</SCRIPT>';
	die();

}
else {
	$query = "INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES ('$id_municipio','$nom_rancheria','$cantidad_personas','$representante',' $latitud_r','$longitud_r')"; 

	$result = pg_query($query); 
	echo '
	<SCRIPT LANGUAGE="javascript">
	location.href = "http://93.188.162.196/WIN-TIG/Home_Recolector.php";
	</SCRIPT>';	
}
?>