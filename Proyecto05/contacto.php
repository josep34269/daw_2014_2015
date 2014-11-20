<?php
	require "pagina.php";
	
	$tituloPag="CONTACTO"; //Indicamos el título de la página
	
	//Creamos la tabla
	$contenido="<table align='center' cellpadding='5'>
		<tr>
    		<td colspan='6' class='bor-titulo'><span class='titulo'>$tituloPag</span></td>
    	</tr>";
	
	$contenido.="<tr>
		<td class='panel1'>Contenido de la página de contacto</td>
	</tr>"; //Indicamos el contenido de la página
	
	$contenido.="</table>"; //Finaliza la creación de la tabla
	
	$pagina=new pagina(); //Instanciamos el objeto de página
	$pagina->setContenido($contenido); //Pasamos el contenido de la página
	$pagina->getPagina(); //Obtenemos todo el contenido
?>