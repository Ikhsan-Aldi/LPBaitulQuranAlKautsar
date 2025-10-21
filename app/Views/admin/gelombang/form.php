<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/gelombang') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= isset($gelombang) ? base_url('admin/gelombang/update/' . $gelombang['id']) : base_url('admin/gelombang/simpan') ?>" method="post" id="gelombangForm">
                <?= csrf_field() ?>

                <!-- Nama Gelombang -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Gelombang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>" 
                           id="nama" name="nama" 
                           value="<?= old('nama', $gelombang['nama'] ?? '') ?>" 
                           placeholder="Contoh: Gelombang 1 Tahun 2024" required>
                    <?php if (session('errors.nama')): ?>
                        <div class="invalid-feedback"><?= session('errors.nama') ?></div>
                    <?php endif; ?>
                </div>

                <!-- Tanggal Mulai & Selesai -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control <?= session('errors.tanggal_mulai') ? 'is-invalid' : '' ?>" 
                                   id="tanggal_mulai" name="tanggal_mulai" 
                                   value="<?= old('tanggal_mulai', $gelombang['tanggal_mulai'] ?? '') ?>" required>
                            <?php if (session('errors.tanggal_mulai')): ?>
                                <div class="invalid-feedback"><?= session('errors.tanggal_mulai') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                            <input type="date" class="form-control <?= session('errors.tanggal_selesai') ? 'is-invalid' : '' ?>" 
                                   id="tanggal_selesai" name="tanggal_selesai" 
                                   value="<?= old('tanggal_selesai', $gelombang['tanggal_selesai'] ?? '') ?>" required>
                            <?php if (session('errors.tanggal_selesai')): ?>
                                <div class="invalid-feedback"><?= session('errors.tanggal_selesai') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Seleksi (Dinamis) -->
                <div class="mb-3">
                    <label class="form-label">Seleksi <span class="text-danger">*</span></label>
                    <button type="button" class="btn btn-sm btn-success mb-3" id="tambahSeleksi">
                        <i class="fas fa-plus me-1"></i>Tambah Seleksi
                    </button>
                    
                    <div id="seleksiContainer">
                        <?php 
                        $seleksi_array = $gelombang['seleksi_array'] ?? ['Akademik', 'Tilawah'];
                        $jadwal_array = $gelombang['jadwal_seleksi_array'] ?? ['', ''];
                        $metode_array = $gelombang['metode_array'] ?? ['', ''];
                        ?>

                        <?php foreach ($seleksi_array as $index => $seleksi): ?>
                        <div class="seleksi-item border p-3 mb-3 rounded">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Seleksi</label>
                                        <input type="text" class="form-control" name="seleksi[]" 
                                               value="<?= esc($seleksi) ?>" 
                                               placeholder="Contoh: Akademik, Tilawah, Wawancara" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Jadwal Seleksi</label>
                                        <input type="date" class="form-control" name="jadwal_seleksi[]" 
                                               value="<?= esc($jadwal_array[$index] ?? '') ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Metode</label>
                                        <select class="form-select" name="metode[]" required>
                                            <option value="">Pilih Metode</option>
                                            <option value="Online" <?= ($metode_array[$index] ?? '') == 'Online' ? 'selected' : '' ?>>Online</option>
                                            <option value="Offline" <?= ($metode_array[$index] ?? '') == 'Offline' ? 'selected' : '' ?>>Offline</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3 d-flex align-items-end h-100">
                                        <button type="button" class="btn btn-danger btn-block hapus-seleksi" <?= count($seleksi_array) <= 1 ? 'disabled' : '' ?>>
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select <?= session('errors.status') ? 'is-invalid' : '' ?>" 
                            id="status" name="status" required>
                        <option value="">Pilih Status</option>
                        <option value="dibuka" <?= old('status', $gelombang['status'] ?? '') == 'dibuka' ? 'selected' : '' ?>>Dibuka</option>
                        <option value="ditutup" <?= old('status', $gelombang['status'] ?? '') == 'ditutup' ? 'selected' : '' ?>>Ditutup</option>
                        <option value="berakhir" <?= old('status', $gelombang['status'] ?? '') == 'berakhir' ? 'selected' : '' ?>>Berakhir</option>
                    </select>
                    <?php if (session('errors.status')): ?>
                        <div class="invalid-feedback"><?= session('errors.status') ?></div>
                    <?php endif; ?>
                </div>

                <!-- Tombol Submit -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>
                        <?= isset($gelombang) ? 'Update' : 'Simpan' ?> Gelombang
                    </button>
                    <a href="<?= base_url('admin/gelombang') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
// Gunakan jQuery untuk memastikan kompatibilitas
document.addEventListener('DOMContentLoaded', function() {
    console.log('Script loaded'); // Debug
    
    const seleksiContainer = document.getElementById('seleksiContainer');
    const tambahSeleksiBtn = document.getElementById('tambahSeleksi');

    // Fungsi untuk update tombol hapus
    function updateHapusButtons() {
        const hapusButtons = document.querySelectorAll('.hapus-seleksi');
        console.log('Jumlah seleksi:', seleksiContainer.children.length); // Debug
        
        // Enable/disable tombol berdasarkan jumlah seleksi
        hapusButtons.forEach(button => {
            button.disabled = seleksiContainer.children.length <= 1;
        });
    }

    // Event delegation untuk tombol hapus
    seleksiContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('hapus-seleksi') || 
            e.target.closest('.hapus-seleksi')) {
            
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
            <div class="seleksi-item border p-3 mb-3 rounded">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Nama Seleksi</label>
                            <input type="text" class="form-control" name="seleksi[]" 
                                   placeholder="Contoh: Akademik, Tilawah, Wawancara" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Jadwal Seleksi</label>
                            <input type="date" class="form-control" name="jadwal_seleksi[]" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Metode</label>
                            <select class="form-select" name="metode[]" required>
                                <option value="">Pilih Metode</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="mb-3 d-flex align-items-end h-100">
                            <button type="button" class="btn btn-danger btn-block hapus-seleksi">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
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