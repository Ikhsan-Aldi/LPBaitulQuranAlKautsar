<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $allowedFields = [
        'id_gelombang', 'jenjang',
        'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'asal_sekolah',
        'nisn', 'alamat', 'nama_ayah', 'nama_ibu', 'no_hp_ortu',
        'ktp_ortu', 'akta_kk', 'surat_ket_lulus', 'ijazah_terakhir', 'foto', 'status'
    ];
}
