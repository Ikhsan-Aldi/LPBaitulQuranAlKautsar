-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2025 at 07:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `created_at`) VALUES
(1, 'admin', '$2y$10$sqiKyBUVF5YdJalj8A21Q..QmexOmF/EcMclLw79cQRsKO5YiGLnG', 'Administrator', '2025-10-20 04:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `excerpt` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `slug`, `isi`, `excerpt`, `foto`, `penulis`, `created_at`, `updated_at`) VALUES
(1, 'Tahun 2026 Akan Membuka Pendafataran 2 Gelombang', 'tahun-2026-akan-membuka-pendafataran-2-gelombang', '<p class=\"ql-align-justify\"><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ante augue, convallis et augue et, viverra vestibulum purus. Maecenas at condimentum urna. Sed id urna in nibh euismod elementum. Sed aliquet vitae nisi ac ornare. Ut vulputate elementum sem, vel maximus libero dapibus feugiat. Donec suscipit orci at nunc consequat faucibus. Duis odio ligula, gravida id vestibulum a, interdum fermentum nisl. Phasellus purus odio, eleifend eget hendrerit nec, bibendum id ex.</span></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Phasellus efficitur vestibulum diam, quis rutrum nisl pulvinar vel. Maecenas faucibus ut erat eu scelerisque. Fusce condimentum tortor dolor, a hendrerit dolor feugiat sit amet. Vivamus mi quam, dignissim a consequat sed, varius vitae ex. Morbi blandit ipsum luctus dolor cursus, eu lobortis purus vestibulum. Duis facilisis viverra diam ut volutpat. Nulla nec leo libero. Nullam sed est lorem. Vestibulum tristique lectus non dui scelerisque, et maximus ligula semper. Sed sollicitudin posuere dignissim. Sed posuere sagittis mi, et dapibus elit rhoncus vel. Sed volutpat elementum laoreet. Duis venenatis enim metus, a eleifend lacus tincidunt ac.</span></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Suspendisse egestas pharetra nulla nec varius. Nam nisi arcu, scelerisque in odio eget, tincidunt viverra leo. Mauris neque enim, condimentum at nunc eget, aliquam lobortis dolor. Aliquam rutrum, ligula vitae fermentum dignissim, elit erat malesuada felis, sed ornare mauris eros vitae mi. Praesent ac mollis risus, quis accumsan neque. Nulla massa quam, mollis a dui in, tempor aliquam metus. Vestibulum nec vestibulum justo. Nunc a nunc sit amet leo tempus pulvinar quis non sem. Proin vel lacus faucibus, lacinia ipsum in, malesuada ipsum. Vivamus sit amet enim dolor. Sed faucibus dignissim odio, consectetur volutpat dolor gravida sollicitudin.</span></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Duis nulla purus, imperdiet at eros quis, consectetur ornare velit. Phasellus mattis libero vel purus tincidunt, a porta lectus aliquam. Nam scelerisque fringilla ornare. Pellentesque venenatis facilisis est, at egestas neque congue quis. Sed mollis nec libero aliquam hendrerit. Duis dui ante, feugiat in semper ac, scelerisque quis magna. Mauris non orci et arcu semper pulvinar. Curabitur sagittis auctor justo, vitae vulputate orci vehicula in. Ut bibendum felis est, vel bibendum magna consectetur sit amet. In sollicitudin velit vitae orci maximus, et condimentum mauris efficitur. Cras maximus dolor nec mauris posuere dictum. Nunc lectus risus, sagittis at erat id, blandit bibendum metus. Aliquam ut auctor lectus. Nullam augue odio, malesuada sit amet bibendum in, tincidunt nec metus. Quisque egestas vel arcu id tempus.</span></p><p class=\"ql-align-justify\"><span style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Quisque pellentesque, elit id laoreet consequat, ipsum neque vestibulum mi, ut sollicitudin mi nibh id arcu. Morbi sed orci ligula. Ut molestie, risus non convallis varius, erat urna efficitur sem, sed sollicitudin quam elit non risus. Praesent massa ligula, vehicula ac lacinia non, eleifend in dolor. Duis quis risus sed nisi eleifend consequat eget in lectus. Nullam blandit faucibus sapien, nec cursus tellus malesuada eu. Proin at augue lacus.</span></p><p><br></p>', '<h4 class=\"ql-align-center\"><em style=\"background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);\">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</em></h4>', '1761366592_32a87e107edc51152d3d.jpeg', 'Admin', '2025-10-25 04:29:52', '2025-10-25 04:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int(11) NOT NULL,
  `nama_ekstrakurikuler` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `pembimbing` varchar(100) DEFAULT NULL,
  `jadwal` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` enum('kegiatan','fasilitas','prestasi') NOT NULL DEFAULT 'kegiatan',
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `deskripsi`, `kategori`, `gambar`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AL-Bahjah', 'Pondok Albahjah', 'fasilitas', '1761289041_f82c66db2f92c06af461.jpg', '2025-10-24', 'aktif', '2025-10-24 06:57:21', '2025-10-25 05:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `gelombang_pendaftaran`
--

CREATE TABLE `gelombang_pendaftaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `seleksi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Daftar jenis seleksi (misal ["Akademik","Tilawah"])' CHECK (json_valid(`seleksi`)),
  `jadwal_seleksi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Jadwal tiap seleksi (misal [{"Akademik":"2025-11-01"}])' CHECK (json_valid(`jadwal_seleksi`)),
  `metode` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Metode tiap seleksi (misal [{"Akademik":"online"},{"Tilawah":"offline"}])' CHECK (json_valid(`metode`)),
  `status` enum('dibuka','ditutup','berakhir') NOT NULL DEFAULT 'dibuka' COMMENT 'Status gelombang: dibuka, ditutup, atau berakhir',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelombang_pendaftaran`
--

INSERT INTO `gelombang_pendaftaran` (`id`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `seleksi`, `jadwal_seleksi`, `metode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gelombang 1 Tahun 2024', '2025-10-01', '2025-10-31', '[\"Akademik\", \"Tilawah\"]', '[\"2025-10-05\", \"2025-10-19\"]', '[\"Offline\", \"Offline\"]', 'ditutup', '2025-10-22 09:27:46', '2025-10-24 02:21:46'),
(2, 'Gelombang 2 Tahun 2024', '2025-10-02', '2025-10-30', '[\"Akademik\", \"Sholat\"]', '[\"2025-10-08\", \"2025-10-23\"]', '[\"Online\", \"Offline\"]', 'dibuka', '2025-10-24 02:51:49', '2025-10-24 02:51:49'),
(3, 'Gelombang 1 2023', '2025-10-01', '2025-10-31', '[\"Akademik\",\"Tilawah\",\"Wawancara\"]', '[\"2025-10-01\",\"2025-10-02\",\"2025-10-03\"]', '[\"Online\",\"Offline\",\"Offline\"]', 'berakhir', '2025-10-24 09:20:59', '2025-10-24 09:20:59'),
(4, 'Gelombang 2 2023', '2025-10-01', '2025-10-31', '[\"Akademik\",\"Tilawah\"]', '[\"2025-10-01\",\"2025-10-02\"]', '[\"Online\",\"Online\"]', 'ditutup', '2025-10-24 09:21:52', '2025-10-24 09:21:52'),
(5, 'Gelombang 2 2022', '2022-07-01', '2022-12-30', '[\"Akademik\",\"Tilawah\"]', '[\"2022-08-01\",\"2022-12-25\"]', '[\"Offline\",\"Offline\"]', 'berakhir', '2025-10-24 09:23:45', '2025-10-24 09:23:45'),
(6, 'Gelombang 1 2022', '2022-01-01', '2022-06-30', '[\"Akademik\",\"Tilawah\"]', '[\"2022-02-24\",\"2022-05-24\"]', '[\"Online\",\"Online\"]', 'ditutup', '2025-10-24 09:25:46', '2025-10-24 09:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `deskripsi`, `tanggal`, `lokasi`, `foto`, `created_at`, `updated_at`) VALUES
(8, 'Studi banding ke Al-Bahjah', 'Kegiatan Studi Banding Ke Pondok Al-Bahjah', '2025-10-14', 'Aula', NULL, '2025-10-25 12:00:18', '2025-10-25 12:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_foto`
--

CREATE TABLE `kegiatan_foto` (
  `id_foto` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan_foto`
--

INSERT INTO `kegiatan_foto` (`id_foto`, `id_kegiatan`, `file_name`, `created_at`) VALUES
(25, 8, '1761368418_2f0ec8154ef73f3d7c23.jpg', '2025-10-25 12:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(10) UNSIGNED NOT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `tiktok` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `telepon`, `whatsapp`, `email`, `facebook`, `instagram`, `tiktok`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '+6281234002350', '+6281234002350', 'info@alkautsar.sch.id', '', 'https://www.instagram.com/alkautsar_madiun', '', 'Jl. Ring Road Barat - Kel.Manguharjo Kec.Manguharjo, Kota Madiun, Jawa Timur', '2025-10-24 06:13:32', '2025-10-24 09:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-10-21-024205', 'App\\Database\\Migrations\\CreateGelombangPendaftaran', 'default', 'App', 1761029648, 1),
(2, '2025-10-21-080648', 'App\\Database\\Migrations\\Ekstra', 'default', 'App', 1761271795, 2),
(3, '2025-10-22-092143', 'App\\Database\\Migrations\\CreatePesan', 'default', 'App', 1761271837, 3),
(4, '2025-10-23-044833', 'App\\Database\\Migrations\\CreateGaleri', 'default', 'App', 1761271837, 3),
(5, '2025-10-24-054006', 'App\\Database\\Migrations\\CreateKontakTable', 'default', 'App', 1761284548, 4),
(6, '2025-10-24-094203', 'App\\Database\\Migrations\\AddStatusToPesan', 'default', 'App', 1761298952, 5),
(7, '2025-10-25-041655', 'App\\Database\\Migrations\\CreateBeritaTable', 'default', 'App', 1761366411, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_gelombang` int(10) UNSIGNED DEFAULT NULL,
  `jenjang` enum('SMP','SMA') DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `asal_sekolah` varchar(150) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `no_hp_ortu` varchar(15) DEFAULT NULL,
  `ktp_ortu` varchar(255) DEFAULT NULL,
  `akta_kk` varchar(255) DEFAULT NULL,
  `surat_ket_lulus` varchar(255) DEFAULT NULL,
  `ijazah_terakhir` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Menunggu Verifikasi','Diterima','Ditolak') DEFAULT 'Menunggu Verifikasi',
  `tanggal_daftar` datetime DEFAULT current_timestamp()
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
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `id` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `subjek` enum('pendaftaran','program','beasiswa','lainnya') NOT NULL DEFAULT 'lainnya',
  `pesan` text NOT NULL,
  `status` enum('belum_dibaca','dibaca') NOT NULL DEFAULT 'belum_dibaca',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama_lengkap`, `email`, `telepon`, `subjek`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asasa', 'asas@ok.com', '09129212211', 'pendaftaran', 'adadada', 'belum_dibaca', '2025-10-24 06:51:10', '2025-10-24 06:51:10'),
(2, 'asasas llsasa', 'asasa@gmai.com', '081281812121', 'program', 'okeasaasasa', 'belum_dibaca', '2025-10-24 08:17:40', '2025-10-24 08:17:40'),
(3, 'halo', 'halo@oke.com', '012891189211221', 'program', 'halosadadadsad', 'belum_dibaca', '2025-10-24 08:18:35', '2025-10-24 08:18:35'),
(4, 'Aldi', 'aldi@oke.com', '081223843', 'pendaftaran', 'okemasku', 'belum_dibaca', '2025-10-24 08:20:28', '2025-10-24 08:20:28'),
(5, 'tes', 'tes@tes.com', '0111111332', 'program', 'okebos', 'dibaca', '2025-10-24 08:24:36', '2025-10-25 04:57:15'),
(6, 'aldi', 'aldi@oke.com', '09828283', 'beasiswa', 'haigays', 'dibaca', '2025-10-24 11:02:36', '2025-10-25 04:52:44'),
(7, 'aldiii', 'aldiii@oke.com', '088128182121', 'beasiswa', 'halos', 'dibaca', '2025-10-25 04:13:03', '2025-10-25 04:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) NOT NULL,
  `id_pendaftaran` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenjang` enum('SMP','SMA') DEFAULT NULL,
  `asal_sekolah` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
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
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_daftar` datetime DEFAULT current_timestamp()
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
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `slug` (`slug`);

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
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gelombang_pendaftaran`
--
ALTER TABLE `gelombang_pendaftaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kegiatan_foto`
--
ALTER TABLE `kegiatan_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
