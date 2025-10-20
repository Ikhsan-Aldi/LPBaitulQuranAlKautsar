<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;

class Pendaftaran extends BaseController
{
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
    }

    public function index()
    {
        $data['title'] = 'Form Pendaftaran Santri Baru';
        return view('pendaftaran/form', $data);
    }

    public function simpan()
    {
        helper(['form', 'url']);

        // Ambil file upload
        $ktpOrtu       = $this->request->getFile('ktp_ortu');
        $aktaKk        = $this->request->getFile('akta_kk');
        $suratKetLulus = $this->request->getFile('surat_ket_lulus');
        $ijazah        = $this->request->getFile('ijazah_terakhir');
        $foto          = $this->request->getFile('foto');

        // Pastikan folder upload tersedia
        $uploadPath = 'uploads/berkas/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Simpan file ke folder uploads
        $data = [
            'nama_lengkap'    => $this->request->getPost('nama_lengkap'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'    => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
            'nisn'            => $this->request->getPost('nisn'),
            'alamat'          => $this->request->getPost('alamat'),
            'nama_ayah'       => $this->request->getPost('nama_ayah'),
            'nama_ibu'        => $this->request->getPost('nama_ibu'),
            'no_hp_ortu'      => $this->request->getPost('no_hp_ortu'),
            'ktp_ortu'        => $ktpOrtu->isValid() ? $ktpOrtu->move($uploadPath) ? $ktpOrtu->getName() : null : null,
            'akta_kk'         => $aktaKk->isValid() ? $aktaKk->move($uploadPath) ? $aktaKk->getName() : null : null,
            'surat_ket_lulus' => $suratKetLulus->isValid() ? $suratKetLulus->move($uploadPath) ? $suratKetLulus->getName() : null : null,
            'ijazah_terakhir' => $ijazah->isValid() ? $ijazah->move($uploadPath) ? $ijazah->getName() : null : null,
            'foto'            => $foto->isValid() ? $foto->move($uploadPath) ? $foto->getName() : null : null,
        ];

        $this->pendaftaranModel->insert($data);

        return redirect()->to('/pendaftaran')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
