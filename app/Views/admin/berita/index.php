<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Manajemen Berita</h1>
            <p class="text-gray-600 mt-2">Kelola berita pondok pesantren</p>
        </div>
        <a href="<?= base_url('admin/berita/tambah') ?>" 
           class="mt-4 md:mt-0 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-plus"></i>
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
                <div>
                    <?php 
                    $errors = session()->getFlashdata('error');
                    if (is_array($errors)): 
                        foreach ($errors as $error): ?>
                            <span class="font-medium block"><?= $error ?></span>
                        <?php endforeach; 
                    else: ?>
                        <span class="font-medium"><?= $errors ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <button type="button" class="text-red-500 hover:text-red-700 transition-colors duration-200" onclick="this.parentElement.parentElement.remove()">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <?php if (empty($berita)): ?>
            <div class="text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">
                    <i class="fa fa-newspaper"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-600 mb-2">Belum ada berita</h3>
                <p class="text-gray-500 mb-4">Mulai dengan membuat berita pertama</p>
                <a href="<?= base_url('admin/berita/tambah') ?>" 
                class="bg-primary hover:bg-primary-dark text-white px-6 py-2 rounded-lg font-medium inline-flex items-center space-x-2 transition-all duration-200 transform hover:scale-105">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Berita</span>
                </a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-primary-dark to-primary text-white">
                            <th class="py-4 px-6 text-left font-semibold">No</th>
                            <th class="py-4 px-6 text-left font-semibold">Gambar</th>
                            <th class="py-4 px-6 text-left font-semibold">Judul & Deskripsi</th>
                            <th class="py-4 px-6 text-left font-semibold">Penulis</th>
                            <th class="py-4 px-6 text-left font-semibold">Tanggal</th>
                            <th class="py-4 px-6 text-left font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($berita as $i => $item): ?>
                        <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4 px-6">
                                <span class="bg-primary/10 text-primary-dark px-3 py-1 rounded-full text-sm font-medium">
                                    <?= $i + 1 ?>
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex justify-center">
                                    <?php if (!empty($item['foto'])): ?>
                                        <img src="<?= base_url('file/berita/' . $item['foto']); ?>" 
                                            alt="<?= esc($item['judul']); ?>" 
                                            class="w-14 h-14 object-cover rounded-lg border border-gray-200 shadow-sm">
                                    <?php else: ?>
                                        <div class="w-14 h-14 bg-gray-100 rounded-lg flex items-center justify-center border border-gray-200">
                                            <i class="fa fa-image text-gray-400 text-lg"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div>
                                    <div class="font-semibold text-gray-900"><?= esc($item['judul']) ?></div>
                                    <p class="text-sm text-gray-600 mt-1 line-clamp-2"><?= esc(strip_tags($item['excerpt'])) ?></p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-medium text-gray-700"><?= esc($item['penulis']) ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                    <i class="fa fa-calendar text-gray-400 text-sm"></i>
                                    <span><?= date('d M Y', strtotime($item['created_at'])) ?></span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <a href="<?= base_url('admin/berita/edit/' . $item['id_berita']) ?>" 
                                    class="bg-primary-light hover:bg-primary-dark text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                    data-tooltip="Edit">
                                        <i class="fa fa-edit text-sm"></i>
                                    </a>
                                    <button onclick="confirmDelete(<?= $item['id_berita'] ?>, '<?= addslashes($item['judul']) ?>')" 
                                            class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                            data-tooltip="Hapus">
                                        <i class="fa fa-trash text-sm"></i>
                                    </button>
                                    <a href="<?= base_url('admin/berita/preview/' . $item['id_berita']) ?>" 
                                    class="bg-primary-medium hover:bg-primary-dark text-white p-2 rounded-lg transition-all duration-200 transform hover:scale-105 tooltip"
                                    data-tooltip="Preview">
                                        <i class="fa fa-eye text-sm"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDelete(id, judul) {
    Swal.fire({
        title: 'Hapus Berita?',
        html: `Anda yakin ingin menghapus berita "<strong>${judul}</strong>"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '<?= base_url('admin/berita/delete/') ?>' + id;
        }
    });
}
</script>


<style>
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
<?= $this->endSection() ?>