// Hemos omitido los acentos en los comentarios por compatibilidad

				
function cargarDatos4() {
	$.ajax({
		url: "http://localhost:82/proyectojavascript/info.json"
	}).done(function (respuesta) {
	


		$("#fecha-11").html(respuesta.eventos[3].fecha +" - "+ respuesta.eventos[3].lugar);
		$("#nombre-11").html(respuesta.eventos[3].nombre);
		$("#descripcion-11").html(respuesta.eventos[3].descripcion);
		$("#costo-11").html("Costo: "+respuesta.eventos[3].precio);
		$("#invitado-11").html("Costo: "+respuesta.eventos[3].invitados);

		

	
	});
};





//Define las variables que necesites

$(document).ready(function () {

	
	
				  
				cargarDatos4();  

				  
				  

  //Carga los datos que estan en el JSON (info.json) usando AJAX

  //Guarda el resultado en variables

  //Selecciona los eventos que sean posteriores a la fecha actual del JSON

  //Ordena los eventos segun la fecha (los mas cercanos primero)

  //Crea un string que contenga el HTML que describe el detalle del evento

  //Recorre el arreglo y concatena el HTML para cada evento

  //Modifica el DOM agregando el html generado dentro del div con id=evento

});