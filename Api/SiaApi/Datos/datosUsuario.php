<?php

require_once dirname( __DIR__ ).'/Conexion/conexion.php';

function getUsuarios(){
    $Query = "select * from usuario";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}

function getUsuariosId($id){
    $Query = "select * from usuario where idUsu = $id";
    $Respuesta = Obtener($Query);
    return json_encode(ConvertirUTF8($Respuesta));
}
function setUsuarios($conUsu,$nomUsu,$emaUsu,$fecCreUsu,$idGraPer){
$Query = "insert into usuario(conUsu,nomUsu,emaUsu,fecCreUsu,idGraPer) values('$conUsu','$nomUsu','$emaUsu','$fecCreUsu',$idGraPer)";

return InsertDeleteUpdate($Query);
}
function putUsuarios($conUsu,$nomUsu,$emaUsu,$fecCreUsu,$idGraPer,$id){
    $Query = "UPDATE usuario SET conUsu = '$conUsu', nomUsu = '$nomUsu', emaUsu = '$emaUsu', fecCreUsu = '$fecCreUsu', idGraPer = $idGraPer WHERE idUsu =$id ";
    
    return InsertDeleteUpdate($Query);
    }
function deleteUsuarios($id){
    $Query = "delete from usuario where idUsu = $id";
    return InsertDeleteUpdate($Query);
}

?>
