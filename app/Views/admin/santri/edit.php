<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h4 class="fw-bold mb-3">Edit Data Santri</h4>

    <form action="<?= base_url('admin/santri/update/' . $santri['id']); ?>" method="post">
        <?= csrf_field(); ?>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" value="<?= esc($santri['nis']); ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= esc($santri['nama']); ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Jenjang</label>
                <select name="jenjang" class="form-control" required>
                    <option value="SMP" <?= $santri['jenjang'] == 'SMP' ? 'selected' : ''; ?>>SMP</option>
                    <option value="SMA" <?= $santri['jenjang'] == 'SMA' ? 'selected' : ''; ?>>SMA</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control" value="<?= esc($santri['asal_sekolah']); ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3"><?= esc($santri['alamat']); ?></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control" value="<?= esc($santri['no_hp']); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="Aktif" <?= $santri['status'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                    <option value="Lulus" <?= $santri['status'] == 'Lulus' ? 'selected' : ''; ?>>Lulus</option>
                    <option value="Nonaktif" <?= $santri['status'] == 'Nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="<?= base_url('admin/santri'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection(); ?>
