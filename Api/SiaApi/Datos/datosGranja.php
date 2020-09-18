<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getGranja(){
    $Query = "select * from granja";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}

function getGranjaId($id){
    $Query = "select * from granja where idGra = $id";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
function setUsuarios($UbiGra,$nomGra,$idTipGraPe){
$Query = "insert into granja(UbiGra,nomGra,idTipGraPer) values('$UbiGra','$nomGra',$idTipGraPe)";

return InsertDeleteUpdate($Query);
}
function putUsuarios($UbiGra,$nomGra,$idTipGraPe,$id){
    $Query = "UPDATE granja SET UbiGra = '$UbiGra', nomGra = '$nomGra', idTipGraPe = $idTipGraPe WHERE idGra =$id ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteUsuarios($id){
    $Query = "delete from granja where idGra = $id";
    return InsertDeleteUpdate($Query);
}

?>
