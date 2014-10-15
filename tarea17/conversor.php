<?php
/**
* Conversor de moneda
*
* Clase conversión de moneda que permite
* definir la moneda de cambio y realizar
* la conversión del cambio
*
* @author Paco Gómez
* @author http://es.linkedin.com/pub/paco-gomez-arnal/7/387/807/
*
* @version 1.0
*/
class conversor
{
	/**
	* array de la definición del tipo de monedas disponibles
	* 'eu'=>euro
	* 'do'=>dolar
	* @var array monedas
	* @access private
	*/
	private $monedas;
	/**
	* array los cambios numéricos
	* @var array cambios
	* @access private
	*/	
	private $valor_cambio;
	/**
	* tipo de moneda elegida desde el array monedas
	* 'eu'=>euro
	* 'do'=>dolar
	* @var moneda_from,moneda_to
	* @access private
	*/	
	private $moneda_from,$moneda_to;
	
	function __construct($moneda_from,$moneda_to){
		$this->moneda_from=$moneda_from;
		$this->moneda_to=$moneda_to;
	}
	/**
	* Conversión de moneda
	*
	* @param moneda_from moneda a convertir
	* @param moneda_to moneda destino
	* @return devuelve un valor float del valor convertido
	*/	
	function convertir($moneda_from,$moneda_to){
		
	}
	
}
?>