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
                                <i class="mdi mdi-account"></i>
                            </span> Data Nilai Karyawan
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
                                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                                        <a class="btn btn-primary mb-2 mb-md-0" href="<?= base_url() ?>./AdminController/tambahNilai">
                                            <i class="mdi mdi-plus"></i> Tambah Data Nilai
                                        </a>
                                        <button id="btn-delete-selected" class="btn btn-danger mb-2 mb-md-0">
                                            <i class="mdi mdi-delete"></i> Hapus Terpilih
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="nilaiTable">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="checkAll"></th>
                                                    <th> # </th>
                                                    <th> Nama Pegawai </th>
                                                    <th> Kriteria </th>
                                                    <th> Nilai </th>
                                                    <th> Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                                <?php $no = 1;
                                                foreach ($nilai_karyawan as $nk): ?>
                                                    <tr>
                                                        <td><input type="checkbox" class="checkItem" value="<?= $nk->id ?>"></td>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $nk->nama_pegawai ?></td>
                                                        <td><?= $nk->kriteria ?></td>
                                                        <td><?= $nk->nilai ?></td>
                                                        <td>
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-danger btn-sm btn-delete"
                                                                data-id="<?= $nk->id ?>">Hapus</a>
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
            $('#nilaiTable').DataTable({
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
            // Centang semua
            $('#checkAll').on('click', function() {
                $('.checkItem').prop('checked', this.checked);
            });

            // Hapus terpilih
            $('#btn-delete-selected').click(function() {
                var ids = [];
                $('.checkItem:checked').each(function() {
                    ids.push($(this).val());
                });

                if (ids.length === 0) {
                    Swal.fire('Peringatan', 'Pilih data yang akan dihapus!', 'warning');
                    return;
                }

                Swal.fire({
                    title: 'Yakin?',
                    text: "Data yang dipilih akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?= base_url('AdminController/delete_multiple_nilai') ?>",
                            type: "POST",
                            data: {
                                ids: ids
                            },
                            success: function(res) {
                                Swal.fire('Sukses!', 'Data berhasil dihapus.', 'success')
                                    .then(() => location.reload());
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let id = $(this).data('id');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('AdminController/hapusNilai') ?>',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: response.message,
                                    showConfirmButton: true
                                }).then(() => {
                                    location.reload(); // Refresh halaman atau bisa hapus baris tabel langsung
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan saat menghapus data!',
                            });
                        }
                    });
                }
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                let value = $(this).val().toLowerCase(); // Ambil dan ubah ke huruf kecil
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1); // Sembunyikan/bariskan berdasarkan kecocokan
                });
            });
        });
    </script> -->
    <!-- <script>
        const nilaiKaryawanData = <?= json_encode($nilai_karyawan) ?>; // Ambil dari PHP (harus dalam bentuk array)
        const rowsPerPage = 5;
        let currentPage = 1;
        let filteredData = nilaiKaryawanData;

        function renderTable(data) {
            const tbody = document.getElementById("tableBody");
            tbody.innerHTML = "";

            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedData = data.slice(start, end);

            paginatedData.forEach((item, index) => {
                const row = `<tr>
                <td>${start + index + 1}</td>
                <td>${item.nama_pegawai}</td>
                <td>${item.kriteria}</td>
                <td>${item.nilai}</td>
                <td>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-delete" data-id="${item.id}">Hapus</a>
                </td>
            </tr>`;
                tbody.innerHTML += row;
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


        document.getElementById("searchInput").addEventListener("input", function(e) {
            const keyword = e.target.value.toLowerCase();
            filteredData = nilaiKaryawanData.filter(item =>
                item.nama.toLowerCase().includes(keyword) ||
                item.kode_nip.toLowerCase().includes(keyword)
            );
            currentPage = 1;
            renderTable(filteredData);
            renderPagination(filteredData);
            updateTotalData(filteredData);
        });

        // Inisialisasi pertama
        renderTable(filteredData);
        renderPagination(filteredData);
        updateTotalData(filteredData);
    </script> -->




</body>

</html>