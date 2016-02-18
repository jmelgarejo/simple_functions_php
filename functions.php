<?php 
    /**
     * creao un archivo de log o agrega una linea a uno ya existente
     * la linea contiene la hora y fecha del servidor y el valor pasado por parametro
     *
     * @param $valor string
     * @return void
     */

function simple_log($valor){
    if(!file_exists('log')){
        mkdir('log', 0777);
    }
    $fecha = date('Ymd', time());
    $hora = date('H:i:s', time());

    $fichero = "log/registro_{$fecha}.log";
    file_put_contents($fichero, "{$hora} {$valor}". PHP_EOL, FILE_APPEND);  
}

    /**
     * verifica si el parametro rut es valido
     * en formato 99.999.999-A, 99999999-A o 99999999A 
     *
     * @param $rut string
     * @return boolean
     */

function validaRut($rut){
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
 ?>