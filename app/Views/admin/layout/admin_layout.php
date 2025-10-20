<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Dashboard Admin') ?> | Pondok Pesantren</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f6fa;
        }
        .sidebar {
            width: 240px;
            background-color: #2e3b4e;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0; left: 0;
            padding-top: 20px;
            transition: all 0.3s ease;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 10px;
            transition: all 0.2s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #3b4b64;
        }
        .content {
            margin-left: 250px;
            padding: 25px;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
        .navbar .navbar-brand {
            font-weight: 600;
        }
        .logout-btn {
            color: #dc3545 !important;
            font-weight: 500;
        }
        footer {
            text-align: center;
            color: #777;
            padding: 15px;
            margin-top: 30px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4">Admin Panel</h4>

        <a href="<?= base_url('admin/dashboard') ?>" class="<?= service('uri')->getSegment(2) == 'dashboard' ? 'active' : '' ?>">
            <i class="fa fa-home me-2"></i> Dashboard
        </a>

        <a href="<?= base_url('admin/pengajar') ?>" class="<?= service('uri')->getSegment(2) == 'pengajar' ? 'active' : '' ?>">
            <i class="fa fa-user-tie me-2"></i> Data Pengajar
        </a>

        <a href="<?= base_url('admin/santri') ?>" class="<?= service('uri')->getSegment(2) == 'santri' ? 'active' : '' ?>">
            <i class="fa fa-users me-2"></i> Data Santri
        </a>

        <a href="<?= base_url('admin/ekstrakurikuler') ?>" class="<?= service('uri')->getSegment(2) == 'ekstrakurikuler' ? 'active' : '' ?>">
            <i class="fa fa-futbol me-2"></i> Ekstrakurikuler
        </a>

        <a href="<?= base_url('admin/pendaftaran') ?>" class="<?= service('uri')->getSegment(2) == 'pendaftaran' ? 'active' : '' ?>">
            <i class="fa fa-file-alt me-2"></i> Pendaftaran
        </a>

        <hr style="border-color:#4b576e;">

        <a href="<?= base_url('logout') ?>" class="logout-btn" onclick="return confirm('Yakin ingin logout?')">
            <i class="fa fa-sign-out-alt me-2"></i> Logout
        </a>
    </div>

    <!-- Content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light mb-4">
            <div class="container-fluid">
                <span class="navbar-brand">Pondok Pesantren Al-Kautsar</span>
                <div class="d-flex align-items-center">
                    <i class="fa fa-user-circle me-2"></i>
                    <span><?= esc(session()->get('username') ?? 'Admin') ?></span>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <?= $this->renderSection('content') ?>

        <footer>
            &copy; <?= date('Y') ?> Pondok Pesantren Al-Kautsar. All rights reserved.
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
