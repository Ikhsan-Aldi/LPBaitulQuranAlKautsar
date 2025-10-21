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
        $totalPendaftar = $this->pendaftaranModel->countAllResults();
        $diterima = $this->pendaftaranModel->where('status', 'Diterima')->countAllResults();
        $ditolak = $this->pendaftaranModel->where('status', 'Ditolak')->countAllResults();

        $data = [
            'title' => 'Dashboard Admin',
            'totalPendaftar' => $totalPendaftar,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
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

        // daftar icon otomatis berdasarkan nama
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

        if (empty($id_pendaftaran)) {
            $data = [
                'id_pendaftaran' => null,
                'nis' => $this->request->getPost('nis'),
                'nama' => $this->request->getPost('nama'),
                'jenjang' => $this->request->getPost('jenjang'),
                'asal_sekolah' => $this->request->getPost('asal_sekolah'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'status' => $this->request->getPost('status'),
            ];
        } else {
            $pendaftaranModel = new PendaftaranModel();
            $p = $pendaftaranModel->find($id_pendaftaran);

            $data = [
                'id_pendaftaran' => $id_pendaftaran,
                'nis' => $this->request->getPost('nis'),
                'nama' => $p['nama_lengkap'],
                'jenjang' => $p['jenjang'],
                'asal_sekolah' => $p['asal_sekolah'] ?? '',
                'alamat' => $p['alamat'] ?? '',
                'no_hp' => $p['no_hp'] ?? '',
                'status' => $this->request->getPost('status'),
            ];
        }

        $santriModel->insert($data);
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

    //Kegiatan
    public function kegiatan()
    {
        $model = new KegiatanModel();
        $data['kegiatan'] = $model->findAll();
        $data['title'] = 'Data Kegiatan';
        return view('admin/kegiatan/index', $data);
    }

    public function kegiatan_tambah()
    {
        $data['title'] = 'Tambah Kegiatan';
        return view('admin/kegiatan/tambah', $data);
    }

    public function kegiatan_simpan()
    {
        $model = new KegiatanModel();
        $file = $this->request->getFile('foto');

        $fotoName = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fotoName = $file->getRandomName();
            $file->move('uploads/kegiatan', $fotoName);
        }

        $model->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'lokasi' => $this->request->getPost('lokasi'),
            'foto' => $fotoName
        ]);

        return redirect()->to(base_url('admin/kegiatan'))->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function kegiatan_edit($id)
    {
        $model = new KegiatanModel();
        $data['kegiatan'] = $model->find($id);
        $data['title'] = 'Edit Kegiatan';
        return view('admin/kegiatan/edit', $data);
    }

    public function kegiatan_update($id)
    {
        $model = new KegiatanModel();
        $file = $this->request->getFile('foto');

        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'lokasi' => $this->request->getPost('lokasi'),
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fotoName = $file->getRandomName();
            $file->move('uploads/kegiatan', $fotoName);
            $data['foto'] = $fotoName;
        }

        $model->update($id, $data);
        return redirect()->to(base_url('admin/kegiatan'))->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function kegiatan_hapus($id)
    {
        $model = new KegiatanModel();
        $kegiatan = $model->find($id);

        if ($kegiatan && $kegiatan['foto'] && file_exists('uploads/kegiatan/' . $kegiatan['foto'])) {
            unlink('uploads/kegiatan/' . $kegiatan['foto']);
        }

        $model->delete($id);
        return redirect()->to(base_url('admin/kegiatan'))->with('success', 'Kegiatan berhasil dihapus');
    }

    //===========================
    //CRUD GELOMBANG PENDAFTARAN
    //===========================
    public function gelombang()
    {
        $gelombang = $this->gelombangModel->findAll();
    
        $data = [
            'title' => 'Manajemen Gelombang Pendaftaran',
            'gelombang' => $gelombang
        ];
    
        return view('admin/gelombang/index', $data);
    }

    /**
     * Menampilkan form tambah gelombang
     */
    public function tambahGelombang()
    {
        $data = [
            'title' => 'Tambah Gelombang Pendaftaran',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/gelombang/form', $data);
    }

    /**
     * Menyimpan data gelombang baru
     */
    public function simpanGelombang()
    {
        // Validasi input
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[100]',
            'tanggal_mulai' => 'required|valid_date',
            'tanggal_selesai' => 'required|valid_date',
            'status' => 'required|in_list[dibuka,ditutup,berakhir]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_selesai = $this->request->getPost('tanggal_selesai');
        $status = $this->request->getPost('status');

        // Proses data seleksi (array)
        $seleksi = $this->request->getPost('seleksi');
        $jadwal_seleksi = $this->request->getPost('jadwal_seleksi');
        $metode = $this->request->getPost('metode');

        // Validasi tambahan untuk seleksi
        if (empty($seleksi) || !is_array($seleksi)) {
            return redirect()->back()->withInput()->with('error', 'Minimal satu seleksi harus diisi');
        }

        // Filter data yang kosong
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

        // Simpan ke database
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

    /**
     * Menampilkan form edit gelombang
     */
    public function editGelombang($id)
    {
        $gelombang = $this->gelombangModel->find($id);

        if (!$gelombang) {
            return redirect()->to('/admin/gelombang')->with('error', 'Data gelombang tidak ditemukan');
        }

        // Decode data JSON
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

    /**
     * Menyimpan hasil edit gelombang
     */
    public function updateGelombang($id)
    {
        // Cek apakah data exists
        $gelombang = $this->gelombangModel->find($id);
        if (!$gelombang) {
            return redirect()->to('/admin/gelombang')->with('error', 'Data gelombang tidak ditemukan');
        }

        // Validasi input
        if (!$this->validate([
            'nama' => 'required|min_length[3]|max_length[100]',
            'tanggal_mulai' => 'required|valid_date',
            'tanggal_selesai' => 'required|valid_date',
            'status' => 'required|in_list[dibuka,ditutup,berakhir]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $tanggal_mulai = $this->request->getPost('tanggal_mulai');
        $tanggal_selesai = $this->request->getPost('tanggal_selesai');
        $status = $this->request->getPost('status');

        // Proses data seleksi (array)
        $seleksi = $this->request->getPost('seleksi');
        $jadwal_seleksi = $this->request->getPost('jadwal_seleksi');
        $metode = $this->request->getPost('metode');

        // Validasi tambahan untuk seleksi
        if (empty($seleksi) || !is_array($seleksi)) {
            return redirect()->back()->withInput()->with('error', 'Minimal satu seleksi harus diisi');
        }

        // Filter data yang kosong
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

        // Update data
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

    /**
     * Menghapus data gelombang
     */
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
}
