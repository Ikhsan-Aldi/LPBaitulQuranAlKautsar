<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\EkstrakurikulerModel;
use App\Models\PengajarModel;
use App\Models\SantriModel;
use App\Models\KegiatanModel;


class Admin extends BaseController
{
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
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
        $data['title'] = 'Data Ekstrakurikuler';
        $data['ekstrakurikuler'] = $model->findAll();
        return view('admin/ekstrakurikuler/index', $data);
    }

    public function tambah_ekstrakurikuler()
    {
        return view('admin/ekstrakurikuler/tambah', ['title' => 'Tambah Ekstrakurikuler']);
    }

    public function simpan_ekstrakurikuler()
    {
        $model = new EkstrakurikulerModel();
        $model->save([
            'nama_ekstrakurikuler' => $this->request->getPost('nama_ekstrakurikuler'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'pembimbing' => $this->request->getPost('pembimbing'),
            'jadwal' => $this->request->getPost('jadwal'),
        ]);
        return redirect()->to('/admin/ekstrakurikuler')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_ekstrakurikuler($id)
    {
        $model = new EkstrakurikulerModel();
        $data['ekstra'] = $model->find($id);
        $data['title'] = 'Edit Ekstrakurikuler';
        return view('admin/ekstrakurikuler/edit', $data);
    }

    public function update_ekstrakurikuler($id)
    {
        $model = new EkstrakurikulerModel();
        $model->update($id, [
            'nama_ekstrakurikuler' => $this->request->getPost('nama_ekstrakurikuler'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'pembimbing' => $this->request->getPost('pembimbing'),
            'jadwal' => $this->request->getPost('jadwal'),
        ]);
        return redirect()->to('/admin/ekstrakurikuler')->with('success', 'Data berhasil diupdate');
    }

    public function hapus_ekstrakurikuler($id)
    {
        $model = new EkstrakurikulerModel();
        $model->delete($id);
        return redirect()->to('/admin/ekstrakurikuler')->with('success', 'Data berhasil dihapus');
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
        $santriModel->save([
            'id_pendaftaran' => $this->request->getPost('id_pendaftaran'),
            'nis' => $this->request->getPost('nis'),
            'nama' => $this->request->getPost('nama'),
            'jenjang' => $this->request->getPost('jenjang'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'status' => $this->request->getPost('status')
        ]);
        return redirect()->to(base_url('admin/santri'))->with('success', 'Santri berhasil ditambahkan');
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

}
