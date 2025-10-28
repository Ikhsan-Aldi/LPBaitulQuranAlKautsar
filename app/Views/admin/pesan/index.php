<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Pesan dari Pengunjung</h1>
            <p class="text-gray-600 mt-2">Kelola pesan yang dikirim melalui form kontak website</p>
        </div>
        <div class="flex items-center space-x-4 mt-4 md:mt-0">
            <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">
                <?= count($pesan) ?> Pesan
            </span>
        </div>
    </div>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex justify-between items-center">
            <div>
                <i class="fas fa-check-circle mr-2"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
            <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex justify-between items-center">
            <div>
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
            <button type="button" class="text-red-700 hover:text-red-900" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    <?php endif; ?>

    <!-- Filter & Search -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Filter Status</label>
                <select id="filterStatus" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="dibaca" <?= $current_status === 'dibaca' ? 'selected' : '' ?>>Sudah Dibaca</option>
                    <option value="belum_dibaca" <?= $current_status === 'belum_dibaca' ? 'selected' : '' ?>>Belum Dibaca</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Filter Subjek</label>
                <select id="filterSubjek" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Semua Subjek</option>
                    <option value="pendaftaran">Pendaftaran</option>
                    <option value="program">Program</option>
                    <option value="beasiswa">Beasiswa</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cari Pesan</label>
                <input type="text" id="searchPesan" placeholder="Cari nama atau pesan..." 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div class="flex items-end">
                <button id="resetFilter" class="w-full bg-gray-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-gray-600 transition-colors duration-200">
                    <i class="fas fa-refresh mr-2"></i>Reset Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Pesan List -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full table-fixed divide-y divide-gray-200">
                <thead class="bg-primary-dark text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider w-12">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider w-8">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider w-40">Pengirim</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider w-40">Kontak</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider w-28">Subjek</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider w-40">Pesan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider w-28">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="pesanTable">
                    <?php if (empty($pesan)): ?>
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                                    <p class="text-lg font-medium text-gray-500">Belum ada pesan</p>
                                    <p class="text-gray-400 text-sm mt-1">Pesan dari pengunjung akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; ?>
                        <?php foreach ($pesan as $item): ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150 pesan-item <?= $item['status'] === 'belum_dibaca' ? 'bg-blue-50' : '' ?>" 
                                data-subjek="<?= $item['subjek'] ?>" 
                                data-status="<?= $item['status'] ?>">
                                <td class="px-4 py-3 text-center text-sm text-gray-900 w-12"><?= $no++ ?></td>
                                <td class="px-4 py-3 text-center w-8">
                                    <div class="relative group">
                                        <?php if ($item['status'] === 'belum_dibaca'): ?>
                                            <i class="fas fa-envelope text-red-500" title="Belum Dibaca"></i>
                                        <?php else: ?>
                                            <i class="fas fa-envelope-open text-green-500" title="Sudah Dibaca"></i>
                                        <?php endif; ?>
                                        <!-- Tooltip -->
                                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-10">
                                            <?= $item['status'] === 'belum_dibaca' ? 'Belum Dibaca' : 'Sudah Dibaca' ?>
                                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 border-4 border-transparent border-t-gray-800"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 truncate w-40">
                                    <div class="flex items-center min-w-0">
                                        <div class="bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-2 flex-shrink-0">
                                            <?= strtoupper(substr($item['nama_lengkap'], 0, 1)) ?>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-sm font-medium text-primary-dark truncate" title="<?= esc($item['nama_lengkap']) ?>">
                                                <?= esc($item['nama_lengkap']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 w-40">
                                    <div class="text-sm text-gray-900 truncate" title="<?= esc($item['email']) ?>">
                                        <?= esc($item['email']) ?>
                                    </div>
                                    <?php if ($item['telepon']): ?>
                                        <div class="text-xs text-gray-500 truncate" title="<?= esc($item['telepon']) ?>">
                                            <?= esc($item['telepon']) ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 text-sm w-28">
                                    <?php 
                                    $badge_class = [
                                        'pendaftaran' => 'bg-blue-100 text-blue-800',
                                        'program' => 'bg-green-100 text-green-800',
                                        'beasiswa' => 'bg-yellow-100 text-yellow-800',
                                        'lainnya' => 'bg-gray-100 text-gray-800'
                                    ];
                                    $status_class = $badge_class[$item['subjek']] ?? 'bg-gray-100 text-gray-800';
                                    ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium <?= $status_class ?>">
                                        <?= ucfirst($item['subjek']) ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3 truncate w-40">
                                    <div class="text-sm text-gray-900 line-clamp-2" title="<?= esc($item['pesan']) ?>">
                                        <?= esc($item['pesan']) ?>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center w-28">
                                    <div class="text-xs text-gray-500"><?= date('d/m/Y', strtotime($item['created_at'])) ?></div>
                                    <div class="text-xs text-gray-400"><?= date('H:i', strtotime($item['created_at'])) ?></div>
                                </td>
                                <td class="px-4 py-3 text-center w-24">
                                    <div class="flex justify-center space-x-1">
                                        <a href="<?= base_url('admin/pesan/detail/' . $item['id']) ?>" 
                                        class="text-primary-dark hover:text-primary bg-primary-light/20 hover:bg-primary-light/30 p-1.5 rounded transition-colors duration-200"
                                        title="Lihat Detail">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        <a href="<?= base_url('admin/pesan/hapus/' . $item['id']) ?>" 
                                        class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 p-1.5 rounded transition-colors duration-200"
                                        title="Hapus Pesan"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                            <i class="fas fa-trash text-xs"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterStatus = document.getElementById('filterStatus');
    const filterSubjek = document.getElementById('filterSubjek');
    const searchPesan = document.getElementById('searchPesan');
    const resetFilter = document.getElementById('resetFilter');
    const pesanItems = document.querySelectorAll('.pesan-item');

    function filterPesan() {
        const statusValue = filterStatus.value.toLowerCase();
        const subjekValue = filterSubjek.value.toLowerCase();
        const searchValue = searchPesan.value.toLowerCase();

        pesanItems.forEach(item => {
            const itemStatus = item.getAttribute('data-status');
            const itemSubjek = item.getAttribute('data-subjek');
            const itemText = item.textContent.toLowerCase();

            const statusMatch = !statusValue || itemStatus === statusValue;
            const subjekMatch = !subjekValue || itemSubjek === subjekValue;
            const searchMatch = !searchValue || itemText.includes(searchValue);

            if (statusMatch && subjekMatch && searchMatch) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }

    filterStatus.addEventListener('change', filterPesan);
    filterSubjek.addEventListener('change', filterPesan);
    searchPesan.addEventListener('input', filterPesan);

    resetFilter.addEventListener('click', function() {
        filterStatus.value = '';
        filterSubjek.value = '';
        searchPesan.value = '';
        filterPesan();
    });

    // Apply filter saat halaman pertama kali load
    filterPesan();
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Highlight untuk pesan belum dibaca */
.bg-blue-50 {
    background-color: #eff6ff;
}

/* Pastikan tabel tidak melebihi container */
.table-container {
    max-width: 100%;
    overflow-x: auto;
}

/* Tooltip styling */
.group:hover .absolute {
    opacity: 1;
}
</style>
<?= $this->endSection() ?>