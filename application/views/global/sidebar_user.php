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
        <!-- Foto user -->
        <div class="image">
          <img src="<?php echo base_url(''); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p>NAMA USER</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <!-- Menu Dashboard -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              DASHBOARD
              </p>
            </a>
          </li>
          <br>
          <!-- Menu Utama -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                MENU UTAMA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manual Book</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Troubleshoot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Emergency Visit/Call Teknisi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>New Register Alat</p>
                  </a>
                </li>
              </ul>
          </li>
          <br>
          <!-- Monitoring -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              MONITORING
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alat yang Sudah Terpasang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./index2.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alat Baru</p>
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
