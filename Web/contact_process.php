<?php 
$destino = "xavier.canizares.95@gmail.com";
$nombre = $_POST["txtNombre"];
$asunto=$_POST["txtAsunto"];
$correo = $_POST["txtEmail"];
$mensaje = $_POST["txtMensaje"];


$contenido = "Nombre: " . $nombre .  "\n Correo: " . $correo . "\nMensaje: " . $mensaje;
$headers = "De: $correo";

mail($destino, $asunto,$contenido,$headers);
echo "El mensaje se ha enviado correctamente";
?>
      