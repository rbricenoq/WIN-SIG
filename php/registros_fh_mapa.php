<?php
	// include Database connection file 
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
if (!$conexion) {
	echo 'Ha ocurrido un erro de conexión con la base de datos.';
	exit;
}
error_reporting(E_ALL ^ E_NOTICE); 

$id_fh_m = $_GET["id_fh"]; 
echo 'Var ' . $id_fh_m ;


	// Design initial table header 
$data = '<div style="overflow-x:auto;"><table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Latitud</th>
<th>Longitud</th>
<th>Tipo</th>
<th>OD</th>
<th>SST</th>
<th>DQO</th>
<th>CE</th>
<th>PH ICA</th>
<th>Nitrogeno</th>
<th>Fosforo</th>
<th>ICA</th>
<th>Estado ICA</th>
<th>Color Aparente</th>
<th>Olor</th>
<th>Sabor</th>
<th>Turbiedad</th>
<th>Conductividad</th>
<th>PH IRCA</th>
<th>Antimonio</th>
<th>Arsenico</th>
<th>Bario</th>
<th>Cadmio</th>
<th>Cianuro Libre Disociable</th>
<th>Cobre</th>
<th>Cromo</th>
<th>Mercurio</th>
<th>Niquel</th>
<th>Plomo</th>
<th>Selenio</th>
<th>Trihalometanos</th>
<th>HAP</th>
<th>COT</th>
<th>Nitritos</th>
<th>Nitratos</th>
<th>Fluoruros</th>
<th>Calcio</th>
<th>Alcalinidad</th>
<th>Cloruros</th>
<th>Aluminio</th>
<th>Dureza</th>
<th>Hierro</th>
<th>Magnesio</th>
<th>Manganeso</th>
<th>Molibdeno</th>
<th>Sulfatos</th>
<th>Zinc</th>
<th>Fosfatos</th>
<th>Cancerígenas, mutagénicas y teratogénicas</th>
<th>Plaguicidas</th>
<th>Escherichia Coli</th>
<th>Coliformes</th>
<th>Microorganismos Mesofilicos</th>
<th>Giardia</th>
<th>Cryptosporidium</th>
<th>Detergente</th>
<th>Sales de Hierro</th>
<th>Sales de Aluminio</th>
<th>IRCA</th>
<th>Esta IRCA</th>
<th>Tipo Acceso </th>
<th>Dias en Buscar Agua</th>
<th>Número Viajes</th>
<th>Cantidad Agua</th>
<th>Timepo Viaje</th>
<th>Distancia</th>
<th>Población con Acceso</th>
<th>Uso</th>
<th>Municipio</th>
<th>Departamento</th>
<tr>';

$result = pg_Exec($conexion,"SELECT * 
	FROM wintig.fuente_hidrica, wintig.tipo_fuente_hidrica, wintig.ica, wintig.irca, wintig.accesibilidad, wintig.tipo_acceso, wintig.uso, wintig.tipo_uso, wintig.rancheria, wintig.municipio, wintig.departamento
	where 
	wintig.fuente_hidrica.id_tipo_fuente_hidrica = wintig.tipo_fuente_hidrica.id_tipo_fuente_hidrica and 
	wintig.fuente_hidrica.id_ica = wintig.ica.id_ica and wintig.fuente_hidrica.id_irca = wintig.irca.id_irca and 
	wintig.fuente_hidrica.id_uso = wintig.uso.id_uso and wintig.fuente_hidrica.id_tipo_fuente_hidrica = wintig.tipo_fuente_hidrica.id_tipo_fuente_hidrica and 
	wintig.uso.id_tipo_uso = wintig.tipo_uso.id_tipo_uso and wintig.fuente_hidrica.id_accesibilidad = wintig.accesibilidad.id_accesibilidad and 
	wintig.accesibilidad.id_tipo_acceso = wintig.tipo_acceso.id_tipo_acceso and wintig.fuente_hidrica.id_rancheria = wintig.rancheria.id_Rancheria and 
	wintig.rancheria.id_municipio = wintig.municipio.id_municipio and wintig.municipio.id_departamento = wintig.departamento.id_departamento and
	wintig.fuente_hidrica.id_fuente_hidrica = '$id_fh_m'");

if (!$result) {
	echo 'Error en la consulta.\n'; 
	exit;
}

if(pg_Num_Rows($result) > 0){
	$number = 1;
	while($row = pg_fetch_assoc($result)){
		$data .= '<tr>	
		<td>'.$row['id_fuente_hidrica'].'</td>
		<td>'.$row['nom_fh'].'</td>
		<td>'.$row['latitud_fh'].'</td>
		<td>'.$row['longitud_fh'].'</td>
		<td>'.$row['nom_tipo_fuente_hidrica'].'</td>
		<td>'.$row['oxigeno_disuelto'].'</td>
		<td>'.$row['solidos_suspendidos'].'</td>
		<td>'.$row['demanda_quimica_oxigeno'].'</td>
		<td>'.$row['conductividad_electrica'].'</td>
		<td>'.$row['ph_ica'].'</td>
		<td>'.$row['nitrogeno_ica'].'</td>
		<td>'.$row['fosforo_ica'].'</td>
		<td>'.$row['calculo_ica'].'</td>
		<td>'.$row['estado_ica'].'</td>
		<td>'.$row['color_aparente'].'</td>
		<td>'.$row['olor'].'</td>
		<td>'.$row['sabor'].'</td>
		<td>'.$row['turbiedad'].'</td>
		<td>'.$row['conductividad'].'</td>
		<td>'.$row['ph_irca'].'</td>
		<td>'.$row['antimonio'].'</td>
		<td>'.$row['arsenico'].'</td>
		<td>'.$row['bario'].'</td>
		<td>'.$row['cadmio'].'</td>
		<td>'.$row['cianuro_libre_disociable'].'</td>
		<td>'.$row['cobre'].'</td>
		<td>'.$row['cromo'].'</td>
		<td>'.$row['mercurio'].'</td>
		<td>'.$row['niquel'].'</td>
		<td>'.$row['plomo'].'</td>
		<td>'.$row['selenio'].'</td>
		<td>'.$row['trihalometanos'].'</td>
		<td>'.$row['hap'].'</td>
		<td>'.$row['cot'].'</td>
		<td>'.$row['nitritos'].'</td>
		<td>'.$row['nitratos'].'</td>
		<td>'.$row['fluoruros'].'</td>
		<td>'.$row['calcio'].'</td>
		<td>'.$row['alcalinidad'].'</td>
		<td>'.$row['cloruros'].'</td>
		<td>'.$row['aluminio'].'</td>
		<td>'.$row['dureza'].'</td>
		<td>'.$row['hierro'].'</td>
		<td>'.$row['magnesio'].'</td>
		<td>'.$row['manganeso'].'</td>
		<td>'.$row['molibdeno'].'</td>
		<td>'.$row['sulfatos'].'</td>
		<td>'.$row['zinc'].'</td>
		<td>'.$row['fosfatos'].'</td>
		<td>'.$row['cmt'].'</td>
		<td>'.$row['plaguicidas'].'</td>
		<td>'.$row['escherichia_coli'].'</td>
		<td>'.$row['coliformes'].'</td>
		<td>'.$row['microorganismos_mesofilicos'].'</td>
		<td>'.$row['giardia'].'</td>
		<td>'.$row['cryptosporidium'].'</td>
		<td>'.$row['detergente'].'</td>
		<td>'.$row['coagulante_sales_hierro'].'</td>
		<td>'.$row['coagulante_aluminio'].'</td>
		<td>'.$row['calculo_irca'].'</td>
		<td>'.$row['estado_irca'].'</td>
		<td>'.$row['nom_tipo_acceso'].'</td>
		<td>'.$row['num_dias_buscar_agua'].'</td>
		<td>'.$row['num_viajes'].'</td>
		<td>'.$row['cantidad_agua'].'</td>
		<td>'.$row['tiempo_viaje'].'</td>
		<td>'.$row['distancia'].'</td>
		<td>'.$row['poblacion_acceso'].'</td>
		<td>'.$row['nom_tipo_uso'].'</td>
		<td>'.$row['nom_municipio'].'</td>
		<td>'.$row['nom_departamento'].'</td>
		</tr>';
		$number++;
	}
}
$data .= '</table></div>';
echo $data;
?>