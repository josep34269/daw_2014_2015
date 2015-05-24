<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Comprobamos que se le pasa el identificador
	if(isset($_GET["id"])){
		$pagina->funcionesDB("DELETE", "Partidos", array(), array(), "id_partido='".$_GET['id']."'"); // Borramos los datos
	}
	
	header("Location: partidos.php?pag=1"); // Realizamos una redirección
?>