<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Detail Donasi</h1>
            <p class="text-gray-600 mt-2">Informasi lengkap data donasi</p>
        </div>
        <a href="<?= base_url('admin/donasi') ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Alert Success -->
    <?php if (session()->getFlashdata('success')): ?>
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 animate-pulse">
        <div class="flex items-center space-x-2">
            <i class="fa fa-check-circle text-green-500"></i>
            <span class="font-medium"><?= session()->getFlashdata('success') ?></span>
        </div>
    </div>
    <?php endif; ?>

    <!-- Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informasi Donasi -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-primary-dark mb-6 font-amiri">Informasi Donasi</h2>
                
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Donatur</label>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <span class="font-medium text-gray-800"><?= esc($donasi['nama']) ?></span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <span class="font-medium text-gray-800"><?= esc($donasi['email']) ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nominal Donasi</label>
                            <div class="p-3 bg-green-50 rounded-lg border border-green-200">
                                <span class="font-bold text-green-700 text-lg">Rp<?= number_format($donasi['nominal'], 0, ',', '.') ?></span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Bank Tujuan</label>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <span class="font-medium text-gray-800"><?= esc($donasi['bank_tujuan']) ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Pesan</label>
                        <div class="p-3 bg-gray-50 rounded-lg border border-gray-200 min-h-[80px]">
                            <span class="text-gray-800"><?= esc($donasi['pesan']) ?: '<em class="text-gray-400">Tidak ada pesan</em>' ?></span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Status</label>
                            <div class="p-3 rounded-lg border 
                                <?= $donasi['status'] == 'Terverifikasi' ? 'bg-green-50 border-green-200' : 
                                   ($donasi['status'] == 'Ditolak' ? 'bg-red-50 border-red-200' : 
                                   'bg-yellow-50 border-yellow-200') ?>">
                                <span class="font-medium 
                                    <?= $donasi['status'] == 'Terverifikasi' ? 'text-green-700' : 
                                       ($donasi['status'] == 'Ditolak' ? 'text-red-700' : 
                                       'text-yellow-700') ?>">
                                    <?= esc($donasi['status']) ?>
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Donasi</label>
                            <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <span class="font-medium text-gray-800"><?= esc($donasi['created_at']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bukti Transfer & Aksi -->
        <div class="space-y-6">
            <!-- Bukti Transfer -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-primary-dark mb-4 font-amiri">Bukti Transfer</h2>
                
                <?php if ($donasi['bukti_transfer']): ?>
                    <div class="relative group">
                        <img src="<?= base_url('donasi/bukti/' . $donasi['bukti_transfer']) ?>" alt="Bukti Transfer" 
                             class="w-full rounded-lg border-2 border-gray-200 shadow-sm group-hover:shadow-md transition-all duration-200">
                        <div class="absolute inset-0 bg-primary/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                            <a href="<?= base_url('donasi/bukti/'.$donasi['bukti_transfer']) ?>" 
                               target="_blank" 
                               class="bg-white/90 p-3 rounded-full shadow-lg transform hover:scale-110 transition-transform duration-200">
                                <i class="fa fa-expand text-primary-dark"></i>
                            </a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2 text-center">Klik gambar untuk memperbesar</p>
                <?php else: ?>
                    <div class="text-center py-8">
                        <div class="text-gray-400 text-5xl mb-3">
                            <i class="fa fa-receipt"></i>
                        </div>
                        <p class="text-gray-500">Tidak ada bukti transfer</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Ubah Status -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-bold text-primary-dark mb-4 font-amiri">Ubah Status</h2>
                
                <form action="<?= base_url('admin/donasi/updateStatus/'.$donasi['id']) ?>" method="post">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Status Donasi</label>
                            <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                                <option value="Menunggu" <?= $donasi['status']=='Menunggu'?'selected':'' ?>>Menunggu</option>
                                <option value="Terverifikasi" <?= $donasi['status']=='Terverifikasi'?'selected':'' ?>>Terverifikasi</option>
                                <option value="Ditolak" <?= $donasi['status']=='Ditolak'?'selected':'' ?>>Ditolak</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                            <i class="fa fa-save"></i>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>