-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2023 at 04:39 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$MJoplxHk7AlaqHUKvlqgg.vZo8NlXmHw.JQF9AkZHCcf1q96pX2l2', 'Administrator', NULL, 'rcXOcq8bAokQojUQa2rW9mVpOpMZqtAz49hdpoAGgNOdewaRYfRy7IuvUTYY', '2020-09-09 14:50:24', '2020-09-09 14:50:24'),
(2, 'x-man11', '$2y$10$zk1WL34qXI6rjKsQSDMgfugPCfk4vSsqYO3l6U0tWoDu4h8nxNixO', 'man@yahoo.com', NULL, 'CO2UqntBwc8oXt4Fn5p0cEgwrEB1h3Yq56EjPPFUhhuhXG77u2X0ugi6px8b', '2020-09-13 14:37:50', '2020-09-13 14:37:50'),
(3, 'ionMan', '$2y$10$iJj4i.YDwb7HeEr91E9DQedzaGmiF6.1zA0.NDwH.ERIIyJSNFXZG', 'manmarius42@yahoo.com', '2020-09-15-19-19-20-IMG-20200828-WA0024.jpg', 'dnwuCEs6HvIVoIQcZ8XAwGJX4ML9QETSChoOTBd7aUMRIsyiYpIPJzAtcaYb', '2020-09-15 16:19:20', '2020-09-15 16:19:20'),
(4, 'ion', '$2y$10$v81XGvCucXTnVYAbhD1GxeuU17UgtysAm5MkCruTrtsWK1VNU.XCS', 'ion@gmail.com', '2020-09-21-14-35-14-IMG-20200828-WA0028.jpg', 'sbSEgUc8KjqoqHCIntxD6M8qzDNaMujDpS40CnH3neg4IhHCa4PR67juNt06', '2020-09-21 11:35:14', '2020-09-21 11:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_permissions`
--

DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE IF NOT EXISTS `admin_user_permissions` (
  `user_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_user_permissions`
--

INSERT INTO `admin_user_permissions` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `cover_image` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `description`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 'dolores', 'Voluptas natus et eaque suscipit et sapiente. Voluptas ratione sit error. Numquam deserunt excepturi recusandae.', '93ab5c69f39e37c4c797e020d7a0c454.jpg', '2020-11-13', '2020-11-13'),
(2, 'rerum', 'Beatae ut laborum est consequatur repellat. Dolor eos sed vel rerum explicabo. Laboriosam eius nobis eos tempore. Esse debitis quaerat iure quia commodi.', '7bf3a679910c5ae2179ec28b0a3e002f.jpg', '2020-11-14', '2020-11-14'),
(3, 'aliquam', 'Commodi minima rem sed natus blanditiis fugit hic tempore. Nam aut temporibus voluptatem hic fuga. Odio quia nobis sequi autem praesentium laudantium.', 'de4ff696f33ec7b0ced4b2f62c8f7d88.jpg', '2020-11-14', '2020-11-14'),
(4, 'modi', 'Quae voluptatem voluptatem molestias est. Ipsam distinctio sapiente eos ducimus. Similique sequi a sunt nihil autem. Animi consequatur rem corporis voluptas nesciunt.', 'f80c3fae689031843f860e60cb714077.jpg', '2020-11-14', '2020-11-14'),
(5, 'dignissimos', 'A ducimus maxime non nihil. Dolores aperiam et ducimus eos et sed delectus. Quae facilis praesentium voluptatem minus.', 'f9ca636474388666dea6b0ba2a4ff538.jpg', '2020-11-14', '2020-11-14'),
(6, 'quo', 'Et a eos nostrum voluptatem dolores necessitatibus quas. Consectetur qui molestias quo officiis praesentium quia. Quibusdam ipsa soluta voluptatem nostrum beatae ab.', '8bc75da1ab563c759c061156f57eff0f.jpg', '2020-11-14', '2020-11-14'),
(7, 'ratione', 'Nulla voluptatem necessitatibus voluptatem hic in voluptatibus fugit. Quod non eos eos quam. Sequi animi exercitationem ut dolore. Sit dicta et quod hic autem ipsum aperiam. Adipisci voluptatem facilis velit enim molestias repellendus.', '43a2a01a993b12d11600137ef9f8fc84.jpg', '2020-11-14', '2020-11-14'),
(8, 'ut', 'Et nemo ut impedit rerum. Ad occaecati molestiae asperiores et nobis dicta. Dolores est consequatur ut non mollitia incidunt tempora. Est sint pariatur laudantium veniam vel quos unde. Nulla cumque sapiente accusantium est totam officia.', 'b56146d62f53bc9c68e40c84405825e0.jpg', '2020-11-14', '2020-11-14'),
(9, 'et', 'Illum nam laudantium est nobis totam et magnam. Blanditiis quaerat excepturi rem quisquam dolorum. Sequi sed qui suscipit officia.', '5c53059db1ef52e5aebdf1ac65f98cc6.jpg', '2020-11-14', '2020-11-14'),
(10, 'dolores', 'Voluptatem ipsam numquam nemo et. Illum eaque illo explicabo commodi vitae quis. Qui et dicta voluptatem provident praesentium aliquam.', '74cf38cb8776209fa8b788f312215c4d.jpg', '2020-11-14', '2020-11-14'),
(11, 'ab', 'Dicta alias natus tempore. Hic ad autem est sed. Repudiandae dolorem praesentium nemo neque cumque. Quaerat dolor consequuntur soluta.', 'c7f006f0c46dcd7da2d33cfb1bd3cb70.jpg', '2020-11-14', '2020-11-14'),
(12, 'esse', 'Vero tempore dolor totam ea sint. Laudantium sit id quae perferendis voluptatum consectetur quis. Voluptatum autem omnis aspernatur quaerat. Non doloribus enim modi omnis qui.', '9eda38a37789a245f5f21195a6bd8748.jpg', '2020-11-14', '2020-11-14'),
(13, 'nisi', 'Itaque earum est quis quae ut neque. Quis qui veritatis commodi dolores neque aperiam deleniti. Tenetur eos placeat ut nam possimus distinctio inventore. Consequatur provident ducimus et qui consequatur.', '6f1e61a0ee908b2ebcaf75676a9eb493.jpg', '2020-11-14', '2020-11-14'),
(14, 'et', 'Dolorem enim consequatur perspiciatis ut molestiae dignissimos quis. Eveniet dolores dolorum dolore autem. Sunt sed autem eius deleniti beatae dolor autem. Fugit et dolores veritatis accusamus recusandae nihil.', 'd68078c5964e931938cbd9c49015a578.jpg', '2020-11-14', '2020-11-14'),
(15, 'harum', 'Tempora totam aperiam delectus suscipit aliquam et. Dicta voluptas odio dolorem nostrum velit. Ut accusamus consequatur nobis doloremque quaerat voluptatem. Dolore sed in velit.', '8309e7d2f22a2bf6bdf0a4b8b954ea6c.jpg', '2020-11-14', '2020-11-14'),
(16, 'alias', 'Et rerum aut assumenda et sed id nulla. Nemo dolore quidem accusantium aut eos. Expedita rerum nulla eos quam.', '5ca42165707d879df712ebb6b8a6eec1.jpg', '2020-11-14', '2020-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 2, 'non', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(3, 4, 'bere', '2021-01-24 08:54:50', '2023-04-27 12:57:04'),
(4, 7, 'sapiente', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(5, 0, 'officiis', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(6, 0, 'consequatur', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(7, 5, 'sisteme', '2021-01-24 08:54:50', '2023-04-27 13:04:49'),
(8, 9, 'et', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(9, 5, 'ea', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(10, 4, 'fuga', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(11, 7, 'nisi', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(12, 8, 'ut', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(13, 4, 'cupiditate', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(14, 3, 'reiciendis', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(15, 7, 'expedita', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(16, 5, 'autem', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(17, 1, 'perferendis', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(18, 7, 'cola', '2021-01-24 08:54:50', '2023-04-27 13:04:10'),
(19, 1, 'esse', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(20, 2, 'sit', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(21, 3, 'consequuntur', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(22, 5, 'consectetur', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(23, 9, 'ullam', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(24, 5, 'rem', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(25, 4, 'magnam', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(26, 1, 'voluptas', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(27, 0, 'nemo', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(28, 5, 'eaque', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(29, 6, 'et', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(30, 5, 'ex', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(31, 4, 'voluptatem', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(32, 5, 'et', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(33, 3, 'quasi', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(34, 2, 'porro', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(35, 9, 'omnis', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(36, 7, 'repudiandae', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(37, 9, 'eos', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(38, 1, 'iure', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(39, 4, 'ex', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(40, 8, 'ex', '2021-01-24 08:54:50', '2021-01-24 08:54:50'),
(41, 0, 'masinii', '2021-01-24 08:56:30', '2021-01-24 08:56:30'),
(42, 41, 'ford', '2021-01-24 08:57:06', '2021-01-24 08:57:06'),
(43, 41, 'dacia', '2021-01-24 08:57:40', '2021-01-24 08:57:40'),
(44, 27, 'telefoane', '2021-01-24 08:59:38', '2021-01-24 08:59:38'),
(45, 41, 'ford', '2021-01-24 09:00:12', '2021-01-24 09:00:12'),
(46, 5, 'ett', '2021-01-24 11:24:36', '2021-01-24 11:24:36'),
(47, NULL, 'Televizoare', '2023-04-25 11:47:42', '2023-04-25 11:47:42'),
(48, NULL, 'Televizoare', '2023-04-25 11:48:00', '2023-04-25 11:48:00'),
(49, NULL, 'Telefoane', '2023-04-25 11:48:59', '2023-04-25 11:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

DROP TABLE IF EXISTS `cruds`;
CREATE TABLE IF NOT EXISTS `cruds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`id`, `first_name`, `last_name`, `image`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Ioan', 'Vasile', '1267815776.jpg', '2020-11-09', '2020-11-09', 0),
(3, 'Man', 'Ioan Marius', '2020-11-09-08-08-45-Skyline.jpg', '2020-11-09', '2020-11-09', 1),
(4, 'Blaga', 'Ioan', '2020-11-09-08-10-34-Sunrise-1.jpg', '2020-11-09', '2020-11-09', 1),
(5, 'B18nCZWhJ9X8y0a', 'L3s0arzYNxerNfU', '102314408.jpg', '2020-11-09', '2020-11-09', 0),
(9, '0JEu51uifzVdbfy', 'MPlUEUbK22zxVxz', '01.jpg', '2020-11-09', '2020-11-09', 0),
(10, 'cOu49vYVtWeTp0p', 'ZMibVAvTeLLdoll', '01.jpg', '2020-11-09', '2020-11-09', 0),
(11, 'qWuyQ0j3DWabDbY', 'enSOkms9DNIrXgZ', '01.jpg', '2020-11-09', '2020-11-09', 0),
(12, 'chOTWSEIifqV9n7', '4BflFkIeWEY1kPE', '01.jpg', '2020-11-09', '2020-11-09', 0),
(13, 'QbOuF24ok82P5sm', 'hO6k8C5zp7KJkKH', '01.jpg', '2020-11-09', '2020-11-09', 0),
(14, '4ruFcgk1W7Dj4ee', 'nSFDjhnStIGePwa', '01.jpg', '2020-11-09', '2020-11-09', 0),
(15, 'KjQzmAo3y01ueMd', 'CB451pCG7hkYbZf', '01.jpg', '2020-11-09', '2020-11-09', 0),
(16, 'kgFfQz83FopRQOj', 'DlgMOrdZTdX34NJ', '01.jpg', '2020-11-09', '2020-11-09', 0),
(17, 'zEdULIPG03aC52E', 'NBntVhtlCzQ9W2t', '01.jpg', '2020-11-09', '2020-11-09', 0),
(18, 'qfUFEr7HV09fIQB', 'MKh96IJmE6wkI2n', '01.jpg', '2020-11-09', '2020-11-09', 0),
(19, 'Lylya2YhY2vgUHj', 'nJ6elGwLn9YYGAa', '01.jpg', '2020-11-09', '2020-11-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `post` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone`, `post`, `avatar`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Ioan', 'Nelu', 'nelu@yahoo.com', '0745661', 'Operator It', '1688798333.png', '2023-08-05 12:26:04', '2023-07-08', 1),
(2, 'recusandae', 'et', 'jweimann@fritsch.com', '510-024-2924', 'excepturi', '5ab1e8c3af8967ff700c2cc7774f26b4.png', '2023-08-05 12:26:09', '2023-07-08', 1),
(3, 'officia', 'voluptatum', 'mohr.reilly@runolfsdottir.com', '257-810-0697', 'non', '915ffdf4b214a6588eee06dddde0fb68.png', '2023-07-08 04:44:34', '2023-07-08', 0),
(4, 'nulla', 'sunt', 'lglover@hotmail.com', '544-813-3328', 'amet', '8b22ac679c89e790a89faed87a0225e1.png', '2023-07-08 04:44:35', '2023-07-08', 0),
(5, 'impedit', 'sit', 'vhowe@graham.biz', '198-924-2927', 'quasi', '5c2c91ebce70fa11b272ed09c9665ae9.png', '2023-07-08 04:44:36', '2023-07-08', 0),
(6, 'rem', 'eaque', 'carroll.dina@kiehn.com', '367-939-5938', 'quo', 'df7d163f03cbdc25ee0f7a75d017ced0.png', '2023-07-08 04:44:37', '2023-07-08', 0),
(7, 'et', 'totam', 'schmeler.emelie@gmail.com', '734-203-0957', 'blanditiis', '3152fbb59299d3e32f9ee4db10abf70a.png', '2023-07-08 04:44:37', '2023-07-08', 0),
(8, 'tempore', 'tempora', 'eda46@hotmail.com', '553-713-0516', 'unde', '1850ce65e51c041b8dc8c67c74e900c6.png', '2023-07-08 04:44:38', '2023-07-08', 0),
(9, 'magni', 'eos', 'zoe.bailey@gmail.com', '421-395-3982', 'fugiat', '385a24f8e108c88f401583e9f60f4042.png', '2023-07-08 04:44:39', '2023-07-08', 0),
(10, 'ab', 'blanditiis', 'timmothy39@franecki.com', '804-743-1334', 'facilis', '516ee0bda5818288ddf8611109889cf7.png', '2023-07-08 04:44:40', '2023-07-08', 0),
(11, 'soluta', 'quo', 'conor.bednar@pollich.net', '794-273-2432', 'assumenda', 'a5aef79c5af5a2afbec05d2e84a3c2ea.png', '2023-07-08 04:44:41', '2023-07-08', 0),
(12, 'ut', 'commodi', 'sabina.schmeler@hotmail.com', '674-987-0962', 'necessitatibus', '0748de818468fe60de9520a5fa581fab.png', '2023-07-08 04:44:42', '2023-07-08', 0),
(13, 'magni', 'sequi', 'oshields@hotmail.com', '495-484-3537', 'aspernatur', '2012cbbd299908d9ec8e7070beb757bc.png', '2023-07-08 04:44:43', '2023-07-08', 0),
(14, 'ut', 'sit', 'adolphus.bayer@brekke.com', '325-373-8343', 'qui', '650b3bb728d4b6d5a36a61034373fa1c.png', '2023-07-08 04:44:44', '2023-07-08', 0),
(15, 'quas', 'qui', 'fabian29@schimmel.com', '616-950-7832', 'autem', '5dba4f73ccc8b693fdc0c484d5b6e1f6.png', '2023-07-08 04:44:45', '2023-07-08', 0),
(16, 'atque', 'in', 'kelton.pfannerstill@bogan.com', '711-679-8288', 'est', 'cd5c826d4a94619c6eabbacef69a65b8.png', '2023-07-08 04:44:46', '2023-07-08', 0),
(17, 'asperiores', 'similique', 'vcremin@gmail.com', '425-225-0954', 'ut', '4fa91320205990ed42b104b4d602593f.png', '2023-07-08 04:44:47', '2023-07-08', 0),
(18, 'quis', 'aut', 'ypredovic@hotmail.com', '587-287-6249', 'dolor', '81c23e0e0700b4b16cf4a0aab4976e54.png', '2023-07-08 04:44:48', '2023-07-08', 0),
(19, 'doloribus', 'aut', 'noemi.sporer@jenkins.com', '748-588-8010', 'iure', '7ca4fa8a2e9f9720fdec961f75012256.png', '2023-07-08 04:44:49', '2023-07-08', 0),
(20, 'est', 'sed', 'jschaefer@hahn.net', '101-803-3353', 'odit', '789cb6f0b32b34a0898b480f6f350ed5.png', '2023-07-08 04:44:50', '2023-07-08', 0),
(21, 'rem', 'quisquam', 'oberbrunner.leo@hotmail.com', '009-214-3452', 'molestiae', 'c9533a23c88a718b4a9b218a5c64046d.png', '2023-07-08 04:44:51', '2023-07-08', 0),
(22, 'est', 'nulla', 'elenora.walsh@hotmail.com', '552-588-8751', 'consequatur', '1d25e924a7bce429c222d2247bf3784e.png', '2023-07-08 04:44:52', '2023-07-08', 0),
(23, 'sit', 'rerum', 'malvina.yundt@thompson.com', '411-792-6596', 'nisi', '4ed7a2ea5131ffca769acef9a747c70c.png', '2023-07-08 04:44:53', '2023-07-08', 0),
(24, 'deleniti', 'sapiente', 'delfina.wiza@yahoo.com', '247-731-9463', 'autem', 'a744cb1ed3b359c0bbc7bc4c672557cd.png', '2023-07-08 04:44:54', '2023-07-08', 0),
(25, 'ipsa', 'at', 'bayer.reuben@yahoo.com', '280-963-5913', 'sapiente', '6a8be9bf5fb788396b64a4144bd7dd50.png', '2023-07-08 04:44:55', '2023-07-08', 0),
(26, 'reprehenderit', 'a', 'nikolas.gusikowski@cole.com', '335-902-1070', 'minus', 'a85525b0e6360e40e32a5a5c6a80c29a.png', '2023-07-08 04:44:57', '2023-07-08', 0),
(27, 'corporis', 'fugiat', 'lind.jude@grimes.com', '516-310-5124', 'iusto', '3d0f00d8ab5abe55f8daff8164bba174.png', '2023-07-08 04:44:58', '2023-07-08', 0),
(28, 'fugiat', 'consequuntur', 'bheidenreich@mills.com', '669-473-0415', 'ut', 'f6e13fb3198268d47449d95468e54984.png', '2023-07-08 04:44:59', '2023-07-08', 0),
(29, 'maxime', 'nesciunt', 'rau.lenore@becker.com', '989-121-4305', 'omnis', '26ee80796ac606bd5b149672fe3a9bf0.png', '2023-07-08 04:45:01', '2023-07-08', 0),
(30, 'et', 'nesciunt', 'gwen.rath@emmerich.com', '090-867-2198', 'cupiditate', '21d4893f856168549e296e5276fc1bd3.png', '2023-07-08 04:45:02', '2023-07-08', 0),
(31, 'eveniet', 'fugit', 'rquigley@yahoo.com', '227-234-2105', 'consequatur', 'ff3d80b29abe1323b2de785ba5d1c167.png', '2023-07-08 04:45:03', '2023-07-08', 0),
(32, 'nemo', 'modi', 'martine.upton@hotmail.com', '076-030-9723', 'id', '6f20b3c469c5b3ac027b618ec8a2e915.png', '2023-07-08 04:45:04', '2023-07-08', 0),
(33, 'facilis', 'facilis', 'maida.leffler@gmail.com', '900-544-6470', 'eveniet', 'cd074cea00fd9ea074f5dff4d23b1b80.png', '2023-07-08 04:45:05', '2023-07-08', 0),
(34, 'tempora', 'et', 'corene47@yahoo.com', '606-237-9888', 'porro', 'bcabba4511d1c99454152024c4e2d6cb.png', '2023-07-08 04:45:06', '2023-07-08', 0),
(35, 'dignissimos', 'ut', 'lemke.fernando@gmail.com', '725-690-4543', 'veritatis', '7d009fad5d0b5557908ab425acd6f3b6.png', '2023-07-08 04:45:08', '2023-07-08', 0),
(36, 'eaque', 'molestiae', 'spinka.emilio@gmail.com', '426-775-7838', 'et', '6db0bd467095983039cc94ebb3ea4d13.png', '2023-07-08 04:45:09', '2023-07-08', 0),
(37, 'possimus', 'quis', 'luna.kunze@emard.org', '153-675-7702', 'possimus', '0ca154c7ec6744f7f040fd7eca4a2411.png', '2023-07-08 04:45:10', '2023-07-08', 0),
(38, 'culpa', 'minima', 'alia.feil@hotmail.com', '970-167-3786', 'sapiente', 'e69bb0f0df9309f3a55a661e391fe6f3.png', '2023-07-08 04:45:12', '2023-07-08', 0),
(39, 'est', 'et', 'armstrong.rebekah@hotmail.com', '134-734-1307', 'quis', '7e1eb845dfbf206339a96717c95b8a11.png', '2023-07-08 04:45:14', '2023-07-08', 0),
(40, 'doloribus', 'molestiae', 'gstoltenberg@douglas.com', '132-316-4445', 'hic', 'edbeaa71e26f4284dbd35951c3f72fd4.png', '2023-07-08 04:45:14', '2023-07-08', 0),
(41, 'in', 'aut', 'leanna.luettgen@hotmail.com', '084-059-5901', 'deleniti', '0d87add7d3e665dd61d640ae070b788a.png', '2023-07-08 04:45:16', '2023-07-08', 0),
(42, 'et', 'est', 'weber.otha@yahoo.com', '956-417-3633', 'quia', '02db8cd43beea2529c771d943a95bc26.png', '2023-07-08 04:45:19', '2023-07-08', 0),
(43, 'esse', 'ipsam', 'valentina96@hotmail.com', '414-293-5470', 'unde', '9c7ff62a6f86c7be6bd47d824408adf4.png', '2023-07-08 04:45:20', '2023-07-08', 0),
(44, 'rerum', 'ut', 'rkunze@king.com', '070-780-4912', 'est', '49124fec5330000ed9161c878dcedc46.png', '2023-07-08 04:45:22', '2023-07-08', 0),
(45, 'earum', 'asperiores', 'cruickshank.julius@hotmail.com', '713-470-8184', 'nulla', '3556425fee094b7fd390311c143a0438.png', '2023-08-05 13:17:36', '2023-07-08', 1),
(46, 'maxime', 'ipsa', 'gmayert@yahoo.com', '390-828-7047', 'quia', '7811fb1d073a46fa3e0d9c4bc556ebcf.png', '2023-08-05 13:44:14', '2023-07-08', 0),
(47, 'aut', 'sed', 'rkris@gmail.com', '396-235-5708', 'ipsum', '5c295e12aed8e370c94d1116dedf94ee.png', '2023-08-05 13:17:38', '2023-07-08', 0),
(48, 'illo', 'quas', 'ojaskolski@senger.com', '730-597-1689', 'illo', 'e29a79f4bf88d830628d85fd6ac9d114.png', '2023-08-05 13:19:10', '2023-07-08', 0),
(49, 'minima', 'consequatur', 'bradtke.deshaun@gmail.com', '702-183-3849', 'in', '7fb3d72c39187d7dd12a900978cfa3a4.png', '2023-08-05 13:29:57', '2023-07-08', 1),
(50, 'debitis', 'consequatur', 'kenny.kutch@corwin.info', '452-925-6752', 'odit', 'd86e5f1c410c922b2482d4e1fd676b2c.png', '2023-08-06 03:49:08', '2023-07-08', 0),
(51, 'deleniti', 'dolorum', 'ruby41@gmail.com', '591-429-1737', 'impedit', 'c8ebce6978cfc070bf2a343bfc4c4317.png', '2023-08-06 04:21:30', '2023-07-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `album_id` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `size` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `album_id`, `photo`, `title`, `size`, `description`, `created_at`, `updated_at`) VALUES
(1, '6', '483f066bacc79aecc08eec982c377ea4.jpg', 'blanditiis', 'Nemo illo sit ut numquam quisquam.', 'Autem nemo quia vel quibusdam rerum voluptas praesentium. Quis optio dolore consequatur expedita sapiente vero. Pariatur consequatur et provident et porro ea id. Dolorem quaerat autem officiis optio.', '2020-11-14', '2020-11-14'),
(2, '6', '0706b9f4c77042976566f34e82ad0156.jpg', 'maxime', 'Est reiciendis quas nemo quasi in.', 'Possimus ex velit accusantium reprehenderit sed accusantium est. Repellendus at quis aut placeat et.', '2020-11-14', '2020-11-14'),
(3, '6', '5b98b79cce7d04cae3b4a333742bc6a1.jpg', 'dignissimos', 'Fugiat suscipit nihil animi repellendus.', 'Consequatur quis sunt rerum explicabo dolorem veniam est. Placeat ut non veritatis at. Vitae dolorem et sit velit sit distinctio eveniet. Rerum aperiam facere delectus quae dolorum.', '2020-11-14', '2020-11-14'),
(4, '6', 'c2056f5900dce8cedb011ba480ccde36.jpg', 'delectus', 'Vel quo iure in quos earum voluptas ea.', 'Vel vel iste sunt eos quia ipsam aut doloremque. Eligendi velit laboriosam labore quaerat. Rerum natus et dolores itaque. Esse vitae vel sit et assumenda autem.', '2020-11-14', '2020-11-14'),
(5, '6', '4ae65b3ae42ade408dbb4e31b6562ba2.jpg', 'sit', 'Non cumque eveniet ut maiores quia ipsum minus.', 'Quibusdam corporis atque delectus tempore ipsum. Omnis ullam rerum pariatur quo. Repudiandae nostrum officia dolor quia quia adipisci. Consectetur fugit deleniti qui qui. Praesentium id consectetur deleniti distinctio rerum.', '2020-11-14', '2020-11-14'),
(6, '6', '11aa68531da25212fe8904a142234ae2.jpg', 'quo', 'Explicabo voluptatibus ab earum tempora dolores.', 'Esse odio hic rerum nihil repellat quis occaecati quis. Aperiam et doloremque dolorem. Dolor iure unde voluptates architecto. Quas voluptatem non error delectus rerum.', '2020-11-14', '2020-11-14'),
(7, '6', '6f5dee02f1536420bfc363b6ab9dda6d.jpg', 'animi', 'Id rerum quo ratione dolore quam accusantium et.', 'Et dolorem dignissimos labore sunt est magnam ab. Et est aut dolores autem inventore. Modi cumque eaque atque amet magnam provident. Quod id officia velit eos atque.', '2020-11-14', '2020-11-14'),
(8, '6', '5a9a552f670aeaebd39ddfb630d714e4.jpg', 'adipisci', 'Occaecati et illum eveniet qui qui recusandae.', 'Ex cupiditate quae quam ad. At quibusdam vel est iste modi. Dolore laboriosam aut voluptatem voluptatem. Nam nesciunt odio minus saepe.', '2020-11-14', '2020-11-14'),
(9, '6', '83c6faf1b87d06860330c45f062640b4.jpg', 'molestiae', 'Et qui culpa et odit incidunt.', 'Dolore labore ex autem facere sit nihil id. Est cum id nostrum vel quasi. Molestias rem qui non minus qui.', '2020-11-14', '2020-11-14'),
(10, '6', 'b0610fecb4b09e3e02c30bc0306b6ba3.jpg', 'nobis', 'Est itaque maiores deserunt perferendis est.', 'Voluptatibus quia repellat velit voluptatem earum a. Similique voluptatem amet voluptatem aperiam accusamus quia quae. Et omnis omnis atque consequatur quis.', '2020-11-14', '2020-11-14'),
(11, '6', '270add4e87cdb4469a1fd0a60102bd1c.jpg', 'aut', 'Dolorum maxime ut eum recusandae officiis.', 'Omnis minima necessitatibus voluptatum nemo dignissimos alias. Est delectus soluta illo voluptates odio distinctio rerum. Id ex ea voluptate aut veritatis est.', '2020-11-14', '2020-11-14'),
(12, '6', '21ddd87e7481df72711e5080fa8d9a28.jpg', 'officia', 'Illum amet cumque eum.', 'Et rem sint ipsam tempora cum officiis tempora. Deleniti quidem fugit et iure consequuntur. Est cum aut et ab libero voluptas.', '2020-11-14', '2020-11-14'),
(13, '6', 'e133b3cb8be00ed588686097d8ef6598.jpg', 'sit', 'Illum nesciunt et omnis iste qui.', 'Nemo ea aut eos ut maiores. Et doloremque consequuntur est. Voluptatum dolore sunt omnis qui eos.', '2020-11-14', '2020-11-14'),
(14, '6', 'cec4cf6624d26b698e32976c3e21a533.jpg', 'aut', 'Vel debitis aut molestiae.', 'Sapiente ea excepturi delectus totam odio id tenetur quod. Delectus sed quia ut. Aut eaque est rerum error recusandae praesentium.', '2020-11-14', '2020-11-14'),
(15, '2', '7402c49f986d2540b3f5fa93be4bf59d.jpg', 'aperiam', '640', 'Quam repellendus et in qui aut odio. Sit recusandae hic rerum id perferendis nostrum. Similique a sunt quis facilis. Sed qui eum quo dolor sit repellat voluptatem.', '2020-11-14', '2020-11-14'),
(16, '2', '5d443a5981f6df0c594c47752c63c1a0.jpg', 'laboriosam', '640', 'Eaque quasi dolore sit et nemo voluptates tempore quaerat. Cum labore impedit voluptas quo id tempore. Delectus velit eius amet repudiandae illo velit rerum. Corporis quas vel magni quod.', '2020-11-14', '2020-11-14'),
(17, '2', '6a534839605ed2f195dd81e9fb75bd7d.jpg', 'ipsum', '640', 'Nam quis nihil ut autem ut fugit qui. Alias quidem et consectetur consequatur ab officia quia. Incidunt rerum aut tempora at voluptatem aut. Molestiae sunt reiciendis voluptatem quo et earum nihil eos. Qui ducimus quo numquam accusantium.', '2020-11-14', '2020-11-14'),
(18, '2', 'd027a2436a64f4498d6df4d7d23f5cff.jpg', 'sunt', '640', 'Et sequi enim eos soluta porro voluptate voluptatibus officiis. Molestias consequatur corporis repellat omnis velit et. In odit corporis ut placeat quis accusantium.', '2020-11-14', '2020-11-14'),
(19, '2', 'abc17dc2f9d4396c7e84fd8ade3ed52e.jpg', 'consequatur', '640', 'Aliquam blanditiis voluptates in enim ab ad ut. Sunt dolorum temporibus dolores voluptas ut aliquam.', '2020-11-14', '2020-11-14'),
(20, '2', '7ad71d0d106b75c291fa5f2b3fe04b4e.jpg', 'quibusdam', '640', 'Quia unde est pariatur. Magnam quia est nulla. Sed vitae natus dolorum et autem nostrum. Est dolorem officia blanditiis consectetur ipsa animi. Veritatis recusandae aspernatur delectus a.', '2020-11-14', '2020-11-14'),
(21, '2', '146647376a2d745438b169aa956f749f.jpg', 'ea', '640', 'Et exercitationem harum quia libero omnis omnis dolorum. Dignissimos molestiae quae rerum quas ipsum aliquid accusantium dolores. Quia earum adipisci excepturi aut repellat veritatis natus. Sit laboriosam et quas est aliquam.', '2020-11-14', '2020-11-14'),
(22, '2', '0a5f13f350a759996e3996805783ed50.jpg', 'consequuntur', '640', 'Eos odit modi ex voluptas ut expedita exercitationem. Et et id dolores voluptas quaerat. Ea ut quia distinctio adipisci temporibus.', '2020-11-14', '2020-11-14'),
(23, '2', '0e4f2570a69789688c2b9c2dedd7b9c5.jpg', 'voluptas', '640', 'Unde occaecati quae natus magnam quo voluptate dolor harum. In qui cumque facilis dolor placeat delectus ducimus nemo. Nihil sint repudiandae quo veniam a aliquid minus. Rem vel voluptatum pariatur recusandae. Natus dolorum itaque sit.', '2020-11-14', '2020-11-14'),
(24, '2', '979571a71f867b8f7fb64a5de5ef818c.jpg', 'possimus', '640', 'Delectus quam itaque natus sint qui pariatur laboriosam quisquam. Et iste et et omnis. Voluptas expedita praesentium est iusto. Et aut labore distinctio magni.', '2020-11-14', '2020-11-14'),
(25, '2', 'f809785791cd3371234b0200bdac8928.jpg', 'esse', '640', 'Nesciunt ipsa minus quod officiis tenetur ut cupiditate. Neque placeat impedit molestias minima. Commodi sunt totam dolor beatae. Dolorem aut libero sunt modi asperiores vel ipsam.', '2020-11-14', '2020-11-14'),
(26, '2', 'fe1a4f7020dcb287fc302e0283009f70.jpg', 'esse', '640', 'Qui exercitationem repellat id dolorem. Iste qui aut cum nesciunt et nesciunt asperiores. Ducimus modi non mollitia error ut minus.', '2020-11-14', '2020-11-14'),
(27, '2', 'a520f15ef3adb615a0d992dfe613412b.jpg', 'quis', '640', 'Qui voluptatem in magni. Sint impedit optio fugit quo non in amet. Consequatur dolorem repudiandae eligendi voluptatem eos. Rerum ut veniam ad ipsam nulla consequatur. Nihil autem pariatur ut ea enim.', '2020-11-14', '2020-11-14'),
(28, '2', '5512a135512a06dafbfd38ca8e452711.jpg', 'distinctio', '640', 'Aperiam repellendus omnis et quae animi voluptas. Et quo omnis atque corrupti quo quam. Aut asperiores nesciunt repudiandae optio. Commodi voluptatum quo in quis nobis.', '2020-11-14', '2020-11-14'),
(29, '2', '5f2c2f32c11180ae52d7733b6c44cfda.jpg', 'fugiat', '640', 'Aperiam alias magni quas fugit optio. Quo molestiae officia hic repellat iusto. Aperiam et consequatur aut ea qui pariatur reiciendis nihil.', '2020-11-14', '2020-11-14'),
(30, '1', '72662f89748b52f4930feb458ec0e6ef.jpg', 'nam', '640', 'Veniam laborum excepturi earum omnis architecto corrupti nostrum. Autem voluptatem amet dolorem perferendis. Numquam laborum fugit quibusdam. Non recusandae itaque vel consequatur.', '2020-11-14', '2020-11-14'),
(31, '1', 'f0da47de89486112e997ae97ef0c31bf.jpg', 'ad', '640', 'Magnam aperiam commodi aut itaque eos quasi. Impedit excepturi ut commodi qui magni sunt aut. Facilis et magni incidunt et et beatae delectus.', '2020-11-14', '2020-11-14'),
(32, '1', '9c2d29ae8c24b5f9c7d24b0997495220.jpg', 'enim', '640', 'Omnis dolor consequatur corporis id quo officiis atque et. Nostrum impedit et debitis dolorem ab quia consequatur. Voluptate consectetur qui qui consequatur.', '2020-11-14', '2020-11-14'),
(33, '1', 'ed72783b4fa3ebd8d446da50f8820928.jpg', 'magnam', '640', 'Voluptatem non quia autem sit unde quo. Autem blanditiis deserunt omnis officia tenetur est id. Qui quia perspiciatis non vero ut dolorum quibusdam dolor.', '2020-11-14', '2020-11-14'),
(34, '1', 'b8f5d2438ee71f620539eecdc6b67b42.jpg', 'quia', '640', 'Illum numquam velit earum libero ab voluptas. Aspernatur rerum unde dolore. Nihil ut ullam et enim recusandae.', '2020-11-14', '2020-11-14'),
(35, '1', '2ee13fe8ffc00f776dc552f26a68d763.jpg', 'dolor', '640', 'Id occaecati aut nihil amet ut autem autem. Labore asperiores cupiditate autem est modi. Deleniti est dicta odit eius error aspernatur. Doloremque quas eos exercitationem aliquam mollitia aliquid rerum.', '2020-11-14', '2020-11-14'),
(36, '1', 'c6448e0634b7d5f0e045a58ca588dfd7.jpg', 'quo', '640', 'Nostrum sunt sint recusandae enim. Aliquid autem voluptas asperiores cumque. Assumenda magnam illo sed minus porro dolorem voluptas.', '2020-11-14', '2020-11-14'),
(37, '1', 'd50babf42410fe6d7ab85639ee61341a.jpg', 'aut', '640', 'Quis nostrum laboriosam laudantium repudiandae est. Sed assumenda non aut ipsam est dicta id aut. Enim id animi voluptates.', '2020-11-14', '2020-11-14'),
(38, '1', '35122256a883126ae87f192a5f21de6a.jpg', 'sint', '640', 'Ea esse quaerat laborum adipisci sed dolor magni. Veniam vitae laborum ad. Officiis cum perferendis nostrum.', '2020-11-14', '2020-11-14'),
(39, '1', '910a4ada60e553998f3c5b88bb06bb41.jpg', 'ratione', '640', 'Sunt adipisci recusandae quis vel soluta velit aut velit. Sit molestias beatae esse debitis dolor sint id. Corporis officia minus ab explicabo.', '2020-11-14', '2020-11-14'),
(40, '1', 'ad71f54c7e4bd8989eaa30276fcdc41f.jpg', 'ipsa', '640', 'Quasi et quae aut magnam delectus nulla quia aspernatur. Illum quis non ex sequi voluptatem voluptas et. Accusantium minus natus qui aperiam vero cum et et.', '2020-11-14', '2020-11-14'),
(41, '1', '4fccf6b928fca3d56a8b59f8da24c437.jpg', 'quos', '640', 'Sit veniam qui repudiandae pariatur culpa. Perspiciatis explicabo et nihil amet porro eos sapiente praesentium. Voluptatem eum quas eum repellat deleniti et.', '2020-11-14', '2020-11-14'),
(42, '1', '242b8ffae5e791e4e5ddc8d03d9b035d.jpg', 'nesciunt', '640', 'Consectetur est nihil nostrum fugit blanditiis. Et rem odit animi ab ut ducimus. Perspiciatis iste nulla quis commodi reiciendis quae iusto debitis.', '2020-11-14', '2020-11-14'),
(43, '1', '6791c5a0890fe553e7975f746d3dfecb.jpg', 'dignissimos', '640', 'Necessitatibus sed eveniet dolor dolorem in. Ut consequatur aut dolor illo tempora qui impedit earum. Facilis at beatae maiores. Dicta corrupti vel illo repudiandae.', '2020-11-14', '2020-11-14'),
(44, '1', 'ac1877d9236c7812512c9e338f2502cf.jpg', 'quisquam', '640', 'Ex enim nesciunt eveniet dolor rerum amet. Nisi totam omnis et voluptates nulla aliquid laboriosam. Consequatur beatae quo iusto rerum.', '2020-11-14', '2020-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `content`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 4, 'brerea', 'berea', 'traiasca berea in care ne-am nascut\r\nCat de rea o fii \r\nTot mai bine la noi in tara', '2023-08-03 04:35:28', '2023-08-03 04:53:55', '0'),
(3, 2, 4, 'Muzica', 'muzica11', 'Muzica este cel mai tare metoda de relaxare', '2023-08-03 04:47:58', '2023-08-03 04:52:19', '0'),
(5, 28, 36, 'molestias', 'aut', 'Et ut rem vero vel dolorum veritatis. Impedit adipisci voluptatem alias reprehenderit. Dolor qui et neque asperiores debitis quis.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '5'),
(6, 46, 48, 'quis', 'et', 'Quia sint dolor consequatur ipsam similique voluptatem. Sed sed ad quos est aut excepturi at laboriosam. Ipsam et reprehenderit distinctio qui. Voluptatem amet quia et non dolorum qui neque.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '9'),
(7, 14, 50, 'cupiditate', 'ipsam', 'Voluptas repellendus dolor officiis et ea. Omnis sit inventore dolorem ut deleniti modi. Esse et fuga molestias dolorem consequatur dolore.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '3'),
(8, 35, 16, 'suscipit', 'voluptas', 'Voluptas et et totam voluptatem tempore ad. Ipsum et ea ut qui libero quas nobis. Nesciunt ipsum voluptatibus at quo repellendus et. Repellat quia magnam quae enim minus eum.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '8'),
(9, 22, 15, 'eum', 'id', 'Nam incidunt sit placeat qui vel voluptas voluptatem. Possimus ut dolore vel occaecati in deserunt. Ratione incidunt tempore modi quo voluptas vitae ipsum.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '0'),
(10, 49, 12, 'cupiditate', 'ipsam', 'Odio nihil asperiores dolores dicta eius consequuntur voluptatem mollitia. Officia neque facere et cum sit sint ipsa rem. Laborum velit dolor nemo ad qui.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '1'),
(11, 41, 34, 'quidem', 'vero', 'Nihil nihil dolores excepturi voluptatem dicta amet. Enim id est quae est ad et. Voluptas eum est aspernatur omnis iure ea vitae. Rerum qui veniam impedit qui maiores asperiores pariatur.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '6'),
(12, 32, 21, 'distinctio', 'eum', 'Rem similique aspernatur earum ea. Minus sint earum illo illo quia. Maiores ea est laborum dolorum nemo.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '6'),
(13, 9, 39, 'in', 'et', 'Ea odit quis ut ut rerum in. Maiores et aut et. Similique neque eligendi accusamus molestiae.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '1'),
(14, 20, 1, 'assumenda', 'laudantium', 'Enim nostrum magni reprehenderit rerum sunt non. Exercitationem dolor omnis natus dolores rem minus sequi. Rerum inventore eos est.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '4'),
(15, 19, 47, 'sit', 'temporibus', 'Hic aperiam aliquam ex aut quisquam. Cupiditate placeat ipsam aliquid maiores facilis. Qui voluptatibus tempore accusantium omnis. Vitae et et consequatur itaque eaque dolor eum libero.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '6'),
(16, 11, 7, 'accusamus', 'ut', 'Sapiente similique pariatur culpa nemo. Natus harum ullam et commodi aut. Et quam beatae eum est ducimus. Sunt inventore sed suscipit.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '9'),
(17, 29, 25, 'impedit', 'ex', 'Eos fugit provident repellendus quo. Sunt perferendis a doloribus dolores commodi dicta quia. Voluptatum numquam praesentium atque beatae amet libero dolorem.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '8'),
(18, 17, 6, 'eum', 'dicta', 'Sit sed voluptatem ex nemo. Non et ut omnis corporis. Magni quasi sint illum dolorem commodi quas.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '1'),
(19, 37, 5, 'dolores', 'occaecati', 'Et iusto accusamus velit minus. Delectus et quas consequuntur ut ut. Minus ducimus voluptas quis excepturi sit. Totam ut dolor voluptatem minima.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '0'),
(20, 30, 13, 'velit', 'nulla', 'Non sapiente nemo totam ducimus. Et autem totam ratione eaque quidem modi quod. Placeat id voluptas recusandae saepe ipsum.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '6'),
(21, 10, 45, 'ab', 'aliquam', 'Et dolorum tenetur laboriosam sed dignissimos. Illo harum asperiores velit odit assumenda praesentium exercitationem. In doloremque amet perspiciatis.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '4'),
(22, 2, 4, 'ea', 'aut', 'Non et quidem earum totam et. Optio rerum repellendus fugiat doloribus nobis tempora et non. In ipsum repellendus repellat repellat esse soluta quia. Dolore architecto ducimus rerum est ipsum facere.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '4'),
(23, 8, 33, 'et', 'harum', 'Tenetur distinctio voluptatem et magnam dolorem. Et pariatur ut iure et totam minima corrupti. Modi neque culpa sunt modi sed facere. Tenetur error at reprehenderit.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '1'),
(24, 23, 44, 'a', 'non', 'Aut et provident quia qui sint assumenda non ipsa. Aut aut vel esse. Aut rerum provident et libero mollitia dolor sit. Reprehenderit et exercitationem molestiae cupiditate.', '2023-08-06 02:38:17', '2023-08-06 02:38:17', '8');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categ_id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `rating` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `categ_id`, `title`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 'home alone ', 'is a comedy movie', '3', '2020-11-03', '2020-11-10'),
(2, 10, 'qui', 'Est dignissimos vero unde adipisci cupiditate natus nihil. Tempore laudantium dolore omnis aut ipsa doloribus aut. Aut commodi nemo dolorum error quaerat dolorem deleniti. Sequi neque quibusdam facere eos iure vel. Aut est cupiditate reiciendis.', 'recusandae', '2020-11-17', '2020-11-17'),
(3, 11, 'numquam', 'Nobis voluptatem fugiat possimus dolorem minus. Eius maiores aut non officiis asperiores et reprehenderit quia. Sint aut non ipsum et asperiores. Voluptatem nam necessitatibus sit modi molestiae.', 'quae', '2020-11-17', '2020-11-17'),
(4, 0, 'hic', 'Ipsa illo vero voluptatum repudiandae. Et non et et nam rerum corrupti. Nulla repellendus repudiandae expedita enim velit.', 'rerum', '2020-11-17', '2020-11-17'),
(5, 0, 'quia', 'Et voluptas occaecati minus dignissimos error corrupti. In soluta sequi quo aut veritatis et. Unde unde et inventore voluptas consectetur qui molestias. Vero rerum quo alias reprehenderit veritatis perferendis.', 'deleniti', '2020-11-17', '2020-11-17'),
(6, 0, 'molestiae', 'Repellat doloremque minus similique voluptas quae quo modi mollitia. Eius eligendi eius sed ut. Laboriosam voluptatum alias autem rem.', 'qui', '2020-11-17', '2020-11-17'),
(7, 0, 'modi', 'Nam in voluptatum beatae. Consequatur deleniti consequatur sint doloribus iure. Dolore adipisci dignissimos iusto quia qui numquam voluptates exercitationem. Reprehenderit excepturi ipsa earum ratione veritatis at dolorem.', 'aut', '2020-11-17', '2020-11-17'),
(8, 0, 'iusto', 'Iusto mollitia dicta mollitia omnis enim nulla. Porro dicta sequi est. Fuga laudantium dolor animi voluptatem qui. Animi similique ut ut aliquam consequatur est est.', 'autem', '2020-11-17', '2020-11-17'),
(9, 0, 'amet', 'Cumque optio aliquam aut qui. Blanditiis necessitatibus quis sint a expedita officia quo. Nostrum ea dolores voluptates dolor nesciunt occaecati.', 'et', '2020-11-17', '2020-11-17'),
(10, 0, 'sit', 'Officia et excepturi ex laborum doloremque aliquid. Accusantium saepe quisquam neque itaque voluptas. Possimus enim officia odio accusantium autem soluta perferendis distinctio.', 'voluptas', '2020-11-17', '2020-11-17'),
(12, 0, 'voluptatibus', 'Ipsum nulla rem officiis et animi voluptatem. A fugit perferendis veniam tenetur voluptatem ut. Quibusdam odit possimus odio aliquam consectetur.', 'amet', '2020-11-17', '2020-11-17'),
(13, 0, 'maxime', 'Fugiat similique aliquid distinctio autem dolorem eius molestiae. Earum nihil ut eos non sit.', 'molestiae', '2020-11-17', '2020-11-17'),
(14, 0, 'harum', 'Ut accusantium a voluptatem a vel iusto nobis quisquam. Debitis natus amet sed voluptatum facere excepturi quisquam rerum. Doloremque quos nisi ad impedit. Ipsum omnis impedit voluptas accusantium aut temporibus dolor.', 'sit', '2020-11-17', '2020-11-17'),
(15, 0, 'in', 'Non unde laborum consequatur perferendis. Ut ut magnam quae libero voluptas accusantium tempore. Veniam excepturi vitae ullam voluptatibus. Consequatur voluptas et ab quo. Qui rem repellat similique ipsa.', 'culpa', '2020-11-17', '2020-11-17'),
(16, 0, 'eveniet', 'Fuga dicta tempora facere odio in vel. Iure sed autem incidunt alias qui. Libero eum at nihil ad aut placeat eum dolorem.', 'libero', '2020-11-17', '2020-11-17'),
(18, 0, 'fotbal', 'is a simple game', '5', '2020-11-17', '2020-11-17'),
(19, 0, 'Mouse', 'is a componet of computer', '3', '2023-07-03', '2023-07-03'),
(20, 3, 'Ciuc', 'Ciuc Pilsner is known for its crisp and refreshing taste, typical of the Pilsner style of beer. It is brewed using high-quality ingredients, including malted barley, hops, water, and yeast. The beer undergoes a traditional brewing process, including fermentation and maturation, to achieve its characteristic flavor profile.', '5', '2023-07-03', '2023-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.jpg',
  `last_seen` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `gender`, `photo`, `last_seen`) VALUES
(2, 'Angel Okuneva', 'ereilly@example.com', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LzOEZoHwLz', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(3, 'Rosemarie Beahan', 'althea.corkery@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AfMVQexgbF', '2023-07-02 10:16:00', '2023-08-06 02:38:47', NULL, 'default.jpg', '2023-08-06 02:38:47'),
(4, 'Mr. Elliot Kuvalis', 'holden.morar@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lS2ZonOyaH', '2023-07-02 10:16:00', '2023-08-03 04:55:02', NULL, 'default.jpg', '2023-08-03 04:55:02'),
(5, 'Mr. Harley Koch', 'pfeffer.louisa@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VKb4AU16u7', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(6, 'Alba Yundt DVM', 'qlarkin@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'k6C0wlKLEF', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(7, 'Baron Jaskolski', 'reichel.grayson@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KcNJ2omVan', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(8, 'Mrs. Alexandrea Corkery DVM', 'zita.murray@example.com', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oVonRcn45L', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(9, 'Mr. Lonnie Mitchell I', 'cortez.marks@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2H7QXHUVdj', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(10, 'Bernice Dickinson', 'dion.koepp@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LFSQhfmv4F', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(11, 'Vilma Ankunding', 'ceasar.hettinger@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7nqxCpAWo4', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(12, 'Evelyn Gutkowski', 'imorar@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hdFslJ5GZ2', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(13, 'Miss Loma Gulgowski Jr.', 'kristopher71@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XaFaxZaj2T', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(14, 'Garth Corwin MD', 'cruickshank.gerry@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CxgVFj0cVR', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(15, 'Theodore Reinger', 'maci.haag@example.com', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZsLxoY0z7d', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(16, 'Leonor Mitchell IV', 'glenda.spencer@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YG1EAgEdaG', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(17, 'Lia Schowalter II', 'samson59@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KEZJAIWgAK', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(18, 'Katrine Larson', 'lokuneva@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BNZ7kk9z23', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(19, 'Alvena Davis', 'brekke.ismael@example.com', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JaNDVyzHWF', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(20, 'Prof. Fannie McDermott DVM', 'chance.jaskolski@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Am8It2UsTg', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(21, 'Lilly Morissette', 'denesik.celia@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OqiMhcXqVB', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(22, 'Kiara Hammes', 'wpredovic@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'H74noG6LbP', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(23, 'Jayde Ritchie', 'dhaley@example.com', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GDsmrWMuTr', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(24, 'Verna McDermott', 'ufritsch@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DUJXYsLQEd', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(25, 'Kris Thiel', 'marilou89@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ONse1gNce4', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(26, 'Mrs. Creola Konopelski', 'lang.casimer@example.com', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8HYzni6Y7u', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(27, 'Ryder Johns', 'rosenbaum.sonny@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NmbFCMIxux', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(28, 'Loren Schiller', 'streich.alyce@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Qwdvalgv8k', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(29, 'Prof. Adam Ruecker Sr.', 'carole.vandervort@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6NsZhZEhyk', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(30, 'Pascale Buckridge', 'tyson.willms@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ym3gnwXqF6', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(31, 'Milton Waelchi', 'qcarter@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5nde1cKNPl', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(32, 'Viola Schmidt', 'ichristiansen@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dsAJOau6zN', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(33, 'Maritza Breitenberg', 'bahringer.agnes@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kxt4JbeWuM', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(34, 'Meta Bogan', 'crystel.kiehn@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cf6obKSvMY', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(35, 'Harvey Stark MD', 'veffertz@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pkp84ePJJc', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(36, 'Mrs. Mable Johnston', 'patsy.wunsch@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pHOTckXdQ2', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(37, 'Dexter Cremin Jr.', 'vhintz@example.com', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'er4jstBzlG', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(38, 'Prof. Dusty Stroman', 'shad.witting@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vn1OPTthsY', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(39, 'Miss Adelia Mertz DDS', 'wsenger@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FNqFgSh3kI', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(40, 'Dianna Crist', 'haven.howe@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Eo80e340qc', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(41, 'Monica Hudson', 'imani09@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lovMgvfcEb', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(42, 'Dr. Demarcus Romaguera DVM', 'sarah19@example.net', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ny3fpMFJQe', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(43, 'Heidi Bauch', 'maida.ratke@example.com', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'z0oLwlDv7y', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(44, 'Jacinthe Kuvalis', 'monahan.hertha@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hjX5VwAFtI', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(45, 'Greyson Langworth III', 'jast.myrtle@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6Z8OIa2oDQ', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(46, 'Prof. Archibald Hackett DVM', 'constance22@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gAvFLLaOPH', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(47, 'Arnulfo Ruecker', 'effie49@example.org', '', '2023-07-02 10:16:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cAz6ijhHvw', '2023-07-02 10:16:00', '2023-07-02 10:16:00', NULL, 'default.jpg', NULL),
(48, 'Orrin Bartell', 'Orrin@gmail.com', '07444561', '2023-07-02 10:16:00', '$2y$10$o4NG5SdiPSu82yETNr9Ty.f4ER7uqRXEWghwQr6kQ7Jyj3ILEFqb6', '9MZ5XZG340', '2023-07-02 10:16:00', '2023-07-08 04:23:48', 'masculin', '2023-07-08-06-23-48-8k0rBhsw_male_34_cartoon12.png', NULL),
(49, 'Prof. Jo Mayert', 'monty@gmail.com', '0477123456', '2023-07-02 10:16:00', '$2y$10$BuDeVvHeZzvqdkIBlNRTjOkwMUbUZbcHS44E22fZgAm2v9n9pOU7y', 'H9ZzTDCwma', '2023-07-02 10:16:00', '2023-07-07 03:22:15', 'masculin', '2023-07-07-05-22-15-8k0rBhsw_male_34_cartoon20.png', NULL),
(50, 'Monty Olson DDS', 'monty@gmail.com', '0477123456', '2023-07-02 10:16:00', '$2y$10$Nsej1MI8DsF5DHzfjqyfPucuhjrHKPw5HfR0GaK7KstfHOsjI/5GC', 'JCzW6qpiJe', '2023-07-02 10:16:00', '2023-07-07 03:14:29', 'masculin', '2023-07-07-05-14-29-8k0rBhsw_male_34_cartoon18.png', NULL),
(51, 'Madilyn Moen', 'madilyn@gmail.com', '7775612', '2023-07-02 10:16:00', '$2y$10$HduZQ62Lhqaj4GiFO5J9jOCyGcauokA3aLi8CyFLpo79XAiYWL3Oi', 'KKLlpXMFEU', '2023-07-02 10:16:00', '2023-07-07 03:13:48', NULL, '2023-07-07-05-13-48-photo_2023-07-03_20-40-08.jpg', NULL),
(53, 'Nelu122', 'nelu@yahoo.com', '0745666', NULL, '$2y$10$.kAUI6UTClcj4WDaerX83uTJvFT4mzOy1RgXdAKLQAaeWOaqzzHr.', NULL, '2023-07-06 04:05:42', '2023-07-06 04:05:42', 'masculin', '1688623542.jpg', NULL),
(54, 'Laura22', 'laura@gmail.com', '07445567', NULL, '$2y$10$3HGHURi0HqdPfSDTuK3kTubgQb5SIElF2/Fa7V.BjazrppDBn1Jp.', NULL, '2023-07-06 04:06:40', '2023-08-05 10:08:52', 'femenin', '1688623600.jpg', '2023-08-05 10:08:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
