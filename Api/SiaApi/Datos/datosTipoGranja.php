<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getTipoGranja(){
    $Query = "select * from tipogranja";
    $Respuesta = ObtenerTipoGranja($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
?>