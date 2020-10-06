setRegistro
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
function setRegistro($array){
    $nomGra= $array['nomGra'];
    $ubiGra=$array['ubiGra'];
    $idTipGraPer=$array['idTipGraPer'];
   
$Query = "insert into granja(ubiGra,nomGra,idTipGraPer) values('$ubiGra','$nomGra',$idTipGraPer)";

$idGraPer = InsertDeleteUpdate($Query);

$conUsu = $array['conUsu'];
$nomUsu = $array['nomUsu'];
$emaUsu = $array['emaUsu'];
$fecCreUsu = $array['fecCreUsu'];

$Query2 = "insert into usuario(conUsu,nomUsu,emaUsu,fecCreUsu,idGraPer) values('$conUsu','$nomUsu','$emaUsu','$fecCreUsu',$idGraPer)";

return InsertDeleteUpdate($Query2);
}
function putGranja($data){
  
    $Query = "UPDATE granja SET UbiGra = '$UbiGra', nomGra = '$nomGra', idTipGraPe = $idTipGraPe WHERE idGra =$id ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteGranja($id){
    $Query = "delete from granja where idGra = $id";
    return InsertDeleteUpdate($Query);
}

?>
