<?php
require_once "pagina.php";

if($_POST["usuario"]=="Josep" && $_POST["clave"]=="daw01"){
	
	session_start(); //Inicio la sesión
	$_SESSION["usuario"]="Josep"; //Asigno una variable a esta sesión
	header("Location: ".$_SERVER['HTTP_REFERER'].""); //Realizo una redirección
	
}else{
	
	$tituloPag="ERROR"; //Indicamos el título de la página
	$pagina=new pagina($tituloPag); //Instanciamos el objeto de página
	
	$contenido="Usuario o contraseña erróneos"; //Indicamos el contenido de la página
	
	$pagina->setContent($contenido,"NO"); //Pasamos el contenido de la página e indicamos si es una tabla
	$pagina->getPagina(); //Obtenemos todo el contenido		
}
?>