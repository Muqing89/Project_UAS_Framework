<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table            = 'notifikasi'; // Menyatakan bahwa model ini berhubungan dengan tabel notifikasi di database.
    protected $primaryKey       = 'id'; // Menentukan bahwa kolom id adalah primary key dari tabel ini.
    protected $allowedFields    = ['pesan', 'tipe', 'status_baca']; // Hanya kolom ini saja yang dapat diisi atau dirubah
    protected $useTimestamps    = false; // Menonaktifkan penggunaan otomatis kolom created_at dan updated_at.
}
