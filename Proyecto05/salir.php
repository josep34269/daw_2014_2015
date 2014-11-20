<?php
	session_start(); //Inicio la sesión
	
	//Borro los datos de la sesión
	session_unset();
	session_destroy();
	
	header("Location: ".$_SERVER['HTTP_REFERER'].""); //Realizo una redirección
?>