<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Iniciamos la tabla
	$contenido="<table align='center' cellpadding='5'>
					<tr>
    					<td colspan='100%' class='bor-titulo'><span class='titulo'>PARTIDOS</span></td>
					</tr>";
	
	if(isset($_SESSION['usuario'])){
		$usuario=$_SESSION['usuario'];
		
		// Si hay comillas simples las modificamos para mostralas
		if(strpos($usuario,"''")!==false){
			$user=$usuario;
		}else if(strpos($usuario,"'")!==false){
			$user=str_replace("'","''",$usuario);
		}else{
			$user=$usuario;
		}
		
		$sentenciaUser=$pagina->funcionesDB("SELECT", "Entrenadores", array("id_equipo","(SELECT nombre FROM Equipos WHERE Equipos.id_equipo=Entrenadores.id_equipo)"), array(), "usuario='".$user."'"); // Obtenemos el equipo
		
		// Si hay comillas simples las modificamos para mostralas
		if(strpos($sentenciaUser[0][1],"''")!==false){
			$equipo=$sentenciaUser[0][1];
		}else if(strpos($sentenciaUser[0][1],"'")!==false){
			$equipo=str_replace("'","''",$sentenciaUser[0][1]);
		}else{
			$equipo=$sentenciaUser[0][1];
		}
		
		// Si hay comillas simples las modificamos para mostralas
		for($fila=0;$fila<1;$fila++){
			for($colu=0;$colu<1;$colu++){
				if(strpos($sentenciaUser[$fila][$colu],"''")!==false){
					$sentenciaUser[$fila][$colu]=str_replace("''","'",$sentenciaUser[$fila][$colu]);
				}
			}
		}
		
		// Obtenemos la página actual
		if(isset($_GET["pag"])){
			$pag=$_GET["pag"];
		}else{
			$pag=1;
		}
		
		$limit=10; // Limite de páginas a mostrar
		
		$resultado=array(); // Declaramos el valor inicial
		
		// Obtenemos el lugar del partido
		$sentenciaPartido=$pagina->funcionesDB("SELECT", "Partidos", array("id_partido","lugar","CONCAT('".$equipo." "."',CONCAT(puntos_equipo,CONCAT(' - ',CONCAT(nombre_rival,CONCAT(' ',puntos_rival)))))","DATE_FORMAT(fecha,'%d-%m-%Y')","SUBSTRING(hora,1,5)"), array(), "id_equipo='".$sentenciaUser[0][0]."' ORDER BY fecha DESC,hora LIMIT ".(($pag-1)*$limit).",".$limit."");
		
		if(count($sentenciaPartido)>0){
			// Indicamos el contenido de la página
			$contenido.="<tr>
							<td width='10%' class='bor-atributo'><span class='atributo'>Lugar</span></td>
							<td width='45%' class='bor-atributo'><span class='atributo'>Resultado</span></td>
							<td width='10%' class='bor-atributo'><span class='atributo'>Fecha</span></td>
							<td width='10%' class='bor-atributo'><span class='atributo'>Hora</span></td>
							<td width='25%' class='bor-atributo' colspan='3'><span class='atributo'>Opciones</span></td>
						</tr>";
						
			// Realizamos un bucle para mostrar todo el contenido obtenido de la sentencia
			for($fil=0;$fil<count($sentenciaPartido);$fil++){
				$contenido.="<tr>";
				
				for($col=1;$col<count($sentenciaPartido[$fil]);$col++){
					$contenido.="<td class='panel1'>".$sentenciaPartido[$fil][$col]."</td>";
				}
				
				$contenido.="<td class='panel2'><input id='modificar' type='button' name='modificar' class='button' value='Modificar' onclick='location.href=\"modificarPartido.php?id=".$sentenciaPartido[$fil][0]."\";' /></td>
							<td class='panel2'><input id='baja' type='button' name='baja' class='button' value='Eliminar' onclick='var pregunta=confirm(\"¿Desea eliminar este partido?\"); if(pregunta){ location.href=\"bajaPartido.php?id=".$sentenciaPartido[$fil][0]."\"; }' /></td>";
						
				$contenido.="</tr>";
			}
			
			// Obtenemos los datos del total de registros
			$sentenciaTotal=$pagina->funcionesDB("SELECT", "Partidos", array("id_partido"), array(), "id_equipo='".$sentenciaUser[0][0]."'");
			
			$total=ceil(count($sentenciaTotal)/$limit); // Número de páginas totales
			
			// Si hay más del límite registros, mostramos la páginación
			if(count($sentenciaTotal)>$limit){
				$contenido.="<tr>
							<td colspan='100%' class='panel3'>Páginas: ";
							
				for($numPag=0;$numPag<$total;$numPag++){
					if(($numPag+1)==$pag){
						$contenido.="<span class='numPaginaSelect'>".($numPag+1)."</span>";
					}else{
						$contenido.="<a href='".$_SERVER['PHP_SELF']."?pag=".($numPag+1)."' class='enlace'>";
						$contenido.="	<span class='numPagina'>".($numPag+1)."</span>
									</a>";
					}
				}
				
				$contenido.="</td>
						</tr>";
			}
			
			// Número de registro mostrados
			if(($pag*$limit)>count($sentenciaTotal)){ 
				$regTotal=count($sentenciaTotal);
			}else{
				$regTotal=$pag*$limit;
			}
			
			$contenido.="<tr>
							<td colspan='100%' class='panel3'>Partidos ".((($pag-1)*$limit)+1)."-".$regTotal." (total ".count($sentenciaTotal)." registros)</td>
						</tr>";
		}else if($pag>1){
			header("Location: partidos.php?pag=1"); // Realizamos una redirección
		}else{
			// Indicamos el contenido de la página
			$contenido.="<tr>
							<td colspan='100%' class='panel1'>No hay partidos dados de alta.</td>
						</tr>";
		}
		
		$contenido.="	<tr>
							<td colspan='100%' class='bor-boton3'><input id='nuevoPartido' type='button' name='nuevoPartido' class='input' value='Nuevo partido' onclick='location.href=\"altaPartido.php\";' /></td>
						</tr>";
		
		$contenido.="</table>"; // Cerramos la tabla
	}
	
	$pagina->setContent($contenido); // Pasamos el contenido de la página
	$pagina->getPagina(); // Obtenemos todo el contenido
?>