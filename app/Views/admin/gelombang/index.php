<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Gelombang Pendaftaran</h1>
            <p class="text-gray-600 mt-2">Kelola periode pendaftaran santri baru pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/gelombang/tambah') ?>" 
           class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Gelombang Baru</span>
        </a>
    </div>

    <!-- Alert Success -->
    <?php if (session()->getFlashdata('success')): ?>
    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 animate-pulse">
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
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 animate-pulse">
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
                        <th class="py-4 px-6 text-left font-semibold">Nama Gelombang</th>
                        <th class="py-4 px-6 text-left font-semibold">Periode Pendaftaran</th>
                        <th class="py-4 px-6 text-left font-semibold">Tahap Seleksi</th>
                        <th class="py-4 px-6 text-left font-semibold">Status</th>
                        <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($gelombang)): ?>
                        <tr>
                            <td colspan="6" class="py-12 px-4 text-center">
                                <div class="text-gray-400 text-6xl mb-4">
                                    <i class="fa fa-calendar-alt"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada gelombang pendaftaran</h3>
                                <p class="text-gray-500 mb-4">Mulai dengan menambahkan gelombang pendaftaran baru</p>
                                <a href="<?= base_url('admin/gelombang/tambah') ?>" 
                                   class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2">
                                    <i class="fa fa-plus"></i>
                                    <span>Tambah Gelombang Pertama</span>
                                </a>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($gelombang as $item): ?>
                        <?php 
                        $seleksi = json_decode($item['seleksi'] ?? '[]', true);
                        $jumlah_seleksi = is_array($seleksi) ? count($seleksi) : 0;
                        $seleksi_array = is_array($seleksi) ? $seleksi : [];
                        ?>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                    <?= $no++ ?>
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-800"><?= esc($item['nama']) ?></div>
                                <div class="text-sm text-gray-600 mt-1">Kuota: <?= $item['kuota'] ?? 'Tidak terbatas' ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <i class="fa fa-calendar text-gray-400 text-sm"></i>
                                    <div>
                                        <div class="text-sm text-gray-700">
                                            <?= date('d M Y', strtotime($item['tanggal_mulai'])) ?>
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            s/d <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <span class="bg-primary-light/20 text-primary-dark px-3 py-1 rounded-full text-xs font-medium">
                                        <?= $jumlah_seleksi ?> Tahap
                                    </span>
                                    <?php if (!empty($seleksi_array)): ?>
                                        <button 
                                            onclick="showSeleksi(<?= htmlspecialchars(json_encode($seleksi_array), ENT_QUOTES, 'UTF-8') ?>, '<?= esc($item['nama']) ?>')"
                                            class="text-primary hover:text-primary-dark transition-colors duration-200 tooltip"
                                            data-tooltip="Lihat Tahap Seleksi">
                                            <i class="fa fa-eye text-sm"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <?php if ($item['status'] == 'dibuka'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fa fa-circle text-[8px] mr-1"></i>
                                        Dibuka
                                    </span>
                                <?php elseif ($item['status'] == 'ditutup'): ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fa fa-circle text-[8px] mr-1"></i>
                                        Ditutup
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <i class="fa fa-circle text-[8px] mr-1"></i>
                                        Berakhir
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <a href="<?= base_url('admin/gelombang/edit/' . $item['id']) ?>" 
                                       class="bg-primary-light hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                       data-tooltip="Edit Gelombang">
                                        <i class="fa fa-edit text-sm"></i>
                                    </a>
                                    <a href="<?= base_url('admin/gelombang/hapus/' . $item['id']) ?>" 
                                       class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                       data-tooltip="Hapus Gelombang"
                                       onclick="return confirm('Yakin ingin menghapus gelombang <?= esc($item['nama']) ?>?')">
                                        <i class="fa fa-trash text-sm"></i>
                                    </a>
                                    <button class="bg-primary-medium hover:bg-primary text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                            data-tooltip="Detail Gelombang"
                                            onclick="showDetail(<?= $item['id'] ?>)">
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

<!-- Modal Seleksi -->
<div id="modalSeleksi" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-lg">
    <h3 id="modalTitle" class="text-xl font-bold text-[#017077] mb-4 flex items-center">
      <i class="fas fa-list-ol mr-2"></i> Jadwal Tahap Seleksi
    </h3>
    <div id="modalContent" class="space-y-3 max-h-[60vh] overflow-y-auto"></div>
    <div class="text-right mt-6">
      <button onclick="closeModal()" class="px-5 py-2 bg-[#017077] text-white rounded-lg hover:bg-[#005359]">Tutup</button>
    </div>
  </div>
</div>

<script>
// Function to show seleksi details
function showSeleksi(data, nama) {
    const modal = document.getElementById('modalSeleksi');
    const title = document.getElementById('modalTitle');
    const content = document.getElementById('modalContent');

    title.innerHTML = `<i class="fas fa-list-ol mr-2"></i> Tahap Seleksi - ${nama}`;
    content.innerHTML = '';

    if (data && data.length > 0) {
        data.forEach((item, i) => {
            const el = document.createElement('div');
            el.className = 'p-4 bg-gray-50 rounded-lg border border-gray-200 flex items-center space-x-3';
            el.innerHTML = `
                <div class="bg-[#017077] text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">${i + 1}</div>
                <div class="text-gray-800 font-medium">${item}</div>
            `;
            content.appendChild(el);
        });
    } else {
        content.innerHTML = '<p class="text-gray-500 text-center py-4">Tidak ada tahap seleksi</p>';
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    const modal = document.getElementById('modalSeleksi');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Function to show detail gelombang
function showDetail(id) {
    window.location.href = `<?= base_url('admin/gelombang/detail/') ?>${id}`;
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

// Close modal when clicking outside
document.getElementById('modalSeleksi').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
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