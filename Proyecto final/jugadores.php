<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Iniciamos la tabla
	$contenido="<table align='center' cellpadding='5'>
					<tr>
    					<td colspan='100%' class='bor-titulo'><span class='titulo'>JUGADORES</span></td>
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
		
		$sentenciaUser=$pagina->funcionesDB("SELECT", "Entrenadores", array("id_equipo"), array(), "usuario='".$user."'"); // Obtenemos el equipo
		
		// Si hay comillas simples las modificamos para mostralas
		for($fila=0;$fila<count($sentenciaUser);$fila++){
			for($colu=0;$colu<count($sentenciaUser[$fila]);$colu++){
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
		
		// Obtenemos los datos del total de registros
		if(!isset($_GET["tipo"])){
			$sentenciaTotal=$pagina->funcionesDB("SELECT", "Jugadores", array("id_jugador"), array(), "id_equipo='".$sentenciaUser[0][0]."'");
		}else{
			$sentenciaTotal=$pagina->funcionesDB("SELECT", "Jugadores", array("id_jugador"), array(), "id_equipo='".$sentenciaUser[0][0]."' AND id_tipo='".$_GET['tipo']."'");
		}
		
		// Coomprobamos si se filtran los datos
		if(isset($_GET["tipo"])){
			$condicion="id_tipo='".$_GET['tipo']."' AND id_equipo='".$sentenciaUser[0][0]."' ORDER BY id_tipo,id_posicion LIMIT ".(($pag-1)*$limit).",".$limit."";
		}else{
			$condicion="id_jugador=id_jugador AND id_equipo='".$sentenciaUser[0][0]."' ORDER BY id_tipo,id_posicion LIMIT ".(($pag-1)*$limit).",".$limit."";
		}
		
		// Obtenemos los datos de los jugadores
		$sentenciaJugador=$pagina->funcionesDB("SELECT", "Jugadores", array("id_jugador",'(SELECT Tipo_Jugadores.nombre FROM Tipo_Jugadores WHERE Jugadores.id_tipo=Tipo_Jugadores.id_tipo)',"CONCAT((SELECT Posicion_Jugadores.acronimo FROM Posicion_Jugadores WHERE Jugadores.id_posicion=Posicion_Jugadores.id_posicion),' (#',dorsal,')')","CONCAT(nombre,' ',apellidos)","TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())"), array(), $condicion);
		
		if(count($sentenciaJugador)>0){
			// Indicamos el contenido de la página
			$contenido.="<tr>
							<td width='15%' class='bor-atributo'><span class='atributo'>Tipo</span></td>
							<td width='20%' class='bor-atributo'><span class='atributo'>Posición (dorsal)</span></td>
							<td width='35%' class='bor-atributo'><span class='atributo'>Nombre y apellidos</span></td>
							<td width='10%' class='bor-atributo'><span class='atributo'>Edad</span></td>
							<td width='20%' class='bor-atributo' colspan='2'><span class='atributo'>Opciones</span></td>
						</tr>";
						
			// Realizamos un bucle para mostrar todo el contenido obtenido de la sentencia
			for($fil=0;$fil<count($sentenciaJugador);$fil++){
				$contenido.="<tr>";
				
				for($col=1;$col<count($sentenciaJugador[$fil]);$col++){
					$contenido.="<td class='panel1'>".$sentenciaJugador[$fil][$col]."</td>";
				}
				
				$contenido.="<td class='panel2'><input id='modificar' type='button' name='modificar' class='button' value='Modificar' onclick='location.href=\"modificarJugador.php?id=".$sentenciaJugador[$fil][0]."\";' /></td>
							<td class='panel2'><input id='baja' type='button' name='baja' class='button' value='Eliminar' onclick='var pregunta=confirm(\"¿Desea eliminar este jugador?\"); if(pregunta){ location.href=\"bajaJugador.php?id=".$sentenciaJugador[$fil][0]."\"; }' /></td>";
						
				$contenido.="</tr>";
			}
			
			$total=ceil(count($sentenciaTotal)/$limit); // Número de páginas totales
			
			// Si hay más de límite registros, mostramos la páginación
			if(count($sentenciaTotal)>$limit){
				$contenido.="<tr>
							<td colspan='100%' class='panel3'>Páginas: ";
							
				for($numPag=0;$numPag<$total;$numPag++){
					if(isset($_GET["tipo"])){
						if(($numPag+1)==$pag){
							$contenido.="<span class='numPaginaSelect'>".($numPag+1)."</span>";
						}else{
							$contenido.="<a href='".$_SERVER['PHP_SELF']."?tipo=".$_GET["tipo"]."&pag=".($numPag+1)."' class='enlace'>";
							$contenido.="	<span class='numPagina'>".($numPag+1)."</span>
										</a>";
						}
					}else{
						if(($numPag+1)==$pag){
							$contenido.="<span class='numPaginaSelect'>".($numPag+1)."</span>";
						}else{
							$contenido.="<a href='".$_SERVER['PHP_SELF']."?pag=".($numPag+1)."' class='enlace'>";
							$contenido.="	<span class='numPagina'>".($numPag+1)."</span>
										</a>";
						}
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
							<td colspan='100%' class='panel3'>Jugadores ".((($pag-1)*$limit)+1)."-".$regTotal." (total ".count($sentenciaTotal)." registros)</td>
						</tr>";
		}else if($pag>1){
			header("Location: jugadores.php?pag=1"); // Realizamos una redirección
		}else{
			// Indicamos el contenido de la página
			$contenido.="<tr>
							<td colspan='100%' class='panel1'>No hay jugadores dados de alta.</td>
						</tr>";
		}
		
		// Obtenemos los tipos de jugadores
		$sentenciaTipos=$pagina->funcionesDB("SELECT", "Tipo_Jugadores", array("id_tipo","nombre"), array(), "id_tipo=id_tipo ORDER BY nombre");
		
		$contenido.="	<tr>
							<td colspan='2' class='bor-boton2'>
								<form id='tipoJugador' method='get' name='tipoJugador' action='jugadores.php'>
								Filtrar por: <select id='tipo' name='tipo' class='input' onchange='if(this.options[this.selectedIndex].text!=\"Seleccione un tipo\"){ this.form.submit(); }'>
									<option>Seleccione un tipo</option>";
									for($type=0;$type<count($sentenciaTipos);$type++){
										if(isset($_GET["tipo"]) && $_GET["tipo"]==$sentenciaTipos[$type][0]){
		$contenido.="						<option value=".$sentenciaTipos[$type][0]." selected='selected'>".$sentenciaTipos[$type][1]."</option>";
										}else{
		$contenido.="						<option value=".$sentenciaTipos[$type][0].">".$sentenciaTipos[$type][1]."</option>";
										}
									}
		$contenido.="			</select>
							</td>";
							
		if(isset($_GET["tipo"])){
			$contenido.="	<td colspan='2' class='bor-boton3'><input id='borrar' type='reset' name='borrar' class='input' value='Borrar filtro' onclick='location.href=\"jugadores.php?pag=1\";' /></td>";
		}else{
			$contenido.="	<td colspan='2' class='bor-boton3'><input id='borrar' type='reset' name='borrar' class='input' value='Borrar filtro' /></td>";
		}
		
       	$contenido.="		<td colspan='2' class='bor-boton1'><input id='nuevoJugador' type='button' name='nuevoJugador' class='input' value='Nuevo jugador' onclick='location.href=\"altaJugador.php\";' /></td>
						</tr>";
		
		$contenido.="</table>"; // Cerramos la tabla
	}
	
	$pagina->setContent($contenido); // Pasamos el contenido de la página
	$pagina->getPagina(); // Obtenemos todo el contenido
?>