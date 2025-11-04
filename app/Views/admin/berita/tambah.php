<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Tambah Berita</h1>
            <p class="text-gray-600 mt-2">Buat berita baru untuk pondok pesantren</p>
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
                <div>
                    <?php 
                    $errors = session()->getFlashdata('error');
                    if (is_array($errors)): 
                        foreach ($errors as $error): ?>
                            <span class="font-medium block"><?= $error ?></span>
                        <?php endforeach; 
                    else: ?>
                        <span class="font-medium"><?= $errors ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <button type="button" class="text-red-500 hover:text-red-700 transition-colors duration-200" onclick="this.parentElement.parentElement.remove()">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <form action="<?= base_url('admin/berita/store') ?>" method="post" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>

            <!-- Judul -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Berita</label>
                <input type="text" name="judul" value="<?= old('judul') ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-200"
                       placeholder="Masukkan judul berita">
                <?php if (session()->getFlashdata('errors') && array_key_exists('judul', session()->getFlashdata('errors'))): ?>
                    <p class="text-red-500 text-sm mt-1"><?= session()->getFlashdata('errors')['judul'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Penulis -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Penulis</label>
                <input type="text" name="penulis" value="<?= old('penulis') ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-200"
                       placeholder="Nama penulis berita">
                <?php if (session()->getFlashdata('errors') && array_key_exists('penulis', session()->getFlashdata('errors'))): ?>
                    <p class="text-red-500 text-sm mt-1"><?= session()->getFlashdata('errors')['penulis'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Excerpt/ Ringkasan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Ringkasan Berita</label>
                <div id="excerpt-editor" style="height: 150px;" class="mb-4 rounded-xl border border-gray-300"><?= old('excerpt') ?></div>
                <textarea name="excerpt" id="excerpt" class="hidden"><?= old('excerpt') ?></textarea>
                <?php if (session()->getFlashdata('errors') && array_key_exists('excerpt', session()->getFlashdata('errors'))): ?>
                    <p class="text-red-500 text-sm mt-1"><?= session()->getFlashdata('errors')['excerpt'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Isi Berita -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Berita Lengkap</label>
                <div id="content-editor" style="height: 400px;" class="mb-4 rounded-xl border border-gray-300"><?= old('isi') ?></div>
                <textarea name="isi" id="content" class="hidden"><?= old('isi') ?></textarea>
                <?php if (session()->getFlashdata('errors') && array_key_exists('isi', session()->getFlashdata('errors'))): ?>
                    <p class="text-red-500 text-sm mt-1"><?= session()->getFlashdata('errors')['isi'] ?></p>
                <?php endif; ?>
            </div>

            <!-- Upload Foto -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Berita</label>
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
                <?php if (session()->getFlashdata('errors') && array_key_exists('foto', session()->getFlashdata('errors'))): ?>
                    <p class="text-red-500 text-sm mt-1"><?= session()->getFlashdata('errors')['foto'] ?></p>
                <?php endif; ?>
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
                    <span>Simpan Berita</span>
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

    // Set existing content if any
    const existingExcerpt = document.getElementById('excerpt').value;
    const existingContent = document.getElementById('content').value;
    
    if (existingExcerpt) {
        excerptQuill.root.innerHTML = existingExcerpt;
    }
    
    if (existingContent) {
        contentQuill.root.innerHTML = existingContent;
    }

    // Handle form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        document.getElementById('excerpt').value = excerptQuill.root.innerHTML;
        document.getElementById('content').value = contentQuill.root.innerHTML;

        // Basic validation
        const content = contentQuill.getText().trim();
        if (contentQuill.root.innerHTML.trim() === '<p><br></p>') {
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
                    <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
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