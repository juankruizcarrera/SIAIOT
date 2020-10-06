<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getGrupoGranja(){
    $Query = "select * from grupogranja";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
?>