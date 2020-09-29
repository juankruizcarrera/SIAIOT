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
  <title>SIA | Usuarios</title>

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
    <form method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="idTipDoc">IdTipoDoc</label>
                    <input type="text" class="form-control" id="idTipDoc" name="idTipDoc" placeholder="Id Tipo Documento">
                    </div>
                    <div class="form-group">
                    <label for="nomTipDoc">Nombre Tipo Documento</label>
                    <input type="text" class="form-control" id="nomTipDoc"  name="nomTipDoc" placeholder="Nombre tipo Documento">
                    </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
    </form>
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

<?php 

$idTipDoc=$_POST['idTipDoc'];
$nomTipDoc=$_POST['nomTipDoc'];
$url = 'http://localhost:8080/siaApi/tablasSatelites/tipoDocumento.php';
$data = array('idTipDoc' => $idTipDoc, 'nomTipDoc' => $nomTipDoc);
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'DELETE',
        'content' => json_encode($data),
    ),
);
 print_r(json_encode($data));
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

?>