<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri"><?= esc($title) ?></h1>
            <p class="text-gray-600 mt-2">Kelola jadwal kegiatan harian pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/jadwalkegiatan/create'); ?>" class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Jadwal Kegiatan</span>
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

    <!-- Alert Error -->
    <?php if (session()->getFlashdata('error')): ?>
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700">
        <div class="flex items-center space-x-2">
            <i class="fa fa-exclamation-circle text-red-500"></i>
            <span class="font-medium"><?= session()->getFlashdata('error') ?></span>
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
                    <input type="text" id="searchInput" placeholder="Cari jadwal kegiatan..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                </div>
            </div>
            <div>
                <select id="filterKlasifikasi" class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-light focus:border-primary-light transition-all duration-200">
                    <option value="">Semua Klasifikasi</option>
                    <option value="pagi">Pagi</option>
                    <option value="siang">Siang</option>
                    <option value="sore">Sore</option>
                    <option value="malam">Malam</option>
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
                        <th class="py-4 px-6 text-left font-semibold">Nama Kegiatan</th>
                        <th class="py-4 px-6 text-left font-semibold">Waktu Mulai</th>
                        <th class="py-4 px-6 text-left font-semibold">Waktu Selesai</th>
                        <th class="py-4 px-6 text-left font-semibold">Klasifikasi</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($jadwal as $i => $j): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                        <td class="py-4 px-6">
                            <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                <?= $i + 1 ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-800"><?= esc($j['nama_kegiatan']) ?></div>
                            <?php if (!empty($j['deskripsi'])): ?>
                                <div class="text-sm text-gray-600 mt-1 max-w-xs">
                                    <?= esc($j['deskripsi']) ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <i class="fa fa-clock text-gray-400 text-sm"></i>
                                <span class="font-medium text-gray-700"><?= date('H:i', strtotime($j['waktu_mulai'])) ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <i class="fa fa-clock text-gray-400 text-sm"></i>
                                <span class="font-medium text-gray-700"><?= date('H:i', strtotime($j['waktu_selesai'])) ?></span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <?php
                            $badgeClass = [
                                'pagi'  => 'bg-yellow-100 text-yellow-700', // lembut tapi cerah
                                'siang' => 'bg-orange-200 text-orange-800', // lebih terang khas siang
                                'sore'  => 'bg-amber-200 text-amber-800',   // hangat keemasan khas sore
                                'malam' => 'bg-indigo-100 text-indigo-800'  // biru tua lembut khas malam
                            ];

                            $badgeText = [
                                'pagi'  => 'Pagi',
                                'siang' => 'Siang',
                                'sore'  => 'Sore',
                                'malam' => 'Malam'
                            ];
                            ?>
                            <span class="px-3 py-1 rounded-full text-sm font-medium <?= $badgeClass[$j['klasifikasi']] ?? 'bg-gray-100 text-gray-800' ?>">
                                <?= $badgeText[$j['klasifikasi']] ?? esc($j['klasifikasi']) ?>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <a href="<?= base_url('admin/jadwalkegiatan/edit/' . $j['id']) ?>" 
                                   class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Edit Jadwal">
                                    <i class="fa fa-edit text-sm"></i>
                                </a>
                                <a href="<?= base_url('admin/jadwalkegiatan/delete/' . $j['id']) ?>" 
                                   class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                   data-tooltip="Hapus Jadwal"
                                   onclick="return confirm('Yakin ingin menghapus jadwal <?= esc($j['nama_kegiatan']) ?>?')">
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
        <?php if (empty($jadwal)): ?>
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">
                <i class="fa fa-calendar"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada jadwal kegiatan</h3>
            <p class="text-gray-500 mb-4">Mulai dengan menambahkan jadwal kegiatan baru</p>
            <a href="<?= base_url('admin/jadwalkegiatan/create'); ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2">
                <i class="fa fa-plus"></i>
                <span>Tambah Jadwal Pertama</span>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
// Search and Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterKlasifikasi = document.getElementById('filterKlasifikasi');
    const resetFilter = document.getElementById('resetFilter');
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.getElementsByTagName('tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const klasifikasiFilter = filterKlasifikasi.value.toLowerCase();

        for (let row of rows) {
            if (row.cells.length < 6) continue; // Skip empty row
            
            const nama = row.cells[1].textContent.toLowerCase();
            const deskripsi = row.cells[1].textContent.toLowerCase(); // Deskripsi ada di cell yang sama dengan nama
            const klasifikasi = row.cells[4].textContent.toLowerCase();
            
            const matchSearch = nama.includes(searchTerm) || deskripsi.includes(searchTerm);
            const matchKlasifikasi = !klasifikasiFilter || klasifikasi.includes(klasifikasiFilter);
            
            row.style.display = matchSearch && matchKlasifikasi ? '' : 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    filterKlasifikasi.addEventListener('change', filterTable);
    
    resetFilter.addEventListener('click', function() {
        searchInput.value = '';
        filterKlasifikasi.value = '';
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
</style>

<?= $this->endSection() ?>