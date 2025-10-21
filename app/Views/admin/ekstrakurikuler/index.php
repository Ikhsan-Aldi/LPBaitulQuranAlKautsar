<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri"><?= esc($title) ?></h1>
            <p class="text-gray-600 mt-2">Kelola kegiatan ekstrakurikuler pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/ekstrakurikuler/tambah'); ?>" class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Ekstrakurikuler</span>
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

    <!-- Search and Filter -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0">
            <div class="flex-1">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari ekstrakurikuler..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                </div>
            </div>
            <div>
                <select id="filterHari" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Hari</option>
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                    <option value="sabtu">Sabtu</option>
                    <option value="minggu">Minggu</option>
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
                        <th class="py-4 px-6 text-left font-semibold">Logo</th>
                        <th class="py-4 px-6 text-left font-semibold">Nama Ekstrakurikuler</th>
                        <th class="py-4 px-6 text-left font-semibold">Deskripsi</th>
                        <th class="py-4 px-6 text-left font-semibold">Pembimbing</th>
                        <th class="py-4 px-6 text-left font-semibold">Jadwal</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($ekstrakurikuler as $i => $e): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                <?= $i + 1 ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-center">
                                <?php if (!empty($e['icon'])): ?>
                                    <div class="p-3 bg-primary/10 rounded-xl">
                                        <i class="<?= esc($e['icon']) ?> text-2xl text-primary"></i>
                                    </div>
                                <?php else: ?>
                                    <div class="p-3 bg-gray-100 rounded-xl">
                                        <i class="fas fa-star text-2xl text-gray-400"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-800"><?= esc($e['nama_ekstrakurikuler']) ?></div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-sm text-gray-600 max-w-xs">
                                <?= esc($e['deskripsi']) ?>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-700"><?= esc($e['pembimbing']) ?></div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <i class="fa fa-calendar text-gray-400 text-sm"></i>
                                <span class="text-sm text-gray-700"><?= esc($e['jadwal']) ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <a href="<?= base_url('admin/ekstrakurikuler/edit/' . $e['id']) ?>" 
                                   class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Edit Data">
                                    <i class="fa fa-edit text-sm"></i>
                                </a>
                                <a href="<?= base_url('admin/ekstrakurikuler/hapus/' . $e['id']) ?>" 
                                   class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Hapus Data"
                                   onclick="return confirm('Yakin ingin menghapus ekstrakurikuler <?= esc($e['nama_ekstrakurikuler']) ?>?')">
                                    <i class="fa fa-trash text-sm"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Empty State -->
        <?php if (empty($ekstrakurikuler)): ?>
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">
                <i class="fa fa-futbol"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada data ekstrakurikuler</h3>
            <p class="text-gray-500 mb-4">Mulai dengan menambahkan ekstrakurikuler baru</p>
            <a href="<?= base_url('admin/ekstrakurikuler/tambah'); ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2">
                <i class="fa fa-plus"></i>
                <span>Tambah Ekstrakurikuler Pertama</span>
            </a>
        </div>
        <?php endif; ?>
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
                <h3 class="text-xl font-bold text-primary-dark font-amiri">Detail Ekstrakurikuler</h3>
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
    const filterHari = document.getElementById('filterHari');
    const resetFilter = document.getElementById('resetFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const hariFilter = filterHari.value.toLowerCase();

        for (let row of rows) {
            if (row.cells.length < 7) continue; // Skip empty row
            
            const nama = row.cells[2].textContent.toLowerCase();
            const deskripsi = row.cells[3].textContent.toLowerCase();
            const pembimbing = row.cells[4].textContent.toLowerCase();
            const jadwal = row.cells[5].textContent.toLowerCase();
            
            const matchSearch = nama.includes(searchTerm) || deskripsi.includes(searchTerm) || pembimbing.includes(searchTerm);
            const matchHari = !hariFilter || jadwal.includes(hariFilter);
            
            row.style.display = matchSearch && matchHari ? '' : 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    filterHari.addEventListener('change', filterTable);
    
    resetFilter.addEventListener('click', function() {
        searchInput.value = '';
        filterHari.value = '';
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