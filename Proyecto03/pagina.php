<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";

class pagina{
	
	private $titulo,$cabecera,$menu,$cuerpo,$pie;
	
	function __construct(){
		$this->pie=new pie();
		$this->pie->setPie();
	}
	
	function setTituloPagina($titulo){
		$this->cabecera=new cabecera();
		$this->cabecera->setTituloPag($titulo);
	}
	
	function setPagMenu(){
		$this->menu=array("INICIO"=>array("url"=>"index.php"),"FOTOS"=>array("url"=>"fotos.php"),"CONTACTO"=>array("url"=>"contacto.php"));
		$this->cabecera->setMenu($this->menu);
	}
	
	function setNumColFil($col,$row){
		$this->cuerpo=new cuerpo();
		$this->cuerpo->setFotos($col,$row);
	}
	
	function setTextoContenido($texto){
		$this->cuerpo=new cuerpo();
		$this->cuerpo->setCuerpo($texto);
	}
	
	function getPagina(){
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}
	
}
?>