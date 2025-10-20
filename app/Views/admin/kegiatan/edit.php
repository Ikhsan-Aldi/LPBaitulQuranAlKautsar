<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h4 class="fw-bold mb-3">Edit Kegiatan</h4>

    <form action="<?= base_url('admin/kegiatan/update/'.$kegiatan['id']); ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label class="form-label">Judul Kegiatan</label>
            <input type="text" name="judul" class="form-control" value="<?= esc($kegiatan['judul']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4"><?= esc($kegiatan['deskripsi']); ?></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?= esc($kegiatan['tanggal']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="<?= esc($kegiatan['lokasi']); ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto (Opsional)</label><br>
            <?php if ($kegiatan['foto']): ?>
                <img src="<?= base_url('uploads/kegiatan/'.$kegiatan['foto']); ?>" width="120" class="mb-2 rounded">
            <?php endif; ?>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= base_url('admin/kegiatan'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>
