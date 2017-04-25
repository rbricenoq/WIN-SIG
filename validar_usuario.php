<?php

//Conexion a la BD
$conex = "host=localhost port=5432 dbname=winsig user=postgres password=root";
$cnx = pg_connect($conex) or die ("<h1>Error de conexion.</h1> ". pg_last_error());
session_start();

if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != ""){

  $usuario = strtolower(htmlentities($_POST["usuario"], ENT_QUOTES));
  $password = $_POST["password"];
  $result = pg_query('SELECT nom_usuario, password FROM winsig.usuario WHERE nom_usuario=\''.$usuario.'\'');
  if($row = pg_fetch_array($result)){
    if($row["password"] == $password){
     $_SESSION["username"] = $row['nom_usuario'];
     echo 'Has sido logueado correctamente '.$_SESSION['username'].' <p>';
     echo '
     <SCRIPT LANGUAGE="javascript">
       location.href = "/WIN-SIG/Home.php";
     </SCRIPT>';
   }
   else{
    echo 'Password incorrecto';
  }
}
else{
  echo 'Usuario no existente en la base de datos';
}
pg_free_result($result);
}
else{
  echo 'Debe especificar un usuario y password';
}
pg_close();
?>