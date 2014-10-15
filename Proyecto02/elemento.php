<?php
class elemento{
	
	public $titulo,$contenido;
	
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