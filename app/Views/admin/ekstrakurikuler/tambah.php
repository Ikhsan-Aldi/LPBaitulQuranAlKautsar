<h2>Tambah Ekstrakurikuler</h2>

<form action="<?= base_url('admin/ekstrakurikuler/simpan'); ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Nama Ekstrakurikuler</label>
        <input type="text" name="nama_ekstrakurikuler" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Pembimbing</label>
        <input type="text" name="pembimbing" class="form-control">
    </div>
    <div class="mb-3">
        <label>Jadwal</label>
        <input type="text" name="jadwal" class="form-control">
    </div>
    <div class="mb-3">
        <label>Ikon (Font Awesome)</label>
        <select name="icon" class="form-control">
            <option value="fas fa-swimming-pool">Berenang</option>
            <option value="fas fa-book">Tahfidz</option>
            <option value="fas fa-futbol">Futsal</option>
            <option value="fas fa-music">Hadrah</option>
            <option value="fas fa-paint-brush">Kaligrafi</option>
            <option value="fas fa-code">Teknologi</option>
            <option value="fas fa-mosque">Kajian</option>
            <option value="">(Kosongkan untuk ikon default)</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/ekstrakurikuler'); ?>" class="btn btn-secondary">Kembali</a>
</form>
