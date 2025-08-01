<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanLaporanModel extends Model
{
    protected $table            = 'pengajuan_laporan'; // Menyatakan bahwa model ini berhubungan dengan tabel pengajuan_laporan di database.
    protected $primaryKey       = 'id'; // Menentukan bahwa kolom id adalah primary key dari tabel ini.
    protected $useAutoIncrement = true; // Menandakan bahwa primary key id akan bertambah otomatis (auto increment).
    protected $returnType       = 'array'; // Data yang dikembalikan oleh query akan berbentuk array (bukan objek).
    protected $useSoftDeletes   = false;  // Menonaktifkan fitur soft delete. 
    // Artinya jika data dihapus, maka akan benar-benar dihapus dari database (bukan hanya disembunyikan).
    protected $allowedFields    = [
        'nama_ukm',
        'nama_kegiatan',
        'tanggal_kegiatan',
        'hasil_kegiatan',
        'dokumen_laporan',
        'status_admin',
        'status_wr',
        'created_at',
        'updated_at',
        'komentar_admin',
        'komentar_wr',
    ]; // Hanya kolom ini saja yang dapat diisi atau dirubah

    protected $useTimestamps = true; // CodeIgniter akan otomatis mengisi kolom waktu
    protected $createdField  = 'created_at'; // Untuk pembuatannya
    protected $updatedField  = 'updated_at'; // Untuk update
}
