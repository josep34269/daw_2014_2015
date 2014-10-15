<?php
class elemento{
	
	public $titulo;
	public $contenido;
	
	function __construct(){
		$this->titulo="";
	}
	
	public function setContenido($str){
		$this->contenido=$str;
	}
	
	public function setTitulo($str){
		$this->titulo=$str;
	}
	
	function __toString(){
		return "</br>".$this->titulo."</br>".$this->contenido."</br>";
	}
	
}
?>