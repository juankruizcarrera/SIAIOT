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
function setGranja($array){

        $nomGra= $array['nomGra'];
        $ubiGra=$array['ubiGra'];
        $idTipGraPer=$array['idTipGraPer'];
 
  
   
$Query = "insert into granja(ubiGra,nomGra,idTipGraPer) values('$ubiGra','$nomGra',$idTipGraPer)";

return InsertDeleteUpdate($Query);
}
function putGranja($array){
    $id=$array['id'];
    $nomGra= $array['nomGra'];
    $ubiGra=$array['ubiGra'];
    $idTipGraPer=$array['idTipGraPer'];
    $Query = "UPDATE granja SET ubiGra = '$ubiGra', nomGra = '$nomGra', idTipGraPer = $idTipGraPer WHERE idGra =$id ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteGranja($array){
    $id=$array['id'];
    $Query = "delete from granja where idGra = $id";
    return InsertDeleteUpdate($Query);
}

?>
