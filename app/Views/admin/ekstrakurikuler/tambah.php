<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Tambah Ekstrakurikuler</h1>
            <p class="text-gray-600 mt-2">Tambah kegiatan ekstrakurikuler baru pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/ekstrakurikuler'); ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <form action="<?= base_url('admin/ekstrakurikuler/simpan'); ?>" method="post" class="space-y-6">
            <?= csrf_field() ?>
            
            <!-- Nama Ekstrakurikuler -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Nama Ekstrakurikuler *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa fa-tag text-gray-400"></i>
                    </div>
                    <input type="text" name="nama_ekstrakurikuler" 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                           placeholder="Masukkan nama ekstrakurikuler" required>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <div class="relative">
                    <div class="absolute top-3 left-3 pointer-events-none">
                        <i class="fa fa-align-left text-gray-400"></i>
                    </div>
                    <textarea name="deskripsi" rows="4" 
                              class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 resize-none"
                              placeholder="Deskripsikan kegiatan ekstrakurikuler ini..."></textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pembimbing -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Pembimbing</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-user-tie text-gray-400"></i>
                        </div>
                        <input type="text" name="pembimbing" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Nama pembimbing">
                    </div>
                </div>

                <!-- Jadwal -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Jadwal</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-calendar text-gray-400"></i>
                        </div>
                        <input type="text" name="jadwal" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Contoh: Senin & Kamis, 15:00-17:00">
                    </div>
                </div>
            </div>

            <!-- Ikon -->
            <div class="space-y-4">
                <label class="block text-sm font-medium text-gray-700">Ikon Font Awesome</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa fa-icons text-gray-400"></i>
                    </div>
                    <select name="icon" 
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200 appearance-none bg-white">
                        <option value="">— Pilih Ikon —</option>
                        <option value="fas fa-swimming-pool">🏊‍♂️ Berenang</option>
                        <option value="fas fa-book">📖 Tahfidz</option>
                        <option value="fas fa-futbol">⚽ Futsal</option>
                        <option value="fas fa-music">🎵 Hadrah</option>
                        <option value="fas fa-paint-brush">🎨 Kaligrafi</option>
                        <option value="fas fa-code">💻 Teknologi</option>
                        <option value="fas fa-mosque">🕌 Kajian</option>
                        <option value="fas fa-dumbbell">💪 Pencak Silat</option>
                        <option value="fas fa-microphone">🎤 Pidato</option>
                        <option value="fas fa-seedling">🌿 Berkebun</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fa fa-chevron-down text-gray-400"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500">Ikon akan ditampilkan di daftar ekstrakurikuler</p>
            </div>

            <!-- Preview Ikon -->
            <div id="iconPreview" class="hidden p-4 bg-gray-50 rounded-xl border border-gray-200">
                <p class="text-sm text-gray-600 mb-2">Preview Ikon:</p>
                <div class="flex items-center space-x-3">
                    <div id="previewIcon" class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                        <i class="text-primary text-lg"></i>
                    </div>
                    <div>
                        <p id="previewText" class="text-sm font-medium text-gray-800"></p>
                        <p class="text-xs text-gray-500" id="previewCode"></p>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                    <i class="fa fa-plus-circle"></i>
                    <span>Tambah Ekstrakurikuler</span>
                </button>
                <a href="<?= base_url('admin/ekstrakurikuler'); ?>" 
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
    const iconSelect = document.querySelector('select[name="icon"]');
    const iconPreview = document.getElementById('iconPreview');
    const previewIcon = document.getElementById('previewIcon');
    const previewText = document.getElementById('previewText');
    const previewCode = document.getElementById('previewCode');

    // Icon preview functionality
    iconSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const iconClass = this.value;
        const iconText = selectedOption.textContent;
        
        if (iconClass) {
            // Show preview
            iconPreview.classList.remove('hidden');
            
            // Update preview icon
            const iconElement = previewIcon.querySelector('i');
            iconElement.className = iconClass + ' text-primary text-lg';
            
            // Update preview text
            previewText.textContent = iconText.split(' ').slice(1).join(' ');
            previewCode.textContent = iconClass;
        } else {
            // Hide preview if no icon selected
            iconPreview.classList.add('hidden');
        }
    });

    // Form validation
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

<?= $this->endSection() ?>