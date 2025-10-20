<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;

class Admin extends BaseController
{
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
    }

    // ===============================
    // 🏠 DASHBOARD
    // ===============================
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

    // ===============================
    // 📋 PENDAFTARAN
    // ===============================
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
}
