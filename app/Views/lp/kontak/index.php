<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- ✅ Toast Notifications (di luar section form) -->
<?php if (session('success')) : ?>
    <div id="alert-success" 
        class="fixed top-20 right-6 z-[9999] flex items-center justify-between bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg transition-all duration-500 max-w-sm">
        <div class="flex items-center space-x-2">
            <i class="fas fa-check-circle"></i>
            <span><?= session('success') ?></span>
        </div>
        <button onclick="closeAlert('alert-success')" class="text-green-700 hover:text-green-900 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
    </div>
<?php elseif (session('error')) : ?>
    <div id="alert-error" 
        class="fixed top-24 right-6 z-50 flex items-center justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg transition-all duration-500 max-w-sm">
        <div class="flex items-center space-x-2">
            <i class="fas fa-exclamation-circle"></i>
            <span><?= session('error') ?></span>
        </div>
        <button onclick="closeAlert('alert-error')" class="text-red-700 hover:text-red-900 focus:outline-none">
            <i class="fas fa-times"></i>
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
</style>

<!-- Hero Section -->
<section class="relative min-h-[40vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Kontak Pesantren" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-6 py-20 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 arabic-font">
                Hubungi Kami
            </h1>
            <p class="text-xl text-white/90 leading-relaxed">
                Mari berdiskusi dan bergabung bersama keluarga besar Baitul Qur'an Al-Kautsar
            </p>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section id="contact-info" class="py-4 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Phone -->
            <div class="contact-card bg-white rounded-xl shadow-lg p-8 hover:shadow-xl border border-[#017077]/10 text-center">
                <div class="bg-[#017077]/10 w-20 h-20 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-phone-alt text-[#017077] text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#017077] mb-4">Telepon & WhatsApp</h3>
                <p class="text-gray-600 mb-4">
                    Hubungi kami untuk konsultasi dan informasi pendaftaran
                </p>
                <div class="space-y-2">
                    <a href="https://wa.me/6281234002350" 
                       class="block bg-green-600 text-white font-medium py-3 px-6 rounded-lg hover:bg-green-700 transition-colors duration-300">
                        <i class="fab fa-whatsapp mr-2"></i>+62 812 3400 2350
                    </a>
                    <p class="text-sm text-gray-500">Klik untuk chat WhatsApp</p>
                </div>
            </div>

            <!-- Email -->
            <div class="contact-card bg-white rounded-xl shadow-lg p-8 hover:shadow-xl border border-[#017077]/10 text-center">
                <div class="bg-[#017077]/10 w-20 h-20 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-envelope text-[#017077] text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#017077] mb-4">Email</h3>
                <p class="text-gray-600 mb-4">
                    Kirim pertanyaan dan dokumen melalui email resmi kami
                </p>
                <div class="space-y-2">
                    <a href="mailto:info@baitulquran-alkautsar.org" 
                       class="block bg-[#017077] text-white font-medium py-3 px-6 rounded-lg hover:bg-[#005359] transition-colors duration-300">
                        <i class="fas fa-envelope mr-2"></i>info@baitulquran-alkautsar.org
                    </a>
                    <p class="text-sm text-gray-500">Hubungi Kami</p>
                </div>
            </div>

            <!-- Social Media -->
            <div class="contact-card bg-white rounded-xl shadow-lg p-8 hover:shadow-xl border border-[#017077]/10 text-center">
                <div class="bg-[#017077]/10 w-20 h-20 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <i class="fas fa-hashtag text-[#017077] text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#017077] mb-4">Media Sosial</h3>
                <p class="text-gray-600 mb-4">
                    Ikuti update terbaru dan kegiatan pesantren di media sosial
                </p>
                <div class="space-y-3">
                    <a href="https://instagram.com/alkautsar_madiun" 
                       class="block bg-gradient-to-r from-purple-600 to-pink-600 text-white font-medium py-3 px-6 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-colors duration-300">
                        <i class="fab fa-instagram mr-2"></i>@alkautsar_madiun
                    </a>
                    <p class="text-sm text-gray-500">Instagram Official</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Location Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-[#017077] mb-6">Kirim Pesan</h3>
                    <p class="text-gray-600 mb-8">
                        Isi form berikut untuk mengirim pertanyaan atau permintaan informasi
                    </p>

                    <form action="<?= base_url('kirim-pesan') ?>" method="post" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                    placeholder="Masukkan nama lengkap" value="<?= old('name') ?>">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                    placeholder="email@contoh.com" value="<?= old('email') ?>">
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                placeholder="+62 xxx xxxx xxxx" value="<?= old('phone') ?>">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                            <select id="subject" name="subject"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300">
                                <option value="">Pilih subjek pesan</option>
                                <option value="pendaftaran" <?= old('subject') == 'pendaftaran' ? 'selected' : '' ?>>Informasi Pendaftaran</option>
                                <option value="program" <?= old('subject') == 'program' ? 'selected' : '' ?>>Informasi Program</option>
                                <option value="beasiswa" <?= old('subject') == 'beasiswa' ? 'selected' : '' ?>>Informasi Beasiswa</option>
                                <option value="lainnya" <?= old('subject') == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                    placeholder="Tulis pesan Anda di sini..."><?= old('message') ?></textarea>
                        </div>

                        <!-- ✅ Tambahkan reCAPTCHA di sini -->
                        <div class="flex justify-center my-4">
                            <div class="g-recaptcha" data-sitekey="6LeO6vMrAAAAAPuazAAio52H5QsEo1XoPdYND-50"></div>
                        </div>

                        <button type="submit" 
                                class="w-full bg-[#017077] text-white font-bold py-4 px-6 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                        </button>
                    </form>

                    <!-- ✅ Tambahkan script Google API di bagian paling bawah sebelum </body> -->
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                </div>
            </div>

            <!-- Location & Additional Info -->
            <div class="space-y-8">
                <!-- Location Card -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-[#017077] mb-6 flex items-center">
                        <i class="fas fa-map-marker-alt mr-3"></i>Lokasi Pesantren
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-pin text-[#017077] mt-1 mr-3"></i>
                            <div>
                                <p class="text-gray-700 font-medium">Alamat Lengkap</p>
                                <p class="text-gray-600 text-sm">Jl. Ring Road Barat - Kel.Manguharjo<br>Kec.Manguharjo, Kota Madiun<br>Jawa Timur</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <i class="fas fa-clock text-[#017077] mt-1 mr-3"></i>
                            <div>
                                <p class="text-gray-700 font-medium">Jam Operasional</p>
                                <p class="text-gray-600 text-sm">Senin - Minggu: 08.00 - 16.00 WIB</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Map Placeholder -->
                    <div class="mt-6 bg-gradient-to-br from-[#017077] to-[#005359] rounded-lg p-8 text-white text-center">
                        <div class="bg-white/20 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-map text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-lg mb-2">Peta Lokasi</h4>
                        <p class="text-white/80 text-sm mb-4">Google Maps akan ditampilkan di sini</p>
                        <button class="bg-white text-[#017077] font-medium py-2 px-6 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                            Buka di Google Maps
                        </button>
                    </div>
                </div>

                <!-- Quick Response Card -->
                <div class="bg-gradient-to-br from-[#017077] to-[#005359] rounded-xl p-8 text-white">
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-bolt mr-3"></i>Respon Cepat
                    </h3>
                    <p class="text-white/90 mb-6">
                        Untuk pertanyaan mendesak, langsung hubungi nomor WhatsApp kami.
                    </p>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between bg-white/20 rounded-lg p-4">
                            <div class="flex items-center">
                                <i class="fab fa-whatsapp text-green-300 text-xl mr-3"></i>
                                <span>WhatsApp Response</span>
                            </div>
                            <!-- <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">24/7</span> -->
                        </div>
                        <div class="flex items-center justify-between bg-white/20 rounded-lg p-4">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-blue-300 text-xl mr-3"></i>
                                <span>Email Response</span>
                            </div>
                            <!-- <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs font-medium">1x24 jam</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-[#017077] mb-4">Pertanyaan Umum</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Beberapa pertanyaan yang sering diajukan oleh calon santri dan orang tua
            </p>
        </div>

        <div class="space-y-6">
            <!-- FAQ Item 1 -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-bold text-[#017077] mb-3 flex items-center">
                    <i class="fas fa-question-circle mr-3 text-[#017077]"></i>
                    Bagaimana cara mendaftar menjadi santri?
                </h3>
                <p class="text-gray-600">
                    Pendaftaran dapat dilakukan melalui website resmi dengan mengisi formulir online atau datang langsung ke pesantren. 
                    Dokumen yang diperlukan antara lain: fotocopy KTP orang tua, akta kelahiran, dan ijazah terakhir.
                </p>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-bold text-[#017077] mb-3 flex items-center">
                    <i class="fas fa-question-circle mr-3 text-[#017077]"></i>
                    Apakah ada program beasiswa?
                </h3>
                <p class="text-gray-600">
                    Ya, kami menyediakan program beasiswa untuk santri berprestasi dan yang membutuhkan. 
                    Informasi lengkap dapat diperoleh dengan menghubungi bagian administrasi melalui WhatsApp atau email.
                </p>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-all duration-300">
                <h3 class="text-lg font-bold text-[#017077] mb-3 flex items-center">
                    <i class="fas fa-question-circle mr-3 text-[#017077]"></i>
                    Bolehkah orang tua mengunjungi santri?
                </h3>
                <p class="text-gray-600">
                    Orang tua diperbolehkan mengunjungi santri pada hari dan jam yang telah ditentukan. 
                    Kami juga memiliki program kunjungan rutin dan pertemuan orang tua santri secara berkala.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<!-- <section class="py-16 bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Siap Bergabung dengan Kami?</h2>
        <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
            Jangan ragu untuk menghubungi kami. Tim admin siap membantu Anda dengan informasi lengkap tentang program dan pendaftaran.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="https://wa.me/6281234002350" 
               class="bg-white text-[#017077] font-bold px-8 py-4 rounded-lg hover:bg-gray-100 transition-colors duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                <i class="fab fa-whatsapp mr-2"></i>Chat WhatsApp
            </a>
            <a href="mailto:info@baitulquran-alkautsar.org" 
               class="border-2 border-white text-white font-bold px-8 py-4 rounded-lg hover:bg-white hover:text-[#017077] transition-colors duration-300 inline-flex items-center justify-center">
                <i class="fas fa-envelope mr-2"></i>Kirim Email
            </a>
        </div>
    </div>
</section> -->

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
            }, 500); // beri sedikit jeda agar transisi alert muncul dulu
        }
    }
});

</script>

<?= $this->endSection() ?>