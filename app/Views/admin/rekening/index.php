<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri"><?= esc($title) ?></h1>
            <p class="text-gray-600 mt-2">Kelola data rekening bank dan QRIS pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/rekening/create') ?>" class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Rekening / QRIS</span>
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
                    <input type="text" id="searchInput" placeholder="Cari rekening atau QRIS..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                </div>
            </div>
            <div>
                <select id="filterJenis" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Jenis</option>
                    <option value="bank">Bank</option>
                    <option value="qris">QRIS</option>
                </select>
            </div>
            <div>
                <select id="filterStatus" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
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
                        <th class="py-4 px-6 text-left font-semibold">Jenis</th>
                        <th class="py-4 px-6 text-left font-semibold">Bank / Label</th>
                        <th class="py-4 px-6 text-left font-semibold">Nomor / Gambar</th>
                        <th class="py-4 px-6 text-left font-semibold">Atas Nama</th>
                        <th class="py-4 px-6 text-left font-semibold">Status</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($rekening as $i => $r): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                <?= $i + 1 ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                <?= $r['jenis'] === 'qris' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' ?>">
                                <?= esc(ucfirst($r['jenis'])) ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-800"><?= esc($r['bank'] ?? '-') ?></div>
                        </td>
                        <td class="py-4 px-6">
                            <?php if ($r['jenis'] === 'qris' && $r['gambar']): ?>
                                <div class="relative group">
                                    <img src="<?= base_url('file/rekening/' . $r['gambar']) ?>" 
                                         class="w-16 h-16 object-contain rounded-lg border-2 border-gray-200 shadow-sm group-hover:shadow-md transition-all duration-200" 
                                         alt="QRIS">
                                    <div class="absolute inset-0 bg-primary/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center">
                                        <a href="<?= base_url('file/rekening/' . $r['gambar']) ?>" 
                                           target="_blank" 
                                           class="bg-white/90 p-2 rounded-full shadow-lg transform hover:scale-110 transition-transform duration-200 tooltip"
                                           data-tooltip="Lihat Gambar">
                                            <i class="fa fa-expand text-primary-dark text-sm"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <code class="bg-gray-100 px-3 py-1 rounded text-sm font-mono"><?= esc($r['nomor_rekening'] ?? '-') ?></code>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-gray-700"><?= esc($r['atas_nama'] ?? '-') ?></div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                <?= $r['status'] == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?>">
                                <?= esc($r['status']) ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <a href="<?= base_url('admin/rekening/edit/'.$r['id']) ?>" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Edit Data">
                                    <i class="fa fa-edit text-sm"></i>
                                </a>
                                <a href="<?= base_url('admin/rekening/delete/'.$r['id']) ?>" 
                                   class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Hapus Data"
                                   onclick="return confirm('Yakin ingin menghapus <?= $r['jenis'] === 'qris' ? 'QRIS' : 'rekening' ?> <?= esc($r['bank'] ?? '') ?>?')">
                                    <i class="fa fa-trash text-sm"></i>
                                </a>
                                <?php if ($r['jenis'] === 'qris' && $r['gambar']): ?>
                                <button class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                        data-tooltip="Lihat QRIS"
                                        onclick="showQRIS('<?= base_url('file/rekening/' . $r['gambar']) ?>', '<?= esc($r['bank'] ?? 'QRIS') ?>')">
                                    <i class="fa fa-eye text-sm"></i>
                                </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Empty State -->
        <?php if (empty($rekening)): ?>
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">
                <i class="fa fa-credit-card"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada data rekening atau QRIS</h3>
            <p class="text-gray-500 mb-4">Mulai dengan menambahkan rekening bank atau QRIS baru</p>
            <a href="<?= base_url('admin/rekening/create') ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2">
                <i class="fa fa-plus"></i>
                <span>Tambah Rekening / QRIS Pertama</span>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- QRIS Modal -->
<div id="qrisModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
    <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-primary-dark font-amiri" id="qrisModalTitle">Detail QRIS</h3>
                <button onclick="closeQRIS()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="fa fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div class="p-6 flex flex-col items-center">
            <img id="qrisImage" src="" alt="QRIS" class="w-64 h-64 object-contain rounded-lg border-2 border-gray-200 mb-4">
            <p class="text-sm text-gray-500 text-center">Scan QRIS untuk melakukan pembayaran</p>
        </div>
        <div class="p-4 border-t border-gray-200 flex justify-center">
            <button onclick="closeQRIS()" class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium transition-all duration-200">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
// Search and Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterJenis = document.getElementById('filterJenis');
    const filterStatus = document.getElementById('filterStatus');
    const resetFilter = document.getElementById('resetFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const jenisFilter = filterJenis.value.toLowerCase();
        const statusFilter = filterStatus.value.toLowerCase();

        for (let row of rows) {
            const jenis = row.cells[1].textContent.toLowerCase();
            const bank = row.cells[2].textContent.toLowerCase();
            const nomor = row.cells[3].textContent.toLowerCase();
            const atasNama = row.cells[4].textContent.toLowerCase();
            const status = row.cells[5].textContent.toLowerCase();
            
            const matchSearch = bank.includes(searchTerm) || nomor.includes(searchTerm) || atasNama.includes(searchTerm);
            const matchJenis = !jenisFilter || jenis.includes(jenisFilter);
            const matchStatus = !statusFilter || status.includes(statusFilter);
            
            row.style.display = matchSearch && matchJenis && matchStatus ? '' : 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    filterJenis.addEventListener('change', filterTable);
    filterStatus.addEventListener('change', filterTable);
    
    resetFilter.addEventListener('click', function() {
        searchInput.value = '';
        filterJenis.value = '';
        filterStatus.value = '';
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

// QRIS Modal functions
function showQRIS(imageSrc, title) {
    document.getElementById('qrisImage').src = imageSrc;
    document.getElementById('qrisModalTitle').textContent = title;
    document.getElementById('qrisModal').classList.remove('hidden');
}

function closeQRIS() {
    document.getElementById('qrisModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('qrisModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeQRIS();
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

<?= $this->endSection() ?>