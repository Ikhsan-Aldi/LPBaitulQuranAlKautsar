<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #0d6efd;
            color: white;
            flex-shrink: 0;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover, .sidebar .active {
            background-color: #0b5ed7;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .navbar {
            background-color: white;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }
        .navbar .logout-btn {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        .navbar .logout-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <h4 class="text-center py-3 border-bottom border-light">Admin Panel</h4>
        <a href="<?= base_url('admin/dashboard'); ?>" class="<?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>">🏠 Dashboard</a>
        <a href="<?= base_url('admin/pendaftaran'); ?>" class="<?= uri_string() == 'admin/pendaftaran' ? 'active' : '' ?>">🧾 Pendaftaran</a>
        <a href="<?= base_url('admin/ekstrakurikuler'); ?>" class="<?= uri_string() == 'admin/ekstrakurikuler' ? 'active' : '' ?>">🎯 Ekstrakurikuler</a>
        <a href="<?= base_url('b0/logout'); ?>" class="mt-auto text-center py-3 text-light bg-danger">🚪 Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <nav class="navbar navbar-light mb-4 px-3">
            <span>Selamat Datang, <strong><?= session()->get('username'); ?></strong></span>
        </nav>

        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
