<?php  
$db = pg_connect("host=localhost port=5432 dbname=winsig user=postgres password=root"); 
echo "$_POST[password1],";
echo "$_POST[password2]";

	$query = "INSERT INTO winsig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) Values ('$_POST[nombre]','$_POST[apellido]', 2, '$_POST[telefono]','$_POST[correo]', '$_POST[nom_usuario]','$_POST[password1]')";  
	$result = pg_query($query); 
	echo '
	<SCRIPT LANGUAGE="javascript">
		location.href = "/WIN-SIG/Home.php";
	</SCRIPT>
	';
?>