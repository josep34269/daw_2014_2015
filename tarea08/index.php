<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Pruebas</title>
	</head>
    <?php
		$colorR=0;
		$colorG=0;
		$colorB=0;
    ?>
	<body>
    	<table>
        	<?php
            	for($colorR;$colorR<=255;$colorR=$colorR+5){
			?>
        	<tr>
            	<td bgcolor="#<?php echo dechex($colorR); echo dechex($colorG); echo dechex($colorB); ?>">
                	#<?php echo dechex($colorR); echo dechex($colorG); echo dechex($colorB); ?>
                </td>
            </tr>
            <?php
					$colorG=$colorG+5;
					$colorB=$colorB+5;
				}
			?>
        </table>
	</body>
</html>