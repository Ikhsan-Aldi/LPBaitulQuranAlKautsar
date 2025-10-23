<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Edit Data Santri</h1>
            <p class="text-gray-600 mt-2">Ubah informasi data santri pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/santri'); ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <form action="<?= base_url('admin/santri/update/' . $santri['id']); ?>" method="post" class="space-y-6">
            <?= csrf_field(); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="nama_lengkap" value="<?= esc($santri['nama_lengkap']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Masukkan nama lengkap" required>
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
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white" required>
                            <option value="Laki-laki" <?= $santri['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $santri['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
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
                        <input type="text" name="tempat_lahir" value="<?= esc($santri['tempat_lahir']); ?>" 
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
                        <input type="date" name="tanggal_lahir" value="<?= esc($santri['tanggal_lahir']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- NIS -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">NIS *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-hashtag text-gray-400"></i>
                        </div>
                        <input type="text" name="nis" value="<?= esc($santri['nis']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Nomor Induk Santri" required>
                    </div>
                </div>

                <!-- NISN -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">NISN</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-id-card text-gray-400"></i>
                        </div>
                        <input type="text" name="nisn" value="<?= esc($santri['nisn']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Nomor Induk Siswa Nasional">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Jenjang -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Jenjang *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-graduation-cap text-gray-400"></i>
                        </div>
                        <select name="jenjang" 
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white" required>
                            <option value="SMP" <?= $santri['jenjang'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
                            <option value="SMA" <?= $santri['jenjang'] == 'SMA' ? 'selected' : '' ?>>SMA</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fa fa-chevron-down text-gray-400"></i>
                        </div>
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
                            <option value="Aktif" <?= $santri['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="Lulus" <?= $santri['status'] == 'Lulus' ? 'selected' : '' ?>>Lulus</option>
                            <option value="Nonaktif" <?= $santri['status'] == 'Nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
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
                    <input type="text" name="asal_sekolah" value="<?= esc($santri['asal_sekolah']); ?>" 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                           placeholder="Nama sekolah asal" required>
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
                              placeholder="Alamat lengkap"><?= esc($santri['alamat']); ?></textarea>
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
                        <input type="text" name="nama_ayah" value="<?= esc($santri['nama_ayah']); ?>" 
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
                        <input type="text" name="nama_ibu" value="<?= esc($santri['nama_ibu']); ?>" 
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
                        <input type="text" name="no_hp" value="<?= esc($santri['no_hp']); ?>" 
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
                        <input type="text" name="no_hp_ortu" value="<?= esc($santri['no_hp_ortu']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="081234567890">
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                    <i class="fa fa-save"></i>
                    <span>Update Data Santri</span>
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
</style>

<?= $this->endSection(); ?>