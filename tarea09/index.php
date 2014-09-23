<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Pruebas</title>
	</head>
	<body>
		<h3>DÍA MES</h3>
        <?php
			$diaMes=date("d");
        	$diaSemana=date("w");
			if($diaMes<=15){
				echo "Primera quincena";
			}else{
				echo "Segunda quincena";
			}
		?>
        <h3>DÍA MES</h3>
        <?php
			if($diaSemana==0){
				echo "El día es Domingo";
			}else if($diaSemana==1){
				echo "El día es Lunes";
			}else if($diaSemana==2){
				echo "El día es Martes";
			}else if($diaSemana==3){
				echo "El día es Miércoles";
			}else if($diaSemana==4){
				echo "El día es Jueves";
			}else if($diaSemana==5){
				echo "El día es Viernes";
			}else if($diaSemana==6){
				echo "El día es Sábado";
			}
		?>
    </body>
</html>