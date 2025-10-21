<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
    <!-- Tab Navigation -->
    <div class="flex flex-wrap justify-center gap-2 border-b border-gray-200">
        <button class="tab-button w-32 px-4 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="tentang">
            <i class="fas fa-info-circle mr-2"></i>Tentang
        </button>
        <button class="tab-button w-32 px-4 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="visi-misi">
            <i class="fas fa-bullseye mr-2"></i>Visi Misi
        </button>
        <button class="tab-button w-32 px-4 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="sejarah">
            <i class="fas fa-history mr-2"></i>Sejarah
        </button>
        <button class="tab-button w-32 px-4 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="struktur">
            <i class="fas fa-sitemap mr-2"></i>Struktur
        </button>
    </div>

    <!-- Tab Content Container -->
    <div class="bg-white rounded-2xl shadow-2xl outline-none" style="min-height: 600px;">
        
        <!-- Tentang Kami Tab -->
        <div class="tab-content p-8 md:p-12" id="tentang-tab">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-10">
                    <!-- Logo HANYA di tab Tentang -->
                    <div class="inline-flex items-center justify-center w-40 h-40 bg-white mb-6 overflow-hidden shadow-sm mx-auto">
                        <img src="<?= base_url('assets/img/logo.png') ?>" 
                            alt="Logo Baitul Qur'an Al-Kautsar" 
                            class="w-40 h-40 object-contain">
                    </div>
                    <h2 class="text-2xl md:text-3xl font-bold text-[#017077] mb-4">Tentang Kami</h2>
                    <div class="w-20 h-1 bg-[#017077] mx-auto mb-6"></div>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-8 border-l-4 border-[#017077]">
                    <p class="text-gray-700 text-lg leading-relaxed text-justify">
                        Pesantren Baitul Qur'an Al-Kautsar merupakan lembaga pendidikan dibawah naungan yayasan
                        Al-Kautsar Madiun, yang memadukan pendidikan formal dalam bentuk SMP dan SMA dengan non
                        formal dalam bentuk Dirosah Islamiyah. Pembinaan 24 jam yang dikemas dalam sistem
                        Islamic Boarding School (Pesantren Modern).
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                    <div class="text-center p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                        <div class="bg-[#017077]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-school text-[#017077] text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">SMP & SMA</h4>
                        <p class="text-gray-600 text-sm">Pendidikan Formal Terpadu</p>
                    </div>

                    <div class="text-center p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                        <div class="bg-[#017077]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-quran text-[#017077] text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">Dirosah Islamiyah</h4>
                        <p class="text-gray-600 text-sm">Pendidikan Non Formal</p>
                    </div>

                    <div class="text-center p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                        <div class="bg-[#017077]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-home text-[#017077] text-xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2">24 Jam</h4>
                        <p class="text-gray-600 text-sm">Pembinaan Intensive</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi Tab -->
        <div class="tab-content hidden p-8 md:p-12" id="visi-misi-tab">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-10">
                    <!-- Ikon untuk tab lainnya -->
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-[#017077] rounded-full mb-6">
                        <i class="fas fa-bullseye text-white text-2xl"></i>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-bold text-[#017077] mb-4">Visi & Misi</h2>
                    <div class="w-20 h-1 bg-[#017077] mx-auto mb-6"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Landasan dan tujuan kami dalam membentuk generasi Qur'ani
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Visi Card -->
                    <div class="group bg-white rounded-xl shadow-lg border border-gray-200 p-8 hover:shadow-xl transition-all duration-500 hover:border-[#017077]/30">
                        <div class="flex items-center mb-6">
                            <div class="bg-[#017077] text-white p-3 rounded-lg mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#017077]">Visi Kami</h3>
                        </div>
                        <div class="bg-[#017077]/5 rounded-lg p-6 border-l-4 border-[#017077]">
                            <p class="text-gray-700 leading-relaxed text-lg">
                                "Membentuk Generasi Cerdas yang Mandiri dan berkarakter dengan Al-Qur'an"
                            </p>
                        </div>
                    </div>

                    <!-- Misi Card -->
                    <div class="group bg-white rounded-xl shadow-lg border border-gray-200 p-8 hover:shadow-xl transition-all duration-500 hover:border-[#017077]/30">
                        <div class="flex items-center mb-6">
                            <div class="bg-[#017077] text-white p-3 rounded-lg mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-list-check"></i>
                            </div>
                            <h3 class="text-xl font-bold text-[#017077]">Misi Kami</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-1 mr-3 text-sm"></i>
                                <span class="text-gray-700">Menjadikan Al-Qur'an dan Sunnah sebagai landasan hidup</span>
                            </div>
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-1 mr-3 text-sm"></i>
                                <span class="text-gray-700">Membentuk santri beraqidah ahlussunnah wal jama'ah</span>
                            </div>
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-1 mr-3 text-sm"></i>
                                <span class="text-gray-700">Membentuk santri berakhlak Mulia dalam kehidupan sehari-hari</span>
                            </div>
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-1 mr-3 text-sm"></i>
                                <span class="text-gray-700">Membentuk lifeskill kemandirian dan kemasyarakatan santri</span>
                            </div>
                            <div class="flex items-start group-hover:translate-x-2 transition-transform duration-300">
                                <i class="fas fa-check text-[#017077] mt-1 mr-3 text-sm"></i>
                                <span class="text-gray-700">Membekali santri ilmu entrepreneur</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sejarah Tab -->
        <div class="tab-content hidden p-8 md:p-12" id="sejarah-tab">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-10">
                    <!-- Ikon untuk tab lainnya -->
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-[#017077] rounded-full mb-6">
                        <i class="fas fa-history text-white text-2xl"></i>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-bold text-[#017077] mb-4">Sejarah Berdiri</h2>
                    <div class="w-20 h-1 bg-[#017077] mx-auto mb-6"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <!-- Text Content -->
                    <div class="space-y-6">
                        <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                            <p class="text-gray-700 leading-relaxed mb-4">
                                Baitul Quran Al-Kautsar didirikan pada tahun 2010 dengan visi untuk 
                                menjadi pusat pendidikan Islam yang mengintegrasikan ilmu agama 
                                dan ilmu umum secara seimbang.
                            </p>
                            <p class="text-gray-700 leading-relaxed">
                                Sejak berdiri, kami telah berhasil mencetak ratusan hafizh dan hafizhah 
                                yang tidak hanya menguasai Al-Qur'an tetapi juga memiliki akhlak yang mulia 
                                dan berkontribusi positif bagi masyarakat.
                            </p>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-[#017077]/5 rounded-lg p-4 text-center border border-[#017077]/10">
                                <div class="text-2xl font-bold text-[#017077]">14+</div>
                                <div class="text-gray-600 text-sm">Tahun Pengalaman</div>
                            </div>
                            <div class="bg-[#017077]/5 rounded-lg p-4 text-center border border-[#017077]/10">
                                <div class="text-2xl font-bold text-[#017077]">500+</div>
                                <div class="text-gray-600 text-sm">Santri Berhasil</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Element -->
                    <div class="bg-gradient-to-br from-[#017077] to-[#005359] rounded-xl p-8 text-white text-center">
                        <div class="bg-white/20 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-mosque text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Pesantren Modern</h3>
                        <p class="text-white/80 text-sm">Islamic Boarding School</p>
                        <div class="mt-6 pt-6 border-t border-white/20">
                            <p class="text-white/90 text-sm">Since 2010</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi Tab -->
        <div class="tab-content hidden p-6 md:p-8" id="struktur-tab">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-8">
                    <!-- Ikon untuk tab lainnya -->
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-[#017077] rounded-full mb-4">
                        <i class="fas fa-sitemap text-white text-xl"></i>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-bold text-[#017077] mb-3">Struktur Organisasi</h2>
                    <div class="w-16 h-1 bg-[#017077] mx-auto mb-4"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">
                        Tim pengelola dan pengurus yang berdedikasi untuk kemajuan pesantren
                    </p>
                </div>

                <!-- Struktur Organisasi Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Pembina -->
                    <div class="group text-center">
                        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Pembina.png') ?>" alt="Pembina" class="w-56 h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Pembina II -->
                    <div class="group text-center">
                        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Pembina_II.png') ?>" alt="Pembina II" class="w-56 h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Direktur -->
                    <div class="group text-center">
                        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Direktur.png') ?>" alt="Direktur" class="w-56 h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Manager Pendidikan -->
                    <div class="group text-center">
                        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Manager_Pendidikan.png') ?>" alt="Manager Pendidikan" class="w-56 h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Manager Tahfidz -->
                    <div class="group text-center">
                        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Manager_Tahfidz.png') ?>" alt="Manager Tahfidz" class="w-56 h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Manager Kesantrian -->
                    <div class="group text-center">
                        <div class="bg-white rounded-xl shadow-lg p-4 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1 border border-[#017077]/10">
                            <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/struktur/Manager_Kesantrian.png') ?>" alt="Manager Kesantrian" class="w-56 h-56 object-contain rounded-lg group-hover:scale-105 transition-transform duration-300">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
    const validTabs = ['tentang', 'visi-misi', 'sejarah', 'struktur'];
    
    if (validTabs.includes(hash)) {
        switchTab(hash);
    } else {
        // Default ke tab tentang
        switchTab('tentang');
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
<?= $this->endSection() ?>