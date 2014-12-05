<?php
	require "pagina.php";
	
	$pagina=new pagina(); //Instanciamos el objeto de página
	
	//Comprobamos que se le pasa el identificador
	if(isset($_GET["id"])){
		$pagina->funcionesDB("DELETE","TAREA03",array(),array(),"id_lugar='".$_GET['id']."'"); //Borramos los datos
	}
	
	header("Location: lugares.php"); //Realizamos una redirección
?>