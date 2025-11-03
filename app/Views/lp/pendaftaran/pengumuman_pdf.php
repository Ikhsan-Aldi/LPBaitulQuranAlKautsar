<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        .text-center { text-align: center; }
        .empty { margin-top: 30px; text-align: center; font-weight: bold; }
    </style>
</head>
<body>
    <?php if (!empty($pendaftar) && is_array($pendaftar)): ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Gelombang</th>
                <th>NISN</th>
                <th>Jenjang</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($pendaftar as $p): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($p['nama_lengkap']) ?></td>
                <td><?= esc($p['nama_gelombang'] ?? '-') ?></td>
                <td><?= esc($p['nisn'] ?? '-') ?></td>
                <td><?= esc($p['jenjang'] ?? '-') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p class="empty">Belum ada santri yang diterima saat ini.</p>
    <?php endif; ?>
</body>
</html>
