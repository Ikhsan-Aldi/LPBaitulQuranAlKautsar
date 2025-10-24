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
                            <div class="relative overflow-hidden bg-gray-200 transition-all duration-500 group-hover:shadow-2xl rounded-lg">
                                 <?php 
                                    $folder = ($item['kategori'] === 'kegiatan') 
                                        ? 'uploads/kegiatan/' 
                                        : 'uploads/galeri/';
                                    $imagePath = base_url($folder . $item['gambar']);
                                ?>

                                <div class="relative aspect-[16/9] overflow-hidden cursor-zoom-in"
                                    onclick="openLightbox(this)"
                                    data-image="<?= esc($imagePath) ?>"
                                    data-title="<?= esc($item['judul']) ?>"
                                    data-description="<?= esc($item['deskripsi'] ?: 'Tidak ada deskripsi') ?>"
                                    data-date="<?= isset($item['tanggal']) ? date('d M Y', strtotime($item['tanggal'])) : '-' ?>"
                                    data-category="<?= esc($item['kategori']) ?>">

                                    <?php if (!empty($item['gambar'])): ?>
                                        <img 
                                            src="<?= $imagePath ?>" 
                                            alt="<?= esc($item['judul']) ?>"
                                            class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:brightness-110"
                                            loading="lazy"
                                            onerror="this.parentElement.querySelector('.img-fallback').classList.remove('hidden'); this.remove();"
                                        >
                                        <!-- Fallback: jika gambar rusak -->
                                        <div class="img-fallback absolute inset-0 bg-gradient-to-br from-[#017077] to-[#005359] hidden flex flex-col items-center justify-center text-white">
                                            <i class="fas fa-image text-4xl mb-3 opacity-80"></i>
                                            <span class="text-sm">Gambar tidak tersedia</span>
                                        </div>
                                    <?php else: ?>
                                        <!-- Jika memang tidak ada gambar -->
                                        <div class="w-full h-full bg-gradient-to-br from-[#017077] to-[#005359] flex flex-col items-center justify-center text-white">
                                            <i class="fas fa-image text-4xl mb-3 opacity-80"></i>
                                            <span class="text-sm">Tidak ada gambar</span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <!-- Main Title (Selalu terlihat) -->
                                    <div class="absolute bottom-0 left-0 right-0 p-4 pointer-events-none">
                                        <div class="text-white group-hover:opacity-0 transition-opacity duration-300">
                                        <h3 class="font-bold text-lg line-clamp-1 drop-shadow-lg"><?= esc($item['judul']) ?></h3>
                                        </div>
                                    </div>
                                    
                                    <!-- Gradient Overlay (Selalu terlihat - subtle) -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent pointer-events-none"></div>
                                    
                                    <!-- Hover Info Panel (Muncul saat hover) -->
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-500 flex items-end pointer-events-none">
                                        <div class="w-full p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-all duration-500">
                                            <h3 class="font-bold text-lg mb-2 line-clamp-1"><?= esc($item['judul']) ?></h3>
                                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">
                                                <?php if ($item['deskripsi']): ?>
                                                    <p class="text-sm line-clamp-2 flex-1 leading-relaxed"><?= esc($item['deskripsi']) ?></p>
                                                <?php endif; ?>
                                                <div class="flex flex-col sm:items-end gap-2 shrink-0">
                                                    <span class="flex items-center bg-white/20 px-2 py-1 rounded text-xs">
                                                        <i class="fas fa-calendar-alt mr-1"></i>
                                                        <?= date('d M Y', strtotime($item['tanggal'])) ?>
                                                    </span>
                                                    <span class="flex items-center bg-white/20 px-2 py-1 rounded text-xs capitalize">
                                                        <i class="fas fa-tag mr-1"></i>
                                                        <?= $item['kategori'] ?>
                                                    </span>
                                                </div>
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

<!-- Lightbox HTML Structure -->
<div id="lightbox" class="fixed inset-0 bg-black/75 z-[9999] hidden items-center justify-center p-4">
    <!-- Overlay click area untuk close -->
    <div class="absolute inset-0" onclick="closeLightbox()"></div>
    
    <div class="relative flex items-center justify-center w-full h-full pointer-events-none">
        <!-- Close Button -->
        <button onclick="closeLightbox()" class="absolute top-4 right-4 z-30 bg-black/80 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-black transition-all duration-200 border border-white/30 pointer-events-auto">
            <i class="fas fa-times text-lg"></i>
        </button>
        
        <!-- Navigation Buttons -->
        <button onclick="changeImage(-1)" class="absolute left-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/80 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-black transition-all duration-200 border border-white/30 pointer-events-auto">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button onclick="changeImage(1)" class="absolute right-4 top-1/2 transform -translate-y-1/2 z-30 bg-black/80 text-white w-12 h-12 rounded-full flex items-center justify-center hover:bg-black transition-all duration-200 border border-white/30 pointer-events-auto">
            <i class="fas fa-chevron-right"></i>
        </button>
        
        <!-- Image Container - KEMBALI KE STRUKTUR SEBELUMNYA -->
        <div class="relative max-w-[85vw] max-h-[80vh] flex items-center justify-center pointer-events-auto">
            <div class="relative bg-transparent rounded-lg overflow-hidden shadow-2xl">
                <img id="lightbox-image" class="max-w-full max-h-full object-contain" src="" alt="">
                
                <!-- Text Overlay yang menempel di gambar -->
                <div id="lightbox-overlay" class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 via-black/60 to-transparent p-4 transition-all duration-300">
                    <div class="text-white">
                        <h3 id="lightbox-title" class="text-xl font-bold mb-2"></h3>
                        <p id="lightbox-description" class="text-white/90 mb-3 text-base leading-relaxed"></p>
                        <div class="flex flex-wrap gap-2 items-center">
                            <span id="lightbox-date" class="flex items-center bg-white/20 px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                                <i class="fas fa-calendar-alt mr-2"></i>
                            </span>
                            <span id="lightbox-category" class="flex items-center bg-white/20 px-3 py-1 rounded-full text-sm capitalize backdrop-blur-sm">
                                <i class="fas fa-tag mr-2"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Variabel global untuk lightbox
let currentImageIndex = 0;
let images = [];

// Fungsi untuk menurunkan z-index navbar
function lowerNavbarZIndex() {
    const navbar = document.getElementById('navbar');
    if (navbar) {
        navbar.style.zIndex = '0'; // Turunkan z-index navbar ke 0 (default)
    }
}

// Fungsi untuk mengembalikan z-index navbar
function restoreNavbarZIndex() {
    const navbar = document.getElementById('navbar');
    if (navbar) {
        navbar.style.zIndex = '1000'; // Kembalikan ke 1000 (sesuai CSS layout)
    }
}

// Kumpulkan semua container gambar yang bisa di-lightbox
function collectImages() {
    images = [];
    document.querySelectorAll('.gallery-item .relative.aspect-\\[16\\/9\\]').forEach((container, index) => {
        // Skip container yang tidak punya gambar valid
        const img = container.querySelector('img');
        if (!img || img.style.display === 'none') return;
        
        images.push({
            src: container.getAttribute('data-image'),
            title: container.getAttribute('data-title'),
            description: container.getAttribute('data-description'),
            date: container.getAttribute('data-date'),
            category: container.getAttribute('data-category'),
            element: container
        });
    });
}

// Buka lightbox
function openLightbox(containerElement) {
    collectImages();
    
    // Cari index container yang diklik
    const containers = Array.from(document.querySelectorAll('.gallery-item .relative.aspect-\\[16\\/9\\]'));
    currentImageIndex = containers.indexOf(containerElement);
    
    if (currentImageIndex === -1) return;
    
    // Turunkan z-index navbar sebelum menampilkan lightbox
    lowerNavbarZIndex();
    
    showImage(currentImageIndex);
    document.getElementById('lightbox').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

// Tutup lightbox
function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.body.style.overflow = 'auto';
    
    // Kembalikan z-index navbar setelah lightbox ditutup
    restoreNavbarZIndex();
}

// Ganti gambar (next/prev)
function changeImage(direction) {
    currentImageIndex += direction;
    
    if (currentImageIndex < 0) {
        currentImageIndex = images.length - 1;
    } else if (currentImageIndex >= images.length) {
        currentImageIndex = 0;
    }
    
    showImage(currentImageIndex);
}

// Tampilkan gambar di lightbox
function showImage(index) {
    const image = images[index];
    if (!image) return;
    
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxOverlay = document.getElementById('lightbox-overlay');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxDescription = document.getElementById('lightbox-description');
    const lightboxDate = document.getElementById('lightbox-date');
    const lightboxCategory = document.getElementById('lightbox-category');
    
    // Reset opacity untuk animasi
    lightboxImage.style.opacity = '0';
    lightboxOverlay.style.opacity = '0';
    
    const img = new Image();
    img.onload = function() {
        // Set image source
        lightboxImage.src = image.src;
        lightboxImage.alt = image.title;
        
        // Set text content
        lightboxTitle.textContent = image.title;
        lightboxDescription.textContent = image.description;
        lightboxDate.innerHTML = `<i class="fas fa-calendar-alt mr-2"></i>${image.date}`;
        lightboxCategory.innerHTML = `<i class="fas fa-tag mr-2"></i>${image.category}`;
        
        // Animasi fade in
        setTimeout(() => {
            lightboxImage.style.opacity = '1';
            lightboxOverlay.style.opacity = '1';
        }, 50);
        
        // Sesuaikan overlay berdasarkan ukuran gambar
        adjustOverlayForImage(img);
    };
    img.onerror = function() {
        console.error('Gagal memuat gambar:', image.src);
    };
    img.src = image.src;
}

// Sesuaikan overlay berdasarkan ukuran gambar
// Sesuaikan overlay berdasarkan ukuran gambar
function adjustOverlayForImage(img) {
    const lightboxOverlay = document.getElementById('lightbox-overlay');
    
    // Jika gambar sangat kecil, atur overlay agar tidak terlalu dominan
    if (img.naturalWidth < 400 || img.naturalHeight < 300) {
        lightboxOverlay.classList.add('p-3');
        lightboxOverlay.classList.remove('p-4');
        document.getElementById('lightbox-title').classList.add('text-lg');
        document.getElementById('lightbox-title').classList.remove('text-xl');
        document.getElementById('lightbox-description').classList.add('text-sm');
        document.getElementById('lightbox-description').classList.remove('text-base');
    } else {
        lightboxOverlay.classList.add('p-4');
        lightboxOverlay.classList.remove('p-3');
        document.getElementById('lightbox-title').classList.add('text-xl');
        document.getElementById('lightbox-title').classList.remove('text-lg');
        document.getElementById('lightbox-description').classList.add('text-base');
        document.getElementById('lightbox-description').classList.remove('text-sm');
    }

}

// Event listeners untuk keyboard
document.addEventListener('keydown', function(e) {
    const lightbox = document.getElementById('lightbox');
    if (lightbox.classList.contains('hidden')) return;
    
    switch(e.key) {
        case 'Escape':
            closeLightbox();
            break;
        case 'ArrowLeft':
            changeImage(-1);
            break;
        case 'ArrowRight':
            changeImage(1);
            break;
    }
});

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    function filterGallery(category) {
        galleryItems.forEach(item => {
            if (category === 'semua' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 50);
            } else {
                item.style.display = 'none';
            }
        });
        
        window.history.replaceState(null, null, `#${category}`);
    }
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            tabButtons.forEach(btn => {
                if (btn === this) {
                    btn.classList.add('bg-[#017077]', 'text-white', 'shadow-md', 'hover:bg-[#005359]');
                    btn.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
                } else {
                    btn.classList.remove('bg-[#017077]', 'text-white', 'shadow-md', 'hover:bg-[#005359]');
                    btn.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
                }
            });
            
            filterGallery(category);
        });
    });

    const initialHash = window.location.hash.replace('#', '');
    const validCategories = ['semua', 'kegiatan', 'fasilitas', 'prestasi'];
    
    if (validCategories.includes(initialHash)) {
        const initialTab = document.querySelector(`.tab-btn[data-category="${initialHash}"]`);
        if (initialTab) {
            initialTab.click();
        }
    } else {
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

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Smooth animations */
.gallery-item {
    transition: all 0.4s ease;
}

/* Enhanced hover effects */
.gallery-item:hover {
    transform: translateY(-4px);
}

/* Improved image hover effects */
.group:hover img {
    filter: brightness(1.1) contrast(1.05);
}

/* Drop shadow for better text readability */
.drop-shadow-lg {
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.5));
}

/* Better text contrast */
.text-white {
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.tab-btn.active {
    background-color: #017077;
    color: white;
}

.tab-btn.active:hover {
    background-color: #005359;
}

/* Lightbox Styles - FIXED */
#lightbox {
    backdrop-filter: blur(2px);
    animation: fadeIn 0.3s ease;
    z-index: 9999;
}

#lightbox-image {
    transition: opacity 0.3s ease;
    border-radius: 8px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    max-height: 90vh; /* MAX HEIGHT DI SINI */
    width: auto;
}

#lightbox-overlay {
    transition: opacity 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
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

/* Mobile responsive */
@media (max-width: 768px) {
    #lightbox .max-w-\[85vw\] {
        max-width: 92vw;
    }
    
    #lightbox .max-h-\[80vh\] {
        max-height: 85vh;
    }
    
    #lightbox-image {
        max-height: 65vh; /* Lebih kecil di mobile */
    }
    
    #lightbox .absolute.left-4,
    #lightbox .absolute.right-4 {
        display: none;
    }
    
    #lightbox .absolute.top-4.right-4 {
        top: 8px;
        right: 8px;
        width: 36px;
        height: 36px;
    }
    
    .text-xl {
        font-size: 1.1rem;
    }
    
    .text-base {
        font-size: 0.85rem;
    }
    
    #lightbox-overlay {
        padding: 0.75rem !important;
    }
}

/* Touch friendly untuk mobile */
@media (hover: none) and (pointer: coarse) {
    #lightbox .absolute.left-4,
    #lightbox .absolute.right-4 {
        display: flex !important;
        width: 44px;
        height: 44px;
    }
}
</style>
<?= $this->endSection() ?>