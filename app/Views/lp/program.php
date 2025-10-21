<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
    <!-- Header Section -->
    <div class="text-center mb-16">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-[#017077] rounded-full mb-6">
            <i class="fas fa-book-open text-white text-2xl"></i>
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-[#017077] mb-4">Program & Kegiatan</h1>
        <div class="w-24 h-1 bg-[#017077] mx-auto mb-6"></div>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Program pendidikan terpadu yang membentuk generasi Qur'ani berakhlak mulia, berilmu, dan bermanfaat
        </p>
    </div>

    <!-- Jadwal dan Ekstrakurikuler Section -->
    <div class="mb-20">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            <!-- Jadwal Harian - 60% -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-[#017077] to-[#005359] px-6 py-4 text-white font-semibold">
                        <i class="fas fa-calendar-day mr-2"></i>Jadwal Kegiatan Harian
                    </div>
                    
                    <!-- Desktop Table -->
                    <div class="hidden md:block">
                        <div class="grid grid-cols-12 bg-[#017077]/10 text-gray-700 font-semibold border-b border-gray-200">
                            <div class="col-span-4 px-6 py-3 border-r border-gray-200">
                                <i class="fas fa-clock mr-2 text-[#017077]"></i>Waktu
                            </div>
                            <div class="col-span-8 px-6 py-3">
                                <i class="fas fa-tasks mr-2 text-[#017077]"></i>Kegiatan
                            </div>
                        </div>
                        
                        <?php
                        $jadwal = [
                            ['03.00-03.30', 'Bangun tidur & persiapan tahajjud'],
                            ['03.30-04.30', 'Tahajjud, Sholat Shubuh berjama\'ah'],
                            ['04.30-06.00', 'Halaqah Tahfidz I'],
                            ['06.00-07.30', 'Kebersihan, Sarapan, Persiapan KBM'],
                            ['07.30-08.00', 'Apel pagi, Kuliah Tasyji\''],
                            ['08.00-11.30', 'Kegiatan Belajar Mengajar'],
                            ['11.30-13.00', 'Sholat Dhuhur, Muroja\'ah Tahfidz'],
                            ['13.00-14.45', 'Makan siang, Istirahat Siang'],
                            ['14.45-15.30', 'Persiapan Sholat Ashar'],
                            ['15.30-17.00', 'Halaqoh Tahfidz II/Ekstra Kurikuler'],
                            ['17.00-17.30', 'Kebersihan, Persiapan Sholat Maghrib'],
                            ['17.30-18.45', 'Sholat Maghrib, Kajian Kitab'],
                            ['18.45-20.00', 'Sholat Isya\', Makan malam'],
                            ['20.00-21.30', 'Belajar malam/Halaqah Tahfidz'],
                            ['21.30-03.00', 'Istirahat malam (tidur malam)']
                        ];
                        
                        foreach ($jadwal as $index => $item):
                            $bgClass = $index % 2 === 0 ? 'bg-gray-50' : 'bg-white';
                        ?>
                        <div class="grid grid-cols-12 <?= $bgClass ?> hover:bg-gray-100 transition-colors duration-200 border-b border-gray-200 last:border-b-0">
                            <div class="col-span-4 px-6 py-4 border-r border-gray-200 font-medium text-gray-800">
                                <i class="fas fa-clock text-[#017077] mr-2 text-sm"></i><?= $item[0] ?>
                            </div>
                            <div class="col-span-8 px-6 py-4 text-gray-700">
                                <?= $item[1] ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Mobile Cards -->
                    <div class="md:hidden">
                        <?php foreach ($jadwal as $index => $item): ?>
                        <div class="border-b border-gray-200 last:border-b-0">
                            <div class="p-4 hover:bg-gray-50 transition-colors duration-200">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-12 h-12 bg-[#017077] rounded-lg flex items-center justify-center">
                                        <i class="fas fa-clock text-white text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-[#017077] mb-1 text-sm"><?= $item[0] ?></div>
                                        <p class="text-gray-700 text-xs"><?= $item[1] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Ekstrakurikuler - 40% -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden h-full">
                    <div class="bg-gradient-to-r from-[#017077] to-[#005359] px-6 py-4 text-white font-semibold">
                        <i class="fas fa-star mr-2"></i>Program Ekstrakurikuler
                    </div>
                    
                    <div class="p-6">
                        <?php if (!empty($ekstrakurikuler)): ?>
                            <div class="space-y-4 max-h-[600px] overflow-y-auto">
                                <?php foreach ($ekstrakurikuler as $ekstra): ?>
                                <div class="group bg-gray-50 rounded-lg p-4 hover:bg-[#017077]/5 transition-all duration-300 border border-gray-200 hover:border-[#017077]/30">
                                    <div class="flex items-center mb-2">
                                        <div class="bg-[#017077] w-8 h-8 rounded-lg flex items-center justify-center mr-3">
                                            <i class="fas fa-star text-white text-sm"></i>
                                        </div>
                                        <h3 class="font-bold text-[#017077] text-lg"><?= $ekstra['nama_ekstrakurikuler'] ?></h3>
                                    </div>
                                    
                                    <?php if (!empty($ekstra['jadwal'])): ?>
                                    <div class="flex items-center text-sm text-gray-600 mt-2">
                                        <i class="fas fa-calendar-alt text-[#017077] mr-2 text-xs"></i>
                                        <span class="text-xs"><?= $ekstra['jadwal'] ?></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-8">
                                <div class="inline-flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full mb-3">
                                    <i class="fas fa-clipboard-list text-gray-400"></i>
                                </div>
                                <h3 class="text-sm font-semibold text-gray-600 mb-1">Belum ada data ekstrakurikuler</h3>
                                <p class="text-gray-500 text-xs">Data ekstrakurikuler akan segera tersedia</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Program Unggulan Section -->
    <div class="bg-gradient-to-br from-[#017077] to-[#005359] rounded-2xl p-8 md:p-12 text-white mb-20">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Program Unggulan</h2>
            <div class="w-20 h-1 bg-white/30 mx-auto mb-6"></div>
            <p class="text-white/80 max-w-2xl mx-auto">
                Program khusus yang menjadi fokus utama dalam pembinaan santri
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center hover:bg-white/20 transition-all duration-300">
                <div class="bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-quran text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Tahfizh Quran</h3>
                <p class="text-white/80 text-sm">
                    Program menghafal Al-Quran dengan metode yang mudah dan menyenangkan
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center hover:bg-white/20 transition-all duration-300">
                <div class="bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Kajian Kitab</h3>
                <p class="text-white/80 text-sm">
                    Kajian mendalam kitab-kitab ulama dengan pemateri yang kompeten
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center hover:bg-white/20 transition-all duration-300">
                <div class="bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hands-helping text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Life Skills</h3>
                <p class="text-white/80 text-sm">
                    Pembinaan kemandirian dan keterampilan hidup untuk bekal masa depan
                </p>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-[#017077] mb-4">Tertarik Bergabung?</h2>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
            Mari bergabung dengan keluarga besar Baitul Quran Al-Kautsar dan rasakan pengalaman pendidikan Islami yang menyenangkan
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="<?= base_url('kontak') ?>" class="bg-[#017077] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
            </a>
            <a href="<?= base_url('tentang') ?>" class="border-2 border-[#017077] text-[#017077] font-bold px-8 py-3 rounded-lg hover:bg-[#017077] hover:text-white transition-colors duration-300 inline-flex items-center justify-center">
                <i class="fas fa-info-circle mr-2"></i>Info Lengkap
            </a>
        </div>
    </div>
</div>

<style>
    .jadwal-row:hover {
        background-color: #f8fafc;
        transform: translateX(4px);
        transition: all 0.3s ease;
    }
    
    /* Custom scrollbar untuk ekstrakurikuler */
    .max-h-\[600px\]::-webkit-scrollbar {
        width: 6px;
    }
    
    .max-h-\[600px\]::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .max-h-\[600px\]::-webkit-scrollbar-thumb {
        background: #017077;
        border-radius: 3px;
    }
    
    .max-h-\[600px\]::-webkit-scrollbar-thumb:hover {
        background: #005359;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animasi untuk rows jadwal
    const jadwalRows = document.querySelectorAll('.bg-gray-50, .bg-white');
    jadwalRows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            row.style.transition = 'all 0.5s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Hover effect untuk cards ekstrakurikuler
    const ekstraCards = document.querySelectorAll('.group');
    ekstraCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
<?= $this->endSection() ?>