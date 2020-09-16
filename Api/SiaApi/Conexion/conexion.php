<?php

$server ="localhost";
$user ="root";
$pswd ="";
$database="sia";
$port="3306";

//conexion

$conexion = new mysqli($server,$user,$pswd,$database,$port);
if($conexion -> connect_errno){
    die($conexion -> connect_error);
}


//metodos
function ObtenerUsuarios($sqlstr, $conexion = null){
    if(!$conexion)global $conexion;
    $result = $conexion ->query($sqlstr);
    $resulArray = array();
    foreach( $result as $registros ){
    $resulArray[] = $registros;
    }
    return $resulArray;
    
}
function InsertDeleteUpdate($sqlstr, $conexion = null){
    if(!$conexion)global $conexion;
    $result = $conexion ->query($sqlstr);
    return $conexion -> affected_rows;
   
    }

//tipo de granja 
function ObtenerTipoGranja($sqlstr, $conexion = null){
    if(!$conexion)global $conexion;
    $result = $conexion ->query($sqlstr);
    $resulArray = array();
    foreach( $result as $registros ){
    $resulArray[] = $registros;
    }
    return $resulArray;
    
}

//transforma a utf-8
function ConvertirUTF8($array){

    array_walk_recursive($array, function(&$item,$key){
    if(!mb_detect_encoding($item, 'utf-8',true)) {
        $item = utf8_encode($item);
        }
    });
    return $array;
}

