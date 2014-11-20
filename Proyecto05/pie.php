<?php
class pie extends elemento{
	
	/*
	* Esta función muestra el pie de página
	*/
	function setPie(){
		$str="<hr /><center>&copy; Josep Puertas</center><hr />
		</body>
</html>";
		$this->setContenido($str);
	}
	
}
?>