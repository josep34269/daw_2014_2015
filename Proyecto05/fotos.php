<?php
	require "pagina.php";
	
	$tituloPag="FOTOS"; //Indicamos el título de la página
	
	/*
	* Esta función hace que siempre se muestren dos cifras
	* 
	* @param valor Número (se va incrementando) actual de la imagen a mostrar
	* @return nombre Nombre de la imagen con dos cifras númericas al final
	*/
	function cifrasNombre($valor){
		if($valor<10){
			$nombre="Foto0".$valor;
		}else{
			$nombre="Foto".$valor;
		}
		return $nombre; //Devuelve el nombre de la imagen
	}
	
	$numeroColFil=array("col"=>4,"fil"=>1); //Indicamos el número de columnas y filas a mostrar
	$contadorImg=1; //Contador de imágenes mostradas
	
	//Empieza el contenido
	$contenido="<body>
			<!-- Alinación de la tabla al centro y espaciado entre las celdas -->
    		<table align='center' cellpadding='5'>
				<tr>
    				<td colspan='".$numeroColFil["col"]."' class='bor-titulo'><span class='titulo'>$tituloPag</span></td>
    			</tr>";
			
				//Número de filas
           		for($fil=0;$fil<$numeroColFil["fil"];$fil++){
				
        			$contenido.="<tr>";
					
						//Número de columnas
            			for($col=0;$col<$numeroColFil["col"];$col++){
							$nombreImg=cifrasNombre($contadorImg++); //Se instancia la función
							
            				$contenido.="<td class='backImg'>
                				<!-- Al hacer clic sobre la foto nos abre en un ventana emergente la imagen -->
                				<a href='img/".$nombreImg.".jpg' data-lightbox='fotos' data-title='".$nombreImg."' class='enlace'>
                				<img src='img/".$nombreImg.".jpg' class='imagen' width='150' height='150' />
                    			<br />".$nombreImg."</a>
                			</td>";
							
            			}
						
            		$contenido.='</tr>';
				}
				
        	$contenido.='</table>';
	//Acaba el contenido
	
	$pagina=new pagina(); //Instanciamos el objeto de página
	$pagina->setContenido($contenido); //Pasamos el contenido de la página
	$pagina->getPagina(); //Obtenemos todo el contenido
?>