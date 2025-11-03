<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Detail Galeri</h1>
            <p class="text-gray-600 mt-2">Informasi lengkap data galeri</p>
        </div>
        <div class="flex items-center space-x-3 mt-4 md:mt-0">
            <a href="<?= base_url('admin/galeri/edit/' . $galeri['id']) ?>" 
               class="bg-primary-light hover:bg-primary text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                <i class="fa fa-edit"></i>
                <span>Edit Galeri</span>
            </a>
            <a href="<?= base_url('admin/galeri') ?>" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                <i class="fa fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Image Section -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fa fa-image mr-2 text-primary"></i>
                    Gambar Galeri
                </h3>
                
                <?php if ($galeri['gambar']): ?>
                <div class="text-center">
                    <div class="relative group mb-4">
                        <img src="<?= base_url('uploads/galeri/' . $galeri['gambar']) ?>" 
                             alt="<?= esc($galeri['judul']) ?>" 
                             class="w-full h-64 object-cover rounded-xl shadow-md border border-gray-200 group-hover:shadow-lg transition-all duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 rounded-xl transition-all duration-300 flex items-center justify-center">
                            <a href="<?= base_url('uploads/galeri/' . $galeri['gambar']) ?>" 
                               target="_blank" 
                               class="bg-white/90 text-gray-800 px-4 py-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center space-x-2">
                                <i class="fa fa-expand"></i>
                                <span class="text-sm font-medium">Lihat Full Size</span>
                            </a>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Klik gambar untuk melihat ukuran penuh</p>
                </div>
                <?php else: ?>
                <div class="text-center py-8">
                    <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa fa-image text-gray-400 text-4xl"></i>
                    </div>
                    <h4 class="text-lg font-medium text-gray-700 mb-2">Tidak Ada Gambar</h4>
                    <p class="text-gray-500 text-sm">Galeri ini belum memiliki gambar</p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Information Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                    <i class="fa fa-info-circle mr-2 text-primary"></i>
                    Informasi Galeri
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between py-3 border-b border-gray-100">
                            <span class="text-sm font-medium text-gray-600">Judul Galeri</span>
                            <span class="text-sm font-semibold text-gray-800"><?= esc($galeri['judul']) ?></span>
                        </div>

                        <div class="flex items-center justify-between py-3 border-b border-gray-100">
                            <span class="text-sm font-medium text-gray-600">Kategori</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                <?= $galeri['kategori'] == 'kegiatan' ? 'bg-blue-100 text-blue-800' : 
                                   ($galeri['kategori'] == 'fasilitas' ? 'bg-green-100 text-green-800' : 
                                   'bg-yellow-100 text-yellow-800') ?>">
                                <i class="fa fa-tag mr-1 text-xs"></i>
                                <?= ucfirst($galeri['kategori']) ?>
                            </span>
                        </div>

                        <div class="flex items-center justify-between py-3 border-b border-gray-100">
                            <span class="text-sm font-medium text-gray-600">Tanggal</span>
                            <span class="text-sm text-gray-800 flex items-center space-x-1">
                                <i class="fa fa-calendar text-primary text-xs"></i>
                                <span><?= date('d M Y', strtotime($galeri['tanggal'])) ?></span>
                            </span>
                        </div>
                    </div>

                    <!-- Status & Timestamps -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between py-3 border-b border-gray-100">
                            <span class="text-sm font-medium text-gray-600">Status</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                <?= $galeri['status'] == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?>">
                                <i class="fa fa-circle mr-1 text-[8px]"></i>
                                <?= ucfirst($galeri['status']) ?>
                            </span>
                        </div>

                        <div class="flex items-center justify-between py-3 border-b border-gray-100">
                            <span class="text-sm font-medium text-gray-600">Dibuat Pada</span>
                            <span class="text-sm text-gray-800 flex items-center space-x-1">
                                <i class="fa fa-clock text-primary text-xs"></i>
                                <span><?= date('d M Y H:i', strtotime($galeri['created_at'])) ?></span>
                            </span>
                        </div>

                        <div class="flex items-center justify-between py-3 border-b border-gray-100">
                            <span class="text-sm font-medium text-gray-600">Diupdate Pada</span>
                            <span class="text-sm text-gray-800 flex items-center space-x-1">
                                <i class="fa fa-edit text-primary text-xs"></i>
                                <span><?= date('d M Y H:i', strtotime($galeri['updated_at'])) ?></span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <?php if ($galeri['deskripsi']): ?>
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                        <i class="fa fa-align-left mr-2 text-primary"></i>
                        Deskripsi
                    </h4>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <p class="text-gray-700 leading-relaxed text-sm">
                            <?= nl2br(esc($galeri['deskripsi'])) ?>
                        </p>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fa fa-bolt mr-2 text-primary"></i>
                    Aksi Cepat
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="<?= base_url('admin/galeri/edit/' . $galeri['id']) ?>" 
                       class="bg-primary-light hover:bg-primary text-white px-4 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-edit"></i>
                        <span>Edit Galeri</span>
                    </a>
                    <a href="<?= base_url('admin/galeri/delete/' . $galeri['id']) ?>" 
                       class="bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center justify-center space-x-2"
                       onclick="return confirm('Yakin ingin menghapus galeri <?= esc($galeri['judul']) ?>?')">
                        <i class="fa fa-trash"></i>
                        <span>Hapus Galeri</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.group:hover .group-hover\:bg-opacity-10 {
    background-color: rgba(0, 0, 0, 0.1);
}
</style>

<?= $this->endSection() ?>