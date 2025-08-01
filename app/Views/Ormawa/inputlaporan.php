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
                            <h3 class="mt-3 text-primary">Pengajuan Laporan UKM</h3>
                        </div>

                        <!-- Form dengan enctype multipart untuk unggah file -->
                        <form action="/simpanLaporan" method="post" enctype="multipart/form-data">

                            <!-- Nama UKM Input Bebas -->
                            <div class="mb-3">
                                <label for="nama_ukm">Nama UKM</label>
                                <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" placeholder="Masukkan nama UKM" required>
                            </div>


                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_kegiatan">Nama Kegiatan</label>
                                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_kegiatan">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="hasil_kegiatan">Hasil Kegiatan</label>
                                <textarea class="form-control" id="hasil_kegiatan" name="hasil_kegiatan" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="dokumen_laporan">Unggah Dokumen Laporan (PDF/DOCX)</label>
                                <input type="file" class="form-control" id="dokumen_laporan" name="dokumen_laporan" accept=".pdf,.doc,.docx" required>
                                <small class="form-text text-muted">Maks. 2MB, format PDF/DOC/DOCX.</small>
                            </div>

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