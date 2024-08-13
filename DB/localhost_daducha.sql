-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2021 às 18:56
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `localhost_daducha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adresses`
--

CREATE TABLE `adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `public_place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adresses`
--

INSERT INTO `adresses` (`id`, `customer_id`, `public_place`, `number`, `zip_code`, `complement`, `reference`, `default`, `deleted_at`, `created_at`, `updated_at`, `state`, `city`, `region`) VALUES
(29, 34, 'Rua da Valeta', '23', '42703590', '', 'Fundo da Base Aérea', 0, '2021-01-15 15:08:02', '2021-01-15 14:48:13', '2021-01-15 15:08:02', 'BA', 'Lauro de Freitas', 'Centro'),
(30, 34, 'Rua da Valeta', '23', '42703590', '', 'Base aérea', 0, '2021-03-19 18:20:36', '2021-01-15 17:25:21', '2021-03-19 18:20:36', 'BA', 'Lauro de Freitas', 'Centro'),
(31, 35, 'Rua da Valeta', '23', '42703590', '', 'Frente', 0, NULL, '2021-01-20 12:36:33', '2021-01-20 12:36:33', 'BA', 'Lauro de Freitas', 'Centro'),
(32, 36, 'Rua da Valeta', '23', '42703590', '', 'asd', 0, NULL, '2021-03-03 19:19:24', '2021-03-03 19:19:24', 'BA', 'Lauro de Freitas', 'Centro'),
(33, 34, 'Rua da Valeta', '23', '42703590', '', 'Em Frente a escolinha infância Feliz', 1, '2021-03-19 18:40:38', '2021-03-19 18:36:47', '2021-03-19 18:40:38', 'BA', 'Lauro de Freitas', 'Centro'),
(34, 34, 'Rua da Valeta', '23', '42703590', '', 'Em Frente a escolinha infância Feliz', 1, '2021-03-19 18:44:17', '2021-03-19 18:42:01', '2021-03-19 18:44:17', 'BA', 'Lauro de Freitas', 'Centro'),
(35, 34, 'Rua da Valeta', '23', '42703590', '', 'Fundo da base aérea', 1, '2021-03-22 18:57:22', '2021-03-19 18:46:23', '2021-03-22 18:57:22', 'BA', 'Lauro de Freitas', 'Centro'),
(36, 34, '1ª Travessa São Jorge', '23', '42703580', '', 'Em Frente a escolinha infância Feliz', 0, '2021-03-22 18:57:20', '2021-03-20 12:00:51', '2021-03-22 18:57:20', 'BA', 'Lauro de Freitas', 'Centro'),
(37, 34, 'Rua da Valeta', '23', '42703590', '', 'Em Frente a escolinha infância Feliz', 0, NULL, '2021-03-22 19:03:54', '2021-03-22 19:03:54', 'BA', 'Lauro de Freitas', 'Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner_institutionals`
--

CREATE TABLE `banner_institutionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path_image_menu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `banner_institutionals`
--

INSERT INTO `banner_institutionals` (`id`, `path_image_menu`, `created_at`, `updated_at`) VALUES
(3, 'roupasite54-1602246173.jpeg', '2020-10-01 19:36:54', '2020-10-09 12:22:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publishing` date NOT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `description`, `text`, `publishing`, `path_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Acessórios', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the vv</span><br></p>', '1959-10-01', 'a818dd8b-ed63-4ad4-89b4-bc6f75061bd4-1598461045.png', '2020-10-02 19:32:21', '2020-08-26 16:57:25', '2020-10-02 19:32:21'),
(2, 2, 'Acessórios', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the vv</span><br></p>', '1959-10-01', 'a818dd8b-ed63-4ad4-89b4-bc6f75061bd4-1598461045.png', '2020-10-02 19:32:26', '2020-08-26 16:57:25', '2020-10-02 19:32:26'),
(3, 3, 'Acessórios', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the vv</span><br></p>', '1959-10-01', 'a818dd8b-ed63-4ad4-89b4-bc6f75061bd4-1598461045.png', '2020-10-02 19:32:30', '2020-08-26 16:57:25', '2020-10-02 19:32:30'),
(4, 4, 'Acessórios', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the&nbsp;</span><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the vv</span><br></p>', '1959-10-01', 'a818dd8b-ed63-4ad4-89b4-bc6f75061bd4-1598461045.png', '2020-10-02 19:32:34', '2020-08-26 16:57:25', '2020-10-02 19:32:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`id`, `holder_name`, `number`, `expiration_date`, `brand`, `parcel`, `created_at`, `updated_at`) VALUES
(0, 'qwe', '0000', '00/0000', '1', 0, '2020-10-19 03:00:00', '2020-10-19 03:00:00'),
(3, 'Antonia Abrantes Bezerra', '5443150129043789', '08/2023', 'MASTERCARD', 5, '2020-10-13 21:38:07', '2020-10-13 21:38:07'),
(4, 'ANTONIA A BEZERRA', '5443150129043789', '08/2023', 'MASTERCARD', 5, '2020-10-13 21:45:31', '2020-10-13 21:45:31'),
(5, 'ANTONIA A BEZERRA', '5443150129043789', '08/2023', 'MASTERCARD', 5, '2020-10-14 00:35:39', '2020-10-14 00:35:39'),
(6, 'ANTONIA A BEZERRA', '5443150129043789', '08/2023', 'MASTERCARD', 5, '2020-10-14 15:37:02', '2020-10-14 15:37:02'),
(7, 'Anderson de S Viana', '4111111111111111', '12/2030', 'VISA', 4, '2020-10-16 18:37:15', '2020-10-16 18:37:15'),
(8, 'Anderson de S Viana', '4111111111111111', '12/2030', 'VISA', 4, '2020-10-16 18:42:59', '2020-10-16 18:42:59'),
(9, 'Anderson de S Viana', '4111111111111111', '12/2030', 'VISA', 5, '2020-10-16 18:47:06', '2020-10-16 18:47:06'),
(11, 'amelia lustosa', '4110490504173354', '06/2026', 'VISA', 1, '2020-10-19 21:16:27', '2020-10-19 21:16:27'),
(12, 'Anderson S Viana', '4040240083428207', '05/2025', 'VISA', 1, '2020-10-21 18:43:08', '2020-10-21 18:43:08'),
(13, 'Anderson S Viana', '4040240083428207', '05/2025', 'VISA', 1, '2020-10-21 18:55:57', '2020-10-21 18:55:57'),
(14, 'AMELIA Z C A LUSTOS', '5582859908954922', '02/2022', 'MASTERCARD', 1, '2020-10-21 20:31:56', '2020-10-21 20:31:56'),
(15, 'Samara almeida lima', '6516529999398904', '09/2023', 'ELO', 3, '2020-11-08 10:35:11', '2020-11-08 10:35:11'),
(16, 'Felipe s Carvalho', '5162929829273153', '09/2028', 'MASTERCARD', 5, '2020-11-09 23:13:19', '2020-11-09 23:13:19'),
(17, 'SAMIA BARRETO LUSTOSA', '5156010032490302', '05/2025', 'MASTERCARD', 1, '2021-01-12 20:20:03', '2021-01-12 20:20:03'),
(18, 'Anderson de S Viana', '4111********1111', '12/2030', 'VISA', 1, '2021-01-30 13:26:06', '2021-01-30 13:26:06'),
(19, 'Anderson de S Viana', '4111********1111', '12/2030', 'VISA', 1, '2021-01-30 13:46:29', '2021-01-30 13:46:29'),
(20, 'Lorena S Borges', '5502********3582', '06/2027', 'MASTERCARD', 1, '2021-01-30 14:23:19', '2021-01-30 14:23:19'),
(21, 'Anderson de S Viana', '4111111111111111', '12/2030', 'MASTERCARD', 1, '2021-02-01 14:00:20', '2021-02-01 14:00:20'),
(22, 'Anderson de S Viana', '4111111111111111', '12/2030', 'VISA', 1, '2021-02-03 11:48:39', '2021-02-03 11:48:39'),
(23, 'ANDERSON VIANA', '4111111111111111', '03/2029', 'MASTERCARD', 3, '2021-03-20 11:24:40', '2021-03-20 11:24:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 0,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `featured`, `active`, `path_image`, `deleted_at`, `created_at`, `updated_at`, `color`, `order`) VALUES
(1, '0', '', 0, 0, NULL, '2020-08-24 15:36:31', '2020-08-24 15:36:31', '2020-08-24 15:36:31', NULL, 0),
(2, 'Moda para meninas', 'moda-para-meninas', 1, 1, 'site-novo-2-1599830316.png', NULL, '2020-08-24 19:59:00', '2021-01-15 13:48:13', 'rgba(255, 125, 28, 0.97)', 0),
(3, 'Moda para  Meninos', 'moda-para-meninos', 1, 1, 'site-novo-3-1599830304.png', NULL, '2020-08-24 20:14:51', '2021-01-15 13:48:27', 'rgba(255, 125, 28, 0.97)', 0),
(4, 'Moda para  Bebês', 'moda-para-bebes', 1, 1, 'site-novo-1599830332.png', NULL, '2020-08-24 20:15:14', '2021-01-15 13:48:32', 'rgba(255, 125, 28, 0.97)', 0),
(5, 'Lançamentos Daducha', 'lancamentos-daducha', 1, 1, 'hanger-1598300137.png', NULL, '2020-08-24 20:15:37', '2021-01-15 13:48:48', 'rgba(255, 125, 28, 0.97)', 0),
(6, 'Promoções', 'promocoes', 1, 1, 'site-novo-4-1599831878.png', NULL, '2020-08-24 20:16:02', '2021-01-15 13:48:50', 'rgba(255, 125, 28, 0.97)', 1),
(7, 'Acessórios', 'acessorios', 1, 1, 'site-novo-5-1599832456.png', NULL, '2020-08-24 20:16:25', '2021-01-15 13:48:52', 'rgba(255, 125, 28, 0.97)', 0),
(8, 'Moda Praia', 'moda-praia', 0, 0, NULL, NULL, '2021-03-26 17:06:29', '2021-03-26 17:06:29', 'rgb(40, 78, 149)', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category_blogs`
--

CREATE TABLE `category_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `category_blogs`
--

INSERT INTO `category_blogs` (`id`, `title`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'categoria01', 1, NULL, '2020-08-26 16:53:43', '2020-08-26 16:53:43'),
(2, 'categoria02', 1, NULL, '2020-08-26 16:53:43', '2020-08-26 16:53:43'),
(3, 'categoria03', 1, NULL, '2020-08-26 16:53:43', '2020-08-26 16:53:43'),
(4, 'categoria04', 1, NULL, '2020-08-26 16:53:43', '2020-08-26 16:53:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_form` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_archive` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `email_form`, `instagram`, `whatsapp`, `youtube`, `twitter`, `facebook`, `created_at`, `updated_at`, `address`, `path_archive`) VALUES
(1, '71 3366-0879', 'contato@daducha.com.br', 'contato@daducha.com.br', 'lojadaducha', '71 99696-3001', '', '', 'daducha', '2020-08-24 20:57:03', '2021-02-01 19:04:06', '<p><b>Shopping da Bahia </b><br>Av. Tancredo Neves, 148 · (71) 3450-2113&nbsp;<br><br><b>Salvador Shopping </b><br>Av. Tancredo Neves, 2915 - 1202 · (71) 3019-3967<br></p>', 'politica-de-troca-daducha-1612206246.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `use_limit` int(11) DEFAULT NULL,
  `fixed_value` tinyint(1) NOT NULL DEFAULT 0,
  `first_order_only` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `percentage` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `amount`, `use_limit`, `fixed_value`, `first_order_only`, `active`, `deleted_at`, `created_at`, `updated_at`, `percentage`) VALUES
(1, 'LIQUI20', '20.00', NULL, 0, 0, 1, NULL, '2020-09-09 13:41:09', '2021-03-04 18:22:04', 1),
(2, 'BEMVINDO', '10.00', NULL, 0, 1, 1, NULL, '2020-10-06 21:12:43', '2020-10-06 21:13:32', 1),
(3, 'SCHOOL15', '15.00', NULL, 0, 1, 1, NULL, '2020-10-06 21:13:10', '2020-10-09 18:55:17', 1),
(4, 'LUCIANA', '5.00', NULL, 0, 0, 1, NULL, '2020-11-10 19:33:08', '2021-03-04 18:22:12', 0),
(5, 'ALINE', '5.00', NULL, 0, 0, 1, NULL, '2020-11-10 19:33:22', '2020-11-10 19:33:22', 1),
(6, 'FERNANDA', '5.00', NULL, 0, 0, 1, NULL, '2020-11-10 19:33:52', '2020-11-10 19:33:52', 1),
(7, 'GIL', '5.00', NULL, 0, 0, 1, NULL, '2020-11-10 19:34:06', '2020-11-10 19:35:06', 1),
(8, 'ELISABETH', '5.00', NULL, 0, 0, 1, NULL, '2020-11-10 19:34:51', '2020-11-10 19:34:51', 1),
(9, 'PAULA', '5.00', NULL, 0, 0, 1, NULL, '2020-12-01 13:22:16', '2020-12-01 13:22:16', 1),
(10, 'UINE', '5.00', NULL, 0, 0, 1, NULL, '2020-12-01 13:22:53', '2020-12-01 13:22:53', 1),
(11, 'ROSE', '5.00', NULL, 0, 0, 1, NULL, '2020-12-23 13:41:29', '2020-12-23 13:41:29', 1),
(12, 'LIA', '10.00', NULL, 0, 0, 1, NULL, '2021-01-04 12:43:34', '2021-01-04 12:43:34', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `cpf`, `phone`, `email_verified_at`, `password`, `active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(34, 'Anderson viana', 'frontend@hoom.com.br', '04506018540', '7133782327', '2021-01-15 14:45:27', '$2y$10$5xpEJGWHQYb91YykVcIYMe6iFD4xGbOdxiabFxwxwg896uXj8dPXS', 1, NULL, NULL, '2021-01-15 14:45:27', '2021-01-15 14:47:18'),
(35, 'Lorena Border', 'anderson@hoom.com.br', '69889323052', '7133782327', '2021-01-19 17:22:13', '$2y$10$JzKLGWk7nSA21mgjIZQvMO6JXu.Qi/pyrXzmYClBllfPYuNknDL2a', 1, NULL, NULL, '2021-01-19 17:22:13', '2021-01-19 17:22:13'),
(36, 'Rodrigo Gomes', 'rodrigo@hoom.com.br', '65171110000', '7193195114', '2021-03-03 18:48:33', '$2y$10$fNh7iLI/K3fdi2W9TPkkeeEqs71NjgMTFE4WHKCkn8guoQj/XsrpW', 1, NULL, NULL, '2021-03-03 18:48:33', '2021-03-03 18:48:33'),
(42, 'Vitória Rayssa Fernandes', 'nandos.game89@gmail.com', '40403645549', '7133782327', '2021-03-05 15:00:36', '$2y$10$6ip4vVqhDdqReOtx2D503.trnh6fdcNOkU/haH71iwYKjp0/Op7nK', 1, NULL, NULL, '2021-03-05 15:00:35', '2021-03-05 15:00:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer_password_resets`
--

CREATE TABLE `customer_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `extras`
--

CREATE TABLE `extras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `extra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `favorites`
--

INSERT INTO `favorites` (`id`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(17, 164, 42, '2021-03-05 16:54:38', '2021-03-05 16:54:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `integrations`
--

CREATE TABLE `integrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `min_price_freight_free` decimal(10,2) DEFAULT NULL,
  `max_installment_nointerest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pagseguro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_pagseguro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id_me` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_secret_me` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_me` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refresh_token_me` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_expires_in_me` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `integrations`
--

INSERT INTO `integrations` (`id`, `min_price_freight_free`, `max_installment_nointerest`, `email_pagseguro`, `token_pagseguro`, `created_at`, `updated_at`, `client_id_me`, `client_secret_me`, `token_me`, `refresh_token_me`, `token_expires_in_me`) VALUES
(1, '500.00', '4', 'contato.nandos@gmail.com', '846db7d1-7c9e-4b54-896b-9a71a3872d962407851c40629574e2053911cbd79144719d-4f59-4030-8019-56eb26b56e73', '2020-09-18 15:00:11', '2021-01-30 15:15:52', '3365', 'MHfrmnT7hUWA1YQ5reSPZuvTmVkluq3vMGQRWxUv', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImIzOTg3MjMwMmVmNzI1N2E0NTU5NGYwZGM2OTdjODE4ZTVmMmFlOTkyZWNlN2EyNmZhOTYzN2VlYmExZDU0MDczM2IyMWVkOGJkYzY0NjE0In0.eyJhdWQiOiIzMzY1IiwianRpIjoiYjM5ODcyMzAyZWY3MjU3YTQ1NTk0ZjBkYzY5N2M4MThlNWYyYWU5OTJlY2U3YTI2ZmE5NjM3ZWViYTFkNTQwNzMzYjIxZWQ4YmRjNjQ2MTQiLCJpYXQiOjE2MTQ3MTQ5OTMsIm5iZiI6MTYxNDcxNDk5MywiZXhwIjoxNjE3MzA2OTkzLCJzdWIiOiI5ODVkMzcyOC0xM2M1LTRlOTItODA2My01ZGY1MzQ3OWQ2NTkiLCJzY29wZXMiOlsiZWNvbW1lcmNlLXNoaXBwaW5nIiwic2hpcHBpbmctY2FsY3VsYXRlIiwic2hpcHBpbmctY2hlY2tvdXQiXX0.ZIy_moeba3xLcu_4mA1baDsAekCsf74qpKz_0J2-SjHmzGRiVpIDfNCPtaTffnRHj-kFWvh6gEpecBmVQOaF9S7Hvrsc76ebIww7OAg8Q6tGPj5D4zwavPMEspvscy3NLhjAenHzkoLGok2Wrgh9JZ52qZkvhStriwpTeaJYYQ-u3uoF-sUdlAB70gnVTJmbEM8RMvGUvG0Wv9XJiKngEJbcwcQjzaLdmHYqQvFUBpvH3y8qzPGUAr1Q1AqTePr4ZG0-FswYhgXm28k9uAM4eaXtGKM4QV6f1HlYrHA9bcDebM6ELfiB1nrU2Z40HdnhUJDDr10EfIK6MvJk0wqRczgUizK_EqfCsIqZLdZ4kIecLzDOh7ntL0Zji6DdktJ-_Wo7TUGI44SDA8SowNIRHpDt_Oq2sp1fCswLMDp08ytWmSc_7EZ5tCJtSc-htoXQrvDVPULECYiSUJ9qahkof__SXvfMJeirhUBVe7hQgz8ETZ5l0IlfwNpiaSxT_VmLDR0J8WrC-DoNRZjSqIEoUFBo-4W9NeAKhpuLwKEA2H0R4k9WhESjIc-erJeRvlOaFAbUZlxO45NVhxho0bF-EHUQeC2okjeMEKrYdwPAqKKCmmz16m-TjOIUfwKyq5IFE82UMf3MCKL49BnkGpsvlyM3BpXbGJ967zG_ntbmPH8', 'def50200ac5781271d395a4bc26c8d37ffff2d09d3b3760ed434570e8c6ae1151cafbba17db86864e11da7bf9c12dd69a8ec4e710f65c60fe5794daea895b5776c8b308ce9cbb3a80b1538b63fde683173f3de1c2dc21e4f3e1effc1ce6b3514289a4336e897cae2d3029f9516216db2a34241fb2cb0c4382c0ec4528ffaaef27d062b31e235aede7619e3e1cf0d210723091c98601d4d5ac1988b89134925507788feb2c596433d98efc28b6e44a4f3ab9c09337ddfdac71166418dc1fe5808d07ecf0de745f92902b8bdece9098caea831114f33c94e706619a6c1facfb95b932ebbaaf709b8b263f4c42fd2863751e62953455d45f8707030e85f83f27b75351331beeb030cc3d3a24cb26b3112b975290b5b3827b61872caa089a477d4f618f8d59e35e25f6750f618264765f0c0b328c3a2fe54e3a64e824ae3d6b4926eba39cc4929b260cb2d1e196eaf1b70f0e070aa93bc3abea8c175610f20b2f2e7914078dd1c6793e0f405f6c82d26eedb2890a52618c19e4d31efa6262f81165bff5487a0051e596dddc1174b6733fd1fe0c58110abf93d7f2c4a3ad83fe73aa59e9530230b17353329745ed8cca479b935c3e0bd8795523e89264fc635dd336c7948f44fc149', '2021-04-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_21_115839_create_categories_table', 1),
(5, '2020_04_22_135720_create_coupons_table', 1),
(6, '2020_04_23_144216_create_subcategories_table', 1),
(7, '2020_04_24_120109_create_products_table', 1),
(8, '2020_04_24_123207_create_product_galleries_table', 1),
(9, '2020_04_25_140049_create_cities_table', 1),
(10, '2020_04_25_140124_create_regions_table', 1),
(11, '2020_04_27_180052_create_slides_table', 1),
(12, '2020_04_28_005406_create_customers_table', 1),
(13, '2020_04_28_005514_create_customer_password_resets_table', 1),
(14, '2020_04_28_133845_create_adresses_table', 1),
(15, '2020_05_04_195612_create_topics_table', 1),
(16, '2020_05_04_202216_create_contacts_table', 1),
(17, '2020_05_21_174118_create_opening_hours_table', 1),
(18, '2020_05_22_140150_create_extras_table', 1),
(19, '2020_05_27_180612_create_payment_methods_table', 1),
(20, '2020_05_28_090200_create_cards_table', 1),
(21, '2020_05_28_090301_create_orders_table', 1),
(22, '2020_05_28_090305_create_order_items_table', 1),
(23, '2020_06_05_112340_create_tags_table', 1),
(24, '2020_06_05_113329_create_product_tags_table', 1),
(25, '2020_07_14_145015_create_product_option_categories_table', 1),
(26, '2020_07_14_150229_create_product_options_table', 1),
(27, '2020_07_22_155122_create_options_items_table', 1),
(28, '2020_07_27_105542_create_product_sizes_table', 1),
(29, '2020_07_27_110336_create_stocks_table', 1),
(30, '2020_07_27_161050_add_collum_stock_table', 1),
(31, '2020_07_27_162921_add_collum_product_table', 1),
(32, '2020_07_28_110424_drop_collum_adresses_table', 1),
(33, '2020_07_28_111050_add_collum_adresses_table', 1),
(34, '2020_07_28_150111_add_column_category_table', 1),
(35, '2020_07_31_143903_add_column_custom_order_item_table', 1),
(36, '2020_08_03_172307_add_column_product_table', 1),
(37, '2020_08_05_135802_create_category_blogs_table', 1),
(38, '2020_08_05_135803_create_blogs_table', 1),
(39, '2020_08_07_142603_create_posts_table', 1),
(40, '2020_08_07_151058_create_product_models_table', 1),
(41, '2020_08_07_161211_add_collumn_brief_description_products', 1),
(42, '2020_08_21_083354_add_column_link_billet_orders_table', 1),
(43, '2020_09_02_155755_create_product_colors_table', 2),
(44, '2020_09_02_162300_add_columns_product_color_stocks_table', 2),
(45, '2020_09_02_202814_adjusts_color_stocks', 3),
(46, '2020_08_26_100414_create_notification_pushes_table', 4),
(47, '2020_08_26_114246_add_column_freight_orders_table', 4),
(48, '2020_08_31_141230_add_column_restriction_code_orders_table', 4),
(49, '2020_09_05_150453_create_favorites_table', 5),
(50, '2020_09_16_092747_create_banner_institutionals_table', 6),
(51, '2020_09_17_103719_add_column_percent_coupon_table', 6),
(52, '2020_09_17_161210_create_size_charts_table', 6),
(53, '2020_09_17_163357_add_column_size_chart_product_sizes_table', 6),
(54, '2020_09_17_171610_add_column_feature_products_table', 6),
(55, '2020_09_17_175921_create_integrations_table', 6),
(56, '2020_09_29_173557_add_colunm_order_categories_table', 7),
(57, '2020_09_30_112404_add_column_default_stocks_table', 8),
(58, '2020_10_02_152158_create_newsletters_table', 9),
(59, '2020_10_19_153339_add_column_freight_type_orders_table', 10),
(60, '2021_01_08_171156_add_column_address_contacts_table', 11),
(61, '2021_01_15_104040_add_column_slug_category_table', 12),
(62, '2021_01_15_154446_change_column_freight_type_order_table', 13),
(63, '2021_02_01_153619_create_terms_table', 14),
(64, '2021_02_01_154013_add_column_path_archive_contacts_table', 14),
(65, '2021_02_22_200120_melhor_envio_integration_fields', 15),
(66, '2021_03_10_120936_add_column_reference_code_products_table', 16),
(67, '2021_04_05_143343_add_column_deleted_at_orders_table', 17),
(68, '2021_04_26_100019_add_column_order_products_table', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `newsletters`
--

INSERT INTO `newsletters` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Mateus Matos', 'mateus@hoom.com.br', '2021-01-13 13:07:37', '2021-01-13 13:07:37'),
(2, 'Daniel', 'daniel@hoom.com.br', '2021-01-13 13:08:25', '2021-01-13 13:08:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notification_pushes`
--

CREATE TABLE `notification_pushes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menssage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `notification_pushes`
--

INSERT INTO `notification_pushes` (`id`, `title`, `menssage`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Novo Pedido', 'Pedido Nº <b>0309202017563097</b>', 1, 10, '2020-09-03 20:56:37', '2020-09-03 21:28:30'),
(2, 'Novo Pedido', 'Pedido Nº <b>0309202018403488</b>', 1, 10, '2020-09-03 21:40:47', '2020-09-03 21:41:09'),
(3, 'Novo Pedido', 'Pedido Nº <b>0409202012093046</b>', 1, 10, '2020-09-04 15:09:47', '2020-09-09 12:57:42'),
(4, 'Novo Pedido', 'Pedido Nº <b>0210202017243510</b>', 1, 10, '2020-10-02 20:24:42', '2020-10-02 20:31:48'),
(5, 'Novo Pedido', 'Pedido Nº <b>0210202017281539</b>', 1, 10, '2020-10-02 20:28:21', '2020-10-02 20:31:48'),
(6, 'Novo Pedido', 'Pedido Nº <b>1610202015371491</b>', 1, 10, '2020-10-16 18:37:20', '2020-10-17 01:40:41'),
(7, 'Status de Pagamento', 'O pedido <b>1610202015371491</b> foi cancelado', 1, 7, '2020-10-16 18:37:45', '2020-10-17 01:40:41'),
(8, 'Novo Pedido', 'Pedido Nº <b>1610202015470451</b>', 1, 10, '2020-10-16 18:47:06', '2020-10-17 01:40:41'),
(9, 'Status de Pagamento', 'O pedido <b>1610202015470451</b> foi cancelado', 1, 7, '2020-10-16 18:47:40', '2020-10-17 01:40:41'),
(10, 'Novo Pedido', 'Pedido Nº <b>1910202008460366</b>', 1, 10, '2020-10-19 11:46:06', '2020-10-20 13:48:53'),
(11, 'Status de Pagamento', 'O pedido <b>1910202008460366</b> está aguardando pagamento', 1, 1, '2020-10-19 11:46:07', '2020-10-20 13:48:53'),
(12, 'Novo Pedido', 'Pedido Nº <b>1910202010525394</b>', 1, 10, '2020-10-19 13:52:55', '2020-10-20 13:48:53'),
(13, 'Status de Pagamento', 'O pedido <b>1910202010525394</b> está aguardando pagamento', 1, 1, '2020-10-19 13:52:55', '2020-10-20 13:48:53'),
(14, 'Novo Pedido', 'Pedido Nº <b>1910202017540969</b>', 1, 10, '2020-10-19 20:54:11', '2020-10-20 13:48:53'),
(15, 'Status de Pagamento', 'O pedido <b>1910202017540969</b> está aguardando pagamento', 1, 1, '2020-10-19 20:54:12', '2020-10-20 13:48:53'),
(16, 'Novo Pedido', 'Pedido Nº <b>1910202018162589</b>', 1, 10, '2020-10-19 21:16:27', '2020-10-20 13:48:53'),
(17, 'Status de Pagamento', 'O pedido <b>1910202018162589</b> foi cancelado', 1, 7, '2020-10-19 21:16:28', '2020-10-20 13:48:53'),
(18, 'Novo Pedido', 'Pedido Nº <b>2110202011563536</b>', 1, 10, '2020-10-21 14:56:40', '2020-10-21 15:44:09'),
(19, 'Novo Pedido', 'Pedido Nº <b>2110202011590862</b>', 1, 10, '2020-10-21 14:59:14', '2020-10-21 15:44:09'),
(20, 'Novo Pedido', 'Pedido Nº <b>2110202015430161</b>', 1, 10, '2020-10-21 18:43:09', '2020-10-21 19:05:21'),
(21, 'Status de Pagamento', 'O pagamento do pedido <b>2110202015430161</b> foi estornado', 1, 6, '2020-10-21 18:49:56', '2020-10-21 19:05:21'),
(22, 'Novo Pedido', 'Pedido Nº <b>2110202015555275</b>', 1, 10, '2020-10-21 18:55:58', '2020-10-21 19:05:21'),
(23, 'Status de Pagamento', 'O pagamento do pedido <b>2110202015555275</b> foi estornado', 1, 6, '2020-10-21 19:02:53', '2020-10-21 19:05:21'),
(24, 'Novo Pedido', 'Pedido Nº <b>2110202017315122</b>', 1, 10, '2020-10-21 20:31:56', '2020-10-28 14:05:35'),
(25, 'Novo Pedido', 'Pedido Nº <b>2310202011353547</b>', 1, 10, '2020-10-23 14:35:44', '2020-10-28 14:05:35'),
(26, 'Status de Pagamento', 'O pedido <b>1910202008460366</b> foi cancelado', 1, 7, '2020-11-01 10:26:28', '2020-11-05 16:24:50'),
(27, 'Status de Pagamento', 'O pedido <b>1910202010525394</b> foi cancelado', 1, 7, '2020-11-01 10:31:33', '2020-11-05 16:24:50'),
(28, 'Status de Pagamento', 'O pedido <b>1910202017540969</b> foi cancelado', 1, 7, '2020-11-01 10:49:43', '2020-11-05 16:24:50'),
(29, 'Status de Pagamento', 'O pedido <b>2110202011563536</b> foi cancelado', 1, 7, '2020-11-05 10:59:57', '2020-11-05 16:24:50'),
(30, 'Status de Pagamento', 'O pedido <b>2110202011590862</b> foi cancelado', 1, 7, '2020-11-05 11:00:09', '2020-11-05 16:24:50'),
(31, 'Status de Pagamento', 'O pedido <b>2310202011353547</b> foi cancelado', 1, 7, '2020-11-07 10:39:54', '2020-11-12 11:38:14'),
(32, 'Novo Pedido', 'Pedido Nº <b>0811202007350664</b>', 1, 10, '2020-11-08 10:35:14', '2020-11-12 11:38:14'),
(33, 'Novo Pedido', 'Pedido Nº <b>0911202020131144</b>', 1, 10, '2020-11-09 23:13:23', '2020-11-12 11:38:14'),
(34, 'Status de Pagamento', 'O pedido <b>2110202017315122</b> está disponível', 1, 4, '2020-11-20 05:27:46', '2020-11-20 20:52:42'),
(35, 'Status de Pagamento', 'O pedido <b>0811202007350664</b> está disponível', 1, 4, '2020-12-08 04:15:37', '2020-12-09 15:47:30'),
(36, 'Status de Pagamento', 'O pedido <b>0911202020131144</b> está disponível', 1, 4, '2020-12-09 04:37:54', '2020-12-09 15:47:30'),
(37, 'Novo Pedido', 'Pedido Nº <b>1912202010344280</b>', 1, 10, '2020-12-19 13:34:52', '2020-12-22 12:18:37'),
(38, 'Novo Pedido', 'Pedido Nº <b>2412202016135080</b>', 1, 10, '2020-12-24 19:13:59', '2021-01-11 14:44:22'),
(39, 'Status de Pagamento', 'O pedido <b>1912202010344280</b> foi cancelado', 1, 7, '2021-01-02 11:25:31', '2021-01-11 14:44:22'),
(40, 'Novo Pedido', 'Pedido Nº <b>0601202111513833</b>', 1, 10, '2021-01-06 14:51:46', '2021-01-11 14:44:22'),
(41, 'Status de Pagamento', 'O pedido <b>2412202016135080</b> foi cancelado', 1, 7, '2021-01-09 10:44:38', '2021-01-11 14:44:22'),
(42, 'Novo Pedido', 'Pedido Nº <b>1201202115232390</b>', 1, 10, '2021-01-12 18:23:32', '2021-01-12 19:48:16'),
(43, 'Novo Pedido', 'Pedido Nº <b>1201202117195554</b>', 1, 10, '2021-01-12 20:20:06', '2021-01-14 16:01:43'),
(44, 'Novo Pedido', 'Pedido Nº <b>1301202108565852</b>', 1, 10, '2021-01-13 11:57:06', '2021-01-14 16:01:43'),
(45, 'Novo Pedido', 'Pedido Nº <b>1501202114263926</b>', 1, 10, '2021-01-15 17:26:49', '2021-01-15 17:27:20'),
(46, 'Novo Pedido', 'Pedido Nº <b>1501202115271036</b>', 1, 10, '2021-01-15 18:27:19', '2021-01-15 18:33:57'),
(47, 'Novo Pedido', 'Pedido Nº <b>2701202116081336</b>', 1, 10, '2021-01-27 19:08:23', '2021-01-30 14:14:31'),
(48, 'Novo Pedido', 'Pedido Nº <b>2901202110513166</b>', 1, 10, '2021-01-29 13:51:45', '2021-01-30 14:14:31'),
(49, 'Novo Pedido', 'Pedido Nº <b>3001202110462155</b>', 1, 10, '2021-01-30 13:46:35', '2021-01-30 14:14:31'),
(50, 'Novo Pedido', 'Pedido Nº <b>3001202111231720</b>', 1, 10, '2021-01-30 14:23:23', '2021-03-02 13:53:40'),
(51, 'Novo Pedido', 'Pedido Nº <b>0102202111001350</b>', 1, 10, '2021-02-01 14:00:27', '2021-03-02 13:53:40'),
(52, 'Novo Pedido', 'Pedido Nº <b>0302202108483019</b>', 1, 10, '2021-02-03 11:48:45', '2021-03-02 13:53:40'),
(53, 'Novo Pedido', 'Pedido Nº <b>0203202110353125</b>', 1, 10, '2021-03-02 13:35:46', '2021-03-02 13:53:40'),
(54, 'Novo Pedido', 'Pedido Nº <b>2003202108243247</b>', 1, 10, '2021-03-20 11:24:45', '2021-03-20 11:25:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `typeOpening` int(11) NOT NULL,
  `weekDay` int(11) NOT NULL,
  `openingHour` time NOT NULL,
  `closingHour` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `options_items`
--

CREATE TABLE `options_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(5,2) NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autorization` int(11) NOT NULL DEFAULT 0,
  `order_integration_id` bigint(20) NOT NULL,
  `payment_integration_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link_billet` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freight` decimal(5,2) DEFAULT NULL,
  `restriction_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freight_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `address_id`, `card_id`, `status`, `amount`, `coupon`, `autorization`, `order_integration_id`, `payment_integration_id`, `payment_method`, `created_at`, `updated_at`, `link_billet`, `freight`, `restriction_code`, `freight_type`, `deleted_at`) VALUES
(38, 34, 30, 0, 0, '252.20', NULL, 1, 1501202114263926, '1501202114263926', '2', '2021-01-15 17:26:44', '2021-01-15 17:26:44', 'https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=374f8d7a81caa42538ffea1542381ed3c96a2082b956686a58581526aa8c2496fd8db9603fc50d18', '27.80', NULL, 'FP', NULL),
(39, 34, 30, 3, 0, '159.70', NULL, 1, 1501202115271036, '1501202115271036', '2', '2021-01-15 18:27:15', '2021-01-15 18:27:15', 'https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=515e45ccc446198f4dcb12366df7dd98eae66c34b81635c9944aae554982943fa6aeb24ea783f07a', '49.10', NULL, 'SEDEX', NULL),
(40, 35, 31, 0, 0, '112.20', NULL, 1, 2701202116081336, '2701202116081336', '2', '2021-01-27 19:08:18', '2021-01-27 19:08:18', 'https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=29c99ab772e74464809dc5cff68e04f2363972dd5354e3ec2f4643986d2c6e6a75d78d92bde8140a', '0.00', NULL, 'RL', NULL),
(41, 35, 31, 0, 0, '227.00', NULL, 1, 2901202110513166, '2901202110513166', '2', '2021-01-29 13:51:37', '2021-01-29 13:51:37', 'https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=739594a81e71cc2a308880d7d776e60603705786ba405816fa693b65b74b52346225df4fe6c7fd10', '0.00', NULL, 'RL', NULL),
(42, 35, 31, 19, 0, '1.00', NULL, 1, 3001202110462155, '3001202110462155', '', '2021-01-30 13:46:29', '2021-01-30 13:46:29', NULL, '0.00', NULL, 'RL', NULL),
(43, 35, 31, 20, 1, '1.00', NULL, 5, 3001202111231720, '3001202111231720', '', '2021-01-30 14:23:19', '2021-01-30 14:23:19', NULL, '0.00', NULL, 'RL', NULL),
(44, 35, 31, 21, 0, '1.00', NULL, 1, 102202111001350, '0102202111001350', '1', '2021-02-01 14:00:20', '2021-02-01 14:00:20', NULL, '0.00', NULL, 'RL', NULL),
(45, 35, 31, 22, 0, '1.00', NULL, 1, 302202108483019, '0302202108483019', '1', '2021-02-03 11:48:39', '2021-02-03 11:48:39', NULL, '0.00', NULL, 'RL', NULL),
(46, 34, 30, 0, 0, '734.40', NULL, 1, 203202110353125, '0203202110353125', '2', '2021-03-02 13:35:39', '2021-04-05 17:39:02', 'https://pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=2e4ba4cd3ea0a8707685ac2a029047ed5069f9e70054684c3e89a25a90963e8115324f75299f535f', '0.00', NULL, 'FF', '2021-04-05 17:39:02'),
(47, 34, 35, 23, 0, '130.59', 'LIQUI20', 3, 2003202108243247, '2003202108243247', '1', '2021-03-20 11:24:40', '2021-04-05 13:21:17', NULL, '20.43', '', '.Com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attachment_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `amount`, `quantity`, `note`, `deleted_at`, `created_at`, `updated_at`, `attachment_image`, `color`, `slogan`, `size`, `model`) VALUES
(50, 164, 38, '112.20', 2, '', NULL, '2021-01-15 17:26:44', '2021-01-15 17:26:44', '', 'rgb(255, 252, 249)', NULL, '06', NULL),
(51, 53, 39, '110.60', 1, '', NULL, '2021-01-15 18:27:15', '2021-01-15 18:27:15', 'argyle-boys-1599747936.jpeg', 'rgba(0, 1, 2, 0.01)', NULL, 'G', NULL),
(52, 164, 40, '112.20', 1, '', NULL, '2021-01-27 19:08:19', '2021-01-27 19:08:19', '', 'rgb(255, 252, 249)', NULL, '08', NULL),
(53, 164, 41, '112.20', 1, '', NULL, '2021-01-29 13:51:37', '2021-01-29 13:51:37', '', 'rgb(255, 252, 249)', NULL, '10', NULL),
(54, 157, 41, '114.80', 1, '', NULL, '2021-01-29 13:51:37', '2021-01-29 13:51:37', '', 'rgb(255, 239, 91)', NULL, 'P', NULL),
(55, 40, 42, '1.00', 1, '', NULL, '2021-01-30 13:46:29', '2021-01-30 13:46:29', NULL, 'rgba(0, 1, 2, 0)', NULL, '01', NULL),
(56, 40, 43, '1.00', 1, '', NULL, '2021-01-30 14:23:19', '2021-01-30 14:23:19', NULL, 'rgba(0, 1, 2, 0)', NULL, '01', NULL),
(57, 40, 44, '1.00', 1, '', NULL, '2021-02-01 14:00:20', '2021-02-01 14:00:20', NULL, 'rgba(0, 1, 2, 0)', NULL, '01', NULL),
(58, 40, 45, '1.00', 1, '', NULL, '2021-02-03 11:48:39', '2021-02-03 11:48:39', NULL, 'rgba(0, 1, 2, 0)', NULL, '01', NULL),
(59, 108, 46, '127.50', 1, '', NULL, '2021-03-02 13:35:39', '2021-03-02 13:35:39', '', 'rgb(255, 254, 229)', NULL, '01', NULL),
(60, 95, 46, '202.30', 3, '', NULL, '2021-03-02 13:35:39', '2021-03-02 13:35:39', '', 'rgb(237, 186, 186)', NULL, '02', NULL),
(61, 161, 47, '137.70', 1, '', NULL, '2021-03-20 11:24:40', '2021-03-20 11:24:40', '', 'rgb(255, 252, 249)', NULL, '04', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_link` int(11) DEFAULT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `link`, `type_link`, `path_image`, `created_at`, `updated_at`) VALUES
(1, '', 1, 'roupasite53-1602245806.jpeg', '2020-09-21 19:49:26', '2020-10-09 12:16:46'),
(2, '', 1, 'roupasite52-1602245822.jpeg', '2020-09-22 20:36:59', '2020-10-09 12:17:02'),
(3, '', 1, 'roupasite51-1602245837.jpeg', '2020-09-22 20:38:53', '2020-10-09 12:17:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(5,2) NOT NULL,
  `promotinal_value` decimal(5,2) DEFAULT NULL,
  `promotion` tinyint(1) DEFAULT 0,
  `active` tinyint(1) DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inputs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` decimal(5,2) NOT NULL DEFAULT 16.00,
  `height` decimal(5,2) NOT NULL DEFAULT 16.00,
  `length` decimal(5,2) NOT NULL DEFAULT 16.00,
  `weigth` decimal(5,2) NOT NULL DEFAULT 0.30,
  `brief_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `title`, `description`, `amount`, `promotinal_value`, `promotion`, `active`, `slug`, `deleted_at`, `created_at`, `updated_at`, `inputs`, `width`, `height`, `length`, `weigth`, `brief_description`, `feature`, `reference_code`, `order`) VALUES
(0, 1, 1, '', NULL, '0.00', NULL, NULL, NULL, '', '2020-09-09 03:00:00', '2020-08-24 20:22:22', '2020-08-24 20:22:22', '', '0.00', '10.00', '10.00', '10.00', NULL, NULL, NULL, 0),
(1, 1, 1, '', NULL, '0.00', NULL, NULL, NULL, '', '2020-09-09 03:00:00', '2020-08-24 20:22:22', '2020-08-24 20:22:22', '', '0.00', '10.00', '10.00', '10.00', NULL, NULL, NULL, 0),
(40, 2, 2, 'VESTIDO BORBO', '<p class=\"MsoNormal\">Vestido com estampa exclusiva Borbo. Desenvolvido em tecido\r\n100% viscose, e bordado manual na gola. Detalhe de friso color na cintura, com\r\nfranzido na saia da peça + manga longa com tiras regulando o punho. Fechamento\r\npor zíper.</p><p class=\"MsoNormal\"><o:p>REF.: 1320I</o:p></p><p>\r\n\r\n</p><br>', '0.00', NULL, 0, 1, 'moda-para-meninas-moda-para-meninas-vestidos-vestido-borbo', NULL, '2020-09-09 19:07:37', '2021-04-26 13:44:44', NULL, '20.00', '0.07', '25.00', '0.30', NULL, '<p>Estampa exclusiva. Composição: 100% viscose.<br></p>', NULL, 2),
(41, 2, 3, 'BATA BORBO', '<p>Bata leve e soltinha de viscose estampada, com estampa exclusiva Borbo. Detalhe de bordado manual na gola + abotoamento nas costas.</p><p>REF.: 1420I</p>', '0.00', NULL, 0, 1, 'bata-borbo', NULL, '2020-09-09 23:48:05', '2021-04-26 13:44:49', NULL, '20.00', '0.07', '25.00', '0.30', NULL, '<p>Estampa exclusiva. Composição: 100% viscose.<br></p>', NULL, 1),
(42, 2, 2, 'VESTIDO BORBO', '<p class=\"MsoNormal\">Vestido com estampa exclusiva Borbo. Desenvolvido em tecido\r\n100% viscose, e bordado manual na gola. Detalhe de friso color na cintura, com\r\nfranzido na saia da peça + manga longa com tiras regulando o punho. Fechamento\r\npor zíper.</p><p class=\"MsoNormal\"><o:p>REF.: 1320I</o:p></p><p>\r\n\r\n</p><br>', '0.00', NULL, 0, 1, 'moda-para-meninas-moda-para-meninas-vestidos-vestido-borbo', NULL, '2020-09-09 23:53:36', '2021-04-26 13:44:54', NULL, '20.00', '0.07', '25.00', '0.30', NULL, '<p>Estampa exclusiva. Composição: 100% viscose.<br></p>', NULL, 5),
(43, 2, 18, 'MACAQUINHO YELLOW', '<p class=\"MsoNormal\">Macaquinho em viscose com cor vibrante, manga longa e saia\r\ntranspassada na frente do short da peça. Fechamento com zíper.<o:p></o:p></p><p>\r\n\r\n\r\n\r\n</p>REF.: 3920I', '0.00', NULL, 0, 1, 'moda-para-meninas-moda-para-meninas-macacao-macaquinho-yellow', NULL, '2020-09-10 00:03:17', '2021-04-26 14:00:10', NULL, '20.00', '0.07', '25.00', '0.30', NULL, '<p>Composição: 100% viscose.<br></p>', NULL, 5),
(44, 2, 3, 'CASACO MOLETINHO', '<p class=\"MsoNormal\">Casaco moletom para crianças, com tecido moletinho, leve e\r\nconfortável para garantir o conforto da brincadeira. O modelo conta com gorro,\r\nzíper e bolso frontal.</p><p class=\"MsoNormal\">REF.: 4320I</p><p>\r\n\r\n\r\n\r\n</p>', '0.00', NULL, 0, 1, 'casaco-moletinho', NULL, '2020-09-10 00:07:30', '2021-01-12 01:36:05', NULL, '20.00', '0.07', '25.00', '0.30', NULL, '<p>Composição: 50% algodão, 50% poliéster.<br></p>', NULL, 0),
(45, 2, 21, 'CALÇA MOLETINHO', '<p class=\"MsoNormal\">Calça moletom para crianças, desenvolvido em tecido moletinho,\r\nmaterial resistente para correr e pular à vontade! Cós com elástico, vem com\r\npunho na barra e bolso frontal.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 4420I', '0.00', NULL, 0, 1, 'calca-moletinho', NULL, '2020-09-10 13:27:24', '2021-01-12 01:35:49', NULL, '20.00', '0.07', '25.00', '0.30', NULL, '<p>Composição: 50% algodão, 50% poliéster.<br></p>', NULL, 0),
(46, 2, 19, 'SAIA MOLETINHO', '<p class=\"MsoNormal\">Saia moletom para crianças, com tecido moletinho, leve e\r\nconfortável e quentinho. Cós com elástico, ajustado por rolotê com ponteiras. <o:p></o:p></p><p>\r\n\r\n</p>REF.: 4520I', '0.00', NULL, 0, 1, 'saia-moletinho', NULL, '2020-09-10 13:39:05', '2021-01-12 01:35:40', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 50% algodão, 50% poliéster.<br></p>', NULL, 0),
(47, 2, 2, 'VESTIDO MÃE PÉTALAS EM CORES', '<p class=\"MsoNormal\">Vestido longo na estampa exclusiva Pétalas em cores, da\r\nlinha Mãe e filha. Transpassado, com faixa e fenda na perna. Fechamento por\r\nzíper.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 0320I', '0.00', NULL, 0, 1, 'vestido-mae-petalas-em-cores', NULL, '2020-09-10 13:51:19', '2021-01-12 01:10:50', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa exclusiva. Composição: 100% viscose.<br></p>', NULL, 0),
(48, 2, 2, 'VESTIDO PÉTALAS EM CORES', '<p class=\"MsoNormal\">Vestido longo infantil na estampa exclusiva Pétalas em\r\ncores, da linha Mãe e filha. Com abotoamento nas costas e saia rodada com\r\nbabados.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 0220I', '0.00', NULL, 0, 1, 'vestido-petalas-em-cores', NULL, '2020-09-10 13:59:27', '2021-01-12 01:09:16', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa exclusiva. Composição: 100% viscose.<br></p>', NULL, 0),
(49, 4, 4, 'VESTIDO MELINDROSA PÉTALAS EM CORES', '<p class=\"MsoNormal\">Vestido de viscose estampada para bebês, com estampa\r\nexclusiva Pétalas em cores, da linha Mãe e filha. Com abotoamento nas costas\r\npara facilitar a troca. A peça tem detalhe em babados na barra do vestido.\r\nAcompanha calcinha com acabamentos elásticos .<o:p></o:p></p><p>\r\n\r\n</p>REF.: 0120I', '0.00', NULL, 0, 1, 'vestido-melindrosa-petalas-em-cores', NULL, '2020-09-10 14:03:11', '2021-01-12 01:05:33', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 100% Viscose.<br></p>', NULL, 0),
(50, 3, 12, 'BERMUDA MOLETINHO', '<p class=\"MsoNormal\">Bermuda infantil de moletom, com bolsos, e cós com elástico\r\nna cintura que garante conforto para brincar à vontade! Detalhe de plaquinha\r\nDCH Boys na barra e zíper no bolso frontal.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 4820I', '0.00', NULL, 0, 1, 'bermuda-moletinho', NULL, '2020-09-10 14:15:17', '2021-01-12 01:36:16', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 50% algodão, 50% poliéster<br></p>', NULL, 0),
(51, 3, 14, 'CAMISA 3/4 ARGYLE BOYS', '<p class=\"MsoNormal\">Camisa infantil em linho estampado, com estampa exclusiva\r\nArgyle. Manga 3/4, com pregas no punho, abotoamento frontal, bolso e detalhe de\r\nplaquinha DCH Boys. Nas costas detalhes de martingale, pala e prega.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 3120I', '0.00', NULL, 0, 1, 'camisa-34-argyle-boys', NULL, '2020-09-10 14:22:56', '2021-01-12 01:12:57', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(52, 3, 12, 'BERMUDA ARGYLE BOYS', '<p class=\"MsoNormal\">Bermuda infantil de linho estampado, com estampa exclusiva\r\nArgyle. A peça vem com bolsos, barra dobrada, e cós com regulamento\r\ninterno, abotoamento + passadores.\r\nDetalhe de plaquinha DCH Boys.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 3220I', '0.00', NULL, 0, 1, 'bermuda-argyle-boys', NULL, '2020-09-10 14:28:45', '2021-01-12 00:59:24', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(53, 4, 20, 'JARDINEIRA ARGYLE BOYS', '<p class=\"MsoNormal\">Jardineira de linho estampado para bebês, com estampa\r\nexclusiva Argyle. A peça vem com botões nas alças da frente para fácil\r\nabertura, e alças cruzadas nas costas, com elástico na cintura, que garante\r\nconforto na troca de roupa do bebê!</p><p>\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\">Macaquinho linha DCH boys.</p><p class=\"MsoNormal\">REF.: 3020I</p>', '0.00', NULL, 0, 1, 'jardineira-argyle-boys', NULL, '2020-09-10 14:33:17', '2021-01-12 00:56:32', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(54, 2, 2, 'VESTIDO SOL', '<p class=\"MsoNormal\">Vestido de viscose com estampa exclusiva Sol, modelagem leve\r\ne soltinha + franzido na gola e detalhes franzido na cintura. <o:p></o:p></p><p class=\"MsoNormal\">\r\n\r\n</p>REF.: 0520I', '0.00', NULL, 0, 1, 'vestido-sol', NULL, '2020-09-10 14:42:46', '2021-01-12 01:17:33', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 100% Viscose.<br></p>', NULL, 0),
(55, 2, 3, 'CROPPED SOL', '<p class=\"MsoNormal\">Cropped de viscose estampado, com estampa exclusiva Sol. A\r\npeça vem com babado franzido formando as mangas na frente e costas, e pala na\r\ncintura + Abotoamento nas costas.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 0620I', '0.00', NULL, 0, 1, 'cropped-sol', NULL, '2020-09-10 14:49:45', '2021-01-11 14:09:24', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 100% Viscose.<br></p>', NULL, 0),
(56, 4, 4, 'VESTIDO SOL', '<p class=\"MsoNormal\">Vestido de viscose\r\nestampada para bebês, com estampa exclusiva Sol. A peça vem com detalhe de\r\nlaço, franzido, e babado nas mangas. Abotoamento nas costas para facilitar a\r\ntroca. Acompanha calcinha com acabamentos elásticos.<o:p></o:p></p><p>\r\n\r\n</p><p class=\"MsoNormal\">REF.: 0420I</p>', '0.00', NULL, 0, 1, 'vestido-sol', NULL, '2020-09-10 14:55:01', '2021-01-12 01:23:34', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 100% Viscose.<br></p>', NULL, 0),
(57, 2, 18, 'MACACÃO GREEN', '<p class=\"MsoNormal\">Macacão infantil desenvolvido em tecido 100% viscose, com\r\npala na cintura e pregas na calça. Cavado na frente e costas da blusa, para ser\r\nusado com outra peça por baixo. Fechamento por zíper.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 3420I', '0.00', NULL, 0, 1, 'macacao-green', NULL, '2020-09-10 14:58:35', '2021-01-11 14:29:25', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 100% viscose.<br></p>', NULL, 0),
(58, 2, 3, 'BATA GREEN', '<p class=\"MsoNormal\">Bata em viscose com modelagem leve e soltinha. Babado na\r\nbarra e manga da peça. Abertura nas costas, com fechamento por botão.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 3520I', '0.00', NULL, 0, 1, 'bata-green', NULL, '2020-09-10 15:04:13', '2021-01-11 14:32:12', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 100% viscose.<br></p>', NULL, 0),
(59, 4, 4, 'VESTIDO GREEN', '<p class=\"MsoNormal\">Vestido em viscose para bebês com modelagem leve e soltinha.\r\nBabado na lateral da blusa e modelagem godê com franzido na saia da peça. A\r\npeça tem abotoamento nas costas e acompanha calcinha com acabamentos elásticos.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 3320I', '0.00', NULL, 0, 1, 'vestido-green', NULL, '2020-09-10 15:07:20', '2021-01-12 01:27:22', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 100% viscose.<br></p>', NULL, 0),
(60, 2, 18, 'MACACÃO VIVA', '<p class=\"MsoNormal\">Macacão infantil com estampa exclusiva Viva. Desenvolvido em\r\ntecido 100% viscose, cavado na lateral, com babado frente e costas na blusa da\r\npeça, pala na cintura e fechamento por zíper.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 0820I', '0.00', NULL, 0, 1, 'macacao-viva', NULL, '2020-09-10 15:22:12', '2021-01-11 14:41:10', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa exclusiva. Composição: 100% viscose.<br></p>', NULL, 0),
(61, 2, 19, 'SAIA VIVA', '<p class=\"MsoNormal\">Saia em viscose estampada, com estampa exclusiva Viva.\r\nDesenvolvida em tecido leve e fresquinho, com pregas e faixa na cintura +\r\npassadores. Fechamento por zíper.</p><p class=\"MsoNormal\"><o:p>REF.: 0920I<br></o:p></p><p class=\"MsoNormal\"><o:p><br></o:p></p><p>\r\n\r\n</p><br>', '0.00', NULL, 0, 1, 'saia-viva', NULL, '2020-09-10 15:28:15', '2021-01-11 14:38:01', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa exclusiva. Composição: 100% viscose.<br></p>', NULL, 0),
(62, 4, 20, 'MACAQUINHO VIVA', '<p class=\"MsoNormal\">Macaquinho para bebês em viscose estampada, com estampa\r\nexclusiva Viva. A peça tem detalhes de tiras nas costas, botão na gola para\r\nfácil abertura, e elástico na cintura das costas, que garante conforto na troca\r\nde roupa do bebê!<o:p></o:p></p><p>\r\n\r\n</p>REF.: 0720I', '0.00', NULL, 0, 1, 'macaquinho-viva', NULL, '2020-09-10 15:34:18', '2021-01-12 00:21:23', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 100% Viscose.<br></p>', NULL, 0),
(63, 2, 2, 'VESTIDO LINHO', '<p class=\"MsoNormal\">Vestido em linho, com gola e abotoamento transpassado\r\nfrontal. A peça vem com detalhe de bico entre costuras.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 4120I', '0.00', NULL, 0, 1, 'vestido-linho', NULL, '2020-09-10 15:37:53', '2021-01-11 14:44:08', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(64, 2, 21, 'CALÇA LINHO', '<p class=\"MsoNormal\">Calça infantil em linho, modelagem pantacourt com pregas\r\nfrontais e pala com botões. Na parte de trás elástico na cintura com franzido.<o:p></o:p></p><p class=\"MsoNormal\">REF.: 4220I</p><p class=\"MsoNormal\"><o:p></o:p></p>', '0.00', NULL, 0, 1, 'calca-linho', NULL, '2020-09-10 15:43:29', '2021-01-11 14:47:32', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(65, 4, 4, 'VESTIDO LINHO', '<p class=\"MsoNormal\">Vestido em linho para bebês, com zíper nas costas para\r\nfacilitar a troca. A peça vem com detalhe na gola, babados na barra do vestido,\r\ne também nas mangas. Acompanha calcinha com acabamentos elásticos .<o:p></o:p></p><p>\r\n\r\n</p>REF.: 4020I', '0.00', NULL, 0, 1, 'vestido-linho', NULL, '2020-09-10 15:46:00', '2021-01-12 01:25:12', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(66, 2, 2, 'VESTIDO ROMANTIC', '<p class=\"MsoNormal\">Vestido de linho estampado, com estampa exclusiva Romantic.\r\nModelagem evasê na saia, com babado na parte da frete da peça, manga curta e\r\nfechamento por zíper nas costas.&nbsp; <o:p></o:p></p><p>\r\n\r\n</p>REF.: 1920I', '0.00', NULL, 0, 1, 'vestido-romantic', NULL, '2020-09-10 15:49:40', '2021-01-11 14:51:24', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(67, 2, 19, 'SAIA ROMANTIC COM CINTO', '<p class=\"MsoNormal\">Saia longa de linho estampado, com estampa exclusiva\r\nRomantic. Modelagem evasê, com pala e fechamento por zíper nas costas. A peça\r\nacompanha cinto trançado manualmente.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 2020I', '0.00', NULL, 0, 1, 'saia-romantic-com-cinto', NULL, '2020-09-10 15:53:28', '2021-01-11 14:55:52', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(68, 4, 4, 'VESTIDO ROMANTIC', '<p class=\"MsoNormal\">Vestido de linho estampado para bebês, com estampa exclusiva\r\nRomantic. Modelagem evasê, com dobra na manga e detalhe de laço. A peça tem\r\nabertura com zíper nas costas e acompanha calcinha com acabamentos elásticos.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 1820I', '0.00', NULL, 0, 1, 'vestido-romantic', NULL, '2020-09-10 15:55:48', '2021-01-12 00:53:52', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(69, 2, 3, 'BLUSA BÁSICA COM COLAR', '<p class=\"MsoNormal\">Blusa básica de malha, em cores que combinam com todas as\r\nnossas estampas. Acompanha um colar feito a mão, com modelo surpresa!<o:p></o:p></p><p>\r\n\r\n</p><p class=\"MsoNormal\">Obs.: Colar da foto ilustrativo.<o:p></o:p></p>', '0.00', NULL, 0, 1, 'blusa-basica-com-colar', NULL, '2020-09-10 16:10:14', '2020-09-23 14:40:37', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(70, 4, 20, 'MACAQUINHO CORAÇÃO', '<p class=\"MsoNormal\">Macaquinho para bebês em viscose, com botões nas alças da\r\nfrente para fácil abertura. Alças cruzadas nas costas, com elástico na cintura,\r\nque garante conforto na troca de roupa do bebê. A peça tem babado em volta do\r\nbolso frontal e em baixo da pala na cintura.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 3820I', '0.00', NULL, 0, 1, 'macaquinho-coracao', NULL, '2020-09-10 16:15:00', '2021-01-11 23:28:31', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 100% viscose.<br></p>', NULL, 0),
(71, 2, 2, 'VESTIDO PINK', '<p class=\"MsoNormal\">Vestido em viscose, transpassado com abotoamento frontal,\r\nleve e fresquinho, possui manga curta e pregas na frente. Fechamento por zíper.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 3720I', '0.00', NULL, 0, 1, 'vestido-pink', NULL, '2020-09-10 16:21:56', '2021-01-11 14:59:42', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 100% viscose.<br></p>', NULL, 0),
(72, 4, 4, 'VESTIDO PREGAS PINK', '<p class=\"MsoNormal\">Vestido em viscose para bebês com modelagem leve e soltinha,\r\npregas na frente e detalhe de laço em veludo. A peça tem abertura com zíper nas\r\ncostas e acompanha calcinha com acabamentos elásticos.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 3620I', '0.00', NULL, 0, 1, 'vestido-pregas-pink', NULL, '2020-09-10 16:24:45', '2021-01-11 23:30:48', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 100% viscose.<br></p>', NULL, 0),
(73, 2, 2, 'VESTIDO TRAPÉZIO POÁ', '<p>Vestido trapézio, com prega e fechamento por zíper. Arco de laço acompanha o vestido.</p><p>REF.: 5420I</p>', '0.00', NULL, 0, 1, 'vestido-trapezio-poa', NULL, '2020-09-10 16:27:42', '2021-01-11 15:02:49', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(74, 2, 3, 'BLUSA BABADO', '<p class=\"MsoNormal\">Bata em viscose, com babado e franzido, modelagem leve e\r\nsoltinha + abertura nas costas com ajuste por amarração.</p><p class=\"MsoNormal\">REF.: 5620I</p><br>', '0.00', NULL, 0, 1, 'blusa-babado', NULL, '2020-09-10 16:30:12', '2021-01-11 15:48:49', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 100% viscose<br></p>', NULL, 0),
(75, 2, 3, 'BODY MALHA COLOR', '<p class=\"MsoNormal\">Body em malha, com babado na manga.<o:p></o:p></p>', '0.00', NULL, 0, 1, 'body-malha-color', NULL, '2020-09-10 16:36:44', '2020-09-23 14:50:07', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(76, 2, 2, 'VESTIDO GINKGO', '<p class=\"MsoNormal\">Vestido linha festa, levemente acetinado, com estampa\r\nexclusiva Ginkgo. A peça tem saia com modelagem godê e faixa na cintura com\r\ndetalhe de laço com pedrarias aplicadas a mão. Fechamento com zíper na parte de\r\ntrás.</p><p class=\"MsoNormal\">REF.: 1120I</p><p>\r\n\r\n</p><br>', '0.00', NULL, 0, 1, 'vestido-ginkgo', NULL, '2020-09-10 16:44:40', '2021-01-11 15:48:39', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 50% Algodão, 47% Poliéster e 3% Elastano.<br></p>', NULL, 0),
(77, 4, 4, 'VESTIDO GINKGO', '<p class=\"MsoNormal\">Vestido para bebês linha festa, levemente acetinado, com\r\nestampa exclusiva Ginkgo. A peça tem pregas na frente e nas costas e detalhe de\r\nlaço com pedrarias aplicadas a mão. Com zíper na parte de trás para facilitar a\r\ntroca. O vestido acompanha calcinha com acabamentos elásticos.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 1020I', '0.00', NULL, 0, 1, 'vestido-ginkgo', NULL, '2020-09-10 16:51:21', '2021-01-11 23:32:28', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 50% Algodão, 47% Poliéster e 3% Elastano.<br></p>', NULL, 0),
(78, 2, 2, 'VESTIDO BLUE', '<p class=\"MsoNormal\">Vestido linha festa, levemente acetinado, com pala na gola e\r\npregas frente e costas. Forrado, fechamento com zíper.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 5520I', '0.00', NULL, 0, 1, 'vestido-blue', NULL, '2020-09-10 16:54:20', '2021-01-11 15:51:36', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 50% Algodão, 47% Poliéster e 3% Elastano.<br></p>', NULL, 0),
(79, 2, 2, 'VESTIDO DESABROCHOU', '<p>Vestido linha festa, levemente acetinado, com estampa\r\nexclusiva Desabrochou. A peça tem babados com franzidos e detalhe de pedrarias\r\nno ombro aplicadas a mão. Forrado, fechamento com zíper.</p><p><o:p><span style=\"font-family: Alleyn-regular;\">REF.: 1620I</span></o:p></p><p class=\"MsoNormal\"><o:p><br></o:p></p><p>\r\n\r\n</p><br>', '0.00', NULL, 0, 1, 'vestido-desabrochou', NULL, '2020-09-10 16:59:00', '2021-01-11 15:54:39', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 50% Algodão, 47% Poliéster e 3% Elastano.<br></p>', NULL, 0),
(80, 2, 2, 'VESTIDO BOTÕES DESABROCHOU', '<p class=\"MsoNormal\">Vestido linha festa, levemente acetinado, com estampa\r\nexclusiva Desabrochou. A peça tem abotoamento frontal e modelagem melindrosa,\r\ndevido a sua cintura baixa. Forrado, com detalhe de pedrarias no ombro\r\naplicadas a mão. <o:p></o:p></p><p>\r\n\r\n</p>REF.: 1720I', '0.00', NULL, 0, 1, 'vestido-botoes-desabrochou', NULL, '2020-09-10 17:03:09', '2021-01-11 16:09:38', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 50% Algodão, 47% Poliéster e 3% Elastano.<br></p>', NULL, 0),
(81, 4, 4, 'VESTIDO DESABROCHOU', '<p class=\"MsoNormal\">Vestido para bebês linha festa, levemente acetinado, com\r\nestampa exclusiva Desabrochou. A peça tem franzido na frente e nas costas e\r\ndetalhe de laço com pedrarias aplicadas a mão. Com zíper na parte de trás para\r\nfacilitar a troca. O vestido acompanha calcinha com acabamentos elásticos.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 1520I', '0.00', NULL, 0, 1, 'vestido-desabrochou', NULL, '2020-09-10 17:05:53', '2021-01-11 23:38:11', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 50% Algodão, 47% Poliéster e 3% Elastano.<br></p>', NULL, 0),
(82, 3, 14, 'CAMISA LINHO BLUE', '<p class=\"MsoNormal\">Camisa infantil em linho confort, com mangas curtas\r\ndobradas, abotoamento frontal e detalhe de plaquinha DCH Boys.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 5220I', '0.00', NULL, 0, 1, 'camisa-linho-blue', NULL, '2020-09-10 17:11:41', '2021-01-12 00:51:39', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 55% Linho, 45% Viscose.<br></p>', NULL, 0),
(83, 4, 20, 'MACAQUINHO LINHO BLUE', '<p class=\"MsoNormal\">Macaquinho de linho para bebês, com botões nas alças da\r\nfrente para fácil abertura, e botões em baixo da cava do braço. A peça vem com\r\nbolso frontal e abotoamento no entrepernas, para garantir o conforto da troca\r\nde roupa!</p><p class=\"MsoNormal\">Macaquinho linha DCH boys.</p><p class=\"MsoNormal\">REF.: 5120I</p>', '0.00', NULL, 0, 1, 'macaquinho-linho-blue', NULL, '2020-09-10 17:14:57', '2021-01-11 23:40:29', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Estampa Exclusiva. Composição: 55% Linho, 45% Viscose.&nbsp;<br></p>', NULL, 0),
(84, 3, 14, 'CAMISA GOLA V', '<p class=\"MsoNormal\">Camisa básica color, feita em malha 100% algodão.\r\nConfortável, com gola em V, manga curta e detalhe de plaquinha DCH Boys.<o:p></o:p></p><p>\r\n\r\n</p>REF.: 5320I', '0.00', NULL, 0, 1, 'camisa-gola-v', NULL, '2020-09-10 17:17:25', '2020-12-07 21:13:14', NULL, '20.00', '7.00', '25.00', '0.30', NULL, '<p>Composição: 100% algodão.<br></p>', NULL, 0),
(85, 7, 1, 'TURBANTE', '<p class=\"MsoNormal\">Faixa articulada infantil, forrada, com estampa exclusiva.<o:p></o:p></p>', '0.00', NULL, 0, 1, 'turbante', NULL, '2020-09-10 17:20:37', '2020-09-23 13:31:09', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(86, 7, 1, 'ARCO FAIXA', '<p class=\"MsoNormal\">Arco infantil, forrado, com estampa exclusiva.<o:p></o:p></p>', '0.00', NULL, 0, 1, 'arco-faixa', NULL, '2020-09-10 17:24:03', '2020-11-12 18:47:26', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(87, 7, 1, 'BICO DE PATO', '<p class=\"MsoNormal\">Laço infantil de cabelo, forrado, com estampa exclusiva.<o:p></o:p></p>', '0.00', NULL, 0, 1, 'bico-de-pato', NULL, '2020-09-10 17:35:43', '2020-09-23 13:32:49', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(88, 7, 1, 'ARCO COLEÇÃO', '<p class=\"MsoNormal\">Arco infantil, forrado, com estampa exclusiva.<o:p></o:p></p>', '0.00', NULL, 0, 1, 'arco-colecao', NULL, '2020-09-10 20:53:07', '2020-09-23 14:52:58', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(89, 7, 1, 'FAIXA MEIA COLEÇÃO', '<p class=\"MsoNormal\">Faixa meia para bebê, forrada, com estampa exclusiva. O\r\nacessório vem com laço estampado.<o:p></o:p></p>', '0.00', NULL, 0, 1, 'faixa-meia-colecao', NULL, '2020-09-10 20:55:16', '2020-09-23 13:31:42', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(90, 7, 1, 'BOLSA COLEÇÃO', '<p class=\"MsoNormal\">Bolsa infantil, forrada, com estampa exclusiva.<o:p></o:p></p>', '0.00', NULL, 0, 1, 'bolsa-colecao', '2020-09-23 13:15:56', '2020-09-10 20:57:27', '2020-09-23 13:15:56', NULL, '20.00', '7.00', '25.00', '0.30', NULL, NULL, NULL, 0),
(92, 7, 1, 'BOLSA COLEÇÃO', '<p>Bolsa infantil, forrada, com detalhes feitos a mão. Estampa exclusiva.<br></p>', '0.00', NULL, 0, 1, 'bolsa-colecao', NULL, '2020-09-23 13:02:04', '2020-11-12 18:47:02', NULL, '20.00', '7.00', '25.00', '0.30', '.', NULL, NULL, 0),
(93, 2, 1, 'Teste de Produto', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel ligula non ante interdum accumsan vel ut ante. Proin fermentum at libero ut dictum. Ut felis ex,&nbsp;</span><br></p>', '0.00', NULL, 0, 1, 'teste-de-produto', '2020-10-02 18:22:56', '2020-09-25 11:19:27', '2020-10-02 18:22:56', NULL, '10.00', '5.00', '15.00', '0.30', 'Teste Breve descrição', 'teste de Características', NULL, 0),
(94, 2, 2, 'VESTIDO BABADO LINHO MOSTARDA', '<p>Vestido de linho com babado, modelagem evasê na saia e fechamento por zíper nas costas.&nbsp;</p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0721D</span><br></p>', '0.00', NULL, 0, 1, 'vestido-babado-linho-mostarda', NULL, '2020-10-02 18:32:32', '2021-01-11 21:33:53', NULL, '25.00', '6.00', '20.00', '0.50', NULL, '<p>Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.<br></p>', NULL, 0),
(95, 2, 2, 'VESTIDO VAZADO LINHO ROSE', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Vestido de linho com detalhe de laço nas costas, modelagem evasê e elástico na saia.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0121D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'vestido-vazado-linho-rose', NULL, '2020-10-02 19:29:53', '2021-01-11 21:29:02', NULL, '25.00', '7.00', '20.00', '0.50', NULL, 'Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.', NULL, 0),
(96, 2, 2, 'VESTIDO COM CINTO LINHO POÁ', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Vestido em linho, com alças, abotoamento frontal e lastéx nas costas para maior conforto. Leve e fresquinho, possui faixa na mesma estampa para amarração ou laço.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0621D</span><br></p><p><br></p>', '0.00', NULL, 0, 1, 'vestido-com-cinto-linho-poa', NULL, '2020-10-02 20:10:10', '2021-01-11 21:24:17', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 16px; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(97, 2, 18, 'MACACÃO PANTACOURT LINHO', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Macacão infantil listrado. Desenvolvido em linho, com abotoamento na alça frontal e fechamento por zíper.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(248, 244, 245); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">REF.: 0421D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'macacao-pantacourt-linho', NULL, '2020-10-02 20:31:38', '2021-01-12 00:17:33', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 16px; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(98, 2, 3, 'BLUSA VAZADA COSTAS LINHO ROSÉ', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Blusa de linho com detalhe franzido&nbsp; e fechamento com amarração nas costas.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0221D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'blusa-vazada-costas-linho-rose', NULL, '2020-10-02 21:06:40', '2021-01-12 00:14:38', NULL, '25.00', '7.00', '20.00', '0.50', NULL, 'Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.', NULL, 0),
(99, 2, 3, 'CROPPED CIGANINHA LINHO MOSTARDA', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Cropped de linho. Com elástico, alça larga e babado formando as mangas na frente e costas.&nbsp;</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0821D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'cropped-ciganinha-linho-mostarda', NULL, '2020-10-05 14:27:26', '2021-01-12 00:05:22', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 16px; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(100, 4, 20, 'MACAQUINHO BABADO LINHO', '<p><span style=\"background-color: rgb(248, 244, 245);\"><font color=\"#707070\" face=\"Alleyn-regular\">Macaquinho para bebês em linho. Alças largas com abotoamento, babado evasê&nbsp;frente e costas, e babado franzido no short da peça imitando um bolsinho na frente.</font></span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0321D</span><span style=\"background-color: rgb(248, 244, 245);\"><font color=\"#707070\" face=\"Alleyn-regular\"><br></font></span><br></p>', '0.00', NULL, 0, 1, 'macaquinho-babado-linho', NULL, '2020-10-05 14:32:52', '2021-01-11 23:42:23', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 16px; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(101, 4, 20, 'MACAQUINHO SHORT SAIA LINHO POÁ', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Macaquinho para bebês em linho, short saia, com alças cruzadas nas costas, elástico na cintura, que garante conforto na troca de roupa do bebê. A peça tem babado em volta das alças e botão para fechamento.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0521D</span><br></p><p><br></p>', '0.00', NULL, 0, 1, 'macaquinho-short-saia-linho-poa', NULL, '2020-10-05 14:34:21', '2021-01-11 21:40:09', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 16px; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(102, 4, 20, 'JARDINEIRA LINHO', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Jardineira de linho para bebês, com botões nas alças da frente para fácil abertura, alças cruzadas nas costas e elástico para maior conforto. A peça vem com pregas e bainha dobrada.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 1121D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'jardineira-linho', NULL, '2020-10-05 16:07:27', '2021-01-11 23:47:00', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 16px; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(103, 4, 20, 'MACAQUINHO LINHO', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Macaquinho de linho para bebês, com botões nas alças da frente para fácil abertura, e botões em baixo da cava do braço. A peça vem com bolso frontal e abotoamento no entrepernas, para garantir o conforto da troca de roupa! Acompanha ursinho de pelúcia.&nbsp;</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0921D<br></span><br></p>', '0.00', NULL, 0, 1, 'macaquinho-linho', NULL, '2020-10-05 18:28:31', '2021-01-11 23:50:30', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 16px; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(104, 3, 12, 'BERMUDA BRIM COLOR', '<p><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">Bermuda infantil de brim color</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">, com bolsos na frente e costas, cós com abotoamento e elástico interno para regular.&nbsp;</span><br></p>', '0.00', NULL, 0, 1, 'bermuda-brim-color', NULL, '2020-10-05 19:54:11', '2020-10-06 00:50:48', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(105, 3, 12, 'BERMUDA JEANS', '<p><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">Bermuda infantil jeans</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">, com bolsos na frente e costas. A</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">bertura frente zíper,&nbsp;</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">cós com passadores e abotoamento</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">. E</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">lástico interno para regular.&nbsp;</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 1521D</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\"><br></span><br></p>', '0.00', NULL, 0, 1, 'bermuda-jeans', NULL, '2020-10-05 21:37:34', '2021-01-12 00:48:34', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><br></p>', NULL, 0),
(106, 2, 19, 'SAIA JEANS', '<p><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">Saia infantil jeans</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">, com bolsos na frente e costas. A</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">bertura frente zíper,&nbsp;</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">cós com passadores e abotoamento</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">. E</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">lástico interno para regular.&nbsp;</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.:&nbsp;</span><span style=\"color: rgb(96, 101, 108); font-family: &quot;Neo Sans&quot;, Verdana, Arial;\">SJDCH</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\"><br></span><br></p>', '0.00', NULL, 0, 1, 'saia-jeans', NULL, '2020-10-05 21:44:51', '2021-01-11 23:21:31', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(107, 2, 22, 'SHORT JEANS', '<p><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">Short infantil jeans</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">, com bolsos na frente e costas. A</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">bertura frente zíper,&nbsp;</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">cós com passadores e abotoamento</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">. E</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">lástico interno para regular.&nbsp;</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.:&nbsp;</span><span style=\"color: rgb(96, 101, 108); font-family: &quot;Neo Sans&quot;, Verdana, Arial; background-color: rgb(250, 250, 250);\">SHJDCH</span><span style=\"color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\"><br></span><br></p>', '0.00', NULL, 0, 1, 'short-jeans', NULL, '2020-10-05 21:57:16', '2021-01-11 23:16:06', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(108, 3, 14, 'CAMISA LINHO', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Camisa infantil em linho, com mangas curtas, prega na pala das costas, abotoamento frontal e detalhe de plaquinha DCH Boys.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 1021D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'camisa-linho', NULL, '2020-10-06 00:00:20', '2021-01-12 00:43:55', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(109, 3, 12, 'BERMUDA LINHO', '<p>Bermuda infantil de linho color, com barra dobrada, bolsos na frente e costas, cós com abotoamento e elástico interno para regular.</p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 1221D</span><br></p>', '0.00', NULL, 0, 1, 'bermuda-linho', NULL, '2020-10-06 00:12:39', '2021-01-12 00:40:09', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(110, 2, 2, 'VESTIDO FOLHAGEM LAMARI', NULL, '0.00', NULL, 0, 1, 'vestido-folhagem-lamari', '2020-10-09 20:28:50', '2020-10-07 20:41:03', '2020-10-09 20:28:50', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(111, 2, 2, 'VESTIDO CETIM LAMARI', NULL, '0.00', NULL, 0, 1, 'vestido-cetim-lamari', '2020-10-09 20:28:22', '2020-10-07 20:42:30', '2020-10-09 20:28:22', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(112, 6, 1, 'VESTIDO FOLHAGEM LAMARI', NULL, '0.00', NULL, 0, 1, 'vestido-folhagem-lamari', '2020-11-25 20:19:05', '2020-10-09 20:52:47', '2020-11-25 20:19:05', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(113, 6, 1, 'VESTIDO CETIM LAMARI', NULL, '0.00', NULL, 0, 1, 'vestido-cetim-lamari', '2020-11-25 20:19:18', '2020-10-09 20:54:25', '2020-11-25 20:19:18', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(114, 6, 1, 'VESTIDO GIRASSOL LAMARI', NULL, '0.00', NULL, 0, 1, 'vestido-girassol-lamari', '2020-11-25 20:19:27', '2020-10-21 17:23:46', '2020-11-25 20:19:27', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(115, 6, 7, 'VESTIDO CONTORNO', NULL, '0.00', NULL, 0, 1, 'vestido-contorno', '2020-11-26 21:19:12', '2020-10-21 17:26:46', '2020-11-26 21:19:12', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(116, 6, 10, 'SAIA DEGRADE BLUE', NULL, '0.00', NULL, 0, 1, 'saia-degrade-blue', '2020-11-26 21:19:23', '2020-10-21 17:29:20', '2020-11-26 21:19:23', NULL, '25.00', '7.00', '29.00', '0.50', NULL, NULL, NULL, 0),
(117, 2, 3, 'CROPPED COM BABADO', '<p>REF.: 3321D<br></p>', '0.00', NULL, 0, 1, 'cropped-com-babado', NULL, '2020-10-26 12:43:20', '2021-01-11 23:11:00', NULL, '25.00', '7.00', '29.00', '0.50', NULL, NULL, NULL, 0),
(118, 2, 3, 'BATA CIGANINHA', '<p>REF.: 2621D<br></p>', '0.00', NULL, 0, 1, 'bata-ciganinha', NULL, '2020-10-26 12:48:04', '2021-01-11 23:08:33', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(119, 2, 3, 'CROPPED CIGANINHA VISCOSE', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular;\">Cropped em viscose, modelo ciganinha ombro a ombro, com elátisco.</span></p><p><p>REF.: 1821D<br></p><br></p>', '0.00', NULL, 0, 1, 'cropped-ciganinha-viscose', NULL, '2020-10-26 12:51:46', '2021-01-11 22:33:07', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Composição: 100% viscose</span><br></p>', NULL, 0),
(120, 2, 3, 'BLUSA VISCOSE', '<p>REF.: 2321D<br></p>', '0.00', NULL, 0, 1, 'blusa-viscose', NULL, '2020-10-26 12:58:21', '2021-01-11 22:28:17', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(121, 2, 2, 'VESTIDO FRENTE ÚNICA', '<p>REF.: 2421D</p>', '0.00', NULL, 0, 1, 'vestido-frente-unica', NULL, '2020-10-26 13:02:45', '2021-01-11 22:20:55', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(122, 2, 2, 'VESTIDO LAISE', '<p>REF.: 2221D</p>', '0.00', NULL, 0, 1, 'vestido-laise', NULL, '2020-10-26 13:03:33', '2021-01-11 21:19:28', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(123, 2, 3, 'CROPPED CIGANINHA CAÇA', '<p>REF.: 3221D</p>', '0.00', NULL, 0, 1, 'cropped-ciganinha-caca', NULL, '2020-10-26 13:43:17', '2021-01-11 22:18:05', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(124, 2, 3, 'CONJ. CROPPED COM SAIA LONGA', '<p>REF.: 3421D</p>', '0.00', NULL, 0, 1, 'conj-cropped-com-saia-longa', NULL, '2020-10-26 13:44:41', '2021-01-11 22:10:57', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(125, 2, 18, 'MACAQUINHO LINHO PINK', '<p>Macaquinho em linho, alça única, com babado frente e costas. Franzido na cintura e amarração com faixa.</p><p>REF.: 2121D</p>', '0.00', NULL, 0, 1, 'macaquinho-linho-pink', NULL, '2020-10-26 13:48:21', '2021-01-11 22:06:05', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"color: rgb(112, 112, 112); font-family: &quot;Times New Roman&quot;; font-size: 16px; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(126, 2, 22, 'SHORT LINHO PINK', NULL, '0.00', NULL, 0, 1, 'short-linho-pink', '2020-10-26 14:18:18', '2020-10-26 13:49:54', '2020-10-26 14:18:18', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(127, 2, 22, 'SHORT LINHO PINK', '<p><span style=\"padding: 0px; border: 0px; margin: 0px; outline: none; background-color: rgb(248, 244, 245); color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">Short infantil em linho, modelo running, com amarração na frente e elástico na parte de trás da pala da peça.</span></p><p><span style=\"padding: 0px; border: 0px; margin: 0px; outline: none; background-color: rgb(248, 244, 245); color: rgb(95, 95, 95); font-family: hero-new, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 12px;\">REF.: 2021D<br></span><br></p>', '0.00', NULL, 0, 1, 'short-linho-pink', NULL, '2020-10-26 13:50:29', '2021-01-11 22:02:20', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(128, 2, 18, 'MACAQUINHO LINHO', '<p>Macaquinho infantil em linho, com detalhe transversal vazado na frente e fechamento por zíper.</p><p>REF.: 3121D</p>', '0.00', NULL, 0, 1, 'macaquinho-linho', NULL, '2020-10-26 13:53:02', '2021-01-11 21:59:28', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(129, 2, 18, 'MACAQUINHO PREGAS LINHO', NULL, '0.00', NULL, 0, 1, 'macaquinho-pregas-linho', '2020-10-26 14:19:11', '2020-10-26 13:54:32', '2020-10-26 14:19:11', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(130, 2, 18, 'MACAQUINHO PREGAS LINHO', NULL, '0.00', NULL, 0, 1, 'macaquinho-pregas-linho', '2020-10-26 14:19:29', '2020-10-26 13:54:39', '2020-10-26 14:19:29', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(131, 2, 18, 'MACAQUINHO PREGAS LINHO', '<p>Macaquinho infantil em linho, com babado frente e costas, pregas no short da peça e elástico na cintura.</p><p>REF.: 3621D</p>', '0.00', NULL, 0, 1, 'macaquinho-pregas-linho', NULL, '2020-10-26 13:54:50', '2021-01-11 21:56:48', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Composição: 42% Algodão, 38% Viscose, 14% Modal e 6% linho.</span><br></p>', NULL, 0),
(132, 6, 7, 'VESTIDO MÃE POR DO SOL', '<p>Vestido longo com estampa exclusiva.</p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 1320</span><br></p>', '0.00', NULL, 0, 1, 'vestido-mae-por-do-sol', NULL, '2020-10-31 20:57:59', '2020-12-09 17:19:30', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p>100% Viscose</p>', NULL, 0);
INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `title`, `description`, `amount`, `promotinal_value`, `promotion`, `active`, `slug`, `deleted_at`, `created_at`, `updated_at`, `inputs`, `width`, `height`, `length`, `weigth`, `brief_description`, `feature`, `reference_code`, `order`) VALUES
(133, 6, 6, 'MACACÃO MENINA BONITA', '<p><span style=\"background-color: rgb(248, 244, 245);\"><font color=\"#707070\" face=\"Alleyn-regular\">Macacão com estampa exclusiva.</font><br></span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 1819D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span></p><p><br></p>', '0.00', NULL, 0, 1, 'macacao-menina-bonita', NULL, '2020-10-31 21:04:56', '2020-12-09 17:19:59', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">100% Viscose</span><br></p>', NULL, 0),
(134, 6, 7, 'VESTIDO CAMISA MÃE', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Vestido longo com estampa exclusiva.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0119D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'vestido-camisa-mae', NULL, '2020-10-31 21:11:18', '2020-12-09 17:21:24', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '100% Viscose', NULL, 0),
(135, 6, 7, 'VESTIDO CONTOS E RENDAS', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Vestido longo com estampa exclusiva.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 3219D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'vestido-contos-e-rendas', NULL, '2020-10-31 21:13:19', '2020-12-09 17:22:05', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '100% Viscose', NULL, 0),
(136, 6, 7, 'VESTIDO BRASILIDADE', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Vestido longo com estampa exclusiva.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 9719D</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'vestido-brasilidade', NULL, '2020-10-31 21:22:20', '2020-12-09 17:22:54', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '100% Viscose', NULL, 0),
(137, 6, 6, 'MACACÃO LISTRAS', '<p><font color=\"#707070\" face=\"Alleyn-regular\">Macacão</font><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">&nbsp;com estampa exclusiva.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 3719ID</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'macacao-listras', NULL, '2020-10-31 21:33:17', '2020-12-09 17:25:49', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '100% Viscose', NULL, 0),
(138, 6, 7, 'VESTIDO CARIOCA', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">Vestido com estampa exclusiva.</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0219ID</span><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\"><br></span><br></p>', '0.00', NULL, 0, 1, 'vestido-carioca', NULL, '2020-10-31 21:35:42', '2020-12-09 17:24:47', NULL, '25.00', '7.00', '20.00', '0.50', NULL, '100% Viscose', NULL, 0),
(139, 2, 19, 'SAIA COM  LAÇO', '<p>REF.: 2521D</p>', '0.00', NULL, 0, 1, 'saia-com-laco', NULL, '2020-11-04 14:09:46', '2021-01-11 16:54:14', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(140, 2, 2, 'VESTIDO LINHO', '<p>REF.: 1921D<br></p>', '0.00', NULL, 0, 1, 'vestido-linho', NULL, '2020-11-12 22:39:50', '2021-01-11 16:51:00', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(141, 2, 3, 'BLUSA FRUFRU', '<p>REF.: 4221D<br></p>', '0.00', NULL, 0, 1, 'blusa-frufru', NULL, '2020-11-12 22:40:01', '2021-01-11 16:47:57', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(142, 2, 3, 'CONJUNTO VISCOLINHO', '<p>REF.: 1321D<br></p>', '0.00', NULL, 0, 1, 'conjunto-viscolinho', NULL, '2020-11-12 22:40:02', '2021-01-11 16:45:18', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(143, 4, 1, 'MACAQUINHO MELANCIA', NULL, '0.00', NULL, 0, 1, 'macaquinho-melancia', '2020-11-13 18:23:48', '2020-11-12 22:40:03', '2020-11-13 18:23:48', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(144, 2, 18, 'MACACÃO PANTACOURT', '<p>REF.: 1721D</p>', '0.00', NULL, 0, 1, 'macacao-pantacourt', NULL, '2020-11-12 22:40:05', '2021-01-11 16:42:21', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(145, 2, 1, 'SHORT LINHO', '<p>REF.: 3821D<br></p>', '0.00', NULL, 0, 1, 'moda-para-meninas-short-linho', NULL, '2020-11-12 22:40:08', '2021-01-21 18:35:46', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(146, 4, 20, 'MACAQUINHO VERÃO', '<p>REF.: 6521D<br></p>', '0.00', NULL, 0, 1, 'macaquinho-verao', NULL, '2020-11-12 22:59:22', '2021-01-12 00:02:06', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(147, 2, 19, 'SAIA BOTÕES VERÃO', '<p>REF.: 4021D<br></p>', '0.00', NULL, 0, 1, 'saia-botoes-verao', NULL, '2020-11-12 23:00:49', '2021-01-11 16:32:12', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(148, 2, 18, 'MACACÃO VERÃO', '<p>REF.: 3921D<br></p>', '0.00', NULL, 0, 1, 'macacao-verao', NULL, '2020-11-12 23:01:41', '2021-01-11 16:26:28', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(149, 2, 2, 'VESTIDO KIWI', '<p>REF.: 4521D<br></p>', '0.00', NULL, 0, 1, 'vestido-kiwi', NULL, '2020-11-22 18:04:52', '2021-01-11 16:22:33', NULL, '25.00', '70.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(150, 2, 3, 'BLUSA KIWI', '<p>REF.: 4421D</p>', '0.00', NULL, 0, 1, 'blusa-kiwi', NULL, '2020-11-22 18:07:15', '2021-01-11 16:19:54', NULL, '25.00', '70.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(151, 4, 4, 'VESTIDO KIWI', '<p>REF.: 4321D<br></p>', '0.00', NULL, 0, 1, 'vestido-kiwi', NULL, '2020-11-22 18:10:21', '2021-01-12 00:36:59', NULL, '25.00', '70.00', '2.00', '0.50', NULL, NULL, NULL, 0),
(152, 4, 4, 'VESTIDO CEREJAS', '<p>REF.: 5121D<br></p>', '0.00', NULL, 0, 1, 'vestido-cerejas', NULL, '2020-11-22 18:11:53', '2021-01-12 00:34:53', NULL, '25.00', '70.00', '29.00', '0.50', NULL, NULL, NULL, 0),
(153, 2, 2, 'VESTIDO CEREJAS', '<p>REF.: 5221D<br></p>', '0.00', NULL, 0, 1, 'vestido-cerejas', NULL, '2020-11-22 18:13:13', '2021-01-11 16:17:27', NULL, '25.00', '70.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(154, 2, 3, 'BLUSA CEREJAS', '<p>REF.: 5321D<br></p>', '0.00', NULL, 0, 1, 'blusa-cerejas', NULL, '2020-11-22 19:11:53', '2021-01-11 16:14:09', NULL, '25.00', '70.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(155, 2, 19, 'SAIA CEREJAS', '<p>REF.: 5421D<br></p>', '0.00', NULL, 0, 1, 'saia-cerejas', NULL, '2020-11-22 19:13:37', '2021-01-12 00:11:59', NULL, '25.00', '70.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(156, 4, 20, 'MACAQUINHO MELANCIA', '<p>REF.: 4121D<br></p>', '0.00', NULL, 0, 1, 'macaquinho-melancia', NULL, '2020-11-26 21:09:55', '2021-01-12 00:32:54', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(157, 6, 6, 'MACACÃO FOLHAGENS', '<p><span style=\"color: rgb(112, 112, 112); font-family: Alleyn-regular; background-color: rgb(248, 244, 245);\">REF.: 0120</span><br></p>', '0.00', NULL, 0, 1, 'macacao-folhagens', NULL, '2020-11-26 21:13:19', '2020-12-09 17:28:30', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(158, 2, 2, 'VESTIDO PITAYA', '<p>REF.:&nbsp;<span style=\"font-size: 0.8125rem; font-family: &quot;Neo Sans&quot;, Verdana, Arial;\">5721D</span><br></p>', '0.00', NULL, 0, 1, 'vestido-pitaya', NULL, '2020-12-07 14:34:46', '2021-01-12 00:29:15', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(159, 2, 3, 'BLUSA PITAYA', '<p>REF.: 5821D</p><p><br></p>', '0.00', NULL, 0, 1, 'blusa-pitaya', NULL, '2020-12-07 14:35:24', '2021-01-12 00:08:08', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(160, 4, 4, 'VESTIDO FLORES DE ALGODÃO DOCE', '<p>REF.:&nbsp;<span style=\"font-family: &quot;Neo Sans&quot;, Verdana, Arial; font-size: 0.8125rem;\">4721D</span></p>', '0.00', NULL, 0, 1, 'vestido-flores-de-algodao-doce', NULL, '2020-12-07 14:36:51', '2021-01-12 00:31:27', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(161, 2, 19, 'SAIA FLORES DE ALGODÃO DOCE', '<p>REF.:&nbsp;<span style=\"font-family: &quot;Neo Sans&quot;, Verdana, Arial;\">5021D</span></p>', '0.00', NULL, 0, 1, 'saia-flores-de-algodao-doce', NULL, '2020-12-07 14:38:45', '2021-01-11 21:49:31', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(162, 2, 2, 'VESTIDO FLORES DE ALGODÃO DOCE', '<p>REF.:&nbsp;<span style=\"font-family: &quot;Neo Sans&quot;, Verdana, Arial; font-size: 0.8125rem;\">4821D</span></p>', '0.00', NULL, 0, 1, 'vestido-flores-de-algodao-doce', NULL, '2020-12-07 14:38:54', '2021-01-11 21:42:31', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(163, 2, 3, 'BLUSA FLORES DE ALGODÃO DOCE', NULL, '0.00', NULL, 0, 1, 'blusa-flores-de-algodao-doce', '2020-12-07 15:07:48', '2020-12-07 14:39:15', '2020-12-07 15:07:48', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(164, 2, 3, 'CROPPED FLORES DE ALGODÃO DOCE', '<p>REF.: 4921D<br></p>', '0.00', NULL, 0, 1, 'moda-para-meninas-blusas-cropped-flores-de-algodao-doce', NULL, '2020-12-07 15:03:13', '2021-03-11 12:28:47', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, '4921D', 0),
(165, 4, 4, 'VESTIDO BARRADO BELA', '<p>REF.: 6221D</p>', '0.00', NULL, 0, 1, 'vestido-barrado-bela', NULL, '2020-12-10 14:25:30', '2021-01-12 00:00:21', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(166, 4, 20, 'JARDINEIRA BRANCA LINHO', '<p>REF.: 1421D</p>', '0.00', NULL, 0, 1, 'jardineira-branca-linho', NULL, '2020-12-10 14:30:29', '2021-01-11 23:58:26', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(167, 4, 20, 'MACAQUINHO CAÇA', '<p>REF.: 2821D</p>', '0.00', NULL, 0, 1, 'macaquinho-caca', NULL, '2020-12-10 14:35:23', '2021-01-11 23:55:50', NULL, '25.00', '7.00', '29.00', '0.50', NULL, NULL, NULL, 0),
(168, 7, 1, 'FAIXA MEIA COLEÇÃO', '<p>REF.: 13480</p>', '0.00', NULL, 0, 1, 'faixa-meia-colecao', NULL, '2020-12-10 20:13:53', '2020-12-10 20:45:44', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(169, 7, 1, 'BICO DE PATO', '<p>REF.: 13477<br></p>', '0.00', NULL, 0, 1, 'bico-de-pato', NULL, '2020-12-10 20:17:28', '2020-12-10 20:47:35', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(170, 7, 1, 'ARCO COLEÇÃO', '<p>REF.: 13479<br></p>', '0.00', NULL, 0, 1, 'arco-colecao', NULL, '2020-12-10 20:23:59', '2020-12-10 20:49:50', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0),
(171, 7, 1, 'BOLSA COLEÇÃO', '<p>REF.: 13481</p>', '0.00', NULL, 0, 1, 'bolsa-colecao', NULL, '2020-12-14 14:04:20', '2020-12-14 14:12:57', NULL, '25.00', '7.00', '20.00', '0.50', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `product_colors`
--

INSERT INTO `product_colors` (`id`, `color`, `path_image`, `active`, `created_at`, `updated_at`, `deleted_at`, `name`) VALUES
(1, NULL, '1estampa-farmaco-site-2-041-1599078637.jpeg', 1, '2020-09-02 20:30:38', '2020-09-09 23:43:16', '2020-09-09 23:43:16', 'Estampa Médica'),
(2, 'rgb(155, 233, 194)', NULL, 1, '2020-09-03 11:48:44', '2020-09-09 23:43:28', '2020-09-09 23:43:28', 'Verde'),
(3, 'rgb(112, 166, 190)', NULL, 1, '2020-09-03 11:50:51', '2020-09-09 23:43:34', '2020-09-09 23:43:34', 'Azul'),
(4, 'rgb(95, 95, 95)', NULL, 1, '2020-09-03 11:51:18', '2020-09-09 23:43:44', '2020-09-09 23:43:44', 'Cinza Escuro'),
(5, 'rgb(48, 90, 162)', 'estampa-borbo-1599664651.jpeg', 0, '2020-09-09 15:17:31', '2020-09-09 23:43:09', '2020-09-09 23:43:09', 'ESTAMPA BORBO'),
(6, 'rgba(0, 1, 2, 0)', 'estampa-borbo-1599664654.jpeg', 1, '2020-09-09 15:17:34', '2020-09-09 23:43:57', NULL, 'ESTAMPA BORBO'),
(7, 'rgb(255, 239, 91)', NULL, 1, '2020-09-10 00:04:42', '2020-09-10 00:04:42', NULL, 'AMARELO'),
(8, 'rgb(255, 93, 147)', NULL, 1, '2020-09-10 00:09:15', '2020-09-10 00:09:15', NULL, 'ROSA'),
(9, 'rgba(249, 249, 249, 0)', 'estampa-petalas-em-cores-1599745985.jpeg', 1, '2020-09-10 13:52:14', '2020-09-10 13:53:05', NULL, 'ESTAMPA PÉTALAS EM CORES'),
(10, 'rgb(80, 109, 79)', NULL, 1, '2020-09-10 14:17:01', '2020-09-10 14:17:38', NULL, 'MUSGO'),
(11, 'rgba(0, 1, 2, 0.01)', 'argyle-boys-1599747936.jpeg', 1, '2020-09-10 14:24:11', '2020-09-10 14:25:36', NULL, 'ESTAMPA ARGYLE BOYS'),
(12, 'rgba(0, 92, 249, 0)', 'estampa-sol-1599749061.jpeg', 1, '2020-09-10 14:44:21', '2020-09-10 14:46:11', NULL, 'ESTAMPA SOL'),
(13, 'rgb(34, 225, 88)', NULL, 1, '2020-09-10 15:00:18', '2020-09-10 15:00:18', NULL, 'VERDE'),
(14, 'rgba(48, 90, 162, 0)', 'estampa-viva-1599751430.jpeg', 1, '2020-09-10 15:23:50', '2020-09-10 15:23:50', NULL, 'ESTAMPA VIVA'),
(15, 'rgb(255, 254, 229)', NULL, 1, '2020-09-10 15:39:45', '2020-09-10 15:39:45', NULL, 'BEGE'),
(16, 'rgba(48, 90, 162, 0)', 'estampa-romantic-1599756536.jpeg', 1, '2020-09-10 15:50:54', '2020-09-10 16:48:56', NULL, 'ESTAMPA ROMANTIC'),
(17, 'rgb(237, 24, 24)', NULL, 1, '2020-09-10 16:31:13', '2020-09-10 16:31:13', NULL, 'VERMELHO'),
(18, 'rgb(255, 252, 249)', NULL, 1, '2020-09-10 16:32:00', '2020-09-10 16:32:00', NULL, 'BRANCO'),
(19, 'rgba(48, 90, 162, 0)', 'estampa-ginkgo-1599756395.jpeg', 1, '2020-09-10 16:46:35', '2020-09-10 16:46:35', NULL, 'ESTAMPA GINKGO'),
(20, 'rgb(19, 68, 223)', NULL, 1, '2020-09-10 16:55:37', '2020-09-10 16:57:12', NULL, 'AZUL'),
(21, 'rgba(48, 90, 162, 0)', 'estampa-desabrochou-1599757214.jpeg', 1, '2020-09-10 17:00:14', '2020-09-10 17:01:05', NULL, 'ESTAMPA DESABROCHOU'),
(22, 'rgb(0, 0, 0)', NULL, 1, '2020-09-23 12:47:50', '2020-09-23 12:47:50', NULL, 'PRETO'),
(23, 'rgb(255, 255, 160)', NULL, 1, '2020-09-23 14:11:10', '2020-09-23 14:11:10', NULL, 'AMARELO CLARO'),
(24, 'rgb(184, 242, 255)', NULL, 1, '2020-09-23 14:11:55', '2020-09-23 14:17:39', NULL, 'AZUL CLARO'),
(25, 'rgb(255, 210, 227)', NULL, 1, '2020-09-23 14:14:12', '2020-09-23 14:14:12', NULL, 'ROSA CLARO'),
(26, 'rgb(237, 186, 186)', NULL, 1, '2020-10-02 19:35:25', '2020-10-02 19:37:16', NULL, 'ROSÉ'),
(27, 'rgb(227, 118, 50)', NULL, 1, '2020-10-05 18:39:35', '2020-10-05 18:39:35', NULL, 'TELHA'),
(28, 'rgba(0, 94, 255, 0)', 'estampa-pitaya-1607632485.jpeg', 1, '2020-12-10 20:34:45', '2020-12-10 20:35:32', NULL, 'PITAYA'),
(29, 'rgba(48, 90, 162, 0)', 'estampa-melancia-1607632685.jpeg', 1, '2020-12-10 20:38:05', '2020-12-10 20:38:05', NULL, 'MELANCIA'),
(30, 'rgba(48, 90, 162, 0)', 'estampa-kiwi-1607632885.jpeg', 1, '2020-12-10 20:41:25', '2020-12-10 20:41:25', NULL, 'KIWI'),
(31, 'rgba(48, 90, 162, 0)', 'estampa-cerejas-poa-1607632941.jpeg', 1, '2020-12-10 20:42:21', '2020-12-10 20:42:21', NULL, 'CEREJAS POÁ'),
(32, 'rgba(48, 90, 162, 0)', 'estampa-verao-1607633011.jpeg', 1, '2020-12-10 20:43:31', '2020-12-10 20:43:31', NULL, 'VERÃO'),
(33, 'rgba(48, 90, 162, 0)', 'flores-de-algodao-doce-1607633075.jpeg', 1, '2020-12-10 20:44:35', '2020-12-10 20:44:35', NULL, 'FLORES DE ALGODÃO DOCE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cover` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `path_image`, `product_cover`, `created_at`, `updated_at`) VALUES
(31, 41, 'dsc-5795-2-1599695285.jpeg', 1, '2020-09-09 23:48:05', '2020-09-22 16:06:13'),
(32, 41, 'dsc-5737-2-1599695381.jpeg', 0, '2020-09-09 23:49:41', '2020-09-22 16:06:13'),
(33, 42, 'body-53-1599695616.jpeg', 1, '2020-09-09 23:53:36', '2020-09-22 16:10:58'),
(34, 43, 'dsc-5565-2-1599696197.jpeg', 1, '2020-09-10 00:03:17', '2020-09-22 16:21:16'),
(35, 44, 'image00053-1599696450.jpeg', 1, '2020-09-10 00:07:30', '2020-09-22 16:47:20'),
(37, 45, 'ec8e2aa0-2087-4570-a85d-12fbdc3e5d89-1599744716.jpeg', 1, '2020-09-10 13:31:56', '2020-09-23 12:39:01'),
(38, 46, 'image00057-1599745145.jpeg', 1, '2020-09-10 13:39:05', '2020-09-23 12:28:43'),
(39, 47, 'f3cdec5b-d999-4bde-9fa6-b5bb931d60e2-1599745879.jpeg', 1, '2020-09-10 13:51:19', '2020-09-22 16:56:43'),
(40, 48, 'dsc-5046-1599746367.jpeg', 1, '2020-09-10 13:59:28', '2020-09-22 19:42:36'),
(41, 49, 'body-36-1599746591.jpeg', 1, '2020-09-10 14:03:11', '2020-09-22 17:02:47'),
(42, 50, 'dsc-4225-1599747317.jpeg', 1, '2020-09-10 14:15:17', '2020-09-23 12:56:55'),
(43, 51, 'dsc-4372-1599747776.jpeg', 1, '2020-09-10 14:22:56', '2020-09-22 19:55:57'),
(44, 52, 'siten1-1599748125.jpeg', 1, '2020-09-10 14:28:45', '2020-09-22 19:49:48'),
(45, 53, 'siten20-1599748397.jpeg', 1, '2020-09-10 14:33:17', '2020-09-22 17:06:15'),
(46, 54, 'dsc-4113-1599748966.jpeg', 1, '2020-09-10 14:42:46', '2020-09-11 14:29:20'),
(47, 55, 'dsc-4155-1599749385.jpeg', 1, '2020-09-10 14:49:45', '2020-09-11 14:48:34'),
(48, 56, 'dsc-5702-2-1599749701.jpeg', 1, '2020-09-10 14:55:01', '2020-09-21 15:33:57'),
(49, 57, 'dsc-4785-1599749915.jpeg', 1, '2020-09-10 14:58:36', '2020-09-11 14:50:49'),
(50, 58, 'image00017-1599750253.jpeg', 1, '2020-09-10 15:04:13', '2020-09-11 14:55:42'),
(51, 59, 'e32207a8-9db3-4972-aefb-736cdb475b7c-1599750440.jpeg', 1, '2020-09-10 15:07:20', '2020-09-21 20:04:23'),
(52, 60, 'dsc-4907-1599751332.jpeg', 1, '2020-09-10 15:22:12', '2020-09-11 15:04:26'),
(53, 61, 'image00019-1599751695.jpeg', 1, '2020-09-10 15:28:15', '2020-09-11 17:41:37'),
(54, 62, 'siten22-1599752058.jpeg', 1, '2020-09-10 15:34:18', '2020-09-21 20:00:22'),
(55, 63, 'dsc-4406-1599752273.jpeg', 1, '2020-09-10 15:37:53', '2020-09-11 17:51:11'),
(56, 64, 'dsc-4145-1599752609.jpeg', 1, '2020-09-10 15:43:29', '2020-09-11 17:58:31'),
(57, 65, 'dsc-5449-2-1599752760.jpeg', 1, '2020-09-10 15:46:00', '2020-09-21 18:48:46'),
(58, 66, 'image00036-1599752980.jpeg', 1, '2020-09-10 15:49:40', '2020-09-11 18:09:32'),
(59, 67, 'dsc-5259-1599753208.jpeg', 1, '2020-09-10 15:53:28', '2020-09-11 18:18:22'),
(60, 68, 'dsc-5170-1599753348.jpeg', 1, '2020-09-10 15:55:48', '2020-09-21 18:43:15'),
(61, 69, 'siten135-1599754214.jpeg', 1, '2020-09-10 16:10:14', '2020-09-23 14:40:36'),
(62, 70, '86d6f4e5-cdb0-421d-88f2-4345ffc660d4-1599754500.jpeg', 1, '2020-09-10 16:15:00', '2020-09-21 18:28:26'),
(63, 71, '27ff37ab-afbd-4a98-a6f1-99fc6d9e3363-1599754916.jpeg', 1, '2020-09-10 16:21:56', '2020-09-11 18:58:08'),
(64, 72, '8d04cbd8-8f66-409d-936d-7369fa38a93b-1599755085.jpeg', 1, '2020-09-10 16:24:45', '2020-09-21 16:11:05'),
(65, 73, 'dfa9f98b-8d45-40eb-bc0c-bb90d408517a-1599755262.jpeg', 1, '2020-09-10 16:27:42', '2020-09-11 19:05:26'),
(66, 74, 'sitebata-1599755412.jpeg', 1, '2020-09-10 16:30:12', '2020-09-11 19:18:42'),
(67, 75, 'image00007-1599755804.jpeg', 1, '2020-09-10 16:36:44', '2020-09-23 14:49:02'),
(68, 76, 'dsc-4622-1599756280.jpeg', 1, '2020-09-10 16:44:40', '2020-09-11 19:49:06'),
(70, 78, 'azul2-1599756860.jpeg', 0, '2020-09-10 16:54:20', '2020-09-11 19:58:56'),
(71, 79, 'dsc-4461-1599757140.jpeg', 1, '2020-09-10 16:59:00', '2020-09-21 14:49:58'),
(72, 80, 'dsc-4605-1599757389.jpeg', 1, '2020-09-10 17:03:09', '2020-09-21 14:55:18'),
(73, 81, 'body-47-1599757553.jpeg', 1, '2020-09-10 17:05:53', '2020-09-21 15:57:47'),
(74, 82, 'siten6-1599757901.jpeg', 1, '2020-09-10 17:11:41', '2020-09-21 15:03:17'),
(75, 83, 'siten9-1599758097.jpeg', 1, '2020-09-10 17:14:57', '2020-09-21 15:46:43'),
(76, 84, 'dsc-4827-1599758245.jpeg', 1, '2020-09-10 17:17:25', '2020-09-21 15:30:21'),
(77, 85, 'siten114-1599758437.jpeg', 1, '2020-09-10 17:20:38', '2020-09-22 18:45:48'),
(78, 86, 'tiara-1599758643.jpeg', 1, '2020-09-10 17:24:03', '2020-09-22 19:26:07'),
(79, 87, 'bico-de-pato-1599759343.jpeg', 1, '2020-09-10 17:35:43', '2020-09-22 18:43:45'),
(81, 89, 'dsc-5711-2-1599771316.jpeg', 1, '2020-09-10 20:55:16', '2020-09-22 18:35:14'),
(82, 90, 'dsc-4102-1599771447.jpeg', 1, '2020-09-10 20:57:27', '2020-09-10 20:57:27'),
(83, 54, 'dsc-4110-1599834299.jpeg', 0, '2020-09-11 14:24:59', '2020-09-11 14:29:20'),
(86, 54, 'siten54-1599834337.jpeg', 0, '2020-09-11 14:25:38', '2020-09-11 14:29:20'),
(87, 54, 'siten56-1599834433.jpeg', 0, '2020-09-11 14:27:13', '2020-09-11 14:29:20'),
(88, 54, 'siten55-1599834541.jpeg', 0, '2020-09-11 14:29:01', '2020-09-11 14:29:20'),
(89, 55, 'dsc-4145-1599835656.jpeg', 0, '2020-09-11 14:47:36', '2020-09-11 14:48:34'),
(90, 55, 'siten53-1599835693.jpeg', 0, '2020-09-11 14:48:13', '2020-09-11 14:48:34'),
(91, 55, 'siten52-1599835710.jpeg', 0, '2020-09-11 14:48:30', '2020-09-11 14:48:34'),
(92, 57, 'dsc-5135-1599835819.jpeg', 0, '2020-09-11 14:50:19', '2020-09-11 14:50:49'),
(93, 57, 'dsc-5107-1599835843.jpeg', 0, '2020-09-11 14:50:43', '2020-09-11 14:50:49'),
(94, 58, 'image00026-1599835962.jpeg', 0, '2020-09-11 14:52:42', '2020-09-11 14:55:42'),
(95, 58, 'image00023-1599835979.jpeg', 0, '2020-09-11 14:52:59', '2020-09-11 14:55:42'),
(96, 58, 'dsc-4994-1599836017.jpeg', 0, '2020-09-11 14:53:37', '2020-09-11 14:55:42'),
(97, 58, 'siten31-1599836082.jpeg', 0, '2020-09-11 14:54:42', '2020-09-11 14:55:42'),
(98, 58, 'siten33-1599836110.jpeg', 0, '2020-09-11 14:55:10', '2020-09-11 14:55:42'),
(99, 58, 'siten32-1599836136.jpeg', 0, '2020-09-11 14:55:36', '2020-09-11 14:55:42'),
(100, 60, 'dsc-4932-2-1599836475.jpeg', 0, '2020-09-11 15:01:15', '2020-09-11 15:04:26'),
(101, 60, 'image00002-1599836494.jpeg', 0, '2020-09-11 15:01:34', '2020-09-11 15:04:26'),
(102, 60, 'image00005-1599836509.jpeg', 0, '2020-09-11 15:01:49', '2020-09-11 15:04:26'),
(103, 60, 'siten85-1599836576.jpeg', 0, '2020-09-11 15:02:56', '2020-09-11 15:04:26'),
(104, 60, 'siten87-1599836623.jpeg', 0, '2020-09-11 15:03:43', '2020-09-11 15:04:26'),
(105, 60, 'siten86-1599836642.jpeg', 0, '2020-09-11 15:04:02', '2020-09-11 15:04:26'),
(106, 60, 'siten88-1599836660.jpeg', 0, '2020-09-11 15:04:20', '2020-09-11 15:04:26'),
(107, 61, 'image00018-1599846003.jpeg', 0, '2020-09-11 17:40:04', '2020-09-11 17:41:37'),
(108, 61, 'siten28-1599846047.jpeg', 0, '2020-09-11 17:40:47', '2020-09-11 17:41:37'),
(109, 61, 'siten30-1599846077.jpeg', 0, '2020-09-11 17:41:17', '2020-09-11 17:41:37'),
(110, 61, 'siten29-1599846092.jpeg', 0, '2020-09-11 17:41:32', '2020-09-11 17:41:37'),
(111, 63, 'dsc-4426-1599846497.jpeg', 0, '2020-09-11 17:48:18', '2020-09-11 17:51:11'),
(112, 63, 'dsc-4399-1599846514.jpeg', 0, '2020-09-11 17:48:34', '2020-09-11 17:51:11'),
(113, 63, 'siten89-1599846551.jpeg', 0, '2020-09-11 17:49:11', '2020-09-11 17:51:11'),
(114, 63, 'siten92-1599846567.jpeg', 0, '2020-09-11 17:49:27', '2020-09-11 17:51:11'),
(115, 63, 'siten90-1599846626.jpeg', 0, '2020-09-11 17:50:26', '2020-09-11 17:51:11'),
(116, 63, 'siten91-1599846651.jpeg', 0, '2020-09-11 17:50:51', '2020-09-11 17:51:11'),
(117, 64, 'dsc-4172-1599847034.jpeg', 0, '2020-09-11 17:57:14', '2020-09-11 17:58:31'),
(118, 64, 'siten60-1599847063.jpeg', 0, '2020-09-11 17:57:43', '2020-09-11 17:58:31'),
(119, 64, 'siten61-1599847079.jpeg', 0, '2020-09-11 17:57:59', '2020-09-11 17:58:31'),
(120, 64, 'siten59-1599847098.jpeg', 0, '2020-09-11 17:58:18', '2020-09-11 17:58:31'),
(121, 66, 'dsc-5417-2-1599847516.jpeg', 0, '2020-09-11 18:05:16', '2020-09-11 18:09:32'),
(122, 66, 'image00020-2-1599847543.jpeg', 0, '2020-09-11 18:05:43', '2020-09-11 18:09:32'),
(123, 66, 'image00033-1599847630.jpeg', 0, '2020-09-11 18:07:10', '2020-09-11 18:09:32'),
(124, 66, 'image00021-1599847651.jpeg', 0, '2020-09-11 18:07:31', '2020-09-11 18:09:32'),
(125, 66, 'image00025-1599847673.jpeg', 0, '2020-09-11 18:07:53', '2020-09-11 18:09:32'),
(126, 66, 'body-35-1599847746.jpeg', 0, '2020-09-11 18:09:06', '2020-09-11 18:09:32'),
(127, 66, 'body-49-1599847766.jpeg', 0, '2020-09-11 18:09:26', '2020-09-11 18:09:32'),
(128, 67, 'dsc-5285-1599848244.jpeg', 0, '2020-09-11 18:17:24', '2020-09-11 18:18:22'),
(129, 67, 'image00016-1599848265.jpeg', 0, '2020-09-11 18:17:45', '2020-09-11 18:18:22'),
(130, 67, 'image00003-1599848280.jpeg', 0, '2020-09-11 18:18:00', '2020-09-11 18:18:22'),
(131, 67, 'image00011-1599848296.jpeg', 0, '2020-09-11 18:18:16', '2020-09-11 18:18:22'),
(132, 71, 'image00039-1599850592.jpeg', 0, '2020-09-11 18:56:32', '2020-09-11 18:58:08'),
(133, 71, 'dsc-5322-2-1599850616.jpeg', 0, '2020-09-11 18:56:56', '2020-09-11 18:58:08'),
(134, 71, 'dsc-5359-2-1599850640.jpeg', 0, '2020-09-11 18:57:20', '2020-09-11 18:58:08'),
(135, 71, 'body-38-1599850680.jpeg', 0, '2020-09-11 18:58:00', '2020-09-11 18:58:08'),
(136, 73, 'c60c75fe-2da1-41d3-8184-6d5b7b05dbab-1599851005.jpeg', 0, '2020-09-11 19:03:25', '2020-09-11 19:05:26'),
(137, 73, 'siten69-1599851051.jpeg', 0, '2020-09-11 19:04:11', '2020-09-11 19:05:26'),
(138, 73, 'siten71-1599851076.jpeg', 0, '2020-09-11 19:04:36', '2020-09-11 19:05:26'),
(139, 73, 'siten70-1599851099.jpeg', 0, '2020-09-11 19:04:59', '2020-09-11 19:05:26'),
(140, 73, 'siten72-1599851120.jpeg', 0, '2020-09-11 19:05:20', '2020-09-11 19:05:26'),
(141, 74, 'sitebata2-1599851759.jpeg', 0, '2020-09-11 19:15:59', '2020-09-11 19:18:42'),
(142, 74, 'sitebata3-1599851840.jpeg', 0, '2020-09-11 19:17:20', '2020-09-11 19:18:42'),
(143, 74, 'siten105-1599851884.jpeg', 0, '2020-09-11 19:18:04', '2020-09-11 19:18:42'),
(144, 74, 'siten106-1599851902.jpeg', 0, '2020-09-11 19:18:22', '2020-09-11 19:18:42'),
(145, 74, 'siten107-1599851918.jpeg', 0, '2020-09-11 19:18:38', '2020-09-11 19:18:42'),
(146, 76, 'dsc-4315-1599853518.jpeg', 0, '2020-09-11 19:45:18', '2020-09-11 19:49:06'),
(147, 76, 'body-50-1599853690.jpeg', 0, '2020-09-11 19:48:10', '2020-09-11 19:49:06'),
(148, 76, 'body-51-1599853707.jpeg', 0, '2020-09-11 19:48:27', '2020-09-11 19:49:06'),
(149, 76, 'siten57-1599853740.jpeg', 0, '2020-09-11 19:49:00', '2020-09-11 19:49:06'),
(150, 78, 'azul-1599854336.jpeg', 1, '2020-09-11 19:58:57', '2020-09-11 19:58:57'),
(151, 79, 'dsc-4509-1600699156.jpeg', 0, '2020-09-21 14:39:16', '2020-09-21 14:49:57'),
(152, 79, 'siten77-1600699187.jpeg', 0, '2020-09-21 14:39:47', '2020-09-21 14:49:57'),
(153, 79, 'siten79-1600699254.jpeg', 0, '2020-09-21 14:40:54', '2020-09-21 14:49:57'),
(154, 79, 'siten78-1600699786.jpeg', 0, '2020-09-21 14:49:46', '2020-09-21 14:49:57'),
(155, 80, 'siten82-1600700068.jpeg', 0, '2020-09-21 14:54:28', '2020-09-21 14:55:18'),
(156, 80, 'siten80-1600700097.jpeg', 0, '2020-09-21 14:54:57', '2020-09-21 14:55:18'),
(157, 80, 'siten81-1600700114.jpeg', 0, '2020-09-21 14:55:14', '2020-09-21 14:55:18'),
(158, 82, 'siten8-1600700569.jpeg', 0, '2020-09-21 15:02:50', '2020-09-21 15:03:17'),
(159, 82, 'siten7-1600700594.jpeg', 0, '2020-09-21 15:03:14', '2020-09-21 15:03:17'),
(160, 84, 'dsc-4225-1600702013.jpeg', 0, '2020-09-21 15:26:53', '2020-09-21 15:30:21'),
(161, 84, 'siten100-1600702073.jpeg', 0, '2020-09-21 15:27:53', '2020-09-21 15:30:21'),
(162, 84, 'siten102-1600702088.jpeg', 0, '2020-09-21 15:28:08', '2020-09-21 15:30:21'),
(163, 84, 'siten101-1600702100.jpeg', 0, '2020-09-21 15:28:20', '2020-09-21 15:30:21'),
(164, 84, 'siten103-1600702139.jpeg', 0, '2020-09-21 15:28:59', '2020-09-21 15:30:21'),
(165, 84, 'siten104-1600702152.jpeg', 0, '2020-09-21 15:29:12', '2020-09-21 15:30:21'),
(166, 84, 'siten98-1600702201.jpeg', 0, '2020-09-21 15:30:01', '2020-09-21 15:30:21'),
(167, 84, 'siten99-1600702216.jpeg', 0, '2020-09-21 15:30:16', '2020-09-21 15:30:21'),
(168, 56, 'siten48-1600702391.jpeg', 0, '2020-09-21 15:33:11', '2020-09-21 15:33:57'),
(169, 56, 'siten51-1600702408.jpeg', 0, '2020-09-21 15:33:28', '2020-09-21 15:33:57'),
(170, 56, 'siten49-1600702420.jpeg', 0, '2020-09-21 15:33:40', '2020-09-21 15:33:57'),
(171, 56, 'siten50-1600702434.jpeg', 0, '2020-09-21 15:33:54', '2020-09-21 15:33:57'),
(172, 83, 'siten11-1600703003.jpeg', 0, '2020-09-21 15:43:23', '2020-09-21 15:46:43'),
(173, 83, 'siten10-1600703047.jpeg', 0, '2020-09-21 15:44:07', '2020-09-21 15:46:43'),
(174, 81, 'body-48-1600703862.jpeg', 0, '2020-09-21 15:57:42', '2020-09-21 15:57:47'),
(175, 77, 'dsc-4724-1600704025.jpeg', 1, '2020-09-21 16:00:25', '2020-09-21 16:01:45'),
(176, 77, 'dsc-4706-1600704047.jpeg', 0, '2020-09-21 16:00:47', '2020-09-21 16:01:45'),
(177, 77, 'siten65-1600704073.jpeg', 0, '2020-09-21 16:01:13', '2020-09-21 16:01:45'),
(178, 77, 'siten64-1600704084.jpeg', 0, '2020-09-21 16:01:24', '2020-09-21 16:01:45'),
(179, 77, 'siten66-1600704099.jpeg', 0, '2020-09-21 16:01:39', '2020-09-21 16:01:45'),
(180, 72, 'body-31-1600704601.jpeg', 0, '2020-09-21 16:10:02', '2020-09-21 16:11:05'),
(181, 72, 'body-30-1600704644.jpeg', 0, '2020-09-21 16:10:44', '2020-09-21 16:11:05'),
(182, 70, 'body-33-1600712885.jpeg', 0, '2020-09-21 18:28:05', '2020-09-21 18:28:26'),
(183, 70, 'body-34-1600712899.jpeg', 0, '2020-09-21 18:28:19', '2020-09-21 18:28:26'),
(184, 68, 'siten45-1600713733.jpeg', 0, '2020-09-21 18:42:13', '2020-09-21 18:43:15'),
(185, 68, 'siten47-1600713769.jpeg', 0, '2020-09-21 18:42:49', '2020-09-21 18:43:15'),
(186, 68, 'siten46-1600713781.jpeg', 0, '2020-09-21 18:43:01', '2020-09-21 18:43:15'),
(187, 65, 'siten25-1600714032.jpeg', 0, '2020-09-21 18:47:12', '2020-09-21 18:48:46'),
(188, 65, 'siten27-1600714065.jpeg', 0, '2020-09-21 18:47:45', '2020-09-21 18:48:46'),
(189, 65, 'siten93-1600714096.jpeg', 0, '2020-09-21 18:48:16', '2020-09-21 18:48:46'),
(190, 62, 'dsc-4959-2-1600718367.jpeg', 0, '2020-09-21 19:59:27', '2020-09-21 20:00:22'),
(191, 62, 'siten23-1600718403.jpeg', 0, '2020-09-21 20:00:03', '2020-09-21 20:00:22'),
(192, 62, 'siten24-1600718416.jpeg', 0, '2020-09-21 20:00:16', '2020-09-21 20:00:22'),
(193, 59, 'body-46-1600718659.jpeg', 0, '2020-09-21 20:04:19', '2020-09-21 20:04:23'),
(195, 40, 'dsc-5514-2-1600723656.jpeg', 1, '2020-09-21 21:27:36', '2020-09-22 15:58:46'),
(196, 40, 'dsc-5469-2-1600723674.jpeg', 0, '2020-09-21 21:27:54', '2020-09-22 15:58:46'),
(197, 40, 'dsc-5523-2-1600723691.jpeg', 0, '2020-09-21 21:28:12', '2020-09-22 15:58:46'),
(198, 40, 'body-57-1600723730.jpeg', 0, '2020-09-21 21:28:50', '2020-09-22 15:58:46'),
(199, 40, 'body-55-1600723752.jpeg', 0, '2020-09-21 21:29:12', '2020-09-22 15:58:46'),
(200, 40, 'body-56-1600723773.jpeg', 0, '2020-09-21 21:29:33', '2020-09-22 15:58:46'),
(202, 40, 'image00005-1600790159.jpeg', 0, '2020-09-22 15:55:59', '2020-09-22 15:58:46'),
(203, 40, 'image00001-1600790179.jpeg', 0, '2020-09-22 15:56:19', '2020-09-22 15:58:46'),
(204, 40, 'image00027-1600790280.jpeg', 0, '2020-09-22 15:58:00', '2020-09-22 15:58:46'),
(205, 40, 'image00009-1600790300.jpeg', 0, '2020-09-22 15:58:21', '2020-09-22 15:58:46'),
(206, 40, 'image00012-1600790315.jpeg', 0, '2020-09-22 15:58:35', '2020-09-22 15:58:46'),
(207, 41, 'siten67-1600790736.jpeg', 0, '2020-09-22 16:05:36', '2020-09-22 16:06:13'),
(208, 41, 'siten84-1600790752.jpeg', 0, '2020-09-22 16:05:52', '2020-09-22 16:06:13'),
(209, 41, 'siten68-1600790769.jpeg', 0, '2020-09-22 16:06:09', '2020-09-22 16:06:13'),
(210, 42, 'body-52-1600791036.jpeg', 0, '2020-09-22 16:10:36', '2020-09-22 16:10:58'),
(211, 42, 'body-54-1600791053.jpeg', 0, '2020-09-22 16:10:53', '2020-09-22 16:10:58'),
(212, 43, 'siten40-1600791461.jpeg', 0, '2020-09-22 16:17:41', '2020-09-22 16:21:16'),
(213, 43, 'siten41-1600791482.jpeg', 0, '2020-09-22 16:18:02', '2020-09-22 16:21:16'),
(214, 43, 'siten39-1600791508.jpeg', 0, '2020-09-22 16:18:28', '2020-09-22 16:21:16'),
(215, 43, 'siten42-1600791526.jpeg', 0, '2020-09-22 16:18:46', '2020-09-22 16:21:16'),
(216, 44, 'image00050-1600793076.jpeg', 0, '2020-09-22 16:44:36', '2020-09-22 16:47:20'),
(217, 44, 'image00007-1600793121.jpeg', 0, '2020-09-22 16:45:21', '2020-09-22 16:47:20'),
(218, 44, 'image00011-1600793137.jpeg', 0, '2020-09-22 16:45:37', '2020-09-22 16:47:20'),
(219, 44, 'image00008-1600793152.jpeg', 0, '2020-09-22 16:45:52', '2020-09-22 16:47:20'),
(220, 44, 'body-43-1600793208.jpeg', 0, '2020-09-22 16:46:48', '2020-09-22 16:47:20'),
(221, 44, 'siten83-1600793229.jpeg', 0, '2020-09-22 16:47:09', '2020-09-22 16:47:20'),
(222, 47, 'e808f0ae-52a1-4d2d-8d2b-4056814f73c7-1600793694.jpeg', 0, '2020-09-22 16:54:54', '2020-09-22 16:56:43'),
(223, 47, 'siten34-1600793722.jpeg', 0, '2020-09-22 16:55:22', '2020-09-22 16:56:43'),
(224, 47, 'siten36-1600793739.jpeg', 0, '2020-09-22 16:55:39', '2020-09-22 16:56:43'),
(225, 47, 'siten35-1600793767.jpeg', 0, '2020-09-22 16:56:08', '2020-09-22 16:56:43'),
(226, 47, 'siten38-1600793783.jpeg', 0, '2020-09-22 16:56:23', '2020-09-22 16:56:43'),
(227, 47, 'siten37-1600793800.jpeg', 0, '2020-09-22 16:56:40', '2020-09-22 16:56:43'),
(228, 49, 'body-37-1600794163.jpeg', 0, '2020-09-22 17:02:43', '2020-09-22 17:02:47'),
(229, 53, 'siten21-1600794372.jpeg', 0, '2020-09-22 17:06:12', '2020-09-22 17:06:15'),
(232, 89, 'dsc-4724-1600799651.jpeg', 0, '2020-09-22 18:34:11', '2020-09-22 18:35:14'),
(233, 89, 'dsc-5170-1600799651.jpeg', 0, '2020-09-22 18:34:11', '2020-09-22 18:35:14'),
(240, 87, 'dsc-5678-2-1600800002.jpeg', 0, '2020-09-22 18:40:02', '2020-09-22 18:43:45'),
(241, 87, 'dsc-5737-2-1600800002.jpeg', 0, '2020-09-22 18:40:02', '2020-09-22 18:43:45'),
(242, 87, 'image00028-1600800002.jpeg', 0, '2020-09-22 18:40:02', '2020-09-22 18:43:45'),
(243, 87, 'image00026-1600800081.jpeg', 0, '2020-09-22 18:41:21', '2020-09-22 18:43:45'),
(244, 85, 'image00025-1600800266.jpeg', 0, '2020-09-22 18:44:26', '2020-09-22 18:45:48'),
(245, 85, 'dsc-4113-1600800336.jpeg', 0, '2020-09-22 18:45:36', '2020-09-22 18:45:48'),
(246, 85, 'dsc-5046-1600800336.jpeg', 0, '2020-09-22 18:45:36', '2020-09-22 18:45:48'),
(247, 85, 'image00010-1600800336.jpeg', 0, '2020-09-22 18:45:36', '2020-09-22 18:45:48'),
(248, 86, 'dsc-5514-2-1600802747.jpeg', 0, '2020-09-22 19:25:47', '2020-09-22 19:26:07'),
(249, 86, 'dsc-5523-2-1600802747.jpeg', 0, '2020-09-22 19:25:48', '2020-09-22 19:26:07'),
(250, 88, 'dsc-5377-2-1600803050.jpeg', 0, '2020-09-22 19:30:50', '2020-09-23 14:52:58'),
(251, 88, 'dsc-5417-2-1600803050.jpeg', 0, '2020-09-22 19:30:50', '2020-09-23 14:52:58'),
(252, 48, 'dsc-5068-1600803646.jpeg', 0, '2020-09-22 19:40:47', '2020-09-22 19:42:36'),
(253, 48, 'siten63-1600803710.jpeg', 0, '2020-09-22 19:41:50', '2020-09-22 19:42:36'),
(254, 48, 'siten62-1600803723.jpeg', 0, '2020-09-22 19:42:03', '2020-09-22 19:42:36'),
(255, 48, 'siten58-1600803745.jpeg', 0, '2020-09-22 19:42:25', '2020-09-22 19:42:36'),
(256, 52, 'siten5-1600804101.jpeg', 0, '2020-09-22 19:48:21', '2020-09-22 19:49:48'),
(257, 52, 'siten3-1600804117.jpeg', 0, '2020-09-22 19:48:37', '2020-09-22 19:49:48'),
(258, 52, '9d441801-db7b-4eee-9e7a-94819b5616f5-1600804154.png', 0, '2020-09-22 19:49:14', '2020-09-22 19:49:48'),
(259, 52, 'siten4-1600804182.jpeg', 0, '2020-09-22 19:49:42', '2020-09-22 19:49:48'),
(260, 51, 'siten94-1600804487.jpeg', 0, '2020-09-22 19:54:47', '2020-09-22 19:55:57'),
(261, 51, 'siten97-1600804501.jpeg', 0, '2020-09-22 19:55:01', '2020-09-22 19:55:57'),
(262, 51, 'siten26-1600804516.jpeg', 0, '2020-09-22 19:55:16', '2020-09-22 19:55:57'),
(263, 51, 'siten95-1600804537.jpeg', 0, '2020-09-22 19:55:37', '2020-09-22 19:55:57'),
(264, 51, 'siten96-1600804553.jpeg', 0, '2020-09-22 19:55:53', '2020-09-22 19:55:57'),
(265, 46, 'image00048-1600863874.jpeg', 0, '2020-09-23 12:24:34', '2020-09-23 12:28:43'),
(266, 46, 'image00050-1600863977.jpeg', 0, '2020-09-23 12:26:17', '2020-09-23 12:28:43'),
(267, 46, 'image00007-1600864002.jpeg', 0, '2020-09-23 12:26:42', '2020-09-23 12:28:43'),
(268, 46, 'dsc-5678-2-1600864059.jpeg', 0, '2020-09-23 12:27:39', '2020-09-23 12:28:43'),
(269, 46, '0c9e56f2-a987-4f5f-8ad1-c1994b836e73-1600864117.jpeg', 0, '2020-09-23 12:28:37', '2020-09-23 12:28:43'),
(270, 45, '9de4be78-7feb-4848-8d1f-a29c2524b7f9-1600864651.jpeg', 0, '2020-09-23 12:37:31', '2020-09-23 12:39:01'),
(271, 45, 'b6d3a7b3-f0d4-4ede-9303-b390af4dbd64-1600864703.jpeg', 0, '2020-09-23 12:38:23', '2020-09-23 12:39:01'),
(272, 45, '0a1955e0-eac5-4b16-ba90-fb5a90321bea-1600864737.jpeg', 0, '2020-09-23 12:38:57', '2020-09-23 12:39:01'),
(273, 50, 'siten12-1600865036.jpeg', 0, '2020-09-23 12:43:56', '2020-09-23 12:56:55'),
(274, 50, 'siten14-1600865093.jpeg', 0, '2020-09-23 12:44:53', '2020-09-23 12:56:55'),
(275, 50, 'siten13-1600865106.jpeg', 0, '2020-09-23 12:45:06', '2020-09-23 12:56:55'),
(276, 50, 'siten15-1600865119.jpeg', 0, '2020-09-23 12:45:19', '2020-09-23 12:56:55'),
(277, 50, 'siten16-1600865151.jpeg', 0, '2020-09-23 12:45:51', '2020-09-23 12:56:55'),
(278, 50, 'siten17-1600865166.jpeg', 0, '2020-09-23 12:46:07', '2020-09-23 12:56:55'),
(279, 50, 'siten18-1600865185.jpeg', 0, '2020-09-23 12:46:25', '2020-09-23 12:56:55'),
(280, 50, 'siten19-1600865219.jpeg', 0, '2020-09-23 12:46:59', '2020-09-23 12:56:55'),
(281, 92, 'dsc-4102-1600866124.jpeg', 0, '2020-09-23 13:02:04', '2020-10-21 17:38:24'),
(282, 92, 'dsc-5068-1600866593.jpeg', 0, '2020-09-23 13:09:53', '2020-10-21 17:38:24'),
(283, 92, 'dsc-5523-2-1600866593.jpeg', 1, '2020-09-23 13:09:53', '2020-10-21 17:38:24'),
(284, 69, 'siten137-1600872030.jpeg', 0, '2020-09-23 14:40:30', '2020-09-23 14:40:36'),
(285, 69, 'siten136-1600872030.jpeg', 0, '2020-09-23 14:40:30', '2020-09-23 14:40:36'),
(286, 69, 'siten134-1600872030.jpeg', 0, '2020-09-23 14:40:30', '2020-09-23 14:40:36'),
(287, 69, 'siten133-1600872030.jpeg', 0, '2020-09-23 14:40:30', '2020-09-23 14:40:36'),
(288, 69, 'siten132-1600872030.jpeg', 0, '2020-09-23 14:40:30', '2020-09-23 14:40:36'),
(289, 75, 'image00009-2-1600872422.jpeg', 0, '2020-09-23 14:47:02', '2020-09-23 14:49:02'),
(290, 75, 'image00048-1600872449.jpeg', 0, '2020-09-23 14:47:29', '2020-09-23 14:49:02'),
(291, 75, 'dsc-5259-1600872488.jpeg', 0, '2020-09-23 14:48:08', '2020-09-23 14:49:02'),
(292, 75, 'dsc-5135-1600872510.jpeg', 0, '2020-09-23 14:48:30', '2020-09-23 14:49:02'),
(293, 75, 'body-41-1600872537.jpeg', 0, '2020-09-23 14:48:57', '2020-09-23 14:49:02'),
(294, 75, 'body-40-1600872537.jpeg', 0, '2020-09-23 14:48:57', '2020-09-23 14:49:02'),
(295, 75, 'body-39-1600872537.jpeg', 0, '2020-09-23 14:48:57', '2020-09-23 14:49:02'),
(296, 88, 'site-novssso-1600872778.jpeg', 1, '2020-09-23 14:52:58', '2020-09-23 14:52:58'),
(297, 93, 'tiara-1599758643-1601032767.jpeg', 1, '2020-09-25 11:19:27', '2020-09-25 11:19:27'),
(298, 94, 'rodrigo-castro-editada-10-1601663552.jpeg', 1, '2020-10-02 18:32:32', '2020-10-02 18:57:02'),
(299, 94, 'rodrigo-castro-editada-8-1601663593.jpeg', 0, '2020-10-02 18:33:13', '2020-10-02 18:57:02'),
(300, 94, 'rodrigo-castro-editada-9-1601663668.jpeg', 0, '2020-10-02 18:34:28', '2020-10-02 18:57:02'),
(301, 95, 'rodrigo-castro-editada-16-1601666993.jpeg', 1, '2020-10-02 19:29:53', '2020-10-02 19:31:47'),
(302, 95, 'rodrigo-castro-editada-31-1601667026.jpeg', 0, '2020-10-02 19:30:26', '2020-10-02 19:31:47'),
(303, 95, 'rodrigo-castro-editada-32-1601667062.jpeg', 0, '2020-10-02 19:31:02', '2020-10-02 19:31:47'),
(304, 95, 'rodrigo-castro-editada-35-1601667091.jpeg', 0, '2020-10-02 19:31:31', '2020-10-02 19:31:47'),
(305, 96, 'rodrigo-castro-editada-11-1601669410.jpeg', 1, '2020-10-02 20:10:10', '2020-10-02 20:25:23'),
(306, 96, 'rodrigo-castro-editada-42-1601669652.jpeg', 0, '2020-10-02 20:14:12', '2020-10-02 20:25:23'),
(307, 96, 'rodrigo-castro-editada-12-1601670312.jpeg', 0, '2020-10-02 20:25:12', '2020-10-02 20:25:23'),
(308, 97, 'rodrigo-castro-editada-23-1601670698.jpeg', 1, '2020-10-02 20:31:38', '2020-10-02 20:48:15'),
(309, 97, 'rodrigo-castro-editada-3-1601670751.jpeg', 0, '2020-10-02 20:32:31', '2020-10-02 20:48:15'),
(310, 97, 'rodrigo-castro-editada-50-1601670790.jpeg', 0, '2020-10-02 20:33:10', '2020-10-02 20:48:15'),
(311, 97, 'rodrigo-castro-editada-22-1601670820.jpeg', 0, '2020-10-02 20:33:40', '2020-10-02 20:48:15'),
(312, 97, 'rodrigo-castro-editada-21-1601670855.jpeg', 0, '2020-10-02 20:34:15', '2020-10-02 20:48:15'),
(313, 97, 'rodrigo-castro-editada-2-1601671687.jpeg', 0, '2020-10-02 20:48:07', '2020-10-02 20:48:15'),
(314, 98, 'rodrigo-castro-editada-49-1601672800.jpeg', 1, '2020-10-02 21:06:40', '2020-10-02 21:19:34'),
(315, 98, 'rodrigo-castro-editada-46-1601673137.jpeg', 0, '2020-10-02 21:12:17', '2020-10-02 21:19:34'),
(316, 98, 'rodrigo-castro-editada-47-1601673170.jpeg', 0, '2020-10-02 21:12:50', '2020-10-02 21:19:34'),
(320, 100, 'roupasite4-1601908372.jpeg', 1, '2020-10-05 14:32:52', '2020-10-05 14:41:42'),
(321, 101, 'roupasite7-1601908461.jpeg', 0, '2020-10-05 14:34:21', '2021-01-11 21:39:05'),
(322, 101, 'roupasite10-1601908852.jpeg', 0, '2020-10-05 14:40:52', '2021-01-11 21:39:05'),
(323, 101, 'roupasite8-1601908862.jpeg', 0, '2020-10-05 14:41:02', '2021-01-11 21:39:05'),
(324, 101, 'roupasite9-1601908871.jpeg', 0, '2020-10-05 14:41:11', '2021-01-11 21:39:05'),
(325, 100, 'roupasite6-1601908888.jpeg', 0, '2020-10-05 14:41:28', '2020-10-05 14:41:42'),
(326, 100, 'roupasite5-1601908899.jpeg', 0, '2020-10-05 14:41:39', '2020-10-05 14:41:42'),
(327, 102, 'roupasite16-1601914047.jpeg', 0, '2020-10-05 16:07:27', '2020-12-10 14:45:50'),
(328, 102, 'roupasite12-1601914060.jpeg', 0, '2020-10-05 16:07:40', '2020-12-10 14:45:50'),
(329, 102, 'roupasite14-1601914070.jpeg', 0, '2020-10-05 16:07:50', '2020-12-10 14:45:50'),
(330, 102, 'roupasite15-1601914081.jpeg', 0, '2020-10-05 16:08:01', '2020-12-10 14:45:50'),
(331, 102, 'roupasite11-1601914093.jpeg', 0, '2020-10-05 16:08:13', '2020-12-10 14:45:50'),
(332, 102, 'roupasite13-1601914107.jpeg', 0, '2020-10-05 16:08:27', '2020-12-10 14:45:50'),
(333, 103, 'roupasite24-1601922511.jpeg', 0, '2020-10-05 18:28:31', '2020-12-10 14:49:01'),
(334, 103, 'roupasite25-1601922526.jpeg', 0, '2020-10-05 18:28:46', '2020-12-10 14:49:01'),
(335, 103, 'roupasite19-1601922542.jpeg', 0, '2020-10-05 18:29:02', '2020-12-10 14:49:01'),
(336, 103, 'roupasite20-1601922558.jpeg', 0, '2020-10-05 18:29:18', '2020-12-10 14:49:01'),
(338, 103, 'roupasite23-1601922598.jpeg', 0, '2020-10-05 18:29:58', '2020-12-10 14:49:01'),
(339, 103, 'roupasite18-1601922616.jpeg', 0, '2020-10-05 18:30:16', '2020-12-10 14:49:01'),
(340, 103, 'roupasite21-1601922631.jpeg', 0, '2020-10-05 18:30:31', '2020-12-10 14:49:01'),
(341, 103, 'roupasite17-1601922646.jpeg', 0, '2020-10-05 18:30:46', '2020-12-10 14:49:01'),
(342, 103, 'roupasite22-1601922657.jpeg', 0, '2020-10-05 18:30:57', '2020-12-10 14:49:01'),
(367, 108, 'rodrigo-castro-editadas-d-19-1601942420.jpeg', 1, '2020-10-06 00:00:20', '2020-10-06 00:40:51'),
(368, 108, 'rodrigo-castro-editadas-d-20-1601942440.jpeg', 0, '2020-10-06 00:00:40', '2020-10-06 00:40:51'),
(371, 109, 'rodrigo-castro-editadas-d-22-1601943159.jpeg', 1, '2020-10-06 00:12:39', '2020-10-06 00:13:54'),
(372, 109, 'rodrigo-castro-editadas-d-224-1601943225.jpeg', 0, '2020-10-06 00:13:45', '2020-10-06 00:13:54'),
(373, 106, 'rodrigo-castro-editadas-d-45-1601943777.jpeg', 1, '2020-10-06 00:22:58', '2020-10-06 00:52:45'),
(374, 104, 'rodrigo-castro-editadas-d-32-1601943885.jpeg', 1, '2020-10-06 00:24:45', '2020-10-06 00:31:11'),
(375, 105, 'rodrigo-castro-editadas-d-30-1601943903.jpeg', 1, '2020-10-06 00:25:03', '2020-10-06 00:48:49'),
(376, 107, 'rodrigo-castro-editadas-d-9-1601943923.jpeg', 1, '2020-10-06 00:25:23', '2020-10-06 00:35:56'),
(377, 104, 'rodrigo-castro-editadas-d-33-1601944047.jpeg', 0, '2020-10-06 00:27:27', '2020-10-06 00:31:11'),
(379, 104, 'rodrigo-castro-editadas-d-19-1601944109.jpeg', 0, '2020-10-06 00:28:29', '2020-10-06 00:31:11'),
(380, 104, 'rodrigo-castro-editadas-d-21-1601944137.jpeg', 0, '2020-10-06 00:28:57', '2020-10-06 00:31:11'),
(381, 104, 'roupasite26-1601944167.jpeg', 0, '2020-10-06 00:29:27', '2020-10-06 00:31:11'),
(382, 104, 'roupasite31-1601944191.jpeg', 0, '2020-10-06 00:29:51', '2020-10-06 00:31:11'),
(383, 104, 'roupasite27-1601944206.jpeg', 0, '2020-10-06 00:30:06', '2020-10-06 00:31:11'),
(384, 104, 'roupasite28-1601944223.jpeg', 0, '2020-10-06 00:30:23', '2020-10-06 00:31:11'),
(385, 104, 'roupasite32-1601944240.jpeg', 0, '2020-10-06 00:30:40', '2020-10-06 00:31:11'),
(386, 104, 'roupasite29-1601944261.jpeg', 0, '2020-10-06 00:31:01', '2020-10-06 00:31:11'),
(387, 107, 'rodrigo-castro-editadas-d-10-1601944344.jpeg', 0, '2020-10-06 00:32:25', '2020-10-06 00:35:56'),
(388, 107, 'rodrigo-castro-editada-48-1601944392.jpeg', 0, '2020-10-06 00:33:12', '2020-10-06 00:35:56'),
(389, 107, 'rodrigo-castro-editada-47-1601944440.jpeg', 0, '2020-10-06 00:34:00', '2020-10-06 00:35:56'),
(390, 107, 'roupasite45-1601944463.jpeg', 0, '2020-10-06 00:34:23', '2020-10-06 00:35:56'),
(391, 107, 'roupasite46-1601944486.jpeg', 0, '2020-10-06 00:34:46', '2020-10-06 00:35:56'),
(392, 107, 'roupasite47-1601944500.jpeg', 0, '2020-10-06 00:35:00', '2020-10-06 00:35:56'),
(393, 107, 'roupasite39-1601944517.jpeg', 0, '2020-10-06 00:35:17', '2020-10-06 00:35:56'),
(394, 107, 'roupasite41-1601944533.jpeg', 0, '2020-10-06 00:35:33', '2020-10-06 00:35:56'),
(395, 107, 'roupasite40-1601944550.jpeg', 0, '2020-10-06 00:35:50', '2020-10-06 00:35:56'),
(396, 99, 'rodrigo-castro-editadas-d-47-1601944655.jpeg', 1, '2020-10-06 00:37:35', '2020-10-06 00:39:56'),
(397, 99, 'rodrigo-castro-editadas-d-48-1601944694.jpeg', 0, '2020-10-06 00:38:14', '2020-10-06 00:39:56'),
(398, 108, 'rodrigo-castro-editadas-d-30-1601944746.jpeg', 0, '2020-10-06 00:39:06', '2020-10-06 00:40:51'),
(399, 99, 'roupasite3-1601944759.jpeg', 0, '2020-10-06 00:39:19', '2020-10-06 00:39:56'),
(400, 99, 'roupasite1-1601944774.jpeg', 0, '2020-10-06 00:39:34', '2020-10-06 00:39:56'),
(401, 99, 'roupasite2-1601944787.jpeg', 0, '2020-10-06 00:39:47', '2020-10-06 00:39:56'),
(402, 108, 'rodrigo-castro-editadas-d-31-1601944845.jpeg', 0, '2020-10-06 00:40:45', '2020-10-06 00:40:51'),
(403, 105, 'rodrigo-castro-editadas-d-41-1601945143.jpeg', 0, '2020-10-06 00:45:43', '2020-10-06 00:48:49'),
(404, 106, 'rodrigo-castro-editadas-d-43-1601945171.jpeg', 0, '2020-10-06 00:46:11', '2020-10-06 00:52:45'),
(405, 105, 'rodrigo-castro-editadas-d-42-1601945204.jpeg', 0, '2020-10-06 00:46:44', '2020-10-06 00:48:49'),
(406, 105, 'roupasite36-1601945242.jpeg', 0, '2020-10-06 00:47:22', '2020-10-06 00:48:49'),
(407, 105, 'roupasite37-1601945257.jpeg', 0, '2020-10-06 00:47:37', '2020-10-06 00:48:49'),
(408, 105, 'roupasite38-1601945270.jpeg', 0, '2020-10-06 00:47:50', '2020-10-06 00:48:49'),
(409, 105, 'roupasite33-1601945285.jpeg', 0, '2020-10-06 00:48:05', '2020-10-06 00:48:49'),
(410, 105, 'roupasite35-1601945300.jpeg', 0, '2020-10-06 00:48:20', '2020-10-06 00:48:49'),
(411, 105, 'roupasite34-1601945324.jpeg', 0, '2020-10-06 00:48:44', '2020-10-06 00:48:49'),
(412, 106, 'rodrigo-castro-editadas-d-44-1601945425.jpeg', 0, '2020-10-06 00:50:25', '2020-10-06 00:52:45'),
(413, 106, 'roupasite42-1601945488.jpeg', 0, '2020-10-06 00:51:28', '2020-10-06 00:52:45'),
(414, 106, 'roupasite44-1601945506.jpeg', 0, '2020-10-06 00:51:46', '2020-10-06 00:52:45'),
(415, 106, 'roupasite43-1601945518.jpeg', 0, '2020-10-06 00:51:58', '2020-10-06 00:52:45'),
(416, 106, 'roupasite48-1601945533.jpeg', 0, '2020-10-06 00:52:13', '2020-10-06 00:52:45'),
(417, 106, 'roupasite50-1601945547.jpeg', 0, '2020-10-06 00:52:27', '2020-10-06 00:52:45'),
(418, 106, 'roupasite49-1601945561.jpeg', 0, '2020-10-06 00:52:41', '2020-10-06 00:52:45'),
(419, 110, '6da857cc-ed92-43fe-8f0d-c64019eead37-1602103263.jpeg', 1, '2020-10-07 20:41:03', '2020-10-07 20:41:03'),
(420, 111, '93d91def-f48c-46dd-b6fb-5da887610f0d-1602103350.jpeg', 1, '2020-10-07 20:42:30', '2020-10-07 20:42:30'),
(421, 112, '6da857cc-ed92-43fe-8f0d-c64019eead37-1602276767.jpeg', 1, '2020-10-09 20:52:47', '2020-10-09 20:52:47'),
(422, 113, '93d91def-f48c-46dd-b6fb-5da887610f0d-1602276865.jpeg', 1, '2020-10-09 20:54:25', '2020-10-09 20:54:25'),
(423, 114, '534e4809-cc2d-42f5-a305-2b720520739c-1603301026.jpeg', 1, '2020-10-21 17:23:46', '2020-10-21 17:23:46'),
(424, 115, 'da-475-1603301206.jpeg', 1, '2020-10-21 17:26:46', '2020-10-21 17:26:46'),
(425, 116, 'da-542-1603301360.jpeg', 1, '2020-10-21 17:29:20', '2020-10-21 17:29:20'),
(426, 117, 'rodrigo-castro-editadas-d-8-1603716200.jpeg', 1, '2020-10-26 12:43:20', '2020-10-26 12:46:07'),
(427, 117, 'rodrigo-castro-editadas-d-9-1603716248.jpeg', 0, '2020-10-26 12:44:08', '2020-10-26 12:46:07'),
(428, 117, 'rodrigo-castro-editada-25-1603716317.jpeg', 0, '2020-10-26 12:45:18', '2020-10-26 12:46:07'),
(429, 117, 'rodrigo-castro-editadas-d-10-1603716353.jpeg', 0, '2020-10-26 12:45:53', '2020-10-26 12:46:07'),
(430, 118, 'rodrigo-castro-editadas-d-15-1603716484.jpeg', 1, '2020-10-26 12:48:04', '2020-10-26 12:49:47'),
(431, 118, 'rodrigo-castro-editadas-d-14-1603716548.jpeg', 0, '2020-10-26 12:49:08', '2020-10-26 12:49:47'),
(432, 119, 'rodrigo-castro-editadas-d-54-1603716706.jpeg', 1, '2020-10-26 12:51:47', '2020-10-26 12:57:15'),
(433, 119, 'rodrigo-castro-editadas-d-53-1603716954.jpeg', 0, '2020-10-26 12:55:54', '2020-10-26 12:57:15'),
(434, 120, 'rodrigo-castro-editadas-d-18-1603717101.jpeg', 1, '2020-10-26 12:58:21', '2020-10-26 12:59:56'),
(435, 120, 'rodrigo-castro-editadas-d-17-1603717144.jpeg', 0, '2020-10-26 12:59:04', '2020-10-26 12:59:56'),
(436, 121, 'rodrigo-castro-editadas-d-50-1603717366.jpeg', 1, '2020-10-26 13:02:46', '2020-10-26 13:06:06'),
(437, 122, 'rodrigo-castro-editadas-d-37-1603717413.jpeg', 1, '2020-10-26 13:03:33', '2020-10-26 13:07:39'),
(438, 121, 'rodrigo-castro-editadas-d-51-1603717448.jpeg', 0, '2020-10-26 13:04:08', '2020-10-26 13:06:06'),
(439, 122, 'rodrigo-castro-editadas-d-39-1603717460.jpeg', 0, '2020-10-26 13:04:20', '2020-10-26 13:07:39'),
(440, 121, 'rodrigo-castro-editadas-d-52-1603717480.jpeg', 0, '2020-10-26 13:04:40', '2020-10-26 13:06:06'),
(441, 122, 'rodrigo-castro-editadas-d-38-1603717515.jpeg', 0, '2020-10-26 13:05:15', '2020-10-26 13:07:39'),
(442, 123, 'rodrigo-castro-editadas-d-46-1603719797.jpeg', 1, '2020-10-26 13:43:17', '2020-10-26 15:16:27'),
(443, 124, 'rodrigo-castro-editadas-d-34-1603719881.jpeg', 1, '2020-10-26 13:44:41', '2020-10-26 15:15:41'),
(444, 125, 'rodrigo-castro-editadas-d-7-1603720101.jpeg', 1, '2020-10-26 13:48:21', '2020-10-26 15:08:38'),
(445, 126, 'rodrigo-castro-editadas-d-4-1603720194.jpeg', 1, '2020-10-26 13:49:54', '2020-10-26 13:49:54'),
(446, 127, 'rodrigo-castro-editadas-d-4-1603720229.jpeg', 1, '2020-10-26 13:50:30', '2020-10-26 13:50:30'),
(447, 128, 'rodrigo-castro-editadas-d-55-1603720382.jpeg', 1, '2020-10-26 13:53:02', '2020-10-26 15:24:00'),
(448, 131, 'rodrigo-castro-editada-41-1603720490.jpeg', 1, '2020-10-26 13:54:50', '2020-10-26 15:51:37'),
(449, 123, 'rodrigo-castro-editadas-d-45-1603724752.jpeg', 0, '2020-10-26 15:05:52', '2020-10-26 15:16:27'),
(450, 124, 'rodrigo-castro-editadas-d-35-1603724764.jpeg', 0, '2020-10-26 15:06:04', '2020-10-26 15:15:41'),
(451, 124, 'rodrigo-castro-editadas-d-36-1603724849.jpeg', 0, '2020-10-26 15:07:29', '2020-10-26 15:15:41'),
(452, 123, 'rodrigo-castro-editadas-d-49-1603724850.jpeg', 0, '2020-10-26 15:07:30', '2020-10-26 15:16:27'),
(453, 125, 'rodrigo-castro-editadas-d-5-1603724867.jpeg', 0, '2020-10-26 15:07:47', '2020-10-26 15:08:38'),
(454, 125, 'rodrigo-castro-editadas-d-6-1603724899.jpeg', 0, '2020-10-26 15:08:19', '2020-10-26 15:08:38'),
(455, 128, 'rodrigo-castro-editadas-d-1-1603725655.jpeg', 0, '2020-10-26 15:20:55', '2020-10-26 15:24:00'),
(456, 128, 'rodrigo-castro-editadas-d-2-1603725703.jpeg', 0, '2020-10-26 15:21:43', '2020-10-26 15:24:00'),
(457, 131, 'rodrigo-castro-editada-36-1603725846.jpeg', 0, '2020-10-26 15:24:06', '2020-10-26 15:51:37'),
(458, 131, 'rodrigo-castro-editada-40-1603725889.jpeg', 0, '2020-10-26 15:24:49', '2020-10-26 15:51:37'),
(459, 131, 'rodrigo-castro-editadas-d-12-1603727404.jpeg', 0, '2020-10-26 15:50:04', '2020-10-26 15:51:37'),
(460, 131, 'rodrigo-castro-editadas-d-16-1603727445.jpeg', 0, '2020-10-26 15:50:45', '2020-10-26 15:51:37'),
(461, 131, 'rodrigo-castro-editadas-d-11-1603727486.jpeg', 0, '2020-10-26 15:51:26', '2020-10-26 15:51:37'),
(462, 132, 'da-780-1604177879.jpeg', 1, '2020-10-31 20:57:59', '2020-10-31 20:57:59'),
(463, 133, 'dad55-1604178296.jpeg', 1, '2020-10-31 21:04:56', '2020-10-31 21:04:56'),
(464, 134, 'dad56-1604178678.jpeg', 1, '2020-10-31 21:11:18', '2020-10-31 21:11:18'),
(465, 135, 'dad58-1604178799.jpeg', 1, '2020-10-31 21:13:19', '2020-10-31 21:13:19'),
(466, 136, 'dad59-1604179340.jpeg', 1, '2020-10-31 21:22:20', '2020-10-31 21:22:20'),
(467, 137, '7f2951f1-82c0-4ef5-a6ce-08ffd580ee70-1604179997.jpeg', 1, '2020-10-31 21:33:17', '2020-10-31 21:33:17'),
(468, 138, '9e2fd9a3-6153-4545-9a80-9b2cd05990df-1604180142.jpeg', 1, '2020-10-31 21:35:42', '2020-10-31 21:35:42'),
(469, 139, 'roupasite55-1604498986.jpeg', 1, '2020-11-04 14:09:46', '2020-11-04 14:10:28'),
(470, 139, 'roupasite57-1604498998.jpeg', 0, '2020-11-04 14:09:58', '2020-11-04 14:10:28'),
(471, 139, 'roupasite56-1604499020.jpeg', 0, '2020-11-04 14:10:20', '2020-11-04 14:10:28'),
(472, 140, 'rodrigo-castro-editada-26-1605220790.jpeg', 1, '2020-11-12 22:39:50', '2020-11-12 23:05:40'),
(473, 141, '7n5j4mnw-1605220801.jpeg', 1, '2020-11-12 22:40:01', '2020-11-13 12:22:46'),
(474, 142, 'rodrigo-castro-editadas-d-26-1605220802.jpeg', 1, '2020-11-12 22:40:02', '2020-11-12 23:11:01'),
(475, 143, 'ggqn0-xq-1605220803.jpeg', 1, '2020-11-12 22:40:04', '2020-11-12 22:40:04'),
(476, 144, 'zegjarhq-1605220805.jpeg', 1, '2020-11-12 22:40:05', '2020-11-13 12:15:17'),
(478, 146, 'lv-jc6da-1605221962.jpeg', 0, '2020-11-12 22:59:22', '2020-12-07 21:23:21'),
(479, 147, 'qbkkxjtg-1605222049.jpeg', 1, '2020-11-12 23:00:49', '2020-11-13 12:17:01'),
(480, 148, 'iyl3iqmq-1605222101.jpeg', 1, '2020-11-12 23:01:41', '2020-11-13 12:08:39'),
(481, 140, 'rodrigo-castro-editada-27-1605222179.jpeg', 0, '2020-11-12 23:02:59', '2020-11-12 23:05:40'),
(482, 142, 'rodrigo-castro-editadas-d-27-1605222315.jpeg', 0, '2020-11-12 23:05:15', '2020-11-12 23:11:01'),
(483, 142, 'rodrigo-castro-editadas-d-25-1605222627.jpeg', 0, '2020-11-12 23:10:27', '2020-11-12 23:11:01'),
(484, 142, 'rodrigo-castro-editadas-d-28-1605222653.jpeg', 0, '2020-11-12 23:10:53', '2020-11-12 23:11:01'),
(485, 148, 'ds6kqjxa-1605269285.jpeg', 0, '2020-11-13 12:08:05', '2020-11-13 12:08:39'),
(486, 148, 'fokoiyuw-1605269299.jpeg', 0, '2020-11-13 12:08:19', '2020-11-13 12:08:39'),
(487, 148, '5i9lkx6q-1605269313.jpeg', 0, '2020-11-13 12:08:33', '2020-11-13 12:08:39'),
(488, 144, 'myrofasg-1605269664.jpeg', 0, '2020-11-13 12:14:24', '2020-11-13 12:15:17'),
(489, 144, 'nlye8riq-1605269693.jpeg', 0, '2020-11-13 12:14:53', '2020-11-13 12:15:17'),
(490, 144, 'szhxnylq-1605269712.jpeg', 0, '2020-11-13 12:15:12', '2020-11-13 12:15:17'),
(491, 147, 'z-bf3oqa-1605269799.jpeg', 0, '2020-11-13 12:16:39', '2020-11-13 12:17:01'),
(492, 147, 'p3kffrog-1605269817.jpeg', 0, '2020-11-13 12:16:57', '2020-11-13 12:17:01'),
(493, 141, '1gx1e5g-1605270146.jpeg', 0, '2020-11-13 12:22:26', '2020-11-13 12:22:46'),
(494, 141, 'q39nkynq-1605270162.jpeg', 0, '2020-11-13 12:22:42', '2020-11-13 12:22:46'),
(495, 145, 'cfh5ohgu-1605270632.jpeg', 1, '2020-11-13 12:30:32', '2020-11-13 12:30:48'),
(496, 145, 'q39nkynq-1605270644.jpeg', 0, '2020-11-13 12:30:44', '2020-11-13 12:30:48'),
(497, 149, 'ypyo04dq-1606068292.jpeg', 1, '2020-11-22 18:04:52', '2020-11-22 18:09:28'),
(498, 149, 'kiwi6-1606068376.png', 0, '2020-11-22 18:06:16', '2020-11-22 18:09:28'),
(499, 150, 'bn-ph5w-1606068435.jpeg', 1, '2020-11-22 18:07:15', '2020-11-22 18:09:22'),
(500, 149, 'yyfquha-1606068463.jpeg', 0, '2020-11-22 18:07:43', '2020-11-22 18:09:28'),
(501, 150, 'h2dorkkg-1606068473.jpeg', 0, '2020-11-22 18:07:53', '2020-11-22 18:09:22'),
(502, 149, '4vlhwrfa-1606068495.jpeg', 0, '2020-11-22 18:08:15', '2020-11-22 18:09:28'),
(503, 150, 'qgu7esmw-1606068508.jpeg', 0, '2020-11-22 18:08:28', '2020-11-22 18:09:22'),
(504, 149, '5tftipsg-1606068536.jpeg', 0, '2020-11-22 18:08:56', '2020-11-22 18:09:28'),
(505, 150, '3rtsc8qw-1606068541.jpeg', 0, '2020-11-22 18:09:01', '2020-11-22 18:09:22'),
(506, 149, 'knb6corw-1606068559.jpeg', 0, '2020-11-22 18:09:19', '2020-11-22 18:09:28'),
(507, 151, '01lamega-1606068621.jpeg', 1, '2020-11-22 18:10:21', '2020-11-22 18:11:48'),
(508, 151, 'ebiwimsw-1606068636.jpeg', 0, '2020-11-22 18:10:36', '2020-11-22 18:11:48'),
(509, 152, 'tc-q0jja-1606068713.jpeg', 1, '2020-11-22 18:11:53', '2020-11-22 18:12:18'),
(510, 152, 'eslhpaqg-1606068732.jpeg', 0, '2020-11-22 18:12:12', '2020-11-22 18:12:18'),
(511, 153, 'zyftnguw-1606068793.jpeg', 1, '2020-11-22 18:13:13', '2020-11-22 18:14:20'),
(512, 153, 'dlnavxcw-1606068805.jpeg', 0, '2020-11-22 18:13:25', '2020-11-22 18:14:20'),
(513, 153, 'tpborlmg-1606068825.jpeg', 0, '2020-11-22 18:13:45', '2020-11-22 18:14:20'),
(514, 153, '4qn8xv0a-1606068840.jpeg', 0, '2020-11-22 18:14:00', '2020-11-22 18:14:20'),
(515, 153, '74vrvevg-1606068856.jpeg', 0, '2020-11-22 18:14:16', '2020-11-22 18:14:20'),
(516, 154, 'iu3vlpeq-1606072313.jpeg', 1, '2020-11-22 19:11:53', '2020-11-22 19:14:11'),
(517, 154, '03-ouv3g-1606072376.jpeg', 0, '2020-11-22 19:12:56', '2020-11-22 19:14:11'),
(518, 155, 'hxtz9weq-1606072417.jpeg', 1, '2020-11-22 19:13:37', '2020-11-22 19:16:45'),
(519, 154, '8vhl7deg-1606072438.jpeg', 0, '2020-11-22 19:13:58', '2020-11-22 19:14:11'),
(520, 155, 'bynqy2fg-1606072506.jpeg', 0, '2020-11-22 19:15:06', '2020-11-22 19:16:45'),
(521, 155, 'iu3vlpeq-1606072527.jpeg', 0, '2020-11-22 19:15:27', '2020-11-22 19:16:45'),
(522, 155, '8vhl7deg-1606072541.jpeg', 0, '2020-11-22 19:15:41', '2020-11-22 19:16:45'),
(523, 156, 'ggqn0-xq-1606424995.jpeg', 1, '2020-11-26 21:09:56', '2020-11-26 21:09:56'),
(524, 157, 'da-770-1606425199.jpeg', 1, '2020-11-26 21:13:19', '2020-11-26 21:13:19'),
(525, 158, 'tlb4trjg-1607351686.jpeg', 1, '2020-12-07 14:34:46', '2020-12-07 15:23:42'),
(526, 159, 'qoflhd4a-1607351724.jpeg', 1, '2020-12-07 14:35:24', '2020-12-07 15:22:35'),
(527, 160, 'sdlljdcw-1607351811.jpeg', 1, '2020-12-07 14:36:51', '2020-12-07 15:13:33'),
(528, 161, 'fer-dgnq-1607351925.jpeg', 0, '2020-12-07 14:38:45', '2020-12-07 15:27:17'),
(529, 162, 'vej-mplq-1607351934.jpeg', 1, '2020-12-07 14:38:54', '2020-12-07 15:21:38'),
(530, 163, '4np-000g-1607351955.jpeg', 1, '2020-12-07 14:39:15', '2020-12-07 14:39:15'),
(531, 164, '4np-000g-1607353393.jpeg', 0, '2020-12-07 15:03:13', '2020-12-07 15:26:48'),
(532, 164, '9u7pg1iq-1607353565.jpeg', 1, '2020-12-07 15:06:05', '2020-12-07 15:26:48'),
(533, 164, 'dg8t7pmq-1607353578.jpeg', 0, '2020-12-07 15:06:18', '2020-12-07 15:26:48'),
(534, 164, 'eoblkqfq-1607353591.jpeg', 0, '2020-12-07 15:06:31', '2020-12-07 15:26:48'),
(535, 161, 'eb8z6bow-1607353617.jpeg', 0, '2020-12-07 15:06:57', '2020-12-07 15:27:17'),
(536, 162, 'gr03deiw-1607353837.jpeg', 0, '2020-12-07 15:10:37', '2020-12-07 15:21:38'),
(538, 160, '8v1-tsq-1607354008.jpeg', 0, '2020-12-07 15:13:28', '2020-12-07 15:13:33'),
(540, 161, 'spchjpii-1607354400.jpeg', 0, '2020-12-07 15:20:00', '2020-12-07 15:27:17'),
(541, 162, 'mjuhint-1607354450.jpeg', 0, '2020-12-07 15:20:50', '2020-12-07 15:21:38'),
(542, 162, '2g1tg3mw-1607354466.jpeg', 0, '2020-12-07 15:21:06', '2020-12-07 15:21:38'),
(543, 162, 'fqlfsmbf-1607354493.jpeg', 0, '2020-12-07 15:21:34', '2020-12-07 15:21:38'),
(544, 159, 'dpnn-egm-1607354536.jpeg', 0, '2020-12-07 15:22:16', '2020-12-07 15:22:35'),
(545, 159, 'dirwodqi-1607354550.jpeg', 0, '2020-12-07 15:22:31', '2020-12-07 15:22:35'),
(546, 158, '9cjf-y0w-1607354597.jpeg', 0, '2020-12-07 15:23:17', '2020-12-07 15:23:42'),
(547, 158, 'bkmhvc-q-1607354617.jpeg', 0, '2020-12-07 15:23:37', '2020-12-07 15:23:42'),
(548, 161, '4np-000g-1607354837.jpeg', 1, '2020-12-07 15:27:17', '2020-12-07 15:27:17'),
(549, 146, 'yejjky2g-1607376185.jpeg', 1, '2020-12-07 21:23:05', '2020-12-07 21:23:21'),
(550, 146, 'kelnp7ag-1607376196.jpeg', 0, '2020-12-07 21:23:16', '2020-12-07 21:23:21'),
(551, 165, 'agdazt-g-1607610330.jpeg', 1, '2020-12-10 14:25:30', '2020-12-10 14:25:58'),
(552, 165, 'zn00sf7w-1607610352.jpeg', 0, '2020-12-10 14:25:52', '2020-12-10 14:25:58'),
(553, 166, 'b6b4mvsw-1607610629.jpeg', 1, '2020-12-10 14:30:29', '2020-12-10 14:31:58'),
(554, 166, 'ww3yszxg-1607610668.jpeg', 0, '2020-12-10 14:31:08', '2020-12-10 14:31:58'),
(555, 167, 'qmy4g8xq-1607610923.jpeg', 1, '2020-12-10 14:35:23', '2020-12-11 13:45:35'),
(556, 167, 'tycrlgng-1607610948.jpeg', 0, '2020-12-10 14:35:48', '2020-12-11 13:45:35'),
(557, 167, 'efnfcqrg-1607610962.jpeg', 0, '2020-12-10 14:36:02', '2020-12-11 13:45:35'),
(558, 102, 'zkljdbsf-1607611502.jpeg', 1, '2020-12-10 14:45:02', '2020-12-10 14:45:50'),
(559, 102, 'mspqf8n3-1607611530.jpeg', 0, '2020-12-10 14:45:31', '2020-12-10 14:45:50'),
(560, 103, 'sxl4lzrt-1607611623.jpeg', 1, '2020-12-10 14:47:03', '2020-12-10 14:49:01'),
(561, 103, 'bmi3qwoj-1607611661.jpeg', 0, '2020-12-10 14:47:41', '2020-12-10 14:49:01'),
(562, 103, '8pxkp0uc-1607611707.jpeg', 0, '2020-12-10 14:48:27', '2020-12-10 14:49:01'),
(563, 103, '9b1ntmvs-1607611733.jpeg', 0, '2020-12-10 14:48:53', '2020-12-10 14:49:01'),
(564, 168, 'acess12-1607631233.jpeg', 1, '2020-12-10 20:13:53', '2020-12-10 20:14:53'),
(565, 168, 'acess14-1607631275.jpeg', 0, '2020-12-10 20:14:35', '2020-12-10 20:14:53'),
(566, 168, 'acess15-1607631287.jpeg', 0, '2020-12-10 20:14:47', '2020-12-10 20:14:53'),
(567, 169, 'acess7-1607631448.jpeg', 1, '2020-12-10 20:17:28', '2020-12-10 20:20:23'),
(568, 169, 'acess9-1607631486.jpeg', 0, '2020-12-10 20:18:06', '2020-12-10 20:20:23'),
(569, 169, 'acess8-1607631529.jpeg', 0, '2020-12-10 20:18:49', '2020-12-10 20:20:23'),
(570, 169, 'acess10-1607631570.jpeg', 0, '2020-12-10 20:19:30', '2020-12-10 20:20:23'),
(571, 169, 'acess13-1607631589.jpeg', 0, '2020-12-10 20:19:49', '2020-12-10 20:20:23'),
(572, 169, 'acess11-1607631612.jpeg', 0, '2020-12-10 20:20:12', '2020-12-10 20:20:23'),
(573, 170, 'acess1-1607631839.jpeg', 1, '2020-12-10 20:23:59', '2020-12-10 20:27:39'),
(574, 170, 'acess3-1607631902.jpeg', 0, '2020-12-10 20:25:02', '2020-12-10 20:27:39'),
(575, 170, 'acess2-1607631938.jpeg', 0, '2020-12-10 20:25:38', '2020-12-10 20:27:39'),
(576, 170, 'acess4-1607631980.jpeg', 0, '2020-12-10 20:26:21', '2020-12-10 20:27:39'),
(577, 170, 'acess6-1607632008.jpeg', 0, '2020-12-10 20:26:48', '2020-12-10 20:27:39'),
(578, 170, 'acess5-1607632032.jpeg', 0, '2020-12-10 20:27:12', '2020-12-10 20:27:39'),
(579, 167, 'cacabranco-1607694303.jpeg', 0, '2020-12-11 13:45:03', '2020-12-11 13:45:35'),
(580, 167, 'cacabranco2-1607694320.jpeg', 0, '2020-12-11 13:45:20', '2020-12-11 13:45:35'),
(581, 167, 'cacabranco3-1607694331.jpeg', 0, '2020-12-11 13:45:31', '2020-12-11 13:45:35'),
(582, 171, 'zcucaooa-1607954661.jpeg', 1, '2020-12-14 14:04:21', '2020-12-14 14:10:39'),
(583, 171, 'uvsvq7ng-1607954820.jpeg', 0, '2020-12-14 14:07:00', '2020-12-14 14:10:39'),
(584, 101, 'hwv2lyeo-1610401145.jpeg', 1, '2021-01-11 21:39:05', '2021-01-11 21:39:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_models`
--

CREATE TABLE `product_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_option_categories`
--

CREATE TABLE `product_option_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `quantity_options` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sizeChart` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `title`, `active`, `deleted_at`, `created_at`, `updated_at`, `sizeChart`) VALUES
(1, '01', 1, NULL, '2020-09-03 11:45:14', '2020-10-01 19:40:13', 1),
(2, '02', 1, NULL, '2020-09-03 11:45:33', '2020-10-01 19:40:14', 1),
(3, '03', 1, NULL, '2020-09-03 11:45:41', '2020-10-01 19:40:15', 1),
(4, 'P', 1, NULL, '2020-09-09 13:27:12', '2020-10-01 19:40:15', 1),
(5, '02', 1, '2020-09-10 14:50:48', '2020-09-10 14:50:21', '2020-09-10 14:50:48', 0),
(6, '04', 1, NULL, '2020-09-10 14:50:29', '2020-10-01 19:40:16', 1),
(7, '06', 1, NULL, '2020-09-10 14:51:03', '2020-10-01 19:40:17', 1),
(8, '08', 1, NULL, '2020-09-10 14:51:19', '2020-10-01 19:40:17', 1),
(9, '10', 1, NULL, '2020-09-10 14:51:23', '2020-10-01 19:40:21', 1),
(10, '12', 1, NULL, '2020-09-10 14:51:28', '2020-10-01 19:40:21', 1),
(11, '14', 1, NULL, '2020-09-10 14:51:32', '2020-10-01 19:40:21', 1),
(12, '16', 1, NULL, '2020-09-10 14:51:37', '2020-10-01 19:40:22', 1),
(13, 'M', 1, NULL, '2020-09-10 14:51:43', '2020-10-01 19:40:22', 1),
(14, 'G', 1, NULL, '2020-09-10 14:51:47', '2020-10-01 19:40:23', 1),
(15, 'GG', 1, NULL, '2020-09-10 14:51:50', '2020-10-01 19:40:24', 1),
(16, 'ÚNICO', 1, NULL, '2020-09-10 17:21:48', '2020-10-08 14:27:32', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(5,2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `size_charts`
--

CREATE TABLE `size_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `size_charts`
--

INSERT INTO `size_charts` (`id`, `path_image`, `created_at`, `updated_at`) VALUES
(1, '24135378-1911641265517378-840987788-n-1-1600713339.jpeg', '2020-09-21 18:35:39', '2020-09-21 18:35:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `slides`
--

INSERT INTO `slides` (`id`, `product_id`, `title`, `subtitle`, `description`, `path_image`, `path_image_mobile`, `created_at`, `updated_at`) VALUES
(14, 55, '', '', '', 'banner-desktop-1380x550-1606422456.png', 'banner-mobile-1606444369.png', '2020-11-26 20:27:37', '2021-02-11 13:23:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productSize_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `amount` decimal(12,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `promotion_value` decimal(12,2) DEFAULT NULL,
  `productColor_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `stocks`
--

INSERT INTO `stocks` (`id`, `productSize_id`, `product_id`, `active`, `amount`, `deleted_at`, `created_at`, `updated_at`, `promotion_value`, `productColor_id`, `quantity`, `default`) VALUES
(8, 1, 40, 1, '256.00', NULL, '2020-09-09 23:45:21', '2021-02-03 11:48:45', '1.00', 6, 6, 0),
(9, 6, 41, 1, '127.00', NULL, '2020-09-09 23:48:44', '2021-01-12 01:30:12', '88.90', 6, 2, 0),
(10, 4, 42, 1, '175.00', NULL, '2020-09-09 23:54:07', '2021-01-12 01:28:38', '122.50', 6, 0, 0),
(11, 1, 43, 1, '158.00', NULL, '2020-09-10 00:04:03', '2021-01-13 11:57:06', '110.60', 7, 0, 0),
(12, 2, 44, 1, '178.00', NULL, '2020-09-10 00:08:30', '2020-11-24 21:11:01', '71.20', 8, 1, 0),
(13, 2, 44, 1, '178.00', NULL, '2020-09-10 00:10:27', '2020-11-24 21:17:21', '71.20', 7, 1, 0),
(14, 1, 45, 1, '142.00', NULL, '2020-09-10 13:29:40', '2020-12-07 20:21:04', '56.80', 8, 1, 0),
(15, 1, 45, 1, '142.00', NULL, '2020-09-10 13:30:35', '2020-12-07 20:21:28', '56.80', 7, 1, 0),
(16, 6, 46, 1, '122.00', NULL, '2020-09-10 13:43:38', '2020-11-24 20:55:56', '48.80', 8, 2, 0),
(17, 6, 46, 1, '122.00', NULL, '2020-09-10 13:44:00', '2020-11-24 20:56:58', '48.80', 7, 2, 0),
(18, 4, 47, 1, '320.00', NULL, '2020-09-10 13:55:10', '2021-01-12 01:10:13', '128.00', 9, 1, 0),
(19, 1, 48, 1, '267.00', NULL, '2020-09-10 14:00:07', '2021-01-12 01:07:02', '106.80', 9, 2, 0),
(20, 4, 49, 1, '185.00', NULL, '2020-09-10 14:03:37', '2021-01-12 01:04:59', '74.00', 9, 0, 0),
(21, 1, 50, 1, '138.00', NULL, '2020-09-10 14:16:28', '2020-09-10 14:18:05', '69.00', 10, 2, 0),
(22, 1, 51, 1, '154.00', NULL, '2020-09-10 14:23:25', '2021-01-12 01:00:47', '107.80', 11, 2, 0),
(23, 1, 52, 1, '149.00', NULL, '2020-09-10 14:29:17', '2021-01-12 00:57:55', '104.30', 11, 0, 0),
(24, 4, 53, 1, '158.00', NULL, '2020-09-10 14:34:05', '2021-01-12 00:55:53', '110.60', 11, 0, 0),
(25, 1, 54, 1, '182.00', NULL, '2020-09-10 14:43:14', '2021-01-11 16:59:30', '72.80', 12, 2, 0),
(26, 6, 55, 1, '130.00', NULL, '2020-09-10 14:52:53', '2021-01-11 14:04:30', '52.00', 12, 2, 0),
(27, 4, 56, 1, '167.00', NULL, '2020-09-10 14:55:29', '2021-01-12 01:22:53', '66.80', 12, 0, 0),
(28, 1, 57, 1, '245.00', NULL, '2020-09-10 14:59:21', '2021-01-11 14:27:03', '171.50', 13, 0, 0),
(29, 6, 58, 1, '130.00', NULL, '2020-09-10 15:04:38', '2021-01-11 14:31:15', '91.00', 13, 2, 0),
(30, 4, 59, 1, '145.00', NULL, '2020-09-10 15:08:01', '2021-01-12 01:26:50', '101.50', 13, 2, 0),
(31, 1, 60, 1, '250.00', NULL, '2020-09-10 15:22:40', '2021-01-11 14:33:10', '125.00', 14, 2, 0),
(32, 6, 61, 1, '168.00', NULL, '2020-09-10 15:29:09', '2021-01-11 14:36:40', '84.00', 14, 2, 0),
(33, 4, 62, 1, '154.00', NULL, '2020-09-10 15:34:47', '2021-01-12 00:20:37', '77.00', 14, 0, 0),
(34, 1, 63, 1, '198.00', NULL, '2020-09-10 15:38:22', '2021-01-11 14:42:06', '138.60', 15, 2, 0),
(35, 6, 64, 1, '129.00', NULL, '2020-09-10 15:44:02', '2021-01-11 14:46:39', '90.30', 15, 2, 0),
(36, 4, 65, 1, '157.00', NULL, '2020-09-10 15:46:24', '2021-01-12 01:24:36', '109.90', 15, 0, 0),
(37, 1, 66, 1, '242.00', NULL, '2020-09-10 15:50:01', '2021-01-11 14:48:41', '96.80', 16, 2, 0),
(38, 6, 67, 1, '218.00', NULL, '2020-09-10 15:53:54', '2021-01-11 14:54:22', '87.20', 16, 2, 0),
(39, 4, 68, 1, '174.00', NULL, '2020-09-10 15:56:28', '2021-01-12 00:52:35', '69.60', 16, 0, 0),
(40, 2, 69, 1, '65.00', NULL, '2020-09-10 16:10:55', '2020-09-23 14:20:00', NULL, 8, 1, 0),
(41, 4, 70, 1, '142.00', NULL, '2020-09-10 16:15:19', '2021-01-11 23:28:01', '99.40', 7, 1, 0),
(42, 1, 71, 1, '172.00', NULL, '2020-09-10 16:22:55', '2021-01-11 14:57:26', '80.40', 8, 0, 0),
(43, 4, 72, 1, '135.00', NULL, '2020-09-10 16:25:05', '2021-01-11 23:29:33', '94.50', 8, 1, 0),
(44, 2, 73, 1, '144.00', NULL, '2020-09-10 16:27:58', '2021-01-11 15:01:31', '100.80', 8, 1, 0),
(45, 6, 74, 1, '117.00', NULL, '2020-09-10 16:30:32', '2021-01-11 15:05:04', '81.90', 17, 1, 0),
(46, 6, 74, 1, '117.00', NULL, '2020-09-10 16:32:58', '2021-01-11 15:05:13', '81.90', 18, 1, 0),
(47, 6, 75, 1, '62.00', NULL, '2020-09-10 16:37:13', '2020-09-23 14:41:26', NULL, 13, 1, 0),
(48, 1, 76, 1, '268.00', NULL, '2020-09-10 16:45:00', '2021-01-11 15:46:37', '187.60', 19, 2, 0),
(49, 4, 77, 1, '210.00', NULL, '2020-09-10 16:51:40', '2021-01-11 23:31:56', '167.00', 19, 2, 0),
(50, 1, 78, 1, '256.00', NULL, '2020-09-10 16:54:44', '2021-01-11 15:50:29', '179.20', 20, 1, 0),
(51, 1, 79, 1, '262.00', NULL, '2020-09-10 16:59:22', '2021-01-11 15:52:44', '183.40', 21, 2, 0),
(52, 6, 80, 1, '258.00', NULL, '2020-09-10 17:03:36', '2021-01-11 16:01:59', '180.60', 21, 2, 0),
(53, 4, 81, 1, '210.00', NULL, '2020-09-10 17:06:14', '2021-01-11 23:34:22', '167.00', 21, 0, 0),
(54, 1, 82, 1, '137.00', NULL, '2020-09-10 17:11:59', '2021-01-12 00:50:39', '95.90', 20, 2, 0),
(55, 4, 83, 1, '139.90', NULL, '2020-09-10 17:15:26', '2021-01-11 23:39:56', '97.93', 20, 0, 0),
(56, 1, 84, 1, '69.00', NULL, '2020-09-10 17:17:44', '2020-12-24 19:13:59', NULL, 20, 1, 0),
(57, 16, 85, 1, '55.00', NULL, '2020-09-10 17:21:14', '2020-09-10 17:22:16', NULL, 14, 2, 0),
(58, 16, 86, 1, '57.00', NULL, '2020-09-10 17:24:21', '2020-11-12 18:47:23', '45.60', 12, 2, 0),
(59, 16, 87, 1, '50.00', NULL, '2020-09-10 17:36:04', '2020-09-10 17:36:04', NULL, 15, 2, 0),
(60, 16, 88, 1, '57.00', NULL, '2020-09-10 20:54:13', '2020-09-10 20:54:13', NULL, 19, 2, 0),
(61, 16, 89, 1, '50.00', NULL, '2020-09-10 20:56:01', '2020-09-22 18:29:15', NULL, 12, 0, 0),
(62, 16, 90, 1, '98.00', NULL, '2020-09-10 20:57:55', '2020-09-10 20:57:55', NULL, 12, 2, 0),
(63, 16, 90, 1, '98.00', NULL, '2020-09-10 20:58:28', '2020-09-10 20:58:28', '49.00', 6, 2, 0),
(64, 16, 90, 1, '98.00', NULL, '2020-09-10 20:58:54', '2020-09-10 20:58:54', '49.00', 9, 2, 0),
(65, 2, 60, 1, '250.00', NULL, '2020-09-11 15:07:10', '2021-01-11 14:36:39', '125.00', 14, 2, 0),
(66, 3, 60, 1, '250.00', NULL, '2020-09-11 15:07:34', '2021-01-11 14:38:13', '125.00', 14, 2, 0),
(67, 6, 60, 1, '250.00', NULL, '2020-09-11 15:08:03', '2021-01-11 14:39:42', '125.00', 14, 2, 0),
(68, 7, 60, 1, '250.00', NULL, '2020-09-11 15:08:23', '2021-01-11 14:39:50', '125.00', 14, 2, 0),
(69, 7, 60, 1, '250.00', NULL, '2020-09-11 15:08:23', '2021-01-11 14:40:03', '125.00', 14, 2, 0),
(70, 8, 60, 1, '250.00', NULL, '2020-09-11 15:08:41', '2021-01-11 14:40:11', '125.00', 14, 2, 0),
(71, 9, 60, 1, '250.00', NULL, '2020-09-11 15:09:04', '2021-01-11 14:40:19', '125.00', 14, 2, 0),
(72, 10, 60, 1, '250.00', NULL, '2020-09-11 15:09:30', '2021-01-11 14:40:27', '125.00', 14, 2, 0),
(73, 11, 60, 1, '250.00', NULL, '2020-09-11 15:09:46', '2021-01-11 14:40:36', '125.00', 14, 2, 0),
(74, 12, 60, 1, '250.00', NULL, '2020-09-11 15:10:06', '2021-01-11 14:40:45', '125.00', 14, 1, 0),
(75, 2, 54, 1, '182.00', NULL, '2020-09-11 15:17:15', '2021-01-11 17:00:43', '72.80', 12, 0, 0),
(76, 3, 54, 1, '182.00', NULL, '2020-09-11 15:17:45', '2021-01-11 17:00:54', '72.80', 12, 0, 0),
(77, 6, 54, 1, '182.00', NULL, '2020-09-11 15:18:30', '2021-01-11 17:01:24', '72.80', 12, 2, 0),
(78, 7, 54, 1, '182.00', NULL, '2020-09-11 15:18:46', '2021-01-11 17:01:34', '72.80', 12, 2, 0),
(79, 8, 54, 1, '182.00', NULL, '2020-09-11 15:19:06', '2021-01-11 17:02:00', '72.80', 12, 0, 0),
(80, 9, 54, 1, '182.00', NULL, '2020-09-11 15:19:42', '2021-01-11 17:04:16', '72.80', 12, 0, 0),
(81, 10, 54, 1, '182.00', NULL, '2020-09-11 15:20:10', '2021-01-11 21:14:04', '72.80', 12, 0, 0),
(82, 11, 54, 1, '182.00', '2020-09-11 15:21:47', '2020-09-11 15:20:31', '2020-09-11 15:21:47', '182.00', 12, 2, 0),
(83, 12, 54, 1, '182.00', '2020-09-11 15:21:54', '2020-09-11 15:20:58', '2020-09-11 15:21:54', NULL, 12, 0, 0),
(84, 11, 54, 1, '182.00', NULL, '2020-09-11 15:22:11', '2021-01-11 21:14:15', '72.80', 12, 2, 0),
(85, 12, 54, 1, '182.00', NULL, '2020-09-11 15:22:42', '2021-01-11 21:14:24', '72.80', 12, 0, 0),
(86, 7, 55, 1, '130.00', NULL, '2020-09-11 15:25:08', '2021-01-11 14:04:40', '52.00', 12, 2, 0),
(87, 8, 55, 1, '130.00', NULL, '2020-09-11 15:25:22', '2021-01-11 14:04:49', '52.00', 12, 2, 0),
(88, 9, 55, 1, '130.00', NULL, '2020-09-11 15:25:36', '2021-01-11 14:04:58', '52.00', 12, 1, 0),
(89, 10, 55, 1, '130.00', NULL, '2020-09-11 15:25:53', '2021-01-11 14:05:07', '52.00', 12, 0, 0),
(90, 11, 55, 1, '130.00', NULL, '2020-09-11 15:26:19', '2021-01-11 14:05:24', '52.00', 12, 2, 0),
(91, 12, 55, 1, '130.00', NULL, '2020-09-11 15:26:34', '2021-01-11 14:05:15', '52.00', 12, 2, 0),
(92, 2, 57, 1, '245.00', NULL, '2020-09-11 17:19:10', '2021-01-11 14:27:39', '171.50', 13, 2, 0),
(93, 3, 57, 1, '245.00', NULL, '2020-09-11 17:19:48', '2021-01-11 14:28:36', '171.50', 13, 0, 0),
(94, 6, 57, 1, '245.00', NULL, '2020-09-11 17:20:02', '2021-01-11 14:28:49', '171.50', 13, 2, 0),
(95, 7, 57, 1, '245.00', NULL, '2020-09-11 17:20:17', '2021-01-11 14:28:58', '171.50', 13, 2, 0),
(96, 8, 57, 1, '245.00', NULL, '2020-09-11 17:20:32', '2021-01-11 14:29:06', '171.50', 13, 2, 0),
(97, 9, 57, 1, '245.00', NULL, '2020-09-11 17:20:46', '2021-01-11 14:28:07', '171.50', 13, 1, 0),
(98, 10, 57, 1, '245.00', NULL, '2020-09-11 17:21:02', '2021-01-11 14:28:20', '171.50', 13, 1, 0),
(99, 11, 57, 1, '245.00', NULL, '2020-09-11 17:21:21', '2021-01-11 14:29:14', '171.50', 13, 2, 0),
(100, 12, 57, 1, '245.00', NULL, '2020-09-11 17:21:51', '2021-01-11 14:27:28', '171.50', 13, 0, 0),
(101, 7, 58, 1, '130.00', NULL, '2020-09-11 17:27:39', '2021-01-11 14:31:29', '91.00', 13, 2, 0),
(102, 8, 58, 1, '130.00', NULL, '2020-09-11 17:27:58', '2021-01-11 14:31:41', '91.00', 13, 2, 0),
(103, 9, 58, 1, '130.00', NULL, '2020-09-11 17:29:06', '2021-01-11 14:31:50', '91.00', 13, 2, 0),
(104, 10, 58, 1, '130.00', NULL, '2020-09-11 17:29:30', '2021-01-11 14:32:02', '91.00', 13, 1, 0),
(105, 11, 58, 1, '130.00', NULL, '2020-09-11 17:29:45', '2021-01-11 14:30:53', '91.00', 13, 0, 0),
(106, 12, 58, 1, '130.00', NULL, '2020-09-11 17:30:05', '2021-01-11 14:30:37', '91.00', 13, 0, 0),
(107, 7, 61, 1, '168.00', NULL, '2020-09-11 17:34:22', '2021-01-11 14:36:53', '84.00', 14, 2, 0),
(108, 8, 61, 1, '168.00', NULL, '2020-09-11 17:34:37', '2021-01-11 14:37:01', '84.00', 14, 2, 0),
(109, 9, 61, 1, '168.00', NULL, '2020-09-11 17:34:52', '2021-01-11 14:37:15', '84.00', 14, 2, 0),
(110, 10, 61, 1, '168.00', NULL, '2020-09-11 17:35:06', '2021-01-11 14:37:23', '84.00', 14, 1, 0),
(111, 11, 61, 1, '168.00', NULL, '2020-09-11 17:35:24', '2021-01-11 14:37:32', '84.00', 14, 2, 0),
(112, 12, 61, 1, '168.00', NULL, '2020-09-11 17:35:47', '2021-01-11 14:37:40', '84.00', 14, 2, 0),
(113, 2, 63, 1, '198.00', NULL, '2020-09-11 17:44:13', '2021-01-11 14:42:49', '138.60', 15, 0, 0),
(114, 3, 63, 1, '198.00', NULL, '2020-09-11 17:44:40', '2021-01-11 14:42:57', '138.60', 15, 2, 0),
(115, 6, 63, 1, '198.00', NULL, '2020-09-11 17:45:10', '2021-01-11 14:43:06', '138.60', 15, 2, 0),
(116, 7, 63, 1, '198.00', NULL, '2020-09-11 17:45:34', '2021-01-11 14:43:15', '138.60', 15, 2, 0),
(117, 8, 63, 1, '198.00', NULL, '2020-09-11 17:45:57', '2021-01-11 14:43:26', '138.60', 15, 2, 0),
(118, 9, 63, 1, '198.00', NULL, '2020-09-11 17:46:34', '2021-01-11 14:43:33', '138.60', 15, 1, 0),
(119, 10, 63, 1, '198.00', NULL, '2020-09-11 17:46:59', '2021-01-11 14:43:41', '138.60', 15, 2, 0),
(120, 11, 63, 1, '198.00', NULL, '2020-09-11 17:47:15', '2021-01-11 14:43:48', '138.60', 15, 1, 0),
(121, 12, 63, 1, '198.00', NULL, '2020-09-11 17:47:38', '2021-01-11 14:43:56', '138.60', 15, 2, 0),
(122, 7, 64, 1, '129.00', NULL, '2020-09-11 17:53:22', '2021-01-11 14:46:48', '90.30', 15, 2, 0),
(123, 8, 64, 1, '129.00', NULL, '2020-09-11 17:53:47', '2021-01-11 14:46:55', '90.30', 15, 0, 0),
(124, 9, 64, 1, '129.00', NULL, '2020-09-11 17:54:14', '2021-01-11 14:47:03', '90.30', 15, 0, 0),
(125, 10, 64, 1, '129.00', NULL, '2020-09-11 17:54:38', '2021-01-11 14:47:10', '90.30', 15, 0, 0),
(126, 11, 64, 1, '129.00', NULL, '2020-09-11 17:55:18', '2021-01-11 14:47:17', '90.30', 15, 0, 0),
(127, 12, 64, 1, '129.00', NULL, '2020-09-11 17:56:02', '2021-01-11 14:47:24', '90.30', 15, 0, 0),
(128, 2, 66, 1, '242.00', NULL, '2020-09-11 18:01:07', '2021-01-11 14:50:21', '96.80', 16, 0, 0),
(129, 3, 66, 1, '242.00', NULL, '2020-09-11 18:01:30', '2021-01-11 14:50:31', '96.80', 16, 0, 0),
(130, 6, 66, 1, '242.00', NULL, '2020-09-11 18:01:51', '2021-01-11 14:50:40', '96.80', 16, 2, 0),
(131, 7, 66, 1, '242.00', NULL, '2020-09-11 18:02:19', '2021-01-11 14:50:50', '96.80', 16, 2, 0),
(132, 8, 66, 1, '242.00', NULL, '2020-09-11 18:02:49', '2021-01-11 14:50:04', '96.80', 16, 0, 0),
(133, 9, 66, 1, '242.00', NULL, '2020-09-11 18:03:19', '2021-01-11 14:49:49', '96.80', 16, 0, 0),
(134, 10, 66, 1, '242.00', NULL, '2020-09-11 18:03:47', '2021-01-11 14:49:34', '96.80', 16, 0, 0),
(135, 11, 66, 1, '242.00', NULL, '2020-09-11 18:03:59', '2021-01-11 14:50:59', '96.80', 16, 2, 0),
(136, 12, 66, 1, '242.00', NULL, '2020-09-11 18:04:14', '2021-01-11 14:49:20', '96.80', 16, 0, 0),
(137, 7, 67, 1, '218.00', NULL, '2020-09-11 18:13:52', '2021-01-11 14:54:46', '87.20', 16, 2, 0),
(138, 8, 67, 1, '218.00', NULL, '2020-09-11 18:14:05', '2021-01-11 14:55:09', '87.20', 16, 1, 0),
(139, 9, 67, 1, '218.00', NULL, '2020-09-11 18:15:11', '2021-01-11 14:54:57', '87.20', 16, 2, 0),
(140, 10, 67, 1, '218.00', NULL, '2020-09-11 18:15:29', '2021-01-11 14:55:17', '87.20', 16, 1, 0),
(141, 11, 67, 1, '218.00', NULL, '2020-09-11 18:16:08', '2021-01-11 14:55:26', '87.20', 16, 1, 0),
(142, 12, 67, 1, '218.00', NULL, '2020-09-11 18:16:31', '2021-01-11 14:55:35', '87.20', 16, 0, 0),
(143, 2, 71, 1, '172.00', NULL, '2020-09-11 18:52:02', '2021-01-11 14:58:33', '80.40', 8, 0, 0),
(144, 3, 71, 1, '172.00', NULL, '2020-09-11 18:52:21', '2021-01-11 14:58:41', '80.40', 8, 1, 0),
(145, 6, 71, 1, '172.00', NULL, '2020-09-11 18:53:02', '2021-01-11 14:58:51', '80.40', 8, 2, 0),
(146, 7, 71, 1, '172.00', NULL, '2020-09-11 18:53:38', '2021-01-11 14:59:00', '80.40', 8, 0, 0),
(147, 8, 71, 1, '172.00', NULL, '2020-09-11 18:54:03', '2021-01-11 14:59:08', '80.40', 8, 2, 0),
(148, 9, 71, 1, '172.00', NULL, '2020-09-11 18:54:25', '2021-01-11 14:59:17', '80.40', 8, 0, 0),
(149, 10, 71, 1, '172.00', NULL, '2020-09-11 18:54:40', '2021-01-11 14:58:24', '80.40', 8, 0, 0),
(150, 11, 71, 1, '172.00', NULL, '2020-09-11 18:55:08', '2021-01-11 14:59:25', '80.40', 8, 0, 0),
(151, 12, 71, 1, '172.00', NULL, '2020-09-11 18:55:22', '2021-01-11 14:59:34', '80.40', 8, 0, 0),
(152, 6, 73, 1, '144.00', NULL, '2020-09-11 19:01:02', '2021-01-11 15:01:44', '100.80', 8, 2, 0),
(153, 7, 73, 1, '144.00', NULL, '2020-09-11 19:01:18', '2021-01-11 15:01:52', '100.80', 8, 1, 0),
(154, 8, 73, 1, '144.00', NULL, '2020-09-11 19:01:30', '2021-01-11 15:02:00', '100.80', 8, 2, 0),
(155, 9, 73, 1, '144.00', NULL, '2020-09-11 19:01:44', '2021-01-11 15:02:09', '100.80', 8, 2, 0),
(156, 10, 73, 1, '144.00', NULL, '2020-09-11 19:01:57', '2021-01-11 15:02:18', '100.80', 8, 2, 0),
(157, 7, 74, 1, '117.00', NULL, '2020-09-11 19:09:31', '2021-01-11 15:05:28', '81.90', 17, 0, 0),
(158, 7, 74, 1, '117.00', NULL, '2020-09-11 19:09:49', '2021-01-11 15:05:35', '81.90', 18, 0, 0),
(159, 8, 74, 1, '117.00', NULL, '2020-09-11 19:10:05', '2021-01-11 15:05:43', '81.90', 17, 1, 0),
(160, 8, 74, 1, '117.00', NULL, '2020-09-11 19:10:29', '2021-01-11 15:05:51', '81.90', 18, 1, 0),
(161, 9, 74, 1, '117.00', NULL, '2020-09-11 19:10:46', '2021-01-11 15:06:21', '81.90', 17, 1, 0),
(162, 9, 74, 1, '117.00', NULL, '2020-09-11 19:11:00', '2021-01-11 15:06:31', '81.90', 18, 1, 0),
(163, 10, 74, 1, '117.00', NULL, '2020-09-11 19:11:35', '2021-01-11 15:06:45', '81.90', 17, 1, 0),
(164, 10, 74, 1, '117.00', NULL, '2020-09-11 19:12:02', '2021-01-11 15:06:58', '81.90', 18, 1, 0),
(165, 11, 74, 1, '117.00', NULL, '2020-09-11 19:12:46', '2021-01-11 15:07:07', '81.90', 17, 0, 0),
(166, 11, 74, 1, '117.00', NULL, '2020-09-11 19:13:00', '2021-01-11 15:07:17', '81.90', 18, 0, 0),
(167, 12, 74, 1, '117.00', NULL, '2020-09-11 19:13:37', '2021-01-11 15:07:25', '81.90', 17, 0, 0),
(168, 12, 74, 1, '117.00', NULL, '2020-09-11 19:14:05', '2021-01-11 15:07:33', '81.90', 18, 0, 0),
(169, 2, 76, 1, '268.00', NULL, '2020-09-11 19:36:20', '2021-01-11 15:47:10', '187.60', 19, 2, 0),
(170, 3, 76, 1, '268.00', NULL, '2020-09-11 19:37:00', '2021-01-11 15:48:31', '187.60', 19, 1, 0),
(171, 6, 76, 1, '268.00', NULL, '2020-09-11 19:37:31', '2021-01-11 15:47:21', '187.60', 19, 2, 0),
(172, 7, 76, 1, '268.00', NULL, '2020-09-11 19:37:50', '2021-01-11 15:47:29', '187.60', 19, 2, 0),
(173, 8, 76, 1, '268.00', NULL, '2020-09-11 19:38:27', '2021-01-11 15:47:40', '187.60', 19, 2, 0),
(174, 9, 76, 1, '268.00', NULL, '2020-09-11 19:39:00', '2021-01-11 15:47:50', '187.60', 19, 2, 0),
(175, 10, 76, 1, '268.00', NULL, '2020-09-11 19:39:29', '2021-01-11 15:48:01', '187.60', 19, 2, 0),
(176, 11, 76, 1, '268.00', NULL, '2020-09-11 19:40:00', '2021-01-11 15:48:11', '187.60', 19, 2, 0),
(177, 12, 76, 1, '268.00', NULL, '2020-09-11 19:40:21', '2021-01-11 15:48:21', '187.60', 19, 2, 0),
(178, 2, 78, 1, '256.00', NULL, '2020-09-11 19:56:53', '2021-01-11 15:50:54', '179.20', 20, 0, 0),
(179, 6, 78, 1, '256.00', NULL, '2020-09-11 19:57:13', '2021-01-11 15:51:02', '179.20', 20, 2, 0),
(180, 7, 78, 1, '256.00', NULL, '2020-09-11 19:57:38', '2021-01-11 15:51:10', '179.20', 20, 1, 0),
(181, 8, 78, 1, '256.00', NULL, '2020-09-11 19:57:55', '2021-01-11 15:51:19', '179.20', 20, 1, 0),
(182, 9, 78, 1, '256.00', NULL, '2020-09-11 19:58:10', '2021-01-11 15:51:28', '179.20', 20, 2, 0),
(183, 2, 79, 1, '262.00', NULL, '2020-09-21 14:33:39', '2021-01-11 15:53:20', '183.40', 21, 0, 0),
(184, 3, 79, 1, '262.00', NULL, '2020-09-21 14:34:04', '2021-01-11 15:53:32', '183.40', 21, 0, 0),
(185, 6, 79, 1, '262.00', NULL, '2020-09-21 14:35:10', '2021-01-11 15:53:40', '183.40', 21, 2, 0),
(186, 7, 79, 1, '262.00', NULL, '2020-09-21 14:36:08', '2021-01-11 15:53:49', '183.40', 21, 2, 0),
(187, 8, 79, 1, '262.00', NULL, '2020-09-21 14:36:34', '2021-01-11 15:53:57', '183.40', 21, 2, 0),
(188, 9, 79, 1, '262.00', NULL, '2020-09-21 14:37:09', '2021-01-11 15:54:04', '183.40', 21, 2, 0),
(189, 10, 79, 1, '262.00', NULL, '2020-09-21 14:37:29', '2021-01-11 15:54:12', '183.40', 21, 2, 0),
(190, 11, 79, 1, '262.00', NULL, '2020-09-21 14:38:02', '2021-01-11 15:54:21', '183.40', 21, 2, 0),
(191, 12, 79, 1, '262.00', NULL, '2020-09-21 14:38:16', '2021-01-11 15:54:28', '183.40', 21, 2, 0),
(192, 7, 80, 1, '258.00', NULL, '2020-09-21 14:51:37', '2021-01-11 16:08:58', '180.60', 21, 2, 0),
(193, 8, 80, 1, '258.00', NULL, '2020-09-21 14:52:00', '2021-01-11 16:09:07', '180.60', 21, 2, 0),
(194, 9, 80, 1, '258.00', NULL, '2020-09-21 14:52:21', '2021-01-11 15:55:53', '180.60', 21, 1, 0),
(195, 10, 80, 1, '258.00', NULL, '2020-09-21 14:52:45', '2021-01-11 16:09:15', '180.60', 21, 2, 0),
(196, 11, 80, 1, '258.00', NULL, '2020-09-21 14:53:06', '2021-01-11 16:09:23', '180.60', 21, 2, 0),
(197, 12, 80, 1, '258.00', NULL, '2020-09-21 14:53:22', '2021-01-11 16:09:31', '180.60', 21, 2, 0),
(198, 2, 82, 1, '137.00', NULL, '2020-09-21 14:59:44', '2021-01-12 00:50:46', '95.90', 20, 2, 0),
(199, 3, 82, 1, '137.00', NULL, '2020-09-21 15:00:05', '2021-01-12 00:50:53', '95.90', 20, 2, 0),
(200, 6, 82, 1, '137.00', NULL, '2020-09-21 15:00:22', '2021-01-12 00:51:00', '95.90', 20, 2, 0),
(201, 7, 82, 1, '137.00', NULL, '2020-09-21 15:00:40', '2021-01-12 00:51:06', '95.90', 20, 2, 0),
(202, 8, 82, 1, '137.00', NULL, '2020-09-21 15:01:01', '2021-01-12 00:51:13', '95.90', 20, 2, 0),
(203, 9, 82, 1, '137.00', NULL, '2020-09-21 15:01:23', '2021-01-12 00:51:23', '95.90', 20, 2, 0),
(204, 10, 82, 1, '137.00', NULL, '2020-09-21 15:01:48', '2021-01-12 00:51:30', '95.90', 20, 2, 0),
(205, 1, 83, 1, '69.00', '2020-09-21 15:06:41', '2020-09-21 15:06:07', '2020-09-21 15:06:41', NULL, 17, 2, 0),
(206, 1, 84, 1, '69.00', NULL, '2020-09-21 15:07:02', '2020-09-21 15:07:02', NULL, 17, 2, 0),
(207, 1, 84, 1, '69.00', NULL, '2020-09-21 15:07:21', '2020-09-21 15:07:21', NULL, 18, 2, 0),
(208, 2, 84, 1, '69.00', NULL, '2020-09-21 15:07:55', '2020-09-21 15:07:55', NULL, 20, 2, 0),
(209, 2, 84, 1, '69.00', NULL, '2020-09-21 15:08:12', '2020-09-21 15:08:12', NULL, 17, 2, 0),
(210, 2, 84, 1, '69.00', NULL, '2020-09-21 15:08:59', '2020-09-21 15:08:59', NULL, 18, 2, 0),
(211, 3, 84, 1, '69.00', NULL, '2020-09-21 15:09:19', '2020-09-21 15:09:19', NULL, 20, 2, 0),
(212, 3, 84, 1, '69.00', NULL, '2020-09-21 15:09:38', '2020-09-21 15:09:38', NULL, 17, 2, 0),
(213, 3, 84, 1, '69.00', NULL, '2020-09-21 15:09:54', '2020-09-21 15:09:54', NULL, 18, 2, 0),
(214, 6, 84, 1, '69.00', NULL, '2020-09-21 15:10:11', '2020-09-21 15:10:11', NULL, 20, 2, 0),
(215, 6, 84, 1, '69.00', NULL, '2020-09-21 15:10:32', '2020-09-21 15:10:32', NULL, 17, 2, 0),
(216, 6, 84, 1, '69.00', NULL, '2020-09-21 15:12:44', '2020-09-21 15:12:44', NULL, 18, 2, 0),
(217, 7, 84, 1, '69.00', NULL, '2020-09-21 15:13:14', '2020-09-21 15:13:14', NULL, 20, 2, 0),
(218, 7, 84, 1, '69.00', NULL, '2020-09-21 15:14:09', '2020-09-21 15:14:09', NULL, 17, 2, 0),
(219, 7, 84, 1, '69.00', NULL, '2020-09-21 15:14:25', '2020-09-21 15:14:25', NULL, 18, 2, 0),
(220, 8, 84, 1, '69.00', NULL, '2020-09-21 15:23:16', '2020-12-07 21:11:11', NULL, 20, 0, 0),
(221, 8, 84, 1, '69.00', NULL, '2020-09-21 15:23:31', '2020-12-07 21:11:22', NULL, 17, 0, 0),
(222, 8, 84, 1, '69.00', NULL, '2020-09-21 15:23:52', '2020-12-07 21:11:58', NULL, 18, 0, 0),
(223, 9, 84, 1, '69.00', NULL, '2020-09-21 15:24:20', '2020-09-21 15:24:20', NULL, 20, 1, 0),
(224, 9, 84, 1, '69.00', NULL, '2020-09-21 15:24:36', '2020-09-21 15:24:36', NULL, 17, 1, 0),
(225, 9, 84, 1, '69.00', NULL, '2020-09-21 15:24:49', '2020-09-21 15:24:49', NULL, 18, 1, 0),
(226, 10, 84, 1, '69.00', NULL, '2020-09-21 15:25:32', '2020-09-21 15:25:32', NULL, 20, 2, 0),
(227, 10, 84, 1, '69.00', NULL, '2020-09-21 15:25:53', '2020-09-21 15:25:53', NULL, 17, 2, 0),
(228, 10, 84, 1, '69.00', NULL, '2020-09-21 15:26:10', '2020-09-21 15:26:10', NULL, 18, 2, 0),
(229, 13, 56, 1, '167.00', NULL, '2020-09-21 15:31:26', '2021-01-12 01:23:04', '66.80', 12, 0, 0),
(230, 14, 56, 1, '167.00', NULL, '2020-09-21 15:31:42', '2021-01-12 01:23:11', '66.80', 12, 2, 0),
(231, 15, 56, 1, '167.00', NULL, '2020-09-21 15:31:56', '2021-01-12 01:23:18', '66.80', 12, 2, 0),
(232, 13, 83, 1, '139.90', NULL, '2020-09-21 15:40:30', '2021-01-11 23:40:02', '97.93', 20, 0, 0),
(233, 13, 83, 1, '139.90', NULL, '2020-09-21 15:40:56', '2021-01-11 23:40:12', '97.93', 20, 0, 0),
(234, 15, 83, 1, '139.90', NULL, '2020-09-21 15:41:16', '2021-01-11 23:40:22', '97.93', 20, 0, 0),
(235, 13, 81, 1, '210.00', NULL, '2020-09-21 15:49:29', '2021-01-11 23:35:02', '167.00', 21, 0, 0),
(236, 14, 81, 1, '210.00', NULL, '2020-09-21 15:49:51', '2021-01-11 23:35:19', '167.00', 21, 0, 0),
(237, 15, 81, 1, '210.00', NULL, '2020-09-21 15:50:06', '2021-01-11 23:35:38', '167.00', 21, 2, 0),
(238, 13, 77, 1, '210.00', NULL, '2020-09-21 15:59:09', '2021-01-11 23:32:05', '167.00', 19, 2, 0),
(239, 14, 77, 1, '210.00', NULL, '2020-09-21 15:59:26', '2021-01-11 23:32:16', '167.00', 19, 0, 0),
(240, 15, 77, 1, '210.00', NULL, '2020-09-21 15:59:47', '2021-01-11 23:32:22', '167.00', 19, 2, 0),
(241, 13, 72, 1, '135.00', NULL, '2020-09-21 16:07:35', '2021-01-11 23:29:43', '94.50', 8, 0, 0),
(242, 14, 72, 1, '135.00', NULL, '2020-09-21 16:07:57', '2021-01-11 23:29:58', '94.50', 8, 0, 0),
(243, 15, 72, 1, '135.00', NULL, '2020-09-21 16:08:10', '2021-01-11 23:30:06', '94.50', 8, 0, 0),
(244, 13, 70, 1, '142.00', NULL, '2020-09-21 18:26:05', '2021-01-11 23:28:11', '99.40', 7, 1, 0),
(245, 14, 70, 1, '142.00', NULL, '2020-09-21 18:26:21', '2021-01-11 23:28:19', '99.40', 7, 0, 0),
(246, 15, 70, 1, '142.00', NULL, '2020-09-21 18:26:35', '2021-01-11 23:28:25', '99.40', 7, 0, 0),
(247, 13, 68, 1, '174.00', NULL, '2020-09-21 18:39:54', '2021-01-12 00:52:49', '69.60', 16, 2, 0),
(248, 14, 68, 1, '174.00', NULL, '2020-09-21 18:40:13', '2021-01-12 00:53:00', '69.60', 16, 0, 0),
(249, 15, 68, 1, '174.00', NULL, '2020-09-21 18:40:32', '2021-01-12 00:53:15', '69.60', 16, 1, 0),
(250, 13, 65, 1, '157.00', NULL, '2020-09-21 18:44:27', '2021-01-12 01:24:48', '109.90', 15, 2, 0),
(251, 14, 65, 1, '157.00', NULL, '2020-09-21 18:44:43', '2021-01-12 01:24:55', '109.90', 15, 2, 0),
(252, 15, 65, 1, '157.00', NULL, '2020-09-21 18:44:57', '2021-01-12 20:20:06', '109.90', 15, 0, 0),
(253, 13, 62, 1, '154.00', NULL, '2020-09-21 19:02:52', '2021-01-12 00:20:48', '77.00', 14, 2, 0),
(254, 14, 62, 1, '154.00', NULL, '2020-09-21 19:03:22', '2021-01-12 00:20:59', '77.00', 14, 2, 0),
(255, 15, 62, 1, '154.00', NULL, '2020-09-21 19:03:48', '2021-01-12 20:20:06', '77.00', 14, 0, 0),
(256, 13, 59, 1, '145.00', NULL, '2020-09-21 20:02:08', '2021-01-12 01:27:04', '101.50', 13, 0, 0),
(257, 14, 59, 1, '145.00', NULL, '2020-09-21 20:02:31', '2021-01-12 01:27:12', '101.50', 13, 0, 0),
(258, 15, 59, 1, '145.00', NULL, '2020-09-21 20:02:55', '2021-01-12 01:27:19', '101.50', 13, 0, 0),
(259, 2, 40, 1, '256.00', NULL, '2020-09-21 21:23:20', '2021-01-12 01:33:35', '179.20', 6, 0, 0),
(260, 3, 40, 1, '256.00', NULL, '2020-09-21 21:23:47', '2021-01-12 01:33:44', '179.20', 6, 0, 0),
(261, 6, 40, 1, '256.00', NULL, '2020-09-21 21:24:15', '2021-01-12 01:33:54', '179.20', 6, 0, 0),
(262, 7, 40, 1, '256.00', NULL, '2020-09-21 21:24:38', '2021-01-12 01:34:04', '179.20', 6, 0, 0),
(263, 8, 40, 1, '256.00', NULL, '2020-09-21 21:25:00', '2021-01-12 01:34:14', '179.20', 6, 0, 0),
(264, 9, 40, 1, '256.00', NULL, '2020-09-21 21:25:22', '2021-01-12 01:34:27', '179.20', 6, 1, 0),
(265, 10, 40, 1, '256.00', NULL, '2020-09-21 21:25:46', '2021-01-12 01:34:38', '179.20', 6, 0, 0),
(266, 11, 40, 1, '256.00', NULL, '2020-09-21 21:26:11', '2021-01-12 01:34:53', '179.20', 6, 2, 0),
(267, 12, 40, 1, '256.00', NULL, '2020-09-21 21:26:29', '2021-01-12 01:35:02', '179.20', 6, 0, 0),
(268, 7, 41, 1, '127.00', NULL, '2020-09-22 16:01:31', '2021-01-12 01:30:22', '88.90', 6, 2, 0),
(269, 8, 41, 1, '127.00', NULL, '2020-09-22 16:02:31', '2021-01-12 01:30:32', '88.90', 6, 1, 0),
(270, 9, 41, 1, '127.00', NULL, '2020-09-22 16:02:51', '2021-01-12 01:30:44', '88.90', 6, 0, 0),
(271, 10, 41, 1, '127.00', NULL, '2020-09-22 16:03:24', '2021-01-12 01:30:52', '88.90', 6, 2, 0),
(272, 11, 41, 1, '127.00', NULL, '2020-09-22 16:03:42', '2021-01-12 01:31:05', '88.90', 6, 2, 0),
(273, 12, 41, 1, '127.00', NULL, '2020-09-22 16:03:59', '2021-01-12 01:31:16', '88.90', 6, 1, 0),
(274, 13, 42, 1, '175.00', NULL, '2020-09-22 16:08:36', '2021-01-12 01:28:46', '122.50', 6, 0, 0),
(275, 14, 42, 1, '175.00', NULL, '2020-09-22 16:09:22', '2021-01-12 01:28:53', '122.50', 6, 0, 0),
(276, 15, 42, 1, '175.00', NULL, '2020-09-22 16:09:53', '2021-01-12 01:29:00', '122.50', 6, 0, 0),
(277, 2, 43, 1, '158.00', NULL, '2020-09-22 16:12:41', '2021-01-12 01:19:44', '110.60', 7, 0, 0),
(278, 3, 43, 1, '158.00', NULL, '2020-09-22 16:13:46', '2021-01-12 01:19:53', '110.60', 7, 0, 0),
(279, 6, 43, 1, '158.00', NULL, '2020-09-22 16:14:19', '2021-01-12 01:20:02', '110.60', 7, 0, 0),
(280, 7, 43, 1, '158.00', NULL, '2020-09-22 16:14:48', '2021-01-12 01:20:10', '110.60', 7, 0, 0),
(281, 8, 43, 1, '158.00', NULL, '2020-09-22 16:15:15', '2021-01-12 01:20:19', '110.60', 7, 0, 0),
(282, 9, 43, 1, '158.00', NULL, '2020-09-22 16:15:43', '2021-01-12 01:20:29', '110.60', 7, 0, 0),
(283, 10, 43, 1, '158.00', NULL, '2020-09-22 16:16:03', '2021-01-12 01:20:39', '110.60', 7, 0, 0),
(284, 11, 43, 1, '158.00', NULL, '2020-09-22 16:16:20', '2021-01-12 01:20:46', '110.60', 7, 0, 0),
(285, 12, 43, 1, '158.00', NULL, '2020-09-22 16:16:44', '2021-01-12 01:20:54', '110.60', 7, 0, 0),
(286, 12, 43, 1, '158.00', NULL, '2020-09-22 16:16:44', '2021-01-12 01:21:02', '110.60', 7, 0, 0),
(287, 3, 44, 1, '178.00', NULL, '2020-09-22 16:29:56', '2020-11-24 21:17:32', '71.20', 8, 1, 0),
(288, 3, 44, 1, '178.00', NULL, '2020-09-22 16:30:58', '2020-11-24 21:17:49', '71.20', 7, 1, 0),
(289, 6, 44, 1, '178.00', NULL, '2020-09-22 16:31:20', '2020-12-07 20:17:08', '71.20', 8, 1, 0),
(290, 6, 44, 1, '178.00', NULL, '2020-09-22 16:31:42', '2020-12-07 20:17:19', '71.20', 7, 1, 0),
(291, 7, 44, 1, '178.00', NULL, '2020-09-22 16:32:11', '2020-12-07 20:17:27', '71.20', 8, 1, 0),
(292, 7, 44, 1, '178.00', NULL, '2020-09-22 16:32:27', '2020-12-07 20:17:38', '71.20', 7, 1, 0),
(293, 8, 44, 1, '178.00', NULL, '2020-09-22 16:32:45', '2020-12-07 20:17:50', '71.20', 8, 1, 0),
(294, 8, 44, 1, '178.00', NULL, '2020-09-22 16:33:02', '2020-12-07 20:18:00', '71.20', 7, 1, 0),
(295, 9, 44, 1, '178.00', NULL, '2020-09-22 16:34:37', '2020-11-24 21:20:22', '71.20', 8, 1, 0),
(296, 9, 44, 1, '178.00', NULL, '2020-09-22 16:34:59', '2020-11-24 21:19:12', '71.20', 7, 1, 0),
(297, 10, 44, 1, '178.00', NULL, '2020-09-22 16:35:22', '2020-11-24 21:19:22', '71.20', 8, 0, 0),
(298, 10, 44, 1, '178.00', NULL, '2020-09-22 16:36:00', '2020-11-24 21:19:32', '71.20', 7, 0, 0),
(299, 11, 44, 1, '178.00', NULL, '2020-09-22 16:36:43', '2020-11-24 21:19:48', '71.20', 8, 1, 0),
(300, 11, 44, 1, '178.00', NULL, '2020-09-22 16:37:18', '2020-11-24 21:20:00', '71.20', 7, 1, 0),
(301, 12, 44, 1, '178.00', NULL, '2020-09-22 16:37:39', '2020-12-07 20:16:54', '71.20', 8, 0, 0),
(302, 12, 44, 1, '178.00', NULL, '2020-09-22 16:37:55', '2020-11-24 21:18:29', '71.20', 7, 0, 0),
(303, 13, 47, 1, '320.00', NULL, '2020-09-22 16:53:32', '2021-01-12 01:10:22', '128.00', 9, 1, 0),
(304, 14, 47, 1, '320.00', NULL, '2020-09-22 16:53:57', '2021-01-12 01:10:31', '128.00', 9, 0, 0),
(305, 15, 47, 1, '320.00', NULL, '2020-09-22 16:54:15', '2021-01-12 01:10:39', '128.00', 9, 0, 0),
(306, 13, 49, 1, '185.00', NULL, '2020-09-22 16:58:51', '2021-01-12 01:05:07', '74.00', 9, 0, 0),
(307, 14, 49, 1, '185.00', NULL, '2020-09-22 16:59:35', '2021-01-12 01:05:14', '74.00', 9, 0, 0),
(308, 15, 49, 1, '185.00', NULL, '2020-09-22 16:59:52', '2021-01-12 01:05:22', '74.00', 9, 0, 0),
(309, 13, 53, 1, '158.00', NULL, '2020-09-22 17:04:17', '2021-01-12 00:55:59', '110.60', 11, 0, 0),
(310, 14, 53, 1, '158.00', NULL, '2020-09-22 17:04:36', '2021-01-15 18:27:19', '110.60', 11, 1, 0),
(311, 15, 53, 1, '158.00', NULL, '2020-09-22 17:05:03', '2021-01-12 00:56:26', '110.60', 11, 1, 0),
(312, 16, 89, 1, '50.00', NULL, '2020-09-22 18:29:44', '2020-09-23 13:31:26', '25.00', 9, 0, 0),
(313, 16, 89, 1, '50.00', NULL, '2020-09-22 18:30:01', '2020-09-22 18:30:01', NULL, 16, 1, 0),
(314, 16, 89, 1, '50.00', NULL, '2020-09-22 18:30:15', '2020-09-22 18:30:15', NULL, 21, 1, 0),
(315, 16, 89, 1, '50.00', NULL, '2020-09-22 18:30:35', '2020-09-22 18:30:35', NULL, 19, 1, 0),
(316, 16, 89, 1, '50.00', NULL, '2020-09-22 18:30:52', '2020-09-22 18:30:52', NULL, 15, 1, 0),
(317, 16, 89, 1, '50.00', NULL, '2020-09-22 18:31:06', '2020-09-22 18:31:06', NULL, 13, 1, 0),
(318, 16, 87, 1, '50.00', NULL, '2020-09-22 18:34:11', '2020-09-22 18:34:11', NULL, 12, 1, 0),
(319, 16, 87, 1, '50.00', NULL, '2020-09-22 18:34:26', '2020-10-19 21:16:27', '25.00', 9, 0, 0),
(320, 16, 87, 1, '50.00', NULL, '2020-09-22 18:34:47', '2020-09-22 18:34:47', NULL, 16, 2, 0),
(321, 16, 87, 1, '50.00', NULL, '2020-09-22 18:35:04', '2020-09-22 18:35:04', NULL, 21, 2, 0),
(322, 16, 87, 1, '50.00', NULL, '2020-09-22 18:38:11', '2020-09-22 18:38:11', NULL, 19, 2, 0),
(323, 16, 87, 1, '50.00', NULL, '2020-09-22 18:38:29', '2020-09-22 18:38:29', NULL, 13, 2, 0),
(324, 16, 85, 1, '55.00', NULL, '2020-09-22 18:51:30', '2020-09-22 18:51:40', NULL, 12, 1, 0),
(325, 16, 85, 1, '55.00', NULL, '2020-09-22 18:51:57', '2020-09-23 13:30:46', '27.50', 9, 0, 0),
(326, 16, 85, 1, '55.00', NULL, '2020-09-22 18:54:30', '2020-09-22 18:54:30', NULL, 16, 2, 0),
(327, 16, 85, 1, '55.00', NULL, '2020-09-22 18:57:50', '2020-09-22 18:57:50', NULL, 15, 2, 0),
(328, 16, 85, 1, '55.00', NULL, '2020-09-22 18:58:05', '2020-09-22 18:58:05', NULL, 13, 2, 0),
(329, 16, 85, 1, '55.00', NULL, '2020-09-22 19:18:57', '2020-09-23 13:30:58', '27.50', 6, 2, 0),
(330, 16, 85, 1, '55.00', NULL, '2020-09-22 19:19:15', '2020-09-22 19:21:38', NULL, 14, 1, 0),
(331, 16, 87, 1, '50.00', NULL, '2020-09-22 19:20:27', '2020-10-21 20:31:56', '25.00', 6, 1, 0),
(332, 16, 87, 1, '50.00', NULL, '2020-09-22 19:20:55', '2020-09-22 19:20:55', NULL, 14, 0, 0),
(333, 16, 89, 1, '50.00', NULL, '2020-09-22 19:22:26', '2020-09-23 13:31:38', '25.00', 6, 2, 0),
(334, 16, 89, 1, '50.00', NULL, '2020-09-22 19:22:49', '2020-09-22 19:22:49', NULL, 14, 0, 0),
(335, 16, 86, 1, '57.00', NULL, '2020-09-22 19:25:14', '2020-09-23 13:33:15', '28.50', 6, 2, 0),
(336, 16, 88, 1, '57.00', NULL, '2020-09-22 19:27:06', '2020-09-22 19:27:06', NULL, 14, 0, 0),
(337, 16, 88, 1, '57.00', NULL, '2020-09-22 19:27:33', '2020-09-23 13:32:06', '28.50', 9, 1, 0),
(338, 16, 88, 1, '57.00', NULL, '2020-09-22 19:27:49', '2020-09-22 19:27:49', NULL, 16, 2, 0),
(339, 16, 88, 1, '57.00', NULL, '2020-09-22 19:28:11', '2020-09-22 19:28:11', NULL, 21, 2, 0),
(340, 16, 88, 1, '57.00', NULL, '2020-09-22 19:28:42', '2020-09-22 19:28:42', NULL, 15, 2, 0),
(341, 16, 88, 1, '57.00', NULL, '2020-09-22 19:29:01', '2020-09-22 19:29:01', NULL, 13, 2, 0),
(342, 2, 48, 1, '267.00', NULL, '2020-09-22 19:37:28', '2021-01-12 01:07:19', '106.80', 9, 1, 0),
(343, 3, 48, 1, '267.00', NULL, '2020-09-22 19:37:47', '2021-01-12 01:07:27', '106.80', 9, 1, 0),
(344, 6, 48, 1, '267.00', NULL, '2020-09-22 19:38:06', '2021-01-12 01:08:02', '106.80', 9, 2, 0),
(345, 7, 48, 1, '267.00', NULL, '2020-09-22 19:38:24', '2021-01-12 01:08:11', '106.80', 9, 0, 0),
(346, 8, 48, 1, '267.00', NULL, '2020-09-22 19:38:48', '2021-01-12 01:08:28', '106.80', 9, 0, 0),
(347, 9, 48, 1, '267.00', NULL, '2020-09-22 19:39:04', '2021-01-12 01:08:37', '106.80', 9, 2, 0),
(348, 10, 48, 1, '267.00', NULL, '2020-09-22 19:39:28', '2021-01-12 01:08:52', '106.80', 9, 0, 0),
(349, 11, 48, 1, '267.00', NULL, '2020-09-22 19:39:46', '2021-01-12 01:09:00', '106.80', 9, 0, 0),
(350, 12, 48, 1, '267.00', NULL, '2020-09-22 19:40:06', '2021-01-12 01:09:08', '106.80', 9, 0, 0),
(351, 2, 52, 1, '149.00', NULL, '2020-09-22 19:44:44', '2021-01-12 00:58:08', '104.30', 11, 0, 0),
(352, 3, 52, 1, '149.00', NULL, '2020-09-22 19:45:01', '2021-01-12 00:58:19', '104.30', 11, 0, 0),
(353, 6, 52, 1, '149.00', NULL, '2020-09-22 19:45:28', '2021-01-12 00:58:32', '104.30', 11, 0, 0),
(354, 7, 52, 1, '149.00', NULL, '2020-09-22 19:45:48', '2021-01-12 00:58:45', '104.30', 11, 2, 0),
(355, 8, 52, 1, '149.00', NULL, '2020-09-22 19:46:08', '2021-01-12 00:58:57', '104.30', 11, 2, 0),
(356, 9, 52, 1, '149.00', NULL, '2020-09-22 19:46:28', '2021-01-12 00:59:06', '104.30', 11, 2, 0),
(357, 10, 52, 1, '149.00', NULL, '2020-09-22 19:46:50', '2021-01-12 00:59:16', '104.30', 11, 2, 0),
(358, 2, 51, 1, '154.00', NULL, '2020-09-22 19:51:29', '2021-01-12 01:01:10', '107.80', 11, 1, 0),
(359, 3, 51, 1, '154.00', NULL, '2020-09-22 19:51:49', '2021-01-12 01:01:28', '107.80', 11, 0, 0),
(360, 6, 51, 1, '154.00', NULL, '2020-09-22 19:52:06', '2021-01-12 01:01:57', '107.80', 11, 2, 0),
(361, 7, 51, 1, '154.00', NULL, '2020-09-22 19:52:30', '2021-01-12 01:02:08', '107.80', 11, 2, 0),
(362, 8, 51, 1, '154.00', NULL, '2020-09-22 19:52:54', '2021-01-12 01:02:20', '107.80', 11, 2, 0),
(363, 9, 51, 1, '154.00', NULL, '2020-09-22 19:53:12', '2021-01-12 01:02:34', '107.80', 11, 2, 0),
(364, 10, 51, 1, '154.00', NULL, '2020-09-22 19:53:33', '2021-01-12 01:02:44', '107.80', 11, 2, 0),
(365, 7, 46, 1, '122.00', NULL, '2020-09-23 12:01:27', '2020-11-24 21:00:21', '48.80', 8, 2, 0),
(366, 7, 46, 1, '122.00', NULL, '2020-09-23 12:11:41', '2020-11-24 21:00:32', '48.80', 7, 2, 0),
(367, 8, 46, 1, '122.00', NULL, '2020-09-23 12:15:30', '2020-11-24 21:00:41', '48.80', 8, 2, 0),
(368, 8, 46, 1, '122.00', NULL, '2020-09-23 12:15:48', '2020-11-24 21:08:18', '48.80', 7, 2, 0),
(369, 9, 46, 1, '122.00', NULL, '2020-09-23 12:16:06', '2020-11-24 21:07:25', '48.80', 8, 2, 0),
(370, 9, 46, 1, '122.00', NULL, '2020-09-23 12:16:23', '2020-11-24 21:07:13', '48.80', 7, 2, 0),
(371, 10, 46, 1, '122.00', NULL, '2020-09-23 12:17:26', '2020-11-24 21:06:19', '48.80', 8, 2, 0),
(372, 10, 46, 1, '122.00', NULL, '2020-09-23 12:18:56', '2020-11-24 21:05:46', '48.80', 7, 2, 0),
(373, 11, 46, 1, '122.00', NULL, '2020-09-23 12:21:14', '2020-12-07 20:25:10', '48.80', 8, 0, 0),
(374, 11, 46, 1, '122.00', NULL, '2020-09-23 12:21:39', '2020-12-07 20:25:24', '48.80', 7, 0, 0),
(375, 12, 46, 1, '122.00', NULL, '2020-09-23 12:22:07', '2020-11-24 21:01:57', '48.80', 8, 1, 0),
(376, 12, 46, 1, '122.00', NULL, '2020-09-23 12:22:26', '2020-11-24 21:01:45', '48.80', 7, 1, 0),
(377, 2, 45, 1, '142.00', NULL, '2020-09-23 12:29:51', '2020-11-26 20:31:18', '56.80', 8, 1, 0),
(378, 2, 45, 1, '142.00', NULL, '2020-09-23 12:30:10', '2020-11-26 20:32:57', '56.80', 7, 1, 0),
(379, 3, 45, 1, '142.00', NULL, '2020-09-23 12:30:23', '2020-11-26 20:33:26', '56.80', 8, 1, 0),
(380, 3, 45, 1, '142.00', NULL, '2020-09-23 12:30:43', '2020-11-26 20:33:42', '56.80', 7, 1, 0),
(381, 6, 45, 1, '142.00', NULL, '2020-09-23 12:31:19', '2020-12-07 20:21:38', '56.80', 8, 1, 0),
(382, 6, 45, 1, '142.00', NULL, '2020-09-23 12:31:38', '2020-12-07 20:21:48', '56.80', 7, 1, 0),
(383, 7, 45, 1, '142.00', NULL, '2020-09-23 12:31:58', '2020-11-26 20:34:25', '56.80', 8, 1, 0),
(384, 7, 45, 1, '142.00', NULL, '2020-09-23 12:32:13', '2020-11-26 20:34:35', '56.80', 7, 1, 0),
(385, 8, 45, 1, '142.00', NULL, '2020-09-23 12:32:14', '2020-11-26 20:34:53', '56.80', 8, 1, 0),
(386, 8, 45, 1, '142.00', NULL, '2020-09-23 12:32:47', '2020-11-26 20:35:18', '56.80', 7, 1, 0),
(387, 9, 45, 1, '142.00', NULL, '2020-09-23 12:33:16', '2020-12-07 20:20:33', '56.80', 8, 0, 0),
(388, 9, 45, 1, '142.00', NULL, '2020-09-23 12:33:33', '2020-12-07 20:20:46', '56.80', 7, 0, 0),
(389, 10, 45, 1, '142.00', NULL, '2020-09-23 12:33:57', '2020-11-26 20:35:41', '56.80', 8, 0, 0),
(390, 10, 45, 1, '142.00', NULL, '2020-09-23 12:34:22', '2020-11-26 20:35:51', '56.80', 7, 0, 0),
(391, 11, 45, 1, '142.00', NULL, '2020-09-23 12:34:40', '2020-11-26 20:36:06', '56.80', 8, 0, 0),
(392, 11, 45, 1, '142.00', NULL, '2020-09-23 12:34:59', '2020-11-26 20:36:21', '56.80', 7, 0, 0),
(393, 12, 45, 1, '142.00', NULL, '2020-09-23 12:35:18', '2020-12-07 20:19:38', '56.80', 8, 1, 0),
(394, 12, 45, 1, '142.00', NULL, '2020-09-23 12:35:36', '2020-12-07 20:19:50', '56.80', 7, 1, 0),
(395, 1, 50, 1, '138.00', NULL, '2020-09-23 12:42:15', '2020-09-23 12:42:15', '69.00', 20, 2, 0),
(396, 1, 50, 1, '138.00', NULL, '2020-09-23 12:48:40', '2020-09-23 12:49:16', '69.00', 22, 2, 0),
(397, 2, 50, 1, '138.00', NULL, '2020-09-23 12:49:07', '2020-09-23 12:49:07', '69.00', 10, 2, 0),
(398, 2, 50, 1, '138.00', NULL, '2020-09-23 12:49:35', '2020-09-23 12:49:35', '69.00', 20, 2, 0),
(399, 2, 50, 1, '138.00', NULL, '2020-09-23 12:49:51', '2020-09-23 12:49:51', '69.00', 22, 2, 0),
(400, 3, 50, 1, '138.00', NULL, '2020-09-23 12:50:34', '2020-09-23 12:50:34', '69.00', 10, 2, 0),
(401, 3, 50, 1, '138.00', NULL, '2020-09-23 12:50:56', '2020-09-23 12:50:56', '69.00', 20, 2, 0),
(402, 3, 50, 1, '138.00', NULL, '2020-09-23 12:51:15', '2020-09-23 12:51:15', '69.00', 22, 2, 0),
(403, 6, 50, 1, '138.00', NULL, '2020-09-23 12:51:40', '2020-09-23 12:51:40', '69.00', 10, 2, 0),
(404, 6, 50, 1, '138.00', NULL, '2020-09-23 12:52:00', '2020-09-23 12:52:00', '69.00', 20, 2, 0),
(405, 6, 50, 1, '138.00', NULL, '2020-09-23 12:52:19', '2020-09-23 12:52:19', '69.00', 22, 2, 0),
(406, 7, 50, 1, '138.00', NULL, '2020-09-23 12:52:34', '2020-12-07 20:52:05', '69.00', 10, 1, 0),
(407, 7, 50, 1, '138.00', NULL, '2020-09-23 12:52:52', '2020-12-07 20:52:16', '69.00', 20, 1, 0),
(408, 7, 50, 1, '138.00', NULL, '2020-09-23 12:53:09', '2020-12-07 20:52:29', '69.00', 22, 1, 0),
(409, 8, 50, 1, '138.00', NULL, '2020-09-23 12:53:35', '2020-12-07 20:52:53', '69.00', 10, 0, 0),
(410, 8, 50, 1, '138.00', NULL, '2020-09-23 12:54:01', '2020-12-07 20:53:04', '69.00', 20, 0, 0),
(411, 8, 50, 1, '138.00', NULL, '2020-09-23 12:54:32', '2020-12-07 20:53:18', '69.00', 22, 0, 0),
(412, 9, 50, 1, '138.00', NULL, '2020-09-23 12:54:50', '2020-12-07 20:54:07', '69.00', 10, 1, 0),
(413, 9, 50, 1, '138.00', NULL, '2020-09-23 12:55:08', '2020-12-07 20:54:16', '69.00', 20, 1, 0),
(414, 9, 50, 1, '138.00', NULL, '2020-09-23 12:55:37', '2020-12-07 20:54:27', '69.00', 22, 1, 0),
(415, 10, 50, 1, '138.00', NULL, '2020-09-23 12:56:07', '2020-09-23 12:56:07', '69.00', 10, 0, 0),
(416, 10, 50, 1, '138.00', NULL, '2020-09-23 12:56:26', '2020-09-23 12:56:26', '69.00', 20, 0, 0),
(417, 10, 50, 1, '138.00', NULL, '2020-09-23 12:56:42', '2020-09-23 12:56:42', '69.00', 22, 0, 0),
(418, 16, 92, 1, '98.00', NULL, '2020-09-23 13:04:18', '2020-11-12 18:46:47', '78.40', 12, 1, 0),
(419, 16, 92, 1, '98.00', NULL, '2020-09-23 13:04:35', '2020-10-23 14:35:44', '49.00', 6, 0, 0),
(420, 16, 92, 1, '98.00', NULL, '2020-09-23 13:05:15', '2020-09-23 13:05:15', NULL, 14, 0, 0),
(421, 16, 92, 1, '98.00', NULL, '2020-09-23 13:05:57', '2020-09-23 13:05:57', '49.00', 9, 0, 0),
(422, 16, 92, 1, '98.00', '2020-09-23 13:07:20', '2020-09-23 13:06:29', '2020-09-23 13:07:20', '49.00', 16, 1, 0),
(423, 16, 92, 1, '98.00', NULL, '2020-09-23 13:06:44', '2020-09-23 13:06:44', NULL, 21, 1, 0),
(424, 16, 92, 1, '98.00', NULL, '2020-09-23 13:07:41', '2020-09-23 13:07:41', NULL, 16, 1, 0),
(425, 16, 92, 1, '98.00', NULL, '2020-09-23 13:08:15', '2020-09-23 13:08:15', NULL, 19, 1, 0),
(426, 16, 92, 1, '98.00', NULL, '2020-09-23 13:08:30', '2020-09-23 13:08:30', NULL, 15, 1, 0),
(427, 16, 92, 1, '98.00', NULL, '2020-09-23 13:08:45', '2020-09-23 13:08:45', NULL, 13, 1, 0),
(428, 2, 69, 1, '65.00', NULL, '2020-09-23 14:15:49', '2020-09-23 14:20:45', NULL, 23, 0, 0),
(429, 2, 69, 1, '65.00', NULL, '2020-09-23 14:16:06', '2020-09-23 14:21:04', NULL, 24, 1, 0),
(430, 2, 69, 1, '65.00', NULL, '2020-09-23 14:16:24', '2020-09-23 14:21:21', NULL, 20, 0, 0),
(431, 2, 69, 1, '65.00', NULL, '2020-09-23 14:16:39', '2020-09-23 14:21:44', NULL, 25, 1, 0),
(432, 2, 69, 1, '65.00', NULL, '2020-09-23 14:17:03', '2020-09-23 14:22:02', NULL, 18, 1, 0),
(433, 6, 69, 1, '65.00', NULL, '2020-09-23 14:18:13', '2020-09-23 14:18:13', NULL, 24, 1, 0),
(434, 6, 69, 1, '65.00', NULL, '2020-09-23 14:18:41', '2020-09-23 14:22:39', NULL, 8, 0, 0),
(435, 6, 69, 1, '65.00', NULL, '2020-09-23 14:18:55', '2020-09-23 14:23:02', NULL, 23, 0, 0),
(436, 6, 69, 1, '65.00', NULL, '2020-09-23 14:19:12', '2020-09-23 14:23:40', NULL, 7, 0, 0),
(437, 6, 69, 1, '65.00', NULL, '2020-09-23 14:19:28', '2020-09-23 14:23:54', NULL, 25, 1, 0),
(438, 6, 69, 1, '65.00', NULL, '2020-09-23 14:24:19', '2020-09-23 14:24:19', NULL, 20, 0, 0),
(439, 6, 69, 1, '65.00', NULL, '2020-09-23 14:24:32', '2020-09-23 14:24:32', NULL, 18, 0, 0),
(440, 7, 69, 1, '65.00', NULL, '2020-09-23 14:25:22', '2020-09-23 14:25:22', NULL, 8, 0, 0),
(441, 7, 69, 1, '65.00', NULL, '2020-09-23 14:25:49', '2020-09-23 14:25:49', NULL, 24, 1, 0),
(442, 7, 69, 1, '65.00', NULL, '2020-09-23 14:26:09', '2020-09-23 14:26:09', NULL, 18, 1, 0),
(443, 7, 69, 1, '65.00', NULL, '2020-09-23 14:26:33', '2020-09-23 14:26:58', NULL, 25, 0, 0),
(444, 8, 69, 1, '65.00', NULL, '2020-09-23 14:34:16', '2020-09-23 14:34:16', NULL, 8, 1, 0),
(445, 8, 69, 1, '65.00', NULL, '2020-09-23 14:34:37', '2020-09-23 14:34:37', NULL, 24, 0, 0),
(446, 8, 69, 1, '65.00', NULL, '2020-09-23 14:34:51', '2020-09-23 14:34:51', NULL, 18, 1, 0),
(447, 8, 69, 1, '65.00', NULL, '2020-09-23 14:35:03', '2020-09-23 14:35:03', NULL, 23, 0, 0),
(448, 8, 69, 1, '65.00', NULL, '2020-09-23 14:35:21', '2020-09-23 14:35:21', NULL, 25, 0, 0),
(449, 9, 69, 1, '65.00', NULL, '2020-09-23 14:35:50', '2020-09-23 14:35:50', NULL, 18, 0, 0),
(450, 9, 69, 1, '65.00', NULL, '2020-09-23 14:36:04', '2020-09-23 14:36:04', NULL, 25, 0, 0),
(451, 9, 69, 1, '65.00', NULL, '2020-09-23 14:36:25', '2020-09-23 14:36:25', NULL, 24, 1, 0),
(452, 9, 69, 1, '65.00', NULL, '2020-09-23 14:36:41', '2020-09-23 14:36:41', NULL, 20, 0, 0),
(453, 9, 69, 1, '65.00', NULL, '2020-09-23 14:37:04', '2020-09-23 14:37:04', NULL, 8, 1, 0),
(454, 10, 69, 1, '65.00', NULL, '2020-09-23 14:37:29', '2020-09-23 14:37:29', NULL, 24, 1, 0),
(455, 10, 69, 1, '65.00', NULL, '2020-09-23 14:37:46', '2020-09-23 14:37:46', NULL, 18, 0, 0),
(456, 10, 69, 1, '65.00', NULL, '2020-09-23 14:38:07', '2020-09-23 14:38:07', NULL, 8, 0, 0),
(457, 10, 69, 1, '65.00', NULL, '2020-09-23 14:38:22', '2020-09-23 14:38:22', NULL, 20, 0, 0),
(458, 11, 69, 1, '65.00', NULL, '2020-09-23 14:38:41', '2020-09-23 14:38:41', NULL, 24, 1, 0),
(459, 11, 69, 1, '65.00', NULL, '2020-09-23 14:38:53', '2020-09-23 14:38:53', NULL, 20, 0, 0),
(460, 6, 75, 1, '62.00', NULL, '2020-09-23 14:41:43', '2020-09-23 14:41:43', NULL, 18, 2, 0),
(461, 6, 75, 1, '62.00', NULL, '2020-09-23 14:41:56', '2020-09-23 14:49:14', NULL, 25, 1, 0),
(462, 7, 75, 1, '62.00', NULL, '2020-09-23 14:42:14', '2020-09-23 14:42:14', NULL, 18, 1, 0),
(463, 7, 75, 1, '62.00', NULL, '2020-09-23 14:43:06', '2020-09-23 14:43:06', NULL, 13, 1, 0),
(464, 7, 75, 1, '62.00', NULL, '2020-09-23 14:43:18', '2020-09-23 14:49:28', NULL, 25, 0, 0),
(465, 8, 75, 1, '62.00', NULL, '2020-09-23 14:43:35', '2020-09-23 14:49:38', NULL, 25, 1, 0),
(466, 8, 75, 1, '62.00', NULL, '2020-09-23 14:43:50', '2020-09-23 14:43:50', NULL, 18, 1, 0),
(467, 8, 75, 1, '62.00', NULL, '2020-09-23 14:44:05', '2020-09-23 14:44:05', NULL, 13, 1, 0),
(468, 9, 75, 1, '62.00', NULL, '2020-09-23 14:44:25', '2020-09-23 14:44:25', NULL, 13, 1, 0),
(469, 9, 75, 1, '62.00', NULL, '2020-09-23 14:44:36', '2020-09-23 14:44:36', NULL, 18, 1, 0),
(470, 9, 75, 1, '62.00', NULL, '2020-09-23 14:44:50', '2020-09-23 14:49:52', NULL, 25, 0, 0),
(471, 10, 75, 1, '0.00', NULL, '2020-09-23 14:45:06', '2020-09-23 14:45:06', NULL, 18, 1, 0),
(472, 12, 75, 1, '62.00', NULL, '2020-09-23 14:45:35', '2020-09-23 14:45:35', NULL, 13, 0, 0),
(473, 12, 75, 1, '62.00', NULL, '2020-09-23 14:45:47', '2020-09-23 14:45:47', NULL, 18, 0, 0),
(474, 1, 93, 1, '80.00', NULL, '2020-09-25 11:20:16', '2020-09-25 11:20:16', '69.99', 7, 20, 0),
(475, 2, 93, 1, '80.00', NULL, '2020-09-25 11:20:41', '2020-09-25 11:20:41', '69.99', 6, 10, 0),
(476, 1, 94, 1, '240.00', NULL, '2020-10-02 18:45:55', '2021-01-11 21:31:45', '204.00', 7, 1, 0),
(477, 2, 94, 1, '240.00', NULL, '2020-10-02 18:46:21', '2021-01-11 21:32:02', '204.00', 7, 2, 0),
(478, 6, 94, 1, '240.00', NULL, '2020-10-02 18:47:02', '2021-01-11 21:32:08', '204.00', 7, 2, 0),
(479, 7, 94, 1, '240.00', NULL, '2020-10-02 18:47:21', '2021-01-11 21:32:37', '204.00', 7, 0, 0),
(480, 8, 94, 1, '240.00', NULL, '2020-10-02 18:47:44', '2021-01-11 21:32:51', '204.00', 7, 1, 0),
(481, 9, 94, 1, '240.00', NULL, '2020-10-02 18:48:00', '2021-01-11 21:33:13', '204.00', 7, 0, 0),
(482, 10, 94, 1, '240.00', NULL, '2020-10-02 18:48:17', '2021-01-11 21:33:21', '204.00', 7, 0, 0),
(483, 11, 94, 1, '240.00', NULL, '2020-10-02 18:48:40', '2021-01-11 21:33:39', '204.00', 7, 1, 0),
(484, 12, 94, 1, '240.00', NULL, '2020-10-02 18:49:18', '2021-01-11 21:33:48', '204.00', 7, 0, 0),
(485, 1, 95, 1, '238.00', NULL, '2020-10-02 19:37:59', '2021-01-11 21:26:23', '202.30', 26, 0, 0),
(486, 2, 95, 1, '238.00', NULL, '2020-10-02 20:04:28', '2021-03-02 13:35:46', '202.30', 26, 47, 0),
(487, 3, 95, 1, '238.00', NULL, '2020-10-02 20:04:43', '2021-01-11 21:27:16', '202.30', 26, 0, 0),
(488, 6, 95, 1, '238.00', NULL, '2020-10-02 20:04:56', '2021-01-11 21:27:46', '202.30', 26, 2, 0),
(489, 7, 95, 1, '238.00', NULL, '2020-10-02 20:05:13', '2021-01-11 21:27:37', '202.30', 26, 0, 0),
(490, 8, 95, 1, '238.00', NULL, '2020-10-02 20:05:40', '2021-01-11 21:28:18', '202.30', 26, 2, 0),
(491, 9, 95, 1, '238.00', NULL, '2020-10-02 20:07:00', '2021-01-11 21:28:09', '202.30', 26, 1, 0),
(492, 10, 95, 1, '238.00', NULL, '2020-10-02 20:07:16', '2021-01-11 21:28:36', '202.30', 26, 1, 0),
(493, 11, 95, 1, '238.00', NULL, '2020-10-02 20:07:30', '2021-01-11 21:28:48', '202.30', 26, 2, 0),
(494, 12, 95, 1, '238.00', NULL, '2020-10-02 20:08:15', '2021-01-11 21:28:55', '202.30', 26, 2, 0),
(495, 1, 96, 1, '245.00', NULL, '2020-10-02 20:11:14', '2021-01-11 21:21:52', '208.25', 18, 1, 0),
(496, 2, 96, 1, '245.00', NULL, '2020-10-02 20:11:32', '2021-01-11 21:22:17', '208.25', 18, 0, 0),
(497, 6, 96, 1, '245.00', NULL, '2020-10-02 20:11:59', '2021-01-11 21:22:27', '208.25', 18, 0, 0),
(498, 7, 96, 1, '245.00', NULL, '2020-10-02 20:12:13', '2021-01-11 21:22:40', '208.25', 18, 1, 0),
(499, 8, 96, 1, '245.00', NULL, '2020-10-02 20:12:28', '2021-01-11 21:22:59', '208.25', 18, 0, 0),
(500, 9, 96, 1, '245.00', NULL, '2020-10-02 20:13:01', '2021-01-11 21:23:08', '208.25', 18, 1, 0),
(501, 10, 96, 1, '245.00', NULL, '2020-10-02 20:13:14', '2021-01-11 21:23:40', '208.25', 18, 0, 0),
(502, 11, 96, 1, '245.00', NULL, '2020-10-02 20:13:31', '2021-01-11 21:23:49', '208.25', 18, 1, 0),
(503, 12, 96, 1, '245.00', NULL, '2020-10-02 20:13:43', '2021-01-11 21:24:04', '208.25', 18, 0, 0),
(504, 1, 97, 1, '242.00', NULL, '2020-10-02 20:49:15', '2021-01-12 00:15:36', '205.70', 25, 0, 0),
(505, 2, 97, 1, '242.00', NULL, '2020-10-02 20:49:35', '2021-01-12 00:15:53', '205.70', 25, 0, 0),
(506, 3, 97, 1, '242.00', NULL, '2020-10-02 20:49:48', '2021-01-12 00:16:02', '205.70', 25, 2, 0),
(507, 6, 97, 1, '242.00', NULL, '2020-10-02 20:50:16', '2021-01-12 00:16:19', '205.70', 25, 1, 0),
(508, 7, 97, 1, '242.00', NULL, '2020-10-02 20:50:30', '2021-01-12 00:16:28', '205.70', 25, 0, 0),
(509, 8, 97, 1, '242.00', NULL, '2020-10-02 20:52:23', '2021-01-12 00:16:45', '205.70', 25, 1, 0),
(510, 9, 97, 1, '242.00', NULL, '2020-10-02 20:52:38', '2021-01-12 00:16:53', '205.70', 25, 0, 0),
(511, 10, 97, 1, '242.00', NULL, '2020-10-02 20:53:21', '2021-01-12 00:17:10', '205.70', 25, 0, 0),
(512, 11, 97, 1, '242.00', NULL, '2020-10-02 20:53:35', '2021-01-12 00:17:17', '205.70', 25, 2, 0),
(513, 12, 97, 1, '242.00', NULL, '2020-10-02 20:53:50', '2021-01-12 00:17:28', '205.70', 25, 0, 0),
(514, 6, 98, 1, '120.00', NULL, '2020-10-02 21:08:47', '2021-01-12 00:13:18', '102.00', 26, 1, 0),
(515, 7, 98, 1, '120.00', NULL, '2020-10-02 21:15:32', '2021-01-12 00:13:38', '102.00', 26, 0, 0),
(516, 8, 98, 1, '120.00', NULL, '2020-10-02 21:16:14', '2021-01-12 00:13:48', '102.00', 26, 0, 0),
(517, 9, 98, 1, '120.00', NULL, '2020-10-02 21:16:36', '2021-01-12 00:13:58', '102.00', 26, 1, 0),
(518, 10, 98, 1, '120.00', NULL, '2020-10-02 21:16:58', '2021-01-12 00:14:11', '102.00', 26, 1, 0),
(519, 11, 98, 1, '120.00', NULL, '2020-10-02 21:17:17', '2021-01-12 00:14:21', '102.00', 26, 0, 0),
(520, 12, 98, 1, '120.00', NULL, '2020-10-02 21:17:44', '2021-01-12 00:14:31', '102.00', 26, 0, 0),
(521, 6, 99, 1, '110.00', NULL, '2020-10-05 14:27:46', '2021-01-12 00:03:59', '93.50', 7, 2, 0),
(522, 7, 99, 1, '110.00', NULL, '2020-10-05 14:29:43', '2021-01-12 00:04:14', '93.50', 7, 0, 0),
(523, 4, 100, 1, '135.00', NULL, '2020-10-05 14:33:12', '2021-01-11 23:41:52', '114.75', 25, 1, 0),
(524, 4, 101, 1, '135.00', NULL, '2020-10-05 14:34:40', '2021-01-11 21:37:59', '114.75', 18, 0, 0),
(525, 8, 99, 1, '110.00', NULL, '2020-10-05 14:38:33', '2021-01-12 00:04:24', '93.50', 7, 0, 0),
(526, 9, 99, 1, '110.00', NULL, '2020-10-05 14:38:51', '2021-01-12 00:04:51', '93.50', 7, 1, 0),
(527, 10, 99, 1, '110.00', NULL, '2020-10-05 14:39:08', '2021-01-12 00:04:41', '93.50', 7, 0, 0),
(528, 11, 99, 1, '110.00', NULL, '2020-10-05 14:39:20', '2021-01-12 00:05:06', '93.50', 7, 0, 0);
INSERT INTO `stocks` (`id`, `productSize_id`, `product_id`, `active`, `amount`, `deleted_at`, `created_at`, `updated_at`, `promotion_value`, `productColor_id`, `quantity`, `default`) VALUES
(529, 12, 99, 1, '110.00', NULL, '2020-10-05 14:39:35', '2021-01-12 00:05:15', '93.50', 7, 0, 0),
(530, 13, 101, 1, '135.00', NULL, '2020-10-05 14:40:14', '2021-01-11 21:40:03', '114.75', 18, 1, 0),
(531, 14, 101, 1, '135.00', NULL, '2020-10-05 14:40:27', '2021-01-11 21:38:17', '114.75', 18, 0, 0),
(532, 15, 101, 1, '135.00', NULL, '2020-10-05 14:40:40', '2021-01-11 21:38:26', '114.75', 18, 0, 0),
(533, 13, 100, 1, '135.00', NULL, '2020-10-05 14:41:59', '2021-01-11 23:42:01', '114.75', 25, 1, 0),
(534, 14, 100, 1, '135.00', NULL, '2020-10-05 14:42:11', '2021-01-11 23:42:12', '114.75', 25, 2, 0),
(535, 15, 100, 1, '135.00', NULL, '2020-10-05 14:42:22', '2021-01-12 20:20:06', '114.75', 25, 0, 0),
(536, 4, 102, 1, '128.00', NULL, '2020-10-05 16:08:53', '2021-01-11 23:43:26', '108.80', 27, 1, 0),
(537, 4, 102, 1, '128.00', NULL, '2020-10-05 16:09:12', '2021-01-11 23:44:28', '108.80', 15, 1, 0),
(538, 13, 102, 1, '128.00', NULL, '2020-10-05 16:09:24', '2021-01-11 23:45:09', '108.80', 27, 0, 0),
(539, 13, 102, 1, '128.00', NULL, '2020-10-05 16:09:39', '2021-01-11 23:46:15', '108.80', 15, 0, 0),
(540, 14, 102, 1, '128.00', NULL, '2020-10-05 16:09:52', '2021-01-11 23:46:28', '108.80', 27, 1, 0),
(541, 14, 102, 1, '128.00', NULL, '2020-10-05 16:10:07', '2021-01-11 23:46:36', '108.80', 15, 1, 0),
(542, 15, 102, 1, '128.00', NULL, '2020-10-05 16:10:19', '2021-01-11 23:46:44', '108.80', 27, 0, 0),
(543, 15, 102, 1, '128.00', NULL, '2020-10-05 16:10:31', '2021-01-11 23:46:52', '108.80', 15, 0, 0),
(544, 4, 103, 1, '138.00', NULL, '2020-10-05 18:32:23', '2021-01-11 23:49:02', '117.30', 7, 1, 0),
(545, 4, 103, 1, '138.00', NULL, '2020-10-05 18:32:36', '2021-01-11 23:49:12', '117.30', 15, 1, 0),
(546, 13, 103, 1, '138.00', NULL, '2020-10-05 18:32:49', '2021-01-11 23:49:25', '117.30', 7, 1, 0),
(547, 13, 103, 1, '138.00', NULL, '2020-10-05 18:33:01', '2021-01-11 23:49:35', '117.30', 15, 1, 0),
(548, 14, 103, 1, '138.00', NULL, '2020-10-05 18:33:16', '2021-01-11 23:49:52', '117.30', 7, 0, 0),
(549, 14, 103, 1, '138.00', NULL, '2020-10-05 18:33:30', '2021-01-11 23:50:01', '117.30', 15, 0, 0),
(550, 15, 103, 1, '138.00', NULL, '2020-10-05 18:33:44', '2021-01-11 23:50:12', '117.30', 7, 0, 0),
(551, 15, 103, 1, '138.00', NULL, '2020-10-05 18:34:05', '2021-01-11 23:50:23', '117.30', 15, 0, 0),
(552, 1, 104, 1, '135.00', NULL, '2020-10-05 19:56:41', '2020-10-05 21:41:45', NULL, 15, 2, 0),
(553, 1, 104, 1, '135.00', NULL, '2020-10-05 19:56:56', '2020-10-05 21:41:54', NULL, 13, 2, 0),
(554, 2, 104, 1, '135.00', NULL, '2020-10-05 19:57:09', '2020-10-05 21:42:02', NULL, 15, 2, 0),
(555, 2, 104, 1, '135.00', NULL, '2020-10-05 19:57:24', '2020-10-05 21:42:09', NULL, 13, 2, 0),
(556, 3, 104, 1, '135.00', NULL, '2020-10-05 19:57:38', '2020-10-05 21:42:18', NULL, 15, 2, 0),
(557, 3, 104, 1, '135.00', NULL, '2020-10-05 19:57:52', '2020-10-05 21:42:26', NULL, 13, 2, 0),
(558, 6, 104, 1, '135.00', NULL, '2020-10-05 19:58:06', '2020-10-05 21:42:34', NULL, 15, 2, 0),
(559, 6, 104, 1, '135.00', NULL, '2020-10-05 19:58:20', '2020-10-05 21:42:44', NULL, 13, 2, 0),
(560, 7, 104, 1, '135.00', NULL, '2020-10-05 19:58:34', '2020-10-05 21:42:53', NULL, 15, 2, 0),
(561, 7, 104, 1, '135.00', NULL, '2020-10-05 19:58:54', '2020-10-05 21:43:52', NULL, 13, 2, 0),
(562, 8, 104, 1, '135.00', NULL, '2020-10-05 19:59:06', '2020-10-05 21:43:43', NULL, 15, 2, 0),
(563, 8, 104, 1, '135.00', NULL, '2020-10-05 19:59:18', '2020-10-05 21:43:34', NULL, 13, 2, 0),
(564, 9, 104, 1, '135.00', NULL, '2020-10-05 19:59:29', '2020-10-05 21:43:26', NULL, 15, 2, 0),
(565, 9, 104, 1, '135.00', NULL, '2020-10-05 19:59:42', '2020-10-05 21:43:17', NULL, 13, 2, 0),
(566, 10, 104, 1, '135.00', NULL, '2020-10-05 19:59:56', '2020-10-05 21:43:09', NULL, 15, 2, 0),
(567, 10, 104, 1, '135.00', NULL, '2020-10-05 20:00:13', '2020-10-05 21:43:01', NULL, 13, 2, 0),
(568, 10, 104, 1, '150.00', '2020-10-05 20:00:26', '2020-10-05 20:00:13', '2020-10-05 20:00:26', NULL, 13, 2, 0),
(569, 1, 105, 1, '128.00', NULL, '2020-10-05 21:40:10', '2021-01-12 00:45:19', '108.80', 24, 2, 0),
(570, 1, 105, 1, '128.00', NULL, '2020-10-05 21:40:46', '2021-01-12 00:45:27', '108.80', 20, 2, 0),
(571, 2, 106, 1, '138.00', NULL, '2020-10-05 21:46:33', '2021-01-11 23:18:05', '117.30', 24, 0, 0),
(572, 2, 106, 1, '138.00', NULL, '2020-10-05 21:47:05', '2021-01-11 23:18:15', '117.30', 20, 0, 0),
(573, 3, 106, 1, '138.00', NULL, '2020-10-05 21:47:54', '2021-01-11 23:18:35', '117.30', 24, 0, 0),
(574, 3, 106, 1, '138.00', NULL, '2020-10-05 21:48:13', '2021-01-11 23:18:45', '117.30', 20, 0, 0),
(575, 6, 106, 1, '138.00', NULL, '2020-10-05 21:48:29', '2021-01-11 23:18:55', '117.30', 24, 0, 0),
(576, 6, 106, 1, '138.00', NULL, '2020-10-05 21:48:42', '2021-01-11 23:19:06', '117.30', 20, 0, 0),
(577, 7, 106, 1, '138.00', NULL, '2020-10-05 21:48:56', '2021-01-11 23:19:26', '117.30', 24, 2, 0),
(578, 7, 106, 1, '138.00', NULL, '2020-10-05 21:49:18', '2021-01-11 23:19:35', '117.30', 20, 2, 0),
(579, 8, 106, 1, '138.00', NULL, '2020-10-05 21:49:18', '2021-01-11 23:19:45', '117.30', 24, 2, 0),
(580, 8, 106, 1, '138.00', NULL, '2020-10-05 21:50:25', '2021-01-11 23:19:54', '117.30', 20, 2, 0),
(581, 9, 106, 1, '138.00', NULL, '2020-10-05 21:50:37', '2021-01-11 23:20:27', '117.30', 24, 2, 0),
(582, 9, 106, 1, '138.00', NULL, '2020-10-05 21:50:52', '2021-01-11 23:20:36', '117.30', 20, 2, 0),
(583, 10, 106, 1, '138.00', NULL, '2020-10-05 21:51:10', '2021-01-11 23:20:44', '117.30', 24, 2, 0),
(584, 10, 106, 1, '138.00', NULL, '2020-10-05 21:51:22', '2021-01-11 23:20:52', '117.30', 20, 2, 0),
(585, 12, 106, 1, '138.00', NULL, '2020-10-05 21:51:41', '2021-01-11 23:21:07', '117.30', 24, 2, 0),
(586, 12, 106, 1, '138.00', NULL, '2020-10-05 21:51:57', '2021-01-11 23:21:15', '117.30', 20, 2, 0),
(587, 2, 105, 1, '128.00', NULL, '2020-10-05 21:52:40', '2021-01-12 00:45:41', '108.80', 24, 1, 0),
(588, 2, 105, 1, '128.00', NULL, '2020-10-05 21:52:52', '2021-01-12 00:45:51', '108.80', 20, 1, 0),
(589, 3, 105, 1, '128.00', NULL, '2020-10-05 21:53:07', '2021-01-12 00:46:19', '108.80', 24, 2, 0),
(590, 3, 105, 1, '128.00', NULL, '2020-10-05 21:53:19', '2021-01-12 00:46:26', '108.80', 20, 2, 0),
(591, 6, 105, 1, '128.00', NULL, '2020-10-05 21:53:34', '2021-01-12 00:46:36', '108.80', 24, 0, 0),
(592, 6, 105, 1, '128.00', NULL, '2020-10-05 21:53:48', '2021-01-12 00:46:47', '108.80', 20, 0, 0),
(593, 7, 105, 1, '128.00', NULL, '2020-10-05 21:53:59', '2021-01-12 00:47:06', '108.80', 24, 2, 0),
(594, 7, 105, 1, '128.00', NULL, '2020-10-05 21:54:11', '2021-01-12 00:47:15', '108.80', 20, 2, 0),
(595, 8, 105, 1, '128.00', NULL, '2020-10-05 21:54:23', '2021-01-12 00:47:26', '108.80', 24, 1, 0),
(596, 8, 105, 1, '128.00', NULL, '2020-10-05 21:54:39', '2021-01-12 00:47:37', '108.80', 20, 1, 0),
(597, 9, 105, 1, '128.00', NULL, '2020-10-05 21:55:03', '2021-01-12 00:47:54', '108.80', 24, 0, 0),
(598, 9, 105, 1, '128.00', NULL, '2020-10-05 21:55:16', '2021-01-12 00:48:08', '108.80', 20, 0, 0),
(599, 10, 105, 1, '128.00', NULL, '2020-10-05 21:55:30', '2021-01-12 00:48:18', '108.80', 24, 1, 0),
(600, 10, 105, 1, '128.00', NULL, '2020-10-05 21:55:43', '2021-01-12 00:48:27', '108.80', 20, 1, 0),
(601, 2, 107, 1, '138.00', NULL, '2020-10-05 21:58:58', '2021-01-11 23:12:25', '117.30', 24, 2, 0),
(602, 2, 107, 1, '138.00', NULL, '2020-10-05 21:59:16', '2021-01-11 23:12:34', '117.30', 20, 2, 0),
(603, 6, 107, 1, '138.00', NULL, '2020-10-05 22:00:20', '2021-01-11 23:13:06', '117.30', 24, 2, 0),
(604, 6, 107, 1, '138.00', NULL, '2020-10-05 22:00:36', '2021-01-11 23:13:14', '117.30', 20, 2, 0),
(605, 7, 107, 1, '138.00', NULL, '2020-10-05 22:00:49', '2021-01-11 23:13:21', '117.30', 24, 2, 0),
(606, 7, 107, 1, '138.00', NULL, '2020-10-05 22:01:00', '2021-01-11 23:13:29', '117.30', 20, 2, 0),
(607, 8, 107, 1, '138.00', NULL, '2020-10-05 22:01:13', '2021-01-11 23:13:43', '117.30', 24, 2, 0),
(608, 8, 107, 1, '138.00', NULL, '2020-10-05 22:01:26', '2021-01-11 23:13:52', '117.30', 20, 2, 0),
(609, 9, 107, 1, '138.00', NULL, '2020-10-05 22:01:41', '2021-01-11 23:14:12', '117.30', 24, 0, 0),
(610, 9, 107, 1, '138.00', NULL, '2020-10-05 22:01:57', '2021-01-11 23:14:24', '117.30', 24, 0, 0),
(611, 10, 107, 1, '138.00', NULL, '2020-10-05 22:02:12', '2021-01-11 23:14:36', '117.30', 24, 2, 0),
(612, 10, 107, 1, '138.00', NULL, '2020-10-05 22:02:28', '2021-01-11 23:14:44', '117.30', 20, 2, 0),
(613, 12, 107, 1, '138.00', NULL, '2020-10-05 22:02:41', '2021-01-11 23:15:50', '117.30', 24, 0, 0),
(614, 12, 107, 1, '138.00', NULL, '2020-10-05 22:02:56', '2021-01-11 23:15:58', '117.30', 20, 0, 0),
(615, 12, 107, 1, '138.00', '2021-01-11 23:15:09', '2020-10-05 22:02:57', '2021-01-11 23:15:09', NULL, 20, 2, 0),
(616, 1, 108, 1, '150.00', NULL, '2020-10-06 00:04:14', '2021-03-02 13:35:46', '127.50', 15, 0, 0),
(617, 1, 108, 1, '150.00', NULL, '2020-10-06 00:04:34', '2021-01-12 00:42:26', '127.50', 23, 1, 0),
(618, 2, 108, 1, '150.00', NULL, '2020-10-06 00:06:04', '2021-01-12 00:41:36', '127.50', 15, 2, 0),
(619, 2, 108, 1, '150.00', NULL, '2020-10-06 00:06:26', '2021-01-12 00:41:45', '127.50', 23, 2, 0),
(620, 3, 108, 1, '150.00', NULL, '2020-10-06 00:06:44', '2021-01-12 00:41:57', '127.50', 15, 2, 0),
(621, 3, 108, 1, '150.00', NULL, '2020-10-06 00:07:02', '2021-01-12 00:42:06', '127.50', 23, 2, 0),
(622, 6, 108, 1, '150.00', NULL, '2020-10-06 00:07:19', '2021-01-12 00:42:38', '127.50', 15, 2, 0),
(623, 6, 108, 1, '150.00', NULL, '2020-10-06 00:07:34', '2021-01-12 00:42:46', '127.50', 23, 2, 0),
(624, 7, 108, 1, '150.00', NULL, '2020-10-06 00:07:53', '2021-01-12 00:42:54', '127.50', 15, 2, 0),
(625, 7, 108, 1, '150.00', NULL, '2020-10-06 00:08:09', '2021-01-12 00:43:01', '127.50', 23, 2, 0),
(626, 8, 108, 1, '150.00', NULL, '2020-10-06 00:08:26', '2021-01-12 00:43:09', '127.50', 15, 2, 0),
(627, 8, 108, 1, '150.00', NULL, '2020-10-06 00:08:50', '2021-01-12 00:43:17', '127.50', 23, 2, 0),
(628, 9, 108, 1, '150.00', NULL, '2020-10-06 00:09:10', '2021-01-12 00:43:26', '127.50', 15, 2, 0),
(629, 9, 108, 1, '150.00', NULL, '2020-10-06 00:09:29', '2021-01-12 00:43:33', '127.50', 23, 2, 0),
(630, 10, 108, 1, '150.00', NULL, '2020-10-06 00:09:49', '2021-01-12 00:43:41', '127.50', 15, 2, 0),
(631, 10, 108, 1, '150.00', NULL, '2020-10-06 00:10:05', '2021-01-12 00:43:49', '127.50', 23, 2, 0),
(632, 1, 109, 1, '149.00', NULL, '2020-10-06 00:14:30', '2021-01-12 00:38:35', '126.65', 27, 1, 0),
(633, 2, 109, 1, '149.00', NULL, '2020-10-06 00:15:03', '2021-01-12 00:38:55', '126.65', 27, 0, 0),
(634, 3, 109, 1, '149.00', NULL, '2020-10-06 00:15:17', '2021-01-12 00:39:03', '126.65', 27, 2, 0),
(635, 6, 109, 1, '149.00', NULL, '2020-10-06 00:15:28', '2021-01-12 00:39:16', '126.65', 27, 2, 0),
(636, 7, 109, 1, '149.00', NULL, '2020-10-06 00:15:41', '2021-01-12 00:39:24', '126.65', 27, 2, 0),
(637, 8, 109, 1, '149.00', NULL, '2020-10-06 00:15:53', '2021-01-12 00:39:40', '126.65', 27, 1, 0),
(638, 9, 109, 1, '149.00', NULL, '2020-10-06 00:16:06', '2021-01-12 00:39:53', '126.65', 27, 2, 0),
(639, 10, 109, 1, '149.00', NULL, '2020-10-06 00:16:19', '2021-01-12 00:39:59', '126.65', 27, 2, 0),
(640, 14, 110, 1, '246.00', NULL, '2020-10-07 20:41:32', '2020-10-07 20:41:32', '123.00', 8, 1, 0),
(641, 14, 111, 1, '266.00', NULL, '2020-10-07 20:42:50', '2020-10-07 20:42:50', '133.00', 13, 1, 0),
(642, 14, 112, 1, '246.00', NULL, '2020-10-09 20:53:20', '2020-10-17 13:09:01', '123.00', 8, 1, 0),
(643, 14, 113, 1, '266.00', NULL, '2020-10-09 20:55:16', '2020-10-19 11:46:06', '133.00', 13, 0, 0),
(644, 14, 92, 1, '1.00', '2020-10-21 15:31:07', '2020-10-21 15:20:19', '2020-10-21 15:31:07', NULL, 27, 1, 0),
(645, 16, 92, 1, '1.00', NULL, '2020-10-21 15:44:49', '2020-10-21 20:48:45', NULL, 27, 0, 0),
(646, 13, 114, 1, '225.00', NULL, '2020-10-21 17:24:14', '2020-10-21 17:24:14', '112.50', 24, 1, 0),
(647, 12, 115, 1, '290.00', NULL, '2020-10-21 17:27:45', '2020-10-21 17:27:45', '145.00', 18, 1, 0),
(648, 10, 116, 1, '260.00', NULL, '2020-10-21 17:29:53', '2020-10-21 17:29:53', '130.00', 24, 1, 0),
(649, 6, 117, 1, '99.00', NULL, '2020-10-26 12:44:29', '2021-01-11 23:09:32', '84.15', 22, 2, 0),
(650, 2, 118, 1, '94.00', NULL, '2020-10-26 12:49:31', '2021-01-11 23:06:47', '79.90', 18, 2, 0),
(651, 2, 119, 1, '79.00', NULL, '2020-10-26 12:54:42', '2021-01-11 22:29:27', '67.15', 18, 2, 0),
(652, 2, 119, 1, '79.00', NULL, '2020-10-26 12:55:03', '2021-01-11 22:29:35', '67.15', 8, 2, 0),
(653, 6, 120, 1, '88.00', NULL, '2020-10-26 12:59:29', '2021-01-11 22:25:40', '74.80', 17, 1, 0),
(654, 6, 120, 1, '88.00', NULL, '2020-10-26 12:59:51', '2021-01-11 22:25:46', '74.80', 25, 1, 0),
(655, 1, 121, 1, '260.00', NULL, '2020-10-26 13:06:21', '2021-01-11 22:19:21', '221.00', 8, 2, 0),
(656, 1, 121, 1, '260.00', NULL, '2020-10-26 13:06:47', '2021-01-11 22:19:34', '221.00', 18, 2, 0),
(657, 8, 122, 1, '260.00', NULL, '2020-10-26 13:07:50', '2021-01-11 21:17:17', '221.00', 18, 0, 0),
(658, 8, 122, 1, '260.00', NULL, '2020-10-26 13:08:07', '2021-01-11 21:17:27', '221.00', 8, 0, 0),
(659, 2, 121, 1, '260.00', NULL, '2020-10-26 13:09:21', '2021-01-11 22:19:54', '221.00', 8, 2, 0),
(660, 2, 121, 1, '260.00', NULL, '2020-10-26 13:09:38', '2021-01-11 22:20:01', '221.00', 18, 2, 0),
(661, 6, 121, 1, '260.00', NULL, '2020-10-26 13:09:54', '2021-01-11 22:20:20', '221.00', 8, 0, 0),
(662, 6, 121, 1, '260.00', NULL, '2020-10-26 13:10:11', '2021-01-11 22:20:30', '221.00', 18, 0, 0),
(663, 7, 121, 1, '260.00', NULL, '2020-10-26 13:10:27', '2021-01-11 22:20:39', '221.00', 8, 2, 0),
(664, 7, 121, 1, '260.00', NULL, '2020-10-26 13:10:43', '2021-01-11 22:20:49', '221.00', 18, 2, 0),
(665, 9, 122, 1, '260.00', NULL, '2020-10-26 13:11:50', '2021-01-11 21:17:58', '221.00', 18, 2, 0),
(666, 9, 122, 1, '260.00', NULL, '2020-10-26 13:12:18', '2021-01-11 21:18:06', '221.00', 8, 2, 0),
(667, 10, 122, 1, '260.00', NULL, '2020-10-26 13:12:48', '2021-01-11 21:18:21', '221.00', 18, 0, 0),
(668, 10, 122, 1, '260.00', NULL, '2020-10-26 13:13:10', '2021-01-11 21:18:32', '221.00', 8, 0, 0),
(669, 11, 122, 1, '260.00', NULL, '2020-10-26 13:13:33', '2021-01-11 21:18:52', '221.00', 18, 2, 0),
(670, 11, 122, 1, '260.00', NULL, '2020-10-26 13:13:49', '2021-01-11 21:19:02', '221.00', 8, 2, 0),
(671, 12, 122, 1, '260.00', NULL, '2020-10-26 13:14:09', '2021-01-11 21:19:11', '221.00', 18, 2, 0),
(672, 12, 122, 1, '260.00', NULL, '2020-10-26 13:14:28', '2021-01-11 21:19:18', '221.00', 8, 2, 0),
(673, 7, 117, 1, '99.00', NULL, '2020-10-26 13:15:21', '2021-01-11 23:09:44', '84.15', 22, 2, 0),
(674, 8, 117, 1, '99.00', NULL, '2020-10-26 13:15:38', '2021-01-11 23:09:51', '84.15', 22, 2, 0),
(675, 9, 117, 1, '99.00', NULL, '2020-10-26 13:15:57', '2021-01-11 23:10:06', '84.15', 22, 2, 0),
(676, 10, 117, 1, '99.00', NULL, '2020-10-26 13:16:15', '2021-01-11 23:10:16', '84.15', 22, 0, 0),
(677, 11, 117, 1, '99.00', NULL, '2020-10-26 13:16:33', '2021-01-11 23:10:33', '84.15', 22, 1, 0),
(678, 12, 117, 1, '99.00', NULL, '2020-10-26 13:16:57', '2021-01-11 23:10:44', '84.15', 22, 0, 0),
(679, 3, 118, 1, '94.00', NULL, '2020-10-26 13:17:54', '2021-01-11 23:07:03', '79.90', 18, 2, 0),
(680, 6, 118, 1, '94.00', NULL, '2020-10-26 13:20:35', '2021-01-11 23:07:11', '79.90', 18, 2, 0),
(681, 7, 118, 1, '94.00', NULL, '2020-10-26 13:20:51', '2021-01-11 23:07:27', '79.90', 18, 0, 0),
(682, 8, 118, 1, '94.00', NULL, '2020-10-26 13:21:05', '2021-01-11 23:07:35', '79.90', 18, 0, 0),
(683, 9, 118, 1, '94.00', NULL, '2020-10-26 13:21:22', '2021-01-11 23:07:50', '79.90', 18, 0, 0),
(684, 10, 118, 1, '94.00', NULL, '2020-10-26 13:21:46', '2021-01-11 23:07:56', '79.90', 18, 2, 0),
(685, 11, 118, 1, '94.00', NULL, '2020-10-26 13:22:04', '2021-01-11 23:08:07', '79.90', 18, 2, 0),
(686, 12, 118, 1, '94.00', NULL, '2020-10-26 13:22:39', '2021-01-11 23:08:18', '79.90', 18, 0, 0),
(687, 7, 120, 1, '88.00', NULL, '2020-10-26 13:25:59', '2021-01-11 22:24:10', '74.80', 17, 2, 0),
(688, 7, 120, 1, '88.00', NULL, '2020-10-26 13:26:19', '2021-01-11 22:24:18', '74.80', 25, 2, 0),
(689, 8, 120, 1, '88.00', NULL, '2020-10-26 13:26:32', '2021-01-11 22:27:51', '74.80', 17, 0, 0),
(690, 8, 120, 1, '88.00', NULL, '2020-10-26 13:26:48', '2021-01-11 22:28:04', '74.80', 18, 0, 0),
(691, 9, 120, 1, '88.00', NULL, '2020-10-26 13:28:29', '2021-01-11 22:25:14', '74.80', 17, 2, 0),
(692, 9, 120, 1, '88.00', NULL, '2020-10-26 13:29:01', '2021-01-11 22:25:21', '74.80', 18, 2, 0),
(693, 10, 120, 1, '88.00', NULL, '2020-10-26 13:29:38', '2021-01-11 22:26:21', '74.80', 17, 2, 0),
(694, 11, 120, 1, '88.00', NULL, '2020-10-26 13:29:58', '2021-01-11 22:26:37', '74.80', 17, 2, 0),
(695, 11, 120, 1, '88.00', NULL, '2020-10-26 13:30:17', '2021-01-11 22:26:49', '74.80', 18, 2, 0),
(696, 12, 120, 1, '88.00', NULL, '2020-10-26 13:30:39', '2021-01-11 22:27:00', '74.80', 17, 2, 0),
(697, 12, 120, 1, '88.00', NULL, '2020-10-26 13:31:03', '2021-01-11 22:27:12', '74.80', 18, 2, 0),
(698, 3, 119, 1, '79.00', NULL, '2020-10-26 13:31:37', '2021-01-11 22:29:56', '67.15', 18, 2, 0),
(699, 3, 119, 1, '79.00', NULL, '2020-10-26 13:31:56', '2021-01-11 22:30:04', '67.15', 8, 2, 0),
(700, 6, 119, 1, '79.00', NULL, '2020-10-26 13:32:13', '2021-01-11 22:30:32', '67.15', 18, 2, 0),
(701, 6, 119, 1, '79.00', NULL, '2020-10-26 13:32:37', '2021-01-11 22:30:41', '67.15', 8, 2, 0),
(702, 7, 119, 1, '79.00', NULL, '2020-10-26 13:33:00', '2021-01-11 22:30:51', '67.15', 18, 2, 0),
(703, 7, 119, 1, '79.00', NULL, '2020-10-26 13:33:19', '2021-01-11 22:31:10', '67.15', 8, 2, 0),
(704, 8, 119, 1, '79.00', NULL, '2020-10-26 13:33:36', '2021-01-11 22:31:20', '67.15', 18, 2, 0),
(705, 8, 119, 1, '79.00', NULL, '2020-10-26 13:33:53', '2021-01-11 22:31:30', '67.15', 8, 2, 0),
(706, 9, 119, 1, '79.00', NULL, '2020-10-26 13:34:27', '2021-01-11 22:31:49', '67.15', 18, 0, 0),
(707, 9, 119, 1, '79.00', NULL, '2020-10-26 13:34:42', '2021-01-11 22:31:58', '67.15', 8, 0, 0),
(708, 10, 119, 1, '79.00', NULL, '2020-10-26 13:35:21', '2021-01-11 22:32:07', '67.15', 18, 0, 0),
(709, 10, 119, 1, '79.00', NULL, '2020-10-26 13:35:42', '2021-01-11 22:32:16', '67.15', 8, 0, 0),
(710, 11, 119, 1, '79.00', NULL, '2020-10-26 13:36:00', '2021-01-11 22:32:32', '67.15', 18, 1, 0),
(711, 11, 119, 1, '79.00', NULL, '2020-10-26 13:36:22', '2021-01-11 22:32:41', '67.15', 8, 1, 0),
(712, 12, 119, 1, '79.00', NULL, '2020-10-26 13:36:39', '2021-01-11 22:32:50', '67.15', 18, 0, 0),
(713, 12, 119, 1, '79.00', NULL, '2020-10-26 13:37:01', '2021-01-11 22:33:00', '67.15', 8, 0, 0),
(714, 6, 123, 1, '139.00', NULL, '2020-10-26 13:46:16', '2021-01-11 22:12:39', '118.15', 8, 1, 0),
(715, 2, 124, 1, '260.00', NULL, '2020-10-26 13:47:57', '2021-01-11 22:08:15', '221.00', 7, 1, 0),
(716, 1, 125, 1, '159.00', NULL, '2020-10-26 13:49:44', '2021-01-11 22:03:32', '135.15', 8, 0, 0),
(717, 6, 127, 1, '112.00', NULL, '2020-10-26 13:50:56', '2021-01-11 22:00:52', '95.20', 8, 1, 0),
(718, 6, 128, 1, '166.00', NULL, '2020-10-26 13:54:15', '2021-01-11 21:58:00', '141.10', 7, 0, 0),
(719, 1, 131, 1, '175.00', NULL, '2020-10-26 13:56:19', '2021-01-11 21:50:58', '148.75', 15, 0, 0),
(720, 7, 123, 1, '139.00', NULL, '2020-10-26 14:56:33', '2021-01-11 22:12:53', '118.15', 8, 2, 0),
(721, 8, 123, 1, '139.00', NULL, '2020-10-26 14:56:46', '2021-01-11 22:13:00', '118.15', 8, 2, 0),
(722, 9, 123, 1, '139.00', NULL, '2020-10-26 14:56:59', '2021-01-11 22:17:18', '118.15', 8, 0, 0),
(723, 10, 123, 1, '139.00', NULL, '2020-10-26 14:57:14', '2021-01-11 22:17:31', '118.15', 8, 0, 0),
(724, 11, 123, 1, '139.00', NULL, '2020-10-26 14:57:28', '2021-01-11 22:17:51', '118.15', 8, 1, 0),
(725, 12, 123, 1, '139.00', NULL, '2020-10-26 14:57:41', '2021-01-11 22:17:59', '118.15', 8, 0, 0),
(726, 6, 124, 1, '260.00', NULL, '2020-10-26 14:58:35', '2021-01-11 22:08:34', '221.00', 7, 2, 0),
(727, 7, 124, 1, '260.00', NULL, '2020-10-26 14:58:48', '2021-01-11 22:08:47', '221.00', 7, 2, 0),
(728, 8, 124, 1, '260.00', NULL, '2020-10-26 14:59:02', '2021-01-11 22:09:51', '221.00', 7, 0, 0),
(729, 9, 124, 1, '260.00', NULL, '2020-10-26 14:59:19', '2021-01-11 22:10:01', '221.00', 7, 0, 0),
(730, 10, 124, 1, '260.00', NULL, '2020-10-26 14:59:33', '2021-01-11 22:10:24', '221.00', 7, 0, 0),
(731, 11, 124, 1, '260.00', NULL, '2020-10-26 14:59:47', '2021-01-11 22:10:33', '221.00', 7, 0, 0),
(732, 12, 124, 1, '260.00', NULL, '2020-10-26 15:00:00', '2021-01-11 22:10:42', '221.00', 7, 0, 0),
(733, 2, 125, 1, '159.00', NULL, '2020-10-26 15:09:12', '2021-01-11 22:03:41', '135.15', 8, 0, 0),
(734, 3, 125, 1, '159.00', NULL, '2020-10-26 15:09:39', '2021-01-11 22:03:49', '135.15', 8, 0, 0),
(735, 6, 125, 1, '159.00', NULL, '2020-10-26 15:09:55', '2021-01-11 22:04:13', '135.15', 8, 2, 0),
(736, 7, 125, 1, '159.00', NULL, '2020-10-26 15:10:09', '2021-01-11 22:04:23', '135.15', 8, 0, 0),
(737, 8, 125, 1, '159.00', NULL, '2020-10-26 15:10:23', '2021-01-11 22:04:36', '135.15', 8, 0, 0),
(738, 9, 125, 1, '159.00', NULL, '2020-10-26 15:10:43', '2021-01-11 22:04:57', '135.15', 8, 2, 0),
(739, 10, 125, 1, '159.00', NULL, '2020-10-26 15:11:06', '2021-01-11 22:05:10', '135.15', 8, 0, 0),
(740, 11, 125, 1, '159.00', NULL, '2020-10-26 15:11:24', '2021-01-11 22:05:37', '135.15', 8, 2, 0),
(741, 12, 125, 1, '159.00', NULL, '2020-10-26 15:11:42', '2021-01-11 22:05:29', '135.15', 8, 0, 0),
(742, 7, 127, 1, '112.00', NULL, '2020-10-26 15:17:16', '2021-01-11 22:01:05', '95.20', 8, 2, 0),
(743, 8, 127, 1, '112.00', NULL, '2020-10-26 15:17:36', '2021-01-11 22:01:12', '95.20', 8, 2, 0),
(744, 9, 127, 1, '112.00', NULL, '2020-10-26 15:17:49', '2021-01-11 22:01:33', '95.20', 8, 1, 0),
(745, 10, 127, 1, '112.00', NULL, '2020-10-26 15:18:01', '2021-01-11 22:01:43', '95.20', 8, 1, 0),
(746, 11, 127, 1, '112.00', NULL, '2020-10-26 15:18:15', '2021-01-11 22:02:02', '95.20', 8, 2, 0),
(747, 12, 127, 1, '112.00', NULL, '2020-10-26 15:18:29', '2021-01-11 22:02:11', '95.20', 8, 0, 0),
(748, 7, 128, 1, '166.00', NULL, '2020-10-26 15:19:20', '2021-01-11 21:58:09', '141.10', 7, 0, 0),
(749, 8, 128, 1, '166.00', NULL, '2020-10-26 15:19:35', '2021-01-11 21:58:18', '141.10', 7, 0, 0),
(750, 9, 128, 1, '166.00', NULL, '2020-10-26 15:19:46', '2021-01-11 21:58:42', '141.10', 7, 1, 0),
(751, 10, 128, 1, '166.00', NULL, '2020-10-26 15:19:58', '2021-01-11 21:58:56', '141.10', 7, 0, 0),
(752, 11, 128, 1, '166.00', NULL, '2020-10-26 15:20:09', '2021-01-11 21:59:12', '141.10', 7, 0, 0),
(753, 12, 128, 1, '166.00', NULL, '2020-10-26 15:20:21', '2021-01-11 21:59:23', '141.10', 7, 1, 0),
(754, 1, 131, 1, '175.00', NULL, '2020-10-26 15:21:07', '2021-01-11 21:51:17', '148.75', 17, 0, 0),
(755, 2, 131, 1, '175.00', NULL, '2020-10-26 15:21:47', '2021-01-11 21:51:48', '148.75', 15, 0, 0),
(756, 2, 131, 1, '175.00', NULL, '2020-10-26 15:22:04', '2021-01-11 21:52:04', '148.75', 17, 0, 0),
(757, 3, 131, 1, '175.00', NULL, '2020-10-26 15:22:20', '2021-01-11 21:52:14', '148.75', 15, 2, 0),
(758, 3, 131, 1, '175.00', NULL, '2020-10-26 15:22:33', '2021-01-11 21:52:23', '148.75', 17, 2, 0),
(759, 6, 131, 1, '175.00', NULL, '2020-10-26 15:22:44', '2021-01-11 21:52:46', '148.75', 15, 0, 0),
(760, 6, 131, 1, '175.00', NULL, '2020-10-26 15:22:57', '2021-01-11 21:52:59', '148.75', 17, 0, 0),
(761, 7, 131, 1, '175.00', NULL, '2020-10-26 15:23:11', '2021-01-11 21:53:14', '148.75', 15, 0, 0),
(762, 7, 131, 1, '175.00', NULL, '2020-10-26 15:23:24', '2021-01-11 21:53:25', '148.75', 17, 0, 0),
(763, 8, 131, 1, '175.00', NULL, '2020-10-26 15:46:17', '2021-01-11 21:53:43', '148.75', 15, 0, 0),
(764, 8, 131, 1, '175.00', NULL, '2020-10-26 15:46:36', '2021-01-11 21:53:56', '148.75', 17, 0, 0),
(765, 9, 131, 1, '175.00', NULL, '2020-10-26 15:46:55', '2021-01-11 21:54:09', '148.75', 15, 2, 0),
(766, 9, 131, 1, '175.00', NULL, '2020-10-26 15:47:09', '2021-01-11 21:54:19', '148.75', 17, 2, 0),
(767, 10, 131, 1, '175.00', NULL, '2020-10-26 15:47:24', '2021-01-11 21:55:15', '148.75', 15, 0, 0),
(768, 10, 131, 1, '175.00', NULL, '2020-10-26 15:47:47', '2021-01-11 21:55:28', '148.75', 17, 0, 0),
(769, 11, 131, 1, '175.00', NULL, '2020-10-26 15:47:47', '2021-01-11 21:55:43', '148.75', 15, 0, 0),
(770, 11, 131, 1, '175.00', NULL, '2020-10-26 15:48:15', '2021-01-11 21:55:57', '148.75', 17, 0, 0),
(771, 12, 131, 1, '175.00', NULL, '2020-10-26 15:49:14', '2021-01-11 21:56:09', '148.75', 15, 0, 0),
(772, 12, 131, 1, '175.00', NULL, '2020-10-26 15:49:33', '2021-01-11 21:56:19', '148.75', 17, 0, 0),
(773, 4, 132, 1, '306.00', NULL, '2020-10-31 20:59:00', '2020-10-31 21:42:54', '122.40', 7, 1, 0),
(774, 13, 132, 1, '306.00', NULL, '2020-10-31 20:59:18', '2020-10-31 21:43:05', '122.40', 7, 1, 0),
(775, 14, 132, 1, '306.00', NULL, '2020-10-31 20:59:34', '2020-10-31 21:43:17', '122.40', 7, 1, 0),
(776, 15, 132, 1, '306.00', NULL, '2020-10-31 20:59:49', '2020-10-31 21:43:29', '122.40', 7, 1, 0),
(777, 13, 133, 1, '347.00', NULL, '2020-10-31 21:05:55', '2020-10-31 21:44:14', '138.80', 24, 1, 0),
(778, 14, 133, 1, '347.00', NULL, '2020-10-31 21:06:17', '2020-10-31 21:44:25', '138.80', 24, 1, 0),
(779, 15, 133, 1, '347.00', NULL, '2020-10-31 21:06:35', '2020-10-31 21:44:35', '138.80', 24, 1, 0),
(780, 13, 135, 1, '250.00', NULL, '2020-10-31 21:13:44', '2020-10-31 21:40:31', '100.00', 20, 1, 0),
(781, 14, 135, 1, '250.00', NULL, '2020-10-31 21:14:03', '2020-10-31 21:40:42', '100.00', 20, 1, 0),
(782, 15, 135, 1, '250.00', NULL, '2020-10-31 21:14:29', '2020-10-31 21:40:53', '100.00', 20, 1, 0),
(783, 14, 134, 1, '280.00', NULL, '2020-10-31 21:16:50', '2020-10-31 21:41:45', '112.00', 13, 1, 0),
(784, 4, 136, 1, '321.00', NULL, '2020-10-31 21:24:52', '2020-10-31 21:38:56', '128.40', 13, 1, 0),
(785, 13, 136, 1, '321.00', NULL, '2020-10-31 21:25:11', '2020-10-31 21:39:09', '128.40', 13, 1, 0),
(786, 14, 136, 1, '321.00', NULL, '2020-10-31 21:25:40', '2020-10-31 21:39:21', '128.40', 13, 1, 0),
(787, 15, 136, 1, '321.00', NULL, '2020-10-31 21:26:03', '2020-10-31 21:39:31', '128.40', 13, 1, 0),
(788, 4, 137, 1, '318.00', NULL, '2020-10-31 21:33:59', '2020-10-31 21:33:59', '127.20', 20, 1, 0),
(789, 13, 137, 1, '318.00', NULL, '2020-10-31 21:34:16', '2020-10-31 21:34:16', '127.20', 20, 1, 0),
(790, 14, 137, 1, '318.00', NULL, '2020-10-31 21:34:33', '2020-10-31 21:34:33', '127.20', 20, 1, 0),
(791, 15, 137, 1, '318.00', NULL, '2020-10-31 21:34:50', '2020-10-31 21:34:50', '127.20', 20, 1, 0),
(792, 4, 138, 1, '335.00', NULL, '2020-10-31 21:36:27', '2020-10-31 21:36:27', '134.00', 18, 1, 0),
(793, 13, 138, 1, '335.00', NULL, '2020-10-31 21:36:44', '2020-10-31 21:36:44', '134.00', 18, 1, 0),
(794, 14, 138, 1, '335.00', NULL, '2020-10-31 21:37:00', '2020-10-31 21:37:00', '134.00', 18, 1, 0),
(795, 15, 138, 1, '335.00', NULL, '2020-10-31 21:37:17', '2020-10-31 21:37:17', '134.00', 18, 1, 0),
(796, 6, 139, 1, '149.00', NULL, '2020-11-04 14:10:48', '2021-01-11 16:52:06', '126.65', 7, 1, 0),
(797, 7, 139, 1, '149.00', NULL, '2020-11-04 14:11:07', '2021-01-11 16:52:17', '126.65', 7, 2, 0),
(798, 8, 139, 1, '149.00', NULL, '2020-11-04 14:11:21', '2021-01-11 16:52:38', '126.65', 7, 0, 0),
(799, 9, 139, 1, '149.00', NULL, '2020-11-04 14:11:36', '2021-01-11 16:52:50', '126.65', 7, 0, 0),
(800, 10, 139, 1, '149.00', NULL, '2020-11-04 14:11:54', '2021-01-11 16:53:19', '126.65', 7, 0, 0),
(801, 11, 139, 1, '149.00', NULL, '2020-11-04 14:12:15', '2021-01-11 16:53:30', '126.65', 7, 0, 0),
(802, 12, 139, 1, '149.00', NULL, '2020-11-04 14:13:16', '2021-01-11 16:53:47', '126.65', 7, 0, 0),
(803, 2, 142, 1, '299.00', NULL, '2020-11-12 23:03:10', '2021-01-11 16:43:28', '254.15', 15, 0, 0),
(804, 6, 142, 1, '299.00', NULL, '2020-11-12 23:03:29', '2021-01-11 16:44:00', '254.15', 15, 2, 0),
(805, 7, 142, 1, '299.00', NULL, '2020-11-12 23:03:41', '2021-01-11 16:43:52', '254.15', 15, 1, 0),
(806, 8, 142, 1, '299.00', NULL, '2020-11-12 23:03:56', '2021-01-11 16:44:19', '254.15', 15, 2, 0),
(807, 9, 142, 1, '299.00', NULL, '2020-11-12 23:04:08', '2021-01-11 16:44:29', '254.15', 15, 2, 0),
(808, 10, 142, 1, '299.00', NULL, '2020-11-12 23:04:20', '2021-01-11 16:44:55', '254.15', 15, 2, 0),
(809, 11, 142, 1, '299.00', NULL, '2020-11-12 23:04:37', '2021-01-11 16:45:02', '254.15', 15, 2, 0),
(810, 12, 142, 1, '299.00', NULL, '2020-11-12 23:04:55', '2021-01-11 16:45:10', '254.15', 15, 2, 0),
(811, 6, 140, 1, '239.00', NULL, '2020-11-12 23:05:52', '2021-01-11 16:50:10', '203.15', 15, 0, 0),
(812, 7, 140, 1, '239.00', NULL, '2020-11-12 23:06:23', '2021-01-11 16:50:19', '203.15', 15, 0, 0),
(813, 8, 140, 1, '239.00', NULL, '2020-11-12 23:07:39', '2021-01-11 16:50:28', '203.15', 15, 0, 0),
(814, 9, 140, 1, '239.00', NULL, '2020-11-12 23:07:58', '2021-01-11 16:50:41', '203.15', 15, 0, 0),
(815, 10, 140, 1, '239.00', NULL, '2020-11-12 23:08:11', '2021-01-11 16:49:40', '203.15', 15, 1, 0),
(816, 11, 140, 1, '239.00', NULL, '2020-11-12 23:08:31', '2021-01-11 16:50:51', '203.15', 15, 0, 0),
(817, 12, 140, 1, '239.00', NULL, '2020-11-12 23:08:45', '2021-01-11 16:50:00', '203.15', 15, 1, 0),
(818, 2, 144, 1, '220.00', NULL, '2020-11-12 23:22:45', '2021-01-11 16:38:45', '187.00', 18, 2, 0),
(819, 3, 144, 1, '220.00', NULL, '2020-11-12 23:24:09', '2021-01-11 16:39:27', '187.00', 18, 1, 0),
(820, 6, 144, 1, '220.00', NULL, '2020-11-12 23:41:29', '2021-01-11 16:40:46', '187.00', 18, 0, 0),
(821, 2, 145, 1, '125.00', NULL, '2020-11-12 23:41:29', '2021-01-11 16:33:27', '106.25', 17, 2, 0),
(822, 1, 148, 1, '220.00', NULL, '2020-11-13 12:09:57', '2021-01-11 16:23:30', '187.00', 25, 2, 0),
(823, 2, 148, 1, '220.00', NULL, '2020-11-13 12:10:08', '2021-01-11 16:24:02', '187.00', 25, 2, 0),
(824, 3, 148, 1, '220.00', NULL, '2020-11-13 12:10:20', '2021-01-11 16:24:10', '187.00', 25, 2, 0),
(825, 6, 148, 1, '220.00', NULL, '2020-11-13 12:10:33', '2021-01-11 16:24:27', '187.00', 25, 2, 0),
(826, 7, 148, 1, '220.00', NULL, '2020-11-13 12:10:44', '2021-01-11 16:24:34', '187.00', 25, 2, 0),
(827, 8, 148, 1, '220.00', NULL, '2020-11-13 12:10:55', '2021-01-11 16:24:45', '187.00', 25, 2, 0),
(828, 9, 148, 1, '220.00', NULL, '2020-11-13 12:11:08', '2021-01-11 16:25:50', '187.00', 25, 2, 0),
(829, 10, 148, 1, '220.00', NULL, '2020-11-13 12:11:23', '2021-01-11 16:25:27', '187.00', 25, 0, 0),
(830, 11, 148, 1, '220.00', NULL, '2020-11-13 12:11:36', '2021-01-11 16:25:58', '187.00', 25, 2, 0),
(831, 12, 148, 1, '220.00', NULL, '2020-11-13 12:11:48', '2021-01-11 16:25:03', '187.00', 25, 1, 0),
(832, 7, 144, 1, '220.00', NULL, '2020-11-13 12:12:51', '2021-01-11 16:41:15', '187.00', 18, 2, 0),
(833, 8, 144, 1, '220.00', NULL, '2020-11-13 12:13:01', '2021-01-11 16:41:07', '187.00', 18, 1, 0),
(834, 9, 144, 1, '220.00', NULL, '2020-11-13 12:13:12', '2021-01-11 16:41:35', '187.00', 18, 0, 0),
(835, 10, 144, 1, '220.00', NULL, '2020-11-13 12:13:24', '2021-01-11 16:41:45', '187.00', 18, 1, 0),
(836, 11, 144, 1, '220.00', NULL, '2020-11-13 12:13:53', '2021-01-11 16:41:58', '187.00', 18, 1, 0),
(837, 12, 144, 1, '220.00', NULL, '2020-11-13 12:14:06', '2021-01-11 16:42:10', '187.00', 18, 1, 0),
(838, 6, 147, 1, '170.00', NULL, '2020-11-13 12:17:29', '2021-01-11 16:30:38', '144.50', 25, 2, 0),
(839, 7, 147, 1, '170.00', NULL, '2020-11-13 12:17:43', '2021-01-11 16:31:47', '144.50', 25, 2, 0),
(840, 8, 147, 1, '170.00', NULL, '2020-11-13 12:17:55', '2021-01-11 16:31:58', '144.50', 25, 2, 0),
(841, 9, 147, 1, '170.00', NULL, '2020-11-13 12:18:08', '2021-01-11 16:30:59', '144.50', 25, 0, 0),
(842, 10, 147, 1, '170.00', NULL, '2020-11-13 12:18:19', '2021-01-11 16:31:21', '144.50', 25, 1, 0),
(843, 11, 147, 1, '170.00', NULL, '2020-11-13 12:18:32', '2021-01-11 16:32:05', '144.50', 25, 2, 0),
(844, 12, 147, 1, '170.00', NULL, '2020-11-13 12:18:43', '2021-01-11 16:31:40', '144.50', 25, 0, 0),
(845, 4, 146, 1, '153.00', NULL, '2020-11-13 12:20:52', '2021-01-12 00:01:17', '130.05', 25, 1, 0),
(846, 13, 146, 1, '153.00', NULL, '2020-11-13 12:21:12', '2021-01-12 00:01:35', '130.05', 25, 0, 0),
(847, 14, 146, 1, '153.00', NULL, '2020-11-13 12:21:26', '2021-01-12 00:01:47', '130.05', 25, 0, 0),
(848, 14, 146, 1, '153.00', NULL, '2020-11-13 12:21:39', '2021-01-12 00:01:59', '130.05', 25, 1, 0),
(849, 6, 141, 1, '125.00', NULL, '2020-11-13 12:23:13', '2021-01-11 16:46:50', '106.25', 18, 0, 0),
(850, 7, 141, 1, '125.00', NULL, '2020-11-13 12:23:24', '2021-01-11 16:46:59', '106.25', 18, 0, 0),
(851, 8, 141, 1, '125.00', NULL, '2020-11-13 12:23:33', '2021-01-11 16:47:07', '106.25', 18, 0, 0),
(852, 9, 141, 1, '125.00', NULL, '2020-11-13 12:23:47', '2021-01-11 16:46:38', '106.25', 18, 1, 0),
(853, 10, 141, 1, '125.00', NULL, '2020-11-13 12:23:59', '2021-01-11 16:47:18', '106.25', 18, 0, 0),
(854, 11, 141, 1, '125.00', NULL, '2020-11-13 12:24:11', '2021-01-11 16:47:26', '106.25', 18, 0, 0),
(855, 12, 141, 1, '125.00', NULL, '2020-11-13 12:24:23', '2021-01-11 16:47:38', '106.25', 18, 0, 0),
(856, 6, 145, 1, '125.00', NULL, '2020-11-13 12:25:31', '2021-01-11 16:33:55', '106.25', 17, 2, 0),
(857, 7, 145, 1, '125.00', NULL, '2020-11-13 12:25:42', '2021-01-11 16:34:04', '106.25', 17, 2, 0),
(858, 8, 145, 1, '125.00', NULL, '2020-11-13 12:25:54', '2021-01-11 16:34:13', '106.25', 17, 2, 0),
(859, 9, 145, 1, '125.00', NULL, '2020-11-13 12:26:10', '2021-01-11 16:34:28', '106.25', 17, 2, 0),
(860, 10, 145, 1, '125.00', NULL, '2020-11-13 12:26:27', '2021-01-11 16:34:43', '106.25', 17, 1, 0),
(861, 11, 145, 1, '125.00', NULL, '2020-11-13 12:26:39', '2021-01-11 16:34:54', '106.25', 17, 0, 0),
(862, 12, 145, 1, '125.00', NULL, '2020-11-13 12:26:55', '2021-01-11 16:38:45', '106.25', 17, 0, 0),
(863, 6, 150, 1, '120.00', NULL, '2020-11-22 18:31:19', '2021-01-11 16:18:23', '102.00', 8, 2, 0),
(864, 7, 150, 1, '120.00', NULL, '2020-11-22 18:31:36', '2021-01-11 16:18:45', '102.00', 8, 0, 0),
(865, 8, 150, 1, '120.00', NULL, '2020-11-22 18:31:56', '2021-01-11 16:19:02', '102.00', 8, 2, 0),
(866, 9, 150, 1, '120.00', NULL, '2020-11-22 18:32:07', '2021-01-11 16:19:10', '102.00', 8, 0, 0),
(867, 10, 150, 1, '120.00', NULL, '2020-11-22 18:32:23', '2021-01-11 16:19:24', '102.00', 8, 2, 0),
(868, 11, 150, 1, '120.00', NULL, '2020-11-22 18:32:39', '2021-01-11 16:19:33', '102.00', 8, 1, 0),
(869, 12, 150, 1, '120.00', NULL, '2020-11-22 18:32:59', '2021-01-11 16:19:45', '102.00', 8, 2, 0),
(870, 2, 149, 1, '190.00', NULL, '2020-11-22 18:51:37', '2021-01-11 16:21:00', '161.50', 8, 0, 0),
(871, 6, 149, 1, '190.00', NULL, '2020-11-22 18:51:57', '2021-01-11 16:21:07', '161.50', 8, 2, 0),
(872, 7, 149, 1, '190.00', NULL, '2020-11-22 18:54:45', '2021-01-11 16:21:26', '161.50', 8, 1, 0),
(873, 8, 149, 1, '190.00', NULL, '2020-11-22 18:55:05', '2021-01-11 16:21:44', '161.50', 8, 2, 0),
(874, 9, 149, 1, '190.00', NULL, '2020-11-22 18:55:18', '2021-01-11 16:21:54', '161.50', 8, 2, 0),
(875, 10, 149, 1, '190.00', NULL, '2020-11-22 18:59:02', '2021-01-11 16:22:04', '161.50', 8, 0, 0),
(876, 11, 149, 1, '190.00', NULL, '2020-11-22 18:59:24', '2021-01-11 16:22:20', '161.50', 8, 2, 0),
(877, 12, 149, 1, '190.00', NULL, '2020-11-22 18:59:39', '2021-01-11 16:22:27', '161.50', 8, 2, 0),
(878, 4, 151, 1, '158.00', NULL, '2020-11-22 19:02:37', '2021-01-12 00:35:50', '134.30', 18, 2, 0),
(879, 13, 151, 1, '158.00', NULL, '2020-11-22 19:02:55', '2021-01-12 00:36:04', '134.30', 8, 1, 0),
(880, 14, 151, 1, '158.00', NULL, '2020-11-22 19:04:03', '2021-01-12 00:36:19', '134.30', 8, 1, 0),
(881, 15, 151, 1, '158.00', NULL, '2020-11-22 19:04:16', '2021-01-12 00:36:29', '134.30', 8, 1, 0),
(882, 4, 152, 1, '194.00', NULL, '2020-11-22 19:04:42', '2021-01-12 00:34:33', '164.90', 18, 0, 0),
(883, 13, 152, 1, '194.00', NULL, '2020-11-22 19:05:00', '2021-01-12 00:34:19', '164.90', 18, 0, 0),
(884, 14, 152, 1, '194.00', NULL, '2020-11-22 19:05:13', '2021-01-12 00:34:40', '164.90', 18, 0, 0),
(885, 15, 152, 1, '194.00', NULL, '2020-11-22 19:05:30', '2021-01-12 00:34:46', '164.90', 18, 0, 0),
(886, 1, 153, 1, '269.00', NULL, '2020-11-22 19:09:37', '2021-01-11 16:15:44', '222.70', 18, 0, 0),
(887, 2, 153, 1, '269.00', NULL, '2020-11-22 19:10:01', '2021-01-11 16:16:12', '222.70', 18, 1, 0),
(888, 3, 153, 1, '269.00', NULL, '2020-11-22 19:10:17', '2021-01-11 16:16:27', '222.70', 18, 0, 0),
(889, 6, 153, 1, '269.00', NULL, '2020-11-22 19:10:30', '2021-01-11 16:16:38', '222.70', 18, 1, 0),
(890, 7, 153, 1, '269.00', NULL, '2020-11-22 19:10:44', '2021-01-11 16:17:01', '222.70', 18, 0, 0),
(891, 6, 154, 1, '138.00', NULL, '2020-11-22 19:14:26', '2021-01-11 16:13:05', '117.30', 18, 0, 0),
(892, 6, 155, 1, '160.00', NULL, '2020-11-22 19:14:50', '2021-01-12 00:09:39', '136.00', 18, 0, 0),
(893, 7, 154, 1, '138.00', NULL, '2020-11-22 19:17:29', '2021-01-11 16:13:13', '117.30', 18, 0, 0),
(894, 8, 154, 1, '138.00', NULL, '2020-11-22 19:17:45', '2021-01-11 16:13:27', '117.30', 18, 0, 0),
(895, 9, 154, 1, '138.00', NULL, '2020-11-22 19:18:16', '2021-01-11 16:13:38', '117.30', 18, 0, 0),
(896, 10, 154, 1, '138.00', NULL, '2020-11-22 19:18:48', '2021-01-11 14:01:44', '117.30', 18, 2, 0),
(897, 11, 154, 1, '138.00', NULL, '2020-11-22 19:19:08', '2021-01-11 16:13:54', '117.30', 18, 0, 0),
(898, 12, 154, 1, '138.00', NULL, '2020-11-22 19:19:22', '2021-01-11 16:14:01', '117.30', 18, 1, 0),
(899, 7, 155, 1, '160.00', NULL, '2020-11-22 19:19:51', '2021-01-12 00:09:46', '136.00', 18, 0, 0),
(900, 8, 155, 1, '160.00', NULL, '2020-11-22 19:20:09', '2021-01-12 00:09:56', '136.00', 18, 0, 0),
(901, 9, 155, 1, '160.00', NULL, '2020-11-22 19:20:22', '2021-01-12 00:11:31', '136.00', 18, 0, 0),
(902, 10, 155, 1, '160.00', NULL, '2020-11-22 19:20:34', '2021-01-12 00:11:23', '136.00', 18, 1, 0),
(903, 11, 155, 1, '160.00', NULL, '2020-11-22 19:20:55', '2021-01-12 00:11:44', '136.00', 18, 2, 0),
(904, 12, 155, 1, '160.00', NULL, '2020-11-22 19:21:35', '2021-01-12 00:11:52', '136.00', 18, 2, 0),
(905, 4, 156, 1, '154.00', NULL, '2020-11-26 21:10:16', '2021-01-12 00:32:19', '130.90', 18, 2, 0),
(906, 13, 156, 1, '154.00', NULL, '2020-11-26 21:10:33', '2021-01-12 00:32:26', '130.90', 18, 2, 0),
(907, 14, 156, 1, '154.00', NULL, '2020-11-26 21:10:52', '2021-01-12 00:32:33', '130.90', 18, 2, 0),
(908, 15, 156, 1, '154.00', NULL, '2020-11-26 21:11:04', '2021-01-12 00:32:41', '130.90', 18, 2, 0),
(909, 4, 157, 1, '287.00', NULL, '2020-11-26 21:14:15', '2021-01-29 13:51:45', '114.80', 7, 0, 0),
(910, 13, 157, 1, '287.00', NULL, '2020-11-26 21:14:37', '2020-11-26 21:14:37', '114.80', 7, 1, 0),
(911, 14, 157, 1, '287.00', NULL, '2020-11-26 21:14:57', '2020-11-26 21:14:57', '114.80', 7, 1, 0),
(912, 6, 161, 1, '162.00', NULL, '2020-12-07 14:55:27', '2021-03-20 11:24:45', '137.70', 18, 1, 0),
(913, 7, 161, 1, '162.00', NULL, '2020-12-07 14:55:41', '2021-01-11 21:48:14', '137.70', 18, 2, 0),
(914, 8, 161, 1, '162.00', NULL, '2020-12-07 14:55:54', '2021-01-11 21:48:25', '137.70', 18, 2, 0),
(915, 9, 161, 1, '162.00', NULL, '2020-12-07 14:56:08', '2021-01-11 21:48:50', '137.70', 18, 2, 0),
(916, 10, 161, 1, '162.00', NULL, '2020-12-07 14:56:21', '2021-01-11 21:48:43', '137.70', 18, 0, 0),
(917, 11, 161, 1, '162.00', NULL, '2020-12-07 14:56:32', '2021-01-11 21:49:15', '137.70', 18, 2, 0),
(918, 12, 161, 1, '162.00', NULL, '2020-12-07 14:56:47', '2021-01-11 21:49:23', '137.70', 18, 1, 0),
(919, 6, 164, 1, '132.00', NULL, '2020-12-07 15:03:38', '2021-01-13 11:57:06', '112.20', 18, 0, 0),
(920, 7, 164, 1, '132.00', NULL, '2020-12-07 15:03:50', '2021-01-15 17:26:49', '112.20', 18, 0, 0),
(921, 8, 164, 1, '132.00', NULL, '2020-12-07 15:04:30', '2021-01-27 19:08:23', '112.20', 18, 0, 0),
(922, 9, 164, 1, '132.00', NULL, '2020-12-07 15:04:52', '2021-01-29 13:51:45', '112.20', 18, 1, 0),
(923, 10, 164, 1, '132.00', NULL, '2020-12-07 15:05:04', '2021-01-11 21:45:56', '112.20', 18, 0, 0),
(924, 11, 164, 1, '132.00', NULL, '2020-12-07 15:05:16', '2021-01-11 21:46:21', '112.20', 18, 2, 0),
(925, 12, 164, 1, '132.00', NULL, '2020-12-07 15:05:36', '2021-01-11 21:46:30', '112.20', 18, 1, 0),
(926, 1, 162, 1, '252.00', NULL, '2020-12-07 15:08:39', '2021-01-11 21:41:23', '214.20', 18, 2, 0),
(927, 2, 162, 1, '252.00', NULL, '2020-12-07 15:08:53', '2021-01-11 21:41:41', '214.20', 18, 1, 0),
(928, 3, 162, 1, '252.00', NULL, '2020-12-07 15:09:07', '2021-01-11 21:41:51', '214.20', 18, 0, 0),
(929, 6, 162, 1, '252.00', NULL, '2020-12-07 15:09:20', '2021-01-11 21:42:14', '214.20', 18, 2, 0),
(930, 7, 162, 1, '252.00', NULL, '2020-12-07 15:09:33', '2021-01-11 21:42:22', '214.20', 18, 0, 0),
(931, 4, 160, 1, '182.00', NULL, '2020-12-07 15:11:51', '2021-01-12 00:30:47', '154.70', 18, 0, 0),
(932, 13, 160, 1, '182.00', NULL, '2020-12-07 15:12:08', '2021-01-12 00:30:55', '154.70', 18, 0, 0),
(933, 14, 160, 1, '182.00', NULL, '2020-12-07 15:12:20', '2021-01-12 00:31:03', '154.70', 18, 0, 0),
(934, 15, 160, 1, '182.00', NULL, '2020-12-07 15:12:31', '2021-01-12 00:31:18', '154.70', 18, 0, 0),
(935, 6, 159, 1, '116.00', NULL, '2020-12-07 15:14:27', '2021-01-12 00:06:46', '98.60', 8, 2, 0),
(936, 7, 159, 1, '116.00', NULL, '2020-12-07 15:14:41', '2021-01-12 00:06:53', '98.60', 8, 2, 0),
(937, 8, 159, 1, '116.00', NULL, '2020-12-07 15:15:19', '2021-01-12 00:07:00', '98.60', 8, 2, 0),
(938, 9, 159, 1, '116.00', NULL, '2020-12-07 15:15:32', '2021-01-12 00:07:17', '98.60', 8, 2, 0),
(939, 10, 159, 1, '116.00', NULL, '2020-12-07 15:15:50', '2021-01-12 00:07:36', '98.60', 8, 2, 0),
(940, 11, 159, 1, '116.00', NULL, '2020-12-07 15:16:01', '2021-01-12 00:07:52', '98.60', 8, 1, 0),
(941, 12, 159, 1, '116.00', NULL, '2020-12-07 15:16:15', '2021-01-12 00:08:01', '98.60', 8, 0, 0),
(942, 4, 165, 1, '162.00', NULL, '2020-12-10 14:26:24', '2021-01-11 23:59:23', '137.70', 24, 0, 0),
(943, 13, 165, 1, '162.00', NULL, '2020-12-10 14:26:52', '2021-01-11 23:59:42', '137.70', 24, 2, 0),
(944, 14, 165, 1, '162.00', NULL, '2020-12-10 14:27:07', '2021-01-12 00:00:00', '137.70', 24, 0, 0),
(945, 15, 165, 1, '162.00', NULL, '2020-12-10 14:27:19', '2021-01-12 20:20:06', '137.70', 24, 0, 0),
(946, 4, 166, 1, '134.00', NULL, '2020-12-10 14:31:53', '2021-01-11 23:57:34', '113.90', 18, 2, 0),
(947, 13, 166, 1, '134.00', NULL, '2020-12-10 14:32:14', '2021-01-11 23:57:47', '113.90', 18, 2, 0),
(948, 14, 166, 1, '134.00', NULL, '2020-12-10 14:32:27', '2021-01-11 23:57:58', '113.90', 18, 2, 0),
(949, 15, 166, 1, '134.00', NULL, '2020-12-10 14:32:37', '2021-01-11 23:58:11', '113.90', 18, 2, 0),
(950, 4, 167, 1, '130.00', NULL, '2020-12-10 14:36:32', '2021-01-11 23:55:11', '110.50', 18, 0, 0),
(951, 13, 167, 1, '130.00', NULL, '2020-12-10 14:36:46', '2021-01-11 23:55:20', '110.50', 18, 0, 0),
(952, 14, 167, 1, '130.00', NULL, '2020-12-10 14:36:59', '2021-01-11 23:55:32', '110.50', 18, 2, 0),
(953, 15, 167, 1, '130.00', NULL, '2020-12-10 14:37:11', '2021-01-11 23:55:41', '110.50', 18, 2, 0),
(954, 16, 168, 1, '50.00', NULL, '2020-12-10 20:15:20', '2020-12-10 20:45:11', NULL, 32, 1, 0),
(955, 16, 168, 1, '50.00', NULL, '2020-12-10 20:15:42', '2020-12-10 20:45:21', NULL, 30, 1, 0),
(956, 16, 168, 1, '50.00', NULL, '2020-12-10 20:16:06', '2020-12-10 20:45:35', NULL, 29, 1, 0),
(957, 16, 169, 1, '57.00', NULL, '2020-12-10 20:20:57', '2020-12-10 20:46:26', NULL, 29, 1, 0),
(958, 16, 169, 1, '57.00', NULL, '2020-12-10 20:21:36', '2020-12-10 20:46:42', NULL, 28, 1, 0),
(959, 16, 169, 1, '57.00', NULL, '2020-12-10 20:21:59', '2020-12-10 20:46:56', NULL, 30, 1, 0),
(960, 16, 169, 1, '57.00', NULL, '2020-12-10 20:22:15', '2020-12-10 20:47:07', NULL, 32, 1, 0),
(961, 16, 169, 1, '57.00', NULL, '2020-12-10 20:22:36', '2020-12-10 20:47:17', NULL, 33, 1, 0),
(962, 16, 169, 1, '57.00', NULL, '2020-12-10 20:23:00', '2020-12-10 20:47:28', NULL, 31, 1, 0),
(963, 16, 170, 1, '50.00', NULL, '2020-12-10 20:24:15', '2020-12-10 20:48:27', NULL, 30, 1, 0),
(964, 16, 170, 1, '50.00', NULL, '2020-12-10 20:48:41', '2020-12-10 20:48:41', NULL, 28, 1, 0),
(965, 16, 170, 1, '50.00', NULL, '2020-12-10 20:49:00', '2020-12-10 20:49:00', NULL, 29, 1, 0),
(966, 16, 170, 1, '50.00', NULL, '2020-12-10 20:49:13', '2020-12-10 20:49:13', NULL, 32, 1, 0),
(967, 16, 170, 1, '50.00', NULL, '2020-12-10 20:49:28', '2020-12-10 20:49:28', NULL, 33, 1, 0),
(968, 16, 170, 1, '50.00', NULL, '2020-12-10 20:49:44', '2020-12-10 20:49:44', NULL, 31, 1, 0),
(969, 16, 171, 1, '98.00', NULL, '2020-12-14 14:05:55', '2020-12-14 14:05:55', NULL, 32, 1, 0),
(970, 16, 171, 1, '98.00', NULL, '2020-12-14 14:11:28', '2020-12-14 14:11:28', NULL, 29, 1, 0),
(971, 16, 171, 1, '98.00', NULL, '2020-12-14 14:11:59', '2020-12-14 14:11:59', NULL, 30, 1, 0),
(972, 16, 171, 1, '98.00', NULL, '2020-12-14 14:12:17', '2020-12-14 14:12:17', NULL, 28, 1, 0),
(973, 16, 171, 1, '98.00', NULL, '2020-12-14 14:12:35', '2020-12-14 14:12:35', NULL, 31, 1, 0),
(974, 16, 171, 1, '98.00', NULL, '2020-12-14 14:12:51', '2020-12-14 14:12:51', NULL, 33, 1, 0),
(975, 1, 158, 1, '184.00', NULL, '2021-01-12 00:23:04', '2021-01-12 00:26:35', '156.40', 28, 0, 0),
(976, 2, 158, 1, '184.00', NULL, '2021-01-12 00:23:26', '2021-01-12 00:26:41', '156.40', 28, 0, 0),
(977, 3, 158, 1, '184.00', NULL, '2021-01-12 00:23:42', '2021-01-12 00:26:47', '156.40', 28, 1, 0),
(978, 6, 158, 1, '184.00', NULL, '2021-01-12 00:24:03', '2021-01-12 00:26:55', '156.40', 28, 0, 0),
(979, 7, 158, 1, '184.00', NULL, '2021-01-12 00:24:19', '2021-01-12 00:27:03', '156.40', 28, 0, 0),
(980, 8, 158, 1, '184.00', NULL, '2021-01-12 00:24:34', '2021-01-12 00:27:11', '156.40', 28, 0, 0),
(981, 9, 158, 1, '184.00', NULL, '2021-01-12 00:24:59', '2021-01-12 00:27:18', '156.40', 28, 0, 0),
(982, 10, 158, 1, '184.00', NULL, '2021-01-12 00:25:14', '2021-01-12 00:27:26', '156.40', 28, 0, 0),
(983, 11, 158, 1, '184.00', NULL, '2021-01-12 00:25:39', '2021-01-12 00:28:22', '156.40', 28, 1, 0),
(984, 12, 158, 1, '184.00', NULL, '2021-01-12 00:25:59', '2021-01-12 00:29:05', '156.40', 28, 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`, `active`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '0', 0, NULL, '2020-08-24 15:36:31', '2020-08-24 15:36:31', '2020-08-24 15:36:31'),
(2, 2, 'Vestidos', 1, 'moda-para-meninas-vestidos', NULL, '2020-09-09 13:22:23', '2021-01-15 14:23:45'),
(3, 2, 'Blusas', 1, 'blusas', NULL, '2020-09-09 15:04:57', '2020-09-09 15:04:57'),
(4, 4, 'Vestidos', 1, 'moda-para-bebes-vestidos', NULL, '2020-09-10 00:00:07', '2021-01-15 14:24:57'),
(5, 6, 'Casaco', 1, 'casaco', NULL, '2020-09-10 00:11:33', '2020-09-10 00:11:33'),
(6, 6, 'Macacão', 1, 'promocoes-macacao', NULL, '2020-09-10 00:12:29', '2021-01-15 14:25:09'),
(7, 6, 'Vestido', 1, 'vestido', NULL, '2020-09-10 00:12:50', '2020-09-10 00:12:50'),
(8, 6, 'Blusa', 1, 'blusa', NULL, '2020-09-10 00:13:04', '2020-09-10 00:13:04'),
(9, 6, 'Calça', 1, 'calca', NULL, '2020-09-10 13:08:08', '2020-09-10 13:08:08'),
(10, 6, 'Saia', 1, 'saia', NULL, '2020-09-10 13:34:42', '2020-09-10 13:34:42'),
(11, 3, 'Calça', 1, 'calca', NULL, '2020-09-10 14:12:21', '2020-09-10 14:12:21'),
(12, 3, 'Bermuda', 1, 'bermuda', NULL, '2020-09-10 14:12:36', '2020-09-10 14:12:36'),
(13, 3, 'Blusa', 1, 'blusa', '2020-09-10 14:13:23', '2020-09-10 14:12:52', '2020-09-10 14:13:23'),
(14, 3, 'Camisa', 1, 'camisa', NULL, '2020-09-10 14:13:07', '2020-09-10 14:13:07'),
(15, 6, 'Bermuda', 1, 'bermuda', NULL, '2020-09-10 14:18:59', '2020-09-10 14:18:59'),
(16, 6, 'Camisa', 1, 'camisa', NULL, '2020-09-10 14:20:38', '2020-09-10 14:20:38'),
(17, 6, 'Calça', 1, 'calca', NULL, '2020-09-10 14:21:02', '2020-09-10 14:21:02'),
(18, 2, 'Macacão', 1, 'moda-para-meninas-macacao', NULL, '2020-09-10 14:57:25', '2021-01-15 14:25:15'),
(19, 2, 'Saia', 1, 'saia', NULL, '2020-09-10 15:28:25', '2020-09-10 15:28:25'),
(20, 4, 'Macacão', 1, 'moda-para-bebes-macacao', NULL, '2020-09-10 15:31:01', '2021-01-15 14:25:25'),
(21, 2, 'Calça', 1, 'calca', NULL, '2020-09-10 15:42:58', '2020-09-10 15:42:58'),
(22, 2, 'Short', 1, 'short', NULL, '2020-10-05 21:56:55', '2020-10-05 21:56:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path_archive` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `topics`
--

INSERT INTO `topics` (`id`, `title`, `subtitle`, `path_image`, `created_at`, `updated_at`) VALUES
(1, 'Frete Grátis', 'Compras acima de R$ 500,00', 'truck-1-1598298558.png', '2020-08-24 19:49:18', '2020-12-01 13:20:34'),
(2, 'Higiene dos produtos', 'Cuidado dobrado sua saúde', 'hand-sanitizer-1598298585.png', '2020-08-24 19:49:45', '2020-08-24 19:49:45'),
(3, 'Compre no site e', 'retire na loja', 'store-1598298605.png', '2020-08-24 19:50:05', '2020-09-09 13:15:34'),
(4, 'Clube de Desconto', 'faça seu cadastro', 'sale-1598298633.png', '2020-08-24 19:50:33', '2020-09-23 11:38:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `active`, `super_admin`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'developer@hoom.com.br', NULL, '$2y$10$3GStIbWp1qpupIP/KQH/pOFFfndaYNDXzGIhUF/JjCWVomQsM92lK', 0, 1, NULL, NULL, '2020-08-24 15:36:31', '2020-08-24 15:36:31'),
(2, 'Daducha', 'daducha@daducha.com.br', NULL, '$2y$10$wRrOedzieCl9p6W2Pypk6eAWADl83NbbLCegRjWRsD07145kbmEhG', 1, 0, NULL, NULL, '2020-09-08 18:58:27', '2020-09-08 18:58:27'),
(3, 'Taline', 'criacao@daducha.com.br', NULL, '$2y$10$1LrlTzvxu4SlBOjfDGRkI.utaQy7BaMi0me6lg6bR0GH0s0xpO3wO', 1, 0, '2020-09-21 12:53:47', NULL, '2020-09-09 13:47:18', '2020-09-21 12:53:47'),
(4, 'Taline Oliveira dos Santos', 'talinepimenta@live.com', NULL, '$2y$10$kO4q0Hn8rVWwayv6vQSxb.nhF3lHXENowx8ymY.hYo/mdB7o1Mxzu', 1, 0, '2020-10-08 14:52:45', NULL, '2020-09-23 11:43:05', '2020-10-08 14:52:45'),
(5, 'Carla', 'financeiro@daducha.com.br', NULL, '$2y$10$ECCh6te6U7XBJ39vxSHHQ.XRtN85UqA.uGw2iJ.6J9JCY14s8MRf6', 1, 0, NULL, NULL, '2020-10-08 14:15:28', '2020-10-08 14:15:28'),
(6, 'Zaira', 'amelia@daducha.com.br', NULL, '$2y$10$qm5lgmSEiy3kjcc/lvfMruahh/SI93E41k1CI5eaLBR6U8snFQjKa', 1, 0, NULL, NULL, '2020-10-08 14:16:53', '2020-10-08 14:16:53'),
(7, 'Taline', 'contato@daducha.com.br', NULL, '$2y$10$g1t6dRObmANzWRns/.BUzOkm.wz5luH.YkwFwywWCMe2SY0OOZm2y', 1, 0, NULL, NULL, '2020-10-09 12:05:09', '2020-10-09 12:05:09'),
(8, 'V4 Company', 'dhemetryus@v4company.com', NULL, '$2y$10$HC.SkqmT4qUr0Hb0k3bvG.2Zhg6BMS67KPQ.NjexV0DOL7roLYRwS', 1, 0, NULL, NULL, '2020-12-04 12:29:30', '2020-12-04 12:29:30');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adresses_customer_id_foreign` (`customer_id`);

--
-- Índices para tabela `banner_institutionals`
--
ALTER TABLE `banner_institutionals`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Índices para tabela `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `category_blogs`
--
ALTER TABLE `category_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_cpf_unique` (`cpf`);

--
-- Índices para tabela `customer_password_resets`
--
ALTER TABLE `customer_password_resets`
  ADD KEY `customer_password_resets_email_index` (`email`);

--
-- Índices para tabela `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`),
  ADD KEY `favorites_customer_id_foreign` (`customer_id`);

--
-- Índices para tabela `integrations`
--
ALTER TABLE `integrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notification_pushes`
--
ALTER TABLE `notification_pushes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `options_items`
--
ALTER TABLE `options_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_items_item_id_foreign` (`item_id`),
  ADD KEY `options_items_option_id_foreign` (`option_id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_card_id_foreign` (`card_id`);

--
-- Índices para tabela `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Índices para tabela `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Índices para tabela `product_models`
--
ALTER TABLE `product_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_models_product_id_foreign` (`product_id`);

--
-- Índices para tabela `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_category_id_foreign` (`category_id`);

--
-- Índices para tabela `product_option_categories`
--
ALTER TABLE `product_option_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_option_categories_product_id_foreign` (`product_id`);

--
-- Índices para tabela `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`),
  ADD KEY `product_tags_product_id_foreign` (`product_id`);

--
-- Índices para tabela `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_city_id_foreign` (`city_id`);

--
-- Índices para tabela `size_charts`
--
ALTER TABLE `size_charts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slides_product_id_foreign` (`product_id`);

--
-- Índices para tabela `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_productsize_id_foreign` (`productSize_id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`),
  ADD KEY `stocks_productcolor_id_foreign` (`productColor_id`);

--
-- Índices para tabela `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Índices para tabela `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `banner_institutionals`
--
ALTER TABLE `banner_institutionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `category_blogs`
--
ALTER TABLE `category_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `extras`
--
ALTER TABLE `extras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `integrations`
--
ALTER TABLE `integrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de tabela `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `notification_pushes`
--
ALTER TABLE `notification_pushes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `options_items`
--
ALTER TABLE `options_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT de tabela `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;

--
-- AUTO_INCREMENT de tabela `product_models`
--
ALTER TABLE `product_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product_option_categories`
--
ALTER TABLE `product_option_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `size_charts`
--
ALTER TABLE `size_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=985;

--
-- AUTO_INCREMENT de tabela `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_blogs` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `options_items`
--
ALTER TABLE `options_items`
  ADD CONSTRAINT `options_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `order_items` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `options_items_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `product_options` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `adresses` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `orders_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `product_models`
--
ALTER TABLE `product_models`
  ADD CONSTRAINT `product_models_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_option_categories` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `product_option_categories`
--
ALTER TABLE `product_option_categories`
  ADD CONSTRAINT `product_option_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `stocks_productcolor_id_foreign` FOREIGN KEY (`productColor_id`) REFERENCES `product_colors` (`id`),
  ADD CONSTRAINT `stocks_productsize_id_foreign` FOREIGN KEY (`productSize_id`) REFERENCES `product_sizes` (`id`);

--
-- Limitadores para a tabela `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
