<?php
//echo dirname( __FILE__ );
require_once (dirname(__FILE__).'/Datos/datosAreaCultivo.php');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
      if(isset($_GET['id'])&&isset($_GET['idGraPer'])) {
      
          print_r(getAreaCultivoId($_GET['id'],$_GET['idGraPer']));
      }else{
          print_r(getAreaCultivo($_GET['idGraPer']));
      }
      break;
      case 'POST':
            $postBody = file_get_contents('php://input');
        
            $conver = json_decode($postBody,true);
    
    
            if (json_last_error()==0) {
               $ultimoId=setAreaCultivo($conver);  
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
               $ultimoId=putAreaCultivo($conver);  
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
               $ultimoId=deleteAreaCultivo($conver);  
               print_r(json_encode($ultimoId));
                 http_response_code(200);
            }else{
                http_response_code(400);
                
            }
        break;
}
?>
