<?php
class bd{
	
	//Declaramos las variables
	private $server,$user,$pass,$bd,$info;
	
	function __construct($server,$user,$pass,$bd){
		$this->server=$server;
		$this->user=$user;
		$this->pass=$pass;
		$this->bd=$bd;
	}
	
	public function conectar(){
		$this->info=new mysqli($this->server,$this->user,$this->pass,$this->bd);
		if($this->info->connect_errno){
			echo "Fallo al contenctar a la Base de Datos (".$this->info->connect_errno."): ".$this->info->connect_error;
		}
	}
	
	public function getLugares(){
		$str="";
		if($resultado=$this->info->query("SELECT * FROM TAREA03 LIMIT 10")){
			$str=$str."<table border=1><tr bgcolor='#999'><td>ID</td><td>Lugar</td><td>Población</td><td>Fecha</td></tr>";
			if($resultado=$this->info->query("SELECT * FROM TAREA03")){
				for ($num_fila=0;$num_fila<$resultado->num_rows;$num_fila++) {
					$resultado->data_seek($num_fila);
					$fila = $resultado->fetch_assoc();
					$str=$str."<tr>";
					$str=$str."<td>".$fila['id_lugar']."</td>";
					$str=$str."<td>".$fila['lugar']."</td>";
					$str=$str."<td>".$fila['poblacion']."</td>";
					$str=$str."<td>".$fila['fecha']."</td>";
					$str=$str."</tr>";
				}
				$str=$str."</table>";
			}else{
				echo "Se ha producido un error al realizar la sentencia: ".$this->info->error;
			}
			return $str;
		}
	}
	
}
?>