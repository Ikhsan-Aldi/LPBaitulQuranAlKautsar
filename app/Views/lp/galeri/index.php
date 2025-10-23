<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-3.jpg') ?>" alt="Galeri" class="w-full h-full object-cover">
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
    <div class="max-w-7xl mx-auto px-6">
        <!-- Filter Tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-12 border-b border-gray-200 pb-4">
            <button class="tab-button px-6 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="semua">
                <i class="fas fa-th mr-2"></i>Semua
            </button>
            <button class="tab-button px-6 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="kegiatan">
                <i class="fas fa-calendar-alt mr-2"></i>Kegiatan
            </button>
            <button class="tab-button px-6 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="fasilitas">
                <i class="fas fa-building mr-2"></i>Fasilitas
            </button>
            <button class="tab-button px-6 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="prestasi">
                <i class="fas fa-trophy mr-2"></i>Prestasi
            </button>
        </div>

        <!-- Gallery Grid -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Semua Tab -->
            <div class="tab-content" id="semua-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if (!empty($galeri)): ?>
                        <?php foreach ($galeri as $item): ?>
                            <div class="group">
                                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    <?php if ($item['gambar']): ?>
                                        <div class="aspect-square bg-cover bg-center" style="background-image: url('<?= base_url('uploads/galeri/' . $item['gambar']) ?>');">
                                            <div class="w-full h-full bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-end">
                                                <div class="w-full p-4 bg-gradient-to-t from-black to-transparent text-white transform translate-y-full group-hover:translate-y-0 transition-all duration-300">
                                                    <h4 class="font-semibold text-sm"><?= esc($item['judul']) ?></h4>
                                                    <p class="text-xs opacity-90"><?= date('d M Y', strtotime($item['tanggal'])) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                            <i class="fas fa-image text-white text-4xl"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="p-4">
                                        <h4 class="font-semibold text-gray-800 text-sm"><?= esc($item['judul']) ?></h4>
                                        <?php if ($item['deskripsi']): ?>
                                            <p class="text-gray-600 text-xs mt-1"><?= esc(substr($item['deskripsi'], 0, 80)) ?>...</p>
                                        <?php endif; ?>
                                        <div class="flex items-center justify-between mt-2">
                                            <span class="text-xs text-gray-500"><?= date('d M Y', strtotime($item['tanggal'])) ?></span>
                                            <span class="badge bg-<?= $item['kategori'] == 'kegiatan' ? 'blue' : ($item['kategori'] == 'fasilitas' ? 'green' : 'yellow') ?>-100 text-<?= $item['kategori'] == 'kegiatan' ? 'blue' : ($item['kategori'] == 'fasilitas' ? 'green' : 'yellow') ?>-800 text-xs">
                                                <?= ucfirst($item['kategori']) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-center py-12">
                            <div class="bg-[#017077]/10 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-images text-[#017077] text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-700 mb-4">Belum Ada Galeri</h3>
                            <p class="text-gray-600 text-lg">
                                Galeri akan segera ditambahkan. Silakan pantau terus informasi terbaru dari kami.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Kegiatan Tab -->
            <div class="tab-content hidden" id="kegiatan-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-mountain text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Kegiatan Alam</h4>
                                <p class="text-gray-600 text-xs">Outdoor activities</p>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-book text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Pembelajaran</h4>
                                <p class="text-gray-600 text-xs">Learning activities</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-pray text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Spiritual</h4>
                                <p class="text-gray-600 text-xs">Religious activities</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fasilitas Tab -->
            <div class="tab-content hidden" id="fasilitas-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-home text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Asrama</h4>
                                <p class="text-gray-600 text-xs">Dormitory facilities</p>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-utensils text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Kantin</h4>
                                <p class="text-gray-600 text-xs">Cafeteria</p>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-dumbbell text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Lapangan Olahraga</h4>
                                <p class="text-gray-600 text-xs">Sports facilities</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prestasi Tab -->
            <div class="tab-content hidden" id="prestasi-tab">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-trophy text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Prestasi</h4>
                                <p class="text-gray-600 text-xs">Achievements</p>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-medal text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Penghargaan</h4>
                                <p class="text-gray-600 text-xs">Awards</p>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-square bg-gradient-to-br from-[#017077] to-[#005359] flex items-center justify-center">
                                <i class="fas fa-star text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-800 text-sm">Pencapaian</h4>
                                <p class="text-gray-600 text-xs">Accomplishments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Fungsi untuk switch tab
function switchTab(targetTab) {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    // Update URL hash tanpa reload page
    window.history.replaceState(null, null, `#${targetTab}`);
    
    // Update active tab button
    tabButtons.forEach(btn => {
        if (btn.getAttribute('data-tab') === targetTab) {
            btn.classList.add('active', 'bg-[#017077]', 'text-white', 'shadow-md');
            btn.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        } else {
            btn.classList.remove('active', 'bg-[#017077]', 'text-white', 'shadow-md');
            btn.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        }
    });
    
    // Update active tab content
    tabContents.forEach(content => {
        if (content.id === `${targetTab}-tab`) {
            content.classList.add('active');
            content.classList.remove('hidden');
        } else {
            content.classList.remove('active');
            content.classList.add('hidden');
        }
    });
}

// Fungsi untuk baca hash dari URL dan switch tab
function handleHashChange() {
    const hash = window.location.hash.replace('#', '');
    const validTabs = ['semua', 'kegiatan', 'fasilitas', 'prestasi'];
    
    if (validTabs.includes(hash)) {
        switchTab(hash);
    } else {
        // Default ke tab semua
        switchTab('semua');
    }
}

// Initialize tab system
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    
    // Setup tab click handlers
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            switchTab(targetTab);
        });
    });
    
    // Handle initial hash
    handleHashChange();
    
    // Handle hash changes from browser navigation
    window.addEventListener('hashchange', handleHashChange);
});

// Style untuk tab aktif
const style = document.createElement('style');
style.textContent = `
    .tab-button.active {
        position: relative;
    }
    .tab-button.active::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        right: 0;
        height: 3px;
        background: #017077;
        border-radius: 2px;
    }
    .tab-content {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>

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
