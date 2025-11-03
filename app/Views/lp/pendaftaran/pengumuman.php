<div class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-center mb-6 text-primary-dark">Cek Pengumuman Pendaftaran</h1>

    <form action="<?= base_url('pendaftaran/pengumuman') ?>" method="post" class="mb-6">
        <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>"
               placeholder="Masukkan Nama Lengkap atau NISN"
               class="w-full p-3 border rounded-xl focus:ring focus:ring-primary-light">
        <button type="submit" class="mt-3 w-full bg-primary text-white py-2 rounded-xl hover:bg-primary-dark transition">
            Cek Hasil
        </button>
    </form>

    <?php if (isset($pendaftar) && $pendaftar): ?>
        <div class="bg-white shadow-lg rounded-xl p-6 text-center">
            <h2 class="text-xl font-semibold mb-2"><?= esc($pendaftar['nama_lengkap']) ?></h2>
            <p class="text-gray-600 mb-2">Gelombang: <strong><?= esc($pendaftar['nama_gelombang'] ?? '-') ?></strong></p>
            <p class="text-gray-600 mb-4">Jenjang: <strong><?= esc($pendaftar['jenjang']) ?></strong></p>

            <?php if ($pendaftar['status'] === 'Diterima'): ?>
                <div class="bg-green-100 text-green-700 font-semibold py-3 px-4 rounded-lg mb-4">
                    🎉 Selamat! Anda diterima pada Gelombang <?= esc($pendaftar['nama_gelombang'] ?? '-') ?>.
                </div>
                <!-- Tombol download PDF -->
                <a href="<?= base_url('pendaftaran/pengumuman-pdf/' . $pendaftar['id_pendaftaran']) ?>" 
                   class="inline-block mt-2 bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-dark transition">
                    📄 Download PDF Pengumuman
                </a>
            <?php elseif ($pendaftar['status'] === 'Ditolak'): ?>
                <div class="bg-red-100 text-red-700 font-semibold py-3 px-4 rounded-lg mb-4">
                    😔 Maaf, Anda belum diterima pada Gelombang <?= esc($pendaftar['nama_gelombang'] ?? '-') ?>.
                </div>
            <?php else: ?>
                <div class="bg-yellow-100 text-yellow-700 font-semibold py-3 px-4 rounded-lg mb-4">
                    ⏳ Status Anda masih dalam proses verifikasi. Silakan cek kembali nanti.
                </div>
            <?php endif; ?>
        </div>
    <?php elseif (isset($keyword)): ?>
        <p class="text-center text-red-500 font-medium mt-4">Data tidak ditemukan. Periksa kembali nama atau NISN Anda.</p>
    <?php endif; ?>
</div>
