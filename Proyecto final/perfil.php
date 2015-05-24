<?php
	require "pagina.php";
	
	$pagina=new pagina(); // Instanciamos el objeto de página
	
	// Comprobamos si se le pasa el identificador
	if(isset($_SESSION["usuario"])){
		$usuario=$_SESSION['usuario'];
		
		// Si hay comillas simples las modificamos para mostralas
		if(strpos($usuario,"''")!==false){
			$user=$usuario;
		}else if(strpos($usuario,"'")!==false){
			$user=str_replace("'","''",$usuario);
		}else{
			$user=$usuario;
		}
		
		$sentencia=$pagina->funcionesDB("SELECT", "Entrenadores", array("(SELECT nombre FROM Equipos WHERE Equipos.id_equipo=Entrenadores.id_equipo)","id_entrenador","nombre","apellidos","usuario","foto"), array(), "usuario='".$user."'"); // Obtenemos los datos
		
		// Si hay comillas simples las modificamos para mostralas
		for($fila=0;$fila<count($sentencia);$fila++){
			for($colu=0;$colu<count($sentencia[$fila]);$colu++){
				if(strpos($sentencia[$fila][$colu],"''")!==false){
					$sentencia[$fila][$colu]=str_replace("''","'",$sentencia[$fila][$colu]);
				}
			}
		}
		
		// Iniciamos el formulario y la tabla
		$contenido="<form id='modPerfil' method='post' enctype='multipart/form-data' name='modPerfil' action='modifUsuario.php?id=".$sentencia[0][1]."' onsubmit='return modificarPerfil();'>
						<table align='center' cellpadding='5'>
							<tr>
    							<td colspan='100%' class='bor-titulo'><span class='titulo'>PERFIL</span></td>
    						</tr>";
							
		// Mostramos todo el contenido obtenido de la sentencia
		$contenido.="		<tr>
								<td width='50%' class='panel1'><label for='equipo'>Equipo*: </label></td>
								<td align='center' width='50%' class='panel1'><input id='equipo' type='text' name='equipo' class='input' value=\"".$sentencia[0][0]."\" /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' class='panel1'><label for='nombre'>Nombre*: </label></td>
								<td align='center' width='50%' class='panel1'><input id='nombre' type='text' name='nombre' class='input' value=\"".$sentencia[0][2]."\" /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' class='panel1'><label for='apellidos'>Apellidos*: </label></td>
								<td align='center' width='50%' class='panel1'><input id='apellidos' type='text' name='apellidos' class='input' value=\"".$sentencia[0][3]."\" /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' class='panel1'><label for='usuario'>Usuario*: </label></td>
								<td align='center' width='50%' class='panel1'><input id='usuario' type='text' name='usuario' class='input' value=\"".$sentencia[0][4]."\" /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' class='panel1'><label for='clave'>Contraseña*: </label></td>
								<td align='center' width='50%' class='panel1'><input id='clave' type='password' name='clave' class='input' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' class='panel1'><label for='repClave'>Repetir contraseña*: </label></td>
								<td align='center' width='50%' class='panel1'><input id='repClave' type='password' name='repClave' class='input' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' class='panel1'><label for='foto'>Foto: </label></td>
								<td align='center' width='50%' class='panel1'>Actual<br /><img id='picCoach' name='picCoach' src='img/users/".$sentencia[0][5]."' width='100' height='100' /><br /><input id='foto' type='file' name='foto' class='input' /></td>
							</tr>";
		$contenido.="		<tr>
								<td width='50%' colspan='2' class='panel3'>*Campos obligatorios</td>
							</tr>";
		
		$contenido.="		<tr>
								<td width='33%' class='bor-boton2'><input id='guardar' type='submit' name='guardar' class='input' value='Guardar' /></td>
								<td width='33%' class='bor-boton1'><input id='reset' type='reset' name='reset' class='input' value='Restablecer' /></td>
							</tr>";
		// Cerramos la tabla y el formulario
		$contenido.="	</table>
					</form>";
	}else{
		if(isset($_SERVER["HTTP_REFERER"])){
			header("Location: ".$_SERVER['HTTP_REFERER'].""); // Realizo una redirección
		}else{
			header("Location: index.php"); // Realizamos una redirección
		}
	}
	
	$pagina->setContent($contenido); // Pasamos el contenido de la página
	$pagina->getPagina(); // Obtenemos todo el contenido
?>