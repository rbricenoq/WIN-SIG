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
				<button type="submit" id="btn_ag_fh"  class="btn btn-success" href="#form_variables" data-toggle="modal" title="Tienes que loguearte para poder agregar una fuente hídrica"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Fuente Hídrica</button>
				<br><br>
				<button type="submit" id="btn_edi_fh"  class="btn btn-primary" href="#registros_fuente_hidirica" data-toggle="modal"><i class="glyphicon glyphicon glyphicon-pencil"></i> Editar Fuente Hídrica</button>
				<br><br>
				<button type="submit" id="btn_ag_rc"  class="btn btn-success" href="#form_rancheria" data-toggle="modal" title="Tienes que loguearte para poder agregar una Rancheria"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Rancheria</button>
				<br><br>
				<button type="submit" id="btn_edi_rc"  class="btn btn-primary" href="#registros_rancheria" data-toggle="modal"><i class="glyphicon glyphicon glyphicon-pencil"></i> Editar Rancheria</button>
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

	<!-- Pop-up Rancheria  -->
	<div class="modal fade" id="form_rancheria" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">RANCHERIA</h4></center>
				</div>
				<div class="modal-body">
					<form name="insertar" action="php/insertar_rancheria.php" method="post"> 
						<div class="form-group">
							Seleccione el municipio donde se encuentra la rancheria:
							<select name="selectid_municipio" id="id_municipio" class="form-control" onChange="getIdMunicipio(this)">  
								<option value="" selected disabled>Municipio</option> 
								<?php
								$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
								or die("Ha sucedido un error inesperado en la conexion de la base de datos");
								$municipio = pg_query($conexion, "SELECT id_municipio, nom_municipio FROM wintig.municipio");
								while($row_list=pg_fetch_assoc($municipio)){
									?>                              
									<option value=<?php echo $row_list["id_municipio"]; ?>>
										<?php echo $row_list["nom_municipio"];?>  
									</option>
									<?php
								}                        
								?>
							</select><br>
							Nombre de la rancheria:<br>
							<input type="text" class="form-control" name="nom_rancheria"><br>
							Cantidad de personas:<br>
							<input type="text" class="form-control" name="cantidad_personas"><br>
							Nombre del representante:
							<input type="text" class="form-control" name="representante"><br>
							Latitud:<br>
							<input type="text" class="form-control" name="latitud_r"><br>
							Longitud:<br>
							<input type="text" class="form-control" name="longitud_r"><br>
							<button type="submit"  class="btn btn-primary  btn-lg center-block"><span class="glyphicon glyphicon-save"></span> Guardar</button>  
							<script>
								$(document).ready(function(){
									$("#registro").onclick(function(){
										$("#form_rancheria").modal();
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

	<!-- Pop-up Variables  -->
	<div class="modal fade" id="form_variables" role="dialog">
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
											<a href="#rancheria" data-toggle="tab" aria-controls="rancheria" role="tab" title="Rancheria">
												<span class="round-tab">
													<i class="glyphicon glyphicon-home"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#fuente_hidirica" data-toggle="tab" aria-controls="fuente_hidirica" role="tab" title="Fuente Hídrica">
												<span class="round-tab">
													<i class="glyphicon glyphicon-tint"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#uso_accesibilidad" data-toggle="tab" aria-controls="uso_accesibilidad" role="tab" title="Uso_Accesibilidad">
												<span class="round-tab">
													<i class="glyphicon glyphicon-map-marker"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#ica" data-toggle="tab" aria-controls="ica" role="tab" title="ICA (Índice de Calida de Agua)">
												<span class="round-tab">
													<i class="glyphicon glyphicon-heart-empty"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#irca" data-toggle="tab" aria-controls="irca" role="tab" title="IRCA (Índice de Riesgo de la Calidad del Agua para Consumo Humano)">
												<span class="round-tab">
													<i class="glyphicon glyphicon-heart"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Enviar">
												<span class="round-tab">
													<i class="glyphicon glyphicon-ok"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>

								<form role="form" action="php/insertar_datos_fh.php" method="post">
									<div class="tab-content">
										<!-- Formulario Rancheria -->
										<div class="tab-pane active" role="tabpanel" id="rancheria">
											<h3>RANCHERIA</h3>
											<div class="modal-body">
												<div class="form-group">
													Seleccione la rancheria relacionada a la fuente hídrica:
													<select name="selectid_rancheria" id="id_rancheria" class="form-control" onChange="getIdRancheria(this)">  
														<option value="" selected disabled>Rancheria</option> 
														<?php
														$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
														or die("Ha sucedido un error inesperado en la conexion de la base de datos");
														$rancheria = pg_query($conexion, "SELECT id_rancheria, nom_rancheria FROM wintig.rancheria");
														while($row_list=pg_fetch_assoc($rancheria)){
															?>                              
															<option  value=<?php echo $row_list["id_rancheria"]; ?>>
																<?php echo $row_list["nom_rancheria"];?>  
															</option>
															<?php
														}                        
														?>
													</select><br>														
												</div>
											</div>
											<ul class="list-inline pull-right">												
												<li><button type="button" class="btn btn-primary next-step">Salvar y continuar</button></li>
											</ul>
										</div>	
										<!-- Formulario Fuente Hidrica -->
										<div class="tab-pane" role="tabpanel" id="fuente_hidirica">
											<div class="modal-body">
												<h3>FUENTE HÍDRICA</h3>
												<div class="form-group">
													Seleccione el tipo de fuente hídrica:        
													<select name="selectid_fh" id="s_fh" class="form-control" onChange="getIdFh(this)">  
														<option value="" selected disabled>Tipo</option> 
														<?php
														$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
														or die("Ha sucedido un error inesperado en la conexion de la base de datos");
														$fuente = pg_query($conexion, "SELECT id_tipo_fuente_hidrica, nom_tipo_fuente_hidrica FROM wintig.tipo_fuente_hidrica");
														while($row_list=pg_fetch_assoc($fuente)){
															?>                              
															<option value=<?php echo $row_list["id_tipo_fuente_hidrica"]; ?>>
																<?php echo $row_list["nom_tipo_fuente_hidrica"];?>  
															</option>
															<?php
														}                        
														?>
													</select><br>
													Nombre:<br>
													<input type="text" class="form-control" name="nom_fh"><br>
													Latitud:<br>
													<input type="text" class="form-control" name="latitud_fh"><br>
													Longitud:<br>
													<input type="text" class="form-control" name="longitud_fh"><br>
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="button" class="btn btn-primary next-step">Salvar y continuar</button></li>
											</ul>
										</div>
										<!-- Formulario Uso y Accesibilidad -->
										<div class="tab-pane" role="tabpanel" id="uso_accesibilidad">
											<h3>USO Y ACCESIBILIDAD</h3>
											<div class="modal-body">
												<div class="form-group">
													Seleccione el uso de la fuente hídrica:
													<select name="selectid_uso" id="tipo_uso" class="form-control" onChange="getIdUso(this)">  
														<option value="" selected disabled>Uso</option> 
														<?php
														$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
														or die("Ha sucedido un error inesperado en la conexion de la base de datos");
														$uso = pg_query($conexion, "SELECT id_tipo_uso, nom_tipo_uso FROM wintig.tipo_uso");
														while($row_list=pg_fetch_assoc($uso)){
															?>                              
															<option value=<?php echo $row_list["id_tipo_uso"]; ?>>
																<?php echo $row_list["nom_tipo_uso"];?>  
															</option>
															<?php
														}                        
														?>
													</select><br>
													Seleccione la localización de la fuente hídrica:
													<select name="selectid_acceso" id="tipo_acceso" class="form-control" onChange="getIdAcceso(this)">  
														<option value="" selected disabled>Acceso</option> 
														<?php
														$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
														or die("Ha sucedido un error inesperado en la conexion de la base de datos");
														$acceso = pg_query($conexion, "SELECT id_tipo_acceso, nom_tipo_acceso FROM wintig.tipo_acceso");
														while($row_list=pg_fetch_assoc($acceso)){
															?>                              
															<option value=<?php echo $row_list["id_tipo_acceso"]; ?>>
																<?php echo $row_list["nom_tipo_acceso"];?>  
															</option>
															<?php
														}                        
														?>
													</select><br>
													Número de dias que buscan agua por semana:<br>
													<input type="text" class="form-control" name="num_dias_buscar_agua"><br>
													Número de viajes que se realizan en el día en busca de agua:<br>
													<input type="text" class="form-control" name="num_viajes"><br>
													Cantidad de agua recolectada en el dia (Lt):<br>
													<input type="text" class="form-control" name="cantidad_agua"><br>
													Tiempo total para la recolección del agua (Tiempo de ida + espera + regreso):<br>
													<input type="text" class="form-control" name="timepo_viaje"><br>
													Cantidad de personas que utilizan la fuente hídrica:<br>
													<input type="text" class="form-control" name="poblacion_acceso"><br>
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="button" class="btn btn-primary next-step">Salvar y continuar</button></li>
											</ul>
										</div>
										<!-- Formulario ICA -->
										<div class="tab-pane" role="tabpanel" id="ica">
											<h3>Índice de Calidad de Agua - ICA</h3>
											<div class="modal-body">
												<div class="form-group">
													Oxígeno disuelto (OD):<br>
													<input type="text" class="form-control" name="oxigeno_disuelto"><br>
													Oxígeno de Saturación (OS):<br>
													<input type="text" class="form-control" name="oxigeno_saturacion"><br>
													Sólidos  suspendidos totales (SST):<br>
													<input type="text" class="form-control" name="solidos_suspendidos"><br>
													Demanda química de oxígeno (DQO):
													<input type="text" class="form-control" name="demanda_quimica_oxigeno"><br>
													Conductividad eléctrica (C.E):
													<input type="text" class="form-control" name="conductividad_electrica"><br>
													Nivel de acidez (PH):
													<input type="text" class="form-control" name="ph_ica"><br>
													Nitrógeno:
													<input type="text" class="form-control" name="nitrogeno_ica"><br>
													Fósforo:
													<input type="text" class="form-control" name="fosforo_ica"><br>
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="button" class="btn btn-primary next-step">Salvar y continuar</button></li>
											</ul>
										</div>
										<!-- Formulario IRCA -->
										<div class="tab-pane" role="tabpanel" id="irca">
											<h3>Índice de Riesgo de la Calidad del Agua para Consumo Humano -IRCA</h3>
											<div class="modal-body">
												<div class="form-group">
													<h4><b>CARACTERÍSTICAS FÍSICAS</b></h4>
													Color Aparente (Unidades de PLanito Cobalto - UPC):<br>
													<input type="text" class="form-control" name="color_aparente"><br>
													¿Olor aceptable?<br>
													Aceptable: <input type="checkbox" id="olor_check" name="olor_check" value="0"><br><br>
													¿Sabor aceptable?<br>
													Aceptable: <input type="checkbox" id="sabor_check" name="sabor_check" value="0"><br><br>
													Turbiedad (UNT):
													<input type="text" class="form-control" name="turbiedad"><br>
													Conductividad eléctrica (C.E):
													<input type="text" class="form-control" name="conductividad"><br>
													Nivel de acidez (PH):
													<input type="text" class="form-control" name="ph_irca"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE SUSTANCIAS QUE TIENEN RECONOCIDO EFECTO ADVERSO EN LA SALUD HUMANA</b></h4>
													Antimonio:
													<input type="text" class="form-control" name="antimonio"><br>
													Arsénico:
													<input type="text" class="form-control" name="arsenico"><br>
													Barío:
													<input type="text" class="form-control" name="bario"><br>
													Cadmio:
													<input type="text" class="form-control" name="cadmio"><br>
													Cianuro libre y disociable:
													<input type="text" class="form-control" name="cianuro_libre_disociable"><br>
													Cobre:
													<input type="text" class="form-control" name="cobre"><br>
													Cromo:
													<input type="text" class="form-control" name="cromo"><br>
													Mercurio:
													<input type="text" class="form-control" name="mercurio"><br>
													Niquel:
													<input type="text" class="form-control" name="niquel"><br>
													Plomo:
													<input type="text" class="form-control" name="plomo"><br>
													Selenio:
													<input type="text" class="form-control" name="selenio"><br>
													Trihalometanos:
													<input type="text" class="form-control" name="trihalometanos"><br>
													Hidrocarburos Aromáticos Policíclicos (HAP):
													<input type="text" class="form-control" name="hap"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE SUSTANCIAS QUE TIENEN IMPLICACIONES SOBRE LA SALUD HUMANA</b></h4>
													Carbono Orgánico Total (COT):
													<input type="text" class="form-control" name="cot"><br>
													Nitritos:
													<input type="text" class="form-control" name="nitritos"><br>
													Nitratos:
													<input type="text" class="form-control" name="nitratos"><br>
													Fluoruros:
													<input type="text" class="form-control" name="fluoruros"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS QUE TIENEN CONSECUENCIAS ECONÓMICAS E INDIRECTAS SOBRE LA SALUD HUMANA</b></h4>
													Calcio:
													<input type="text" class="form-control" name="calcio"><br>
													Alcalinidad:
													<input type="text" class="form-control" name="alcalinidad"><br>
													Cloruros:
													<input type="text" class="form-control" name="cloruros"><br>
													Aluminio:
													<input type="text" class="form-control" name="aluminio"><br>
													Dureza:
													<input type="text" class="form-control" name="dureza"><br>
													Hierro:
													<input type="text" class="form-control" name="hierro"><br>
													Magnesio:
													<input type="text" class="form-control" name="magnesio"><br>
													Manganeso:
													<input type="text" class="form-control" name="manganeso"><br>
													Molibdeno:
													<input type="text" class="form-control" name="molibdeno"><br>
													Sulfatos:
													<input type="text" class="form-control" name="sulfatos"><br>
													Zinc:
													<input type="text" class="form-control" name="zinc"><br>
													Fosfatos:
													<input type="text" class="form-control" name="fosfatos"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS RELACIONADAS CON LOS PLAGUICIDAS Y OTRAS SUSTANCIAS</b></h4>
													Cancerígenas, mutagénicas y teratogénicas:
													<input type="text" class="form-control" name="cmt"><br>
													Plaguicidas:
													<input type="text" class="form-control" name="plaguicidas"><br>
													<h4><b>CARACTERÍSTICAS MICROBIOLÓGICAS</b></h4>
													Escherichia Coli:
													<input type="text" class="form-control" name="escherichia_coli"><br>
													Coliformes:
													<input type="text" class="form-control" name="coliformes"><br>
													Microorganismos mesofilicos:
													<input type="text" class="form-control" name="microorganismos_mesofilicos"><br>
													Giardia:
													<input type="text" class="form-control" name="giardia"><br>
													Cryptosporidium:
													<input type="text" class="form-control" name="cryptosporidium"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE OTRAS SUSTANCIAS UTILIZADAS EN LA POTABILIZACIÓN</b></h4>
													Detergente: Cloro residual libre:
													<input type="text" class="form-control" name="detergente"><br>
													Coagulante: Sales de hierro:
													<input type="text" class="form-control" name="coagulante_sales_hierro"><br>
													Coagulante: Aluminio:
													<input type="text" class="form-control" name="coagulante_aluminio"><br>
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="button" class="btn btn-primary next-step">Salvar y continuar</button></li>
											</ul>
										</div>
										<div class="tab-pane" role="tabpanel" id="complete">
											<h3>FORMULARIO COMPLETO</h3>
											<p>¿Desea almacenar los datos digitados anteriormente?</p>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="submit" class="btn btn-primary next-step"><i class="glyphicon glyphicon-save"></i>Guardar Datos</button></li>
												<script>												
													$(document).ready(function(){
														$("#registrar_ica").onclick(function(){
															$("#form_variables").modal();
														});
													});
												</script>
											</ul>	
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
							</div>
						</section>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
				</div>
			</div>  
		</div>
	</div>

	<!-- Pop.up ver registros de Fuentes Hidricas -->
	<div class="modal fade" id="registros_fuente_hidirica" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h3 class="modal-title">EDITAR FUENTE HÍDRICA</h3></center>
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


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
				</div>
			</div>  
		</div>
	</div>	

	<!-- Pop-up Actualizar Fuentre Hidrica-->
	<div class="modal fade" id="editar_variables" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">ACTUALIZAR INFORMACIÓN DE LA FUENTE HIDRICA</h4>
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

	<!-- Pop.up ver registros de Rancheria -->
	<div class="modal fade" id="registros_rancheria" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" id="ventana" style="display: table; left: -10%;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h3 class="modal-title">EDITAR RANCHERIA</h3></center>
				</div>
				<div class="modal-body">
					<div class="container">	
						<div class="row">
							<div class="col-md-12">
								<h3>Registros:</h3>
								<div class="records_content_r"></div>
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

	<!-- Pop-up Actualizar Rancheria-->
	<div class="modal fade" id="detalles_rancheria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">ACTUALIZAR INFORMACIÓN DE LA FUENTE HIDRICA</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="update_nom_municipio">Municipio</label>
						<select name="selectid_municipio_2" id="update_id_municipio" class="form-control" onChange="getIdMunicipio(this)">  
							<option value="" selected disabled>Municipio</option> 
							<?php
							$conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
							or die("Ha sucedido un error inesperado en la conexion de la base de datos");
							$municipio = pg_query($conexion, "SELECT id_municipio, nom_municipio FROM wintig.municipio");
							while($row_list=pg_fetch_assoc($municipio)){
								?>                              
								<option value=<?php echo $row_list["id_municipio"]; ?>>
									<?php echo $row_list["nom_municipio"];?>  
								</option>
								<?php
							}                        
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="update_nom_rancheria">Rancheria</label>
						<input type="text" id="update_nom_rancheria" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cantidad_personas">Cantidad Personas</label>
						<input type="text" id="update_cantidad_personas" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_representante">Representante</label>
						<input type="text" id="update_representante" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_latitud_r">Latitud</label>
						<input type="text" id="update_latitud_r" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_longitud_r">Longitud</label>
						<input type="text" id="update_longitud_r" placeholder="" class="form-control"/>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" onclick="actualizar_detalles_rancheria()" >Aceptar</button>
					<input type="hidden" id="hidden_rancheria_id">
				</div>
			</div>
		</div>
	</div>	

	<div id="particles-js"></div>
	<script src="js\particles.js"></script>
	<script src="js\login.js"></script>
	<script src="js\script_acciones.js"></script>
	<script type="text/javascript" src="js/script_rancheria.js"></script>

	
