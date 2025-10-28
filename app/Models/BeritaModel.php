<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $allowedFields = ['judul', 'slug', 'isi', 'excerpt', 'foto', 'penulis', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function getRecent($limit = 3)
    {
        return $this->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->find();
    }
}