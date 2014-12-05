<?php
	require "pagina.php";
	
	$pagina=new pagina(); //Instanciamos el objeto de página
	
	//Comprobamos que se le pasa el identificador
	if(isset($_GET["id"])){
		if(isset($_POST["nombre"]) && isset($_POST["apellidos"])){
			
			//Comprobamos si se ha subido una foto
			if($_FILES["foto"]["name"]!=""){
				
				$extension=end(explode(".",$_FILES["foto"]["name"])); //Extensión de la foto
				$nombreFoto=$_SESSION['usuario'].".".$extension; //Nombre de la foto
				move_uploaded_file($_FILES["foto"]["tmp_name"],"img/users/".$nombreFoto); //Movemos la fotos al directorio deseado
				
				//Campos y valores a modificar
				$campos=array("nombre","apellidos","foto");
				$valores=array("".$_POST['nombre']."","".$_POST['apellidos']."",$nombreFoto."");
				
			}else{
				
				//Campos y valores a modificar
				$campos=array("nombre","apellidos");
				$valores=array("".$_POST['nombre']."","".$_POST['apellidos']."");
				
			}
			
			$pagina->funcionesDB("UPDATE","usuarios",$campos,$valores,"id_usuario='".$_GET['id']."'"); //Actualizamos los datos
		}
	}
	
	header('Location: perfil.php'); //Realizamos una redirección
?>