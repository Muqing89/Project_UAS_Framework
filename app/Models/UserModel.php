<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users'; // Menyatakan bahwa model ini berhubungan dengan tabel users di database.
    protected $primaryKey = 'id'; // Menentukan bahwa kolom id adalah primary key dari tabel ini.

    protected $useAutoIncrement = true; // Menandakan bahwa primary key id akan bertambah otomatis (auto increment).
    protected $returnType       = 'array'; // Data yang dikembalikan oleh query akan berbentuk array (bukan objek).

    protected $allowedFields = ['username', 'password', 'role']; // Hanya kolom ini saja yang dapat diisi atau dirubah

    // Optional: otomatis timestamp created_at/updated_at jika ada kolom
    protected $useTimestamps = true; // CodeIgniter akan otomatis mengisi kolom waktu

    protected $createdField  = 'created_at'; // Untuk pembuatannya
    protected $updatedField  = 'updated_at'; // Untuk update
}
