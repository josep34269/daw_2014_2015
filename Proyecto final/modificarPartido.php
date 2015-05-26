<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Comprobamos si le pasa el identificador
	if(isset($_GET["id"])){
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
		$sentenciaPartido=$pagina->funcionesDB("SELECT", "Partidos", array("lugar","(SELECT nombre FROM Equipos WHERE Equipos.id_equipo='".$sentenciaUser[0][0]."')","puntos_equipo","nombre_rival","puntos_rival","fecha","hora"), array(), "id_partido=".$_GET['id'].""); // Obtenemos los datos del partido
		
		// Iniciamos el formulario y la tabla
		$contenido="<form id='modPartido' method='post' enctype='multipart/form-data' name='modPartido' action='modifPartido.php?id=".$_GET['id']."' onsubmit='return modificarPartido();'>
						<table align='center' cellpadding='5'>
							<tr>
    							<td colspan='100%' class='bor-titulo'><span class='titulo'>MODIFICAR PARTIDO</span></td>
    						</tr>";
							
		$sentenciaLugares=$pagina->funcionesDB("SELECT", "Partidos", array("lugar"), array(), "id_partido=".$_GET["id"]." GROUP BY lugar ORDER BY lugar"); // Obtenemos los lugares del partido
		
		// Mostramos todo el contenido obtenido de la sentenciaPartido de tipos
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='lugar'>Lugar: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'>
									<select id='lugar' name='lugar' class='input'>";
										for($lugar=0;$lugar<count($sentenciaLugares);$lugar++){
											if($sentenciaLugares[$lugar][0]=="Local"){
		$contenido.="							<option value='Local' selected='selected'>Local</option>
												<option value='Visitante'>Visitante</option>";
											}else{
		$contenido.="							<option value='Local'>Local</option>
												<option value='Visitante' selected='selected'>Visitante</option>";
											}
										}
		$contenido.="				</select>
								</td>
							</tr>";
							
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='puntosEquipo'>Puntos de ".$sentenciaPartido[0][1]."*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='puntosEquipo' type='number' name='puntosEquipo' class='input' value=\"".$sentenciaPartido[0][2]."\" min='0' max='99' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='nombreRival'>Nombre rival*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='nombreRival' type='text' name='nombreRival' class='input' value=\"".$sentenciaPartido[0][3]."\" /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='puntosRival'>Puntos del rival*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='puntosRival' type='number' name='puntosRival' class='input' value=\"".$sentenciaPartido[0][4]."\" min='0' max='99' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='fecha'>Fecha*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='fecha' type='date' name='fecha' class='input' value='".$sentenciaPartido[0][5]."' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='hora'>Hora*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='hora' type='time' name='hora' class='input' value='".$sentenciaPartido[0][6]."' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='4' class='panel3'>*Campos obligatorios</td>
							</tr>";
		
		// Comprobamos el origen del cual venimos
		if(isset($_SERVER['HTTP_REFERER'])){
			$cancelar=$_SERVER['HTTP_REFERER'];
		}else{
			$cancelar="partidos.php?pag=1";
		}
		
		$contenido.="		<tr>
								<td width='33%' class='bor-boton2'><input id='guardar' type='submit' name='guardar' class='input' value='Guardar' /></td>
       							<td width='33%' colspan='2' class='bor-boton3'><input id='reset' type='reset' name='reset' class='input' value='Restablecer' /></td>
       							<td width='33%' class='bor-boton1'><input id='cancelar' type='button' name='cancelar' class='input' value='Cancelar' onclick='location.href=\"".$cancelar."\";' /></td>
							</tr>";
		
		// Cerramos la tabla y el formulario
		$contenido.="	</table>
					</form>";
	}else{
		
		header("Location: partidos.php?pag=1"); // Realizamos una redirección
	}
	
	$pagina->setContent($contenido); // Pasamos el contenido de la página
	$pagina->getPagina(); // Obtenemos todo el contenido
?>