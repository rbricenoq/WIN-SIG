<?php  

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$db = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");

$query_r = pg_Exec($db, "select latitud_r, longitud_r from wintig.rancheria where wintig.rancheria.id_rancheria = '$_POST[selectid_rancheria]'");
$query_u = pg_Exec($db, "select id_usuario from wintig.usuario where wintig.usuario.nom_usuario = '$_POST[nom_usuario]'");
$query_municipio = pg_Exec($db, "select id_municipio from wintig.municipio where wintig.municipio.id_municipio = '$_POST[selectid_rancheria]'");
$query_id = pg_Exec($db, "select id_fuente_hidrica from wintig.fuente_hidrica");


if(pg_Num_Rows($query_r) > 0){
	while($row = pg_fetch_assoc($query_r)){
		$lat_r = $row['latitud_r'];
		$long_r = $row['longitud_r'];
	}
}

if(pg_Num_Rows($query_u) > 0){
	while($row = pg_fetch_assoc($query_u)){
		$id_usuario = $row['id_usuario'];
	}
}

if(pg_Num_Rows($query_municipio) > 0){
	while($row = pg_fetch_assoc($query_municipio)){
		$id_municipio = $row['id_municipio'];
	}
}

if(pg_Num_Rows($query_id) > 0){
	while($row = pg_fetch_assoc($query_id)){
		$id_fh = $row['id_fuente_hidrica'];
	}
}

//Funciones

$tipo = $_POST[selectid_fh];
$distancia = calcular_distancia($lat_r,$lon_r,$lat_fh,$lon_fh);
$codigo_fh = generar_codigo($tipo,$id_municipio,$id_fh);

echo "<h2>Usuario</h2>";
echo( $id_usuario);
echo( $_POST[usuario]);

echo "<h2>Codigo</h2>";
echo( $codigo_fh);

echo "<h2>Codigo</h2>";
echo( $codigo_fh);

echo "<h2>Distancia:</h2>";
echo($distancia);

function calcular_distancia($lat_r,$lon_r,$lat_fh,$lon_fh){
	$radio = 6378137;
	$dLat = deg2rad($lat_r - $lat_fh);
	$dLong = deg2rad($lon_r - $lon_fh);
	$a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat_fh)) * cos(deg2rad($lat_r)) * sin($dLong / 2) * sin($dLong / 2);
	$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	$distancia = ($radio * $c)/1000;
	return $distancia;
}

function generar_codigo($tipo,$id_municipio,$id_fh){
	$cod_tipo = "";
	$cod_mun = "";
	if ($tipo == 1) {
		$cod_tipo = "P";
	}
	elseif ($tipo == 2) {
		$cod_tipo = "J";
	}
	else {
		$cod_tipo = "R";
	}

	if ($id_municipio == 1) {
		$cod_mun = "Mn";
	}
	else {
		$cod_mun = "Mc";
	}
	$id_fh = $id_fh+1;
	$fechaactual = getdate();
	$codigo_fh = "FH-" . $cod_tipo . "-" . $cod_mun . "-" . $id_fh . "-" . $fechaactual[year];
	return $codigo_fh;
}

// Inserts

$query1 = "INSERT INTO wintig.uso (id_tipo_uso) VALUES ('$_POST[selectid_uso]')"; 

$query2 = "INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES ('$_POST[selectid_acceso]','$_POST[num_dias_buscar_agua]', '$_POST[num_viajes]','$_POST[cantidad_agua]', '$_POST[tiempo_viaje]', $distancia)";

$query3 = "INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh)
VALUES ('$_POST[selectid_fh]', '$_POST[selectid_rancheria]', $id_usuario,'$_POST[nom_fh]', '$_POST[latitud_fh]', '$_POST[longitud_fh]')";  

//$result = pg_query($query1); 
//$result = pg_query($query2); 
//$result = pg_query($query3);
// echo '
// <SCRIPT LANGUAGE="javascript">
// location.href = "/WIN-TIG/home_recolector.php";
// </SCRIPT>
// ';
?>