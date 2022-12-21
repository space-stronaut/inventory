-- --------------------------------------------------------
-- Host:                         host.docker.internal
-- Server version:               8.0.31 - MySQL Community Server - GPL
-- Server OS:                    Linux
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventory
CREATE DATABASE IF NOT EXISTS `inventory` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `inventory`;

-- Dumping structure for table inventory.alats
CREATE TABLE IF NOT EXISTS `alats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_alat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_jual_terakhir` date DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.alats: ~0 rows (approximately)

-- Dumping structure for table inventory.bahans
CREATE TABLE IF NOT EXISTS `bahans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_jual_terakhir` date DEFAULT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.bahans: ~0 rows (approximately)
INSERT INTO `bahans` (`id`, `kode_bahan`, `nama_bahan`, `satuan`, `stok`, `harga_beli`, `harga_jual`, `tanggal_beli`, `tanggal_jual_terakhir`, `jenis`, `created_at`, `updated_at`) VALUES
	(1, 'KD001', 'Baygon', 'gr', 25, 10000, 20000, '2022-12-20', '2022-12-20', 'Obat', '2022-12-20 09:51:26', '2022-12-20 09:54:20'),
	(2, 'KD002', 'Kopi', 'gr', 55, 2000, 3000, '2022-12-20', '2022-12-21', 'Minuman', '2022-12-20 15:52:02', '2022-12-21 04:08:20');

-- Dumping structure for table inventory.detail_pemesanans
CREATE TABLE IF NOT EXISTS `detail_pemesanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pemesanan` bigint unsigned NOT NULL,
  `durasi_pemakaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bahan` bigint unsigned NOT NULL,
  `harga_beli` int NOT NULL,
  `jumlah_barang` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_pemesanans_id_pemesanan_foreign` (`id_pemesanan`),
  KEY `detail_pemesanans_id_bahan_foreign` (`id_bahan`),
  CONSTRAINT `detail_pemesanans_id_bahan_foreign` FOREIGN KEY (`id_bahan`) REFERENCES `bahans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pemesanans_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.detail_pemesanans: ~5 rows (approximately)
INSERT INTO `detail_pemesanans` (`id`, `id_pemesanan`, `durasi_pemakaian`, `id_bahan`, `harga_beli`, `jumlah_barang`, `created_at`, `updated_at`) VALUES
	(1, 1, '5 Hari', 1, 40000, 2, '2022-12-20 09:52:15', '2022-12-20 09:52:15'),
	(2, 3, '7 Hari', 1, 440000, 22, '2022-12-20 09:54:20', '2022-12-20 09:54:20'),
	(3, 3, '2 Hari', 1, 20000, 1, '2022-12-20 09:54:20', '2022-12-20 09:54:20'),
	(4, 4, '2 Hari', 2, 66000, 22, '2022-12-20 15:52:54', '2022-12-20 15:52:54'),
	(5, 5, '1 Hari', 2, 9000, 3, '2022-12-21 04:08:20', '2022-12-21 04:08:20');

-- Dumping structure for table inventory.detail_peminjamans
CREATE TABLE IF NOT EXISTS `detail_peminjamans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.detail_peminjamans: ~0 rows (approximately)

-- Dumping structure for table inventory.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table inventory.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.migrations: ~10 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_12_07_053759_create_bahans_table', 1),
	(6, '2022_12_07_054229_create_alats_table', 1),
	(7, '2022_12_07_054425_create_pemesanans_table', 1),
	(8, '2022_12_08_041637_create_detail_pemesanans_table', 1),
	(9, '2022_12_09_032143_create_peminjamans_table', 1),
	(10, '2022_12_09_032237_create_detail_peminjamans_table', 1);

-- Dumping structure for table inventory.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.password_resets: ~0 rows (approximately)

-- Dumping structure for table inventory.pemesanans
CREATE TABLE IF NOT EXISTS `pemesanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pengguna` bigint unsigned NOT NULL,
  `id_petugas` bigint unsigned NOT NULL,
  `tanggal_beli` date NOT NULL,
  `status` enum('menunggu pembayaran','dibayar','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pemesanans_id_pengguna_foreign` (`id_pengguna`),
  KEY `pemesanans_id_petugas_foreign` (`id_petugas`),
  CONSTRAINT `pemesanans_id_pengguna_foreign` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pemesanans_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.pemesanans: ~5 rows (approximately)
INSERT INTO `pemesanans` (`id`, `id_pengguna`, `id_petugas`, `tanggal_beli`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, '2022-12-20', 'selesai', '2022-12-20 09:52:14', '2022-12-21 06:40:29'),
	(2, 2, 1, '2022-12-20', 'selesai', '2022-12-20 09:54:04', '2022-12-21 13:29:18'),
	(3, 2, 1, '2022-12-20', 'menunggu pembayaran', '2022-12-20 09:54:20', '2022-12-20 09:54:20'),
	(4, 2, 1, '2022-12-20', 'menunggu pembayaran', '2022-12-20 15:52:54', '2022-12-20 15:52:54'),
	(5, 2, 1, '2022-12-21', 'menunggu pembayaran', '2022-12-21 04:08:20', '2022-12-21 04:08:20');

-- Dumping structure for table inventory.peminjamans
CREATE TABLE IF NOT EXISTS `peminjamans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.peminjamans: ~0 rows (approximately)

-- Dumping structure for table inventory.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table inventory.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `shift_petugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('petugas','pengguna','kepala_lab') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table inventory.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `no_hp`, `gender`, `alamat`, `shift_petugas`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Petugas1', '089501860576', NULL, NULL, 'malam', 'petugas', 'petugas1@petugas.com', NULL, '$2y$10$PFYW3I.VSuLBezXYI5l7bu2V7nZE0EdDF4BP3pSk3mZlKC/E/wXRO', 'U54M6pZhJlrsJ3utVGue3OdhaLwoT60UNgpQrtcWq0QJ2328gtiWh9WlpWD1', '2022-12-13 03:47:11', '2022-12-13 03:47:11'),
	(2, 'Pengguna1', '089501860575', 'L', 'Subang', NULL, 'pengguna', 'pengguna1@pengguna.com', NULL, '$2y$10$FEwiTUCk4ter3zPBThK4feMaPvForzt6UBN0C505dmODnw41hvDYi', NULL, '2022-12-13 03:47:31', '2022-12-13 03:47:31'),
	(3, 'Kepala1', '089501860575', 'L', 'Subang', NULL, 'kepala_lab', 'kepala1@kepala.com', NULL, '$2y$10$BxrvzEDgOl6r34zFHL.vC.hw8cKLIcl5e5.YGDQnS919rySG7bO9G', NULL, '2022-12-20 15:32:01', '2022-12-20 15:32:01');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
