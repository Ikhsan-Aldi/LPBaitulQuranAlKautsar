<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Baitul Quran Al-Kautsar - Pusat Pendidikan Islam Terpadu' ?></title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Include GLightbox CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <style>
        /* Custom styles */
        .navbar-transition {
            transition: all 0.3s ease;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .arabic-font {
            font-family: 'Amiri', serif;
        }
        
        /* Overlay hanya di bagian bawah */
        .hero-overlay {
    background: linear-gradient(
        to bottom,
        rgba(0, 0, 0, 0.7) 0%,
        rgba(0, 0, 0, 0.0) 80%
    );
}
        .section-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23017077' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        /* Fix untuk dropdown visibility */
        .dropdown-group:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        /* Update style untuk CTA button */
/* Update style untuk CTA button */
.cta-button-normal {
    background-color: rgba(255, 255, 255, 0.9);
    color: #017077;
    border: 2px solid rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(4px);
}

.cta-button-scrolled {
    background-color: #017077;
    color: white;
    border: 2px solid #017077;
}

.cta-button-normal:hover {
    background-color: rgba(255, 255, 255, 1);
    transform: translateY(-1px);
}

/* TAMBAHKAN INI - styling hover untuk CTA button di halaman non-home */
.cta-button-scrolled:hover {
    background-color: #005359;
    border-color: #005359;
    color: white; /* Pastikan teks tetap putih */
    transform: translateY(-1px);
}
        
        /* Style untuk navbar di halaman non-home */
        .navbar-non-home {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .navbar-non-home a:not(#cta-button),
        .navbar-non-home button {
            color: #374151;
        }
        
        .navbar-non-home a:not(#cta-button):hover,
        .navbar-non-home button:hover {
            color: #017077;
        }
        
        /* Style untuk konten halaman non-home - FIXED */
        .content-non-home {
            padding-top: 5.5rem; /* Memberi jarak untuk navbar fixed yang lebih besar */
            min-height: 100vh;
        }

        /* Pastikan header memiliki z-index yang cukup tinggi */
        header {
            z-index: 1000;
        }

        /* Pastikan konten utama berada di bawah navbar */
        main {
            position: relative;
            z-index: 1;
        }
        /* ---------- NAV COLORS (force, keep underline-only for active) ---------- */

        /* Default transition for pseudo underline */
        .nav-link {
        position: relative;
        transition: color .18s ease;
        }

        /* Underline-only for active (keinginanmu) */
        .nav-link.active::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: -6px; /* sesuaikan */
        height: 3px;
        background-color: #017077; /* teal utama */
        border-radius: 2px;
        display: block;
        pointer-events: none;
        transform-origin: left center;
        transform: scaleX(1);
        }

        /* small default to avoid accidental visible pseudo on non-active */
        .nav-link::after { transition: all .18s ease; }

        /* FORCE link colors depending on nav state.
        We style links based on #nav class so JS color toggles are unnecessary for active links.
        */

        /* Home / transparent navbar => links (including active) should appear white */
        #nav.bg-transparent .nav-link,
        #nav.bg-transparent .nav-link * {
        color: #ffffff !important;
        }

        /* When navbar has bg-white (scrolled or non-home) => links should be dark gray */
        #nav.bg-white .nav-link,
        #nav.bg-white .nav-link * {
        color: #374151 !important; /* text-gray-700 */
        }

        /* Keep hover color behavior without forcing teal text — hover can be darker gray */
        #nav.bg-white .nav-link:hover,
        #nav.bg-white .nav-link:focus {
        color: #111827 !important; /* text-gray-900 */
        }

        /* For home transparent hover (light tweak) */
        #nav.bg-transparent .nav-link:hover,
        #nav.bg-transparent .nav-link:focus {
        color: rgba(255,255,255,0.92) !important;
        }

        /* Ensure .active underline stays teal but text follows the rules above */
        .nav-link.active { color: inherit !important; }

        /* If somewhere JS adds hover:text-teal-* forcibly, these inheritance rules above win because of !important */
        /* --- Prevent navbar flicker --- */
        #navbar {
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
        #navbar.nav-ready {
            opacity: 1;
            transform: translateY(0);
        }

    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Header Section -->
    <header class="fixed w-full navbar-transition" id="navbar">
        <nav class="bg-transparent navbar-transition" id="nav">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="<?= base_url() ?>" 
                        class="flex items-center transition-colors duration-300 group" 
                        id="logo-link">
                            <img src="<?= base_url('assets/img/logo.png') ?>" 
                                alt="Baitul Quran Al-Kautsar" 
                                class="h-12 w-12 mr-3">

                            <div class="flex flex-col leading-tight">
                                <!-- Baitul Quran -->
                                <span id="baitulText" class="text-sm font-semibold tracking-wide text-white group-hover:text-[#164c3e] transition-colors duration-300 ease-in-out">
                                    Baitul Qur'an
                                </span>
                                <!-- Al-Kautsar -->
                                <span id="alkautsarText" class="text-xl font-extrabold text-white group-hover:text-[#258659] transition-colors arabic-font">
                                    Al-Kautsar
                                </span>
                            </div>
                        </a>
                    </div>

                    
                    <!-- Desktop Navigation Menu -->
                    <div class="hidden md:flex space-x-8 items-center">
                        <a href="<?= base_url() ?>" class="text-white hover:text-teal-200 font-medium transition-colors duration-300 relative py-2 nav-link <?= (current_url() == base_url()) ? 'text-teal-200' : '' ?>">
                            Beranda
                            <?php if (current_url() == base_url()): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-teal-200"></span>
                            <?php endif; ?>
                        </a>
                        <!-- Tentang Kami dengan Subnav -->
                        <div class="relative dropdown-group">
                            <a href="<?= base_url('tentang') ?>" class="text-white hover:text-teal-200 font-medium transition-colors duration-300 flex items-center py-2 nav-link <?= (strpos(current_url(), 'tentang') !== false) ? 'text-teal-200' : '' ?>">
                                Tentang Kami
                                <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </a>
                            <!-- Subnav Menu -->
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl dropdown-menu z-50 border border-teal-100">
                                <div class="py-2">
                                    <a href="<?= base_url('tentang') ?>#tentang" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-50 hover:text-teal-700 transition-colors duration-200">
                                        <i class="fas fa-info-circle mr-2 text-teal-600"></i>Tentang
                                    </a>
                                    <a href="<?= base_url('tentang') ?>#visi-misi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-50 hover:text-teal-700 transition-colors duration-200">
                                        <i class="fas fa-bullseye mr-2 text-teal-600"></i>Visi & Misi
                                    </a>
                                    <a href="<?= base_url('tentang') ?>#sejarah" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-50 hover:text-teal-700 transition-colors duration-200">
                                        <i class="fas fa-history mr-2 text-teal-600"></i>Sejarah
                                    </a>
                                    <a href="<?= base_url('tentang') ?>#struktur" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-50 hover:text-teal-700 transition-colors duration-200">
                                        <i class="fas fa-sitemap mr-2 text-teal-600"></i>Struktur
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('program') ?>" class="text-white hover:text-teal-200 font-medium transition-colors duration-300 relative py-2 nav-link <?= (current_url() == base_url('program')) ? 'text-teal-200' : '' ?>">
                            Program
                            <?php if (current_url() == base_url('program')): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-teal-200"></span>
                            <?php endif; ?>
                        </a>
                        <a href="<?= base_url('kontak') ?>" class="text-white hover:text-teal-200 font-medium transition-colors duration-300 relative py-2 nav-link <?= (current_url() == base_url('kontak')) ? 'text-teal-200' : '' ?>">
                            Kontak
                            <?php if (current_url() == base_url('kontak')): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-teal-200"></span>
                            <?php endif; ?>
                        </a>
                        <a href="<?= base_url('pendaftaran') ?>" class="text-white hover:text-teal-200 font-medium transition-colors duration-300 relative py-2 nav-link <?= (current_url() == base_url('kontak')) ? 'text-teal-200' : '' ?>">
                            Pendaftaran
                            <?php if (current_url() == base_url('pendaftaran')): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-teal-200"></span>
                            <?php endif; ?>
                        </a>
                        <a href="<?= base_url('galeri') ?>" class="text-white hover:text-teal-200 font-medium transition-colors duration-300 relative py-2 nav-link <?= (current_url() == base_url('galeri')) ? 'text-teal-200' : '' ?>">
                            Galeri
                            <?php if (current_url() == base_url('galeri')): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-teal-200"></span>
                            <?php endif; ?>
                        </a>
                    </div>
                    
                    <!-- CTA Button Desktop -->
                    <div class="hidden md:block">
                        <a href="<?= base_url('kontak') ?>" id="cta-button" class="cta-button-normal px-5 py-2.5 rounded-lg font-medium transition-colors duration-300 shadow-lg hover:shadow-xl z-10 relative">
                            <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                        </a>
                    </div>
                    
                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-white hover:text-teal-200 focus:outline-none z-50 relative nav-button">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-teal-100 shadow-lg absolute top-full left-0 right-0 z-40">
                <div class="px-6 py-4 space-y-3">
                    <a href="<?= base_url() ?>" class="block text-gray-700 hover:text-teal-700 font-medium py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200 <?= (current_url() == base_url()) ? 'text-teal-700 bg-teal-50' : '' ?>">
                        <i class="fas fa-home mr-3 text-teal-600"></i>Beranda
                    </a>
                    <!-- Tentang Kami dengan Subnav Mobile -->
                    <div class="space-y-2">
                        <div class="text-teal-700 font-medium py-2 px-3">
                            <i class="fas fa-info-circle mr-3 text-teal-600"></i>Tentang Kami
                        </div>
                        <div class="ml-6 space-y-2 border-l-2 border-teal-100 pl-4">
                            <a href="<?= base_url('tentang') ?>#tentang" class="block text-gray-600 hover:text-teal-700 text-sm py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200">
                                <i class="fas fa-circle text-xs mr-2 text-teal-500"></i>Tentang
                            </a>
                            <a href="<?= base_url('tentang') ?>#visi-misi" class="block text-gray-600 hover:text-teal-700 text-sm py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200">
                                <i class="fas fa-circle text-xs mr-2 text-teal-500"></i>Visi & Misi
                            </a>
                            <a href="<?= base_url('tentang') ?>#sejarah" class="block text-gray-600 hover:text-teal-700 text-sm py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200">
                                <i class="fas fa-circle text-xs mr-2 text-teal-500"></i>Sejarah
                            </a>
                            <a href="<?= base_url('tentang') ?>#struktur" class="block text-gray-600 hover:text-teal-700 text-sm py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200">
                                <i class="fas fa-circle text-xs mr-2 text-teal-500"></i>Struktur
                            </a>
                        </div>
                    </div>
                    <a href="<?= base_url('program') ?>" class="block text-gray-700 hover:text-teal-700 font-medium py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200 <?= (current_url() == base_url('program')) ? 'text-teal-700 bg-teal-50' : '' ?>">
                        <i class="fas fa-book-open mr-3 text-teal-600"></i>Program
                    </a>
                    <a href="<?= base_url('kontak') ?>" class="block text-gray-700 hover:text-teal-700 font-medium py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200 <?= (current_url() == base_url('kontak')) ? 'text-teal-700 bg-teal-50' : '' ?>">
                        <i class="fas fa-phone mr-3 text-teal-600"></i>Kontak
                    </a>
                    <a href="<?= base_url('pendaftaran') ?>" class="block text-gray-700 hover:text-teal-700 font-medium py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200 <?= (current_url() == base_url('pendaftaran')) ? 'text-teal-700 bg-teal-50' : '' ?>">
                        <i class="fas fa-user-plus mr-3 text-teal-600"></i>Pendaftaran
                    </a>
                    <a href="<?= base_url('galeri') ?>" class="block text-gray-700 hover:text-teal-700 font-medium py-2 px-3 rounded-lg hover:bg-teal-50 transition-colors duration-200 <?= (current_url() == base_url('galeri')) ? 'text-teal-700 bg-teal-50' : '' ?>">
                        <i class="fas fa-images mr-3 text-teal-600"></i>Galeri
                    </a>
                    <div class="pt-4 border-t border-teal-100">
                        <a href="<?= base_url('kontak') ?>" class="block bg-teal-600 text-white text-center px-5 py-3 rounded-lg font-medium hover:bg-teal-700 transition-colors duration-300 shadow-md">
                            <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="mx-auto" id="main-content">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer Section -->
    <footer class="bg-teal-900 text-white section-pattern">
        <!-- CTA Section -->
        <section class="py-16 bg-gradient-to-r from-[#017077] to-[#005359]">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Tertarik Bergabung?</h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Jangan lewatkan kesempatan untuk menjadi bagian dari keluarga besar Baitul Quran Al-Kautsar
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="<?= base_url('pendaftaran') ?>" class="bg-white text-teal-700 font-bold px-8 py-3 rounded-lg hover:bg-teal-50 transition-colors duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </a>
                    <a href="<?= base_url('program') ?>" class="border-2 border-white text-white font-bold px-8 py-4 rounded-lg hover:bg-white hover:text-[#017077] transition-colors duration-300 inline-flex items-center justify-center">
                        <i class="fas fa-book-open mr-2"></i>Lihat Program
                    </a>
                </div>
            </div>
        </section>
        
        <!-- Footer Links -->
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="lg:col-span-1">
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Baitul Quran Al-Kautsar" class="h-8 w-8 mr-3">
                        <span>Baitul Quran Al-Kautsar</span>
                    </h3>
                    <p class="text-teal-200 mb-6 leading-relaxed">
                        Pusat pendidikan Islam terpadu yang berkomitmen untuk mencetak generasi Qur'ani yang berakhlak mulia dan berilmu.
                    </p>
                    <div class="flex space-x-4">
                        <?php if(isset($kontak['facebook']) && !empty($kontak['facebook'])): ?>
                        <a href="<?= $kontak['facebook'] ?>" target="_blank" class="text-teal-300 hover:text-white transition-colors duration-300 bg-teal-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if(isset($kontak['instagram']) && !empty($kontak['instagram'])): ?>
                        <a href="<?= $kontak['instagram'] ?>" target="_blank" class="text-teal-300 hover:text-white transition-colors duration-300 bg-teal-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if(isset($kontak['youtube']) && !empty($kontak['youtube'])): ?>
                        <a href="<?= $kontak['youtube'] ?>" target="_blank" class="text-teal-300 hover:text-white transition-colors duration-300 bg-teal-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-youtube text-lg"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if(isset($kontak['tiktok']) && !empty($kontak['tiktok'])): ?>
                        <a href="<?= $kontak['tiktok'] ?>" target="_blank" class="text-teal-300 hover:text-white transition-colors duration-300 bg-teal-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-tiktok text-lg"></i>
                        </a>
                        <?php endif; ?>
                        
                        <?php if(isset($kontak['whatsapp']) && !empty($kontak['whatsapp'])): ?>
                        <a href="https://wa.me/<?= str_replace(['+', ' ', '-'], '', $kontak['whatsapp']) ?>" target="_blank" class="text-teal-300 hover:text-white transition-colors duration-300 bg-teal-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="<?= base_url() ?>" class="text-teal-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-teal-400"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('tentang') ?>" class="text-teal-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-teal-400"></i>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('program') ?>" class="text-teal-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-teal-400"></i>
                                Program
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('kontak') ?>" class="text-teal-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-teal-400"></i>
                                Kontak
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Programs -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Program Kami</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-teal-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-star text-xs mr-2 text-teal-400"></i>
                                Tahfizh Quran
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-teal-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-star text-xs mr-2 text-teal-400"></i>
                                Kajian Islam
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-teal-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-star text-xs mr-2 text-teal-400"></i>
                                Pendidikan Formal
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-teal-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-star text-xs mr-2 text-teal-400"></i>
                                Pendidikan Dirosah Islamiyah
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-4">
                        <?php if(isset($kontak['alamat']) && !empty($kontak['alamat'])): ?>
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-teal-400 mt-1 mr-3"></i>
                            <span class="text-teal-200"><?= nl2br(htmlspecialchars($kontak['alamat'])) ?></span>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(isset($kontak['telepon']) && !empty($kontak['telepon'])): ?>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-teal-400 mr-3"></i>
                            <span class="text-teal-200"><?= format_phone_number($kontak['telepon']) ?></span>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(isset($kontak['email']) && !empty($kontak['email'])): ?>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-teal-400 mr-3"></i>
                            <span class="text-teal-200"><?= htmlspecialchars($kontak['email']) ?></span>
                        </li>
                        <?php endif; ?>
                        
                        <?php if(isset($kontak['whatsapp']) && !empty($kontak['whatsapp'])): ?>
                        <li class="flex items-center">
                            <i class="fab fa-whatsapp text-teal-400 mr-3"></i>
                            <span class="text-teal-200"><?= format_phone_number($kontak['whatsapp']) ?></span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-teal-800 py-6">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-teal-300 text-sm">
                    &copy; <?= date('Y') ?> Baitul Quran Al-Kautsar. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-teal-300 hover:text-white text-sm transition-colors duration-300">
                        Kebijakan Privasi
                    </a>
                    <a href="#" class="text-teal-300 hover:text-white text-sm transition-colors duration-300">
                        Syarat & Ketentuan
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript untuk interaksi -->
    <script>
/* --- FUNGSI AUTO TAB SWITCHING UNTUK TENTANG KAMI BERDASARKAN HASH --- */
function setupTentangTabsFromHash() {
    // Cek jika berada di halaman tentang
    if (window.location.pathname.includes('tentang')) {
        const hash = window.location.hash.replace('#', '');
        const validTabs = ['tentang', 'visi-misi', 'sejarah'];
        
        if (validTabs.includes(hash)) {
            // Trigger tab switch setelah halaman load
            setTimeout(() => {
                const event = new CustomEvent('hashchange');
                window.dispatchEvent(event);
            }, 100);
        }
    }
}
/* --- FUNGSI DETEKSI HALAMAN --- */
function isHomePage() {
    const path = window.location.pathname.replace(/\/+$/, ''); // hapus trailing slash
    const base = "<?= rtrim(parse_url(base_url(), PHP_URL_PATH), '/') ?>";
    return path === base || path === base + "/home" || path === "";
}

/* --- Tandai link aktif berdasarkan URL (jalankan sebelum setupNavbar) --- */
function markActiveNavLink() {
    const navLinks = document.querySelectorAll('.nav-link');
    const currentPath = window.location.pathname.replace(/\/+$/, '');
    navLinks.forEach(link => {
        try {
            const linkPath = new URL(link.href, window.location.origin).pathname.replace(/\/+$/, '');
            // treat root equivalently
            if (linkPath === currentPath || (currentPath === '' && (linkPath === '/' || linkPath === ''))) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        } catch (e) {
            // jika href relatif (mis. '#') -> ignore safely
        }
    });
}

/* --- FUNGSI SETUP NAVBAR --- */
/* NOTE: kita tidak memaksa warna link aktif di sini; CSS akan menangani warna berdasarkan #nav.bg-*.
   Namun kita tetap menjaga beberapa kelas utility untuk fallback (CTA, tombol, dsb).
*/
function setupNavbar() {
    const navbar = document.getElementById('navbar');
    const nav = document.getElementById('nav');
    const ctaButton = document.getElementById('cta-button');
    const logoLink = document.getElementById('logo-link');
    const navLinks = document.querySelectorAll('.nav-link');
    const navButtons = document.querySelectorAll('.nav-button');
    const mainContent = document.getElementById('main-content');
    const baitulText = document.getElementById('baitulText');
    const alkautsarText = document.getElementById('alkautsarText');

    if (!navbar || !nav || !ctaButton || !mainContent) return;

    // mark active link first, so we can skip it when toggling specific classes
    markActiveNavLink();

    if (isHomePage()) {
        // HOME: transparan + tanpa padding
        nav.classList.remove('navbar-non-home', 'bg-white', 'shadow-md');
        nav.classList.add('bg-transparent');
        mainContent.classList.remove('content-non-home');

        // Logo styling (we keep classes for logo)
        logoLink.classList.add('text-white', 'hover:text-teal-50');
        logoLink.classList.remove('text-gray-700', 'hover:text-teal-600');
        if (baitulText) {
            baitulText.classList.remove('text-[#258659]', 'text-gray-700');
            baitulText.classList.add('text-white');
        }
        if (alkautsarText) {
            alkautsarText.classList.remove('text-[#164c3e]', 'text-gray-700');
            alkautsarText.classList.add('text-white');
        }

        // For each link: if active -> DO NOT apply color utility classes that can override our CSS;
        // only apply hover utilities for non-active links (but color will be controlled by CSS rules above).
        navLinks.forEach(link => {
            if (link.classList.contains('active')) {
                // keep 'active' state; don't force color classes
                // ensure any stale text-gray-700 is removed so CSS can take effect
                link.classList.remove('text-gray-700', 'hover:text-teal-600', 'text-teal-200', 'text-white');
                return;
            }
            // non-active: remove non-home classes, let CSS set color by #nav state
            link.classList.remove('text-gray-700', 'hover:text-teal-600', 'text-teal-200', 'text-white');
        });

        navButtons.forEach(btn => {
            btn.classList.remove('text-gray-700', 'hover:text-teal-600');
            btn.classList.add('text-white'); // mobile icons/buttons on hero should appear white
        });

        ctaButton.classList.remove('cta-button-scrolled');
        ctaButton.classList.add('cta-button-normal');
    } else {
        // NON-HOME: putih + shadow + padding
        nav.classList.add('navbar-non-home', 'bg-white', 'shadow-md');
        nav.classList.remove('bg-transparent');
        mainContent.classList.add('content-non-home');

        logoLink.classList.remove('text-white', 'hover:text-teal-50');
        logoLink.classList.add('text-gray-700', 'hover:text-teal-600');

        if (baitulText) {
            baitulText.classList.remove('text-white', 'text-gray-700');
            baitulText.classList.add('text-[#258659]');
        }
        if (alkautsarText) {
            alkautsarText.classList.remove('text-white', 'text-gray-700');
            alkautsarText.classList.add('text-[#164c3e]');
        }

        navLinks.forEach(link => {
            if (link.classList.contains('active')) {
                // keep active but remove any classes that might force teal text
                link.classList.remove('text-white', 'hover:text-teal-200', 'text-teal-200');
                // do not add text-teal-*; CSS will make text gray via #nav.bg-white
                return;
            }
            // For non-active links ensure no leftover white classes remain
            link.classList.remove('text-white', 'hover:text-teal-200', 'text-teal-200');
        });

        navButtons.forEach(btn => {
            btn.classList.remove('text-white', 'hover:text-teal-200');
            btn.classList.add('text-gray-700');
        });

        ctaButton.classList.remove('cta-button-normal');
        ctaButton.classList.add('cta-button-scrolled');
    }
}

/* --- SCROLL HANDLER (HANYA HOME) --- */
/* Kita menghindari memaksa warna pada .nav-link.active di sini juga — CSS menangani tampilan. */
function handleScroll() {
    if (!isHomePage()) return;

    const nav = document.getElementById('nav');
    const ctaButton = document.getElementById('cta-button');
    const logoLink = document.getElementById('logo-link');
    const navLinks = document.querySelectorAll('.nav-link');
    const navButtons = document.querySelectorAll('.nav-button');
    const baitulText = document.getElementById('baitulText');
    const alkautsarText = document.getElementById('alkautsarText');


    if (window.scrollY > 100) {
        // switch to white background
        nav.classList.remove('bg-transparent');
        nav.classList.add('bg-white', 'shadow-md');

        // Tambahan: ubah warna baitulText ke hijau
        if (baitulText) {
            baitulText.classList.remove('text-white');
            baitulText.classList.add('text-[#258659]');
        }
        if (alkautsarText) {
            alkautsarText.classList.remove('text-white');
            alkautsarText.classList.add('text-[#164c3e]');
        }
        // logo gray
        logoLink.classList.remove('text-white', 'hover:text-teal-50');
        logoLink.classList.add('text-gray-700', 'hover:text-gray-900');

        // Do NOT change color classes of active links; remove conflicting classes if present
        navLinks.forEach(link => {
            link.classList.remove('text-white', 'text-teal-200', 'hover:text-teal-200');
            // we don't add 'text-gray-700' here because CSS (#nav.bg-white ...) forces it.
        });

        navButtons.forEach(btn => {
            btn.classList.remove('text-white', 'hover:text-teal-200');
            btn.classList.add('text-gray-700');
        });

        ctaButton.classList.remove('cta-button-normal');
        ctaButton.classList.add('cta-button-scrolled');
    } else {
        // switch back to transparent
        nav.classList.remove('bg-white', 'shadow-md');
        nav.classList.add('bg-transparent');

        // Tambahan: ubah warna baitulText ke putih
        if (baitulText) {
            baitulText.classList.remove('text-[#258659]');
            baitulText.classList.add('text-white');
        }
        if (alkautsarText) {
            alkautsarText.classList.remove('text-[#164c3e]');
            alkautsarText.classList.add('text-white');
        }
        // logo white
        logoLink.classList.add('text-white', 'hover:text-teal-50');
        logoLink.classList.remove('text-gray-700', 'hover:text-gray-900');

        // remove classes that conflict with transparent state; CSS will make text white
        navLinks.forEach(link => {
            link.classList.remove('text-gray-700', 'hover:text-gray-900', 'text-teal-200');
            // do not add text-white here — CSS (#nav.bg-transparent ...) forces white
        });

        navButtons.forEach(btn => {
            btn.classList.remove('text-gray-700', 'hover:text-gray-900');
            btn.classList.add('text-white');
        });

        ctaButton.classList.remove('cta-button-scrolled');
        ctaButton.classList.add('cta-button-normal');
    }
}

/* --- MOBILE MENU TOGGLE & INIT --- */
document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });

        // Tutup menu saat link diklik
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
                const icon = mobileMenuBtn.querySelector('i');
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            });
        });
    }

    // Tutup dropdown jika klik di luar
    document.addEventListener('click', function (event) {
        const dropdowns = document.querySelectorAll('.dropdown-group');
        dropdowns.forEach(dropdown => {
            if (!dropdown.contains(event.target)) {
                const menu = dropdown.querySelector('.dropdown-menu');
                if (menu) {
                    menu.style.opacity = '0';
                    menu.style.visibility = 'hidden';
                    menu.style.transform = 'translateY(-10px)';
                }
            }
        });
    });

    // INIT: tandai link aktif lalu setup navbar (penting urutannya)
    markActiveNavLink();
    setupNavbar();
    setupTentangTabsFromHash();
    // --- Tambahkan efek anti-flicker ---
    const navbar = document.getElementById('navbar');
    if (navbar) {
        // Delay sedikit agar transisi smooth dan tidak flick
        requestAnimationFrame(() => {
            navbar.classList.add('nav-ready');
        });
    }
    // Scroll hanya diperlukan untuk halaman home
    if (isHomePage()) window.addEventListener('scroll', handleScroll);
});

/* --- REINIT saat kembali/back/forward (bfcache) --- */
window.addEventListener('pageshow', function(e) {
    // re-evaluate active link and navbar state
    markActiveNavLink();
    setupNavbar();
    // re-attach scroll if home
    if (isHomePage()) {
        // remove existing to be safe, then add
        window.removeEventListener('scroll', handleScroll);
        window.addEventListener('scroll', handleScroll);
    } else {
        window.removeEventListener('scroll', handleScroll);
    }
});

/* support for htmx or other SPA-ish swaps */
document.addEventListener('htmx:afterSwap', function() {
    markActiveNavLink();
    setupNavbar();
});
</script>

</body>
</html>