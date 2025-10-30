<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- ✅ Toast Notifications (di luar section form) -->
<?php if (session('success')) : ?>
    <div id="alert-success" 
        class="fixed top-16 sm:top-20 right-2 sm:right-4 md:right-6 z-[9999] flex items-center justify-between bg-green-100 border border-green-400 text-green-700 px-3 py-2 sm:px-4 sm:py-3 rounded-lg shadow-lg transition-all duration-500 max-w-xs sm:max-w-sm mx-2 sm:mx-0">
        <div class="flex items-center space-x-2">
            <i class="fas fa-check-circle text-sm sm:text-base"></i>
            <span class="text-xs sm:text-sm"><?= session('success') ?></span>
        </div>
        <button onclick="closeAlert('alert-success')" class="text-green-700 hover:text-green-900 focus:outline-none ml-2">
            <i class="fas fa-times text-xs sm:text-sm"></i>
        </button>
    </div>
<?php elseif (session('error')) : ?>
    <div id="alert-error" 
        class="fixed top-20 sm:top-24 right-2 sm:right-4 md:right-6 z-50 flex items-center justify-between bg-red-100 border border-red-400 text-red-700 px-3 py-2 sm:px-4 sm:py-3 rounded-lg shadow-lg transition-all duration-500 max-w-xs sm:max-w-sm mx-2 sm:mx-0">
        <div class="flex items-center space-x-2">
            <i class="fas fa-exclamation-circle text-sm sm:text-base"></i>
            <span class="text-xs sm:text-sm"><?= session('error') ?></span>
        </div>
        <button onclick="closeAlert('alert-error')" class="text-red-700 hover:text-red-900 focus:outline-none ml-2">
            <i class="fas fa-times text-xs sm:text-sm"></i>
        </button>
    </div>
<?php endif; ?>

<style>
.contact-card {
  transition: all 0.3s ease;
}
.contact-card:hover {
  transform: translateY(-5px);
}

/* Mobile optimizations */
@media (max-width: 640px) {
  .contact-card:hover {
    transform: none; /* Disable hover effect on mobile for better UX */
  }
}
</style>

<!-- Hero Section -->
<section class="relative min-h-[30vh] sm:min-h-[35vh] md:min-h-[40vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Kontak Pesantren" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16 lg:py-20 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-3 sm:mb-4 md:mb-6 arabic-font">
                Hubungi Kami
            </h1>
            <p class="text-sm xs:text-base sm:text-lg md:text-xl text-white/90 leading-relaxed px-2">
                Mari berdiskusi dan bergabung bersama keluarga besar <br> Pesantren Baitul Qur'an Alkautsar
            </p>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section id="contact-info" class="py-8 sm:py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8">
            <!-- Phone -->
            <div class="contact-card bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8 hover:shadow-xl border border-[#017077]/10 text-center">
                <div class="bg-[#017077]/10 w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mb-4 sm:mb-6 mx-auto">
                    <i class="fas fa-phone-alt text-[#017077] text-lg sm:text-xl md:text-2xl"></i>
                </div>
                <h3 class="text-base sm:text-lg md:text-xl font-bold text-[#017077] mb-3 sm:mb-4">Telepon & WhatsApp</h3>
                <p class="text-gray-600 text-xs sm:text-sm mb-3 sm:mb-4">
                    Hubungi kami untuk konsultasi dan informasi pendaftaran
                </p>
                <div class="space-y-2">
                    <?php if(isset($kontak['whatsapp']) && !empty($kontak['whatsapp'])): ?>
                        <?php 
                        $whatsappClean = str_replace(['+', ' ', '-'], '', $kontak['whatsapp']);
                        $whatsappDisplay = format_phone_number($kontak['whatsapp']);
                        ?>
                        <a href="https://wa.me/<?= $whatsappClean ?>" 
                           class="block bg-green-600 text-white font-medium py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:bg-green-700 transition-colors duration-300 text-xs sm:text-sm md:text-base">
                            <i class="fab fa-whatsapp mr-1 sm:mr-2"></i><?= $whatsappDisplay ?>
                        </a>
                        <p class="text-xs text-gray-500">Klik untuk chat WhatsApp</p>
                    <?php else: ?>
                        <div class="bg-gray-200 text-gray-500 font-medium py-2 px-4 sm:py-3 sm:px-6 rounded-lg text-xs sm:text-sm md:text-base">
                            <i class="fab fa-whatsapp mr-1 sm:mr-2"></i>Belum tersedia
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Email -->
            <div class="contact-card bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8 hover:shadow-xl border border-[#017077]/10 text-center">
                <div class="bg-[#017077]/10 w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mb-4 sm:mb-6 mx-auto">
                    <i class="fas fa-envelope text-[#017077] text-lg sm:text-xl md:text-2xl"></i>
                </div>
                <h3 class="text-base sm:text-lg md:text-xl font-bold text-[#017077] mb-3 sm:mb-4">Email</h3>
                <p class="text-gray-600 text-xs sm:text-sm mb-3 sm:mb-4">
                    Kirim pertanyaan dan dokumen melalui email resmi kami
                </p>
                <div class="space-y-2">
                    <?php if(isset($kontak['email']) && !empty($kontak['email'])): ?>
                        <a href="mailto:<?= $kontak['email'] ?>" 
                           class="block bg-[#017077] text-white font-medium py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:bg-[#005359] transition-colors duration-300 text-xs sm:text-sm md:text-base break-all">
                            <i class="fas fa-envelope mr-1 sm:mr-2"></i><?= htmlspecialchars($kontak['email']) ?>
                        </a>
                        <p class="text-xs text-gray-500">Hubungi Kami</p>
                    <?php else: ?>
                        <div class="bg-gray-200 text-gray-500 font-medium py-2 px-4 sm:py-3 sm:px-6 rounded-lg text-xs sm:text-sm md:text-base">
                            <i class="fas fa-envelope mr-1 sm:mr-2"></i>Belum tersedia
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Social Media -->
            <div class="contact-card bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8 hover:shadow-xl border border-[#017077]/10 text-center">
                <div class="bg-[#017077]/10 w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center mb-4 sm:mb-6 mx-auto">
                    <i class="fas fa-hashtag text-[#017077] text-lg sm:text-xl md:text-2xl"></i>
                </div>
                <h3 class="text-base sm:text-lg md:text-xl font-bold text-[#017077] mb-3 sm:mb-4">Media Sosial</h3>
                <p class="text-gray-600 text-xs sm:text-sm mb-3 sm:mb-4">
                    Ikuti update terbaru dan kegiatan pesantren di media sosial
                </p>
                <div class="space-y-2 sm:space-y-3">
                    <?php 
                    $socialMediaAvailable = false;
                    
                    // Instagram
                    if(isset($kontak['instagram']) && !empty($kontak['instagram'])): 
                        $socialMediaAvailable = true;
                        $instagramUrl = $kontak['instagram'];
                        $instagramUsername = $instagramUrl;
                        
                        // Extract username from URL
                        if (filter_var($instagramUrl, FILTER_VALIDATE_URL)) {
                            $path = parse_url($instagramUrl, PHP_URL_PATH);
                            $instagramUsername = ltrim($path, '/');
                            // Remove trailing slash if exists
                            $instagramUsername = rtrim($instagramUsername, '/');
                        }
                    ?>
                        <a href="<?= $instagramUrl ?>" target="_blank"
                        class="block bg-gradient-to-r from-purple-600 to-pink-600 text-white font-medium py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-colors duration-300 text-xs sm:text-sm md:text-base">
                            <i class="fab fa-instagram mr-1 sm:mr-2"></i><?= $instagramUsername ?>
                        </a>
                        <p class="text-xs text-gray-500">Instagram Official</p>
                    <?php endif; ?>
                    
                    <!-- Facebook -->
                    <?php if(isset($kontak['facebook']) && !empty($kontak['facebook'])): 
                        $socialMediaAvailable = true;
                    ?>
                        <a href="<?= $kontak['facebook'] ?>" target="_blank"
                        class="block bg-blue-600 text-white font-medium py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:bg-blue-700 transition-colors duration-300 text-xs sm:text-sm md:text-base">
                            <i class="fab fa-facebook mr-1 sm:mr-2"></i>Facebook
                        </a>
                        <p class="text-xs text-gray-500">Facebook Page</p>
                    <?php endif; ?>
                    
                    <!-- TikTok -->
                    <?php if(isset($kontak['tiktok']) && !empty($kontak['tiktok'])): 
                        $socialMediaAvailable = true;
                        $tiktokUrl = $kontak['tiktok'];
                        $tiktokUsername = $tiktokUrl;
                        
                        // Extract username from URL
                        if (filter_var($tiktokUrl, FILTER_VALIDATE_URL)) {
                            $path = parse_url($tiktokUrl, PHP_URL_PATH);
                            $tiktokUsername = ltrim($path, '/');
                            $tiktokUsername = rtrim($tiktokUsername, '/');
                            // Remove @ if exists
                            $tiktokUsername = ltrim($tiktokUsername, '@');
                        }
                    ?>
                        <a href="<?= $tiktokUrl ?>" target="_blank"
                        class="block bg-gray-800 text-white font-medium py-2 px-4 sm:py-3 sm:px-6 rounded-lg hover:bg-gray-900 transition-colors duration-300 text-xs sm:text-sm md:text-base">
                            <i class="fab fa-tiktok mr-1 sm:mr-2"></i><?= $tiktokUsername ?>
                        </a>
                        <p class="text-xs text-gray-500">TikTok Official</p>
                    <?php endif; ?>
                    
                    <!-- Jika tidak ada social media sama sekali -->
                    <?php if(!$socialMediaAvailable): ?>
                        <div class="bg-gray-200 text-gray-500 font-medium py-2 px-4 sm:py-3 sm:px-6 rounded-lg text-xs sm:text-sm md:text-base">
                            <i class="fab fa-instagram mr-1 sm:mr-2"></i>Belum tersedia
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Location Section -->
<section class="py-12 sm:py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10 md:gap-12">
            <!-- Contact Form -->
            <div>
                <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8">
                    <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#017077] mb-4 sm:mb-6">Kirim Pesan</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-6 sm:mb-8">
                        Isi form berikut untuk mengirim pertanyaan atau permintaan informasi
                    </p>

                    <!-- Flash Message -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm sm:text-base">
                            <strong class="font-semibold">Gagal!</strong><br>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="mb-4 sm:mb-6 p-3 sm:p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm sm:text-base">
                            <strong class="font-semibold">Berhasil!</strong><br>
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?= base_url('kirim-pesan') ?>" method="post" class="space-y-4 sm:space-y-6">
                        <?= csrf_field() ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <div>
                                <label for="name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300 text-sm sm:text-base"
                                    placeholder="Masukkan nama lengkap" value="<?= old('name') ?>" required>
                            </div>
                            <div>
                                <label for="email" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300 text-sm sm:text-base"
                                    placeholder="email@contoh.com" value="<?= old('email') ?>" required>
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300 text-sm sm:text-base"
                                placeholder="+62 xxx xxxx xxxx" value="<?= old('phone') ?>" required>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Subjek</label>
                            <select id="subject" name="subject"
                                    class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300 text-sm sm:text-base" required>
                                <option value="">Pilih subjek pesan</option>
                                <option value="pendaftaran" <?= old('subject') == 'pendaftaran' ? 'selected' : '' ?>>Informasi Pendaftaran</option>
                                <option value="program" <?= old('subject') == 'program' ? 'selected' : '' ?>>Informasi Program</option>
                                <option value="beasiswa" <?= old('subject') == 'beasiswa' ? 'selected' : '' ?>>Informasi Beasiswa</option>
                                <option value="lainnya" <?= old('subject') == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1 sm:mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="4" sm:rows="5"
                                    class="w-full px-3 py-2 sm:px-4 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300 text-sm sm:text-base"
                                    placeholder="Tulis pesan Anda di sini..." required><?= old('message') ?></textarea>
                        </div>

                        <!-- ✅ reCAPTCHA -->
                        <div class="flex justify-center my-3 sm:my-4">
                            <div class="g-recaptcha transform scale-90 sm:scale-100" data-sitekey="6LcpQPUrAAAAAGomCs2DiTIpN1GGJkDxt4tTtlTj"></div>
                        </div>

                        <button type="submit" 
                                class="w-full bg-[#017077] text-white font-bold py-3 px-4 sm:py-4 sm:px-6 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl text-sm sm:text-base md:text-lg">
                            <i class="fas fa-paper-plane mr-1 sm:mr-2"></i>Kirim Pesan
                        </button>
                    </form>

                    <!-- ✅ Google reCAPTCHA script -->
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                </div>
            </div>

            <!-- Location & Additional Info -->
            <div class="space-y-6 sm:space-y-8">
                <!-- Location Card -->
                <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8">
                    <h3 class="text-xl sm:text-2xl font-bold text-[#017077] mb-4 sm:mb-6 flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 sm:mr-3 text-sm sm:text-base"></i>Lokasi Pesantren
                    </h3>
                    
                    <div class="space-y-3 sm:space-y-4">
                        <?php if(isset($kontak['alamat']) && !empty($kontak['alamat'])): ?>
                        <div class="flex items-start">
                            <i class="fas fa-map-pin text-[#017077] mt-0.5 sm:mt-1 mr-2 sm:mr-3 text-xs sm:text-sm"></i>
                            <div>
                                <p class="text-gray-700 font-medium text-xs sm:text-sm">Alamat Lengkap</p>
                                <p class="text-gray-600 text-xs sm:text-sm"><?= nl2br(htmlspecialchars($kontak['alamat'])) ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(isset($kontak['telepon']) && !empty($kontak['telepon'])): ?>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-[#017077] mt-0.5 sm:mt-1 mr-2 sm:mr-3 text-xs sm:text-sm"></i>
                            <div>
                                <p class="text-gray-700 font-medium text-xs sm:text-sm">Telepon</p>
                                <p class="text-gray-600 text-xs sm:text-sm"><?= format_phone_number($kontak['telepon']) ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="flex items-start">
                            <i class="fas fa-clock text-[#017077] mt-0.5 sm:mt-1 mr-2 sm:mr-3 text-xs sm:text-sm"></i>
                            <div>
                                <p class="text-gray-700 font-medium text-xs sm:text-sm">Jam Operasional</p>
                                <p class="text-gray-600 text-xs sm:text-sm">Senin - Minggu: 08.00 - 16.00 WIB</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Map Placeholder -->
                    <!-- <div class="mt-4 sm:mt-6 bg-gradient-to-br from-[#017077] to-[#005359] rounded-lg p-4 sm:p-6 md:p-8 text-white text-center">
                        <div class="bg-white/20 w-12 h-12 sm:w-16 sm:h-16 rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4">
                            <i class="fas fa-map text-lg sm:text-xl md:text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-base sm:text-lg mb-1 sm:mb-2">Peta Lokasi</h4>
                        <p class="text-white/80 text-xs sm:text-sm mb-3 sm:mb-4">Google Maps akan ditampilkan di sini</p>
                        <button class="bg-white text-[#017077] font-medium py-1 px-4 sm:py-2 sm:px-6 rounded-lg hover:bg-gray-100 transition-colors duration-300 text-xs sm:text-sm">
                            Buka di Google Maps
                        </button>
                    </div> -->
                </div>

                <!-- Quick Response Card -->
                <div class="bg-gradient-to-br from-[#017077] to-[#005359] rounded-xl p-4 sm:p-6 md:p-8 text-white">
                    <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4 flex items-center">
                        <i class="fas fa-bolt mr-2 sm:mr-3 text-sm sm:text-base"></i>Respon Cepat
                    </h3>
                    <p class="text-white/90 text-xs sm:text-sm mb-4 sm:mb-6">
                        Untuk pertanyaan mendesak, langsung hubungi nomor WhatsApp kami.
                    </p>
                    <div class="space-y-2 sm:space-y-3">
                        <?php if(isset($kontak['whatsapp']) && !empty($kontak['whatsapp'])): ?>
                        <div class="flex items-center justify-between bg-white/20 rounded-lg p-3 sm:p-4">
                            <div class="flex items-center">
                                <i class="fab fa-whatsapp text-green-300 text-base sm:text-xl mr-2 sm:mr-3"></i>
                                <span class="text-xs sm:text-sm">WhatsApp Response</span>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-12 sm:py-16 md:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#017077] mb-3 sm:mb-4">Pertanyaan Umum</h2>
            <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-2xl mx-auto px-2">
                Beberapa pertanyaan yang sering diajukan oleh calon santri dan orang tua
            </p>
        </div>

        <div class="space-y-4 sm:space-y-6">
            <!-- FAQ Item 1 -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-4 sm:p-6 hover:shadow-xl transition-all duration-300">
                <h3 class="text-base sm:text-lg font-bold text-[#017077] mb-2 sm:mb-3 flex items-center">
                    <i class="fas fa-question-circle mr-2 sm:mr-3 text-[#017077] text-sm sm:text-base"></i>
                    Bagaimana cara mendaftar menjadi santri?
                </h3>
                <p class="text-gray-600 text-xs sm:text-sm">
                    Pendaftaran dapat dilakukan melalui website resmi dengan mengisi formulir online atau datang langsung ke pesantren. 
                    Dokumen yang diperlukan antara lain: fotocopy KTP orang tua, akta kelahiran, dan ijazah terakhir.
                </p>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-4 sm:p-6 hover:shadow-xl transition-all duration-300">
                <h3 class="text-base sm:text-lg font-bold text-[#017077] mb-2 sm:mb-3 flex items-center">
                    <i class="fas fa-question-circle mr-2 sm:mr-3 text-[#017077] text-sm sm:text-base"></i>
                    Apakah ada program beasiswa?
                </h3>
                <p class="text-gray-600 text-xs sm:text-sm">
                    Ya, kami menyediakan program beasiswa untuk santri berprestasi dan yang membutuhkan. 
                    Informasi lengkap dapat diperoleh dengan menghubungi bagian administrasi melalui WhatsApp atau email.
                </p>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-4 sm:p-6 hover:shadow-xl transition-all duration-300">
                <h3 class="text-base sm:text-lg font-bold text-[#017077] mb-2 sm:mb-3 flex items-center">
                    <i class="fas fa-question-circle mr-2 sm:mr-3 text-[#017077] text-sm sm:text-base"></i>
                    Bolehkah orang tua mengunjungi santri?
                </h3>
                <p class="text-gray-600 text-xs sm:text-sm">
                    Orang tua diperbolehkan mengunjungi santri pada hari dan jam yang telah ditentukan. 
                    Kami juga memiliki program kunjungan rutin dan pertemuan orang tua santri secara berkala.
                </p>
            </div>
        </div>
    </div>
</section>

<style>
.arabic-font {
    font-family: 'Traditional Arabic', 'Scheherazade New', 'Lateef', serif;
}

.toast-enter {
  opacity: 0;
  transform: translateY(-10px);
}

.toast-show {
  opacity: 1;
  transform: translateY(0);
  transition: all 0.4s ease;
}

/* Mobile optimizations */
@media (max-width: 640px) {
    .g-recaptcha {
        transform: scale(0.85) !important;
    }
}

/* Tablet optimizations */
@media (min-width: 641px) and (max-width: 1024px) {
    .contact-card {
        min-height: 280px;
    }
}

/* Large desktop optimizations */
@media (min-width: 1536px) {
    .max-w-7xl {
        max-width: 80rem;
    }
}

/* Touch device improvements */
@media (hover: none) and (pointer: coarse) {
    .contact-card:hover {
        transform: none;
    }
    
    input, select, textarea, button {
        font-size: 16px; /* Prevent zoom on iOS */
    }
}

/* High DPI screens */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .contact-card {
        image-rendering: -webkit-optimize-contrast;
    }
}

/* Reduced motion for accessibility */
@media (prefers-reduced-motion: reduce) {
    .contact-card,
    .toast-show {
        transition-duration: 0.1s;
    }
}
</style>

<script>
function closeAlert(id) {
    const alertBox = document.getElementById(id);
    if (alertBox) {
        alertBox.classList.add('opacity-0', 'translate-y-2');
        setTimeout(() => alertBox.remove(), 500);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    const toasts = document.querySelectorAll('#alert-success, #alert-error');
    toasts.forEach(toast => {
        toast.classList.add('toast-enter');
        setTimeout(() => toast.classList.add('toast-show'), 100);
        setTimeout(() => closeAlert(toast.id), 7000);
    });

    // ✅ Auto-scroll ke form jika ada alert success atau error
    const alert = document.querySelector('#alert-success, #alert-error');
    if (alert) {
        const formSection = document.querySelector('form[action*="kirim-pesan"]');
        if (formSection) {
            setTimeout(() => {
                formSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 500);
        }
    }

    // Mobile form improvements
    const inputs = document.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        // Improve touch targets on mobile
        if (window.innerWidth <= 640) {
            input.style.minHeight = '44px';
        }
        
        // Prevent zoom on focus for iOS
        input.addEventListener('focus', function() {
            if (window.innerWidth <= 768) {
                this.style.fontSize = '16px';
            }
        });
    });
});

// Handle window resize
window.addEventListener('resize', function() {
    const inputs = document.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        if (window.innerWidth <= 640) {
            input.style.minHeight = '44px';
        } else {
            input.style.minHeight = '';
        }
    });
});
</script>

<?= $this->endSection() ?>