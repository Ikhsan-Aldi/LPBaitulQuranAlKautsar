<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Galeri" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 arabic-font">
                Galeri
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-8 leading-relaxed">
                Dokumentasi kegiatan dan kehidupan di Pondok Pesantren Baitul Quran Al-Kautsar
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <!-- Filter Tabs -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button class="tab-btn px-6 py-3 rounded-lg bg-[#017077] text-white font-semibold text-sm transition-all duration-300 hover:bg-[#005359] shadow-md" data-category="semua">
                <i class="fas fa-th mr-2"></i>Semua
            </button>
            <button class="tab-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 hover:bg-gray-200" data-category="kegiatan">
                <i class="fas fa-calendar-alt mr-2"></i>Kegiatan
            </button>
            <button class="tab-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 hover:bg-gray-200" data-category="fasilitas">
                <i class="fas fa-building mr-2"></i>Fasilitas
            </button>
            <button class="tab-btn px-6 py-3 rounded-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 hover:bg-gray-200" data-category="prestasi">
                <i class="fas fa-trophy mr-2"></i>Prestasi
            </button>
        </div>

        <!-- Gallery Grid -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <?php if (!empty($galeri)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8" id="gallery-grid">
                    <?php foreach ($galeri as $item): ?>
                        <div class="gallery-item group" data-category="<?= $item['kategori'] ?>">
                            <div class="relative overflow-hidden bg-gray-200 transition-all duration-500 group-hover:shadow-2xl">
                                <!-- Image Container -->
                                <div class="relative aspect-[16/9] overflow-hidden">
                                    <?php if ($item['gambar'] && file_exists(ROOTPATH . 'public/uploads/galeri/' . $item['gambar'])): ?>
                                        <img 
                                            src="<?= base_url('uploads/galeri/' . $item['gambar']) ?>" 
                                            alt="<?= esc($item['judul']) ?>"
                                            class="w-full h-full object-cover transition-all duration-700 group-hover:scale-105"
                                            loading="lazy"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                        >
                                        <!-- Fallback jika gambar error -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-[#017077] to-[#005359] hidden flex-col items-center justify-center text-white">
                                            <i class="fas fa-image text-4xl mb-3 opacity-80"></i>
                                            <span class="text-sm">Gambar tidak tersedia</span>
                                        </div>
                                    <?php else: ?>
                                        <div class="w-full h-full bg-gradient-to-br from-[#017077] to-[#005359] flex flex-col items-center justify-center text-white">
                                            <i class="fas fa-image text-4xl mb-3 opacity-80"></i>
                                            <span class="text-sm">Tidak ada gambar</span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <!-- Default Overlay (Selalu terlihat - tipis) -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent flex items-end">
                                        <div class="w-full p-6 text-white transform transition-all duration-500 group-hover:translate-y-2">
                                            <h3 class="font-bold text-lg mb-1 line-clamp-1"><?= esc($item['judul']) ?></h3>
                                        </div>
                                    </div>
                                    
                                    <!-- Hover Overlay (Muncul saat hover) -->
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-500 flex items-center justify-center">
                                        <div class="text-center text-white transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 p-6">
                                            <?php if ($item['deskripsi']): ?>
                                                <p class="text-sm mb-3 line-clamp-3 leading-relaxed"><?= esc($item['deskripsi']) ?></p>
                                            <?php endif; ?>
                                            <div class="flex items-center justify-center space-x-4 text-xs">
                                                <span class="flex items-center">
                                                    <i class="fas fa-calendar-alt mr-1"></i>
                                                    <?= date('d M Y', strtotime($item['tanggal'])) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-20">
                    <div class="bg-[#017077]/10 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-images text-[#017077] text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-4">Belum Ada Galeri</h3>
                    <p class="text-gray-600 text-lg max-w-md mx-auto">
                        Galeri akan segera ditambahkan. Silakan pantau terus informasi terbaru dari kami.
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    // Fungsi untuk filter galeri
    function filterGallery(category) {
        let visibleCount = 0;
        
        galleryItems.forEach(item => {
            if (category === 'semua' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
                visibleCount++;
                
                // Trigger animation
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 50);
            } else {
                item.style.display = 'none';
            }
        });
        
        // Update URL hash
        window.history.replaceState(null, null, `#${category}`);
    }
    
    // Setup tab click handlers
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active tab
            tabButtons.forEach(btn => {
                if (btn === this) {
                    btn.classList.add('bg-[#017077]', 'text-white', 'shadow-md');
                    btn.classList.remove('bg-gray-100', 'text-gray-600');
                } else {
                    btn.classList.remove('bg-[#017077]', 'text-white', 'shadow-md');
                    btn.classList.add('bg-gray-100', 'text-gray-600');
                }
            });
            
            // Filter gallery
            filterGallery(category);
        });
    });
    
    // Handle initial hash from URL
    const initialHash = window.location.hash.replace('#', '');
    const validCategories = ['semua', 'kegiatan', 'fasilitas', 'prestasi'];
    
    if (validCategories.includes(initialHash)) {
        // Find and click the corresponding tab button
        const initialTab = document.querySelector(`.tab-btn[data-category="${initialHash}"]`);
        if (initialTab) {
            initialTab.click();
        }
    } else {
        // Default to semua tab
        filterGallery('semua');
    }
    
    // Image error handling
    document.addEventListener('error', function(e) {
        if (e.target.tagName === 'IMG' && e.target.closest('.gallery-item')) {
            const img = e.target;
            const fallback = img.nextElementSibling;
            img.style.display = 'none';
            fallback.style.display = 'flex';
        }
    }, true);
});
</script>

<style>
.arabic-font {
    font-family: 'Traditional Arabic', 'Scheherazade New', 'Lateef', serif;
}

.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Smooth animations */
.gallery-item {
    transition: all 0.4s ease;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Enhanced hover effects */
.gallery-item:hover {
    transform: translateY(-4px);
}
</style>
<?= $this->endSection() ?>