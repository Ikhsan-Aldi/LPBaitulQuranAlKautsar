<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalKegiatanModel extends Model
{
    protected $table = 'jadwal_kegiatan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kegiatan', 'waktu_mulai', 'waktu_selesai', 'deskripsi', 'klasifikasi'];
    protected $useTimestamps = true;
    
    protected $beforeInsert = ['setKlasifikasi'];
    protected $beforeUpdate = ['setKlasifikasi'];

    protected function setKlasifikasi(array $data)
    {
        if (empty($data['data']['klasifikasi']) && isset($data['data']['waktu_mulai'])) {
            $jam = (int) date('H', strtotime($data['data']['waktu_mulai']));
            
            if ($jam >= 3 && $jam < 12) {
                $data['data']['klasifikasi'] = 'pagi';
            } elseif ($jam >= 12 && $jam < 15) {
                $data['data']['klasifikasi'] = 'siang';
            } elseif ($jam >= 15 && $jam < 18) {
                $data['data']['klasifikasi'] = 'sore';
            } else {
                $data['data']['klasifikasi'] = 'malam';
            }
        }
        return $data;
    }
}
