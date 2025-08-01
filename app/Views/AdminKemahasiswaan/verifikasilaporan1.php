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
                <a class="nav-link" href="dashboardAdminKemahasiswaan">
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
                        <a class="collapse-item" href="verifikasikegiatanAdminKemahasiswaan">Verifikasi Pengajuan <br> Kegiatan</a>
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
                        <a class="collapse-item" href="verifikasilaporanAdminKemahasiswaan">Verifikasi Pengajuan <br> Laporan</a>
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
                        <a class="collapse-item" href="verifikasikeuanganAdminKemahasiswaan">Pengecekan Keuangan</a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Kemahasiswaan</span>
                                <img class="img-profile rounded-circle"
                                    src="img/Admin.png">
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
                    <h1 class="h3 mb-2 text-gray-800">Verifikasi Laporan Kegiatan UKM</h1>

                    <!-- Tabel Pengajuan Laporan -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Verifikasi Laporan</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center align-middle" style="color: #000000;" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-primary" style="background-color: #f5f5f5; font-weight: bold;">
                                        <tr>
                                            <th>Nama UKM</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal</th>
                                            <th>Hasil Kegiatan</th>
                                            <th>Dokumen</th>
                                            <th>Aksi</th>
                                            <th>Status Admin</th>
                                            <th>Status WR II</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($laporan as $row) : ?>
                                            <tr>
                                                <td><?= esc($row['nama_ukm']) ?></td>
                                                <td><?= esc($row['nama_kegiatan']) ?></td>
                                                <td><?= esc($row['tanggal_kegiatan']) ?></td>
                                                <td><?= esc($row['hasil_kegiatan']) ?></td>
                                                <td>
                                                    <a href="<?= base_url('uploads/laporan/' . $row['dokumen_laporan']) ?>" target="_blank" class="btn btn-sm btn-outline-info">Lihat</a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDetail<?= $row['id'] ?>">
                                                        Lihat Detail
                                                    </button>
                                                </td>
                                                <td>
                                                    <?php if ($row['status_admin'] === 'Terverifikasi'): ?>
                                                        <span class="badge bg-success">Terverifikasi</span>
                                                    <?php elseif ($row['status_admin'] === 'Ditolak'): ?>
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    <?php elseif ($row['status_admin'] === 'Belum Diverifikasi'): ?>
                                                        <span class="badge bg-warning text-dark">Belum Diverifikasi</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-warning text-dark">Status Tidak Diketahui</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['status_wr'] === 'Disetujui WR II'): ?>
                                                        <span class="badge bg-success">Disetujui WR II</span>
                                                    <?php elseif ($row['status_wr'] === 'Ditolak'): ?>
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    <?php elseif ($row['status_wr'] === 'Belum Diverifikasi'): ?>
                                                        <span class="badge bg-secondary text-white">Menunggu Proses WR II</span>
                                                    <?php elseif ($row['status_wr'] === 'Menunggu Admin' || empty($row['status_wr'])): ?>
                                                        <span class="badge bg-light text-dark">Menunggu Verifikasi WR II</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-light text-dark">Status Tidak Diketahui</span>
                                                    <?php endif; ?>
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

    <!-- Modal Detail -->
    <?php foreach ($laporan as $row): ?>
        <div class="modal fade" id="modalDetail<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel<?= $row['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('prosesVerifikasiLaporan/' . $row['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalDetailLabel<?= $row['id'] ?>">Detail Laporan UKM</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body text-left">
                            <p><strong>Nama UKM:</strong> <?= esc($row['nama_ukm']) ?></p>
                            <p><strong>Nama Kegiatan:</strong> <?= esc($row['nama_kegiatan']) ?></p>
                            <p><strong>Tanggal:</strong> <?= esc($row['tanggal_kegiatan']) ?></p>
                            <p><strong>Hasil Kegiatan:</strong> <?= esc($row['hasil_kegiatan']) ?></p>
                            <p><strong>Dokumen:</strong> <a href="<?= base_url('uploads/laporan/' . $row['dokumen_laporan']) ?>" target="_blank">Lihat Dokumen</a></p>
                            <p><strong>Status:</strong> <?= esc($row['status_admin']) ?></p>
                        </div>

                        <div class="modal-footer">
                            <?php if ($row['status_admin'] === 'Belum Diverifikasi' || $row['status_admin'] === 'Ditolak') : ?>
                                <button type="submit" name="aksi" value="verifikasi" class="btn btn-success" onclick="return confirm('Yakin ingin memverifikasi laporan ini?')">Verifikasi</button>
                                <button type="submit" name="aksi" value="tolak" class="btn btn-danger" onclick="return confirm('Yakin ingin menolak laporan ini?')">Tolak</button>

                                <!-- Tombol Komentar -->
                                <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#modalKomen<?= $row['id'] ?>" data-dismiss="modal">Komentar</button>
                            <?php else : ?>
                                <button class="btn btn-secondary" disabled>Laporan sudah diverifikasi</button>
                            <?php endif; ?>

                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- Modal Komentar -->
    <?php foreach ($laporan as $row): ?>
        <div class="modal fade" id="modalKomen<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalKomenLabel<?= $row['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?= base_url('simpanKomenLaporanAdmin/' . $row['id']) ?>" method="post">
                    <?= csrf_field() ?> <!-- ✅ Tambahkan token CSRF agar aman -->
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title" id="modalKomenLabel<?= $row['id'] ?>">Komentar Admin</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="komentar_<?= $row['id'] ?>">Komentar</label>
                                <textarea name="komentar" id="komentar_<?= $row['id'] ?>" rows="4" class="form-control" required><?= esc($row['komentar_admin'] ?? '') ?></textarea>
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