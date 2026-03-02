<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $this->session->userdata('role') ?> | Hasil Analisa</title>
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
    <link rel="icon" href="<?= base_url() ?>./resource/template/dist/assets/images/logo_sinarmas2.png">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="<?= base_url() ?>./resource/template/dist/assets/images/favicon.png" /> -->
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
                                <i class="mdi mdi-account-multiple"></i>
                            </span> Klasterisasi Karyawan
                        </h3>
                        <!-- <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav> -->
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-9 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </symbol>
                                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                        </symbol>
                                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </symbol>
                                    </svg>
                                    <h3 class="card-title badge badge-primary">Tabel Nilai Kriteria</h3>
                                    <div class="table-responsive">
                                        <?php
                                        // Gabungkan data berdasarkan nama pegawai
                                        $dataGabungan = [];

                                        foreach ($nilai as $item) {
                                            // Ambil nama pegawai
                                            $partsNama = explode(' - ', $item->nama_pegawai);
                                            $nama = isset($partsNama[1]) ? trim($partsNama[1]) : $item->nama_pegawai;

                                            // Ambil nama kriteria
                                            $partsKriteria = explode(' - ', $item->kriteria);
                                            $namaKriteria = isset($partsKriteria[1]) ? trim($partsKriteria[1]) : $item->kriteria;

                                            if (!isset($dataGabungan[$nama])) {
                                                $dataGabungan[$nama] = [];
                                            }

                                            // Simpan nilai ke dalam struktur berdasarkan nama kriteria
                                            $dataGabungan[$nama][$namaKriteria] = $item->nilai;
                                        }
                                        ?>
                                        <table class="table table-striped" id="tabelNilai" >
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>Nama Pegawai</th>
                                                    <th>K1</th>
                                                    <th>K2</th>
                                                    <th>K3</th>
                                                    <th>K4</th>
                                                    <th>K5</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody2">
                                                <?php $no = 1; ?>
                                                <?php foreach ($dataGabungan as $nama => $nilaiKriteria): ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $nama ?></td>
                                                        <td><?= $nilaiKriteria['K1'] ?? '-' ?></td>
                                                        <td><?= $nilaiKriteria['K2'] ?? '-' ?></td>
                                                        <td><?= $nilaiKriteria['K3'] ?? '-' ?></td>
                                                        <td><?= $nilaiKriteria['K4'] ?? '-' ?></td>
                                                        <td><?= $nilaiKriteria['K5'] ?? '-' ?></td>
                                                        <td><?= array_sum($nilaiKriteria) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                        const pegawaiData = <?= json_encode($dataGabungan) ?>;
                                        const kriteriaHeader = <?= json_encode(array_map(function ($k) {
                                                                    $parts = explode(' - ', $k->kriteria);
                                                                    return isset($parts[1]) ? trim($parts[1]) : $k->kriteria;
                                                                }, $kriteria)) ?>;
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-9 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </symbol>
                                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                        </symbol>
                                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </symbol>
                                    </svg>
                                    <h3 class="card-title badge badge-primary">Tabel Klusterisasi</h3>
                                    <?php
                                    // Buat mapping nama pegawai → cluster dari hasil query
                                    $clusterMap = [];
                                    foreach ($cluster as $c) {
                                        $partsNama = explode(' - ', $c->nama_pegawai);
                                        $nama = isset($partsNama[1]) ? trim($partsNama[1]) : $c->nama_pegawai;
                                        $clusterMap[$nama] = $c->cluster;
                                    }

                                    ?>
                                    <div class="table-responsive mb-3">
                                        <button class="btn btn-sm btn-primary" id="btn-analisa">Lakukan Proses Klasterisasi</button>
                                        <!-- <button class="btn btn-sm btn-danger" id="btn-clear-analisa">Bersihkan klasterisasi</button> -->

                                        <?php
                                        // Gabungkan data berdasarkan nama pegawai
                                        $dataGabungan = [];

                                        foreach ($nilai as $item) {
                                            // Ambil nama pegawai
                                            $partsNama = explode(' - ', $item->nama_pegawai);
                                            $nama = isset($partsNama[1]) ? trim($partsNama[1]) : $item->nama_pegawai;

                                            // Ambil nama kriteria
                                            $partsKriteria = explode(' - ', $item->kriteria);
                                            $namaKriteria = isset($partsKriteria[1]) ? trim($partsKriteria[1]) : $item->kriteria;

                                            if (!isset($dataGabungan[$nama])) {
                                                $dataGabungan[$nama] = [];
                                            }

                                            // Simpan nilai ke dalam struktur berdasarkan nama kriteria
                                            $dataGabungan[$nama][$namaKriteria] = $item->nilai;
                                        }
                                        ?>

                                        <table class="table table-striped" id="tableCluster">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>Nama Pegawai</th>
                                                    <th>K1</th>
                                                    <th>K2</th>
                                                    <th>K3</th>
                                                    <th>K4</th>
                                                    <th>K5</th>
                                                    <th>Label</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                                <?php $no = 1;
                                                foreach ($dataGabungan as $nama => $nilaiKriteria): ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $nama ?></td>
                                                        <td><?= $nilaiKriteria['K1'] ?? '-' ?></td>
                                                        <td><?= $nilaiKriteria['K2'] ?? '-' ?></td>
                                                        <td><?= $nilaiKriteria['K3'] ?? '-' ?></td>
                                                        <td><?= $nilaiKriteria['K4'] ?? '-' ?></td>
                                                        <td><?= $nilaiKriteria['K5'] ?? '-' ?></td>
                                                        <td>
                                                            <?php
                                                            $statusMap = [
                                                                'C1' => 'Perlu Evaluasi',
                                                                'C2' => 'Baik',
                                                                'C3' => 'Sangat Baik'
                                                            ];
                                                            echo $statusMap[$clusterMap[$nama] ?? ''] ?? '-';
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
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
        $(document).ready(function() {
            $('#tableCluster').DataTable({
                "pageLength": 10,
                "lengthMenu": [5, 10, 25, 50, 100],
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data tersedia",
                    "zeroRecords": "Data tidak ditemukan",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "›",
                        "previous": "‹"
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                let value = $(this).val().toLowerCase(); // Ambil dan ubah ke huruf kecil
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1); // Sembunyikan/bariskan berdasarkan kecocokan
                });
            });
        });
    </script>
    <script>
        $("#btn-analisa").click(function() {
            $.ajax({
                url: "<?= base_url('AdminController/train_kmeans_awal') ?>",
                type: "POST",
                dataType: "json",
                success: function(res) {
                    console.log("Data dari backend:", res);

                    if (res.status && Array.isArray(res.data)) {
                        var table = $('#tableCluster').DataTable();

                        table.rows().every(function() {
                            var rowData = this.data();
                            var namaPegawai = rowData[1].trim().toLowerCase(); // kolom ke-2 (index 1)
                            var Label = "-";

                            for (var i = 0; i < res.data.length; i++) {
                                var namaFromServer = res.data[i].nama;
                                if (namaFromServer.includes("-")) {
                                    namaFromServer = namaFromServer.split("-")[1].trim();
                                }
                                if (namaFromServer.toLowerCase() === namaPegawai) {
                                    cluster = res.data[i].cluster;
                                    break;
                                }
                            }

                            // Update cell terakhir (kolom cluster)
                            rowData[rowData.length - 1] = cluster;
                            this.data(rowData);
                        });

                        table.draw(false); // refresh tanpa reset pagination

                        Swal.fire({
                            title: "Success!",
                            text: "Proses Klusterisasi Berhasil!",
                            icon: "success"
                        });
                    }
                }
            });
        });


        $("#btn-clear-analisa").click(function() {
            $("#tableBody tr").each(function() {
                var lastCell = $(this).find("td:last");
                if (lastCell.length) {
                    lastCell.text("-");
                }
            });
        });
    </script>

</body>

</html>