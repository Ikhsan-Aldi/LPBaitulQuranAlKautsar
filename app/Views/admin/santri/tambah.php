<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>

<h4 class="mb-3">Tambah Data Santri</h4>

<form action="<?= base_url('admin/santri/simpan'); ?>" method="post">
    <?= csrf_field(); ?>

    <div class="mb-3">
        <label for="pilih_mode" class="form-label">Sumber Data</label>
        <select id="pilih_mode" class="form-control" onchange="toggleMode()" required>
            <option value="">-- Pilih Mode Input --</option>
            <option value="pendaftaran">Dari Pendaftaran</option>
            <option value="manual">Input Manual</option>
        </select>
    </div>

    <!-- Mode 1: Pilih dari Pendaftaran -->
    <div id="formPendaftaran" style="display:none;">
        <div class="mb-3">
            <label>Pilih Pendaftar</label>
            <select name="id_pendaftaran" class="form-control">
                <option value="">-- Pilih --</option>
                <?php foreach ($pendaftaran as $p): ?>
                    <option value="<?= $p['id_pendaftaran']; ?>"><?= $p['nama_lengkap']; ?> (<?= $p['jenjang']; ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <!-- Mode 2: Input Manual -->
    <div id="formManual" style="display:none;">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control">
        </div>

        <div class="mb-3">
            <label>Jenjang</label>
            <select name="jenjang" class="form-control">
                <option value="">-- Pilih Jenjang --</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Asal Sekolah</label>
            <input type="text" name="asal_sekolah" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>
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

<script>
function toggleMode() {
    const mode = document.getElementById('pilih_mode').value;
    const formPendaftaran = document.getElementById('formPendaftaran');
    const formManual = document.getElementById('formManual');

    if (mode === 'pendaftaran') {
        formPendaftaran.style.display = 'block';
        formManual.style.display = 'none';
    } else if (mode === 'manual') {
        formPendaftaran.style.display = 'none';
        formManual.style.display = 'block';
    } else {
        formPendaftaran.style.display = 'none';
        formManual.style.display = 'none';
    }
}
</script>

<?= $this->endSection(); ?>
