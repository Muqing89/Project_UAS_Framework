<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($laporan) ? 'Edit Laporan UKM' : 'Pengajuan Laporan UKM' ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/text.css') ?>" rel="stylesheet">
</head>

<body style="background-color: #1e3af7;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="<?= base_url('img/unitomo.png') ?>" alt="Logo Unitomo" style="height: 70px;">
                            <h3 class="mt-3 text-primary"><?= isset($laporan) ? 'Edit Laporan UKM' : 'Pengajuan Laporan UKM' ?></h3>
                        </div>

                        <!-- Flash Error (Opsional) -->
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Form -->
                        <form action="<?= isset($laporan) ? base_url('updatelaporanOrmawa/' . $laporan['id']) : base_url('simpanLaporan') ?>" method="post" enctype="multipart/form-data">

                            <!-- Nama UKM -->
                            <div class="mb-3">
                                <label for="nama_ukm" class="form-label">Nama UKM</label>
                                <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" value="<?= isset($laporan) ? esc($laporan['nama_ukm']) : '' ?>" placeholder="Masukkan nama UKM" required>
                            </div>

                            <!-- Nama & Tanggal Kegiatan -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?= isset($laporan) ? esc($laporan['nama_kegiatan']) : '' ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_kegiatan" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" value="<?= isset($laporan) ? esc($laporan['tanggal_kegiatan']) : '' ?>" required>
                                </div>
                            </div>

                            <!-- Hasil Kegiatan -->
                            <div class="mb-3">
                                <label for="hasil_kegiatan" class="form-label">Hasil Kegiatan</label>
                                <textarea class="form-control" id="hasil_kegiatan" name="hasil_kegiatan" rows="3" required><?= isset($laporan) ? esc($laporan['hasil_kegiatan']) : '' ?></textarea>
                            </div>

                            <!-- Upload Dokumen -->
                            <div class="mb-3">
                                <label for="dokumen_laporan" class="form-label">Unggah Dokumen Laporan (PDF/DOCX)</label>
                                <input type="file" class="form-control" id="dokumen_laporan" name="dokumen_laporan" accept=".pdf,.doc,.docx" <?= isset($laporan) ? '' : 'required' ?>>
                                <?php if (isset($laporan)) : ?>
                                    <small class="text-muted">Abaikan jika tidak ingin mengganti file. Saat ini: <strong><?= esc($laporan['dokumen_laporan']) ?></strong></small>
                                <?php else : ?>
                                    <small class="form-text text-muted">Maks. 2MB, format PDF/DOC/DOCX.</small>
                                <?php endif; ?>
                            </div>

                            <!-- Tombol -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success"><?= isset($laporan) ? 'Update' : 'Kirim' ?></button>
                                <a href="<?= base_url('laporanOrmawa') ?>" class="btn btn-secondary">Kembali</a>
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