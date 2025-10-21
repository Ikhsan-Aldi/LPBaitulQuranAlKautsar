<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Data Santri</h1>
            <p class="text-gray-600 mt-2">Kelola data santri pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/santri/tambah'); ?>" class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Santri</span>
        </a>
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
                    <p class="text-sm text-gray-600">Total Santri</p>
                    <p class="text-2xl font-bold text-primary-dark"><?= count($santri) ?></p>
                </div>
                <div class="p-2 bg-primary/10 rounded-lg">
                    <i class="fa fa-users text-primary text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-primary-medium">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Santri Aktif</p>
                    <p class="text-2xl font-bold text-primary-dark"><?= count(array_filter($santri, function($s) { return $s['status'] == 'Aktif'; })) ?></p>
                </div>
                <div class="p-2 bg-primary-medium/10 rounded-lg">
                    <i class="fa fa-user-check text-primary-medium text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-primary-light">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Santri Lulus</p>
                    <p class="text-2xl font-bold text-primary-dark"><?= count(array_filter($santri, function($s) { return $s['status'] == 'Lulus'; })) ?></p>
                </div>
                <div class="p-2 bg-primary-light/10 rounded-lg">
                    <i class="fa fa-graduation-cap text-primary-light text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-4 border-l-4 border-primary-dark">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Nonaktif</p>
                    <p class="text-2xl font-bold text-primary-dark"><?= count(array_filter($santri, function($s) { return $s['status'] == 'Nonaktif'; })) ?></p>
                </div>
                <div class="p-2 bg-primary-dark/10 rounded-lg">
                    <i class="fa fa-user-times text-primary-dark text-xl"></i>
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
                    <input type="text" id="searchInput" placeholder="Cari santri..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                </div>
            </div>
            <div>
                <select id="filterStatus" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Lulus">Lulus</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>
            <div>
                <select id="filterJenjang" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Jenjang</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                </select>
            </div>
            <div>
                <button id="resetFilter" class="w-full md:w-auto px-4 py-2 border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-50 transition-all duration-200">
                    <i class="fa fa-refresh mr-2"></i>Reset
                </button>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-primary-dark to-primary text-white">
                        <th class="py-4 px-6 text-left font-semibold">No</th>
                        <th class="py-4 px-6 text-left font-semibold">NIS</th>
                        <th class="py-4 px-6 text-left font-semibold">Nama Santri</th>
                        <th class="py-4 px-6 text-left font-semibold">Jenjang</th>
                        <th class="py-4 px-6 text-left font-semibold">Asal Sekolah</th>
                        <th class="py-4 px-6 text-left font-semibold">No HP</th>
                        <th class="py-4 px-6 text-left font-semibold">Status</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php if (count($santri) > 0): ?>
                        <?php $no = 1; foreach ($santri as $row): ?>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                    <?= $no++ ?>
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <code class="bg-gray-100 px-2 py-1 rounded text-sm"><?= esc($row['nis']); ?></code>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-800"><?= esc($row['nama']); ?></div>
                                <div class="text-sm text-gray-600 mt-1"><?= esc($row['email'] ?? '-'); ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-medium 
                                    <?= $row['jenjang'] == 'SD' ? 'bg-blue-100 text-blue-800' : 
                                       ($row['jenjang'] == 'SMP' ? 'bg-green-100 text-green-800' : 
                                       ($row['jenjang'] == 'SMA' ? 'bg-purple-100 text-purple-800' : 
                                       'bg-orange-100 text-orange-800')) ?>">
                                    <?= esc($row['jenjang']); ?>
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-gray-700"><?= esc($row['asal_sekolah']); ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <i class="fa fa-phone text-gray-400 text-sm"></i>
                                    <span class="text-gray-700"><?= esc($row['no_hp']); ?></span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <?php if ($row['status'] == 'Aktif'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fa fa-circle text-[8px] mr-1"></i>
                                        Aktif
                                    </span>
                                <?php elseif ($row['status'] == 'Lulus'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i class="fa fa-graduation-cap text-[8px] mr-1"></i>
                                        Lulus
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <i class="fa fa-times text-[8px] mr-1"></i>
                                        Nonaktif
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <a href="<?= base_url('admin/santri/edit/' . $row['id']); ?>" 
                                       class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                       data-tooltip="Edit Data">
                                        <i class="fa fa-edit text-sm"></i>
                                    </a>
                                    <a href="<?= base_url('admin/santri/hapus/' . $row['id']); ?>" 
                                       class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                       data-tooltip="Hapus Data"
                                       onclick="return confirm('Yakin ingin menghapus data <?= esc($row['nama']) ?>?')">
                                        <i class="fa fa-trash text-sm"></i>
                                    </a>
                                    <button class="bg-primary-medium hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                            data-tooltip="Detail"
                                            onclick="showDetail(<?= $row['id'] ?>)">
                                        <i class="fa fa-eye text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="py-12 px-4 text-center">
                                <div class="text-gray-400 text-6xl mb-4">
                                    <i class="fa fa-users"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada data santri</h3>
                                <p class="text-gray-500 mb-4">Mulai dengan menambahkan data santri baru</p>
                                <a href="<?= base_url('admin/santri/tambah'); ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2">
                                    <i class="fa fa-plus"></i>
                                    <span>Tambah Santri Pertama</span>
                                </a>
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

<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-primary-dark font-amiri">Detail Santri</h3>
                <button onclick="closeDetail()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="fa fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div class="p-6" id="modalContent">
            <!-- Detail content will be loaded here -->
        </div>
    </div>
</div>

<script>
// Search and Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterStatus = document.getElementById('filterStatus');
    const filterJenjang = document.getElementById('filterJenjang');
    const resetFilter = document.getElementById('resetFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusFilter = filterStatus.value.toLowerCase();
        const jenjangFilter = filterJenjang.value.toLowerCase();

        for (let row of rows) {
            if (row.cells.length < 8) continue; // Skip empty row
            
            const nis = row.cells[1].textContent.toLowerCase();
            const nama = row.cells[2].textContent.toLowerCase();
            const jenjang = row.cells[3].textContent.toLowerCase();
            const status = row.cells[6].textContent.toLowerCase();
            
            const matchSearch = nis.includes(searchTerm) || nama.includes(searchTerm);
            const matchStatus = !statusFilter || status.includes(statusFilter);
            const matchJenjang = !jenjangFilter || jenjang.includes(jenjangFilter);
            
            row.style.display = matchSearch && matchStatus && matchJenjang ? '' : 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    filterStatus.addEventListener('change', filterTable);
    filterJenjang.addEventListener('change', filterTable);
    
    resetFilter.addEventListener('click', function() {
        searchInput.value = '';
        filterStatus.value = '';
        filterJenjang.value = '';
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

// Detail modal functions
function showDetail(id) {
    const modalContent = document.getElementById('modalContent');
    modalContent.innerHTML = `
        <div class="text-center mb-6">
            <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa fa-user-graduate text-3xl text-primary"></i>
            </div>
            <h4 class="text-lg font-semibold text-gray-800">Memuat data...</h4>
        </div>
    `;
    
    document.getElementById('detailModal').classList.remove('hidden');
    
    // Simulate API call
    fetch(`<?= base_url('admin/santri/detail/') ?>${id}`)
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                const d = result.data;
                modalContent.innerHTML = `
                    <div class="space-y-4">
                        <div class="text-center mb-6">
                            <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fa fa-user-graduate text-3xl text-primary"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800">${d.nama || '-'}</h4>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="text-gray-600">NIS:</div>
                            <div class="font-medium">${d.nis || '-'}</div>
                            
                            <div class="text-gray-600">Jenjang:</div>
                            <div class="font-medium">${d.jenjang || '-'}</div>

                            <div class="text-gray-600">Alamat:</div>
                            <div class="font-medium">${d.alamat || '-'}</div>
                            
                            <div class="text-gray-600">Status:</div>
                            <div class="font-medium">${d.status || 'Aktif'}</div>
                        </div>
                        
                        <div class="pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-500 text-center">
                                Data diambil langsung dari database
                            </p>
                        </div>
                    </div>
                `;
            } else {
                modalContent.innerHTML = `<p class="text-center text-red-500">${result.message}</p>`;
            }
        })
        .catch(error => {
            modalContent.innerHTML = `<p class="text-center text-red-500">Terjadi kesalahan saat mengambil data.</p>`;
            console.error(error);
        });
    }

function closeDetail() {
    document.getElementById('detailModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('detailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDetail();
    }
});
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

<?= $this->endSection(); ?>