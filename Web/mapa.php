<?php
$captura='';
if(!isset($_GET['variable'])){
    $captura='No';
}
?>
<body onload="parametro(<?php echo $captura; ?>) ">

<script>
function parametro(captura){
    var miVariable = "Hola Mundo"; 
    if(captura=='No'){
         window.location.href = window.location.href + "?variable=" + miVariable ;
    }    
}                   
</script> 
<?php
    $datos = $_GET['variable'];
    echo $datos;
?>
</body>