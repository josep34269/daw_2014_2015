    <?php
		require "pagina.php";
		
		//Declaramos en inicializamos las variables
		$tituloPag="";
		$numeroPag=0;
		$numeroCol=0;
		$numeroFil=0;
		$numeroColFil=null;
		
		//Si está declarada la variable entra en este IF
		if(isset($_GET["pagina"])){
			
			//Según el número de página indicado en la URL muestra un contenido u otro
			if(basename($_GET["pagina"])==1){
				
				$tituloPag="PÁGINA 1"; //Indicamos el título de la página
				$numeroColFil=array("col"=>2,"fil"=>1); //Indicamos el número de columnas y filas
				
			}else if(basename($_GET["pagina"])==2){
				
				$tituloPag="PÁGINA 2"; //Indicamos el título de la página
				$numeroColFil=array("col"=>2,"fil"=>2); //Indicamos el número de columnas y filas
				
			}else if(basename($_GET["pagina"])==3){
				
				$tituloPag="PÁGINA 3"; //Indicamos el título de la página
				$numeroColFil=array("col"=>2,"fil"=>3); //Indicamos el número de columnas y filas
				
			}
			
		}else{
			
			$tituloPag="PÁGINA PRINCIPAL"; //Indicamos el título de la página
			
			//Indicamos el número de columnas y filas a mostrar
			$numeroColFil=array("col"=>4,"fil"=>1);
			
		}
		
		$pagina=new pagina();
		$pagina->setTituloPagina($tituloPag);
		$pagina->setNumPaginas(3); //Indicamos el número de páginas
		$pagina->setNumColFil($numeroColFil["col"],$numeroColFil["fil"]); //Indicamos el número de imágenes a mostrar (columnas,filas)
		$pagina->getPagina(); //Obtenemos todo el contenido
    ?>