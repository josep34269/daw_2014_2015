<?php
require_once "elemento.php";

class pie extends elemento{
	
	function __construct(){
		$this->setTitulo("");	
	}
	
	function setPie(){
		$str="";
		$str="<hr><center>Creado por Josep puertas</center></hr>";
		$this->setContenido($str);
	}
	
}
?>