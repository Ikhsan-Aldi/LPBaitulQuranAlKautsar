<?php

namespace App\Models;

use CodeIgniter\Model;

class EkstrakurikulerModel extends Model
{
    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_ekstrakurikuler', 'deskripsi', 'pembimbing', 'jadwal'];
}
