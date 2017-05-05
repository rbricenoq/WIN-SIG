<!DOCTYPE html>  
<head>  
	<title>Insert data to PostgreSQL with php - creating a simple web application</title>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<style>  
		li {  
			list-style: none;  
		}  
	</style>  
</head>  
<body>  
	<h2>Test</h2>  
	<ul>  
		<form name="insert" action="insertar_usuario.php" method="POST" >  
			<li>Nombre:</li><li><input type="text" name="nombre" /></li>  
			<li>Apellido:</li><li><input type="text" name="apellido" /></li>  
			<li>Telefono:</li><li><input type="text" name="telefono" /></li>  
			<li>Correo:</li><li><input type="text" name="correo" /></li>  
			<li>Username:</li><li><input type="text" name="nom_usuario" /></li>  
			<li>Password1:</li><li><input type="text" name="password1" /></li>
			<li>Password2:</li><li><input type="text" name="password2" /></li>  
			<li><input type="submit" /></li>  
		</form>  
	</ul>  
</body>  
</html>  

<!-- <?php  
$db = pg_connect("host=localhost port=5432 dbname=winsig user=postgres password=root"); 
echo "$_POST[password1] ,";
echo "$_POST[password2]";

if (strcmp($_POST[password1], $_POST[password2]) == 0) {
	$insert = insert($_POST[nombre], $_POST[apellido], $id_tipo_de_usuario = 2, $_POST[telefono], $_POST[correo], $_POST[nom_usuario], $_POST[password1]);
}
else{
	echo "Las contraseñas deben coincidir";
}



function insert($nombre, $apellido, $id_tipo_de_usuario, $telefono, $correo, $nom_usuario, $password1){

	echo "$nombre";
	$query = "INSERT INTO winsig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) Values (nombre, apellido, id_tipo_de_usuario, telefono, correo, nom_usuario, password1)";  
	$result = pg_query($query); 
	/*echo '
	<SCRIPT LANGUAGE="javascript">
		location.href = "/WIN-SIG/Home.php";
	</SCRIPT>
	';*/
}
?>
-->
