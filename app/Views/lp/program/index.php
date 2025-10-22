<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative min-h-[40vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Program Pesantren" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-6 py-20 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 arabic-font">
                Program Pesantren
            </h1>
            <p class="text-xl text-white/90 leading-relaxed">
                Program terpadu untuk membentuk generasi Qur'ani yang berakhlak mulia dan berprestasi
            </p>
        </div>
    </div>
</section>

<!-- Program Unggulan Section -->
<section class="py-4 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
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

<!-- Detail Program Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Tab Navigation -->
        <div class="flex flex-wrap justify-center gap-2">
            <button class="tab-button w-48 px-6 py-4 rounded-lg bg-white text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-50 text-center border border-gray-200 shadow-sm" data-tab="kegiatan-harian">
                <i class="fas fa-clock mr-3"></i>Kegiatan Harian
            </button>
            <button class="tab-button w-48 px-6 py-4 rounded-lg bg-white text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-50 text-center border border-gray-200 shadow-sm" data-tab="ekstrakurikuler">
                <i class="fas fa-futbol mr-3"></i>Ekstrakurikuler
            </button>
        </div>

        <!-- Tab Content Container -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            
            <!-- Kegiatan Harian Tab -->
            <div class="tab-content p-8 md:p-12" id="kegiatan-harian-tab">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-10">
                        <p class="text-[#017077] max-w-2xl mx-auto text-lg">
                            Jadwal terstruktur 24 jam untuk membentuk disiplin, karakter, dan spiritualitas santri
                        </p>
                    </div>

                    <!-- Daily Schedule Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Morning Activities -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-bold text-[#017077] mb-4 flex items-center">
                                <i class="fas fa-sun mr-2"></i>Pagi Hari
                            </h3>
                            <div class="space-y-3">
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">03.00 - 03.30</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Bangun tidur & persiapan tahajjud</p>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">03.30 - 04.30</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Tahajjud, Sholat Shubuh berjama'ah</p>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">04.30 - 06.00</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Halaqah Tahfidz I</p>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">07.30 - 11.30</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Kegiatan Belajar Mengajar Formal</p>
                                </div>
                            </div>
                        </div>

                        <!-- Afternoon Activities -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-bold text-[#017077] mb-4 flex items-center">
                                <i class="fas fa-cloud-sun mr-2"></i>Siang & Sore
                            </h3>
                            <div class="space-y-3">
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">11.30 - 13.00</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Sholat Dhuhur, Muroja'ah Tahfidz</p>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">13.00 - 14.45</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Makan siang, Istirahat Siang</p>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">15.30 - 17.00</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Halaqoh Tahfidz II / Ekstrakurikuler</p>
                                </div>
                            </div>
                        </div>

                        <!-- Evening Activities -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-bold text-[#017077] mb-4 flex items-center">
                                <i class="fas fa-moon mr-2"></i>Malam Hari
                            </h3>
                            <div class="space-y-3">
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">17.30 - 18.45</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Sholat Maghrib, Kajian Kitab</p>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">18.45 - 20.00</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Sholat Isya', Makan malam</p>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">20.00 - 21.30</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Belajar malam / Halaqah Tahfidz</p>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-sm font-semibold text-[#017077]">21.30 - 03.00</span>
                                    </div>
                                    <p class="text-gray-700 text-sm">Istirahat malam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ekstrakurikuler Tab -->
            <div class="tab-content hidden p-8 md:p-12" id="ekstrakurikuler-tab">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-10">
                        <p class="text-[#017077] max-w-2xl mx-auto text-lg">
                            Berbagai kegiatan untuk mengembangkan bakat, minat, dan life skills santri
                        </p>
                    </div>

                    <!-- Ekstrakurikuler Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-4">
                        <?php 
                        // Sample data - replace with actual data from model
                        $ekstrakurikuler = [
                            ['name' => 'Berenang', 'icon' => 'swimming-pool'],
                            ['name' => 'Memanah', 'icon' => 'bullseye'],
                            ['name' => 'Berkuda', 'icon' => 'horse'],
                            ['name' => 'Olimpiade', 'icon' => 'trophy'],
                            ['name' => 'Entrepreneur', 'icon' => 'chart-line'],
                            ['name' => 'Beladiri', 'icon' => 'fist-raised'],
                            ['name' => 'Pidato 3 Bahasa', 'icon' => 'microphone'],
                            ['name' => 'Jurnalistik', 'icon' => 'newspaper'],
                            ['name' => 'SAPALA', 'icon' => 'mountain'],
                            ['name' => 'Robotik', 'icon' => 'robot'],
                            ['name' => 'Programming', 'icon' => 'code'],
                            ['name' => 'Kaligrafi', 'icon' => 'pen-fancy'],
                            ['name' => 'Marawis', 'icon' => 'music'],
                            ['name' => 'Teater', 'icon' => 'theater-masks'],
                            ['name' => 'Fotografi', 'icon' => 'camera']
                        ];
                        ?>
                        
                        <?php foreach ($ekstrakurikuler as $item): ?>
                        <div class="group text-center">
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 hover:border-[#017077]/30">
                                <div class="bg-[#017077]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-[#017077]/20 transition-colors duration-300">
                                    <i class="fas fa-<?= $item['icon'] ?> text-[#017077] text-lg"></i>
                                </div>
                                <h4 class="font-semibold text-gray-800 text-sm group-hover:text-[#017077] transition-colors duration-300">
                                    <?= $item['name'] ?>
                                </h4>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Benefits Section -->
                    <div class="mt-12 bg-gradient-to-r from-[#017077] to-[#005359] rounded-2xl p-8 text-white">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold mb-4">Manfaat Ekstrakurikuler</h3>
                            <p class="text-white/80 max-w-2xl mx-auto">
                                Mengembangkan potensi santri secara holistik melalui berbagai kegiatan positif
                            </p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <div class="bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-brain text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-lg mb-2">Pengembangan Bakat</h4>
                                <p class="text-white/80 text-sm">Mengasah talenta dan minat santri</p>
                            </div>
                            
                            <div class="text-center">
                                <div class="bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-users text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-lg mb-2">Sosialisasi</h4>
                                <p class="text-white/80 text-sm">Membangun jaringan dan kerja sama</p>
                            </div>
                            
                            <div class="text-center">
                                <div class="bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-trophy text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-lg mb-2">Prestasi</h4>
                                <p class="text-white/80 text-sm">Mencapai prestasi di berbagai bidang</p>
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
            btn.classList.add('bg-[#017077]', 'text-white', 'shadow-md');
            btn.classList.remove('bg-white', 'text-gray-600', 'hover:bg-gray-50', 'border-gray-200');
        } else {
            btn.classList.remove('bg-[#017077]', 'text-white', 'shadow-md');
            btn.classList.add('bg-white', 'text-gray-600', 'hover:bg-gray-50', 'border-gray-200');
        }
    });
    
    // Update active tab content
    tabContents.forEach(content => {
        if (content.id === `${targetTab}-tab`) {
            content.classList.remove('hidden');
            // Trigger animation
            content.style.animation = 'none';
            setTimeout(() => {
                content.style.animation = 'fadeIn 0.3s ease-in-out';
            }, 10);
        } else {
            content.classList.add('hidden');
        }
    });
}

// Fungsi untuk baca hash dari URL dan switch tab
function handleHashChange() {
    const hash = window.location.hash.replace('#', '');
    const validTabs = ['kegiatan-harian', 'ekstrakurikuler'];
    
    if (validTabs.includes(hash)) {
        switchTab(hash);
    } else {
        // Default ke tab kegiatan harian
        switchTab('kegiatan-harian');
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

// Add CSS for animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { 
            opacity: 0; 
            transform: translateY(10px); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0); 
        }
    }
    .tab-content {
        animation: fadeIn 0.3s ease-in-out;
    }
    .tab-button {
        transition: all 0.3s ease;
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

/* Smooth hover effects */
.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}
</style>
<?= $this->endSection() ?>