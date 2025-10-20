<h2>Edit Ekstrakurikuler</h2>

<form action="<?= base_url('admin/ekstrakurikuler/update/' . $ekstra['id']); ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Nama Ekstrakurikuler</label>
        <input type="text" name="nama_ekstrakurikuler" class="form-control" value="<?= esc($ekstra['nama_ekstrakurikuler']); ?>" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"><?= esc($ekstra['deskripsi']); ?></textarea>
    </div>
    <div class="mb-3">
        <label>Pembimbing</label>
        <input type="text" name="pembimbing" class="form-control" value="<?= esc($ekstra['pembimbing']); ?>">
    </div>
    <div class="mb-3">
        <label>Jadwal</label>
        <input type="text" name="jadwal" class="form-control" value="<?= esc($ekstra['jadwal']); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/ekstrakurikuler'); ?>" class="btn btn-secondary">Kembali</a>
</form>
