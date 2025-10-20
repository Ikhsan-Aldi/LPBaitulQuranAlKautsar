<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<form action="<?= base_url('admin/santri/simpan'); ?>" method="post">
    <?= csrf_field(); ?>

    <div class="mb-3">
        <label>Pilih Pendaftar</label>
        <select name="id_pendaftaran" class="form-control" required>
            <option value="">-- Pilih --</option>
            <?php foreach ($pendaftaran as $p): ?>
                <option value="<?= $p['id_pendaftaran']; ?>"><?= $p['nama_lengkap']; ?> (<?= $p['jenjang']; ?>)</option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>NIS</label>
        <input type="text" name="nis" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="Aktif">Aktif</option>
            <option value="Lulus">Lulus</option>
            <option value="Nonaktif">Nonaktif</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->endSection(); ?>