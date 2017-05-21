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
<body>

	<?php 
//Creamos la conexión con la BD en postgresql
	$conexion = pg_connect("host=localhost port=5432 dbname=winsig user=postgres password=root") 
	or die("Ha sucedido un error inexperado en la conexion de la base de datos");

	session_start();
	?>
	
	<div role="dialog" class="modal-dialog">
		<div class="container">
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

								<!--<li role="presentation" class="disabled">
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
								</li>-->

								<li role="presentation" class="disabled">
									<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="" data-original-title="Complete">
										<span class="round-tab">
											<i class="glyphicon glyphicon-ok"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>

						<form role="form" action="insertar_datos.php" method="post">
							<div class="tab-content">
								<div class="tab-pane active" role="tabpanel" id="fuente_hidirica">
									<div class="modal-body">
										<h3>FUENTE HÍDRICA</h3>
										
										<div class="form-group">
											Seleccione el tipo de fuente hídrica:        
											<select name="selectid_fh" id="s_fh" class="form-control" onChange="getIdFH(this)">  
												<option value="" selected disabled>Tipo</option> 
												<?php
												$fuente = pg_query($conexion, "SELECT id_tipo_fuente_hidrica, nom_tipo_fuente_hidrica FROM winsig.tipo_fuente_hidrica");
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
												$municipio = pg_query($conexion, "SELECT id_municipio, nom_municipio FROM winsig.municipio");
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
</div>
</div>	
</body>
</html>