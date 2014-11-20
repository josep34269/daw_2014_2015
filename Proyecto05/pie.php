<?php
class pie extends elemento{
	
	/*
	* Esta función muestra el pie de página
	*/
	function setPie(){
		$str="<br />
		<hr /><span class='footer'>&copy; Josep Puertas</span></center><hr />
	</body>
</html>";
		$this->setContenido($str);
	}
	
}
?>