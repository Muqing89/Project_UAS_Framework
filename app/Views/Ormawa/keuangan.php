<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi UKM - Kegiatan</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <br>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboardOrmawa">
                <div class="sidebar-brand-icon">
                    <img src="img/Unitomo_1.png" style="width: 100px; height: auto;" alt="Logo Unitomo">
                </div>
            </a>
            <br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboardOrmawa">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Kegiatan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKegiatan"
                    aria-expanded="true" aria-controls="collapseKegiatan">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kegiatan</span>
                </a>
                <div id="collapseKegiatan" class="collapse" aria-labelledby="headingKegiatan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilihan:</h6>
                        <a class="collapse-item" href="inputkegiatanOrmawa">Tambah Pengajuan <br> Kegiatan</a>
                        <a class="collapse-item" href="kegiatanOrmawa">Daftar Pengajuan <br> Kegiatan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Laporan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                    aria-expanded="true" aria-controls="collapseLaporan">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilihan:</h6>
                        <a class="collapse-item" href="inputlaporanOrmawa">Tambah Pengajuan <br> Laporan</a>
                        <a class="collapse-item" href="laporanOrmawa">Daftar Pengajuan <br> Laporan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Keuangan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKeuangan"
                    aria-expanded="true" aria-controls="collapseKeuangan">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Keuangan</span>
                </a>
                <div id="collapseKeuangan" class="collapse" aria-labelledby="headingKeuangan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilihan:</h6>
                        <a class="collapse-item" href="inputkeuanganOrmawa">Pengumpulan Laporan <br> Keuangan</a>
                        <a class="collapse-item" href="keuanganOrmawa">Daftar Laporan <br> Keuangan</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Ganti Search dengan Nama Web -->
                    <span class="d-none d-sm-inline-block font-weight-bold text-primary ml-3 my-2 my-md-0 h4">
                        SISTEM INFORMASI UKM UNITOMO
                    </span>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ormawa</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('profileOrmawa') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="settingsOrmawa">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Daftar Keuangan UKM</h1>

                    <!-- Tabel Pelaporan Keuangan UKM -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Keuangan UKM</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center align-middle" id="dataTable" style="color: #000000;" width="100%" cellspacing="0">
                                    <thead class="table-primary" style="background-color: #f5f5f5; font-weight: bold;">
                                        <tr>
                                            <th>Nama UKM</th>
                                            <th>Tanggal Pelaporan</th>
                                            <th>Nama Ketua</th>
                                            <th>Nama Bendahara</th>
                                            <th>Total Dana (Rp)</th>
                                            <th>Pengeluaran Bulan Lalu (Rp)</th>
                                            <th>Bukti Rekening</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($keuangan as $row) : ?>
                                            <tr>
                                                <td><?= esc($row['nama_ukm']) ?></td>
                                                <td><?= esc($row['tanggal_pelaporan']) ?></td>
                                                <td><?= esc($row['nama_ketua']) ?></td>
                                                <td><?= esc($row['nama_bendahara']) ?></td>
                                                <td>Rp<?= number_format($row['total_dana_rekening'], 0, ',', '.') ?></td>
                                                <td>Rp<?= number_format($row['pengeluaran_bulan_lalu'], 0, ',', '.') ?></td>
                                                <td>
                                                    <a href="<?= base_url('uploads/bukti_rekening/' . $row['bukti_rekening']) ?>" target="_blank" class="btn btn-sm btn-outline-info">Lihat</a>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <button type="button" class="dropdown-item btn-detail"
                                                                    data-id="<?= $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                                                    Detail
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="<?= base_url('editkeuanganOrmawa/' . $row['id']) ?>">Edit</a>
                                                            </li>
                                                            <li>
                                                                <form action="<?= base_url('hapuskeuanganOrmawa/' . $row['id']) ?>" method="post"
                                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="margin: 0;">
                                                                    <?= csrf_field() ?>
                                                                    <button type="submit" class="dropdown-item text-danger text-start w-100"
                                                                        style="background: none; border: none;">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </li>


                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Informasi UKM - Universitas Dr. Soetomo</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Keuangan -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalDetailLabel">Detail Laporan Keuangan UKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama UKM</th>
                            <td id="detailNamaUkm"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pelaporan</th>
                            <td id="detailTanggalPelaporan"></td>
                        </tr>
                        <tr>
                            <th>Nama Ketua UKM</th>
                            <td id="detailNamaKetua"></td>
                        </tr>
                        <tr>
                            <th>Nama Bendahara UKM</th>
                            <td id="detailNamaBendahara"></td>
                        </tr>
                        <tr>
                            <th>Total Dana di Rekening</th>
                            <td id="detailTotalDana"></td>
                        </tr>
                        <tr>
                            <th>Pengeluaran Bulan Lalu</th>
                            <td id="detailPengeluaran"></td>
                        </tr>
                        <tr>
                            <th>Bukti Rekening</th>
                            <td>
                                <a href="#" id="detailBuktiRekening" target="_blank" class="btn btn-sm btn-info">Lihat Bukti</a>
                            </td>
                        </tr>
                        <tr>
                            <th>Komentar Admin</th>
                            <td id="detailKomentarAdmin"></td>
                        </tr>
                        <tr>
                            <th>Komentar WR II</th>
                            <td id="detailKomentarWr"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.querySelectorAll('.btn-detail').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                fetch(`/detailKeuangan/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('detailNamaUkm').textContent = data.nama_ukm;
                        document.getElementById('detailTanggalPelaporan').textContent = data.tanggal_pelaporan;
                        document.getElementById('detailNamaKetua').textContent = data.nama_ketua;
                        document.getElementById('detailNamaBendahara').textContent = data.nama_bendahara;

                        document.getElementById('detailTotalDana').textContent = 'Rp ' + parseFloat(data.total_dana_rekening).toLocaleString('id-ID');
                        document.getElementById('detailPengeluaran').textContent = 'Rp ' + parseFloat(data.pengeluaran_bulan_lalu).toLocaleString('id-ID');

                        document.getElementById('detailBuktiRekening').href = `/uploads/bukti_rekening/${data.bukti_rekening}`;

                        document.getElementById('detailKomentarAdmin').textContent = data.komentar_admin || '-';
                        document.getElementById('detailKomentarWr').textContent = data.komentar_wr || '-';
                    })
                    .catch(error => {
                        console.error('Gagal memuat data detail keuangan:', error);
                        alert('Gagal mengambil detail keuangan.');
                    });
            });
        });
    </script>



    <!-- Bootstrap 5 JS Bundle (sudah termasuk Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>