<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<div class="p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark font-amiri">Dashboard Admin</h1>
        <p class="text-gray-600 mt-2">Selamat datang di sistem manajemen Pondok Pesantren Al-Kautsar</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-lg card-hover border-l-4 border-primary">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Santri</p>
                        <p class="text-3xl font-bold text-primary-dark mt-2" id="santri-count"><?= count($santri) ?></p>
                    </div>
                    <div class="p-3 bg-primary/10 rounded-xl">
                        <i class="fa fa-users text-2xl text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg card-hover border-l-4 border-primary-medium">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Pengajar</p>
                        <p class="text-3xl font-bold text-primary-dark mt-2" id="pengajar-count"><?= $totalPengajar ?? '15' ?></p>
                    </div>
                    <div class="p-3 bg-primary-medium/10 rounded-xl">
                        <i class="fa fa-user-tie text-2xl text-primary-medium"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg card-hover border-l-4 border-primary-light">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Kegiatan Aktif</p>
                        <p class="text-3xl font-bold text-primary-dark mt-2" id="kegiatan-count"><?= $totalKegiatan ?? '8' ?></p>
                    </div>
                    <div class="p-3 bg-primary-light/10 rounded-xl">
                        <i class="fa fa-calendar-alt text-2xl text-primary-light"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg card-hover border-l-4 border-primary-dark">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Pengumuman</p>
                        <p class="text-3xl font-bold text-primary-dark mt-2" id="pengumuman-count"><?= $totalPengumuman ?? '3' ?></p>
                    </div>
                    <div class="p-3 bg-primary-dark/10 rounded-xl">
                        <i class="fa fa-bullhorn text-2xl text-primary-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Registrations -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-primary-dark">Pendaftaran Terbaru</h3>
            <a href="<?= base_url('admin/pendaftaran') ?>" class="text-primary hover:text-primary-dark text-sm font-medium">Kelola Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Nama</th>
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Tanggal Daftar</th>
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Status</th>
                        <th class="text-left py-3 px-4 text-sm font-medium text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody id="recent-registrations">
                    <?php if(isset($recentRegistrations) && !empty($recentRegistrations)): ?>
                        <?php foreach($recentRegistrations as $registration): ?>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4"><?= $registration['nama_lengkap'] ?></td>
                            <td class="py-3 px-4"><?= $registration['tanggal_daftar'] ?></td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    <?= $registration['status'] == 'Menunggu' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($registration['status'] == 'Diterima' ? 'bg-green-100 text-green-800' : 
                                       'bg-red-100 text-red-800') ?>">
                                    <?= ucfirst($registration['status']) ?>
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <button class="text-primary hover:text-primary-dark text-sm font-medium" 
                                        onclick="viewRegistration(<?= $registration['id_pendaftaran'] ?>)">
                                    Lihat
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="py-6 px-4 text-center text-gray-500">
                                <i class="fas fa-inbox text-3xl mb-2 block"></i>
                                Belum ada pendaftaran terbaru
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Function to update stats dynamically
function updateStats() {
    // In a real application, you would fetch this data from an API
    fetch('/admin/api/dashboard-stats')
        .then(response => response.json())
        .then(data => {
            document.getElementById('santri-count').textContent = data.totalSantri ?? '0';
            document.getElementById('ustadz-count').textContent = data.totalUstadz;
            document.getElementById('kegiatan-count').textContent = data.totalKegiatan;
            document.getElementById('pengumuman-count').textContent = data.totalPengumuman;
            
            // Update additional stats
            document.getElementById('santri-aktif').textContent = data.santriAktif;
            document.getElementById('kelas-aktif').textContent = data.kelasAktif;
            document.getElementById('ekstra-aktif').textContent = data.ekstraAktif;
            document.getElementById('pending-daftar').textContent = data.pendingDaftar;
        })
        .catch(error => {
            console.error('Error fetching stats:', error);
        })
        ;

}

// Function to view registration details
function viewRegistration(id) {
    // In a real application, this would open a modal or redirect to detail page
    window.location.href = `/admin/pendaftaran/detail/${id}`;
}

// Auto-refresh stats every 30 seconds
setInterval(updateStats, 30000);

// Initialize tooltips and other UI enhancements
document.addEventListener('DOMContentLoaded', function() {
    // Add loading animation to cards
    const cards = document.querySelectorAll('.card-hover');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Initialize with current data
    updateStats();
});
</script>

<style>
.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    box-shadow: 0 10px 25px rgba(1, 112, 119, 0.15);
}
</style>
<?= $this->endSection() ?>