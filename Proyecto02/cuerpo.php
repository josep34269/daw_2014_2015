<?php
class cuerpo extends elemento{
	
	function setCuerpo($columnas,$filas){
		$varFor1=0; //Variable del primer bucle for
		$varFor2; //Variable del segundo bucle for
		$nombreImg; //Nombre de la imagen
		$contadorImg=1; //Contador de imágenes mostradas
		
		function cifrasNombre($valor){
			if($valor<10){
				$nombre="Foto0".$valor;
			}else{
				$nombre="Foto".$valor;
			}
			return $nombre; //Devuelve el nombre de la imagen
		}
		
		//Empieza el contenido
		$str='<body>
				<!-- Alinación de la tabla al centro y espaciado entre las celdas -->
    			<table align="center" cellspacing="20">';
				
					//Número de filas
           		 	for($varFor1;$varFor1<$filas;$varFor1++){
						
        				$str.='<tr>';
						
							//Número de columnas
            				for($varFor2=0;$varFor2<$columnas;$varFor2++){
								$nombreImg=cifrasNombre($contadorImg++); //Se instancia la función
								
            				$str.='<td class="backImg">
                				<!-- Al hacer clic sobre la foto nos abre en un ventana emergente la imagen -->
                				<a href="img/'.$nombreImg.'.jpg" data-lightbox="fotos" data-title="'.$nombreImg.'" class="enlace">
                				<img src="img/'.$nombreImg.'.jpg" class="imagen" width="150" height="150" />
                    			<br />
                				'.$nombreImg.'
                    			</a>
                			</td>';
							
            				}
            			$str.='</tr>';
						}
        			$str.='</table>';
		//Acaba el contenido
		
		$this->setContenido($str);
	}
	
}
?>