<?php

namespace App\Controllers;

use App\Models\PengajuanKegiatanModel;

class AdminKemahasiswaan extends BaseController
{
    public function dashboard()
    {
        // Memuat tiga model
        $kegiatan = new \App\Models\PengajuanKegiatanModel();
        $laporan  = new \App\Models\PengajuanLaporanModel();
        $keuangan = new \App\Models\KeuanganModel();

        // === Kegiatan ===

        // Menghitung jumlah kegiatan yang sudah disetujui oleh Wakil Rektor II (WR II).
        $kegiatan_disetujui = $kegiatan->where('status_wr', 'Disetujui WR II')->countAllResults();
        // Menghitung total kegiatan yang ditolak oleh Admin atau WR II.    
        $kegiatan_ditolak = $kegiatan
            ->groupStart()
            ->where('status_admin', 'Ditolak')
            ->orWhere('status_wr', 'Ditolak')
            ->groupEnd()
            ->countAllResults();
        // Menghitung kegiatan yang masih menunggu proses verifikasi, baik di admin atau WR II, dan belum ditolak.    
        $kegiatan_menunggu = ($kegiatan)
            ->groupStart()
            ->where('status_wr', 'Belum Diverifikasi')
            ->orWhere('status_wr', 'Menunggu Admin')
            ->groupEnd()
            ->where('status_admin !=', 'Ditolak')
            ->where('status_wr !=', 'Ditolak')
            ->countAllResults();

        // === Laporan ===

        // Menghitung jumlah laporan yang sudah disetujui oleh Wakil Rektor II (WR II).
        $laporan_disetujui = $laporan->where('status_wr', 'Disetujui WR II')->countAllResults();
        // Menghitung total laporan yang ditolak oleh Admin atau WR II.    
        $laporan_ditolak = $laporan
            ->groupStart()
            ->where('status_admin', 'Ditolak')
            ->orWhere('status_wr', 'Ditolak')
            ->groupEnd()
            ->countAllResults();
        // Menghitung laporan yang masih menunggu proses verifikasi, baik di admin atau WR II, dan belum ditolak.
        $laporan_menunggu = $laporan
            ->groupStart()
            ->where('status_wr', 'Belum Diverifikasi')
            ->orWhere('status_wr', 'Menunggu Admin')
            ->groupEnd()
            ->where('status_admin !=', 'Ditolak')
            ->where('status_wr !=', 'Ditolak')
            ->countAllResults();

        // === Total Pengeluaran Bulan Ini ===
        $bulan_ini = date('m');
        $tahun_ini = date('Y');
        // Ambil bulan dan tahun saat ini

        // Mengambil total pengeluaran bulan ini berdasarkan field pengeluaran_bulan_lalu.
        $total_pengeluaran_bulan_ini = $keuangan
            ->where('MONTH(created_at)', $bulan_ini)
            ->where('YEAR(created_at)', $tahun_ini) // Data yang diambil adalah dari bulan dan tahun saat ini.
            ->selectSum('pengeluaran_bulan_lalu')
            ->first()['pengeluaran_bulan_lalu'] ?? 0;

        // === Data ke View ===
        $data = [
            // Untuk card & grafik
            // Ini menyimpan data bagian kegiatan untuk yang disetujui, ditolak, dan menunggu verifikasi
            'kegiatan_disetujui' => $kegiatan_disetujui,
            'kegiatan_ditolak' => $kegiatan_ditolak,
            'kegiatan_menunggu' => $kegiatan_menunggu,

            // Ini menyimpan data bagian laporan untuk yang disetujui, ditolak, dan menunggu verifikasi
            'laporan_disetujui' => $laporan_disetujui,
            'laporan_ditolak' => $laporan_ditolak,
            'laporan_menunggu' => $laporan_menunggu,

            // Dan ini untuk data Grafik nya
            // Ini menyimpan data bagian kegiatan/laporan untuk yang disetujui, ditolak, dan menunggu verifikasi dalam bentuk array
            'kegiatan_data' => [$kegiatan_disetujui, $kegiatan_ditolak, $kegiatan_menunggu],
            'laporan_data' => [$laporan_disetujui, $laporan_ditolak, $laporan_menunggu],

            // Menyimpan jumlah total pengeluaran dari semua UKM pada bulan ini, diambil dari field pengeluaran_bulan_lalu dalam tabel keuangan_ukm.
            'total_pengeluaran_bulan_ini' => $total_pengeluaran_bulan_ini
        ];

        return view('AdminKemahasiswaan/dashboard2', $data); // Memanggil file view bernama dashboard2 di folder AdminKemahasiswaan/
    }
    public function verifikasikegiatan()
    {
        // Membuat objek dari model PengajuanKegiatanModel
        $model = new \App\Models\PengajuanKegiatanModel();
        // Mengambil semua data kegiatan dari tabel pengajuan_kegiatan menggunakan method findAll().
        $data['kegiatan'] = $model->findAll();
        // Menampilkan view bernama verifikasikegiatan1 yang berada di dalam folder AdminKemahasiswaan
        return view('AdminKemahasiswaan/verifikasikegiatan1', $data);
    }
    public function prosesVerifikasiKegiatan($id) // Fungsi ini menerima parameter $id yang merupakan ID kegiatan yang akan diverifikasi atau ditolak oleh admin.
    {
        // Mengambil data aksi dari form (POST), bisa berisi 'verifikasi' atau 'tolak'.
        $aksi = $this->request->getPost('aksi');    
        // $model untuk akses data kegiatan (pengajuan_kegiatan).
        $model = new \App\Models\PengajuanKegiatanModel();
        // $notifikasiModel untuk menyimpan notifikasi ke tabel notifikasi.
        $notifikasiModel = new \App\Models\NotifikasiModel();
        // Ambil data kegiatan (misalnya nama UKM dan nama kegiatan untuk notifikasi)
        $kegiatan = $model->find($id);

        // Mengecek apakah aksi yang dikirim dari form adalah 'verifikasi' atau 'tolak'.
        if ($aksi === 'verifikasi') {
            // Mengubah status kegiatan di tabel status_admin dan status_wr
            $data = [
                'status_admin' => 'Terverifikasi',
                'status_wr'    => 'Menunggu Admin' // atau 'Belum Diverifikasi'
            ];

            // Menambahkan notifikasi baru ke database bahwa kegiatan telah diverifikasi.
            $notifikasiModel->insert([
                'pesan' => 'Kegiatan "' . $kegiatan['deskripsi'] . '" dari UKM ' . $kegiatan['nama_ukm'] . ' telah diverifikasi oleh Admin.',
                'tipe' => 'verifikasi_kegiatan',
                'status_baca' => 'belum'
            ]);
        } elseif ($aksi === 'tolak') {
            // Mengubah status kegiatan menjadi 'Ditolak' di tabel pengajuan_kegiatan
            $data = [
                'status_admin' => 'Ditolak'
            ];
            // Menambahkan notifikasi penolakan ke tabel notifikasi.
            $notifikasiModel->insert([
                'pesan' => 'Kegiatan "' . $kegiatan['deskripsi'] . '" dari UKM ' . $kegiatan['nama_ukm'] . ' ditolak oleh Admin.',
                'tipe' => 'penolakan_kegiatan',
                'status_baca' => 'belum'
            ]);
        } else {
            // Jika bukan keduanya, sistem akan redirect kembali ke halaman sebelumnya dengan pesan error.
            return redirect()->back()->with('error', 'Aksi tidak valid.');
        }
        // Menyimpan perubahan data (status_admin, status_wr, dll) ke database pada kegiatan dengan ID terkait.
        $model->update($id, $data);
        // Setelah berhasil update, pengguna akan diarahkan kembali ke halaman verifikasi kegiatan,
        return redirect()->to('/verifikasikegiatanAdminKemahasiswaan')->with('success', 'Status kegiatan berhasil diperbarui.');
    }

    public function tolakKegiatan($id)
    {
        // Membuat objek model dari PengajuanKegiatanModel
        $model = new \App\Models\PengajuanKegiatanModel();
        // Melakukan update data kegiatan berdasarkan ID yang diterima.
        $model->update($id, ['status_admin' => 'Ditolak']);
        // Sistem akan mengalihkan (redirect) pengguna ke halaman /verifikasikegiatanAdminKemahasiswaan.
        return redirect()->to('/verifikasikegiatanAdminKemahasiswaan')->with('error', 'Pengajuan ditolak!');
    }
    public function simpanKomenKegiatan($id)
    {
        // Mengambil nilai komentar dari data form POST.
        $komentar = $this->request->getPost('komentar');
        // Mengecek apakah isi dari komentar kosong.
        if (empty($komentar)) {
            // Kembalikan ke halaman sebelumnya (redirect back).
            return redirect()->back()->with('error', 'Komentar kosong. Tidak ada data yang disimpan.');
        }
        // Membuat instance dari model PengajuanKegiatanModel.
        $model = new PengajuanKegiatanModel();
        // Melakukan proses update pada record kegiatan dengan ID $id.
        $model->update($id, [
            'komentar_admin' => $komentar
        ]);

        // Redirect ke halaman verifikasi kegiatan admin (/verifikasikegiatanAdminKemahasiswaan).
        return redirect()->to('/verifikasikegiatanAdminKemahasiswaan')->with('success', 'Komentar berhasil disimpan.');
    }
    public function verifikasilaporan(): string
    {
        // Membuat instance (objek) dari model PengajuanLaporanModel.
        $model = new \App\Models\PengajuanLaporanModel();
        // Mengambil seluruh data laporan dari database menggunakan method findAll().
        $data['laporan'] = $model->findAll();

        // Mengembalikan view bernama verifikasilaporan1 yang berada dalam folder AdminKemahasiswaan.
        return view('AdminKemahasiswaan/verifikasilaporan1', $data);
    }

    public function prosesVerifikasiLaporan($id)
    {
        $aksi = $this->request->getPost('aksi'); // Mengambil nilai dari input POST dengan nama aksi

        $model = new \App\Models\PengajuanLaporanModel(); // Membuat objek dari model PengajuanLaporanModel (untuk akses data laporan).
        $notifikasiModel = new \App\Models\NotifikasiModel(); // Membuat objek dari NotifikasiModel (untuk menyimpan notifikasi ke tabel notifikasi).

        $laporan = $model->find($id); // Mengambil data laporan berdasarkan ID.

        // Jika laporan tidak ditemukan, kembalikan ke halaman sebelumnya dan tampilkan pesan error.
        if (!$laporan) {
            return redirect()->back()->with('error', 'Data laporan tidak ditemukan.');
        }

        // Menyiapkan data untuk memperbarui status laporan:
        if ($aksi === 'verifikasi') {
            $data = [
                'status_admin' => 'Terverifikasi',
                'status_wr'    => 'Menunggu Admin'
            ];

            // Menambahkan data ke tabel notifikasi untuk memberi tahu bahwa laporan telah diverifikasi oleh admin.
            $notifikasiModel->insert([
                'pesan' => 'Laporan untuk kegiatan "' . $laporan['nama_kegiatan'] . '" dari UKM ' . $laporan['nama_ukm'] . ' telah diverifikasi oleh Admin.',
                'tipe' => 'verifikasi_laporan',
                'status_baca' => 'belum'
            ]);
        } elseif ($aksi === 'tolak') {
            $data = [
                'status_admin' => 'Ditolak' // Status laporan diset sebagai Ditolak.
            ];

            // Tambahkan notifikasi penolakan.
            $notifikasiModel->insert([
                'pesan' => 'Laporan untuk kegiatan "' . $laporan['nama_kegiatan'] . '" dari UKM ' . $laporan['nama_ukm'] . ' ditolak oleh Admin.',
                'tipe' => 'penolakan_laporan',
                'status_baca' => 'belum'
            ]);
        } else {
            //Jika nilai aksi bukan verifikasi atau tolak, kembalikan ke halaman sebelumnya dan tampilkan pesan error.
            return redirect()->back()->with('error', 'Aksi tidak valid. Tidak ada data yang diupdate.');
        }
        $model->update($id, $data); // Memperbarui data laporan sesuai ID menggunakan data yang sudah disiapkan ($data).

        // Setelah update berhasil, arahkan user kembali ke halaman verifikasi laporan dengan pesan sukses.
        return redirect()->to('/verifikasilaporanAdminKemahasiswaan')->with('success', 'Laporan berhasil diproses.');
    }
    public function tolakLaporan($id)
    {
        // Membuat instance dari model PengajuanLaporanModel, yang berfungsi untuk mengakses tabel laporan pada database.
        $model = new \App\Models\PengajuanLaporanModel();
        // Mengupdate baris laporan dengan ID tersebut.
        $model->update($id, ['status_admin' => 'Ditolak']);

        // Setelah update berhasil, pengguna diarahkan kembali ke halaman /verifikasilaporanAdminKemahasiswaan.
        return redirect()->to('/verifikasilaporanAdminKemahasiswaan')->with('error', 'Laporan ditolak.');
    }
    public function simpanKomenLaporan($id) // Mendefinisikan method publik dengan parameter $id.
    {
        // Mengambil input komentar dari form menggunakan metode POST.
        $komentar = $this->request->getPost('komentar');

        // Jika komentar kosong, pengguna diarahkan kembali ke halaman sebelumnya dengan pesan error bahwa komentar wajib diisi.
        if (empty($komentar)) {
            return redirect()->back()->with('error', 'Komentar tidak boleh kosong.');
        }

        // Membuat objek model PengajuanLaporanModel untuk berinteraksi dengan tabel laporan.
        $model = new \App\Models\PengajuanLaporanModel();

        // Mengupdate baris laporan dengan ID tersebut, dan menyimpan nilai komentar ke kolom komentar_admin.
        $model->update($id, [
            'komentar_admin' => $komentar
        ]);

        // Setelah berhasil disimpan, admin diarahkan ke halaman verifikasi laporan.
        return redirect()->to('/verifikasilaporanAdminKemahasiswaan')->with('success', 'Komentar berhasil disimpan.');
    }

    public function verifikasikeuangan(): string
    {
        // Membuat instance dari model KeuanganModel, yang berfungsi untuk berinteraksi dengan tabel pengajuan keuangan di database.
        $model = new \App\Models\KeuanganModel();
        // Mengambil seluruh data keuangan dari database menggunakan fungsi findAll().
        $data['keuangan'] = $model->findAll();

        // Mengembalikan view bernama verifikasikeuangan1 yang ada di dalam folder AdminKemahasiswaan/.
        return view('AdminKemahasiswaan/verifikasikeuangan1', $data);
    }
    public function prosesVerifikasiKeuangan($id)
    {
        // Mengambil nilai dari input form bernama aksi (misalnya "verifikasi" atau "tolak").
        $aksi = $this->request->getPost('aksi');

        // Membuat objek dari model KeuanganModel untuk mengakses tabel pengajuan keuangan di database.
        $model = new \App\Models\KeuanganModel();

        // Cek apakah aksi yang dikirim adalah "verifikasi".
        if ($aksi === 'verifikasi') {
            // Jika verifikasi, maka kolom status_admin diisi "Terverifikasi".
            // Kolom status_wr diisi "Menunggu WR II", menandakan akan dilanjutkan ke Wakil Rektor II.
            $data = [
                'status_admin' => 'Terverifikasi',
                'status_wr'    => 'Menunggu WR II'
            ];
        } elseif ($aksi === 'tolak') { // Jika aksi adalah "tolak", maka:
            // Status admin langsung diubah menjadi "Ditolak" tanpa perlu ke WR II.
            $data = [
                'status_admin' => 'Ditolak'
            ];
        } else { // Jika aksi tidak sesuai (bukan "verifikasi" atau "tolak"), maka akan redirect kembali dengan pesan error.
            return redirect()->back()->with('error', 'Aksi tidak valid. Tidak ada data yang diupdate.');
        }

        // Memperbarui data pada database berdasarkan ID dengan nilai-nilai di $data.
        $model->update($id, $data);

        // Setelah update berhasil, redirect ke halaman verifikasi keuangan dan menampilkan pesan sukses.
        return redirect()->to('/verifikasikeuanganAdminKemahasiswaan')->with('success', 'Pengajuan keuangan berhasil diproses.');
    }

    public function tolakKeuangan($id)
    {
        // Membuat objek dari model KeuanganModel, yang digunakan untuk mengakses tabel pengajuan keuangan di database.
        $model = new \App\Models\KeuanganModel();
        // Melakukan update pada baris data dengan ID tertentu dan mengubah kolom status_admin menjadi 'Ditolak'.
        $model->update($id, ['status_admin' => 'Ditolak']);

        // Setelah proses update selesai, pengguna akan di-redirect ke halaman /verifikasikeuanganAdminKemahasiswaan.
        return redirect()->to('/verifikasikeuanganAdminKemahasiswaan')->with('error', 'Pengajuan keuangan ditolak.');
    }

    public function simpanKomenKeuanganAdmin($id)
    {
        // Mengambil input komentar dari form yang dikirim menggunakan metode POST.
        $komentar = $this->request->getPost('komentar');

        // Jika komentar kosong, maka pengguna akan diarahkan kembali dengan pesan error.
        if (empty($komentar)) {
            return redirect()->back()->with('error', 'Komentar tidak boleh kosong.');
        }

        // Membuat instance dari model KeuanganModel, digunakan untuk berinteraksi dengan tabel keuangan di database.
        $model = new \App\Models\KeuanganModel();

        // Menyiapkan data yang akan diupdate ke database. Hanya kolom komentar_admin yang akan diisi dengan isi komentar.
        $data = ['komentar_admin' => $komentar];

        // Kondisi ini tidak terlalu dibutuhkan karena $data pasti tidak kosong jika sudah melewati validasi sebelumnya.
        if (empty($data)) {
            return redirect()->back()->with('error', 'Tidak ada data yang diperbarui.');
        }

        // Melakukan update data komentar ke dalam tabel keuangan, berdasarkan ID yang diberikan.
        $model->update($id, $data);

        // Setelah berhasil menyimpan komentar, pengguna diarahkan kembali ke halaman verifikasi keuangan, dengan pesan sukses.
        return redirect()->to('/verifikasikeuanganAdminKemahasiswaan')->with('success', 'Komentar berhasil disimpan.');
    }

    public function profil()
    {
        // Data profil statis (bisa diganti dari database nanti)
        $data = [
            'title' => 'Profil Admin Kemahasiswaan',
            'nama'  => 'Rina Kartika',
            'jabatan' => 'Staf Kemahasiswaan',
            'nomor' => '0821-9876-5432',
            'lokasi' => 'Gedung B Lt. 2 - Ruang Kemahasiswaan'
        ];

        // Menampilkan view bernama profileAdmin (dalam folder AdminKemahasiswaan) dan mengirim data profil tadi ke dalam view tersebut untuk ditampilkan di halaman.
        return view('AdminKemahasiswaan/profileAdmin', $data);
    }

    public function setting()
    {
        // Membuat objek dari model UserModel, yaitu model yang terhubung dengan tabel user di database.
        $model = new \App\Models\UserModel();
        // Mengambil ID user yang sedang login dari data session.
        $id = session()->get('id');
        // Mengambil data user dari database berdasarkan ID yang diambil dari session.
        $user = $model->find($id);

        // Menampilkan view bernama settingAdmin di folder AdminKemahasiswaan.
        return view('AdminKemahasiswaan/settingAdmin', ['user' => $user]);
    }
    public function update()
    {
        // Membuat instance dari UserModel yang digunakan untuk berinteraksi dengan tabel user.
        $model = new \App\Models\UserModel();
        // Mengambil ID user yang sedang login dari session. ID ini digunakan untuk memilih data user yang akan diperbarui.
        $id = session()->get('id');
        // Mengambil input dari form:
        // username: username baru yang diisi.
        // password_baru: password baru jika admin ingin mengganti.
        // konfirmasi_password: untuk memastikan password baru ditulis dengan benar.
        $username = $this->request->getPost('username');
        $passwordBaru = $this->request->getPost('password_baru');
        $konfirmasi = $this->request->getPost('konfirmasi_password');

        // Jika admin mengisi password baru
        // Mengecek apakah field password baru diisi. Jika iya, lanjutkan dengan proses pengecekan kecocokan.
        if (!empty($passwordBaru)) {
            // Jika password baru dan konfirmasi tidak sama, batalkan proses dan kembalikan ke halaman sebelumnya dengan pesan error.
            if ($passwordBaru !== $konfirmasi) {
                return redirect()->back()->with('error', 'Password baru dan konfirmasi tidak cocok.');
            }

            // Jika password valid, data yang akan diperbarui
            $data = [
                'username' => $username,
                'password' => $passwordBaru, // plaintext (UAS)
                'updated_at' => date('Y-m-d H:i:s')
            ];
        } else {
            // Jika tidak ada password baru, maka hanya username dan waktu update yang diperbarui.
            $data = [
                'username' => $username,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        // Jalankan proses update ke database berdasarkan ID user yang sedang login.
        $model->update($id, $data);

        // Setelah update berhasil, redirect kembali ke halaman pengaturan dengan pesan sukses.
        return redirect()->to('/settingsAdmin')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
