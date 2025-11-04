<?php

namespace App\Controllers;
use App\Models\GelombangModel;
use App\Models\EkstrakurikulerModel;
use App\Models\BeritaModel;

class Home extends BaseController
{
    protected $gelombangModel;
    protected $pendaftaranModel;
    protected $beritaModel;

    public function __construct()
    {
        $this->gelombangModel = new \App\Models\GelombangModel();
        $this->pendaftaranModel = new \App\Models\PendaftaranModel();
        $this->beritaModel = new \App\Models\BeritaModel(); 
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda - Baitul Quran Al-Kautsar',
            'berita' => $this->beritaModel->getRecent(3)
        ];
        return view('lp/home/index', $data);
    }


    public function tentang()
    {
        $data = [
            'title' => 'Tentang Kami - Baitul Quran Al-Kautsar'
        ];
        return view('lp/tentang/index', $data);
    }

    public function program()
    {
        $ekstrakurikulerModel = new \App\Models\EkstrakurikulerModel();
        $jadwalModel = new \App\Models\JadwalKegiatanModel();
    
        // Ambil dan kelompokkan jadwal berdasarkan klasifikasi
        $data = [
            'title' => 'Program - Baitul Quran Al-Kautsar',
            'ekstrakurikuler' => $ekstrakurikulerModel->getWithIconMapping(),
            'jadwal' => [
                'pagi'  => $jadwalModel->where('klasifikasi', 'pagi')->orderBy('waktu_mulai', 'ASC')->findAll(),
                'siang' => $jadwalModel->where('klasifikasi', 'siang')->orderBy('waktu_mulai', 'ASC')->findAll(),
                'sore'  => $jadwalModel->where('klasifikasi', 'sore')->orderBy('waktu_mulai', 'ASC')->findAll(),
                'malam' => $jadwalModel->where('klasifikasi', 'malam')->orderBy('waktu_mulai', 'ASC')->findAll(),
            ]
        ];
    
        return view('lp/program/index', $data);
    }
    

    public function kontak()
    {
        $data = [
            'title' => 'Kontak - Baitul Quran Al-Kautsar'
        ];
        return view('lp/kontak/index', $data);
    }

    public function pendaftaran()
    {
        $gelombang = $this->gelombangModel->findAll();
        
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
    
        // Ambil semua data galeri aktif
        $galeri = $galeriModel->getAktif();
    
        // Siapkan data galeri dengan path gambar yang benar
        $galeriItems = [];
        foreach ($galeri as $g) {
            $path = WRITEPATH . 'galeri/' . $g['gambar'];
            $galeriItems[] = [
                'kategori'   => strtolower(trim($g['kategori'] ?? 'lainnya')), // ✅ ambil dari database
                'judul'      => $g['judul'],
                'deskripsi'  => $g['deskripsi'] ?? null,
                'tanggal'    => $g['tanggal'] ?? null,
                'gambar'     => (!empty($g['gambar']) && file_exists($path)) ? $g['gambar'] : null,
            ];
        }
    
        $data = [
            'title'  => 'Galeri - Baitul Quran Al-Kautsar',
            'galeri' => $galeriItems,
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
            // Ambil gelombang yang sedang dibuka
            $gelombang_dibuka = $this->gelombangModel->where('status', 'dibuka')->first();

            if (!$gelombang_dibuka) {
                return redirect()->to('/pendaftaran')->with('error', 'Tidak ada gelombang pendaftaran yang dibuka saat ini.');
            }

            $rules = [
                'jenjang' => 'required|in_list[SMP,SMA]',
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

            $uploadPath = FCPATH . 'writable/pendaftaran/';
            if (!is_dir($uploadPath)) mkdir($uploadPath, 0777, true);

            $files = ['ktp_ortu', 'akta_kk', 'surat_ket_lulus', 'ijazah_terakhir', 'foto'];
            $fileData = [];

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
                'id_gelombang' => $gelombang_dibuka['id'],
                'jenjang' => $this->request->getPost('jenjang'),
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
                'status' => 'Menunggu Verifikasi'
            ];

            if ($this->pendaftaranModel->save($data)) {
                return redirect()->to('/pendaftaran/success')
                    ->with('success', 'Pendaftaran berhasil dikirim untuk gelombang: ' . $gelombang_dibuka['nama']);
            } else {
                return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengirim pendaftaran.');
            }
        }

        
    
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
                'name' => [
                    'rules' => 'required|min_length[3]',
                    'errors' => [
                        'required' => 'Nama lengkap wajib diisi.',
                        'min_length' => 'Nama lengkap minimal 3 karakter.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Alamat email wajib diisi.',
                        'valid_email' => 'Format email tidak valid.'
                    ]
                ],
                'phone' => [
                    'rules' => 'permit_empty|min_length[8]',
                    'errors' => [
                        'min_length' => 'Nomor telepon minimal 8 digit.'
                    ]
                ],
                'subject' => [
                    'rules' => 'required|in_list[pendaftaran,program,beasiswa,lainnya]',
                    'errors' => [
                        'required' => 'Subjek pesan wajib dipilih.',
                        'in_list' => 'Subjek pesan tidak valid.'
                    ]
                ],
                'message' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Pesan wajib diisi.',
                        'min_length' => 'Pesan minimal 5 karakter.'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                // Ambil pesan error spesifik dari validator
                $errors = $this->validator->getErrors();

                // Gabungkan semua error jadi satu string dipisah <br>
                $errorMessages = implode('<br>', $errors);

                session()->setFlashdata('error', $errorMessages);
                return redirect()->to(base_url('kontak'))->withInput();
            }

            // Validasi reCAPTCHA
            $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
            $secretKey = '6LcpQPUrAAAAAEGohdb1OuVaHfOgx1AzAWujSmIF'; 

            $verifyResponse = file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}"
            );
            $responseData = json_decode($verifyResponse);

            if (!$responseData || !$responseData->success) {
                session()->setFlashdata('error', 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.');
                return redirect()->to(base_url('kontak'))->withInput();
            }

            // Simpan pesan ke database
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

        public function berita()
    {
        $model = new BeritaModel();
        $data['berita'] = $model->orderBy('created_at', 'DESC')->findAll();
        $data['title'] = 'Berita Terbaru';
        return view('lp/berita/index', $data);
    }

    public function berita_detail($slug)
    {
        $model = new BeritaModel();
        $berita = $model->where('slug', $slug)->first();

        if (!$berita) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Berita tidak ditemukan.");
        }

        $related_news = $model
            ->where('slug !=', $slug)
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->find();

        $data = [
            'berita' => $berita,
            'related_news' => $related_news,
            'title' => $berita['judul']
        ];

        return view('lp/berita/detail', $data);
    }

    public function pengumuman()
    {
        $keyword = $this->request->getPost('keyword');
        $pendaftar = null;

        if ($keyword) {
            $pendaftar = $this->pendaftaranModel
                ->select('pendaftaran.*, gelombang_pendaftaran.nama AS nama_gelombang')
                ->join('gelombang_pendaftaran', 'gelombang_pendaftaran.id = pendaftaran.id_gelombang', 'left')
                ->groupStart()
                    ->like('pendaftaran.nama_lengkap', $keyword)
                    ->orLike('pendaftaran.nisn', $keyword)
                ->groupEnd()
                ->first();
        }

        return view('lp/pendaftaran/pengumuman', [
            'title' => 'Pengumuman Hasil Pendaftaran',
            'pendaftar' => $pendaftar,
            'keyword' => $keyword
        ]);
    }


    public function cariPengumuman()
    {
        $keyword = $this->request->getPost('keyword');

        $pendaftar = $this->pendaftaranModel
            ->select('pendaftaran.*, gelombang_pendaftaran.nama AS nama_gelombang')
            ->join('gelombang_pendaftaran', 'gelombang_pendaftaran.id = pendaftaran.id_gelombang', 'left')
            ->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('nisn', $keyword)
            ->groupEnd()
            ->first();

        return view('lp\pendaftaran\pengumuman', [
            'title' => 'Cek Pengumuman Pendaftaran',
            'pendaftar' => $pendaftar,
            'keyword' => $keyword
        ]);
    }


    public function exportPendaftarPdf()
    {
        $pendaftar = $this->pendaftaranModel
            ->select('pendaftaran.*, gelombang_pendaftaran.nama AS nama_gelombang')
            ->join('gelombang_pendaftaran', 'gelombang_pendaftaran.id = pendaftaran.id_gelombang', 'left')
            ->where('pendaftaran.status', 'Diterima')
            ->orderBy('gelombang_pendaftaran.nama', 'ASC')
            ->findAll();

        $data = ['pendaftar' => $pendaftar];
        $html = view('lp/pendaftaran/pengumuman_pdf', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('daftar_santri_diterima.pdf', ["Attachment" => true]);
    }
}
