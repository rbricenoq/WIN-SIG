<!DOCTYPE html>
<html>
<head>
	<title>WIN-TIG - Recolector</title>
	<meta charset="UTF-8">
	<meta name ="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name ="mobile-web-app-capable" content="yes">
	<link rel ="icon" href="img/favicon.ico" >
	<link href ="css/css_home.css" rel="stylesheet">
	<link href ="css/login.css" rel="stylesheet">
	<link href ="css/form_var.css" rel="stylesheet">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">	
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="js\login.js"></script>
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
			<li id="lsita_bar_nav"><a class="active"> <?php echo $_SESSION['username']?></a></li>
			<li id="lsita_bar_nav"><a href="#contacto" data-toggle="modal">Contacto</a></li>
			<li id="lsita_bar_nav"><a href="#cuestionario" data-toggle="modal">Cuestionarios</a></li>
			<li id="lsita_bar_nav"><a href="php/logout.php" style="align-content: right">Logout</a></li>
			<li id="lsita_bar_nav"><a href="/WIN-TIG/Home_Recolector.php"><img src="img/LOGO.png" width="20PX" style="text-align: center;"></a></li>
		</ul>
		<?php
	}
	?>

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
						<img src="img/LOGOU.png" width="50%">
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

	<!-- Pop-up Fuente Hidrica  -->
	<div class="modal fade" id="form_variables" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">		
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h2 class="modal-title">NUEVA FUENTE HÍDRICA</h2></center>
				</div>
				<div class="modal-body" >
					<div class="container">	
						<div class="modal-body">										
							<div class="form-group">
								<form role="form" action="php/insertar_datos_fh.php" method="post">
									<H4>FUENTE HÍDRICA</H4>
									Usuario:
									<input type="text" class="form-control" name="nom_usuario" placeholder="<?php echo $_SESSION['username']?>"></input><br>
									<label ><?php echo $_SESSION['username']?></label><br>
									Seleccione el tipo de fuente hídrica:        
									<select name="selectid_fh" id="s_fh" class="form-control" onChange="getIdFh(this)" required>  
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
									<input type="text" class="form-control" name="latitud_fh" required pattern="^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)"><br>
									Longitud:<br>
									<input type="text" class="form-control" name="longitud_fh" required pattern="\s*[-]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$"><br>
									<H4>RANCHERIA</H4>
									Seleccione la rancheria relacionada a la fuente hídrica:
									<select name="selectid_rancheria" id="id_rancheria" class="form-control" onChange="getIdRancheria(this)" required>  
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
									<H4>USO Y ACCESIBILIDAD</H4>
									Seleccione el uso de la fuente hídrica:
									<select name="selectid_uso" id="tipo_uso" class="form-control" onChange="getIdUso(this)" required>  
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
									<select name="selectid_acceso" id="tipo_acceso" class="form-control" onChange="getIdAcceso(this)" required>  
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
									<input type="text" class="form-control" name="num_dias_buscar_agua" required pattern="[0-7]"><br>
									Número de viajes que se realizan en el día en busca de agua:<br>
									<input type="number" class="form-control" name="num_viajes" required pattern="[0-9]+"><br>
									Cantidad de agua recolectada en el dia (Lt):<br>
									<input type="number" class="form-control" name="cantidad_agua" required><br>
									Tiempo total para la recolección del agua (Tiempo de ida + espera + regreso):<br>
									<input type="text" class="form-control" value="01:00" name="tiempo_viaje" required pattern="[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}"><br>									
								</form>
							</div>										
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary next-step"><i class="glyphicon glyphicon-save"></i> Guardar Datos</button>
					<script>												
						$(document).ready(function(){
							$("#registrar_datos").onclick(function(){
								$("#form_variables").modal();
							});
						});
					</script>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 
				</div>
			</div>  
		</div>
	</div>

	<!-- Pop-up Muestra  -->
	<div class="modal fade" id="form_muestra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">AÑADIR MUESTRA A UNA FUENTE HÍDRICA</h4></center>
				</div>
				<div>
					<div class="row">
						<section>
							<div class="wizard">
								<div class="wizard-inner">
									<div class="connecting-line"></div>
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active">
											<a href="#fuente_hidirica" data-toggle="tab" aria-controls="fuente_hidirica" role="tab" title="Fuente Hídrica">
												<span class="round-tab">
													<i class="glyphicon glyphicon-tint"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#ica" data-toggle="tab" aria-controls="ica" role="tab" title="ICA (Índice de Calida de Agua)">
												<span class="round-tab">
													<b>ICA</b>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#irca" data-toggle="tab" aria-controls="irca" role="tab" title="IRCA (Índice de Riesgo de la Calidad del Agua para Consumo Humano)">
												<span class="round-tab">
													<b>IRCA</b>
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
										<!-- Formulario Fuente Hidrica -->
										<div class="tab-pane active" role="tabpanel" id="fuente_hidirica">
											<div class="modal-body">
												<h3>FUENTE HÍDRICA</h3>
												<div class="form-group">
													Seleccione el tipo de fuente hídrica:        
													<select name="select_fuente_hidrica" id="id_fuente_hidrica" class="form-control" onChange="getIdFh(this)" required>  
														<option value="" selected disabled>Fuente Hidrica</option> 
														<?php
														include 'php/conexion.php';
														$fuente = pg_query("SELECT id_fuente_hidrica, codigo_fh FROM wintig.fuente_hidrica");
														while($row_list=pg_fetch_assoc($fuente)){
															?>                              
															<option value=<?php echo $row_list["id_fuente_hidrica"]; ?>>
																<?php echo $row_list["codigo_fh"];?>  
															</option>
															<?php
														}                        
														?>
													</select><br>													
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-primary next-step">Continuar</button></li>
											</ul>
										</div>
										<!-- Formulario ICA -->
										<div class="tab-pane" role="tabpanel" id="ica">
											<h3>Índice de Calidad de Agua - ICA</h3>
											<div class="modal-body">
												<div class="form-group">
													Oxígeno disuelto (OD):<br>
													<input type="text" class="form-control" name="oxigeno_disuelto" required placeholder="0"><br>
													Oxígeno de Saturación (OS):<br>
													<input type="text" class="form-control" name="oxigeno_saturacion" required placeholder="0"><br>
													Sólidos  suspendidos totales (SST):<br>
													<input type="text" class="form-control" name="solidos_suspendidos" required placeholder="0"><br>
													Demanda química de oxígeno (DQO):
													<input type="text" class="form-control" name="demanda_quimica_oxigeno" required placeholder="0"><br>
													Conductividad eléctrica (C.E):
													<input type="text" class="form-control" name="conductividad_electrica" required placeholder="0"><br>
													Nivel de acidez (PH):
													<input type="text" class="form-control" name="ph_ica" required placeholder="0"><br>
													Nitrógeno:
													<input type="text" class="form-control" name="nitrogeno_ica" required placeholder="0"><br>
													Fósforo:
													<input type="text" class="form-control" name="fosforo_ica" required placeholder="0"><br>
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
													<input type="text" class="form-control" name="color_aparente" required placeholder="0"><br>
													¿Olor aceptable?<br>
													Aceptable: <input type="checkbox" id="olor_check" name="olor_check" value="0"><br><br>
													¿Sabor aceptable?<br>
													Aceptable: <input type="checkbox" id="sabor_check" name="sabor_check" value="0"><br><br>
													Turbiedad (UNT):
													<input type="text" class="form-control" name="turbiedad" required placeholder="0"><br>
													Conductividad eléctrica (C.E):
													<input type="text" class="form-control" name="conductividad" required placeholder="0"><br>
													Nivel de acidez (PH):
													<input type="text" class="form-control" name="ph_irca" required placeholder="0""><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE SUSTANCIAS QUE TIENEN RECONOCIDO EFECTO ADVERSO EN LA SALUD HUMANA</b></h4>
													Antimonio:
													<input type="text" class="form-control" name="antimonio" required placeholder="0"><br>
													Arsénico:
													<input type="text" class="form-control" name="arsenico" required placeholder="0"><br>
													Barío:
													<input type="text" class="form-control" name="bario" required placeholder="0"><br>
													Cadmio:
													<input type="text" class="form-control" name="cadmio" required placeholder="0"><br>
													Cianuro libre y disociable:
													<input type="text" class="form-control" name="cianuro_libre_disociable" required placeholder="0"><br>
													Cobre:
													<input type="text" class="form-control" name="cobre" required placeholder="0"><br>
													Cromo:
													<input type="text" class="form-control" name="cromo" required placeholder="0"><br>
													Mercurio:
													<input type="text" class="form-control" name="mercurio" required placeholder="0"><br>
													Niquel:
													<input type="text" class="form-control" name="niquel" required placeholder="0"><br>
													Plomo:
													<input type="text" class="form-control" name="plomo" required placeholder="0"><br>
													Selenio:
													<input type="text" class="form-control" name="selenio" required placeholder="0"><br>
													Trihalometanos:
													<input type="text" class="form-control" name="trihalometanos" required placeholder="0"><br>
													Hidrocarburos Aromáticos Policíclicos (HAP):
													<input type="text" class="form-control" name="hap" required placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE SUSTANCIAS QUE TIENEN IMPLICACIONES SOBRE LA SALUD HUMANA</b></h4>
													Carbono Orgánico Total (COT):
													<input type="text" class="form-control" name="cot" required placeholder="0"><br>
													Nitritos:
													<input type="text" class="form-control" name="nitritos" required placeholder="0"><br>
													Nitratos:
													<input type="text" class="form-control" name="nitratos" required placeholder="0"><br>
													Fluoruros:
													<input type="text" class="form-control" name="fluoruros" required placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS QUE TIENEN CONSECUENCIAS ECONÓMICAS E INDIRECTAS SOBRE LA SALUD HUMANA</b></h4>
													Calcio:
													<input type="text" class="form-control" name="calcio" required placeholder="0"><br>
													Alcalinidad:
													<input type="text" class="form-control" name="alcalinidad" required placeholder="0"><br>
													Cloruros:
													<input type="text" class="form-control" name="cloruros" required placeholder="0"><br>
													Aluminio:
													<input type="text" class="form-control" name="aluminio" required placeholder="0"><br>
													Dureza:
													<input type="text" class="form-control" name="dureza" required placeholder="0"><br>
													Hierro:
													<input type="text" class="form-control" name="hierro" required placeholder="0"><br>
													Magnesio:
													<input type="text" class="form-control" name="magnesio" required placeholder="0"><br>
													Manganeso:
													<input type="text" class="form-control" name="manganeso" required placeholder="0"><br>
													Molibdeno:
													<input type="text" class="form-control" name="molibdeno" required placeholder="0"><br>
													Sulfatos:
													<input type="text" class="form-control" name="sulfatos" required placeholder="0"><br>
													Zinc:
													<input type="text" class="form-control" name="zinc" required placeholder="0"><br>
													Fosfatos:
													<input type="text" class="form-control" name="fosfatos" required placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS RELACIONADAS CON LOS PLAGUICIDAS Y OTRAS SUSTANCIAS</b></h4>
													Cancerígenas, mutagénicas y teratogénicas:
													<input type="text" class="form-control" name="cmt" required placeholder="0"><br>
													Plaguicidas (Sumatoria de los valores de los plaguicidas):
													<input type="text" class="form-control" name="plaguicidas" required placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS MICROBIOLÓGICAS</b></h4>

													¿Ausencia de Escherichia Coli en 100cm3? <br>

													Ausencia: <input type="checkbox" id="escherichia_coli_check" name="escherichia_coli_check" value="0"><br><br>

													¿Ausencia de Coliformes en 100cm3?C<br>

													Ausencia: <input type="checkbox" id="coliformes_check" name="coliformes_check" value="0"><br><br>

													Microorganismos mesofílicos:
													<input type="text" class="form-control" name="microorganismos_mesofilicos" required placeholder="0"><br>
													Giardia:
													<input type="text" class="form-control" name="giardia" required placeholder="0"><br>
													Cryptosporidium:
													<input type="text" class="form-control" name="cryptosporidium" required placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE OTRAS SUSTANCIAS UTILIZADAS EN LA POTABILIZACIÓN</b></h4>
													Detergente: Cloro residual libre:
													<input type="text" class="form-control" name="detergente" required placeholder="0"><br>
													Coagulante: Sales de hierro:
													<input type="text" class="form-control" name="coagulante_sales_hierro" required placeholder="0"><br>
													Coagulante: Aluminio:
													<input type="text" class="form-control" name="coagulante_aluminio" required placeholder="0"><br>
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
												<li><button type="submit" class="btn btn-primary next-step"><i class="glyphicon glyphicon-save"></i> Guardar Datos</button></li>
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
			<div class="modal-content" style="width: 1000px;">
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

	<!-- Pop.up ver registros de Rancheria -->
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
					<center><h3 class="modal-title">NUEVA RANCHERIA</h3></center>
				</div>

				<div class="modal-body">
					<form name="insertar" action="php/insertar_rancheria.php" method="post"> 
						<div class="form-group">
							<label>Seleccione el municipio donde se encuentra la rancheria:</label>
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
							<label>Nombre de la rancheria:</label>
							<input type="text" class="form-control" name="nom_rancheria"><br>
							<label>Cantidad de personas: </label>
							<input type="text" class="form-control" name="cantidad_personas"><br>
							<label>Nombre del representante:</label>
							<input type="text" class="form-control" name="representante"><br>
							<label>Latitud:</label>
							<input type="text" class="form-control" name="latitud_r"><br>
							<label>Longitud:</label>
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
					<h4 class="modal-title" id="myModalLabel">ACTUALIZAR INFORMACIÓN DE LA RANCHERIA</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="update_id_municipio">Municipio</label>
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

	<!-- Pop-up Actualizar Fuente Hidrica-->
	<div class="modal fade" id="detalles_fh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">ACTUALIZAR INFORMACIÓN DE LA FUENTE HÍDRICA</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="update_nom_fh">Nombre:</label>
						<input type="text" id="update_nom_fh" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_latitud_f">Latitud:</label>
						<input type="text" id="update_latitud_f" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_longitud_f">Longitud:</label>
						<input type="text" id="update_longitud_f" placeholder="" class="form-control"/>
					</div>
					<div class="form-group">
						<label for="update_tipo_fh">Tipo Fuente Hídrica</label>
						<select name="selectid_fh" id="update_tipo_fh" class="form-control" onChange="getIdFh(this)">  
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
						</select>
					</div>

					<div class="form-group">
						<label for="update_tipo_uso">Tipo de Uso</label>
						<select name="selectid_uso" id="update_tipo_uso" class="form-control" onChange="getIdFh(this)">  
							<option value="" selected disabled>Tipo</option> 
							<?php
							include 'php/conexion.php';
							$fuente = pg_query("SELECT id_tipo_uso, nom_tipo_uso FROM wintig.tipo_uso");
							while($row_list=pg_fetch_assoc($fuente)){
								?>                              
								<option value=<?php echo $row_list["id_tipo_uso"]; ?>>
									<?php echo $row_list["nom_tipo_uso"];?>  
								</option>
								<?php
							}                        
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="update_tipo_acceso">Tipo de Acceso</label>
						<select name="selectid_acceso_2" id="update_tipo_acceso" class="form-control" onChange="getIdFh(this)">  
							<option value="" selected disabled>Tipo</option> 
							<?php
							include 'php/conexion.php';
							$fuente = pg_query("SELECT id_tipo_acceso, nom_tipo_acceso FROM wintig.tipo_acceso");
							while($row_list=pg_fetch_assoc($fuente)){
								?>                              
								<option value=<?php echo $row_list["id_tipo_acceso"]; ?>>
									<?php echo $row_list["nom_tipo_acceso"];?>  
								</option>
								<?php
							}                        
							?>
						</select>
					</div>	

					<div class="form-group">
						<label for="update_dias">Número de dias en buscar agua</label>
						<input type="text" id="update_dias" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_viajes">Número de viajes al dia</label>
						<input type="text" id="update_viajes" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cantidad">Cantidad de Agua recolectada (Lt)</label>
						<input type="text" id="update_cantidad" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_tiempo">Tiempo total para la recolección del agua (Tiempo de ida + espera + regreso)</label>
						<input type="text" id="update_tiempo" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_acceso">Cantidad de personas que acceden a la Fuente Hídrica</label>
						<input type="text" id="update_acceso" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_rancheria">Rancheria</label>
						<select name="selectid_rancheria_2" id="update_rancheria" class="form-control" onChange="getIdRancheria(this)">  
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

					<div class="form-group">
						<label for="update_municpio_2">Municipio</label>
						<select name="select_id_municipio_i" id="update_municpio_2" class="form-control" onChange="getIdMunicipio(this)">  
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
					</div>

					<div class="form-group">
						<label for="update_so">Oxigeno Disuelto (SO)</label>
						<input type="text" id="update_so" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_sst">Sólidos Suspendidos Totales (SST)</label>
						<input type="text" id="update_sst" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_dqo">Demanda Química de Oxígeno (DQO)</label>
						<input type="text" id="update_dqo" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_nitrogeno">Nitrógeno</label>
						<input type="text" id="update_nitrogeno" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_fosforo">Fosforo</label>
						<input type="text" id="update_fosforo" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_ce_ica">Conductividad Eléctrica (ICA)</label>
						<input type="text" id="update_ce_ica" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_ph_ica">Ph (ICA)</label>
						<input type="text" id="update_ph_ica" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_color">Color Aparente</label>
						<input type="text" id="update_color" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_olor">¿Olor aceptable?</label>
						<input type="text" id="update_olor" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_sabor">¿Sabor aceptable?</label>
						<input type="text" id="update_sabor" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_turbiedad">Turbiedad</label>
						<input type="text" id="update_turbiedad" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_ce_irca">Conducticidad Electrica (IRCA)</label>
						<input type="text" id="update_ce_irca" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_ph_irca">PH (IRCA)</label>
						<input type="text" id="update_ph_irca" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_antimonio">Antimonio</label>
						<input type="text" id="update_antimonio" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_arsenico">Arsénico</label>
						<input type="text" id="update_arsenico" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_bario">Bario</label>
						<input type="text" id="update_bario" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cadmio">Cadmio</label>
						<input type="text" id="update_cadmio" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cid">Cianuro Libre y Disociable</label>
						<input type="text" id="update_cid" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cobre">Cobre</label>
						<input type="text" id="update_cobre" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cromo">Cromo</label>
						<input type="text" id="update_cromo" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_mercurio">Mercurio</label>
						<input type="text" id="update_mercurio" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_niquel">Níquel</label>
						<input type="text" id="update_niquel" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_plomo">Plomo</label>
						<input type="text" id="update_plomo" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_selenio">Selenio</label>
						<input type="text" id="update_selenio" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_trihalomentanos">Trihalometanos</label>
						<input type="text" id="update_trihalomentanos" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_hap">Hidrocarburos Aromáticos Policíclicos (HAP)</label>
						<input type="text" id="update_hap" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cot">Carbono Orgánico Total (COT)</label>
						<input type="text" id="update_cot" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_nitritos">Nitritos</label>
						<input type="text" id="update_nitritos" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_nitratos">Nitratos</label>
						<input type="text" id="update_nitratos" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_fluoruros">Fluoruros</label>
						<input type="text" id="update_fluoruros" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_calcio">Calcio</label>
						<input type="text" id="update_calcio" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_alcalinidad">Alcalinidad</label>
						<input type="text" id="update_alcalinidad" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cloruros">Cloruros</label>
						<input type="text" id="update_cloruros" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_aluminio">Aluminio</label>
						<input type="text" id="update_aluminio" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_dureza">Dureza</label>
						<input type="text" id="update_dureza" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_hierro">Hierro</label>
						<input type="text" id="update_hierro" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_magnesio">Magnesio</label>
						<input type="text" id="update_magnesio" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_manganeso">Manganeso</label>
						<input type="text" id="update_manganeso" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_molibdeno">Molibdeno</label>
						<input type="text" id="update_molibdeno" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_sulfatos">Sulfatos</label>
						<input type="text" id="update_sulfatos" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_zinc">Zinc</label>
						<input type="text" id="update_zinc" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_fosfatos">Fosfatos</label>
						<input type="text" id="update_fosfatos" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cmt">Cancerígenas, Mutagénicas y Teratogénicas </label>
						<input type="text" id="update_cmt" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_plaguicidas">Plaguicidas</label>
						<input type="text" id="update_plaguicidas" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_coli">Escherichia Coli</label>
						<input type="text" id="update_coli" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_coliformes">Coliformes Totales</label>
						<input type="text" id="update_coliformes" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_microorganismos">Microorganismos mesofílicos</label>
						<input type="text" id="update_microorganismos" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_giardia">Giardia</label>
						<input type="text" id="update_giardia" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cryptosporidium">Cryptosporidium</label>
						<input type="text" id="update_cryptosporidium" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_detergente">Detergente: Cloro residual libre</label>
						<input type="text" id="update_detergente" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_coagulantes_hierro">Coagulante: Sales de hierro</label>
						<input type="text" id="update_coagulantes_hierro" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_coagulantes_aluminio">Coagulante: Aluminio</label>
						<input type="text" id="update_coagulantes_aluminio" placeholder="" class="form-control"/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary" onclick="actualizar_detalles_fh()" >Aceptar</button>
					<input type="hidden" id="hidden_fh_id">
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

	<!--Contenedor-->
	<div class="container">
		<!-- Logo 
		<div id="logo_wintig" style="text-align: center;">
			<a href="/WIN-TIG/home_recolector.php">
				<img src="img/LOGO.png" width="15%">
			</a>
		</div>-->

		<!--Menu Botones y Filtros-->

		<nav class="nav_filtros">

			<!--Botones-->	
			<div>
				<!--Busqueda-->
				<form class="form-wrapper cf">
					<input type="text"  placeholder="Busqueda..." id ="b1" class = "ui-widget" required>
					<button type="button" class="btn btn-primary" onclick="filtro_busqueda();" ><i class="glyphicon glyphicon-search"></i></button>
				</form>
				<!--Agregar FH-->
				<button type="submit" id="btn_ag_fh"  class="btn btn-success" href="#form_variables" data-toggle="modal" title="Tienes que loguearte para poder agregar una fuente hídrica" style="margin-left: -9px; width: 230px; position: relative;"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Fuente Hídrica</button>
				<br><br>
				<!--Agregar FH-->
				<button type="submit" id="btn_ag_muestra"  class="btn btn-success" href="#form_muestra" data-toggle="modal" title="Tienes que loguearte para poder agregar una fuente hídrica" style="margin-left: -9px; width: 230px; position: relative;"><i class="glyphicon glyphicon-plus-sign"></i> Registrar muestra</button>
				<br><br>
				<!--Editar FH-->
				<button type="submit" id="btn_edi_fh" class="btn btn-primary" href="#registros_fuente_hidirica" data-toggle="modal" style="margin-left: -9px; width: 230px; position: relative;"><i class="glyphicon glyphicon-edit"></i> Ver Fuentes Hídricas</button>
				<br><br>
				<!--Agrear Rancheria-->
				<button type="submit" id="btn_ag_rc"  class="btn btn-success" href="#añadir_rancheria" data-toggle="modal" title="Tienes que loguearte para poder agregar una Rancheria" style="margin-left: -9px; width: 230px; position: relative;"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Rancheria</button>
				<br><br>
				<!--Editar Rancheria-->
				<button type="submit" id="btn_edi_rc"  class="btn btn-primary" href="#registros_rancheria" data-toggle="modal" style="margin-left: -9px; width: 230px; position: relative;"><i class="glyphicon glyphicon-edit"></i> Ver Rancherias</button>
				<br><br>
			</div>

			<!--Filtros-->

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
	<script src="js\script_acciones.js"></script>
	<script src="js\script_recolector.js"></script>
</body>
</html>



