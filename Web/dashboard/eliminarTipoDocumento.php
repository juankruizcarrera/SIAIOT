<?php
$url = 'http://localhost:8080/siaApi/tablasSatelites/tipoDocumento.php';
if (isset($_GET['idTipDoc'])) {
  $idSelecionado= $_GET['idTipDoc'];

  $datos = array('idTipDoc' => $idSelecionado);
  $options = array(
      'http' => array(
          'header'  => "Content-type: application/json\r\n",
          'method'  => 'DELETE',
          'content' => json_encode($datos),
      ),
  );
  
  # Preparar petición
  $contexto = stream_context_create($options);
  # Hacerla
  $resultado = file_get_contents($url, false, $contexto);
  if ($resultado === true) {
    header('Location: '.$_SERVER['PHP_SELF']);
    die;
   
  }
  
}else{
  print_r( 'no hay nada');
}

  ?>