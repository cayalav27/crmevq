/*=============================================
VALIDAR USUARIO EXISTENTE AJAX
=============================================*/


/*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/


/*=============================================
VALIDAR REGISTRO
=============================================*/

function validarRegistro(){

	var usuario = document.querySelector("#nomusuario").value;	

	var password = document.querySelector("#password").value;

	/* VALIDAR USUARIO */

	if(usuario != ""){

		var caracteres = usuario.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres > 15){

			document.querySelector("label[for='nomusuario']").innerHTML += "<font color='red' size='2'>Escriba menos de 15 caracteres.";

			return false;
		}

		if(!expresion.test(usuario)){

			document.querySelector("label[for='nomusuario']").innerHTML += "<font color ='red'>No escriba caracteres especiales.";

			return false;

		}

	}

	/* VALIDAR PASSWORD */

	if(password != ""){

		var caracteres = password.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres < 6){

			document.querySelector("label[for='password']").innerHTML += "<font color='red' size='1'>Escriba más de 6 caracteres.";

			return false;
		}

		if(!expresion.test(password)){

			document.querySelector("label[for='password']").innerHTML += "<font color='red' size='1'>No escriba caracteres especiales.";

			return false;

		}

	}

	
return true;

}
/*=====  FIN VALIDAR REGISTRO  ======*/
