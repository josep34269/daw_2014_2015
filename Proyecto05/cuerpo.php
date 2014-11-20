<?php
class cuerpo extends elemento{
	
	/*
	* Esta función muestra el cuerpor (etiqueta body) de la página web según el contenido que se le pasa
	*/
	function setCuerpo($contenido){
		//Empieza el contenido
		$str='<body>
				<!-- Alinación del contenido centro -->
    			<center>
				'.$contenido.'
				</center>';
		//Acaba el contenido
		
		$this->setContenido($str);
	}
	
}
?>