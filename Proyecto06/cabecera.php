<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Proyecto06 - Mis fotos de viaje</title>
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
				
				//Si no está iniciada la sesión, la inicio
				if(!isset($_SESSION)){
					session_start();
				}
					
				//Comprobamos si tiene un valor la cookie
				if(isset($_COOKIE["tiempoEspera"])){
					
					$str.="Debes esperar 2 minutos antes de volver a iniciar sesión<br />";
						
				}else{
					
					if(!isset($_SESSION["usuario"])){
						//Formulario de inicio de sesión
						$str.="<div>
							<form id='iniSes' method='post' name='iniSes' action='iniciar.php'>
								<input id='usuario' type='text' name='usuario' class='input' />
								<input id='clave' type='password' name='clave' class='input' />
								<input id='iniciar' type='submit' name='iniciar' value='Iniciar sesión' />
							</form>
						</div>";
					}else{
						$str.="<div>Bienvenido ".$_SESSION["usuario"].". <a href='salir.php'>Salir</a></div>"; //Formulario de cierre de sesión
					}
						
				}
				
		$str.="<br /></center>"; //Acaba la alineación al centro
		
		$this->setContenido($str); //Pasamos el contenido
	}
	
}
?>