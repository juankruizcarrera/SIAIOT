<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
    header("Location: ../login.php");
}else{

    $id=$_SESSION["session_username"];
    $usuario = json_decode(file_get_contents("http://localhost:8080/SiaApi/usuario.php?id=$id"),true);
    $idGraPer=$usuario[0]["idGraPer"];
    $granja = json_decode(file_get_contents("http://localhost:8080/SiaApi/granja.php?id=$idGraPer"),true);
    $UbiGran=$granja[0]["ubiGra"];


   
   $unidades =json_decode(file_get_contents("http://localhost:8080/siaApi/tablasSatelites/unidades.php"),true);

//Borrar 
$url = 'http://localhost:8080/siaApi/areaCultivo.php';
if (isset($_GET['idAreCul'])) {
  $idSelecionado= $_GET['idAreCul'];

  $datos = array('idAreCul' => $idSelecionado);
  $options = array(
      'http' => array(
          'header'  => "Content-type: application/json\r\n",
          'method'  => 'DELETE',
          'content' => json_encode($datos),
      ),
  );
  
  # Preparar petición
  $contexto = stream_context_create($options);
  # Hacerla
  $resultado = file_get_contents($url, false, $contexto);
  if ($resultado === true) {
   /*  header('Location: tipoSuelo.php');
    die; */
  }
  unset($_GET['idAreCul']); 
}
////////////editar

if (isset($_GET['idSelec']) ) {

if (isset($_POST['idAreCul'])&& $_POST['idAreCul']!=0) {
  if ($_GET['idSelec']==$_POST['idAreCul']) {
    if(isset($_POST['idAreCul'])&&isset($_POST['nomAre'])&&isset($_POST['ubiAreCul'])&&isset($_POST['areAreCul'])&&isset($_POST['obsAreCul'])&&isset($_POST['idGraPer'])&&isset($_POST['idUniPer']) ) {

      $idAreCul=$_POST['idAreCul'];
      $nomAre=$_POST['nomAre'];
      $ubiAreCul=$_POST['ubiAreCul'];
      $areAreCul=$_POST['areAreCul'];
      $obsAreCul=$_POST['obsAreCul'];
      $idGraPer=$_POST['idGraPer'];
      $idUniPer=$_POST['idUniPer'];

     
      $data = array('idAreCul' => $idAreCul, 'nomAre' => $nomAre,'ubiAreCul' => $ubiAreCul,'areAreCul'=>$areAreCul,'obsAreCul'=>$obsAreCul,'idGraPer' => $idGraPer,'idUniPer'=>$idUniPer);
      $options = array(
          'http' => array(
              'header'  => "Content-type: application/json\r\n",
              'method'  => 'PUT',
              'content' => json_encode($data),
          ),
      );
      # Preparar petición
      $contexto = stream_context_create($options);
      # Hacerla
      $resultado = file_get_contents($url, false, $contexto);
      if ($resultado === true) {
      
      }
 
      }
      unset($_GET['idSelec']); 
  }
}else{
      /////////Guardar

if (isset($_POST['nomAre'])&&isset($_POST['ubiAreCul'])&&isset($_POST['areAreCul'])&&isset($_POST['obsAreCul'])&&isset($_POST['idGraPer'])&&isset($_POST['idUniPer']) ) {
  $nomAre=$_POST['nomAre'];
  $ubiAreCul=$_POST['ubiAreCul'];
  $areAreCul=$_POST['areAreCul'];
  $obsAreCul=$_POST['obsAreCul'];
  $idGraPer=$_POST['idGraPer'];
  $idUniPer=$_POST['idUniPer'];

  $data = array('nomAre' => $nomAre,'ubiAreCul' => $ubiAreCul,'areAreCul'=>$areAreCul,'obsAreCul'=>$obsAreCul,'idGraPer' => $idGraPer,'idUniPer'=>$idUniPer);
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);

# Preparar petición
$contexto = stream_context_create($options);
# Hacerla
$resultado = file_get_contents($url, false, $contexto);

 
}
}

}else {
    
/////////Guardar
if (isset($_POST['idAreCul'])&&$_POST['idAreCul']==0) {
  if (isset($_POST['nomAre'])&&isset($_POST['ubiAreCul'])&&isset($_POST['areAreCul'])&&isset($_POST['obsAreCul'])&&isset($_POST['idGraPer'])&&isset($_POST['idUniPer']) ) {
    $nomAre=$_POST['nomAre'];
    $ubiAreCul=$_POST['ubiAreCul'];
    $areAreCul=$_POST['areAreCul'];
    $obsAreCul=$_POST['obsAreCul'];
    $idGraPer=$_POST['idGraPer'];
    $idUniPer=$_POST['idUniPer'];
  
    $data = array('nomAre' => $nomAre,'ubiAreCul' => $ubiAreCul,'areAreCul'=>$areAreCul,'obsAreCul'=>$obsAreCul,'idGraPer' => $idGraPer,'idUniPer'=>$idUniPer);
  $options = array(
      'http' => array(
          'header'  => "Content-type: application/json\r\n",
          'method'  => 'POST',
          'content' => json_encode($data),
      ),
  );
  
  # Preparar petición
  $contexto = stream_context_create($options);
  # Hacerla
  $resultado = file_get_contents($url, false, $contexto);
  
   
  }
}

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIA | Área de Cultivo</title>

  <?php include("includesDashboard/referencias.php"); ?>
 
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM2eJylOzv5YDNnL-zryPIogSIksXd_kI&callback=initMap&libraries=drawing" defer ></script>
  <script src="dist/js/pages/dibujarmapa.js"></script>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Navbar -->
  <?php include("includesDashboard/navbar.php"); ?>

  <!-- Main Sidebar Container -->
  <?php include("includesDashboard/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $granja[0]["nomGra"];?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Área de Cultivo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="modal fade" id="modal_exito" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Usuario creado correctamente</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="modal_falla" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Usuario ya existe</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
    
</div >
    <!-- Main content -->
    <section class="content">
        <div class="row" >
            <div class="col-md-12">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Nueva Área de Cultivo</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" >
        
            <input type="hidden" name="ubiGra" id="ubiGra" value="<?php echo $UbiGran; ?>">
            <form action="" method= "post">
            <div class="card-body">
                <div class="form-group">
                    <label for="idAreCul">Id</label>
                    <input type="text" class="form-control" id="idAreCul" name="idAreCul" placeholder="Id Área" readonly value="<?php if (isset($_GET['idSelec'])) {
                     $idSelec=$_GET['idSelec'];
                     echo $idSelec;
                    }else{
                        echo 0;
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="nomAre">Nombre</label>
                    <input type="text" class="form-control" id="nomAre"  name="nomAre" placeholder="Nombre del Área"required>
                </div>
                <div class="form-group">
                    <label for="obsAreCul">Observaciones</label>
                    <input type="textarea" class="form-control" id="obsAreCul"  name="obsAreCul" placeholder="Observaciones"required>
                </div>
                <div class="form-group">
                    <label for="areAreCul">Área</label>
                    <input type="number" class="form-control" id="areAreCul"  name="areAreCul" placeholder="Área"required>
                </div>
                <div class="form-group">
                
              
               
                <label for="idUniPer">Unidad de Medida</label>
                <select class="form-control" name="idUniPer" id="idUniPer">
                <?php
                for($i=0;$i<count($unidades); $i++){
                  ?>
                <option value="<?php echo $unidades[$i]["idUni"]; ?>"><?php echo $unidades[$i]["nomUni"]; ?></option>
                <?php
              } 
              ?>
                </select>
                    
                   
                </div>
            </div>
            <input type="hidden" name="ubiAreCul" id="ubiAreCul" >
            <input type="hidden" name="idGraPer" id="idGraPer" value="<?php echo $idGraPer; ?>">
 
        

                <!-- /.card-body -->
                <label for="nomTipDoc">Dibuje el Área</label>
             <div id="map"style="height: 350px; width: 100%;"> </div>
             
             <div class="card-footer">
                  <button type="submit" class="btn btn-primary" >Guardar</button>
                </div>
             </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
            </div>
            <div class="col-md-12">
            <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Áreas</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Obs</th>
                    <th>Área</th>
                    <th>Unidad</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
              <?php
              $areaCultivo=json_decode(file_get_contents("http://localhost:8080/siaApi/areaCultivo.php?idGraPer=$idGraPer"),true);
              for($i=0;$i<count($areaCultivo); $i++){
              ?>
                  <tr>
                    <td><?php echo $areaCultivo[$i]['nomAre'];?></td>
                    <td><?php echo $areaCultivo[$i]['areAreCul']; ?></td>
                    <td><?php echo $areaCultivo[$i]['obsAreCul']; ?></td>
                    <td><?php echo $areaCultivo[$i]['idUniPer']; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="areaCultivo.php?idSelec=<?php echo $areaCultivo[$i]["idAreCul"];?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a href="areaCultivo.php?idAreCul=<?php echo $areaCultivo[$i]["idAreCul"];?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
      <?php 
 }            
?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("includesDashboard/footer.php");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>


  <?php
}
?>


  




