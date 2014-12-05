<?php
	require "pagina.php";
	
	$tituloPag="MODIFICAR LUGAR"; //Indicamos el título de la página
	$pagina=new pagina($tituloPag); //Instanciamos el objeto de página
	
	//Comprobamos que se le pasa el identificador
	if(isset($_GET["id"])){
		$sentencia=$pagina->funcionesDB("SELECT","TAREA03",array("lugar","poblacion","fecha"),array(),"id_lugar=".$_GET['id'].""); //Obtenemos los datos
		
		$contenido="<form id='modLugar' method='post' name='modLugar' action='modifLugar.php?id=".$_GET['id']."' onsubmit='return modificarLugar();'>";
		
		//Mostramos todo el contenido obtenido de la sentencia
		$contenido.="<tr>
			<td colspan='2' width='50%' class='panel1'><label for='id'>ID: </label></td>
			<td colspan='2' align='center' width='50%' class='panel1'><input id='id' type='text' name='id' class='input' value='".$_GET['id']."' disabled='disabled' /></td>
		</tr>";
		$contenido.="<tr>
			<td colspan='2' width='50%' class='panel1'><label for='lugar'>Lugar: </label></td>
			<td colspan='2' align='center' width='50%' class='panel1'><input id='lugar' type='text' name='lugar' class='input' value='".$sentencia[0][0]."' /></td>
		</tr>";
		$contenido.="<tr>
			<td colspan='2' width='50%' class='panel1'><label for='poblacion'>Población: </label></td>
			<td colspan='2' align='center' width='50%' class='panel1'><input id='poblacion' type='text' name='poblacion' class='input' value='".$sentencia[0][1]."' /></td>
		</tr>";
		$contenido.="<tr>
			<td colspan='2' width='50%' class='panel1'><label for='fecha'>Fecha: </label></td>
			<td colspan='2' align='center' width='50%' class='panel1'><input id='fecha' type='text' name='fecha' class='input' value='".$sentencia[0][2]."' /></td>
		</tr>";
		
		$contenido.="<tr>
			<td width='33%' class='bor-boton2'><input id='guardar' type='submit' name='guardar' class='input' value='Guardar' /></td>
       		<td width='33%' colspan='2' class='bor-boton3'><input id='reset' type='reset' name='reset' class='input' value='Restablecer' /></td>
       		<td width='33%' class='bor-boton1'><input id='cancelar' type='button' name='cancelar' class='input' value='Cancelar' onclick='location.href=\"lugares.php\";' /></td>
		</tr>";
		
		$contenido.="</form>"; //Cerramos el formulario
		
	}else{
		
		header("Location: lugares.php"); //Realizamos una redirección
		
	}
	
	$pagina->setContent($contenido,"SI"); //Pasamos el contenido de la página e indicamos si es una tabla
	$pagina->getPagina(); //Obtenemos todo el contenido
?>