	<?php
		if(isset($_GET["errorusuario"])){
			if($_GET["errorusuario"]=="si")
			{
				if(!isset($_COOKIE["errores"])){
					setcookie("errores",0,time()+60);
				}else{
					setcookie("errores",$_COOKIE["errores"]+1,time()+60);
				}
			}
		}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AUTENTICACION DE USUARIO</title>
</head>

<body>
	<?php
		if(isset($_GET["errorusuario"])){
			if($_GET["errorusuario"]=="si")
			{
					echo "<h3 color='#aa0000'>Usuario y contraseña erroneos. Dale otra oportunidad</h3>";
				if(isset($_COOKIE["errores"])){
					echo "<h3 color='#aa0000'>".$_COOKIE["errores"]." veces</h3>";
				}
			}
		}
	?>
    <form action="control.php" method="POST">
        <table align="center" width="225" cellspacing="2" cellpadding="2" border="0">
        	<tr>
        		<td colspan="2" align="center">
                </td>
        	</tr>
        	<tr>
        		<td align="right">USER:</td>
        		<td><input type="Text" name="usuario" size="8" maxlength="50"></td>
        	</tr>
        	<tr>
        		<td align="right">PASSWD:</td>
        		<td><input type="password" name="contrasena" size="8" maxlength="50"></td>
        	</tr>
        	<tr>
        		<td colspan="2" align="center"><input type="Submit" value="ENTRAR"></td>
        	</tr>
        </table>
    </form> 
</body>
</html>
