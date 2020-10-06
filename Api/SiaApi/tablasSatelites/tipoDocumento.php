<?php
//echo dirname( __FILE__ );
require_once (dirname(__DIR__).'/DatosTablasSatelite/datosTipoDocumento.php');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
      if(isset($_GET['id'])) {
      
          print_r(getTipoDocumentoId($_GET['id']));
      }else{
          print_r(getTipoDocumento());
      }
      break;
      case 'POST':
            $postBody = file_get_contents('php://input');
        
            $conver = json_decode($postBody,true);
    
    
            if (json_last_error()==0) {
               $ultimoId=setTipoDocumento($conver);  
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
               $ultimoId=putTipoDocumento($conver);  
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
               $ultimoId=deleteTipoDocumento($conver);  
               print_r(json_encode($ultimoId));
                 http_response_code(200);
            }else{
                http_response_code(400);
                
            }
        break;
}
?>
