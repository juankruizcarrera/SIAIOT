<?php
$nomGra=$_POST['nomGra'];
$ubiGra=$_POST['ubiGra'];
$idTipGraPer=$_POST['idTipGraPer'];
$url = 'http://localhost:8080/siaApi/granja.php';
$data = array('nomGra' => $nomGra, 'ubiGra' => $ubiGra, 'idTipGraPer' => $idTipGraPer, 'conUsu'=>$conUsu);
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);
 print_r(json_encode($data));
# Preparar petición
$contexto = stream_context_create($options);
# Hacerla
$resultado = file_get_contents($url, false, $contexto);
if ($resultado === false) {
    echo "Error haciendo petición";
    
    exit;
}
header("location:login.php");
# si no salimos allá arriba, todo va bien
var_dump($resultado);
?>