<?php
class elemento{
	
	public $titulo,$contenido;
	
	/*
	* Esta función convierte a Sting el contenido a mostrar
	*/
	function __toString(){
		return "<h1 align='center'>".$this->titulo."</h1><br />".$this->contenido."<br />";
	}
	
	/*
	* A esta función le pasamos el título a mostrar
	* 
	* @param str Le pasamos el título de la página
	*/
	public function setTitulo($str){
		$this->titulo=$str;
	}
	
	/*
	* A esta función le pasamos el contenido a mostrar
	* 
	* @param str Le pasamos el contenido de la página
	*/
	public function setContenido($str){
		$this->contenido=$str;
	}
	
}
?>