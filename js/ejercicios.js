/*// JavaScript Document


var hora =0;
var min =0;
var totalminutos=0;
var costo;
var cantidad;
var totalrec;



function totminutos (hora, min){
	totalminutos= (hora*60)+min;
	
	return totalminutos;

	
}

function cantrec(costo, cantidad){
	
	totalrec= costo*cantidad;
	
	return totalrec;
}

var nombre= " dario"
var apelido= "Pilacuan"
var curso="javascript"

//hoo <nombre< appellido , bienvenido a l curos



function saludar(nombre, apelido, curso){
	
var resultado= "hola"+ nombre+ " "+apelido+ "bienvenido al corso "+ curso;
	var resu= 'hola ${nombre} ${apelido}, bienvenido al curso ${curso}';
	return resultado;
}

console.log(saludar("Luis", "ALbino", "php"));

console.log(totminutos(8,5));


console.log(cantrec(10,5));*/



function capitalize(x) {

	return x.slice(0).toUpperCase();
}

function lower(x) {
	return x.slice(0).toLowerCase();
}

function procesarFila(fila) {


	var arreglo = fila.split(",");
	var nombre = arreglo[0].trim();
	var apellido = arreglo[1].trim();
	return capitalize(nombre) + " " + capitalize(apellido);
}

var fila = "luiS, BLANCO  ";
console.log(procesarFila(fila));


function encabezadoEvento(x, y) {
	var encabezado = "Evento: " + x + ". " + "Lugar: " + y;

	return encabezado;

}

function limpiarNombreParticipante(x, y) {

	return capitalize(x) + ", " + lower(y);
}



console.log(encabezadoEvento("Intercambio de Libros", "Biblioteca"));
console.log(encabezadoEvento("Ledctura de Poemas", "Sala A"));

console.log(limpiarNombreParticipante("		Luis", "Castro		"));


/*var condicionSalud = true;
var sobrePeso = false;
var estaActivo = false;
if (estaActivo) {
	if (condicionSalud || sobrePeso) {
		console.log("Remitir al doctor")
	} else {
		console.log("Felicitaciones, estas en buenas condiciones")
	}
} else {
	if (condicionSalud || sobrePeso) {
		console.log("Remitir al especialista")
	} else {
		console.log("Remitir a gimnasio")
	}
}

console.log(estaActivo())*/


var recetavegetarianos = ["legumbres", "frutas", "hortalizas"];

var recetanoVegetarianos = ["carnes", "embutidos", "pollo"];
//true es vegetariano
var menu = true;

function tipoMenu() {
	if (menu) {

		console.log(recetavegetarianos[0]);


	} else {

		console.log(recetanoVegetarianos[0]);
	}

}

console.log(tipoMenu())

function saludo(nombre, apellido, genero, evento, minutosQueFaltan) {
	var saludo = "";
	var dia = "";


	if (genero == "FEMENINO") {
		saludo = "Bienvenida";
	} else {
		saludo = "Bienvenido";
	}

	if (minutosQueFaltan < 60 * 24) {
		dia = "hoy";
	} else if (minutosQueFaltan < 60 * 24 * 2) {
		dia = "maÃ±ana";
	} else {
		dia = "pronto";
	}

	return `${saludo} ${nombre.trim().toUpperCase()} ${apellido.trim().toUpperCase()}, recuerda ${dia} el evento (${evento})`;

}

console.log(saludo("    LUIS", "perez", "MASCULINO", "PelÃ­cula", 600));
console.log(saludo("ana ", "peRez", "FEMENINO", "Comidas del Mundo", 1500));
console.log(saludo("  PEDRO ", "Gil", "MASCULINO", "Juego de Baloncesto", 5000));

console.log(saludo("    LUIS", "perez", "MASCULINO", "PelÃ­cula", 600));
console.log(saludo("ana ", "peRez", "FEMENINO", "Comidas del Mundo", 1500));
console.log(saludo("  PEDRO ", "Gil", "MASCULINO", "Juego de Baloncesto", 5000));

var arreglo = [3, 5, 4, 8, 7];
var suma = 0;

/*for( var i=1;i<arreglo.length;i++){
	suma= suma+arreglo[i];
	
}*/


var canciones = ["miss you", "gre", "tre", "gfdsa", "fdsag"];
var suma1 = 0

var titulo = "Mi lsita de canciones preferidas";

function cancioneslista() {

	for (var elemento1 of canciones) {
		suma = suma + elemento1;
		return suma
	}

}

function lista() {
	console.log(titulo);
	console.log(cancioneslista());




}
console.log(lista());

console.log(canciones.length);




function maximo(donaciones) {
	var max = 0;
	for (monto of donaciones) {
		if (monto > max) {
			max = monto;
		}
	}
	return max;
}

function minimo(donaciones) {
	var min = 1000;
	for (monto of donaciones) {
		if (monto < min) {
			min = monto;
		}
	}
	return min;
}

function promedio(min, max, donaciones) {
	var sum = 0;
	var cantidad = 0;
	for (monto of donaciones) {
		if (monto > min && monto < max) {
			sum += monto;
			cantidad++;
		}
	}
	return sum / cantidad;
}

var donaciones = [5, 15, 22, 25, 30, 52, 5, 1, 0];
var min = minimo(donaciones);
var max = maximo(donaciones);
console.log(min);
console.log(max);
console.log(promedio(min, max, donaciones));







function stringValido(string, largo){
	
	if (string== null || string== undefined){
		
		return false;
	}
	if (largo && string.trim().length<largo){
		return false;
	}
	return true;
};

function fechaValida(fecha, minimaFecha){
	 if(fecha == null ||fecha== undefined){
		 
		 return false;
	 }
	if (minimaFecha && fecha.getTime()< minimaFecha.getTime()){
		return false;
	}
	return true;
}

function eventovalido (evento){
	
	if (evento== null||evento==undefined){
		
		return false;
	}
	return(
	stringValido(evento.nombre,3 && stringValido(evento.descripcion,10)&& fechaValida(evento.fecha, new Date(2018,0,1,0,0,0)))
	
	)
	
}

var evento= {
	nombre:"  ",
	descripcion:"Esto es una descripcion",
	fecha: new Date (2018,10,1)

	
};

console.log(eventovalido(evento));



function validar(formulario){
	if (formulario.nombre.value.trim().length== 0){
		alert ("Nombre Obligatorio");
		return false;
	}
 var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!re.test(formulario.email.value)) {
    alert("Email inválido");
    return false;
  }
	if (formulario.telefono.value.trim().length== 0){
		alert ("telefono Obligatorio");
		return false;
	}
		if (formulario.ciudad.value.trim().length== 0){
		alert ("telefono Obligatorio");
		return false;
	}
	
	return true;
}

function saludar(){
	
	var elemento =document.getElementById('saludo');
	elemento.innerHTML= "Bienvenido";
}

var noticias=["Not 1","not2","not3","not4"];
function cargarlista(){
	var lista =document.getElementById("lista");
	for(var i=0; i<noticias.length; i++){
		var li = document.createElement("li");
		li.innerText= noticias[i];
		lista.appendChild(li);
		
		
	}
	
}

function cambiarimagen(){
	var imagen = document.getElementById("imagen");
	imagen.setAttribute ('src', "./imagenes/movie_2.jpg");
	
}

