<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Untitled Document</title>
	</head>
    
	<body>
	<?php
		//Definiendo un array
		//A lo burro
		$ciudades[]="Valencia";
		$ciudades[]="Barcelona";
		$ciudades[]="Madrid";
		
		//de forma ordenada
		$provincias[0]="Castellon";
		$provincias[1]="Alicante";
		$provincias[2]="Valencia";
		
		//con la función array()
		$comunidades[]=array("Cataluña","Comunidad Valenciana","Madrid");
		
		//Una vez creados los podemos mostrar
		foreach($ciudades as $valor){
			echo "Una ciudad es $valor<br>";
		}
		
		//tambien podemos definir los arrays con indices
		$capitales=array("España"=>"madrid","Francia"=>"paris","Italia"=>"roma");
		echo "La capital de España es $capitales[España]";
		
		//En este caso es muy interesante el foreach
		foreach($capitales as $índíce => $valor){
			echo "La capital de $índíce es $valor<br>";
		}
		
		//Multidimensionales
		$comunidades=array("Cataluña"=>array("Barcelona","Lérida","Tarragona","Gerona"),
		"Com Valenciana"=>array("Castellón","Alicante","Valencia"));
		foreach($comunidades as $índíce => $valor){
			foreach($valor as $provincia){
				echo "Una provincia de $índíce es $provincia<br>";
			}
		}
	?>
	</body>

</html>