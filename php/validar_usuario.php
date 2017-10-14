<?php
include('conexion.php'); 

session_start();

if(trim($_POST["usuario"]) != "" && trim($_POST["password"]) != ""){

  $usuario = strtolower(htmlentities($_POST["usuario"], ENT_QUOTES));
  $password = $_POST["password"];
  $pass=encriptar($password);
  $result = pg_query('SELECT nom_usuario, password, id_tipo_de_usuario, estado FROM wintig.usuario WHERE nom_usuario=\''.$usuario.'\'');
  if($row = pg_fetch_array($result)){
   if($row["estado"] == 0){
     echo'Debe Activar Su Cuenta Para Poder Recolectar Información'; 
     echo '
     <SCRIPT LANGUAGE="javascript">
     location.href = "/WIN-TIG/Login.php";
     </SCRIPT>';
   } else{
     if($row["password"] == $pass){
       $_SESSION["username"] = $row['nom_usuario'];
       echo 'Has sido logueado correctamente '.$_SESSION['username'].' <p>';
       if($row["id_tipo_de_usuario"] == 1){
         echo '
         <SCRIPT LANGUAGE="javascript">
         location.href = "/WIN-TIG/Home_Admin.php";
         </SCRIPT>';
       }
       else{
        echo '
        <SCRIPT LANGUAGE="javascript">
        location.href = "/WIN-TIG/Home_Recolector.php";
        </SCRIPT>';
      } 

    }
    else{
      echo 'Password incorrecto';
      echo '
      <SCRIPT LANGUAGE="javascript">
      location.href = "/WIN-TIG/Login.php";
      </SCRIPT>';
    }
  }
}
else{
  echo 'Usuario no existente en la base de datos';
  echo '
  <SCRIPT LANGUAGE="javascript">
  location.href = "/WIN-TIG/Login.php";
  </SCRIPT>';
}
pg_free_result($result);
}
else{
  echo 'Debe especificar un usuario y password';
  echo '
  <SCRIPT LANGUAGE="javascript">
  location.href = "/WIN-TIG/Login.php";
  </SCRIPT>';
}
pg_close();
?> 