<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<style>
@keyframes zoom {
  0% { transform: scale(1); }
  100% { transform: scale(1.1); }
}
#hero-bg1, #hero-bg2 {
  animation: zoom 14s ease-in-out infinite alternate;
}

</style>
<!-- Hero Section dengan Gambar Full Height -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute inset-0 transition-opacity duration-[1500ms] opacity-100" id="hero-bg1"
            style="background-image: url('<?= base_url('assets/img/hero.jpg') ?>'); background-size: cover; background-position: center;">
        </div>
        <div class="absolute inset-0 transition-opacity duration-[1500ms] opacity-0" id="hero-bg2"
            style="background-image: url('<?= base_url('assets/img/hero-2.jpg') ?>'); background-size: cover; background-position: center;">
        </div>
        <div class="absolute inset-0 hero-overlay"></div>
    </div>
    
<!-- Hero Content -->
<div class="max-w-7xl mx-auto px-6 relative z-10 w-full">
    <div class="flex flex-col md:flex-row items-center justify-between">
        <div class="md:w-1/2 text-center md:text-left group">
            <!-- Baitul Qur'an -->
            <span class="block text-[1.05rem] md:text-[1.15rem] lg:text-[1.25rem] font-semibold tracking-wide text-white transition-colors duration-300 ease-in-out">
                Baitul Qur'an
            </span>

            <!-- Al-Kautsar -->
            <h1 class="text-[2.2rem] md:text-[3rem] lg:text-[3.3rem] font-extrabold text-white leading-tight group-hover:text-white transition-colors duration-300 arabic-font">
                Al-Kautsar
            </h1>

            <!-- Deskripsi -->
            <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mt-5 leading-relaxed">
                Pusat pendidikan Islam terpadu yang membina generasi Qur'ani berakhlak mulia, berilmu, dan bermanfaat bagi umat.
            </p>

            <!-- Tombol CTA -->
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center md:justify-start">
                <a href="<?= base_url('program') ?>" 
                   class="bg-[#017077] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-center">
                    <i class="fas fa-book-open mr-2"></i>Program Kami
                </a>
                <a href="<?= base_url('tentang') ?>" 
                   class="border-2 border-white text-white font-bold px-8 py-3 rounded-lg hover:bg-white hover:text-[#017077] transition-colors duration-300 text-center">
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
                <h3 class="text-xl font-bold text-[#017077] mb-4 text-center">Tahfizh Qur’an</h3>
                <p class="text-gray-600 text-center">
                    Program unggulan hafalan Al-Qur’an dengan bimbingan intensif dan metode yang efektif.
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
                <h3 class="text-xl font-bold text-[#017077] mb-4 text-center">Pendidikan Formal & Non Formal</h3>
                <p class="text-gray-600 text-center">
                    Pendidikan formal SMP–SMA dan non formal Dirosah Islamiyah dalam sistem pesantren terpadu.
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
                    <i class="fas fa-book-reader text-[#017077] text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#017077] mb-4 text-center">Kajian & Pembinaan</h3>
                <p class="text-gray-600 text-center">
                    Kajian kitab dan pembinaan karakter santri untuk membentuk pribadi Qur’ani dan mandiri.
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const images = [
        "<?= base_url('assets/img/hero.jpg') ?>",
        "<?= base_url('assets/img/hero-2.jpg') ?>",
        "<?= base_url('assets/img/hero-3.jpg') ?>"
    ];

    // Preload images
    images.forEach(src => {
        const img = new Image();
        img.src = src;
    });

    const bg1 = document.getElementById('hero-bg1');
    const bg2 = document.getElementById('hero-bg2');
    let current = 0;
    let showingBg1 = true;

    setInterval(() => {
        const next = (current + 1) % images.length;

        if (showingBg1) {
            bg2.style.backgroundImage = `url(${images[next]})`;
            bg2.classList.remove('opacity-0');
            bg1.classList.add('opacity-0');
        } else {
            bg1.style.backgroundImage = `url(${images[next]})`;
            bg1.classList.remove('opacity-0');
            bg2.classList.add('opacity-0');
        }

        showingBg1 = !showingBg1;
        current = next;
    }, 7000); // ganti tiap 7 detik
});
</script>
<?= $this->endSection() ?>