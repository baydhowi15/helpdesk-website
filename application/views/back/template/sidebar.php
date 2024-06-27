  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <div class="sidebar-brand-icon">
      <img align="center" width="80px" height="90px" src="<?php echo base_url(); ?>assets/img/logo.png" href="<?= base_url('back/dashboard')?>">
    </div> -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url()?>assets/back/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a><?= $this->session->username;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if(is_it()){?>
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('dashboard')?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
            <li class="nav-header">DATA MASTER</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Master Karyawan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('jabatan')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Jabatan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('divisi')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Divisi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('karyawan')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Karyawan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-ticket-alt"></i>
                <p>
                  Master Tiket
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('tiket')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Tiket</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">LAPORAN TIKET</li>
            <li class="nav-item has-treeview">
              <a href="<?=base_url('laporan')?>" class="nav-link">
                <i class="nav-icon fas fa-file-invoice"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
            </li>
            <li class="nav-header">MY PROFILE</li>
            <li class="nav-item has-treeview">
            <a href="<?= base_url('karyawan/profile/' . $this->session->id_users); ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Profile User
                </p>
            </a>
            </li>
            <li class="nav-item has-treeview">
            <a href="<?= base_url('auth/logout')?>" class="nav-link">
                <i class="nav-icon fas fa-angle-double-right"></i>
                <p>
                  Logout
                </p>
            </a>
            </li>
          <?php } else { ?>
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('dashboard')?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url('tiket')?>" class="nav-link">
                <i class="nav-icon fas fa-ticket-alt"></i>
                <p>
                  Data Tiket
                </p>
              </a>
            </li>
            <li class="nav-header">MY PROFILE</li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url('karyawan/profile/' . $this->session->id_users); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile User
              </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url('auth/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                Logout
              </p>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>