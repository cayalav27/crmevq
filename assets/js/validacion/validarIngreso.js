/*=============================================
VALIDAR INGRESO
=============================================*/
function validarIngreso(){

	var usuario = document.querySelector("#login").value;	

	var password = document.querySelector("#password").value;

	/* VALIDAR USUARIO */

	if(usuario != ""){

		var caracteres = usuario.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres > 15){

			document.querySelector("label[for='login']").innerHTML += "<div class='alert bg-red alert-dismissible col-lg-12' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>El usuario contiene mas de 15 caracteres</div>";

			return false;
		}

		if(!expresion.test(usuario)){

			document.querySelector("label[for='login']").innerHTML += "<div class='alert bg-red alert-dismissible col-lg-12' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>No escriba caracter especial en el usuario</div>";

			return false;

		}

	}

	/* VALIDAR PASSWORD */

	if(password != ""){

		var caracteres = password.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres < 6){

			document.querySelector("label[for='password']").innerHTML += "<div class='alert bg-red alert-dismissible col-lg-12' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Escriba la clave con más de 6 caracteres</div>";

			return false;
		}

		if(!expresion.test(password)){

			document.querySelector("label[for='password']").innerHTML += "<div class='alert bg-red alert-dismissible col-lg-12' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>No escriba caracter especial en la clave</div>";

			return false;

		}

	}

	
return true;

}
/*=====  FIN VALIDAR INICIO  ======*/
