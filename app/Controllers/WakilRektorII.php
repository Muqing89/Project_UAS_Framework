<?php

namespace App\Controllers;

use App\Models\PengajuanKegiatanModel;

class WakilRektorII extends BaseController
{
    public function dashboard()
    {
        $kegiatan = new \App\Models\PengajuanKegiatanModel();
        $laporan  = new \App\Models\PengajuanLaporanModel();
        $keuangan = new \App\Models\KeuanganModel();
        // Menginisialisasi 3 model

        // === Kegiatan ===
        $kegiatan_disetujui = $kegiatan->where('status_wr', 'Disetujui WR II')->countAllResults();
        // Menghitung total kegiatan yang disetujui oleh Wakil Rektor II.
        $kegiatan_ditolak = $kegiatan
            ->groupStart()
            ->where('status_admin', 'Ditolak')
            ->orWhere('status_wr', 'Ditolak')
            ->groupEnd()
            ->countAllResults();
        // Menghitung total kegiatan yang ditolak, baik oleh admin kemahasiswaan maupun oleh WR II.
        $kegiatan_menunggu = ($kegiatan)
            ->groupStart()
            ->where('status_wr', 'Belum Diverifikasi')
            ->orWhere('status_wr', 'Menunggu Admin')
            ->groupEnd()
            ->where('status_admin !=', 'Ditolak')
            ->where('status_wr !=', 'Ditolak')
            ->countAllResults();
        // Menghitung total kegiatan yang masih menunggu verifikasi

        // === Laporan ===
        $laporan_disetujui = $laporan->where('status_wr', 'Disetujui WR II')->countAllResults();
        // Total laporan kegiatan yang sudah disetujui oleh WR II.
        $laporan_ditolak = $laporan
            ->groupStart()
            ->where('status_admin', 'Ditolak')
            ->orWhere('status_wr', 'Ditolak')
            ->groupEnd()
            ->countAllResults();
        // Total laporan kegiatan yang ditolak, baik oleh admin maupun WR II.
        $laporan_menunggu = $laporan
            ->groupStart()
            ->where('status_wr', 'Belum Diverifikasi')
            ->orWhere('status_wr', 'Menunggu Admin')
            ->groupEnd()
            ->where('status_admin !=', 'Ditolak')
            ->where('status_wr !=', 'Ditolak')
            ->countAllResults();
        // Laporan kegiatan yang belum diproses oleh WR II (masih dalam tahap menunggu), tetapi tidak ditolak.

        // === Total Pengeluaran Bulan Ini ===
        $bulan_ini = date('m');
        $tahun_ini = date('Y');
        // Ambil bulan dan tahun saat ini, untuk filter data keuangan bulan ini.

        $total_pengeluaran_bulan_ini = $keuangan
            ->where('MONTH(created_at)', $bulan_ini)
            ->where('YEAR(created_at)', $tahun_ini)
            ->selectSum('pengeluaran_bulan_lalu')
            ->first()['pengeluaran_bulan_lalu'] ?? 0;
        // Menjumlahkan total pengeluaran_bulan_lalu dari data keuangan yang dibuat bulan ini dan tahun ini.

        // === Data ke View ===
        $data = [
            // Untuk card & grafik
            'kegiatan_disetujui' => $kegiatan_disetujui,
            'kegiatan_ditolak' => $kegiatan_ditolak,
            'kegiatan_menunggu' => $kegiatan_menunggu,

            'laporan_disetujui' => $laporan_disetujui,
            'laporan_ditolak' => $laporan_ditolak,
            'laporan_menunggu' => $laporan_menunggu,

            'kegiatan_data' => [$kegiatan_disetujui, $kegiatan_ditolak, $kegiatan_menunggu],
            'laporan_data' => [$laporan_disetujui, $laporan_ditolak, $laporan_menunggu],

            'total_pengeluaran_bulan_ini' => $total_pengeluaran_bulan_ini
        ]; // Semua data disiapkan dalam bentuk array dan dikirim ke view dashboard3.

        return view('WakilRektorII/dashboard3', $data); // Menampilkan halaman dashboard milik Wakil Rektor II dengan seluruh data statistik.
    }
    public function verifikasikegiatan()
    // Mendefinisikan fungsi publik bernama verifikasikegiatan(), artinya fungsi ini bisa diakses langsung melalui URL (route) jika disetting di routes-nya.
    {
        $model = new PengajuanKegiatanModel(); // Membuat objek $model dari class PengajuanKegiatanModel.
        $data['kegiatan'] = $model->findAll(); // Mengambil semua data kegiatan dari database menggunakan fungsi findAll() bawaan CodeIgniter.

        return view('WakilRektorII/verifikasikegiatan2', $data); // ganti nama view jika perlu
        // Menampilkan view bernama verifikasikegiatan2 yang berada di folder app/Views/WakilRektorII/.
    }

    public function verifikasiKegiatanWR($id) // Fungsi ini menerima parameter $id, yaitu ID dari kegiatan yang akan diverifikasi.
    {
        $aksi = $this->request->getPost('aksi'); // Mengambil nilai dari form POST input dengan nama aksi.
        $model = new \App\Models\PengajuanKegiatanModel();
        $notifikasiModel = new \App\Models\NotifikasiModel();
        // Inisialisasi dua mode

        // Ambil data kegiatan (misalnya nama UKM dan nama kegiatan untuk notifikasi)
        $kegiatan = $model->find($id);
        // Mengambil data kegiatan berdasarkan ID dari database.

        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Data kegiatan tidak ditemukan.');
        } // Jika data kegiatan tidak ditemukan (misalnya ID salah atau dihapus), arahkan kembali ke halaman sebelumnya dengan pesan error.

        if ($aksi === 'verifikasi') {
            $data = [
                'status_wr' => 'Disetujui WR II'
            ]; // Update status kegiatan menjadi "Disetujui WR II".

            // Tambahkan notifikasi
            $notifikasiModel->insert([
                'pesan' => 'Kegiatan "' . $kegiatan['deskripsi'] . '" dari UKM ' . $kegiatan['nama_ukm'] . ' telah disetujui oleh Wakil Rektor II.',
                'tipe' => 'verifikasi_kegiatan_wr',
                'status_baca' => 'belum'
            ]); // Menambahkan notifikasi bahwa kegiatan telah disetujui.
        } elseif ($aksi === 'tolak') {
            $data = [
                'status_wr' => 'Ditolak'
            ]; // Update status kegiatan menjadi "Ditolak".

            // Tambahkan notifikasi ditolak
            $notifikasiModel->insert([
                'pesan' => 'Kegiatan "' . $kegiatan['deskripsi'] . '" dari UKM ' . $kegiatan['nama_ukm'] . ' ditolak oleh Wakil Rektor II.',
                'tipe' => 'penolakan_kegiatan_wr',
                'status_baca' => 'belum'
            ]); // Menambahkan notifikasi bahwa kegiatan ditolak.
        } else {
            return redirect()->back()->with('error', 'Aksi tidak valid.');
        } // Jika aksi bukan verifikasi atau tolak, tampilkan error.

        $model->update($id, $data);
        // Simpan perubahan status kegiatan ke database.
        return redirect()->to('/verifikasikegiatanWakilRektorII')->with('success', 'Status kegiatan berhasil diperbarui.');
        // Redirect ke halaman daftar kegiatan dengan pesan sukses.
    }

    public function tolakKegiatanWR($id) // Mendeklarasikan fungsi dengan parameter $id yang merujuk pada ID kegiatan yang ingin ditolak.
    {
        $model = new \App\Models\PengajuanKegiatanModel(); // Membuat instance model PengajuanKegiatanModel, yaitu model yang mengelola data tabel pengajuan kegiatan UKM.
        $model->update($id, ['status_wr' => 'Ditolak']); // Melakukan update data kegiatan dengan ID $id, mengubah field status_wr menjadi 'Ditolak'.
        return redirect()->to('/verifikasikegiatanWakilRektorII')->with('error', 'Kegiatan ditolak oleh WR II.');
        // Setelah update, pengguna diarahkan kembali ke halaman verifikasi kegiatan WR II.
    }

    public function simpanKomenKegiatanWR($id) // Mendefinisikan fungsi dengan parameter $id, yang merupakan ID dari kegiatan yang akan diberi komentar.
    {
        $model = new \App\Models\PengajuanKegiatanModel(); // Ganti sesuai nama model kamu
        // Membuat objek dari PengajuanKegiatanModel, yang mengakses tabel kegiatan di database.
        $komentar = $this->request->getPost('komentar');
        // Mengambil input dari form POST dengan name komentar. Data ini adalah isi komentar dari WR II.

        // Validasi komentar kosong (opsional)
        if (empty($komentar)) {
            return redirect()->to('/verifikasikegiatanWakilRektorII')->with('error', 'Komentar tidak boleh kosong.');
        } // Melakukan validasi sederhana. Jika komentar kosong, maka kembalikan ke halaman verifikasi kegiatan WR II dengan pesan error.

        // Update komentar WR ke database
        $model->update($id, [
            'komentar_wr' => $komentar
        ]); // Jika komentar tidak kosong. Update kolom komentar_wr pada baris kegiatan dengan ID tersebut di database.

        return redirect()->to('/verifikasikegiatanWakilRektorII')->with('success', 'Komentar berhasil disimpan.');
        // Setelah berhasil menyimpan komentar, pengguna diarahkan kembali ke halaman verifikasi
    }

    public function verifikasilaporan(): string // Mendefinisikan method controller bernama verifikasilaporan.
    {
        $model = new \App\Models\PengajuanLaporanModel();
        // Membuat objek dari PengajuanLaporanModel, yaitu model yang terhubung ke tabel laporan (pengajuan laporan UKM) di database.
        $data['laporan'] = $model->findAll(); // Ambil semua laporan
        // Mengambil semua data laporan dari database tanpa filter (semua status: disetujui, ditolak, menunggu, dll).

        return view('WakilRektorII/verifikasilaporan2', $data); // Kirim ke view
        // Mengembalikan view bernama verifikasilaporan2 yang ada di folder WakilRektorII/.
    }

    public function prosesVerifikasiLaporanWR($id) // Fungsi ini menerima $id, yaitu ID dari laporan kegiatan yang ingin diverifikasi atau ditolak
    {
        // Ambil Data dari Request
        $aksi = $this->request->getPost('aksi');
        $komentar = $this->request->getPost('komentar_wr');

        // Inisialisasi Model
        $model = new \App\Models\PengajuanLaporanModel();
        $notifikasiModel = new \App\Models\NotifikasiModel();

        // Ambil data laporan untuk keperluan notifikasi
        $laporan = $model->find($id);

        if (!$laporan) {
            return redirect()->back()->with('error', 'Data laporan tidak ditemukan.');
        } // Cari data laporan berdasarkan ID.

        if ($aksi === 'verifikasi') {
            $data = ['status_wr' => 'Disetujui WR II'];

            // Tambahkan notifikasi verifikasi oleh WR II
            $notifikasiModel->insert([
                'pesan' => 'Laporan untuk kegiatan "' . $laporan['nama_kegiatan'] . '" dari UKM ' . $laporan['nama_ukm'] . ' telah disetujui oleh Wakil Rektor II.',
                'tipe' => 'verifikasi_laporan_wr',
                'status_baca' => 'belum'
            ]); // Update status laporan menjadi Disetujui WR II. Tambahkan notifikasi bahwa laporan telah disetujui oleh WR II.
        } elseif ($aksi === 'tolak') {
            $data = ['status_wr' => 'Ditolak'];

            if (!empty($komentar)) { // jika $komentar memiliki nilai yang bukan kosong, maka
                $data['komentar_wr'] = $komentar; // maka nilainya dimasukkan ke dalam array $data dengan key 'komentar_wr'.
            }

            // Tambahkan notifikasi penolakan oleh WR II
            $notifikasiModel->insert([
                'pesan' => 'Laporan untuk kegiatan "' . $laporan['nama_kegiatan'] . '" dari UKM ' . $laporan['nama_ukm'] . ' ditolak oleh Wakil Rektor II.',
                'tipe' => 'penolakan_laporan_wr',
                'status_baca' => 'belum'
            ]); // Update status menjadi Ditolak. Simpan komentar penolakan (jika ada). Tambahkan notifikasi penolakan.
        } else {
            return redirect()->back()->with('error', 'Aksi tidak valid.');
        } // Jika aksi tidak dikenali (bukan verifikasi/tolak), kembalikan dengan error.

        $model->update($id, $data); // Simpan perubahan status laporan ke database.

        return redirect()->to('/verifikasilaporanWakilRektorII')->with('success', 'Laporan berhasil diproses.');
        // Redirect ke halaman verifikasi laporan dengan pesan sukses.
    }

    public function tolakLaporanWR($id) // Fungsi menerima parameter $id, yaitu ID laporan kegiatan yang ingin ditolak.
    {
        $model = new \App\Models\PengajuanLaporanModel(); // Membuat instance model PengajuanLaporanModel, yaitu model untuk mengakses tabel laporan kegiatan UKM.
        $model->update($id, ['status_wr' => 'Ditolak']); // Menjalankan update ke database

        return redirect()->to('/verifikasilaporanWakilRektorII')->with('error', 'Laporan ditolak oleh Wakil Rektor II.');
        // Setelah proses update, pengguna diarahkan kembali ke halaman verifikasi laporan.
    }

    public function simpanKomenLaporanWR($id) // Fungsi menerima parameter $id, yaitu ID laporan yang akan diberikan komentar oleh Wakil Rektor II
    {
        $komentar = $this->request->getPost('komentar_wr'); // Mengambil data komentar dari form input POST dengan name komentar_wr.

        if (empty($komentar)) {
            return redirect()->back()->with('error', 'Komentar tidak boleh kosong.');
        } // Validasi: Jika komentar kosong, maka pengguna dikembalikan ke halaman sebelumnya dengan pesan error "Komentar tidak boleh kosong."

        $model = new \App\Models\PengajuanLaporanModel(); // Inisialisasi model PengajuanLaporanModel untuk mengakses data laporan di database.

        $model->update($id, [
            'komentar_wr' => $komentar
        ]); // Mengupdate laporan berdasarkan $id dan menyimpan isi komentar ke kolom komentar_wr.

        return redirect()->to('/verifikasilaporanWakilRektorII')->with('success', 'Komentar WR II berhasil disimpan.');
        // Mengarahkan pengguna ke halaman verifikasi laporan dengan flash message "Komentar WR II berhasil disimpan."
    }


    public function verifikasikeuangan(): string // Mendefinisikan fungsi verifikasikeuangan yang mengembalikan string (berarti return-nya adalah tampilan view).
    {
        $model = new \App\Models\KeuanganModel(); // Membuat instance dari model KeuanganModel, yang digunakan untuk mengakses data keuangan di database.
        $data['keuangan'] = $model->findAll(); // Ambil semua pengajuan keuangan
        // Mengambil semua data dari tabel keuangan menggunakan findAll() dan menyimpannya ke dalam array $data dengan key 'keuangan'.

        return view('WakilRektorII/verifikasikeuangan2', $data); // Ganti sesuai nama file view WR II
        // Mengembalikan view WakilRektorII/verifikasikeuangan2 dan mengirim data keuangan ke view tersebut dalam bentuk array.
    }

    public function prosesVerifikasiKeuanganWR($id)
    // Mendeklarasikan fungsi yang menerima parameter $id, yaitu ID dari data pengajuan keuangan yang akan diverifikasi atau ditolak.
    {
        $aksi = $this->request->getPost('aksi'); // Mengambil nilai dari tombol aksi yang dikirim dari form (verifikasi atau tolak) melalui metode POST.

        $model = new \App\Models\KeuanganModel(); // Membuat objek dari model KeuanganModel yang digunakan untuk berinteraksi dengan tabel keuangan di database.

        if ($aksi === 'verifikasi') {
            $data = ['status_wr' => 'Disetujui WR II'];
        } elseif ($aksi === 'tolak') {
            $data = ['status_wr' => 'Ditolak'];
        } else {
            return redirect()->back()->with('error', 'Aksi tidak valid. Tidak ada data yang diupdate.');
        } // Mengecek aksi yang dipilih

        $model->update($id, $data); // Melakukan update pada data keuangan dengan id yang diberikan menggunakan array $data yang sudah dibuat sebelumnya.

        return redirect()->to('/verifikasikeuanganWakilRektorII')->with('success', 'Status keuangan berhasil diperbarui oleh WR II.');
        // Setelah berhasil update, pengguna akan diarahkan kembali ke halaman verifikasi keuangan WR II dengan pesan sukses.
    }

    public function tolakKeuanganWR($id) // Mendeklarasikan fungsi dengan parameter $id, yaitu ID pengajuan keuangan yang akan ditolak.
    {
        $model = new \App\Models\KeuanganModel(); // Membuat objek dari KeuanganModel yang digunakan untuk mengakses tabel keuangan dalam database.
        $model->update($id, ['status_wr' => 'Ditolak']); // Menjalankan fungsi update() untuk mengubah data pengajuan keuangan berdasarkan id

        return redirect()->to('/verifikasikeuanganWakilRektorII')->with('error', 'Pengajuan keuangan ditolak oleh WR II.');
        // Setelah proses update selesai. Pengguna akan diarahkan kembali ke halaman verifikasi keuangan Wakil Rektor II.
    }

    public function simpanKomenKeuanganWR($id) // Mendefinisikan fungsi publik simpanKomenKeuanganWR dengan parameter $id, yaitu ID pengajuan keuangan yang akan diberi komentar.
    {
        $komentar = $this->request->getPost('komentar_wr'); // ✅ ambil dari name="komentar_wr"
        // Mengambil nilai dari input form POST dengan name="komentar_wr".

        if (empty($komentar)) {
            return redirect()->back()->with('error', 'Komentar tidak boleh kosong.');
        } // Mengecek apakah input komentar kosong.

        $model = new \App\Models\KeuanganModel(); // Membuat instance dari model KeuanganModel yang mewakili tabel data pengajuan keuangan.

        $model->update($id, [
            'komentar_wr' => $komentar // ✅ simpan ke kolom yang sesuai
        ]); // Mengupdate baris data keuangan berdasarkan ID yang dikirim

        return redirect()->to('/verifikasikeuanganWakilRektorII')->with('success', 'Komentar berhasil disimpan.');
        // Setelah komentar berhasil disimpan ke database. Pengguna akan diarahkan ke halaman verifikasi keuangan WR II. Akan muncul pesan sukses bahwa komentar telah tersimpan.
    }
    public function profil() // Mendefinisikan method publik profil() di dalam controller.
    {
        $data = [
            'title'    => 'Profil Wakil Rektor II',
            'nama'     => 'Dr. Ahmad Hidayat, M.Si.',
            'jabatan'  => 'Wakil Rektor II Bidang Keuangan dan Kemahasiswaan',
            'email'    => 'wr2@univ.ac.id',
            'telepon'  => '(021) 1234567',
            'ruangan'  => 'Gedung Rektorat Lt. 2'
        ]; // Membuat array $data yang berisi informasi profil Wakil Rektor II

        return view('WakilRektorII/profileWakilRektorII', $data); // Mengembalikan tampilan view profileWakilRektorII.php yang ada di folder app/Views/WakilRektorII/.
    }

    public function setting() // Mendefinisikan fungsi publik setting() dalam controller.
    {
        $model = new \App\Models\UserModel();
        // Membuat objek dari model UserModel, yang kemungkinan digunakan untuk mengakses data akun pengguna dari tabel users (atau nama tabel lain yang sesuai).
        $id = session()->get('id'); // Mengambil ID pengguna yang sedang login dari data session.
        $data['user'] = $model->find($id); // Mengambil data user dari database berdasarkan id tersebut.

        return view('WakilRektorII/settingWakilRektorII', $data); // Menampilkan file view settingWakilRektorII.php dari folder Views/WakilRektorII/.
    }

    public function update()
    {
        $model = new \App\Models\UserModel(); // Inisialisasi model
        // Membuat instance dari UserModel, untuk mengakses tabel user di database.
        $id = session()->get('id'); // Mengambil ID user yang sedang login dari session. ID ini digunakan untuk mencari dan meng-update data pengguna di database.
        $username = $this->request->getPost('username');
        $passwordBaru = $this->request->getPost('password_baru');
        $konfirmasi = $this->request->getPost('konfirmasi_password');
        // Mengambil input dari form

        // Jika WR II mengisi password baru
        if (!empty($passwordBaru)) {
            if ($passwordBaru !== $konfirmasi) {
                return redirect()->back()->with('error', 'Password baru dan konfirmasi tidak cocok.');
            }
            // Jika field password baru diisi, Maka dicek apakah password baru sama dengan konfirmasi password. Jika tidak cocok, maka akan kembali ke halaman sebelumnya dengan pesan error.

            $data = [
                'username' => $username,
                'password' => $passwordBaru, // plaintext (UAS)
                'updated_at' => date('Y-m-d H:i:s')
            ]; // Jika password baru diisi dan cocok, maka update username + password (dalam plaintext, biasanya untuk keperluan UAS/praktik saja, tidak disarankan untuk produksi).
        } else {
            // Hanya update username
            $data = [
                'username' => $username,
                'updated_at' => date('Y-m-d H:i:s')
            ]; // Jika password tidak diisi, hanya update username dan updated_at.
        }

        $model->update($id, $data); // Melakukan update data user berdasarkan ID yang sedang login.

        return redirect()->to('/settingsWakilRektor')->with('success', 'Pengaturan berhasil diperbarui.');
        // Setelah update selesai, redirect ke halaman pengaturan dan tampilkan pesan sukses.
    }
}
