<?php  
$db = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root"); 
$query = "INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) Values ('$_POST[nombre]','$_POST[apellido]', 2, '$_POST[telefono]','$_POST[email]', '$_POST[nom_usuario]','$_POST[contra1]')";  
$result = pg_query($query); 
echo '
<SCRIPT LANGUAGE="javascript">
	location.href = "/WIN-TIG/home.php";
</SCRIPT>
';
?>