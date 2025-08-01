<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kegiatan UKM</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/text.css" rel="stylesheet">

</head>

<body style="background-color: #1e3af7;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="img/unitomo.png" alt="Logo Unitomo" style="height: 70px;">
                            <h3 class="mt-3 text-primary">Pelaporan Keuangan UKM</h3>
                        </div>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                            </div>
                        <?php endif; ?>

                        <form action="/keuangan/tambah" method="post" enctype="multipart/form-data">
                            <!-- Nama UKM -->
                            <div class="mb-3">
                                <label for="nama_ukm" class="form-label">Nama UKM</label>
                                <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" required placeholder="Contoh: UKM Olahraga">
                            </div>

                            <!-- Tanggal Pelaporan -->
                            <div class="mb-3">
                                <label for="tanggal_pelaporan" class="form-label">Tanggal Pelaporan</label>
                                <input type="date" class="form-control" id="tanggal_pelaporan" name="tanggal_pelaporan" required>
                            </div>

                            <!-- Nama Ketua dan Bendahara -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_ketua" class="form-label">Nama Ketua UKM</label>
                                    <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nama_bendahara" class="form-label">Nama Bendahara UKM</label>
                                    <input type="text" class="form-control" id="nama_bendahara" name="nama_bendahara" required>
                                </div>
                            </div>

                            <!-- Total Dana & Pengeluaran -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="total_dana_rekening" class="form-label">Total Dana di Rekening (Rp)</label>
                                    <input type="number" class="form-control" id="total_dana_rekening" name="total_dana_rekening" required placeholder="Contoh: 2500000" min="0">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pengeluaran_bulan_lalu" class="form-label">Pengeluaran Bulan Lalu (Rp)</label>
                                    <input type="number" class="form-control" id="pengeluaran_bulan_lalu" name="pengeluaran_bulan_lalu" required placeholder="Contoh: 500000" min="0">
                                </div>
                            </div>

                            <!-- Upload Bukti Rekening -->
                            <div class="mb-3">
                                <label for="bukti_rekening" class="form-label">Unggah Bukti Rekening</label>
                                <input type="file" class="form-control" id="bukti_rekening" name="bukti_rekening" accept=".pdf,.jpg,.jpeg,.png" required>
                                <small class="form-text text-muted">Maks. 2MB, format PDF/JPG/PNG.</small>
                            </div>

                            <!-- Tombol -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Kirim</button>
                                <a href="dashboardOrmawa" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>