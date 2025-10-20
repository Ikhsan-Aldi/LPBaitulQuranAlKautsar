<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\EkstrakurikulerModel;

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
}
