<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Dashboard Admin') ?> | Ponpes Al-Kautsar</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#005359',
                        'primary': '#017077',
                        'primary-medium': '#006e75',
                        'primary-light': '#1b7c82',
                        'white': '#ffffff',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'amiri': ['Amiri', 'serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='20' viewBox='0 0 100 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M21.184 20c.357-.13.72-.264 1.088-.402l1.768-.661C33.64 15.347 39.647 14 50 14c10.271 0 15.362 1.222 24.629 4.928.955.383 1.869.74 2.75 1.072h6.225c-2.51-.73-5.139-1.691-8.233-2.928C65.888 13.278 60.562 12 50 12c-10.626 0-16.855 1.397-26.66 5.063l-1.767.662c-2.475.923-4.66 1.674-6.724 2.275h6.335zm0-20C13.258 2.892 8.077 4 0 4V2c5.744 0 9.951-.574 14.85-2h6.334zM77.38 0C85.239 2.966 90.502 4 100 4V2c-6.842 0-11.386-.542-16.396-2h-6.225zM0 14c8.44 0 13.718-1.21 22.272-4.402l1.768-.661C33.64 5.347 39.647 4 50 4c10.271 0 15.362 1.222 24.629 4.928C84.112 12.722 89.438 14 100 14v-2c-10.271 0-15.362-1.222-24.629-4.928C65.888 3.278 60.562 2 50 2 39.374 2 33.145 3.397 23.34 7.063l-1.767.662C13.223 10.84 8.163 12 0 12v2z' fill='%23005a5f' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
        
        .logo-mosque {
            background: color ( #ffff);
        }
        
        .sidebar-transition {
            transition: all 0.3s ease;
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
        }
        
        /* Custom scrollbar untuk sidebar */
        .scrollable-nav::-webkit-scrollbar {
            width: 4px;
        }
        
        .scrollable-nav::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        
        .scrollable-nav::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }
        
        .scrollable-nav::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>

<body class="font-poppins bg-white">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <di<!-- Sidebar -->
<div class="sidebar-transition w-64 bg-gradient-to-b from-primary-dark to-primary text-white h-screen fixed left-0 top-0 shadow-lg z-50 flex flex-col overflow-hidden">
    <!-- Header -->
    <div class="px-6 py-2 border-b border-white/20 flex-shrink-0">
        <div class="flex items-center space-x-3">
            <div class="logo-mosque w-12 h-12 rounded-xl flex items-center justify-center shadow-lg overflow-hidden bg-white">
                <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo Pondok" class="w-10 h-10 object-contain">
            </div>
            <div>
                <h1 class="font-amiri text-xl font-bold">Admin Panel</h1>
                <p class="text-xs text-white/80">Ponpes Al-Kautsar</p>
            </div>
        </div>
    </div>

    <!-- Scrollable Navigation -->
    <div class="flex-1 overflow-y-auto scrollable-nav p-4 space-y-2">
        <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'dashboard' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-home w-6 text-center"></i>
            <span>Dashboard</span>
        </a>

        <a href="<?= base_url('admin/pengajar') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'pengajar' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-user-tie w-6 text-center"></i>
            <span>Data Pengajar</span>
        </a>

        <a href="<?= base_url('admin/santri') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'santri' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-users w-6 text-center"></i>
            <span>Data Santri</span>
        </a>

        <a href="<?= base_url('admin/ekstrakurikuler') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'ekstrakurikuler' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-futbol w-6 text-center"></i>
            <span>Ekstrakurikuler</span>
        </a>

        <a href="<?= base_url('admin/kegiatan') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'kegiatan' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-calendar-alt w-6 text-center"></i>
            <span>Kegiatan</span>
        </a>

        <a href="<?= base_url('admin/gelombang') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'gelombang' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-wave-square w-6 text-center"></i>
            <span>Gelombang Pendaftaran</span>
        </a>

        <a href="<?= base_url('admin/pendaftaran') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'pendaftaran' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-file-alt w-6 text-center"></i>
            <span>Pendaftaran</span>
        </a>

        <a href="<?= base_url('admin/pesan') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'pesan' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-envelope w-6 text-center"></i>
            <span>Pesan</span>
        </a>
        <!-- ✅ Tambahan Menu Galeri -->
        <a href="<?= base_url('admin/galeri') ?>" 
            class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light hover:translate-x-2 transition-all duration-200 <?= service('uri')->getSegment(2) == 'galeri' ? 'bg-primary-light' : '' ?>">
            <i class="fa fa-images w-6 text-center"></i>
            <span>Galeri</span>
        </a>
    </div>

    <!-- Footer Tetap di Bawah -->
    <div class="mt-auto border-t border-white/10">
        <nav class="p-4 space-y-2">
            <a href="<?= base_url('admin/pengaturan') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-primary-light <?= service('uri')->getSegment(2) == 'pengaturan' ? 'bg-primary-light' : '' ?>">
                <i class="fa fa-cog w-6 text-center"></i>
                <span>Pengaturan</span>
            </a>

            <a href="<?= base_url('b0/logout') ?>" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-500/20 text-red-200"
               onclick="return confirm('Yakin ingin logout?')">
                <i class="fa fa-sign-out-alt w-6 text-center"></i>
                <span>Logout</span>
            </a>
        </nav>
        
    </div>
</div>


        <!-- Main Content -->
        <div class="ml-64 flex-1 flex flex-col min-h-screen">
            <!-- Top Navigation -->
            <header class="bg-gradient-to-r from-primary-dark to-primary text-white shadow-lg">
                <div class="flex items-center justify-between p-6">
                    <h1 class="font-amiri text-2xl font-bold">Pondok Pesantren Al-Kautsar</h1>
                    <div class="flex items-center space-x-4 bg-white/20 px-4 py-2 rounded-full">
                        <i class="fa fa-user-circle"></i>
                        <span class="font-medium"><?= esc(session()->get('username') ?? 'Admin') ?></span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-8 bg-gray-50/50">
                <?= $this->renderSection('content') ?>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-primary-medium/20 py-6 text-center">
                <p class="text-primary-medium font-medium">
                    &copy; <?= date('Y') ?> Pondok Pesantren Al-Kautsar. All rights reserved.
                </p>
                <p class="text-sm text-gray-600 mt-2">
                    Sistem Manajemen Pondok Pesantren - Versi 1.0
                </p>
            </footer>
        </div>
    </div>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Section untuk script custom dari view -->
    <?= $this->renderSection('scripts') ?>

    <!-- Mobile Menu Button (Hidden by default) -->
    <button id="mobileMenuButton" class="lg:hidden fixed top-4 left-4 z-50 bg-primary p-3 rounded-lg text-white shadow-lg">
        <i class="fa fa-bars"></i>
    </button>

    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuButton').addEventListener('click', function() {
            const sidebar = document.querySelector('.fixed.left-0');
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking on a link in mobile view
        document.querySelectorAll('.fixed.left-0 a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 1024) {
                    document.querySelector('.fixed.left-0').classList.add('-translate-x-full');
                }
            });
        });

        // Responsive sidebar behavior
        function handleResize() {
            const sidebar = document.querySelector('.fixed.left-0');
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
            } else {
                sidebar.classList.remove('-translate-x-full');
            }
        }

        // Initial check
        handleResize();
        
        // Listen for resize events
        window.addEventListener('resize', handleResize);

        // Smooth scrolling untuk sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const scrollableNav = document.querySelector('.scrollable-nav');
            if (scrollableNav) {
                // Optional: Add smooth scrolling behavior
                scrollableNav.style.scrollBehavior = 'smooth';
            }
        });
    </script>
</body>
</html>