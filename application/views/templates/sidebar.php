<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <img src="<?= base_url('assets'); ?>/images/Logo-kemensos.png" class="w-50 h-50" alt="" srcset="" />
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Main Menu</li>

        <li class="sidebar-item <?= ($halaman == "dashboard") ? 'active' : ''; ?>">
          <a href="<?= base_url('petugas'); ?>" class="sidebar-link">
            <i data-feather="home" width="20"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item <?= ($halaman == "daftar_pertanyaan") ? 'active' : ''; ?>">
          <a href="<?= base_url('pertanyaan'); ?>" class="sidebar-link">
            <i data-feather="layers" width="20"></i>
            <span>Daftar Pertanyaan</span>
          </a>
        </li>

        <li class="sidebar-item <?= ($halaman == "report") ? 'active' : ''; ?>">
          <a href="<?= base_url('petugas/reportKuesioner'); ?>" class="sidebar-link">
            <i data-feather="archive" width="20"></i>
            <span>Report kuesioner</span>
          </a>
        </li>

        <li class="sidebar-title">User Menu</li>

        <li class="sidebar-item">
          <a href="<?= base_url('auth/logout'); ?>" class="sidebar-link text-danger">
            <i data-feather="log-out" width="20"></i>
            <span class="text-danger">Logout</span>
          </a>
        </li>
      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>