<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<h2><?= esc($title) ?></h2>

<a href="<?= base_url('admin/ekstrakurikuler/tambah'); ?>" class="btn btn-primary mb-3">Tambah Data</a>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pembimbing</th>
            <th>Jadwal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ekstrakurikuler as $i => $e): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= esc($e['nama_ekstrakurikuler']) ?></td>
            <td><?= esc($e['pembimbing']) ?></td>
            <td><?= esc($e['jadwal']) ?></td>
            <td>
                <a href="<?= base_url('admin/ekstrakurikuler/edit/' . $e['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('admin/ekstrakurikuler/hapus/' . $e['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
