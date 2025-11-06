<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri"><?= esc($title) ?></h1>
            <p class="text-gray-600 mt-2">Tambah rekening bank atau QRIS baru</p>
        </div>
        <a href="<?= base_url('admin/rekening') ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form -->
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <form action="<?= base_url('admin/rekening/store') ?>" method="post" enctype="multipart/form-data">
                <div class="space-y-6">

                    <!-- Jenis Rekening -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Donasi</label>
                        <select name="jenis" id="jenis" onchange="toggleForm()" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="bank">Bank</option>
                            <option value="qris">QRIS</option>
                        </select>
                        <p class="text-sm text-gray-500 mt-1">Pilih apakah ini rekening bank atau QRIS</p>
                    </div>

                    <!-- Form Bank -->
                    <div id="form-bank" class="hidden space-y-6">
                        <!-- Nama Bank -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Bank</label>
                            <input type="text" name="bank" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" placeholder="Contoh: BCA, BRI, Mandiri">
                        </div>

                        <!-- Nomor Rekening -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Rekening</label>
                            <input type="text" name="nomor_rekening" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" placeholder="Contoh: 1234567890">
                        </div>

                        <!-- Atas Nama -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Atas Nama</label>
                            <input type="text" name="atas_nama" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" placeholder="Nama pemilik rekening">
                        </div>
                    </div>

                    <!-- Form QRIS -->
                    <div id="form-qris" class="hidden space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gambar QRIS</label>
                            <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                            <p class="text-sm text-gray-500 mt-1">Unggah gambar QRIS (jpg, png)</p>
                        </div>
                    </div>

                    <!-- Atas Nama (untuk QRIS) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Atas Nama</label>
                        <input type="text" name="atas_nama" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200" placeholder="Nama pemilik rekening">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    <!-- Tombol -->
                    <div class="flex items-center space-x-4 pt-4">
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                            <i class="fa fa-save"></i>
                            <span>Simpan</span>
                        </button>
                        <a href="<?= base_url('admin/rekening') ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function toggleForm() {
    const jenis = document.getElementById('jenis').value;
    const bankForm = document.getElementById('form-bank');
    const qrisForm = document.getElementById('form-qris');

    if (jenis === 'bank') {
        bankForm.classList.remove('hidden');
        qrisForm.classList.add('hidden');
    } else if (jenis === 'qris') {
        qrisForm.classList.remove('hidden');
        bankForm.classList.add('hidden');
    } else {
        bankForm.classList.add('hidden');
        qrisForm.classList.add('hidden');
    }
}
</script>

<?= $this->endSection() ?>
