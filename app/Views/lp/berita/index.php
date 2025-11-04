<?= $this->extend('lp/layout') ?>
<?= $this->section('content') ?>

<section class="py-16 bg-gradient-to-br from-primary/5 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4 font-amiri">Berita Terkini</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Informasi terbaru seputar kegiatan dan perkembangan Pondok Pesantren
            </p>
            <div class="w-24 h-1 bg-primary mx-auto mt-6 rounded-full"></div>
        </div>

        <?php if (empty($berita)): ?>
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="bg-white rounded-2xl shadow-sm p-8 max-w-md mx-auto">
                    <i class="fa fa-newspaper text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Berita</h3>
                    <p class="text-gray-500">Saat ini belum ada berita yang dipublikasikan.</p>
                </div>
            </div>
        <?php else: ?>
            <!-- Grid Berita -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($berita as $item): ?>
                    <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden">
                            <img src="<?= base_url('file/berita/' . esc($item['foto'])); ?>" 
                                 alt="<?= esc($item['judul']) ?>" 
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 left-4">
                                <span class="bg-[#017077] text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    Berita
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-primary transition-colors duration-200">
                                <?= esc($item['judul']) ?>
                            </h3>
                            
                            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                <?= strip_tags($item['isi']) ?>
                            </p>

                            <!-- Meta Info -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <div class="flex items-center space-x-1">
                                        <i class="fa fa-user text-primary"></i>
                                        <span><?= esc($item['penulis']) ?></span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <i class="fa fa-calendar text-primary"></i>
                                        <span><?= date('d M Y', strtotime($item['created_at'])) ?></span>
                                    </div>
                                </div>
                                
                                <a href="<?= base_url('berita/'.$item['slug']) ?>" 
                                   class="inline-flex items-center text-primary hover:text-primary-dark font-semibold text-sm transition-colors duration-200 group/link">
                                    Baca Selengkapnya
                                    <i class="fa fa-arrow-right ml-2 transform group-hover/link:translate-x-1 transition-transform duration-200"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<?= $this->endSection() ?>