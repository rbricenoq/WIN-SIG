<?php
require("connection.php");
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
$conn_string = "host=localhost port=5432 dbname=wintig user=postgres password=root";
$dbconn = pg_connect($conn_string);
$result = pg_query($dbconn, "SELECT * FROM wintig.fuente_hidrica, wintig.tipo_fuente_hidrica where wintig.fuente_hidrica.id_tipo_fuente_hidrica = wintig.tipo_fuente_hidrica.id_tipo_fuente_hidrica");

header("Content-type: text/xml");

while ($row = @pg_fetch_assoc($result)){
	$node = $dom->createElement("marker_f");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("nombre", $row['nom_fh']);
	$newnode->setAttribute("tipofuente", $row['nom_tipo_fuente_hidrica']);
	$newnode->setAttribute("latitud_fh", $row['latitud_fh']);
	$newnode->setAttribute("longitud_fh", $row['longitud_fh']);
}

$result2 = pg_query($dbconn, "SELECT * FROM wintig.rancheria, wintig.municipio where wintig.rancheria.id_municipio = wintig.municipio.id_municipio");

while ($row = @pg_fetch_assoc($result2)){
	$node = $dom->createElement("marker_r");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("nombre", $row['nom_rancheria']);
	$newnode->setAttribute("municipio", $row['nom_municipio']);
	$newnode->setAttribute("representante", $row['representante']);
	$newnode->setAttribute("cantidad_personas", $row['cantidad_personas']);
	$newnode->setAttribute("latitud", $row['latitud_r']);
	$newnode->setAttribute("longitud", $row['longitud_r']);
}
echo $dom->saveXML();
?>