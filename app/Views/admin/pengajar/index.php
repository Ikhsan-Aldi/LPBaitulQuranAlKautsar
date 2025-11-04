<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri"><?= esc($title) ?></h1>
            <p class="text-gray-600 mt-2">Kelola data pengajar dan ustadz pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/pengajar/tambah'); ?>" class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Pengajar</span>
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
                    <input type="text" id="searchInput" placeholder="Cari pengajar..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                </div>
            </div>
            <div>
                <select id="filterJabatan" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Jabatan</option>
                    <option value="ustadz">Ustadz</option>
                    <option value="guru">Guru</option>
                    <option value="pengasuh">Pengasuh</option>
                    <option value="pembina">Pembina</option>
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
                        <th class="py-4 px-6 text-left font-semibold">Nama Lengkap</th>
                        <th class="py-4 px-6 text-left font-semibold">NIP</th>
                        <th class="py-4 px-6 text-left font-semibold">Jabatan</th>
                        <th class="py-4 px-6 text-left font-semibold">No HP</th>
                        <th class="py-4 px-6 text-left font-semibold">Foto</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($pengajar as $i => $p): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                <?= $i + 1 ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-800"><?= esc($p['nama_lengkap']); ?></div>
                        </td>
                        <td class="py-4 px-6">
                            <code class="bg-gray-100 px-2 py-1 rounded text-sm"><?= esc($p['nip']); ?></code>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                <?= strpos(strtolower($p['jabatan']), 'ustadz') !== false ? 'bg-blue-100 text-blue-800' : 
                                   (strpos(strtolower($p['jabatan']), 'guru') !== false ? 'bg-green-100 text-green-800' :
                                      (strpos(strtolower($p['jabatan']), 'pengasuh') !== false ? 'bg-yellow-100 text-yellow-800' :
                                         (strpos(strtolower($p['jabatan']), 'pembina') !== false ? 'bg-red-100 text-red-800' :
                                          (strpos(strtolower($p['jabatan']), 'karyawan') !== false ? 'bg-grey-100 text-grey-800' :
                                            'bg-purple-100 text-purple-800')))) ?>"> 
                                <?= esc($p['jabatan']); ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <i class="fa fa-phone text-gray-400 text-sm"></i>
                                <span class="text-gray-700"><?= esc($p['no_hp']); ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <?php if ($p['foto']): ?>
                                <div class="relative group">
                                    <img src="<?= base_url('file/pengajar/' . $p['foto']); ?>" 
                                        alt="<?= esc($p['nama_lengkap']); ?>"  
                                         class="w-12 h-12 rounded-full object-cover shadow-sm border-2 border-white group-hover:scale-110 transition-transform duration-200">
                                    <div class="absolute inset-0 bg-primary/20 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                                </div>
                            <?php else: ?>
                                <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                    <i class="fa fa-user text-gray-400"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <a href="<?= base_url('admin/pengajar/edit/' . $p['id']); ?>" 
                                   class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Edit Data">
                                    <i class="fa fa-edit text-sm"></i>
                                </a>
                                <a href="<?= base_url('admin/pengajar/hapus/' . $p['id']); ?>" 
                                   class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Hapus Data"
                                   onclick="return confirm('Yakin ingin menghapus data <?= esc($p['nama_lengkap']) ?>?')">
                                    <i class="fa fa-trash text-sm"></i>
                                </a>
                                <button class="bg-primary-medium hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                        data-tooltip="Detail"
                                        onclick="showDetail(<?= $p['id'] ?>)">
                                    <i class="fa fa-eye text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Empty State -->
        <?php if (empty($pengajar)): ?>
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">
                <i class="fa fa-users"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada data pengajar</h3>
            <p class="text-gray-500 mb-4">Mulai dengan menambahkan data pengajar baru</p>
            <a href="<?= base_url('admin/pengajar/tambah'); ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2">
                <i class="fa fa-plus"></i>
                <span>Tambah Pengajar Pertama</span>
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
                <h3 class="text-xl font-bold text-primary-dark font-amiri">Detail Pengajar</h3>
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
    const filterJabatan = document.getElementById('filterJabatan');
    const resetFilter = document.getElementById('resetFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const jabatanFilter = filterJabatan.value.toLowerCase();

        for (let row of rows) {
            const nama = row.cells[1].textContent.toLowerCase();
            const nip = row.cells[2].textContent.toLowerCase();
            const jabatan = row.cells[3].textContent.toLowerCase();
            
            const matchSearch = nama.includes(searchTerm) || nip.includes(searchTerm);
            const matchJabatan = !jabatanFilter || jabatan.includes(jabatanFilter);
            
            row.style.display = matchSearch && matchJabatan ? '' : 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    filterJabatan.addEventListener('change', filterTable);
    
    resetFilter.addEventListener('click', function() {
        searchInput.value = '';
        filterJabatan.value = '';
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

function showDetail(id) {
    const modalContent = document.getElementById('modalContent');
    document.getElementById('detailModal').classList.remove('hidden');

    // Placeholder loading
    modalContent.innerHTML = `
        <div class="text-center mb-6">
            <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa fa-spinner fa-spin text-3xl text-primary"></i>
            </div>
            <h4 class="text-lg font-semibold text-gray-800">Memuat data...</h4>
        </div>
    `;

    // Ambil data dari server
    fetch(`<?= base_url('admin/pengajar/detail/') ?>${id}`)
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                const d = result.data;
                modalContent.innerHTML = `
                    <div class="space-y-4">
                        <div class="text-center mb-6">
                            <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <img src="${d.foto ? '<?= base_url('file/pengajar/') ?>' + d.foto : ''}" alt="${d.nama_lengkap}" class="w-24 h-24 rounded-full object-cover shadow-sm border-2 border-white">
                            </div>
                            <h4 class="text-lg font-semibold text-gray-800">${d.nama_lengkap}</h4>
                            <p class="text-gray-600">${d.jabatan || '-'}</p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="text-gray-600">NIP:</div>
                            <div class="font-medium">${d.nip || '-'}</div>
                            
                            <div class="text-gray-600">No HP:</div>
                            <div class="font-medium">${d.no_hp || '-'}</div>
                            
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