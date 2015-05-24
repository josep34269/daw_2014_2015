<?php
require_once "pagina.php";

$pagina=new pagina(); // Instanciamos el objeto de página

// Comprobamos si tiene un valor la cookie
if(isset($_COOKIE["errorIniciar"])){
	// Iniciamos la tabla
	$contenido="<table align='center' cellpadding='5'>
					<tr>
    					<td class='bor-titulo'><span class='titulo'>ERROR</span></td>
    				</tr>";
					
	// Indicamos el contenido de la página	
	$contenido.="	<tr>
						<td class='panel1'>Se ha introducido mal el usuario o la contraseña ".$_COOKIE["errorIniciar"]." ";
	
	if($_COOKIE["errorIniciar"]==1){
		$contenido.="vez.</td>
					</tr>";
	}else{
		$contenido.="veces.</td>
					</tr>";
	}
	
	$contenido.="</table>"; // Cerramos la tabla
}

// Comprobamos si provenimos de otra pagina
if(!isset($_SERVER["HTTP_REFERER"]) && !isset($_COOKIE["errorIniciar"])){
	// Iniciamos la tabla
	$contenido="<table align='center' cellpadding='5'>
					<tr>
    					<td class='bor-titulo'><span class='titulo'>ERROR</span></td>
    				</tr>";
					
	// Indicamos el contenido de la página
	$contenido.="	<tr>
						<td class='panel1'>Página donde se muestran los errores.</td>
					</tr>";
	
	$contenido.="</table>"; // Cerramos la tabla
}

$pagina->setContent($contenido); // Pasamos el contenido de la página
$pagina->getPagina(); // Obtenemos todo el contenido
?>