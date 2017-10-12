<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="css\login.css" rel="stylesheet">
	<link rel="icon" href="img/favicon.ico" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>Login</title>
</head>

<?php 
	//Creamos la conexión con la BD en postgresql
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");
	//desconectamos la base de datos
$close = pg_close($conexion) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
	//pg_set_client_encoding($conexion, "utf8");
?>

<body>
	<div class="container"> 
		<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
			<div id="logo_wintig" style="text-align: center";>
			<a href="/WIN-TIG/Home.php">
				<img src="img/LOGO.png" height="50%" width="50%">
			</a>				
		</div>
		<div class="panel panel-default" >
			<div class="panel-body" >
				<form name="formulario" id="form" class="form-horizontal" enctype="multipart/form-data" action="php/validar_usuario.php" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="user" type="text" class="form-control" name="usuario" value="" placeholder="Usuario" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
					</div>
					<div class="form-group">
						<div class="col-sm-12 controls menu_botones">
							<button type="submit"  class="btn btn-primary "><i class="glyphicon glyphicon-log-in"></i> Iniciar Sesión</button>
							<br><br>
							<a href="indexContrasena.html" id="olvido_contra" data-transition="flow">¿Has olvidado tu contraseña?</a>
							<br><br>
							<p id="p-regis"><b>¿No tienes cuenta?</b></p><a href="#form_regis" id="registro" data-toggle="modal">Registrarse</a>
						</div>
					</div>
				</form>
				<div>
				</div>
			</div>
		</div>
	</div>

	<!-- Formulario registro de usuario -->
	<div class="modal fade" id="form_regis" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">REGISTRO WIN-TIG</h4></center>
				</div>
				<div class="modal-body">
					<form name="insertar" action="php/insertar_usuario.php" method="post"> 
						<div class="form-group">
							Nombre:<br>
							<input type="text" class="form-control" name="nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo se permiten letras y vocales" required><br>
							Apellidos:<br>
							<input type="text" class="form-control" name="apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo se permiten letras y vocales" required><br>
							Telefono:
							<input type="text" class="form-control" name="telefono" pattern="[0-9]{7,10}+" title="Ingresa un número válido: 7 dígitos para casa u oficina, 10 dígitos para celulares" required><br>
							Correo Electrónico:
							<input type="email" class="form-control" name="email" title="Agregue una dirección de correo electrónico como user@example.com" required><br>
							Nombre de Usuario:
							<input type="text" class="form-control" name="nom_usuario"  pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ@_-&\s]+" title="Ingresa el nombre de usuario con el que serás identificad@" required><br>
							Contraseña:
							<input type="password" class="form-control" name="contra1" required><br>
							Confirmar contraseña:
							<input type="password" class="form-control" name="contra2" required><br>
							<button type="submit"  class="btn btn-primary  btn-lg center-block"><span class="glyphicon glyphicon-save"></span> Registrar</button>  
							<script>
								$(document).ready(function(){
									$("#registro").onclick(function(){
										$("#form_regis").modal();
									});
								});
							</script> 
						</div>
					</form> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>  
		</div>
	</div>
	<div id="particles-js"></div>
	<script src="js\particles.js"></script>
	<script src="js\login.js"></script>
</body>
</html>  