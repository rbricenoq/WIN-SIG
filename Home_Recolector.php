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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoz1qiEOcBOfBZJujmvJC7MPe5l-ihNr8&callback=initMap" async defer> </script>
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
			<li id="lsita_bar_nav"><a class="active"> <?php echo $_SESSION['username']	?></a></li>
			<li id="lsita_bar_nav"><a href="#contacto" data-toggle="modal">Contacto</a></li>
			<li id="lsita_bar_nav"><a href="#acerca_de">Acerca de</a></li>
			<li id="lsita_bar_nav"><a href="php/logout.php" style="align-content: right">Logout</a></li>
		</ul>
		<?php
	}
	?>

	<!--Contenedor-->
	<div class="container">
		<div id="logo_wintig" style="text-align: center;">
			<a href="/WIN-TIG/home_recolector.php">
				<img src="img/LOGO.png" width="15%">
			</a>
		</div>

		<!--Menu-->

		<nav class="nav_filtros">	
			<div>
				<form class="form-wrapper cf">
					<input type="text" placeholder="Busqueda..." required>
					<button type="submit"  class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
				</form>
			</div>
			<div>
				<button type="submit" id="btn_ag_fh"  class="btn btn-success" href="#variables" data-toggle="modal" title="Tienes que loguearte para poder agregar una fuente hídrica"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Fuente Hídrica</button>
				<br><br>
				<button type="submit" id="btn_edi_fh"  class="btn btn-primary" href="#editar_variables" data-toggle="modal"><i class="glyphicon glyphicon glyphicon-pencil"></i> Editar Fuente Hídrica</button>
				<br><br>
			</div>

			<!--Filtros-->

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
				<?php include("mapa.html");?>
			</div>
			<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4yA0gaGzQ9GJgwJ784kt1kUXyeVqZ634&callback=initMap"></script>
		</section>
	</div>

	<!--Footer-->

	<div id="particles-js"></div>
	<script src="js\particles.js"></script>
	<script src="js\login.js"></script>

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

	<!-- Pop-up Formulario -->

	<div class="modal fade" id="variables" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">AÑADIR NUEVA FUENTE HÍDRICA</h4></center>
				</div>
				<div>
					<div class="row">
						<section>
							<div class="wizard">
								<div class="wizard-inner">
									<div class="connecting-line"></div>
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active">
											<a href="#fuente_hidirica" data-toggle="tab" aria-controls="fuente_hidirica" role="tab" title="" data-original-title="Fuente Hídrica">
												<span class="round-tab">
													<i class="glyphicon glyphicon glyphicon-tint"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#ubicación" data-toggle="tab" aria-controls="ubicación" role="tab" title="Ubicación">
												<span class="round-tab">
													<i class="glyphicon glyphicon glyphicon-map-marker"></i>
												</span>
											</a>
										</li>
										<li role="presentation" class="disabled">
											<a href="#calidad" data-toggle="tab" aria-controls="calidad" role="tab" title="Calidad">
												<span class="round-tab">
													<i class="glyphicon glyphicon glyphicon-heart-empty"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#acceso" data-toggle="tab" aria-controls="acceso" role="tab" title="Acceso">
												<span class="round-tab">
													<i class="glyphicon glyphicon-home"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#comunidad" data-toggle="tab" aria-controls="comunidad" role="tab" title="Comunidad">
												<span class="round-tab">
													<i class="glyphicon glyphicon-user"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="" data-original-title="Complete">
												<span class="round-tab">
													<i class="glyphicon glyphicon-ok"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>

								<form role="form" action="php/insertar_datos.php" method="post">
									<div class="tab-content">
										<div class="tab-pane active" role="tabpanel" id="fuente_hidirica">
											<div class="modal-body">
												<h3>FUENTE HÍDRICA</h3>
												<div class="form-group">
													Seleccione el tipo de fuente hídrica:        
													<select name="selectid_fh" id="s_fh" class="form-control" onChange="getIdFH(this)">  
														<option value="" selected disabled>Tipo</option> 
														<?php
														$fuente = pg_query($conexion, "SELECT id_tipo_fuente_hidrica, nom_tipo_fuente_hidrica FROM wintig.tipo_fuente_hidrica");
														while($row_list=pg_fetch_assoc($fuente)){
															?>                              
															<option value=<?php echo $row_list["id_tipo_fuente_hidrica"]; ?>>
																<?php echo $row_list["nom_tipo_fuente_hidrica"];?>  
															</option>
															<?php
														}                        
														?>
													</select>
													<br>				
													Capacidad:<br>
													<input type="text" class="form-control" name="capacidad"><br>
												</div>

												<h3>UBICACIÓN</h3>
												<div class="form-group">
													Latitud:<br>
													<input type="text" class="form-control" name="latitud"><br>
													Longitud:<br>
													<input type="text" class="form-control" name="longitud"><br>
													Seleccione el municipio:
													<select name="selectid_municipio" id="s_municipio" class="form-control" onChange="getIdMunicipio(this)">
														<option value="" selected disabled>Municipio</option> 
														<?php    
														$municipio = pg_query($conexion, "SELECT id_municipio, nom_municipio FROM wintig.municipio");
														while($row_list=pg_fetch_assoc($municipio)){
															?>
															<option value=<?php echo $row_list["id_municipio"]; ?>>
																<?php echo $row_list["nom_municipio"]; ?> 
															</option>
															<?php
														}
														?>
													</select> 											
												</div>
												<h3>CALIDAD</h3>
												<div class="form-group">
													Oxígeno disuelto (OD):<br>
													<input type="text" class="form-control" name="va_od"><br>
													Sólidos  suspendidos totales (SST):<br>
													<input type="text" class="form-control" name="va_sst"><br>
													Demanda química de oxígeno (DQO):<br>
													<input type="text" class="form-control" name="va_dqo"><br>
													Conductividad eléctrica (C.E):<br>
													<input type="text" class="form-control" name="va_ce"><br>					
													Nivel de acidez PH:
													<input type="text" class="form-control" name="va_ph"><br>
													Nivel de nitrogeno:<br>
													<input type="text" class="form-control" name="va_nitro"><br>					
													Nivel de fosforo:
													<input type="text" class="form-control" name="va_p"><br>
												</div>
												<h3>ACCESO</h3>
												<div class="form-group">
													% de población con acceso a agua limpia:<br>
													<input type="text" class="form-control" name="acc_agua"><br>
													% de población con acceso a sanidad:<br>
													<input type="text" class="form-control" name="acce_sani"><br>
													% de población con acceso a irrigación ajustada por recursos de agua per capita:
													<input type="text" class="form-control" name="acc_irri"><br>
													Uso de la fuente hídrica:
													<input type="text" class="form-control" name="uso"><br>
												</div>
												<h3>COMUNIDAD</h3>
												<div class="form-group">
													Nombre de la comunidad:<br>
													<input type="text" class="form-control" name="nom_comunidad"><br>
													Cantidad de personas en la comunidad<br>
													<input type="text" class="form-control" name="cantidad_personas"><br>
													Nombre del Representante de la comunidad:
													<input type="text" class="form-control" name="representante"><br>
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-primary next-step">Salvar y continuar</button></li>
											</ul>
										</div>														

										<div class="tab-pane" role="tabpanel" id="complete">
											<h3>FORMULARIO COMPLETO</h3>
											<p>Usted ha llenado todos los campos de los formularios satisfactoriamente</p>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="submit" class="btn btn-primary next-step"><i class="glyphicon glyphicon-save"></i>Guardar Datos</button></li>
												<script>													
													$(document).ready(function(){
														$("#registro").onclick(function(){
															$("#fuente_hidirica").modal();
														});
													});
												</script>
											</ul>	
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
							</div>
						</div>
					</div>	

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
					</div>
				</div>
			</div>	
		</body>
		</html>