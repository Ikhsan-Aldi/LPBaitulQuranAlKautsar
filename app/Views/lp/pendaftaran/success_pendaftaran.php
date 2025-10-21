<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Pendaftaran Berhasil" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white/20 backdrop-blur-sm rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-check-circle text-white text-4xl"></i>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 arabic-font">
                Pendaftaran Berhasil!
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-8 leading-relaxed">
                Terima kasih telah mendaftar di Baitul Quran Al-Kautsar
            </p>
        </div>
    </div>
</section>

<!-- Success Content -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <div class="bg-green-50 border border-green-200 rounded-2xl p-8 mb-8">
            <i class="fas fa-envelope-open-text text-green-600 text-5xl mb-6"></i>
            <h2 class="text-2xl font-bold text-green-800 mb-4">Pendaftaran Anda Telah Diterima</h2>
            <p class="text-green-700 text-lg mb-6">
                Kami telah menerima data pendaftaran Anda. Tim kami akan menghubungi Anda melalui nomor telepon yang telah dicantumkan untuk proses seleksi selanjutnya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-blue-50 p-6 rounded-xl border border-blue-200">
                <i class="fas fa-phone-alt text-blue-600 text-2xl mb-4"></i>
                <h3 class="font-bold text-blue-800 mb-2">Konfirmasi</h3>
                <p class="text-blue-700 text-sm">Tim kami akan menghubungi dalam 1x24 jam</p>
            </div>
            <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-200">
                <i class="fas fa-clipboard-check text-yellow-600 text-2xl mb-4"></i>
                <h3 class="font-bold text-yellow-800 mb-2">Seleksi</h3>
                <p class="text-yellow-700 text-sm">Proses seleksi akan diinformasikan kemudian</p>
            </div>
            <div class="bg-purple-50 p-6 rounded-xl border border-purple-200">
                <i class="fas fa-user-check text-purple-600 text-2xl mb-4"></i>
                <h3 class="font-bold text-purple-800 mb-2">Hasil</h3>
                <p class="text-purple-700 text-sm">Pengumuman hasil seleksi via telepon</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="<?= base_url('/') ?>" 
               class="bg-[#017077] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl inline-flex items-center justify-center">
                <i class="fas fa-home mr-2"></i>Kembali ke Beranda
            </a>
            <a href="<?= base_url('pendaftaran') ?>" 
               class="border-2 border-[#017077] text-[#017077] font-bold px-8 py-3 rounded-lg hover:bg-[#017077] hover:text-white transition-colors duration-300 inline-flex items-center justify-center">
                <i class="fas fa-list mr-2"></i>Lihat Gelombang Lain
            </a>
        </div>
    </div>
</section>

<style>
.arabic-font {
    font-family: 'Traditional Arabic', 'Scheherazade New', 'Lateef', serif;
}
</style>
<?= $this->endSection() ?>