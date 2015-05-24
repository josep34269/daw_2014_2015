<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	if(!isset($_SESSION["usuario"]) && isset($_POST["usuario"])){
		$sentenciaNewUsuario=$pagina->funcionesDB("SELECT", "Entrenadores", array("COUNT(*)"), array(), "usuario='".$_POST['usuario']."'"); // Obtenemos los datos del usuario nuevo
	}
	
	if(intval($sentenciaNewUsuario[0][0])<1){
		// Comprobamos si se le pasa el identificador
		if(!isset($_SESSION["usuario"])){
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
				if(strpos($_POST["usuario"],"'")!==false){
					$_POST["usuario"]=str_replace("'","''",$_POST["usuario"]);
				}
				
				// Comprobamos si se ha subido una foto
				if($_FILES["foto"]["name"]!=""){
					$sentenciaNombreFoto=$pagina->funcionesDB("SELECT", "Entrenadores", array("MAX(id_entrenador)"), array(), "id_entrenador=id_entrenador");
					$namePhoto=intval($sentenciaNombreFoto[0][0])+1;
					
					$extension=end(explode(".",$_FILES["foto"]["name"])); // Extensión de la foto
					$nombreFoto=$namePhoto.".".$extension; // Nombre de la foto
					
					move_uploaded_file($_FILES["foto"]["tmp_name"],"img/users/".$nombreFoto); // Movemos la fotos al directorio deseado
					
					// Campos y valores a modificar
					$campos=array("id_equipo","nombre","apellidos","usuario","clave","foto");
					$valores=array("".$_POST['nombre']."","".$_POST['apellidos']."","".$_POST['usuario']."","".md5($_POST['clave'])."","".$nombreFoto."");
				}else{
					// Campos y valores a modificar
					$campos=array("id_equipo","nombre","apellidos","usuario","clave");
					$valores=array("".$_POST['nombre']."","".$_POST['apellidos']."","".$_POST['usuario']."","".md5($_POST['clave'])."");
				}
				
				$pagina->funcionesDB("INSERT", "Equipos", array("nombre"), array("".$_POST['equipo'].""), ""); // Actualizamos los datos de la tabla equipos
				
				$sentenciaEquipo=$pagina->funcionesDB("SELECT", "Equipos", array("MAX(id_equipo)"), array(), "id_equipo=id_equipo"); // Obtenemos el identificador del equipo
				array_unshift($valores, $sentenciaEquipo[0][0]); // Añadimos el valor al principio del array
				$pagina->funcionesDB("INSERT", "Entrenadores", $campos, $valores, ""); // Actualizamos los datos de la tabla entrenadores
			}
		}
		
		header('Location: index.php'); // Realizamos una redirección
	}else{
		// Iniciamos la tabla
		$contenido="<table align='center' cellpadding='5'>
						<tr>
							<td class='bor-titulo'><span class='titulo'>ERROR</span></td>
    					</tr>";
						
		// Indicamos el contenido de la página
		$contenido.="	<tr>
							<td class='panel1'>Ya existe una persona con ese nombre de usuario.</td>
						</tr>";
						
		$contenido.="</table>"; // Cerramos la tabla
		
		$pagina->setContent($contenido); // Pasamos el contenido de la página
		$pagina->getPagina(); // Obtenemos todo el contenido
	}
?>