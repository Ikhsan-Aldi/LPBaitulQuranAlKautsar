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

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
        line-height: 1.2;
    }
    
    .hero-subtitle {
        font-size: 1rem;
        line-height: 1.4;
    }
    
    .hero-description {
        font-size: 1.125rem;
        line-height: 1.6;
        margin-top: 1rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .hero-button {
        width: 100%;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
    
    .feature-card {
        padding: 1.5rem;
    }
    
    .feature-icon {
        width: 3.5rem;
        height: 3.5rem;
    }
    
    .feature-title {
        font-size: 1.25rem;
    }
}

@media (max-width: 640px) {
    .hero-title {
        font-size: 1.75rem;
    }
    
    .hero-subtitle {
        font-size: 0.9rem;
    }
    
    .hero-description {
        font-size: 1rem;
        margin-top: 0.75rem;
    }
    
    .section-padding {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }
    
    .feature-card {
        padding: 1.25rem;
    }
}

@media (max-width: 480px) {
    .container-padding {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .hero-title {
        font-size: 1.5rem;
    }
    
    .hero-description {
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }
    
    .hero-button {
        padding: 0.625rem 1.25rem;
        font-size: 0.9rem;
    }
}

/* Additional responsive utilities */
.hero-content {
    padding-top: 4rem;
    padding-bottom: 4rem;
}

@media (min-width: 768px) {
    .hero-content {
        padding-top: 6rem;
        padding-bottom: 6rem;
    }
}

.feature-grid {
    display: grid;
    gap: 1.5rem;
}

@media (min-width: 768px) {
    .feature-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
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
    <div class="max-w-7xl mx-auto container-padding px-4 sm:px-6 relative z-10 w-full">
        <div class="hero-content">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="w-full md:w-1/2 text-center md:text-left group">
                    <!-- Baitul Qur'an -->
                    <span class="hero-subtitle block text-base sm:text-lg md:text-xl font-semibold tracking-wide text-white transition-colors duration-300 ease-in-out">
                        Pesantren Baitul Qur'an
                    </span>

                    <!-- AlKautsar -->
                    <h1 class="hero-title text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight group-hover:text-white transition-colors duration-300 arabic-font mt-2">
                        AlKautsar
                    </h1>

                    <!-- Deskripsi -->
                    <p class="hero-description text-lg sm:text-xl md:text-2xl text-white/90 mb-8 max-w-2xl leading-relaxed">
                        Pusat pendidikan Islam terpadu yang membina generasi Qur'ani berakhlak mulia, berilmu, dan bermanfaat bagi umat.
                    </p>

                    <!-- Tombol CTA -->
                    <div class="hero-buttons flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="<?= base_url('pendaftaran') ?>" 
                           class="hero-button bg-[#017077] text-white font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-center inline-flex items-center justify-center">
                            <i class="fas fa-user-plus mr-2 sm:mr-3"></i>
                            <span>Daftar Sekarang</span>
                        </a>
                    </div>
                </div>
                
                <!-- Spacer untuk layout balance di desktop -->
                <div class="hidden md:block md:w-1/2"></div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section-padding py-16 sm:py-20 bg-white section-pattern">
    <div class="max-w-7xl mx-auto container-padding px-4 sm:px-6">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#017077] mb-4">Program Unggulan Kami</h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                Berbagai program pendidikan Islam untuk semua kalangan dan usia
            </p>
        </div>
        
        <div class="feature-grid">
            <!-- Program 1 -->
            <div class="feature-card bg-white rounded-xl shadow-lg p-6 sm:p-8 hover:shadow-xl transition-all duration-300 border border-[#017077]/10">
                <div class="feature-icon bg-[#017077]/10 w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mb-4 sm:mb-6 mx-auto">
                    <i class="fas fa-quran text-[#017077] text-xl sm:text-2xl"></i>
                </div>
                <h3 class="feature-title text-lg sm:text-xl font-bold text-[#017077] mb-3 sm:mb-4 text-center">Tahfizh Qur'an</h3>
                <p class="text-gray-600 text-sm sm:text-base text-center leading-relaxed">
                    Program unggulan hafalan Al-Qur'an dengan bimbingan intensif dan metode yang efektif.
                </p>
            </div>

            <!-- Program 2 -->
            <div class="feature-card bg-white rounded-xl shadow-lg p-6 sm:p-8 hover:shadow-xl transition-all duration-300 border border-[#017077]/10">
                <div class="feature-icon bg-[#017077]/10 w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mb-4 sm:mb-6 mx-auto">
                    <i class="fas fa-graduation-cap text-[#017077] text-xl sm:text-2xl"></i>
                </div>
                <h3 class="feature-title text-lg sm:text-xl font-bold text-[#017077] mb-3 sm:mb-4 text-center">Pendidikan Formal & Non Formal</h3>
                <p class="text-gray-600 text-sm sm:text-base text-center leading-relaxed">
                    Pendidikan formal SMP-SMA dan non formal Dirosah Islamiyah dalam sistem pesantren terpadu.
                </p>
            </div>

            <!-- Program 3 -->
            <div class="feature-card bg-white rounded-xl shadow-lg p-6 sm:p-8 hover:shadow-xl transition-all duration-300 border border-[#017077]/10">
                <div class="feature-icon bg-[#017077]/10 w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mb-4 sm:mb-6 mx-auto">
                    <i class="fas fa-book-reader text-[#017077] text-xl sm:text-2xl"></i>
                </div>
                <h3 class="feature-title text-lg sm:text-xl font-bold text-[#017077] mb-3 sm:mb-4 text-center">Kajian & Pembinaan</h3>
                <p class="text-gray-600 text-sm sm:text-base text-center leading-relaxed">
                    Kajian kitab dan pembinaan karakter santri untuk membentuk pribadi Qur'ani dan mandiri.
                </p>
            </div>
        </div>
        
        <!-- Additional Call to Action -->
        <div class="text-center mt-12 sm:mt-16">
            <a href="<?= base_url('program') ?>" 
               class="inline-flex items-center bg-[#017077] text-white font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl">
                <i class="fas fa-arrow-right mr-2 sm:mr-3"></i>
                <span>Lihat Semua Program</span>
            </a>
        </div>
    </div>
</section>

        
<section class="py-16 bg-gradient-to-r from-[#017077] to-[#005359]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Tertarik Bergabung?</h2>
                <p class="text-lg sm:text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Jangan lewatkan kesempatan untuk menjadi bagian dari keluarga besar Pesantren Baitul Quran AlKautsar
                </p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="<?= base_url('pendaftaran') ?>" class="bg-white text-teal-700 font-bold px-6 sm:px-8 py-3 rounded-lg hover:bg-teal-50 transition-colors duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </a>
                    <a href="<?= base_url('program') ?>" class="border-2 border-white text-white font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-white hover:text-[#017077] transition-colors duration-300 inline-flex items-center justify-center">
                        <i class="fas fa-book-open mr-2"></i>Lihat Program
                    </a>
                </div>
            </div>
</section>

<!-- Latest News Section -->
<section class="section-padding py-16 sm:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto container-padding px-4 sm:px-6">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#017077] mb-4">Berita Terbaru</h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                Informasi terkini seputar kegiatan dan perkembangan <br> Pesantren Baitul Qur'an Alkautsar
            </p>
        </div>
        
        <?php if (!empty($berita)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            <?php foreach ($berita as $item): ?>
            <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group">
                <!-- Image Container -->
                <div class="relative overflow-hidden">
                    <?php if (!empty($item['foto'])): ?>
                    <img src="<?= base_url('uploads/berita/'.$item['foto']) ?>" 
                         alt="<?= esc($item['judul']) ?>" 
                         class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                    <?php else: ?>
                    <div class="w-full h-48 sm:h-56 bg-gradient-to-br from-[#017077]/20 to-[#017077]/10 flex items-center justify-center">
                        <i class="fa fa-newspaper text-[#017077] text-4xl opacity-50"></i>
                    </div>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-[#017077] text-white px-3 py-1 rounded-full text-xs font-semibold shadow-lg">
                            Berita
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-[#017077] transition-colors duration-200 leading-tight">
                        <a href="<?= base_url('berita/'.$item['slug']) ?>" class="hover:underline">
                            <?= esc($item['judul']) ?>
                        </a>
                    </h3>
                    
                    <?php if (!empty($item['excerpt'])): ?>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                        <?= esc(strip_tags($item['excerpt'])) ?>
                    </p>
                    <?php else: ?>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                        <?= esc(strip_tags(mb_substr($item['isi'], 0, 120))) ?>...
                    </p>
                    <?php endif; ?>

                    <!-- Meta Info -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center space-x-3 text-xs text-gray-500">
                            <div class="flex items-center space-x-1">
                                <i class="fa fa-user text-[#017077] text-xs"></i>
                                <span><?= esc($item['penulis']) ?></span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fa fa-calendar text-[#017077] text-xs"></i>
                                <span><?= date('d M Y', strtotime($item['created_at'] ?? $item['tanggal'])) ?></span>
                            </div>
                        </div>
                        
                        <a href="<?= base_url('berita/'.$item['slug']) ?>" 
                           class="inline-flex items-center text-[#017077] hover:text-[#005359] font-semibold text-sm transition-colors duration-200 group/link">
                            Baca
                            <i class="fa fa-arrow-right ml-1 transform group-hover/link:translate-x-1 transition-transform duration-200 text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- View All News Button -->
        <div class="text-center mt-12 sm:mt-16">
            <a href="<?= base_url('berita') ?>" 
               class="inline-flex items-center border-2 border-[#017077] text-[#017077] font-bold px-6 sm:px-8 py-3 sm:py-4 rounded-lg hover:bg-[#017077] hover:text-white transition-colors duration-300">
                <i class="fas fa-newspaper mr-2 sm:mr-3"></i>
                <span>Lihat Semua Berita</span>
            </a>
        </div>
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-12 sm:py-16">
            <div class="bg-white rounded-2xl shadow-sm p-8 max-w-md mx-auto">
                <i class="fa fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Berita</h3>
                <p class="text-gray-500 mb-4">Saat ini belum ada berita yang dipublikasikan.</p>
                <a href="<?= base_url('admin/berita') ?>" 
                   class="inline-flex items-center text-[#017077] hover:text-[#005359] font-semibold text-sm">
                    <i class="fa fa-plus mr-2"></i>
                    <span>Tambah Berita</span>
                </a>
            </div>
        </div>
        <?php endif; ?>
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