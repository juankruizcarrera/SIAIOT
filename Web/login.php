
<?php 
session_start();
if(isset($_SESSION["session_username"])){
  // echo "La sesión está puesta"; // para testeo
  header("Location: dashboard");
  }

$mensaje="";

if (isset($_GET['txtUsuario']) && isset($_GET['txtPass'])) {
  $data = json_decode(file_get_contents("http://localhost:8080/SiaApi/usuario.php"),true);
  $cont=$_GET['txtPass'];
  $usu=$_GET['txtUsuario'];


  for($i=0;$i<count($data); $i++){
    
    if ($data[$i]["conUsu"]==$cont && $data[$i]["emaUsu"]==$usu ) {
    
      $_SESSION['session_username']=$data[$i]["idUsu"];
      /* Redireccionar el navegador */
      header("Location: dashboard");
      die();
    }

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
</head>
<body>
<section class="login-page">
  <form method="get">
    <div class="box">
      <div class="form-head">
        <h2>INICIO DE SESIÓN</h2>
      </div>
      <div class="form-body">
        <input type="text"  id="txtUsuario" name="txtUsuario" placeholder="INGRESE USUARIO" required />
        <input type="password" id="txtPass" name="txtPass" placeholder="INGRESE SU CLAVE" required/>
      </div>
      <div class="form-footer">
        <button type="submit">INGRESAR</button>
      </div>
      <div class="form-footer">
        <label for=""><?php echo $mensaje ?></label>
        <br>
        <h4>¿No posee una cuenta?</h4>
        <a href="registrarse.php" style="color:#FF0000;">Registrarse</a>
      </div>
      
    </div>
  </form>


</section>
</body>
</html>
