<?php
require_once "pagina.php";

$pagina=new pagina(""); //Instanciamos el objeto de página

//Comprobamos que se le pasan los valores
if(isset($_POST["usuario"]) && isset($_POST["clave"])){
	$usuario=$_POST["usuario"];
	$clave=md5($_POST["clave"]);
	
	$sentencia=$pagina->funcionesDB("SELECT","usuarios",array("COUNT(*)"),array(),"usuario='".$usuario."' AND password='".$clave."'"); //Obtenemos los datos
}

//Si existe el usuario con los datos introducidos iniciamos las sesión
if(isset($usuario) && isset($clave) && $sentencia[0][0]>0){
	
	//Si tiene valor la cookie la borramos
	if(isset($_COOKIE["errorIniciar"])){
		unset($_COOKIE["errorIniciar"]);
		setcookie("errorIniciar",0,time()-60);
	}
	
	$_SESSION["usuario"]=$usuario; //Asigno una variable a esta sesión
	
	if(isset($_SERVER["HTTP_REFERER"]) && end(explode("/",$_SERVER["HTTP_REFERER"]))!="error.php"){
		header("Location: ".$_SERVER['HTTP_REFERER'].""); //Realizo una redirección
	}else{
		header("Location: index.php"); //Realizamos una redirección
	}
	
}else{
	
	//Comprobamos si existe la cookie
	if(!isset($_COOKIE["errorIniciar"])){
		//Le damos a la cookie una validez de 2 minutos
		setcookie("errorIniciar",1,time()+60*2);
	}else{
		//Le damos a la cookie una validez de 2 minutos
		setcookie("errorIniciar",$_COOKIE["errorIniciar"]+1,time()+60*2);
		
		//Comprobamos si se ha alcanzado el número máximo de intentos
		if(isset($_COOKIE["errorIniciar"]) && $_COOKIE["errorIniciar"]>=2){
			//Le damos a la cookie una validez de 2 minutos
			setcookie("tiempoEspera",0,time()+60*2);
		}
	}
	
	header("Location: error.php"); //Realizo una redirección
	
}
?>