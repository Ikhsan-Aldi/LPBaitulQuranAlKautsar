<?= $this->extend('lp/layout') ?>
<?= $this->section('content') ?>

<section class="py-16 bg-gradient-to-br from-primary/5 to-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-600 mb-8">
            <a href="<?= base_url() ?>" class="hover:text-primary transition-colors duration-200">Beranda</a>
            <i class="fa fa-chevron-right text-xs"></i>
            <a href="<?= base_url('berita') ?>" class="hover:text-primary transition-colors duration-200">Berita</a>
            <i class="fa fa-chevron-right text-xs"></i>
            <span class="text-gray-900 font-medium line-clamp-1"><?= esc($berita['judul']) ?></span>
        </nav>

        <!-- Article Card -->
        <article class="bg-white rounded-2xl shadow-xl overflow-hidden">
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
            <div class="p-8 lg:p-10">
                <!-- Header -->
                <header class="mb-8">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 font-amiri leading-tight">
                        <?= esc($berita['judul']) ?>
                    </h1>
                    
                    <!-- Meta Information -->
                    <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600 mb-6">
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
                                <p class="font-semibold text-gray-700">Diterbitkan</p>
                                <p><?= date('d F Y', strtotime($berita['created_at'])) ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-20 h-1 bg-primary rounded-full"></div>
                </header>

                <!-- Article Body - PERBAIKAN DI SINI -->
                <div class="ql-editor-content text-gray-700 leading-relaxed text-lg">
                    <?= $berita['isi'] ?>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-8 mt-8 border-t border-gray-200">
                    <a href="<?= base_url('berita') ?>" 
                       class="inline-flex items-center text-gray-600 hover:text-primary font-semibold transition-colors duration-200 group">
                        <i class="fa fa-arrow-left mr-3 transform group-hover:-translate-x-1 transition-transform duration-200"></i>
                        Kembali ke Berita
                    </a>
                    
                    <div class="flex items-center space-x-4">
                        <button onclick="window.print()" 
                                class="inline-flex items-center text-gray-600 hover:text-primary transition-colors duration-200">
                            <i class="fa fa-print mr-2"></i>
                            Cetak
                        </button>
                        <button onclick="shareBerita()" 
                                class="inline-flex items-center text-gray-600 hover:text-primary transition-colors duration-200">
                            <i class="fa fa-share-alt mr-2"></i>
                            Bagikan
                        </button>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related News Section -->
        <?php if (isset($related_news) && !empty($related_news)): ?>
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($related_news as $related): ?>
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <?php if (!empty($related['foto'])): ?>
                    <img src="<?= base_url('uploads/berita/'.$related['foto']) ?>" 
                         alt="<?= esc($related['judul']) ?>" 
                         class="w-full h-40 object-cover">
                    <?php endif; ?>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">
                            <a href="<?= base_url('berita/'.$related['slug']) ?>" class="hover:text-primary transition-colors duration-200">
                                <?= esc($related['judul']) ?>
                            </a>
                        </h3>
                        <p class="text-sm text-gray-500">
                            <?= date('d M Y', strtotime($related['created_at'])) ?>
                        </p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <?php else: ?>
        <div class="mt-16 text-center py-8 text-gray-500">
            <i class="fa fa-newspaper text-4xl mb-4"></i>
            <p>Tidak ada berita lainnya saat ini</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
function shareBerita() {
    if (navigator.share) {
        navigator.share({
            title: '<?= esc($berita['judul']) ?>',
            text: '<?= strip_tags($berita['isi']) ?>',
            url: window.location.href
        })
        .then(() => console.log('Berhasil dibagikan'))
        .catch((error) => console.log('Error sharing:', error));
    } else {
        // Fallback untuk browser yang tidak support Web Share API
        navigator.clipboard.writeText(window.location.href);
        alert('Link berita telah disalin ke clipboard!');
    }
}
</script>

<style>
/* Styling untuk konten dari Quill.js */
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

.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<?= $this->endSection() ?>