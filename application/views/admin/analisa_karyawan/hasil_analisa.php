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
                                <i class="mdi mdi-finance"></i>
                            </span> Data Hasil Analisa
                        </h3>
                        <!-- <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav> -->
                    </div>


                    <div class="row">
                        <div class="col-md-9 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title badge badge-primary">Tabel Nilai Normalisasi</h3>
                                    <?php
                                    // Buat mapping nama pegawai → cluster dari hasil query
                                    $clusterMap = [];
                                    foreach ($cluster as $c) {
                                        $clusterMap[$c->nama_pegawai] = $c->cluster; // simpan pakai nama lengkap (NIP - NAMA)
                                    }

                                    $hasilMap = [];
                                    foreach ($hasil_analisa as $h) {
                                        $hasilMap[$h->nama_pegawai] = [
                                            'nilai_preferensi' => $h->nilai_preferensi,
                                            'rank' => $h->rank
                                        ];
                                    }

                                    // === 3. Gabungkan data berdasarkan nama pegawai (pakai nama lengkap untuk key) ===
                                    $dataGabungan = [];
                                    foreach ($nilai as $item) {
                                        $namaFull = $item->nama_pegawai; // NIP - NAMA
                                        $partsNama = explode(' - ', $namaFull);
                                        $namaTampil = isset($partsNama[1]) ? trim($partsNama[1]) : $namaFull; // hanya nama

                                        // Ambil nama kriteria
                                        $partsKriteria = explode(' - ', $item->kriteria);
                                        $namaKriteria = isset($partsKriteria[1]) ? trim($partsKriteria[1]) : $item->kriteria;

                                        if (!isset($dataGabungan[$namaFull])) {
                                            $dataGabungan[$namaFull] = [
                                                'nama_tampil' => $namaTampil
                                            ];
                                        }

                                        // Simpan nilai ke dalam struktur berdasarkan nama kriteria
                                        $dataGabungan[$namaFull][$namaKriteria] = $item->nilai;
                                    }
                                    ?>

                                    <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                                        <button class="btn btn-sm btn-primary" id="btn-normalisasi">Lakukan Proses Perenkingan</button>

                                        <table class="table table-striped" id="tableTopsis">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Pegawai</th>
                                                    <th>Cluster</th>
                                                    <th>Nilai Preferensi</th>
                                                    <th>Ranking Akhir</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableNormalisasi">
                                                <?php
                                                $no = 1;
                                                $statusMap = [
                                                    'C1' => 'Perlu Evaluasi',
                                                    'C2' => 'Baik',
                                                    'C3' => 'Sangat Baik'
                                                ];
                                                foreach ($dataGabungan as $namaFull => $nilaiKriteria):
                                                    $nilai_preferensi = $hasilMap[$namaFull]['nilai_preferensi'] ?? '';
                                                    $rank = $hasilMap[$namaFull]['rank'] ?? '';
                                                    $clusterCode = $clusterMap[$namaFull] ?? '';
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $nilaiKriteria['nama_tampil'] ?></td>
                                                        <td><?= $statusMap[$clusterCode] ?? '-' ?></td>
                                                        <td><?= $nilai_preferensi !== '' ? number_format($nilai_preferensi, 4) : '' ?></td>
                                                        <td><?= $rank ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-9 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title badge badge-primary">Tabel Hasil Analisa</h3>
                                    <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                                        <button class="btn btn-primary" id="btn-analisa">Lakukan Proses Analisa</button>
                                        <button class="btn btn-primary" id="btn-clear-analisa">Bersihkan Analisa</button>
                                        <button class="btn btn-primary" id="btn-simpan">Simpan</button>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>Nama Pegawai</th>
                                                    <?php foreach ($kriteria as $k): ?>
                                                        <th><?= $k->kriteria ?></th>
                                                    <?php endforeach; ?>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableAnalisa">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
            $('#tableTopsis').DataTable({
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
            $("#btn-normalisasi").click(function() {
                $.ajax({
                    url: "<?= base_url('AdminController/hitung_topsis') ?>",
                    type: "POST",
                    dataType: "json",
                    success: function(res) {
                        if (res.status && Array.isArray(res.data)) {
                            // Ambil instance DataTable
                            var table = $('#tableTopsis').DataTable();

                            // Loop semua baris lewat DataTables API
                            table.rows().every(function() {
                                var rowData = this.data(); // ambil data array dari row
                                var namaPegawai = rowData[1]?.trim().toLowerCase();

                                // cari hasil di res.data
                                var match = res.data.find(function(item) {
                                    return item.nama.toLowerCase() === namaPegawai;
                                });

                                if (match) {
                                    // Pastikan angka dibulatkan 4 desimal untuk konsistensi
                                    rowData[rowData.length - 2] = parseFloat(match.ci).toFixed(4); // Nilai Preferensi
                                    rowData[rowData.length - 1] = match.rank; // Ranking Akhir
                                    this.data(rowData); // set data baru ke row
                                }
                            });

                            // Refresh tabel tanpa reload
                            table.draw(false);

                            // Notifikasi SweetAlert
                            Swal.fire({
                                title: "Sukses!",
                                text: "Proses perengkingan TOPSIS selesai dan data tersimpan di database.",
                                icon: "success",
                                timer: 3000,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Data perengkingan tidak valid atau kosong.",
                                icon: "error"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Error!",
                            text: "Terjadi kesalahan saat memproses data.",
                            icon: "error"
                        });
                        console.error("AJAX Error:", status, error);
                    }
                });
            });
        });
    </script>


    <script>
        // let dataToSave = []; // Variabel global untuk menyimpan data analisa

        // document.getElementById('btn-analisa').addEventListener('click', function() {
        //     const tableNormalisasi = document.querySelectorAll('#tableNormalisasi tr');
        //     const tableAnalisa = document.getElementById('tableAnalisa');
        //     let jumlahKriteria = tableNormalisasi[0].querySelectorAll('td').length - 2;
        //     let bobot = Array(jumlahKriteria).fill(1 / jumlahKriteria);

        //     tableAnalisa.innerHTML = ''; // Kosongkan tabel hasil analisa sebelumnya
        //     dataToSave = []; // Kosongkan data sebelumnya

        //     tableNormalisasi.forEach((row, index) => {
        //         const cells = row.querySelectorAll('td');
        //         if (cells.length === 0) return; // skip baris kosong

        //         let namaPegawai = cells[1].innerText;
        //         let nilaiAkhir = 0;
        //         let kolomKriteria = '';

        //         bobot.forEach((b, i) => {
        //             let nilai = parseFloat(cells[i + 2].innerText) || 0;
        //             let nilaiBobot = (nilai * b).toFixed(4);
        //             nilaiAkhir += nilai * b;

        //             kolomKriteria += `<td>${nilaiBobot}</td>`;
        //         });

        //         let total = Math.round(nilaiAkhir * 100) / 1;

        //         dataToSave.push({
        //             namaPegawai: namaPegawai,
        //             total: total
        //         });

        //         let tr = document.createElement('tr');
        //         tr.innerHTML = `
        //         <td>${index + 1}</td>
        //         <td>${namaPegawai}</td>
        //         ${kolomKriteria}
        //         <td><strong>${total}</strong></td>
        //     `;
        //         tableAnalisa.appendChild(tr);
        //     });

        //     // Tidak langsung simpan di sini
        // });

        // // Tombol Simpan Analisa
        // document.getElementById('btn-simpan').addEventListener('click', function() {
        //     if (dataToSave.length === 0) {
        //         Swal.fire({
        //             icon: 'warning',
        //             title: 'Peringatan',
        //             text: 'Silakan lakukan proses analisa terlebih dahulu sebelum menyimpan.'
        //         });
        //         return;
        //     }

        //     saveDataToDatabase(dataToSave);
        // });

        // $('#btn-clear-analisa').on('click', function() {
        //     $('#tableAnalisa').html('');
        //     dataToSave = []; // Reset juga data yang akan disimpan
        // });

        function saveDataToDatabase(data) {
            $.ajax({
                url: '<?= base_url("AdminController/saveAnalisa") ?>',
                type: 'POST',
                data: {
                    analisa_data: JSON.stringify(data)
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            showConfirmButton: true
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
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat memproses permintaan: ' + error
                    });
                }
            });
        }
    </script>
    <!-- <script>
        const rowsPerPage = 5;
        let currentPage = 1;
        let filteredData = Object.entries(pegawaiData); // Convert associative object to array

        function renderTable(data) {
            const tbody = document.getElementById("tableBody");
            tbody.innerHTML = "";

            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedData = data.slice(start, end);

            paginatedData.forEach(([nama, nilaiKriteria], index) => {
                let rowHTML = `<tr>
                <td>${start + index + 1}</td>
                <td>${nama}</td>`;

                kriteriaHeader.forEach(k => {
                    rowHTML += `<td>${nilaiKriteria[k] !== undefined ? nilaiKriteria[k] : '-'}</td>`;
                });

                rowHTML += `</tr>`;
                tbody.innerHTML += rowHTML;
            });
        }

        function renderPagination(data) {
            const pagination = document.getElementById("pagination");
            pagination.innerHTML = "";

            const pageCount = Math.ceil(data.length / rowsPerPage);

            for (let i = 1; i <= pageCount; i++) {
                const button = document.createElement("button");
                button.textContent = i;
                button.classList.add("btn", "btn-sm", "mx-1", (i === currentPage ? "btn-primary" : "btn-outline-primary"));
                button.addEventListener("click", function() {
                    currentPage = i;
                    renderTable(filteredData);
                    renderPagination(filteredData);
                });
                pagination.appendChild(button);
            }
        }

        function updateTotalData(data) {
            document.getElementById("total_data").textContent = data.length;
        }

        // Jika kamu ingin search: pastikan ada inputnya
        const searchInput = document.getElementById("searchInput");
        if (searchInput) {
            searchInput.addEventListener("input", function(e) {
                const keyword = e.target.value.toLowerCase();
                filteredData = Object.entries(pegawaiData).filter(([nama, nilai]) =>
                    nama.toLowerCase().includes(keyword)
                );
                currentPage = 1;
                renderTable(filteredData);
                renderPagination(filteredData);
                updateTotalData(filteredData);
            });
        }

        // Inisialisasi pertama
        renderTable(filteredData);
        renderPagination(filteredData);
        updateTotalData(filteredData);
    </script> -->
</body>

</html>