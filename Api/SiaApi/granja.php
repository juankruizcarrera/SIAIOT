<?php
//echo dirname( __FILE__ );
require_once (dirname(__FILE__).'/Datos/datosGranja.php');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
      if(isset($_GET['id'])) {
      
          print_r(getGranjaId($_GET['id']));
      }else{
          print_r(getGranja());
      }
      break;
      case 'POST':
        
            $conUsu = $_GET['conUsu'];
            $nomUsu = $_GET['nomUsu'];
            $emaUsu = $_GET['emaUsu'];
            $fecCreUsu = $_GET['fecCreUsu'];
            $idGraPer = $_GET['idGraPer'];
            $var = setGranja($conUsu,$nomUsu,$emaUsu,$fecCreUsu,$idGraPer);
           if ($var>0) {
            echo "successful";
           }else {
            echo "No se guardo ";
           }
        break;
        case 'PUT':
            $id = $_GET['id'];
            $conUsu = $_GET['conUsu'];
            $nomUsu = $_GET['nomUsu'];
            $emaUsu = $_GET['emaUsu'];
            $fecCreUsu = $_GET['fecCreUsu'];
            $idGraPer = $_GET['idGraPer'];
            $var = putGranja($conUsu,$nomUsu,$emaUsu,$fecCreUsu,$idGraPer,$id);
           if ($var>0) {
            echo "successful";
           }else {
            echo "No se Actualizo ";
           }
               
        break;
        case 'DELETE':
            if(isset($_GET['id'])) {
                $var = deleteUsuarios($_GET['id']);
                if ($var>0) {
                    echo "successful";
                   }else {
                    echo "No se elimino ";
                   }
            }
        break;
}
?>