<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = ['username', 'password', 'role'];

    // Optional: otomatis timestamp created_at/updated_at jika ada kolom
    protected $useTimestamps = true;
}
