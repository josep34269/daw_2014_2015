<?php
	session_start(); //Inicio la sesión
	
	//Borro los datos de la sesión
	session_unset();
	session_destroy();
	
	if(isset($_SERVER["HTTP_REFERER"]) && end(explode("/",$_SERVER["HTTP_REFERER"]))!="perfil.php"){
		header("Location: ".$_SERVER['HTTP_REFERER'].""); //Realizo una redirección
	}else{
		header("Location: index.php"); //Realizamos una redirección
	}
?>