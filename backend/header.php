<?php

require_once "class/Usuario.php";


session_start();

if (!isset($_SESSION['usuario'])) {
  header('location: /proyecto_shoe_shop/backend/index.php');
}

$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Shoe Shop | administración</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../static/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../static/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../static/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../static/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../static/plugins/daterangepicker/daterangepicker.css">

  <!-- summernote -->
  <link rel="stylesheet" href="../../static/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="/proyecto_shoe_shop/backend/modulos/dashboard/listado.php" class="nav-link">Inicio</a>
      </li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          <a href="" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="/proyecto_shoe_shop/backend/logout.php" class="dropdown-item dropdown-footer"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../static/dist/img/logo/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Shoe Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--<div class="image">
          <img src="../../static/dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>-->
        <div class="info d-block">
          <h5 class="m-0 text-light"> Usuario: <?php echo $usuario; ?></h5>
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <?php foreach ($usuario->perfil->getModulos() as $modulo): ?>
          <li class="nav-item">
            <a href="/proyecto_shoe_shop/backend/modulos/<?php echo $modulo->getDirectorio() ?> /listado.php" class="nav-link">
              <i class="nav-icon fab fa-codepen"></i>
              <p>
              <?php echo $modulo;  ?>
              </p>
            </a>            
          </li>
          <?php endforeach ?>
          <!--<li class="nav-item">
            <a href="/proyecto_shoe_shop/backend/modulos/clientes/listadoCliente.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
                
              </p>
            </a>
          </li>

          <li class="nav-item"> 
            <a href="/proyecto_shoe_shop/backend/modulos/proveedores/listadoProveedor.php" class="nav-link">
              <i class="nav-icon fas fa-truck-loading"></i>
              <p>
                Proveedores
                
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control de Stock</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de compras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control de compras</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Gestión de ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de pedidos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facturación</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipos de pagos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control de ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control de envíos</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes de ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes de compras</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reportes de visitas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Egresos e Ingresos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Seguridad
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proyecto_shoe_shop/backend/modulos/usuarios/listadoUsuario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perfiles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Módulos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
            </ul>
          </li>-->

          <!--<li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Direcciones (pruebas)
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proyecto_shoe_shop/backend/modulos/direcciones/listadoDireccion.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Direccion</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/proyecto_shoe_shop/backend/modulos/direcciones/listadoBarrio.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barrio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/proyecto_shoe_shop/backend/modulos/direcciones/listadoCiudad.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ciudad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/proyecto_shoe_shop/backend/modulos/direcciones/listadoProvincia.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Provincia</p>
                </a>
              </li>
            </ul>
          </li>-->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


