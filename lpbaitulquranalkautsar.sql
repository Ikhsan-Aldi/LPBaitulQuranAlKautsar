-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2025 at 04:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpbaitulquranalkautsar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `created_at`) VALUES
(1, 'admin', '$2y$10$sqiKyBUVF5YdJalj8A21Q..QmexOmF/EcMclLw79cQRsKO5YiGLnG', 'Administrator', '2025-10-20 04:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int NOT NULL,
  `nama_ekstrakurikuler` varchar(100) NOT NULL,
  `deskripsi` text,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pembimbing` varchar(100) DEFAULT NULL,
  `jadwal` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama_ekstrakurikuler`, `deskripsi`, `icon`, `pembimbing`, `jadwal`, `created_at`, `updated_at`) VALUES
(2, 'test', 'test', 'fas fa-swimming-pool', 'test', 'senin', '2025-10-20 16:00:02', '2025-10-21 12:06:23'),
(3, 'baru', 'baru', 'fas fa-book', 'baru', 'senin', '2025-10-21 11:37:11', '2025-10-21 12:06:15'),
(4, 'bb', 'b', 'fas fa-futbol', 'b', 'b', '2025-10-21 11:41:33', '2025-10-21 12:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `kategori` enum('kegiatan','fasilitas','prestasi') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'kegiatan',
  `gambar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gelombang_pendaftaran`
--

CREATE TABLE `gelombang_pendaftaran` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `seleksi` json DEFAULT NULL COMMENT 'Daftar jenis seleksi (misal ["Akademik","Tilawah"])',
  `jadwal_seleksi` json DEFAULT NULL COMMENT 'Jadwal tiap seleksi (misal [{"Akademik":"2025-11-01"}])',
  `metode` json DEFAULT NULL COMMENT 'Metode tiap seleksi (misal [{"Akademik":"online"},{"Tilawah":"offline"}])',
  `status` enum('dibuka','ditutup','berakhir') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'dibuka' COMMENT 'Status gelombang: dibuka, ditutup, atau berakhir',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang_pendaftaran`
--

INSERT INTO `gelombang_pendaftaran` (`id`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `seleksi`, `jadwal_seleksi`, `metode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gelombang 1 Tahun 2024', '2025-10-01', '2025-10-31', '[\"Akademik\", \"Tilawah\"]', '[\"2025-10-05\", \"2025-10-19\"]', '[\"Offline\", \"Offline\"]', 'ditutup', '2025-10-22 09:27:46', '2025-10-24 02:21:46'),
(2, 'Gelombang 2 Tahun 2024', '2025-10-02', '2025-10-30', '[\"Akademik\", \"Sholat\"]', '[\"2025-10-08\", \"2025-10-23\"]', '[\"Online\", \"Offline\"]', 'dibuka', '2025-10-24 02:51:49', '2025-10-24 02:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `deskripsi`, `tanggal`, `lokasi`, `foto`, `created_at`, `updated_at`) VALUES
(7, 'panahan', 'panahan', '2025-10-02', 'Aula', NULL, '2025-10-22 12:55:52', '2025-10-22 12:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_foto`
--

CREATE TABLE `kegiatan_foto` (
  `id_foto` int NOT NULL,
  `id_kegiatan` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan_foto`
--

INSERT INTO `kegiatan_foto` (`id_foto`, `id_kegiatan`, `file_name`, `created_at`) VALUES
(20, 7, '1761112553_e718e96e41ceaa13e1a4.jpg', '2025-10-22 12:55:53'),
(21, 7, '1761112553_4f01864fa6c0178d946a.jpg', '2025-10-22 12:55:53'),
(22, 7, '1761112553_af1bf06665b13dbddbad.jpg', '2025-10-22 12:55:53'),
(23, 7, '1761116019_beec7065627649be842d.png', '2025-10-22 13:53:39'),
(24, 7, '1761116019_2692a52a1c39e060940c.png', '2025-10-22 13:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-10-21-024205', 'App\\Database\\Migrations\\CreateGelombangPendaftaran', 'default', 'App', 1761029648, 1),
(2, '2025-10-21-080648', 'App\\Database\\Migrations\\Ekstra', 'default', 'App', 1761271795, 2),
(3, '2025-10-22-092143', 'App\\Database\\Migrations\\CreatePesan', 'default', 'App', 1761271837, 3),
(4, '2025-10-23-044833', 'App\\Database\\Migrations\\CreateGaleri', 'default', 'App', 1761271837, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `id_gelombang` int UNSIGNED DEFAULT NULL,
  `jenjang` enum('SMP','SMA') DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `asal_sekolah` varchar(150) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `alamat` text,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `no_hp_ortu` varchar(15) DEFAULT NULL,
  `ktp_ortu` varchar(255) DEFAULT NULL,
  `akta_kk` varchar(255) DEFAULT NULL,
  `surat_ket_lulus` varchar(255) DEFAULT NULL,
  `ijazah_terakhir` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Menunggu Verifikasi','Diterima','Ditolak') DEFAULT 'Menunggu Verifikasi',
  `tanggal_daftar` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_gelombang`, `jenjang`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `asal_sekolah`, `nisn`, `alamat`, `nama_ayah`, `nama_ibu`, `no_hp_ortu`, `ktp_ortu`, `akta_kk`, `surat_ket_lulus`, `ijazah_terakhir`, `foto`, `status`, `tanggal_daftar`) VALUES
(1, NULL, NULL, 'Alzamna Lentera Dipantara', 'Laki-laki', 'madiun', '2020-06-19', NULL, '12345678', 'madiun madiun madiun madiun madiun madiun madiun madiun', 'test', 'test', '09876', 'ChatGPT Image 10 Okt 2025, 16.03.56 (1).png', 'ChatGPT Image 10 Okt 2025, 16.03.56 (1)_1.png', 'ChatGPT Image 10 Okt 2025, 16.03.56 (1)_2.png', 'ChatGPT Image 10 Okt 2025, 16.03.56 (1)_3.png', 'ChatGPT Image 10 Okt 2025, 16.03.56 (1)_4.png', 'Diterima', '2025-10-20 10:36:22'),
(2, NULL, NULL, 'Hadziq', 'Laki-laki', 'Madiun', '2025-10-15', 'Mts', '8536488888', 'Madiun Madiun Madiun Madiun Madiun Madiun Madiun Madiun', 'test', 'test', '0987656789', '1761125496_898163105e7ab33730f3.png', '1761125496_f9b187c5bb542dd3b430.png', '1761125496_1e48192aa80bf8b31017.png', '1761125496_1c5444f5f0908cc9eb0b.png', '1761125496_879e739401a506401ce1.png', '', '2025-10-22 16:31:36'),
(3, 2, NULL, 'Calon Santri', 'Laki-laki', 'Ponorogo', '2025-10-15', 'SMP', '384640242000', 'Ponorogo, Ponorogo selatan, Ponorogo', 'test', 'test', '0849372482342', '1761280152_c26ddad4c733b1c5ca60.png', '1761280152_bfffbb0ceab04470012e.png', '1761280152_0648c8347128855ba5a4.png', '1761280152_0860c040f03da93ed0df.png', '1761280152_09283dab5cdc978d4180.png', 'Menunggu Verifikasi', '2025-10-24 11:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `nama_lengkap`, `nip`, `jabatan`, `no_hp`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Petugas1', '123456789', 'Guru 2', '05678998765', 'Madiun1', '1760952738_7b014b8dde60fb7eec1d.png', '2025-10-20 16:31:45', '2025-10-20 16:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subjek` enum('pendaftaran','program','beasiswa','lainnya') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'lainnya',
  `pesan` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int NOT NULL,
  `id_pendaftaran` int DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenjang` enum('SMP','SMA') DEFAULT NULL,
  `asal_sekolah` varchar(150) DEFAULT NULL,
  `alamat` text,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `no_hp_ortu` varchar(15) DEFAULT NULL,
  `ktp_ortu` varchar(255) DEFAULT NULL,
  `akta_kk` varchar(255) DEFAULT NULL,
  `surat_ket_lulus` varchar(255) DEFAULT NULL,
  `ijazah_terakhir` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Lulus','Nonaktif') DEFAULT 'Aktif',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_daftar` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id`, `id_pendaftaran`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nis`, `nisn`, `nama`, `jenjang`, `asal_sekolah`, `alamat`, `nama_ayah`, `nama_ibu`, `no_hp`, `no_hp_ortu`, `ktp_ortu`, `akta_kk`, `surat_ket_lulus`, `ijazah_terakhir`, `foto`, `status`, `created_at`, `updated_at`, `tanggal_daftar`) VALUES
(9, NULL, 'Hadziq', 'Laki-laki', 'Madiun', '2025-10-17', '655543223', '097967688', 'Hadziq', 'SMA', 'Mts', 'Madiun', 'test', 'test', '095357835', '0583585', NULL, NULL, NULL, NULL, NULL, 'Aktif', '2025-10-22 08:07:56', '2025-10-22 08:07:56', '2025-10-22 08:07:56'),
(10, NULL, 'Naufal', 'Laki-laki', 'Madiun', '2025-10-01', '45678098', '756788997597', 'Naufal', 'SMA', 'Mts', '  testing testing testing testing testing', 'test', 'test', '05678998765', '0987656789', NULL, NULL, NULL, NULL, NULL, 'Aktif', '2025-10-22 08:41:43', '2025-10-22 08:41:43', '2025-10-22 08:41:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gelombang_pendaftaran`
--
ALTER TABLE `gelombang_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_foto`
--
ALTER TABLE `kegiatan_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `fk_pendaftaran_gelombang` (`id_gelombang`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gelombang_pendaftaran`
--
ALTER TABLE `gelombang_pendaftaran`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kegiatan_foto`
--
ALTER TABLE `kegiatan_foto`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan_foto`
--
ALTER TABLE `kegiatan_foto`
  ADD CONSTRAINT `kegiatan_foto_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_pendaftaran_gelombang` FOREIGN KEY (`id_gelombang`) REFERENCES `gelombang_pendaftaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
