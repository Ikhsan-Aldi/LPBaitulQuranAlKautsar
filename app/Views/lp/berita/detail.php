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
            <span class="text-gray-900 font-medium"><?= esc($berita['judul']) ?></span>
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

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    <div class="text-lg leading-8 space-y-6">
                        <?= nl2br(esc($berita['isi'])) ?>
                    </div>
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
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Berita Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- You can add related news items here -->
                <div class="text-center py-8 text-gray-500">
                    <i class="fa fa-newspaper text-4xl mb-4"></i>
                    <p>Tidak ada berita lainnya saat ini</p>
                </div>
            </div>
        </div>
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
.prose {
    color: #374151;
}

.prose p {
    margin-bottom: 1.5em;
    line-height: 1.8;
}

.prose strong {
    color: #111827;
    font-weight: 600;
}
</style>

<?= $this->endSection() ?>