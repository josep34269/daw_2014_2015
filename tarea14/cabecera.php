<?php
require_once "elemento.php";

class cabecera extends elemento{
	
	function __construct(){
		$this->setTitulo("");	
	}
	
	function setMenu($numElementos){
		$str="";
		for($i=0;$i<=$numElementos;$i++){
			$str=$str."&nbsp;"."Enlace".$i;
		}
		$this->setContenido($str);
	}
	
}
?>