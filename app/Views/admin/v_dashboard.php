<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
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
<?= $this->endSection() ?>