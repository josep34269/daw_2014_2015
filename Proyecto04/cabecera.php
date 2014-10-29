<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Proyecto03 - Mis fotos de viaje</title>
        <!-- ESTILOS CSS -->
        <link rel="stylesheet" href="css/estilo.css" />
		<link rel="stylesheet" href="css/lightbox.css" />
        <!-- LIBRERÍAS JAVASCRIPT -->
        <script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/lightbox.min.js"></script>
	</head>
<?php
require_once "elemento.php";

class cabecera extends elemento{
	
	function __construct($title){
		$this->setTitulo($title);
	}
	
	function setMenu($menu){
		$str="<center>
				<div class='menu'>
					<ul>";
					
					$pagURL=end(explode("/",$_SERVER['PHP_SELF'])); //Obtenemos la página actual
					
					//Mostramos el menú
					foreach($menu as $indice=>$valor){
						//Si el valor del menú coincide con la página actual entramos dentro del IF
						if($pagURL==$valor["url"]){
							$str.="<li><a href='".$valor["url"]."' class='selectMenu'>".$indice."</a><li>";
						}else{
							$str.="<li><a href='".$valor["url"]."' class='enlace'>".$indice."</a><li>";
						}
						
					}
					
					$str.="</ul>
					</div>
				</center>";
		
		$this->setContenido($str);
	}
	
}
?>