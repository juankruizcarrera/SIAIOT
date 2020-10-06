<?php
//echo dirname( __FILE__ );
require_once (dirname(__DIR__).'/DatosTablasSatelite/datosTipoSuelo.php');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
      if(isset($_GET['id'])) {
      
          print_r(getTipoSueloId($_GET['id']));
      }else{
          print_r(getTipoSuelo());
      }
      break;
      case 'POST':
            $postBody = file_get_contents('php://input');
        
            $conver = json_decode($postBody,true);
    
    
            if (json_last_error()==0) {
               $ultimoId=setTipoSuelo($conver);  
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
               $ultimoId=putTipoSuelo($conver);  
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
               $ultimoId=deleteTipoSuelo($conver);  
               print_r(json_encode($ultimoId));
                 http_response_code(200);
            }else{
                http_response_code(400);
                
            }
        break;
}
?>
