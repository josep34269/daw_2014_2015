<?php
class arrays{
	
	private $comunidades,$capitales;
	
	function __construct(){
		$this->comunidades=array("Madrid"=>array("Madrid"),"Cataluña"=>array("Barcelona","Lérida","Tarragona","Gerona"),"Valencia"=>array("Valencia","Castellón","Alicante"));
		$this->capitales=array("Madrid"=>"Madrid","Cataluña"=>"Barcelona","Valencia"=>"Valencia");
	}
	
	public function imprimirComunidades(){
		echo $this->devuelveProvincias("Madrid");
		echo $this->devuelveProvincias("Barcelona");
		echo $this->devuelveProvincias("Valencia");
	}
	
	public function devuelveProvincias($comunidad){
		foreach($this->comunidades as $indice=>$valor){
			if($comunidad==$this->devuelveCapital($indice)){
				$mensaje="<b>&omicron; De la comunidad de ".$indice." la capital es: ".$this->devuelveCapital($indice).".</b><br />";
				$mensaje.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>- Provincias:</b><br />";
				foreach($valor as $provincia){
					$mensaje.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>- $provincia</i><br />";
				}
				$mensaje.="<br />";
			}
		}
		return $mensaje;
	}
	
	
	
	public function devuelveCapital($provincia){
		return $this->capitales[$provincia];
	}
	
}
?>