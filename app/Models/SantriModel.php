<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $table            = 'santri';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pendaftaran',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nis',
        'nisn',
        'jenjang',
        'asal_sekolah',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'no_hp',
        'no_hp_ortu',
        'ktp_ortu',
        'akta_kk',
        'surat_ket_lulus',
        'ijazah_terakhir',
        'foto',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'nama_lengkap'   => 'required|max_length[100]',
        'jenis_kelamin'  => 'required|in_list[Laki-laki,Perempuan]',
        'nis'            => 'required|max_length[20]|is_unique[santri.nis,id,{id}]',
        'nisn'           => 'permit_empty|max_length[20]',
        'jenjang'        => 'required|in_list[SMP,SMA]',
        'asal_sekolah'   => 'required|max_length[150]',
        'status'         => 'required|in_list[Aktif,Lulus,Nonaktif]',
        'no_hp'          => 'permit_empty|max_length[20]',
        'no_hp_ortu'     => 'permit_empty|max_length[15]',
        'tempat_lahir'   => 'permit_empty|max_length[50]',
        'tanggal_lahir'  => 'permit_empty|valid_date',
        'nama_ayah'      => 'permit_empty|max_length[100]',
        'nama_ibu'       => 'permit_empty|max_length[100]',
        'alamat'         => 'permit_empty',
        'id_pendaftaran' => 'permit_empty|integer'
    ];

    protected $validationMessages = [
        'nis' => [
            'required' => 'NIS harus diisi',
            'is_unique' => 'NIS sudah digunakan oleh santri lain.'
        ],
        'nama_lengkap' => [
            'required' => 'Nama lengkap harus diisi.'
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus dipilih.'
        ],
        'jenjang' => [
            'required' => 'Jenjang harus dipilih.'
        ],
        'asal_sekolah' => [
            'required' => 'Asal sekolah harus diisi.'
        ]
    ];

    protected $skipValidation = false;

    // Callbacks - Simplified
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $beforeUpdate   = [];

    /**
     * Get santri by NIS
     */
    public function getByNIS($nis)
    {
        return $this->where('nis', $nis)->first();
    }

    /**
     * Get santri by status
     */
    public function getByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    /**
     * Get santri aktif
     */
    public function getAktif()
    {
        return $this->where('status', 'Aktif')->findAll();
    }

    /**
     * Get statistics
     */
    public function getStats()
    {
        $total = $this->countAll();
        $aktif = $this->where('status', 'Aktif')->countAllResults();
        $lulus = $this->where('status', 'Lulus')->countAllResults();
        $nonaktif = $this->where('status', 'Nonaktif')->countAllResults();

        return [
            'total' => $total,
            'aktif' => $aktif,
            'lulus' => $lulus,
            'nonaktif' => $nonaktif
        ];
    }

    /**
     * Update status santri
     */
    public function updateStatus($id, $status)
    {
        $allowedStatus = ['Aktif', 'Lulus', 'Nonaktif'];
        if (!in_array($status, $allowedStatus)) {
            return false;
        }

        return $this->update($id, ['status' => $status]);
    }

    /**
     * Check if NIS exists
     */
    public function isNISExist($nis, $excludeId = null)
    {
        $builder = $this->where('nis', $nis);
        
        if ($excludeId) {
            $builder->where('id !=', $excludeId);
        }
        
        return $builder->countAllResults() > 0;
    }

    /**
     * Import data santri dari pendaftaran
     */
    public function importFromPendaftaran($idPendaftaran)
    {
        $pendaftaranModel = new \App\Models\PendaftaranModel();
        $pendaftaran = $pendaftaranModel->find($idPendaftaran);
        
        if (!$pendaftaran) {
            return false;
        }

        // Cek apakah sudah ada santri dengan id_pendaftaran ini
        $existingSantri = $this->where('id_pendaftaran', $idPendaftaran)->first();
        if ($existingSantri) {
            return false;
        }

        $data = [
            'id_pendaftaran'   => $pendaftaran['id_pendaftaran'],
            'nama_lengkap'     => $pendaftaran['nama_lengkap'],
            'jenis_kelamin'    => $pendaftaran['jenis_kelamin'],
            'tempat_lahir'     => $pendaftaran['tempat_lahir'],
            'tanggal_lahir'    => $pendaftaran['tanggal_lahir'],
            'nisn'             => $pendaftaran['nisn'],
            'jenjang'          => $pendaftaran['jenjang'],
            'asal_sekolah'     => $pendaftaran['asal_sekolah'],
            'alamat'           => $pendaftaran['alamat'],
            'nama_ayah'        => $pendaftaran['nama_ayah'],
            'nama_ibu'         => $pendaftaran['nama_ibu'],
            'no_hp_ortu'       => $pendaftaran['no_hp_ortu'],
            'ktp_ortu'         => $pendaftaran['ktp_ortu'],
            'akta_kk'          => $pendaftaran['akta_kk'],
            'surat_ket_lulus'  => $pendaftaran['surat_ket_lulus'],
            'ijazah_terakhir'  => $pendaftaran['ijazah_terakhir'],
            'foto'             => $pendaftaran['foto'],
            'status'           => 'Aktif'
        ];

        // Generate NIS otomatis
        $tahun = date('Y');
        $lastSantri = $this->orderBy('id', 'DESC')->first();
        
        if ($lastSantri && !empty($lastSantri['nis'])) {
            $lastNIS = $lastSantri['nis'];
            if (preg_match('/\d+/', $lastNIS, $matches)) {
                $lastNumber = (int) end($matches);
                $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }
        } else {
            $newNumber = '0001';
        }
        
        $data['nis'] = 'S' . $tahun . $newNumber;

        try {
            $santriId = $this->insert($data);
            return $this->find($santriId);
        } catch (\Exception $e) {
            log_message('error', 'Error importing santri from pendaftaran: ' . $e->getMessage());
            return false;
        }
    }
}