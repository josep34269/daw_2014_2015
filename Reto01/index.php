<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Proyecto01 - Mis fotos de viaje</title>
        <!-- ESTILOS CSS -->
        <link rel="stylesheet" href="css/estilo.css" />
		<link rel="stylesheet" href="css/lightbox.css" />
        <!-- LIBRERÍAS JAVASCRIPT -->
        <script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/lightbox.min.js"></script>
	</head>
    <?php
		$varFor1=0; //Variable del primer bucle for
		$varFor2; //Variable del segundo bucle for
		$nombreImg; //Nombre de la imagen
		$contadorImg=1; //Contador de imágenes mostradas
		
		//Esta función hace que nos muestre siempre al menos 2 cifras a partir del valor pasado
		function cifrasNombre($valor){
			if($valor<10){
				$nombre="Foto0".$valor;
			}else{
				$nombre="Foto".$valor;
			}
			return $nombre; //Devuelve el nombre de la imagen
		}
    ?>
	<body>
    	<!-- Alinación de la tabla al centro y espaciado entre las celdas -->
    	<table align="center" cellspacing="20">
        <?php
			//Dos filas
            for($varFor1;$varFor1<2;$varFor1++){
		?>
        	<tr>
            <?php
				//Dos columnas
            	for($varFor2=0;$varFor2<2;$varFor2++){
					$nombreImg=cifrasNombre($contadorImg++); //Se instancia la función
			?>
            	<td class="backImg">
                	<!-- Al hacer clic sobre la foto nos abre en un ventana emergente la imagen -->
                	<a href="img/<?php echo $nombreImg.".jpg"; ?>" data-lightbox="fotos" data-title="<?php echo $nombreImg; ?>" class="enlace">
                	<img src="img/<?php echo $nombreImg.".jpg"; ?>" class="imagen" width="300" height="300" />
                    <br />
                	<?php echo $nombreImg; ?>
                    </a>
                </td>
			<?php
            	}
            ?>
            </tr>
		<?php
			}
		?>
        </table>
	</body>
</html>