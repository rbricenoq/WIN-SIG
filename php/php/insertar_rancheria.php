<?php  
$db = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root"); 

$id_municipio = $_POST['select_id_municipio'];
$nom_rancheria = $_POST['nom_rancheria'];
$cantidad_personas = $_POST['cantidad_personas'];
$representante = $_POST['representante'];
$latitud_r = $_POST['latitud_r'];
$longitud_r = $_POST['longitud_r'];

$query = "INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES ('$id_municipio','$nom_rancheria','$cantidad_personas','$representante',' $latitud_r','$longitud_r')"; 
$result = pg_query($query); 
echo '
<SCRIPT LANGUAGE="javascript">
location.href = "/WIN-TIG/home_recolector.php";
</SCRIPT>
';
?>

