<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="text-center text-success mb-4">Formulir Pendaftaran Santri Baru</h2>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('pendaftaran/simpan') ?>" method="post" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">

      <h5 class="fw-bold text-success mb-3">Data Santri</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label>Jenis Kelamin</label>
          <select name="jenis_kelamin" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="col-md-4">
          <label>Tempat Lahir</label>
          <input type="text" name="tempat_lahir" class="form-control">
        </div>
        <div class="col-md-4">
          <label>Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" class="form-control">
        </div>
        <div class="mb-3">
            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
            <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Contoh: SMPN 1 Madiun" required>
        </div>
        <div class="mb-3">
          <label for="jenjang" class="form-label">Jenjang Pendidikan</label>
          <select name="jenjang" id="jenjang" class="form-control" required>
              <option value="">-- Pilih Jenjang --</option>
              <option value="SMP">SMP</option>
              <option value="SMA">SMA</option>
          </select>
      </div>
        <div class="col-md-4">
          <label>NISN</label>
          <input type="text" name="nisn" class="form-control">
        </div>
        <div class="col-12">
          <label>Alamat Lengkap</label>
          <textarea name="alamat" class="form-control" rows="2"></textarea>
        </div>
      </div>

      <hr>
      <h5 class="fw-bold text-success mb-3">Data Orang Tua</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label>Nama Ayah</label>
          <input type="text" name="nama_ayah" class="form-control">
        </div>
        <div class="col-md-6">
          <label>Nama Ibu</label>
          <input type="text" name="nama_ibu" class="form-control">
        </div>
        <div class="col-md-6">
          <label>No. HP Orang Tua</label>
          <input type="text" name="no_hp_ortu" class="form-control">
        </div>
      </div>

      <hr>
      <h5 class="fw-bold text-success mb-3">Upload Berkas</h5>
      <div class="row g-3">
        <div class="col-md-6">
          <label>Fotokopi KTP Orang Tua</label>
          <input type="file" name="ktp_ortu" class="form-control" accept=".jpg,.png,.pdf" required>
        </div>
        <div class="col-md-6">
          <label>Fotokopi Akta Lahir & KK</label>
          <input type="file" name="akta_kk" class="form-control" accept=".jpg,.png,.pdf" required>
        </div>
        <div class="col-md-6">
          <label>Surat Keterangan Lulus</label>
          <input type="file" name="surat_ket_lulus" class="form-control" accept=".jpg,.png,.pdf" required>
        </div>
        <div class="col-md-6">
          <label>Fotokopi Ijazah Terakhir</label>
          <input type="file" name="ijazah_terakhir" class="form-control" accept=".jpg,.png,.pdf" required>
        </div>
        <div class="col-md-6">
          <label>Pas Foto (3x4, background merah)</label>
          <input type="file" name="foto" class="form-control" accept=".jpg,.png" required>
        </div>
      </div>

      <div class="mt-4 text-end">
        <button type="submit" class="btn btn-success px-4">Kirim Pendaftaran</button>
      </div>
    </form>
  </div>

</body>
</html>
