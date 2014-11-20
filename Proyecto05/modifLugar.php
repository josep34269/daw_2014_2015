<?php
	require "pagina.php";
	
	$pagina=new pagina(); //Instanciamos el objeto de página
	
	//Comprobamos que se le pasa el identificador
	if(isset($_GET["id"])){
		if(isset($_POST["lugar"]) && isset($_POST["poblacion"]) && isset($_POST["fecha"])){
			$sentencia=$pagina->funcionesDB("UPDATE","TAREA03",array("lugar","poblacion","fecha"),array("".$_POST['lugar']."","".$_POST['poblacion']."","".$_POST['fecha'].""),"id_lugar='".$_GET['id']."'"); //Actualizamos los datos
		}
	}
	
	header('Location: lugares.php'); //Realizamos una redirección
?>