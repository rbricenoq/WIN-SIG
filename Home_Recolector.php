<!DOCTYPE html>
<html>
<head>
	<title>WIN-TIG - Recolector</title>
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
include 'php/conexion.php';
require_once("php/session.php");
?>

<body>

	<!--Barra Navegacion-->
	
	<ul id="bar_nav">
		<?php
		if (isset($_SESSION['username'])) {
			?>
			<li id="lsita_bar_nav"><a class="active"> <?php echo $_SESSION['username']	?></a></li>
			<li id="lsita_bar_nav"><a href="#contacto" data-toggle="modal">Contacto</a></li>
			<li id="lsita_bar_nav"><a href="#cuestionario" data-toggle="modal">Cuestionarios</a></li>
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
				<button type="submit" id="btn_edi_rc"  class="btn btn-primary" href="#registros_rancheria" data-toggle="modal"><i class="glyphicon glyphicon glyphicon-pencil"></i>  Rancherias</button>
				<br><br>
			</div>

			<!-- Pop-up Contacto  -->
			<div class="modal fade" id="contacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>	
							<center><h4 class="modal-title">CONTACTO</h4></center>
						</div>
						<div class="modal-body" >
							<h4 id="p-regis"> rbricenoq@unbosque.edu.co</h4><br>
							<h4 id="p-regis"> sbarrerof@unbosque.edu.co</h4><br>
							<h4 id="p-regis"> dpico@unbosque.edu.co</h4><br>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
						</div>
					</div>  
				</div>
			</div>

			<!-- Pop-up Acerca de  -->
			<div class="modal fade" id="cuestionario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>	
							<center><h4 class="modal-title">CUESTIONARIOS</h4></center>
						</div>
						<div class="modal-body" >
							Cuestionarios para saber su opinión sobre la aplicación:
							<br><br>
							<A HREF="https://docs.google.com/forms/d/1_cOo15t5TEq4XMJcxpD8mcaomJl446Sw6Fy29TYGBUk/edit" TARGET="_BLANK"><p>Escala de Usabilidad del Sistema</p></A>
							<A HREF="https://docs.google.com/forms/d/1ch_-j59fRtgfjcawq4spNheJlZ6a-wO1b4xkyuZCPRY/edit" TARGET="_BLANK"><p>Utilidad, Satisfacción y Facilidad de Uso</p></A>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
						</div>
					</div>  
				</div>
			</div>

			<!-- Pop-up Variables  -->
			<div class="modal fade" id="form_variables" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
																include 'php/conexion.php';
																$rancheria = pg_query("SELECT id_rancheria, nom_rancheria FROM wintig.rancheria");
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
																include 'php/conexion.php';
																$fuente = pg_query("SELECT id_tipo_fuente_hidrica, nom_tipo_fuente_hidrica FROM wintig.tipo_fuente_hidrica");
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
															<input type="text" class="form-control" name="nom_fh" required><br>
															Latitud:<br>
															<input type="text" class="form-control" name="latitud_fh" required><br>
															Longitud:<br>
															<input type="text" class="form-control" name="longitud_fh" required><br>
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
																include 'php/conexion.php';
																$uso = pg_query("SELECT id_tipo_uso, nom_tipo_uso FROM wintig.tipo_uso");
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
																include 'php/conexion.php';
																$acceso = pg_query("SELECT id_tipo_acceso, nom_tipo_acceso FROM wintig.tipo_acceso");
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
															<input type="text" class="form-control" name="oxigeno_disuelto" required><br>
															Oxígeno de Saturación (OS):<br>
															<input type="text" class="form-control" name="oxigeno_saturacion" required><br>
															Sólidos  suspendidos totales (SST):<br>
															<input type="text" class="form-control" name="solidos_suspendidos" required><br>
															Demanda química de oxígeno (DQO):
															<input type="text" class="form-control" name="demanda_quimica_oxigeno" required><br>
															Conductividad eléctrica (C.E):
															<input type="text" class="form-control" name="conductividad_electrica" required><br>
															Nivel de acidez (PH):
															<input type="text" class="form-control" name="ph_ica" required><br>
															Nitrógeno:
															<input type="text" class="form-control" name="nitrogeno_ica" required><br>
															Fósforo:
															<input type="text" class="form-control" name="fosforo_ica" required><br>
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
															Plaguicidas (Sumatoria de los valores de los plaguicidas):
															<input type="text" class="form-control" name="plaguicidas"><br>
															<h4><b>CARACTERÍSTICAS MICROBIOLÓGICAS</b></h4>

															¿Ausencia de Escherichia Coli en 100cm3? <br>

															Ausencia: <input type="checkbox" id="escherichia_coli_check" name="escherichia_coli_check" value="0"><br><br>

															¿Ausencia de Coliformes en 100cm3?C<br>

															Ausencia: <input type="checkbox" id="coliformes_check" name="coliformes_check" value="0"><br><br>

															Microorganismos mesofílicos:
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
			<div class="modal fade" id="registros_fuente_hidirica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
										<div class="records_content_f"></div>
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

			<!-- Pop-up ver registros de Rancheria -->
			<div class="modal fade" id="registros_rancheria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>	
							<center><h3 class="modal-title">EDITAR RANCHERIA</h3></center>
						</div>
						<div class="modal-body">
							<div class="container">	
								<div class="row">
									<div class="row">
										<div class="col-md-12">
											<div class="pull-right">
												<button class="btn btn-success" data-toggle="modal" data-target="#añadir_rancheria">Nueva Rancheria</button>
											</div>
										</div>
									</div>
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

			<!-- Pop-up Nueva Rancheria -->
			<div class="modal fade" id="añadir_rancheria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Nueva Rancheria</h4>
						</div>

						<div class="modal-body">
							<form name="insertar" action="php/insertar_rancheria.php" method="post"> 
								<div class="form-group">
									Seleccione el municipio donde se encuentra la rancheria:
									<select name="select_id_municipio" id="id_municipio" class="form-control" onChange="getIdMunicipio(this)">  
										<option value="" selected disabled>Municipio</option> 
										<?php
										include 'php/conexion.php';
										$municipio = pg_query("SELECT id_municipio, nom_municipio FROM wintig.municipio");
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
								</div>

							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>  
								<script>
									$(document).ready(function(){
										$("#registro").onclick(function(){
											$("#añadir_rancheria").modal();
										});
									});
								</script> 
							</div>
						</form> 
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
									include 'php/conexion.php';
									$municipio = pg_query("SELECT id_municipio, nom_municipio FROM wintig.municipio");
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


			<!--Filtros-->

			<div class="filtros">
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
						<li class="list-group-item">
							Jagüey
							<div class="material-switch pull-right">
								<input id="jaguey" name="Jagüey" type="checkbox" onclick="filtros_fuente_hidrica('Jagüey');"/>
								<label for="jaguey" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Reservorio
							<div class="material-switch pull-right">
								<input id="reservorio" name="Reservorio" type="checkbox" onclick="filtros_fuente_hidrica('Reservorio');"/>
								<label for="reservorio" class="label-primary"></label>
							</div>
						</li>
					</ul>
					<div class="panel_heading">Municipio</div>
					<ul class="list-group">
						<li class="list-group-item">
							Manaure
							<div class="material-switch pull-right">
								<input id="manaure_f" name="Manaure" type="checkbox" onclick="filtros_municipio_fuente('Manaure');"/>
								<label for="manaure_f" class="label-primary"></label>
							</div>
						</li>
						<li class="list-group-item">
							Maicao
							<div class="material-switch pull-right">
								<input id="maicao_f" name="Maicao" type="checkbox" onclick="filtros_municipio_fuente('Maicao');"/>
								<label for="maicao_f" class="label-primary"></label>
							</div>
						</li>
					</ul>
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
							<label for="regular" class="label-info"></label>
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
				<!-- List group -->
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
							<label for="riesgo_bajo" class="label-success"></label>
						</div>
					</li>
					<li class="list-group-item">
						Riesgo Medio
						<div class="material-switch pull-right">
							<input id="riesgo_medio" name="mas_personas" type="checkbox" onclick="filtros_irca('Riesgo Medio');"/>
							<label for="riesgo_medio" class="label-info"></label>
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
			<div id="map">
				<?php include("mapa.html");?>
			</div>
			<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4yA0gaGzQ9GJgwJ784kt1kUXyeVqZ634&callback=initMap"></script>
		</section>

	</div>
	<div id="particles-js"></div>
	<script src="js/particles.js"></script>
	<script src="js/login.js"></script>i
	<script src="js/script_acciones.js"></script>
	<script src="js/script_rancheria.js"></script>
	<script src="js/script_fh.js"></script>

</body>
</html>