// Hemos omitido los acentos en los comentarios por compatibilidad

				
function cargarDatos2() {
	$.ajax({
		url: "http://localhost:82/proyectojavascript/info.json"
	}).done(function (respuesta) {
	


		$("#fecha-5").html(respuesta.eventos[3].fecha +" - "+ respuesta.eventos[3].lugar);
		$("#nombre-5").html(respuesta.eventos[3].nombre);
		$("#descripcion-5").html(respuesta.eventos[3].descripcion);
		$("#costo-5").html("Costo: "+respuesta.eventos[3].precio);

		
		$("#fecha-6").html(respuesta.eventos[2].fecha +" - "+ respuesta.eventos[2].lugar);
		$("#nombre-6").html(respuesta.eventos[2].nombre);
		$("#descripcion-6").html(respuesta.eventos[2].descripcion);
		$("#costo-6").html("Costo: "+respuesta.eventos[3].precio);
	
		
		$("#fecha-7").html(respuesta.eventos[0].fecha +" - "+ respuesta.eventos[0].lugar);
		$("#nombre-7").html(respuesta.eventos[0].nombre);
		$("#descripcion-7").html("Costo: "+respuesta.eventos[0].descripcion);
				
		$("#costo-7").html("Costo: "+respuesta.eventos[3].precio);
	
		

	
	});
};
  


//Define las variables que necesites

$(document).ready(function () {
				  
				cargarDatos2();  

				  
				  

  //Carga los datos que estan en el JSON (info.json) usando AJAX

  //Guarda el resultado en variables

  //Selecciona los eventos que sean posteriores a la fecha actual del JSON

  //Ordena los eventos segun la fecha (los mas cercanos primero)

  //Crea un string que contenga el HTML que describe el detalle del evento

  //Recorre el arreglo y concatena el HTML para cada evento

  //Modifica el DOM agregando el html generado dentro del div con id=evento

});
