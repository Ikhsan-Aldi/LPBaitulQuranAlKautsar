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
                <!-- NIS -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">NIS *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-id-card text-gray-400"></i>
                        </div>
                        <input type="text" name="nis" value="<?= esc($santri['nis']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Masukkan NIS" required>
                    </div>
                </div>

                <!-- Nama -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="nama" value="<?= esc($santri['nama']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Masukkan nama lengkap" required>
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
                        <select name="jenjang" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white" required>
                            <option value="">Pilih Jenjang</option>
                            <option value="SMP" <?= $santri['jenjang'] == 'SMP' ? 'selected' : ''; ?>>SMP</option>
                            <option value="SMA" <?= $santri['jenjang'] == 'SMA' ? 'selected' : ''; ?>>SMA</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fa fa-chevron-down text-gray-400"></i>
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
                               placeholder="Masukkan asal sekolah" required>
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <div class="relative">
                    <div class="absolute top-3 left-3 pointer-events-none">
                        <i class="fa fa-map-marker-alt text-gray-400"></i>
                    </div>
                    <textarea name="alamat" rows="3" 
                              class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 resize-none"
                              placeholder="Masukkan alamat lengkap"><?= esc($santri['alamat']); ?></textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- No HP -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">No HP</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-phone text-gray-400"></i>
                        </div>
                        <input type="text" name="no_hp" value="<?= esc($santri['no_hp']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Contoh: 081234567890">
                    </div>
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-circle text-gray-400"></i>
                        </div>
                        <select name="status" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white">
                            <option value="Aktif" <?= $santri['status'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                            <option value="Lulus" <?= $santri['status'] == 'Lulus' ? 'selected' : ''; ?>>Lulus</option>
                            <option value="Nonaktif" <?= $santri['status'] == 'Nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fa fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Fields (Email, Tempat Lahir, Tanggal Lahir) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Email -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" value="<?= esc($santri['email'] ?? ''); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="email@santri.com">
                    </div>
                </div>

                <!-- Tempat Lahir -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-map-pin text-gray-400"></i>
                        </div>
                        <input type="text" name="tempat_lahir" value="<?= esc($santri['tempat_lahir'] ?? ''); ?>" 
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
                        <input type="date" name="tanggal_lahir" value="<?= esc($santri['tanggal_lahir'] ?? ''); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                    <i class="fa fa-save"></i>
                    <span>Simpan Perubahan</span>
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
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('form');
    const requiredFields = form.querySelectorAll('[required]');
    
    form.addEventListener('submit', function(e) {
        let valid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.classList.add('border-red-500', 'bg-red-50');
                
                // Add error message
                if (!field.parentNode.querySelector('.error-message')) {
                    const errorMsg = document.createElement('p');
                    errorMsg.className = 'error-message text-red-500 text-xs mt-1';
                    errorMsg.textContent = 'Field ini wajib diisi';
                    field.parentNode.appendChild(errorMsg);
                }
            } else {
                field.classList.remove('border-red-500', 'bg-red-50');
                const errorMsg = field.parentNode.querySelector('.error-message');
                if (errorMsg) {
                    errorMsg.remove();
                }
            }
        });

        if (!valid) {
            e.preventDefault();
            // Scroll to first error
            const firstError = form.querySelector('.border-red-500');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            
            // Show notification
            showNotification('Harap isi semua field yang wajib diisi', 'error');
        }
    });

    // Remove error state when user starts typing
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

    // Notification function
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 p-4 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${
            type === 'error' ? 'bg-red-500 text-white' : 
            type === 'success' ? 'bg-green-500 text-white' : 
            'bg-blue-500 text-white'
        }`;
        notification.innerHTML = `
            <div class="flex items-center space-x-2">
                <i class="fa ${type === 'error' ? 'fa-exclamation-circle' : type === 'success' ? 'fa-check-circle' : 'fa-info-circle'}"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Remove after 5 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 5000);
    }

    // Date input formatting
    const dateInput = document.querySelector('input[type="date"]');
    if (dateInput && dateInput.value) {
        // Format the date for display if needed
        const originalDate = new Date(dateInput.value);
        dateInput.value = originalDate.toISOString().split('T')[0];
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
</style>

<?= $this->endSection(); ?>