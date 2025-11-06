<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri"><?= esc($title) ?></h1>
            <p class="text-gray-600 mt-2">Edit data rekening bank</p>
        </div>
        <a href="<?= base_url('admin/rekening') ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form -->
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <form action="<?= base_url('admin/rekening/update/'.$rekening['id']) ?>" method="post">
                <div class="space-y-6">
                    <!-- Nama Bank -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Bank</label>
                        <input type="text" name="bank" value="<?= esc($rekening['bank']) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" placeholder="Contoh: BCA, BRI, Mandiri" required>
                        <p class="text-sm text-gray-500 mt-1">Masukkan nama bank lengkap</p>
                    </div>

                    <!-- Nomor Rekening -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Rekening</label>
                        <input type="text" name="nomor_rekening" value="<?= esc($rekening['nomor_rekening']) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" placeholder="Contoh: 1234567890" required>
                        <p class="text-sm text-gray-500 mt-1">Masukkan nomor rekening tanpa tanda baca</p>
                    </div>

                    <!-- Atas Nama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Atas Nama</label>
                        <input type="text" name="atas_nama" value="<?= esc($rekening['atas_nama']) ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" placeholder="Nama pemilik rekening" required>
                        <p class="text-sm text-gray-500 mt-1">Nama lengkap pemilik rekening</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                            <option value="Aktif" <?= $rekening['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="Nonaktif" <?= $rekening['status'] == 'Nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                        <p class="text-sm text-gray-500 mt-1">Rekening aktif akan ditampilkan untuk donasi</p>
                    </div>

                    <!-- Current Status Indicator -->
                    <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex items-center space-x-3">
                            <span class="text-sm font-medium text-gray-600">Status Saat Ini:</span>
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                <?= $rekening['status'] == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?>">
                                <?= esc($rekening['status']) ?>
                            </span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-4 pt-4">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                            <i class="fa fa-save"></i>
                            <span>Update Rekening</span>
                        </button>
                        <a href="<?= base_url('admin/rekening') ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>