-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2025 pada 08.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ukm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan_ukm`
--

CREATE TABLE `keuangan_ukm` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(100) DEFAULT NULL,
  `tanggal_pelaporan` date DEFAULT NULL,
  `nama_ketua` varchar(100) DEFAULT NULL,
  `nama_bendahara` varchar(100) DEFAULT NULL,
  `total_dana_rekening` decimal(15,2) DEFAULT NULL,
  `pengeluaran_bulan_lalu` decimal(15,2) DEFAULT NULL,
  `bukti_rekening` varchar(255) DEFAULT NULL,
  `komentar_admin` text DEFAULT NULL,
  `komentar_wr` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keuangan_ukm`
--

INSERT INTO `keuangan_ukm` (`id`, `nama_ukm`, `tanggal_pelaporan`, `nama_ketua`, `nama_bendahara`, `total_dana_rekening`, `pengeluaran_bulan_lalu`, `bukti_rekening`, `komentar_admin`, `komentar_wr`, `created_at`) VALUES
(8, 'HIMATIFTA', '2025-07-31', 'Yosefin', 'Zidan', 1000000.00, 850000.00, '1753068705_cc81f501eec6a27804c8.pdf', NULL, NULL, '2025-07-20 20:31:45'),
(9, 'Menwa', '2025-07-30', 'Jose', 'Alif', 2000000.00, 1500000.00, '1753068789_ed783adb425437095ba1.pdf', NULL, NULL, '2025-07-20 20:33:09'),
(10, 'HIMATIFTA', '2025-07-31', 'Alif Ilmansyah', 'Nadila Yuliati', 100000.00, 800000.00, '1753758699_460166441a618de35fe5.pdf', NULL, NULL, '2025-07-28 20:11:39'),
(11, 'renang', '2025-08-03', 'Jose', 'Zidan', 1000000.00, 500000.00, '1754213374_05f94c8d6812dd316a27.pdf', NULL, NULL, '2025-08-03 02:29:34'),
(12, 'seni musik', '2025-08-15', 'Alif Ilmansyah', 'Zidan', 2000000.00, 800000.00, '1754361016_06c7267af393f394a357.pdf', NULL, NULL, '2025-08-04 19:30:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan_ukm2`
--

CREATE TABLE `keuangan_ukm2` (
  `id` int(11) NOT NULL,
  `jenis_ukm` varchar(100) DEFAULT NULL,
  `tema_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_transaksi` enum('Pemasukan','Pengeluaran') DEFAULT NULL,
  `jumlah_dana` decimal(15,2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `bukti_transaksi` varchar(255) DEFAULT NULL,
  `status_admin` enum('Belum Diverifikasi','Terverifikasi','Ditolak') DEFAULT 'Belum Diverifikasi',
  `status_wr` enum('Menunggu Admin','Belum Diverifikasi','Disetujui WR II','Ditolak') DEFAULT 'Menunggu Admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `komentar_admin` text DEFAULT NULL,
  `komentar_wr` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status_baca` enum('terbaca','belum') DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `pesan`, `tipe`, `waktu`, `status_baca`) VALUES
(37, 'Kegiatan \"Konser Live Musik yang diisi oleh performa dari band UKM Musik Unitomo, solo musik mahasiswa UKM Musik Unitomo, serta band yang diundang seperti Dewa 19.\r\n\" dari UKM Musik telah diverifikasi oleh Admin.', 'verifikasi_kegiatan', '2025-07-21 10:33:43', 'belum'),
(38, 'Kegiatan \"Turnamen Futsal yang dilaksanakan oleh UKM Futsal untuk mahasiswa Unitomo.\" dari UKM UKM Futsal ditolak oleh Admin.', 'penolakan_kegiatan', '2025-07-21 10:33:47', 'belum'),
(39, 'Laporan untuk kegiatan \"Pelatihan P3K\" dari UKM HIMASOS telah diverifikasi oleh Admin.', 'verifikasi_laporan', '2025-07-21 10:34:10', 'belum'),
(40, 'Laporan untuk kegiatan \"Workshop Java \" dari UKM HIMATIFTA ditolak oleh Admin.', 'penolakan_laporan', '2025-07-21 10:34:15', 'belum'),
(41, 'Kegiatan \"Konser Live Musik yang diisi oleh performa dari band UKM Musik Unitomo, solo musik mahasiswa UKM Musik Unitomo, serta band yang diundang seperti Dewa 19.\r\n\" dari UKM Musik telah disetujui oleh Wakil Rektor II.', 'verifikasi_kegiatan_wr', '2025-07-21 10:34:58', 'belum'),
(42, 'Laporan untuk kegiatan \"Pelatihan P3K\" dari UKM HIMASOS telah disetujui oleh Wakil Rektor II.', 'verifikasi_laporan_wr', '2025-07-21 10:35:30', 'belum'),
(43, 'Kegiatan \"Blablabla\" dari UKM seni musik telah diverifikasi oleh Admin.', 'verifikasi_kegiatan', '2025-07-29 10:44:43', 'belum'),
(44, 'Kegiatan \"Blablabla\" dari UKM seni musik ditolak oleh Wakil Rektor II.', 'penolakan_kegiatan_wr', '2025-07-29 10:45:26', 'belum'),
(45, 'Kegiatan \"Blablabla\" dari UKM seni musik telah disetujui oleh Wakil Rektor II.', 'verifikasi_kegiatan_wr', '2025-07-29 10:45:56', 'belum'),
(46, 'Kegiatan \".....\" dari UKM HIMATIFTA telah diverifikasi oleh Admin.', 'verifikasi_kegiatan', '2025-08-04 14:34:13', 'belum'),
(47, 'Kegiatan \"Kegiatan Futsal di Kampus\" dari UKM Hima Futsal ditolak oleh Admin.', 'penolakan_kegiatan', '2025-08-05 09:35:27', 'belum'),
(48, 'Kegiatan \".....\" dari UKM HIMATIFTA telah disetujui oleh Wakil Rektor II.', 'verifikasi_kegiatan_wr', '2025-08-05 09:38:17', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_kegiatan`
--

CREATE TABLE `pengajuan_kegiatan` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(100) NOT NULL,
  `tempat_kegiatan` varchar(100) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `ketua_pelaksana` varchar(100) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `waktu_kegiatan` time NOT NULL,
  `target_peserta` varchar(100) NOT NULL,
  `proposal_kegiatan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_admin` enum('Belum Diverifikasi','Terverifikasi','Ditolak') NOT NULL DEFAULT 'Belum Diverifikasi',
  `komentar_admin` text DEFAULT NULL,
  `status_wr` enum('Menunggu Admin','Belum Diverifikasi','Disetujui WR II','Ditolak') NOT NULL DEFAULT 'Menunggu Admin',
  `komentar_wr` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan_kegiatan`
--

INSERT INTO `pengajuan_kegiatan` (`id`, `nama_ukm`, `tempat_kegiatan`, `jumlah_peserta`, `ketua_pelaksana`, `tanggal_kegiatan`, `waktu_kegiatan`, `target_peserta`, `proposal_kegiatan`, `deskripsi`, `created_at`, `updated_at`, `status_admin`, `komentar_admin`, `status_wr`, `komentar_wr`) VALUES
(26, 'UKM Futsal', 'Lapangan Futsal Unitomo', 70, 'Pras Sunur', '2025-07-28', '15:00:00', 'Hanya Mahasiswa Terdaftar Unitomo', '1753068160_bf67ee604c11c3557514.pdf', 'Turnamen Futsal yang dilaksanakan oleh UKM Futsal untuk mahasiswa Unitomo.', '2025-07-21 10:22:40', '2025-07-21 10:33:47', 'Ditolak', NULL, 'Menunggu Admin', NULL),
(28, 'HIMATIFTA', 'Lapangan Unitomo', 20, 'Alif', '2025-07-31', '11:53:00', 'Mahasiswa dan Dosen', '1753757525_d87b4441c00318854bfd.pdf', '.....', '2025-07-29 02:52:05', '2025-08-05 02:38:17', 'Terverifikasi', 'Keliru\r\n', 'Disetujui WR II', NULL),
(29, 'seni musik', 'Aula', 50, 'Jose', '2025-07-31', '08:00:00', 'Mahasiswa', '1753760635_35f999fd689f35594b52.docx', 'Blablabla', '2025-07-29 03:43:55', '2025-07-29 03:45:56', 'Terverifikasi', NULL, 'Disetujui WR II', NULL),
(30, 'Bebas2', 'Lapangan Unitomo', 50, 'Jose', '2025-08-06', '08:00:00', 'Mahasiswa', '1754292707_80d8e973d3d4252bd215.pdf', 'Bebas2', '2025-08-04 07:31:47', '2025-08-04 07:31:47', 'Belum Diverifikasi', NULL, 'Menunggu Admin', NULL),
(31, 'Hima Futsal', 'Kampus', 38, 'Prass', '2025-08-06', '09:00:00', 'Mahasiswa dan Umum', '1754361262_81ef255ed5a44cd580e4.docx', 'Kegiatan Futsal di Kampus', '2025-08-05 02:34:22', '2025-08-05 02:35:27', 'Ditolak', NULL, 'Menunggu Admin', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_kegiatan2`
--

CREATE TABLE `pengajuan_kegiatan2` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_ukm` varchar(50) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `waktu_kegiatan` time NOT NULL,
  `target_peserta` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_pengajuan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_admin` varchar(50) NOT NULL DEFAULT 'Belum Diverifikasi',
  `status_wr` varchar(50) NOT NULL DEFAULT 'Menunggu Admin',
  `komentar_admin` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan_kegiatan2`
--

INSERT INTO `pengajuan_kegiatan2` (`id`, `nama`, `jenis_ukm`, `tema`, `tempat`, `jumlah_peserta`, `penanggung_jawab`, `tanggal_kegiatan`, `waktu_kegiatan`, `target_peserta`, `deskripsi`, `tanggal_pengajuan`, `status_admin`, `status_wr`, `komentar_admin`) VALUES
(31, 'asdasd', 'Seni dan Budaya', 'Lomba Futsal', 'feeee', 12, 'asd', '2025-07-12', '16:38:00', 'asdasd', 'asdasd', '2025-07-04 08:37:44', 'Belum Diverifikasi', 'Menunggu Admin', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_laporan`
--

CREATE TABLE `pengajuan_laporan` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(255) DEFAULT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `hasil_kegiatan` text NOT NULL,
  `dokumen_laporan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status_admin` enum('Belum Diverifikasi','Terverifikasi','Ditolak') DEFAULT 'Belum Diverifikasi',
  `status_wr` enum('Menunggu Admin','Belum Diverifikasi','Disetujui WR II','Ditolak') DEFAULT 'Menunggu Admin',
  `komentar_admin` text DEFAULT NULL,
  `komentar_wr` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan_laporan`
--

INSERT INTO `pengajuan_laporan` (`id`, `nama_ukm`, `nama_kegiatan`, `tanggal_kegiatan`, `hasil_kegiatan`, `dokumen_laporan`, `created_at`, `status_admin`, `status_wr`, `komentar_admin`, `komentar_wr`, `updated_at`) VALUES
(29, 'HIMASOS', 'Pelatihan P3K', '2025-07-23', 'Melatih Mahasiswa untuk menerapkan pertolongan pertama terhadap korban kecelakaan.', '1753068478_375085a470360fa05a8f.docx', '2025-07-21 03:27:58', 'Terverifikasi', 'Disetujui WR II', NULL, NULL, '2025-07-21 03:35:30'),
(30, 'HIMATIFTA', 'Workshop Java ', '2025-07-24', 'Ngopi kita gak coding sama sekali.', '1753068554_8c6ff90bae8af1f2b14f.docx', '2025-07-21 03:29:14', 'Ditolak', 'Menunggu Admin', NULL, NULL, '2025-07-21 03:34:15'),
(31, 'HIMATIFTA', 'Seminar', '2025-07-31', 'HASIL', '1753758726_a2c6cc75dd2920e5ab02.pdf', '2025-07-29 03:12:06', 'Belum Diverifikasi', 'Menunggu Admin', NULL, NULL, '2025-07-29 03:12:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','ormawa','wakil_rektor') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin_kemahasiswaan', '123456', 'admin', '2025-06-20 18:44:49', '2025-07-18 09:24:09'),
(2, 'ormawa1', '12345', 'ormawa', '2025-06-20 18:44:49', '2025-07-18 08:35:11'),
(3, 'wakilrektor2', '123456', 'wakil_rektor', '2025-06-20 18:44:49', '2025-07-18 09:36:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keuangan_ukm`
--
ALTER TABLE `keuangan_ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keuangan_ukm2`
--
ALTER TABLE `keuangan_ukm2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_kegiatan`
--
ALTER TABLE `pengajuan_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_kegiatan2`
--
ALTER TABLE `pengajuan_kegiatan2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_laporan`
--
ALTER TABLE `pengajuan_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keuangan_ukm`
--
ALTER TABLE `keuangan_ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `keuangan_ukm2`
--
ALTER TABLE `keuangan_ukm2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_kegiatan`
--
ALTER TABLE `pengajuan_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_kegiatan2`
--
ALTER TABLE `pengajuan_kegiatan2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_laporan`
--
ALTER TABLE `pengajuan_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
