<?php
//echo dirname( __FILE__ );
require_once (dirname(__FILE__).'/Datos/datosTipoGranja.php');
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
          print_r(getTipoGranja());
     
      break;  
}
?>
