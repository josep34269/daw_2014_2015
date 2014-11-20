// JavaScript Document

function modificarLugar(){
	if(modLugar.lugar.value.length<=3){
		alert('El nombre del lugar debe ser más largo.');
		return false;
	}
	if(modLugar.poblacion.value.length<=3){
		alert('El nombre de la población debe ser más largo.');
		return false;
	}
	if(!modLugar.fecha.value.match(/^\d{4}\-\d{2}\-\d{2}$/)){
		alert('El formato de la fecha es AAAA-MM-DD.');
		return false;
	}
}