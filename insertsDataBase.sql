-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2020 às 19:24
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `localhost_hoomdelivery`
--

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `title`, `featured`, `active`, `path_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(0, '', 0, 0, '', '2022-12-16 04:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(1, 'Pratos da Semana', 1, 1, 'n02-07-02-20-36-1588616005.jpeg', NULL, '2020-05-04 21:13:25', '2020-05-04 21:13:25'),
(2, 'Combos', 1, 1, 'comida02-1588616151.png', NULL, '2020-05-04 21:15:51', '2020-05-04 21:15:51'),
(4, 'Nonni Fit', 1, 1, 'upload-thumb-penne-integral-ao-molho-de-tomate-com-mozarela-07042020070849-1589541457.jpeg', NULL, '2020-05-15 14:17:37', '2020-05-15 14:22:40');

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `city`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Salvador', 1, '2020-05-05 19:42:55', '2020-05-05 19:42:55', NULL),
(2, 'Lauro de Freitas', 1, '2020-05-05 19:42:55', '2020-05-05 19:42:55', NULL),
(3, 'Camaçari', 1, '2020-05-05 19:42:55', '2020-05-05 19:42:55', NULL);

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `email_form`, `instagram`, `whatsapp`, `youtube`, `twitter`, `facebook`, `created_at`, `updated_at`) VALUES
(1, '71987245153', 'frontend@hoom.com.br', 'frontend2@hoom.com.br', 'hoominterativa', '71987245153', 'youtube', 'hoominterativa', 'perfilhoom', '2020-05-05 15:03:57', '2020-05-07 17:44:14');

--
-- Extraindo dados da tabela `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `amount`, `use_limit`, `fixed_value`, `first_order_only`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'keyValorante', '10.00', 3, 0, 0, 1, NULL, '2020-05-07 19:53:23', '2020-05-07 19:53:23'),
(2, 'deliveryaqui', '25.00', 1, 1, 1, 1, NULL, '2020-05-07 19:54:08', '2020-05-07 19:54:08');

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `cpf`, `phone`, `email_verified_at`, `password`, `active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anderson Viana', 'frontend@hoom.com.br', '04506018540', '71987245153', NULL, '$2y$10$dTC48XvcbrCM3tNm5A7uM.zvUgK5KKmkzOo6INbaiElKMHmrzWWrC', 1, NULL, NULL, '2020-05-07 20:26:27', '2020-05-20 16:43:01');

--
-- Extraindo dados da tabela `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `flag`, `active`, `path_image`, `created_at`, `updated_at`) VALUES
(2, 'VIsa', 1, 'cat-9-1590607019.jpeg', '2020-05-27 22:16:59', '2020-05-27 22:16:59');


--
-- Extraindo dados da tabela `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`, `active`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(0, 0, '', 1, '', '2020-05-04 18:24:54', NULL, NULL),
(1, 1, 'Risotos de Milão', 1, 'risotos-de-milao', NULL, '2020-05-04 21:21:50', '2020-05-04 21:21:50'),
(2, 1, 'Bruschetta', 1, 'bruschetta', NULL, '2020-05-04 21:22:08', '2020-05-04 21:22:08'),
(3, 2, 'Alcachofras Romanas', 1, 'alcachofras-romanas', NULL, '2020-05-04 21:22:44', '2020-05-04 21:22:44'),
(4, 2, 'Tortellini de Bolonha', 1, 'tortellini-de-bolonha', NULL, '2020-05-04 21:24:03', '2020-05-04 21:24:03'),
(5, 2, 'Polenta', 1, 'polenta', NULL, '2020-05-04 21:24:17', '2020-05-04 21:24:17'),
(7, 1, 'Massas', 1, 'massas', NULL, '2020-05-15 17:06:32', '2020-05-15 17:06:32');

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `title`, `description`, `amount`, `promotinal_value`, `promotion`, `active`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(0, 0, 0, '', NULL, '0.00', NULL, 0, 0, '', '2020-05-04 18:26:34', NULL, NULL),
(2, 1, 0, 'Monte sua Massa', '<p>Escolha o tipo de massa e o molho da sua preferência. Adicione também uma de nossas proteínas com valor adicional.<br></p>', '80.00', NULL, 0, 1, 'monte-sua-massa', NULL, '2020-05-06 16:27:52', '2020-05-06 16:29:31'),
(3, 1, 0, 'Produto 2', '<p>Teste</p>', '20.00', NULL, 0, 1, 'produto-2', NULL, '2020-05-06 17:07:49', '2020-05-06 17:07:49'),
(4, 1, 0, 'Produto 3', '<p>Teste 2</p>', '800.00', NULL, 0, 1, 'produto-3', NULL, '2020-05-06 17:08:37', '2020-05-06 17:08:37'),
(5, 2, 4, 'Produto 4', '<p>sdf sdfsdfsd fsd fsd fsdfsdsd s s sf sdf&nbsp; sdfdf fsdf sdsd fsd f</p>', '30.00', '27.00', 1, 1, 'produto-4', NULL, '2020-05-06 17:11:00', '2020-05-07 00:14:35'),
(6, 1, 1, 'Pensamento do DIa', '<p>sdfcascxzcasdfafadf</p>', '500.00', NULL, 0, 0, 'pensamento-do-dia', NULL, '2020-05-12 22:34:57', '2020-05-12 22:34:57'),
(7, 4, 0, 'Espaguete de Legumes - Monte seu Espaguete', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Google Sans&quot;, sans-serif; font-size: 14px;\">Monte seu espaguete de abobrinha e cenoura. É obrigatória a escolha do molho e a edição de proteína é opcional.</span><br></p>', '4.00', NULL, 0, 1, 'espaguete-de-legumes-monte-seu-espaguete', NULL, '2020-05-15 14:21:38', '2020-05-15 14:21:38');

--
-- Extraindo dados da tabela `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `path_image`, `product_cover`, `created_at`, `updated_at`) VALUES
(1, 2, 'upload-monte-sua-massa-1588771771.png', 1, '2020-05-06 16:29:31', '2020-05-06 16:29:31'),
(2, 3, 'comida01-1588774069.png', 1, '2020-05-06 17:07:49', '2020-05-06 17:07:49'),
(3, 4, 'comida02-1588774117.png', 1, '2020-05-06 17:08:37', '2020-05-06 17:08:37'),
(4, 5, 'baixados-1588774260.jpeg', 0, '2020-05-06 17:11:00', '2020-05-07 00:13:43'),
(5, 5, 'comida01-1588776028.png', 0, '2020-05-06 17:40:28', '2020-05-07 00:13:43'),
(6, 5, 'comida03-1588776028.png', 1, '2020-05-06 17:40:28', '2020-05-07 00:13:43'),
(7, 6, 'b6d767d2f8ed5d21a44b0e5886680cb9-1589312097.png', 1, '2020-05-12 22:34:57', '2020-05-12 22:34:57'),
(8, 7, 'upload-thumb-espaguete-de-legumes-monte-seu-espaguete-07042020070811-1589541698.jpeg', 1, '2020-05-15 14:21:38', '2020-05-15 14:21:38');

--
-- Extraindo dados da tabela `regions`
--

INSERT INTO `regions` (`id`, `city_id`, `region`, `amount`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'Jauá', '15.00', 1, NULL, '2020-05-05 19:44:30', '2020-05-05 19:44:30'),
(2, 3, 'Vilas de Abrantes', '10.00', 1, NULL, '2020-05-05 19:44:30', '2020-05-05 19:44:30'),
(3, 2, 'Centro', '8.00', 1, NULL, '2020-05-05 19:44:30', '2020-05-05 19:44:30'),
(4, 2, 'Vila Mar', '10.00', 1, NULL, '2020-05-05 19:44:30', '2020-05-05 19:44:30'),
(5, 1, 'Pituba', '18.00', 1, NULL, '2020-05-05 19:44:30', '2020-05-05 19:44:30'),
(6, 1, 'Pau da Lima', '20.00', 1, NULL, '2020-05-05 19:44:30', '2020-05-05 19:44:30'),
(7, 1, 'Baixa de Quinta', '90.00', 1, NULL, '2020-05-05 19:44:30', '2020-05-05 19:44:30');



--
-- Extraindo dados da tabela `adresses`
--

INSERT INTO `adresses` (`id`, `region_id`, `customer_id`, `public_place`, `zip_code`, `complement`, `reference`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Primeira travessa São Jorge, 23', '42.703-590', '2º Andar', 'Fundo da Base Aérea de Salvador', NULL, '2020-05-07 20:27:09', '2020-05-20 17:42:37'),
(2, 3, 1, 'Rua da Valeta, 50', '42703590', '2º Andar', 'Fundo do Hotel Ônix', NULL, '2020-05-20 17:25:19', '2020-05-20 17:25:19');



--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `address_id`, `status`, `amount`, `coupon`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '150.00', 'oxedemnas', 2, '2020-05-18 18:38:08', NULL),
(2, 1, 1, 1, '250.00', 'hoominterativa', 2, '2020-05-18 16:38:17', NULL);

--
-- Extraindo dados da tabela `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `amount`, `quantity`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '50.00', 1, 'Não quero massa', NULL, NULL, NULL),
(2, 3, 1, '15.00', 1, 'Essa observação é de teste', NULL, NULL, NULL),
(3, 4, 2, '80.00', 2, 'Opa, não gosto de cebola então coloca muita', NULL, NULL, NULL),
(4, 5, 2, '120.00', 5, 'Pega esse pedido e da para o motoboy', NULL, NULL, NULL);


--
-- Extraindo dados da tabela `slides`
--

INSERT INTO `slides` (`id`, `product_id`, `title`, `subtitle`, `description`, `path_image`, `path_image_mobile`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nonni La Pasta Espressa', 'O Melhor Delivery Italiano da Cidade', 'Ganhe 10% no primeiro pedido', 'grupo-2508-1588620756.jpeg', 'grupo-2509-1588621993.jpeg', '2020-05-04 22:32:36', '2020-05-07 22:14:31');



--
-- Extraindo dados da tabela `topics`
--

INSERT INTO `topics` (`id`, `title`, `subtitle`, `path_image`, `created_at`, `updated_at`) VALUES
(2, 'Taxa de Entrega', 'a partir de R$ 5,00', 'moto-1588623963.png', '2020-05-04 23:26:03', '2020-05-04 23:26:03'),
(3, 'Funcionamento', 'Fechado ! Abre as 11h15', 'clock-1588707438.png', '2020-05-05 22:37:18', '2020-05-05 22:37:18'),
(4, 'Espera', '30 a 80 min', 'hourglass-1588707474.png', '2020-05-05 22:37:54', '2020-05-05 22:37:54');

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `active`, `super_admin`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Anderson', 'frontend@hoom.com.br', NULL, '$2y$10$4aXo/3XkprLpslmvAbopgOyvjzFqFh.uFPXSHP9HattJMHCDktOuK', 0, 0, NULL, NULL, '2020-05-04 18:04:01', '2020-05-04 18:04:01');
COMMIT;
