<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Comprobamos si le pasa el identificador
	if(isset($_GET["id"])){
		$sentenciaJugador=$pagina->funcionesDB("SELECT", "Jugadores", array("id_tipo","id_posicion","nombre","apellidos","fecha_nacimiento","dorsal","foto"), array(), "id_jugador=".$_GET['id'].""); // Obtenemos los datos
		
		// Iniciamos el formulario y la tabla
		$contenido="<form id='modJugador' method='post' enctype='multipart/form-data' name='modJugador' action='modifJugador.php?id=".$_GET['id']."' onsubmit='return modificarJugador();'>
						<table align='center' cellpadding='5'>
							<tr>
    							<td colspan='100%' class='bor-titulo'><span class='titulo'>MODIFICAR JUGADOR</span></td>
    						</tr>";
							
		// Obtenemos los tipos y posiciones de los jugadores
		$sentenciaTipos=$pagina->funcionesDB("SELECT", "Tipo_Jugadores", array("id_tipo","nombre"), array(), "id_tipo=id_tipo ORDER BY nombre");
		$sentenciaPosi=$pagina->funcionesDB("SELECT", "Posicion_Jugadores", array("id_tipo","id_posicion","nombre"), array(), "id_posicion=id_posicion ORDER BY nombre");
		
		// Mostramos todo el contenido obtenido de la sentencia de tipos
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='tipo'>Tipo: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'>
									<select id='tipo' name='tipo' class='input' onchange='load(this.value)'>";
										for($type=0;$type<count($sentenciaTipos);$type++){
											if($sentenciaJugador[0][0]==$sentenciaTipos[$type][0]){
		$contenido.="							<option value=".$sentenciaTipos[$type][0]." selected='selected'>".$sentenciaTipos[$type][1]."</option>";
											}else{
		$contenido.="							<option value=".$sentenciaTipos[$type][0].">".$sentenciaTipos[$type][1]."</option>";
											}
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
											if($sentenciaJugador[0][0]==$sentenciaPosi[$posi][0]){
												if($sentenciaJugador[0][1]==$sentenciaPosi[$posi][1]){
		$contenido.="								<option value=".$sentenciaPosi[$posi][1]." selected='selected'>".$sentenciaPosi[$posi][2]."</option>";
												}else{
		$contenido.="								<option value=".$sentenciaPosi[$posi][1].">".$sentenciaPosi[$posi][2]."</option>";
												}
											}
										}
		$contenido.="				</select>
								</td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='nombre'>Nombre*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='nombre' type='text' name='nombre' class='input' value=\"".$sentenciaJugador[0][2]."\" /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='apellidos'>Apellidos*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='apellidos' type='text' name='apellidos' class='input' value=\"".$sentenciaJugador[0][3]."\" /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='fechaNaci'>Fecha de nacimiento*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='fechaNaci' type='date' name='fechaNaci' class='input' value='".$sentenciaJugador[0][4]."' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='dorsal'>Dorsal*: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'><input id='dorsal' type='number' name='dorsal' class='input' value='".$sentenciaJugador[0][5]."' min='1' max='99' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel1'><label for='foto'>Foto: </label></td>
								<td width='50%' colspan='2' align='center' class='panel1'>Actual<br /><img id='picPlayer' name='picPlayer' src='img/players/".$sentenciaJugador[0][6]."' width='100' height='100' /><br /><input id='imagen' type='file' name='imagen' class='input' /></td>
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
	}else{
		
		header("Location: jugadores.php?pag=1"); // Realizamos una redirección
	}
	
	$pagina->setContent($contenido); // Pasamos el contenido de la página
	$pagina->getPagina(); // Obtenemos todo el contenido
?>