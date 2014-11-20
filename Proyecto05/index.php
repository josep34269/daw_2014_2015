<?php
	require "pagina.php";
	
	$tituloPag="PÁGINA PRINCIPAL"; //Indicamos el título de la página
	$pagina=new pagina($tituloPag); //Instanciamos el objeto de página
	
	$contenido="Contenido de la página principal"; //Indicamos el contenido de la página
	
	$pagina->setContent($contenido,"NO"); //Pasamos el contenido de la página e indicamos si es una tabla
	$pagina->getPagina(); //Obtenemos todo el contenido
?>