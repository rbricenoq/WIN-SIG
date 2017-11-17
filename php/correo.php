<?php 

//Creamos la conexión con la BD en postgresql
pg_connect("host=localhost port=5432 dbname=wintig user=postgres password=root") 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");
//desconectamos la base de datos

//creamos una funcion para encriptar en md5 valores como pueden ser el password,etc
function encriptar($valor){ 
	$encriptado = md5($valor); 
	return $encriptado; 
} 


//creamos una funcion para facilitar el envio por mail del link de la validacion de cuenta.
function enviar_mail($email,$user,$cod_act,$password) 
{   
	$destinatario = $email; 
	$nombre_origen    = "WIN-TIG"; 
	$email_origen     = "wintig2016ii@gmail.com"; 
	$email_copia      = "wintig2016ii@gmail.com"; 
	$email_ocultos    = "wintig2016ii@gmail.com"; 
	$link = "http://localhost/WIN-TIG/php/validar.php?user=$user&cod=$cod_act";

	$asunto = "Validacion De Cuenta En WIN-TIG"; 

	$cuerpo = '
	<html>
	<head>
	<title>Validación cuenta en WIN-TIG</title>
	</head>
	<body>
	<table width="629" border="0" cellspacing="1" cellpadding="2"> 
	<tr> 
	<td width="623" align="left"></td> 
	</tr> 
	<tr> 
	<td bgcolor="#2EA354"><div style="color:#FFFFFF; font-size:14; font-family: Arial, Helvetica, sans-serif; text-transform: capitalize; font-weight: bold;"><strong>     Estos son sus datos de registro:</strong></div></td> 
	</tr> 
	<tr> 
	<td height="95" align="left" valign="top"><div style=" color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-bottom:3px;"> USUARIO: '.$user.'</strong><br><br><br> 
	<strong>SU CLAVE : </strong>'.$password.'</strong><br><br><br> 
	<strong>SU EMAIL : </strong>'.$email.'</strong><br><br><br> 
	<strong>SU LINK DE ACTIVACION:<br><a href="'.$link.'">'.$link.' </strong></a><br><br><br> 
	<strong>POR FAVOR HAGA CLICK EN LINK DE ARRIBA PARA ACTIVAR SU CUENTA Y ACCEDER A LA PAGINA SIN RESTRICCIONES</strong><br><br><br>  
	<strong>SI EL LINK NO FUNCIONA A LA PRIMERA INTENTELO UNA SEGUNDA, EL SERVIDOR A VECES TARDA EN PROCESAR LA PRIMERA ORDEN</strong><br><br><br> 

	<strong>GRACIAS POR REGISTRARSE EN WIN-TIG.</strong><br><br><br> 
	</div> 
	</td> 
	</tr> 
	</table>
	</body>
	</html>
	';

	$headers []= "From: $nombre_origen <$email_origen>"; 
	$headers []= "Return-Path: <$email_origen>"; 
	$headers []= "Reply-To: $email_origen"; 
	$headers []= "X-Sender: $email_origen"; 
	$headers []= "X-Priority: 3"; 
	$headers []= "MIME-Version: 1.0"; 
	$headers []= "Content-Transfer-Encoding: 7bit"; 
	$headers []= 'X-Mailer: PHP/' . phpversion();
	$headers []= "Content-Type: text/html; charset=iso-8859-1";

	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

	if(mail($destinatario,$asunto,$cuerpo,implode("\r\n", $headers))){
		echo "<table width=70%><tr bgcolor= #61e877 class= estilo30><div align=center>"; 
		echo 'Ha sido registrado en WIN-TIG como: <b>'.$user.' </b>de manera satisfactoria.<br />'; 
		echo ' Gracias. Le enviaremos ahora un correo electrónico <br />'; 
		echo 'para activar su cuenta, al email que nos facilitó.<br />'; 
		echo 'Su información fue enviada satisfactoriamente a su correo - ('.$destinatario.')<br />';
		echo 'por favor abra su email y haga click sobre el link de activación para activar su cuenta.<br />';  
		echo 'Si el correo no esta en la bandeja principal revise en la sección de spam, gracias.<br />'; 
		echo "</div></tr>"; 
		echo "</table>"; 
	}else {
		echo("<p> Desafortunadamente la información de su cuenta <u>no pudo ser enviada a su correo electrónico</u> - ($destinatario).</p>");
	} 
}
?> 