<!DOCTYPE html>
<html>

<head>
    <title>Input Kegiatan UKM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #1e3af7;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="<?= base_url('img/unitomo.png') ?>" alt="Logo Unitomo" style="height: 70px;">
                            <h3 class="mt-3 text-primary">Pengajuan Usulan Kegiatan UKM</h3>
                        </div>

                        <!-- Form Start -->
                        <form action="<?= base_url('simpanKegiatan') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama_ukm" class="form-label">Nama UKM <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" required placeholder="Masukkan Nama UKM">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ketua_pelaksana" class="form-label">Ketua Pelaksana <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="ketua_pelaksana" name="ketua_pelaksana" required placeholder="Masukkan nama ketua pelaksana">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempat_kegiatan" class="form-label">Tempat Pelaksanaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" required placeholder="Masukkan tempat pelaksanaan kegiatan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta (Perkiraan) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" min="1" required placeholder="Contoh: 50">
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="waktu_kegiatan" class="form-label">Waktu Kegiatan <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" id="waktu_kegiatan" name="waktu_kegiatan" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="target_peserta" class="form-label">Target Peserta <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="target_peserta" name="target_peserta" required placeholder="Contoh: Mahasiswa UKM, Umum, dll">
                                    </div>
                                    <div class="mb-3">
                                        <label for="proposal_kegiatan" class="form-label">Upload Proposal Kegiatan (Word/PDF) <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" id="proposal_kegiatan" name="proposal_kegiatan" accept=".pdf,.doc,.docx" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Kegiatan <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required placeholder="Gambaran umum kegiatan"></textarea>
                            </div>

                            <!-- Tombol -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success me-2">Kirim</button>
                                <a href="<?= base_url('dashboardOrmawa') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                        <!-- Form End -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>