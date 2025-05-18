// Hemos omitido los acentos en los comentarios por compatibilidad

//Define las variables que necesites


function cargarDatos() {
	$.ajax({
		url: "http://localhost:82/proyectojavascript/info.json"
	}).done(function (respuesta) {
	


		$("#fecha-1").html(respuesta.eventos[3].fecha);
		$("#nombre-1").html(respuesta.eventos[3].nombre);
		$("#descripcion-1").html(respuesta.eventos[3].descripcion);

		
		$("#fecha-2").html(respuesta.eventos[2].fecha);
		$("#nombre-2").html(respuesta.eventos[2].nombre);
		$("#descripcion-2").html(respuesta.eventos[2].descripcion);
	
		
		$("#fecha-3").html(respuesta.eventos[0].fecha);
		$("#nombre-3").html(respuesta.eventos[0].nombre);
		$("#descripcion-3").html(respuesta.eventos[0].descripcion);
	
		
		$("#fecha-4").html(respuesta.eventos[1].fecha);
		$("#nombre-4").html(respuesta.eventos[1].nombre);
		$("#descripcion-4").html(respuesta.eventos[1].descripcion);
	
	});
};









$(document).ready(function () {

	//Carga los datos que estan en el JSON (info.json) usando AJAX


	cargarDatos();

	//Guarda el resultado en variables

	//Clasifica los eventos segun la fecha actual del JSON

	//Ordena los eventos segun la fecha (los mas cercanos primero)

	//Extrae solo dos eventos

	//Ordena los eventos segun la fecha (los mas cercanos primero)

	//Extrae solo dos eventos

	//Crea un string que contenga el HTML que describe el detalle del evento

	//Recorre el arreglo y concatena el HTML para cada evento

	//Modifica el DOM agregando el html generado

	//Crea un string que contenga el HTML que describe el detalle del evento

	//Recorre el arreglo y concatena el HTML para cada evento

	//Modifica el DOM agregando el html generado

});
