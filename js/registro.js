// Hemos omitido los acentos en los comentarios por compatibilidad

var errorNombres = document.getElementById("errornombres");
var errorEmail = document.getElementById("errorEmail");
var errorContrasena = document.getElementById("errorContrasena");
var errorConfirmacion = document.getElementById("errorConfirmacion");
var errorTipo = document.getElementById("errorTipo");
var errorAcepto = document.getElementById("errorAcepto");


function validar(formulario) {


	if (formulario.nombres.value.trim().length == 0) {
		errorNombres.innerHTML = "Este campo es obligatorio";
		return false;
	}


	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!re.test(formulario.email.value)) {
		errorEmail.innerHTML = "Campo invalido";
		return false;
	}

	if (formulario.contrasena.value.trim().length < 6) {
		document.getElementById("errorContrasena").innerHTML = "Debe tener al menos 7 caracteres";
		return false;
	}


	if (formulario.contrasena.value != formulario.confirmacion.value) {
		errorConfirmacion.innerHTML = "No coincide las contraseñas";
		return false;
	}
	if (formulario.tipo.selectedIndex == 0) {

		errorTipo.innerHTML = "Este campo obligatorio";
		return false;

	}
	if (!formulario.acepto.checked) {
		errorAcepto.innerHTML = "Este campo obligatorio";
		return false;
	}

	return true;

}
