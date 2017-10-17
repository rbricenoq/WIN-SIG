<?php
	// include Database connection file 
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root");
if (!$conexion) {
	echo 'Ha ocurrido un erro de conexión con la base de datos.';
	exit;
}
error_reporting(E_ALL ^ E_NOTICE); 

	// Design initial table header 
$data = '<table class="table table-bordered table-striped">
<tr>
<th>ID</th>
<th>Municipio</th>
<th>Nombre Rancheria</th>
<th>Cantidad Personas</th>
<th>Representante</th>
<th>Latitud</th>
<th>Longitud</th>
<th>Actualizar</th>
<th>Borrar</th>
</tr>';

$result = pg_Exec($conexion,'select wintig.rancheria.id_rancheria, wintig.municipio.nom_municipio,wintig.rancheria.nom_rancheria, wintig.rancheria.cantidad_personas, wintig.rancheria.representante, wintig.rancheria.latitud_r, wintig.rancheria.longitud_r  from wintig.rancheria, wintig.municipio where wintig.rancheria.id_municipio = wintig.municipio.id_municipio order by wintig.rancheria.id_rancheria');

if (!$result) {
	echo 'Error en la consulta.\n'; 
	exit;
}
    // if query results contains rows then featch those rows 

if(pg_Num_Rows($result) > 0){
	$number = 1;
	while($row = pg_fetch_assoc($result)){
		$data .= '<tr>				
		<td>'.$row['id_rancheria'].'</td>
		<td>'.$row['nom_municipio'].'</td>
		<td>'.$row['nom_rancheria'].'</td>
		<td>'.$row['cantidad_personas'].'</td>
		<td>'.$row['representante'].'</td>
		<td>'.$row['latitud_r'].'</td>
		<td>'.$row['longitud_r'].'</td>
		<td><button onclick="detalles_rancheria('.$row['id_rancheria'].')" class="btn btn-warning">Editar</button></td>
		<td><button onclick="borrar_rancheria('.$row['id_rancheria'].')" class="btn btn-danger">Eliminar</button></td>
		</tr>';
		$number++;
	}
}
else{
    	// records now found 
	$data .= '<tr><td colspan="9">No hay registros!</td></tr>';
}
$data .= '</table>';
echo $data;
?>