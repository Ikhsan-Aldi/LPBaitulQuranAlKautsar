<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Edit Berita</h1>
            <p class="text-gray-600 mt-2">Perbarui informasi berita pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/berita') ?>" 
           class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
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
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <form action="<?= base_url('admin/berita/update/'.$berita['id_berita']) ?>" method="post" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>

            <!-- Judul -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Berita</label>
                <input type="text" name="judul" value="<?= esc($berita['judul']) ?>" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-200">
            </div>

            <!-- Penulis -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Penulis</label>
                <input type="text" name="penulis" value="<?= esc($berita['penulis']) ?>" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-200">
            </div>

            <!-- Excerpt/ Ringkasan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ringkasan Berita</label>
                <div id="excerpt-editor" style="height: 150px;" class="mb-4 rounded-xl border border-gray-300"></div>
                <textarea name="excerpt" id="excerpt" class="hidden"><?= esc($berita['excerpt'] ?? '') ?></textarea>
            </div>

            <!-- Isi Berita -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Berita Lengkap</label>
                <div id="content-editor" style="height: 400px;" class="mb-4 rounded-xl border border-gray-300"></div>
                <textarea name="isi" id="content" class="hidden" required><?= esc($berita['isi']) ?></textarea>
            </div>

            <!-- Foto Lama -->
            <?php if (!empty($berita['foto'])): ?>
            <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                <p class="block text-sm font-semibold text-gray-700 mb-3">Foto Saat Ini:</p>
                <div class="flex items-center space-x-4">
                    <img src="<?= base_url('uploads/berita/'.$berita['foto']) ?>" 
                         alt="<?= esc($berita['judul']) ?>" 
                         class="w-32 h-32 object-cover rounded-lg shadow-md border-2 border-primary/20">
                    <div class="text-sm text-gray-600">
                        <p class="font-medium">Foto berita saat ini</p>
                        <p class="text-xs mt-1">Kosongkan form upload jika tidak ingin mengganti foto</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Upload Baru -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <?= !empty($berita['foto']) ? 'Ganti Foto' : 'Upload Foto' ?>
                </label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col w-full h-32 border-2 border-dashed border-gray-300 hover:border-primary/50 rounded-xl cursor-pointer transition-all duration-200">
                        <div class="flex flex-col items-center justify-center pt-7">
                            <i class="fa fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-600">Klik untuk upload foto</p>
                            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG. Maksimal 2MB</p>
                        </div>
                        <input type="file" name="foto" accept="image/*" class="opacity-0 absolute">
                    </label>
                </div>
                <div id="image-preview" class="mt-4 text-center hidden"></div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="<?= base_url('admin/berita') ?>" 
                   class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-semibold transition-all duration-200 flex items-center space-x-2">
                    <i class="fa fa-times"></i>
                    <span>Batal</span>
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-primary hover:bg-primary-dark text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                    <i class="fa fa-save"></i>
                    <span>Update Berita</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Quill.js Styles -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
// Initialize Quill Editors
document.addEventListener('DOMContentLoaded', function() {
    // Configure Quill options
    const quillOptions = {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                ['link', 'image'],
                [{ 'align': [] }],
                ['clean']
            ]
        },
        placeholder: 'Tulis konten berita di sini...'
    };

    // Initialize excerpt editor
    const excerptQuill = new Quill('#excerpt-editor', {
        ...quillOptions,
        placeholder: 'Tulis ringkasan berita di sini...'
    });

    // Initialize content editor
    const contentQuill = new Quill('#content-editor', quillOptions);

    // Set initial values from textarea (for edit form)
    const excerptTextarea = document.getElementById('excerpt');
    const contentTextarea = document.getElementById('content');
    
    if (excerptTextarea && excerptTextarea.value) {
        excerptQuill.root.innerHTML = excerptTextarea.value;
    }
    if (contentTextarea && contentTextarea.value) {
        contentQuill.root.innerHTML = contentTextarea.value;
    }

    // Handle form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        // Update textareas with Quill content
        excerptTextarea.value = excerptQuill.root.innerHTML;
        contentTextarea.value = contentQuill.root.innerHTML;
        
        // Basic validation
        const content = contentQuill.getText().trim();
        if (content.length === 0) {
            e.preventDefault();
            alert('Isi berita tidak boleh kosong');
            return false;
        }
    });

    // Image preview for file upload
    const fileInput = document.querySelector('input[name="foto"]');
    const imagePreview = document.getElementById('image-preview');
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `
                    <p class="text-sm font-medium text-gray-700 mb-2">Preview Foto Baru:</p>
                    <img src="${e.target.result}" class="w-32 h-32 object-cover rounded-lg shadow-md border-2 border-primary/20 mx-auto">
                `;
                imagePreview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>

<style>
.ql-toolbar.ql-snow {
    border-top: 1px solid #d1d5db;
    border-left: 1px solid #d1d5db;
    border-right: 1px solid #d1d5db;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    background: #f9fafb;
}

.ql-container.ql-snow {
    border-bottom: 1px solid #d1d5db;
    border-left: 1px solid #d1d5db;
    border-right: 1px solid #d1d5db;
    border-bottom-left-radius: 12px;
    border-bottom-right-radius: 12px;
    font-size: 14px;
}

.ql-editor {
    min-height: 150px;
}

.ql-editor.ql-blank::before {
    color: #9ca3af;
    font-style: italic;
}
</style>

<?= $this->endSection() ?>