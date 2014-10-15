<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";

class pagina{
	
	public $titulo="Título de la página";
	private $cabecera,$cuerpo,$pie;
	
	function __construct(){
		$this->cabecera=new cabecera();
		$this->cabecera->setMenu(3);
		$this->cuerpo=new cuerpo;
		$this->cuerpo->setTabla(3,4);
		$this->pie=new pie;
		$this->pie->setPie();
	}
	
	function getPagina(){
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}
	
}
?>