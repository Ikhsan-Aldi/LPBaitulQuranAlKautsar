<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Data Kegiatan</h1>
            <p class="text-gray-600 mt-2">Kelola kegiatan dan acara pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/kegiatan/tambah'); ?>" class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Kegiatan</span>
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
                    <input type="text" id="searchInput" placeholder="Cari kegiatan..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                </div>
            </div>
            <div>
                <select id="filterLokasi" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Lokasi</option>
                    <option value="masjid">Masjid</option>
                    <option value="aula">Aula</option>
                    <option value="lapangan">Lapangan</option>
                    <option value="kelas">Kelas</option>
                    <option value="asrama">Asrama</option>
                </select>
            </div>
            <div>
                <input type="date" id="filterTanggal" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
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
                        <th class="py-4 px-6 text-left font-semibold">Judul Kegiatan</th>
                        <th class="py-4 px-6 text-left font-semibold">Tanggal</th>
                        <th class="py-4 px-6 text-left font-semibold">Lokasi</th>
                        <th class="py-4 px-6 text-left font-semibold">Foto</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php if ($kegiatan): $no=1; foreach ($kegiatan as $row): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                <?= $no++ ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-800"><?= esc($row['judul']); ?></div>
                            <div class="text-sm text-gray-600 mt-1 max-w-xs">
                                <?= esc($row['deskripsi'] ?? 'Tidak ada deskripsi'); ?>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <i class="fa fa-calendar text-gray-400 text-sm"></i>
                                <span class="text-gray-700"><?= esc($row['tanggal']); ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                <?= strpos(strtolower($row['lokasi']), 'masjid') !== false ? 'bg-blue-100 text-blue-800' : 
                                   (strpos(strtolower($row['lokasi']), 'aula') !== false ? 'bg-green-100 text-green-800' : 
                                   (strpos(strtolower($row['lokasi']), 'lapangan') !== false ? 'bg-purple-100 text-purple-800' : 
                                   'bg-orange-100 text-orange-800')) ?>">
                                <?= esc($row['lokasi']); ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <?php if (!empty($row['foto_utama'])): ?>
                                <div class="relative group">
                                    <img src="<?= base_url('uploads/kegiatan/' . esc($row['foto_utama'])); ?>" 
                                        alt="<?= esc($row['judul']); ?>" 
                                        class="w-16 h-16 rounded-lg object-cover shadow-sm border-2 border-white"
                                        onclick="showImage('<?= base_url('uploads/kegiatan/' . esc($row['foto_utama'])); ?>', '<?= esc($row['judul']); ?>')">
                                </div>
                            <?php else: ?>
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fa fa-image text-gray-400"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <a href="<?= base_url('admin/kegiatan/edit/'.$row['id']); ?>" 
                                   class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Edit Kegiatan">
                                    <i class="fa fa-edit text-sm"></i>
                                </a>
                                <a href="<?= base_url('admin/kegiatan/hapus/'.$row['id']); ?>" 
                                   class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Hapus Kegiatan"
                                   onclick="return confirm('Yakin ingin menghapus kegiatan <?= esc($row['judul']) ?>?')">
                                    <i class="fa fa-trash text-sm"></i>
                                </a>
                                <a href="<?= base_url('admin/kegiatan/detail/'.$row['id']); ?>" 
                                   class="bg-primary-medium hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Detail">
                                   <i class="fa fa-eye text-sm"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="6" class="py-12 px-4 text-center">
                            <div class="text-gray-400 text-6xl mb-4">
                                <i class="fa fa-calendar-alt"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada kegiatan</h3>
                            <p class="text-gray-500 mb-4">Mulai dengan menambahkan kegiatan baru</p>
                            <a href="<?= base_url('admin/kegiatan/tambah'); ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2">
                                <i class="fa fa-plus"></i>
                                <span>Tambah Kegiatan Pertama</span>
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

<script>
// Search and Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterLokasi = document.getElementById('filterLokasi');
    const filterTanggal = document.getElementById('filterTanggal');
    const resetFilter = document.getElementById('resetFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const lokasiFilter = filterLokasi.value.toLowerCase();
        const tanggalFilter = filterTanggal.value;

        for (let row of rows) {
            if (row.cells.length < 6) continue; // Skip empty row
            
            const judul = row.cells[1].textContent.toLowerCase();
            const tanggal = row.cells[2].textContent.toLowerCase();
            const lokasi = row.cells[3].textContent.toLowerCase();
            
            const matchSearch = judul.includes(searchTerm);
            const matchLokasi = !lokasiFilter || lokasi.includes(lokasiFilter);
            const matchTanggal = !tanggalFilter || tanggal.includes(tanggalFilter);
            
            row.style.display = matchSearch && matchLokasi && matchTanggal ? '' : 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    filterLokasi.addEventListener('change', filterTable);
    filterTanggal.addEventListener('input', filterTable);
    
    resetFilter.addEventListener('click', function() {
        searchInput.value = '';
        filterLokasi.value = '';
        filterTanggal.value = '';
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

<?= $this->endSection(); ?>