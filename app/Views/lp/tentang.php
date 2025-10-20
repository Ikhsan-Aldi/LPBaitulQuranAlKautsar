<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold text-center mb-8">Tentang Kami</h1>
    <p class="text-lg text-gray-600 text-center max-w-3xl mx-auto mb-12">
            Pesantren Baitul Qur'an Al-Kautsar merupakan
            lembaga pendidikan dibawah naungan yayasan
            Al-Kautsar Madiun, yang memadukan pendidikan
            formal dalam bentuk SMP dan SMA dengan non
            formal dalam bentuk Dirosah Islamiyah.
            Pembinaan 24 jam yang dikemas dalam sistem
            Islamic Boarding School (Pesantren Modern).
    </p>
    
    <!-- Konten tentang perusahaan di sini -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-4">Visi & Misi</h2>
        <p class="text-gray-700 mb-6">
            Menjadi partner terpercaya dalam transformasi digital bisnis di Indonesia.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
            <div class="bg-emerald-50 p-6 rounded-lg">
                <h3 class="text-xl font-bold text-emerald-800 mb-3">Visi Kami</h3>
                <p class="text-gray-700">
                Membentuk Generasi Cerdas yang Mandiri
                dan berkarakter dengan Al-Qur'an
                </p>
            </div>
            
            <div class="bg-emerald-50 p-6 rounded-lg">
                <h3 class="text-xl font-bold text-emerald-800 mb-3">Misi Kami</h3>
                <ul class="text-gray-700 list-disc list-inside space-y-2">
                    <li>Menjadikan Al-Qur'an dan Sunnah sebagai landasan hidup</li>
                    <li>Membentuk santri beraqidah ahlussunnah wal jama'ah</li>
                    <li>Membentuk santri berakhlak Mulia dalam kehidupan sehari-hari</li>
                    <li>Membentuk lifeskill kemandirian dan kemasyarakatan santri</li>
                    <li>Membekali santri ilmu entrepreneur</li>
                </ul>
            </div>
        </div>
        
        <!-- Sejarah -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Sejarah Berdiri</h2>
            <div class="bg-gray-50 p-6 rounded-lg">
                <p class="text-gray-700 mb-4">
                    Baitul Quran Al-Kautsar didirikan pada tahun 2010 dengan visi untuk 
                    menjadi pusat pendidikan Islam yang mengintegrasikan ilmu agama 
                    dan ilmu umum secara seimbang.
                </p>
                <p class="text-gray-700">
                    Sejak berdiri, kami telah berhasil mencetak ratusan hafizh dan hafizhah 
                    yang tidak hanya menguasai Al-Qur'an tetapi juga memiliki akhlak yang mulia 
                    dan berkontribusi positif bagi masyarakat.
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>