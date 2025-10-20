<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\EkstrakurikulerModel;
use App\Models\PengajarModel;


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

}
