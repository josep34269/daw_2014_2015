<?php
	require "pagina.php";
	
	$tituloPag="PERFIL"; //Indicamos el título de la página
	$pagina=new pagina($tituloPag); //Instanciamos el objeto de página
	
	//Comprobamos que se le pasa el identificador
	if(isset($_SESSION['usuario'])){
		
		$sentencia=$pagina->funcionesDB("SELECT","usuarios",array("id_usuario","nombre","apellidos","foto"),array(),"usuario='".$_SESSION['usuario']."'"); //Obtenemos los datos
		
		$contenido="<form id='modPerfil' method='post' name='modPerfil' action='modifPerfil.php?id=".$sentencia[0][0]."' enctype='multipart/form-data' onsubmit='return modificarPerfil();'>";
		
		//Mostramos todo el contenido obtenido de la sentencia
		$contenido.="<tr>
			<td width='50%' class='panel1'><label for='id'>ID: </label></td>
			<td align='center' width='50%' class='panel1'><input id='id' type='text' name='id' class='input' value='".$sentencia[0][0]."' disabled='disabled' /></td>
		</tr>";
		$contenido.="<tr>
			<td width='50%' class='panel1'><label for='nombre'>Nombre: </label></td>
			<td align='center' width='50%' class='panel1'><input id='nombre' type='text' name='nombre' class='input' value='".$sentencia[0][1]."' /></td>
		</tr>";
		$contenido.="<tr>
			<td width='50%' class='panel1'><label for='apellidos'>Apellidos: </label></td>
			<td align='center' width='50%' class='panel1'><input id='apellidos' type='text' name='apellidos' class='input' value='".$sentencia[0][2]."' /></td>
		</tr>";
		$contenido.="<tr>
			<td width='50%' class='panel1'><label for='foto'>Foto: </label></td>
			<td align='center' width='50%' class='panel1'>Actual<br /><img src='img/users/".$sentencia[0][3]."' width='100' height='100' /><br /><input id='foto' type='file' name='foto' class='input' /></td>
		</tr>";
		
		$contenido.="<tr>
			<td width='33%' class='bor-boton2'><input id='guardar' type='submit' name='guardar' class='input' value='Guardar' /></td>
      	 	<td width='33%' class='bor-boton1'><input id='reset' type='reset' name='reset' class='input' value='Restablecer' /></td>
		</tr>";
		
		$contenido.="</form>"; //Cerramos el formulario
	}else{
		if(isset($_SERVER["HTTP_REFERER"])){
			header("Location: ".$_SERVER['HTTP_REFERER'].""); //Realizo una redirección
		}else{
			header("Location: index.php"); //Realizamos una redirección
		}
	}
	
	$pagina->setContent($contenido,"SI"); //Pasamos el contenido de la página e indicamos si es una tabla
	$pagina->getPagina(); //Obtenemos todo el contenido
?>