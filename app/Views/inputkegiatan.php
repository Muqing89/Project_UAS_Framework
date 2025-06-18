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
            <div class="col-xl-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="img/unitomo.png" alt="Logo Unitomo" style="height: 70px;">
                            <h3 class="mt-3 text-danger">Pengajuan Kegiatan UKM</h3>
                        </div>

                        <!-- Alert Feedback -->
                        <div id="alert-success" class="alert alert-success d-none">
                            Kegiatan berhasil dikirim!
                        </div>
                        <div id="alert-error" class="alert alert-danger d-none">
                            Terjadi kesalahan saat mengirim kegiatan.
                        </div>

                        <!-- Form Start -->
                        <!-- Mulai dari <form> bagian saja yang direvisi -->
                        <form id="form-kegiatan" action="index.php/dashboard" method="post">
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan Nama Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_ukm" class="form-label">Jenis UKM <span class="text-danger">*</span></label>
                                        <select class="form-select" id="jenis_ukm" name="jenis_ukm" required>
                                            <option value="">-- Pilih Jenis UKM --</option>
                                            <option value="Olahraga">Olahraga</option>
                                            <option value="Seni dan Budaya">Seni dan Budaya</option>
                                            <option value="Kewirausahaan">Kewirausahaan</option>
                                            <option value="Riset dan Teknologi">Riset dan Teknologi</option>
                                            <option value="Kerohanian">Kerohanian</option>
                                            <option value="Lingkungan Hidup">Lingkungan Hidup</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tema" class="form-label">Tema Kegiatan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="tema" name="tema" required placeholder="Masukkan Tema Kegiatan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tujuan" class="form-label">Tujuan Kegiatan <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="tujuan" name="tujuan" rows="3" required placeholder="Tuliskan Tujuan Kegiatan"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal Kegiatan <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="waktu" class="form-label">Waktu Kegiatan <span class="text-danger">*</span></label>
                                        <input type="time" class="form-control" id="waktu" name="waktu" required>
                                    </div>
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tempat" class="form-label">Tempat Pelaksanaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="tempat" name="tempat" required placeholder="Masukkan Tempat Kegiatan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="target" class="form-label">Target Peserta <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="target" name="target" required placeholder="Contoh: Mahasiswa UKM, Umum, dll">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta (Perkiraan) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" required placeholder="Contoh: 50">
                                    </div>
                                    <div class="mb-3">
                                        <label for="penanggung_jawab" class="form-label">Penanggung Jawab <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" required placeholder="Masukkan nama penanggung jawab">
                                    </div>
                                    <div class="mb-3">
                                        <label for="anggaran" class="form-label">Anggaran Dana (Rp) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="anggaran" name="anggaran" required placeholder="Contoh: 1000000">
                                    </div>
                                </div>
                            </div>

                            <!-- Full Row: Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Kegiatan <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required placeholder="Gambaran umum kegiatan"></textarea>
                            </div>

                            <!-- Tombol -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success me-2">Kirim</button>
                                <a href="dashboard" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>

                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Optional: JS Alert Manual (Hanya digunakan jika pakai AJAX) -->
    <!-- Dihilangkan karena kita ingin form langsung terkirim -->
</body>

</html>