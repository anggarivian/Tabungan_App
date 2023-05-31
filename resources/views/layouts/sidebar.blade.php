<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
          <a class="nav-link" href="#"">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Beranda</span>
      </a>
    </li>
    <li class="nav-item nav-category">Pengelolaan Tabungan</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="transaksi">
        <i class="menu-icon mdi mdi-cash-register"></i>
        <span class="menu-title">Transaksi</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="transaksi">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item "> <a class="nav-link" href="{{asset('template/pages/ui-features/buttons.html')}}">Stor Tabungan</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{asset('template/pages/ui-features/dropdowns.html')}}">Tarik Tabungan</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#pengajuan" aria-expanded="false" aria-controls="pengajuan">
        <i class="menu-icon mdi mdi-cash-refund"></i>
        <span class="menu-title">Pengajuan  </span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="pengajuan">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item "> <a class="nav-link" href="{{asset('template/pages/ui-features/buttons.html')}}">Tertunda</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{asset('template/pages/ui-features/dropdowns.html')}}">Riwayat</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
        <i class="menu-icon mdi mdi-file-document"></i>
        <span class="menu-title">Laporan</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="laporan">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item "> <a class="nav-link" href="{{asset('template/pages/ui-features/buttons.html')}}">Transaksi</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{asset('template/pages/ui-features/dropdowns.html')}}">Pengajuan</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{asset('template/pages/ui-features/dropdowns.html')}}">Siswa</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{asset('template/pages/ui-features/dropdowns.html')}}">Petugas</a></li>
        </ul>`
      </div>
    </li>
    <li class="nav-item nav-category">Pengelolaan Pengguna</li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-account-group"></i>
        <span class="menu-title">Data Siswa</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi-account-tie"></i>
        <span class="menu-title">Data Petugas</span>
      </a>
    </li>
  </ul>
</nav>