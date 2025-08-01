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
                <a class="nav-link" href="dashboardWakilRektorII">
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
                        <a class="collapse-item" href="verifikasikegiatanWakilRektorII">Verifikasi Pengajuan <br> Kegiatan</a>
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
                        <a class="collapse-item" href="verifikasilaporanWakilRektorII">Verifikasi Pengajuan <br> Laporan</a>
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
                        <a class="collapse-item" href="verifikasikeuanganWakilRektorII">Pengecekan Keuangan</a>
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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Wakil Rektor II</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
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
                    <h1 class="h3 mb-2 text-gray-800">Pengecekan Keuangan UKM</h1>

                    <!-- Tabel Pengajuan Keuangan -->
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
                                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $row['id'] ?>">
                                                            Lihat Detail
                                                        </button>
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
    <?php foreach ($keuangan as $row): ?>
        <div class="modal fade" id="modalDetail<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel<?= $row['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="modalDetailLabel<?= $row['id'] ?>">Detail Pelaporan Keuangan</h5>
                        <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body text-left">
                        <p><strong>Nama UKM:</strong> <?= esc($row['nama_ukm']) ?></p>
                        <p><strong>Tanggal Pelaporan:</strong> <?= esc($row['tanggal_pelaporan']) ?></p>
                        <p><strong>Nama Ketua:</strong> <?= esc($row['nama_ketua']) ?></p>
                        <p><strong>Nama Bendahara:</strong> <?= esc($row['nama_bendahara']) ?></p>
                        <p><strong>Total Dana di Rekening:</strong> Rp<?= number_format($row['total_dana_rekening'], 0, ',', '.') ?></p>
                        <p><strong>Pengeluaran Bulan Lalu:</strong> Rp<?= number_format($row['pengeluaran_bulan_lalu'], 0, ',', '.') ?></p>
                        <p><strong>Bukti Rekening:</strong>
                            <a href="<?= base_url('uploads/bukti_transaksi/' . $row['bukti_rekening']) ?>" target="_blank" class="btn btn-sm btn-outline-info">Lihat Bukti</a>
                        </p>
                    </div>

                    <div class="modal-footer">
                        <!-- Tombol Komentar -->
                        <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#modalKomen<?= $row['id'] ?>" data-bs-dismiss="modal">Komentar</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- Modal Komentar -->
    <?php foreach ($keuangan as $row): ?>
        <div class="modal fade" id="modalKomen<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalKomenLabel<?= $row['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('simpanKomenKeuanganWR/' . $row['id']) ?>" method="post">
                    <?= csrf_field() ?> <!-- ✅ Tambahkan token CSRF agar aman -->
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title" id="modalKomenLabel<?= $row['id'] ?>">Komentar Wakil Rektor II</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="komentar_<?= $row['id'] ?>">Komentar</label>
                                <textarea name="komentar_wr" id="komentar_<?= $row['id'] ?>" rows="4" class="form-control" required><?= esc($row['komentar_wr'] ?? '') ?></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- JS -->
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