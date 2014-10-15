<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";

class pagina{
	
	private $titulo,$cabecera,$cuerpo,$pie;
	
	function __construct(){
		$this->pie=new pie;
		$this->pie->setPie();
	}
	
	function setTituloPagina($titulo){
		$this->cabecera=new cabecera();
		$this->cabecera->setTituloPag($titulo);
	}
	
	function setNumPaginas($num){
		$this->cabecera->setPaginas($num);
	}
	
	function setNumColFil($col,$row){
		$this->cuerpo=new cuerpo;
		$this->cuerpo->setCuerpo($col,$row);
	}
	
	function getPagina(){
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}
	
}
?>