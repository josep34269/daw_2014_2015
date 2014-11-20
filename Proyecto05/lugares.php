<?php
	require "pagina.php";
	
	$tituloPag="LUGARES"; //Indicamos el título de la página
	
	//Creamos la tabla
	$contenido="<table align='center' cellpadding='5'>
		<tr>
    		<td colspan='6' class='bor-titulo'><span class='titulo'>$tituloPag</span></td>
    	</tr>
		<tr>
    		<td class='bor-atributo'><span class='atributo'>ID</span></td>
        	<td class='bor-atributo'><span class='atributo'>Lugar</span></td>
        	<td class='bor-atributo'><span class='atributo'>Población</span></td>
        	<td class='bor-atributo'><span class='atributo'>Fecha</span></td>
			<td class='bor-atributo' colspan='2'><span class='atributo'>Opciones</span></td>
	</tr>";
	
	$pagina=new pagina(); //Instanciamos el objeto de página
	$sentencia=$pagina->funcionesDB("SELECT","TAREA03",array("id_lugar","lugar","poblacion","fecha"),array(),"id_lugar=id_lugar"); //Obtenemos los datos
	
	//Realizamos un bucle para mostrar todo el contenido obtenido de la sentencia
	for($fil=0;$fil<count($sentencia);$fil++){
		$contenido.="<tr>";
		for($col=0;$col<count($sentencia[$col]);$col++){
			$contenido.="<td class='panel1'>".$sentencia[$fil][$col]."</td>";
		}
		$contenido.="<td class='panel2'><input id='modificar' type='button' name='modificar' value='Modificar' onclick='location.href=\"modificarLugar.php?id=".$sentencia[$fil][0]."\";' /></td>
            <td class='panel2'><input id='baja' type='button' name='baja' value='Eliminar' onclick='var pregunta=confirm(\"¿Desea eliminar este lugar de viaje?\"); if(pregunta){ location.href=\"bajaLugar.php?id=".$sentencia[$fil][0]."\"; }' /></td>";
		$contenido.="</tr>";
	}
	
	$contenido.="</table>"; //Finaliza la creación de la tabla
	
	$pagina->setContenido($contenido); //Pasamos el contenido de la página
	$pagina->getPagina(); //Obtenemos todo el contenido
?>