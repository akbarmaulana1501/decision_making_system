<?php $akses = $this->session->userdata('role'); ?>
<?php if ($akses == "admin") : ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./AdminController/dashboard">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./AdminController/dataPegawai">
                <span class="menu-title">Data Pegawai</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./AdminController/dataKriteria">
                <span class="menu-title">Data Kriteria</span>
                <i class="mdi mdi-checkbox-marked-circle-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./AdminController/dataNilaiKaryawan">
                <span class="menu-title">Nilai Karyawan</span>
                <i class="mdi mdi-account-box-edit-outline menu-icon"></i>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./AdminController/pengelompokanKaryawan">
                <span class="menu-title">Klasterisasi Karyawan</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./AdminController/analisaKaryawan">
                <span class="menu-title">Analisa Karyawan</span>
                <i class="mdi mdi-finance menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./AdminController/dataUser">
                <span class="menu-title">User Management</span>
                <i class="mdi mdi-account-cog menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
<?php elseif ($akses == "bos"): ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./BosController/dashboardBos">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./BosController/dataKaryawan">
                <span class="menu-title">Data Karyawan</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>./BosController/nilaiKaryawan">
                <span class="menu-title">Nilai Karyawan</span>
                <i class="mdi mdi-finance menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
<?php endif; ?>