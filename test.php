<html>
<head>
  <title>Select Query</title>
</head>

<body>
<table style="text-align: center;">
  <TR>
    <TD>A</TD>
    <TD>A</TD>
    <TD><b>Nombre</b></TD>
    <TD ><b>Apellido</b></TD>
    <TD><b>Telefono</b></TD>
    <TD><b>Correo</b></TD>
    <TD><b>Usuario</b></TD>
  </TR>
  <?php
  $conn = pg_Connect('host=localhost port=5432 dbname=wintig user=postgres password=root');
  if (!$conn) {echo 'Ha ocurrido un erro de conexión con la base de datos.\n'; exit;}
  $result = pg_Exec($conn,'SELECT nombre, apellido, tel_usuario, correo_usuario, nom_usuario FROM wintig.usuario where id_tipo_de_usuario = 2 ORDER BY nombre');

  if (!$result) {echo 'Erro en la consulta.\n'; exit;}
  $num_result = pg_NumRows($result);
  $i = 0;
  while ($i < $num_result) {
   $nom[$i] = pg_Result($result, $i, 'nombre');
   $apellido[$i] = pg_Result($result, $i, 'apellido');
   $telefono[$i] = pg_Result($result, $i, 'tel_usuario');
   $correo[$i] = pg_Result($result, $i, 'correo_usuario');
   $usuario[$i] = pg_Result($result, $i, 'nom_usuario');
   echo '<TR><TD style="border: red 1px solid"><A href=editform.php?>[Edit]</A>';
   echo '<A href=delete.php?>[Delete]</A></TD>';
   echo '<TD>'.$nom[$i].'</TD>';
   echo '<TD>'.$apellido[$i].'</TD>';
   echo '<TD>'.$telefono[$i].'</TD>';
   echo '<TD>'.$correo[$i].'</TD>';
   echo '<TD>'.$usuario[$i].'</TD></TR>';
   $i++;
 }
 pg_Close($conn);

 ?>
</table>
</body>
</html>