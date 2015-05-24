<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Comprobamos si se le pasa el identificador
	if(isset($_GET["id"])){
		if(isset($_POST["lugar"]) && isset($_POST["puntosEquipo"]) && isset($_POST["nombreRival"]) && isset($_POST["puntosRival"]) && isset($_POST["fecha"]) && isset($_POST["hora"])){
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
			$campos=array("lugar","puntos_equipo","nombre_rival","puntos_rival","fecha","hora","ganado");
			$valores=array("".$_POST['lugar']."","".$_POST['puntosEquipo']."","".$_POST['nombreRival']."","".$_POST['puntosRival']."","".$_POST['fecha']."","".$_POST['hora']."","".$ganado."");
			
			$pagina->funcionesDB("UPDATE", "Partidos", $campos, $valores, "id_partido='".$_GET['id']."'"); // Actualizamos los datos
		}
	}
	
	header('Location: partidos.php?pag=1'); // Realizamos una redirección
?>