<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Detail Data Santri</h1>
            <p class="text-gray-600 mt-2">Informasi lengkap data santri pondok pesantren</p>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-2 sm:space-y-0 mt-4 md:mt-0">
            <a href="<?= base_url('admin/santri/edit/' . $santri['id']); ?>" 
               class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                <i class="fa fa-edit"></i>
                <span>Edit Data</span>
            </a>
            <a href="<?= base_url('admin/santri'); ?>" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                <i class="fa fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <?php if ($santri): ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informasi Utama -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Header Card -->
                <div class="bg-gradient-to-r from-primary-dark to-primary p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center">
                            <img src="<?= $santri['foto'] ? base_url('uploads/santri/' . $santri['foto']) : base_url('assets/images/default-avatar.png') ?>" 
                                 alt="Foto Santri" 
                                 class="w-16 h-16 rounded-full object-cover border-4 border-white">
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-white font-amiri"><?= esc($santri['nama_lengkap']) ?></h2>
                            <div class="flex flex-wrap items-center gap-3 mt-2">
                                <span class="px-3 py-1 bg-white/20 text-white rounded-full text-sm font-medium">
                                    NIS: <?= esc($santri['nis']) ?>
                                </span>
                                <span class="px-3 py-1 bg-white/20 text-white rounded-full text-sm font-medium">
                                    <?= esc($santri['jenjang']) ?>
                                </span>
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    <?= $santri['status'] == 'Aktif' ? 'bg-green-500 text-white' : 
                                       ($santri['status'] == 'Lulus' ? 'bg-blue-500 text-white' : 
                                       'bg-gray-500 text-white') ?>">
                                    <?= esc($santri['status']) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Body Card -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Data Pribadi -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2">Data Pribadi</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Jenis Kelamin</span>
                                    <span class="font-medium text-gray-800 text-right">
                                        <?= esc($santri['jenis_kelamin']) ?>
                                    </span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Tempat, Tanggal Lahir</span>
                                    <span class="font-medium text-gray-800 text-right">
                                        <?= esc($santri['tempat_lahir']) ? esc($santri['tempat_lahir']) . ', ' : '' ?>
                                        <?= $santri['tanggal_lahir'] ? date('d-m-Y', strtotime($santri['tanggal_lahir'])) : '-' ?>
                                    </span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">NISN</span>
                                    <span class="font-medium text-gray-800"><?= esc($santri['nisn']) ?: '-' ?></span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Asal Sekolah</span>
                                    <span class="font-medium text-gray-800 text-right"><?= esc($santri['asal_sekolah']) ?></span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">No HP</span>
                                    <span class="font-medium text-gray-800"><?= esc($santri['no_hp']) ?: '-' ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Data Pondok -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2">Data Pondok</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Status</span>
                                    <span class="font-medium text-gray-800">
                                        <span class="px-2 py-1 rounded-full text-xs 
                                            <?= $santri['status'] == 'Aktif' ? 'bg-green-100 text-green-800' : 
                                               ($santri['status'] == 'Lulus' ? 'bg-blue-100 text-blue-800' : 
                                               'bg-gray-100 text-gray-800') ?>">
                                            <?= esc($santri['status']) ?>
                                        </span>
                                    </span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Jenjang</span>
                                    <span class="font-medium text-gray-800"><?= esc($santri['jenjang']) ?></span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Tanggal Daftar</span>
                                    <span class="font-medium text-gray-800">
                                        <?= $santri['tanggal_daftar'] ? date('d-m-Y H:i', strtotime($santri['tanggal_daftar'])) : '-' ?>
                                    </span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Data Diupdate</span>
                                    <span class="font-medium text-gray-800">
                                        <?= $santri['updated_at'] ? date('d-m-Y H:i', strtotime($santri['updated_at'])) : '-' ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mt-6 space-y-4">
                        <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2">Alamat</h3>
                        <p class="text-gray-700 leading-relaxed"><?= esc($santri['alamat']) ? nl2br(esc($santri['alamat'])) : '<span class="text-gray-400">Belum ada alamat</span>' ?></p>
                    </div>
                </div>
            </div>

            <!-- Data Orang Tua -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">
                <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2 mb-4">Data Orang Tua</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Data Ayah -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 text-blue-600">
                            <i class="fa fa-male text-xl"></i>
                            <h4 class="font-semibold">Ayah</h4>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-start">
                                <span class="text-sm text-gray-600">Nama Lengkap</span>
                                <span class="font-medium text-gray-800 text-right"><?= esc($santri['nama_ayah']) ?: '-' ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Data Ibu -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 text-pink-600">
                            <i class="fa fa-female text-xl"></i>
                            <h4 class="font-semibold">Ibu</h4>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between items-start">
                                <span class="text-sm text-gray-600">Nama Lengkap</span>
                                <span class="font-medium text-gray-800 text-right"><?= esc($santri['nama_ibu']) ?: '-' ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kontak Orang Tua -->
                <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <div class="flex items-center space-x-2 text-gray-600 mb-3">
                        <i class="fa fa-phone"></i>
                        <span class="font-medium">Kontak Orang Tua</span>
                    </div>
                    <p class="text-gray-700"><?= esc($santri['no_hp_ortu']) ?: '<span class="text-gray-400">Belum ada nomor telepon</span>' ?></p>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Status Santri</h3>
                
                <?php if ($santri['status'] == 'Aktif'): ?>
                    <div class="flex items-center space-x-3 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <i class="fa fa-check-circle text-green-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-green-800">Santri Aktif</p>
                            <p class="text-sm text-green-600">Sedang menempuh pendidikan</p>
                        </div>
                    </div>
                <?php elseif ($santri['status'] == 'Lulus'): ?>
                    <div class="flex items-center space-x-3 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                        <i class="fa fa-graduation-cap text-blue-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-blue-800">Santri Lulus</p>
                            <p class="text-sm text-blue-600">Telah menyelesaikan pendidikan</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center space-x-3 p-4 bg-gray-50 border border-gray-200 rounded-xl">
                        <i class="fa fa-times-circle text-gray-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-gray-800">Santri Nonaktif</p>
                            <p class="text-sm text-gray-600">Tidak aktif lagi</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Informasi Pendaftaran -->
            <?php if ($santri['id_pendaftaran']): ?>
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Sumber Data</h3>
                <div class="flex items-center space-x-3 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                    <i class="fa fa-database text-blue-600 text-xl"></i>
                    <div>
                        <p class="font-medium text-blue-800">Data dari Pendaftaran</p>
                        <p class="text-sm text-blue-600">ID: <?= $santri['id_pendaftaran'] ?></p>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Sumber Data</h3>
                <div class="flex items-center space-x-3 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <i class="fa fa-edit text-green-600 text-xl"></i>
                    <div>
                        <p class="font-medium text-green-800">Input Manual</p>
                        <p class="text-sm text-green-600">Data dimasukkan secara manual</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Dokumen -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Dokumen</h3>
                
                <div class="space-y-3">
                    <?php if ($santri['foto']): ?>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <i class="fa fa-image text-primary"></i>
                            </div>
                            <span class="text-gray-700">Foto Santri</span>
                        </div>
                        <a href="<?= base_url('uploads/santri/' . $santri['foto']) ?>" 
                           target="_blank" 
                           class="text-primary hover:text-primary-dark transition-colors duration-200">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if ($santri['ktp_ortu']): ?>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <i class="fa fa-id-card text-blue-600"></i>
                            </div>
                            <span class="text-gray-700">KTP Orang Tua</span>
                        </div>
                        <a href="<?= base_url('uploads/berkas/' . $santri['ktp_ortu']) ?>" 
                           target="_blank" 
                           class="text-primary hover:text-primary-dark transition-colors duration-200">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if ($santri['akta_kk']): ?>
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <i class="fa fa-file-contract text-green-600"></i>
                            </div>
                            <span class="text-gray-700">Akta & KK</span>
                        </div>
                        <a href="<?= base_url('uploads/berkas/' . $santri['akta_kk']) ?>" 
                           target="_blank" 
                           class="text-primary hover:text-primary-dark transition-colors duration-200">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if (!$santri['foto'] && !$santri['ktp_ortu'] && !$santri['akta_kk']): ?>
                    <div class="text-center py-4 text-gray-500">
                        <i class="fa fa-folder-open text-3xl mb-2"></i>
                        <p class="text-sm">Belum ada dokumen</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Aksi Cepat</h3>
                
                <div class="space-y-3">
                    <a href="<?= base_url('admin/santri/edit/' . $santri['id']); ?>" 
                       class="w-full bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-edit"></i>
                        <span>Edit Data</span>
                    </a>
                    
                    <?php if ($santri['status'] == 'Aktif'): ?>
                    <button onclick="updateStatus('Lulus')" 
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-graduation-cap"></i>
                        <span>Set Lulus</span>
                    </button>
                    
                    <button onclick="updateStatus('Nonaktif')" 
                            class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-times"></i>
                        <span>Set Nonaktif</span>
                    </button>
                    <?php elseif ($santri['status'] == 'Lulus'): ?>
                    <button onclick="updateStatus('Aktif')" 
                            class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-check"></i>
                        <span>Set Aktif</span>
                    </button>
                    <?php else: ?>
                    <button onclick="updateStatus('Aktif')" 
                            class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-check"></i>
                        <span>Set Aktif</span>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
        <div class="text-gray-400 text-6xl mb-4">
            <i class="fa fa-user-slash"></i>
        </div>
        <h3 class="text-xl font-medium text-gray-600 mb-2">Data santri tidak ditemukan</h3>
        <p class="text-gray-500 mb-6">Data santri yang Anda cari tidak dapat ditemukan</p>
        <a href="<?= base_url('admin/santri'); ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-medium inline-flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar Santri</span>
        </a>
    </div>
    <?php endif; ?>
</div>

<!-- Status Update Modal -->
<div id="statusModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-xl font-bold text-primary-dark font-amiri">Update Status Santri</h3>
        </div>
        <div class="p-6">
            <p id="modalMessage" class="text-gray-600 mb-6"></p>
            <div class="flex space-x-3">
                <button id="confirmUpdate" 
                        class="flex-1 bg-primary hover:bg-primary-dark text-white py-3 rounded-xl font-semibold transition-all duration-200">
                    Ya, Update
                </button>
                <button onclick="closeModal()" 
                        class="flex-1 bg-gray-500 hover:bg-gray-600 text-white py-3 rounded-xl font-semibold transition-all duration-200">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let targetStatus = '';

function updateStatus(status) {
    const statusText = {
        'Aktif': 'mengaktifkan',
        'Lulus': 'meluluskan',
        'Nonaktif': 'menonaktifkan'
    };
    
    targetStatus = status;
    
    document.getElementById('modalMessage').textContent = 
        `Apakah Anda yakin ingin ${statusText[status]} santri <?= esc($santri['nama_lengkap']) ?>?`;
    
    document.getElementById('statusModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('statusModal').classList.add('hidden');
    targetStatus = '';
}

document.getElementById('confirmUpdate').addEventListener('click', function() {
    if (!targetStatus) return;
    
    fetch(`<?= base_url('admin/santri/update-status/') ?>${<?= $santri['id'] ?>}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ status: targetStatus })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Gagal mengupdate status');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengupdate status');
    });
    
    closeModal();
});

// Close modal when clicking outside
document.getElementById('statusModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Keyboard support
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>

<style>
.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(1, 112, 119, 0.15);
}
</style>

<?= $this->endSection(); ?>