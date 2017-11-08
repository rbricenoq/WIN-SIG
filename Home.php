<!DOCTYPE html>
<html lang="es">
<head>
	<title>WIN-TIG</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" href="img/favicon.ico" >
	<link href="css/css_home.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link href="css/form_var.css" rel="stylesheet">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php 
//Creamos la conexión con la BD en postgresql
include 'php/conexion.php';
?>
<body>

	<!-- Barra Navegación -->
	<div>
		<ul id="bar_nav">
			<li id="lsita_bar_nav"><a class="active" href="/WIN-TIG/login.php"> <?php echo 'Log in '?></a></li>
			<li id="lsita_bar_nav"><a href="#contacto" data-toggle="modal">Contacto</a></li>
			<li id="lsita_bar_nav"><a href="#cuestionario" data-toggle="modal">Cuestionarios</a></li>
			<li id="lsita_bar_nav"><a href="/WIN-TIG/home.php"><img src="img/LOGO.png" width="20PX" style="text-align: center;"></a></li>
		</ul>	
	</div>
	<!-- Pop-up Contacto  -->
	<div class="modal fade" id="contacto" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">CONTACTO</h4></center>
				</div>
				<div class="modal-body" >
					<div id="logo_wintig" style="text-align: center;">
						<img src="img/LOGO.png" width="30%">
						<a href="http://www.uelbosque.edu.co/">							
							<img src="img/LOGOU.png" width="50%">
						</a>
					</div>
					<h1 id="p-regis" style="text-align: center;">UNIVERSIDAD EL BOSQUE</h1>
					<h2 id="p-regis" style="text-align: center;">FACULTAD DE INGENIRÍA</h2> 
					<h3 id="p-regis" style="text-align: center;">PROGRAMA DE INGENIERÍA DE SISTEMAS</h3><br><br>
					<h4 id="p-regis" style="text-align: center;"> ¿Alguna duda o sugerencia? ¡Contáctenos!</h4><br>
					<h4 style="text-align: center; color: #4682B4;"> rbricenoq@unbosque.edu.co</h4><br>
					<h4 style="text-align: center; color: #4682B4;"> sbarrerof@unbosque.edu.co</h4><br>
					<h4 style="text-align: center; color: #4682B4;"> dpico@unbosque.edu.co</h4><br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
				</div>
			</div>  
		</div>
	</div>

	<!-- Pop-up Acerca de  -->
	<div class="modal fade" id="cuestionario" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">CUESTIONARIOS</h4></center>
				</div>
				<div class="modal-body" >
					Cuestionarios para saber su opinión sobre la aplicación:
					<br><br>
					<A HREF="https://docs.google.com/forms/d/e/1FAIpQLSc6cPJVo-htX-yZvrH4SxMfZGSw75Y4d851-L7716JrRSdG7g/viewform" TARGET="_BLANK"><p>Escala de Usabilidad del Sistema</p></A>
					<A HREF="https://docs.google.com/forms/u/1/d/e/1FAIpQLSdZpIZBJcH62i1TT_bPZzL8y089QmLQsj-BA47xAtUXIdpqfQ/viewform" TARGET="_BLANK"><p>Utilidad, Satisfacción y Facilidad de Uso</p></A>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
				</div>
			</div>  
		</div>
	</div>

	<!-- Pop.up ver registros de Fuentes Hidricas Mapa-->
	<div class="modal fade" id="fuente_hidirica_mapa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
			<div class="modal-content" style="width: 1000px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h3 class="modal-title">FUENTE HÍDRICA</h3></center>
				</div>
				<div class="modal-body" >
					<div class="container">	
						<div class="row">
							<div class="col-md-12">
								<h3>Información:</h3>
								<div class="records_content_f_mapa"></div>
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

	<!-- Contenedor Filtro y Mapa-->

	<div class="container">
		<!-- Logo 
		<div id="logo_wintig" style="text-align: center;">
			<a href="/WIN-TIG/home.php">
				<img src="img/LOGO.png" width="15%">
			</a>
		</div>-->

		<!--Filtros-->

		<nav class="nav_filtros">	

			<!--Busqueda-->
			<div>
				<form class="form-wrapper cf">
					<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
					<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
					<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
					<input type="text"  placeholder="Busqueda..." id ="b1" class = "ui-widget" required>
					<button type="button"  class="btn btn-primary" onclick="filtro_busqueda();" ><i class="glyphicon glyphicon-search"></i></button>
				</form>
			</div>

			<!-- Filtros -->

			<div class="panel_filtros">
				<div class="panel_heading"><br>Fuente Hídrica</br></div>
				<ul class="list-group">
					<li class="list-group-item" value="pozo">
						Pozo
						<div class="material-switch pull-right">
							<input id="pozo" name="Pozo" type="checkbox" onclick="filtros_fuente_hidrica('Pozo');"/>
							<label for="pozo" class="label-primary"></label>
						</div>
					</li>
					<li class="list-group-item" value="jaguey">
						Jagüey
						<div class="material-switch pull-right">
							<input id="jaguey" name="Jagüey" type="checkbox" onclick="filtros_fuente_hidrica('Jagüey');"/>
							<label for="jaguey" class="label-primary"></label>
						</div>
					</li>
					<li class="list-group-item" value="reservorio">
						Reservorio
						<div class="material-switch pull-right">
							<input id="reservorio" name="Reservorio" type="checkbox" onclick="filtros_fuente_hidrica('Reservorio');"/>
							<label for="reservorio" class="label-primary"></label>
						</div>
					</li>
				</ul>
				<div class="panel_heading">Municipio</div>
				<ul class="list-group">
					<li class="list-group-item" value="manaure">
						Manaure
						<div class="material-switch pull-right">
							<input id="manaure_f" name="Manaure" type="checkbox" onclick="filtros_municipio_fuente('Manaure');"/>
							<label for="manaure_f" class="label-primary"></label>
						</div>
					</li>
					<li class="list-group-item" value="maicao">
						Maicao
						<div class="material-switch pull-right">
							<input id="maicao_f" name="Maicao" type="checkbox" onclick="filtros_municipio_fuente('Maicao');"/>
							<label for="maicao_f" class="label-primary"></label>
						</div>
					</li>
				</ul>
				<div class="panel_heading">Rancheria</div>
				<ul class="list-group">
					<li class="list-group-item">
						Manaure
						<div class="material-switch pull-right">
							<input id="manaure" name="Manaure" type="checkbox" onclick="filtros_municipio_rancheria('Manaure');"/>
							<label for="manaure" class="label-primary"></label>
						</div>
					</li>
					<li class="list-group-item">
						Maicao
						<div class="material-switch pull-right">
							<input id="maicao" name="Maicao" type="checkbox" onclick="filtros_municipio_rancheria('Maicao');"/>
							<label for="maicao" class="label-primary"></label>
						</div>
					</li>
				</ul>
				<div class="panel_heading">Indice de Calidad del Agua - ICA</div>
				<ul class="list-group">
					<li class="list-group-item">
						Buena
						<div class="material-switch pull-right">
							<input id="buena" name="Indicador_2" type="checkbox" onclick="filtros_ica('Buena');"/>
							<label for="buena" class="label-primary"></label>
						</div>
					</li>
					<li class="list-group-item">
						Aceptable
						<div class="material-switch pull-right">
							<input id="aceptable" name="Indicador_3" type="checkbox" onclick="filtros_ica('Aceptable');"/>
							<label for="aceptable" class="label-success"></label>
						</div>
					</li>				
					<li class="list-group-item">
						Regular
						<div class="material-switch pull-right">
							<input id="regular" name="Indicador_2" type="checkbox" onclick="filtros_ica('Regular');"/>
							<label for="regular" class="label-info" style="background-color: #FFFF00;"></label>
						</div>
					</li>
					<li class="list-group-item">
						Mala
						<div class="material-switch pull-right">
							<input id="mala" name="Indicador_3" type="checkbox" onclick="filtros_ica('Mala');"/>
							<label for="mala" class="label-warning"></label>
						</div>
					</li>
					<li class="list-group-item">
						Muy Mala
						<div class="material-switch pull-right">
							<input id="muy_mala" name="Indicador_1" type="checkbox" onclick="filtros_ica('Muy Mala');"/>
							<label for="muy_mala" class="label-danger"></label>
						</div>
					</li>
				</ul>
				<div class="panel_heading">índice de Riesgo de la Calidad del Agua para Consumo Humano - IRCA</div>
				<ul class="list-group">
					<li class="list-group-item">
						Sin Riesgo
						<div class="material-switch pull-right">
							<input id="sin_riesgo" name="min_personas" type="checkbox" onclick="filtros_irca('Sin Riesgo');"/>
							<label for="sin_riesgo" class="label-primary"></label>
						</div>
					</li>
					<li class="list-group-item">
						Riesgo Bajo
						<div class="material-switch pull-right">
							<input id="riesgo_bajo" name="med_personas" type="checkbox" onclick="filtros_irca('Riesgo Bajo');"/>
							<label for="riesgo_bajo" class="label-success" style="background-color: #9ACD32;"></label>
						</div>
					</li>
					<li class="list-group-item">
						Riesgo Medio
						<div class="material-switch pull-right">
							<input id="riesgo_medio" name="mas_personas" type="checkbox" onclick="filtros_irca('Riesgo Medio');"/>
							<label for="riesgo_medio" class="label-info" style="background-color: #FFFF00;"></label>
						</div>
					</li>
					<li class="list-group-item">
						Riesgo Alto
						<div class="material-switch pull-right">
							<input id="riesgo_alto" name="med_personas" type="checkbox" onclick="filtros_irca('Riesgo Alto');"/>
							<label for="riesgo_alto" class="label-warning"></label>
						</div>
					</li>
					<li class="list-group-item">
						Inviable Sanitariamente
						<div class="material-switch pull-right">
							<input id="inviable" name="mas_personas" type="checkbox" onclick="filtros_irca('Sanitariamente Inviable');"/>
							<label for="inviable" class="label-danger"></label> 
						</div>
					</li>
				</ul>
			</div>	
		</nav>

		<!--Mapa-->
		<section>
			<div id="map_container"></div>
			<div id="map">
				<?php include("mapa.html");?>
			</div>
			<div id="leyenda"><h3>Leyenda</h3></div>
			<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4yA0gaGzQ9GJgwJ784kt1kUXyeVqZ634&callback=initMap"></script>
		</section>
	</div>

	<!--<div id="particles-js"></div>
		<script src="js/particles.js"></script>-->
		<script src="js/login.js"></script>
		<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="js\script_recolector.js"></script>
	</body>
	</html>
