<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesantren Baitul Qur'an Al-Kautsar - Penerimaan Santri Baru 2026/2027</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #1e40af;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: var(--white);
            box-shadow: var(--shadow);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--secondary-color), #059669);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #0d9488, #0f766e);
            border-radius: 8px;
        }

        .logo-icon::after {
            content: '📖';
            position: absolute;
            font-size: 18px;
            z-index: 1;
        }

        .logo-text h1 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 2px;
        }

        .logo-text p {
            font-size: 0.8rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s;
            position: relative;
        }

        .nav a:hover {
            color: var(--secondary-color);
        }

        .nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary-color);
            transition: width 0.3s;
        }

        .nav a:hover::after {
            width: 100%;
        }

        .cta-nav {
            background: var(--secondary-color);
            color: var(--white);
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .cta-nav:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            color: var(--white);
            padding: 120px 0 80px;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.05"><path d="M0,50 Q250,0 500,50 T1000,50 L1000,100 L0,100 Z"/></svg>') repeat-x;
            background-size: 1000px 100px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero h2 {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.8;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--accent-color);
            color: var(--white);
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            background: #d97706;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: transparent;
            color: var(--white);
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Main Content */
        .main-content {
            padding: 80px 0;
        }

        .section {
            margin-bottom: 80px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-badge {
            display: inline-block;
            background: var(--secondary-color);
            color: var(--white);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Program Cards */
        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .program-card {
            background: var(--white);
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            border: 1px solid #e5e7eb;
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .program-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--secondary-color), #059669);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: var(--white);
        }

        .program-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .program-card p {
            color: var(--text-light);
            line-height: 1.6;
        }

        /* Registration Section */
        .registration-section {
            background: var(--white);
            padding: 80px 0;
            border-radius: 30px;
            box-shadow: var(--shadow-lg);
        }

        .registration-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .wave-card {
            background: linear-gradient(135deg, var(--primary-color), #3b82f6);
            color: var(--white);
            padding: 40px;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .wave-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .wave-card-content {
            position: relative;
            z-index: 1;
        }

        .wave-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .wave-period {
            font-size: 1.1rem;
            margin-bottom: 25px;
            opacity: 0.9;
        }

        .selection-info {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .selection-info h4 {
            margin-bottom: 15px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .selection-info p {
            font-size: 0.95rem;
            opacity: 0.9;
            margin-bottom: 8px;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--secondary-color), #059669);
            color: var(--white);
            padding: 80px 0;
            border-radius: 30px;
            margin: 80px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .stat-item p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 50px;
            align-items: center;
            margin-top: 50px;
        }

        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-light);
        }

        .vision-mission {
            background: var(--white);
            padding: 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        .vision-mission h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .vision-mission p {
            font-style: italic;
            color: var(--text-light);
            margin-bottom: 30px;
        }

        .mission-list {
            list-style: none;
        }

        .mission-list li {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            color: var(--text-light);
        }

        .mission-list i {
            color: var(--secondary-color);
            font-size: 1.2rem;
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 60px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--white);
        }

        .footer-section p, .footer-section li {
            color: #9ca3af;
            margin-bottom: 10px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--secondary-color);
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 30px;
            text-align: center;
            color: #9ca3af;
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
                font-size: 2.5rem;
            }

            .hero h2 {
                font-size: 1.2rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .section-title {
                font-size: 2rem;
            }

            .registration-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon"></div>
                    <div class="logo-text">
                        <h1>Baitul Qur'an</h1>
                        <p>Al-Kautsar</p>
                    </div>
                </div>
                <nav class="nav">
                    <a href="#beranda">Beranda</a>
                    <a href="#tentang">Tentang Kami</a>
                    <a href="#program">Program</a>
                    <a href="#pendaftaran">Pendaftaran</a>
                    <a href="#kontak">Kontak</a>
                    <a href="#pendaftaran" class="cta-nav">Daftar Sekarang</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">PSB 2026/2027</div>
                <h1>BeQi Al-Kautsar, Mencetak Generasi Qur'ani.Mandiri.Berprestasi.</h1>
                <h2>Penerimaan Santri Baru Tahun Ajaran 2026/2027</h2>
                <p>Pesantren Baitul Qur'an "Al-Kautsar" - Kota Madiun, Jawa Timur<br>SMP - SMA</p>
                <div class="hero-buttons">
                    <a href="#pendaftaran" class="btn-primary">Daftar Sekarang</a>
                    <a href="#tentang" class="btn-secondary">Selayang Pandang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Program Unggulan -->
            <section id="program" class="section">
                <div class="section-header">
                    <div class="section-badge">Program Unggulan</div>
                    <h2 class="section-title">Program Pesantren</h2>
                    <p class="section-subtitle">Pesantren Baitul Qur'an Al-Kautsar memiliki 4 program unggulan yang terintegrasi</p>
                </div>
                <div class="program-grid">
                    <div class="program-card">
                        <div class="program-icon">📖</div>
                        <h3>Tahfidz</h3>
                        <p>Program menghafal Al-Qur'an 30 juz dengan metode yang terstruktur dan mutqin, dibimbing oleh ustadz berkompeten.</p>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">🎓</div>
                        <h3>Akademik</h3>
                        <p>Kurikulum terpadu antara pendidikan formal (SMP-SMA) dengan pendidikan pesantren untuk menghasilkan lulusan berkualitas.</p>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">🌍</div>
                        <h3>Bilingual</h3>
                        <p>Pengembangan kemampuan bahasa Arab dan Inggris untuk mempersiapkan santri menjadi generasi global yang kompetitif.</p>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">💼</div>
                        <h3>Entrepreneurship</h3>
                        <p>Pembekalan ilmu kewirausahaan dan lifeskill untuk membentuk santri yang mandiri dan berdaya saing tinggi.</p>
                    </div>
                </div>
            </section>

            <!-- Registration Section -->
            <section id="pendaftaran" class="registration-section">
                <div class="section-header">
                    <div class="section-badge">Penerimaan Santri BeQi</div>
                    <h2 class="section-title">PSB 2026/2027</h2>
                    <p class="section-subtitle">PSB 2026/2027 merupakan seleksi yang dilakukan oleh Pesantren Baitul Qur'an Al-Kautsar secara mandiri untuk menjaring calon santri</p>
                </div>
                <div class="registration-grid">
                    <div class="wave-card">
                        <div class="wave-card-content">
                            <h3 class="wave-title">GELOMBANG 1</h3>
                            <p class="wave-period">1 OKTOBER - 31 DESEMBER 2025</p>
                            <div class="selection-info">
                                <h4>Seleksi Pendaftaran:</h4>
                                <p><strong>Akademik:</strong> 7 Januari 2026 (Online)</p>
                                <p><strong>Tilawah & Wawancara:</strong> 11 Januari 2026 (Offline)</p>
                            </div>
                            <p><em>Gelombang 2 akan dibuka jika gelombang 1 belum terpenuhi</em></p>
                        </div>
                    </div>
                    <div class="wave-card">
                        <div class="wave-card-content">
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
                </div>
            </section>

            <!-- Stats Section -->
            <section class="stats-section">
                <div class="container">
                    <div class="stats-grid">
                        <div class="stat-item">
                            <h3>99%</h3>
                            <p>Hafal 30 Juz</p>
                        </div>
                        <div class="stat-item">
                            <h3>25</h3>
                            <p>Kuota Santri</p>
                        </div>
                        <div class="stat-item">
                            <h3>11</h3>
                            <p>Beasiswa Tersedia</p>
                        </div>
                        <div class="stat-item">
                            <h3>24/7</h3>
                            <p>Pembinaan</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section id="tentang" class="section">
                <div class="section-header">
                    <div class="section-badge">Tentang Kami</div>
                    <h2 class="section-title">Profil Pesantren</h2>
                    <p class="section-subtitle">Membentuk Generasi Cerdas yang Mandiri dan Berkarakter dengan Al-Qur'an</p>
                </div>
                <div class="about-content">
                    <div class="about-text">
                        <p>Pesantren Baitul Qur'an Al-Kautsar merupakan lembaga pendidikan dibawah naungan yayasan Al-Kautsar Madiun, yang memadukan pendidikan formal dalam bentuk SMP dan SMA dengan non formal dalam bentuk Dirosah Islamiyah. Pembinaan 24 jam yang dikemas dalam sistem Islamic Boarding School (Pesantren Modern).</p>
                        <br>
                        <p>Dengan komitmen untuk mencetak generasi Qur'ani yang mandiri dan berprestasi, kami menyediakan lingkungan belajar yang kondusif dengan fasilitas modern dan tenaga pendidik yang berkompeten di bidangnya.</p>
                    </div>
                    <div class="vision-mission">
                        <h3>Visi</h3>
                        <p>"Membentuk Generasi Cerdas yang Mandiri dan berkarakter dengan Al-Qur'an"</p>
                        
                        <h3>Misi</h3>
                        <ul class="mission-list">
                            <li><i class="fas fa-check-circle"></i>Menjadikan Al-Qur'an dan Sunnah sebagai landasan hidup</li>
                            <li><i class="fas fa-check-circle"></i>Membentuk santri beraqidah ahlussunnah wal jama'ah</li>
                            <li><i class="fas fa-check-circle"></i>Membentuk santri berakhlak Mulia dalam kehidupan sehari-hari</li>
                            <li><i class="fas fa-check-circle"></i>Membentuk lifeskill kemandirian dan kemasyarakatan santri</li>
                            <li><i class="fas fa-check-circle"></i>Membekali santri ilmu entrepreneur</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer id="kontak" class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Jam Kantor</h4>
                    <p>Senin s/d Jum'at:<br>08.00 s/d 14.30</p>
                    <p>Sabtu:<br>08:00 s/d 12:00</p>
                </div>
                <div class="footer-section">
                    <h4>Tentang</h4>
                    <ul>
                        <li><a href="#tentang">Profil Pesantren</a></li>
                        <li><a href="#tentang">Visi Misi</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Pendidikan</h4>
                    <ul>
                        <li><a href="#program">SMP</a></li>
                        <li><a href="#program">SMA</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Kontak</h4>
                    <p><i class="fas fa-phone"></i> 081234002350</p>
                    <p><i class="fas fa-envelope"></i> info@baitulquranalkautsar.ac.id</p>
                    <p><i class="fas fa-map-marker-alt"></i> Jln. Ring Road Barat - Kel. Manguharjo<br>Kec. Manguharjo Kota Madiun<br>Jawa Timur</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Pesantren Baitul Qur'an Al-Kautsar. All rights reserved.</p>
                <p>Qur'ani - Mandiri - Berprestasi</p>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

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

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('.section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });
    </script>
</body>
</html>