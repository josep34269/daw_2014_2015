<?php
class bd{
	
	// Declaramos las variables
	private $server, $user, $pass, $bd; // Datos de conexión a la BD
	private $info; // variable usada para la información devuelta de la base de datos
	
	function __construct(){
		$this->server="localhost";
		$this->user="football";
		$this->pass="daw01";
		$this->bd="football";
	}
	
	/*
	* Realiza la conexión a la base de datos e informa si hubíera un error
	*/
	public function conectar(){
		$this->info=new mysqli($this->server,$this->user,$this->pass,$this->bd);
		if($this->info->connect_errno){
			echo "Fallo al contenctar a la Base de Datos (".$this->info->connect_errno."): ".$this->info->connect_error;
		}
	}
	
	/*
	* Esta función se encarga de realizar las sentencias Select
	* 
	* @param nombreTabla Le pasamos el nombre de la tabla de la sentencia a ejercutar
	* @param nombreCampos Le pasamos el nombre de los campos de la sentencia a ejercutar
	* @param condicion Le pasamos la condición de la sentencia a ejercutar
	* @return valores Devolvemos en una matriz el contenido de la sentencia
	*/
	public function sentenciasSelect($nombreTabla,$nombreCampos,$condicion){
		$campos=implode(",",$nombreCampos); // Almacenamos en un cadena de texto todos los campos
		$valores=array();
		
		$sentencia="SELECT ".$campos." FROM ".$nombreTabla." WHERE ".$condicion.";"; // Sentencia a ejecutar
		
		if($result=$this->info->query($sentencia)){
			for($numCampos=0;$numCampos<count($nombreCampos);$numCampos++){
				for($i=0;$i<$result->num_rows;$i++){
					$result->data_seek($i);
					$fila=$result->fetch_assoc();
					$valores[$i][$numCampos]=$fila[$nombreCampos[$numCampos]]; // Almacenamos los valores en una matriz
				}
			}
		}else{
			echo "Se ha producido un error al realizar la sentencia: ".$this->info->error;
		}
		
		return $valores;
	}
	
	/*
	* Esta función se encarga de realizar las sentencias Insert
	* 
	* @param nombreTabla Le pasamos el nombre de la tabla de la sentencia a ejercutar
	* @param nombreCampos Le pasamos el nombre de los campos de la sentencia a ejercutar
	* @param valores Le pasamos los valores de la sentencia a ejercutar
	*/
	public function sentenciasInsert($nombreTabla,$nombreCampos,$valores){
		$valor=""; // Almacenaremos en un cadena de texto todos los valores
		
		for($i=0;$i<count($valores);$i++){
			if($i==count($valores)-1){
				$valor.="'".$valores[$i]."'";
			}else{
				$valor.="'".$valores[$i]."',";
			}
		}
		
		if($nombreCampos[0]=="*"){
			$sentencia="INSERT INTO ".$nombreTabla." VALUES (".$valor.");"; // Sentencia a ejecutar
		}else{
			$campos=implode(",",$nombreCampos); // Almacenamos en un cadena de texto todos los campos
			$sentencia="INSERT INTO ".$nombreTabla." (".$campos.") VALUES (".$valor.");"; // Sentencia a ejecutar
		}
		
		if(!$this->info->query($sentencia)){
			echo "Se ha producido un error al realizar la sentencia: ".$this->info->error;
		}
	}
	
	/*
	* Esta función se encarga de realizar las sentencias Update
	* 
	* @param nombreTabla Le pasamos el nombre de la tabla de la sentencia a ejercutar
	* @param nombreCampos Le pasamos el nombre de los campos de la sentencia a ejercutar
	* @param valores Le pasamos los valores de la sentencia a ejercutar
	* @param condicion Le pasamos la condición de la sentencia a ejercutar
	*/
	public function sentenciasUpdate($nombreTabla,$nombreCampos,$valores,$condicion){
		$valor=""; // Almacenaremos en un cadena de texto todos los valores
		
		for($i=0;$i<count($nombreCampos);$i++){
			if($i==count($nombreCampos)-1){
				$valor.=$nombreCampos[$i]."='".$valores[$i]."'";
			}else{
				$valor.=$nombreCampos[$i]."='".$valores[$i]."',";
			}
		}
		
		$sentencia="UPDATE ".$nombreTabla." SET ".$valor." WHERE ".$condicion.";"; // Sentencia a ejecutar
		
		if(!$this->info->query($sentencia)){
			echo "Se ha producido un error al realizar la sentencia: ".$this->info->error;
		}
	}
	
	/*
	* Esta función se encarga de realizar las sentencias Delete
	* 
	* @param nombreTabla Le pasamos el nombre de la tabla de la sentencia a ejercutar
	* @param condicion Le pasamos la condición de la sentencia a ejercutar
	*/
	public function sentenciasDelete($nombreTabla,$condicion){
		$sentencia="DELETE FROM ".$nombreTabla." WHERE ".$condicion.";"; // Sentencia a ejecutar
		
		if(!$this->info->query($sentencia)){
			echo "Se ha producido un error al realizar la sentencia: ".$this->info->error;
		}
	}
	
}
?>