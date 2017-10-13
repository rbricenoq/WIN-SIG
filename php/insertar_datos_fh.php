<?php  
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$db = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");

//Valores para calcular ICA

$oxigeno_disuelto = $_POST[oxigeno_disuelto];
$oxigeno_saturacion = $_POST[oxigeno_saturacion];
$solidos_suspendidos = $_POST[solidos_suspendidos];
$demanda_quimica_oxigeno = $_POST[demanda_quimica_oxigeno];
$conductividad_electrica = $_POST[conductividad_electrica];
$ph_ica = $_POST[ph_ica];
$nitrogeno_ica = $_POST[nitrogeno_ica];
$fosforo_ica = $_POST[fosforo_ica];
$calculo_ica = $_POST[calculo_ica];

$indice_oxigeno = 0;
$indice_sst = 0;
$indice_demanda_quimica_oxigeno=0;
$indice_conductividad_electrica=0;
$indice_ph=0;
$indice_nt_pt=0;
$ica=0;
$e_ica="";

//Valores para calcular IRCA

if (isset($_POST['olor_check'])) {
	$olor = 0;
} else {
	$olor = 1;
}
if (isset($_POST['sabor_check'])) {
	$sabor = 0;
} else {
	$sabor = 1;
}

$color_aparente = $_POST[color_aparente];
$turbiedad = $_POST[turbiedad];
$conductividad = $_POST[conductividad];
$ph_irca = $_POST[ph_irca]; 
$antimonio = $_POST[antimonio];
$arsenico = $_POST[arsenico];
$bario = $_POST[bario]; 
$cadmio = $_POST[cadmio];
$cianuro_libre_disociable = $_POST[cianuro_libre_disociable];
$cobre = $_POST[cobre];
$cromo = $_POST[cromo];
$mercurio = $_POST[mercurio];
$niquel = $_POST[niquel];
$plomo = $_POST[plomo]; 
$selenio = $_POST[selenio];
$trihalometanos = $_POST[trihalometanos];
$hap = $_POST[hap];
$cot = $_POST[cot]; 
$nitritos = $_POST[nitritos];
$nitratos = $_POST[nitratos]; 
$fluoruros = $_POST[fluoruros]; 
$calcio = $_POST[calcio];
$alcalinidad = $_POST[alcalinidad]; 
$cloruros = $_POST[cloruros]; 
$aluminio = $_POST[aluminio];
$dureza = $_POST[dureza]; 
$hierro = $_POST[hierro];
$magnesio = $_POST[magnesio];
$manganeso = $_POST[manganeso]; 
$molibdeno = $_POST[molibdeno];
$sulfatos = $_POST[sulfatos];
$zinc = $_POST[zinc]; 
$fosfatos  = $_POST[fosfatos];
$caracteristicas_quimicas = $_POST[caracteristicas_quimicas]; 
$plaguicidas = $_POST[plaguicidas];
$escherichia_coli = $_POST[escherichia_coli]; 
$coliformes = $_POST[coliformes];
$microorganismos_mesofilicos = $_POST[microorganismos_mesofilicos];
$giardia = $_POST[giardia];
$cryptosporidium = $_POST[cryptosporidium];
$detergente = $_POST[detergente];
$coagulante_sales_hierro = $_POST[coagulante_sales_hierro];
$coagulante_aluminio = $_POST[coagulante_aluminio]; 
$calculo_irca = 0;
$estado_irca = "";

$i_ox=indice_ox_disuelto($oxigeno_disuelto, $oxigeno_saturacion);
$i_stt=indice_sst($solidos_suspendidos);
$i_do=indice_demanda_oxigeno($demanda_quimica_oxigeno);
$i_ce=indice_conductividad_electrica($conductividad_electrica);
$i_ph=indice_ph($ph_ica);
$i_ntf=indice_nitrogeno_fosfoto($nitrogeno_ica,$fosforo_ica);
$c_ica=calcular_ica($i_ox, $i_stt, $i_do, $i_ce, $i_ph, $i_ntf);
$e_ica=estado_ica($c_ica);

// echo "<h2>Ox Disuelto</h2>";
// echo( $i_ox);

// echo "<h2>SST</h2>";
// echo( $i_stt);

// echo "<h2>DO</h2>";
// echo( $i_do);

// echo "<h2>CE</h2>";
// echo( $i_ce);

// echo "<h2>PH</h2>";
// echo( $i_ph);

// echo "<h2>NF</h2>";
// echo( $i_ntf);

// echo "<h2>ICA</h2>";
// echo( $c_ica);

// echo "<h2>Estado</h2>";
// echo( $e_ica);

//echo "<h2>YA VUELVO!!!!! voy a comer algo</h2>";


function indice_ox_disuelto($oxigeno_disuelto, $oxigeno_saturacion){
	$saturacion_ox_disuelto = ($oxigeno_disuelto/$oxigeno_saturacion);
	if($saturacion_ox_disuelto > 1){
		$indice_oxigeno=1-(0.01*$saturacion_ox_disuelto-1);
	}
	else
		$indice_oxigeno=1-(1-0.01*$saturacion_ox_disuelto);
	return $indice_oxigeno;
}

function indice_sst($solidos_suspendidos){
	if ($solidos_suspendidos<= 4.5) {
		$indice_sst=1;
	}
	elseif ($solidos_suspendidos>=320) {
		$indice_sst=0;
	}
	else
		$indice_sst=1-(-0.02+0.003*$solidos_suspendidos);
	return $indice_sst;
}

function indice_demanda_oxigeno($demanda_quimica_oxigeno){
	if ($demanda_quimica_oxigeno<=20) {
		$indice_demanda_quimica_oxigeno = 0.91;
	}
	elseif ($demanda_quimica_oxigeno>20 and $demanda_quimica_oxigeno <= 25 ) {
		$indice_demanda_quimica_oxigeno = 0.71;
	}
	elseif ($demanda_quimica_oxigeno>25 and $demanda_quimica_oxigeno <= 40 ) {
		$indice_demanda_quimica_oxigeno = 0.51;
	}
	elseif ($demanda_quimica_oxigeno>40 and $demanda_quimica_oxigeno <= 80 ) {
		$indice_demanda_quimica_oxigeno = 0.26;
	}
	else 
		$indice_demanda_quimica_oxigeno = 0.125;
	return $indice_demanda_quimica_oxigeno;
}

function indice_conductividad_electrica($conductividad_electrica){
	if ($indice_conductividad_electrica<0) {
		$indice_conductividad_electrica=0;
	}
	else
		$indice_conductividad_electrica= 1 - pow(10, (-3.26+1.34*log10($conductividad_electrica)));
	return $indice_conductividad_electrica;
}
function indice_ph($ph_ica){
	if ($ph_ica < 4) {
		$indice_ph=0.1;
	}
	elseif($ph_ica >= 4 and $ph_ica <= 7){
		$indice_ph=0.02628419*exp($ph_ica*0.52002);
	}
	elseif($ph_ica > 7 and $ph_ica <= 8){
		$indice_ph=1;
	}
	elseif($ph_ica > 8 and $ph_ica<=11){
		$indice_ph=1*exp(($ph_ica-8)*(-0.5187742));
	}
	else
		$indice_ph=0.1;
	return $indice_ph;
}
function indice_nitrogeno_fosfoto($nitrogeno_ica, $fosforo_ica){
	$indice_nt_pt=$nitrogeno_ica/$fosforo_ica;
	if ($indice_nt_pt >= 15 and $indice_nt_pt <= 20) {
		$indice_nt_pt = 0.8;
	}
	elseif ($indice_nt_pt > 10 and $indice_nt_pt < 15) {
		$indice_nt_pt = 0.6;
	}
	elseif ($indice_nt_pt > 5 and $indice_nt_pt <= 10) {
		$indice_nt_pt = 0.35;
	}
	else
		$indice_nt_pt = 0.15;
	return $indice_nt_pt;
}

function calcular_ica($i_ox, $i_stt, $i_do, $i_ce, $i_ph, $i_ntf){
	$ica= (($i_ox + $i_stt + $i_do + $i_ce + $i_ntf)) * 0.17 + ($i_ph*0.15);
	return $ica;
}

function estado_ica($c_ica){
	if ($c_ica >= 0 and $c_ica <= 0.25) {
		$e_ica = 'Muy mala';
	}
	elseif ($c_ica > 0.26 and $c_ica <= 0.50) {
		$e_ica = "Mala";
	}
	elseif ($c_ica > 0.50 and $c_ica <= 0.70) {
		$e_ica = "Regular";
	}
	elseif ($c_ica > 0.70 and $c_ica <= 0.90) {
		$e_ica = "Aceptable";
	}
	elseif ($c_ica > 0.90 and $c_ica <= 1){
		$e_ica = "Buena";
	}
	else
		$e_ica = "Indice ica erroneo";
	return $e_ica;
}

$query1 = "INSERT INTO wintig.uso (id_tipo_uso) VALUES ('$_POST[selectid_uso]')"; 

$query2 = "INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica ) VALUES ('$_POST[oxigeno_disuelto]','$_POST[solidos_suspendidos]',$_POST[demanda_quimica_oxigeno],'$_POST[conductividad_electrica]','$_POST[ph_ica]', '$_POST[nitrogeno_ica]','$_POST[fosforo_ica]', '$c_ica', '$e_ica')"; 

$query3 = "INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, timepo_viaje, distancia, poblacion_acceso) VALUES ('$_POST[selectid_acceso]','$_POST[num_dias_buscar_agua]', '$_POST[num_viajes]','$_POST[cantidad_agua]', '$_POST[timepo_viaje]', 1, '$_POST[poblacion_acceso]')";

$query4 = "INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_rancheria, nom_fh, latitud_fh, longitud_fh) VALUES ('$_POST[selectid_fh]', '$_POST[selectid_rancheria]' ,'$_POST[nom_fh]', '$_POST[latitud_fh]', '$_POST[longitud_fh]')";  

// $result = pg_query($query1); 
// $result = pg_query($query2); 
// $result = pg_query($query3); 
// $result = pg_query($query4);  
// echo '
// <SCRIPT LANGUAGE="javascript">
// location.href = "/WIN-TIG/home_recolector.php";
// </SCRIPT>
//';
?>