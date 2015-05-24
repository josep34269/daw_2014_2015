<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	if(isset($_GET["id"]) && isset($_POST["usuario"])){
		if(strpos($_POST["usuario"],"''")!==false){
			$user=$_POST["usuario"];
		}else if(strpos($_POST["usuario"],"'")!==false){
			$user=str_replace("'","''",$_POST["usuario"]);
		}else{
			$user=$_POST["usuario"];
		}
		
		$sentenciaUsuario=$pagina->funcionesDB("SELECT", "Entrenadores", array("usuario"), array(), "id_entrenador='".$_GET['id']."'"); // Obtenemos los datos del usuario actual
		$sentenciaNewUsuario=$pagina->funcionesDB("SELECT", "Entrenadores", array("COUNT(*)"), array(), "usuario='".$user."'"); // Obtenemos los datos del usuario nuevo
	}
	
	if($sentenciaUsuario[0][0]==$_POST["usuario"] || intval($sentenciaNewUsuario[0][0])<1){
		// Comprobamos si se le pasa el identificador
		if(isset($_GET["id"])){
			if(isset($_POST["equipo"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["clave"])){
				// Si hay comillas simples las modificamos para guardarlas
				if(strpos($_POST["equipo"],"'")!==false){
					$_POST["equipo"]=str_replace("'","''",$_POST["equipo"]);
				}
				if(strpos($_POST["nombre"],"'")!==false){
					$_POST["nombre"]=str_replace("'","''",$_POST["nombre"]);
				}
				if(strpos($_POST["apellidos"],"'")!==false){
					$_POST["apellidos"]=str_replace("'","''",$_POST["apellidos"]);
				}
				
				// Comprobamos si se ha subido una foto
				if($_FILES["foto"]["name"]!=""){
					$extension=end(explode(".",$_FILES["foto"]["name"])); // Extensión de la foto
					$nombreFoto=$_GET["id"].".".$extension; // Nombre de la foto
					
					$sentencia=$pagina->funcionesDB("SELECT", "Entrenadores", array("foto"), array(), "id_entrenador='".$_GET['id']."'"); // Obtenemos los datos de la anterior foto
					if($sentencia[0][0]!="foto.png"){
						unlink("img/users/".$sentencia[0][0]); // Borramos la foto
					}
					
					move_uploaded_file($_FILES["foto"]["tmp_name"],"img/users/".$nombreFoto); // Movemos la fotos al directorio deseado
					
					// Campos y valores a modificar
					$campos=array("nombre","apellidos","usuario","clave","foto");
					$valores=array("".$_POST['nombre']."","".$_POST['apellidos']."","".$user."","".md5($_POST['clave'])."","".$nombreFoto."");
				}else{
					// Campos y valores a modificar
					$campos=array("nombre","apellidos","usuario","clave");
					$valores=array("".$_POST['nombre']."","".$_POST['apellidos']."","".$user."","".md5($_POST['clave'])."");
				}
				
				$sentenciaEquip=$pagina->funcionesDB("SELECT", "Entrenadores", array("id_equipo"), array(), "id_entrenador='".$_GET['id']."'"); // Obtenemos los datos del idenfiticador del equipo
				
				$pagina->funcionesDB("UPDATE", "Equipos", array("nombre"), array("".$_POST['equipo'].""), "id_equipo='".$sentenciaEquip[0][0]."'"); // Actualizamos los datos de la tabla equipos
				$pagina->funcionesDB("UPDATE", "Entrenadores", $campos, $valores, "id_entrenador='".$_GET['id']."'"); // Actualizamos los datos de la tabla entrenadores
				
				$_SESSION['usuario']=$_POST["usuario"];
			}
		}
		
		header('Location: perfil.php'); // Realizamos una redirección
	}else{
		// Iniciamos la tabla
		$contenido="<table align='center' cellpadding='5'>
						<tr>
							<td class='bor-titulo'><span class='titulo'>ERROR</span></td>
    					</tr>";
						
		// Indicamos el contenido de la página
		$contenido.="	<tr>
							<td class='panel1'>Ya existe otra persona con ese nombre de usuario.</td>
						</tr>";
						
		$contenido.="</table>"; // Cerramos la tabla
		
		$pagina->setContent($contenido); // Pasamos el contenido de la página
		$pagina->getPagina(); // Obtenemos todo el contenido
	}
?>