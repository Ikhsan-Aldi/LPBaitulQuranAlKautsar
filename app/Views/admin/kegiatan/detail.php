<?= $this->extend('admin/layout/admin_layout') ?>
<?= $this->section('content') ?>

<?php
$fotoList = [];

// Jika kolom 'foto' berisi JSON array
if (!empty($kegiatan['foto']) && is_string($kegiatan['foto'])) {
    $decoded = json_decode($kegiatan['foto'], true);
    if (is_array($decoded)) {
        $fotoList = $decoded;
    } else {
        // Jika bukan JSON, anggap satu file
        $fotoList = [$kegiatan['foto']];
    }
}

// Jika controller sudah mengirimkan foto dari tabel kegiatan_foto
if (isset($kegiatan['foto_list']) && is_array($kegiatan['foto_list'])) {
    $fotoList = array_column($kegiatan['foto_list'], 'file_name');
}
?>

<div class="space-y-4">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark font-amiri">Dokumentasi Kegiatan</h1>
            <p class="text-gray-600 mt-2">Dokumentasi kegiatan <?= esc($kegiatan['judul']) ?></p>
        </div>
        <a href="<?= base_url('admin/kegiatan'); ?>" 
           class="mt-4 md:mt-0 bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center space-x-2">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>
    <!-- Info -->
        <div class="flex items-center justify-between p-4 bg-primary/5 rounded-xl border border-primary/20">
            <div class="flex items-center space-x-2 text-primary-dark">
                <i class="fa fa-images"></i>
                <span class="text-sm font-medium">Total <?= count($fotoList) ?> foto dokumentasi</span>
            </div>
            <button onclick="openGallery()" 
                    class="text-primary hover:text-primary-dark text-sm font-medium flex items-center space-x-1 transition-colors duration-200">
                <i class="fa fa-expand"></i>
                <span>Buka Galeri</span>
            </button>
        </div>
    <?php if (!empty($fotoList)): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <?php foreach ($fotoList as $index => $foto): 
                // Pastikan path gambar valid
                $fotoPath = base_url('uploads/kegiatan/' . basename($foto));
            ?>
                <div class="group relative bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <!-- Image -->
                    <div class="aspect-w-16 aspect-h-12 bg-gray-100 overflow-hidden">
                        <img src="<?= $fotoPath ?>" 
                             alt="Dokumentasi <?= esc($kegiatan['judul']) ?> - <?= $index + 1 ?>"
                             onerror="this.src='<?= base_url('uploads/default.jpg') ?>';"
                             class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    
                    <!-- Overlay on Hover -->
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <div class="flex space-x-3">
                            <button onclick="viewImage('<?= $fotoPath ?>', '<?= esc($kegiatan['judul']) ?> - <?= $index + 1 ?>')"
                                    class="bg-white text-primary p-2 rounded-full shadow-lg transform hover:scale-110 transition-all duration-200 tooltip"
                                    data-tooltip="Lihat Gambar">
                                <i class="fa fa-search-plus text-sm"></i>
                            </button>
                            <a href="<?= $fotoPath ?>" 
                               download="dokumentasi-<?= esc($kegiatan['judul']) ?>-<?= $index + 1 ?>.jpg"
                               class="bg-white text-primary p-2 rounded-full shadow-lg transform hover:scale-110 transition-all duration-200 tooltip"
                               data-tooltip="Download Gambar">
                                <i class="fa fa-download text-sm"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="absolute top-3 left-3 bg-primary text-white px-2 py-1 rounded-full text-xs font-medium shadow-lg">
                        #<?= $index + 1 ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-12 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-300">
            <div class="text-gray-400 text-5xl mb-4">
                <i class="fa fa-camera"></i>
            </div>
            <h4 class="text-lg font-medium text-gray-600 mb-2">Belum ada foto dokumentasi</h4>
            <p class="text-gray-500 text-sm max-w-md mx-auto">
                Dokumentasi kegiatan akan ditampilkan di sini setelah foto diupload
            </p>
        </div>
    <?php endif; ?>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center p-4 z-50 hidden">
    <div class="max-w-6xl w-full max-h-full">
        <div class="flex justify-between items-center mb-4">
            <h4 class="text-white text-lg font-semibold" id="imageTitle"></h4>
            <div class="flex items-center space-x-3">
                <!-- Download Button in Modal -->
                <a id="downloadLink" 
                   class="text-white hover:text-gray-300 transition-colors duration-200 tooltip"
                   data-tooltip="Download Gambar">
                    <i class="fa fa-download text-xl"></i>
                </a>
                <!-- Close Button -->
                <button onclick="closeImage()" class="text-white hover:text-gray-300 text-2xl transition-colors duration-200">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden">
            <img id="modalImage" src="" alt="" class="w-full max-h-[80vh] object-contain">
        </div>
        
        <!-- Navigation for Gallery Mode -->
        <div id="galleryNav" class="hidden mt-4 flex items-center justify-between">
            <button onclick="navigateGallery(-1)" 
                    class="bg-white text-primary p-3 rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-200">
                <i class="fa fa-chevron-left"></i>
            </button>
            <span class="text-white text-sm font-medium" id="galleryCounter"></span>
            <button onclick="navigateGallery(1)" 
                    class="bg-white text-primary p-3 rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-200">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

<script>
let currentGalleryIndex = 0;
const fotoList = <?= json_encode($fotoList) ?>;

function viewImage(src, title) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imageTitle').textContent = title;
    document.getElementById('downloadLink').href = src;
    document.getElementById('downloadLink').download = title + '.jpg';
    document.getElementById('galleryNav').classList.add('hidden');
    document.getElementById('imageModal').classList.remove('hidden');
}

function openGallery() {
    if (fotoList.length > 0) {
        currentGalleryIndex = 0;
        showGalleryImage(currentGalleryIndex);
        document.getElementById('galleryNav').classList.remove('hidden');
        document.getElementById('imageModal').classList.remove('hidden');
    }
}

function showGalleryImage(index) {
    const foto = fotoList[index];
    const src = '<?= base_url('uploads/kegiatan/') ?>' + encodeURIComponent(foto);
    const title = '<?= esc($kegiatan['judul']) ?> - ' + (index + 1);
    document.getElementById('modalImage').src = src;
    document.getElementById('imageTitle').textContent = title;
    document.getElementById('downloadLink').href = src;
    document.getElementById('downloadLink').download = title + '.jpg';
    document.getElementById('galleryCounter').textContent = (index + 1) + ' / ' + fotoList.length;
    currentGalleryIndex = index;
}

function navigateGallery(dir) {
    let newIndex = currentGalleryIndex + dir;
    if (newIndex < 0) newIndex = fotoList.length - 1;
    if (newIndex >= fotoList.length) newIndex = 0;
    showGalleryImage(newIndex);
}
function closeImage() { document.getElementById('imageModal').classList.add('hidden'); }
document.getElementById('imageModal').addEventListener('click', e => { if (e.target === e.currentTarget) closeImage(); });
</script>


<style>
.aspect-w-16 {
    position: relative;
}

.aspect-w-16::before {
    content: '';
    display: block;
    padding-bottom: 75%; /* 4:3 aspect ratio */
}

.aspect-w-16 > * {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.group:hover .group-hover\:scale-105 {
    transform: scale(1.05);
}

.tooltip {
    position: relative;
}

/* Smooth transitions */
.transition-all {
    transition-property: all;
}

.duration-300 {
    transition-duration: 300ms;
}

/* Custom scrollbar for modal */
#imageModal img {
    scrollbar-width: thin;
    scrollbar-color: rgba(255,255,255,0.3) transparent;
}

#imageModal img::-webkit-scrollbar {
    width: 6px;
}

#imageModal img::-webkit-scrollbar-track {
    background: transparent;
}

#imageModal img::-webkit-scrollbar-thumb {
    background-color: rgba(255,255,255,0.3);
    border-radius: 3px;
}
</style>

<?= $this->endSection() ?>