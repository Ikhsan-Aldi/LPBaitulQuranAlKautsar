<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Santri</h4>
        <a href="<?= base_url('admin/santri/tambah'); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Santri
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jenjang</th>
                            <th>Asal Sekolah</th>
                            <th>No. HP</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($santri) > 0): ?>
                            <?php $no = 1; foreach ($santri as $row): ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= esc($row['nis']); ?></td>
                                    <td><?= esc($row['nama']); ?></td>
                                    <td><?= esc($row['jenjang']); ?></td>
                                    <td><?= esc($row['asal_sekolah']); ?></td>
                                    <td><?= esc($row['no_hp']); ?></td>
                                    <td>
                                        <?php if ($row['status'] == 'Aktif'): ?>
                                            <span class="badge bg-success">Aktif</span>
                                        <?php elseif ($row['status'] == 'Lulus'): ?>
                                            <span class="badge bg-info">Lulus</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/santri/edit/' . $row['id']); ?>" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="<?= base_url('admin/santri/hapus/' . $row['id']); ?>"
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data santri.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
