<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";

class pagina{
	
	private $titulo,$cabecera,$menu,$cuerpo,$pie;
	
	function __construct($titulo){
		$this->cabecera=new cabecera($titulo);
		$this->setPagMenu();
		$this->pie=new pie();
		$this->pie->setPie();
	}
	
	//Esta función es la utilizada para definir las páginas del menú
	function setPagMenu(){
		$this->menu=array("INICIO"=>array("url"=>"index.php"),"LUGARES"=>array("url"=>"lugares.php"),"FOTOS"=>array("url"=>"fotos.php"),"CONTACTO"=>array("url"=>"contacto.php"));
		$this->cabecera->setMenu($this->menu);
	}
	
	//Esta función es la utilizada para definir el contenido (cuerpo) de la página
	function setTextoContenido($texto){
		$this->cuerpo=new cuerpo();
		$this->cuerpo->setCuerpo($texto);
	}
	
	//Esta función es la utilizada para definir el número de columnas y filas al mostrar las imágenes
	function setNumColFil($col,$row){
		$this->cuerpo=new cuerpo();
		$this->cuerpo->setFotos($col,$row);
	}
	
	function getPagina(){
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}
	
}
?>