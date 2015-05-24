<?php
	require "pagina.php";
	
	$tituloPag="PÁGINA PRINCIPAL"; // Indicamos el título de la página
	$pagina=new pagina($tituloPag); // Instanciamos el objeto de página
	
	// Iniciamos la tabla
	$contenido="<table align='center' cellpadding='5'>
					<tr>
    					<td class='bor-titulo'><span class='titulo'>INICIO</span></td>
					</tr>";
							
	// Indicamos el contenido de la página
	$contenido.="	<tr>
						<td class='panel1'>Football Coach/Manager es una web de gestión deportiva para equipos de futbol americano:<br /><br />
						- Gestión de nuestro perfil de usuario.<br />
						- Gestión de nuestro equipo (datos y partidos).<br />
						- Gestión de los jugadores (alta, modificación y baja) del equipo.<br />
						- Estadisticas por equipo/jugador (puntos, faltas...).</td>
					</tr>";
						
	$contenido.="</table>"; // Cerramos la tabla

	$pagina->setContent($contenido); // Pasamos el contenido de la página
	$pagina->getPagina(); // Obtenemos todo el contenido
?>
<br />