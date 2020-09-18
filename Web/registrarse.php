
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
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBM2eJylOzv5YDNnL-zryPIogSIksXd_kI&callback=initMap" defer></script>
<?php include "includes/referencias.php";?>
<style type="text/css">

  #map {
        height: 100%;
      }
  </style>
  
</head>
<body>

<div class=" login-page" >
<div class="box">
    <div class="form-head">
        <h2>SIA PLUS</h2>
   </div>
   <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
  <form method="get" id="regiration_form" novalidate>

    <div class="form-body">
      <fieldset>
      <h2>Datos del Usuario</h2>
        <input type="text"  id="txtNom" name="txtNom" placeholder="Nombre(s)"/>
        <input type="text"  id="txtApe" name="txtApe" placeholder="Apellido(s)"/>
        <input type="text"  id="txtCorreo" name="txtCorreo" placeholder="Correo"/>
        <input type="password" id="txtPass" name="txtPass" placeholder="Contraseña"/>
        
          <button type="button" name="next" class="next btn btn-info">Siguiente</button>
      </fieldset>

      <fieldset>
          <h2>Datos de la Granja</h2>
          <h2>Ubicacion </h2>
          <div id="map"></div>
          
          <select class="custom-select" id="tipoGranja"name="tipoGranja" >
          <option selected>Tipo Granja</option>
            <?php
             for($i=0;$i<count($tipoGran); $i++){
              ?> 
               <option><?php echo $tipoGran[$i]["nomTipGra"]; ?></option>
            <?php
             } 
            ?>
          </select>
         <br>
          <button   type="button"  name="previous" class="previous btn btn-default">Anterior</button>
          <button type="submit" name="next" class=" btn btn-info">Guardar</button>
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
//mapa 

</script>
<script>

       var marker; 
initMap = function() {
   navigator.geolocation.getCurrentPosition(
    function(position) {
      coords = {
        lng: position.coords.longitude,
        lat: position.coords.latitude
      };
      setMapa(coords);  
           
    },
    function(error) {
      console.log(error);
    });

}

function setMapa(coords) {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 20,
    center: new google.maps.LatLng(coords.lat, coords.lng),

  });

  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: new google.maps.LatLng(coords.lat, coords.lng),

  });
 
  marker.addListener('click', toggleBounce);

  marker.addListener('dragend', function(event) {
    
    document.getElementById("campoLatitud").value = this.getPosition().lat();
    document.getElementById("campoLongitud").value = this.getPosition().lng();
  });
}


function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}


    </script>