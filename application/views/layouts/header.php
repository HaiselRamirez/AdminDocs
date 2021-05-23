<body class="sidebar-mini layout-fixed" style="height: auto;">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-navy navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars text-white"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" >
          <i class="fas fa-user mr-1 text-light"></i>
          <span class="text-light"><?=$this->session->userdata('usuario');?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-user"></i>
            <span>Mi perfil</span>
          </a>
          <a href="#" class="dropdown-item">
            <i class="fas fa-cogs mr-1"></i>
            <span>Ajustes</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onclick="cerrarSession();">
            <i class="fas fa-power-off text-red mr-1"></i>
            <span> Cerrar session</span>
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-orange bg-navy elevation-2">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>Inicio" class="brand-link">
      <img src="<?=base_url()?>dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-2">
      <strong class="brand-text"><?= COMPANY?></strong>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="documentos" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Documentación</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="evaluar" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Evaluación</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Estudiantes" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>Estudiantes</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="Grupos" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Grupos</p>
            </a>
          </li>
          <?php if ($this->session->userdata('rol')== "adm"): ?>            
            <li class="nav-item">
              <a href="Evaluador" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>Evaluadores</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Usuarios" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Reportes" class="nav-link">
                <i class="nav-icon fas fa-file-medical-alt"></i>
                <p>Reportes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p> Mantenimiento
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class="fas fa-tags nav-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="Campus" class="nav-link">
                  <i class="nav-icon fas fa-university"></i>
                  <p>Campus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Semestre" class="nav-link">
                  <i class="nav-icon fas fa-envelope"></i>
                  <p>Mensajes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Semestre" class="nav-link">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>Semestre</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Semestre" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>Carrera</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Semestre" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>Data</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <section class="content">