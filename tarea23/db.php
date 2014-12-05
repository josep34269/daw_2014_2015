<?php
	/**
	* db
	*
	* Gestor de Bases de datos utilizando la nueva api mejorada de php mysqli orientada a objetos
	*
	* @author Paco Gómez
	* @author http://es.linkedin.com/pub/paco-gomez-arnal/7/387/807/
	*
	* @version 1.0
	*/
class db
{
	/**
	* string del servidor
	*/
	private $servidor="localhost";
	/**
	* string del usuario
	*/
	private $usuario="root";
	/**
	* string del password
	*/
	private $pass="daw01";
	/**
	* string de la base de datos
	*/
	private $base_datos="lugares";
	/**
	* descriptor a la conexión con la base de datos
	*/
	private $descriptor;
	/**
	* descriptor a la conexión con la base de datos
	*/
	private $sentenciaPreparada;
	/**
	* boolean que nos indica si ha habido exito al conectar o no
	*/
	private $conectado;
	/**
	* información del error o conexión habilitada
	*/
	private $info;
	function __construct()
	{
		if(func_num_args()==1){
			$this->usuario = func_get_arg(0);
			$this->conectado=false;
			$this->info="";
		}elseif(func_num_args()==2){
			$this->usuario = func_get_arg(0);
			$this->pass = func_get_arg(1);
			$this->conectado=false;
			$this->info="";			
		}elseif(func_num_args()==3){
			$this->usuario = func_get_arg(0);
			$this->pass = func_get_arg(1);
			$this->base_datos = func_get_arg(2);
			$this->conectado=false;
			$this->info="";
		}
	}
	
	/**
		* Realiza la conexión con la base de datos devolviendo el estado de la misma
		*
		* @return conectado boolean
	*/	
	public function conectar_base_datos()
	{
		$this->descriptor = new mysqli($this->servidor, $this->usuario, $this->pass, $this->base_datos);
		if ($this->descriptor->connect_errno) {
    		$this->$info="Fallo al contenctar a MySQL: (" . $this->descriptor->connect_errno . ") " . $this->descriptor->connect_error;
			$this->conectado=false;
		}else{
			$this->info="Conectado al servidor MySQL: " .$this->descriptor->host_info;
			$this->conectado=true;
		}
		
		return $this->conectado;
	}
	
	/**
		* Devuelve el estado de la conexión actual
		*
		* @return info string
	*/	
	public function getInfo(){
		return $this->info;
	}
	
	public function autenticar($usuarioAPP,$passwordAPP){
		$passMD5=md5($passwordAPP);

		if($resultado = $this->descriptor->query("SELECT * FROM usuarios where usuario='".$usuarioAPP."' AND pass='".$passMD5."'")){
			// compruebo llamada
			error_log($this->descriptor->affected_rows);
			if($this->descriptor->affected_rows>0){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/**
		* Devuelve una tabla con todos los lugares almacenados en la tabla de la base de datos lugares
		*
		* @return str string			
	*/	
	public function getLugares($idLugar){
		if(isset($idLugar))
		{
			$resultado = $this->descriptor->query("UPDATE lugares SET nombre='".$_POST["nombre"]."',descripcion='".$_POST["descripcion"]."',fecha='".$_POST["fecha"]."' WHERE id_lugar=$idLugar");
		}
		$str="";
		if($resultado = $this->descriptor->query("SELECT * FROM lugares")){
			$str=$str."<table class='table table-striped'><thead><tr>
							<th>id</th>
							<th>lugar</th>
							<th>descripción</th>
							<th>fecha</th>
						</tr></thead><tbody>";
			for ($num_fila = 0; $num_fila < $resultado->num_rows; $num_fila++) {
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
				$str=$str."<tr>";
				$str=$str."<td><p><a href='index.php?id=2&id_lugar=".$fila['id_lugar']."'>".$fila['id_lugar']."</a></td>";
				$str=$str."<td>".$fila['nombre']."</td>";
				$str=$str."<td>".$fila['descripcion']."</td>";
				$str=$str."<td>".$fila['fecha']."</td>";
				$str=$str."</tr>";
			}
				$str=$str."</tbody></table>";
		}else{
			 printf("Error: %s\n", $this->descriptor->error);
		}
		return $str;
	}
	

	public function getModLugar($idLugar){
		$str="";
		if($resultado = $this->descriptor->query("SELECT * FROM lugares where id_lugar=".$idLugar)){
			$resultado->data_seek(0);
			$fila = $resultado->fetch_assoc();
			$str=$str."<form role='form' method='post' action='index.php?id=2&id_mod_lugar=".$fila['id_lugar']."'>";
			$str=$str."<div class='row'>";
			$str=$str."<div class='col-md-4'>";
			$str=$str."<div class='form-group'>";
			$str=$str."<label for='id'>id</label>";
			$str=$str."<input type='text' class='form-control' placeholder='".$fila['id_lugar']."' name='id' disabled>";
			$str=$str."</div>";
			$str=$str."<div class='form-group'>";
			$str=$str."<label for='nombre'>nombre</label>";
			$str=$str."<input type='text' class='form-control' placeholder='".$fila['nombre']."' name='nombre'>";
			$str=$str."</div>";
			$str=$str."<div class='form-group'>";
			$str=$str."<label for='descripcion'>descripcion</label>";
			$str=$str."<input type='text' class='form-control' placeholder='".$fila['descripcion']."' name='descripcion'>";
			$str=$str."</div>";
			$str=$str."<div class='form-group'>";
			$str=$str."<label for='fecha'>fecha</label>";
			$str=$str."<input type='text' class='form-control' placeholder='".$fila['fecha']."' name='fecha'>";
			$str=$str."</div>";
			$str=$str."</div></div>";
			$str=$str."<div class='row'>";
			$str=$str."<div class='col-md-4'>";
			$str=$str."<button type='submit' class='btn btn-defaul'>Enviar</button>";
			$str=$str."</div></div>";
			$str=$str."</form>";
		}else{
			 printf("Error: %s\n", $this->descriptor->error);
		}
		return $str;
	}
	
	public function setLugar($lugar,$descripcion,$fecha){
		if($resultado = $this->descriptor->query("INSERT INTO lugares (nombre,descripcion,fecha) VALUES ('$lugar','$descripcion','$fecha')")){
			echo "OK<br>";
		}else{
			echo "ERROR<br>";
			 printf("Error: %s\n", $this->descriptor->error);
		}
	}
	
	public function prepararLugar(){
		/* Sentencia preparada, etapa 1: preparación */
		if (!($this->sentenciaPreparada = $this->descriptor->prepare("INSERT INTO lugares (nombre,descripcion,fecha) VALUES (?,?,?)"))) {
   			echo "Falló la preparación: (" . $this->descriptor->errno . ") " . $this->descriptor->error;
		}
	}
	public function setLugarPrep($lugar,$descripcion,$fecha){
		if (!$this->sentenciaPreparada->bind_param('sss', $lugar, $descripcion, $fecha))
		{
			echo "Falló la vinculación de parámetros: (" . !$this->sentenciaPreparada->errno . ") " . $this->sentenciaPreparada->error;
		}
		if (!$this->sentenciaPreparada->execute()){
			echo "Falló la ejecución: (" . $this->sentenciaPreparada->errno . ") " . $this->sentenciaPreparada->error;
		}
	}
}
