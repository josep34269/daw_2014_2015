<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	if(isset($_SESSION['usuario']) && isset($_POST["dorsal"])){
		$usuario=$_SESSION['usuario'];
		
		// Si hay comillas simples las modificamos para mostralas
		if(strpos($usuario,"''")!==false){
			$user=$usuario;
		}else if(strpos($usuario,"'")!==false){
			$user=str_replace("'","''",$usuario);
		}else{
			$user=$usuario;
		}
		
		$sentenciaEquipo=$pagina->funcionesDB("SELECT", "Entrenadores", array("id_equipo"), array(), "usuario='".$user."'"); // Obtenemos el identificador del equipo
		$sentenciaNewDorsal=$pagina->funcionesDB("SELECT", "Jugadores", array("COUNT(*)"), array(), "id_equipo='".$sentenciaEquipo[0][0]."' AND dorsal='".$_POST['dorsal']."'"); // Obtenemos los datos del dorsal nuevo
	}
	
	if(intval($sentenciaNewDorsal[0][0])<1){
		// Comprobamos si se le pasan las variables
		if(isset($_POST["tipo"]) && isset($_POST["posicion"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["fechaNaci"])){
			// Si hay comillas simples las modificamos para guardarlas
			if(strpos($_POST["nombre"],"'")!==false){
				$_POST["nombre"]=str_replace("'","''",$_POST["nombre"]);
			}
			if(strpos($_POST["apellidos"],"'")!==false){
				$_POST["apellidos"]=str_replace("'","''",$_POST["apellidos"]);
			}
			
			// Comprobamos si se ha subido una foto
			if($_FILES["imagen"]["name"]!=""){
				// Obtenemos los datos para el nombre de la foto
				$sentenciaNombreFoto=$pagina->funcionesDB("SELECT", "Jugadores", array("MAX(id_jugador)"), array(), "id_jugador=id_jugador");
				$namePhoto=intval($sentenciaNombreFoto[0][0])+1;
				
				$extension=end(explode(".",$_FILES["imagen"]["name"])); // Extensión de la foto
				$nombreFoto=$namePhoto.".".$extension; // Nombre de la foto
				
				move_uploaded_file($_FILES["imagen"]["tmp_name"],"img/players/".$nombreFoto); // Movemos la fotos al directorio deseado
				
				// Campos y valores a modificar
				$campos=array("id_equipo","id_tipo","id_posicion","nombre","apellidos","fecha_nacimiento","dorsal","foto");
				$valores=array("".$sentenciaEquipo[0][0]."","".$_POST['tipo']."","".$_POST['posicion']."","".$_POST['nombre']."","".$_POST['apellidos']."","".$_POST['fechaNaci']."","".$_POST['dorsal']."","".$nombreFoto."");
			}else{
				// Campos y valores a modificar
				$campos=array("id_equipo","id_tipo","id_posicion","nombre","apellidos","fecha_nacimiento","dorsal");
				$valores=array("".$sentenciaEquipo[0][0]."","".$_POST['tipo']."","".$_POST['posicion']."","".$_POST['nombre']."","".$_POST['apellidos']."","".$_POST['fechaNaci']."","".$_POST['dorsal']."");
			}
			
			$pagina->funcionesDB("INSERT", "Jugadores", $campos, $valores, ""); // Actualizamos los datos
		}
		
		header('Location: jugadores.php?pag=1'); // Realizamos una redirección
	}else{
		// Iniciamos la tabla
		$contenido="<table align='center' cellpadding='5'>
						<tr>
							<td class='bor-titulo'><span class='titulo'>ERROR</span></td>
    					</tr>";
						
		// Indicamos el contenido de la página
		$contenido.="	<tr>
							<td class='panel1'>Ya existe otro jugador con ese dorsal.</td>
						</tr>";
						
		$contenido.="</table>"; // Cerramos la tabla
		
		$pagina->setContent($contenido); // Pasamos el contenido de la página
		$pagina->getPagina(); // Obtenemos todo el contenido
	}
?>