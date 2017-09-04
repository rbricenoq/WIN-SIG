<!DOCTYPE html>
<html>
<head>
 <title></title>
</head>
<body>
  <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="100" align="center"><strong>Nombre</strong></td>
      <td width="100" align="center"><strong>Apellido</strong></td>
      <td width="100" align="center"><strong>Telefono</strong></td>
      <td width="100" align="center"><strong>Correo</strong></td>
      <td width="100" align="center"><strong>Usuario</strong></td>
      <br>
    </tr> 

    <?php
    $conexion = pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
    or die("Ha sucedido un error inexperado en la conexion de la base de datos");

    session_start();
    $sql = "SELECT nombre, apellido, tel_usuario, correo_usuario, nom_usuario FROM wintig.usuario where id_tipo_de_usuario = 2";
    $result = pg_query($conexion, $sql);
    if (!$result) {
      echo "An error occurred.\n";
      exit;
    }
    while($row = pg_fetch_assoc($result)) 
    {      
      ?> 
      <tr>
        <td class="" align="center"><?$row['Nombre']?></td>
        <td class="" align="center"><?$row['apellido']?></td>
        <td class="" align="center"><?$row['telefono']?></td>
        <td class="" align="center"><?$row['correo']?></td>
        <td class="" align="center"><?$row['usuario']?></td>
      </tr> 

      <?php 
    }
    ?>
  </body>
  </html>