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
    <div class="mb-3">
        <label for="icon" class="form-label">Ikon (Font Awesome)</label>
        <select name="icon" id="icon" class="form-select">
            <option value="fas fa-swimming-pool" <?= isset($ekstra['icon']) && $ekstra['icon'] == 'fas fa-swimming-pool' ? 'selected' : '' ?>>Berenang</option>
            <option value="fas fa-book" <?= isset($ekstra['icon']) && $ekstra['icon'] == 'fas fa-book' ? 'selected' : '' ?>>Tahfidz</option>
            <option value="fas fa-futbol" <?= isset($ekstra['icon']) && $ekstra['icon'] == 'fas fa-futbol' ? 'selected' : '' ?>>Futsal</option>
            <option value="fas fa-music" <?= isset($ekstra['icon']) && $ekstra['icon'] == 'fas fa-music' ? 'selected' : '' ?>>Hadrah</option>
            <option value="fas fa-paint-brush" <?= isset($ekstra['icon']) && $ekstra['icon'] == 'fas fa-paint-brush' ? 'selected' : '' ?>>Kaligrafi</option>
            <option value="fas fa-code" <?= isset($ekstra['icon']) && $ekstra['icon'] == 'fas fa-code' ? 'selected' : '' ?>>Teknologi</option>
            <option value="fas fa-mosque" <?= isset($ekstra['icon']) && $ekstra['icon'] == 'fas fa-mosque' ? 'selected' : '' ?>>Kajian</option>
            <option value="" <?= empty($ekstra['icon']) ? 'selected' : '' ?>>— Gunakan ikon default —</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/ekstrakurikuler'); ?>" class="btn btn-secondary">Kembali</a>
</form>
