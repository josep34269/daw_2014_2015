<?php
	require "pagina.php";
	
	$tituloPag="CONTACTO"; //Indicamos el título de la página
	$contenido="Contenido de la página de contacto"; //Indicamos el contenido de la página
	
	$pagina=new pagina($tituloPag); //Pasamos el título de la página
	$pagina->setTextoContenido($contenido); //Pasamos el contenido de la página
	$pagina->getPagina(); //Obtenemos todo el contenido
?>