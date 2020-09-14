<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIA PLUS</title>
<link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
</head>
<body>
<section class="login-page">
  <form method="get">
    <div class="box">
      <div class="form-head">
        <h2>INICIO DE SESIÓN</h2>
      </div>
      <div class="form-body">
        <input type="text"  id="txtUsuario" name="txtUsuario" placeholder="INGRESE USUARIO" />
        <input type="password" id="txtPass" name="txtPass" placeholder="INGRESE SU CLAVE" />
      </div>
      <div class="form-footer">
        <button type="btnIngresar">INGRESAR</button>
      </div>
    </div>
  </form>

<?php 
session_start();
if(isset($_SESSION["session_username"])){
  // echo "La sesión está puesta"; // para testeo
  header("Location: dashboard");
  }

if (isset($_GET['txtUsuario']) && isset($_GET['txtPass'])) {
  $data = json_decode(file_get_contents("http://localhost:8080/SiaApi/usuario.php"),true);
  $cont=$_GET['txtPass'];
  $usu=$_GET['txtUsuario'];
  for($i=0;$i<count($data); $i++){
    
    if ($data[$i]["conUsu"]==$cont && $data[$i]["emaUsu"]==$usu ) {
    
      $_SESSION['session_username']=$usu;

      /* Redireccionar el navegador */
      header("Location: dashboard");
      die();
    }
  break;
  }
    
}

?>
</section>
</body>
</html>
