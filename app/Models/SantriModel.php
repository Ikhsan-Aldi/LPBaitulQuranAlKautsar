<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $table = 'santri';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_pendaftaran', 'nis', 'nama', 'jenjang', 'asal_sekolah', 'alamat', 'no_hp', 'status'
    ];
}
