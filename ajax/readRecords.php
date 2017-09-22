<?php
	// include Database connection file 
include("db_connection.php");
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
<th>Nombre</th>
<th>Apellido</th>
<th>Telefono</th>
<th>Correo</th>
<th>Usuario</th>
<th>Update</th>
<th>Delete</th>
</tr>';

$result = pg_Exec($conexion,'SELECT * FROM wintig.usuario where id_tipo_de_usuario = 2 ORDER BY id_usuario');

if (!$result) {
	echo 'Erro en la consulta.\n'; 
	exit;
}

    // if query results contains rows then featch those rows 

if(pg_Num_Rows($result) > 0){
	$number = 1;
	while($row = pg_fetch_assoc($result)){
		$data .= '<tr>				
		<td>'.$row['id_usuario'].'</td>
		<td>'.$row['nom_usuario'].'</td>
		<td>'.$row['apellido'].'</td>
		<td>'.$row['tel_usuario'].'</td>
		<td>'.$row['correo_usuario'].'</td>
		<td>'.$row['nom_usuario'].'</td>
		<td>
		<button onclick="GetUserDetails('.$row['id_usuario'].')" class="btn btn-warning">Editar</button>
		</td>
		<td>
		<button onclick="DeleteUser('.$row['id_usuario'].')" class="btn btn-danger">Eliminar</button>
		</td>
		</tr>';
		$number++;
	}
}
else{
    	// records now found 
	$data .= '<tr><td colspan="6">No hay registros!</td></tr>';
}
$data .= '</table>';
echo $data;
?>