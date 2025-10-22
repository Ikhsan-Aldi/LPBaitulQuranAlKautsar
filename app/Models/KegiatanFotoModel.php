<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanFotoModel extends Model
{
    protected $table = 'kegiatan_foto';
    protected $primaryKey = 'id_foto';
    protected $allowedFields = ['id_kegiatan', 'file_name'];
}
