<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Edit Kegiatan</h1>
            <p class="text-gray-600 mt-2">Ubah informasi kegiatan pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/kegiatan'); ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <form action="<?= base_url('admin/kegiatan/update/'.$kegiatan['id']); ?>" method="post" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field(); ?>

            <!-- Judul Kegiatan -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Judul Kegiatan *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa fa-heading text-gray-400"></i>
                    </div>
                    <input type="text" name="judul" value="<?= esc($kegiatan['judul']); ?>" 
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
                              placeholder="Jelaskan detail kegiatan..."><?= esc($kegiatan['deskripsi']); ?></textarea>
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
                        <input type="date" name="tanggal" value="<?= esc($kegiatan['tanggal']); ?>" 
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
                        <input type="text" name="lokasi" value="<?= esc($kegiatan['lokasi']); ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" 
                               placeholder="Contoh: Masjid, Aula, Lapangan" required>
                    </div>
                </div>
            </div>

            <!-- Foto -->
            <div class="space-y-4">
                <label class="block text-sm font-medium text-gray-700">Foto Kegiatan</label>

                <?php if (!empty($foto)): ?>
                <div class="mb-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <p class="text-sm text-gray-600 mb-3">Foto Saat Ini:</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <?php foreach ($foto as $f): ?>
                        <div class="relative group">
                            <img src="<?= base_url('uploads/kegiatan/' . esc($f['file_name'])) ?>" 
                                alt="<?= esc($kegiatan['judul']); ?>" 
                                class="w-full h-28 rounded-lg object-cover shadow-sm border-2 border-white group-hover:scale-105 transition-transform duration-200">

                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all duration-200 flex items-center justify-center">
                                <a href="<?= base_url('uploads/kegiatan/' . esc($f['file_name'])) ?>" 
                                target="_blank" 
                                class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>

                            <!-- Tombol hapus -->
                            <button type="button" 
                                    class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1 cursor-pointer hover:bg-red-700 delete-btn"
                                    data-foto-id="<?= esc($f['id_foto']) ?>">
                                <i class="fa fa-trash text-xs"></i>
                            </button>

                            <!-- Checkbox tersembunyi -->
                            <input type="checkbox" name="hapus_foto[]" value="<?= esc($f['id_foto']) ?>" class="hidden delete-checkbox">
                        </div>

                        <?php endforeach; ?>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Centang ikon tempat sampah untuk menghapus foto lama.</p>
                </div>
                <?php else: ?>
                    <p class="text-gray-500 text-sm italic mb-4">Belum ada foto dokumentasi untuk kegiatan ini.</p>
                <?php endif; ?>

                <!-- Upload baru -->
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary transition-colors duration-200 relative">
                    <div class="flex flex-col items-center justify-center space-y-3">
                        <i class="fa fa-cloud-upload-alt text-3xl text-gray-400"></i>
                        <div>
                            <p class="text-sm text-gray-600">
                                <span class="font-medium text-primary">Klik untuk upload</span> atau drag and drop
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Bisa pilih beberapa foto (PNG, JPG, JPEG, Maks. 2MB per foto)
                            </p>
                        </div>
                        <input type="file" name="foto[]" 
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                            accept="image/*" multiple>
                    </div>
                </div>

                <!-- Preview gambar baru -->
                <div id="imagePreview" class="hidden p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <p class="text-sm text-gray-600 mb-2">Preview Gambar Baru:</p>
                    <div id="previewContainer" class="flex flex-wrap gap-3"></div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                    <i class="fa fa-save"></i>
                    <span>Update Kegiatan</span>
                </button>
                <a href="<?= base_url('admin/kegiatan'); ?>" 
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
    const fileInput = document.querySelector('input[name="foto[]"]');
    const uploadArea = document.querySelector('.border-dashed');
    const imagePreview = document.getElementById('imagePreview');
    const previewContainer = document.getElementById('previewContainer');

    // Event listener upload file
    fileInput.addEventListener('change', function(e) {
        const files = e.target.files;
        previewContainer.innerHTML = ''; // Hapus preview lama

        if (files.length === 0) {
            imagePreview.classList.add('hidden');
            return;
        }

        imagePreview.classList.remove('hidden');

        Array.from(files).forEach(file => {
            // Validasi ukuran file (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert(`File "${file.name}" terlalu besar (maksimal 2MB)`);
                return;
            }

            // Validasi tipe file
            if (!file.type.match('image.*')) {
                alert(`File "${file.name}" bukan gambar yang valid`);
                return;
            }

            // Baca dan tampilkan preview
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewDiv = document.createElement('div');
                previewDiv.classList.add('relative', 'w-24', 'h-24');

                previewDiv.innerHTML = `
                    <img src="${e.target.result}" 
                         alt="${file.name}" 
                         class="w-24 h-24 object-cover rounded-lg border border-gray-200 shadow-sm">
                    <span class="absolute bottom-1 left-1 bg-black bg-opacity-50 text-white text-[10px] px-1 rounded">
                        ${formatFileSize(file.size)}
                    </span>
                `;

                previewContainer.appendChild(previewDiv);
            };
            reader.readAsDataURL(file);
        });

    // Format ukuran file
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
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

document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const parent = btn.closest('.relative');
            const checkbox = parent.querySelector('.delete-checkbox');

            // toggle nilai checkbox
            checkbox.checked = !checkbox.checked;

            // beri efek visual kalau sudah dipilih
            if (checkbox.checked) {
                parent.classList.add('ring-2', 'ring-red-500', 'opacity-75');
            } else {
                parent.classList.remove('ring-2', 'ring-red-500', 'opacity-75');
            }
        });
    });
});

document.getElementById('fotoInput').addEventListener('change', function(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');

    previewContainer.innerHTML = '';
    if (files.length > 0) {
        imagePreview.classList.remove('hidden');
    } else {
        imagePreview.classList.add('hidden');
    }

    for (const file of files) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgWrapper = document.createElement('div');
            imgWrapper.className = "w-20 h-20 rounded-lg overflow-hidden border border-gray-200 shadow-sm";

            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = file.name;
            img.className = "object-cover w-full h-full";

            imgWrapper.appendChild(img);
            previewContainer.appendChild(imgWrapper);
        }
        reader.readAsDataURL(file);
    }
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