<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative min-h-[30vh] sm:min-h-[40vh] md:min-h-[50vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Program Pesantren" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16 lg:py-20 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 md:mb-8 arabic-font">
                Pendaftaran
            </h1>
            <p class="text-sm xs:text-base sm:text-lg md:text-xl lg:text-2xl text-white/90 leading-relaxed mb-6 sm:mb-8 md:mb-10 px-2">
                Bergabunglah bersama keluarga besar Baitul Quran Al-Kautsar
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6 md:gap-8 px-2">
                <a href="#gelombang-dibuka" 
                class="bg-white text-[#017077] font-bold px-4 py-3 sm:px-6 sm:py-4 md:px-8 md:py-4 rounded-lg hover:bg-gray-100 transition-colors duration-300 shadow-lg hover:shadow-xl text-center text-sm sm:text-base md:text-lg">
                    <i class="fas fa-door-open mr-2"></i>Gelombang Dibuka
                </a>
                <a href="<?= base_url('pendaftaran/form') ?>" 
                class="bg-[#017077] text-white font-bold px-4 py-3 sm:px-6 sm:py-4 md:px-8 md:py-4 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-center text-sm sm:text-base md:text-lg">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-8 sm:py-12 md:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-6 md:gap-8 lg:gap-10">
            <!-- Main Content -->
            <main class="lg:w-2/3">
                <?= view('lp/pendaftaran/partials/gelombang_dibuka') ?>
                <?= view('lp/pendaftaran/partials/gelombang_ditutup') ?>
            </main>

            <!-- Sidebar -->
            <aside class="lg:w-1/3 space-y-6 md:space-y-8">
                <?= view('lp/pendaftaran/partials/info_beasiswa') ?>
                <?= view('lp/pendaftaran/partials/syarat_pendaftaran') ?>
                <?= view('lp/pendaftaran/partials/cta_sidebar') ?>
            </aside>
        </div>
    </div>
</section>

<style>
.arabic-font {
    font-family: 'Traditional Arabic', 'Scheherazade New', 'Lateef', serif;
}

.section-pattern {
    background-image: radial-gradient(circle at 1px 1px, rgba(1, 112, 119, 0.1) 1px, transparent 0);
    background-size: 20px 20px;
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .hero-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .hero-buttons a {
        width: 100%;
        max-width: 280px;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .main-content {
        padding: 1rem 0;
    }
    
    .sidebar-content {
        margin-top: 2rem;
    }
}

@media (min-width: 1536px) {
    .container-xl {
        max-width: 1536px;
    }
}
</style>

<?= $this->endSection() ?>