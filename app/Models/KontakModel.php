<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $table            = 'kontak';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    // Kolom yang boleh diisi (mass assignable)
    protected $allowedFields    = [
        'telepon',
        'whatsapp',
        'email',
        'facebook',
        'instagram',
        'tiktok',
        'alamat',
        'created_at',
        'updated_at'
    ];

    // Aktifkan fitur timestamp otomatis
    protected $useTimestamps = true;

    // Nama kolom timestamp di database
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // (Opsional) Jika kamu ingin menonaktifkan auto-validation
    protected $skipValidation = true;
}
