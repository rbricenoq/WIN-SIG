<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="css/css_home.css" rel="stylesheet">
  <link href="css\login.css" rel="stylesheet">
  <link href="css\index.css" rel="stylesheet">
  <link href="css\form_var.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoz1qiEOcBOfBZJujmvJC7MPe5l-ihNr8&callback=initMap" async defer> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/map.js"></script>
  <script src="js/form_var.js"></script>

</head>
<html>

<?php
$conexion = pg_connect("host=localhost port=5432 dbname=winsig user=postgres password=root") 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

session_start();
?>
<body> 

 <div class="modal dialogh" id="form_regis" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        <center><h4 class="modal-title">REGISTRO WIN-SIG</h4></center>
      </div>
      <div class="modal-body">
        <form name="insertar" action="insertar_usuario.php" method="post"> 
          <div class="form-group">
            Nombre:<br>
            <input type="text" class="form-control" name="nombre" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo se permiten letras y vocales" required><br>
            Apellidos:<br>
            <input type="text" class="form-control" name="apellido" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Sólo se permiten letras y vocales" required><br>
            Telefono:
            <input type="text" class="form-control" name="telefono" pattern="[0-9]{7,10}+" title="Ingresa un número válido: 7 dígitos para casa u oficina, 10 dígitos para celulares" required><br>
            Correo Electrónico:
            <input type="email" class="form-control" name="email" title="Agregue una dirección de correo electrónico como user@example.com" required><br>
            Nombre de Usuario:
            <input type="text" class="form-control" name="nom_usuario"  pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ@_-&\s]+" title="Ingresa el nombre de usuario con el que serás identificad@" required><br>
            Contraseña:
            <input type="password" class="form-control" name="contra1" required><br>
            Confirmar contraseña:
            <input type="password" class="form-control" name="contra2" required><br>
            <button type="submit"  class="btn btn-primary  btn-lg center-block"><span class="glyphicon glyphicon-save"></span> Registrar</button>  
            <script>
              $(document).ready(function(){
                $("#registro").onclick(function(){
                  $("#form_regis").modal();
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

</body>
</html> 
