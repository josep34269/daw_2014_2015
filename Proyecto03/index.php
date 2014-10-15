    <?php
		require "pagina.php";
		
		$tituloPag="PÁGINA PRINCIPAL"; //Indicamos el título de la página
		$contenido="Contenido de la página principal";
		
		$pagina=new pagina();
		$pagina->setTituloPagina($tituloPag); //Pasamos como parametro el título de la página
		$pagina->setPagMenu(); //Cargamos el menú
		$pagina->setTextoContenido($contenido);
		$pagina->getPagina(); //Obtenemos todo el contenido
    ?>