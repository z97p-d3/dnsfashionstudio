// JavaScript Document

function capitalize(x){
	
	return x.charAt(0).toUpperCase()+ x.slice(1).toLowerCase())
}

function procesarFila(fila){


var arreglo =fila.split(",");
var nombre= arreglo[0].trim();
var apellido= arreglo[1].trim();
	return capitalize(nombre)+" "+ capitalize(apellido);
}

var fila "luiS, BLANCO";
console.log(procesarFila(fila);
