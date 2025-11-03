<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Tambah Pengajar Baru</h1>
            <p class="text-gray-600 mt-2">Tambahkan data pengajar baru ke dalam sistem</p>
        </div>
        <a href="<?= base_url('admin/pengajar'); ?>" 
           class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <!-- Alert Error -->
    <?php if (session()->getFlashdata('error')): ?>
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fa fa-exclamation-circle text-red-500"></i>
                <span class="font-medium"><?= session()->getFlashdata('error') ?></span>
            </div>
            <button type="button" class="text-red-500 hover:text-red-700 transition-colors duration-200" onclick="this.parentElement.parentElement.remove()">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <form action="<?= base_url('admin/pengajar/simpan'); ?>" method="post" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="nama_lengkap" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Masukkan nama lengkap" required>
                    </div>
                </div>

                <!-- NIP -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">NIP</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-id-card text-gray-400"></i>
                        </div>
                        <input type="text" name="nip" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Masukkan NIP">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Jabatan -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Jabatan / Mata Pelajaran <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-briefcase text-gray-400"></i>
                        </div>
                        <input type="text" name="jabatan" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Contoh: Ustadz Tahfizh, Guru Matematika" required>
                    </div>
                </div>

                <!-- Nomor HP -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-phone text-gray-400"></i>
                        </div>
                        <input type="text" name="no_hp" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Contoh: 081234567890">
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
                              placeholder="Masukkan alamat lengkap"></textarea>
                </div>
            </div>

            <!-- Foto Profil -->
            <div class="space-y-4">
                <label class="block text-sm font-medium text-gray-700">Foto Profil</label>

                <!-- File Upload -->
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary transition-colors duration-200">
                    <div class="flex flex-col items-center justify-center space-y-3">
                        <i class="fa fa-cloud-upload-alt text-3xl text-gray-400"></i>
                        <div>
                            <p class="text-sm text-gray-600">
                                <span class="font-medium text-primary">Klik untuk upload</span> atau drag and drop
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                PNG, JPG, JPEG (Maks. 2MB)
                            </p>
                        </div>
                        <input type="file" name="foto" 
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                               accept="image/*">
                    </div>
                </div>
                <p class="text-xs text-gray-500">Upload foto profil pengajar (opsional)</p>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                    <i class="fa fa-save"></i>
                    <span>Simpan Data Pengajar</span>
                </button>
                <a href="<?= base_url('admin/pengajar'); ?>" 
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
    // File upload preview
    const fileInput = document.querySelector('input[type="file"]');
    const uploadArea = document.querySelector('.border-dashed');
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validasi ukuran file (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                this.value = '';
                return;
            }
            
            // Validasi tipe file
            if (!file.type.match('image.*')) {
                alert('Hanya file gambar yang diizinkan');
                this.value = '';
                return;
            }
            
            // Update tampilan upload area
            const reader = new FileReader();
            reader.onload = function(e) {
                uploadArea.innerHTML = `
                    <div class="flex flex-col items-center justify-center space-y-3">
                        <img src="${e.target.result}" class="w-20 h-20 rounded-xl object-cover shadow-sm">
                        <p class="text-sm text-gray-600 font-medium">${file.name}</p>
                        <p class="text-xs text-gray-500">Klik untuk mengganti foto</p>
                    </div>
                    <input type="file" name="foto" 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                           accept="image/*">
                `;
                
                // Re-attach event listener to new file input
                const newFileInput = uploadArea.querySelector('input[type="file"]');
                newFileInput.addEventListener('change', arguments.callee);
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag and drop functionality
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        uploadArea.classList.add('border-primary', 'bg-primary/5');
    }

    function unhighlight() {
        uploadArea.classList.remove('border-primary', 'bg-primary/5');
    }

    uploadArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        fileInput.files = files;
        
        // Trigger change event
        const event = new Event('change');
        fileInput.dispatchEvent(event);
    }

    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let valid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.classList.add('border-red-500');
                
                // Add error message
                if (!field.nextElementSibling?.classList.contains('error-message')) {
                    const errorMsg = document.createElement('p');
                    errorMsg.className = 'error-message text-red-500 text-xs mt-1';
                    errorMsg.textContent = 'Field ini wajib diisi';
                    field.parentNode.appendChild(errorMsg);
                }
            } else {
                field.classList.remove('border-red-500');
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
        }
    });
});
</script>

<style>
.border-dashed {
    position: relative;
    transition: all 0.3s ease;
}

.error-message {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}

input:focus, textarea:focus {
    outline: none;
}
</style>

<?= $this->endSection() ?>