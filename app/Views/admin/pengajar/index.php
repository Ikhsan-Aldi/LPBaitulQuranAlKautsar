<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<h2><?= esc($title) ?></h2>

<a href="<?= base_url('admin/pengajar/tambah'); ?>" class="btn btn-primary mb-3">Tambah Pengajar</a>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>No HP</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengajar as $i => $p): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= esc($p['nama_lengkap']); ?></td>
            <td><?= esc($p['nip']); ?></td>
            <td><?= esc($p['jabatan']); ?></td>
            <td><?= esc($p['no_hp']); ?></td>
            <td>
                <?php if ($p['foto']): ?>
                    <img src="<?= base_url('uploads/pengajar/' . $p['foto']); ?>" width="60">
                <?php else: ?>
                    <small><i>Tidak ada</i></small>
                <?php endif; ?>
            </td>
            <td>
                <a href="<?= base_url('admin/pengajar/edit/' . $p['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('admin/pengajar/hapus/' . $p['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
