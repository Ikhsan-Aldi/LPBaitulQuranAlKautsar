<?php

namespace App\Controllers;
use App\Models\GelombangModel;
use App\Models\EkstrakurikulerModel;

class Home extends BaseController
{
    protected $gelombangModel;
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->gelombangModel = new \App\Models\GelombangModel();
        $this->pendaftaranModel = new \App\Models\PendaftaranModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda - Solusi Digital Terdepan'
        ];
        return view('lp/home/index', $data);
    }

    public function tentang()
    {
        $data = [
            'title' => 'Tentang Kami - Solusi Digital Terdepan'
        ];
        return view('lp/tentang/index', $data);
    }

    public function program()
    {
        $ekstrakurikulerModel = new \App\Models\EkstrakurikulerModel();
    
        $data = [
            'title' => 'Program - Baitul Quran Al-Kautsar',
            'ekstrakurikuler' => $ekstrakurikulerModel->getWithIconMapping()
        ];
    
        return view('lp/program/index', $data);
    }
    

    public function kontak()
    {
        $data = [
            'title' => 'Kontak - Solusi Digital Terdepan'
        ];
        return view('lp/kontak/index', $data);
    }

    // Method baru untuk halaman pendaftaran
    public function pendaftaran()
    {
        // Ambil semua gelombang pendaftaran
        $gelombang = $this->gelombangModel->findAll();
        
        // Decode data JSON untuk setiap gelombang
        foreach ($gelombang as &$item) {
            $item['seleksi_array'] = json_decode($item['seleksi'] ?? '[]', true);
            $item['jadwal_seleksi_array'] = json_decode($item['jadwal_seleksi'] ?? '[]', true);
            $item['metode_array'] = json_decode($item['metode'] ?? '[]', true);
        }

        $data = [
            'title' => 'Pendaftaran - Baitul Quran Al-Kautsar',
            'gelombang' => $gelombang
        ];
        return view('lp/pendaftaran/index', $data);
    }
    public function galeri()
    {
        $galeriModel = new \App\Models\GaleriModel();
        $galeri = $galeriModel->getAktif();
        
        $data = [
            'title' => 'Galeri - Baitul Quran Al-Kautsar',
            'galeri' => $galeri
        ];
        return view('lp/galeri/index', $data);
    }


        // Method untuk form pendaftaran
        public function formPendaftaran()
        {
            // Cek apakah ada gelombang yang dibuka
            $gelombang_dibuka = $this->gelombangModel->where('status', 'dibuka')->first();
    
            if (!$gelombang_dibuka) {
                return redirect()->to('/pendaftaran')->with('error', 'Tidak ada gelombang pendaftaran yang dibuka saat ini.');
            }
    
            $data = [
                'title' => 'Form Pendaftaran - Baitul Quran Al-Kautsar',
                'gelombang' => $gelombang_dibuka
            ];
            return view('lp/pendaftaran/form_pendaftaran', $data);
        }
    
        // Method untuk menyimpan pendaftaran
        public function simpanPendaftaran()
        {
            $rules = [
                'nama_lengkap' => 'required|min_length[3]|max_length[100]',
                'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
                'tempat_lahir' => 'required|min_length[3]|max_length[50]',
                'tanggal_lahir' => 'required|valid_date',
                'asal_sekolah' => 'required|min_length[3]|max_length[100]',
                'nisn' => 'required|min_length[10]|max_length[15]',
                'alamat' => 'required|min_length[10]|max_length[255]',
                'nama_ayah' => 'required|min_length[3]|max_length[100]',
                'nama_ibu' => 'required|min_length[3]|max_length[100]',
                'no_hp_ortu' => 'required|min_length[10]|max_length[15]'
            ];
        
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        
            $fileData = [];
            $uploadPath = FCPATH . 'uploads/pendaftaran/'; //
        
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
        
            $files = ['ktp_ortu', 'akta_kk', 'surat_ket_lulus', 'ijazah_terakhir', 'foto'];
            
            foreach ($files as $file) {
                $uploadedFile = $this->request->getFile($file);
                if ($uploadedFile && $uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                    $newName = $uploadedFile->getRandomName();
                    $uploadedFile->move($uploadPath, $newName);
                    $fileData[$file] = $newName;
                } else {
                    $fileData[$file] = null;
                }
            }
        
            $data = [
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'asal_sekolah' => $this->request->getPost('asal_sekolah'),
                'nisn' => $this->request->getPost('nisn'),
                'alamat' => $this->request->getPost('alamat'),
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
                'ktp_ortu' => $fileData['ktp_ortu'],
                'akta_kk' => $fileData['akta_kk'],
                'surat_ket_lulus' => $fileData['surat_ket_lulus'],
                'ijazah_terakhir' => $fileData['ijazah_terakhir'],
                'foto' => $fileData['foto'],
                'status' => 'pending'
            ];
        
            if ($this->pendaftaranModel->save($data)) {
                return redirect()->to('/pendaftaran/success')
                    ->with('success', 'Pendaftaran berhasil dikirim. Kami akan menghubungi Anda untuk proses selanjutnya.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengirim pendaftaran. Silakan coba lagi.');
            }
        }
        
    
        // Method untuk halaman success
        public function successPendaftaran()
        {
            if (!session()->getFlashdata('success')) {
                return redirect()->to('/pendaftaran');
            }
    
            $data = [
                'title' => 'Pendaftaran Berhasil - Baitul Quran Al-Kautsar'
            ];
            return view('lp/pendaftaran/success_pendaftaran', $data);
        }


        public function kirimPesan()
        {
            helper(['form']);
        
            $rules = [
                'name'    => 'required|min_length[3]',
                'email'   => 'required|valid_email',
                'phone'   => 'permit_empty|min_length[8]',
                'subject' => 'required|in_list[pendaftaran,program,beasiswa,lainnya]',
                'message' => 'required|min_length[5]',
            ];
        
            if (!$this->validate($rules)) {
                session()->setFlashdata('error', 'Mohon isi semua data dengan benar.');
                return redirect()->to(base_url('kontak'))->withInput();
            }
        
            // ✅ Verifikasi Google reCAPTCHA
            $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
            $secretKey = '6LeO6vMrAAAAAAHvRXJedp2tWqvukrsSP6OXYikR'; // contoh: 6LfX0A0pAAAAABCD...
        
            // Kirim request ke Google API
            $verifyResponse = file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}"
            );
            $responseData = json_decode($verifyResponse);
        
            if (!$responseData || !$responseData->success) {
                session()->setFlashdata('error', 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.');
                return redirect()->to(base_url('kontak'))->withInput();
            }
        
            // ✅ Simpan pesan ke database
            $model = new \App\Models\PesanModel();
            $model->insert([
                'nama_lengkap' => $this->request->getPost('name'),
                'email'        => $this->request->getPost('email'),
                'telepon'      => $this->request->getPost('phone'),
                'subjek'       => $this->request->getPost('subject'),
                'pesan'        => $this->request->getPost('message'),
            ]);
        
            session()->setFlashdata('success', 'Pesan Anda berhasil dikirim.');
            return redirect()->to(base_url('kontak'));
        }             
}
