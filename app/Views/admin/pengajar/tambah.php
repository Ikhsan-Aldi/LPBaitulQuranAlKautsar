<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<h2>Tambah Pengajar</h2>

<form action="<?= base_url('admin/pengajar/simpan'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control">
    </div>
    <div class="mb-3">
        <label>Jabatan / Mata Pelajaran</label>
        <input type="text" name="jabatan" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nomor HP</label>
        <input type="text" name="no_hp" class="form-control">
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Foto Profil</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/pengajar'); ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
