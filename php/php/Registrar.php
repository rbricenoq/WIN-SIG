<?php 
//incluimos el archivo conexion.php para establecer la conexion y tener acceso a todas las funciones declaradas
include('correo.php');
session_start();
//recogemos mediante POST los datos de user,password y email y los almacenamos en variables
$nombre = $_POST["nombre"]; 
$apellido = $_POST["apellido"]; 
$telefono = $_POST["telefono"]; 
$email = $_POST["email"];
$user = $_POST["usuario"];
$password = $_POST["contra1"]; 
$password2 = $_POST["contra2"]; 

//si la variable del user,password o email se encuentran vacias damos mensaje que se deben completar todos los campos y detenemos la ejecucion del script.
if($nombre==NULL|$apellido==NULL|$telefono==NULL|$email==NULL|$user==NULL|$password==NULL|$password2==NULL) { 
    echo "Hay campos vacíos. Por favor revise el formulario de registro."; 
    die(); 
} else { 

//si la condicion anterior es falsa, encriptamos el user y pass con MD5, y generamos un codigo al azar de 16 digitos el cual sera usado para la activacion de la cuenta
    $pass=encriptar($password); 
    $activate = substr(md5(rand()),0,16); 
} 

$checkuser = pg_query("SELECT nom_usuario FROM wintig.usuario WHERE nom_usuario ='$user'"); 
$username_exist = pg_num_rows($checkuser); 
$checkemail = pg_query("SELECT correo_usuario FROM wintig.usuario WHERE correo_usuario ='$email'"); 
$email_exist = pg_num_rows($checkemail); 
if ($email_exist>0) { 
    echo "La cuenta de correo se encuentra ya en uso. Por favor elija otra."; 
    die();

}elseif ($username_exist>0) { 
  echo "El nombre de usuario ya se encuentra en uso. Por favor elija otro."; 
  die();
} else { 

    $query = 'INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password, activate, estado) 
    VALUES (\''. $nombre.'\',\''.$apellido.'\',2,\''.$telefono.'\',\''.$email.'\',\''.$user.'\',\''.$pass.'\',\''.$activate.'\', 0)'; 
    pg_query($query) or die(pg_last_error()); 

    if($query){ 
//si se agrega correctamente damos un mensaje de que se registro con exito y llamamos a la funcion enviar_email definida en conexion.php con los parametros email,usuario, y codigo de activacion
        //echo"http://localhost/validar.php?user=$user&cod=$cod_act"; 
        enviar_mail($email,$user,$activate,$password); 
    }else{ 
//en caso de no poder insertar el nuevo usuario dejamos un codigo de error. 
        echo'Hubo Un Error Al Intentar Registrarle, Inténtelo De Nuevo'; 
        header("location: /WIN-TIG/Login.php"); 
    } 
} 
?> 

