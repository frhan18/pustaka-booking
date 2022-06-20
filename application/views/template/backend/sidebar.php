    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PUSTAKA</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master Data
      </div>


      <?php if ($get_user['id_role'] == 1) : ?>


        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if ($title == 'Dashboard') echo 'active' ?>">
          <a class="nav-link" href="<?= site_url('admin/index'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
        </li>

        <li class="nav-item <?php if ($title == 'Anggota') echo 'active' ?>">
          <a class="nav-link" href="<?= site_url('admin/anggota'); ?>">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Anggota</span></a>
        </li>

        <li class="nav-item <?php if ($title == 'Daftar Buku') echo 'active' ?>">
          <a class="nav-link" href="<?= site_url('admin/list_buku'); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Buku</span></a>
        </li>
        <li class="nav-item <?php if ($title == 'Kategori Buku') echo 'active' ?>">
          <a class="nav-link" href="<?= site_url('admin/cat_buku'); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Kategori Buku</span></a>
        </li>

      <?php else : ?>
        <li class="nav-item <?php if ($title == 'Home') echo 'active' ?>">
          <a class="nav-link" href="<?= site_url('users'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
        </li>
        <li class="nav-item <?php if ($title == 'Profile') echo 'active' ?>">
          <a class="nav-link" href="<?= site_url('users/profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
        </li>

      <?php endif; ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->