<!DOCTYPE html>
<html lang="es">
<head>
	<title>WIN-TIG</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" >
	<link href="css/css_home.css" rel="stylesheet">
	<link href="css\login.css" rel="stylesheet">
	<link href="css\form_var.css" rel="stylesheet">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/form_var.js"></script>
	<script src="js/google_Map.js"></script>
</head>

<?php 
	//Creamos la conexión con la BD en postgresql
$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");
session_start();

?>
<body>
	<!--Barra Navegacion-->
	<ul id="bar_nav">
		<?php
		if (isset($_SESSION['username'])) {
			?>
			<li id="lsita_bar_nav"><a class="active" > <?php echo $_SESSION['username']?></a></li>
			<li id="lsita_bar_nav"><a href="#contacto" data-toggle="modal">Contacto</a></li>
			<li id="lsita_bar_nav"><a href="#acerca_de">Acerca de</a></li>
			<li id="lsita_bar_nav"><a href="logout.php" style="align-content: right">Logout</a></li>
		</ul>
		<?php
	}
	?>

	<!--Contenedor-->
	<div class="container">
		<div id="logo_wintig" style="text-align: center;">
			<a href="/WIN-TIG/home_admin.php">
				<img src="img/LOGO.png" width="15%">
			</a>
		</div>
		<!--Filtros-->
		<nav class="nav_filtros">	
			<div>
				<form class="form-wrapper cf">
					<input type="text" placeholder="Busqueda..." required>
					<button type="submit"  class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
				</form>
			</div>
			<div>
				<button type="submit" id="btn_edi_usu" class="btn btn-primary" href="#editar_usuarios" data-toggle="modal" ><i class="glyphicon glyphicon-edit"></i> Editar Usuarios</button>
				<br><br>
			</div>
			<!-- Filtros -->
			<div class="filtros">
				<div class="panel panel_filtros">
					<div class="panel_heading">Fuente Hídrica</div>
					<ul class="list-group">
						<li class="list-group-item">
							Pozo
							<div class="material-switch pull-right">
								<input id="f1" name="Pozo" type="checkbox"/>
								<label for="f1" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Jagüey
							<div class="material-switch pull-right">
								<input id="f2" name="Jagüey" type="checkbox"/>
								<label for="f2" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Reservorio
							<div class="material-switch pull-right">
								<input id="f3" name="Reservorio" type="checkbox"/>
								<label for="f3" class="label-primary"></label>
							</div>
						</li>
					</ul>
					<div class="panel_heading">Municipio</div>
					<ul class="list-group">
						<li class="list-group-item">
							Manaure
							<div class="material-switch pull-right">
								<input id="f4" name="Manaure" type="checkbox"/>
								<label for="f4" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Maicao
							<div class="material-switch pull-right">
								<input id="f5" name="Maicao" type="checkbox"/>
								<label for="f5" class="label-primary"></label>
							</div>
						</li>
					</ul>
					<div class="panel_heading">Indice de Calidad del Agua</div>
					<ul class="list-group">
						<li class="list-group-item">
							Indicador 1
							<div class="material-switch pull-right">
								<input id="f6" name="Indicador_1" type="checkbox"/>
								<label for="f6" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Indicador 2
							<div class="material-switch pull-right">
								<input id="f7" name="Indicador_2" type="checkbox"/>
								<label for="f7" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Indicador 3
							<div class="material-switch pull-right">
								<input id="f8" name="Indicador_3" type="checkbox"/>
								<label for="f8" class="label-primary"></label>
							</div>
						</li>
					</ul>
					<div class="panel_heading">Capacidad</div>
					<!-- List group -->
					<ul class="list-group">
						<li class="list-group-item">
							5-10 personas
							<div class="material-switch pull-right">
								<input id="f9" name="min_personas" type="checkbox"/>
								<label for="f9" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							10-20
							<div class="material-switch pull-right">
								<input id="f10" name="med_personas" type="checkbox"/>
								<label for="f10" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Más de 20 personas
							<div class="material-switch pull-right">
								<input id="f11" name="mas_personas" type="checkbox"/>
								<label for="f11" class="label-primary"></label>
							</div>
						</li>
					</ul>
					<div class="panel_heading">Diagnostico</div>
					<!-- List group -->
					<ul class="list-group">
						<li class="list-group-item">
							Bueno
							<div class="material-switch pull-right">
								<input id="f12" name="bueno" type="checkbox"/>
								<label for="f12" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Regular
							<div class="material-switch pull-right">
								<input id="f13" name="regular" type="checkbox"/>
								<label for="f13" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Malo
							<div class="material-switch pull-right">
								<input id="f14" name="malo" type="checkbox"/>
								<label for="f14" class="label-primary"></label>
							</div>
						</li>
					</ul>
				</div>            
			</div>
		</nav>
		<!--Mapa-->
		<section>
			<div id="map"></div>
			<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4yA0gaGzQ9GJgwJ784kt1kUXyeVqZ634&callback=initMap"></script>
		</section>

		<!-- Pop-up Contacto  -->
		<div class="modal fade" id="contacto" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>	
						<center><h4 class="modal-title">CONTACTO</h4></center>
					</div>
					<div class="modal-body" >
						<h4 id="p-regis"> Rbricenoq@unbosque.edu.co</h4><br>
						<h4 id="p-regis"> Sbarrerof@unbosque.edu.co</h4><br>
						<h4 id="p-regis"> Dpico@unbosque.edu.co</h4><br>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
					</div>
				</div>  
			</div>
		</div>	

		<!-- Pop.up Editar Usuarios -->
		<div class="modal fade" id="editar_usuarios" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content" style="width: 150%; margin: inherit;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>	
						<center><h3 class="modal-title">EDITAR USUARIOS</h3></center>
					</div>
					<div class="modal-body" >
						<div class="container">	
							<div class="row">
								<div class="col-md-12">
									<h3>Registros:</h3>
									<div class="records_content"></div>
								</div>
							</div>
						</div>

						<!-- Modal - Update User details -->
						<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Actualizar información del Usuario</h4>
									</div>
									<div class="modal-body">

										<div class="form-group">
											<label for="update_nombre">Nombre</label>
											<input type="text" id="update_nombre" placeholder="" class="form-control"/>
										</div>

										<div class="form-group">
											<label for="update_apellido">Apellido</label>
											<input type="text" id="update_apellido" placeholder="" class="form-control"/>
										</div>

										<div class="form-group">
											<label for="update_tel_usuario">Telefono</label>
											<input type="text" id="update_tel_usuario" placeholder="" class="form-control"/>
										</div>

										<div class="form-group">
											<label for="update_correo_usuario">Correo</label>
											<input type="text" id="update_correo_usuario" placeholder="" class="form-control"/>
										</div>

										<div class="form-group">
											<label for="update_nom_usuario">Usuario</label>
											<input type="text" id="update_nom_usuario" placeholder="" class="form-control"/>
										</div>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										<button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Aceptar</button>
										<input type="hidden" id="hidden_user_id">
									</div>
								</div>
							</div>
						</div>

						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
					</div>
				</div>  
			</div>
		</div>		

		<!-- Pop.up Borar Usuarios -->

		

	</div>  
	<div id="particles-js"></div>
	<script src="js\particles.js"></script>
	<script src="js\login.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap JS file -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Custom JS file -->
	<script type="text/javascript" src="js/script.js"></script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-75591362-1', 'auto');
		ga('send', 'pageview');
	</script>

	<footer id="footer"> Versión beta</footer>
</div>	
</body>
</html>