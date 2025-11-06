<?= $this->extend('lp/layout') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative min-h-[30vh] sm:min-h-[40vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Berita Pondok Pesantren" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-white mb-3 sm:mb-4 arabic-font">
                Berita Terkini
            </h1>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-white/90 leading-relaxed">
                Informasi terbaru seputar kegiatan dan perkembangan Pondok Pesantren
            </p>
        </div>
    </div>
</section>

<!-- Berita Section -->
<section class="py-8 sm:py-12 md:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <?php if (empty($berita)): ?>
            <!-- Empty State -->
            <div class="text-center py-12 sm:py-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 sm:p-12 max-w-md mx-auto">
                    <div class="text-gray-400 text-5xl sm:text-6xl mb-4">
                        <i class="fa fa-newspaper"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-medium text-gray-600 mb-2">Belum Ada Berita</h3>
                    <p class="text-gray-500 text-sm sm:text-base">Saat ini belum ada berita yang dipublikasikan.</p>
                </div>
            </div>
        <?php else: ?>
            <!-- Grid Berita -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
                <?php foreach ($berita as $item): ?>
                    <article class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group border border-[#017077]/10">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden">
                            <img src="<?= base_url('file/berita/' . esc($item['foto'])); ?>" 
                                 alt="<?= esc($item['judul']) ?>" 
                                 class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-3 sm:top-4 left-3 sm:left-4">
                                <span class="bg-[#017077] text-white px-2 sm:px-3 py-1 rounded-full text-xs font-semibold shadow-sm">
                                    Berita
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-4 sm:p-6">
                            <h3 class="text-base sm:text-lg md:text-xl font-bold text-gray-900 mb-2 sm:mb-3 line-clamp-2 group-hover:text-[#017077] transition-colors duration-200 leading-tight">
                                <?= esc($item['judul']) ?>
                            </h3>
                            
                            <p class="text-gray-600 text-xs sm:text-sm leading-relaxed mb-3 sm:mb-4 line-clamp-3">
                                <?= strip_tags($item['isi']) ?>
                            </p>

                            <!-- Meta Info -->
                            <div class="flex items-center justify-between pt-3 sm:pt-4 border-t border-gray-100">
                                <div class="flex items-center space-x-2 sm:space-x-3 text-xs sm:text-sm text-gray-500">
                                    <div class="flex items-center space-x-1">
                                        <i class="fa fa-user text-[#017077] text-xs"></i>
                                        <span class="hidden sm:inline"><?= esc($item['penulis']) ?></span>
                                        <span class="sm:hidden"><?= esc(substr($item['penulis'], 0, 8)) ?>...</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <i class="fa fa-calendar text-[#017077] text-xs"></i>
                                        <span><?= date('d M Y', strtotime($item['created_at'])) ?></span>
                                    </div>
                                </div>
                                
                                <a href="<?= base_url('berita/'.$item['slug']) ?>" 
                                   class="inline-flex items-center text-[#017077] hover:text-[#005359] font-semibold text-xs sm:text-sm transition-all duration-200 group/link">
                                    Baca
                                    <i class="fa fa-arrow-right ml-1 sm:ml-2 transform group-hover/link:translate-x-1 transition-transform duration-200 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- Load More Button (Optional) -->
            <div class="text-center mt-8 sm:mt-12">
                <button class="bg-white hover:bg-gray-50 text-[#017077] border border-[#017077] font-semibold px-6 sm:px-8 py-3 sm:py-4 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
                    <i class="fa fa-refresh mr-2"></i>
                    Muat Lebih Banyak
                </button>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
// Animation on scroll
function animateOnScroll() {
    const articles = document.querySelectorAll('article');
    articles.forEach(article => {
        const articleTop = article.getBoundingClientRect().top;
        const articleVisible = 150;
        
        if (articleTop < window.innerHeight - articleVisible) {
            article.style.opacity = "1";
            article.style.transform = "translateY(0)";
        }
    });
}

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    const articles = document.querySelectorAll('article');
    articles.forEach(article => {
        article.style.opacity = "0";
        article.style.transform = "translateY(20px)";
        article.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    });
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Initial check
});

// Load more functionality (placeholder)
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.querySelector('button');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            this.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i>Memuat...';
            this.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                this.innerHTML = '<i class="fa fa-refresh mr-2"></i>Muat Lebih Banyak';
                this.disabled = false;
                alert('Fitur load more akan diimplementasikan');
            }, 1000);
        });
    }
});
</script>

<style>
.arabic-font {
    font-family: 'Traditional Arabic', 'Scheherazade New', 'Lateef', serif;
}

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

/* Smooth animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

/* Hover effects */
.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .arabic-font {
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .arabic-font {
        font-size: 1.25rem;
    }
}

/* Custom gradient overlay */
.gradient-overlay {
    background: linear-gradient(45deg, #017077, #005359);
}

/* Card hover effects */
.hover-lift:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}
</style>

<?= $this->endSection() ?>