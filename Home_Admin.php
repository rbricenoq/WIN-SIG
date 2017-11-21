<!DOCTYPE html>
<html lang="es">
<head>
	<title>WIN-TIG - Administración</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="icon" href="img/favicon.ico" >
	<link href="css/css_home.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<link href="css/form_var.css" rel="stylesheet">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/form_var.js"></script>
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
				<a class="navbar-brand" href="http://93.188.162.196/WIN-TIG/Home_Admin.php">WIN-TIG</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#contacto" data-toggle="modal">Contacto</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#cuestionario" data-toggle="modal">Cuestionarios</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menú<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#editar_usuarios" data-toggle="modal" style="text-align: left;"><span class="glyphicon glyphicon-edit"></span> Editar Usuario</a></li>
							<li><a href="#registros_fuente_hidirica" style="text-align: left;" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar Fuentes Hídricas</a></li>
							<li><a href="#registros_rancheria" style="text-align: left;" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar Rancherias</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					if (isset($_SESSION['username'])) {
						?>
						<li>
							<a class="active" style="background: DeepSkyBlue; font-weight: bold; color: SlateGrey ;"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']?></a>
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
					<A HREF="https://docs.google.com/forms/u/1/d/e/1FAIpQLSdZpIZBJcH62i1TT_bPZzL8y089QmLQsj-BA47xAtUXIdpqfQ/viewform" TARGET="_BLANK"><p>Utilidad, Satisfacción y Facilidad de Uso</p></A>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
				</div>
			</div>  
		</div>
	</div>

	<!-- Pop.up ver registros de Usuarios -->
	<div class="modal fade" id="editar_usuarios" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" style="display: table; left: -10%;">
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


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>    
				</div>
			</div>  
		</div>
	</div>	

	<!-- Pop-up - actualizar usuarios-->
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
						<input type="text" id="update_nombre" placeholder="Nombre" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_apellido">Apellido</label>
						<input type="text" id="update_apellido" placeholder="Apellido" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_tel_usuario">Teléfono</label>
						<input type="text" id="update_tel_usuario" placeholder="Teléfono" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_correo_usuario">Correo</label>
						<input type="text" id="update_correo_usuario" placeholder="Correo" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_nom_usuario">Usuario</label>
						<input type="text" id="update_nom_usuario" placeholder="Usuario" class="form-control"/>
					</div>

					<div class="form-group">
						<label for="update_estado">Estado</label>
						<input type="text" id="update_estado" placeholder="Estado" class="form-control"/>
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



	<!-- Contenedor Filtro y Mapa-->

	<div class="container">
		<nav class="nav_filtros">	
			<!--Busqueda-->
			<div>
				<form class="form-wrapper cf">					
					<input type="text"  placeholder="Busqueda..." id ="b1" class = "ui-widget" onkeypress="Javascript: if (event.keyCode===13) event.preventDefault(); filtro_busqueda();">
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
	
	<div id="particles-js"></div>
	<script src="js/particles.js"></script>
	<script src="js/login.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script_usuarios.js"></script>
	<script src="js/script_recolector.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/mapa.js"></script>

</body>
</html>