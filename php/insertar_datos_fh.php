<?php  
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$db = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");

$usuario = $_GET["nombre_usuario"];

$query_u = pg_Exec($db, "select id_usuario from wintig.usuario where wintig.usuario.nom_usuario = '$usuario'");
$query_municipio = pg_Exec($db, "select id_municipio from wintig.municipio where wintig.municipio.id_municipio = '$_POST[selectid_rancheria]'");
$query_id = pg_Exec($db, "select id_fuente_hidrica from wintig.fuente_hidrica");

if(pg_Num_Rows($query_u) > 0){
	while($row = pg_fetch_assoc($query_u)){
		$id_usuario = $row['id_usuario'];;
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
$id_ran = $_POST[selectid_rancheria];
$codigo = generar_codigo($tipo,$id_municipio,$id_fh);

echo "<p> Este es el código que identifica la fuente hídrica que acaba de registrar: <b>" .  $codigo  . "</b>, por favor diligencie este codigo en los documentos donde recopilo la información para identificarlos.</p>";
echo "<p> En unos segundos sera redirigido a la pagina.</p>";

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
	$codigo = "FH-" . $cod_tipo . "-" . $cod_mun . "-" . $id_fh . "-" . $fechaactual[year];
	return $codigo;
}

// Inserts

$ica = "INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica ) VALUES (null, null,null, null, null, null, null, null, null)";

$irca = "INSERT INTO wintig.irca (color_aparente, olor, sabor, turbiedad, conductividad, ph_irca, antimonio, 
arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (null, null, null, null, null, null,  null, null, null, null, null, null, null, null, null, null, null, null, null, null,  null, null,  null,  null, null,  null, null, null,  null, null, null,  null, null, null, null, null,  null, null, null, null, null, null, null, null, null, null, null)";

$muestra = "INSERT INTO wintig.muestra (fecha) VALUES (null)"; 

$uso = "INSERT INTO wintig.uso (id_tipo_uso) VALUES (1)"; 

$acceso = "INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (1, null,null, null, null, null)";

$fuente = "INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh)
VALUES ('$tipo','$id_ran', '$id_usuario', '$_POST[nom_fh]', '$_POST[latitud_fh]', '$_POST[longitud_fh]', '$codigo')"; 

$result = pg_query($ica);
$result = pg_query($irca);
$result = pg_query($muestra);
$result = pg_query($uso);
$result = pg_query($acceso);
$result = pg_query($fuente);
header('Refresh:10; url = http://93.188.162.196/WIN-TIG/Home_Recolector.php'); 
?>