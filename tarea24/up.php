<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php
	if ($_FILES['archivo']["error"] > 0){
		echo "Error: " . $_FILES['archivo']['error'] . "<br>";
	}else{
		echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
		echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
		echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
		echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
	
		/*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
		move_uploaded_file($_FILES['archivo']['tmp_name'],"files/" . $_FILES['archivo']['name']);
	}
?>
</body>
</html>