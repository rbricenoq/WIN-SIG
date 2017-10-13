<?php  
$db = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root"); 

$query = "INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES ('$_POST[selectid_municipio]','$_POST[nom_rancheria]', '$_POST[cantidad_personas]','$_POST[representante]', '$_POST[latitud_r]','$_POST[longitud_r]')"; 
$result = pg_query($query); 
echo '
<SCRIPT LANGUAGE="javascript">
	location.href = "/WIN-TIG/home_recolector.php";
</SCRIPT>
';
?>