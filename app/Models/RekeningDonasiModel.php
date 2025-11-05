<?php

namespace App\Models;
use CodeIgniter\Model;

class RekeningDonasiModel extends Model
{
    protected $table = 'rekening_donasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'jenis',
        'bank',
        'nomor_rekening',
        'atas_nama',
        'gambar',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;

    public function getAktif()
    {
        return $this->where('status', 'Aktif')->findAll();
    }
}
