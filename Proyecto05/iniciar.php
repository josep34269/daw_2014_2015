<?php
require_once "pagina.php";

if($_POST["usuario"]=="Josep" && $_POST["clave"]=="daw01"){
	
	session_start(); //Inicio la sesión
	$_SESSION["usuario"]="Josep"; //Asigno una variable a esta sesión
	header("Location: index.php"); //Realizo una redirección
	
}else{
	
	$tituloPag="ERROR"; //Indicamos el título de la página
	
	//Creamos la tabla
	$contenido="<table align='center' cellpadding='5'>
		<tr>
    		<td colspan='6' class='bor-titulo'><span class='titulo'>$tituloPag</span></td>
    	</tr>";
	
	//Indicamos el contenido de la página
	$contenido.="<tr>
		<td class='panel1'>Usuario o contraseña erróneos.</td>
	</tr>";
	
	$contenido.="</table>"; //Finaliza la creación de la tabla
		
}

$pagina=new pagina(); //Instanciamos el objeto de página
$pagina->setContenido($contenido); //Pasamos el contenido de la página
$pagina->getPagina(); //Obtenemos todo el contenido
?>