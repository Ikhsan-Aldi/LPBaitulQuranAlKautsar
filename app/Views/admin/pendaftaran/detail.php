<?=$this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content'); ?>
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Detail Pendaftar</h1>
            <p class="text-gray-600 mt-2">Informasi lengkap calon santri</p>
        </div>
        <a href="<?= base_url('admin/pendaftaran') ?>" class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <?php if ($pendaftar): ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informasi Utama -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Header Card -->
                <div class="bg-gradient-to-r from-primary-dark to-primary p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fa fa-user-graduate text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white font-amiri"><?= esc($pendaftar['nama_lengkap']) ?></h2>
                            <p class="text-white/80">
                                <?= esc($pendaftar['jenis_kelamin']) ?> • 
                                <?= esc($pendaftar['nisn']) ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Body Card -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Data Pribadi -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2">Data Pribadi</h3>
                            
                            <div class="flex items-start space-x-3">
                                <div class="p-2 bg-primary/10 rounded-lg">
                                    <i class="fa fa-venus-mars text-primary text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Jenis Kelamin</p>
                                    <p class="font-medium text-gray-800"><?= esc($pendaftar['jenis_kelamin']) ?></p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="p-2 bg-primary/10 rounded-lg">
                                    <i class="fa fa-birthday-cake text-primary text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Tempat, Tanggal Lahir</p>
                                    <p class="font-medium text-gray-800">
                                        <?= esc($pendaftar['tempat_lahir']) ?>, <?= esc($pendaftar['tanggal_lahir']) ?>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="p-2 bg-primary/10 rounded-lg">
                                    <i class="fa fa-map-marker-alt text-primary text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Alamat</p>
                                    <p class="font-medium text-gray-800"><?= esc($pendaftar['alamat']) ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Data Orang Tua -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-primary-dark border-b border-gray-200 pb-2">Data Orang Tua</h3>
                            
                            <div class="flex items-start space-x-3">
                                <div class="p-2 bg-primary/10 rounded-lg">
                                    <i class="fa fa-male text-primary text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Nama Ayah</p>
                                    <p class="font-medium text-gray-800"><?= esc($pendaftar['nama_ayah']) ?></p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="p-2 bg-primary/10 rounded-lg">
                                    <i class="fa fa-female text-primary text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Nama Ibu</p>
                                    <p class="font-medium text-gray-800"><?= esc($pendaftar['nama_ibu']) ?></p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="p-2 bg-primary/10 rounded-lg">
                                    <i class="fa fa-phone text-primary text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">No. HP Orang Tua</p>
                                    <p class="font-medium text-gray-800"><?= esc($pendaftar['no_hp_ortu']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar - Berkas dan Aksi -->
        <div class="space-y-6">
            <!-- Status Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Status Pendaftaran</h3>
                <?php if ($pendaftar['status'] == 'Menunggu Verifikasi'): ?>
                    <div class="flex items-center space-x-3 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                        <i class="fa fa-clock text-yellow-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-yellow-800">Menunggu Verifikasi</p>
                            <p class="text-sm text-yellow-600">Belum diproses</p>
                        </div>
                    </div>
                <?php elseif ($pendaftar['status'] == 'Diterima'): ?>
                    <div class="flex items-center space-x-3 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <i class="fa fa-check-circle text-green-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-green-800">Diterima</p>
                            <p class="text-sm text-green-600">Sudah diverifikasi</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="flex items-center space-x-3 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <i class="fa fa-times-circle text-red-600 text-xl"></i>
                        <div>
                            <p class="font-medium text-red-800">Ditolak</p>
                            <p class="text-sm text-red-600">Tidak memenuhi syarat</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Berkas Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Berkas Pendaftaran</h3>
                <div class="space-y-3">
                    <a href="<?= base_url('uploads/berkas/'.$pendaftar['ktp_ortu']) ?>" target="_blank" 
                       class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200 group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <i class="fa fa-id-card text-blue-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700 group-hover:text-primary">KTP Orang Tua</span>
                        </div>
                        <i class="fa fa-external-link text-gray-400 group-hover:text-primary"></i>
                    </a>

                    <a href="<?= base_url('uploads/berkas/'.$pendaftar['akta_kk']) ?>" target="_blank" 
                       class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200 group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <i class="fa fa-file-contract text-green-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700 group-hover:text-primary">Akta Lahir & KK</span>
                        </div>
                        <i class="fa fa-external-link text-gray-400 group-hover:text-primary"></i>
                    </a>

                    <a href="<?= base_url('uploads/berkas/'.$pendaftar['surat_ket_lulus']) ?>" target="_blank" 
                       class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200 group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <i class="fa fa-file-certificate text-purple-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700 group-hover:text-primary">Surat Keterangan Lulus</span>
                        </div>
                        <i class="fa fa-external-link text-gray-400 group-hover:text-primary"></i>
                    </a>

                    <a href="<?= base_url('uploads/berkas/'.$pendaftar['ijazah_terakhir']) ?>" target="_blank" 
                       class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200 group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-orange-100 rounded-lg">
                                <i class="fa fa-graduation-cap text-orange-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700 group-hover:text-primary">Ijazah Terakhir</span>
                        </div>
                        <i class="fa fa-external-link text-gray-400 group-hover:text-primary"></i>
                    </a>

                    <a href="<?= base_url('uploads/berkas/'.$pendaftar['foto']) ?>" target="_blank" 
                       class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-200 group">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-pink-100 rounded-lg">
                                <i class="fa fa-camera text-pink-600 text-sm"></i>
                            </div>
                            <span class="text-gray-700 group-hover:text-primary">Foto 3x4</span>
                        </div>
                        <i class="fa fa-external-link text-gray-400 group-hover:text-primary"></i>
                    </a>
                </div>
            </div>

            <!-- Aksi Card -->
            <?php if ($pendaftar['status'] == 'Menunggu Verifikasi'): ?>
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-primary-dark mb-4">Verifikasi Pendaftaran</h3>
                <div class="space-y-3">
                    <a href="<?= base_url('admin/pendaftaran/verifikasi/'.$pendaftar['id_pendaftaran'].'/Diterima') ?>" 
                       class="w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2"
                       onclick="return confirm('Yakin ingin menerima pendaftaran <?= esc($pendaftar['nama_lengkap']) ?>?')">
                        <i class="fa fa-check-circle"></i>
                        <span>Terima Pendaftaran</span>
                    </a>
                    
                    <a href="<?= base_url('admin/pendaftaran/verifikasi/'.$pendaftar['id_pendaftaran'].'/Ditolak') ?>" 
                       class="w-full bg-red-500 hover:bg-red-600 text-white py-3 px-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2"
                       onclick="return confirm('Yakin ingin menolak pendaftaran <?= esc($pendaftar['nama_lengkap']) ?>?')">
                        <i class="fa fa-times-circle"></i>
                        <span>Tolak Pendaftaran</span>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
        <div class="text-gray-400 text-6xl mb-4">
            <i class="fa fa-user-slash"></i>
        </div>
        <h3 class="text-xl font-medium text-gray-600 mb-2">Data tidak ditemukan</h3>
        <p class="text-gray-500 mb-6">Data pendaftar yang Anda cari tidak dapat ditemukan</p>
        <a href="<?= base_url('admin/pendaftaran') ?>" class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-medium inline-flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar Pendaftar</span>
        </a>
    </div>
    <?php endif; ?>
</div>

<style>
.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(1, 112, 119, 0.15);
}
</style>

<?= $this->endSection(); ?>