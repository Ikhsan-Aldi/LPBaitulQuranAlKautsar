<?php

namespace App\Models;

use CodeIgniter\Model;

class DonasiModel extends Model
{
    protected $table = 'donasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'email', 'nominal', 'pesan', 'bank_tujuan', 'bukti_transfer', 'status', 'created_at'
    ];
    protected $useTimestamps = false;
}
