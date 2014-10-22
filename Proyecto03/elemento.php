<?php
class elemento{
	
	public $titulo,$contenido;
	
	//Convertimos a Sting el contenido a mostrar
	function __toString(){
		return "<h1 align='center'>".$this->titulo."</h1><br />".$this->contenido."<br />";
	}
	
	public function setTitulo($str){
		$this->titulo=$str;
	}
	
	public function setContenido($str){
		$this->contenido=$str;
	}
	
}
?>