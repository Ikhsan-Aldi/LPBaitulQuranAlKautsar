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
        
            // Daftar mapping utama (diperluas)
            $iconMapping = [
                // 🏊‍♂️ Olahraga
                'berenang'            => 'swimming-pool',
                'memanah'             => 'bullseye',
                'berkuda'             => 'horse',
                'beladiri'            => 'fist-raised',
                'karate'              => 'hand-fist',
                'taekwondo'           => 'user-ninja',
                'silat'               => 'user-shield',
                'futsal'              => 'futbol',
                'sepakbola'           => 'futbol',
                'basket'              => 'basketball-ball',
                'voli'                => 'volleyball-ball',
                'bulu tangkis'        => 'table-tennis-paddle-ball',
                'tenis'               => 'table-tennis-paddle-ball',
                'atletik'             => 'running',
                'senam'               => 'person-running',
        
                // 🎨 Seni dan budaya
                'musik'               => 'music',
                'band'                => 'guitar',
                'paduan suara'        => 'microphone-lines',
                'drumband'            => 'drum',
                'menari'              => 'person-dancing',
                'tari'                => 'person-dancing',
                'melukis'             => 'palette',
                'lukis'               => 'palette',
                'teater'              => 'masks-theater',
                'fotografi'           => 'camera',
                'sinematografi'       => 'film',
                'hadroh'              => 'drum',
                'kaligrafi'           => 'pen-nib',
        
                // 🧠 Akademik dan prestasi
                'olimpiade'           => 'trophy',
                'robotik'             => 'robot',
                'programming'         => 'laptop-code',
                'coding'              => 'code',
                'sains'               => 'flask',
                'matematika'          => 'square-root-variable',
                'bahasainggris'       => 'language',
                'bahasaarab'          => 'book-quran',
                'debat'               => 'comments',
                'pidato'              => 'microphone',
                'pidato3bahasa'       => 'microphone',
                'jurnalistik'         => 'newspaper',
                'literasi'            => 'book-open-reader',
                'publicspeaking'      => 'user-tie',
                'entrepreneurmuslim'  => 'chart-line',
                'karya ilmiah'        => 'flask-vial',
        
                // 🕌 Keagamaan & sosial
                'tahfidz'             => 'book-quran',
                'tilawah'             => 'book-open',
                'tartil'              => 'book-open',
                'qiroah'              => 'book-open-reader',
                'rohis'               => 'mosque',
                'pengajian'           => 'mosque',
                'ceramah'             => 'hands-praying',
                'dai'                 => 'hands-praying',
                'infaq'               => 'hand-holding-heart',
                'sosial'              => 'people-carry-box',
                'zakat'               => 'hand-holding-dollar',
        
                // 🌿 Alam dan lingkungan
                'sapala'              => 'mountain',
                'pecinta alam'        => 'tree',
                'pramuka'             => 'campground',
                'lingkungan'          => 'leaf',
                'garden'              => 'seedling',
        
                // 🎮 Teknologi dan digital
                'itclub'              => 'desktop',
                'teknologi'           => 'microchip',
                'multimedia'          => 'photo-video',
                'desain grafis'       => 'paintbrush',
                'videografi'          => 'video',
        
                // 🎭 Lain-lain
                'paskibra'            => 'flag',
                'pmr'                 => 'briefcase-medical',
                'osis'                => 'user-group',
                'koperasi'            => 'store',
                'kuliner'             => 'utensils',
                'kewirausahaan'       => 'handshake',
                'bahasajepang'        => 'language',
            ];
        
            foreach ($ekstrakurikuler as &$item) {
                $nama = strtolower($item['nama_ekstrakurikuler'] ?? '');
                // hapus spasi, tanda baca, simbol, dll.
                $normalized = preg_replace('/[^a-z0-9]/', '', $nama);
        
                $foundIcon = 'circle'; // default jika tidak ada mapping yang cocok
        
                // cek exact match dulu
                if (isset($iconMapping[$normalized])) {
                    $foundIcon = $iconMapping[$normalized];
                } else {
                    // kalau tidak ada, coba cari substring match
                    foreach ($iconMapping as $key => $icon) {
                        if (str_contains($normalized, $key)) {
                            $foundIcon = $icon;
                            break;
                        }
                    }
                }
        
                $item['icon'] = $foundIcon;
            }
        
            return $ekstrakurikuler;
        }        
}
