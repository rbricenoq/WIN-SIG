<?php  
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$db = pg_connect("host=localhost port=5432 dbname=winsig user=postgres password=root"); 

$query1 = "INSERT INTO winsig.capacidad (capacidad_fuente) VALUES ('$_POST[capacidad]')"; 
$query2 = "INSERT INTO winsig.ubicacion (id_municipio, geom) VALUES ('$_POST[selectid_municipio]', ST_GeomFromText('POINT(-8057243 1319861)',4326))"; 

$query3 = "INSERT INTO winsig.calidad (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph, nitrogeno, fosforo ) VALUES ('$_POST[va_od]','$_POST[va_sst]',$_POST[va_dqo],'$_POST[va_ce]','$_POST[va_ph]', '$_POST[va_nitro]','$_POST[va_p]')"; 

$query4 = "INSERT INTO winsig.accesibilidad (poblacion_acceso_agua_limpia, poblacion_acceso_sanidad, poblacion_acceso_agua_per_capita, uso_fuente_hidrica) VALUES ('$_POST[acc_agua]','$_POST[acce_sani]', '$_POST[acc_irri]','$_POST[uso]')";
$query5 = "INSERT INTO winsig.rancheria (nom_rancheria, cantidad_personas, representante) VALUES ('$_POST[nom_rancheria]','$_POST[cantidad_personas]','$_POST[representante]')";
$query6 = "INSERT INTO winsig.fuente_hidrica (id_tipo_fuente_hidrica) VALUES ('$_POST[selectid_fh]')";  

$result = pg_query($query1); 
$result = pg_query($query2); 
$result = pg_query($query3); 
$result = pg_query($query4); 
$result = pg_query($query5); 
$result = pg_query($query6); 
echo '
<SCRIPT LANGUAGE="javascript">
	location.href = "/WIN-SIG/Home_Recolector.php";
</SCRIPT>
';
?>