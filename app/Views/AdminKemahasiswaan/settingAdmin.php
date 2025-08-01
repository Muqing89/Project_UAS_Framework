<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaturan Akun Admin Kemahasiswaan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/settings-ormawa.css') ?>">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card custom-card shadow-sm">
                    <a href="<?= base_url('dashboardAdminKemahasiswaan') ?>" class="btn-kembali">← Kembali</a>
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Pengaturan Akun Admin Kemahasiswaan</h5>
                    </div>

                    <div class="card-body">

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php elseif (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>

                        <form action="<?= base_url('/settingsAdmin/update') ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username"
                                    class="form-control" value="<?= esc($user['username']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_baru" class="form-label">Password Baru</label>
                                <input type="password" id="password_baru" name="password_baru"
                                    class="form-control" placeholder="Kosongkan jika tidak ingin ganti password">
                            </div>

                            <div class="mb-3">
                                <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                                <input type="password" id="konfirmasi_password" name="konfirmasi_password"
                                    class="form-control" placeholder="Ulangi password baru">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>