<?php
	require "pagina.php";
	
	$tituloPag="FOTOS"; //Indicamos el título de la página
	$numeroColFil=array("col"=>4,"fil"=>1); //Indicamos el número de columnas y filas a mostrar
	
	$pagina=new pagina($tituloPag); //Pasamos el título de la página
	$pagina->setNumColFil($numeroColFil["col"],$numeroColFil["fil"]); //Indicamos el número de imágenes a mostrar (columnas,filas)
	$pagina->getPagina(); //Obtenemos todo el contenido
?>