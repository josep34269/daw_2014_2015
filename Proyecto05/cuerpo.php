<?php
class cuerpo extends elemento{
	
	public $titulo;
	
	/*
	* Esta función es el constructor de la página, al cuál se le pasa el título
	* 
	* @param titulo Es el título que se muestre en la cabecera de la tabla
	*/
	function __construct($titulo){
		$this->titulo=$titulo;
	}
	
	/*
	* Esta función muestra el cuerpor (etiqueta body) de la página web según el contenido que se le pasa
	*/
	function setTitle(){
		//Creamos la tabla
		$title="<body>
			<!-- Alinación del contenido al centro -->
    		<center>
				<table align='center' cellpadding='5'>
					<tr>
    					<td colspan='100%' class='bor-titulo'><span class='titulo'>".$this->titulo."</span></td>
    				</tr>";
		
		$this->setTitulo($title);
	}
	
	/*
	* Esta función muestra el cuerpor (etiqueta body) de la página web según el contenido que se le pasa
	*/
	function setCuerpo($contenido,$esTabla){
		if(strtoupper($esTabla)=="SI"){
			//Asignamos el contenido
			$str=$contenido;
		}else{
			//Asignamos el contenido
			$str="<tr>
				<td class='panel1'>".$contenido."</td>
			</tr>";
		}
		
		$str.="</table>"; //Finaliza la creación de la tabla
		
		$this->setContenido($str);
	}
	
}
?>