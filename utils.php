<?php 
/**
* 
*/
class Utils 
{
	
	function __construct(argument)
	{
		# code...
	}

	static function log($valor){
		if(!file_exists('log')){
			mkdir('log', 0777);
		}
		$fecha = date('Ymd', time());
		$hora = date('H:i:s', time());

	    $fichero = "log/registro_{$fecha}.log";
	    file_put_contents($fichero, "{$hora} {$valor}". PHP_EOL, FILE_APPEND);	
	}
}
 ?>