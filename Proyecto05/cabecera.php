<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Proyecto05 - Mis fotos de viaje</title>
        <!-- ESTILOS CSS -->
        <link rel="stylesheet" href="css/estilo.css" />
		<link rel="stylesheet" href="css/lightbox.css" />
        <!-- LIBRERÍAS JAVASCRIPT -->
        <script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/lightbox.min.js"></script>
        <script src="js/funciones.js"></script>
	</head>
<?php
require_once "elemento.php";

class cabecera extends elemento{
	
	/*
	* Esta función asigna en la cabcecera el menú de la página
	* 
	* @param menu Le pasamos el menú de la página
	*/
	function setMenu($menu){
		$str="<center>"; //Alineamos el contenido al centro
			//Creamos un contenedor para el menú
			$str.="<div class='menu'>
				<ul>";
				
				$pagURL=end(explode("/",$_SERVER["PHP_SELF"])); //Obtenemos la página actual
				
				//Mostramos el menú
				foreach($menu as $indice=>$valor){
					//Si el valor del menú coincide con la página actual entramos dentro del IF
					if($pagURL==$valor["url"]){
						$str.="<li><a href='".$valor["url"]."' class='selectMenu'>".$indice."</a><li>";
					}else{
						$str.="<li><a href='".$valor["url"]."' class='enlace'>".$indice."</a><li>";
					}
					
				}
				
				//Finaliza la creación del contenedor
				$str.="</ul>
				</div>";
				
				session_start(); //Inicio la sesión
				
				if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]!="Josep"){
					//Formulario de inicio de sesión
					$str.="<div>
						<form id='iniSes' method='post' name='iniSes' action='iniciar.php'>
							<input id='usuario' type='text' name='usuario' class='input' />
							<input id='clave' type='text' name='clave' class='input' />
							<input id='iniciar' type='submit' name='iniciar' value='Iniciar sesión' />
						</form>
					</div>";
				}else{
					//Formulario de cierre de sesión
					$str.="<div>Bienvenido ".$_SESSION["usuario"].". <a href='salir.php'>Salir</a></div>";
				}
				
		$str.="</center>"; //Acaba la alineación al centro
		
		$this->setContenido($str); //Pasamos el contenido
	}
	
}
?>