<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	if(isset($_GET["id"]) && isset($_POST["dorsal"])){
		$sentenciaActDorsal=$pagina->funcionesDB("SELECT", "Jugadores", array("id_equipo","dorsal"), array(), "id_jugador='".$_GET['id']."'"); // Obtenemos los datos del dorsal actual
		$sentenciaNewDorsal=$pagina->funcionesDB("SELECT", "Jugadores", array("COUNT(*)"), array(), "id_equipo='".$sentenciaActDorsal[0][0]."' AND dorsal='".$_POST['dorsal']."'"); // Obtenemos los datos del dorsal nuevo
	}
	
	if($sentenciaActDorsal[0][1]==$_POST["dorsal"] || intval($sentenciaNewDorsal[0][0])<1){
		// Comprobamos si se le pasa el identificador
		if(isset($_GET["id"])){
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
					$extension=end(explode(".",$_FILES["imagen"]["name"])); // Extensión de la foto
					$nombreFoto=$_GET["id"].".".$extension; // Nombre de la foto
					
					$sentencia=$pagina->funcionesDB("SELECT", "Jugadores", array("foto"), array(), "id_jugador=".$_GET['id'].""); // Obtenemos los datos de la anterior foto
					if($sentencia[0][0]!="foto.png"){
						unlink("img/players/".$sentencia[0][0]); // Borramos la foto
					}
					
					move_uploaded_file($_FILES["imagen"]["tmp_name"],"img/players/".$nombreFoto); // Movemos la fotos al directorio deseado
					
					// Campos y valores a modificar
					$campos=array("id_tipo","id_posicion","nombre","apellidos","fecha_nacimiento","dorsal","foto");
					$valores=array("".$_POST['tipo']."","".$_POST['posicion']."","".$_POST['nombre']."","".$_POST['apellidos']."","".$_POST['fechaNaci']."","".$_POST['dorsal']."","".$nombreFoto."");
				}else{
					// Campos y valores a modificar
					$campos=array("id_tipo","id_posicion","nombre","apellidos","fecha_nacimiento","dorsal");
					$valores=array("".$_POST['tipo']."","".$_POST['posicion']."","".$_POST['nombre']."","".$_POST['apellidos']."","".$_POST['fechaNaci']."","".$_POST['dorsal']."");
				}
				
				$pagina->funcionesDB("UPDATE", "Jugadores", $campos, $valores, "id_jugador='".$_GET['id']."'"); // Actualizamos los datos
			}
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