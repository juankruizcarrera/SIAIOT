<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getGrupoGranja(){
    $Query = "select * from grupogranja";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
function setGrupoGranja($array){
    $nomGruGra = $array['nomGruGra'];
    $obsGruGra=$array['obsGruGra'];
    $fecCreGruGra = date('d-m-Y H:i:s');
    $idEstPer= 1;//activo
$Query = "insert into grupogranja (nomGruGra,fecCreGruGra,obsGruGra,idEstPer) values('$nomGruGra','$fecCreGruGra','$obsGruGra',$idEstPer)";

return InsertDeleteUpdate($Query);
}
?>