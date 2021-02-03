<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url(''); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TMS Nusindo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(''); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p><?= $this->session->userdata('user_id') ?></p>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <!-- menu 1 -->
          <li class="nav-item">
            <a href="#" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
          </li>
          <!-- menu 2 -->
          <li class="nav-header">Main Menu</li>
          <li class="nav-item ">
            <a href="#" class="nav-link "><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Dashboard V1</p></a>
              </li>
            </ul>
          </li>
          <!-- menu 3 -->
          <li class="nav-header">Monitoring</li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link"><i class="nav-icon fas fa-th"></i>
              <p>Widgets <!-- <span class="right badge badge-danger">New</span> --> </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

          <!-- batas atas -->

          <!-- batas bawah -->





    </div>
    <!-- /.sidebar -->
  </aside>
