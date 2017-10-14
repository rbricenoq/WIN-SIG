<?php 
//incluimos conexion para establecer la conexion con la base y usar las funciones antes declaradas.
include('conexion.php'); 

//recogemos mediante GET el valor MD5 del user y el codigo de activacion y lo almacenamos en variables
$user = $_GET['user']; 
$cod = $_GET['cod']; 

//consultamos a la base los campos user,cod_act de la tabla miembros donde nom_usuario sea igual a la variable user, activate sea igual a la variable cod_act y estado sea igual a 0
$validar = pg_query("SELECT nom_usuario,activate FROM wintig.usuario WHERE nom_usuario='$user' AND activate = '$cod' AND estado = 0");

//si el numero devuelto de columnas es 0 significa que ya valido la cuenta, entonces damos mensaje de esto.
if(pg_num_rows($validar) == 0){ 
    echo'Ya Validaste Tu Cuenta';
    header('Refresh:1; url = http://localhost/WIN-TIG/Login.php'); 
}else{ 

//en caso de ser falso lo anterior, cambiamos el valor activada a 1 donde user sea igual a la variable user de la tabla miembros
    $activar = pg_query("UPDATE wintig.usuario SET estado=1 WHERE nom_usuario = '$user'");
     
    if($activar){ 
        echo'Cuenta Activada Con Éxito, Ya Puede Loguearse y Recolectar Datos. En Unos Segundos Será Redirigido al Login';
        header('Refresh:5; url = http://localhost/WIN-TIG/Login.php'); 
// si se cambia con exito, se muestra un mensaje informandolo 
    }else{ 
//de no ser asi tambien se lo informa 
        echo'Error Al Intentar Activar La Cuenta'; 
        header("location: /WIN-TIG/Login.php");
    } 
} 
?> 
