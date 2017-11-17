<?php  

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$db = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");

$id_fh = $_POST[select_id_fuente_hidrica_acceso_uso];

$query_r = pg_Exec($db, "select r.latitud_r, r.longitud_r from wintig.rancheria as r, wintig.fuente_hidrica as f
	where f.id_rancheria = '$_POST[select_id_fuente_hidrica_acceso_uso]' and r.id_rancheria = '$_POST[select_id_fuente_hidrica_acceso_uso]'");
$query_f = pg_Exec($db, "select latitud_fh, longitud_fh from wintig.fuente_hidrica where id_fuente_hidrica = '$_POST[select_id_fuente_hidrica_acceso_uso]'");

if(pg_Num_Rows($query_r) > 0){
	while($row = pg_fetch_assoc($query_r)){
		$lat_r = $row['latitud_r'];
		$long_r = $row['longitud_r'];
	}
}

if(pg_Num_Rows($query_f) > 0){
	while($row = pg_fetch_assoc($query_f)){
		$lat_f = $row['latitud_fh'];
		$long_f = $row['longitud_fh'];
	}
}


//Funciones


$distancia = calcular_distancia($lat_r,$lon_r,$lat_fh,$lon_fh);

function calcular_distancia($lat_r,$lon_r,$lat_fh,$lon_fh){
	$radio = 6378137;
	$dLat = deg2rad($lat_r - $lat_fh);
	$dLong = deg2rad($lon_r - $lon_fh);
	$a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat_fh)) * cos(deg2rad($lat_r)) * sin($dLong / 2) * sin($dLong / 2);
	$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	$distancia = ($radio * $c)/1000;
	return $distancia;
}

// Inserts

$query1 = "UPDATE wintig.uso SET id_tipo_uso = '$_POST[selectid_uso]' where wintig.uso.id_uso = $id_fh"; 

$query2 = "UPDATE wintig.accesibilidad set id_tipo_acceso = '$_POST[selectid_acceso]', num_dias_buscar_agua = '$_POST[num_dias_buscar_agua]', num_viajes = '$_POST[num_viajes]', cantidad_agua = '$_POST[cantidad_agua]', tiempo_viaje = '$_POST[tiempo_viaje]', distancia = $distancia where wintig.accesibilidad.id_accesibilidad = $id_fh";
 

$result = pg_query($query1);
$result = pg_query($query2);
echo '
<SCRIPT LANGUAGE="javascript">
location.href = "/WIN-TIG/Home_Recolector.php";
</SCRIPT>
';
?>