<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Data Pendaftar Santri Baru</h1>
            <p class="text-gray-600 mt-2">Kelola pendaftaran santri baru pondok pesantren</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center space-x-2">
            <span class="text-sm text-gray-600">Total: <span class="font-semibold"><?= count($pendaftar) ?> pendaftar</span></span>
        </div>
    </div>

    <!-- Alert Success -->
    <?php if (session()->getFlashdata('success')): ?>
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 animate-pulse">
        <div class="flex items-center space-x-2">
            <i class="fa fa-check-circle text-green-500"></i>
            <span class="font-medium"><?= session()->getFlashdata('success') ?></span>
        </div>
    </div>
    <?php endif; ?>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-primary">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total Pendaftar</p>
                    <p class="text-2xl font-bold text-primary-dark"><?= count($pendaftar) ?></p>
                </div>
                <div class="p-2 bg-primary/10 rounded-lg">
                    <i class="fa fa-users text-primary text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Menunggu Verifikasi</p>
                    <p class="text-2xl font-bold text-primary-dark">
                        <?= count(array_filter($pendaftar, function($p) { return $p['status'] == 'Menunggu Verifikasi'; })) ?>
                    </p>
                </div>
                <div class="p-2 bg-yellow-100 rounded-lg">
                    <i class="fa fa-clock text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Diterima</p>
                    <p class="text-2xl font-bold text-primary-dark">
                        <?= count(array_filter($pendaftar, function($p) { return $p['status'] == 'Diterima'; })) ?>
                    </p>
                </div>
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fa fa-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Ditolak</p>
                    <p class="text-2xl font-bold text-primary-dark">
                        <?= count(array_filter($pendaftar, function($p) { return $p['status'] == 'Ditolak'; })) ?>
                    </p>
                </div>
                <div class="p-2 bg-red-100 rounded-lg">
                    <i class="fa fa-times-circle text-red-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0">
            <div class="flex-1">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari pendaftar..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                </div>
            </div>
            <div>
                <select id="filterStatus" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Status</option>
                    <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
            <div>
                <select id="filterJenisKelamin" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <button id="resetFilter" class="w-full md:w-auto px-4 py-2 border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-50 transition-all duration-200">
                    <i class="fa fa-refresh mr-2"></i>Reset
                </button>
            </div>
        </div>
    </div>

    <div class="mb-6 flex space-x-2">
        <a href="<?= base_url('admin/pendaftaran/export/pdf') ?>" 
           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 transform hover:scale-105 inline-flex items-center space-x-2 mr-2 tooltip"
           data-tooltip="Export to PDF">
            <i class="fa fa-file-pdf"></i>
            <span>Export PDF</span>
        </a>
        <a href="<?= base_url('admin/pendaftaran/export/excel') ?>" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 transform hover:scale-105 inline-flex items-center space-x-2 tooltip"
           data-tooltip="Export to Excel">
            <i class="fa fa-file-excel"></i>
            <span>Export Excel</span>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-primary-dark to-primary text-white">
                        <th class="py-4 px-6 text-left font-semibold">No</th>
                        <th class="py-4 px-6 text-left font-semibold">Nama Lengkap</th>
                        <th class="py-4 px-6 text-left font-semibold">Jenis Kelamin</th>
                        <th class="py-4 px-6 text-left font-semibold">Asal Sekolah</th>
                        <th class="py-4 px-6 text-left font-semibold">NISN</th>
                        <th class="py-4 px-6 text-left font-semibold">Status</th>
                        <th class="py-4 px-6 text-left font-semibold">Gelombang Pendaftaran</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php if ($pendaftar): ?>
                        <?php $no = 1; foreach ($pendaftar as $p): ?>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                    <?= $no++ ?>
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-800"><?= esc($p['nama_lengkap']) ?></div>
                                <div class="text-sm text-gray-600 mt-1"><?= esc($p['email'] ?? '-') ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <?php if ($p['jenis_kelamin'] == 'Laki-laki'): ?>
                                        <i class="fa fa-mars text-blue-500"></i>
                                        <span class="text-gray-700">Laki-laki</span>
                                    <?php else: ?>
                                        <i class="fa fa-venus text-pink-500"></i>
                                        <span class="text-gray-700">Perempuan</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-gray-700"><?= esc($p['asal_sekolah']) ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <code class="bg-gray-100 px-2 py-1 rounded text-sm"><?= esc($p['nisn']) ?></code>
                            </td>
                            <td class="py-4 px-6">
                                <?php if ($p['status'] == 'Menunggu Verifikasi'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fa fa-clock mr-1 text-[10px]"></i>
                                        <?= $p['status'] ?>
                                    </span>
                                <?php elseif ($p['status'] == 'Diterima'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fa fa-check-circle mr-1 text-[10px]"></i>
                                        <?= $p['status'] ?>
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fa fa-times-circle mr-1 text-[10px]"></i>
                                        <?= $p['status'] ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <i class="fa fa-calendar text-gray-400 text-sm"></i>
                                    <span class="text-sm text-gray-700"><?= esc($p['nama_gelombang'] ?? '-') ?></span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <a href="<?= base_url('admin/pendaftaran/detail/'.$p['id_pendaftaran']) ?>" 
                                       class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 transform hover:scale-105 tooltip flex items-center space-x-1"
                                       data-tooltip="Lihat Detail">
                                        <i class="fa fa-eye text-sm"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="py-12 px-4 text-center">
                                <div class="text-gray-400 text-6xl mb-4">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada data pendaftar</h3>
                                <p class="text-gray-500 mb-4">Tidak ada pendaftaran santri baru saat ini</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination (jika ada) -->
    <?php if (isset($pager) && $pager->getPageCount() > 1): ?>
    <div class="mt-6 flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Menampilkan <?= $pager->getCurrentPage() * $pager->getPerPage() - $pager->getPerPage() + 1 ?> 
            sampai <?= min($pager->getCurrentPage() * $pager->getPerPage(), $pager->getTotal()) ?> 
            dari <?= $pager->getTotal() ?> data
        </div>
        <div class="flex space-x-2">
            <?= $pager->links() ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
// Search and Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterStatus = document.getElementById('filterStatus');
    const filterJenisKelamin = document.getElementById('filterJenisKelamin');
    const resetFilter = document.getElementById('resetFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusFilter = filterStatus.value.toLowerCase();
        const jenisKelaminFilter = filterJenisKelamin.value.toLowerCase();

        for (let row of rows) {
            if (row.cells.length < 8) continue; // Skip empty row
            
            const nama = row.cells[1].textContent.toLowerCase();
            const jenisKelamin = row.cells[2].textContent.toLowerCase();
            const asalSekolah = row.cells[3].textContent.toLowerCase();
            const nisn = row.cells[4].textContent.toLowerCase();
            const status = row.cells[5].textContent.toLowerCase();
            
            const matchSearch = nama.includes(searchTerm) || asalSekolah.includes(searchTerm) || nisn.includes(searchTerm);
            const matchStatus = !statusFilter || status.includes(statusFilter);
            const matchJenisKelamin = !jenisKelaminFilter || jenisKelamin.includes(jenisKelaminFilter);
            
            row.style.display = matchSearch && matchStatus && matchJenisKelamin ? '' : 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    filterStatus.addEventListener('change', filterTable);
    filterJenisKelamin.addEventListener('change', filterTable);
    
    resetFilter.addEventListener('click', function() {
        searchInput.value = '';
        filterStatus.value = '';
        filterJenisKelamin.value = '';
        filterTable();
    });

    // Initialize tooltips
    const tooltips = document.querySelectorAll('.tooltip');
    tooltips.forEach(tooltip => {
        tooltip.addEventListener('mouseenter', function(e) {
            const tooltipText = this.getAttribute('data-tooltip');
            const tooltipEl = document.createElement('div');
            tooltipEl.className = 'absolute z-50 px-2 py-1 text-xs text-white bg-gray-800 rounded shadow-lg';
            tooltipEl.textContent = tooltipText;
            document.body.appendChild(tooltipEl);
            
            const rect = this.getBoundingClientRect();
            tooltipEl.style.left = rect.left + 'px';
            tooltipEl.style.top = (rect.top - 25) + 'px';
            
            this._tooltip = tooltipEl;
        });
        
        tooltip.addEventListener('mouseleave', function() {
            if (this._tooltip) {
                this._tooltip.remove();
            }
        });
    });
});

// Update status function
function updateStatus(id, status) {
    const action = status === 'Diterima' ? 'menerima' : 'menolak';
    if (confirm(`Yakin ingin ${action} pendaftaran ini?`)) {
        // In real application, you would make an API call here
        fetch(`/admin/pendaftaran/update-status/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ status: status })
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
    }
}
</script>

<style>
.tooltip {
    position: relative;
}

.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(1, 112, 119, 0.15);
}
</style>

<?= $this->endSection() ?>