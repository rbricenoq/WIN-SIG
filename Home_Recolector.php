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
	<link href ="css/instrucciones.css" rel="stylesheet">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/instrucciones.js"></script>
</head>

<?php 
	//Creamos la conexión con la BD en postgresql
include 'php/conexion.php';
require_once("php/session.php");
?>

<body>
	<!-- Barra Navegación -->
	<nav class="navbar navbar-default" style="background-color: #e3f2fd; width: 100%;">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://93.188.162.196/WIN-TIG/Home_Recolector.php">WIN-TIG</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#instrucciones" data-toggle="modal">Instrucciones de uso</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menú<span class="caret"></span></a>
						<ul class="dropdown-menu" style="text-align: left;">
							<li><a href="#form_fuente" style="text-align: left;" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> Insertar Fuente Hídrica</a></li>
							<li><a href="#form_accesibilidad" style="text-align: left;" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> Insertar Accesibilidad y Uso</a></li>
							<li><a href="#form_muestra" style="text-align: left;" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> Registrar Muestra</a></li>
							<li><a href="#registros_fuente_hidirica" style="text-align: left;" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> Ver Fuentes Hídricas</a></li>
							<li><a href="#registros_rancheria" style="text-align: left;" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> Ver Rancherias</a></li>

						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					
					<li class="nav-item">
						<a class="nav-link" href="#contacto" data-toggle="modal">Contacto</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#cuestionario" data-toggle="modal">Cuestionarios</a>
					</li>
					<?php
					$usuario = $_SESSION['username'];
					if (isset($_SESSION['username'])) {
						?>
						<li>
							<a class="active" style="background: DeepSkyBlue; font-weight: bold; color: SlateGrey ;"><span class="glyphicon glyphicon-user"></span> <?php echo $usuario?></a>
						</li>
						<li>
							<a class="nav-link" href="php/logout.php" style="align-content: right;"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
						</li>
					</ul>
					<?php
				}
				?>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

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
					<A HREF="https://docs.google.com/forms/d/e/1FAIpQLSdZpIZBJcH62i1TT_bPZzL8y089QmLQsj-BA47xAtUXIdpqfQ/viewform" TARGET="_BLANK"><p>Utilidad, Satisfacción y Facilidad de Uso</p></A>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
				</div>
			</div>  
		</div>
	</div>

	<!-- Pop-up Fuente Hidrica  -->
	<div class="modal fade"  style="overflow-y: scroll;" id="form_fuente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">NUEVA FUENTE HÍDRICA</h4></center>
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
													<i class="glyphicon glyphicon-tent"></i>
												</span>
											</a>
										</li>

										<li role="presentation" class="disabled">
											<a href="#fuente_hidrica" data-toggle="tab" aria-controls="fuente_hidrica" role="tab" title="Fuente Hídrica">
												<span class="round-tab">
													<i class="glyphicon glyphicon-tint"></i>
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

								<form role="form" action="php/insertar_datos_fh.php?nombre_usuario=<?php echo $usuario?>" method="post">
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
													<center><p>¿Desea agregar una nueva rancheria?</p></center>
													<center><button type="button" id="btn_ag_rc"  class="btn btn-success" href="#añadir_rancheria" data-toggle="modal" title="Añadir una rancheria nueva" style="margin-left: -9px; width: 230px; position: relative;text-align: center;"><i class="glyphicon glyphicon-plus-sign"></i> Agregar Rancheria</button></center>	
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atrás</button></li>
												<li><button type="button" class="btn btn-primary next-step">Continuar</button></li>
											</ul>
										</div>

										<!-- Formulario Fuente Hidrica -->
										<div class="tab-pane" role="tabpanel" id="fuente_hidrica">
											<div class="modal-body">
												<h3>FUENTE HÍDRICA</h3>
												<div class="form-group">
													Usuario:
													<input type="text" class="form-control" name="nom_usuario" placeholder="<?php echo $_SESSION['username']?>" disabled><br>
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
													<input type="text" class="form-control" name="nom_fh""><br>
													Latitud (Grados Decimales):<br>
													<input type="text" class="form-control" name="latitud_fh" pattern="^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)" placeholder="11.567"><br>
													Longitud (Grados Decimales):<br>
													<input type="text" class="form-control" name="longitud_fh" pattern="\s*[-]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$" placeholder="-72.567"><br>						
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-primary next-step">Continuar</button></li>
											</ul>
										</div>

										<div class="tab-pane" role="tabpanel" id="complete">
											<h3>FORMULARIO COMPLETO</h3>
											<p>¿Desea almacenar los datos digitados anteriormente?</p>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atrás</button></li>
												<li><button type="submit" class="btn btn-primary next-step"><i class="glyphicon glyphicon-save"></i> Guardar Datos</button></li>
												<script>												
													$(document).ready(function(){
														$("#registrar_datos").onclick(function(){
															$("#form_fuente").modal();
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

	<!-- Pop-up Accesibilidad  -->
	<div class="modal fade" id="form_accesibilidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">Uso y Accesibilidad</h4></center>
				</div>
				<div>
					<div class="row">
						<section>
							<div class="wizard">
								<div class="wizard-inner">
									<div class="connecting-line"></div>
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active">
											<a href="#fh_acc" data-toggle="tab" aria-controls="fh_acc" role="tab" title="Fuente Hídrica">
												<span class="round-tab">
													<i class="glyphicon glyphicon-tint"></i>
												</span>
											</a>
										</li>
										<li role="presentation" class="disabled">
											<a href="#uso_acceso" data-toggle="tab" aria-controls="uso_acceso" role="tab" title="Datos de Uso y Accesibilidad">
												<span class="round-tab">
													<i class="glyphicon glyphicon-road"></i>
												</span>
											</a>
										</li>
										<li role="presentation" class="disabled">
											<a href="#complete3" data-toggle="tab" aria-controls="complete3" role="tab" title="Enviar">
												<span class="round-tab">
													<i class="glyphicon glyphicon-ok"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>

								<form role="form" action="php/insertar_acceso_uso.php" method="post">
									<div class="tab-content">	
										<!-- Formulario Fuente Hidrica -->
										<div class="tab-pane active" role="tabpanel" id="fh_acc">
											<div class="modal-body">
												<h3>FUENTE HÍDRICA</h3>
												<div class="form-group">
													Seleccione una fuente hídrica:        
													<select name="select_id_fuente_hidrica_acceso_uso" id="id_fuente_hidrica" class="form-control" onChange="getIdFh(this)">  
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
										<!-- Formulario Uso y Acceso -->
										<div class="tab-pane" role="tabpanel" id="uso_acceso">
											<div class="modal-body">
												<H3>USO Y ACCESIBILIDAD</H3>
												<div class="form-group">
													Seleccione el uso de la fuente hídrica:
													<select name="selectid_uso" id="tipo_uso" class="form-control" onChange="getIdUso(this)">  
														<option value="" selected disabled>Uso</option> 
														<?php
														include 'php/conexion.php';
														$uso = pg_query("SELECT id_tipo_uso, nom_tipo_uso FROM wintig.tipo_uso where id_tipo_uso > 1");
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
														$acceso = pg_query("SELECT id_tipo_acceso, nom_tipo_acceso FROM wintig.tipo_acceso where id_tipo_acceso > 1");
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
													<input type="number" class="form-control" name="num_dias_buscar_agua" min="1" max="7" title="Ingrese un número del 0 al 7"><br>
													Número de viajes que se realizan en el día en busca de agua:<br>
													<input type="number" class="form-control" name="num_viajes" min="1" title="Sólo se permiten números"><br>
													Cantidad de agua recolectada en el dia (Lt):<br>
													<input type="number" class="form-control" name="cantidad_agua" min="0" title="Sólo se permiten números"><br>
													Tiempo total para la recolección del agua [Tiempo de ida + espera + regreso] 
													(HH:MM:SS):<br>
													<input type="text" class="form-control" placeholder="2:00:00" name="tiempo_viaje" pattern="^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$" title="Ingrese una hora en el formato específicado"><br>
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-primary next-step">Continuar</button></li>
											</ul>
										</div>
										<div class="tab-pane" role="tabpanel" id="complete3">
											<h3>FORMULARIO COMPLETO</h3>
											<p>¿Desea almacenar los datos digitados anteriormente?</p>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="submit" class="btn btn-primary next-step"><i class="glyphicon glyphicon-save"></i> Guardar Datos</button></li>
												<script>												
													$(document).ready(function(){
														$("#registrar_datos").onclick(function(){
															$("#form_accesibilidad").modal();
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
											<a href="#fh_muestra" data-toggle="tab" aria-controls="fh_muestra" role="tab" title="Fuente Hídrica">
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
											<a href="#complete2" data-toggle="tab" aria-controls="complete2" role="tab" title="Enviar">
												<span class="round-tab">
													<i class="glyphicon glyphicon-ok"></i>
												</span>
											</a>
										</li>
									</ul>
								</div>

								<form role="form" action="php/insertar_muestra.php" method="post" novalidate="">
									<div class="tab-content">										
										<!-- Formulario Fuente Hidrica -->
										<div class="tab-pane active" role="tabpanel" id="fh_muestra">
											<div class="modal-body">
												<h3>FUENTE HÍDRICA</h3>
												<div class="form-group">
													Seleccione una fuente hídrica:        
													<select name="select_fuente_hidrica_muestra" id="id_fuente_hidrica" class="form-control" onChange="getIdFh(this)">  
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
													<input type="number" class="form-control" name="oxigeno_disuelto" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Oxígeno de Saturación (OS):<br>
													<input type="number" class="form-control" name="oxigeno_saturacion" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Sólidos  suspendidos totales (SST):<br>
													<input type="number" class="form-control" name="solidos_suspendidos" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Demanda química de oxígeno (DQO):
													<input type="number" class="form-control" name="demanda_quimica_oxigeno" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Conductividad eléctrica (C.E):
													<input type="number" class="form-control" name="conductividad_electrica" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Nivel de acidez (PH):
													<input type="number" class="form-control" name="ph_ica" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Nitrógeno:
													<input type="number" class="form-control" name="nitrogeno_ica" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Fósforo:
													<input type="number" class="form-control" name="fosforo_ica" min="1" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="button" class="btn btn-primary next-step" onclick="javascript: $('#form_muestra').scrollTop(0);">Continuar</button></li>
											</ul>
										</div>
										<!-- Formulario IRCA -->
										<div class="tab-pane" role="tabpanel" id="irca">
											<h3>Índice de Riesgo de la Calidad del Agua para Consumo Humano -IRCA</h3>
											<div class="modal-body">
												<div class="form-group">
													<h4><b>CARACTERÍSTICAS FÍSICAS</b></h4>
													Color Aparente (Unidades de PLanito Cobalto - UPC):<br>
													<input type="number" class="form-control" name="color_aparente" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													¿Olor aceptable?<br>
													Aceptable: <input type="checkbox" id="olor_check" name="olor_check" value="0"><br><br>
													¿Sabor aceptable?<br>
													Aceptable: <input type="checkbox" id="sabor_check" name="sabor_check" value="0"><br><br>
													Turbiedad (UNT):
													<input type="number" class="form-control" name="turbiedad" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Conductividad eléctrica (µ/cm):
													<input type="number" class="form-control" name="conductividad" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Nivel de acidez (PH):
													<input type="number" class="form-control" name="ph_irca" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE SUSTANCIAS QUE TIENEN RECONOCIDO EFECTO ADVERSO EN LA SALUD HUMANA (mg/L)</b></h4>
													Antimonio:
													<input type="number" class="form-control" name="antimonio" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Arsénico:
													<input type="number" class="form-control" name="arsenico" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Barío:
													<input type="number" class="form-control" name="bario" min="0"  pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Cadmio:
													<input type="number" class="form-control" name="cadmio" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Cianuro libre y disociable:
													<input type="number" class="form-control" name="cianuro_libre_disociable" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Cobre:
													<input type="number" class="form-control" name="cobre" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Cromo:
													<input type="number" class="form-control" name="cromo" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Mercurio:
													<input type="number" class="form-control" name="mercurio" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Niquel:
													<input type="number" class="form-control" name="niquel" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Plomo:
													<input type="number" class="form-control" name="plomo" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Selenio:
													<input type="number" class="form-control" name="selenio" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Trihalometanos:
													<input type="number" class="form-control" name="trihalometanos" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Hidrocarburos Aromáticos Policíclicos (HAP):
													<input type="number" class="form-control" name="hap" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE SUSTANCIAS QUE TIENEN IMPLICACIONES SOBRE LA SALUD HUMANA (mg/L)</b></h4>
													Carbono Orgánico Total (COT):
													<input type="number" class="form-control" name="cot" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Nitritos:
													<input type="number" class="form-control" name="nitritos" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Nitratos:
													<input type="number" class="form-control" name="nitratos" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Fluoruros:
													<input type="number" class="form-control" name="fluoruros" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS QUE TIENEN CONSECUENCIAS ECONÓMICAS E INDIRECTAS SOBRE LA SALUD HUMANA (mg/L)</b></h4>
													Calcio:
													<input type="number" class="form-control" name="calcio" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Alcalinidad:
													<input type="number" class="form-control" name="alcalinidad" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Cloruros:
													<input type="number" class="form-control" name="cloruros" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Aluminio:
													<input type="number" class="form-control" name="aluminio" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Dureza:
													<input type="number" class="form-control" name="dureza" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Hierro:
													<input type="number" class="form-control" name="hierro" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Magnesio:
													<input type="number" class="form-control" name="magnesio" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Manganeso:
													<input type="number" class="form-control" name="manganeso" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Molibdeno:
													<input type="number" class="form-control" name="molibdeno" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Sulfatos:
													<input type="number" class="form-control" name="sulfatos" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Zinc:
													<input type="number" class="form-control" name="zinc" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Fosfatos:
													<input type="number" class="form-control" name="fosfatos" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS RELACIONADAS CON LOS PLAGUICIDAS Y OTRAS SUSTANCIAS (mg/L)</b></h4>
													Cancerígenas, mutagénicas y teratogénicas:
													<input type="number" class="form-control" name="cmt" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Plaguicidas (Sumatoria de los valores de los plaguicidas):
													<input type="number" class="form-control" name="plaguicidas" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS MICROBIOLÓGICAS</b></h4>

													¿Ausencia de Escherichia Coli en 100cm3? <br>

													Ausencia: <input type="checkbox" id="escherichia_coli_check" name="escherichia_coli_check" value="0"><br><br>

													¿Ausencia de Coliformes en 100cm3?<br>

													Ausencia: <input type="checkbox" id="coliformes_check" name="coliformes_check" value="0"><br><br>

													Microorganismos mesofílicos (UFC):
													<input type="number" class="form-control" name="microorganismos_mesofilicos" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Giardia (Quistes):
													<input type="number" class="form-control" name="giardia" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Cryptosporidium (Ooquistes):
													<input type="number" class="form-control" name="cryptosporidium" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													<h4><b>CARACTERÍSTICAS QUÍMICAS DE OTRAS SUSTANCIAS UTILIZADAS EN LA POTABILIZACIÓN (mg/L)</b></h4>
													Detergente: Cloro residual libre:
													<input type="number" class="form-control" name="detergente" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Coagulante: Sales de hierro:
													<input type="number" class="form-control" name="coagulante_sales_hierro" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
													Coagulante: Aluminio:
													<input type="number" class="form-control" name="coagulante_aluminio" min="0" pattern="/^(0|[1-9]\d*)(\.\d+)?$/" title="Sólo se permiten números" placeholder="0"><br>
												</div>
											</div>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="button" class="btn btn-primary next-step">Continuar</button></li>
											</ul>
										</div>
										<div class="tab-pane" role="tabpanel" id="complete2">
											<h3>FORMULARIO COMPLETO</h3>
											<p>¿Desea almacenar los datos digitados anteriormente?</p>
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Atras</button></li>
												<li><button type="submit" class="btn btn-primary next-step"><i class="glyphicon glyphicon-save"></i> Guardar Datos</button></li>
												<script>												
													$(document).ready(function(){
														$("#registrar_muestra").onclick(function(){
															$("#form_muestra").modal();
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

	<!-- Pop up ver registros de Fuentes Hidricas -->
	<div class="modal fade" style="overflow-y: scroll;" id="registros_fuente_hidirica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
	<div class="modal fade" style="overflow-y: scroll;" id="registros_rancheria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
							Seleccione el municipio donde se encuentra la rancheria: <span style="color: red" title="Campo obligatorio">*</span>
							<select name="select_id_municipio" id="id_municipio" class="form-control" onChange="getIdMunicipio(this)" required>  
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
							Nombre de la rancheria: <span style="color: red" title="Campo obligatorio">*</span><br>
							<input type="text" class="form-control" name="nom_rancheria" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo se permiten letras y vocales" required><br>
							Cantidad de personas: <span style="color: red" title="Campo obligatorio">*</span><br>
							<input type="text" class="form-control" name="cantidad_personas"  title="Sólo se permiten números" required><br>
							Nombre del representante: <span style="color: red" title="Campo obligatorio">*</span><br>
							<input type="text" class="form-control" name="representante" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo se permiten letras y vocales" required><br>
							Latitud (Grados Decimales): <span style="color: red" title="Campo obligatorio">*</span><br>
							<input type="text" class="form-control" name="latitud_r" pattern="^-?(0|[1-9]\d*)(\.\d+)?$" title="Ingresa una coordenada válida: ejem 11.759962" required><br>
							Longitud (Grados Decimales): <span style="color: red" title="Campo obligatorio">*</span><br>
							<input type="text" class="form-control" name="longitud_r" pattern="^-?(0|[1-9]\d*)(\.\d+)?$" title="Ingresa una coordenada válida: ejem -72.425952" required><br>					
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
						<input type="text" id="update_cantidad_personas" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_representante">Representante</label>
						<input type="text" id="update_representante" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_latitud_r">Latitud (Grados Decimales)</label>
						<input type="text" id="update_latitud_r" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_longitud_r">Longitud (Grados Decimales)</label>
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
	<div class="modal fade" style="overflow-y: scroll;" id="detalles_fh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
						<label for="update_latitud_f">Latitud (Grados Decimales):</label>
						<input type="text" id="update_latitud_f" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_longitud_f">Longitud (Grados Decimales):</label>
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
						<input type="number" id="update_dias" min="0" max="7" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_viajes">Número de viajes al dia</label>
						<input type="number" id="update_viajes" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cantidad">Cantidad de Agua recolectada (Lt)</label>
						<input type="number" id="update_cantidad" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_tiempo">Tiempo total para la recolección del agua (Tiempo de ida + espera + regreso)(HH:MM:SS)</label>
						<input type="text" id="update_tiempo" placeholder="" pattern="^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_rancheria">Ranchería</label>
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
						</select>
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
						</select>
					</div>

					<div class="form-group">
						<label for="update_so">Oxigeno Disuelto (SO)</label>
						<input type="number" id="update_so" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_sst">Sólidos Suspendidos Totales (SST)</label>
						<input type="number" id="update_sst" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_dqo">Demanda Química de Oxígeno (DQO)</label>
						<input type="number" id="update_dqo" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_nitrogeno">Nitrógeno</label>
						<input type="number" id="update_nitrogeno" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_fosforo">Fosforo</label>
						<input type="number" id="update_fosforo" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_ce_ica">Conductividad Eléctrica (ICA)</label>
						<input type="number" id="update_ce_ica" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_ph_ica">Ph (ICA)</label>
						<input type="number" id="update_ph_ica" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_color">Color Aparente</label>
						<input type="number" id="update_color" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_olor">¿Olor aceptable?</label>
						<input type="number" id="update_olor" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_sabor">¿Sabor aceptable?</label>
						<input type="number" id="update_sabor" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_turbiedad">Turbiedad</label>
						<input type="number" id="update_turbiedad" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_ce_irca">Conducticidad Electrica (IRCA)</label>
						<input type="number" id="update_ce_irca" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_ph_irca">PH (IRCA)</label>
						<input type="number" id="update_ph_irca" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_antimonio">Antimonio</label>
						<input type="number" id="update_antimonio" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_arsenico">Arsénico</label>
						<input type="number" id="update_arsenico" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_bario">Bario</label>
						<input type="number" id="update_bario" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cadmio">Cadmio</label>
						<input type="number" id="update_cadmio" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cid">Cianuro Libre y Disociable</label>
						<input type="number" id="update_cid" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cobre">Cobre</label>
						<input type="number" id="update_cobre" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cromo">Cromo</label>
						<input type="number" id="update_cromo" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_mercurio">Mercurio</label>
						<input type="number" id="update_mercurio" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_niquel">Níquel</label>
						<input type="number" id="update_niquel" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_plomo">Plomo</label>
						<input type="number" id="update_plomo" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_selenio">Selenio</label>
						<input type="number" id="update_selenio" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_trihalomentanos">Trihalometanos</label>
						<input type="number" id="update_trihalomentanos" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_hap">Hidrocarburos Aromáticos Policíclicos (HAP)</label>
						<input type="number" id="update_hap" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cot">Carbono Orgánico Total (COT)</label>
						<input type="number" id="update_cot" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_nitritos">Nitritos</label>
						<input type="number" id="update_nitritos" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_nitratos">Nitratos</label>
						<input type="number" id="update_nitratos" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_fluoruros">Fluoruros</label>
						<input type="number" id="update_fluoruros" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_calcio">Calcio</label>
						<input type="number" id="update_calcio" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_alcalinidad">Alcalinidad</label>
						<input type="number" id="update_alcalinidad" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cloruros">Cloruros</label>
						<input type="number" id="update_cloruros" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_aluminio">Aluminio</label>
						<input type="number" id="update_aluminio" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_dureza">Dureza</label>
						<input type="number" id="update_dureza" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_hierro">Hierro</label>
						<input type="number" id="update_hierro" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_magnesio">Magnesio</label>
						<input type="number" id="update_magnesio" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_manganeso">Manganeso</label>
						<input type="number" id="update_manganeso" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_molibdeno">Molibdeno</label>
						<input type="number" id="update_molibdeno" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_sulfatos">Sulfatos</label>
						<input type="number" id="update_sulfatos" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_zinc">Zinc</label>
						<input type="number" id="update_zinc" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_fosfatos">Fosfatos</label>
						<input type="number" id="update_fosfatos" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cmt">Cancerígenas, Mutagénicas y Teratogénicas </label>
						<input type="number" id="update_cmt" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_plaguicidas">Plaguicidas</label>
						<input type="number" id="update_plaguicidas" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_coli">Escherichia Coli</label>
						<input type="number" id="update_coli" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_coliformes">Coliformes Totales</label>
						<input type="number" id="update_coliformes" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_microorganismos">Microorganismos mesofílicos</label>
						<input type="number" id="update_microorganismos" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_giardia">Giardia</label>
						<input type="number" id="update_giardia" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_cryptosporidium">Cryptosporidium</label>
						<input type="number" id="update_cryptosporidium" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_detergente">Detergente: Cloro residual libre</label>
						<input type="number" id="update_detergente" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_coagulantes_hierro">Coagulante: Sales de hierro</label>
						<input type="number" id="update_coagulantes_hierro" min="0" placeholder="" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_coagulantes_aluminio">Coagulante: Aluminio</label>
						<input type="number" id="update_coagulantes_aluminio" min="0" placeholder="" class="form-control"/>
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
		<!--Menu Botones y Filtros-->
		<nav class="nav_filtros">
			<!--Botones-->	
			<div>
				<!--Busqueda-->
				<form class="form-wrapper cf">
					<input type="text"  placeholder="Busqueda..." id ="b1" class = "ui-widget" onkeypress="Javascript: if (event.keyCode===13) event.preventDefault(); filtro_busqueda();">
					<button type="button" class="btn btn-primary" onclick="filtro_busqueda();" ><i class="glyphicon glyphicon-search"></i></button>
				</form>
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
				<div class="panel_heading">Ranchería</div>
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
							<input id="buena" name="Indicador_1" type="checkbox" onclick="filtros_ica('Buena');"/>
							<label for="buena" class="label-primary"></label>
						</div>
					</li>
					<li class="list-group-item">
						Aceptable
						<div class="material-switch pull-right">
							<input id="aceptable" name="Indicador_2" type="checkbox" onclick="filtros_ica('Aceptable');"/>
							<label for="aceptable" class="label-success"></label>
						</div>
					</li>				
					<li class="list-group-item">
						Regular
						<div class="material-switch pull-right">
							<input id="regular" name="Indicador_3" type="checkbox" onclick="filtros_ica('Regular');"/>
							<label for="regular" class="label-info" style="background-color: #FFFF00;"></label>
						</div>
					</li>
					<li class="list-group-item">
						Mala
						<div class="material-switch pull-right">
							<input id="mala" name="Indicador_4" type="checkbox" onclick="filtros_ica('Mala');"/>
							<label for="mala" class="label-warning"></label>
						</div>
					</li>
					<li class="list-group-item">
						Muy Mala
						<div class="material-switch pull-right">
							<input id="muy_mala" name="Indicador_5" type="checkbox" onclick="filtros_ica('Muy Mala');"/>
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
						Sanitariamente Inviable
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
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4yA0gaGzQ9GJgwJ784kt1kUXyeVqZ634&callback=initMap"></script>
			<div id="leyenda"><h3>Leyenda</h3></div>
		</section>
	</div>

	<!--Instrucciones-->
	<div class="modal fade" id="instrucciones" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>	
					<center><h4 class="modal-title">INSTRUCCIONES DE USO</h4></center>
				</div>
				<div class="modal-body" >
					<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
						<div class="row">
							<div class="progress" id="progress1">
								<div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
								</div>
								<span class="progress-type">Progreso</span>
								<span class="progress-completed">0%</span>
							</div>
						</div>
						<div class="row">
							<div class="row step">
								<div id="div1" class="col-md-2 activestep" onclick="javascript: resetActive(event, 0, 'Paso-1');">
									<span class="fa fa-tint"></span>
									<p>Registrar Fuente</p>
								</div>
								<div class="col-md-2 " onclick="javascript: resetActive(event, 20, 'Paso-2');">
									<span class="fa fa-road"></span>
									<p>Registrar Accesibilidad</p>
								</div>
								<div class="col-md-2" onclick="javascript: resetActive(event, 40, 'Paso-3');">
									<span class="fa fa-list-ul"></span>
									<p>Registrar Muestra</p>
								</div>
								<div class="col-md-2" onclick="javascript: resetActive(event, 60, 'Paso-4');">
									<span class="fa fa-pencil-square-o"></span>
									<p>Editar información</p>
								</div>
								<div class="col-md-2" onclick="javascript: resetActive(event, 80, 'Paso-5');">
									<span class="fa fa-filter"></span>
									<p>Aplicar filtros</p>
								</div>
								<div id="last" class="col-md-2" onclick="javascript: resetActive(event, 100, 'Paso-6');">
									<span class="fa fa-eye"></span>
									<p>Consultar Información</p>
								</div>
							</div>
						</div>
						<div class="row setup-content step activeStepInfo " id="Paso-1">
							<div class="col-xs-12">
								<div class="col-md-12 well text-center">
									<h1>1. Registrar Fuente</h1>
									<h3 class="underline">Instrucciones</h3>
									<P>Lo primero que se debe hacer para iniciar el proceso de registro de datos para la realización de la caracterización del estado de la fuente, es registrar una nueva fuente hídrica. En caso de que la fuente ya haya sido creada, puede omitir este paso</P>
									<p>Para crear una nueva fuente hídrica debe:</p>
									<p>1. Dar clic sobre el botón 'Menú' que se encuentra en la parte izquierda de la barra de navegación (Parte superior de su pantalla)</p>
									<p>2. En el desplegable, seleccionar la opción 'Insertar Fuente Hídrica' (Primera opción del desplegable)</p>
									<p>3. Se abrirá una ventana flotante en la cual deberá llenar un formulario de registro con los datos referentes a la ranchería y a fuente hídrica. En la primera sección, encontrará un desplegable el cual contiene la lista de todas las rancherías que se encuentran almacenadas dentro del sistema, deberá seleccionar una para poder continuar con el proceso de creación de una fuente hídrica. En esta sección, si desea agregar una nueva ranchería, debe oprimir el botón 'Agregar Ranchería', éste desplegará un formulario que debe llenar para realizar el registro de la nueva ranchería; una vez creada la ranchería, la página se recargará y podrá continuar con la siguiente sección del formulario (Fuente Hídrica)</p>
									<p>4. Luego de haber seleccionado una ranchería -y creado, si fue el caso-, en la siguiente sección 'Fuente Hídrica' (Segunda parte del formulario), encontrará un formulario el cual deberá llenar con la información referente al cuerpo de agua. Debe cerciorarse de que haya ingresado todos los datos requeridos, además de que estos cumplan con el formato de dato requerido, de otra forma, no le podrá ser posible registrar la información</p>
									<p>5. Si ha llenado correctamente los campos de los formularios, en la sección 'Enviar' (Tercera parte del formulario), encontrará el botón 'Guardar Datos', al oprimirlo, se almacenarán los datos en el sistema</p>
									<div>
										<video width="500" height="300" controls>
											<source src="img/video/Paso1.mp4" type="video/mp4">
											</video>
										</div>
									</div>
								</div>
							</div>
							<div class="row setup-content step hiddenStepInfo" id="Paso-2">
								<div class="col-xs-12">
									<div class="col-md-12 well text-center">
										<h1>2. Registrar Uso y Accesibilidad</h1>
										<h3 class="underline">Instrucciones</h3>
										<p>Luego de haber añadido una nueva fuente hídrica, para continuar con el proceso de caracterización de la fuente hídrica, se procede a añadir datos de uso y accesibilidad de las fuentes.</p>
										<p>Para realizar el registro de los datos de uso y accesibilidad  debe:</p>
										<p>1. Dar clic sobre el botón 'Menú' que se encuentra en la parte izquierda de la barra de navegación (Parte superior de su pantalla)</p>
										<p>2. En el desplegable, seleccionar la opción 'Insertar Accesibilidad' (Segunda opción del desplegable)</p>
										<p>3. Se abrirá una ventana flotante en la cual deberá llenar un formulario de registro con los datos referentes a el uso y la accesibilidad de las fuentes. En la primera parte del formulario, debera escoger de un  desplegable, la fuente hídrica a la que le registrará la información sobre accesibilidad y uso. Luego de seleccionar una fuente, debe proceder a la siguiente parte del formulario, la cual deberá completar, cerciorandose de que haya ingresado todos los datos requeridos, además de que estos cumplan con el formato de dato adecuado, de otra forma, no le podrá ser posible registrar la información</p>
										<p>4. Si ha llenado correctamente los campos de los formularios, en la sección 'Enviar' (Tercera parte del formulario), encontrará el botón 'Guardar Datos', al oprimirlo, se almacenarán los datos en el sistema</p>
										<div>
											<video width="500" height="300" controls>
												<source src="img/video/Paso2.mp4" type="video/mp4">
												</video>
											</div>
										</div>
									</div>
								</div>
								<div class="row setup-content step hiddenStepInfo" id="Paso-3">
									<div class="col-xs-12">
										<div class="col-md-12 well text-center">
											<h1>3. Registrar Muestra</h1>
											<h3 class="underline">Instrucciones</h3>
											<p>Una vez se hayan registrado en el sistema la información principal sobre la fuente hídrica y se tengan registrados sus datos de uso y accesibilidad, se puede proceder a registrar muestras, las cuales contendrán la información del estado en que se encuentran dichas fuentes</p>
											<p>Las muestras cuentan con dos indicadores de calidad para caracterizar el estado en cuanto a calidad del agua de las fuentes hídricas</p>
											<p>El Índice de calidad de Agua (ICA) señala el grado de calidad de un cuerpo de agua a partir del análisis de ciertas condiciones fisicoquímicas de dicho cuerpo de agua, con lo cual se pueden evidenciar indicios de los problemas de contaminación. El índice implementado en la aplicación es el ICA de las 6 variables, el cual es aplicado en Colombia desde 2009 por el IDEAM</p>
											<p>Sin embargo, este indicador por sí solo no es capaz de integrar todos los factores que pueden tener un aporte directo sobre los cuerpos de agua y afectar su estado, por lo que la aplicación propone la implementación de otro indicador que permita complementar el índice anteriormente expuesto, añadiendo un conjunto de variables fisicoquímicas y microbiológicas que posibiliten una caracterización más concluyente y fiable del estado de la fuente hídrica, este índice propuesto, es el Índice de riesgo de la calidad del agua para consumo (IRCA), establecido por el Ministerio De La Protección Social Ministerio De Ambiente, Vivienda Y Desarrollo Territorial de la República de Colombia en la resolución número 2115 de 2007</p>
											<p>El IRCA propone alrededor de 39 variables fisicoquímicas y microbiológicas, pero presenta gran flexibilidad al permitir la omisión de las variables, es decir, puede realizar el cálculo del índice sin la necesidad de tener todos los 39 valores, haciendo posible su cálculo únicamente con los valores que se poseen, aunque sí que se aconseja tener presentes algunos para tener una mejor aproximación al estado del cuerpo de agua</p>
											<p>Para realizar el registro de los datos la muestra debe:</p>
											<p>1. Dar clic sobre el botón 'Menú' que se encuentra en la parte izquierda de la barra de navegación (Parte superior de su pantalla)</p>
											<p>2. En el desplegable, seleccionar la opción 'Insertar Muestra' (Tercera opción del desplegable)</p>
											<p>3. Se abrirá una ventana flotante en la cual deberá llenar un formulario de registro con los datos referentes a la muestra. En la primera parte del formulario, deberá escoger de un  desplegable, la fuente hídrica a la que le registrará la información de la muestra realizada. Luego debe proceder a la siguiente parte del formulario, el registro de las variables del ICA, el cual deberá completar cerciorándose de que haya ingresado todos los datos requeridos con formato adecuado para no presentar problemas al momento del registro. Una vez ingresados los datos del ICA, podrá pasar a la siguiente parte del formulario para registrar los valores disponibles de las variables del IRCA.</p>
											<p>4.Una vez completado el formulario del IRCA, si ha llenado correctamente los campos de los formularios, en la sección 'Enviar' (Cuarta parte del formulario), encontrará el botón 'Guardar Datos', al oprimirlo, se almacenarán los datos en el sistema</p>
											<div>
												<video width="500" height="300" controls>
													<source src="img/video/Paso3.mp4" type="video/mp4">
													</video>
												</div>
											</div>
										</div>
									</div>
									<div class="row setup-content step hiddenStepInfo" id="Paso-4">
										<div class="col-xs-12">
											<div class="col-md-12 well text-center">
												<h1>4. Editar Información</h1>
												<h3 class="underline">Instrucciones</h3>
												<p>Una vez registrada en el sistema la información referente a una ranchería o fuente hídrica, es posible consultar, eliminar y editar dicha información en caso de desear corregir algún valor o complementar una muestra determinada con la inserción de un valor para algún parámetro</p>
												<p>Para editar la información de una ranchería o fuente hídrica debe:</p>
												<p>1. Dar clic sobre el botón 'Menú' que se encuentra en la parte izquierda de la barra de navegación (Parte superior de su pantalla)</p>
												<p>2. En el desplegable, seleccionar la opción 'Ver Fuentes Hídricas' (Cuarta opción del desplegable) o 'Ver Rancherías' (Quinta opción del desplegable)</p>
												<p>3. Se abrirá una ventana flotante en la cual podrá visualizar una tabla con todos los registros relacionados a la fuente hídrica o la ranchería según sea el caso.</p>
												<p>Para editar la información presentada debe desplazarse hacia abajo, hasta el fin de la tabla y oprimir el scroll horizontal, desplazándose de forma horizontal hasta ubicar dos botones (Al final de la tabla). Si desea editar un registro, debe oprimir el botón 'Editar' asociado a dicho registro, se desplegará una ventana emergente en la cual encontrará un formulario con la información que contiene el registro, allí podrá modificar los campos que crea pertinentes, cuando haya terminado la edición de los valores, deberá oprimir el botón 'Guardar' para almacenar los cambios realizados.</p>
												<p>Si desea eliminar un registro, deberá oprimir el botón 'Eliminar' asociado a dicho registro, al hacerlo, aparecerá un mensaje de confirmación que comprobará que esté seguro de eliminar el registro, si acepta la acción, se borrará el registro del sistema, en caso contrario, no se modificará el sistema de información</p>
												<div>
													<video width="500" height="300" controls>
														<source src="img/video/Paso4.mp4" type="video/mp4">
														</video>
													</div>
												</div>
											</div>
										</div>
										<div class="row setup-content step hiddenStepInfo" id="Paso-5">
											<div class="col-xs-12">
												<div class="col-md-12 well text-center">
													<h1>5. Aplicar Filtros</h1>
													<h3 class="underline">Instrucciones</h3>
													<p>Es posible realizar filtros de búsqueda dadas ciertas condiciones planteadas por el usuario, dependiendo el tipo de búsqueda que se realice, la aplicación mostrará en el mapa la fuente hídrica que cumple con las estipulaciones dadas</p> 
													<p>Para realizar un filtro debe seleccionar la condición por la cual la aplicación filtrará las fuentes hídricas y rancherías, para posteriormente desplegarlas en el mapa según el criterio dado, los tipos de filtros disponibles son:</p>
													<p>Filtrar por nombre de fuente hídrica o código</p>
													<p>Filtrar por Tipo de fuente hídrica</p>
													<p>Filtrar por Municipio</p>
													<p>Filtrar por Ranchería</p>
													<p>Filtrar por las diferentes categorías de ICA</p>
													<p>Filtrar por las diferentes categorías de IRCA</p>
													<p><b>Si no logra ver el marcador al que le aplicó el filtro, haga zoom sobre el mapa, tal vez se encuentre oculto detrás de otro marcador</b></p>
													<p style="color:red;">*Para poder volver a ver todas las fuentes hídricas, debe oprimir el botón de búsqueda sin ningún valor (casilla en blanco) o recargar la página</p>
													<div>
														<video width="500" height="300" controls>
															<source src="img/video/Paso5.mp4" type="video/mp4">
															</video>
														</div>
													</div>
												</div>
											</div>
											<div class="row setup-content step hiddenStepInfo" id="Paso-6">
												<div class="col-xs-12">
													<div class="col-md-12 well text-center">
														<h1>6. Consultar Información de Marcador</h1>
														<h3 class="underline">Instrucciones</h3>
														<p>Es posible consultar la información asociada a una fuente hídrica o ranchería haciendo clic sobre un marcador. Si se oprime un marcador de ranchería (Marcadores cafés), se desplegará una ventana de información sobre él en la cual se presentará la información asociada disponible. Por otro lado, si se oprime un marcador de fuente hídrica (marcadores azules), se desplegará una ventana que contendrá los datos más relevantes sobre dicha fuente, si desea obtener más información sobre la fuente, debe oprimir el botón 'Más Información' el cual abrirá una ventana que contendrá toda su información asociada</p>
														<video width="500" height="300" controls>
															<source src="img/video/Paso6.mp4" type="video/mp4">
															</video>
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
							</div>

							<div id="particles-js"></div>

							<script src="js/particles.js"></script>
							<script src="js/login.js"></script>
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
							<script src="js/script_acciones.js"></script>
							<script src="js/script_recolector.js"></script>
							<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
							<script src="js/mapa.js"></script>

						</body>
						</html>



