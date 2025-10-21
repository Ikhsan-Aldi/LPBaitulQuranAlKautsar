<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Pendaftaran" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 arabic-font">
                Pendaftaran
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-8 leading-relaxed">
                Bergabunglah bersama keluarga besar Baitul Quran Al-Kautsar
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#gelombang-dibuka" 
                class="bg-white text-[#017077] font-bold px-8 py-4 rounded-lg hover:bg-gray-100 transition-colors duration-300 shadow-lg hover:shadow-xl text-center">
                    <i class="fas fa-door-open mr-2"></i>Gelombang Dibuka
                </a>
                <a href="<?= base_url('pendaftaran/form') ?>" 
                class="bg-[#017077] text-white font-bold px-8 py-4 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-center">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <main class="lg:w-2/3">
                <?= view('lp/pendaftaran/partials/gelombang_dibuka') ?>
                <?= view('lp/pendaftaran/partials/gelombang_ditutup') ?>
            </main>

            <!-- Sidebar -->
            <aside class="lg:w-1/3 space-y-8">
                <?= view('lp/pendaftaran/partials/info_beasiswa') ?>
                <?= view('lp/pendaftaran/partials/syarat_pendaftaran') ?>
                <?= view('lp/pendaftaran/partials/keunggulan') ?>
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
</style>
<?= $this->endSection() ?>