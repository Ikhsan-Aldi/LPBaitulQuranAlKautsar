<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Detail Gelombang Pendaftaran</h1>
            <p class="text-gray-600 mt-2">Informasi lengkap periode pendaftaran santri baru</p>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-2 sm:space-y-0 mt-4 md:mt-0">
            <a href="<?= base_url('admin/gelombang/edit/' . $gelombang['id']); ?>" 
               class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                <i class="fa fa-edit"></i>
                <span>Edit Gelombang</span>
            </a>
            <a href="<?= base_url('admin/gelombang'); ?>" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                <i class="fa fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <?php if ($gelombang): ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informasi Utama -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Header Card -->
                <div class="bg-gradient-to-r from-primary-dark to-primary p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fa fa-calendar-alt text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-white font-amiri"><?= esc($gelombang['nama']) ?></h2>
                            <div class="flex flex-wrap items-center gap-3 mt-2">
                                <span class="px-3 py-1 bg-white/20 text-white rounded-full text-sm font-medium">
                                    Periode <?= date('Y', strtotime($gelombang['tanggal_mulai'])) ?>
                                </span>
                                <?php if ($gelombang['kuota']): ?>
                                <span class="px-3 py-1 bg-white/20 text-white rounded-full text-sm font-medium">
                                    Kuota: <?= $gelombang['kuota'] ?> santri
                                </span>
                                <?php endif; ?>
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    <?= $gelombang['status'] == 'dibuka' ? 'bg-green-500 text-white' : 
                                       ($gelombang['status'] == 'ditutup' ? 'bg-yellow-500 text-white' : 
                                       'bg-gray-500 text-white') ?>">
                                    <?= ucfirst($gelombang['status']) ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Body Card -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Informasi Periode -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2">Informasi Periode</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Tanggal Mulai</span>
                                    <span class="font-medium text-gray-800 text-right">
                                        <?= date('d F Y', strtotime($gelombang['tanggal_mulai'])) ?>
                                    </span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Tanggal Selesai</span>
                                    <span class="font-medium text-gray-800 text-right">
                                        <?= date('d F Y', strtotime($gelombang['tanggal_selesai'])) ?>
                                    </span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Durasi</span>
                                    <span class="font-medium text-gray-800">
                                        <?php
                                        $start = new DateTime($gelombang['tanggal_mulai']);
                                        $end = new DateTime($gelombang['tanggal_selesai']);
                                        $interval = $start->diff($end);
                                        echo $interval->days + 1 . ' hari';
                                        ?>
                                    </span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Status Periode</span>
                                    <span class="font-medium text-gray-800">
                                        <?php
                                        $today = new DateTime();
                                        $start = new DateTime($gelombang['tanggal_mulai']);
                                        $end = new DateTime($gelombang['tanggal_selesai']);
                                        
                                        if ($today < $start) {
                                            echo '<span class="text-blue-600">Akan Datang</span>';
                                        } elseif ($today > $end) {
                                            echo '<span class="text-gray-600">Telah Berakhir</span>';
                                        } else {
                                            echo '<span class="text-green-600">Berlangsung</span>';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Kuota -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2">Informasi Kuota</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Kuota Maksimal</span>
                                    <span class="font-medium text-gray-800">
                                        Tidak Terbatas
                                    </span>
                                </div>

                                <div class="flex justify-between items-start">
                                    <span class="text-sm text-gray-600">Pendaftar Terdaftar</span>
                                    <span class="font-medium text-gray-800">
                                        <?= $jumlah_pendaftar ?? '0' ?> santri
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <?php if (!empty($gelombang['deskripsi'])): ?>
                    <div class="mt-6 space-y-4">
                        <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2">Deskripsi</h3>
                        <p class="text-gray-700 leading-relaxed"><?= nl2br(esc($gelombang['deskripsi'])) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Tahap Seleksi -->
            <?php
            $seleksi = json_decode($gelombang['seleksi'] ?? '[]', true);
            if (!empty($seleksi)):
            ?>
            <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">
                <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2 mb-4">Tahap Seleksi</h3>
                
                <div class="space-y-4">
                    <?php foreach ($seleksi as $index => $tahap): ?>
                    <div class="flex items-start space-x-4 p-4 border border-gray-200 rounded-xl hover:border-primary transition-colors duration-200">
                        <div class="flex-shrink-0 w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
                            <span class="text-primary-dark font-semibold"><?= $index + 1 ?></span>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800 text-lg"><?= esc($tahap['nama'] ?? 'Tahap Seleksi') ?></h4>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                <?php if (!empty($tahap['tanggal'])): ?>
                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                    <i class="fa fa-calendar text-primary"></i>
                                    <span><?= date('d F Y', strtotime($tahap['tanggal'])) ?></span>
                                </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($tahap['tempat'])): ?>
                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                    <i class="fa fa-map-marker-alt text-primary"></i>
                                    <span><?= esc($tahap['tempat']) ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php if (!empty($tahap['keterangan'])): ?>
                            <div class="mt-3 p-3 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-700"><?= nl2br(esc($tahap['keterangan'])) ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php else: ?>
            <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">
                <div class="text-center py-8 text-gray-500">
                    <i class="fa fa-clipboard-list text-4xl mb-3"></i>
                    <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada tahap seleksi</h3>
                    <p class="text-gray-500">Tambah tahap seleksi untuk gelombang ini</p>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Status Gelombang</h3>
                
                <?php if ($gelombang['status'] == 'dibuka'): ?>
                    <div class="flex items-center space-x-3 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <i class="fa fa-door-open text-green-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-green-800">Gelombang Dibuka</p>
                            <p class="text-sm text-green-600">Pendaftaran sedang berlangsung</p>
                        </div>
                    </div>
                <?php elseif ($gelombang['status'] == 'ditutup'): ?>
                    <div class="flex items-center space-x-3 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                        <i class="fa fa-door-closed text-yellow-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-yellow-800">Gelombang Ditutup</p>
                            <p class="text-sm text-yellow-600">Pendaftaran dihentikan sementara</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center space-x-3 p-4 bg-gray-50 border border-gray-200 rounded-xl">
                        <i class="fa fa-flag-checkered text-gray-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-gray-800">Gelombang Berakhir</p>
                            <p class="text-sm text-gray-600">Periode pendaftaran telah selesai</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Informasi Tambahan -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Informasi Tambahan</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-sm text-gray-600">Dibuat Pada</span>
                        <span class="text-sm font-medium text-gray-800">
                            <?= $gelombang['created_at'] ? date('d/m/Y H:i', strtotime($gelombang['created_at'])) : '-' ?>
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                        <span class="text-sm text-gray-600">Diupdate Pada</span>
                        <span class="text-sm font-medium text-gray-800">
                            <?= $gelombang['updated_at'] ? date('d/m/Y H:i', strtotime($gelombang['updated_at'])) : '-' ?>
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm text-gray-600">ID Gelombang</span>
                        <span class="text-sm font-medium text-gray-800">#<?= $gelombang['id'] ?></span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Aksi Cepat</h3>
                
                <div class="space-y-3">
                    <a href="<?= base_url('admin/gelombang/edit/' . $gelombang['id']); ?>" 
                       class="w-full bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-edit"></i>
                        <span>Edit Gelombang</span>
                    </a>
                    
                    <?php if ($gelombang['status'] == 'dibuka'): ?>
                    <button onclick="updateStatus('ditutup')" 
                            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-pause"></i>
                        <span>Tutup Sementara</span>
                    </button>
                    <?php elseif ($gelombang['status'] == 'ditutup'): ?>
                    <button onclick="updateStatus('dibuka')" 
                            class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-play"></i>
                        <span>Buka Kembali</span>
                    </button>
                    <?php endif; ?>
                    
                    <a href="<?= base_url('admin/pendaftaran?gelombang=' . $gelombang['id']); ?>" 
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center space-x-2">
                        <i class="fa fa-list"></i>
                        <span>Lihat Pendaftar</span>
                    </a>
                </div>
            </div>

            <!-- Statistik Cepat -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Statistik</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fa fa-users text-blue-600"></i>
                            <span class="text-sm text-gray-700">Total Pendaftar</span>
                        </div>
                        <span class="font-semibold text-blue-600"><?= $jumlah_pendaftar ?? 0 ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fa fa-check-circle text-green-600"></i>
                            <span class="text-sm text-gray-700">Diterima</span>
                        </div>
                        <span class="font-semibold text-green-600"><?= $jumlah_diterima ?? 0 ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg">
                        <div class="flex items-center space-x-2">
                            <i class="fa fa-clock text-yellow-600"></i>
                            <span class="text-sm text-gray-700">Menunggu</span>
                        </div>
                        <span class="font-semibold text-yellow-600"><?= $jumlah_menunggu ?? 0 ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
        <div class="text-gray-400 text-6xl mb-4">
            <i class="fa fa-calendar-times"></i>
        </div>
        <h3 class="text-xl font-medium text-gray-600 mb-2">Data gelombang tidak ditemukan</h3>
        <p class="text-gray-500 mb-6">Data gelombang yang Anda cari tidak dapat ditemukan</p>
        <a href="<?= base_url('admin/gelombang'); ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-medium inline-flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar Gelombang</span>
        </a>
    </div>
    <?php endif; ?>
</div>

<!-- Status Update Modal -->
<div id="statusModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-xl font-bold text-primary-dark font-amiri">Update Status Gelombang</h3>
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
        'dibuka': 'membuka',
        'ditutup': 'menutup sementara',
        'berakhir': 'mengakhiri'
    };
    
    targetStatus = status;
    
    document.getElementById('modalMessage').textContent = 
        `Apakah Anda yakin ingin ${statusText[status]} gelombang "<?= esc($gelombang['nama']) ?>"?`;
    
    document.getElementById('statusModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('statusModal').classList.add('hidden');
    targetStatus = '';
}

document.getElementById('confirmUpdate').addEventListener('click', function() {
    if (!targetStatus) return;
    
    fetch(`<?= base_url('admin/gelombang/update-status/') ?>${<?= $gelombang['id'] ?>}`, {
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

<?= $this->endSection() ?>