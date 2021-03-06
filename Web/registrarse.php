
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



<?php include "includes/referencias.php";?>

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM2eJylOzv5YDNnL-zryPIogSIksXd_kI&callback=initMap&libraries=drawing" defer ></script>
  <script src="assets/js/ubicacion.js"></script>
 
<script>
$(document).ready(function(){
$('#myModal').modal('toggle')
});

</script>

</head>
<body>


 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLongTitle">Grupo de Granja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
   <form method="post">
      <h4>Si el grupo ya existe no es necesario que lo cree</h4>
        <div class="form-group">
        <label for="nomGruGra" class="col-form-label">Nombre del Grupo:</label>
        <input style="color:#000000; border-color:rgb(150, 152, 154);border-radius: 20px;" type="text" class="form-control" id="nomGruGra" name="nomGruGra" />
        </div>
        <div class=" form-group">
        <label for="obsGruGra" class="col-form-label">Observaciones:</label>
        <textarea style="color:#000000;border-color:rgb(150, 152, 154);border-radius: 20px;" class="form-control" id="obsGruGra" name="obsGruGra"> </textarea>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Omitir</button>
        <button type="submit" class="btn btn-primary"   onclick="submit_GrupoGranja()">Crear</button>
        <div id="json_response"></div>
      </div>
      </form>
        
    
     
      </div>
    </div>
  </div>
</div>

<div class=" register-page">

<div class="box">

    <div class="form-head">
        <h2>SIA PLUS</h2>
   </div>
   <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>

  <form  id="regiration_form" method="post"  action="registro.php" novalidate>
 
    <div class="form-body" >
   
      <fieldset>
      
          <h2>Datos de la Granja</h2>
          <h4 >Mueva el marcador en la ubicación de la granja </h4>
          <div id="map"></div>
          <br>
          <select class="custom-select orderby" id="idGruGraPer"name="idGruGraPer" required >
          <option selected >SELECCIONE AL GRUPO QUE PERTENECE </option>
            <?php
            $grupoGranja= json_decode(file_get_contents("http://localhost:8080/SiaApi/grupoGranja.php"), true);
             for($i=0;$i<count($grupoGranja); $i++){
              ?> 
               <option  value="<?php echo $grupoGranja[$i]["idGruGra"]; ?>"><?php echo $grupoGranja[$i]["nomGruGra"]; ?></option>
            <?php
             } 
            ?>
          </select>
          <input type="text"  id="nomGra" name="nomGra" placeholder="NOMBRE GRANJA" required/>
          <select class="custom-select orderby" id="idTipGraPer"name="idTipGraPer" required >
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
          
          <button type="button" name="next" class="next btn btn-info">Siguiente</button>
          </fieldset>

          <fieldset>
      <h2>Datos del Usuario</h2>
      
        <input type="text"  id="nomUsu" name="nomUsu" placeholder="NOMBRE(s)" required/>
        <input type="text"  id="apeUsu" name="apeUsu" placeholder="APELLIDO(s)" />
        <input type="text"  id="emaUsu" name="emaUsu" placeholder="CORREO" />
        <input type="password" id="conUsu" name="conUsu" placeholder="CONTRASEÑA" />
        <input type="password" id="cfmPassword" name="cfmPassword" placeholder="REPETIR CONTRASEÑA" />
        
        <button   type="button"  name="previous" class="previous btn btn-default">Anterior</button>
          <button type="submit" name="" class=" btn btn-info" >Guardar</button>
      </fieldset>
    </div>
    
  </form>
  <div id="json_response"></div>
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

<script>
	  function submit_GrupoGranja(){
		var nomGruGra=$("#nomGruGra").val();
		var obsGruGra=$("#obsGruGra").val();
		$.post("guardarGrupoGranja.php",{nomGruGra:nomGruGra,obsGruGra:obsGruGra},
    function(data){
		  $("#json_response").html(data);
		});
	}

  </script>


