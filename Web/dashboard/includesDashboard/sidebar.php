<?php 
$id=$_SESSION["session_username"];
$usuario = json_decode(file_get_contents("http://localhost:8080/SiaApi/usuario.php?id=$id"),true);

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../assets/images/logo.png" alt="SIA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $usuario[0]["nomUsu"]; ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Administrador
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="usuarios.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="areaCultivo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Area de Cultivo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="usuarios.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Actividad de Cultivo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Inicial
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tipoDocumento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo Documento</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipoRendimiento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo Rendimiento</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipoSuelo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo de suelo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipoCultivo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo de Cultivo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="estados.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipoRecursos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo de recursos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="unidadesMedida.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unidades de Medida</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>