<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-primary-dark"><?= $title ?></h1>
        <a href="<?= base_url('admin/gelombang') ?>" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex justify-between items-center">
            <div>
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
            <button type="button" class="text-red-700 hover:text-red-900" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            <div class="flex items-center mb-2">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span class="font-medium">Terjadi kesalahan:</span>
            </div>
            <ul class="list-disc list-inside text-sm">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="<?= isset($gelombang) ? base_url('admin/gelombang/update/' . $gelombang['id']) : base_url('admin/gelombang/simpan') ?>" method="post" id="gelombangForm">
            <?= csrf_field() ?>

            <!-- Nama Gelombang -->
            <div class="mb-6">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Gelombang <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nama" name="nama" 
                       value="<?= old('nama', $gelombang['nama'] ?? '') ?>" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent <?= session('errors.nama') ? 'border-red-500' : '' ?>"
                       placeholder="Contoh: Gelombang 1 Tahun 2024" required>
                <?php if (session('errors.nama')): ?>
                    <p class="mt-1 text-sm text-red-600"><?= session('errors.nama') ?></p>
                <?php endif; ?>
            </div>

            <!-- Tanggal Mulai & Selesai -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" 
                           value="<?= old('tanggal_mulai', $gelombang['tanggal_mulai'] ?? '') ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent <?= session('errors.tanggal_mulai') ? 'border-red-500' : '' ?>"
                           required>
                    <?php if (session('errors.tanggal_mulai')): ?>
                        <p class="mt-1 text-sm text-red-600"><?= session('errors.tanggal_mulai') ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" 
                           value="<?= old('tanggal_selesai', $gelombang['tanggal_selesai'] ?? '') ?>" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent <?= session('errors.tanggal_selesai') ? 'border-red-500' : '' ?>"
                           required>
                    <?php if (session('errors.tanggal_selesai')): ?>
                        <p class="mt-1 text-sm text-red-600"><?= session('errors.tanggal_selesai') ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Seleksi (Dinamis) -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Seleksi <span class="text-red-500">*</span>
                </label>
                <button type="button" id="tambahSeleksi" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 flex items-center mb-4">
                    <i class="fas fa-plus mr-2"></i>Tambah Seleksi
                </button>
                
                <div id="seleksiContainer">
                    <?php 
                    $seleksi_array = $gelombang['seleksi_array'] ?? ['Akademik', 'Tilawah'];
                    $jadwal_array = $gelombang['jadwal_seleksi_array'] ?? ['', ''];
                    $metode_array = $gelombang['metode_array'] ?? ['', ''];
                    ?>

                    <?php foreach ($seleksi_array as $index => $seleksi): ?>
                    <div class="seleksi-item border border-gray-300 rounded-lg p-4 mb-4 bg-gray-50">
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                            <div class="md:col-span-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Seleksi</label>
                                <input type="text" name="seleksi[]" 
                                       value="<?= esc($seleksi) ?>" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                       placeholder="Contoh: Akademik, Tilawah, Wawancara" required>
                            </div>
                            <div class="md:col-span-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jadwal Seleksi</label>
                                <input type="date" name="jadwal_seleksi[]" 
                                       value="<?= esc($jadwal_array[$index] ?? '') ?>" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                       required>
                            </div>
                            <div class="md:col-span-3">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Metode</label>
                                <select name="metode[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                                    <option value="">Pilih Metode</option>
                                    <option value="Online" <?= ($metode_array[$index] ?? '') == 'Online' ? 'selected' : '' ?>>Online</option>
                                    <option value="Offline" <?= ($metode_array[$index] ?? '') == 'Offline' ? 'selected' : '' ?>>Offline</option>
                                </select>
                            </div>
                            <div class="md:col-span-1 flex items-end">
                                <button type="button" class="hapus-seleksi bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg transition-colors duration-200 w-full h-10 flex items-center justify-center <?= count($seleksi_array) <= 1 ? 'opacity-50 cursor-not-allowed' : '' ?>" <?= count($seleksi_array) <= 1 ? 'disabled' : '' ?>>
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <select id="status" name="status" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent <?= session('errors.status') ? 'border-red-500' : '' ?>" required>
                    <option value="">Pilih Status</option>
                    <option value="dibuka" <?= old('status', $gelombang['status'] ?? '') == 'dibuka' ? 'selected' : '' ?>>Dibuka</option>
                    <option value="ditutup" <?= old('status', $gelombang['status'] ?? '') == 'ditutup' ? 'selected' : '' ?>>Ditutup</option>
                    <option value="berakhir" <?= old('status', $gelombang['status'] ?? '') == 'berakhir' ? 'selected' : '' ?>>Berakhir</option>
                </select>
                <?php if (session('errors.status')): ?>
                    <p class="mt-1 text-sm text-red-600"><?= session('errors.status') ?></p>
                <?php endif; ?>
            </div>

            <!-- Tombol Submit -->
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i>
                    <?= isset($gelombang) ? 'Update' : 'Simpan' ?> Gelombang
                </button>
                <a href="<?= base_url('admin/gelombang') ?>" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Script loaded');
    
    const seleksiContainer = document.getElementById('seleksiContainer');
    const tambahSeleksiBtn = document.getElementById('tambahSeleksi');

    // Fungsi untuk update tombol hapus
    function updateHapusButtons() {
        const hapusButtons = document.querySelectorAll('.hapus-seleksi');
        console.log('Jumlah seleksi:', seleksiContainer.children.length);
        
        // Enable/disable tombol berdasarkan jumlah seleksi
        hapusButtons.forEach(button => {
            if (seleksiContainer.children.length <= 1) {
                button.disabled = true;
                button.classList.add('opacity-50', 'cursor-not-allowed');
                button.classList.remove('hover:bg-red-700');
            } else {
                button.disabled = false;
                button.classList.remove('opacity-50', 'cursor-not-allowed');
                button.classList.add('hover:bg-red-700');
            }
        });
    }

    // Event delegation untuk tombol hapus
    seleksiContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('hapus-seleksi') || e.target.closest('.hapus-seleksi')) {
            const tombolHapus = e.target.classList.contains('hapus-seleksi') 
                ? e.target 
                : e.target.closest('.hapus-seleksi');
            
            if (seleksiContainer.children.length > 1) {
                tombolHapus.closest('.seleksi-item').remove();
                updateHapusButtons();
            }
            e.preventDefault();
        }
    });

    // Tambah seleksi baru
    tambahSeleksiBtn.addEventListener('click', function() {
        const newIndex = seleksiContainer.children.length;
        const newSeleksi = `
            <div class="seleksi-item border border-gray-300 rounded-lg p-4 mb-4 bg-gray-50">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <div class="md:col-span-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Seleksi</label>
                        <input type="text" name="seleksi[]" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Contoh: Akademik, Tilawah, Wawancara" required>
                    </div>
                    <div class="md:col-span-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jadwal Seleksi</label>
                        <input type="date" name="jadwal_seleksi[]" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               required>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Metode</label>
                        <select name="metode[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                            <option value="">Pilih Metode</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                    </div>
                    <div class="md:col-span-1 flex items-end">
                        <button type="button" class="hapus-seleksi bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg transition-colors duration-200 w-full h-10 flex items-center justify-center">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        seleksiContainer.insertAdjacentHTML('beforeend', newSeleksi);
        updateHapusButtons();
    });

    // Inisialisasi pertama kali
    updateHapusButtons();

    // Validasi tanggal
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalSelesai = document.getElementById('tanggal_selesai');

    function validateDates() {
        if (tanggalMulai.value && tanggalSelesai.value) {
            const mulai = new Date(tanggalMulai.value);
            const selesai = new Date(tanggalSelesai.value);
            
            if (selesai < mulai) {
                tanggalSelesai.setCustomValidity('Tanggal selesai harus setelah tanggal mulai');
            } else {
                tanggalSelesai.setCustomValidity('');
            }
        }
    }

    if (tanggalMulai && tanggalSelesai) {
        tanggalMulai.addEventListener('change', validateDates);
        tanggalSelesai.addEventListener('change', validateDates);
    }
});
</script>
<?= $this->endSection() ?>