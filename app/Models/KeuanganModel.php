<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'keuangan_ukm'; // Menyatakan bahwa model ini berhubungan dengan tabel keuangan_ukm di database.
    protected $primaryKey = 'id'; // Menentukan bahwa kolom id adalah primary key dari tabel ini.

    protected $allowedFields = [
        'nama_ukm',
        'tanggal_pelaporan',
        'nama_ketua',
        'nama_bendahara',
        'total_dana_rekening',
        'pengeluaran_bulan_lalu',
        'bukti_rekening',
        'komentar_admin',
        'komentar_wr',
        'created_at'
    ]; // Hanya kolom ini saja yang dapat diisi atau dirubah

    protected $useTimestamps = true; // Mengaktifkan fitur penandaan waktu otomatis.
    protected $createdField  = 'created_at'; // Kolom yang akan diisi secara otomatis saat data dibuat (insert).

    protected $updatedField  = ''; // Kosongkan karena tidak ada kolom updated_at
}
