<?php
require_once("db.php");

//Objeto base de datos
$db= new db("root","daw01","lugares");

//Conexion con la base de datos
$db->conectar_base_datos();
//vemos si el usuario y contraseña es váildo
if ($db->autenticar($_POST["usuario"],$_POST["contrasena"])) {
    //si no existe, envio a la página de autentificacion
	session_start();
    $_SESSION["autentificado"]= "SI";
    header ("Location:aplicacion.php");
}else {
    //si no existe le mando otra vez a la portada
    header("Location:index.php?errorusuario=si");
}
?> 