<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<h2>Edit Pengajar</h2>

<form action="<?= base_url('admin/pengajar/update/' . $pengajar['id']); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="<?= esc($pengajar['nama_lengkap']); ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" value="<?= esc($pengajar['nip']); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Jabatan / Mata Pelajaran</label>
        <input type="text" name="jabatan" value="<?= esc($pengajar['jabatan']); ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nomor HP</label>
        <input type="text" name="no_hp" value="<?= esc($pengajar['no_hp']); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"><?= esc($pengajar['alamat']); ?></textarea>
    </div>
    <div class="mb-3">
        <label>Foto Profil</label><br>
        <?php if ($pengajar['foto']): ?>
            <img src="<?= base_url('uploads/pengajar/' . $pengajar['foto']); ?>" width="80" class="mb-2"><br>
        <?php endif; ?>
        <input type="file" name="foto" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/pengajar'); ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
