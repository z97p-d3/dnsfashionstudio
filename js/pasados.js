function cargarDatos3() {
	$.ajax({
		url: "http://localhost:82/proyectojavascript/info.json"
	}).done(function (respuesta) {
	


		$("#fecha-8").html(respuesta.eventos[0].fecha +" - "+ respuesta.eventos[0].lugar);
		$("#nombre-8").html(respuesta.eventos[0].nombre);
		$("#descripcion-8").html(respuesta.eventos[0].descripcion);
		$("#costo-8").html("Costo: "+respuesta.eventos[0].precio);

		
		$("#fecha-9").html(respuesta.eventos[1].fecha +" - "+ respuesta.eventos[1].lugar);
		$("#nombre-9").html(respuesta.eventos[1].nombre);
		$("#descripcion-9").html(respuesta.eventos[1].descripcion);
		$("#costo-9").html("Costo: "+respuesta.eventos[1].precio);
	
		
		$("#fecha-10").html(respuesta.eventos[4].fecha +" - "+ respuesta.eventos[4].lugar);
		$("#nombre-10").html(respuesta.eventos[4].nombre);
		$("#descripcion-10").html("Costo: "+respuesta.eventos[4].descripcion);
				
		$("#costo-10").html("Costo: "+respuesta.eventos[4].precio);
	
		

	
	});
};
  


//Define las variables que necesites

$(document).ready(function () {
	
	
				  
				cargarDatos3();  


				  
				  

  //Carga los datos que estan en el JSON (info.json) usando AJAX

  //Guarda el resultado en variables
	

		//que sean posteriores a la fecha actual del JSON

  //Ordena los eventos segun la fecha (los mas cercanos primero)

  //Crea un string que contenga el HTML que describe el detalle del evento

  //Recorre el arreglo y concatena el HTML para cada evento

  //Modifica el DOM agregando el html generado dentro del div con id=evento

});
