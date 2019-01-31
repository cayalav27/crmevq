/*=============================================
VALIDAR USUARIO EXISTENTE AJAX
=============================================*/

$("#TxtRucCli").change(function(){
	var ruc = $("#TxtRucCli").val();

	var datos = new FormData();
	datos.append('validarRuc', ruc);

	$.ajax({
		url: "core/ajax.php",
		method: "post",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			console.log(respuesta);
			if (respuesta==0) {
				$("b[for='ruc'] span").html("<span class='label bg-red'>RUC ya registrado</span>");
			}
			else {
				$("b[for='ruc'] span").html("<span class='label bg-green'>Correcto</span>");
			}
		}
	});
});

/*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/


/*=============================================
VALIDAR REGISTRO
=============================================*/

function ValidarRegCli(){

	var ruc = document.querySelector("#TxtRucCli").value;	

	/* VALIDAR RUC */

	if(ruc != ""){

		var caracteres = ruc.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres > 15){

			document.querySelector("label[for='ruc']").innerHTML += "<font color='red' size='2'>RUC ya registrado";

			return false;
		}

		if(!expresion.test(ruc)){

			document.querySelector("label[for='ruc']").innerHTML += "<font color ='red'>No escriba caracteres especiales.";

			return false;

		}

	}
	
return true;

}
/*=====  FIN VALIDAR REGISTRO  ======*/
