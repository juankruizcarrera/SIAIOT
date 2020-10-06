<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getAreaCultivo($idGraPer){
    $Query = "select * from areacultivo where idGraPer= $idGraPer";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}

function getAreaCultivoId($id,$idGraPer){
    $Query = "select * from areacultivo where idAreCul = $id and idGraPer=$idGraPer";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
function setAreaCultivo($array){
    $nomAre = $array['nomAre'];
    $ubiAreCul=$array['ubiAreCul'];
    $areAreCul = $array['areAreCul'];
    $obsAreCul = $array['obsAreCul'];
    $idGraPer = $array['idGraPer'];
    $idUniPer = $array['idUniPer'];
$Query = "insert into areacultivo (nomAre,ubiAreCul,areAreCul,obsAreCul,idGraPer,idUniPer) values('$nomAre','$ubiAreCul','$areAreCul','$obsAreCul',$idGraPer,'$idUniPer')";

return InsertDeleteUpdate($Query);
}
function putAreaCultivo($array){
    $id = $array['id'];
    $nomAre = $array['nomAre'];
    $ubiAreCul=$array['ubiAreCul'];
    $areAreCul = $array['areAreCul'];
    $obsAreCul = $array['obsAreCul'];
    $idGraPer = $array['idGraPer'];
    $idUniPer = $array['idUniPer'];
    $Query = "UPDATE areacultivo SET conAre = '$conAre', nomAre = '$nomAre', emaAre = '$emaAre', fecCreAre = '$fecCreAre', idGraPer = $idGraPer WHERE idAre =$id ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteAreaCultivo($array){
    $idAreCul = $array['idAreCul'];
    $Query = "delete from areacultivo where idAreCul = $idAreCul";
    return InsertDeleteUpdate($Query);
}

?>
