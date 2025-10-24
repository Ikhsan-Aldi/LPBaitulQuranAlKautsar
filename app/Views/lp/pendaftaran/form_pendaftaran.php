<?= $this->extend('lp/layout') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative min-h-[40vh] flex items-center overflow-hidden bg-gradient-to-r from-[#017077] to-[#005359]">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="<?= base_url('assets/img/hero-2.jpg') ?>" alt="Form Pendaftaran" class="w-full h-full object-cover">
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full text-center">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 arabic-font">
                Form Pendaftaran
            </h1>
            <p class="text-xl text-white/90 leading-relaxed">
                Isi data diri dengan lengkap dan benar untuk proses pendaftaran
            </p>
        </div>
    </div>
</section>

<!-- Form Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Info Gelombang -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border-l-4 border-[#017077]">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-[#017077] mb-2"><?= esc($gelombang['nama']) ?></h3>
                    <p class="text-gray-600">
                        Periode: <?= date('d M Y', strtotime($gelombang['tanggal_mulai'])) ?> - <?= date('d M Y', strtotime($gelombang['tanggal_selesai'])) ?>
                    </p>
                </div>
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded-full font-semibold">
                    <i class="fas fa-check-circle mr-2"></i>Dibuka
                </div>
            </div>
        </div>

        <!-- Notifikasi -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Form -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <form action="<?= base_url('pendaftaran/simpan') ?>" method="post" enctype="multipart/form-data" class="p-8">
                        <?= csrf_field() ?>

                        <!-- Data Diri Calon Santri -->
                        <div class="mb-12">
                            <h3 class="text-2xl font-bold text-[#017077] mb-6 pb-3 border-b border-gray-200 flex items-center">
                                <i class="fas fa-user-graduate mr-3"></i>Data Diri Calon Santri
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Jenjang Pendidikan -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Jenjang Pendidikan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="radio" name="jenjang" value="SMP"
                                                <?= old('jenjang') == 'SMP' ? 'checked' : '' ?>
                                                class="text-[#017077] focus:ring-[#017077]" required>
                                            <span class="ml-3 text-gray-700">SMP</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="radio" name="jenjang" value="SMA"
                                                <?= old('jenjang') == 'SMA' ? 'checked' : '' ?>
                                                class="text-[#017077] focus:ring-[#017077]" required>
                                            <span class="ml-3 text-gray-700">SMA</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="md:col-span-2">
                                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                                        value="<?= old('nama_lengkap') ?>"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Jenis Kelamin <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                                <?= old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' ?>
                                                class="text-[#017077] focus:ring-[#017077]" required>
                                            <span class="ml-3 text-gray-700">Laki-laki</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                <?= old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' ?>
                                                class="text-[#017077] focus:ring-[#017077]" required>
                                            <span class="ml-3 text-gray-700">Perempuan</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Tempat Lahir -->
                                <div>
                                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                                        Tempat Lahir <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                                        value="<?= old('tempat_lahir') ?>"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                        placeholder="Kota tempat lahir" required>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div>
                                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                                        Tanggal Lahir <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                        value="<?= old('tanggal_lahir') ?>"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                        required>
                                </div>

                                <!-- Asal Sekolah -->
                                <div class="md:col-span-2">
                                    <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-2">
                                        Asal Sekolah <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="asal_sekolah" name="asal_sekolah"
                                        value="<?= old('asal_sekolah') ?>"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                        placeholder="Nama sekolah asal" required>
                                </div>

                                <!-- NISN -->
                                <div class="md:col-span-2">
                                    <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">
                                        NISN (Nomor Induk Siswa Nasional) <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="nisn" name="nisn"
                                        value="<?= old('nisn') ?>"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                        placeholder="Masukkan NISN" required>
                                </div>

                                <!-- Alamat -->
                                <div class="md:col-span-2">
                                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                                        Alamat Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="alamat" name="alamat" rows="3"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                            placeholder="Masukkan alamat lengkap" required><?= old('alamat') ?></textarea>
                                </div>

                            </div>
                        </div>

                <!-- Data Orang Tua -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-[#017077] mb-6 pb-3 border-b border-gray-200 flex items-center">
                        <i class="fas fa-users mr-3"></i>Data Orang Tua
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Ayah -->
                        <div>
                            <label for="nama_ayah" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Ayah <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_ayah" name="nama_ayah"
                                   value="<?= old('nama_ayah') ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                   placeholder="Nama lengkap ayah" required>
                        </div>

                        <!-- Nama Ibu -->
                        <div>
                            <label for="nama_ibu" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Ibu <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_ibu" name="nama_ibu"
                                   value="<?= old('nama_ibu') ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                   placeholder="Nama lengkap ibu" required>
                        </div>

                        <!-- No HP Orang Tua -->
                        <div class="md:col-span-2">
                            <label for="no_hp_ortu" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor HP Orang Tua <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" id="no_hp_ortu" name="no_hp_ortu"
                                   value="<?= old('no_hp_ortu') ?>"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                   placeholder="Contoh: 081234567890" required>
                        </div>
                    </div>
                </div>

                <!-- Dokumen Persyaratan -->
                <div class="mb-12">
                    <h3 class="text-2xl font-bold text-[#017077] mb-6 pb-3 border-b border-gray-200 flex items-center">
                        <i class="fas fa-file-alt mr-3"></i>Dokumen Persyaratan
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- KTP Orang Tua -->
                        <div>
                            <label for="ktp_ortu" class="block text-sm font-medium text-gray-700 mb-2">
                                KTP Orang Tua
                            </label>
                            <input type="file" id="ktp_ortu" name="ktp_ortu"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                   accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, PNG (Maks. 2MB)</p>
                        </div>

                        <!-- Akta Kelahiran / KK -->
                        <div>
                            <label for="akta_kk" class="block text-sm font-medium text-gray-700 mb-2">
                                Akta Kelahiran / Kartu Keluarga
                            </label>
                            <input type="file" id="akta_kk" name="akta_kk"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                   accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, PNG (Maks. 2MB)</p>
                        </div>

                        <!-- Surat Keterangan Lulus -->
                        <div>
                            <label for="surat_ket_lulus" class="block text-sm font-medium text-gray-700 mb-2">
                                Surat Keterangan Lulus
                            </label>
                            <input type="file" id="surat_ket_lulus" name="surat_ket_lulus"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                   accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, PNG (Maks. 2MB)</p>
                        </div>

                        <!-- Ijazah Terakhir -->
                        <div>
                            <label for="ijazah_terakhir" class="block text-sm font-medium text-gray-700 mb-2">
                                Ijazah Terakhir
                            </label>
                            <input type="file" id="ijazah_terakhir" name="ijazah_terakhir"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                   accept=".pdf,.jpg,.jpeg,.png">
                            <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, PNG (Maks. 2MB)</p>
                        </div>

                        <!-- Foto -->
                        <div class="md:col-span-2">
                            <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                                Foto 3x4
                            </label>
                            <input type="file" id="foto" name="foto"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#017077] focus:border-transparent transition-all duration-300"
                                   accept=".jpg,.jpeg,.png">
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG (Maks. 2MB)</p>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="flex flex-col sm:flex-row justify-between items-center pt-8 border-t border-gray-200">
                    <div class="mb-4 sm:mb-0">
                        <p class="text-sm text-gray-600">
                            <span class="text-red-500">*</span> Menandakan field wajib diisi
                        </p>
                    </div>
                    <div class="flex space-x-4">
                        <a href="<?= base_url('pendaftaran') ?>" 
                           class="px-8 py-3 border border-gray-300 text-gray-700 font-bold rounded-lg hover:bg-gray-50 transition-colors duration-300">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>
                        <button type="submit" 
                                class="bg-[#017077] text-white font-bold px-8 py-3 rounded-lg hover:bg-[#005359] transition-colors duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane mr-2"></i>Kirim Pendaftaran
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
.arabic-font {
    font-family: 'Traditional Arabic', 'Scheherazade New', 'Lateef', serif;
}

input:focus, textarea:focus, select:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(1, 112, 119, 0.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Format tanggal untuk input date
    const tanggalLahir = document.getElementById('tanggal_lahir');
    if (tanggalLahir && !tanggalLahir.value) {
        // Set max date to today (for age validation)
        const today = new Date().toISOString().split('T')[0];
        tanggalLahir.max = today;
    }

    // File size validation
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file && file.size > 2 * 1024 * 1024) { // 2MB
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                e.target.value = '';
            }
        });
    });
});
</script>
<?= $this->endSection() ?>