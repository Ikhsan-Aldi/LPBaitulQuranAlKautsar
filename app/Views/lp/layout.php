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
        
        .hero-overlay {
            background: linear-gradient(to bottom, rgba(22, 101, 52, 0.7) 0%, rgba(22, 101, 52, 0.3) 100%);
        }
        
        .section-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23166534' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
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
        .cta-button-normal {
            background-color: rgba(255, 255, 255, 0.9); /* Sedikit transparan */
            color: #047857; /* emerald-700 */
            border: 2px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(4px);
        }

        .cta-button-scrolled {
            background-color: #059669; /* emerald-500 - lebih soft dari emerald-700 */
            color: white;
            border: 2px solid #059669;
        }

        .cta-button-normal:hover {
            background-color: rgba(255, 255, 255, 1);
            transform: translateY(-1px);
        }

        .cta-button-scrolled:hover {
            background-color: #047857; /* emerald-700 */
            border-color: #047857;
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Header Section -->
    <header class="fixed w-full z-50 navbar-transition" id="navbar">
        <nav class="bg-transparent navbar-transition">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="<?= base_url() ?>" class="text-white hover:text-emerald-50 flex items-center transition-colors duration-300">
                            <img src="<?= base_url('assets/img/logo.png') ?>" alt="Baitul Quran Al-Kautsar" class="h-10 w-10 mr-3">
                            <div class="flex flex-col">
                                <span class="text-xl font-bold leading-tight">Baitul Quran</span>
                                <span class="text-sm font-normal opacity-90">Al-Kautsar</span>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Desktop Navigation Menu -->
                    <div class="hidden md:flex space-x-8 items-center">
                        <a href="<?= base_url() ?>" class="text-white hover:text-emerald-200 font-medium transition-colors duration-300 relative py-2 <?= (current_url() == base_url()) ? 'text-emerald-200' : '' ?>">
                            Beranda
                            <?php if (current_url() == base_url()): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-emerald-200"></span>
                            <?php endif; ?>
                        </a>
                        <a href="<?= base_url('tentang') ?>" class="text-white hover:text-emerald-200 font-medium transition-colors duration-300 relative py-2 <?= (current_url() == base_url('tentang')) ? 'text-emerald-200' : '' ?>">
                            Tentang Kami
                            <?php if (current_url() == base_url('tentang')): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-emerald-200"></span>
                            <?php endif; ?>
                        </a>
                        <a href="<?= base_url('profil') ?>" class="text-white hover:text-emerald-200 font-medium transition-colors duration-300 relative py-2 <?= (current_url() == base_url('profil')) ? 'text-emerald-200' : '' ?>">
                            Program
                            <?php if (current_url() == base_url('profil')): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-emerald-200"></span>
                            <?php endif; ?>
                        </a>
                        <a href="<?= base_url('kontak') ?>" class="text-white hover:text-emerald-200 font-medium transition-colors duration-300 relative py-2 <?= (current_url() == base_url('kontak')) ? 'text-emerald-200' : '' ?>">
                            Kontak
                            <?php if (current_url() == base_url('kontak')): ?>
                                <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-emerald-200"></span>
                            <?php endif; ?>
                        </a>
                        <div class="relative dropdown-group">
                            <a href="<?= base_url('lainnya') ?>" class="text-white hover:text-emerald-200 font-medium transition-colors duration-300 flex items-center py-2 <?= (current_url() == base_url('lainnya')) ? 'text-emerald-200' : '' ?>">
                                Lainnya
                                <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </a>
                            <!-- Dropdown Menu -->
                            <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl dropdown-menu z-50 border border-emerald-100">
                                <div class="py-2">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors duration-200">
                                        <i class="fas fa-book mr-2 text-emerald-600"></i>Artikel
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors duration-200">
                                        <i class="fas fa-images mr-2 text-emerald-600"></i>Galeri
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors duration-200">
                                        <i class="fas fa-heart mr-2 text-emerald-600"></i>Donasi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- CTA Button Desktop -->
                    <div class="hidden md:block">
                        <a href="<?= base_url('kontak') ?>" id="cta-button" class="cta-button-normal px-5 py-2.5 rounded-lg font-medium hover:bg-emerald-50 transition-colors duration-300 shadow-lg hover:shadow-xl z-10 relative">
                            <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                        </a>
                    </div>
                    
                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-white hover:text-emerald-200 focus:outline-none z-50 relative">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-emerald-100 shadow-lg absolute top-full left-0 right-0 z-40">
                <div class="px-6 py-4 space-y-3">
                    <a href="<?= base_url() ?>" class="block text-gray-700 hover:text-emerald-700 font-medium py-2 px-3 rounded-lg hover:bg-emerald-50 transition-colors duration-200 <?= (current_url() == base_url()) ? 'text-emerald-700 bg-emerald-50' : '' ?>">
                        <i class="fas fa-home mr-3 text-emerald-600"></i>Beranda
                    </a>
                    <a href="<?= base_url('tentang') ?>" class="block text-gray-700 hover:text-emerald-700 font-medium py-2 px-3 rounded-lg hover:bg-emerald-50 transition-colors duration-200 <?= (current_url() == base_url('tentang')) ? 'text-emerald-700 bg-emerald-50' : '' ?>">
                        <i class="fas fa-info-circle mr-3 text-emerald-600"></i>Tentang Kami
                    </a>
                    <a href="<?= base_url('profil') ?>" class="block text-gray-700 hover:text-emerald-700 font-medium py-2 px-3 rounded-lg hover:bg-emerald-50 transition-colors duration-200 <?= (current_url() == base_url('profil')) ? 'text-emerald-700 bg-emerald-50' : '' ?>">
                        <i class="fas fa-book-open mr-3 text-emerald-600"></i>Program
                    </a>
                    <a href="<?= base_url('kontak') ?>" class="block text-gray-700 hover:text-emerald-700 font-medium py-2 px-3 rounded-lg hover:bg-emerald-50 transition-colors duration-200 <?= (current_url() == base_url('kontak')) ? 'text-emerald-700 bg-emerald-50' : '' ?>">
                        <i class="fas fa-phone mr-3 text-emerald-600"></i>Kontak
                    </a>
                    <a href="<?= base_url('lainnya') ?>" class="block text-gray-700 hover:text-emerald-700 font-medium py-2 px-3 rounded-lg hover:bg-emerald-50 transition-colors duration-200 <?= (current_url() == base_url('lainnya')) ? 'text-emerald-700 bg-emerald-50' : '' ?>">
                        <i class="fas fa-ellipsis-h mr-3 text-emerald-600"></i>Lainnya
                    </a>
                    <div class="pt-4 border-t border-emerald-100">
                        <a href="<?= base_url('kontak') ?>" class="block bg-emerald-600 text-white text-center px-5 py-3 rounded-lg font-medium hover:bg-emerald-700 transition-colors duration-300 shadow-md">
                            <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="mx-auto">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer Section -->
    <footer class="bg-emerald-900 text-white section-pattern">
        <!-- CTA Section -->
        <div class="bg-emerald-800 py-16 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\" fill=\"%23ffffff\"><text x=\"50\" y=\"50\" font-size=\"80\" text-anchor=\"middle\" dominant-baseline=\"middle\" font-family=\"serif\">ﷲ</text></svg>'); background-repeat: repeat;"></div>
            </div>
            <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
                <h2 class="text-3xl font-bold mb-4">Mari Bergabung dengan Kami</h2>
                <p class="text-emerald-100 text-xl max-w-2xl mx-auto mb-8">
                    Jadilah bagian dari komunitas Baitul Quran Al-Kautsar untuk memperdalam ilmu agama dan membangun ukhuwah islamiyah.
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="<?= base_url('kontak') ?>" class="bg-white text-emerald-700 font-bold px-8 py-3 rounded-lg hover:bg-emerald-50 transition-colors duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </a>
                    <a href="#" class="border-2 border-white text-white font-bold px-8 py-3 rounded-lg hover:bg-white hover:text-emerald-700 transition-colors duration-300 inline-flex items-center justify-center">
                        <i class="fas fa-heart mr-2"></i>Donasi
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Footer Links -->
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="lg:col-span-1">
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Baitul Quran Al-Kautsar" class="h-8 w-8 mr-3">
                        <span>Baitul Quran Al-Kautsar</span>
                    </h3>
                    <p class="text-emerald-200 mb-6 leading-relaxed">
                        Pusat pendidikan Islam terpadu yang berkomitmen untuk mencetak generasi Qur'ani yang berakhlak mulia dan berilmu.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-emerald-300 hover:text-white transition-colors duration-300 bg-emerald-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="#" class="text-emerald-300 hover:text-white transition-colors duration-300 bg-emerald-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="#" class="text-emerald-300 hover:text-white transition-colors duration-300 bg-emerald-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-youtube text-lg"></i>
                        </a>
                        <a href="#" class="text-emerald-300 hover:text-white transition-colors duration-300 bg-emerald-800 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="<?= base_url() ?>" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-emerald-400"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('tentang') ?>" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-emerald-400"></i>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('profil') ?>" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-emerald-400"></i>
                                Program
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('kontak') ?>" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-emerald-400"></i>
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
                            <a href="#" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-star text-xs mr-2 text-emerald-400"></i>
                                Tahfizh Quran
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-star text-xs mr-2 text-emerald-400"></i>
                                Kajian Islam
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-star text-xs mr-2 text-emerald-400"></i>
                                Pendidikan Anak
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-emerald-200 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-star text-xs mr-2 text-emerald-400"></i>
                                Kursus Bahasa Arab
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-emerald-400 mt-1 mr-3"></i>
                            <span class="text-emerald-200">Jl. Pendidikan Islam No. 123, Jakarta, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-emerald-400 mr-3"></i>
                            <span class="text-emerald-200">+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-emerald-400 mr-3"></i>
                            <span class="text-emerald-200">info@baitulquran-alkautsar.org</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-emerald-400 mr-3"></i>
                            <span class="text-emerald-200">Senin - Jumat: 08:00 - 17:00</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-emerald-800 py-6">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-emerald-300 text-sm">
                    &copy; <?= date('Y') ?> Baitul Quran Al-Kautsar. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-emerald-300 hover:text-white text-sm transition-colors duration-300">
                        Kebijakan Privasi
                    </a>
                    <a href="#" class="text-emerald-300 hover:text-white text-sm transition-colors duration-300">
                        Syarat & Ketentuan
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript untuk interaksi -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
            
            // Ganti ikon menu
            const icon = this.querySelector('i');
            if (mobileMenu.classList.contains('hidden')) {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            } else {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            }
        });
        
// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    const nav = navbar.querySelector('nav');
    const ctaButton = document.getElementById('cta-button');
    
    if (window.scrollY > 100) {
        nav.classList.remove('bg-transparent');
        nav.classList.add('bg-white', 'shadow-md');
        // Ubah warna teks pada navbar setelah scroll
        navbar.querySelectorAll('a, button').forEach(element => {
            if (!element.closest('.dropdown-menu') && element.id !== 'cta-button') {
                element.classList.remove('text-white', 'hover:text-emerald-200');
                element.classList.add('text-gray-700', 'hover:text-emerald-600');
            }
        });
        
        // Update CTA button untuk state scrolled
        ctaButton.classList.remove('cta-button-normal');
        ctaButton.classList.add('cta-button-scrolled');
        
    } else {
        nav.classList.add('bg-transparent');
        nav.classList.remove('bg-white', 'shadow-md');
        // Kembalikan warna teks pada navbar
        navbar.querySelectorAll('a, button').forEach(element => {
            if (!element.closest('.dropdown-menu') && element.id !== 'cta-button') {
                element.classList.add('text-white', 'hover:text-emerald-200');
                element.classList.remove('text-gray-700', 'hover:text-emerald-600');
            }
        });
        
        // Update CTA button untuk state normal
        ctaButton.classList.remove('cta-button-scrolled');
        ctaButton.classList.add('cta-button-normal');
    }
});
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.add('hidden');
                document.getElementById('mobile-menu-button').querySelector('i').classList.remove('fa-times');
                document.getElementById('mobile-menu-button').querySelector('i').classList.add('fa-bars');
            });
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('.dropdown-group');
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target)) {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    menu.style.opacity = '0';
                    menu.style.visibility = 'hidden';
                    menu.style.transform = 'translateY(-10px)';
                }
            });
        });
    </script>
</body>
</html>