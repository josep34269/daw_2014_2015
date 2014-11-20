<?php
require_once "bd.php";
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";
require_once "seguridad.php";

class pagina{
	
	//Declaramos las variables
	private $conexion,$seguridad,$cabecera,$menu,$cuerpo,$pie;
	
	function __construct(){
		$this->conexion=new bd();
		$this->conexion->conectar(); //Iniciamos la conexión
		$this->cabecera=new cabecera();
		$this->setPagMenu(); //Asginamos el menú
		$this->pie=new pie();
		$this->pie->setPie(); //Asignamos el pie de página
	}
	
	/*
	* Esta función es la utilizada para definir las páginas del menú
	*/
	function setPagMenu(){
		$this->menu=array("INICIO"=>array("url"=>"index.php"),"LUGARES"=>array("url"=>"lugares.php"),"FOTOS"=>array("url"=>"fotos.php"),"CONTACTO"=>array("url"=>"contacto.php"));
		$this->cabecera->setMenu($this->menu);
	}
	
	/*
	* Esta función es la utilizada para definir el contenido (cuerpo) de la página
	*/
	function setContenido($texto){
		$this->cuerpo=new cuerpo();
		$this->seguridad=new seguridad();
		
		//Si no se ha iniciado sesión no mostramos el contenido
		if(!$this->seguridad->comprobarUsuario() && end(explode("/",$_SERVER["PHP_SELF"]))!="iniciar.php"){
			$texto="Debe iniciar sesión para acceder al contenido"; //Asignamos el cuerpo (body) de la web
		}
		
		$this->cuerpo->setCuerpo($texto); //Asignamos el cuerpo (body) de la web
	}
	
	/*
	* Esta función es la utilizada para mostrar todo el contenido de la página
	*/
	function getPagina(){
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}
	
	/*
	* Esta función es la que se encargará de pasar los datos para realizar la sentencia
	* 
	* @param tipoSentencia Le pasamos el tipo de la sentencia a ejercutar
	* @param nombreTabla Le pasamos el nombre de la tabla de la sentencia a ejercutar
	* @param nombreCampos Le pasamos el nombre de los campos de la sentencia a ejercutar
	* @param valores Le pasamos los valores de la sentencia a ejercutar
	* @param condicion Le pasamos la condición de la sentencia a ejercutar
	*/
	function funcionesDB($tipoSentencia,$nombreTabla,array $nombreCampos,array $valores,$condicion){
		if(strtoupper($tipoSentencia)=="SELECT"){
			return $this->conexion->sentenciasSelect($nombreTabla,$nombreCampos,$condicion); //Devolvemos una matriz con los datos de la sentencia
		}else if(strtoupper($tipoSentencia)=="INSERT"){
			$this->conexion->sentenciasInsert($nombreTabla,$nombreCampos,$valores);
		}else if(strtoupper($tipoSentencia)=="UPDATE"){
			$this->conexion->sentenciasUpdate($nombreTabla,$nombreCampos,$valores,$condicion);
		}else if(strtoupper($tipoSentencia)=="DELETE"){
			$this->conexion->sentenciasDelete($nombreTabla,$condicion);
		}
	}
	
}
?>