<section id="gelombang-ditutup" class="bg-white rounded-2xl shadow-xl p-8">
    <h2 class="text-2xl md:text-3xl font-bold text-[#017077] mb-6 flex items-center">
        <i class="fas fa-history mr-3"></i>Riwayat Gelombang
    </h2>

    <?php 
    // Filter gelombang yang tidak dibuka, urutkan by tanggal selesai DESC, ambil 4 terbaru
    $gelombang_lain = array_filter($gelombang, function($item) {
        return $item['status'] !== 'dibuka';
    });
    
    // Urutkan berdasarkan tanggal selesai (terbaru pertama)
    usort($gelombang_lain, function($a, $b) {
        return strtotime($b['tanggal_selesai']) - strtotime($a['tanggal_selesai']);
    });
    
    // Ambil hanya 4 data terbaru
    $gelombang_lain = array_slice($gelombang_lain, 0, 4);
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <?php foreach ($gelombang_lain as $item): ?>
            <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 hover:shadow-md transition-all duration-300">
                <!-- Header Minimalis -->
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-1"><?= esc($item['nama']) ?></h3>
                        <div class="flex items-center">
                            <?php if ($item['status'] === 'ditutup'): ?>
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs font-medium">
                                    <i class="fas fa-pause-circle mr-1"></i>Ditutup
                                </span>
                            <?php else: ?>
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-medium">
                                    <i class="fas fa-flag-checkered mr-1"></i>Berakhir
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Content Minimalis -->
                <div class="space-y-2">
                    <!-- Periode -->
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-calendar-alt mr-2 text-[#017077]"></i>
                        <?= date('d M Y', strtotime($item['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?>
                    </div>
                    
                    <!-- Status Info -->
                    <div class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">
                        <?php if ($item['status'] === 'ditutup'): ?>
                            <i class="fas fa-info-circle mr-1"></i>Gelombang telah ditutup
                        <?php else: ?>
                            <i class="fas fa-info-circle mr-1"></i>Gelombang telah berakhir
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Info jumlah gelombang yang ditampilkan -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-500">
                Menampilkan <?= count($gelombang_lain) ?> gelombang terakhir yang telah berakhir
            </p>
        </div>
    <?php endif; ?>
</section>