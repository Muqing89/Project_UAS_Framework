<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Login Baru Percobaan
$routes->get('/', 'Login::index'); // Halaman login
$routes->post('login/auth', 'Login::auth'); // Proses login
$routes->get('logout', 'Login::logout'); // Proses login

$routes->group('', ['filter' => 'role:ormawa'], function ($routes) {
    // Bagian Ormawa DIMULAI DARI SINI
    $routes->get('dashboardOrmawa', 'Ormawa::dashboard'); // Dashboard Ormawa
    $routes->get('generate-report', 'Ormawa::generateReport'); // Mengambil Data Bentuk PDF untuk kegiatan maupun laporan yang sudah diverifikasi
    $routes->get('profileOrmawa', 'Ormawa::profile'); // Menampilkan Profile Ormawa
    $routes->get('settingsOrmawa', 'Ormawa::setting'); // Menampilkan halaman untuk update kata sandi dan username
    $routes->post('settingsOrmawa/update', 'Ormawa::update'); // Menyimpan hasil kata sandi dan username yang sudah diperbarui ke database

    // Bagian Input Kegiatan
    $routes->get('inputkegiatanOrmawa', 'Ormawa::inputkegiatan'); // Input Kegiatan untuk Ormawa
    $routes->post('simpanKegiatan', 'Ormawa::simpanKegiatan'); // Simpan Kegiatan untuk Ormawa

    // Bagian Daftar Tabel Kegiatan
    $routes->get('kegiatanOrmawa', 'Ormawa::kegiatan'); // Menampilkan Data Kegiatan yang diajukan oleh Ormawa
    $routes->get('detailkegiatanOrmawa/(:num)', 'Ormawa::detailkegiatan/$1'); // Melihat detail dari data kegiatan yang diajukan
    $routes->get('editkegiatanOrmawa/(:num)', 'Ormawa::editkegiatan/$1'); // Mengedit data kegiatan yang sudah diajukan
    $routes->post('updatekegiatanOrmawa/(:num)', 'Ormawa::updatekegiatan/$1'); // Melakukan update terhadap data kegiatan yang sudah diperbarui
    $routes->post('hapuskegiatanOrmawa/(:num)', 'Ormawa::hapuskegiatan/$1'); // Melakukan penghapusan data kegiatan

    // Bagian Input Laporan
    $routes->get('inputlaporanOrmawa', 'Ormawa::inputlaporan'); // Input Laporan untuk Ormawa
    $routes->post('simpanLaporan', 'Ormawa::simpanLaporan'); // Simpan Laporan untuk Ormawa

    // Bagian Daftar Tabel Laporan
    $routes->get('laporanOrmawa', 'Ormawa::laporan'); // Menampilkan Data Laporan yang diajukan oleh Ormawa
    $routes->get('detailLaporan/(:num)', 'Ormawa::detailLaporan/$1'); // Melihat detail dari data laporan yang diajukan
    $routes->get('editlaporanOrmawa/(:num)', 'Ormawa::editlaporan/$1'); // Mengedit data laporan yang sudah diajukan
    $routes->post('updatelaporanOrmawa/(:num)', 'Ormawa::updatelaporan/$1'); // Melakukan update terhadap data laporan yang sudah diperbarui
    $routes->post('hapuslaporanOrmawa/(:num)', 'Ormawa::hapuslaporan/$1'); // Melakukan penghapusan data laporan


    //Bagian Input Keuangan 
    $routes->get('inputkeuanganOrmawa', 'Ormawa::inputkeuangan'); // Input Keuangan untuk Ormawa
    $routes->post('/keuangan/tambah', 'Ormawa::simpanKeuangan'); // Simpan Keuangan untuk Ormawa

    // Bagian Daftar Tabel Keuangan
    $routes->get('keuanganOrmawa', 'Ormawa::keuangan'); // Menampilkan Data Laporan yang diajukan oleh Ormawa
    $routes->get('detailKeuangan/(:num)', 'Ormawa::detailKeuangan/$1'); // Melihat detail dari data laporan yang diajukan
    $routes->get('editkeuanganOrmawa/(:num)', 'Ormawa::editkeuangan/$1'); // Mengedit data laporan yang sudah diajukan
    $routes->post('updatekeuanganOrmawa/(:num)', 'Ormawa::updatekeuangan/$1'); // Melakukan update terhadap data laporan yang sudah diperbarui
    $routes->post('hapuskeuanganOrmawa/(:num)', 'Ormawa::hapuskeuangan/$1'); // Melakukan penghapusan data laporan

});


// Dashboard Admin, hanya bisa diakses Admin
$routes->group('', ['filter' => 'role:admin'], function ($routes) {
    // Bagian Admin Kemahasiswaan DIMULAI DARI SINI
    $routes->get('dashboardAdminKemahasiswaan', 'AdminKemahasiswaan::dashboard'); // Dashboard Admin Kemahasiswaan
    $routes->get('profileAdmin', 'AdminKemahasiswaan::profil'); // Menampilkan Profile Admin Kemahasiswaan
    $routes->get('settingsAdmin', 'AdminKemahasiswaan::setting'); // Menampilkan halaman untuk update kata sandi dan username
    $routes->post('settingsAdmin/update', 'AdminKemahasiswaan::update'); // Menyimpan hasil kata sandi dan username yang sudah diperbarui ke database

    $routes->get('verifikasikegiatanAdminKemahasiswaan', 'AdminKemahasiswaan::verifikasikegiatan'); // Menampilkan data kegiatan yang diajukan oleh Ormawa
    $routes->get('verifikasilaporanAdminKemahasiswaan', 'AdminKemahasiswaan::verifikasilaporan'); // Menampilkan data laporan yang diajukan oleh Ormawa
    $routes->get('verifikasikeuanganAdminKemahasiswaan', 'AdminKemahasiswaan::verifikasikeuangan'); // Menampilkan data keuangan yang dikumpulkan oleh Ormawa

    // Bagian Kegiatan
    $routes->post('prosesVerifikasiKegiatan/(:num)', 'AdminKemahasiswaan::prosesVerifikasiKegiatan/$1'); // Proses Verifikasi Kegiatan Nomer sekian
    $routes->post('tolakKegiatan/(:num)', 'AdminKemahasiswaan::tolakKegiatan/$1'); // Proses Tolak Kegiatan Nomer sekian
    $routes->post('simpanKomenKegiatan/(:num)', 'AdminKemahasiswaan::simpanKomenKegiatan/$1'); // Proses Menyimpan Komen Kegiatan Nomer sekian

    // Bagian Laporan
    $routes->post('prosesVerifikasiLaporan/(:num)', 'AdminKemahasiswaan::prosesVerifikasiLaporan/$1'); // Proses Verifikasi Laporan Nomer sekian
    $routes->post('tolakLaporanAdmin/(:num)', 'AdminKemahasiswaan::tolakLaporan/$1'); // Proses Tolak Laporan Nomer sekian
    $routes->post('simpanKomenLaporanAdmin/(:num)', 'AdminKemahasiswaan::simpanKomenLaporan/$1'); // Proses Menyimpan Komen Laporan Nomer sekian

    // Bagian Keuangan
    $routes->post('simpanKomenKeuanganAdmin/(:num)', 'AdminKemahasiswaan::simpanKomenKeuanganAdmin/$1'); // Proses Menyimpan Komen Keuangan Nomer sekian

});


// Dashboard Wakil Rektor, hanya bisa diakses Wakil Rektor
$routes->group('', ['filter' => 'role:wakil_rektor'], function ($routes) {
    // Bagian Wakil Rektor II DIMULAI DARI SINI
    $routes->get('dashboardWakilRektorII', 'WakilRektorII::dashboard'); // Dashboard Admin Kemahasiswaan
    $routes->get('profileWakilRektorII', 'WakilRektorII::profil'); // Menampilkan Profile Wakil Rektor II

    // Pengaturan akun Wakil Rektor II
    $routes->get('settingsWakilRektor', 'WakilRektorII::setting'); // Menampilkan halaman untuk update kata sandi dan username
    $routes->post('settingsWakilRektor/update', 'WakilRektorII::update'); // Menyimpan hasil kata sandi dan username yang sudah diperbarui ke database


    $routes->get('verifikasikegiatanWakilRektorII', 'WakilRektorII::verifikasikegiatan'); // Menampilkan data kegiatan yang diajukan oleh Ormawa
    $routes->get('verifikasilaporanWakilRektorII', 'WakilRektorII::verifikasilaporan'); // Menampilkan data laporan yang diajukan oleh Ormawa
    $routes->get('verifikasikeuanganWakilRektorII', 'WakilRektorII::verifikasikeuangan'); // Menampilkan data keuangan yang dikumpulkan oleh Ormawa

    // Bagian Kegiatan
    $routes->post('verifikasiKegiatanWR/(:num)', 'WakilRektorII::verifikasiKegiatanWR/$1'); // Proses Verifikasi Kegiatan Nomer sekian
    $routes->post('tolakKegiatanWR/(:num)', 'WakilRektorII::tolakKegiatanWR/$1'); // Proses Tolak Kegiatan Nomer sekian
    $routes->post('simpanKomenKegiatanWR/(:num)', 'WakilRektorII::simpanKomenKegiatanWR/$1'); // Proses Menyimpan Komen Kegiatan Nomer sekian

    // Bagian Laporan
    $routes->post('verifikasilaporanWR/(:num)', 'WakilRektorII::prosesVerifikasiLaporanWR/$1'); // Proses Verifikasi Laporan Nomer sekian
    $routes->post('tolakLaporanWR/(:num)', 'WakilRektorII::tolakLaporanWR/$1'); // Proses Tolak Laporan Nomer sekian
    $routes->post('simpanKomenLaporanWR/(:num)', 'WakilRektorII::simpanKomenLaporanWR/$1'); // Proses Menyimpan Komen Laporan Nomer sekian

    // Bagian Keuangan
    $routes->post('simpanKomenKeuanganWR/(:num)', 'WakilRektorII::simpanKomenKeuanganWR/$1'); // Proses Menyimpan Komen Keuangan Nomer sekian

});


// Cadangan / Dummy
$routes->get('/tables', 'Home::tables');
$routes->get('/kegiatan', 'Home::kegiatan');
$routes->get('/keuangan', 'Home::keuangan');
$routes->get('/laporan', 'Home::laporan');
$routes->get('/inputkegiatan', 'Home::inputkegiatan');
$routes->get('/inputlaporan', 'Home::inputlaporan');

// Dummy Verifikasi Keuangan
$routes->post('prosesVerifikasiKeuangan/(:num)', 'AdminKemahasiswaan::prosesVerifikasiKeuangan/$1'); // Proses Menampilkan Data  Nomer sekian
$routes->post('tolakKeuanganAdmin/(:num)', 'AdminKemahasiswaan::tolakKeuangan/$1'); // Proses Tolak Laporan Nomer sekian 
$routes->post('verifikasiKeuanganWR/(:num)', 'WakilRektorII::prosesVerifikasiKeuanganWR/$1'); // Proses Menampilkan Data  Nomer sekian
$routes->post('tolakKeuanganWR/(:num)', 'WakilRektorII::tolakKeuanganWR/$1'); // Proses Tolak Laporan Nomer sekian 