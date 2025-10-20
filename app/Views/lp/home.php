<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section dengan Gambar Full Height -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="<?= base_url('assets/img/hero.jpg') ?>" alt="Baitul Quran Al-Kautsar" class="w-full h-full object-cover">
        <div class="absolute inset-0 hero-overlay"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 text-center md:text-left">
            <span class="block text-white/90 text-2xl md:text-3xl lg:text-4xl font-semibold mt-2">Baitul Quran</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight">
                    Al-Kautsar
                    
                </h1>
                <p class="text-xl text-white mb-8 max-w-2xl">
                    Pusat pendidikan Islam terpadu yang membina generasi Qur'ani berakhlak mulia, berilmu, dan bermanfaat bagi umat.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center md:justify-start">
                    <a href="<?= base_url('profil') ?>" class="bg-[#017077] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-center">
                        <i class="fas fa-book-open mr-2"></i>Program Kami
                    </a>
                    <a href="<?= base_url('tentang') ?>" class="border-2 border-white text-white font-bold px-8 py-3 rounded-lg hover:bg-white hover:text-[#017077] transition-colors duration-300 text-center">
                        <i class="fas fa-info-circle mr-2"></i>Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white section-pattern">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-[#017077] mb-4">Program Unggulan Kami</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Berbagai program pendidikan Islam untuk semua kalangan dan usia
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Program 1 -->
            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 border border-[#017077]/10">
                <div class="bg-[#017077]/10 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-quran text-[#017077] text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#017077] mb-4 text-center">Tahfizh Quran</h3>
                <p class="text-gray-600 text-center">
                    Program menghafal Al-Quran dengan metode yang mudah dan menyenangkan untuk semua usia.
                </p>
                <div class="mt-6 text-center">
                    <a href="#" class="text-[#017077] hover:text-[#005359] font-medium inline-flex items-center">
                        Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
            
            <!-- Program 2 -->
            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 border border-[#017077]/10">
                <div class="bg-[#017077]/10 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-graduation-cap text-[#017077] text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#017077] mb-4 text-center">Kajian Islam</h3>
                <p class="text-gray-600 text-center">
                    Kajian rutin kitab-kitab ulama dengan pemateri yang kompeten di bidangnya.
                </p>
                <div class="mt-6 text-center">
                    <a href="#" class="text-[#017077] hover:text-[#005359] font-medium inline-flex items-center">
                        Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
            
            <!-- Program 3 -->
            <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300 border border-[#017077]/10">
                <div class="bg-[#017077]/10 w-16 h-16 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-child text-[#017077] text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#017077] mb-4 text-center">Pendidikan Anak</h3>
                <p class="text-gray-600 text-center">
                    Pembinaan karakter Islami sejak dini dengan metode yang sesuai perkembangan anak.
                </p>
                <div class="mt-6 text-center">
                    <a href="#" class="text-[#017077] hover:text-[#005359] font-medium inline-flex items-center">
                        Selengkapnya <i class="fas fa-arrow-right ml-2 text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-[#017077]/5">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-[#017077] mb-4">Bergabunglah dengan Komunitas Kami</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            Mari bersama-sama membangun generasi Qur'ani yang akan membawa kemaslahatan bagi umat.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="<?= base_url('kontak') ?>" class="bg-[#017077] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
            </a>
            <a href="#" class="border-2 border-[#017077] text-[#017077] font-bold px-8 py-3 rounded-lg hover:bg-[#017077] hover:text-white transition-colors duration-300 inline-flex items-center justify-center">
                <i class="fas fa-calendar-alt mr-2"></i>Jadwal Kajian
            </a>
        </div>
    </div>
</section>
<?= $this->endSection() ?>