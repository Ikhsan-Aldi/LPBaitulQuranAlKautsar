<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Loading Screen -->
<div id="loadingScreen" class="fixed inset-0 bg-white z-50 flex items-center justify-center transition-opacity duration-500">
    <div class="text-center">
        <div class="w-16 h-16 sm:w-20 sm:h-20 border-4 border-[#017077] border-t-transparent rounded-full animate-spin mx-auto mb-3 sm:mb-4"></div>
        <p class="text-gray-600 font-medium text-sm sm:text-base">Memuat Halaman...</p>
    </div>
</div>

<!-- Hero Section -->
<section class="relative min-h-[40vh] sm:min-h-[50vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <!-- Background -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/tentang-hero.jpg') ?>" alt="Tentang Kami" class="w-full h-full object-cover">
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16 sm:py-20 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 sm:mb-4 arabic-font">
                Tentang Kami
            </h1>
            <p class="text-base sm:text-lg md:text-xl text-white/90 leading-relaxed mb-4 sm:mb-6">
                Mengenal lebih dekat visi, misi, dan perjalanan Pesantren Baitul Qur'an Alkautsar dalam membentuk generasi Qur'ani yang berakhlak mulia.
            </p>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 py-8 sm:py-12" style="display: none;" id="mainContent">
    <!-- Tab Navigation -->
    <div class="flex flex-wrap justify-center gap-1 sm:gap-2 border-b border-gray-200 mb-4 sm:mb-6">
        <button class="tab-button w-28 sm:w-32 px-2 sm:px-3 py-2 sm:py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-xs sm:text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="tentang">
            <i class="fas fa-info-circle mr-1 sm:mr-2 text-xs sm:text-sm"></i>Tentang
        </button>
        <button class="tab-button w-28 sm:w-32 px-2 sm:px-3 py-2 sm:py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-xs sm:text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="visi-misi">
            <i class="fas fa-bullseye mr-1 sm:mr-2 text-xs sm:text-sm"></i>Visi Misi
        </button>
        <button class="tab-button w-28 sm:w-32 px-2 sm:px-3 py-2 sm:py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-xs sm:text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="sejarah">
            <i class="fas fa-history mr-1 sm:mr-2 text-xs sm:text-sm"></i>Sejarah
        </button>
        <button class="tab-button w-28 sm:w-32 px-2 sm:px-3 py-2 sm:py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-xs sm:text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="struktur">
            <i class="fas fa-sitemap mr-1 sm:mr-2 text-xs sm:text-sm"></i>Struktur
        </button>
    </div>

    <!-- Tab Content Container -->
    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl outline-none" style="min-height: 400px;">
        
        <!-- Tentang Kami Tab -->
        <div class="tab-content p-4 sm:p-6 md:p-8 lg:p-12" id="tentang-tab">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-6 sm:mb-8 md:mb-10">
                    <!-- Logo HANYA di tab Tentang -->
                    <div class="inline-flex items-center justify-center w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 bg-white mb-4 sm:mb-6 overflow-hidden shadow-sm mx-auto">
                        <img src="<?= base_url('assets/img/logo.png') ?>" 
                            alt="Logo Baitul Qur'an AlKautsar" 
                            class="w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 object-contain">
                    </div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#017077] mb-2 sm:mb-4">Tentang Kami</h2>
                    <div class="w-16 sm:w-20 h-1 bg-[#017077] mx-auto mb-4 sm:mb-6"></div>
                </div>
                
                <div class="bg-gray-50 rounded-lg sm:rounded-xl p-4 sm:p-6 md:p-8 border-l-4 border-[#017077] mb-6 sm:mb-8">
                    <p class="text-gray-700 text-sm sm:text-base md:text-lg leading-relaxed text-justify">
                        Pesantren Baitul Qur'an AlKautsar merupakan lembaga pendidikan dibawah naungan yayasan
                        AlKautsar Madiun, yang memadukan pendidikan formal dalam bentuk SMP dan SMA dengan non
                        formal dalam bentuk Dirosah Islamiyah. Pembinaan 24 jam yang dikemas dalam sistem
                        Islamic Boarding School (Pesantren Modern).
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    <div class="text-center p-4 sm:p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                        <div class="bg-[#017077]/10 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i class="fas fa-school text-[#017077] text-lg sm:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-1 sm:mb-2 text-sm sm:text-base">SMP & SMA</h4>
                        <p class="text-gray-600 text-xs sm:text-sm">Pendidikan Formal Terpadu</p>
                    </div>

                    <div class="text-center p-4 sm:p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                        <div class="bg-[#017077]/10 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i class="fas fa-quran text-[#017077] text-lg sm:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-1 sm:mb-2 text-sm sm:text-base">Dirosah Islamiyah</h4>
                        <p class="text-gray-600 text-xs sm:text-sm">Pendidikan Non Formal</p>
                    </div>

                    <div class="text-center p-4 sm:p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                        <div class="bg-[#017077]/10 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i class="fas fa-home text-[#017077] text-lg sm:text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-1 sm:mb-2 text-sm sm:text-base">24 Jam</h4>
                        <p class="text-gray-600 text-xs sm:text-sm">Pembinaan Intensive</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi Tab -->
        <div class="tab-content hidden p-4 sm:p-6 md:p-8 lg:p-12" id="visi-misi-tab">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-6 sm:mb-8 md:mb-10">
                    <!-- Ikon untuk tab lainnya -->
                    <div class="inline-flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-[#017077] rounded-full mb-4 sm:mb-6">
                        <i class="fas fa-bullseye text-white text-lg sm:text-xl md:text-2xl"></i>
                    </div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#017077] mb-2 sm:mb-4">Visi & Misi</h2>
                    <div class="w-16 sm:w-20 h-1 bg-[#017077] mx-auto mb-4 sm:mb-6"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">
                        Landasan dan tujuan kami dalam membentuk generasi Qur'ani
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
                    <!-- Visi Card -->
                    <div class="group bg-white rounded-lg sm:rounded-xl shadow-lg border border-gray-200 p-4 sm:p-6 md:p-8 hover:shadow-xl transition-all duration-500 hover:border-[#017077]/30">
                        <div class="flex items-center mb-4 sm:mb-6">
                            <div class="bg-[#017077] text-white p-2 sm:p-3 rounded-lg mr-3 sm:mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-eye text-sm sm:text-base"></i>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-[#017077]">Visi Kami</h3>
                        </div>
                        <div class="bg-[#017077]/5 rounded-lg p-4 sm:p-6 border-l-4 border-[#017077]">
                            <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg">
                                "Membentuk Generasi Cerdas yang Mandiri dan berkarakter dengan Al-Qur'an"
                            </p>
                        </div>
                    </div>

                    <!-- Misi Card -->
                    <div class="group bg-white rounded-lg sm:rounded-xl shadow-lg border border-gray-200 p-4 sm:p-6 md:p-8 hover:shadow-xl transition-all duration-500 hover:border-[#017077]/30">
                        <div class="flex items-center mb-4 sm:mb-6">
                            <div class="bg-[#017077] text-white p-2 sm:p-3 rounded-lg mr-3 sm:mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-list-check text-sm sm:text-base"></i>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-[#017077]">Misi Kami</h3>
                        </div>
                        <div class="space-y-3 sm:space-y-4">
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-0.5 sm:mt-1 mr-2 sm:mr-3 text-xs sm:text-sm"></i>
                                <span class="text-gray-700 text-sm sm:text-base">Menjadikan Al-Qur'an dan Sunnah sebagai landasan hidup</span>
                            </div>
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-0.5 sm:mt-1 mr-2 sm:mr-3 text-xs sm:text-sm"></i>
                                <span class="text-gray-700 text-sm sm:text-base">Membentuk santri beraqidah ahlussunnah wal jama'ah</span>
                            </div>
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-0.5 sm:mt-1 mr-2 sm:mr-3 text-xs sm:text-sm"></i>
                                <span class="text-gray-700 text-sm sm:text-base">Membentuk santri berakhlak Mulia dalam kehidupan sehari-hari</span>
                            </div>
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-0.5 sm:mt-1 mr-2 sm:mr-3 text-xs sm:text-sm"></i>
                                <span class="text-gray-700 text-sm sm:text-base">Membentuk lifeskill kemandirian dan kemasyarakatan santri</span>
                            </div>
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-0.5 sm:mt-1 mr-2 sm:mr-3 text-xs sm:text-sm"></i>
                                <span class="text-gray-700 text-sm sm:text-base">Membekali santri ilmu entrepreneur</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sejarah Tab -->
        <div class="tab-content hidden p-4 sm:p-6 md:p-8 lg:p-12" id="sejarah-tab">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-6 sm:mb-8 md:mb-10">
                    <!-- Ikon untuk tab lainnya -->
                    <div class="inline-flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-[#017077] rounded-full mb-4 sm:mb-6">
                        <i class="fas fa-history text-white text-lg sm:text-xl md:text-2xl"></i>
                    </div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#017077] mb-2 sm:mb-4">Sejarah Berdiri</h2>
                    <div class="w-16 sm:w-20 h-1 bg-[#017077] mx-auto mb-4 sm:mb-6"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8 items-center">
                    <!-- Text Content -->
                    <div class="space-y-4 sm:space-y-6">
                        <div class="bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 border border-gray-200 shadow-sm">
                            <p class="text-gray-700 leading-relaxed mb-3 sm:mb-4 text-sm sm:text-base">
                                Pesantren Baitul Quran AlKautsar didirikan pada tahun 2010 dengan visi untuk 
                                menjadi pusat pendidikan Islam yang mengintegrasikan ilmu agama 
                                dan ilmu umum secara seimbang.
                            </p>
                            <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                                Sejak berdiri, kami telah berhasil mencetak ratusan hafizh dan hafizhah 
                                yang tidak hanya menguasai Al-Qur'an tetapi juga memiliki akhlak yang mulia 
                                dan berkontribusi positif bagi masyarakat.
                            </p>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 gap-3 sm:gap-4">
                            <div class="bg-[#017077]/5 rounded-lg p-3 sm:p-4 text-center border border-[#017077]/10">
                                <div class="text-xl sm:text-2xl font-bold text-[#017077]">14+</div>
                                <div class="text-gray-600 text-xs sm:text-sm">Tahun Pengalaman</div>
                            </div>
                            <div class="bg-[#017077]/5 rounded-lg p-3 sm:p-4 text-center border border-[#017077]/10">
                                <div class="text-xl sm:text-2xl font-bold text-[#017077]">500+</div>
                                <div class="text-gray-600 text-xs sm:text-sm">Santri Berhasil</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Element -->
                    <div class="bg-gradient-to-br from-[#017077] to-[#005359] rounded-lg sm:rounded-xl p-4 sm:p-6 md:p-8 text-white text-center">
                        <div class="bg-white/20 w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                            <i class="fas fa-mosque text-white text-xl sm:text-2xl md:text-3xl"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-1 sm:mb-2">Pesantren Modern</h3>
                        <p class="text-white/80 text-xs sm:text-sm">Islamic Boarding School</p>
                        <div class="mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-white/20">
                            <p class="text-white/90 text-xs sm:text-sm">Since 2010</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi Tab -->
        <div class="tab-content hidden p-3 sm:p-4 md:p-6 lg:p-8" id="struktur-tab">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-4 sm:mb-6 md:mb-8">
                    <!-- Ikon untuk tab lainnya -->
                    <div class="inline-flex items-center justify-center w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 bg-[#017077] rounded-full mb-2 sm:mb-3 md:mb-4">
                        <i class="fas fa-sitemap text-white text-base sm:text-lg md:text-xl"></i>
                    </div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#017077] mb-2 sm:mb-3">Struktur Organisasi</h2>
                    <div class="w-12 sm:w-14 md:w-16 h-1 bg-[#017077] mx-auto mb-2 sm:mb-3 md:mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-xs sm:text-sm md:text-base">
                        Tim pengelola dan pengurus yang berdedikasi untuk kemajuan pesantren
                    </p>
                </div>

                <!-- Struktur Organisasi Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
                    <!-- Pembina -->
                    <div class="group text-center">
                        <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 md:p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Pembina.png') ?>" alt="Pembina" class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Pembina II -->
                    <div class="group text-center">
                        <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 md:p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Pembina_II.png') ?>" alt="Pembina II" class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Direktur -->
                    <div class="group text-center">
                        <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 md:p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Direktur.png') ?>" alt="Direktur" class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Manager Pendidikan -->
                    <div class="group text-center">
                        <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 md:p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Manager_Pendidikan.png') ?>" alt="Manager Pendidikan" class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Manager Tahfidz -->
                    <div class="group text-center">
                        <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 md:p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Manager_Tahfidz.png') ?>" alt="Manager Tahfidz" class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Manager Kesantrian -->
                    <div class="group text-center">
                        <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-2 sm:p-3 md:p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Manager_Kesantrian.png') ?>" alt="Manager Kesantrian" class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 lg:w-56 lg:h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Fungsi untuk hide semua tab content
function hideAllTabs() {
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.add('hidden');
    });
}

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
            btn.classList.remove('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
        } else {
            btn.classList.remove('bg-[#017077]', 'text-white', 'shadow-md');
            btn.classList.add('bg-gray-100', 'text-gray-600', 'hover:bg-gray-200');
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
    const validTabs = ['tentang', 'visi-misi', 'sejarah', 'struktur'];
    
    if (validTabs.includes(hash)) {
        switchTab(hash);
    } else {
        // Default ke tab tentang
        switchTab('tentang');
    }
}

// Initialize tab system
function initializeTabs() {
    const tabButtons = document.querySelectorAll('.tab-button');
    
    // Pertama, hide semua tab
    hideAllTabs();
    
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
}

// Fungsi untuk hide loading screen dan show content
function showContent() {
    const loadingScreen = document.getElementById('loadingScreen');
    const mainContent = document.getElementById('mainContent');
    
    // Hide loading screen dengan animasi
    loadingScreen.style.opacity = '0';
    
    setTimeout(() => {
        loadingScreen.style.display = 'none';
        // Show main content
        mainContent.style.display = 'block';
        
        // Initialize tabs setelah content ditampilkan
        initializeTabs();
    }, 500);
}

// Tunggu sampai DOM fully loaded dan assets siap
document.addEventListener('DOMContentLoaded', function() {
    // Tunggu sedikit untuk memastikan semua element sudah siap
    setTimeout(showContent, 800);
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
        position: relative;
        transition: all 0.3s ease;
    }
    .tab-button.bg-\\[\\#017077\\]::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 3px;
        background: #017077;
        border-radius: 2px;
    }
    
    /* Loading animation */
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .animate-spin {
        animation: spin 1s linear infinite;
    }
`;
document.head.appendChild(style);
</script>

<style>
/* Additional styles for better visual hierarchy */
.tab-button {
    border-bottom: 2px solid transparent;
}

.tab-button.bg-\[\\#017077\\] {
    border-bottom-color: #017077;
}

/* Smooth transitions for all interactive elements */
.tab-content > div {
    transition: all 0.3s ease;
}

/* Hover effects for cards */
.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

.group:hover .group-hover\:translate-x-2 {
    transform: translateX(0.5rem);
}

/* Ensure loading screen covers everything */
#loadingScreen {
    backdrop-filter: blur(8px);
}

/* Responsive text adjustments */
@media (max-width: 640px) {
    .arabic-font {
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .arabic-font {
        font-size: 1.25rem;
    }
}
</style>
<?= $this->endSection() ?>