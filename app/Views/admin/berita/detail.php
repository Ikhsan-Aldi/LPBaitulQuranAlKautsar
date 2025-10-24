<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Detail Berita</h1>
            <p class="text-gray-600 mt-2">Informasi lengkap berita</p>
        </div>
        <div class="flex items-center space-x-3 mt-4 md:mt-0">
            <a href="<?= base_url('admin/berita/edit/'.$berita['id_berita']) ?>" 
               class="bg-primary-light hover:bg-primary text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                <i class="fa fa-edit"></i>
                <span>Edit Berita</span>
            </a>
            <a href="<?= base_url('admin/berita') ?>" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                <i class="fa fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <!-- Alert Success -->
    <?php if (session()->getFlashdata('success')): ?>
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fa fa-check-circle text-green-500"></i>
                <span class="font-medium"><?= session()->getFlashdata('success') ?></span>
            </div>
            <button type="button" class="text-green-500 hover:text-green-700 transition-colors duration-200" onclick="this.parentElement.parentElement.remove()">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Article Content -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Featured Image -->
                <?php if (!empty($berita['foto'])): ?>
                    <div class="relative">
                        <img src="<?= base_url('uploads/berita/'.$berita['foto']) ?>" 
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

                <!-- Article Content -->
                <div class="p-8">
                    <!-- Header -->
                    <header class="mb-8 border-b border-gray-200 pb-6">
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-amiri leading-tight">
                            <?= esc($berita['judul']) ?>
                        </h1>
                        
                        <!-- Meta Information -->
                        <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600">
                            <div class="flex items-center space-x-2">
                                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                    <i class="fa fa-user text-primary"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">Penulis</p>
                                    <p><?= esc($berita['penulis']) ?></p>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                    <i class="fa fa-calendar text-primary"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">Dibuat</p>
                                    <p><?= date('d F Y H:i', strtotime($berita['created_at'] ?? $berita['tanggal'])) ?></p>
                                </div>
                            </div>

                            <?php if (isset($berita['updated_at'])): ?>
                            <div class="flex items-center space-x-2">
                                <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                                    <i class="fa fa-edit text-primary"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-700">Diupdate</p>
                                    <p><?= date('d F Y H:i', strtotime($berita['updated_at'])) ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </header>

                    <!-- Excerpt -->
                    <?php if (!empty($berita['excerpt'])): ?>
                    <div class="mb-8 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                        <h3 class="font-semibold text-blue-900 mb-2 flex items-center">
                            <i class="fa fa-quote-left mr-2 text-blue-500"></i>
                            Ringkasan Berita
                        </h3>
                        <p class="text-blue-800 leading-relaxed">
                            <?= strip_tags(html_entity_decode($berita['excerpt'], ENT_QUOTES, 'UTF-8')) ?>
                        </p>
                    </div>
                    <?php else: ?>
                    <!-- Fallback: Generate excerpt dari isi berita jika excerpt kosong -->
                    <div class="mb-8 p-4 bg-gray-50 border border-gray-200 rounded-xl">
                        <h3 class="font-semibold text-gray-700 mb-2 flex items-center">
                            <i class="fa fa-quote-left mr-2 text-gray-500"></i>
                            Ringkasan Berita (Otomatis)
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            <?php
                            $autoExcerpt = strip_tags($berita['isi']);
                            $autoExcerpt = html_entity_decode($autoExcerpt, ENT_QUOTES, 'UTF-8');
                            $autoExcerpt = preg_replace('/\s+/', ' ', $autoExcerpt);
                            echo mb_substr(trim($autoExcerpt), 0, 200) . '...';
                            ?>
                        </p>
                    </div>
                    <?php endif; ?>

                    <!-- Article Body -->
                    <div class="ql-editor-content text-gray-700 leading-relaxed text-lg">
                        <?= $berita['isi'] ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Actions Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fa fa-cog mr-2 text-primary"></i>
                    Aksi
                </h3>
                <div class="space-y-3">
                    <a href="<?= base_url('admin/berita/edit/'.$berita['id_berita']) ?>" 
                       class="w-full bg-primary hover:bg-primary-dark text-white px-4 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-edit"></i>
                        <span>Edit Berita</span>
                    </a>
                    
                    <a href="<?= base_url('admin/berita/delete/'.$berita['id_berita']) ?>" 
                       class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center justify-center space-x-2"
                       onclick="return confirm('Yakin ingin menghapus berita <?= esc($berita['judul']) ?>?')">
                        <i class="fa fa-trash"></i>
                        <span>Hapus Berita</span>
                    </a>

                    <button onclick="window.print()" 
                            class="w-full bg-gray-500 hover:bg-gray-600 text-white px-4 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-print"></i>
                        <span>Cetak</span>
                    </button>

                    <a href="<?= base_url('berita/'.$berita['slug']) ?>" 
                       target="_blank"
                       class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-3 rounded-xl font-semibold transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-eye"></i>
                        <span>Lihat di Website</span>
                    </a>
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fa fa-info-circle mr-2 text-primary"></i>
                    Informasi
                </h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">ID Berita:</span>
                        <span class="font-semibold text-gray-800">#<?= $berita['id_berita'] ?></span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Slug:</span>
                        <span class="font-semibold text-gray-800 text-xs"><?= esc($berita['slug']) ?></span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-gray-600">Status:</span>
                        <span class="font-semibold text-green-600">Published</span>
                    </div>
                    <?php if (!empty($berita['foto'])): ?>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-600">File Foto:</span>
                        <span class="font-semibold text-gray-800 text-xs"><?= esc($berita['foto']) ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fa fa-chart-bar mr-2 text-primary"></i>
                    Statistik
                </h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fa fa-eye text-blue-500"></i>
                            <span class="text-gray-600">Dilihat</span>
                        </div>
                        <span class="font-semibold text-blue-600">0</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fa fa-share-alt text-green-500"></i>
                            <span class="text-gray-600">Dibagikan</span>
                        </div>
                        <span class="font-semibold text-green-600">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.ql-editor-content {
    font-size: 1.125rem;
    line-height: 1.7;
}

.ql-editor-content h1,
.ql-editor-content h2,
.ql-editor-content h3 {
    font-weight: bold;
    margin-top: 1.5em;
    margin-bottom: 0.5em;
    color: #111827;
}

.ql-editor-content h1 {
    font-size: 1.875rem;
}

.ql-editor-content h2 {
    font-size: 1.5rem;
}

.ql-editor-content h3 {
    font-size: 1.25rem;
}

.ql-editor-content p {
    margin-bottom: 1.2em;
}

.ql-editor-content ul, 
.ql-editor-content ol {
    margin-bottom: 1.2em;
    padding-left: 1.5em;
}

.ql-editor-content li {
    margin-bottom: 0.5em;
}

.ql-editor-content strong {
    font-weight: 600;
    color: #111827;
}

.ql-editor-content em {
    font-style: italic;
}

.ql-editor-content u {
    text-decoration: underline;
}

.ql-editor-content a {
    color: #017077;
    text-decoration: underline;
}

.ql-editor-content a:hover {
    color: #015c61;
}

.ql-editor-content blockquote {
    border-left: 4px solid #017077;
    padding-left: 1em;
    margin: 1.5em 0;
    font-style: italic;
    color: #6b7280;
}

.ql-editor-content .ql-align-center {
    text-align: center;
}

.ql-editor-content .ql-align-right {
    text-align: right;
}

.ql-editor-content .ql-align-justify {
    text-align: justify;
}

@media print {
    .no-print {
        display: none !important;
    }
}
</style>

<?= $this->endSection() ?>