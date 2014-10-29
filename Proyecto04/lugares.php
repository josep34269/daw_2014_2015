<?php
	require "pagina.php";
	require "bd.php";
	
	$tituloPag="LUGARES"; //Indicamos el título de la página
	
	$pagina=new pagina($tituloPag); //Pasamos el título de la página
	$lugares=new bd("localhost","root","daw01","TAREA_REFUERZO03"); //Indicamos los parámetros de conexión
	$lugares->conectar(); //Conectamos con la base de datos
	$contenido=$lugares->getLugares(); //Obtenemos los datos
	$pagina->setTextoContenido($contenido); //Pasamos el contenido de la página
	$pagina->getPagina(); //Obtenemos todo el contenido
?>