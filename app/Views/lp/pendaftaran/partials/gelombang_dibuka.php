<section id="gelombang-dibuka" class="bg-white rounded-2xl shadow-xl p-8 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl md:text-3xl font-bold text-[#017077] flex items-center">
            <i class="fas fa-door-open mr-3"></i>Gelombang Pendaftaran Dibuka
        </h2>
        <span class="bg-teal-100 text-teal-800 px-3 py-1 rounded-full text-sm font-medium">
            <i class="fas fa-check-circle mr-1"></i>Aktif
        </span>
    </div>

    <?php 
    $gelombang_dibuka = array_filter($gelombang, function($item) {
        return $item['status'] === 'dibuka';
    });
    ?>

    <?php if (empty($gelombang_dibuka)): ?>
        <div class="text-center py-12">
            <div class="bg-[#017077]/10 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-calendar-times text-[#017077] text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-4">Tidak Ada Gelombang yang Dibuka</h3>
            <p class="text-gray-600 text-lg mb-6">
                Saat ini tidak ada gelombang pendaftaran yang dibuka. Silakan pantau terus informasi terbaru dari kami.
            </p>
            <a href="<?= base_url('kontak') ?>" class="inline-flex items-center text-[#017077] hover:text-[#005359] font-medium">
                <i class="fas fa-info-circle mr-2"></i>Hubungi Kami untuk Informasi
            </a>
        </div>
    <?php else: ?>
        <div class="space-y-6">
            <?php foreach ($gelombang_dibuka as $item): ?>
            <div class="border-2 border-teal-200 rounded-xl overflow-hidden hover:shadow-lg transition-all duration-300">
                <!-- Header -->
                <div class="bg-gradient-to-r from-[#017077] to-[#005359] p-6 text-white">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold mb-2"><?= esc($item['nama']) ?></h3>
                            <div class="flex items-center space-x-2">
                                <span class="bg-white/20 px-3 py-1 rounded-full text-sm">
                                    <?= count($item['seleksi_array']) ?> Tahap Seleksi
                                </span>
                                <span class="bg-white/20 px-3 py-1 rounded-full text-sm">
                                    <i class="fas fa-users mr-1"></i>Kuota Terbatas
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="bg-white/20 rounded-lg p-2">
                                <i class="fas fa-calendar-alt text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Rentang Waktu -->
                    <div class="mb-6 p-4 bg-teal-50 rounded-lg border border-teal-200">
                        <div class="flex items-center justify-between">
                            <div class="text-center">
                                <div class="text-sm text-teal-700 font-medium">Mulai Pendaftaran</div>
                                <div class="font-bold text-teal-900 text-lg"><?= date('d M Y', strtotime($item['tanggal_mulai'])) ?></div>
                            </div>
                            <div class="flex-1 mx-4 relative">
                                <div class="h-0.5 bg-teal-300"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <i class="fas fa-arrow-right text-teal-600 text-sm"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="text-sm text-teal-700 font-medium">Akhir Pendaftaran</div>
                                <div class="font-bold text-teal-900 text-lg"><?= date('d M Y', strtotime($item['tanggal_selesai'])) ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Jadwal Seleksi -->
                    <h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-list-ol mr-2 text-[#017077]"></i>Jadwal Tahap Seleksi
                    </h4>
                    <div class="space-y-3">
                        <?php foreach ($item['seleksi_array'] as $index => $seleksi): ?>
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors border border-gray-200">
                            <div class="flex items-center space-x-4">
                                <div class="bg-[#017077] text-white rounded-full w-10 h-10 flex items-center justify-center text-sm font-bold">
                                    <?= $index + 1 ?>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-800"><?= esc($seleksi) ?></div>
                                    <div class="text-sm text-gray-600 flex items-center">
                                        <i class="far fa-calendar mr-2"></i>
                                        <?= date('d M Y', strtotime($item['jadwal_seleksi_array'][$index] ?? '')) ?>
                                    </div>
                                </div>
                            </div>
                            <span class="bg-[#017077]/10 text-[#017077] px-3 py-1 rounded-full text-sm font-medium">
                                <?= esc($item['metode_array'][$index] ?? '') ?>
                            </span>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
                            <a href="<?= base_url('pendaftaran/form') ?>" 
                               class="flex-1 bg-[#017077] text-white font-bold py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-center">
                                <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                            </a>
                            <a href="<?= base_url('kontak') ?>" 
                               class="flex-1 border border-[#017077] text-[#017077] font-bold py-3 rounded-lg hover:bg-[#017077] hover:text-white transition-colors duration-300 text-center">
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