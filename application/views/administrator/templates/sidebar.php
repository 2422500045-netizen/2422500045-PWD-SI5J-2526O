<!-- Warna sidebar pink -->
<style>
  /* Sidebar dan area logo */
  .main-sidebar,
  .main-sidebar .brand-link {
    background-color: #ff69b4 !important;
  }

  /* Garis pemisah */
  .main-sidebar .brand-link,
  .main-sidebar .user-panel {
    border-bottom-color: rgba(255, 255, 255, 0.4) !important;
  }

  /* Teks menu putih */
  .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link,
  .sidebar-dark-primary .nav-treeview > .nav-item > .nav-link {
    color: #fff !important;
  }

  /* Menu utama yang aktif (pink lebih tua) */
  .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active {
    background-color: #d63384 !important;
    color: #fff !important;
  }

  /* Submenu yang aktif (putih transparan) */
  .sidebar-dark-primary .nav-treeview > .nav-item > .nav-link.active {
    background-color: rgba(255, 255, 255, 0.35) !important;
    color: #fff !important;
  }

  /* Efek hover */
  .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link:hover,
  .sidebar-dark-primary .nav-treeview > .nav-item > .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.2) !important;
    color: #fff !important;
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/') ?>dist/img/download__31_-removebg-preview.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Maria Fransiska</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
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
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url() ?>administrator/kategori" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>administrator/produk" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>administrator/ekspedisi2422500045" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ekspedisi</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>