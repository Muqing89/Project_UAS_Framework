<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistem Informasi UKM</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom-login.css" rel="stylesheet">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="card login-card">
                <div class="card-body p-5">
                    <div class="text-center">
                        <img src="/img/Unitomo_1.png" class="mb-3" alt="Logo Unitomo">
                        <h1 class="h4 text-gray-900 mb-2">Selamat Datang!</h1>
                        <p class="mb-4">Sistem Informasi UKM Unitomo</p>
                    </div>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger text-center">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form class="user" method="post" action="/login/auth">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </button>
                    </form>

                    <hr>
                    <div class="text-center">
                        <small>© Sistem Informasi UKM Unitomo</small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Vendor Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>