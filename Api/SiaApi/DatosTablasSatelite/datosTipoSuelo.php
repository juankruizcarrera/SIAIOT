<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getTipoSuelo(){
    $Query = "select * from tiposuelo";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}

function getTipoSueloId($id){
    $Query = "select * from tiposuelo where idTipSue = $id";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
function setTipoSuelo($array){
    $nomTipSue = $array['nomTipSue'];
   
$Query = "insert into tiposuelo (nomTipSue) values('$nomTipSue')";

return InsertDeleteUpdate($Query);
}
function putTipoSuelo($array){
    $idTipSue = $array['idTipSue'];
    $nomTipSue = $array['nomTipSue'];
    $Query = "UPDATE tiposuelo SET nomTipSue = '$nomTipSue' WHERE idTipSue = $idTipSue ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteTipoSuelo($array){
    $idTipSue = $array['idTipSue'];
    $Query = "delete from tiposuelo where idTipSue = $idTipSue";
    return InsertDeleteUpdate($Query);
}

?>
