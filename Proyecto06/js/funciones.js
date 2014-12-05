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

function modificarPerfil(){
	if(modPerfil.nombre.value.length<=3){
		alert('El nombre del usuario debe ser más largo.');
		return false;
	}
	if(modPerfil.apellidos.value.length<=5){
		alert('Los apellidos del usuario deben ser más largos.');
		return false;
	}
}