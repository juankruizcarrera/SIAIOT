
<?php
session_start();
if (isset($_SESSION["session_username"])) {
    // echo "La sesión está puesta"; // para testeo
    header("Location: dashboard");
}
$tipoGran = json_decode(file_get_contents("http://localhost:8080/SiaApi/tipoGranja.php"), true);
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['txtNom']) && isset($_GET['txtApe']) && isset($_GET['txtApe']) && isset($_GET['txtCorreo']) && isset($_GET['txtPass']) && isset($_GET['txtUbi']) && isset($_GET['tipoGranja'])) {
        $mensaje = "Bienvenido";

    } else {
        $mensaje = "Todos los campos son Obligatorios";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIA PLUS</title>
<link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<?php include "includes/referencias.php";?>

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM2eJylOzv5YDNnL-zryPIogSIksXd_kI&callback=initMap&libraries=drawing" defer ></script>
  <script src="assets/js/ubicacion.js"></script>
  
  
</head>
<body>

<div class=" login-page"  >

<div class="box">

    <div class="form-head">
        <h2>SIA PLUS</h2>
   </div>
   <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>

  <form method="post" id="regiration_form" novalidate>
 
    <div class="form-body" >
   
      <fieldset>
      <h2>Datos del Usuario</h2>
      
        <input type="text"  id="txtNom" name="txtNom" placeholder="NOMBRE(s)"/>
        <input type="text"  id="txtApe" name="txtApe" placeholder="APELLIDO(s)"/>
        <input type="text"  id="txtCorreo" name="txtCorreo" placeholder="CORREO"/>
        <input type="password" id="txtPass" name="txtPass" placeholder="CONTRASEÑA"/>
        
          <button type="button" name="next" class="next btn btn-info">Siguiente</button>
      </fieldset>

      <fieldset>
          <h2>Datos de la Granja</h2>
          <h4 >Marque la ubicación de la granja </h4>
          <div id="map"></div>
          <br>
          <input type="text"  id="nomGra" name="nomGra" placeholder="NOMBRE GRANJA"/>
          <select class="custom-select orderby" id="idTipGraPer"name="idTipGraPer" >
          <option selected > SELECCIONE TIPO GRANJA</option>
            <?php
             for($i=0;$i<count($tipoGran); $i++){
              ?> 
               <option  value="<?php echo $tipoGran[$i]["idTipGra"]; ?>"><?php echo $tipoGran[$i]["nomTipGra"]; ?></option>
            <?php
             } 
            ?>
          </select>
        
          <input type="hidden"  id="ubiGra" name="ubiGra"/>
         <br>
          <button   type="button"  name="previous" class="previous btn btn-default">Anterior</button>
          <button type="submit" name="" class=" btn btn-info">Guardar</button>
          </fieldset>

        
    </div>
    
  </form>

    </div>
  </div>
 
</body>
</html>

<script type="text/javascript">


$(document).ready(function(){
	var current = 1,current_step,next_step,steps;
	steps = $("fieldset").length;
	$(".next").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().next();
		next_step.show();
		current_step.hide();
		setProgressBar(++current);
	});
	$(".previous").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().prev();
		next_step.show();
		current_step.hide();
		setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width",percent+"%")
			.html(percent+"%");
	}
});


</script>
<?php 


if ($_POST['nomGra']!=""&& $_POST['ubiGra']!=""&&$_POST['idTipGraPer']!="") {
  $nomGra = $_POST['nomGra'];
  $ubiGra = $_POST['ubiGra'];
  $idTipGraPer = $_POST['idTipGraPer'];

	$url = "http://localhost:8080/siaApi/granja.php?nomGra=".$nomGra."&idTipGraPer=".$idTipGraPer."&ubiGra=".$ubiGra;
	
	$granja = curl_init($url);
	curl_setopt($granja,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($granja);
	
	$result = json_decode($response);
	
print_r($result);
}
?>