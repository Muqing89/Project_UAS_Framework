<?php

namespace App\Controllers;

require_once APPPATH . 'Libraries\Dompdf_lib.php';

// Mengimpor model
use App\Models\PengajuanKegiatanModel;
use App\Models\PengajuanLaporanModel;
use App\Models\KeuanganModel;
use CodeIgniter\HTTP\RedirectResponse;
use Dompdf\Dompdf;
class Ormawa extends BaseController
{
    public function dashboard()
    {

        // Mengimpor model yang tersimpan di database mySQL
        $kegiatan = new \App\Models\PengajuanKegiatanModel();
        $laporan  = new \App\Models\PengajuanLaporanModel();
        $keuangan = new \App\Models\KeuanganModel();
        $notifikasiModel = new \App\Models\NotifikasiModel();

        // Mengambil 15 notifikasi terbaru
        $notifikasi = $notifikasiModel
            ->orderBy('waktu', 'DESC')
            ->limit(15)
            ->findAll();

        // === Kegiatan ===
        $kegiatan_disetujui = $kegiatan->where('status_wr', 'Disetujui WR II')->countAllResults();
        // Jumlah kegiatan yang disetujui diambil dari nilai status_wr yang bernilai Disetujui WR II.

        $kegiatan_ditolak = $kegiatan
            ->groupStart()
            ->where('status_admin', 'Ditolak')
            ->orWhere('status_wr', 'Ditolak')
            ->groupEnd()
            ->countAllResults(); // Kegiatan yang ditolak dimana nilai status_admin serta status_wr pada Admin maupun WR II bernilai Ditolak.
        $kegiatan_menunggu = ($kegiatan)
            ->groupStart()
            ->where('status_wr', 'Belum Diverifikasi')
            ->orWhere('status_wr', 'Menunggu Admin')
            ->groupEnd()
            ->where('status_admin !=', 'Ditolak')
            ->where('status_wr !=', 'Ditolak')
            ->countAllResults();
        // Kegiatan yang menunggu verifikasi dimana nilai nya seperti diatas ini. dan Tidak boleh bernilai Ditolak untuk status admin dan wr

        // === Laporan ===
        $laporan_disetujui = $laporan->where('status_wr', 'Disetujui WR II')->countAllResults();
        $laporan_ditolak = $laporan
            ->groupStart()
            ->where('status_admin', 'Ditolak')
            ->orWhere('status_wr', 'Ditolak')
            ->groupEnd()
            ->countAllResults();
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

        $total_pengeluaran_bulan_ini = $keuangan
            ->where('MONTH(created_at)', $bulan_ini)
            ->where('YEAR(created_at)', $tahun_ini) // Data yang diambil adalah dari bulan dan tahun saat ini.
            ->selectSum('pengeluaran_bulan_lalu')
            ->first()['pengeluaran_bulan_lalu'] ?? 0;
        // Mengambil jumlah total pengeluaran_bulan_lalu dari tabel keuangan_ukm berdasarkan bulan & tahun saat ini.

        // === Data ke View ===
        $data = [
            // Untuk Card nya
            'kegiatan_disetujui' => $kegiatan_disetujui,
            'kegiatan_ditolak' => $kegiatan_ditolak,
            'kegiatan_menunggu' => $kegiatan_menunggu,
            // Ini menyimpan data bagian kegiatan untuk yang disetujui, ditolak, dan menunggu verifikasi

            'laporan_disetujui' => $laporan_disetujui,
            'laporan_ditolak' => $laporan_ditolak,
            'laporan_menunggu' => $laporan_menunggu,
            // Ini menyimpan data bagian laporan untuk yang disetujui, ditolak, dan menunggu verifikasi

            // Dan ini untuk data Grafik nya
            'kegiatan_data' => [$kegiatan_disetujui, $kegiatan_ditolak, $kegiatan_menunggu],
            'laporan_data' => [$laporan_disetujui, $laporan_ditolak, $laporan_menunggu],
            // Ini menyimpan data bagian kegiatan/laporan untuk yang disetujui, ditolak, dan menunggu verifikasi dalam bentuk array

            'total_pengeluaran_bulan_ini' => $total_pengeluaran_bulan_ini,
            // Menyimpan jumlah total pengeluaran dari semua UKM pada bulan ini, diambil dari field pengeluaran_bulan_lalu dalam tabel keuangan_ukm.

            'notifikasi' => $notifikasi // Menyimpan daftar notifikasi terbaru
        ];

        return view('Ormawa/dashboard1', $data); // Memanggil file view bernama dashboard1 di folder Ormawa/
    }

    public function generateReport()
    {
        $kegiatanModel = new \App\Models\PengajuanKegiatanModel(); // mengambil data pengajuan kegiatan.
        $laporanModel  = new \App\Models\PengajuanLaporanModel(); // mengambil data pengajuan laporan.

        // Ambil hanya data yang disetujui WR II
        $kegiatanDisetujui = $kegiatanModel->where('status_wr', 'Disetujui WR II')->findAll();
        $laporanDisetujui  = $laporanModel->where('status_wr', 'Disetujui WR II')->findAll();

        // Load DomPDF
        $dompdf = new \Dompdf\Dompdf(); // Inisialisasi pustaka DomPDF untuk membuat PDF dari HTML.
        $html = view('pdf_report', [
            'kegiatan' => $kegiatanDisetujui,
            'laporan' => $laporanDisetujui
        ]); // Menyusun HTML dari view bernama pdf_report, sambil mengoper data kegiatan dan laporan. View ini berisi template HTML yang akan dikonversi ke PDF.

        $dompdf->loadHtml($html); // Muat HTML-nya.
        $dompdf->setPaper('A4', 'portrait'); // Ukuran kertas A4, orientasi potret
        $dompdf->render(); // Proses rendering file PDF-nya
        $dompdf->stream('report-kegiatan&laporan-UKM.pdf', ['Attachment' => true]);
        // Mengunduh report yang sudah di verifikasi dengan nama file seperti diatas ini
    }
    public function inputkegiatan(): string
    {
        return view('Ormawa/inputkegiatan'); // menampilkan halaman input kegiatan untuk pengguna
    }
    public function simpanKegiatan(): RedirectResponse
    {
        $model = new PengajuanKegiatanModel();
        // Membuat instance dari model PengajuanKegiatanModel untuk menyimpan data ke tabel pengajuan_kegiatan.

        // Validasi file proposal
        $file = $this->request->getFile('proposal_kegiatan'); // Mengambil file proposal dari input form dengan name proposal_kegiatan
        if (!$file->isValid() || $file->getError() !== 0) {
            return redirect()->back()->with('error', 'Proposal kegiatan wajib diunggah!');
        } // Pengecekan jika tidak sesuai ada message eror

        // Validasi ekstensi file
        $allowedExtensions = ['pdf', 'doc', 'docx']; // Hanya boleh pdf, doc, atau docx.
        $ext = strtolower($file->getClientExtension());

        if (!in_array($ext, $allowedExtensions)) {
            return redirect()->back()->with('error', 'Format file tidak didukung! Hanya PDF, DOC, atau DOCX.');
        } // Jika tidak sesuai, kembali ke halaman sebelumnya dengan pesan error.

        // Simpan file proposal
        $newFileName = $file->getRandomName(); // Hindari nama duplikat
        $file->move(ROOTPATH . 'public/uploads/proposal', $newFileName);
        // Menyimpan file proposal ke folder public/uploads/proposal/

        // Ambil data dari input form
        $data = [
            'nama_ukm'           => $this->request->getPost('nama_ukm'),
            'ketua_pelaksana'    => $this->request->getPost('ketua_pelaksana'),
            'tempat_kegiatan'    => $this->request->getPost('tempat_kegiatan'),
            'jumlah_peserta'     => $this->request->getPost('jumlah_peserta'),
            'tanggal_kegiatan'   => $this->request->getPost('tanggal_kegiatan'),
            'waktu_kegiatan'     => $this->request->getPost('waktu_kegiatan'),
            'target_peserta'     => $this->request->getPost('target_peserta'),
            'deskripsi'          => $this->request->getPost('deskripsi'),
            'proposal_kegiatan'  => $newFileName,
            'status_admin'       => 'Belum Diverifikasi',
            'status_wr'          => 'Menunggu Admin'
        ]; // Mengambil semua input dari form dan memasukkannya ke dalam array $data

        $model->insert($data); // Menyimpan $data ke database.

        return redirect()->to('kegiatanOrmawa')->with('success', 'Pengajuan berhasil disimpan!');
        // Redirect ke halaman daftar kegiatan dengan notifikasi sukses.
    }
    public function kegiatan(): string
    {
        $model = new \App\Models\PengajuanKegiatanModel(); // Membuat instance dari PengajuanKegiatanModel
        $data['kegiatan'] = $model->findAll(); // ambil semua data dari tabel pengajuan_kegiatan.

        // Tambahan: ambil notifikasi
        $notifikasiModel = new \App\Models\NotifikasiModel();
        $notifikasi = $notifikasiModel
            ->orderBy('waktu', 'DESC') // Mengurutkan notifikasi dari yang terbaru
            ->limit(5) // Hanya mengambil 5 notifikasi terbaru
            ->findAll(); // Mengambil data dari model NotifikasiModel.
        // Simpan ke data
        $data['notifikasi'] = $notifikasi; // Menyimpan hasil notifikasi ke dalam array $data, supaya bisa digunakan di view juga.

        return view('Ormawa/kegiatan', $data); // menampilkan view dengan data
    }

    public function detailkegiatan($id)
    {
        $model = new \App\Models\PengajuanKegiatanModel(); // Membuat instance model PengajuanKegiatanModel untuk akses data dari tabel pengajuan_kegiatan.
        $data = $model->find($id); //  Mengambil 1 data kegiatan berdasarkan ID (primary key) menggunakan find($id).

        if ($data) {
            return $this->response->setJSON($data); // Akan dikembalikan dalam bentuk JSON response, cocok untuk API atau request AJAX.
        } else {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Data tidak ditemukan']); // JSON berisi pesan error dikembalikan.
        }
    }
    public function hapuskegiatan($id)
    {
        $model = new \App\Models\PengajuanKegiatanModel(); // Membuat instance dari model PengajuanKegiatanModel untuk mengakses tabel pengajuan_kegiatan.

        if ($model->find($id)) {
            $model->delete($id);
            return redirect()->to('/kegiatanOrmawa')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->to('/kegiatanOrmawa')->with('error', 'Data tidak ditemukan.');
        } // Mengecek apakah ada data kegiatan dengan ID tersebut:
    }
    public function editkegiatan($id)
    // Fungsi publik dalam controller (kemungkinan controller Ormawa) yang menerima parameter $id — yaitu ID kegiatan yang ingin diedit.
    {
        $model = new \App\Models\PengajuanKegiatanModel(); // Membuat instance dari PengajuanKegiatanModel, yaitu model yang mewakili tabel pengajuan_kegiatan.
        $data['kegiatan'] = $model->find($id); // Mengambil data kegiatan berdasarkan ID

        if (!$data['kegiatan']) {
            return redirect()->to('/kegiatanOrmawa')->with('error', 'Data tidak ditemukan.');
        } // Jika data tidak ditemukan (misalnya ID tidak valid atau sudah dihapus)

        return view('Ormawa/editkegiatan', $data); // Tampilkan view editkegiatan.php (di folder Views/Ormawa) sambil mengirim data kegiatan ke view
    }
    public function updatekegiatan($id) // Fungsi publik yang menerima parameter $id, yaitu ID kegiatan yang ingin di-update di database.
    {
        $model = new \App\Models\PengajuanKegiatanModel(); // Membuat instance model PengajuanKegiatanModel untuk berinteraksi dengan tabel pengajuan_kegiatan.

        $data = [
            'nama_ukm' => $this->request->getPost('nama_ukm'),
            'ketua_pelaksana' => $this->request->getPost('ketua_pelaksana'),
            'tempat_kegiatan' => $this->request->getPost('tempat_kegiatan'),
            'jumlah_peserta' => $this->request->getPost('jumlah_peserta'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'waktu_kegiatan' => $this->request->getPost('waktu_kegiatan'),
            'target_peserta' => $this->request->getPost('target_peserta'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]; // Mengambil data dari form input (POST) yang dikirim dari halaman edit (editkegiatan.php)

        // Cek apakah ada file proposal yang diupload
        $file = $this->request->getFile('proposal_kegiatan'); // Mengambil file dari input form dengan name proposal_kegiatan.
        if ($file && $file->isValid() && !$file->hasMoved()) { // Pengecekan file
            // Validasi ekstensi
            $ext = strtolower($file->getClientExtension());
            $allowedExtensions = ['pdf', 'doc', 'docx'];
            if (!in_array($ext, $allowedExtensions)) {
                return redirect()->back()->with('error', 'Ekstensi file tidak diperbolehkan.');
            } // Validasi ekstensi file

            // Simpan file
            $newName = $file->getRandomName();
            $file->move('uploads/proposal/', $newName);

            // Tambahkan ke data untuk diupdate
            $data['proposal_kegiatan'] = $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/kegiatanOrmawa')->with('success', 'Data kegiatan berhasil diperbarui!');
        // Menjalankan proses update seluruh data (termasuk file proposal baru jika ada). 
        // Setelah itu, redirect ke halaman daftar kegiatan sambil menampilkan pesan sukses.
    }
    public function inputlaporan(): string
    {
        return view('Ormawa/inputlaporan');
    } // Fungsi ini akan menampilkan view Views/Ormawa/inputlaporan.php, yaitu halaman form input laporan.
    public function inputkeuangan(): string
    {
        return view('Ormawa/inputkeuangan');
    } // Fungsi ini akan menampilkan view Views/Ormawa/inputkeuangan.php, yaitu halaman form input laporan keuangan.

    public function laporan()
    {
        $model = new \App\Models\PengajuanLaporanModel();
        // Membuat objek model PengajuanLaporanModel — model ini digunakan untuk mengambil data dari tabel laporan (misalnya pengajuan_laporan).
        $data['laporan'] = $model->findAll();
        // Mengambil semua data laporan dari database menggunakan findAll() dan menyimpannya dalam array $data['laporan'].
        return view('Ormawa/laporan', $data);
        // Menampilkan view Views/Ormawa/laporan.php dengan membawa data laporan
    }

    public function simpanLaporan()
    // Fungsi ini digunakan untuk menyimpan laporan kegiatan UKM ke dalam database dan mengunggah file dokumen laporan ke folder uploads/laporan.
    {
        $model = new \App\Models\PengajuanLaporanModel(); // Menginisialisasi model PengajuanLaporanModel untuk berinteraksi dengan database (tabel laporan).

        // Validasi file
        $file = $this->request->getFile('dokumen_laporan'); // Mengambil file dari form input bernama dokumen_laporan.
        if ($file->isValid() && !$file->hasMoved()) { // Mengecek apakah file valid dan belum dipindahkan (belum diupload sebelumnya).
            $allowedExtensions = ['pdf', 'doc', 'docx'];
            $extension = $file->getClientExtension();
            // Mendefinisikan ekstensi yang diizinkan dan mengambil ekstensi file yang diupload.

            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->back()->with('error', 'Format file tidak diizinkan.');
            } // Jika ekstensi tidak sesuai, tampilkan error.

            if ($file->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran file melebihi 2MB.');
            } // Jika file lebih besar dari 2MB, tampilkan error.

            // Simpan file
            $newName = $file->getRandomName();
            $file->move('uploads/laporan', $newName);
            // File yang valid akan disimpan ke folder uploads/laporan dengan nama acak.
        } else {
            return redirect()->back()->with('error', 'File tidak valid.');
        } // Jika file tidak valid, kembali ke halaman sebelumnya dengan pesan error.

        // Simpan ke database
        $data = [
            'nama_ukm'        => $this->request->getPost('nama_ukm'),
            'nama_kegiatan'    => $this->request->getPost('nama_kegiatan'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'hasil_kegiatan'   => $this->request->getPost('hasil_kegiatan'),
            'dokumen_laporan'  => $newName,
            'status_admin'       => 'Belum Diverifikasi',
            'status_wr'          => 'Menunggu Admin'
        ]; // Menyiapkan data laporan dari input form

        $model->insert($data); // Data dimasukkan ke database (tabel laporan kegiatan).

        return redirect()->to('/laporanOrmawa')->with('success', 'Laporan berhasil diajukan.');
        // Setelah berhasil, pengguna diarahkan kembali ke halaman laporan dengan pesan sukses.

    }

    public function editlaporan($id) // Fungsi ini digunakan untuk menampilkan halaman edit laporan berdasarkan ID laporan tertentu.
    {
        $model = new \App\Models\PengajuanLaporanModel(); // Menginisialisasi model PengajuanLaporanModel agar bisa mengambil data dari database (tabel laporan).
        $data['laporan'] = $model->find($id); // Mencari data laporan berdasarkan $id yang dikirim dari URL. Hasilnya disimpan di variabel $data['laporan'].

        if (!$data['laporan']) {
            return redirect()->to('/laporanOrmawa')->with('error', 'Laporan tidak ditemukan.');
        } // Jika data tidak ditemukan (misalnya ID tidak valid), pengguna akan diarahkan kembali ke halaman daftar laporan (/laporanOrmawa) dengan pesan error.

        return view('Ormawa/editlaporan', $data);
        // Jika data ditemukan, maka akan ditampilkan view editlaporan dengan data laporan tersebut, sehingga bisa ditampilkan di form edit.
    }

    public function detailLaporan($id) // Fungsi ini digunakan untuk mengambil data laporan berdasarkan ID-nya
    {
        $model = new \App\Models\PengajuanLaporanModel(); // Inisialisasi model PengajuanLaporanModel untuk mengakses tabel laporan dari database.
        $data = $model->find($id);
        // Mengambil data laporan berdasarkan $id. Fungsi find() akan mengembalikan satu baris data (array asosiatif) jika ditemukan, atau null jika tidak ada.

        if ($data) {
            return $this->response->setJSON($data);
            // Jika data ditemukan, maka data akan dikembalikan dalam format JSON. Ini umum digunakan pada fetch/AJAX untuk menampilkan detail laporan 
            // secara dinamis tanpa me-reload halaman.
        } else {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Data tidak ditemukan']);
        } // Jika tidak ditemukan, kembalikan response HTTP status 404 Not Found, beserta pesan JSON {"error": "Data tidak ditemukan"}.
    }
    public function updatelaporan($id) // Fungsi ini menangani proses update laporan kegiatan berdasarkan ID laporan tertentu.
    {
        $model = new \App\Models\PengajuanLaporanModel(); // Membuat instance dari model PengajuanLaporanModel untuk mengakses data laporan di database.
        $laporan = $model->find($id); //  Mengambil data laporan berdasarkan ID. Jika tidak ditemukan, akan diarahkan kembali.

        if (!$laporan) {
            return redirect()->to('/laporanOrmawa')->with('error', 'Laporan tidak ditemukan.');
        } // Jika data laporan tidak ditemukan di database, maka diarahkan kembali ke halaman /laporanOrmawa dengan pesan error.

        $data = [
            'nama_ukm'        => $this->request->getPost('nama_ukm'),
            'nama_kegiatan'    => $this->request->getPost('nama_kegiatan'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'hasil_kegiatan'   => $this->request->getPost('hasil_kegiatan'),
        ]; // Mengambil input data dari form POST dan menyimpannya ke dalam array $data.

        // Jika ada file baru
        $file = $this->request->getFile('dokumen_laporan'); // Mengambil file yang diupload dari input bernama dokumen_laporan.

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/laporan', $newName);
            $data['dokumen_laporan'] = $newName;
        } // Mengecek apakah file ada, valid, dan belum dipindahkan

        $model->update($id, $data); // Melakukan update data laporan di database berdasarkan $id dengan data dari array $data.

        return redirect()->to('/laporanOrmawa')->with('success', 'Laporan berhasil diperbarui.');
        // Setelah proses update selesai, pengguna diarahkan kembali ke halaman /laporanOrmawa dengan pesan sukses.
    }

    public function hapuslaporan($id)
    {
        $model = new \App\Models\PengajuanLaporanModel(); // Membuat instance model PengajuanLaporanModel untuk mengakses tabel laporan di database.
        $laporan = $model->find($id); // Mengambil data laporan berdasarkan ID yang diterima dari parameter $id.

        if (!$laporan) {
            return redirect()->to('/laporanOrmawa')->with('error', 'Laporan tidak ditemukan.');
        } // Jika data laporan tidak ditemukan, pengguna akan diarahkan kembali ke halaman /laporanOrmawa dengan pesan error.

        // Hapus file dari server (jika ada)
        if (!empty($laporan['dokumen_laporan']) && file_exists('uploads/laporan/' . $laporan['dokumen_laporan'])) {
            unlink('uploads/laporan/' . $laporan['dokumen_laporan']);
        } // Mengecek apakah file laporan ada datanya di database

        $model->delete($id); // Menghapus data laporan dari database berdasarkan ID.

        return redirect()->to('/laporanOrmawa')->with('success', 'Laporan berhasil dihapus.');
        // Setelah data dan file dihapus, pengguna diarahkan kembali ke halaman /laporanOrmawa dengan pesan sukses.
    }

    public function keuangan() // Fungsi ini menyiapkan data dari model KeuanganModel dan mengirimkannya ke view Ormawa/keuangan.
    {
        $model = new \App\Models\KeuanganModel(); //  Membuat objek dari model KeuanganModel, yang bertanggung jawab untuk mengakses tabel keuangan di database.
        $data['keuangan'] = $model->findAll(); // Mengambil semua data dari tabel keuangan menggunakan metode findAll(), lalu menyimpannya dalam array $data dengan key 'keuangan'.

        return view('Ormawa/keuangan', $data);
        // Mengirimkan data keuangan ke view bernama Ormawa/keuangan agar bisa ditampilkan di halaman. 
        // Di dalam view ini, kemungkinan besar ada perulangan (foreach) untuk menampilkan setiap baris data keuangan ke dalam tabel HTML.
    }


    public function simpanKeuangan()
    {
        $model = new \App\Models\KeuanganModel(); // Membuat instance dari model KeuanganModel untuk mengakses tabel keuangan di database.

        $file = $this->request->getFile('bukti_rekening'); // Mengambil file dari form input dengan nama bukti_rekening.    

        if ($file && $file->isValid() && !$file->hasMoved()) { // Mengecek apakah file ada, valid, dan belum dipindahkan
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
            $extension = $file->getClientExtension();
            // Menentukan ekstensi file yang diizinkan, dan mengambil ekstensi file yang diupload.

            if (!in_array($extension, $allowedExtensions)) {
                return redirect()->to('/inputkeuanganOrmawa')->with('error', 'Format file tidak diizinkan.');
            } // Jika ekstensi file tidak termasuk yang diperbolehkan, pengguna diarahkan kembali dengan pesan error.

            if ($file->getSize() > 2 * 1024 * 1024) {
                return redirect()->to('/inputkeuanganOrmawa')->with('error', 'Ukuran file melebihi 2MB.');
            } // Jika ukuran file melebihi 2 MB, maka akan ditolak dan pengguna diarahkan dengan error.

            // Simpan file
            $newName = $file->getRandomName();
            $file->move('uploads/bukti_rekening', $newName);
            // Jika lolos validasi, File disimpan ke folder uploads/bukti_rekening/ dengan nama acak yang aman. 
            // ama file yang baru disimpan ke variabel $newName untuk dicatat di database.
        } else {
            return redirect()->back()->with('error', 'Bukti rekening tidak valid.');
        } // Jika file tidak valid sejak awal, maka langsung dikembalikan ke halaman sebelumnya dengan error.

        // Simpan ke database
        $data = [
            'nama_ukm'               => $this->request->getPost('nama_ukm'),
            'tanggal_pelaporan'     => $this->request->getPost('tanggal_pelaporan'),
            'nama_ketua'            => $this->request->getPost('nama_ketua'),
            'nama_bendahara'        => $this->request->getPost('nama_bendahara'),
            'total_dana_rekening'   => $this->request->getPost('total_dana_rekening'),
            'pengeluaran_bulan_lalu' => $this->request->getPost('pengeluaran_bulan_lalu'),
            'bukti_rekening'        => $newName,
            'komentar_admin'        => null,
            'komentar_wr'           => null
        ]; // Data diambil dari form input dan disusun dalam array untuk dimasukkan ke tabel keuangan. 
        //Kolom komentar_admin dan komentar_wr diset null karena belum diverifikasi.

        $model->insert($data); // Menyimpan data laporan keuangan ke database.

        return redirect()->to('/keuanganOrmawa')->with('success', 'Laporan keuangan berhasil disimpan.');
        // Setelah proses berhasil, pengguna diarahkan ke halaman /keuanganOrmawa dengan pesan sukses.
    }


    public function detailKeuangan($id) // Fungsi ini digunakan untuk Mencari data keuangan berdasarkan ID tertentu.
    {
        $model = new \App\Models\KeuanganModel(); // Membuat objek model KeuanganModel, untuk akses ke tabel laporan keuangan di database.
        $data = $model->find($id); // Mencari data berdasarkan primary key (ID). Jika ada, data disimpan ke variabel $data.

        if ($data) {
            return $this->response->setJSON($data);
            // Jika data ditemukan, sistem akan mengembalikan response dalam bentuk JSON.    
        } else {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Data keuangan tidak ditemukan']);
        } // Jika data tidak ditemukan, akan dikembalikan response
    }

    public function editkeuangan($id)
    {
        $model = new \App\Models\KeuanganModel(); // Membuat instance dari model KeuanganModel yang digunakan untuk mengambil data dari tabel keuangan.
        $data['keuangan'] = $model->find($id); // Mengambil satu baris data keuangan berdasarkan id dan menyimpannya ke dalam array $data dengan key 'keuangan'.

        if (!$data['keuangan']) {
            return redirect()->to('/keuanganOrmawa')->with('error', 'Data tidak ditemukan.');
        } // Jika data tidak ditemukan (misalnya id tidak valid atau sudah dihapus), maka pengguna akan diarahkan kembali ke halaman daftar keuangan (/keuanganOrmawa) dengan pesan error.

        return view('Ormawa/editkeuangan', $data);
        // Jika data ditemukan, maka sistem akan menampilkan halaman view editkeuangan, sambil mengirim data keuangan yang sudah diambil tadi.
    }

    public function updatekeuangan($id)
    {
        $model = new \App\Models\KeuanganModel();
        $keuangan = $model->find($id);
        // Inisialisasi model KeuanganModel dan mengambil data keuangan berdasarkan ID.

        if (!$keuangan) {
            return redirect()->to('/keuanganOrmawa')->with('error', 'Data tidak ditemukan.');
        } // Jika data tidak ditemukan, redirect ke halaman daftar keuangan (/keuanganOrmawa) dengan pesan error.

        // Ambil input dari form
        $data = [
            'nama_ukm'              => $this->request->getPost('nama_ukm'),
            'tanggal_pelaporan'     => $this->request->getPost('tanggal_pelaporan'),
            'nama_ketua'            => $this->request->getPost('nama_ketua'),
            'nama_bendahara'        => $this->request->getPost('nama_bendahara'),
            'total_dana_rekening'   => $this->request->getPost('total_dana_rekening'),
            'pengeluaran_bulan_lalu' => $this->request->getPost('pengeluaran_bulan_lalu'),
        ]; // Mengambil data dari input form untuk di-update ke database.

        // Jika ada file bukti rekening baru diunggah
        $file = $this->request->getFile('bukti_rekening'); // Ambil file dari input form bukti_rekening.
        if ($file && $file->isValid() && !$file->hasMoved()) { // Cek apakah file ada, valid, atau belum dipindahkan
            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
            $ext = $file->getClientExtension();
            // Tentukan ekstensi yang diizinkan dan ambil ekstensi file.

            if (!in_array($ext, $allowedExtensions)) {
                return redirect()->back()->with('error', 'Format file tidak didukung.');
            } // Jika ekstensi tidak sesuai, kembalikan ke form dengan error.

            if ($file->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran file tidak boleh lebih dari 2MB.');
            } // Validasi ukuran file (maksimal 2MB).

            // Simpan file baru
            $newName = $file->getRandomName();
            $file->move('uploads/bukti_rekening', $newName);
            $data['bukti_rekening'] = $newName;
            // Jika lolos validasi, file dipindahkan ke folder uploads/bukti_rekening dengan nama acak, dan disimpan ke database.
        }

        // Update data keuangan
        $model->update($id, $data); // Lakukan update data berdasarkan ID.

        return redirect()->to('/keuanganOrmawa')->with('success', 'Data keuangan berhasil diperbarui.');
        // Arahkan kembali ke halaman daftar dengan notifikasi sukses.
    }


    public function hapuskeuangan($id)
    {
        $model = new \App\Models\KeuanganModel();
        $keuangan = $model->find($id);
        // Inisialisasi model KeuanganModel dan mencari data laporan keuangan berdasarkan $id.

        if (!$keuangan) {
            return redirect()->to('/keuanganOrmawa')->with('error', 'Data keuangan tidak ditemukan.');
        } // Jika data keuangan tidak ditemukan. Sistem akan mengalihkan pengguna ke halaman /keuanganOrmawa, menampilkan pesan error

        // Hapus file bukti transaksi dari server (jika ada)
        if (!empty($keuangan['bukti_transaksi']) && file_exists('uploads/bukti_transaksi/' . $keuangan['bukti_transaksi'])) {
            unlink('uploads/bukti_transaksi/' . $keuangan['bukti_transaksi']);
        } // Menghapus File Bukti Transaksi dari Server

        // Hapus data dari database
        $model->delete($id); // Menghapus data laporan keuangan dari database berdasarkan ID.

        return redirect()->to('/keuanganOrmawa')->with('success', 'Data keuangan berhasil dihapus.');
        // Jika penghapusan berhasil, pengguna diarahkan kembali ke halaman daftar (/keuanganOrmawa) dengan pesan sukses.
    }

    public function profile()
    {
        $id = session()->get('id'); // pastikan session sudah diset saat login
        // Mengambil nilai id dari session.
        $model = new \App\Models\UserModel(); // ganti dengan model user kamu
        // Membuat objek model UserModel, yaitu model yang digunakan untuk mengambil data pengguna dari tabel user (bisa tabel user, ormawa, dsb sesuai struktur kamu).
        $data['username'] = $model->find($id); // Mencari data pengguna berdasarkan id dari session.

        return view('Ormawa/profileOrmawa', $data); // Menampilkan halaman view Ormawa/profileOrmawa dan mengirim data user ke dalamnya.
    }

    public function setting()
    {
        $model = new \App\Models\UserModel(); // ganti dengan model user kamu
        // Membuat objek model UserModel, yang digunakan untuk mengambil data user dari database.
        $id = session()->get('id'); // Mengambil ID user yang sedang login dari session.
        $user = $model->find($id); // Mencari dan mengambil data user dari database berdasarkan ID.

        return view('Ormawa/settingOrmawa', ['user' => $user]);
        // Menampilkan halaman view settingOrmawa dan mengirimkan data user ke dalamnya sebagai variabel bernama user.
    }

    public function update()
    {
        $model = new \App\Models\UserModel(); // Inisialisasi model
        // Membuat instance dari UserModel, yaitu model yang berhubungan dengan tabel user (contohnya: tabel users, ormawa, dsb).
        $id = session()->get('id'); // Mengambil id user yang sedang login dari session. Ini akan digunakan untuk tahu user mana yang akan di-update.
        $username = $this->request->getPost('username');
        $passwordBaru = $this->request->getPost('password_baru');
        $konfirmasi = $this->request->getPost('konfirmasi_password');
        // Mengambil input dari form HTML

        // Jika user mengisi password baru
        if (!empty($passwordBaru)) {
            if ($passwordBaru !== $konfirmasi) {
                return redirect()->back()->with('error', 'Password baru dan konfirmasi tidak cocok.');
            } // Validasi Password Baru

            $data = [
                'username' => $username,
                'password' => $passwordBaru, // plaintext (UAS)
                'updated_at' => date('Y-m-d H:i:s')
            ]; // Proses Update password
        } else {
            // Hanya update username
            $data = [
                'username' => $username,
                'updated_at' => date('Y-m-d H:i:s')
            ]; //  Hanya username dan waktu update yang disimpan.
        }

        $model->update($id, $data); // Menyimpan perubahan ke database untuk user dengan ID yang sesuai.

        return redirect()->to('/settingsOrmawa')->with('success', 'Pengaturan berhasil diperbarui.');
        // Setelah proses update selesai, diarahkan ke halaman pengaturan akun (settingsOrmawa) dan menampilkan pesan sukses.
    }
}
