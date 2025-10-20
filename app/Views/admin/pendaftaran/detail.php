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
    <h3 class="text-success fw-bold mb-4">🧾 Detail Pendaftar</h3>

    <?php if ($pendaftar): ?>
      <div class="card shadow-sm border-0 p-4">
        <h5 class="fw-bold mb-3"><?= esc($pendaftar['nama_lengkap']) ?></h5>
        <p><b>Jenis Kelamin:</b> <?= esc($pendaftar['jenis_kelamin']) ?></p>
        <p><b>NISN:</b> <?= esc($pendaftar['nisn']) ?></p>
        <p><b>Tempat, Tanggal Lahir:</b> <?= esc($pendaftar['tempat_lahir']) ?>, <?= esc($pendaftar['tanggal_lahir']) ?></p>
        <p><b>Alamat:</b> <?= esc($pendaftar['alamat']) ?></p>
        <p><b>Nama Ayah:</b> <?= esc($pendaftar['nama_ayah']) ?></p>
        <p><b>Nama Ibu:</b> <?= esc($pendaftar['nama_ibu']) ?></p>
        <p><b>No. HP Orang Tua:</b> <?= esc($pendaftar['no_hp_ortu']) ?></p>

        <hr>
        <h6 class="fw-bold text-success">Berkas</h6>
        <ul>
          <li><a href="<?= base_url('uploads/berkas/'.$pendaftar['ktp_ortu']) ?>" target="_blank">KTP Orang Tua</a></li>
          <li><a href="<?= base_url('uploads/berkas/'.$pendaftar['akta_kk']) ?>" target="_blank">Akta Lahir & KK</a></li>
          <li><a href="<?= base_url('uploads/berkas/'.$pendaftar['surat_ket_lulus']) ?>" target="_blank">Surat Keterangan Lulus</a></li>
          <li><a href="<?= base_url('uploads/berkas/'.$pendaftar['ijazah_terakhir']) ?>" target="_blank">Ijazah Terakhir</a></li>
          <li><a href="<?= base_url('uploads/berkas/'.$pendaftar['foto']) ?>" target="_blank">Foto 3x4</a></li>
        </ul>

        <div class="mt-4">
          <a href="<?= base_url('admin/pendaftaran/verifikasi/'.$pendaftar['id_pendaftaran'].'/Diterima') ?>" class="btn btn-success btn-sm">Terima</a>
          <a href="<?= base_url('admin/pendaftaran/verifikasi/'.$pendaftar['id_pendaftaran'].'/Ditolak') ?>" class="btn btn-danger btn-sm">Tolak</a>
          <a href="<?= base_url('admin/pendaftaran') ?>" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
      </div>
    <?php else: ?>
      <p class="text-muted">Data tidak ditemukan.</p>
    <?php endif; ?>
  </div>
</body>
</html>
