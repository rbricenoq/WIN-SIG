<html>
<head>
  <title>Edit Record Form</title>
  <?php
  $conn = pg_Connect('host=localhost port=5432 dbname=wintig user=postgres password=root');
  if (!$conn) {
    echo 'Ha ocurrido un erro de conexión con la base de datos.';
    exit;
  }
  $result = pg_Exec($conn,'SELECT id_usuario, nombre, apellido, tel_usuario, correo_usuario, nom_usuario FROM wintig.usuario where id_usuario = $ID');

  if (!$result) {
    echo 'Erro en la consulta.\n';
    exit;
  }
  $id_usuario = pg_Result($result, $i, 'id_usuario');
  $nom = pg_Result($result, $i, 'nombre');
  $apellido = pg_Result($result, $i, 'apellido');
  $telefono = pg_Result($result, $i, 'tel_usuario');
  $correo = pg_Result($result, $i, 'correo_usuario');
  $usuario = pg_Result($result, $i, 'nom_usuario');  
  pg_FreeResult($result);
  pg_Close($conn);
  ?> <
</head>
<body>
  <b>Please update the following:</b></font>
  <p><font size="2" face="Arial, Helvetica, sans-serif">
    <form action="edit.php?ID=<? echo $id_usuario ?>" method="POST" enablecab="Yes">
      Nombre:<br>
      <input type="Text" name="Nombre" align="LEFT" required="Yes" size="30" 
      value="<?php echo $nom?>"><br>
      Apellido:<br>
      <input type="Text" name="Apellido" align="LEFT" required="Yes" size="30"
      value="<?php echo $apellido ?>"><br>
      Telefono:<br>
      <input type="Text" name="Telefono" align="LEFT" required="Yes" size="30"
      value="<?php echo $telefono ?>"><br>
      Correo:<br>
      <input type="Text" name="Correo" align="LEFT" required="Yes" size="30"
      value="<?php echo $correo ?>"><br>
      Usuario:<br>
      <input type="Text" name="Usuario" align="LEFT" required="Yes" size="30"
      value="<?php echo $usuario ?>"><br>
      <input type="Submit" name="Submit" value="Submit" align="MIDDLE">
    </form>
  </body>
  </html>