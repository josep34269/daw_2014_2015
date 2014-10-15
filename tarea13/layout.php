<?php
	class layout{
		
		public $titulo="Título de la página";
		private $server="";
		
		function __construct(){
			$this->server=$_SERVER["HTTP_USER_AGENT"];
		}
		
		function getCabecera(){
			return $this->titulo;
		}
		
		function getPie(){
			return $this->server;
		}
		
	}
?>