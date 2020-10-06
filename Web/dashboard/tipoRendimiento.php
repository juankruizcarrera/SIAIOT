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
//Borrar 
    $url = 'http://localhost:8080/siaApi/tablasSatelites/tipoRendimiento.php';
    if (isset($_GET['idTipRen'])) {
      $idSelecionado= $_GET['idTipRen'];
    
      $datos = array('idTipRen' => $idSelecionado);
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
       
      }
    }
  ////////////editar
  
  if (isset($_GET['idSelec']) ) {
   
    if (isset($_POST['idTipRen'])&& $_POST['idTipRen']!=0) {
      if ($_GET['idSelec']==$_POST['idTipRen']) {
        if(isset($_POST['idTipRen'])&&isset($_POST['nomTipRen']) ) {
  
          $idTipRen=$_POST['idTipRen'];
          $nomTipRen=$_POST['nomTipRen'];
         
          $data = array('idTipRen' => $idTipRen, 'nomTipRen' => $nomTipRen);
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
    }else {
      
  /////////Guardar
 
if (isset($_POST['nomTipRen']) ) {
 

    $nomTipRen=$_POST['nomTipRen'];
   
    $data = array('nomTipRen' => $nomTipRen);
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
    if ($resultado === true) {
      header('Location: dashboard/tipoDocumento.php');
      die;
     
    }
     
    }
    }
    
    }else {
        
  /////////Guardar
 
if (isset($_POST['nomTipRen']) ) {
 

    $nomTipRen=$_POST['nomTipRen'];
   
    $data = array('nomTipRen' => $nomTipRen);
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
    if ($resultado === true) {
      header('Location: dashboard/tipoDocumento.php');
      die;
     
    }
     
    }
    }
   
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIA | Tipo Rendimiento</title>

  <?php include("includesDashboard/referencias.php"); ?>
 
  
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
              <li class="breadcrumb-item active">Tipo Rendimiento</li>
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
              <h3 class="card-title">Nuevo Tipo de Rendimiento</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" >
            <form method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="idTipRen">IdTipoRen</label>
                    <input type="text" class="form-control" id="idTipRen" name="idTipRen" placeholder="Id Tipo Rendimiento" readonly value="<?php if (isset($_GET['idSelec'])) {
                     $idSelec=$_GET['idSelec'];
                     echo $idSelec;
                    }else{
                        echo 0;
                    } ?>">
                    </div>
                    <div class="form-group">
                    <label for="nomTipRen">Nombre Tipo Rendimiento</label>
                    <input type="text" class="form-control" id="nomTipRen"  name="nomTipRen" placeholder="Nombre tipo Rendimiento" required >
                    </div>
                </div>
                
                <!-- /.card-body -->

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
              <h3 class="card-title">Lista</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
            <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Nombre Tipo Rendimiento
                      </th>
                      
                      
                     
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
              
                   $data = json_decode(file_get_contents("http://localhost:8080/siaApi/tablasSatelites/tipoRendimiento.php"),true);
             
                   for($i=0;$i<count($data); $i++){
                       ?>
                    <tr>
                    <td>
                       <?php echo $data[$i]["idTipRen"]; ?>
                    </td>
                    <td>
                        <a>
                        <?php echo $data[$i]["nomTipRen"]; ?>
                        </a>
                        <br/>
                        <small>
                        
                        </small>
                    </td>
                    <td class="project-actions text-right">
                       
                        <a class="btn btn-info btn-sm"  href="tipoRendimiento.php?idSelec=<?php echo $data[$i]["idTipRen"]; ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Editar
                        </a>
                        <a class="btn btn-danger btn-sm"   href="tipoRendimiento.php?idTipRen=<?php echo $data[$i]["idTipRen"]; ?>">
                            <i class="fas fa-trash">
                            </i>
                            Eliminar
                        </a>
                       
                        
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
