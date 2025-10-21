<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<div class="content-non-home">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-[#017077] rounded-full mb-6">
                <i class="fas fa-calendar-alt text-white text-2xl"></i>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-[#017077] mb-4">Program Pesantren</h1>
            <div class="w-20 h-1 bg-[#017077] mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Program pembelajaran yang terstruktur untuk membentuk generasi Qur'ani yang berakhlak mulia
            </p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex flex-wrap justify-center gap-2 mb-12 border-b border-gray-200 pb-4">
            <button class="tab-button w-40 px-4 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="kegiatan-harian">
                <i class="fas fa-clock mr-2"></i>Kegiatan Harian
            </button>
            <button class="tab-button w-40 px-4 py-3 rounded-t-lg bg-gray-100 text-gray-600 font-semibold text-sm transition-all duration-300 transform hover:scale-105 hover:bg-gray-200 text-center" data-tab="ekstrakurikuler">
                <i class="fas fa-futbol mr-2"></i>Ekstrakurikuler
            </button>
        </div>

        <!-- Tab Content Container -->
        <div class="bg-white rounded-b-2xl rounded-tr-2xl shadow-2xl border border-gray-200" style="min-height: 600px;">
            
            <!-- Kegiatan Harian Tab -->
            <div class="tab-content p-8 md:p-12" id="kegiatan-harian-tab">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-[#017077] rounded-full mb-6">
                            <i class="fas fa-clock text-white text-2xl"></i>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold text-[#017077] mb-4">Kegiatan Harian</h2>
                        <div class="w-20 h-1 bg-[#017077] mx-auto mb-6"></div>
                        <p class="text-gray-600 max-w-2xl mx-auto">
                            Jadwal kegiatan harian yang terstruktur untuk membentuk disiplin dan karakter santri
                        </p>
                    </div>

                    <!-- Daily Schedule Table -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                        <div class="bg-[#017077] text-white px-6 py-4">
                            <h3 class="text-xl font-bold text-center">Jadwal Kegiatan Harian</h3>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 w-32">Waktu</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Kegiatan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">03.00 - 03.30</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Bangun tidur & persiapan tahajjud</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">03.30 - 04.30</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Tahajjud, Sholat Shubuh berjama'ah</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">04.30 - 06.00</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Halaqah Tahfidz I</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">06.00 - 07.30</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Kebersihan, Sarapan, Persiapan KBM</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">07.30 - 08.00</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Apel pagi, Kuliah Tasyji'</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">08.00 - 11.30</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Kegiatan Belajar Mengajar</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">11.30 - 13.00</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Sholat Dhuhur, Muroja'ah Tahfidz</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">13.00 - 14.45</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Makan siang, Istirahat Siang</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">14.45 - 15.30</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Persiapan Sholat Ashar</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">15.30 - 17.00</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Halaqoh Tahfidz II / Ekstra Kurikuler</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">17.00 - 17.30</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Kebersihan, Persiapan Sholat Maghrib</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">17.30 - 18.45</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Sholat Maghrib, Kajian Kitab</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">18.45 - 20.00</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Sholat Isya', Makan malam</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">20.00 - 21.30</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Belajar malam / Halaqah Tahfidz</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 text-sm font-medium text-[#017077] bg-[#017077]/5">21.30 - 03.00</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">Istirahat malam (tidur malam)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Features Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                        <div class="text-center p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                            <div class="bg-[#017077]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-quran text-[#017077] text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2">Tahfidz Quran</h4>
                            <p class="text-gray-600 text-sm">Program menghafal Al-Qur'an dengan metode yang efektif</p>
                        </div>

                        <div class="text-center p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                            <div class="bg-[#017077]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-graduation-cap text-[#017077] text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2">Pendidikan Formal</h4>
                            <p class="text-gray-600 text-sm">SMP dan SMA dengan kurikulum terpadu</p>
                        </div>

                        <div class="text-center p-6 rounded-lg border border-gray-200 hover:border-[#017077] transition-all duration-300 hover:shadow-lg">
                            <div class="bg-[#017077]/10 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-book text-[#017077] text-xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2">Kajian Kitab</h4>
                            <p class="text-gray-600 text-sm">Pembelajaran kitab-kitab klasik Islam</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ekstrakurikuler Tab -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <?php foreach ($ekstrakurikuler as $e): ?>
                    <div class="group bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-500 hover:border-[#017077]/30">
                        <div class="flex items-center mb-4">
                            <div class="bg-[#017077] text-white p-3 rounded-lg mr-4 group-hover:scale-110 transition-transform duration-300">
                                <i class="<?= esc($e['icon']) ?>"></i>
                            </div>
                            <h3 class="text-lg font-bold text-[#017077]"><?= esc($e['nama_ekstra']) ?></h3>
                        </div>
                        <p class="text-gray-600 text-sm"><?= esc($e['deskripsi']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

                    <!-- Activity Images Section -->
                    <div class="bg-gray-50 rounded-xl p-8">
                        <h3 class="text-xl font-bold text-[#017077] mb-6 text-center">Galeri Kegiatan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
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
