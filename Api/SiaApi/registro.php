<?php
//echo dirname( __FILE__ );
require_once (dirname(__FILE__).'/Datos/datosRegistro.php');
switch ($_SERVER['REQUEST_METHOD']) {
  
      case 'POST':
       
           $postBody = file_get_contents('php://input');
        
        $conver = json_decode($postBody,true);


        if (json_last_error()==0) {
           $ultimoId=setRegistro($conver);  //todos los datos del registro 
           print_r(json_encode($ultimoId));
            http_response_code(200);
        }else{
            http_response_code(400);
            
        }

        break;
       
}
?>