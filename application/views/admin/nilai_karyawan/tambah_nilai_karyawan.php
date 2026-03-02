<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->session->userdata('role') ?> | Nilai Karyawan</title>
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
                                <i class="mdi mdi-account-box-edit-outline"></i>
                            </span> Tambah Data Nilai Karyawan
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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form id="formNilai">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label>Nama Pegawai</label>
                                                <select name="nama_pegawai" class="form-select" required>
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    <?php foreach ($pegawai as $p): ?>
                                                        <option value="<?= $p->kode_nip ?> - <?= $p->nama ?>"><?= $p->kode_nip ?> | <?= $p->nama ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Kriteria</label>
                                                <select id="kriteria_select" name="kriteria" class="form-select" required>
                                                    <option value="">-- Pilih Kriteria --</option>
                                                    <option value="K1">Output Hasil Panen</option>
                                                    <option value="K2">Kualitas Panen</option>
                                                    <option value="K3">Areal Lahan</option>
                                                    <option value="K4">Absensi</option>
                                                    <option value="K5">Disiplin</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Sub Kriteria</label>
                                                <select id="sub_kriteria" name="sub_kriteria" class="form-select" required>
                                                    <option value="">-- Pilih Sub Kriteria --</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Bobot</label>
                                                <input type="text" name="nilai" id="bobot" class="form-control">
                                            </div>
                                        </div>
                                        <div>
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
            $('#formNilai').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "<?= base_url('AdminController/simpanNilai') ?>",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data nilai pegawai berhasil disimpan.',
                                showConfirmButton: true
                            }).then(() => {
                                window.location.href = '<?php echo base_url() ?>./AdminController/dataNilaiKaryawan';
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
        <script>
            document.querySelector('input[name="nilai"]').addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        </script>
        <!-- <script>
            $(document).ready(function() {
                $('#kriteria_select').on('change', function() {
                    var id_kriteria = $(this).val();

                    if (id_kriteria) {
                        $.ajax({
                            url: '<?= base_url("AdminController/getNilai") ?>',
                            type: 'POST',
                            data: {
                                id: id_kriteria
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status == 'success') {
                                    $('#nilaiInput').val(response.nilai);
                                } else {
                                    $('#nilaiInput').val('');
                                }
                            }
                        });
                    } else {
                        $('#nilaiInput').val('');
                    }
                });
            });
        </script> -->
        <!-- <script>
            document.getElementById('kriteria_select').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const bobot = selectedOption.getAttribute('data-bobot') || '';
                document.getElementById('nilaiInput').value = bobot;
            });
        </script> -->
        <script>
            const subKriteriaOptions = {
                K1: [{
                    value: "sub_hasil_panen",
                    text: "Perusahaan menetapkan hasil panen wajib pekerja(basis) 1250 kg/125 jjg dikali  25 hari kerja dibagi berat jjg rata-rata 10 kg",
                    bobot : 37500
                }],
                K2: [{
                        value: "kualitas_panen_1",
                        text: "Buah Panen Bagus",
                        bobot : 2
                    },
                    {
                        value: "kualitas_panen_2",
                        text: "Buah panen cukup bagus",
                        bobot : 1
                    }
                ],
                K3: [{
                        value: "areal_lahan_1",
                        text: "Areal KS bersih,secara berkala melakukan pruning,tidak ditemukan berondolan atau bibit kecamba,dan pelepa tersusun rapi",
                        bobot : 3
                    },
                    {
                        value: "areal_lahan_2",
                        text: "Areal KS cukup bersih, secara berkala melakukan pruning, terdapat brondolan atau bibit kecamba 30/bulan atau 360/tahun, pelepa tersusun rapi ",
                        bobot : 2
                    },
                    {
                        value: "areal_lahan_3",
                        text: "Areal KS semak, terdapat brondolan atau bibit kecamba > 360/tahun, banyak ditemukan pelepa gantung dan tidak tersusun rapi",
                        bobot : 1
                    }
                ],
                K4: [{
                        value: "absensi_1",
                        text: "Masuk selama 288 hari kerja selama setahun",
                        bobot : 1
                    },
                    {
                        value: "absensi_2",
                        text: "Tidak masuk 1-2 hari atau 287-286 kehadiran pertahun",
                        bobot : 2
                    },
                    {
                        value: "absensi_3",
                        text: "Tidak masuk 3-4 hari atau < 286 kehadiran pertahun",
                        bobot : 3
                    },
                    {
                        value: "absensi_4",
                        text: "Tidak masuk 5-6 hari atau < 284 kehadiran pertahun ",
                        bobot : 4
                    },
                    {
                        value: "absensi_5",
                        text: "Tidak masuk selama 7-8 bahkan lebih dalam pertahunnya ",
                        bobot : 5
                    }
                ],
                K5: [{
                        value: "tinggi",
                        text: "Apel tepat waktu dan berpakaian sesuai APD, sikap kerja, tanggung jawab",
                        bobot : 3
                    },
                    {
                        value: "sedang",
                        text: "Dalam setahun 24 kali tidak mengikuti apel, dalam setahun 24 kali berpakaian tidak lengkap",
                        bobot : 2
                    },
                    {
                        value: "cukup",
                        text: "Dalam setahun > 24 kali tidak mengikuti apel, dalam setahun > 24 kali berpakaian tidak lengkap, datang dan pulang tidak beraturan ",
                        bobot : 1
                    }
                ]
            };

            document.getElementById('kriteria_select').addEventListener('change', function() {
                const subSelect = document.getElementById('sub_kriteria');
                const selectedKriteria = this.value;

                // Kosongkan sub kriteria
                subSelect.innerHTML = '<option value="">-- Pilih Sub Kriteria --</option>';

                if (subKriteriaOptions[selectedKriteria]) {
                    subKriteriaOptions[selectedKriteria].forEach(function(item) {
                        const option = document.createElement('option');
                        option.value = item.value;
                        option.textContent = item.text;
                        option.setAttribute('data-bobot', item.bobot); // simpan bobot di atribut
                        subSelect.appendChild(option);
                    });
                }
            });

            document.getElementById('sub_kriteria').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const bobot = selectedOption.getAttribute('data-bobot') || '';
                document.getElementById('bobot').value = bobot;
            });
        </script>
</body>

</html>