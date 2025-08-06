-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 03:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_medicom`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(10) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alumni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_bekerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `gambar`, `nama_alumni`, `tempat_bekerja`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'images/alumni/alumni.jpg', 'Kiara Hagenes', 'Quo hic dolores.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(22, 'images/alumni/alumni.jpg', 'Talia Leuschke', 'Consequatur possimus.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(23, 'images/alumni/alumni.jpg', 'Dr. Dion Green DVM', 'Asperiores eligendi.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(24, 'images/alumni/alumni.jpg', 'Mariano Wiza Jr.', 'Et et.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(25, 'images/alumni/alumni.jpg', 'Constance Kub', 'Quia odit.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(26, 'images/alumni/alumni.jpg', 'Braxton Hyatt MD', 'Omnis sint rerum.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(27, 'images/alumni/alumni.jpg', 'Glennie Gleason', 'Et exercitationem.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(28, 'images/alumni/alumni.jpg', 'Chelsie Bartoletti', 'Quia neque.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(29, 'images/alumni/alumni.jpg', 'Prof. Dayne Schimmel', 'Et facilis velit.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(30, 'images/alumni/alumni.jpg', 'Christiana Prohaska', 'Magni assumenda dolores.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(31, 'images/alumni/alumni.jpg', 'Jessyca Bradtke', 'Qui aspernatur.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(32, 'images/alumni/alumni.jpg', 'Harmony Bartell', 'Et et.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(33, 'images/alumni/alumni.jpg', 'Kellen Mayert', 'Ut omnis voluptates.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(34, 'images/alumni/alumni.jpg', 'Prof. Deshawn Davis', 'Voluptatem at.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(35, 'images/alumni/alumni.jpg', 'Miss Noemie Hegmann DDS', 'Quidem tempora ab.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(36, 'images/alumni/alumni.jpg', 'Aileen Pagac', 'Animi dicta cupiditate.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(37, 'images/alumni/alumni.jpg', 'Carey Cremin', 'Dolores rerum.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(38, 'images/alumni/alumni.jpg', 'Kristopher Yost', 'Ratione delectus voluptatem.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(39, 'images/alumni/alumni.jpg', 'Dr. Leilani Ziemann', 'Ad dicta velit.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:01', '2022-04-17 09:18:01', NULL),
(40, 'images/alumni/alumni.jpg', 'Prof. Holly Fadel', 'Voluptas nobis.', 'www.youtube.com/v2=e2ejfewr23', '2022-04-17 09:18:02', '2022-04-17 09:18:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id_banner` int(10) UNSIGNED NOT NULL,
  `gambar_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id_banner`, `gambar_banner`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'images/banner/54001318072022_31311527052021_bg_3.jpg', 'Pengumuman', '2022-05-08 01:23:32', '2022-07-18 06:00:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` date NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul_berita`, `slug_berita`, `isi`, `user_id`, `publish`, `gambar`, `created_at`, `updated_at`) VALUES
(6, 'Illum consequatur ipsam nisi.', 'eum-a-est-accusantium-voluptatem', 'Et quidem voluptatem exercitationem alias animi minima maxime voluptate id quaerat qui quasi perspiciatis animi labore officiis ratione sit at voluptas praesentium et quia facilis quaerat rerum reprehenderit nihil expedita quia consequatur reiciendis voluptatem consequatur officia vel ad est similique sapiente consequatur minus porro distinctio natus fuga occaecati in sit.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(7, 'Veniam sunt illo dicta.', 'quae-velit-modi-vero', 'Velit debitis quas earum quisquam natus consequatur temporibus neque qui sunt sint impedit ratione adipisci quos deserunt quia at vitae quia quia non ducimus qui nam quas molestiae veritatis soluta voluptas inventore occaecati fugit et in vel alias nulla ab.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(8, 'Ipsum occaecati quis et.', 'aspernatur-sed-deserunt-ex', 'Recusandae saepe laboriosam omnis quisquam dolorum inventore est veritatis quae autem amet ea optio eum est aut suscipit quia enim natus voluptatum incidunt ut tempore commodi dolorum perspiciatis sunt praesentium eius facilis rerum est omnis iusto dolores dolores deleniti eaque qui veniam labore exercitationem quibusdam rerum aut ea error est inventore dignissimos nobis aut architecto impedit amet eveniet.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(9, 'Sequi officiis qui laudantium.', 'ipsam-aspernatur-reprehenderit', 'Nam alias sed et dolor eum odio earum voluptates dolor corrupti quia placeat sapiente voluptas facere et voluptas tenetur aut rerum ad vel tenetur recusandae consequuntur eius distinctio ea excepturi sed veniam sint sit ratione reiciendis commodi officiis vel eligendi non et voluptas laborum necessitatibus porro ut fugiat voluptatem commodi praesentium eius esse fugiat cum perferendis voluptate quia explicabo aspernatur vel et quo.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(10, 'A ipsam officiis soluta autem porro.', 'eius-earum-est-voluptatibus', 'Fugiat totam consequatur totam ut sit architecto et numquam fuga consequuntur a vel praesentium qui pariatur eos molestiae exercitationem aut modi maxime tempore iure similique aut accusantium non voluptatem ea voluptatibus natus amet pariatur consequatur vitae quia asperiores recusandae nulla molestias.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(11, 'Neque saepe asperiores ea qui odit.', 'in-ab-vero', 'Molestias vero id laboriosam occaecati deserunt quis repellat aut voluptas quos dolorem omnis repudiandae omnis nulla et quas unde voluptatem omnis ipsa accusamus veritatis dolores incidunt nobis enim pariatur dolore excepturi natus odit reprehenderit ad magnam quibusdam qui molestiae exercitationem quidem incidunt pariatur dolor enim architecto aut rerum et quo.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(12, 'Excepturi maiores.', 'rerum-molestiae-impedit-illum-molestiae', 'Totam consequatur voluptatem est id fugiat ducimus est non delectus sequi et reprehenderit optio nobis recusandae ipsa necessitatibus vel non nihil temporibus facilis distinctio aut illo commodi non accusamus sapiente quia sint a rerum dolor iure aut aut odio qui quos omnis deserunt id consequatur sit numquam.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(13, 'Quia fuga laborum sapiente quis velit.', 'animi-pariatur-omnis-dolorem-sit-occaecati-illum', 'Iure quod odit mollitia at enim rerum laboriosam vel similique vel illum deserunt pariatur repudiandae molestiae cum non odit et sit dolorem illum et pariatur voluptatem vero autem soluta sed fugit autem quisquam consequatur laudantium est inventore ut aut praesentium et repellendus sed qui voluptatem.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(14, 'Doloribus amet labore.', 'modi-laudantium', 'Reprehenderit ipsum dolor et pariatur corrupti numquam est animi nemo officiis qui eius non cum beatae rem libero est eveniet labore modi magni sint velit quia occaecati accusamus quibusdam culpa maxime enim possimus architecto voluptatum.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(15, 'Ut debitis velit.', 'velit-aliquam-rerum-nam-fugiat', 'Eveniet consectetur qui doloremque voluptate maxime suscipit id beatae velit provident dolorum labore assumenda officiis est quasi molestiae ex quod animi quae fugiat illum dignissimos velit id soluta quis est quas.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(16, 'Minus itaque nihil nihil.', 'aut-eligendi-omnis', 'Iste ipsa id sed dolor dolor et minus est et labore dicta placeat repellendus laboriosam rerum repellat repudiandae laudantium quasi quod sed consequatur vitae omnis reprehenderit magnam at omnis ex tenetur neque quo nihil qui.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(17, 'Quos aut molestiae dolorem.', 'cum-earum', 'Odit eos cupiditate voluptas eveniet deserunt vel corporis voluptatem neque possimus distinctio quod recusandae distinctio velit repudiandae aut consequatur pariatur sit illo ut molestiae veritatis aut et quaerat eum aut tempora autem.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(18, 'Vel et neque.', 'aliquam-sit-dolorem-ducimus-sit-distinctio-voluptatibus-accusantium-eligendi', 'Nostrum maxime omnis ut impedit quia harum tempore omnis dolore rem vel neque quia veritatis odit corporis nam et dignissimos est qui nihil laborum aut placeat fuga dignissimos cumque quia aut.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(19, 'Dolor consequatur deserunt ea quis nulla debitis.', 'exercitationem-aspernatur-earum', 'Tenetur aut dolorum ipsa ut velit dolorem ipsa ut eligendi non quos autem corrupti quia sapiente delectus ut et reiciendis rem rerum voluptas hic ad quasi facilis iste laboriosam illo qui natus vero.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25'),
(20, 'Quas et et.', 'earum-eos-aut-laborum-qui', 'Consequatur porro vel harum facere ad vel voluptate et explicabo porro voluptatem ut quisquam nisi quas dolores harum consequatur perspiciatis et fuga voluptatem omnis ipsam quia natus quis itaque ut in iure inventore quos et labore perspiciatis in est et temporibus.', '1', '2022-03-26', 'images/berita/18461503062021_image_6.jpg', '2022-03-25 17:17:25', '2022-03-25 17:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categori_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `categori_id`, `user_id`, `title`, `slug`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Blog pertama', 'blog-pertama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quisquam', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel officia in quaerat. Eligendi qui corporis, quibusdam nemo vel libero incidunt ipsa ullam laborum consequatur unde quo amet exercitationem cumque, provident quod, sequi nesciunt animi sed dicta est. Non quaerat et veniam iusto corrupti ipsam assumenda, nobis commodi rem nostrum nihil aliquam fugiat eos minima amet ex quam nesciunt vel, totam consequuntur in! Similique placeat vel dolor nobis architecto! Atque assumenda iste tempora numquam error voluptatum. Saepe a culpa quisquam soluta quo fugit praesentium illum facilis quasi repellendus architecto accusamus possimus delectus expedita, officiis, aliquam reprehenderit error odio nobis commodi! Dicta explicabo consectetur inventore dolorum sint natus doloremque eum libero quos quasi rem soluta laboriosam velit laborum vitae rerum consequatur reiciendis quidem, officia dolorem repudiandae! Illum corrupti beatae vel voluptas? Culpa eligendi repellat fuga ab repudiandae quis rerum excepturi optio maxime!', NULL, '2022-03-25 17:17:24', '2022-03-25 17:17:24'),
(2, 2, 1, 'Blog kedua', 'blog-kedua', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quisquam', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel officia in quaerat. Eligendi qui corporis, quibusdam nemo vel libero incidunt ipsa ullam laborum consequatur unde quo amet exercitationem cumque, provident quod, sequi nesciunt animi sed dicta est. Non quaerat et veniam iusto corrupti ipsam assumenda, nobis commodi rem nostrum nihil aliquam fugiat eos minima amet ex quam nesciunt vel, totam consequuntur in! Similique placeat vel dolor nobis architecto! Atque assumenda iste tempora numquam error voluptatum. Saepe a culpa quisquam soluta quo fugit praesentium illum facilis quasi repellendus architecto accusamus possimus delectus expedita, officiis, aliquam reprehenderit error odio nobis commodi! Dicta explicabo consectetur inventore dolorum sint natus doloremque eum libero quos quasi rem soluta laboriosam velit laborum vitae rerum consequatur reiciendis quidem, officia dolorem repudiandae! Illum corrupti beatae vel voluptas? Culpa eligendi repellat fuga ab repudiandae quis rerum excepturi optio maxime!', NULL, '2022-03-25 17:17:24', '2022-03-25 17:17:24'),
(3, 3, 1, 'Blog ketiga', 'blog-ketiga', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quisquam', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vel officia in quaerat. Eligendi qui corporis, quibusdam nemo vel libero incidunt ipsa ullam laborum consequatur unde quo amet exercitationem cumque, provident quod, sequi nesciunt animi sed dicta est. Non quaerat et veniam iusto corrupti ipsam assumenda, nobis commodi rem nostrum nihil aliquam fugiat eos minima amet ex quam nesciunt vel, totam consequuntur in! Similique placeat vel dolor nobis architecto! Atque assumenda iste tempora numquam error voluptatum. Saepe a culpa quisquam soluta quo fugit praesentium illum facilis quasi repellendus architecto accusamus possimus delectus expedita, officiis, aliquam reprehenderit error odio nobis commodi! Dicta explicabo consectetur inventore dolorum sint natus doloremque eum libero quos quasi rem soluta laboriosam velit laborum vitae rerum consequatur reiciendis quidem, officia dolorem repudiandae! Illum corrupti beatae vel voluptas? Culpa eligendi repellat fuga ab repudiandae quis rerum excepturi optio maxime!', NULL, '2022-03-25 17:17:24', '2022-03-25 17:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `categori`
--

CREATE TABLE `categori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categori`
--

INSERT INTO `categori` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi', 'teknologi', '2022-03-25 17:17:24', '2022-03-25 17:17:24'),
(2, 'Program', 'program', '2022-03-25 17:17:24', '2022-03-25 17:17:24'),
(3, 'Coding Sintaks', 'coding_sintaks', '2022-03-25 17:17:24', '2022-03-25 17:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_05_13_160013_create_banner_table', 1),
(4, '2021_05_26_161004_create_alumni_table', 1),
(5, '2021_06_01_041844_create_staff_table', 1),
(6, '2021_06_03_161338_create_berita_table', 1),
(7, '2021_06_18_144612_create_motivasi_table', 1),
(8, '2021_06_21_172349_create_users_table', 1),
(9, '2021_06_21_173616_create_roles_table', 1),
(10, '2021_06_21_174206_create_permissions_table', 1),
(11, '2021_06_21_174341_create_permission_role_table', 1),
(12, '2021_06_21_174530_create_role_user_table', 1),
(13, '2021_06_21_175116_create_pengumuman_table', 1),
(14, '2021_10_20_084926_create_blog_table', 1),
(15, '2021_10_20_102137_create_categori_table', 1),
(16, '2021_12_05_100717_create_pendaftaran_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `motivasi`
--

CREATE TABLE `motivasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qutes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noreg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_peserta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_kuliah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sistem_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blazer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_belajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `token`, `noreg`, `kode_peserta`, `nama`, `email`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `nik`, `nama_ibu`, `no_hp_ibu`, `program_studi`, `waktu_kuliah`, `sistem_pembayaran`, `blazer`, `lokasi_belajar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sZVucpllxR', 'REG-2205111', '222203022', 'YIhuda', 'ramson@gmail.com', 'L', 'Kristen', 'Medan', '1997-03-05', '08434534543345', '12903892394', 'Mariyukani', '0852703478832', 'Teknik Komputer', 'Kuliah Pagi', 'Lunas', 'S', 'Kampus I AMIK Medicom Darat', '2022-05-11 06:07:56', '2022-05-11 06:07:56', NULL),
(2, 'rroIUbqqG0', 'REG-2206012', '222203023', 'YUndis', 'ramso324n@gmail.com', 'L', 'Kristen', 'Medan', '2003-11-05', '08483845', '12903892394', 'Mariyukani', '0852703478832', 'Teknik Komputer', 'Kuliah Pagi', 'Lunas', 'S', 'Kampus I AMIK Medicom Darat', '2022-06-01 08:45:42', '2022-06-01 08:45:42', NULL),
(3, '9TGxOmCd99', 'REG-2206013', '222203024', 'INdah', 'ramsoesdfsn@gmail.com', 'L', 'Kristen', 'Medan', '2022-09-06', '083234', '12903892394', 'Mariyukani', '0852703478832', 'Teknik Komputer', 'Kuliah Pagi', 'Lunas', 'S', 'Kampus I AMIK Medicom Darat', '2022-06-01 09:08:32', '2022-06-01 09:08:32', NULL),
(4, 'ozpDWeknFx', 'REG-2206014', '222203025', 'Karnli', 'Karnli@gmail.com', 'L', 'Kristen', 'Medan', '2005-09-06', '032349', '12903892394', 'Mariyukani', '0852703478832', 'Teknik Komputer', 'Kuliah Pagi', 'Lunas', 'S', 'Kampus I AMIK Medicom Darat', '2022-06-01 09:19:01', '2022-06-01 09:19:01', NULL),
(5, '997NwuaxYv', 'REG-2206145', '222203026', 'kotyih', 'indah@gmail.com', 'L', 'Kristen', 'Medan', '2005-02-06', '08674362734323', '098765645778', 'Yukandi', '0834234234', 'Teknik Komputer', 'Kuliah Siang', 'Bayar 3 X', 'XL', 'Kampus I AMIK Medicom Darat', '2022-06-14 16:26:35', '2022-06-14 16:26:35', NULL),
(6, 'UPHDgw14bp', 'REG-2206146', '222203027', 'dfsdfa', 'sdkfji@gmail.com', 'L', 'Khatolik', 'Mdeda', '2005-06-30', '03453245245345', '3432423423324', 'Uikfd', '0834524523', 'Teknik Komputer', 'Kuliah Siang', 'Bayar 6 X', 'S', 'Kampus II AMIK Medicom HM Yamin', '2022-06-14 16:41:24', '2022-06-14 16:41:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_publish` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul_pengumuman`, `slug_pengumuman`, `isi`, `tgl_publish`, `user_id`, `file`, `view`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Menyambut Libur hari Raya Idul Fitri', 'menyambut-libur-hari-raya-idul-fitri', 'Dengan tahun ajaran baru yang akan kita lakukan dengan baik maka dengan ini saya pastikan untuk ikut selalu dkfji dfejkdalllsdf kasdfk sdko la vkkk dkfi', '2022-04-12', 3, 'images/pengumuman/09421512042022_Ijazah dan Transkrip Nilai.pdf', 45, '2022-04-12 08:42:09', '2022-05-26 01:18:58', NULL),
(2, 'Gagal Paham Tentang Narkoba', 'gagal-paham-tentang-narkoba', '<p>54</p>', '2022-05-08', 1, NULL, 4, '2022-05-08 02:46:56', '2022-07-09 08:33:51', NULL),
(4, 'a', 'a', '<p>a</p>', '2022-05-08', 2, NULL, 4, '2022-05-08 02:59:24', '2022-07-09 09:28:11', '2022-07-09 09:28:11'),
(5, 'Voluptatem dignissimos provident quasi corporis voluptates', 'voluptatem-dignissimos-provident-quasi-corporis-voluptates', '<p class=\"fst-italic\" style=\"color: rgb(51, 66, 64); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; font-style: italic !important;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><p style=\"color: rgb(51, 66, 64); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>', '2022-07-09', 2, 'images/pengumuman/30501309072022_template tugas DAY 4.docx', 4, '2022-07-09 06:50:30', '2022-07-09 10:22:34', NULL),
(6, 'Voluptatem dignissimos provident', 'voluptatem-dignissimos-provident', '<p><span style=\"color: rgb(95, 124, 120); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; text-align: center;\">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</span><br></p>', '2022-07-09', 2, NULL, 4, '2022-07-09 07:28:31', '2022-07-09 08:05:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', '2019-09-16 00:56:46', '2019-09-16 00:56:46', NULL),
(2, 'permission_create', '2019-09-16 00:56:46', '2019-09-16 00:56:46', NULL),
(3, 'permission_edit', '2019-09-16 00:56:46', '2019-09-16 00:56:46', NULL),
(4, 'permission_show', '2019-09-16 00:56:46', '2019-09-16 00:56:46', NULL),
(5, 'permission_delete', '2019-09-16 00:56:46', '2019-09-16 00:56:46', NULL),
(6, 'permission_access', '2019-09-16 00:56:46', '2019-09-16 00:56:46', NULL),
(7, 'pengumuman_access', '2022-03-25 17:25:49', '2022-03-25 17:25:49', NULL),
(8, 'berita_access', '2022-04-10 02:03:12', '2022-04-10 02:03:12', NULL),
(9, 'alumni_access', '2022-04-10 02:03:27', '2022-04-10 02:03:27', NULL),
(10, 'banner_access', '2022-05-08 01:17:50', '2022-05-08 01:19:46', NULL),
(11, 'staff_access', '2022-07-14 15:43:29', '2022-07-14 15:43:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 2),
(3, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `profile_kampus`
--

CREATE TABLE `profile_kampus` (
  `id` int(11) NOT NULL,
  `logo` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_kampus`
--

INSERT INTO `profile_kampus` (`id`, `logo`) VALUES
(1, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2019-09-16 00:53:12', '2019-09-16 00:53:12', NULL),
(2, 'User', '2019-09-16 00:53:12', '2022-04-10 01:49:36', '2022-04-10 01:49:36'),
(3, 'Postment', '2022-04-10 01:49:28', '2022-04-10 01:49:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(10) UNSIGNED NOT NULL,
  `nama_staff` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_staff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `slug_staff`, `jabatan`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ramson Rajagukguk', 'ramson-rajagukguk', 'dosen', 'images/staff/istockphoto-638917964-612x612.jpg', '2022-07-14 15:44:52', '2022-07-14 15:44:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `picture`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$hZ1a0cYBH52Oav56uT0qpuE4SyN6Q0QkmtqeH4f1pY5i5qzej/R4O', 1, 'images/users/UIMG2022030862277b02abb90.jpg', NULL, '2021-05-16 21:21:52', '2021-05-16 21:21:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_slug_unique` (`slug`);

--
-- Indexes for table `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categori_name_unique` (`name`),
  ADD UNIQUE KEY `categori_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motivasi`
--
ALTER TABLE `motivasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftaran_token_unique` (`token`),
  ADD UNIQUE KEY `pendaftaran_email_unique` (`email`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengumuman_slug_pengumuman_unique` (`slug_pengumuman`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_538787` (`role_id`),
  ADD KEY `permission_id_fk_538787` (`permission_id`);

--
-- Indexes for table `profile_kampus`
--
ALTER TABLE `profile_kampus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_538796` (`user_id`),
  ADD KEY `role_id_fk_538796` (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categori`
--
ALTER TABLE `categori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `motivasi`
--
ALTER TABLE `motivasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_538787` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_538787` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_538796` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_538796` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
