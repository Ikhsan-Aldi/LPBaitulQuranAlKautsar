<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesantren Baitul Qur'an Al-Kautsar - Penerimaan Santri Baru 2026/2027</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #2c5aa0, #1e3a8a);
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            position: relative;
        }

        .logo-text h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .logo-text p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .nav {
            display: flex;
            gap: 2rem;
        }

        .nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav a:hover {
            color: #10b981;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #0f766e, #0d9488, #10b981);
            color: white;
            padding: 120px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><path d="M0,50 Q250,0 500,50 T1000,50 L1000,100 L0,100 Z"/></svg>') repeat-x;
            background-size: 1000px 100px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .hero h2 {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .cta-button {
            display: inline-block;
            background: #f59e0b;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .cta-button:hover {
            background: #d97706;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
        }

        /* Main Content */
        .main-content {
            padding: 60px 0;
        }

        .section {
            margin-bottom: 60px;
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 2rem;
            color: #1e3a8a;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 2px;
        }

        /* Registration Time */
        .registration-waves {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .wave-card {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
        }

        .wave-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .wave-period {
            font-size: 1.1rem;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .selection-info {
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .selection-info h4 {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .selection-info p {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Requirements */
        .requirements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #10b981;
        }

        .requirement-item i {
            color: #10b981;
            font-size: 1.2rem;
        }

        /* Advantages */
        .advantages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .advantage-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border-radius: 15px;
            border: 1px solid #0ea5e9;
        }

        .advantage-item i {
            color: #0ea5e9;
            font-size: 1.5rem;
            margin-top: 5px;
        }

        /* Scholarship */
        .scholarship-info {
            background: linear-gradient(135deg, #fef3c7, #fde68a);
            padding: 30px;
            border-radius: 15px;
            border: 2px solid #f59e0b;
            margin-bottom: 30px;
        }

        .scholarship-quota {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: bold;
        }

        /* Structure */
        .structure-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
        }

        .staff-card {
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 15px;
            border: 2px solid #e5e7eb;
        }

        .staff-photo {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .staff-name {
            font-weight: bold;
            margin-bottom: 5px;
            color: #1e3a8a;
        }

        .staff-position {
            font-size: 0.9rem;
            color: #6b7280;
        }

        /* Daily Activities */
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .schedule-table th {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 15px;
            text-align: left;
        }

        .schedule-table td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .schedule-table tr:hover {
            background: #f8f9fa;
        }

        /* Extracurricular */
        .extracurricular-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .extracurricular-item {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            border: 2px solid #0ea5e9;
            transition: transform 0.3s;
        }

        .extracurricular-item:hover {
            transform: translateY(-5px);
        }

        .extracurricular-item i {
            font-size: 2rem;
            color: #0ea5e9;
            margin-bottom: 10px;
        }

        /* Cost */
        .cost-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .cost-table th {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 15px;
            text-align: left;
        }

        .cost-table td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .cost-table tr:hover {
            background: #f0fdf4;
        }

        .cost-amount {
            font-weight: bold;
            color: #059669;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1e3a8a, #1e40af);
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .contact-item i {
            font-size: 1.5rem;
            color: #10b981;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 20px;
            }

            .nav {
                gap: 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero h2 {
                font-size: 1.2rem;
            }

            .section {
                padding: 20px;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon">
                        <svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                            <!-- Arches/Mosque elements -->
                            <path d="M15 20 L20 10 L25 20 Z" fill="#10b981"/>
                            <path d="M25 20 L30 10 L35 20 Z" fill="#10b981"/>
                            <path d="M35 20 L40 10 L45 20 Z" fill="#10b981"/>
                            
                            <!-- Book -->
                            <ellipse cx="30" cy="35" rx="12" ry="8" fill="#0d9488"/>
                            <ellipse cx="30" cy="35" rx="8" ry="6" fill="#10b981"/>
                            
                            <!-- Flame/Sprout -->
                            <path d="M30 25 L28 35 L32 35 Z" fill="#f59e0b"/>
                        </svg>
                    </div>
                    <div class="logo-text">
                        <h1>Baitul Qur'an</h1>
                        <p>Al-Kautsar</p>
                    </div>
                </div>
                <nav class="nav">
                    <a href="#pendaftaran">Pendaftaran</a>
                    <a href="#tentang">Tentang Kami</a>
                    <a href="#program">Program</a>
                    <a href="#kontak">Kontak</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>PENERIMAAN SANTRI BARU</h1>
                <h2>TAHUN AJARAN 2026/2027</h2>
                <p>Pesantren Baitul Qur'an "Al-Kautsar" - Kota Madiun, Jawa Timur</p>
                <p>SMP - SMA</p>
                <a href="#pendaftaran" class="cta-button">Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Registration Time -->
            <section id="pendaftaran" class="section">
                <h2 class="section-title">Waktu Pendaftaran</h2>
                <div class="registration-waves">
                    <div class="wave-card">
                        <h3 class="wave-title">GELOMBANG 1</h3>
                        <p class="wave-period">1 OKTOBER - 31 DESEMBER 2025</p>
                        <div class="selection-info">
                            <h4>Seleksi Pendaftaran:</h4>
                            <p><strong>Akademik:</strong> 7 Januari 2026 (Online)</p>
                            <p><strong>Tilawah & Wawancara:</strong> 11 Januari 2026 (Offline)</p>
                        </div>
                        <p><em>Gelombang 2 akan dibuka jika gelombang 1 belum terpenuhi</em></p>
                    </div>
                    <div class="wave-card">
                        <h3 class="wave-title">GELOMBANG 2</h3>
                        <p class="wave-period">1 JANUARI - 30 MEI 2026</p>
                        <div class="selection-info">
                            <h4>Seleksi Pendaftaran:</h4>
                            <p><strong>Akademik:</strong> Informasi lanjutan (Online)</p>
                            <p><strong>Tilawah & Wawancara:</strong> Informasi lanjutan (Offline)</p>
                        </div>
                        <p><em>Gelombang 2 akan ditutup sewaktu-waktu jika kuota sudah terpenuhi</em></p>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 30px;">
                    <h3 style="color: #1e3a8a; font-size: 1.5rem;">KUOTA TERSEDIA: 25 SANTRI</h3>
                </div>
            </section>

            <!-- Requirements -->
            <section class="section">
                <h2 class="section-title">Syarat Pendaftaran</h2>
                <div class="requirements-grid">
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Mengisi formulir pendaftaran</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Mengisi data dengan lengkap</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Fotocopy KTP orangtua</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Fotocopy Akta Lahir & KK</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>NISN (National Student Identification Number)</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Surat Keterangan Lulus</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Fotocopy Ijazah Terakhir</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Pas Foto (3x4) dengan background merah</span>
                    </div>
                </div>
                <p style="text-align: center; margin-top: 20px; color: #6b7280;">
                    <em>*Masing-masing berkas sebanyak 4 lembar</em>
                </p>
            </section>

            <!-- Advantages -->
            <section class="section">
                <h2 class="section-title">Kenapa Harus Mondok di BQ-Alkautsar?</h2>
                <div class="advantages-grid">
                    <div class="advantage-item">
                        <i class="fas fa-quran"></i>
                        <div>
                            <h4>Target Hafalan Qur'an 30 Juz Mutqin</h4>
                            <p>Program tahfidz yang terstruktur untuk mencapai hafalan Al-Qur'an 30 juz dengan mutqin (mantap)</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-certificate"></i>
                        <div>
                            <h4>Sanad Qira'ah Bersambung</h4>
                            <p>Berpeluang meraih Sanad Qira'ah yang bersambung kepada Rasulullah SAW</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>
                            <h4>Ustadz/Guru Berkompeten</h4>
                            <p>Dibimbing para Ustadz/Guru yang berkompeten di bidangnya</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-graduation-cap"></i>
                        <div>
                            <h4>Kurikulum Terpadu</h4>
                            <p>Menerapkan kurikulum Pesantren (Dirosah Islamiyah) & Diknas</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-star"></i>
                        <div>
                            <h4>Pengembangan Bakat Optimal</h4>
                            <p>Memfasilitasi setiap bakat dan keunggulan santri secara optimal</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <i class="fas fa-award"></i>
                        <div>
                            <h4>Sertifikat Lengkap</h4>
                            <p>Mendapatkan Ijazah Nasional, Pesantren, Syahadah Tahfidz & Sanad</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Scholarship -->
            <section class="section">
                <h2 class="section-title">Tentang Beasiswa</h2>
                <div class="scholarship-info">
                    <p style="font-size: 1.1rem; margin-bottom: 20px;">
                        <strong>Beasiswa Santri Pesantren Baitul Qur'an Alkautsar 2026</strong> adalah program bantuan pendidikan bagi santri baru dengan ketentuan berikut:
                    </p>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #059669; margin-right: 10px;"></i>Santri berprestasi di pendidikan sebelumnya</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #059669; margin-right: 10px;"></i>Santri kurang mampu secara ekonomi</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #059669; margin-right: 10px;"></i>Santri wajib mengikuti pendidikan sampai tuntas di Pesantren</li>
                        <li style="margin-bottom: 10px;"><i class="fas fa-check" style="color: #059669; margin-right: 10px;"></i>Beasiswa hanya mencakup biaya Pendidikan, asrama dan makan</li>
                    </ul>
                </div>
                <div class="scholarship-quota">
                    KUOTA BEASISWA UNTUK 11 SANTRI
                </div>
            </section>

            <!-- About Us -->
            <section id="tentang" class="section">
                <h2 class="section-title">Tentang Kami</h2>
                <div style="text-align: center; margin-bottom: 30px;">
                    <p style="font-size: 1.1rem; line-height: 1.8; color: #4b5563;">
                        Pesantren Baitul Qur'an Alkautsar merupakan lembaga pendidikan dibawah naungan yayasan Alkautsar Madiun, 
                        yang memadukan pendidikan formal dalam bentuk SMP dan SMA dengan non formal dalam bentuk Dirosah Islamiyah. 
                        Pembinaan 24 jam yang dikemas dalam sistem Islamic Boarding School (Pesantren Modern).
                    </p>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px;">
                    <div style="text-align: center;">
                        <h3 style="color: #1e3a8a; margin-bottom: 20px;">Visi</h3>
                        <p style="font-size: 1.1rem; font-style: italic; color: #4b5563;">
                            "Membentuk Generasi Cerdas yang Mandiri dan berkarakter dengan Al-Qur'an"
                        </p>
                    </div>
                    <div>
                        <h3 style="color: #1e3a8a; margin-bottom: 20px; text-align: center;">Misi</h3>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #10b981; margin-right: 10px;"></i>Menjadikan Al-Qur'an dan Sunnah sebagai landasan hidup</li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #10b981; margin-right: 10px;"></i>Membentuk santri beraqidah ahlussunnah wal jama'ah</li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #10b981; margin-right: 10px;"></i>Membentuk santri berakhlak Mulia dalam kehidupan sehari-hari</li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #10b981; margin-right: 10px;"></i>Membentuk lifeskill kemandirian dan kemasyarakatan santri</li>
                            <li style="margin-bottom: 10px;"><i class="fas fa-check-circle" style="color: #10b981; margin-right: 10px;"></i>Membekali santri ilmu entrepreneur</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Structure -->
            <section class="section">
                <h2 class="section-title">Struktur Pesantren</h2>
                <div class="structure-grid">
                    <div class="staff-card">
                        <div class="staff-photo">👨‍💼</div>
                        <div class="staff-name">H. AGUS SUPRIYANTO, SE</div>
                        <div class="staff-position">Pembina II Baitul Qur'an Alkautsar</div>
                    </div>
                    <div class="staff-card">
                        <div class="staff-photo">👨‍🏫</div>
                        <div class="staff-name">LUKMAN HAKIM, S.Pd.I</div>
                        <div class="staff-position">Direktur Baitul Qur'an Alkautsar</div>
                    </div>
                    <div class="staff-card">
                        <div class="staff-photo">📖</div>
                        <div class="staff-name">RIDWAN AMRULLAH Al-Hafidz</div>
                        <div class="staff-position">Manager Tahfidz BQ Alkautsar</div>
                    </div>
                    <div class="staff-card">
                        <div class="staff-photo">🏫</div>
                        <div class="staff-name">MATRASIF, S.Pd., S.QI., C.MQ</div>
                        <div class="staff-position">Manager Kesantrian BQ Alkautsar</div>
                    </div>
                    <div class="staff-card">
                        <div class="staff-photo">📚</div>
                        <div class="staff-name">FAIZ SAWA EL GANI, S.M, M.M</div>
                        <div class="staff-position">Manager Pendidikan BQ Alkautsar</div>
                    </div>
                </div>
            </section>

            <!-- Daily Activities -->
            <section class="section">
                <h2 class="section-title">Kegiatan Harian</h2>
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>03.00-03.30</td><td>Bangun tidur & persiapan tahajjud</td></tr>
                        <tr><td>03.30-04.30</td><td>Tahajjud, Sholat Shubuh berjama'ah</td></tr>
                        <tr><td>04.30-06.00</td><td>Halaqah Tahfidz I</td></tr>
                        <tr><td>06.00-07.30</td><td>Kebersihan, Sarapan, Persiapan KBM</td></tr>
                        <tr><td>07.30-08.00</td><td>Apel pagi, Kuliah Tasyji'</td></tr>
                        <tr><td>08.00-11.30</td><td>Kegiatan Belajar Mengajar</td></tr>
                        <tr><td>11.30-13.00</td><td>Sholat Dhuhur, Muroja'ah Tahfidz</td></tr>
                        <tr><td>13.00-14.45</td><td>Makan siang, Istirahat Siang</td></tr>
                        <tr><td>14.45-15.30</td><td>Persiapan Sholat Ashar</td></tr>
                        <tr><td>15.30-17.00</td><td>Halaqoh Tahfidz II/Ekstra Kurikuler</td></tr>
                        <tr><td>17.00-17.30</td><td>Kebersihan, Persiapan Sholat Maghrib</td></tr>
                        <tr><td>17.30-18.45</td><td>Sholat Maghrib, Kajian Kitab</td></tr>
                        <tr><td>18.45-20.00</td><td>Sholat Isya', Makan malam</td></tr>
                        <tr><td>20.00-21.30</td><td>Belajar malam/Halaqah Tahfidz</td></tr>
                        <tr><td>21.30-03.00</td><td>Istirahat malam (tidur malam)</td></tr>
                    </tbody>
                </table>
            </section>

            <!-- Extracurricular -->
            <section id="program" class="section">
                <h2 class="section-title">Ekstrakurikuler</h2>
                <div class="extracurricular-grid">
                    <div class="extracurricular-item">
                        <i class="fas fa-swimming-pool"></i>
                        <h4>Berenang</h4>
                    </div>
                    <div class="extracurricular-item">
                        <i class="fas fa-bullseye"></i>
                        <h4>Memanah</h4>
                    </div>
                    <div class="extracurricular-item">
                        <i class="fas fa-horse"></i>
                        <h4>Berkuda</h4>
                    </div>
                    <div class="extracurricular-item">
                        <i class="fas fa-trophy"></i>
                        <h4>Olimpiade</h4>
                    </div>
                    <div class="extracurricular-item">
                        <i class="fas fa-briefcase"></i>
                        <h4>Entrepreneur Muslim</h4>
                    </div>
                    <div class="extracurricular-item">
                        <i class="fas fa-fist-raised"></i>
                        <h4>Beladiri</h4>
                    </div>
                    <div class="extracurricular-item">
                        <i class="fas fa-microphone"></i>
                        <h4>Pidato 3 Bahasa</h4>
                    </div>
                    <div class="extracurricular-item">
                        <i class="fas fa-newspaper"></i>
                        <h4>Jurnalistik</h4>
                    </div>
                    <div class="extracurricular-item">
                        <i class="fas fa-mountain"></i>
                        <h4>SAPALA</h4>
                    </div>
                </div>
            </section>

            <!-- Cost -->
            <section class="section">
                <h2 class="section-title">Biaya-Biaya</h2>
                <table class="cost-table">
                    <thead>
                        <tr>
                            <th>Uraian Biaya</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pendaftaran</td>
                            <td class="cost-amount">Rp. -</td>
                            <td>Gratis</td>
                        </tr>
                        <tr>
                            <td>Uang SPP</td>
                            <td class="cost-amount">Rp. 700.000</td>
                            <td>Setiap bulan</td>
                        </tr>
                        <tr>
                            <td>Buku Pelajaran</td>
                            <td class="cost-amount">Rp. -</td>
                            <td>Mandiri</td>
                        </tr>
                        <tr>
                            <td>Seragam</td>
                            <td class="cost-amount">Rp. -</td>
                            <td>Mandiri</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer id="kontak" class="footer">
        <div class="container">
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h4>Alamat Lengkap</h4>
                        <p>Jln. Ring Road Barat - Kel. Manguharjo<br>
                        Kec. Manguharjo Kota Madiun<br>
                        Jawa Timur</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h4>Telepon</h4>
                        <p>081234002350</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h4>Email</h4>
                        <p>info@baitulquranalkautsar.ac.id</p>
                    </div>
                </div>
            </div>
            <div style="border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px; margin-top: 30px;">
                <p>&copy; 2025 Pesantren Baitul Qur'an Al-Kautsar. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'linear-gradient(135deg, rgba(44, 90, 160, 0.95), rgba(30, 58, 138, 0.95))';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'linear-gradient(135deg, #2c5aa0, #1e3a8a)';
                header.style.backdropFilter = 'none';
            }
        });
    </script>
</body>
</html>