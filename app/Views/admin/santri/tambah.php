<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Tambah Data Santri</h1>
            <p class="text-gray-600 mt-2">Tambah data santri baru pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/santri'); ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <form action="<?= base_url('admin/santri/simpan'); ?>" method="post" class="space-y-6">
            <?= csrf_field(); ?>

            <!-- Mode Input -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Sumber Data *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa fa-database text-gray-400"></i>
                    </div>
                    <select id="pilih_mode" 
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white"
                            onchange="toggleMode()" required>
                        <option value="">-- Pilih Mode Input --</option>
                        <option value="pendaftaran">Dari Pendaftaran</option>
                        <option value="manual">Input Manual</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fa fa-chevron-down text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Mode 1: Pilih dari Pendaftaran -->
            <div id="formPendaftaran" class="hidden space-y-6 p-4 bg-blue-50 rounded-xl border border-blue-200">
                <div class="flex items-center space-x-2 text-blue-700 mb-4">
                    <i class="fa fa-users"></i>
                    <span class="font-medium">Data dari Pendaftaran</span>
                </div>
                
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Pilih Pendaftar *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-user text-gray-400"></i>
                        </div>
                        <select name="id_pendaftaran" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white">
                            <option value="">-- Pilih Pendaftar --</option>
                            <?php foreach ($pendaftaran as $p): ?>
                                <option value="<?= $p['id_pendaftaran']; ?>">
                                    <?= esc($p['nama_lengkap']); ?> (<?= esc($p['jenjang']); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fa fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mode 2: Input Manual -->
            <div id="formManual" class="hidden space-y-6 p-4 bg-green-50 rounded-xl border border-green-200">
                <div class="flex items-center space-x-2 text-green-700 mb-4">
                    <i class="fa fa-edit"></i>
                    <span class="font-medium">Input Manual</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Lengkap -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="nama_lengkap" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                                   placeholder="Masukkan nama lengkap">
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-venus-mars text-gray-400"></i>
                            </div>
                            <select name="jenis_kelamin" 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fa fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tempat Lahir -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-map-marker-alt text-gray-400"></i>
                            </div>
                            <input type="text" name="tempat_lahir" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                                   placeholder="Kota kelahiran">
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-calendar text-gray-400"></i>
                            </div>
                            <input type="date" name="tanggal_lahir" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- NISN -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">NISN</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-id-card text-gray-400"></i>
                            </div>
                            <input type="text" name="nisn" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                                   placeholder="Nomor Induk Siswa Nasional">
                        </div>
                    </div>

                    <!-- Jenjang -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Jenjang *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-graduation-cap text-gray-400"></i>
                            </div>
                            <select name="jenjang" 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white">
                                <option value="">-- Pilih Jenjang --</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fa fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Asal Sekolah -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Asal Sekolah *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-school text-gray-400"></i>
                        </div>
                        <input type="text" name="asal_sekolah" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Nama sekolah asal">
                    </div>
                </div>

                <!-- Alamat -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                    <div class="relative">
                        <div class="absolute top-3 left-3 pointer-events-none">
                            <i class="fa fa-map text-gray-400"></i>
                        </div>
                        <textarea name="alamat" rows="3" 
                                  class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 resize-none"
                                  placeholder="Alamat lengkap"></textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Ayah -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-male text-gray-400"></i>
                            </div>
                            <input type="text" name="nama_ayah" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                                   placeholder="Nama lengkap ayah">
                        </div>
                    </div>

                    <!-- Nama Ibu -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-female text-gray-400"></i>
                            </div>
                            <input type="text" name="nama_ibu" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                                   placeholder="Nama lengkap ibu">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- No HP Santri -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">No HP Santri</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-phone text-gray-400"></i>
                            </div>
                            <input type="text" name="no_hp" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                                   placeholder="081234567890">
                        </div>
                    </div>

                    <!-- No HP Orang Tua -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">No HP Orang Tua</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-phone-alt text-gray-400"></i>
                            </div>
                            <input type="text" name="no_hp_ortu" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                                   placeholder="081234567890">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- KTP Orang Tua -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">KTP Orang Tua</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-id-badge text-gray-400"></i>
                            </div>
                            <input type="file" name="ktp_ortu" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 bg-white"
                                   accept="image/*,application/pdf"> 
                        </div>
                    </div>

                    <!-- Akta Keluarga -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Akta Keluarga</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-file-alt text-gray-400"></i>
                            </div>
                            <input type="file" name="akta_keluarga" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 bg-white "
                                   accept="image/*,application/pdf"> 
                        </div>
                    </div>

                    <!-- surat keterangan lulus -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Surat Keterangan Lulus</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-file-lines text-gray-400"></i>
                            </div>
                            <input type="file" name="skl" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 bg-white"
                                   accept="image/*,application/pdf"> 
                        </div>
                    </div>

                    <!-- Ijazah Terakhir -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Ijazah Terakhir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-certificate text-gray-400"></i>
                            </div>
                            <input type="file" name="ijazah_terakhir" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 bg-white"
                                   accept="image/*,application/pdf"> 
                        </div>
                    </div>

                    <!-- foto -->
                    <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Foto Santri</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-image text-gray-400"></i>
                            </div>
                            <input type="file" name="foto" id="fotoInput"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 bg-white"
                                accept="image/*">
                        </div>
                    </div>

                    <!-- preview foto -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Preview Foto</label>
                        <div class="w-32 h-32 bg-gray-100 rounded-xl flex items-center justify-center overflow-hidden border border-gray-300">
                            <img id="previewFoto" src="<?= base_url('uploads/santri/default.png'); ?>" alt="Preview Foto" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Umum (Selalu Tampil) -->
            <div class="space-y-6 p-4 bg-primary/5 rounded-xl border border-primary/20">
                <div class="flex items-center space-x-2 text-primary-dark mb-4">
                    <i class="fa fa-info-circle"></i>
                    <span class="font-medium">Data Umum Santri</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- NIS -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">NIS *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-hashtag text-gray-400"></i>
                            </div>
                            <input type="text" name="nis" 
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                                   placeholder="Nomor Induk Santri" required>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Status *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa fa-circle text-gray-400"></i>
                            </div>
                            <select name="status" 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white">
                                <option value="Aktif">Aktif</option>
                                <option value="Lulus">Lulus</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fa fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                    <i class="fa fa-plus-circle"></i>
                    <span>Tambah Santri</span>
                </button>
                <a href="<?= base_url('admin/santri'); ?>" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                    <i class="fa fa-times"></i>
                    <span>Batal</span>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function toggleMode() {
    const mode = document.getElementById('pilih_mode').value;
    const formPendaftaran = document.getElementById('formPendaftaran');
    const formManual = document.getElementById('formManual');

    if (mode === 'pendaftaran') {
        formPendaftaran.classList.remove('hidden');
        formManual.classList.add('hidden');
        
        // Set required fields for pendaftaran mode
        document.querySelector('select[name="id_pendaftaran"]').required = true;
        document.querySelector('input[name="nama_lengkap"]').required = false;
        document.querySelector('select[name="jenis_kelamin"]').required = false;
        document.querySelector('select[name="jenjang"]').required = false;
        document.querySelector('input[name="asal_sekolah"]').required = false;
        
    } else if (mode === 'manual') {
        formPendaftaran.classList.add('hidden');
        formManual.classList.remove('hidden');
        
        // Set required fields for manual mode
        document.querySelector('select[name="id_pendaftaran"]').required = false;
        document.querySelector('input[name="nama_lengkap"]').required = true;
        document.querySelector('select[name="jenis_kelamin"]').required = true;
        document.querySelector('select[name="jenjang"]').required = true;
        document.querySelector('input[name="asal_sekolah"]').required = true;
        
    } else {
        formPendaftaran.classList.add('hidden');
        formManual.classList.add('hidden');
        
        // Reset required fields
        document.querySelector('select[name="id_pendaftaran"]').required = false;
        document.querySelector('input[name="nama_lengkap"]').required = false;
        document.querySelector('select[name="jenis_kelamin"]').required = false;
        document.querySelector('select[name="jenjang"]').required = false;
        document.querySelector('input[name="asal_sekolah"]').required = false;
    }
}

// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let valid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.classList.add('border-red-500', 'bg-red-50');
                
                if (!field.parentNode.querySelector('.error-message')) {
                    const errorMsg = document.createElement('p');
                    errorMsg.className = 'error-message text-red-500 text-xs mt-1';
                    errorMsg.textContent = 'Field ini wajib diisi';
                    field.parentNode.appendChild(errorMsg);
                }
            }
        });

        if (!valid) {
            e.preventDefault();
            const firstError = form.querySelector('.border-red-500');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });

    // Remove error state when user starts typing
    const requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        field.addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('border-red-500', 'bg-red-50');
                const errorMsg = this.parentNode.querySelector('.error-message');
                if (errorMsg) {
                    errorMsg.remove();
                }
            }
        });
    });
});

document.getElementById('fotoInput').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewFoto');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result; // tampilkan hasil file ke img
        };
        reader.readAsDataURL(file);
    } else {
        // kalau tidak ada file, bisa kembalikan ke default
        preview.src = "<?= base_url('uploads/santri/default.png'); ?>";
    }
});

</script>

<style>
select {
    background-image: none;
}

.error-message {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}

input:focus, textarea:focus, select:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(1, 112, 119, 0.1);
}

.hidden {
    display: none;
}
</style>

<?= $this->endSection(); ?>