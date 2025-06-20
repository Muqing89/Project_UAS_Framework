<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Login Baru Percobaan
$routes->get('/', 'Login::index'); // Halaman login
$routes->post('/login/auth', 'Login::auth'); // Proses login

// Bagian Menu Ormawa
$routes->get('/dashboardOrmawa', 'Ormawa::dashboard');
$routes->get('/inputkegiatanOrmawa', 'Ormawa::inputkegiatan');
$routes->get('/inputlaporanOrmawa', 'Ormawa::inputlaporan');
$routes->get('/inputkeuanganOrmawa', 'Ormawa::inputkeuangan');
$routes->get('/kegiatanOrmawa', 'Ormawa::kegiatan');
$routes->get('/laporanOrmawa', 'Ormawa::laporan');
$routes->get('/keuanganOrmawa', 'Ormawa::keuangan');

// Bagian Menu Admin Kemahasiswaan
$routes->get('/dashboardAdminKemahasiswaan', 'AdminKemahasiswaan::dashboard');
$routes->get('/verifikasikegiatanAdminKemahasiswaan', 'AdminKemahasiswaan::verifikasikegiatan');
$routes->get('/verifikasilaporanAdminKemahasiswaan', 'AdminKemahasiswaan::verifikasilaporan');
$routes->get('/verifikasikeuanganAdminKemahasiswaan', 'AdminKemahasiswaan::verifikasikeuangan');

// Bagian Menu Wakil Rektor II
$routes->get('/dashboardWakilRektorII', 'WakilRektorII::dashboard');
$routes->get('/verifikasikegiatanWakilRektorII', 'WakilRektorII::verifikasikegiatan');
$routes->get('/verifikasilaporanWakilRektorII', 'WakilRektorII::verifikasilaporan');
$routes->get('/verifikasikeuanganWakilRektorII', 'WakilRektorII::verifikasikeuangan');


$routes->get('/tables', 'Home::tables');
$routes->get('/kegiatan', 'Home::kegiatan');
$routes->get('/keuangan', 'Home::keuangan');
$routes->get('/laporan', 'Home::laporan');

$routes->get('/inputkegiatan', 'Home::inputkegiatan');
$routes->get('/inputlaporan', 'Home::inputlaporan');
