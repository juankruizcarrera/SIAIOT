
 <?php
 if (isset($_POST['nomGruGra'])&&isset($_POST['obsGruGra']) ) {
    $url = 'http://localhost:8080/siaApi/grupoGranja.php';
    $nomGruGra=$_POST['nomGruGra'];
     $obsGruGra=$_POST['obsGruGra'];
     $data = array('nomGruGra' => $nomGruGra,'obsGruGra'=> $obsGruGra);
     $options = array(
         'http' => array(
             'header'  => "Content-type: application/json\r\n",
             'method'  => 'POST',
             'content' => json_encode($data),
         ),
     );
     
     # Preparar petición
     $contexto = stream_context_create($options);
     # Hacerla
     $resultado = file_get_contents($url, false, $contexto);
    
      
     }
    
     ?>