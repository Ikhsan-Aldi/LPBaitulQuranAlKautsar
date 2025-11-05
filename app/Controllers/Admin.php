<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\EkstrakurikulerModel;
use App\Models\PengajarModel;
use App\Models\SantriModel;
use App\Models\GelombangModel;
use App\Models\PesanModel;
use App\Models\KontakModel;
use App\Models\BeritaModel;
use App\Models\DonasiModel;
use App\Models\RekeningDonasiModel;
use App\Models\JadwalKegiatanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Admin extends BaseController
{
    protected $pendaftaranModel;
    protected $gelombangModel;
    protected $pesanModel;
    protected $kontakModel;
    protected $beritaModel;
    protected $uploadPath;
    protected $jadwalKegiatanModel;
    protected $donasiModel;
    protected $rekeningModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
        $this->gelombangModel = new GelombangModel();
        $this->pesanModel = new PesanModel();
        $this->kontakModel = new KontakModel();
        $this->beritaModel = new BeritaModel();
        $this->donasiModel = new DonasiModel();
        $this->rekeningModel = new RekeningDonasiModel();
        $this->uploadPath = WRITEPATH . 'berita/';
        
        // Buat direktori jika belum ada
        if (!is_dir($this->uploadPath)) {
            mkdir($this->uploadPath, 0755, true);
        }
        $this->jadwalKegiatanModel = new JadwalKegiatanModel();
    }

    // Dashboard
    public function dashboard()
    {
        $santriModel = new SantriModel();
        $santriModel->findAll();
        $totalPendaftar = $this->pendaftaranModel->countAllResults();
        $diterima = $this->pendaftaranModel->where('status', 'Diterima')->countAllResults();
        $ditolak = $this->pendaftaranModel->where('status', 'Ditolak')->countAllResults();
        $data[] = $santriModel->findAll();
        $totalPengajar = (new PengajarModel())->countAllResults();
        $totalKegiatan = (new JadwalKegiatanModel())->countAllResults();
        $recentRegistrations = $this->pendaftaranModel
            ->orderBy('tanggal_daftar', 'DESC')
            ->limit(5)
            ->findAll();

        $data = [
            'title' => 'Dashboard Admin',
            'totalPendaftar' => $totalPendaftar,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'santri' => $data,
            'totalPengajar' => $totalPengajar,
            'totalKegiatan' => $totalKegiatan,
            'recentRegistrations' => $recentRegistrations
        ];

        return view('admin/v_dashboard', $data);
    }

    // Pendaftaran
    public function pendaftaran()
    {
        $data = [
            'title' => 'Data Pendaftar Santri Baru',
            'pendaftar' => $this->pendaftaranModel
                ->select('pendaftaran.*, gelombang_pendaftaran.nama AS nama_gelombang')
                ->join('gelombang_pendaftaran', 'gelombang_pendaftaran.id = pendaftaran.id_gelombang', 'left')
                ->orderBy('pendaftaran.tanggal_daftar', 'DESC')
                ->findAll(),
        ];
        return view('admin/pendaftaran/index', $data);
    }


    public function detail_pendaftaran($id)
    {
        $data = [
            'title' => 'Detail Pendaftar',
            'pendaftar' => $this->pendaftaranModel->find($id),
        ];
        return view('admin/pendaftaran/detail', $data);
    }

    public function verifikasi_pendaftaran($id, $status)
    {
        $this->pendaftaranModel->update($id, ['status' => $status]);
        return redirect()->to('/admin/pendaftaran')->with('success', "Status pendaftar #$id berhasil diubah menjadi $status");
    }

    // Ekstrakurikuler
    public function ekstrakurikuler()
    {
        $model = new EkstrakurikulerModel();
        $data['ekstrakurikuler'] = $model->findAll();
        $data['title'] = 'Data Ekstrakurikuler';
        return view('admin/ekstrakurikuler/index', $data);
    }

    public function ekstrakurikuler_tambah()
    {
        $data['title'] = 'Tambah Ekstrakurikuler';
        return view('admin/ekstrakurikuler/tambah', $data);
    }

    public function ekstrakurikuler_simpan()
    {
        $model = new EkstrakurikulerModel();

        $iconList = [
        'berenang'          => 'fas fa-swimming-pool',
        'tahfidz'           => 'fas fa-book',
        'futsal'            => 'fas fa-futbol',
        'hadrah'            => 'fas fa-music',
        'kaligrafi'         => 'fas fa-paint-brush',
        'teknologi'         => 'fas fa-code',
        'kajian'            => 'fas fa-mosque',
        'berkuda'           => 'fas fa-horse',
        'enterpreneur'      => 'fas fa-briefcase',
        'jurnalistik'       => 'fas fa-newspaper',
        'olimpiade'         => 'fas fa-medal',
        'memanah'           => 'fas fa-bullseye',
        'pencak_silat'      => 'fas fa-dumbbell',
        'sapala'            => 'fas fa-mountain',
        'berkebun'          => 'fas fa-seedling',
        'pidato'            => 'fas fa-microphone',
    ];


        $nama = strtolower($this->request->getPost('nama_ekstrakurikuler'));
        $icon = $this->request->getPost('icon') ?: ($iconList[$nama] ?? 'fas fa-star');

        $model->save([
            'nama_ekstrakurikuler' => $this->request->getPost('nama_ekstrakurikuler'),
            'deskripsi'            => $this->request->getPost('deskripsi'),
            'pembimbing'           => $this->request->getPost('pembimbing'),
            'jadwal'               => $this->request->getPost('jadwal'),
            'icon'                 => $icon,
        ]);

        return redirect()->to(base_url('admin/ekstrakurikuler'))->with('success', 'Data ekstrakurikuler berhasil ditambahkan');
    }

    public function ekstrakurikuler_edit($id)
    {
        $model = new EkstrakurikulerModel();
        $data['ekstra'] = $model->find($id);
        $data['title'] = 'Edit Ekstrakurikuler';
        return view('admin/ekstrakurikuler/edit', $data);
    }

   public function ekstrakurikuler_update($id)
    {
        $model = new EkstrakurikulerModel();
        $ekstra = $model->find($id);

        $iconList = [
        'berenang'          => 'fas fa-swimming-pool',
        'tahfidz'           => 'fas fa-book',
        'futsal'            => 'fas fa-futbol',
        'hadrah'            => 'fas fa-music',
        'kaligrafi'         => 'fas fa-paint-brush',
        'teknologi'         => 'fas fa-code',
        'kajian'            => 'fas fa-mosque',
        'berkuda'           => 'fas fa-horse',
        'enterpreneur'      => 'fas fa-briefcase',
        'jurnalistik'       => 'fas fa-newspaper',
        'olimpiade'         => 'fas fa-medal',
        'memanah'           => 'fas fa-bullseye',
        'pencak_silat'      => 'fas fa-dumbbell',
        'sapala'            => 'fas fa-mountain',
        'berkebun'          => 'fas fa-seedling',
        'pidato'            => 'fas fa-microphone',
    ];


        $nama = strtolower($this->request->getPost('nama_ekstrakurikuler'));
        $icon = $this->request->getPost('icon') ?: ($iconList[$nama] ?? $ekstra['icon']);

        $model->update($id, [
            'nama_ekstrakurikuler' => $this->request->getPost('nama_ekstrakurikuler'),
            'deskripsi'            => $this->request->getPost('deskripsi'),
            'pembimbing'           => $this->request->getPost('pembimbing'),
            'jadwal'               => $this->request->getPost('jadwal'),
            'icon'                 => $icon,
        ]);

        return redirect()->to(base_url('admin/ekstrakurikuler'))->with('success', 'Data ekstrakurikuler berhasil diperbarui');
    }

    public function ekstrakurikuler_hapus($id)
    {
        $model = new EkstrakurikulerModel();
        $ekstra = $model->find($id);

        if (!empty($ekstra['logo']) && file_exists('uploads/logo_ekstra/' . $ekstra['logo'])) {
            unlink('uploads/logo_ekstra/' . $ekstra['logo']);
        }

        $model->delete($id);
        return redirect()->to(base_url('admin/ekstrakurikuler'))->with('success', 'Data berhasil dihapus');
    }

    //Pengajar
    public function pengajar()
    {
        $model = new PengajarModel();
        $data = [
            'title' => 'Data Pengajar',
            'pengajar' => $model->findAll()
        ];
        return view('admin/pengajar/index', $data);
    }

    public function tambah_pengajar()
    {
        $data['title'] = 'Tambah Data Pengajar';
        return view('admin/pengajar/tambah', $data);
    }

    public function simpan_pengajar()
    {
        $model = new PengajarModel();
        $file = $this->request->getFile('foto');

        $namaFile = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $folder = WRITEPATH . 'pengajar';
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            $namaFile = $file->getRandomName();
            $file->move($folder, $namaFile);
        }

        $model->save([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nip' => $this->request->getPost('nip'),
            'jabatan' => $this->request->getPost('jabatan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'foto' => $namaFile,
        ]);

        return redirect()->to('/admin/pengajar')->with('success', 'Data pengajar berhasil ditambahkan.');
    }

    public function edit_pengajar($id)
    {
        $model = new PengajarModel();
        $data = [
            'title' => 'Edit Data Pengajar',
            'pengajar' => $model->find($id)
        ];
        return view('admin/pengajar/edit', $data);
    }
 
    public function update_pengajar($id)
    {
        $model = new PengajarModel();
        $pengajar = $model->find($id);

        $file = $this->request->getFile('foto');
        $namaFile = $pengajar['foto'];

        $folder = WRITEPATH . 'pengajar';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($namaFile && file_exists($folder . '/' . $namaFile)) {
                unlink($folder . '/' . $namaFile);
            }

            $namaFile = $file->getRandomName();
            $file->move($folder, $namaFile);
        }

        $model->update($id, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nip' => $this->request->getPost('nip'),
            'jabatan' => $this->request->getPost('jabatan'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'foto' => $namaFile,
        ]);

        return redirect()->to('/admin/pengajar')->with('success', 'Data pengajar berhasil diperbarui.');
    }

    public function hapus_pengajar($id)
    {
        $model = new PengajarModel();
        $pengajar = $model->find($id);

        $folder = WRITEPATH . 'pengajar';

        if ($pengajar && $pengajar['foto'] && file_exists($folder . '/' . $pengajar['foto'])) {
            unlink($folder . '/' . $pengajar['foto']);
        }

        $model->delete($id);
        return redirect()->to('/admin/pengajar')->with('success', 'Data pengajar berhasil dihapus.');
    }

    public function pengajarDetail($id)
    {
        $model = new \App\Models\PengajarModel();
        $pengajar = $model->find($id);

        if ($pengajar) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $pengajar
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    // Santri
    public function santri()
    {
        $santriModel = new SantriModel();
        $data['santri'] = $santriModel->findAll();
        $data['title'] = 'Data Santri';
        return view('admin/santri/index', $data);
    }

    public function santri_tambah()
    {
        $pendaftaranModel = new PendaftaranModel();
        $santriModel = new SantriModel();

        $sudahJadiSantri = $santriModel->select('id_pendaftaran')
                                    ->where('id_pendaftaran IS NOT NULL')
                                    ->findColumn('id_pendaftaran');

        $query = $pendaftaranModel->where('status', 'diterima');

        if (!empty($sudahJadiSantri)) {
            $query->whereNotIn('id_pendaftaran', $sudahJadiSantri);
        }

        $data['pendaftaran'] = $query->findAll();
        $data['title'] = 'Tambah Santri';

        return view('admin/santri/tambah', $data);
    }



    public function santri_simpan()
    {
        $santriModel = new SantriModel();
        
        $id_pendaftaran = $this->request->getPost('id_pendaftaran');
        $mode = $this->request->getPost('pilih_mode');

        if ($mode === 'pendaftaran' && !empty($id_pendaftaran)) {
            $result = $santriModel->importFromPendaftaran($id_pendaftaran);
            
            if (!$result) {
                return redirect()->back()->with('error', 'Gagal mengimpor data dari pendaftaran');
            }
            
            $nis = $this->request->getPost('nis');
            $status = $this->request->getPost('status');
            
            if (!empty($nis) || !empty($status)) {
            $updateData = [];
            $santriId = $result['id'] ?? null; 

            if (!empty($nis)) {
                if ($santriId && $santriModel->isNISExist($nis, $santriId)) {
                    $santriModel->delete($santriId); 
                    return redirect()->back()->withInput()->with('error', 'NIS sudah digunakan oleh santri lain');
                }
                $updateData['nis'] = $nis;
            }

            if (!empty($status)) {
                $updateData['status'] = $status;
            }

            if ($santriId) {
                $santriModel->update($santriId, $updateData);
            }
        }

            
        } else {
            // Mode: Input manual
            $data = [
                'id_pendaftaran'   => null,
                'nama_lengkap'     => $this->request->getPost('nama_lengkap'),
                'jenis_kelamin'    => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir'     => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'    => $this->request->getPost('tanggal_lahir'),
                'nis'              => $this->request->getPost('nis'),
                'nisn'             => $this->request->getPost('nisn'),
                'nama'             => $this->request->getPost('nama_lengkap'),
                'jenjang'          => $this->request->getPost('jenjang'),
                'asal_sekolah'     => $this->request->getPost('asal_sekolah'),
                'alamat'           => $this->request->getPost('alamat'),
                'nama_ayah'        => $this->request->getPost('nama_ayah'),
                'nama_ibu'         => $this->request->getPost('nama_ibu'),
                'no_hp'            => $this->request->getPost('no_hp'),
                'no_hp_ortu'       => $this->request->getPost('no_hp_ortu'),
                'ktp_ortu'         => $this->request->getPost('ktp_ortu'),
                'akta_kk'          => $this->request->getPost('akta_kk'),
                'surat_ket_lulus'  => $this->request->getPost('surat_ket_lulus'),
                'ijazah_terakhir'  => $this->request->getPost('ijazah_terakhir'),
                'foto'             => $this->request->getPost('foto'),
                'status'           => $this->request->getPost('status') ?? 'Aktif'
            ];

            try {
                if ($santriModel->isNISExist($data['nis'])) {
                    return redirect()->back()->withInput()->with('error', 'NIS sudah digunakan oleh santri lain');
                }

                $santriModel->insert($data);
                
            } catch (\Exception $e) {
                log_message('error', 'Error menyimpan data santri: ' . $e->getMessage());
                return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data santri');
            }
        }

        return redirect()->to(base_url('admin/santri'))->with('success', 'Data santri berhasil disimpan');
    }

    public function santri_edit($id)
    {
        $santriModel = new SantriModel();
        $data['santri'] = $santriModel->find($id);
        $data['title'] = 'Edit Santri';
        return view('admin/santri/edit', $data);
    }

    public function santri_update($id)
    {
        $santriModel = new SantriModel();
        $santriModel->update($id, [
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'jenjang' => $this->request->getPost('jenjang'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'status' => $this->request->getPost('status')
        ]);
        return redirect()->to(base_url('admin/santri'))->with('success', 'Data santri berhasil diperbarui');
    }

    public function santri_hapus($id)
    {
        $santriModel = new SantriModel();
        $santriModel->delete($id);
        return redirect()->to(base_url('admin/santri'))->with('success', 'Data santri berhasil dihapus');
    }

    public function santriDetail($id)
    {
        $model = new \App\Models\SantriModel();
        $santri = $model->find($id);

        if ($santri) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $santri
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function santri_detail($id)
    {
        $santriModel = new SantriModel();
        $santri = $santriModel->find($id);

        if (!$santri) {
            return redirect()->to(base_url('admin/santri'))->with('error', 'Data santri tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Santri - ' . $santri['nama_lengkap'],
            'santri' => $santri
        ];

        return view('admin/santri/detail', $data);
    }

    public function santri_update_status($id)
    {
        $santriModel = new SantriModel();
        $status = $this->request->getJSON()->status;

        $result = $santriModel->updateStatus($id, $status);

        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal mengupdate status']);
        }
    }

    // Gelombang Pendaftaran
    public function gelombang()
    {
        $gelombang = $this->gelombangModel->findAll();

        foreach ($gelombang as &$item) {
            $item['seleksi_array'] = json_decode($item['seleksi'] ?? '[]', true);
            $item['jadwal_seleksi_array'] = json_decode($item['jadwal_seleksi'] ?? '[]', true);
            $item['metode_array'] = json_decode($item['metode'] ?? '[]', true);
            $item['jumlah_seleksi'] = count($item['seleksi_array']);
        }

        // tes output
        // dd($gelombang); // ← aktifkan baris ini sementara untuk lihat isi array di layar

        $data = [
            'title' => 'Manajemen Gelombang Pendaftaran',
            'gelombang' => $gelombang
        ];

        return view('admin/gelombang/index', $data);
    }


    public function tambahGelombang()
    {
        $data = [
            'title' => 'Tambah Gelombang Pendaftaran',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/gelombang/form', $data);
    }

    public function simpanGelombang()
    {
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[100]',
            'tanggal_mulai' => 'required|valid_date',
            'tanggal_selesai' => 'required|valid_date',
            'status' => 'required|in_list[dibuka,ditutup,berakhir]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nama = $this->request->getPost('nama');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_selesai = $this->request->getPost('tanggal_selesai');
        $status = $this->request->getPost('status');

        $seleksi = $this->request->getPost('seleksi');
        $jadwal_seleksi = $this->request->getPost('jadwal_seleksi');
        $metode = $this->request->getPost('metode');

        if (empty($seleksi) || !is_array($seleksi)) {
            return redirect()->back()->withInput()->with('error', 'Minimal satu seleksi harus diisi');
        }

        
        $seleksi_data = [];
        $jadwal_data = [];
        $metode_data = [];

        foreach ($seleksi as $index => $nama_seleksi) {
            if (!empty($nama_seleksi) && !empty($jadwal_seleksi[$index]) && !empty($metode[$index])) {
                $seleksi_data[] = $nama_seleksi;
                $jadwal_data[] = $jadwal_seleksi[$index];
                $metode_data[] = $metode[$index];
            }
        }

        if (empty($seleksi_data)) {
            return redirect()->back()->withInput()->with('error', 'Minimal satu seleksi yang valid harus diisi');
        }

        $data = [
            'nama' => $nama,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'seleksi' => json_encode($seleksi_data),
            'jadwal_seleksi' => json_encode($jadwal_data),
            'metode' => json_encode($metode_data),
            'status' => $status
        ];

        if ($this->gelombangModel->save($data)) {
            return redirect()->to('/admin/gelombang')->with('success', 'Gelombang pendaftaran berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan gelombang pendaftaran');
        }
    }

    public function editGelombang($id)
    {
        $gelombang = $this->gelombangModel->find($id);

        if (!$gelombang) {
            return redirect()->to('/admin/gelombang')->with('error', 'Data gelombang tidak ditemukan');
        }

        $gelombang['seleksi_array'] = json_decode($gelombang['seleksi'], true) ?? [];
        $gelombang['jadwal_seleksi_array'] = json_decode($gelombang['jadwal_seleksi'], true) ?? [];
        $gelombang['metode_array'] = json_decode($gelombang['metode'], true) ?? [];

        $data = [
            'title' => 'Edit Gelombang Pendaftaran',
            'gelombang' => $gelombang,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/gelombang/form', $data);
    }

    public function updateGelombang($id)
    {
        
        $gelombang = $this->gelombangModel->find($id);
        if (!$gelombang) {
            return redirect()->to('/admin/gelombang')->with('error', 'Data gelombang tidak ditemukan');
        }
        
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[100]',
            'tanggal_mulai' => 'required|valid_date',
            'tanggal_selesai' => 'required|valid_date',
            'status' => 'required|in_list[dibuka,ditutup,berakhir]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $nama = $this->request->getPost('nama');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_selesai = $this->request->getPost('tanggal_selesai');
        $status = $this->request->getPost('status');
        
        $seleksi = $this->request->getPost('seleksi');
        $jadwal_seleksi = $this->request->getPost('jadwal_seleksi');
        $metode = $this->request->getPost('metode');

        if (empty($seleksi) || !is_array($seleksi)) {
            return redirect()->back()->withInput()->with('error', 'Minimal satu seleksi harus diisi');
        }

        $seleksi_data = [];
        $jadwal_data = [];
        $metode_data = [];

        foreach ($seleksi as $index => $nama_seleksi) {
            if (!empty($nama_seleksi) && !empty($jadwal_seleksi[$index]) && !empty($metode[$index])) {
                $seleksi_data[] = $nama_seleksi;
                $jadwal_data[] = $jadwal_seleksi[$index];
                $metode_data[] = $metode[$index];
            }
        }

        if (empty($seleksi_data)) {
            return redirect()->back()->withInput()->with('error', 'Minimal satu seleksi yang valid harus diisi');
        }
        
        $data = [
            'id' => $id,
            'nama' => $nama,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'seleksi' => json_encode($seleksi_data),
            'jadwal_seleksi' => json_encode($jadwal_data),
            'metode' => json_encode($metode_data),
            'status' => $status
        ];

        if ($this->gelombangModel->save($data)) {
            return redirect()->to('/admin/gelombang')->with('success', 'Gelombang pendaftaran berhasil diupdate');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate gelombang pendaftaran');
        }
    }

    public function hapusGelombang($id)
    {
        $gelombang = $this->gelombangModel->find($id);

        if (!$gelombang) {
            return redirect()->to('/admin/gelombang')->with('error', 'Data gelombang tidak ditemukan');
        }

        if ($this->gelombangModel->delete($id)) {
            return redirect()->to('/admin/gelombang')->with('success', 'Gelombang pendaftaran berhasil dihapus');
        } else {
            return redirect()->to('/admin/gelombang')->with('error', 'Gagal menghapus gelombang pendaftaran');
        }
    }

    public function gelombang_detail($id)
    {
        $gelombangModel = new GelombangModel();
        $pendaftaranModel = new PendaftaranModel();
        
        $gelombang = $gelombangModel->find($id);

        if (!$gelombang) {
            return redirect()->to(base_url('admin/gelombang'))->with('error', 'Data gelombang tidak ditemukan');
        }

        $jumlah_pendaftar = $pendaftaranModel->where('id_pendaftaran', $id)->countAllResults();
        $jumlah_diterima = $pendaftaranModel->where('id_pendaftaran', $id)->where('status', 'Diterima')->countAllResults();
        $jumlah_menunggu = $pendaftaranModel->where('id_pendaftaran', $id)->where('status', 'Menunggu Verifikasi')->countAllResults();

        $seleksi = json_decode($gelombang['seleksi'] ?? '[]', true);
        
        if (!is_array($seleksi) || empty($seleksi)) {
            $seleksi = [];
            
            $jadwal_seleksi = json_decode($gelombang['jadwal_seleksi'] ?? '[]', true);
            if (is_array($jadwal_seleksi) && !empty($jadwal_seleksi)) {
                $seleksi = $jadwal_seleksi;
            }
        }

        $data = [
            'title' => 'Detail Gelombang - ' . $gelombang['nama'],
            'gelombang' => $gelombang,
            'seleksi' => $seleksi, 
            'jumlah_pendaftar' => $jumlah_pendaftar,
            'jumlah_diterima' => $jumlah_diterima,
            'jumlah_menunggu' => $jumlah_menunggu,
        ];

        return view('admin/gelombang/detail', $data);
    }

    public function gelombang_update_status($id)
    {
        $gelombangModel = new GelombangModel();
        $status = $this->request->getJSON()->status;

        $result = $gelombangModel->update($id, ['status' => $status]);

        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal mengupdate status']);
        }
    }


    // Pesan 
    public function pesan()
    {
        $status = $this->request->getGet('status');
        
        $builder = $this->pesanModel->orderBy('created_at', 'DESC');
        
        // Filter by status jika ada
        if ($status && in_array($status, ['dibaca', 'belum_dibaca'])) {
            $builder->where('status', $status);
        }
        
        $data = [
            'title' => 'Pesan dari Pengunjung',
            'pesan' => $builder->findAll(),
            'current_status' => $status // Untuk set filter yang aktif
        ];
        return view('admin/pesan/index', $data);
    }
    
    public function detailPesan($id)
    {
        $pesan = $this->pesanModel->find($id);
        
        if (!$pesan) {
            return redirect()->to('/admin/pesan')->with('error', 'Pesan tidak ditemukan');
        }
    
        // Update status menjadi dibaca saat melihat detail
        if ($pesan['status'] === 'belum_dibaca') {
            $this->pesanModel->update($id, ['status' => 'dibaca']);
        }
    
        $data = [
            'title' => 'Detail Pesan',
            'pesan' => $pesan
        ];
    
        return view('admin/pesan/detail', $data);
    }
    
    // Tambahkan method untuk update status via AJAX
    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        
        if (!in_array($status, ['dibaca', 'belum_dibaca'])) {
            return redirect()->back()->with('error', 'Status tidak valid');
        }
        
        $updated = $this->pesanModel->update($id, ['status' => $status]);
        
        if ($updated) {
            return redirect()->back()->with('success', 'Status berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Gagal update status');
        }
    }

    public function hapusPesan($id)
    {
        $pesan = $this->pesanModel->find($id);
        
        if (!$pesan) {
            return redirect()->to('/admin/pesan')->with('error', 'Pesan tidak ditemukan');
        }

        if ($this->pesanModel->delete($id)) {
            return redirect()->to('/admin/pesan')->with('success', 'Pesan berhasil dihapus');
        } else {
            return redirect()->to('/admin/pesan')->with('error', 'Gagal menghapus pesan');
        }
    }

    
// ============================
// Galeri Controller (Revisi)
// ============================
public function galeri()
{
    $galeriModel = new \App\Models\GaleriModel();
    $galeri = $galeriModel->orderBy('created_at', 'DESC')->findAll();
    
    $data = [
        'title'  => 'Galeri',
        'galeri' => $galeri
    ];
    
    return view('admin/galeri/index', $data);
}

public function galeri_tambah()
{
    $data = [
        'title' => 'Tambah Galeri'
    ];
    
    return view('admin/galeri/tambah', $data);
}

public function galeri_simpan()
{
    $galeriModel = new \App\Models\GaleriModel();
    
    $rules = [
        'judul'    => 'required|min_length[3]|max_length[255]',
        'kategori' => 'required|in_list[kegiatan,fasilitas,prestasi]',
        'tanggal'  => 'permit_empty|valid_date',
        'gambar'   => 'permit_empty|uploaded[gambar]|max_size[gambar,2048]|ext_in[gambar,jpg,jpeg,png,gif]'
    ];
    
    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    $fileData = [];
    $uploadPath = WRITEPATH . 'galeri/';

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }
    
    $uploadedFile = $this->request->getFile('gambar');
    if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
        $newName = $uploadedFile->getRandomName();
        $uploadedFile->move($uploadPath, $newName);
        $fileData['gambar'] = $newName;
    } else {
        $fileData['gambar'] = null;
    }
    
    $data = [
        'judul'      => $this->request->getPost('judul'),
        'deskripsi'  => $this->request->getPost('deskripsi'),
        'kategori'   => $this->request->getPost('kategori'),
        'gambar'     => $fileData['gambar'],
        'tanggal'    => $this->request->getPost('tanggal') ?: date('Y-m-d'),
        'status'     => $this->request->getPost('status') ?: 'aktif'
    ];
    
    if ($galeriModel->save($data)) {
        return redirect()->to('/admin/galeri')->with('success', 'Galeri berhasil ditambahkan');
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal menambahkan galeri');
    }
}

public function galeri_edit($id)
{
    $galeriModel = new \App\Models\GaleriModel();
    $galeri = $galeriModel->find($id);
    
    if (!$galeri) {
        return redirect()->to('/admin/galeri')->with('error', 'Galeri tidak ditemukan');
    }
    
    $data = [
        'title'  => 'Edit Galeri',
        'galeri' => $galeri
    ];
    
    return view('admin/galeri/edit', $data);
}

public function galeri_update($id)
{
    $galeriModel = new \App\Models\GaleriModel();
    $galeri = $galeriModel->find($id);
    
    if (!$galeri) {
        return redirect()->to('/admin/galeri')->with('error', 'Galeri tidak ditemukan');
    }
    
    $rules = [
        'judul'    => 'required|min_length[3]|max_length[255]',
        'kategori' => 'required|in_list[kegiatan,fasilitas,prestasi]',
        'tanggal'  => 'permit_empty|valid_date',
        'gambar'   => 'permit_empty|uploaded[gambar]|max_size[gambar,2048]|ext_in[gambar,jpg,jpeg,png,gif]'
    ];
    
    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    
    $fileData = [];
    $uploadPath = WRITEPATH . 'galeri/'; // ✅ Gunakan writable/galeri

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }
    
    $uploadedFile = $this->request->getFile('gambar');
    if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
        // Hapus file lama jika ada
        if (!empty($galeri['gambar']) && file_exists($uploadPath . $galeri['gambar'])) {
            unlink($uploadPath . $galeri['gambar']);
        }

        $newName = $uploadedFile->getRandomName();
        $uploadedFile->move($uploadPath, $newName);
        $fileData['gambar'] = $newName;
    } else {
        $fileData['gambar'] = $galeri['gambar'];
    }
    
    $data = [
        'judul'      => $this->request->getPost('judul'),
        'deskripsi'  => $this->request->getPost('deskripsi'),
        'kategori'   => $this->request->getPost('kategori'),
        'gambar'     => $fileData['gambar'],
        'tanggal'    => $this->request->getPost('tanggal') ?: date('Y-m-d'),
        'status'     => $this->request->getPost('status') ?: 'aktif'
    ];
    
    if ($galeriModel->update($id, $data)) {
        return redirect()->to('/admin/galeri')->with('success', 'Galeri berhasil diperbarui');
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal memperbarui galeri');
    }
}

public function galeri_hapus($id)
{
    $galeriModel = new \App\Models\GaleriModel();
    $galeri = $galeriModel->find($id);
    
    if (!$galeri) {
        return redirect()->to('/admin/galeri')->with('error', 'Galeri tidak ditemukan');
    }
    
    $uploadPath = WRITEPATH . 'galeri/'; // ✅ Ganti ke writable
    
    if (!empty($galeri['gambar']) && file_exists($uploadPath . $galeri['gambar'])) {
        unlink($uploadPath . $galeri['gambar']);
    }
    
    if ($galeriModel->delete($id)) {
        return redirect()->to('/admin/galeri')->with('success', 'Galeri berhasil dihapus');
    } else {
        return redirect()->to('/admin/galeri')->with('error', 'Gagal menghapus galeri');
    }
}

public function galeri_detail($id)
{
    $galeriModel = new \App\Models\GaleriModel();
    $galeri = $galeriModel->find($id);
    
    if (!$galeri) {
        return redirect()->to('/admin/galeri')->with('error', 'Galeri tidak ditemukan');
    }
    
    $data = [
        'title'  => 'Detail Galeri',
        'galeri' => $galeri
    ];
    
    return view('admin/galeri/detail', $data);
}


    //PENGATURAN KONTAK
    public function pengaturan()
    {
        $kontakModel = new KontakModel();
        
        // Ambil data kontak yang pertama (asumsi hanya ada satu record)
        $kontak = $kontakModel->first();
        
        $data = [
            'title' => 'Pengaturan - Kontak',
            'kontak' => $kontak
        ];
        
        return view('admin/pengaturan/index', $data);
    }

    public function update_pengaturan()
    {
        $kontakModel = new KontakModel();
        
        // Ambil data yang ada
        $existingData = $kontakModel->first();
        
        // Format nomor telepon dan WhatsApp
        $telepon = $this->request->getPost('telepon');
        $whatsapp = $this->request->getPost('whatsapp');
        
        // Fungsi untuk memformat nomor
        $formatNomor = function($nomor) {
            if (empty($nomor)) return $nomor;
            
            // Hapus semua spasi
            $nomor = str_replace(' ', '', $nomor);
            
            // Jika diawali dengan 0, ganti dengan +62
            if (substr($nomor, 0, 1) === '0') {
                $nomor = '+62' . substr($nomor, 1);
            }
            // Jika diawali dengan 62, tambahkan +
            elseif (substr($nomor, 0, 2) === '62') {
                $nomor = '+' . $nomor;
            }
            // Jika belum ada +62, tambahkan
            elseif (substr($nomor, 0, 3) !== '+62') {
                $nomor = '+62' . $nomor;
            }
            
            return $nomor;
        };
        
        $data = [
            'telepon'   => $formatNomor($telepon),
            'whatsapp'  => $formatNomor($whatsapp),
            'email'     => $this->request->getPost('email'),
            'facebook'  => $this->request->getPost('facebook'),
            'instagram' => $this->request->getPost('instagram'),
            'tiktok'    => $this->request->getPost('tiktok'),
            'alamat'    => $this->request->getPost('alamat')
        ];
        
        // Jika data sudah ada, update. Jika belum, insert baru
        if ($existingData) {
            $kontakModel->update($existingData['id'], $data);
        } else {
            $kontakModel->insert($data);
        }
        
        return redirect()->to('/admin/pengaturan')->with('success', 'Informasi perusahaan berhasil diperbarui');
    }
    
    // Berita

    public function berita()
    {
        $data = [
            'title' => 'Manajemen Berita',
            'berita' => $this->beritaModel->orderBy('created_at', 'DESC')->findAll(),
            'active' => 'berita'
        ];

        return view('admin/berita/index', $data);
    }

    public function tambahBerita()
    {
        $data = [
            'title' => 'Tambah Berita',
            'active' => 'berita'
        ];

        return view('admin/berita/tambah', $data);
    }

    // Method untuk menyimpan berita baru
    public function storeBerita()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required|min_length[5]|max_length[255]',
            'penulis' => 'required|min_length[3]|max_length[100]',
            'excerpt' => 'required|min_length[10]',
            'isi' => 'required|min_length[10]',
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle file upload
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move($this->uploadPath, $namaFoto);
        }

        // Generate slug
        $slug = url_title($this->request->getPost('judul'), '-', true);

        // Simpan data ke database
        $data = [
            'judul' => $this->request->getPost('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getPost('penulis'),
            'excerpt' => $this->request->getPost('excerpt'),
            'isi' => $this->request->getPost('isi'),
            'foto' => $namaFoto,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        try {
            $this->beritaModel->insert($data);
            return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Hapus file yang sudah diupload jika gagal menyimpan ke database
            if ($namaFoto && file_exists($this->uploadPath . $namaFoto)) {
                unlink($this->uploadPath . $namaFoto);
            }
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan berita: ' . $e->getMessage());
        }
    }

    // Method untuk menampilkan form edit berita
    public function editBerita($id)
    {
        $berita = $this->beritaModel->find($id);
        
        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan!');
        }

        $data = [
            'title' => 'Edit Berita',
            'berita' => $berita,
            'active' => 'berita'
        ];

        return view('admin/berita/edit', $data);
    }

    // Method untuk update berita
    public function updateBerita($id)
    {
        // Ambil data berita lama
        $berita = $this->beritaModel->find($id);
        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Data berita tidak ditemukan.');
        }

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul'   => 'required|min_length[5]|max_length[255]',
            'penulis' => 'required|min_length[3]|max_length[100]',
            'excerpt' => 'required|min_length[10]',
            'isi'     => 'required|min_length[10]',
            'foto'    => 'if_exist|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle file upload (jika ada foto baru)
        $foto = $this->request->getFile('foto');
        $namaFoto = $berita['foto']; // default: gunakan foto lama

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Hapus foto lama jika ada
            if (!empty($berita['foto']) && file_exists($this->uploadPath . $berita['foto'])) {
                unlink($this->uploadPath . $berita['foto']);
            }

            // Simpan foto baru
            $namaFoto = $foto->getRandomName();
            $foto->move($this->uploadPath, $namaFoto);
        }

        // Generate slug baru (bisa juga tetap lama jika tidak berubah)
        $slug = url_title($this->request->getPost('judul'), '-', true);

        // Siapkan data untuk update
        $data = [
            'judul'      => $this->request->getPost('judul'),
            'slug'       => $slug,
            'penulis'    => $this->request->getPost('penulis'),
            'excerpt'    => $this->request->getPost('excerpt'),
            'isi'        => $this->request->getPost('isi'),
            'foto'       => $namaFoto,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        try {
            $this->beritaModel->update($id, $data);
            return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil diperbarui!');
        } catch (\Exception $e) {
            // Jika gagal, hapus foto baru agar tidak nyangkut di folder
            if ($foto && $foto->isValid() && file_exists($this->uploadPath . $namaFoto)) {
                unlink($this->uploadPath . $namaFoto);
            }

            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui berita: ' . $e->getMessage());
        }
    }

    public function deleteBerita($id)
    {
        $berita = $this->beritaModel->find($id);
        
        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan!');
        }

        try {
            if ($berita['foto'] && file_exists(ROOTPATH . 'public/uploads/berita/' . $berita['foto'])) {
                unlink(ROOTPATH . 'public/uploads/berita/' . $berita['foto']);
            }

            $this->beritaModel->delete($id);
            return redirect()->to(base_url('admin/berita'))->with('success', 'Berita berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Gagal menghapus berita: ' . $e->getMessage());
        }
    }

    public function previewBerita($id)
    {
        $berita = $this->beritaModel->find($id);
        
        if (!$berita) {
            return redirect()->to(base_url('admin/berita'))->with('error', 'Berita tidak ditemukan!');
        }

        $data = [
            'title' => $berita['judul'],
            'berita' => $berita
        ];

        return view('admin/berita/detail', $data);
    }

    public function image($filename)
    {
        $filePath = WRITEPATH . 'berita/' . $filename;
        
        // Cek apakah file exists
        if (!file_exists($filePath)) {
            // Return default image jika file tidak ditemukan
            $filePath = FCPATH . 'assets/images/default-news.jpg';
            
            if (!file_exists($filePath)) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

        // Get file mime type
        $mime = mime_content_type($filePath);
        
        // Set header dan output file
        header('Content-Type: ' . $mime);
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit();
    }

    private function compressImage($path, $quality = 80)
    {
        try {
            $info = getimagesize($path);
            if ($info['mime'] == 'image/jpeg') {
                $image = imagecreatefromjpeg($path);
                imagejpeg($image, $path, $quality);
            } elseif ($info['mime'] == 'image/png') {
                $image = imagecreatefrompng($path);
                imagepng($image, $path, 9); 
            }
            if (isset($image)) {
                imagedestroy($image);
            }
        } catch (\Exception $e) {
        }
    }

    private function generateExcerpt($content, $length = 150)
    {
        $cleanContent = strip_tags($content);
        $cleanContent = html_entity_decode($cleanContent, ENT_QUOTES, 'UTF-8');
        
        $cleanContent = preg_replace('/\s+/', ' ', $cleanContent);
        $cleanContent = trim($cleanContent);
        
        if (strlen($cleanContent) <= $length) {
            return $cleanContent;
        }
        
        $excerpt = substr($cleanContent, 0, $length);
        $lastSpace = strrpos($excerpt, ' ');
        
        if ($lastSpace !== false) {
            $excerpt = substr($excerpt, 0, $lastSpace);
        }
        
        return $excerpt . '...';
    }

    public function tampilFile($folder, $filename)
    {
        // Daftar folder yang diizinkan di dalam writable/
        $allowedFolders = ['pengajar', 'berita', 'galeri', 'kegiatan', 'pendaftaran', 'santri', 'berkas', 'donasi', 'rekening'];

        // Cegah akses folder yang tidak diizinkan
        if (!in_array($folder, $allowedFolders)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Folder tidak diizinkan.');
        }

        // Path ke file di dalam writable/
        $path = WRITEPATH . $folder . '/' . $filename;

        // Jika file tidak ditemukan, arahkan ke gambar default
        if (!file_exists($path)) {
            $default = FCPATH . 'assets/img/no-image.png';
            if (file_exists($default)) {
                $path = $default;
            } else {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan.');
            }
        }

        // Ambil MIME type untuk response
        $mime = mime_content_type($path);

        // Kirim file ke browser
        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setBody(file_get_contents($path));
    }


    public function exportPendaftarPdf()
    {
        $data['pendaftar'] = $this->pendaftaranModel
            ->select('pendaftaran.*, gelombang_pendaftaran.nama AS nama_gelombang')
            ->join('gelombang_pendaftaran', 'gelombang_pendaftaran.id = pendaftaran.id_gelombang', 'left')
            ->where('pendaftaran.status', 'Diterima')
            ->orderBy('gelombang_pendaftaran.nama', 'ASC')
            ->findAll();

        $html = view('admin/pendaftaran/export_pdf', $data);

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('daftar_santri_diterima.pdf', ["Attachment" => true]);
    }


    public function exportPendaftarExcel()
    {
        $data = $this->pendaftaranModel
            ->select('pendaftaran.*, gelombang_pendaftaran.nama AS nama_gelombang')
            ->join('gelombang_pendaftaran', 'gelombang_pendaftaran.id = pendaftaran.id_gelombang', 'left')
            ->where('pendaftaran.status', 'Diterima')
            ->orderBy('gelombang_pendaftaran.nama', 'ASC')
            ->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Santri Diterima');

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Lengkap');
        $sheet->setCellValue('C1', 'Jenjang');
        $sheet->setCellValue('D1', 'Gelombang');
        $sheet->setCellValue('E1', 'Tanggal Daftar');

        $row = 2;
        $no = 1;
        foreach ($data as $d) {
            $sheet->setCellValue('A'.$row, $no++);
            $sheet->setCellValue('B'.$row, $d['nama_lengkap']);
            $sheet->setCellValue('C'.$row, $d['jenjang']);
            $sheet->setCellValue('D'.$row, $d['nama_gelombang']);
            $sheet->setCellValue('E'.$row, date('d-m-Y', strtotime($d['tanggal_daftar'])));
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'daftar_santri_diterima.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. $filename .'"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    // Rekening Donasi
    public function rekening()
    {
        $model = new \App\Models\RekeningDonasiModel();
        $data = [
            'title' => 'Daftar Rekening Donasi',
            'rekening' => $model->findAll()
        ];

        return view('admin/rekening/index', $data);
    }

    public function rekeningStore()
    {
        $model = new \App\Models\RekeningDonasiModel();

        $jenis = $this->request->getPost('jenis');
        $file = $this->request->getFile('gambar');
        $gambarName = null;

        // Buat folder simpan gambar
        $targetPath = WRITEPATH . 'rekening/';
        if (!is_dir($targetPath)) {
            mkdir($targetPath, 0777, true);
        }

        // Upload gambar hanya untuk QRIS
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambarName = $file->getRandomName();
            $file->move($targetPath, $gambarName);
        }

        $data = [
            'jenis' => $jenis,
            'bank' => $this->request->getPost('bank') ?? null,
            'nomor_rekening' => $this->request->getPost('nomor_rekening') ?? null,
            'atas_nama' => $this->request->getPost('atas_nama') ?? null,
            'gambar' => $gambarName,
            'status' => $this->request->getPost('status')
        ];

        $model->insert($data);

        return redirect()->to(base_url('admin/rekening'))
            ->with('success', 'Data donasi berhasil ditambahkan.');
    }


    public function rekening_create()
    {
        $data['title'] = 'Tambah Rekening Donasi';
        return view('admin/rekening/create', $data);
    }

    public function rekening_edit($id)
    {
        $data = [
            'title' => 'Edit Rekening Donasi',
            'rekening' => $this->rekeningModel->find($id)
        ];
        return view('admin/rekening/edit', $data);
    }

    public function rekening_update($id)
    {
        $this->rekeningModel->update($id, [
            'bank' => $this->request->getPost('bank'),
            'nomor_rekening' => $this->request->getPost('nomor_rekening'),
            'atas_nama' => $this->request->getPost('atas_nama'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('/admin/rekening')->with('success', 'Rekening donasi berhasil diperbarui.');
    }

    public function rekening_delete($id)
    {
        $this->rekeningModel->delete($id);
        return redirect()->to('/admin/rekening')->with('success', 'Rekening donasi berhasil dihapus.');
    }

    public function uploadRekening()
    {
        $file = $this->request->getFile('gambar');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak valid atau belum dipilih.');
        }

        // Validasi tipe file (opsional tapi disarankan)
        $validExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($file->getExtension(), $validExtensions)) {
            return redirect()->back()->with('error', 'Hanya file gambar yang diperbolehkan (JPG, PNG, WEBP).');
        }

        // Pastikan folder tujuan ada
        $targetPath = WRITEPATH . 'rekening/';
        if (!is_dir($targetPath)) {
            mkdir($targetPath, 0777, true);
        }

        // Simpan dengan nama acak agar unik
        $newName = $file->getRandomName();
        $file->move($targetPath, $newName);

        // Simpan ke database rekening (contoh)
        $rekeningModel = new RekeningDonasiModel();
        $rekeningModel->insert([
            'nama_bank' => $this->request->getPost('nama_bank'),
            'no_rekening' => $this->request->getPost('no_rekening'),
            'atas_nama' => $this->request->getPost('atas_nama'),
            'gambar' => $newName
        ]);

        return redirect()->back()->with('success', 'Data rekening berhasil disimpan.');
    }

    // Donasi

    public function donasi()
    {
        $donasiModel = new DonasiModel();

        $donasi = $donasiModel
            ->select('donasi.*, rekening_donasi.bank AS bank_tujuan')
            ->join('rekening_donasi', 'rekening_donasi.id = donasi.bank_tujuan', 'left')
            ->orderBy('donasi.created_at', 'DESC')
            ->findAll();

        $data = [
            'title' => 'Data Donasi',
            'donasi' => $donasi
        ];

        return view('admin/donasi/index', $data);
    }

    public function viewBukti($filename)
    {
        $path = WRITEPATH . 'donasi/' . $filename;
        if (!file_exists($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan.');
        }

        $mime = mime_content_type($path);
        header("Content-Type: $mime");
        readfile($path);
        exit;
    }


    public function donasi_show($id)
    {
        $donasi = $this->donasiModel->find($id);

        if (!$donasi) {
            return redirect()->to('/admin/donasi')->with('error', 'Data donasi tidak ditemukan.');
        }

        // Jika kamu punya model rekening (bank tujuan)
        $rekeningModel = new \App\Models\RekeningDonasiModel();
        $rekening = null;
        if (!empty($donasi['bank_tujuan'])) {
            $rekening = $rekeningModel
                ->where('bank', $donasi['bank_tujuan'])
                ->first();
        }

        $data = [
            'title' => 'Detail Donasi',
            'donasi' => $donasi,
            'rekening' => $rekening
        ];

        return view('admin/donasi/show', $data);
    }


    public function donasi_updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $this->donasiModel->update($id, ['status' => $status]);

        return redirect()->to('/admin/donasi')->with('success', 'Status donasi berhasil diperbarui.');
    }

    public function donasi_delete($id)
    {
        $this->donasiModel->delete($id);
        return redirect()->to('/admin/donasi')->with('success', 'Data donasi berhasil dihapus.');
    }


    // Jadwal Kegiatan
    public function jadwalkegiatan()
    {
        $data = [
            'title' => 'Jadwal Kegiatan Harian',
            'jadwal' => $this->jadwalKegiatanModel->orderBy('waktu_mulai', 'ASC')->findAll(),
        ];
        return view('admin/jadwalkegiatan/index', $data);
    }

    // Jadwal Kegiatan - Create Form
    public function createjk()
    {
        $data = [
            'title' => 'Tambah Jadwal Kegiatan',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/jadwalkegiatan/form', $data);
    }

    // Jadwal Kegiatan - Store
    public function storejk()
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'nama_kegiatan' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ], [
            'nama_kegiatan' => [
                'required' => 'Nama kegiatan harus diisi'
            ],
            'waktu_mulai' => [
                'required' => 'Waktu mulai harus diisi'
            ],
            'waktu_selesai' => [
                'required' => 'Waktu selesai harus diisi'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->jadwalKegiatanModel->save([
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'waktu_mulai' => $this->request->getPost('waktu_mulai'),
            'waktu_selesai' => $this->request->getPost('waktu_selesai'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'klasifikasi' => $this->request->getPost('klasifikasi'), // Bisa dikosongkan, akan diisi otomatis
        ]);

        return redirect()->to('/admin/jadwalkegiatan')->with('success', 'Jadwal kegiatan berhasil ditambahkan');
    }

    // Jadwal Kegiatan - Edit Form
    public function editjk($id)
    {
        $jadwal = $this->jadwalKegiatanModel->find($id);
        
        if (!$jadwal) {
            return redirect()->to('/admin/jadwalkegiatan')->with('error', 'Jadwal kegiatan tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Jadwal Kegiatan',
            'jadwal' => $jadwal,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/jadwalkegiatan/form', $data);
    }

    // Jadwal Kegiatan - Update
    public function updatejk($id)
    {
        $jadwal = $this->jadwalKegiatanModel->find($id);
        
        if (!$jadwal) {
            return redirect()->to('/admin/jadwalkegiatan')->with('error', 'Jadwal kegiatan tidak ditemukan');
        }

        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'nama_kegiatan' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ], [
            'nama_kegiatan' => [
                'required' => 'Nama kegiatan harus diisi'
            ],
            'waktu_mulai' => [
                'required' => 'Waktu mulai harus diisi'
            ],
            'waktu_selesai' => [
                'required' => 'Waktu selesai harus diisi'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->jadwalKegiatanModel->update($id, [
            'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
            'waktu_mulai' => $this->request->getPost('waktu_mulai'),
            'waktu_selesai' => $this->request->getPost('waktu_selesai'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'klasifikasi' => $this->request->getPost('klasifikasi'),
        ]);

        return redirect()->to('/admin/jadwalkegiatan')->with('success', 'Jadwal kegiatan berhasil diperbarui');
    }

    // Jadwal Kegiatan - Delete
    public function deletejk($id)
    {
        $jadwal = $this->jadwalKegiatanModel->find($id);
        
        if (!$jadwal) {
            return redirect()->to('/admin/jadwalkegiatan')->with('error', 'Jadwal kegiatan tidak ditemukan');
        }

        $this->jadwalKegiatanModel->delete($id);
        return redirect()->to('/admin/jadwalkegiatan')->with('success', 'Jadwal kegiatan berhasil dihapus');
    }
}
