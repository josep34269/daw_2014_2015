<?php
require_once "db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="form.css">
</head>

<body>
    <?php
	if(isset($_POST["nombre"])){
		$db=new db("root","daw01");
		$db->conectar_base_datos();
		$db->setLugar($_POST["nombre"],$_POST["descripcion"],$_POST["fecha"]);
	}
	?>
    <div>
    <form method="post" action="index.php">
        Lugar: 
        <br/><input type="text" pattern="[A-Za-z]{6}" name="nombre" required /><br/>
        <label for="name">Your Name</label>
        Descripción: 
         <br/><textarea class="form-control" rows="3" name="descripcion"></textarea><br />
        Fecha:
         <br/><input name="fecha" min="2012-01-01" max="2014-01-01" type="date"><br/>
         <br/><input type="submit" value="Enviar">
    </form>
</div>
</body>
</html>