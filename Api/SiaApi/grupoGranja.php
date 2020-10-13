<?php
//echo dirname( __FILE__ );
require_once (dirname(__FILE__).'/Datos/datosGrupoGranja.php');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
          print_r(getGrupoGranja());
     
      break;  
  case 'POST':
        $postBody = file_get_contents('php://input');
    
        $conver = json_decode($postBody,true);


        if (json_last_error()==0) {
           $ultimoId=setGrupoGranja($conver);  
           print_r(json_encode($ultimoId));
             http_response_code(200);
        }else{
            http_response_code(400);
            
        }

    break;
}
?>
