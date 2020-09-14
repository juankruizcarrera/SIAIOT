<?php 
$data = json_decode(file_get_contents("http://localhost:8080/apirestsia/usuarios"),true);

$usuario = $_POST["txtUsuario"];
$contrasenia=$_POST["txtPass"];


for($i=0;$i<count($data); $i++){
  echo $data[$i]["nomUsu"]."</br>";
}

?>