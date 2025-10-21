<?php

namespace App\Models;

use CodeIgniter\Model;

class GelombangModel extends Model
{
    protected $table = 'gelombang_pendaftaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 
        'tanggal_mulai', 
        'tanggal_selesai',
        'seleksi', 
        'jadwal_seleksi', 
        'metode', 
        'status'
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validasi
    protected $validationRules = [
        'nama' => 'required|min_length[3]|max_length[100]',
        'tanggal_mulai' => 'required|valid_date',
        'tanggal_selesai' => 'required|valid_date',
        'status' => 'required|in_list[dibuka,ditutup,berakhir]'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama gelombang harus diisi',
            'min_length' => 'Nama gelombang minimal 3 karakter',
            'max_length' => 'Nama gelombang maksimal 100 karakter'
        ],
        'tanggal_mulai' => [
            'required' => 'Tanggal mulai harus diisi',
            'valid_date' => 'Format tanggal mulai tidak valid'
        ],
        'tanggal_selesai' => [
            'required' => 'Tanggal selesai harus diisi',
            'valid_date' => 'Format tanggal selesai tidak valid'
        ],
        'status' => [
            'required' => 'Status harus dipilih',
            'in_list' => 'Status tidak valid'
        ]
    ];

    protected $skipValidation = false;
}
