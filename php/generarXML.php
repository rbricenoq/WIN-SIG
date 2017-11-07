<?php
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
require("conexion.php");
$result = pg_query("SELECT * FROM wintig.fuente_hidrica, wintig.tipo_fuente_hidrica, wintig.ica, wintig.irca, wintig.accesibilidad, wintig.tipo_acceso, wintig.uso, wintig.tipo_uso, wintig.rancheria, wintig.municipio where wintig.fuente_hidrica.id_tipo_fuente_hidrica = wintig.tipo_fuente_hidrica.id_tipo_fuente_hidrica and wintig.fuente_hidrica.id_ica = wintig.ica.id_ica and wintig.fuente_hidrica.id_irca = wintig.irca.id_irca and wintig.fuente_hidrica.id_uso = wintig.uso.id_uso and wintig.fuente_hidrica.id_tipo_fuente_hidrica = wintig.tipo_fuente_hidrica.id_tipo_fuente_hidrica and wintig.uso.id_tipo_uso = wintig.tipo_uso.id_tipo_uso and wintig.fuente_hidrica.id_accesibilidad = wintig.accesibilidad.id_accesibilidad and wintig.accesibilidad.id_tipo_acceso = wintig.tipo_acceso.id_tipo_acceso and wintig.fuente_hidrica.id_rancheria = wintig.rancheria.id_Rancheria and wintig.rancheria.id_municipio = wintig.municipio.id_municipio order by id_fuente_hidrica");

header("Content-type: text/xml");

while ($row = @pg_fetch_assoc($result)){
	$node = $dom->createElement("marker_f");
	$newnode = $parnode->appendChild($node);
	$newnode->setAttribute("id", $row['id_fuente_hidrica']);
	$newnode->setAttribute("nombre", $row['nom_fh']);
	$newnode->setAttribute("tipofuente", $row['nom_tipo_fuente_hidrica']);
	$newnode->setAttribute("ica_c", $row['calculo_ica']);
	$newnode->setAttribute("ica_e", $row['estado_ica']);
	$newnode->setAttribute("irca_c", $row['calculo_irca']);
	$newnode->setAttribute("irca_e", $row['estado_irca']);
	$newnode->setAttribute("tipouso", $row['nom_tipo_uso']);
	$newnode->setAttribute("tipoacceso", $row['nom_tipo_acceso']);
	$newnode->setAttribute("dias_buscar_agua", $row['num_dias_buscar_agua']);
	$newnode->setAttribute("numero_viajes", $row['num_viajes']);
	$newnode->setAttribute("cantidad_agua", $row['cantidad_agua']);
	$newnode->setAttribute("tiempo_viaje", $row['tiempo_viaje']);
	$newnode->setAttribute("distancia", $row['distancia']);
	$newnode->setAttribute("acceso_poblacion", $row['poblacion_acceso']);
	$newnode->setAttribute("latitud_fh", $row['latitud_fh']);
	$newnode->setAttribute("longitud_fh", $row['longitud_fh']);  
	$newnode->setAttribute("nom_municipio", $row['nom_municipio']);  
}

$result2 = pg_query("SELECT * FROM wintig.rancheria, wintig.municipio where wintig.rancheria.id_municipio = wintig.municipio.id_municipio");

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