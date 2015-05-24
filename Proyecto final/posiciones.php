<select id="posicion" name="posicion" class="input">
	<?php
	require "pagina.php";
	
	$page=new pagina(); // Insatanciamos la página
	
	$sentenciaPosi=$page->funcionesDB("SELECT", "Posicion_Jugadores", array("id_posicion","nombre"), array(), "id_tipo='".$_POST['tipo']."' ORDER BY nombre");
	// Obtenemos las posiciones de los jugadores
    for($posi=0;$posi<count($sentenciaPosi);$posi++){
	?>
    	<option value="<?php echo $sentenciaPosi[$posi][0]; ?>"><?php echo $sentenciaPosi[$posi][1]; ?></option>
	<?php
    }
	?>
</select>