<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/gelombang/tambah') ?>" class="btn btn-primary">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Gelombang
        </a>
    </div>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Gelombang</th>
                            <th>Rentang Waktu</th>
                            <th>Jumlah Seleksi</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($gelombang)): ?>
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data gelombang pendaftaran</td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; ?>
                            <?php foreach ($gelombang as $item): ?>
                                <?php 
                                // Decode data JSON untuk menghitung jumlah seleksi
                                $seleksi = json_decode($item['seleksi'] ?? '[]', true);
                                $jumlah_seleksi = is_array($seleksi) ? count($seleksi) : 0;
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= esc($item['nama']) ?></td>
                                    <td>
                                        <?= date('d M Y', strtotime($item['tanggal_mulai'])) ?> - 
                                        <?= date('d M Y', strtotime($item['tanggal_selesai'])) ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-info"><?= $jumlah_seleksi ?> Seleksi</span>
                                    </td>
                                    <td>
                                        <?php 
                                        $badge_class = [
                                            'dibuka' => 'bg-success',
                                            'ditutup' => 'bg-warning',
                                            'berakhir' => 'bg-secondary'
                                        ];
                                        $status_class = $badge_class[$item['status']] ?? 'bg-secondary';
                                        ?>
                                        <span class="badge <?= $status_class ?>">
                                            <?= ucfirst($item['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= base_url('admin/gelombang/edit/' . $item['id']) ?>" 
                                               class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/gelombang/hapus/' . $item['id']) ?>" 
                                               class="btn btn-danger" 
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
</div>
<?= $this->endSection() ?>