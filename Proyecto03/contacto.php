    <?php
		require "pagina.php";
		
		$tituloPag="CONTACTO"; //Indicamos el título de la página
		$valorMenu="CONTACTO"; //Valor del índice del menú
		$contenido="Contenido de la página de contacto"; //Indicamos el contenido de la página
		
		$pagina=new pagina($tituloPag,$valorMenu); //Pasamos el título de la página y el índice el menu
		$pagina->setTextoContenido($contenido); //Pasamos el contenido de la página
		$pagina->getPagina(); //Obtenemos todo el contenido
    ?>