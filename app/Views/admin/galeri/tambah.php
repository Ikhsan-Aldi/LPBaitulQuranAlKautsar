<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<!-- Header Section -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-primary-dark mb-2">Pondok Pesantren Al-Kautsar</h1>
    <h2 class="text-xl text-gray-700 mb-2 flex items-center">
        <i class="fas fa-plus mr-3 text-primary"></i>Tambah Galeri
    </h2>
    <p class="text-gray-600">Tambahkan dokumentasi kegiatan, fasilitas, atau prestasi baru</p>
</div>

<!-- Flash Messages -->
<?php if (session()->getFlashdata('errors')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
        <div class="flex items-center">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <div>
                <strong>Terjadi kesalahan:</strong>
                <ul class="mt-1 list-disc list-inside">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
        <div class="flex items-center">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <?= session()->getFlashdata('error') ?>
        </div>
    </div>
<?php endif; ?>

<!-- Form Container -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <form action="<?= base_url('admin/galeri/simpan') ?>" method="post" enctype="multipart/form-data">
        <div class="p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Form Fields -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="judul" 
                               name="judul" 
                               value="<?= old('judul') ?>" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea id="deskripsi" 
                                  name="deskripsi" 
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200 resize-vertical"><?= old('deskripsi') ?></textarea>
                    </div>

                    <!-- Kategori dan Tanggal -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select id="kategori" 
                                    name="kategori" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                                <option value="">Pilih Kategori</option>
                                <option value="kegiatan" <?= old('kategori') == 'kegiatan' ? 'selected' : '' ?>>Kegiatan</option>
                                <option value="fasilitas" <?= old('kategori') == 'fasilitas' ? 'selected' : '' ?>>Fasilitas</option>
                                <option value="prestasi" <?= old('kategori') == 'prestasi' ? 'selected' : '' ?>>Prestasi</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tanggal
                            </label>
                            <input type="date" 
                                   id="tanggal" 
                                   name="tanggal" 
                                   value="<?= old('tanggal', date('Y-m-d')) ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                            Status
                        </label>
                        <select id="status" 
                                name="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                            <option value="aktif" <?= old('status', 'aktif') == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= old('status') == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                    </div>
                </div>

                <!-- Right Column - Image Upload -->
                <div class="space-y-6">
                    <!-- Image Upload Section -->
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-image mr-2 text-primary"></i>Gambar
                        </h3>
                        
                        <!-- File Input -->
                        <div class="mb-4">
                            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                                Upload Gambar
                            </label>
                            <div class="relative">
                                <input type="file" 
                                       id="gambar" 
                                       name="gambar" 
                                       accept="image/*" 
                                       onchange="previewImage(this)"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                            </div>
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                Format: JPG, PNG, GIF. Maksimal 2MB
                            </p>
                        </div>

                        <!-- Preview New Image -->
                        <div id="imagePreview" class="hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Preview Gambar
                            </label>
                            <div class="relative group">
                                <img id="previewImg" 
                                     src="" 
                                     alt="Preview" 
                                     class="w-full h-48 object-cover rounded-lg border border-gray-200 shadow-sm">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                                    <span class="opacity-0 group-hover:opacity-100 text-white text-sm font-medium transition-opacity duration-200">
                                        <i class="fas fa-eye mr-1"></i>Preview
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <a href="<?= base_url('admin/galeri') ?>" 
                   class="flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <button type="submit" 
                        class="flex items-center px-6 py-3 bg-primary-dark hover:bg-primary text-white rounded-lg font-medium transition-colors duration-200">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Galeri
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
            preview.classList.add('block');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
        preview.classList.remove('block');
    }
}
</script>
<?= $this->endSection() ?>
