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
    <h2 class="text-success fw-bold mb-4">📋 Data Pendaftar Santri Baru</h2>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-hover bg-white shadow-sm">
      <thead class="table-success text-center">
        <tr>
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>Jenis Kelamin</th>
          <th>NISN</th>
          <th>Status</th>
          <th>Tanggal Daftar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($pendaftar): ?>
          <?php $no = 1; foreach ($pendaftar as $p): ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><?= esc($p['nama_lengkap']) ?></td>
              <td><?= esc($p['jenis_kelamin']) ?></td>
              <td><?= esc($p['nisn']) ?></td>
              <td class="text-center">
                <?php if ($p['status'] == 'Menunggu Verifikasi'): ?>
                  <span class="badge bg-warning text-dark"><?= $p['status'] ?></span>
                <?php elseif ($p['status'] == 'Diterima'): ?>
                  <span class="badge bg-success"><?= $p['status'] ?></span>
                <?php else: ?>
                  <span class="badge bg-danger"><?= $p['status'] ?></span>
                <?php endif; ?>
              </td>
              <td><?= date('d-m-Y H:i', strtotime($p['tanggal_daftar'])) ?></td>
              <td class="text-center">
                <a href="<?= base_url('admin/pendaftaran/detail/'.$p['id_pendaftaran']) ?>" class="btn btn-sm btn-primary">Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="7" class="text-center text-muted">Belum ada data pendaftar</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
