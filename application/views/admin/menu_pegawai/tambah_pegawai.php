<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->session->userdata('role') ?> | Data Pegawai</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="icon" href="<?= base_url() ?>./resource/template/dist/assets/images/logo_sinarmas2.png">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <?php $this->load->view('layouts/logo'); ?>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <!-- <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                        </div>
                    </form>
                </div> -->
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="<?= base_url() ?>./resource/template/dist/assets/images/faces-clipart/pic-1.png" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?= $this->session->userdata('username') ?></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPasswordModal">
                                <i class="mdi mdi-cog me-2 text-success"></i> Edit Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url() ?>./AuthController/logout">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- Modal Ubah Password -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php $this->load->view('layouts/sidebar'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-account-plus"></i>
                            </span> Tambah Pegawai
                        </h3>
                    </div>
                    <div class="page-header">
                        <h3 class="page-title">
                            <a href="javascript:history.back();" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-arrow-left"></i>
                            </a>
                        </h3>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-9 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form id="formPegawai">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label>Nama KBN</label>
                                                <input type="text" name="nama_kbn" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Nama Region</label>
                                                <input type="text" name="nama_region" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Kode Unit</label>
                                                <input type="text" name="kode_unit" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Nama Unit</label>
                                                <input type="text" name="nama_unit" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Kode NIP</label>
                                                <input type="number" name="kode_nip" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label d-block mb-2">Jenis Kelamin</label>

                                                <div class="d-inline-block me-3">
                                                    <input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki" required>
                                                    <label class="form-check-label" for="laki">Laki-laki</label>
                                                </div>

                                                <div class="d-inline-block">
                                                    <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan">
                                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>No BPJS</label>
                                                <input type="number" name="no_bpjs" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Tanggal Masuk</label>
                                                <input type="date" name="tanggal_masuk" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>NPWP</label>
                                                <input type="number" name="npwp" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Kode Jabatan</label>
                                                <input type="number" name="kode_jabatan" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-success" type="submit"><i class="mdi mdi-file"></i>Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="editPasswordForm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editPasswordModalLabel">Ubah Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-2">
                                            <label>Password Lama</label>
                                            <input type="password" name="old_password" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Password Baru</label>
                                            <input type="password" name="new_password" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Konfirmasi Password Baru</label>
                                            <input type="password" name="confirm_password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" onclick="simpan()">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php $this->load->view('layouts/footer'); ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="<?= base_url() ?>./resource/template/dist/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="<?= base_url() ?>./resource/template/dist/assets/vendors/chart.js/chart.umd.js"></script>
        <script src="<?= base_url() ?>./resource/template/dist/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="<?= base_url() ?>./resource/template/dist/assets/js/off-canvas.js"></script>
        <script src="<?= base_url() ?>./resource/template/dist/assets/js/misc.js"></script>
        <script src="<?= base_url() ?>./resource/template/dist/assets/js/settings.js"></script>
        <script src="<?= base_url() ?>./resource/template/dist/assets/js/todolist.js"></script>
        <script src="<?= base_url() ?>./resource/template/dist/assets/js/jquery.cookie.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="<?= base_url() ?>./resource/template/dist/assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->

        <script>
            $('#editPasswordForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: '<?= base_url('AuthController/update_password') ?>',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(res) {
                        let response = JSON.parse(res);
                        if (response.status === 'success') {
                            Swal.fire('Berhasil', response.message, 'success');
                            $('#editPasswordModal').modal('hide');
                            $('#editPasswordForm')[0].reset();
                        } else {
                            Swal.fire('Gagal', response.message, 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat mengubah password', 'error');
                    }
                });
            });
        </script>

        <script>
            $('#formPegawai').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "<?= base_url('AdminController/simpanPegawai') ?>",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data pegawai berhasil disimpan.',
                                showConfirmButton: true
                            }).then(() => {
                                window.location.href = '<?php echo base_url() ?>./AdminController/dataPegawai';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan pada server.'
                        });
                    }
                });
            });
        </script>

</body>

</html>