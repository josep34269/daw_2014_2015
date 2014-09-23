<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Proyecto01 - Mis fotos de viaje</title>
        <!-- ESTILOS CSS -->
        <style>
			body{
				font-family: Arial, Helvetica, sans-serif; /* Fuente de la letra */
				font-size: 25px; /* Tamaño de la fuente */
			}
			table{
				text-align: center; /* Alínea al centro el contenido de la tabla */
			}
        	td{
				border: solid 3px #000; /* Borde de la celda */
				padding: 10px; /* Espacio entre la imagen y el borde */
				cursor: pointer; /* Hace que el cursor del ratón sea una mano */
			}
			/* Al situar el ratón encima de la celda cambia el color de fondo */
			td:hover{
				background-color: #CCC; /* Color de fondo */
			}
			/* Al situar el ratón encima de la celda cambia el color del enlace */
			td:hover a{
				color: #000; /* Color del texto */
			}
			/* Enlace visitado que cambia el color de fondo y del enlace */
			td a:visited{
				background-color: #CCC; /* Color de fondo */
				color: #000; /* Color del texto */
			}
			img{
				margin-bottom: 10px; /* Margen inferior de la imagen */
				border: solid 2px #000; /* Borde de la iamgen */
			}
			a{
				color: #00F; /* Color del texto */
				text-decoration: none; /* Quita el efecto subrayado del enelace */
			}
        </style>
        <!-- FUNCIONES JAVASCRIPT -->
        <script type="text/javascript">
			<!-- El enlace que se le pase como parámetro es al que irá -->
			function imgIrEnlace(enlace){
				window.location.href=enlace;
			}
		</script>
	</head>
    <?php
		$varFor1=0; //Variable del primer bucle for
		$varFor2=0; //Variable del segundo bucle for
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
            	<!-- Al hacer clic sobre la celda nos lleva al parámetro indicado -->
            	<td onclick="imgIrEnlace('<?php echo $nombreImg.".jpg"; ?>')">
                	<img src="<?php echo $nombreImg.".jpg"; ?>" />
                    <br />
                	<a href="<?php echo $nombreImg.".jpg"; ?>"><?php echo $nombreImg; ?></a>
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