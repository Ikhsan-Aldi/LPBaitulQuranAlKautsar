<!-- Gelombang Ditutup/Berakhir Section -->
<section id="gelombang-ditutup" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-[#017077] mb-4">Riwayat Gelombang</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Informasi gelombang pendaftaran yang telah ditutup atau berakhir
            </p>
        </div>

        <?php 
        $gelombang_lain = array_filter($gelombang, function($item) {
            return $item['status'] !== 'dibuka';
        });
        ?>

        <?php if (empty($gelombang_lain)): ?>
            <div class="text-center py-12">
                <div class="bg-gray-200 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-history text-gray-500 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Belum Ada Riwayat Gelombang</h3>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Belum ada gelombang pendaftaran yang telah berakhir atau ditutup.
                </p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <?php foreach ($gelombang_lain as $item): ?>
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300">
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
                                    <span class="bg-white/20 px-3 py-1 rounded-full text-sm">
                                        <?= count($item['seleksi_array']) ?> Seleksi
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <!-- Rentang Waktu -->
                        <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                            <div class="text-center text-sm text-gray-600 mb-1">Periode Pendaftaran</div>
                            <div class="text-center font-semibold text-gray-700">
                                <?= date('d M Y', strtotime($item['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?>
                            </div>
                        </div>

                        <!-- Jadwal Seleksi Ringkas -->
                        <div class="space-y-2">
                            <?php foreach ($item['seleksi_array'] as $index => $seleksi): ?>
                            <div class="flex justify-between items-center text-sm p-2 bg-white border border-gray-200 rounded">
                                <span class="font-medium text-gray-700"><?= esc($seleksi) ?></span>
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-500 text-xs">
                                        <?= date('d M', strtotime($item['jadwal_seleksi_array'][$index] ?? '')) ?>
                                    </span>
                                    <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded text-xs">
                                        <?= esc($item['metode_array'][$index] ?? '') ?>
                                    </span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Status Info -->
                        <div class="mt-4 p-3 bg-gray-100 rounded-lg text-center">
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
    </div>
</section>