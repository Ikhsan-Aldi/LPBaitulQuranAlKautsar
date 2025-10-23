<?= $this->extend('admin/layout/admin_layout') ?>

<?= $this->section('content') ?>
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Detail Pesan</h1>
            <p class="text-gray-600 mt-2">Informasi lengkap pesan dari pengunjung</p>
        </div>
        <div class="flex space-x-3 mt-4 md:mt-0">
            <a href="<?= base_url('admin/pesan') ?>" 
               class="bg-gray-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-gray-600 transition-colors duration-200 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>

    <!-- Notifikasi -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex justify-between items-center">
            <div>
                <i class="fas fa-check-circle mr-2"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
            <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    <?php endif; ?>

    <!-- Detail Pesan -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informasi Pengirim -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-primary-dark mb-4 flex items-center">
                    <i class="fas fa-user-circle mr-2"></i>Informasi Pengirim
                </h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-center mb-6">
                        <div class="bg-primary text-white rounded-full w-20 h-20 flex items-center justify-center text-2xl font-bold">
                            <?= strtoupper(substr($pesan['nama_lengkap'], 0, 1)) ?>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                        <p class="text-primary-dark font-medium"><?= esc($pesan['nama_lengkap']) ?></p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                        <p class="text-gray-900"><?= esc($pesan['email']) ?></p>
                    </div>
                    
                    <?php if ($pesan['telepon']): ?>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Telepon</label>
                        <p class="text-gray-900"><?= esc($pesan['telepon']) ?></p>
                    </div>
                    <?php endif; ?>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Subjek</label>
                        <?php 
                        $badge_class = [
                            'pendaftaran' => 'bg-blue-100 text-blue-800',
                            'program' => 'bg-green-100 text-green-800',
                            'beasiswa' => 'bg-yellow-100 text-yellow-800',
                            'lainnya' => 'bg-gray-100 text-gray-800'
                        ];
                        $status_class = $badge_class[$pesan['subjek']] ?? 'bg-gray-100 text-gray-800';
                        ?>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?= $status_class ?>">
                            <?= ucfirst($pesan['subjek']) ?>
                        </span>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Kirim</label>
                        <p class="text-gray-900">
                            <?= date('d F Y', strtotime($pesan['created_at'])) ?>
                            <span class="text-gray-500 text-sm"><?= date('H:i', strtotime($pesan['created_at'])) ?> WIB</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Isi Pesan -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-bold text-primary-dark mb-4 flex items-center">
                    <i class="fas fa-envelope mr-2"></i>Isi Pesan
                </h3>
                
                <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-line"><?= esc($pesan['pesan']) ?></p>
                </div>
                
                <!-- Quick Actions -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h4 class="text-md font-semibold text-primary-dark mb-3">Tindakan Cepat</h4>
                    <div class="flex flex-wrap gap-3">
                        <button onclick="balasEmail('<?= esc($pesan['email']) ?>', '<?= esc($pesan['subjek']) ?>', '<?= esc($pesan['nama_lengkap']) ?>')" 
                           class="bg-blue-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                            <i class="fas fa-reply mr-2"></i>Balas via Gmail
                        </button>
                        
                        <button onclick="balasEmailWithTemplate('<?= esc($pesan['email']) ?>', '<?= esc($pesan['subjek']) ?>', '<?= esc($pesan['nama_lengkap']) ?>')" 
                           class="bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors duration-200 flex items-center">
                            <i class="fas fa-envelope mr-2"></i>Template Balasan
                        </button>
                        
                        <?php if ($pesan['telepon']): ?>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $pesan['telepon']) ?>?text=Halo%20<?= urlencode($pesan['nama_lengkap']) ?>%2C%20terima%20kasih%20telah%20menghubungi%20kami." 
                           target="_blank"
                           class="bg-green-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center">
                            <i class="fab fa-whatsapp mr-2"></i>Chat WhatsApp
                        </a>
                        <?php endif; ?>
                        
                        <a href="<?= base_url('admin/pesan/hapus/' . $pesan['id']) ?>" 
                           class="bg-red-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-red-700 transition-colors duration-200 flex items-center"
                           onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                            <i class="fas fa-trash mr-2"></i>Hapus Pesan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Fungsi untuk membuka Gmail dengan template balasan standar
function balasEmail(email, subjekAsli, namaPengirim) {
    // Format subjek untuk balasan
    const subjekBalasan = `Balas: ${subjekAsli}`;
    
    // Format body email dengan template yang profesional
    const bodyEmail = `Halo ${namaPengirim},

Terima kasih telah menghubungi kami melalui form kontak website.

%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A
---%0D%0A
Pesan asli:%0D%0A
Subjek: ${subjekAsli}%0D%0A
Dari: ${namaPengirim} (${email})`;

    // Encode URI components untuk URL Gmail
    const encodedSubjek = encodeURIComponent(subjekBalasan);
    const encodedBody = bodyEmail;

    // Membuat URL Gmail
    const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${email}&su=${encodedSubjek}&body=${encodedBody}`;
    
    // Buka jendela baru untuk Gmail
    window.open(gmailUrl, '_blank');
}

// Fungsi untuk template balasan yang lebih lengkap
function balasEmailWithTemplate(email, subjekAsli, namaPengirim) {
    // Format subjek untuk balasan
    const subjekBalasan = `Balas: ${subjekAsli}`;
    
    // Template balasan yang lebih lengkap
    const bodyEmail = `Kepada Yth. ${namaPengirim},

Terima kasih telah menghubungi kami melalui form kontak website. Kami telah menerima pesan Anda dengan detail sebagai berikut:

%0D%0A%0D%0A
---%0D%0A
Subjek: ${subjekAsli}%0D%0A
Email: ${email}%0D%0A
Tanggal: <?= date('d F Y H:i', strtotime($pesan['created_at'])) ?> WIB%0D%0A
---%0D%0A%0D%0A

Kami akan menindaklanjuti pertanyaan/permohonan Anda secepatnya. Biasanya kami memberikan respon dalam waktu 1-2 hari kerja.

%0D%0A%0D%0A
Hormat kami,%0D%0A
[Tim Admin]%0D%0A
[Nama Institusi/Perusahaan]%0D%0A
[No. Telepon]%0D%0A
[Alamat Email]`;

    // Encode URI components untuk URL Gmail
    const encodedSubjek = encodeURIComponent(subjekBalasan);
    const encodedBody = bodyEmail;

    // Membuat URL Gmail
    const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${email}&su=${encodedSubjek}&body=${encodedBody}`;
    
    // Buka jendela baru untuk Gmail
    window.open(gmailUrl, '_blank');
}

// Fungsi untuk copy email address ke clipboard
function salinEmail(email) {
    navigator.clipboard.writeText(email).then(function() {
        // Tampilkan notifikasi sukses
        alert('Email berhasil disalin: ' + email);
    }).catch(function(err) {
        // Fallback untuk browser lama
        const textArea = document.createElement("textarea");
        textArea.value = email;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('Email berhasil disalin: ' + email);
    });
}
</script>

<style>
/* Style untuk tombol */
button:hover {
    transform: translateY(-1px);
    transition: all 0.2s ease;
}

/* Style untuk card */
.bg-white {
    transition: box-shadow 0.3s ease;
}

.bg-white:hover {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}
</style>
<?= $this->endSection() ?>