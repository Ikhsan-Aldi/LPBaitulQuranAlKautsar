<?php

namespace App\Models;

use CodeIgniter\Model;

class EkstrakurikulerModel extends Model
{
    protected $table = 'ekstrakurikuler';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_ekstrakurikuler', 'deskripsi', 'pembimbing', 'jadwal', 'icon'];

        // Method untuk mapping nama ke icon FontAwesome
    public function getWithIconMapping()
    {
        $ekstrakurikuler = $this->findAll();
        $iconMapping = [
            'Berenang' => 'swimming-pool',
            'Memanah' => 'bullseye',
            'Berkuda' => 'horse',
            'Olimpiade' => 'trophy',
            'Entrepreneur Muslim' => 'chart-line',
            'Beladiri' => 'fist-raised',
            'Pidato 3 Bahasa' => 'microphone',
            'Jurnalistik' => 'newspaper',
            'SAPALA' => 'mountain',
            // Tambahkan mapping lainnya sesuai kebutuhan
        ];
        
        foreach ($ekstrakurikuler as &$item) {
            $item['icon'] = $iconMapping[$item['nama_ekstrakurikuler']] ?? 'circle';
        }
        
        return $ekstrakurikuler;
    }
}
