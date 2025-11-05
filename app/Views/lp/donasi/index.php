<?= $this->extend('lp/layout') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative min-h-[30vh] sm:min-h-[40vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Donasi Pondok Pesantren" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-white mb-3 sm:mb-4 arabic-font">
                Donasi untuk Pondok Pesantren
            </h1>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-white/90 leading-relaxed">
                Bantu kami membangun generasi Qur'ani melalui donasi Anda. Setiap kontribusi sangat berarti untuk kemajuan pendidikan Islam.
            </p>
        </div>
    </div>
</section>

<!-- Notifikasi Flash -->
<section class="py-4 sm:py-6 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6 shadow-sm animate-pulse">
                <div class="flex items-center justify-center space-x-2">
                    <i class="fas fa-check-circle text-green-500 text-lg"></i>
                    <span class="text-green-700 font-medium text-sm sm:text-base"><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 shadow-sm">
                <div class="flex items-center justify-center space-x-2">
                    <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                    <span class="text-red-700 font-medium text-sm sm:text-base"><?= session()->getFlashdata('error') ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Rekening Tujuan Section -->
<section class="py-8 sm:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-8 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#017077] mb-3 sm:mb-4 arabic-font">
                Rekening Tujuan Donasi
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base md:text-lg">
                Pilih salah satu rekening di bawah ini untuk transfer donasi Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
            <?php if (!empty($rekening_donasi)): ?>
                <?php foreach ($rekening_donasi as $r): ?>
                    <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 border border-[#017077]/10">
                        <div class="text-center">
                            <?php if ($r['jenis'] === 'qris' && $r['gambar']): ?>
                                <div class="mb-4 sm:mb-6">
                                    <img src="<?= base_url('file/rekening/' . $r['gambar']) ?>" 
                                         alt="QRIS <?= esc($r['bank']) ?>" 
                                         class="mx-auto w-32 h-32 sm:w-40 sm:h-40 object-contain rounded-lg border-2 border-gray-200 shadow-sm">
                                    <p class="text-xs sm:text-sm text-gray-500 mt-2">Scan QRIS untuk donasi</p>
                                </div>
                            <?php else: ?>
                                <div class="bg-[#017077]/10 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                                    <i class="fas fa-university text-[#017077] text-xl sm:text-2xl"></i>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="text-lg sm:text-xl font-bold text-[#017077] mb-2"><?= esc($r['bank']) ?></h3>
                            
                            <?php if ($r['jenis'] !== 'qris'): ?>
                                <div class="space-y-2 mb-3 sm:mb-4">
                                    <p class="text-gray-600 text-sm">Nomor Rekening:</p>
                                    <p class="font-mono font-bold text-green-600 text-lg sm:text-xl tracking-wide">
                                        <?= esc($r['nomor_rekening']) ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            
                            <div class="space-y-1">
                                <p class="text-gray-700 text-sm sm:text-base">
                                    <span class="font-semibold">a.n.</span> <?= esc($r['atas_nama']) ?>
                                </p>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-medium 
                                    <?= $r['status'] == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?>">
                                    <?= esc($r['status']) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-8 sm:py-12">
                    <div class="bg-white rounded-xl shadow-lg p-8 sm:p-12">
                        <div class="text-gray-400 text-5xl sm:text-6xl mb-4">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl font-medium text-gray-600 mb-2">Belum ada rekening aktif</h3>
                        <p class="text-gray-500 text-sm sm:text-base">Silakan hubungi admin untuk informasi donasi</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Form Donasi Section -->
<section class="py-8 sm:py-12 md:py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="bg-gradient-to-r from-[#017077] to-[#005359] rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header Form -->
            <div class="bg-white/10 backdrop-blur-sm p-6 sm:p-8 text-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3 sm:mb-4 arabic-font">
                    Formulir Donasi
                </h2>
                <p class="text-white/90 text-sm sm:text-base md:text-lg max-w-2xl mx-auto">
                    Isi form di bawah ini untuk mengirimkan donasi Anda. Kami sangat menghargai setiap kontribusi.
                </p>
            </div>

            <!-- Form Content -->
            <div class="bg-white p-6 sm:p-8 md:p-12">
                <form action="<?= base_url('donasi/upload') ?>" method="post" enctype="multipart/form-data" class="space-y-6 sm:space-y-8">
                    <!-- Nama Donatur -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3 text-sm sm:text-base">
                            Nama Donatur <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_donatur" required
                               class="w-full border border-gray-300 rounded-xl p-3 sm:p-4 focus:ring-2 focus:ring-[#017077] focus:border-[#017077] transition-all duration-200 text-sm sm:text-base"
                               placeholder="Masukkan nama lengkap donatur">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3 text-sm sm:text-base">
                            Email (opsional)
                        </label>
                        <input type="email" name="email"
                               class="w-full border border-gray-300 rounded-xl p-3 sm:p-4 focus:ring-2 focus:ring-[#017077] focus:border-[#017077] transition-all duration-200 text-sm sm:text-base"
                               placeholder="email@contoh.com">
                    </div>

                    <!-- Nominal Donasi -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3 text-sm sm:text-base">
                            Nominal Donasi (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="nominal" required min="1000"
                               class="w-full border border-gray-300 rounded-xl p-3 sm:p-4 focus:ring-2 focus:ring-[#017077] focus:border-[#017077] transition-all duration-200 text-sm sm:text-base"
                               placeholder="Contoh: 100000">
                        <p class="text-gray-500 text-xs sm:text-sm mt-2">Minimal donasi: Rp 1.000</p>
                    </div>

                    <!-- Pesan atau Doa -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3 text-sm sm:text-base">
                            Pesan atau Doa (opsional)
                        </label>
                        <textarea name="pesan" rows="4"
                                  class="w-full border border-gray-300 rounded-xl p-3 sm:p-4 focus:ring-2 focus:ring-[#017077] focus:border-[#017077] transition-all duration-200 text-sm sm:text-base resize-none"
                                  placeholder="Tuliskan pesan atau doa untuk pondok pesantren..."></textarea>
                    </div>

                    <!-- Upload Bukti Transfer -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-3 text-sm sm:text-base">
                            Upload Bukti Transfer <span class="text-red-500">*</span>
                        </label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-xl p-4 sm:p-6 text-center hover:border-[#017077] transition-colors duration-200">
                            <input type="file" name="bukti" accept=".jpg,.jpeg,.png,.pdf" required
                                   class="w-full opacity-0 absolute cursor-pointer"
                                   onchange="previewFile(this)">
                            <div id="fileUploadContent" class="pointer-events-none">
                                <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl sm:text-3xl mb-3"></i>
                                <p class="text-gray-600 font-medium text-sm sm:text-base mb-1">
                                    Klik untuk upload bukti transfer
                                </p>
                                <p class="text-gray-500 text-xs sm:text-sm">
                                    Format: JPG, PNG, atau PDF (max 5MB)
                                </p>
                            </div>
                            <div id="filePreview" class="hidden mt-4">
                                <div class="flex items-center justify-center space-x-3 bg-green-50 border border-green-200 rounded-lg p-3">
                                    <i class="fas fa-check-circle text-green-500"></i>
                                    <span class="text-green-700 text-sm sm:text-base font-medium" id="fileName">File terpilih</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center pt-4">
                        <button type="submit"
                                class="bg-gradient-to-r from-[#017077] to-[#005359] hover:from-[#005359] hover:to-[#017077] text-white font-bold px-8 sm:px-12 py-3 sm:py-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 text-sm sm:text-base">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Donasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Informasi Tambahan -->
<section class="py-8 sm:py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            <!-- Info 1 -->
            <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                <div class="bg-[#017077]/10 w-12 h-12 sm:w-14 sm:h-14 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-[#017077] text-lg sm:text-xl"></i>
                </div>
                <h3 class="font-bold text-[#017077] mb-2 text-sm sm:text-base">Transparan & Aman</h3>
                <p class="text-gray-600 text-xs sm:text-sm">Donasi dikelola dengan sistem yang transparan dan akuntabel</p>
            </div>

            <!-- Info 2 -->
            <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                <div class="bg-[#017077]/10 w-12 h-12 sm:w-14 sm:h-14 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hand-holding-heart text-[#017077] text-lg sm:text-xl"></i>
                </div>
                <h3 class="font-bold text-[#017077] mb-2 text-sm sm:text-base">Dampak Langsung</h3>
                <p class="text-gray-600 text-xs sm:text-sm">Donasi digunakan langsung untuk program pendidikan santri</p>
            </div>

            <!-- Info 3 -->
            <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                <div class="bg-[#017077]/10 w-12 h-12 sm:w-14 sm:h-14 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-receipt text-[#017077] text-lg sm:text-xl"></i>
                </div>
                <h3 class="font-bold text-[#017077] mb-2 text-sm sm:text-base">Laporan Rutin</h3>
                <p class="text-gray-600 text-xs sm:text-sm">Laporan penggunaan donsai tersedia secara berkala</p>
            </div>
        </div>
    </div>
</section>

<script>
// File upload preview functionality
function previewFile(input) {
    const fileUploadContent = document.getElementById('fileUploadContent');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        fileName.textContent = file.name;
        fileUploadContent.classList.add('hidden');
        filePreview.classList.remove('hidden');
    } else {
        fileUploadContent.classList.remove('hidden');
        filePreview.classList.add('hidden');
    }
}

// Reset file input when page loads
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.querySelector('input[type="file"]');
    if (fileInput) {
        fileInput.value = '';
    }
});

// Add animation on scroll
function animateOnScroll() {
    const elements = document.querySelectorAll('.bg-white.rounded-xl');
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.style.opacity = "1";
            element.style.transform = "translateY(0)";
        }
    });
}

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.bg-white.rounded-xl');
    elements.forEach(element => {
        element.style.opacity = "0";
        element.style.transform = "translateY(20px)";
        element.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    });
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Initial check
});
</script>

<style>
.arabic-font {
    font-family: 'Traditional Arabic', 'Scheherazade New', 'Lateef', serif;
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

/* Custom file upload styling */
input[type="file"] {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    cursor: pointer;
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

/* Hover effects */
.hover-lift:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}
</style>

<?= $this->endSection() ?>