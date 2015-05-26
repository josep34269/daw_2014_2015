<!DOCTYPE html PUBLIC "-// W3C// DTD XHTML 1.0 Transitional// EN" "http:// www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http:// www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Football Coach/Manager</title>
        <!-- ESTILOS CSS -->
        <link rel="stylesheet" href="css/estilo.css" />
        <!-- LIBRERÍAS JAVASCRIPT -->
        <script src="js/funciones.js"></script>
        <script src="ajax.js"></script>
	</head>
    <body>
<?php
require_once "elemento.php";

class cabecera extends elemento{
	
	/*
	* Esta función asigna en la cabcecera el menú de la página
	* 
	* @param menu Le pasamos el menú de la página
	*/
	function setMenu($menu){
		$str="<center>"; // Alineamos el contenido al centro
		
		// Título de la web
		$str.="<div style='position: absolute; top: 50px; right: 0; left: 0; margin-left: auto; margin-right: auto;'>
				<img style='width: 900px; height: 85px;' src='img/fondo-titulo.png' />
			</div>
			<div style='position: absolute; top: 65px; right: 0; left: 0; margin-left: auto; margin-right: auto;' class='fuente-titulo'>
				<h1 style='text-align: center;' class='titulo-pag'>
					<a href='index.php'>FOOTBALL <span style='color: #0CF'>​COACH</span>/<span style='color: #F03;'>MANAGER</span></a>
				</h1>
			</div>";
			
		// Creamos un contenedor para el menú
		$str.="<div style='position: absolute; top: 0; height: 55px; display: inline-block; overflow: visible; left: 0; width: 100%; background-color: #000006;'>
			<div style='position: absolute; top: 0; height: 55px; display: inline-block; overflow: visible; left: 0;' class='contenedor-menu'>";
					
		$pagURL=end(explode("/",$_SERVER["PHP_SELF"])); // Obtenemos la página actual
		
		if(isset($_GET["pag"])){
			$pag=$_GET["pag"];
		}else{
			$pag=1;
		}
		
		// Mostramos el menú
		foreach($menu as $indice=>$valor){
			$str.="<a style='width: 100px; height: 55px; bottom: 5px;' href='".$valor["url"]."' class='menu-boton'>
					<div class='menu-boton-forma'></div>
					<div style='right: 0; left: 0; margin-left: auto; margin-right: auto; text-align:center;'>
						<p style='line-height: 35px; text-align: center;' class='menu-label'>".$indice."</p>
					</div>
				</a>";
		}
		
		// Cerramos el menú
		$str.="</div>
			</div>";
		
		// Si no está iniciada la sesión, la inicio
		if(!isset($_SESSION)){
			session_start();
		}
			
		// Comprobamos si tiene un valor la cookie
		if(isset($_COOKIE["tiempoEspera"])){
			
			$str.="<div style='position: absolute; top: 10px; right: 5px; margin-right: 0; opacity: 0.80; padding: 5px; color:#FFF;'>Debes esperar 2 minutos antes de volver a iniciar sesión</div>";
			
		}else{
			
			if(!isset($_SESSION["usuario"])){
				// Formulario de inicio de sesión
				$str.="<div style='position: absolute; top: 5px; right: 5px; margin-right: 0; opacity: 0.80; padding: 5px;'>
					<form id='iniSes' method='post' name='iniSes' action='iniciar.php'>
						<input id='usuario' type='text' name='usuario' class='input' placeholder='Usuario' />
						<input id='clave' type='password' name='clave' class='input' placeholder='Contraseña' />
						<input id='iniciar' type='submit' name='iniciar' class='button' value='Iniciar sesión' />
					</form>
				</div>";
			}else{
				$str.="<div style='position: absolute; top: 5px; right: 5px; margin-right: 0; opacity: 0.80; padding: 5px; color:#FFF;'>Bienvenido ".$_SESSION["usuario"]." <input id='salir' type='button' name='salir' class='button' value='Salir' onclick='location.href=\"salir.php\";' /></div>"; // Formulario de cierre de sesión
			}		
		}
				
		$str.="<br /></center>"; // Acaba la alineación al centro
		
		$str.="<!-- Alinación del contenido al centro -->
    		<center>";
		
		$this->setContenido($str); // Pasamos el contenido
	}
	
}
?>