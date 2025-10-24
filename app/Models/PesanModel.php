<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table            = 'pesan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'nama_lengkap',
        'email',
        'telepon',
        'subjek',
        'pesan',
        'status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Default values
    protected $beforeInsert = ['setDefaultStatus'];
    
    protected function setDefaultStatus(array $data)
    {
        $data['data']['status'] = 'belum_dibaca';
        return $data;
    }
}