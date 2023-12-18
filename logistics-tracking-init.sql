# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 8.0.32)
# Database: laravel
# Generation Time: 2023-12-16 04:16:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

USE laravel;

# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
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



# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locations_address_unique` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `title`, `city`, `address`, `created_at`, `updated_at`)
VALUES
	(1,'台北物流中心','台北市','台北市中正區忠孝東路100號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(2,'新竹物流中心','新竹市','新竹市東區光復路一段101號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(3,'台中物流中心','台中市','台中市西區民生路200號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(4,'桃園物流中心','桃園市','桃園市中壢區中央西路三段150號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(5,'高雄物流中心','高雄市','高雄市前金區成功一路82號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(6,'彰化物流中心','彰化市','彰化市中山路二段250號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(7,'嘉義物流中心','嘉義市','嘉義市東區民族路380號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(8,'宜蘭物流中心','宜蘭市','宜蘭市中山區二段56號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(9,'屏東物流中心','屏東市','屏東市民生路300號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(10,'花蓮物流中心','花蓮市','花蓮市國聯一路100號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(11,'台南物流中心','台南市','台南市安平區建平路18號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(12,'南投物流中心','南投市','南投市自由路67號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(13,'雲林物流中心','雲林市','雲林市中正路五段120號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(14,'基隆物流中心','基隆市','基隆市信一路50號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(15,'澎湖物流中心','澎湖縣','澎湖縣馬公市中正路200號','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(16,'金門物流中心','金門縣','金門縣金城鎮民生路90號','2023-12-16 04:14:57','2023-12-16 04:14:57');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table logistics_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `logistics_items`;

CREATE TABLE `logistics_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `status` tinyint unsigned NOT NULL,
  `location_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table logistics_orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `logistics_orders`;

CREATE TABLE `logistics_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sno` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '物流編號',
  `tracking_status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '物流狀態',
  `estimated_delivery` date NOT NULL COMMENT '預計送達日期',
  `current_location_id` bigint unsigned NOT NULL COMMENT '包裹目前位置id',
  `recipient_id` bigint unsigned NOT NULL COMMENT '收件者id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `logistics_orders_sno_unique` (`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
	(5,'2023_12_02_033933_create_locations_table',1),
	(6,'2023_12_02_034234_create_recipients_table',1),
	(7,'2023_12_02_042507_create_logistics_orders_table',1),
	(8,'2023_12_02_044342_create_logistics_items_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_reset_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table recipients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `recipients`;

CREATE TABLE `recipients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `recipients` WRITE;
/*!40000 ALTER TABLE `recipients` DISABLE KEYS */;

INSERT INTO `recipients` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`)
VALUES
	(1,'賴小賴','台北市中正區仁愛路二段99號','091234567','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(2,'陳大明','新北市板橋區文化路一段100號','092345678','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(3,'林小芳','台中市西區民生路200號','093456789','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(4,'張美玲','高雄市前金區成功路一段82號','094567890','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(5,'王小明','台南市安平區建平路18號','095678901','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(6,'劉大華','新竹市東區光復路一段101號','096789012','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(7,'黃小琳','彰化市中山路二段250號','097890123','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(8,'吳美美','花蓮市國聯一路100號','098901234','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(9,'蔡小虎','屏東市民生路300號','099012345','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(10,'鄭大勇','基隆市信一路50號','091123456','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(11,'謝小珍','嘉義市東區民族路380號','092234567','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(12,'潘大為','宜蘭市中山路二段58號','093345678','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(13,'趙小梅','南投市自由路67號','094456789','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(14,'周小龍','雲林市中正路五段120號','095567890','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(15,'李大同','澎湖縣馬公市中正路200號','096678901','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(16,'陳小凡','金門縣金城鎮民生路90號','097789012','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(17,'楊大明','台北市信義區松仁路50號','098890123','2023-12-16 04:14:57','2023-12-16 04:14:57'),
	(18,'吳小雯','新北市中和區景平路100號','099901234','2023-12-16 04:14:57','2023-12-16 04:14:57');

/*!40000 ALTER TABLE `recipients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
