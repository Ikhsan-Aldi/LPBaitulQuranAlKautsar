<section id="gelombang-dibuka" class="bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl p-4 sm:p-6 md:p-8 mb-6 sm:mb-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-0 mb-4 sm:mb-6">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#017077] flex items-center justify-center sm:justify-start">
            <i class="fas fa-door-open mr-2 sm:mr-3 text-lg sm:text-xl"></i>Gelombang Pendaftaran Dibuka
        </h2>
        <span class="bg-teal-100 text-teal-800 px-3 py-1 rounded-full text-xs sm:text-sm font-medium text-center">
            <i class="fas fa-check-circle mr-1"></i>Aktif
        </span>
    </div>

    <?php 
    $gelombang_dibuka = array_filter($gelombang, function($item) {
        return $item['status'] === 'dibuka';
    });
    ?>

    <?php if (empty($gelombang_dibuka)): ?>
        <div class="text-center py-8 sm:py-12">
            <div class="bg-[#017077]/10 rounded-full w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center mx-auto mb-4 sm:mb-6">
                <i class="fas fa-calendar-times text-[#017077] text-xl sm:text-2xl md:text-3xl"></i>
            </div>
            <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-700 mb-3 sm:mb-4">Tidak Ada Gelombang yang Dibuka</h3>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg mb-4 sm:mb-6 leading-relaxed">
                Saat ini tidak ada gelombang pendaftaran yang dibuka. Silakan pantau terus informasi terbaru dari kami.
            </p>
            <a href="<?= base_url('kontak') ?>" class="inline-flex items-center text-[#017077] hover:text-[#005359] font-medium text-sm sm:text-base">
                <i class="fas fa-info-circle mr-2"></i>Hubungi Kami untuk Informasi
            </a>
        </div>
    <?php else: ?>
        <div class="space-y-4 sm:space-y-6">
            <?php foreach ($gelombang_dibuka as $item): ?>
                <?php
                    $tanggal_mulai   = strtotime($item['tanggal_mulai']);
                    $tanggal_selesai = strtotime($item['tanggal_selesai']);
                    $today           = strtotime(date('Y-m-d'));

                    // Cek apakah hari ini berada di luar periode pendaftaran
                    $belum_periode = $today < $tanggal_mulai;
                    $sudah_berakhir = $today > $tanggal_selesai;
                    $dalam_periode = !$belum_periode && !$sudah_berakhir;
                ?>
            
                <div class="border-2 border-teal-200 rounded-lg sm:rounded-xl overflow-hidden hover:shadow-md sm:hover:shadow-lg transition-all duration-300">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-[#017077] to-[#005359] p-4 sm:p-6 text-white">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-3 sm:gap-0">
                            <div class="text-center sm:text-left">
                                <h3 class="text-lg sm:text-xl md:text-2xl font-bold mb-2"><?= esc($item['nama']) ?></h3>
                                <div class="flex flex-wrap justify-center sm:justify-start gap-2">
                                    <span class="bg-white/20 px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm">
                                        <?= count($item['seleksi_array']) ?> Tahap Seleksi
                                    </span>
                                    <span class="bg-white/20 px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm">
                                        <i class="fas fa-users mr-1"></i>Kuota Terbatas
                                    </span>
                                </div>
                            </div>
                            <div class="hidden sm:block text-right">
                                <div class="bg-white/20 rounded-lg p-2">
                                    <i class="fas fa-calendar-alt text-xl sm:text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4 sm:p-6">
                        <!-- Rentang Waktu -->
                        <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-teal-50 rounded-lg border border-teal-200">
                            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4">
                                <div class="text-center w-full sm:w-auto">
                                    <div class="text-xs sm:text-sm text-teal-700 font-medium">Mulai Pendaftaran</div>
                                    <div class="font-bold text-teal-900 text-base sm:text-lg"><?= date('d M Y', $tanggal_mulai) ?></div>
                                </div>
                                <div class="hidden sm:block flex-1 mx-2 sm:mx-4 relative">
                                    <div class="h-0.5 bg-teal-300"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <i class="fas fa-arrow-right text-teal-600 text-sm"></i>
                                    </div>
                                </div>
                                <div class="sm:hidden">
                                    <i class="fas fa-arrow-down text-teal-600 text-sm"></i>
                                </div>
                                <div class="text-center w-full sm:w-auto">
                                    <div class="text-xs sm:text-sm text-teal-700 font-medium">Akhir Pendaftaran</div>
                                    <div class="font-bold text-teal-900 text-base sm:text-lg"><?= date('d M Y', $tanggal_selesai) ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Jadwal Seleksi -->
                        <h4 class="font-bold text-base sm:text-lg text-gray-800 mb-3 sm:mb-4 flex items-center justify-center sm:justify-start">
                            <i class="fas fa-list-ol mr-2 text-[#017077]"></i>Jadwal Tahap Seleksi
                        </h4>
                        <div class="space-y-2 sm:space-y-3">
                            <?php foreach ($item['seleksi_array'] as $index => $seleksi): ?>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-3 sm:p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors border border-gray-200 gap-2 sm:gap-0">
                                <div class="flex items-center space-x-3 sm:space-x-4">
                                    <div class="bg-[#017077] text-white rounded-full w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center text-xs sm:text-sm font-bold flex-shrink-0">
                                        <?= $index + 1 ?>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="font-semibold text-gray-800 text-sm sm:text-base truncate"><?= esc($seleksi) ?></div>
                                        <div class="text-xs sm:text-sm text-gray-600 flex items-center">
                                            <i class="far fa-calendar mr-1 sm:mr-2 text-xs"></i>
                                            <?= date('d M Y', strtotime($item['jadwal_seleksi_array'][$index] ?? '')) ?>
                                        </div>
                                    </div>
                                </div>
                                <span class="bg-[#017077]/10 text-[#017077] px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm font-medium text-center sm:text-right mt-2 sm:mt-0">
                                    <?= esc($item['metode_array'][$index] ?? '') ?>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                                <?php if ($belum_periode): ?>
                                    <button disabled class="w-full sm:flex-1 bg-gray-300 text-gray-600 font-bold py-2 sm:py-3 rounded-lg cursor-not-allowed text-center text-sm sm:text-base">
                                        <i class="fas fa-clock mr-2"></i>Tunggu Periode
                                    </button>
                                <?php elseif ($sudah_berakhir): ?>
                                    <button disabled class="w-full sm:flex-1 bg-red-300 text-white font-bold py-2 sm:py-3 rounded-lg cursor-not-allowed text-center text-sm sm:text-base">
                                        <i class="fas fa-times-circle mr-2"></i>Periode Berakhir
                                    </button>
                                <?php else: ?>
                                    <a href="<?= base_url('pendaftaran/form') ?>" 
                                       class="w-full sm:flex-1 bg-[#017077] text-white font-bold py-2 sm:py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-center text-sm sm:text-base">
                                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                                    </a>
                                <?php endif; ?>

                                <a href="<?= base_url('kontak') ?>" 
                                   class="w-full sm:flex-1 border border-[#017077] text-[#017077] font-bold py-2 sm:py-3 rounded-lg hover:bg-[#017077] hover:text-white transition-colors duration-300 text-center text-sm sm:text-base">
                                    <i class="fas fa-question-circle mr-2"></i>Tanya Informasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>