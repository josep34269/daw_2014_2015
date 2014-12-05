<?php
require_once "pagina.php";

$tituloPag="ERROR"; //Indicamos el título de la página
$pagina=new pagina($tituloPag); //Instanciamos el objeto de página

$contenido=""; //Iniciaizamos el contenido en blanco

//Comprobamos si tiene un valor la cookie
if(isset($_COOKIE["errorIniciar"])){
	$contenido.="Se ha introducido mal el usuario o la contraseña ".$_COOKIE["errorIniciar"]." ";
	if($_COOKIE["errorIniciar"]==1){
		$contenido.="vez<br />";
	}else{
		$contenido.="veces<br />";
	}
}

//Comprobamos si provenimos de otra pagina
if(!isset($_SERVER["HTTP_REFERER"]) && !isset($_COOKIE["errorIniciar"])){
	$contenido.="Página donde se muestran los errores"; //Indicamos el contenido de la página
}

$pagina->setContent($contenido,"NO"); //Pasamos el contenido de la página e indicamos si es una tabla
$pagina->getPagina(); //Obtenemos todo el contenido
?>