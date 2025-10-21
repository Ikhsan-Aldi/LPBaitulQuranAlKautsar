<section id="gelombang-ditutup" class="bg-white rounded-2xl shadow-xl p-8">
    <h2 class="text-2xl md:text-3xl font-bold text-[#017077] mb-6 flex items-center">
        <i class="fas fa-history mr-3"></i>Riwayat Gelombang
    </h2>

    <?php 
    $gelombang_lain = array_filter($gelombang, function($item) {
        return $item['status'] !== 'dibuka';
    });
    ?>

    <?php if (empty($gelombang_lain)): ?>
        <div class="text-center py-8">
            <div class="bg-gray-200 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-history text-gray-500 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Riwayat Gelombang</h3>
            <p class="text-gray-600">
                Belum ada gelombang pendaftaran yang telah berakhir atau ditutup.
            </p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($gelombang_lain as $item): ?>
            <div class="bg-gray-50 rounded-xl border border-gray-300 overflow-hidden hover:shadow-md transition-all duration-300">
                <!-- Header -->
                <div class="bg-gradient-to-r from-gray-500 to-gray-600 p-5 text-white">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold mb-2"><?= esc($item['nama']) ?></h3>
                            <div class="flex items-center space-x-2">
                                <?php if ($item['status'] === 'ditutup'): ?>
                                    <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-pause-circle mr-1"></i>Ditutup
                                    </span>
                                <?php else: ?>
                                    <span class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-flag-checkered mr-1"></i>Berakhir
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5">
                    <!-- Rentang Waktu -->
                    <div class="mb-4 p-3 bg-white rounded-lg border border-gray-200">
                        <div class="text-center text-sm text-gray-600 mb-1">Periode Pendaftaran</div>
                        <div class="text-center font-semibold text-gray-700">
                            <?= date('d M Y', strtotime($item['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="text-center p-3 bg-gray-100 rounded-lg">
                        <p class="text-sm text-gray-600">
                            <?php if ($item['status'] === 'ditutup'): ?>
                                <i class="fas fa-info-circle mr-1"></i>Gelombang ini telah ditutup
                            <?php else: ?>
                                <i class="fas fa-info-circle mr-1"></i>Gelombang ini telah berakhir
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>