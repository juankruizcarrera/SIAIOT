<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getUnidades(){
    $Query = "select * from unidades";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}

function getUnidadesId($id){
    $Query = "select * from unidades where idUni = $id";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
function setUnidades($array){
    $nomTipSue = $array['nomUni'];
   
$Query = "insert into unidades (nomUni) values('$nomUni')";

return InsertDeleteUpdate($Query);
}
function putUnidades($array){
    $idUni = $array['idUni'];
    $nomUni = $array['nomUni'];
    $Query = "UPDATE unidades SET nomUni = '$nomUni' WHERE idUni = $idUni ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteUnidades($array){
    $idUni = $array['idUni'];
    $Query = "delete from unidades where idUni = $idUni";
    return InsertDeleteUpdate($Query);
}

?>
