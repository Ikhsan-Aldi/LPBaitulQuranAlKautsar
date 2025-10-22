<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Tambah Kegiatan</h1>
            <p class="text-gray-600 mt-2">Tambah kegiatan baru pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/kegiatan'); ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <form action="<?= base_url('admin/kegiatan/simpan'); ?>" method="post" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field(); ?>

            <!-- Judul Kegiatan -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Judul Kegiatan *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa fa-heading text-gray-400"></i>
                    </div>
                    <input type="text" name="judul" 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                           placeholder="Masukkan judul kegiatan" required>
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
                              placeholder="Jelaskan detail kegiatan..."></textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tanggal -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Tanggal *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-calendar text-gray-400"></i>
                        </div>
                        <input type="date" name="tanggal" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               required>
                    </div>
                </div>

                <!-- Lokasi -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Lokasi *</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="lokasi" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Contoh: Masjid, Aula, Lapangan" required>
                    </div>
                </div>
            </div>

            <!-- Foto -->
            <div class="space-y-4">
            <label class="block text-sm font-medium text-gray-700">Foto Kegiatan</label>

            <!-- Area Upload -->
            <div id="uploadArea"
                class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary transition-colors duration-200 relative">
                <div class="flex flex-col items-center justify-center space-y-3 pointer-events-none">
                    <i class="fa fa-cloud-upload-alt text-3xl text-gray-400"></i>
                    <div>
                        <p class="text-sm text-gray-600">
                            <span class="font-medium text-primary">Klik untuk upload</span> atau drag and drop
                        </p>
                        <p class="text-xs text-gray-500 mt-1">
                            PNG, JPG, JPEG (Maks. 2MB per file)
                        </p>
                    </div>
                </div>
                <input type="file" name="foto[]" 
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                    accept="image/*"
                    multiple>
            </div>

            <!-- Preview Gambar -->
            <div id="imagePreview" class="hidden p-4 bg-gray-50 rounded-xl border border-gray-200 mt-4">
                <p class="text-sm text-gray-600 mb-3 font-medium">Preview Gambar:</p>
                <div id="previewContainer" class="flex flex-wrap gap-4"></div>
            </div>

            <p class="text-xs text-gray-500">Kamu bisa pilih beberapa file sekaligus</p>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
            <button type="submit" 
                    class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                <i class="fa fa-plus-circle"></i>
                <span>Tambah Kegiatan</span>
            </button>
            <a href="<?= base_url('admin/kegiatan'); ?>" 
            class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                <i class="fa fa-times"></i>
                <span>Batal</span>
            </a>
        </div>

    <!-- Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.querySelector('input[name="foto[]"]');
        const imagePreview = document.getElementById('imagePreview');
        const previewContainer = document.getElementById('previewContainer');

        fileInput.addEventListener('change', function(e) {
            const files = e.target.files;
            previewContainer.innerHTML = ''; // Kosongkan preview sebelumnya

            if (files.length > 0) {
                imagePreview.classList.remove('hidden');
            } else {
                imagePreview.classList.add('hidden');
            }

            Array.from(files).forEach(file => {
                if (!file.type.match('image.*')) return;
                if (file.size > 2 * 1024 * 1024) {
                    alert(`File "${file.name}" terlalu besar! Maksimal 2MB.`);
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgBox = document.createElement('div');
                    imgBox.classList.add('relative', 'w-24', 'h-24', 'rounded-lg', 'overflow-hidden', 'shadow-sm', 'group');

                    imgBox.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <span class="text-xs text-white font-medium text-center">${file.name}</span>
                        </div>
                    `;
                    previewContainer.appendChild(imgBox);
                };
                reader.readAsDataURL(file);
            });
        });
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
    box-shadow: 0 0 0 3px rgba(1, 112, 119, 0.1);
}
</style>

<?= $this->endSection(); ?>