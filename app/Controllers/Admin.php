<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\EkstrakurikulerModel;
use App\Models\PengajarModel;
use App\Models\SantriModel;
use App\Models\KegiatanModel;
use App\Models\GelombangModel;


class Admin extends BaseController
{
    protected $pendaftaranModel;
    protected $gelombangModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
        $this->gelombangModel = new GelombangModel();
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
        $totalKegiatan = (new KegiatanModel())->countAllResults();
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
            'pendaftar' => $this->pendaftaranModel->orderBy('tanggal_daftar', 'DESC')->findAll(),
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
            'berenang' => 'fas fa-swimming-pool',
            'tahfidz'  => 'fas fa-book',
            'futsal'   => 'fas fa-futbol',
            'hadrah'   => 'fas fa-music',
            'kaligrafi'=> 'fas fa-paint-brush',
            'teknologi'=> 'fas fa-code',
            'kajian'   => 'fas fa-mosque',
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
            'berenang' => 'fas fa-swimming-pool',
            'tahfidz'  => 'fas fa-book',
            'futsal'   => 'fas fa-futbol',
            'hadrah'   => 'fas fa-music',
            'kaligrafi'=> 'fas fa-paint-brush',
            'teknologi'=> 'fas fa-code',
            'kajian'   => 'fas fa-mosque',
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
            $namaFile = $file->getRandomName();
            $file->move('uploads/pengajar', $namaFile);
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

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($namaFile && file_exists('uploads/pengajar/' . $namaFile)) {
                unlink('uploads/pengajar/' . $namaFile);
            }
            $namaFile = $file->getRandomName();
            $file->move('uploads/pengajar', $namaFile);
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

        if ($pengajar && $pengajar['foto'] && file_exists('uploads/pengajar/' . $pengajar['foto'])) {
            unlink('uploads/pengajar/' . $pengajar['foto']);
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


    //Santri
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
        $data['pendaftaran'] = $pendaftaranModel->findAll();
        $data['title'] = 'Tambah Santri';
        return view('admin/santri/tambah', $data);
    }

    public function santri_simpan()
    {
        $santriModel = new SantriModel();
        
        $id_pendaftaran = $this->request->getPost('id_pendaftaran');
        $mode = $this->request->getPost('pilih_mode');

        if ($mode === 'pendaftaran' && !empty($id_pendaftaran)) {
            // Mode: Import dari pendaftaran menggunakan method dari model
            $result = $santriModel->importFromPendaftaran($id_pendaftaran);
            
            if (!$result) {
                return redirect()->back()->with('error', 'Gagal mengimpor data dari pendaftaran');
            }
            
            // Update NIS dan status jika diinput manual
            $nis = $this->request->getPost('nis');
            $status = $this->request->getPost('status');
            
            if (!empty($nis) || !empty($status)) {
                $updateData = [];
                if (!empty($nis)) {
                    // Validasi NIS unik
                    if ($santriModel->isNISExist($nis, $result['id'])) {
                        $santriModel->delete($result['id']); // Hapus data yang baru dibuat
                        return redirect()->back()->withInput()->with('error', 'NIS sudah digunakan oleh santri lain');
                    }
                    $updateData['nis'] = $nis;
                }
                if (!empty($status)) {
                    $updateData['status'] = $status;
                }
                
                $santriModel->update($result['id'], $updateData);
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
                // Validasi NIS unik
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

    //Kegiatan
    public function kegiatan()
    {
        $kegiatanModel = new \App\Models\KegiatanModel();
        $fotoModel = new \App\Models\KegiatanFotoModel();

        $kegiatan = $kegiatanModel->findAll();

        foreach ($kegiatan as &$row) {
            $foto = $fotoModel->where('id_kegiatan', $row['id'])->first();
            $row['foto_utama'] = $foto ? $foto['file_name'] : null;
        }

        $data['kegiatan'] = $kegiatan;

        return view('admin/kegiatan/index', $data);
    }

    public function kegiatan_tambah()
    {
        $data['title'] = 'Tambah Kegiatan';
        return view('admin/kegiatan/tambah', $data);
    }

    public function kegiatan_simpan()
    {
        $kegiatanModel = new \App\Models\KegiatanModel();
        $fotoModel = new \App\Models\KegiatanFotoModel();

        $kegiatanData = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'lokasi' => $this->request->getPost('lokasi'),
        ];
        $kegiatanModel->insert($kegiatanData);
        $id_kegiatan = $kegiatanModel->getInsertID();

        $files = $this->request->getFiles();
        if (isset($files['foto'])) {
            foreach ($files['foto'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/kegiatan', $newName);

                    $fotoModel->insert([
                        'id_kegiatan' => $id_kegiatan,
                        'file_name' => $newName
                    ]);
                }
            }
        }

        return redirect()->to(base_url('admin/kegiatan'))
                        ->with('success', 'Data kegiatan dan foto berhasil disimpan');
    }

    public function kegiatan_edit($id)
    {
        $kegiatanModel = new \App\Models\KegiatanModel();
        $fotoModel = new \App\Models\KegiatanFotoModel();

        $data['kegiatan'] = $kegiatanModel->find($id);
        $data['foto'] = $fotoModel->where('id_kegiatan', $id)->findAll();
        $data['title'] = 'Edit Kegiatan';
        return view('admin/kegiatan/edit', $data);
    }

    public function kegiatan_update($id)
    {
        $kegiatanModel = new \App\Models\KegiatanModel();
        $fotoModel = new \App\Models\KegiatanFotoModel();

        $kegiatan = $kegiatanModel->find($id);
        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan.');
        }

        $judul = $this->request->getPost('judul');
        $deskripsi = $this->request->getPost('deskripsi');
        $ekstrakurikuler = $this->request->getPost('ekstrakurikuler');
        $hapusFoto = $this->request->getPost('hapus_foto'); 

        if (!empty($hapusFoto)) {
            foreach ($hapusFoto as $id_foto) {
                $foto = $fotoModel->find($id_foto);
                if ($foto) {
                    $path = FCPATH . 'uploads/kegiatan/' . $foto['file_name'];
                    if (is_file($path)) {
                        unlink($path);
                    }
                    $fotoModel->delete($id_foto);
                }
            }
        }

        $files = $this->request->getFiles();

        if (!empty($files['foto'])) {
            foreach ($files['foto'] as $foto) {
                if ($foto->isValid() && !$foto->hasMoved()) {
                    $namaFile = $foto->getRandomName();
                    $foto->move(FCPATH . 'uploads/kegiatan', $namaFile);

                    $fotoModel->insert([
                        'id_kegiatan' => $id,
                        'file_name' => $namaFile,
                    ]);
                }
            }
        }

        $kegiatanModel->update($id, [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'ekstrakurikuler' => $ekstrakurikuler,
        ]);

        return redirect()->to('/admin/kegiatan')->with('success', 'Kegiatan berhasil diperbarui!');
    }


    public function store()
    {
        $kegiatanModel = new \App\Models\KegiatanModel();

        $judul       = $this->request->getPost('judul');
        $deskripsi   = $this->request->getPost('deskripsi');
        $ekstrakurikuler = $this->request->getPost('ekstrakurikuler');

        $foto = $this->request->getFile('foto');
        $namaFile = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFile = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/kegiatan', $namaFile);
        }

        $kegiatanModel->insert([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'ekstrakurikuler' => $ekstrakurikuler,
            'foto' => $namaFile,
        ]);

        return redirect()->to('/admin/kegiatan')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    public function kegiatan_detail($id)
    {
        $kegiatanModel = new \App\Models\KegiatanModel();
        $fotoModel = new \App\Models\KegiatanFotoModel();

        $data['kegiatan'] = $kegiatanModel->find($id);

        if (!$data['kegiatan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kegiatan dengan ID $id tidak ditemukan");
        }

        // Ambil semua foto yang terkait kegiatan ini
        $data['kegiatan']['foto_list'] = $fotoModel->where('id_kegiatan', $id)->findAll();

        $data['title'] = 'Detail Kegiatan';

        return view('admin/kegiatan/detail', $data);
    }


    public function kegiatan_hapusFoto($id_kegiatan, $id_foto)
    {
        $fotoModel = new \App\Models\KegiatanFotoModel();
        $foto = $fotoModel->find($id_foto);

        if ($foto) {
            $path = FCPATH . 'uploads/kegiatan/' . $foto['file_name'];
            if (is_file($path)) {
                unlink($path);
            }
            $fotoModel->delete($id_foto);
        }

        return redirect()->to(base_url("admin/kegiatan/detail/$id_kegiatan"))
                        ->with('success', 'Foto berhasil dihapus.');
    }

    public function kegiatan_hapus($id)
    {
        $kegiatanModel = new \App\Models\KegiatanModel();
        $fotoModel = new \App\Models\KegiatanFotoModel();

        $fotos = $fotoModel->where('id_kegiatan', $id)->findAll();
        foreach ($fotos as $f) {
            $path = FCPATH . 'uploads/kegiatan/' . $f['file_name'];
            if (is_file($path)) {
                unlink($path);
            }
        }
        $fotoModel->where('id_kegiatan', $id)->delete();

        $kegiatanModel->delete($id);

        return redirect()->to(base_url('admin/kegiatan'))
                        ->with('success', 'Kegiatan dan semua foto berhasil dihapus.');
    }

    // Gelombang Pendaftaran
    public function gelombang()
    {
        $gelombang = $this->gelombangModel->findAll();
    
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

        // Hitung statistik
        $jumlah_pendaftar = $pendaftaranModel->where('id_pendaftaran', $id)->countAllResults();
        $jumlah_diterima = $pendaftaranModel->where('id_pendaftaran', $id)->where('status', 'Diterima')->countAllResults();
        $jumlah_menunggu = $pendaftaranModel->where('id_pendaftaran', $id)->where('status', 'Menunggu Verifikasi')->countAllResults();

        $data = [
            'title' => 'Detail Gelombang - ' . $gelombang['nama'],
            'gelombang' => $gelombang,
            'jumlah_pendaftar' => $jumlah_pendaftar,
            'jumlah_diterima' => $jumlah_diterima,
            'jumlah_menunggu' => $jumlah_menunggu
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
}
