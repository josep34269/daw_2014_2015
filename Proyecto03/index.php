    <?php
		require "pagina.php";
		
		$tituloPag="PÁGINA PRINCIPAL"; //Indicamos el título de la página
		$valorMenu="INICIO"; //Valor del índice del menú
		$contenido="Contenido de la página principal"; //Indicamos el contenido de la página
		
		$pagina=new pagina($tituloPag,$valorMenu); //Pasamos el título de la página y el índice el menu
		$pagina->setTextoContenido($contenido); //Pasamos el contenido de la página
		$pagina->getPagina(); //Obtenemos todo el contenido
    ?>