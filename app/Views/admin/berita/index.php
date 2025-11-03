<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Daftar Berita</h1>
            <p class="text-gray-600 mt-2">Kelola berita dan informasi pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/berita/create') ?>" 
           class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Berita</span>
        </a>
    </div>

    <!-- Alert Success -->
    <?php if (session()->getFlashdata('success')): ?>
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fa fa-check-circle text-green-500"></i>
                <span class="font-medium"><?= session()->getFlashdata('success') ?></span>
            </div>
            <button type="button" class="text-green-500 hover:text-green-700 transition-colors duration-200" onclick="this.parentElement.parentElement.remove()">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Alert Error -->
    <?php if (session()->getFlashdata('error')): ?>
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fa fa-exclamation-circle text-red-500"></i>
                <span class="font-medium"><?= session()->getFlashdata('error') ?></span>
            </div>
            <button type="button" class="text-red-500 hover:text-red-700 transition-colors duration-200" onclick="this.parentElement.parentElement.remove()">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-primary-dark to-primary text-white">
                        <th class="py-4 px-6 text-left font-semibold">No</th>
                        <th class="py-4 px-6 text-left font-semibold">Judul</th>
                        <th class="py-4 px-6 text-left font-semibold">Penulis</th>
                        <th class="py-4 px-6 text-left font-semibold">Foto</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($berita)): ?>
                        <tr>
                            <td colspan="5" class="py-12 px-4 text-center">
                                <div class="text-gray-400 text-6xl mb-4">
                                    <i class="fa fa-newspaper"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada berita</h3>
                                <p class="text-gray-500 mb-4">Mulai dengan menambahkan berita pertama</p>
                                <a href="<?= base_url('admin/berita/create') ?>" 
                                   class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2">
                                    <i class="fa fa-plus"></i>
                                    <span>Tambah Berita Pertama</span>
                                </a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($berita as $key => $row): ?>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                    <?= $key + 1 ?>
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-800"><?= esc($row['judul']) ?></div>
                                <?php if (isset($row['created_at'])): ?>
                                <div class="text-sm text-gray-500 mt-1">
                                    <i class="fa fa-clock mr-1"></i>
                                    <?= date('d M Y', strtotime($row['created_at'])) ?>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                        <i class="fa fa-user text-primary text-sm"></i>
                                    </div>
                                    <span class="text-gray-700"><?= esc($row['penulis']) ?></span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <?php if (!empty($row['foto'])): ?>
                                    <img src="<?= base_url('file/berita/' . $row['foto']); ?>" 
                                        alt="<?= esc($row['judul'] ?? 'Berita'); ?>"
                                        class="w-16 h-16 object-cover rounded-lg shadow-md border border-gray-200">
                                <?php else: ?>
                                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                                        <i class="fa fa-image text-gray-400 text-lg"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <a href="<?= base_url('admin/berita/edit/'.$row['id_berita']) ?>" 
                                       class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                       data-tooltip="Edit Berita">
                                        <i class="fa fa-edit text-sm"></i>
                                    </a>
                                    <a href="<?= base_url('admin/berita/delete/'.$row['id_berita']) ?>" 
                                       class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                       data-tooltip="Hapus Berita"
                                       onclick="return confirm('Yakin ingin menghapus berita <?= esc($row['judul']) ?>?')">
                                        <i class="fa fa-trash text-sm"></i>
                                    </a>
                                    <button class="bg-primary-medium hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                            data-tooltip="Lihat Detail"
                                            onclick="showDetail(<?= $row['id_berita'] ?>)">
                                        <i class="fa fa-eye text-sm"></i>
                                    </button>
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
// Function to show detail (bisa dikembangkan)
function showDetail(id) {
    window.location.href = `<?= base_url('admin/berita/detail/') ?>${id}`;
}

// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    const tooltips = document.querySelectorAll('.tooltip');
    tooltips.forEach(tooltip => {
        tooltip.addEventListener('mouseenter', function(e) {
            const tooltipText = this.getAttribute('data-tooltip');
            const tooltipEl = document.createElement('div');
            tooltipEl.className = 'fixed z-50 px-2 py-1 text-xs text-white bg-gray-800 rounded shadow-lg';
            tooltipEl.textContent = tooltipText;
            document.body.appendChild(tooltipEl);
            
            const rect = this.getBoundingClientRect();
            tooltipEl.style.left = (rect.left + window.scrollX) + 'px';
            tooltipEl.style.top = (rect.top + window.scrollY - 30) + 'px';
            
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