<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Daftar Santri Diterima</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenjang</th>
                <th>Gelombang</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($pendaftar as $p): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($p['nama_lengkap']) ?></td>
                    <td><?= esc($p['jenjang']) ?></td>
                    <td><?= esc($p['nama_gelombang']) ?></td>
                    <td><?= date('d-m-Y', strtotime($p['tanggal_daftar'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
