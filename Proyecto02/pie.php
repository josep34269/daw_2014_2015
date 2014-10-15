<?php
require_once "elemento.php";

class pie extends elemento{
	
	function setPie(){
		$str="";
		$str="<hr /><center>&copy; Josep Puertas</center><hr />
		</body>
</html>";
		$this->setContenido($str);
	}
	
}
?>