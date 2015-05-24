//  JavaScript Document

function altaUsuario(){
	if(nuevoUsuario.equipo.value.length<5){
		alert("El nombre del equipo debe ser más largo.");
		return false;
	}
	
	if(nuevoUsuario.nombre.value.length<3){
		alert("El nombre de la persona debe ser más largo.");
		return false;
	}
	
	if(nuevoUsuario.apellidos.value.length<=5){
		alert("Los apellidos de la persona deben ser más largos.");
		return false;
	}
	
	if(nuevoUsuario.usuario.value.length<3){
		alert("El nombre de usuario debe ser más largo.");
		return false;
	}
	
	if(nuevoUsuario.clave.value.length<6){
		alert("La contraseña debe ser más larga.");
		return false;
	}
	
	if(nuevoUsuario.clave.value!=nuevoUsuario.repClave.value){
		alert("Las contraseñas no coinciden.");
		return false;
	}
}

function modificarPerfil(){
	if(modPerfil.equipo.value.length<5){
		alert("El nombre del equipo debe ser más largo.");
		return false;
	}
	
	if(modPerfil.nombre.value.length<3){
		alert("El nombre de la persona debe ser más largo.");
		return false;
	}
	
	if(modPerfil.apellidos.value.length<=5){
		alert("Los apellidos de la persona deben ser más largos.");
		return false;
	}
	
	if(modPerfil.usuario.value.length<3){
		alert("El nombre de usuario debe ser más largo.");
		return false;
	}
	
	if(modPerfil.clave.value.length<6){
		alert("La contraseña debe ser más larga.");
		return false;
	}
	
	if(modPerfil.clave.value!=modPerfil.repClave.value){
		alert("Las contraseñas no coinciden.");
		return false;
	}
}

function altaJugador(){
	if(nuevoJugador.nombre.value.length<3){
		alert("El nombre del jugador debe ser más largo.");
		return false;
	}
	
	if(nuevoJugador.apellidos.value.length<=5){
		alert("Los apellidos del jugador deben ser más largos.");
		return false;
	}
	
	if(!nuevoJugador.fechaNaci.value.match(/^\d{4}\-\d{2}\-\d{2}$/)){
		if(getNavegador("Chrome")=="Chrome" || getNavegador("Safari")=="Safari" || getNavegador("Opera")=="Opera"){
			alert("El formato de la fecha es DD-MM-AAAA.");
			return false;
		}else{
			alert("El formato de la fecha es AAAA-MM-DD.");
			return false;
		}
	}
	
	if(!nuevoJugador.dorsal.value.match(/^\d{1,2}$/)){
		alert("El formato del dorsal debe ser de una o dos cifras.");
		return false;
	}
}

function modificarJugador(){
	if(modJugador.nombre.value.length<3){
		alert("El nombre del jugador debe ser más largo.");
		return false;
	}
	
	if(modJugador.apellidos.value.length<=5){
		alert("Los apellidos del jugador deben ser más largos.");
		return false;
	}
	
	if(!modJugador.fechaNaci.value.match(/^\d{4}\-\d{2}\-\d{2}$/)){
		if(getNavegador("Chrome")=="Chrome" || getNavegador("Safari")=="Safari" || getNavegador("Opera")=="Opera"){
			alert("El formato de la fecha es DD-MM-AAAA.");
			return false;
		}else{
			alert("El formato de la fecha es AAAA-MM-DD.");
			return false;
		}
	}
	
	if(!modJugador.dorsal.value.match(/^\d{1,2}$/)){
		alert("El formato del dorsal debe ser de una o dos cifras.");
		return false;
	}
}

function altaPartido(){
	if(!nuevoPartido.puntosEquipo.value.match(/^\d{1,2}$/)){
		alert("El formato de los puntos de tu equipo debe ser de una o dos cifras.");
		return false;
	}
	
	if(nuevoPartido.nombreRival.value.length<5){
		alert("El nombre del equipo rival debe ser más largo.");
		return false;
	}
	
	if(!nuevoPartido.puntosRival.value.match(/^\d{1,2}$/)){
		alert("El formato de los puntos del rival debe ser de una o dos cifras.");
		return false;
	}
	
	if(!nuevoPartido.fecha.value.match(/^\d{4}\-\d{2}\-\d{2}$/)){
		if(getNavegador("Chrome")=="Chrome" || getNavegador("Safari")=="Safari" || getNavegador("Opera")=="Opera"){
			alert("El formato de la fecha es DD-MM-AAAA.");
			return false;
		}else{
			alert("El formato de la fecha es AAAA-MM-DD.");
			return false;
		}
	}
	
	if(getNavegador("Chrome")=="Chrome" || getNavegador("Safari")=="Safari" || getNavegador("Opera")=="Opera"){
		if(((nuevoPartido.hora.value.match(/^\d{2}\:\d{2}$/) & !nuevoPartido.hora.value.match(/^\d{2}\:\d{2}\:\d{2}$/)) || (nuevoPartido.hora.value.match(/^\d{2}\:\d{2}\:\d{2}$/) & !nuevoPartido.hora.value.match(/^\d{2}\:\d{2}$/))) || nuevoPartido.hora.value.trim()==""){
			alert("El formato de la fecha es hh:mm.");
			return false;
		}
	}else{
		if(!nuevoPartido.hora.value.match(/^\d{2}\:\d{2}\:\d{2}$/)){
			alert("El formato de la fecha es hh:mm:ss.");
			return false;
		}
	}
}

function modificarPartido(){
	if(!modPartido.puntosEquipo.value.match(/^\d{1,2}$/)){
		alert("El formato de los puntos de tu equipo debe ser de una o dos cifras.");
		return false;
	}
	
	if(modPartido.nombreRival.value.length<5){
		alert("El nombre del equipo rival debe ser más largo.");
		return false;
	}
	
	if(!modPartido.puntosRival.value.match(/^\d{1,2}$/)){
		alert("El formato de los puntos del rival debe ser de una o dos cifras.");
		return false;
	}
	
	if(!modPartido.fecha.value.match(/^\d{4}\-\d{2}\-\d{2}$/)){
		if(getNavegador("Chrome")=="Chrome" || getNavegador("Safari")=="Safari" || getNavegador("Opera")=="Opera"){
			alert("El formato de la fecha es DD-MM-AAAA.");
			return false;
		}else{
			alert("El formato de la fecha es AAAA-MM-DD.");
			return false;
		}
	}
	
	if(getNavegador("Chrome")=="Chrome" || getNavegador("Safari")=="Safari" || getNavegador("Opera")=="Opera"){
		if(((modPartido.hora.value.match(/^\d{2}\:\d{2}$/) & !modPartido.hora.value.match(/^\d{2}\:\d{2}\:\d{2}$/)) || (modPartido.hora.value.match(/^\d{2}\:\d{2}\:\d{2}$/) & !modPartido.hora.value.match(/^\d{2}\:\d{2}$/))) || modPartido.hora.value.trim()==""){
			alert("El formato de la fecha es hh:mm.");
			return false;
		}
	}else{
		if(!modPartido.hora.value.match(/^\d{2}\:\d{2}\:\d{2}$/)){
			alert("El formato de la fecha es hh:mm:ss.");
			return false;
		}
	}
}

function getNavegador(nombreNav){
	var navegador=navigator.userAgent;
	var inicioCad=navegador.indexOf(" "+nombreNav)+1;
	var finalCad=navegador.indexOf(nombreNav+"/")+nombreNav.length;
	
	return navegador.substring(inicioCad,finalCad);
}