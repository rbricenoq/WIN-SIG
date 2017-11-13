$(document).ready(function() {
	//variables
	var pass1 = $('[name=contra1]');
	var pass2 = $('[name=contra2]');
	var confirmacion = "Las contraseñas ingresadas coinciden";
	var negacion = "Las contraseñas ingresadas no coinciden";
	//oculto por defecto el elemento span
	var span = $('<center><span></span></center>').insertAfter(pass2);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	span.text(negacion).addClass('negacion');	
	}
	if(valor1.length!=0 && valor1==valor2){
	span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
	});
});
