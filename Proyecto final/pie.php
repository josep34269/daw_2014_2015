<?php
class pie extends elemento{
	
	/*
	* Esta función muestra el pie de página
	*/
	function setPie(){
		$str="	<div style='width: 500px; height: 35px; text-align: center; left:38%;' class='footer'>
					<p class='fuente-pie'>&copy; Football Coach/Manager</p>
				</div>
			</body>
		</html>";
		$this->setContenido($str);
	}
	
}
?>