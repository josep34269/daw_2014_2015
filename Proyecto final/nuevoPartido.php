<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Comprobamos si se le pasam las variables
	if(isset($_POST["lugar"]) && isset($_POST["puntosEquipo"]) && isset($_POST["nombreRival"]) && isset($_POST["puntosRival"]) && isset($_POST["fecha"]) && isset($_POST["hora"])){
		$usuario=$_SESSION['usuario'];
		
		// Si hay comillas simples las modificamos para mostralas
		if(strpos($usuario,"''")!==false){
			$user=$usuario;
		}else if(strpos($usuario,"'")!==false){
			$user=str_replace("'","''",$usuario);
		}else{
			$user=$usuario;
		}
		
		$sentenciaUser=$pagina->funcionesDB("SELECT", "Entrenadores", array("id_equipo"), array(), "usuario='".$user."'"); // Obtenemos el equipo
		
		// Si hay comillas simples las modificamos para guardarlas
		if(strpos($_POST["nombreRival"],"'")!==false){
			$_POST["nombreRival"]=str_replace("'","''",$_POST["nombreRival"]);
		}
		
		// Comprobamos el equipo ganador
		if($_POST["puntosEquipo"]<$_POST["puntosRival"]){
			$ganado="Perdido";
		}else if($_POST["puntosEquipo"]==$_POST["puntosRival"]){
			$ganado="Empatado";
		}else{
			$ganado="Ganado";
		}
		
		// Campos y valores a modificar
		$campos=array("id_equipo","lugar","puntos_equipo","nombre_rival","puntos_rival","fecha","hora","ganado");
		$valores=array("".$sentenciaUser[0][0]."","".$_POST['lugar']."","".$_POST['puntosEquipo']."","".$_POST['nombreRival']."","".$_POST['puntosRival']."","".$_POST['fecha']."","".$_POST['hora']."","".$ganado."");
		
		$pagina->funcionesDB("INSERT", "Partidos", $campos, $valores, ""); // Actualizamos los datos
	}
	
	header('Location: partidos.php?pag=1'); // Realizamos una redirección
?>