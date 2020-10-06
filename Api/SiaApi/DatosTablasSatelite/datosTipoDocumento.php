<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getTipoDocumento(){
    $Query = "select * from tipodocumento";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}

function getTipoDocumentoId($id){
    $Query = "select * from tipodocumento where idTipDoc = $id";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
function setTipoDocumento($array){
    $idTipDoc = $array['idTipDoc'];
    $nomTipDoc = $array['nomTipDoc'];
   
$Query = "insert into tipodocumento(idTipDoc,nomTipDoc) values('$idTipDoc','$nomTipDoc')";

return InsertDeleteUpdate($Query);
}
function putTipoDocumento($array){
    $idTipDoc = $array['idTipDoc'];
    $nomTipDoc = $array['nomTipDoc'];
    $Query = "UPDATE tipodocumento SET nomTipDoc = '$nomTipDoc' WHERE idTipDoc = '$idTipDoc' ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteTipoDocumento($array){
    $idTipDoc = $array['idTipDoc'];
    $Query = "delete from tipodocumento where idTipDoc = '$idTipDoc'";
    return InsertDeleteUpdate($Query);
}

?>
