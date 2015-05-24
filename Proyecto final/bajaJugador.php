<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Comprobamos que se le pasa el identificador
	if(isset($_GET["id"])){
		$sentencia=$pagina->funcionesDB("SELECT", "Jugadores", array("foto"), array(), "id_jugador=".$_GET['id'].""); // Obtenemos los datos de la anterior foto
		if($sentencia[0][0]!="foto.png"){
			unlink("img/players/".$sentencia[0][0]); // Borramos la foto
		}
		
		$pagina->funcionesDB("DELETE", "Jugadores", array(), array(), "id_jugador='".$_GET['id']."'"); // Borramos los datos
	}
	
	header("Location: jugadores.php?pag=1"); // Realizamos una redirección
?>