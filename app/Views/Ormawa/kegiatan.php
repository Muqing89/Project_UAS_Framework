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
                    <h1 class="h3 mb-2 text-gray-800">Kegiatan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Usulan Kegiatan UKM</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center align-middle" id="dataTable" style="color: #000000;" width="100%" cellspacing="0">
                                    <thead class="table-primary" style="background-color: #f5f5f5; font-weight: bold;">
                                        <tr>
                                            <th>Nama UKM</th>
                                            <th>Ketua Pelaksana</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Tempat</th>
                                            <th>Aksi</th>
                                            <th>Status Admin</th>
                                            <th>Status WR II</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kegiatan as $row) : ?>
                                            <tr>
                                                <td><?= esc($row['nama_ukm']) ?></td>
                                                <td><?= esc($row['ketua_pelaksana']) ?></td>
                                                <td><?= esc($row['tanggal_kegiatan']) ?></td>
                                                <td><?= esc($row['tempat_kegiatan']) ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <button type="button" class="dropdown-item btn-detail"
                                                                    data-id="<?= $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#modalDetailKegiatan">
                                                                    Detail
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="<?= base_url('editkegiatanOrmawa/' . $row['id']) ?>">
                                                                    Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="<?= base_url('hapuskegiatanOrmawa/' . $row['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="margin: 0;">
                                                                    <button type="submit" class="dropdown-item text-danger" style="background: none; border: none; width: 100%; text-align: left;">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </td>


                                                <!-- Status Admin -->
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

                                                <!-- Status WR II -->
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

    <!-- Modal Detail Kegiatan -->
    <div class="modal fade" id="modalDetailKegiatan" tabindex="-1" aria-labelledby="modalDetailKegiatanLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalDetailKegiatanLabel">Detail Kegiatan UKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama UKM</th>
                            <td id="detailNamaUkmKegiatan"></td>
                        </tr>
                        <tr>
                            <th>Tempat Kegiatan</th>
                            <td id="detailTempatKegiatan"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Peserta</th>
                            <td id="detailJumlahPeserta"></td>
                        </tr>
                        <tr>
                            <th>Ketua Pelaksana</th>
                            <td id="detailKetuaPelaksana"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kegiatan</th>
                            <td id="detailTanggalKegiatan"></td>
                        </tr>
                        <tr>
                            <th>Waktu Kegiatan</th>
                            <td id="detailWaktuKegiatan"></td>
                        </tr>
                        <tr>
                            <th>Target Peserta</th>
                            <td id="detailTargetPeserta"></td>
                        </tr>
                        <tr>
                            <th>Proposal Kegiatan</th>
                            <td><a href="#" id="detailProposalKegiatan" target="_blank" class="btn btn-sm btn-info">Lihat Proposal</a></td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td id="detailDeskripsi"></td>
                        </tr>
                        <tr>
                            <th>Status Admin</th>
                            <td id="detailStatusAdmin"></td>
                        </tr>
                        <tr>
                            <th>Status WR II</th>
                            <td id="detailStatusWr"></td>
                        </tr>
                        <tr>
                            <th>Komentar Admin</th>
                            <td id="detailKomentarAdminKegiatan"></td>
                        </tr>
                        <tr>
                            <th>Komentar WR II</th>
                            <td id="detailKomentarWrKegiatan"></td>
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

                fetch(`/detailkegiatanOrmawa/${id}`)
                    .then(response => {
                        if (!response.ok) throw new Error('Gagal mengambil data');
                        return response.json();
                    })
                    .then(data => {
                        // Isi elemen modal dengan data dari server
                        document.getElementById('detailNamaUkmKegiatan').textContent = data.nama_ukm || '-';
                        document.getElementById('detailTempatKegiatan').textContent = data.tempat_kegiatan || '-';
                        document.getElementById('detailJumlahPeserta').textContent = data.jumlah_peserta || '-';
                        document.getElementById('detailKetuaPelaksana').textContent = data.ketua_pelaksana || '-';
                        document.getElementById('detailTanggalKegiatan').textContent = data.tanggal_kegiatan || '-';
                        document.getElementById('detailWaktuKegiatan').textContent = data.waktu_kegiatan || '-';
                        document.getElementById('detailTargetPeserta').textContent = data.target_peserta || '-';
                        document.getElementById('detailDeskripsi').textContent = data.deskripsi_kegiatan || '-';

                        // Link proposal
                        const proposalLink = document.getElementById('detailProposalKegiatan');
                        if (data.proposal_kegiatan) {
                            proposalLink.href = `/uploads/proposal/${data.proposal_kegiatan}`;
                            proposalLink.textContent = 'Lihat Proposal';
                            proposalLink.classList.remove('disabled');
                        } else {
                            proposalLink.href = '#';
                            proposalLink.textContent = 'Tidak Ada Proposal';
                            proposalLink.classList.add('disabled');
                        }

                        // Status dan Komentar
                        document.getElementById('detailStatusAdmin').textContent = data.status_admin || '-';
                        document.getElementById('detailStatusWr').textContent = data.status_wr || '-';
                        document.getElementById('detailKomentarAdminKegiatan').textContent = data.komentar_admin || '-';
                        document.getElementById('detailKomentarWrKegiatan').textContent = data.komentar_wr || '-';
                    })
                    .catch(error => {
                        console.error('Gagal memuat data detail kegiatan:', error);
                        alert('Gagal mengambil detail kegiatan.');
                    });
            });
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 5 JS Bundle (sudah termasuk Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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