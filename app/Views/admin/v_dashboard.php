<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🏫 Pondok Al-Kautsar</a>
            <div>
                <a href="<?= base_url('logout'); ?>" class="btn btn-danger btn-sm" 
                onclick="return confirm('Yakin ingin logout?')">Logout</a>            
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-5">
        <h2 class="mb-4 text-success fw-bold">Dashboard Admin</h2>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Santri</h5>
                        <p class="display-6 text-success">124</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Ustadz</h5>
                        <p class="display-6 text-success">15</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Kegiatan</h5>
                        <p class="display-6 text-success">8</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Pengumuman</h5>
                        <p class="display-6 text-success">3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
