<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
    header("Location: ../login.php");
}else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIA | Tipo Documento</title>

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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tipo Documento</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     <!-- Default box -->
     <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tipo Documento</h3>
          <a class="btn btn-success btn-sm" href="nuevoTipoDocumento.php">
                            <i class="fas fa-plus">
                            </i>
                            Nuevo
                        </a>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
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
                          Nombre Tipo Documento
                      </th>
                      
                      
                     
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
              
                   $data = json_decode(file_get_contents("http://localhost:8080/siaApi/tablasSatelites/tipoDocumento.php"),true);
             
                   for($i=0;$i<count($data); $i++){
                       ?>
                    <tr>
                    <td>
                       <?php echo $data[$i]["idTipDoc"]; ?>
                    </td>
                    <td>
                        <a>
                        <?php echo $data[$i]["nomTipDoc"]; ?>
                        </a>
                        <br/>
                        <small>
                        <!-- perfil -->
                        </small>
                    </td>
                    <td class="project-actions text-right">
                       
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Editar
                        </a>
                        <a class="btn btn-danger btn-sm"  href="#"  onclick="EliminarTipoDocumento()">
                            <i class="fas fa-trash">
                            </i>
                            Eliminar
                        </a>
                       
                        <input   class="btn btn-danger btn-sm" type="button" value="Eliminar" onclick="EliminarTipoDocumento()" >
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
$url = 'http://localhost:8080/siaApi/tablasSatelites/tipoDocumento.php';
function EliminarTipoDocumento(){

 echo "hola";
  $datos = array('idTipDoc' => $idSelecionado);
  $options = array(
      'http' => array(
          'header'  => "Content-type: application/json\r\n",
          'method'  => 'DELETE',
          'content' => json_encode($datos),
      ),
  );
   print_r(json_encode($datos));
  # Preparar petición
  $contexto = stream_context_create($options);
  # Hacerla
  $resultado = file_get_contents($url, false, $contexto);
  if ($resultado === false) {
      echo "Error haciendo petición";
      
      exit;
  }else{
      header("location:tipoDocumento.php");
      # si no salimos allá arriba, todo va bien
      var_dump($resultado);
  
  }
  
}
?>