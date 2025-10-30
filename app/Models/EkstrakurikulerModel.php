<?php

namespace App\Models;

use CodeIgniter\Model;

class EkstrakurikulerModel extends Model
{
    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_ekstrakurikuler', 'deskripsi', 'pembimbing', 'jadwal', 'icon'];

        public function getWithIconMapping()
{
    $ekstrakurikuler = $this->findAll();

    foreach ($ekstrakurikuler as &$item) {
        if (empty($item['icon'])) {
            $item['icon'] = 'fas fa-circle';
        }
    }

    return $ekstrakurikuler;
}
        
}
