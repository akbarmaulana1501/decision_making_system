<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>./resource/template/dist/assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-center p-5">
                            <img src="<?= base_url() ?>./resource/template/dist/assets/images/logo_sinarmas2.png" alt="">
                            <h3 class="text-center">Login</h3>
                            <form class="pt-3" id="loginForm">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url() ?>./resource/template/dist/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
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

    <script>
        $('#loginForm').on('submit', function(event) {
            event.preventDefault(); // Cegah reload
            var username = $('#username').val();
            var pass = $('#password').val();

            $.ajax({
                url: '<?php echo base_url() ?>./AuthController/login',
                type: 'POST',
                data: {
                    username: username,
                    password: pass
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Success",
                            text: "Anda Berhasil Login!",
                            showConfirmButton: true,
                        }).then(() => {
                            if (response.role == "admin") {
                                window.location.href = '<?php echo base_url() ?>AdminController/dashboard';
                            } else if (response.role == "bos") {
                                window.location.href = '<?php echo base_url() ?>BosController/dashboardBos';
                            }
                        });
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "Error",
                            text: "Password atau Username Salah!",
                            showConfirmButton: true,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Terjadi kesalahan pada server!",
                        showConfirmButton: true,
                    });
                }
            });
        });
    </script>
</body>

</html>