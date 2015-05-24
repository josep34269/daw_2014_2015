<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Iniciamos el formulario y la tabla
	$contenido="<form id='nuevoJugador' method='post' enctype='multipart/form-data' name='nuevoJugador' action='nuevoJugador.php' onsubmit='return altaJugador();'>
					<table align='center' cellpadding='5'>
						<tr>
    						<td colspan='100%' class='bor-titulo'><span class='titulo'>NUEVO JUGADOR</span></td>
    					</tr>";
						
	// Obtenemos los tipos y posiciones de los jugadores
	$sentenciaTipos=$pagina->funcionesDB("SELECT", "Tipo_Jugadores", array("id_tipo","nombre"), array(), "id_tipo=id_tipo ORDER BY nombre");
	$sentenciaPosi=$pagina->funcionesDB("SELECT", "Posicion_Jugadores", array("id_tipo","id_posicion","nombre"), array(), "id_tipo='".$sentenciaTipos[0][0]."' ORDER BY nombre");
	
	// Mostramos todo el contenido obtenido de la sentencia de tipos
	$contenido.="		<tr>
							<td width='50%' colspan='2' class='panel1'><label for='tipo'>Tipo: </label></td>
							<td width='50%' colspan='2' align='center' class='panel1'>
								<select id='tipo' name='tipo' class='input' onchange='load(this.value)'>";
									for($type=0;$type<count($sentenciaTipos);$type++){
	$contenido.="						<option value=".$sentenciaTipos[$type][0].">".$sentenciaTipos[$type][1]."</option>";
									}
	$contenido.="				</select>
							</td>
						</tr>";
	
	// Mostramos todo el contenido obtenido de la sentencia de posiciones
	$contenido.="		<tr>
							<td width='50%' colspan='2' class='panel1'><label for='posicion'>Posicion: </label></td>
							<td width='50%' colspan='2' align='center' class='panel1'>
								<select id='posicion' name='posicion' class='input'>";
									for($posi=0;$posi<count($sentenciaPosi);$posi++){
	$contenido.="						<option value=".$sentenciaPosi[$posi][1].">".$sentenciaPosi[$posi][2]."</option>";
									}
	$contenido.="				</select>
							</td>
						</tr>";
	$contenido.="		<tr>
							<td width='50%' colspan='2' class='panel1'><label for='nombre'>Nombre*: </label></td>
							<td width='50%' colspan='2' align='center' class='panel1'><input id='nombre' type='text' name='nombre' class='input' /></td>
						</tr>";
	$contenido.="		<tr>
							<td width='50%' colspan='2' class='panel1'><label for='apellidos'>Apellidos*: </label></td>
							<td width='50%' colspan='2' align='center' class='panel1'><input id='apellidos' type='text' name='apellidos' class='input' /></td>
						</tr>";
	$contenido.="		<tr>
							<td width='50%' colspan='2' class='panel1'><label for='fechaNaci'>Fecha de nacimiento*: </label></td>
							<td width='50%' colspan='2' align='center' class='panel1'><input id='fechaNaci' type='date' name='fechaNaci' class='input' /></td>
						</tr>";
	$contenido.="		<tr>
							<td width='50%' colspan='2' class='panel1'><label for='dorsal'>Dorsal*: </label></td>
							<td width='50%' colspan='2' align='center' class='panel1'><input id='dorsal' type='number' name='dorsal' class='input' min='1' max='99' /></td>
						</tr>";
	$contenido.="		<tr>
							<td width='50%' colspan='2' class='panel1'><label for='foto'>Foto: </label></td>
							<td width='50%' colspan='2' align='center' class='panel1'><input id='imagen' type='file' name='imagen' class='input' /></td>
						</tr>";
	$contenido.="		<tr>
							<td width='50%' colspan='4' class='panel3'>*Campos obligatorios</td>
						</tr>";
	
	// Comprobamos el origen del cual venimos
	if(isset($_SERVER['HTTP_REFERER'])){
		$cancelar=$_SERVER['HTTP_REFERER'];
	}else{
		$cancelar="jugadores.php?pag=1";
	}
	
	$contenido.="		<tr>
							<td width='33%' class='bor-boton2'><input id='guardar' type='submit' name='guardar' class='input' value='Guardar' /></td>
       						<td width='33%' colspan='2' class='bor-boton3'><input id='reset' type='reset' name='reset' class='input' value='Restablecer' /></td>
       						<td width='33%' class='bor-boton1'><input id='cancelar' type='button' name='cancelar' class='input' value='Cancelar' onclick='location.href=\"".$cancelar."\";' /></td>
						</tr>";
	
	// Cerramos la tabla y el formulario
	$contenido.="	</table>
				</form>";
	
	$pagina->setContent($contenido); // Pasamos el contenido de la página
	$pagina->getPagina(); // Obtenemos todo el contenido
?>