<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul', 
        'deskripsi', 
        'kategori',
        'gambar', 
        'tanggal',
        'status'
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validasi
    protected $validationRules = [
        'judul' => 'required|min_length[3]|max_length[255]',
        'kategori' => 'required|in_list[kegiatan,fasilitas,prestasi]',
        'tanggal' => 'permit_empty|valid_date',
        'status' => 'required|in_list[aktif,nonaktif]'
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul harus diisi',
            'min_length' => 'Judul minimal 3 karakter',
            'max_length' => 'Judul maksimal 255 karakter'
        ],
        'kategori' => [
            'required' => 'Kategori harus dipilih',
            'in_list' => 'Kategori tidak valid'
        ],
        'tanggal' => [
            'valid_date' => 'Format tanggal tidak valid'
        ],
        'status' => [
            'required' => 'Status harus dipilih',
            'in_list' => 'Status tidak valid'
        ]
    ];

    protected $skipValidation = false;

    // Method untuk mendapatkan galeri berdasarkan kategori
    public function getByKategori($kategori = null)
    {
        if ($kategori) {
            return $this->where('kategori', $kategori)
                       ->where('status', 'aktif')
                       ->orderBy('tanggal', 'DESC')
                       ->findAll();
        }
        
        return $this->where('status', 'aktif')
                   ->orderBy('tanggal', 'DESC')
                   ->findAll();
    }

    // Method untuk mendapatkan galeri aktif
    public function getAktif()
    {
        return $this->where('status', 'aktif')
                   ->orderBy('tanggal', 'DESC')
                   ->findAll();
    }

    // Method untuk mendapatkan galeri dengan pagination
    public function getWithPagination($perPage = 10, $page = 1)
    {
        return $this->where('status', 'aktif')
                   ->orderBy('tanggal', 'DESC')
                   ->paginate($perPage, 'default', $page);
    }
}
