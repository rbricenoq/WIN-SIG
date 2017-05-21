<!DOCTYPE html>
<html lang="es">
<head>
	<title>WIN-SIG</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" >
	<link href="css/css_home.css" rel="stylesheet">
	<link href="css\login.css" rel="stylesheet">
	<link href="css\index.css" rel="stylesheet">
	<link href="css\form_var.css" rel="stylesheet">	
	<link rel="stylesheet" href="css/ol.css" />
	<link rel="stylesheet" href="css/horsey.min.css">
	<link rel="stylesheet" href="css/ol3-search-layer.min.css">
	<link rel="stylesheet" href="css/ol3-layerswitcher.css">
	<link rel="stylesheet" href="css/qgis2web.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoz1qiEOcBOfBZJujmvJC7MPe5l-ihNr8&callback=initMap" async defer> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/form_var.js"></script>


</head>

<?php 
//Creamos la conexión con la BD en postgresql
$conexion = pg_connect("host=localhost port=5432 dbname=winsig user=postgres password=root") 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

session_start();
?>
<body>
	<!--Barra Navegacion-->
	<ul id="bar_nav">
		<li id="lsita_bar_nav"><a class="active" href="/WIN-SIG/Login.php"> Log in</a></li>
		<li id="lsita_bar_nav"><a href="#contacto" data-toggle="modal">Contacto</a></li>
		<li id="lsita_bar_nav"><a href="#acerca_de">Acerca de</a></li>
	</ul>
	<?php

	echo 'Bienvenido ';
	if (isset($_SESSION['username'])) {
		echo '<b>'.$_SESSION['username'].'</b>.';
		echo '<p><a href="logout.php">Logout</a></p>';

	}
	?>
	<!--Contenedor-->
	<div class="container">
		<div id="logo_WINSIG">
			<a href="/WIN-SIG/Home.php">
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
				<button type="submit" id="btn_ag_fh"  class="btn btn-primary" href="#variables" data-toggle="modal" title="Tienes que loguearte para poder agregar una fuente hídrica"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Fuente Hídrica</button>
				<br><br>
				<button type="submit" id="btn_edi_fh"  class="btn btn-primary"><i class="glyphicon glyphicon glyphicon-pencil"></i> Editar Fuente Hídrica</button>
				<br><br>
				<button type="submit" id="btn_edi_usu"  class="btn btn-primary" style="display: none;"><i class="glyphicon glyphicon glyphicon-edit"></i> Editar Usuarios</button>
				<br><br>
			</div>
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
			<div id="map">
				<div id="popup" class="ol-popup">
					<a href="#" id="popup-closer" class="ol-popup-closer"></a>
					<div id="popup-content"></div>
				</div>
			</div>
			<script src="js/qgis2web_expressions.js"></script>
			<script src="js/polyfills.js"></script>
			<script src="js/ol.js"></script>
			<script src="http://cdn.polyfill.io/v2/polyfill.min.js?features=Element.prototype.classList,URL"></script>
			<script src="js/horsey.min.js"></script>
			<script src="js/ol3-search-layer.min.js"></script>
			<script src="js/ol3-layerswitcher.js"></script>
			<script src="js/ubicacion0.js"></script>
			<script src="js/ubicacion0_style.js"></script>
			<script src="js/layers.js" type="text/javascript"></script> 
			<script src="js/qgis2web.js"></script>
			<script src="js/Autolinker.min.js"></script>
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

		
	

		<!--Filtros-->
		
		<div id="particles-js"></div>
		<script src="js\particles.js"></script>
		<script src="js\login.js"></script>
		<footer id="footer"> Versión beta</footer>
	</div>	
</body>
</html>