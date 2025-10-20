<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Data Kegiatan</h4>
        <a href="<?= base_url('admin/kegiatan/tambah'); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Kegiatan
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Foto</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($kegiatan): $no=1; foreach ($kegiatan as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= esc($row['judul']); ?></td>
                                <td><?= esc($row['tanggal']); ?></td>
                                <td><?= esc($row['lokasi']); ?></td>
                                <td class="text-center">
                                    <?php if ($row['foto']): ?>
                                        <img src="<?= base_url('uploads/kegiatan/'.$row['foto']); ?>" width="80" class="rounded">
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/kegiatan/edit/'.$row['id']); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= base_url('admin/kegiatan/hapus/'.$row['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kegiatan ini?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="6" class="text-center text-muted">Belum ada kegiatan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
