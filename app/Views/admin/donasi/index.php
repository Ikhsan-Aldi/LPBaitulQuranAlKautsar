<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri"><?= esc($title) ?></h1>
            <p class="text-gray-600 mt-2">Kelola data donasi dan transaksi pondok pesantren</p>
        </div>
        <div class="mt-4 md:mt-0 flex space-x-3">
            <button id="exportBtn" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
                <i class="fa fa-download"></i>
                <span>Export Data</span>
            </button>
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

    <!-- Search and Filter -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0">
            <div class="flex-1">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="searchInput" placeholder="Cari donatur..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                </div>
            </div>
            <div>
                <select id="filterStatus" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Status</option>
                    <option value="menunggu">Menunggu</option>
                    <option value="terverifikasi">Terverifikasi</option>
                    <option value="ditolak">Ditolak</option>
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
                        <th class="py-4 px-6 text-left font-semibold">Nama Donatur</th>
                        <th class="py-4 px-6 text-left font-semibold">Nominal</th>
                        <th class="py-4 px-6 text-left font-semibold">Bank Tujuan</th>
                        <th class="py-4 px-6 text-left font-semibold">Status</th>
                        <th class="py-4 px-6 text-left font-semibold">Tanggal</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($donasi as $i => $d): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                <?= $i + 1 ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-800"><?= esc($d['nama']) ?></div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-semibold text-green-700">Rp<?= number_format($d['nominal'], 0, ',', '.') ?></div>
                        </td>
                        <td class="py-4 px-6">
                            <code class="bg-gray-100 px-2 py-1 rounded text-sm"><?= esc($d['bank_tujuan']) ?></code>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                <?= $d['status'] == 'Terverifikasi' ? 'bg-green-100 text-green-800' : 
                                   ($d['status'] == 'Ditolak' ? 'bg-red-100 text-red-800' : 
                                   'bg-yellow-100 text-yellow-800') ?>">
                                <?= esc($d['status']) ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <i class="fa fa-calendar text-gray-400 text-sm"></i>
                                <span class="text-gray-700"><?= esc($d['created_at']) ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <a href="<?= base_url('admin/donasi/show/'.$d['id']) ?>" 
                                   class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Detail Donasi">
                                    <i class="fa fa-eye text-sm"></i>
                                </a>
                                <a href="<?= base_url('admin/donasi/delete/'.$d['id']) ?>" 
                                   class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Hapus Data"
                                   onclick="return confirm('Yakin ingin menghapus data donasi dari <?= esc($d['nama']) ?>?')">
                                    <i class="fa fa-trash text-sm"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- Empty State -->
        <?php if (empty($donasi)): ?>
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">
                <i class="fa fa-hand-holding-heart"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada data donasi</h3>
            <p class="text-gray-500 mb-4">Data donasi akan muncul di sini</p>
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

<script>
// Search and Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterStatus = document.getElementById('filterStatus');
    const resetFilter = document.getElementById('resetFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusFilter = filterStatus.value.toLowerCase();

        for (let row of rows) {
            const nama = row.cells[1].textContent.toLowerCase();
            const bank = row.cells[3].textContent.toLowerCase();
            const status = row.cells[4].textContent.toLowerCase();
            
            const matchSearch = nama.includes(searchTerm) || bank.includes(searchTerm);
            const matchStatus = !statusFilter || status.includes(statusFilter);
            
            row.style.display = matchSearch && matchStatus ? '' : 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    filterStatus.addEventListener('change', filterTable);
    
    resetFilter.addEventListener('click', function() {
        searchInput.value = '';
        filterStatus.value = '';
        filterTable();
    });

    // Export functionality
    document.getElementById('exportBtn').addEventListener('click', function() {
        alert('Fitur export akan diimplementasikan');
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
</style>

<?= $this->endSection() ?>