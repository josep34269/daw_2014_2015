<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Proyecto02 - Mis fotos de viaje</title>
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
	
	function setTituloPag($title){
		echo $this->setTitulo($title);
	}
	
	function setPaginas($num){
		$str="<center><a href='index.php' class='enlace'>Inicio</a> &nbsp; &nbsp; &nbsp; ";
		for($i=1;$i<=$num;$i++){
			$str.="<a href='".$_SERVER['PHP_SELF']."?pagina=".$i."' class='enlace'>Pagina ".$i."</a> &nbsp; &nbsp; &nbsp; ";
		}
		$str.="</center>";
		
		$this->setContenido($str);
	}
	
}
?>