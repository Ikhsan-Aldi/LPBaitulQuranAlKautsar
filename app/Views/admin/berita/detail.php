<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Detail Berita</h1>
            <p class="text-gray-600 mt-2">Lihat detail lengkap berita</p>
        </div>
        <a href="<?= base_url('admin/berita') ?>" 
           class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Content -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Featured Image -->
        <?php if (!empty($berita['foto'])): ?>
            <div class="relative">
                <img src="<?= base_url('admin/berita/image/' . $berita['foto']); ?>" 
                     alt="<?= esc($berita['judul']) ?>" 
                     class="w-full h-96 object-cover">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="absolute top-6 left-6">
                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                        Berita
                    </span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Content Section -->
        <div class="p-8">
            <!-- Judul -->
            <h1 class="text-3xl font-bold text-gray-900 mb-4 font-amiri"><?= esc($berita['judul']) ?></h1>
            
            <!-- Meta Information -->
            <div class="flex flex-wrap items-center gap-6 mb-6 pb-6 border-b border-gray-200">
                <!-- Penulis -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                        <i class="fa fa-user text-primary"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Penulis</p>
                        <p class="font-semibold text-gray-700"><?= esc($berita['penulis']) ?></p>
                    </div>
                </div>
                
                <!-- Tanggal -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center">
                        <i class="fa fa-calendar text-blue-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Publikasi</p>
                        <p class="font-semibold text-gray-700"><?= date('d F Y', strtotime($berita['created_at'])) ?></p>
                    </div>
                </div>
                
                <!-- Waktu -->
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center">
                        <i class="fa fa-clock text-green-500"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Waktu</p>
                        <p class="font-semibold text-gray-700"><?= date('H:i', strtotime($berita['created_at'])) ?> WIB</p>
                    </div>
                </div>
            </div>

            <!-- Ringkasan -->
            <?php if (!empty($berita['excerpt'])): ?>
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">Ringkasan</h2>
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <p class="text-gray-700 leading-relaxed"><?= $berita['excerpt'] ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Isi Berita -->
            <div class="prose max-w-none">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Konten Berita</h2>
                <div class="text-gray-700 leading-relaxed">
                    <?= $berita['isi'] ?>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="<?= base_url('admin/berita') ?>" 
                   class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-semibold transition-all duration-200 flex items-center space-x-2">
                    <i class="fa fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
                <a href="<?= base_url('admin/berita/edit/' . $berita['id_berita']) ?>" 
                   class="px-6 py-3 bg-primary hover:bg-primary-dark text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                    <i class="fa fa-edit"></i>
                    <span>Edit Berita</span>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.prose {
    line-height: 1.75;
}

.prose h1, .prose h2, .prose h3, .prose h4 {
    color: #1f2937;
    font-weight: 600;
    margin-top: 1.5em;
    margin-bottom: 0.5em;
}

.prose h2 {
    font-size: 1.5em;
}

.prose p {
    margin-bottom: 1em;
}

.prose ul, .prose ol {
    margin-bottom: 1em;
    padding-left: 1.5em;
}

.prose li {
    margin-bottom: 0.5em;
}

.prose img {
    border-radius: 0.75rem;
    margin: 1.5em 0;
}

.prose blockquote {
    border-left: 4px solid #3b82f6;
    padding-left: 1em;
    margin: 1.5em 0;
    font-style: italic;
    color: #6b7280;
}
</style>

<?= $this->endSection() ?>