<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanKegiatanModel extends Model
{
    protected $table = 'pengajuan_kegiatan'; // Menyatakan bahwa model ini berhubungan dengan tabel pengajuan_kegiatan di database.
    protected $primaryKey = 'id'; // Menentukan bahwa kolom id adalah primary key dari tabel ini.

    protected $allowedFields = [
        'nama_ukm',
        'tempat_kegiatan',
        'jumlah_peserta',
        'ketua_pelaksana',
        'tanggal_kegiatan',
        'waktu_kegiatan',
        'target_peserta',
        'proposal_kegiatan',
        'deskripsi',
        'status_admin',
        'status_wr',
        'komentar_admin',
        'komentar_wr'
    ]; // Hanya kolom ini saja yang dapat diisi atau dirubah

    protected $useTimestamps = true; // CodeIgniter akan otomatis mengisi kolom waktu
    protected $createdField  = 'created_at'; // Untuk pembuatannya
    protected $updatedField  = 'updated_at'; // Untuk update
}
