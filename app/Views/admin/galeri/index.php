<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
<!-- Header Section -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-primary-dark mb-2">Pondok Pesantren Al-Kautsar</h1>
    <h2 class="text-xl text-gray-700 mb-2">Galeri</h2>
    <p class="text-gray-600">Kelola dokumentasi kegiatan, fasilitas, dan prestasi pondok pesantren</p>
</div>

<!-- Action Button -->
<div class="flex justify-end mb-6">
    <a href="<?= base_url('admin/galeri/tambah') ?>" class="bg-primary-dark hover:bg-primary text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center">
        <i class="fas fa-plus mr-2"></i>
        Tambah Galeri
    </a>
</div>

<!-- Search and Filter Section -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
    <div class="flex flex-wrap items-center gap-4">
        <!-- Search Bar -->
        <div class="flex-1 min-w-64">
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Cari galeri..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>
        
        <!-- Category Filter -->
        <div class="min-w-48">
            <select id="categoryFilter" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">Semua Kategori</option>
                <option value="kegiatan">Kegiatan</option>
                <option value="fasilitas">Fasilitas</option>
                <option value="prestasi">Prestasi</option>
            </select>
        </div>
        
        <!-- Reset Button -->
        <button id="resetFilter" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
            <i class="fas fa-sync-alt mr-2"></i>
            Reset
        </button>
    </div>
</div>

<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Data Table -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <!-- Table Header -->
            <thead class="bg-primary-dark text-white">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">No</th>
                    <th class="px-6 py-4 text-left font-semibold">Gambar</th>
                    <th class="px-6 py-4 text-left font-semibold">Judul</th>
                    <th class="px-6 py-4 text-left font-semibold">Kategori</th>
                    <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                    <th class="px-6 py-4 text-left font-semibold">Status</th>
                    <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                </tr>
            </thead>
            
            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200">
                <?php if (empty($galeri)): ?>
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <i class="fas fa-images text-4xl mb-4"></i>
                                <p class="text-lg">Belum ada data galeri</p>
                                <p class="text-sm">Klik "Tambah Galeri" untuk menambahkan data pertama</p>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($galeri as $item): ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-gray-700"><?= $no++ ?></td>
                            
                            <!-- Gambar -->
                            <td class="px-6 py-4">
                                <?php if ($item['gambar']): ?>
                                    <img src="<?= base_url('uploads/galeri/' . $item['gambar']) ?>" 
                                         alt="<?= esc($item['judul']) ?>" 
                                         class="w-16 h-12 object-cover rounded-lg border border-gray-200">
                                <?php else: ?>
                                    <div class="w-16 h-12 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            
                            <!-- Judul -->
                            <td class="px-6 py-4">
                                <div>
                                    <div class="font-semibold text-gray-900"><?= esc($item['judul']) ?></div>
                                    <?php if ($item['deskripsi']): ?>
                                        <div class="text-sm text-gray-500 mt-1"><?= esc(substr($item['deskripsi'], 0, 60)) ?>...</div>
                                    <?php endif; ?>
                                </div>
                            </td>
                            
                            <!-- Kategori -->
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                    <?= $item['kategori'] == 'kegiatan' ? 'bg-blue-100 text-blue-800' : 
                                        ($item['kategori'] == 'fasilitas' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800') ?>">
                                    <?= ucfirst($item['kategori']) ?>
                                </span>
                            </td>
                            
                            <!-- Tanggal -->
                            <td class="px-6 py-4 text-gray-700">
                                <?= date('d M Y', strtotime($item['tanggal'])) ?>
                            </td>
                            
                            <!-- Status -->
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                    <?= $item['status'] == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' ?>">
                                    <?= ucfirst($item['status']) ?>
                                </span>
                            </td>
                            
                            <!-- Aksi -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="<?= base_url('admin/galeri/detail/' . $item['id']) ?>" 
                                       class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-200" 
                                       title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url('admin/galeri/edit/' . $item['id']) ?>" 
                                       class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition-colors duration-200" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/galeri/hapus/' . $item['id']) ?>" 
                                       class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200" 
                                       title="Hapus"
                                       onclick="return confirm('Yakin ingin menghapus galeri ini?')">
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

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const title = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
        if (title.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Category filter functionality
document.getElementById('categoryFilter').addEventListener('change', function() {
    const selectedCategory = this.value;
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const category = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
        if (selectedCategory === '' || category.includes(selectedCategory)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Reset filter functionality
document.getElementById('resetFilter').addEventListener('click', function() {
    document.getElementById('searchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
        row.style.display = '';
    });
});
</script>
</div>
<?= $this->endSection() ?>
