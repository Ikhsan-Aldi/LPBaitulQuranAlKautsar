<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-eye mr-2"></i>Detail Galeri
                    </h3>
                    <div>
                        <a href="<?= base_url('admin/galeri/edit/' . $galeri['id']) ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </a>
                        <a href="<?= base_url('admin/galeri') ?>" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left mr-1"></i>Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <td width="20%" class="fw-bold">Judul:</td>
                                    <td><?= esc($galeri['judul']) ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Kategori:</td>
                                    <td>
                                        <span class="badge bg-<?= $galeri['kategori'] == 'kegiatan' ? 'primary' : ($galeri['kategori'] == 'fasilitas' ? 'success' : 'warning') ?>">
                                            <?= ucfirst($galeri['kategori']) ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Tanggal:</td>
                                    <td><?= date('d M Y', strtotime($galeri['tanggal'])) ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Status:</td>
                                    <td>
                                        <span class="badge bg-<?= $galeri['status'] == 'aktif' ? 'success' : 'secondary' ?>">
                                            <?= ucfirst($galeri['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Dibuat:</td>
                                    <td><?= date('d M Y H:i', strtotime($galeri['created_at'])) ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Diupdate:</td>
                                    <td><?= date('d M Y H:i', strtotime($galeri['updated_at'])) ?></td>
                                </tr>
                                <?php if ($galeri['deskripsi']): ?>
                                    <tr>
                                        <td class="fw-bold">Deskripsi:</td>
                                        <td><?= nl2br(esc($galeri['deskripsi'])) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <?php if ($galeri['gambar']): ?>
                                <div class="text-center">
                                    <h5 class="mb-3">Gambar</h5>
                                    <img src="<?= base_url('uploads/galeri/' . $galeri['gambar']) ?>" 
                                         alt="<?= esc($galeri['judul']) ?>" 
                                         class="img-fluid rounded shadow">
                                </div>
                            <?php else: ?>
                                <div class="text-center text-muted">
                                    <i class="fas fa-image fa-3x mb-3"></i>
                                    <p>Tidak ada gambar</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
