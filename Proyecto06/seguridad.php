<?php
class seguridad{
	
	/*
	* Esta función comprueba si se ha iniciado sesión
	* 
	* @return resultado Devuelve un valor verdadero o falso, que indica si ha iniciado o no sesión
	*/
	function comprobarUsuario(){
		//Compruebo si existe un usuario con sesión iniciada
		if(!isset($_SESSION["usuario"])){
    		$resultado=false;
		}else{
			$resultado=true;
		}
		
		return $resultado; //Devuelvo el resultado
	}
	
}
?>