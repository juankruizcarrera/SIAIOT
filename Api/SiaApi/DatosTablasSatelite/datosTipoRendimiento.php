<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getTipoRendimiento(){
    $Query = "select * from tiporendimiento";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}

function getTipoRendimientoId($id){
    $Query = "select * from tiporendimiento where idTipRen = $id";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
function setTipoRendimiento($array){
    $nomTipRen = $array['nomTipRen'];
   
$Query = "insert into tiporendimiento (nomTipRen) values('$nomTipRen')";

return InsertDeleteUpdate($Query);
}
function putTipoRendimiento($array){
    $idTipRen = $array['idTipRen'];
    $nomTipRen = $array['nomTipRen'];
    $Query = "UPDATE tiporendimiento SET nomTipRen = '$nomTipRen' WHERE idTipRen = $idTipRen ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteTipoRendimiento($array){
    $idTipRen = $array['idTipRen'];
    $Query = "delete from tiporendimiento where idTipRen = $idTipRen";
    return InsertDeleteUpdate($Query);
}

?>
