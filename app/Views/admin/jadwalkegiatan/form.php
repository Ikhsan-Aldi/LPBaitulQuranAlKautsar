<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri"><?= esc($title) ?></h1>
            <p class="text-gray-600 mt-2"><?= isset($jadwal) ? 'Edit' : 'Tambah' ?> jadwal kegiatan harian</p>
        </div>
        <a href="<?= base_url('admin/jadwalkegiatan'); ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Alert Errors -->
    <?php if (session()->getFlashdata('errors')): ?>
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700">
        <div class="flex items-center space-x-2 mb-2">
            <i class="fa fa-exclamation-circle text-red-500"></i>
            <span class="font-medium">Terdapat kesalahan dalam pengisian form:</span>
        </div>
        <ul class="list-disc list-inside text-sm">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="<?= isset($jadwal) ? base_url('admin/jadwalkegiatan/update/' . $jadwal['id']) : base_url('admin/jadwalkegiatan/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Kegiatan -->
                <div class="md:col-span-2">
                    <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700 mb-2">Nama Kegiatan <span class="text-red-500">*</span></label>
                    <input type="text" 
                           id="nama_kegiatan" 
                           name="nama_kegiatan" 
                           value="<?= old('nama_kegiatan', $jadwal['nama_kegiatan'] ?? '') ?>" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200"
                           placeholder="Masukkan nama kegiatan"
                           required>
                </div>

                <!-- Waktu Mulai -->
                <div>
                    <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 mb-2">Waktu Mulai <span class="text-red-500">*</span></label>
                    <input type="time" 
                           id="waktu_mulai" 
                           name="waktu_mulai" 
                           value="<?= old('waktu_mulai', $jadwal['waktu_mulai'] ?? '') ?>" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200"
                           required>
                </div>

                <!-- Waktu Selesai -->
                <div>
                    <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 mb-2">Waktu Selesai <span class="text-red-500">*</span></label>
                    <input type="time" 
                           id="waktu_selesai" 
                           name="waktu_selesai" 
                           value="<?= old('waktu_selesai', $jadwal['waktu_selesai'] ?? '') ?>" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200"
                           required>
                </div>

                <!-- Klasifikasi (Opsional) -->
                <div>
                    <label for="klasifikasi" class="block text-sm font-medium text-gray-700 mb-2">Klasifikasi</label>
                    <select id="klasifikasi" 
                            name="klasifikasi" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                        <option value="">Otomatis (Berdasarkan Waktu Mulai)</option>
                        <option value="pagi"  <?= (old('klasifikasi', $jadwal['klasifikasi'] ?? '') == 'pagi') ? 'selected' : '' ?>>Pagi (03.00 - 11.59)</option>
                        <option value="siang" <?= (old('klasifikasi', $jadwal['klasifikasi'] ?? '') == 'siang') ? 'selected' : '' ?>>Siang (12.00 - 14.59)</option>
                        <option value="sore"  <?= (old('klasifikasi', $jadwal['klasifikasi'] ?? '') == 'sore') ? 'selected' : '' ?>>Sore (15.00 - 17.59)</option>
                        <option value="malam" <?= (old('klasifikasi', $jadwal['klasifikasi'] ?? '') == 'malam') ? 'selected' : '' ?>>Malam (18.00 - 02.59)</option>
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Biarkan kosong untuk menentukan otomatis berdasarkan waktu mulai</p>
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="4" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200"
                              placeholder="Masukkan deskripsi kegiatan (opsional)"><?= old('deskripsi', $jadwal['deskripsi'] ?? '') ?></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-end space-y-4 md:space-y-0 md:space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="<?= base_url('admin/jadwalkegiatan'); ?>" class="w-full md:w-auto bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold text-center transition-all duration-200">
                    Batal
                </a>
                <button type="submit" class="w-full md:w-auto bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                    <i class="fa fa-save"></i>
                    <span>Simpan Jadwal</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-update klasifikasi info based on waktu_mulai
    const waktuMulaiInput = document.getElementById('waktu_mulai');
    const klasifikasiSelect = document.getElementById('klasifikasi');
    
    waktuMulaiInput.addEventListener('change', function() {
        if (!klasifikasiSelect.value) {
            const time = this.value;
            if (time) {
                const hour = parseInt(time.split(':')[0]);
                let suggestedKlasifikasi = '';

                if (hour >= 3 && hour < 12) {
                    suggestedKlasifikasi = 'pagi';
                } else if (hour >= 12 && hour < 15) {
                    suggestedKlasifikasi = 'siang';
                } else if (hour >= 15 && hour < 18) {
                    suggestedKlasifikasi = 'sore';
                } else {
                    suggestedKlasifikasi = 'malam';
                }

                // Hapus info lama jika ada
                const existingInfo = document.getElementById('klasifikasi-info');
                if (existingInfo) {
                    existingInfo.remove();
                }

                // Tampilkan info klasifikasi yang disarankan
                const infoDiv = document.createElement('div');
                infoDiv.id = 'klasifikasi-info';
                infoDiv.className = 'text-sm text-primary mt-1';
                infoDiv.innerHTML = `<i class="fa fa-info-circle"></i> Sistem akan mengklasifikasikan sebagai <strong>${suggestedKlasifikasi}</strong>`;

                klasifikasiSelect.parentNode.appendChild(infoDiv);
            }
        }
    });
});
</script>

<?= $this->endSection() ?>