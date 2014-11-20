<?php
	session_start(); //Inicio la sesión
	
	//Borro los datos de la sesión
	session_unset();
	session_destroy();
	
	header("Location: index.php"); //Realizo una redirección
?>