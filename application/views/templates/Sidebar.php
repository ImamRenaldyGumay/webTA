<!-- ========================================================================================================== -->
<!-- Start Sidebar Admin -->
<?php if ($this->session->userdata('role') == '1') : ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Admin') ?>" class="brand-link">
      <img src="<?= base_url('assets') ?>/dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Beasiswa UNSRI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar mb-2">

      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Dashboard</li>
          <li class="nav-item">
            <a href="<?= base_url('Admin') ?>" class="nav-link <?= ($this->uri->uri_string() == 'Admin') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->uri_string() == 'DataFakultas') || ($this->uri->uri_string() == 'DataProdi') || ($this->uri->uri_string() == 'DataBeasiswa') || ($this->uri->uri_string() == 'DataKriteria') || ($this->uri->uri_string() == 'DataAtribut') || ($this->uri->uri_string() == 'DataParameter') ? 'menu-open' : '' ?>">
            <a href="#" class="nav-link <?= ($this->uri->uri_string() == 'DataFakultas') || ($this->uri->uri_string() == 'DataProdi') || ($this->uri->uri_string() == 'DataBeasiswa') || ($this->uri->uri_string() == 'DataKriteria') || ($this->uri->uri_string() == 'DataAtribut') || ($this->uri->uri_string() == 'DataParameter') ? 'active' : '' ?> ">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('DataFakultas') ?>" class="nav-link <?= ($this->uri->uri_string() == 'DataFakultas') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Fakultas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('DataProdi') ?>" class="nav-link <?= ($this->uri->uri_string() == 'DataProdi') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Prodi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('DataBeasiswa') ?>" class="nav-link <?= ($this->uri->uri_string() == 'DataBeasiswa') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Beasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('DataKriteria') ?>" class="nav-link <?= ($this->uri->uri_string() == 'DataKriteria') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('DataAtribut') ?>" class="nav-link <?= ($this->uri->uri_string() == 'DataAtribut') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Atribut</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('DataParameter') ?>" class="nav-link <?= ($this->uri->uri_string() == 'DataParameter') ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Parameter</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('DataLatih') ?>" class="nav-link <?= ($this->uri->uri_string() == 'DataLatih') ? 'active' : '' ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Latih
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php endif ?>
<!-- End Sidebar Admin -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- Start Sidebar User -->
<?php if ($this->session->userdata('role') == '2') : ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('assets') ?>/index3.html" class="brand-link">
      <img src="<?= base_url('assets') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Beasiswa UNSRI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php endif ?>
<!-- End Sidebar User -->
<!-- ========================================================================================================== -->