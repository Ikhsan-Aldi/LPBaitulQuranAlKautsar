<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<div class="p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark font-amiri">Pengaturan Informasi Perusahaan</h1>
        <p class="text-gray-600 mt-2">Kelola informasi kontak dan media sosial Pondok Pesantren Al-Kautsar</p>
    </div>

    <!-- Settings Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <form action="<?= base_url('admin/pengaturan/update') ?>" method="POST">
            <?= csrf_field() ?>
            
            <!-- Informasi Kontak -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-primary-dark mb-4 border-b pb-2">Informasi Kontak</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Telepon -->
                    <div>
                        <label for="telepon" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-phone mr-2 text-primary"></i>Telepon
                        </label>
                        <input type="text" 
                               id="telepon" 
                               name="telepon" 
                               value="<?= old('telepon', $kontak['telepon'] ?? '') ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                               placeholder="Contoh: +62 812 3456 7890">
                    </div>

                    <!-- WhatsApp -->
                    <div>
                        <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-whatsapp mr-2 text-green-500"></i>WhatsApp
                        </label>
                        <input type="text" 
                               id="whatsapp" 
                               name="whatsapp" 
                               value="<?= old('whatsapp', $kontak['whatsapp'] ?? '') ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                               placeholder="Contoh: +62 812 3456 7890">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-envelope mr-2 text-primary-medium"></i>Email
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="<?= old('email', $kontak['email'] ?? '') ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                               placeholder="Contoh: info@alkautsar.sch.id">
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map-marker-alt mr-2 text-primary-light"></i>Alamat
                        </label>
                        <textarea 
                            id="alamat" 
                            name="alamat" 
                            rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                            placeholder="Masukkan alamat lengkap pondok pesantren"><?= old('alamat', $kontak['alamat'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Media Sosial -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-primary-dark mb-4 border-b pb-2">Media Sosial</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Facebook -->
                    <div>
                        <label for="facebook" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-facebook mr-2 text-blue-600"></i>Facebook
                        </label>
                        <input type="text" 
                               id="facebook" 
                               name="facebook" 
                               value="<?= old('facebook', $kontak['facebook'] ?? '') ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                               placeholder="Contoh: https://facebook.com/alkautsar">
                    </div>

                    <!-- Instagram -->
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-instagram mr-2 text-pink-600"></i>Instagram
                        </label>
                        <input type="text" 
                               id="instagram" 
                               name="instagram" 
                               value="<?= old('instagram', $kontak['instagram'] ?? '') ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                               placeholder="Contoh: https://instagram.com/alkautsar">
                    </div>

                    <!-- TikTok -->
                    <div>
                        <label for="tiktok" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-tiktok mr-2 text-gray-800"></i>TikTok
                        </label>
                        <input type="text" 
                               id="tiktok" 
                               name="tiktok" 
                               value="<?= old('tiktok', $kontak['tiktok'] ?? '') ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                               placeholder="Contoh: https://tiktok.com/@alkautsar">
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="<?= base_url('admin/dashboard') ?>" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-primary text-white rounded-xl hover:bg-primary-dark transition-colors font-medium">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- Preview Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">
        <h3 class="text-xl font-semibold text-primary-dark mb-4">Preview Informasi</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kontak Info -->
            <div class="space-y-4">
                <h4 class="font-semibold text-gray-800 border-b pb-2">Informasi Kontak</h4>
                <div class="space-y-3">
                    <!-- Di bagian preview -->
                    <?php if(isset($kontak['telepon']) && !empty($kontak['telepon'])): ?>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-phone text-primary w-5"></i>
                        <span class="text-gray-700"><?= format_phone_number($kontak['telepon']) ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($kontak['whatsapp']) && !empty($kontak['whatsapp'])): ?>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-whatsapp text-green-500 w-5"></i>
                        <span class="text-gray-700"><?= format_phone_number($kontak['whatsapp']) ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($kontak['email']) && !empty($kontak['email'])): ?>
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-primary-medium w-5"></i>
                        <span class="text-gray-700"><?= $kontak['email'] ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($kontak['alamat']) && !empty($kontak['alamat'])): ?>
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-map-marker-alt text-primary-light w-5 mt-1"></i>
                        <span class="text-gray-700"><?= nl2br($kontak['alamat']) ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Social Media -->
            <div class="space-y-4">
                <h4 class="font-semibold text-gray-800 border-b pb-2">Media Sosial</h4>
                <div class="space-y-3">
                    <?php if(isset($kontak['facebook']) && !empty($kontak['facebook'])): ?>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-facebook text-blue-600 w-5"></i>
                        <a href="<?= $kontak['facebook'] ?>" target="_blank" class="text-primary hover:text-primary-dark">
                            <?= $kontak['facebook'] ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($kontak['instagram']) && !empty($kontak['instagram'])): ?>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-instagram text-pink-600 w-5"></i>
                        <a href="<?= $kontak['instagram'] ?>" target="_blank" class="text-primary hover:text-primary-dark">
                            <?= $kontak['instagram'] ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(isset($kontak['tiktok']) && !empty($kontak['tiktok'])): ?>
                    <div class="flex items-center space-x-3">
                        <i class="fab fa-tiktok text-gray-800 w-5"></i>
                        <a href="<?= $kontak['tiktok'] ?>" target="_blank" class="text-primary hover:text-primary-dark">
                            <?= $kontak['tiktok'] ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Real-time preview functionality
document.addEventListener('DOMContentLoaded', function() {
    const formInputs = document.querySelectorAll('input, textarea');
    
    formInputs.forEach(input => {
        input.addEventListener('input', function() {
            updatePreview(this.id, this.value);
        });
    });

    function updatePreview(fieldId, value) {
        // This function can be extended to update the preview section in real-time
        console.log(`Updating ${fieldId}: ${value}`);
    }
});

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const requiredFields = ['telepon', 'email', 'alamat'];
    let isValid = true;

    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('border-red-500');
        } else {
            input.classList.remove('border-red-500');
        }
    });

    if (!isValid) {
        e.preventDefault();
        alert('Harap lengkapi semua field yang wajib diisi!');
    }
});
</script>

<style>
.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    box-shadow: 0 10px 25px rgba(1, 112, 119, 0.15);
}

input:focus, textarea:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(1, 112, 119, 0.1);
}
</style>
<?= $this->endSection() ?>