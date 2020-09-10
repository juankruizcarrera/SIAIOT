<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAPLUS</title>
    <?php include("includes/referencias.php"); ?>
</head>

<body>
    <div class="css-loader">
        <div class="loader-inner line-scale d-flex align-items-center justify-content-center"></div>
    </div>
     <?php include("includes/menu.php"); ?>
	<?php include("includes/slider.php"); ?>
    <section class="featured">
        <div class="container">
            <form>
            </br>
            </br>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre" placeholder="Nombre" style="background: #566573 ;" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellido</label>
                    <input type="text" class="form-control" id="txtApellido" placeholder="Apellido" style="background: #566573 ;">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Email</label>
                  <input type="email" class="form-control" id="txtEmail" placeholder="ejemplo@gmail.com" style="background: #566573 ;">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Asunto</label>
                  <input type="text" class="form-control" id="txtAsunto"  style="background: #566573 ;">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Mesaje</label>
                    <textarea class="form-control" id="txtMensaje" rows="3" style="background: #566573 ;"></textarea>
                  </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </section>
    
     <?php include("includes/footer.php"); ?>
    
</body>

</html>