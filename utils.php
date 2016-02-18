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

	static function simple_log($valor){
		if(!file_exists('log')){
			mkdir('log', 0777);
		}
		$fecha = date('Ymd', time());
		$hora = date('H:i:s', time());

	    $fichero = "log/registro_{$fecha}.log";
	    file_put_contents($fichero, "{$hora} {$valor}". PHP_EOL, FILE_APPEND);	
	}

	static function validaRut($rut){
	    $temp_rut = str_replace(".", "",trim($rut));
	    $RUT = explode("-", $temp_rut);
	    $RUT = ($RUT[0]==$temp_rut)?array(substr($temp_rut, 0, -1), substr($temp_rut,-1) ):$RUT;
	    $factor = 2;
	    $suma=0;
	    for($i = strlen($RUT[0])-1; $i >= 0; $i--){
	        $factor = $factor > 7 ? 2 : $factor;
	        $suma += $RUT[0][$i]*$factor++;
	    }
	    $dv = 11 - ($suma % 11);
	    $dv = ($dv == 11)?0:($dv == 10)?"k":$dv;
	    return ($dv == trim(strtolower($RUT[1])));
	}	
}
 ?>