<!-- Gelombang Dibuka Section -->
<section id="gelombang-dibuka" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-[#017077] mb-4">Gelombang Pendaftaran Dibuka</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Daftarkan diri Anda sekarang juga pada gelombang yang sedang dibuka
            </p>
        </div>

        <?php 
        // Filter hanya gelombang dengan status "dibuka"
        $gelombang_dibuka = array_filter($gelombang, function($item) {
            return $item['status'] === 'dibuka';
        });

        $today = date('Y-m-d');
        ?>

        <?php if (empty($gelombang_dibuka)): ?>
            <div class="text-center py-12">
                <div class="bg-[#017077]/10 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-calendar-times text-[#017077] text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Tidak Ada Gelombang yang Dibuka</h3>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Saat ini tidak ada gelombang pendaftaran yang dibuka. Silakan pantau terus informasi terbaru dari kami.
                </p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <?php foreach ($gelombang_dibuka as $item): ?>
                    <?php 
                        $mulai = date('Y-m-d', strtotime($item['tanggal_mulai']));
                        $selesai = date('Y-m-d', strtotime($item['tanggal_selesai']));
                        $belum_periode = ($today < $mulai);
                        $sudah_berakhir = ($today > $selesai);
                    ?>

                    <div class="bg-white rounded-2xl shadow-xl border-2 border-[#017077]/30 overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-[#017077] to-[#005359] p-6 text-white">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-2xl font-bold mb-2"><?= esc($item['nama']) ?></h3>
                                    <div class="flex items-center space-x-2">
                                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                            <i class="fas fa-check-circle mr-1"></i>Dibuka
                                        </span>
                                        <span class="bg-white/20 px-3 py-1 rounded-full text-sm">
                                            <?= count($item['seleksi_array']) ?> Seleksi
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
                            <div class="mb-6 p-4 bg-[#017077]/5 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div class="text-center">
                                        <div class="text-sm text-gray-600">Tanggal Mulai</div>
                                        <div class="font-bold text-[#017077]"><?= date('d M Y', strtotime($item['tanggal_mulai'])) ?></div>
                                    </div>
                                    <div class="flex-1 mx-4 relative">
                                        <div class="h-0.5 bg-[#017077]/30"></div>
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <i class="fas fa-arrow-right text-[#017077] text-sm"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-sm text-gray-600">Tanggal Selesai</div>
                                        <div class="font-bold text-[#017077]"><?= date('d M Y', strtotime($item['tanggal_selesai'])) ?></div>
                                    </div>
                                </div>
                            </div>

                            <?php if ($belum_periode): ?>
                                <!-- Belum Masuk Periode -->
                                <div class="text-center py-8">
                                    <div class="bg-yellow-100 text-yellow-700 px-4 py-3 rounded-lg inline-block">
                                        <i class="fas fa-clock mr-2"></i>
                                        <strong>Belum periode pendaftaran!</strong><br>
                                        Gelombang ini akan dibuka pada <span class="font-semibold"><?= date('d M Y', strtotime($item['tanggal_mulai'])) ?></span>.
                                    </div>
                                </div>

                            <?php elseif ($sudah_berakhir): ?>
                                <!-- Sudah Berakhir -->
                                <div class="text-center py-8">
                                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg inline-block">
                                        <i class="fas fa-times-circle mr-2"></i>
                                        <strong>Periode pendaftaran telah berakhir.</strong>
                                    </div>
                                </div>

                            <?php else: ?>
                                <!-- Jadwal Seleksi -->
                                <h4 class="font-bold text-lg text-[#017077] mb-4 flex items-center">
                                    <i class="fas fa-list-ol mr-2"></i>Jadwal Seleksi
                                </h4>
                                <div class="space-y-3">
                                    <?php foreach ($item['seleksi_array'] as $index => $seleksi): ?>
                                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                            <div class="flex items-center space-x-3">
                                                <div class="bg-[#017077] text-white rounded-full w-8 h-8 flex items-center justify-center text-sm font-bold">
                                                    <?= $index + 1 ?>
                                                </div>
                                                <div>
                                                    <div class="font-semibold text-gray-800"><?= esc($seleksi) ?></div>
                                                    <div class="text-sm text-gray-600">
                                                        <i class="far fa-calendar mr-1"></i>
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
                                    <a href="<?= base_url('pendaftaran/form') ?>" 
                                       class="w-full bg-[#017077] text-white font-bold py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-center block">
                                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>