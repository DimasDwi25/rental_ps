<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('dashboard') ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('users') ?>">
          <i class="bi bi-clock"></i>
          <span>Kelola Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('console-type') ?>">
          <i class="bi bi-clock"></i>
          <span>Jenis Console</span>
        </a>
      </li>
      <!-- End Jenis Console Nav -->
      
      <!-- End Jenis Console Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('console') ?>">
          <i class="bi bi-check2-square"></i>
          <span>Console</span>
        </a>
      </li><!-- End Console Nav -->
      <!-- End Jenis Console Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('rentals') ?>">
          <i class="bi bi-check2-square"></i>
          <span>Data Pelanggan</span>
        </a>
      </li><!-- End Console Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#transactions-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clipboard"></i>
          <span>Transaksi</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="transactions-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('/transaksi/dipinjam') ?>">
              <i class="bi bi-circle"></i><span>Dipinjam</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('transaksi/selesai') ?>">
              <i class="bi bi-circle"></i><span>Selesai</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('transaksi/dibatalkan') ?>">
              <i class="bi bi-circle"></i><span>Dibatalkan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Rental Nav -->
    </ul>
  </aside><!-- End Sidebar -->
