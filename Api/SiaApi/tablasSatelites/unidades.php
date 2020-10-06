<?php
//echo dirname( __FILE__ );
require_once (dirname(__DIR__).'/DatosTablasSatelite/datosUnidades.php');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
      if(isset($_GET['id'])) {
      
          print_r(getUnidadesId($_GET['id']));
      }else{
          print_r(getUnidades());
      }
      break;
      case 'POST':
            $postBody = file_get_contents('php://input');
        
            $conver = json_decode($postBody,true);
    
    
            if (json_last_error()==0) {
               $ultimoId=setUnidades($conver);  
               print_r(json_encode($ultimoId));
                 http_response_code(200);
            }else{
                http_response_code(400);
                
            }
    
        break;
        case 'PUT':
            $postBody = file_get_contents('php://input');
        
            $conver = json_decode($postBody,true);
            if (json_last_error()==0) {
               $ultimoId=putUnidades($conver);  
               print_r(json_encode($ultimoId));
                 http_response_code(200);
            }else{
                http_response_code(400);
                
            }
               
        break;
        case 'DELETE':
            $postBody = file_get_contents('php://input');
        
            $conver = json_decode($postBody,true);
    
    
            if (json_last_error()==0) {
               $ultimoId=deleteUnidades($conver);  
               print_r(json_encode($ultimoId));
                 http_response_code(200);
            }else{
                http_response_code(400);
                
            }
        break;
}
?>
