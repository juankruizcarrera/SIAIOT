
<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function setRegistro($array){
    $nomGra= $array['nomGra'];
    $ubiGra=$array['ubiGra'];
    $idTipGraPer=$array['idTipGraPer'];
    $idGruGraPer=$array['idGruGraPer'];
$Query = "insert into granja(ubiGra,nomGra,idTipGraPer,idGruGraPer) values('$ubiGra','$nomGra',$idTipGraPer,$idGruGraPer)";

$idGraPer = InsertDeleteUpdate($Query);

$conUsu = $array['conUsu'];
$nomUsu = $array['nomUsu'];
$emaUsu = $array['emaUsu'];
$fecCreUsu = date('d-m-Y H:i:s');
$idPerPer=$array['idPerPer'];
$Query2 = "insert into usuario (conUsu,nomUsu,emaUsu,fecCreUsu,idGraPer,idPerPer) values('$conUsu','$nomUsu','$emaUsu','$fecCreUsu',$idGraPer,$idPerPer)";

return InsertDeleteUpdate($Query2);
}

?>
