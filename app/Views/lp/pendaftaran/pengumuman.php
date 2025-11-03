<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative min-h-[30vh] sm:min-h-[40vh] md:min-h-[50vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Program Pesantren" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16 lg:py-20 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 md:mb-8 arabic-font">
                Pengumuman Hasil
            </h1>
            <p class="text-sm xs:text-base sm:text-lg md:text-xl lg:text-2xl text-white/90 leading-relaxed mb-6 sm:mb-8 md:mb-10 px-2">
                Cek status penerimaan santri baru Pesantren Baitul Qur'an Alkautsar
            </p>
        </div>
    </div>
</section>

<!-- Pengumuman Section -->
<section class="py-8 sm:py-12 md:py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Search Form -->
        <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 mb-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl sm:text-3xl font-bold text-[#017077] mb-3">Cek Pengumuman Pendaftaran</h2>
                <p class="text-gray-600 text-sm sm:text-base">
                    Masukkan nama lengkap atau NISN untuk melihat hasil seleksi
                </p>
            </div>

            <form action="<?= base_url('pendaftaran/pengumuman') ?>" method="post" class="space-y-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>"
                           placeholder="Masukkan Nama Lengkap atau NISN"
                           class="w-full pl-10 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#017077] focus:border-[#017077] transition-all duration-200 text-sm sm:text-base">
                </div>
                <button type="submit" 
                        class="w-full bg-[#017077] text-white font-bold py-4 rounded-xl hover:bg-[#005359] transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2 text-sm sm:text-base">
                    <i class="fas fa-check-circle"></i>
                    <span>Cek Hasil Seleksi</span>
                </button>
            </form>
        </div>

        <!-- Download All Results (Visible to All) -->
        <div class="bg-gradient-to-r from-[#017077] to-[#005359] rounded-2xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                <div class="text-white text-center md:text-left">
                    <h3 class="text-xl font-bold mb-2">Daftar Seluruh Siswa Diterima</h3>
                    <p class="text-white/90 text-sm">Download pengumuman lengkap semua siswa yang lolos seleksi</p>
                </div>
                <a href="<?= base_url('pendaftaran/pengumuman-pdf') ?>" 
                   class="bg-white text-[#017077] font-bold px-6 py-3 rounded-xl hover:bg-gray-100 transition-all duration-200 shadow-lg hover:shadow-xl flex items-center space-x-2 whitespace-nowrap">
                    <i class="fas fa-download"></i>
                    <span>Download PDF Pengumuman</span>
                </a>
            </div>
        </div>

        <!-- Results -->
        <?php if (isset($pendaftar) && $pendaftar): ?>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Header Status -->
                <div class="bg-gradient-to-r from-[#017077] to-[#005359] p-6 text-center">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-2">Hasil Seleksi Penerimaan</h3>
                    <p class="text-white/90 text-sm sm:text-base">Pesantren Baitul Qur'an Alkautsar</p>
                </div>

                <!-- Student Info -->
                <div class="p-6 sm:p-8 border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="text-center md:text-left">
                            <h4 class="text-lg sm:text-xl font-bold text-gray-900 mb-2"><?= esc($pendaftar['nama_lengkap']) ?></h4>
                            <div class="space-y-2 text-sm text-gray-600">
                                <p class="flex items-center justify-center md:justify-start space-x-2">
                                    <i class="fas fa-graduation-cap text-[#017077]"></i>
                                    <span>Jenjang: <strong><?= esc($pendaftar['jenjang']) ?></strong></span>
                                </p>
                                <p class="flex items-center justify-center md:justify-start space-x-2">
                                    <i class="fas fa-calendar-alt text-[#017077]"></i>
                                    <span>Gelombang: <strong><?= esc($pendaftar['nama_gelombang'] ?? '-') ?></strong></span>
                                </p>
                                <?php if ($pendaftar['nisn']): ?>
                                <p class="flex items-center justify-center md:justify-start space-x-2">
                                    <i class="fas fa-id-card text-[#017077]"></i>
                                    <span>NISN: <strong><?= esc($pendaftar['nisn']) ?></strong></span>
                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="flex items-center justify-center md:justify-end">
                            <div class="text-center">
                                <div class="text-3xl font-bold <?= $pendaftar['status'] === 'Diterima' ? 'text-green-600' : ($pendaftar['status'] === 'Ditolak' ? 'text-red-600' : 'text-yellow-600') ?> mb-1">
                                    <?= $pendaftar['status'] === 'Diterima' ? 'LULUS' : ($pendaftar['status'] === 'Ditolak' ? 'TIDAK LULUS' : 'PROSES') ?>
                                </div>
                                <div class="text-sm text-gray-500">Status Seleksi</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Message -->
                <div class="p-6 sm:p-8">
                    <?php if ($pendaftar['status'] === 'Diterima'): ?>
                        <div class="bg-green-50 border border-green-200 rounded-xl p-6 text-center">
                            <div class="flex items-center justify-center space-x-3 mb-4">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-green-600 text-xl"></i>
                                </div>
                                <h4 class="text-xl font-bold text-green-800">Selamat! Anda Diterima</h4>
                            </div>
                            <p class="text-green-700 mb-4">
                                Anda telah diterima pada Gelombang <?= esc($pendaftar['nama_gelombang'] ?? '-') ?> 
                                Jenjang <?= esc($pendaftar['jenjang']) ?>.
                            </p>
                            <p class="text-green-600 text-sm">
                                Silakan download daftar lengkap siswa yang diterima di bagian atas halaman ini.
                            </p>
                        </div>

                        <!-- Next Steps for Accepted Students -->
                        <div class="mt-6 p-6 bg-blue-50 border border-blue-200 rounded-xl">
                            <h5 class="text-lg font-semibold text-blue-800 mb-3 text-center">Tahap Selanjutnya</h5>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-blue-700">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-calendar-check text-blue-600"></i>
                                    <span>Konfirmasi kehadiran maksimal 7 hari</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-file-invoice text-blue-600"></i>
                                    <span>Lengkapi dokumen administrasi</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-money-bill-wave text-blue-600"></i>
                                    <span>Pembayaran biaya pendaftaran</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-user-check text-blue-600"></i>
                                    <span>Daftar ulang di pesantren</span>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($pendaftar['status'] === 'Ditolak'): ?>
                        <div class="bg-red-50 border border-red-200 rounded-xl p-6 text-center">
                            <div class="flex items-center justify-center space-x-3 mb-4">
                                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-times text-red-600 text-xl"></i>
                                </div>
                                <h4 class="text-xl font-bold text-red-800">Belum Dapat Diterima</h4>
                            </div>
                            <p class="text-red-700 mb-4">
                                Maaf, Anda belum dapat diterima pada Gelombang <?= esc($pendaftar['nama_gelombang'] ?? '-') ?>.
                            </p>
                            <p class="text-red-600 text-sm">
                                Tetap semangat dan silakan mencoba kembali di gelombang berikutnya.
                            </p>
                        </div>
                    <?php else: ?>
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6 text-center">
                            <div class="flex items-center justify-center space-x-3 mb-4">
                                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                                </div>
                                <h4 class="text-xl font-bold text-yellow-800">Proses Verifikasi</h4>
                            </div>
                            <p class="text-yellow-700 mb-4">
                                Status pendaftaran Anda masih dalam proses verifikasi dan seleksi.
                            </p>
                            <p class="text-yellow-600 text-sm">
                                Silakan cek kembali dalam beberapa hari mendatang.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif (isset($keyword)): ?>
            <!-- Not Found Message -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-red-500 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Data Tidak Ditemukan</h3>
                <p class="text-gray-600 mb-4">
                    Tidak dapat menemukan data dengan kata kunci "<strong><?= esc($keyword) ?></strong>"
                </p>
                <p class="text-gray-500 text-sm">
                    Periksa kembali nama lengkap atau NISN yang Anda masukkan
                </p>
            </div>
        <?php endif; ?>

        <!-- Info Tambahan -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mt-8">
            <div class="text-center">
                <h3 class="text-lg font-bold text-[#017077] mb-4">Informasi Penting</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-phone text-[#017077]"></i>
                        <span>Hubungi: 0812-3456-7890</span>
                    </div>
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-clock text-[#017077]"></i>
                        <span>Senin - Jumat, 08:00 - 16:00</span>
                    </div>
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-envelope text-[#017077]"></i>
                        <span>info@alkautsar.sch.id</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.arabic-font {
    font-family: 'Traditional Arabic', 'Scheherazade New', 'Lateef', serif;
}

/* Smooth transitions */
.transition-all {
    transition: all 0.3s ease;
}

/* Focus states */
input:focus {
    outline: none;
    ring: 2px;
}
</style>

<?= $this->endSection() ?>