
<?php 
session_start();
if(isset($_SESSION["session_username"])){
  // echo "La sesión está puesta"; // para testeo
  header("Location: dashboard");
  }
$tipoGran = json_decode(file_get_contents("http://localhost:8080/SiaApi/tipoGranja.php"),true);
$mensaje="";
if ($_SERVER['REQUEST_METHOD']=='GET') {
  if (isset($_GET['txtNom']) && isset($_GET['txtApe']) && isset($_GET['txtApe']) && isset($_GET['txtCorreo']) && isset($_GET['txtPass']) && isset($_GET['txtUbi']) && isset($_GET['tipoGranja']) ) {
    $mensaje="Bienvenido";
  
  }else{
    $mensaje="Todos los campos son Obligatorios";
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
<?php include("includes/referencias.php");?>
</head>
<body>
<section class="login-page">
  <form method="get">
    <div class="box">
      <div class="form-head">
        <h2>SIA PLUS</h2>
      </div>
      <div class="form-body">
        <input type="text"  id="txtNom" name="txtNom" placeholder="Nombre(s)"/>
        <input type="text"  id="txtApe" name="txtApe" placeholder="Apellido(s)"/>
        <input type="text"  id="txtCorreo" name="txtCorreo" placeholder="Correo"/>
        <input type="password" id="txtPass" name="txtPass" placeholder="Contraseña"/>
        <input type="text"  id="txtUbi" name="txtUbi" placeholder="País"/>
        <select class="combo custom-select" id="tipoGranja"name="tipoGranja" >
          <option selected>Tipo Granja</option>
            <?php
             for($i=0;$i<count($tipoGran); $i++){
              ?> 
               <option><?php echo $tipoGran[$i]["nomTipGra"]; ?></option>
            <?php
             } 
            ?>
           
            
          </select>
      
      </div>
      
      <div class="form-footer">
        <button type="submit">REGISTARSE</button>
      </div>
      
      <div class="form-footer">
        <label for=""><?php echo $mensaje ?></label>
      </div>
    </div>
  </form>
</section>
</body>
</html>
