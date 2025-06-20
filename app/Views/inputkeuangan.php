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
                            <h3 class="mt-3 text-primary">Pengajuan Keuangan UKM</h3>
                        </div>

                        <form action="/keuangan/tambah" method="post">
                            <!-- Jenis UKM -->
                            <div class="mb-3">
                                <label for="jenis_ukm">Jenis UKM</label>
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

                            <!-- Tanggal & Jenis Transaksi -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="jenis_transaksi">Jenis Transaksi</label>
                                    <select class="form-select" id="jenis_transaksi" name="jenis_transaksi" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Pemasukan">Pemasukan</option>
                                        <option value="Pengeluaran">Pengeluaran</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tema & Jumlah Dana -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tema_kegiatan">Tema Kegiatan</label>
                                    <input type="text" class="form-control" id="tema_kegiatan" name="tema_kegiatan" required placeholder="Contoh: Seminar Kewirausahaan">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="jumlah_dana">Jumlah Dana (Rp)</label>
                                    <input type="number" class="form-control" id="jumlah_dana" name="jumlah_dana" required placeholder="Contoh: 1000000">
                                </div>
                            </div>

                            <!-- Keterangan -->
                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required placeholder="Misal: Pembayaran sewa GOR kampus"></textarea>
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