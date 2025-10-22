<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Gelombang Pendaftaran</h1>
            <p class="text-gray-600 mt-2">Kelola gelombang pendaftaran pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/gelombang/tambah') ?>" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200 flex items-center">
            <i class="fas fa-plus-circle mr-2"></i>
            <span>Tambah Gelombang Baru</span>
        </a>
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

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-primary-dark text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider w-16">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Gelombang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Rentang Waktu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jumlah Seleksi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (empty($gelombang)): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                <i class="fas fa-inbox text-3xl mb-2 block"></i>
                                Belum ada data gelombang pendaftaran
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; ?>
                        <?php foreach ($gelombang as $item): ?>
                            <?php 
                            // Decode data JSON untuk menghitung jumlah seleksi
                            $seleksi = json_decode($item['seleksi'] ?? '[]', true);
                            $jumlah_seleksi = is_array($seleksi) ? count($seleksi) : 0;
                            ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $no++ ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary-dark"><?= esc($item['nama']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('d M Y', strtotime($item['tanggal_mulai'])) ?> - 
                                    <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-light text-white">
                                        <?= $jumlah_seleksi ?> Seleksi
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php 
                                    $badge_class = [
                                        'dibuka' => 'bg-green-100 text-green-800',
                                        'ditutup' => 'bg-yellow-100 text-yellow-800',
                                        'berakhir' => 'bg-gray-100 text-gray-800'
                                    ];
                                    $status_class = $badge_class[$item['status']] ?? 'bg-gray-100 text-gray-800';
                                    ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $status_class ?>">
                                        <?= ucfirst($item['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="<?= base_url('admin/gelombang/edit/' . $item['id']) ?>" 
                                           class="text-primary-dark hover:text-primary bg-primary-light/20 hover:bg-primary-light/30 p-2 rounded-lg transition-colors duration-200"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/gelombang/hapus/' . $item['id']) ?>" 
                                           class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 p-2 rounded-lg transition-colors duration-200"
                                           title="Hapus"
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus gelombang ini?')">
                                            <i class="fas fa-trash"></i>
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
<?= $this->endSection() ?>