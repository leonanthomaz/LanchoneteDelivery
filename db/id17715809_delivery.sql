-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Out-2021 às 05:19
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste-loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_produto` int NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` int NOT NULL,
  `preco` float NOT NULL,
  `total` float NOT NULL,
  `dt_pedido` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `id_produto`, `usuario`, `nome`, `quantidade`, `preco`, `total`, `dt_pedido`) VALUES
(102, 10, 9, 'Leonan', 'Yakisoba', 1, 30, 30, '2021-10-05 23:42:42'),
(101, 10, 9, 'Leonan', 'Yakisoba', 1, 30, 30, '2021-10-05 23:41:34'),
(100, 10, 13, 'Leonan', 'Bolo de Chocolate', 2, 50, 110, '2021-10-05 23:40:49'),
(99, 10, 10, 'Leonan', 'Coxinha', 1, 10, 110, '2021-10-05 23:40:49'),
(98, 10, 13, 'Leonan', 'Bolo de Chocolate', 2, 50, 110, '2021-10-05 23:39:58'),
(96, 10, 13, 'Leonan', 'Bolo de Chocolate', 2, 50, 110, '2021-10-05 23:37:41'),
(97, 10, 10, 'Leonan', 'Coxinha', 1, 10, 110, '2021-10-05 23:39:58'),
(95, 10, 10, 'Leonan', 'Coxinha', 1, 10, 110, '2021-10-05 23:37:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `imagem`) VALUES
(13, 'Bolo de Chocolate', 50, 'Delicioso bolo de chocolate com avelã e morango.', 'https://cdn.pixabay.com/photo/2016/11/22/18/52/cake-1850011_960_720.jpg'),
(14, 'Coca-Cola', 7, 'Coca-Cola Lata.', 'https://cdn.pixabay.com/photo/2021/03/12/17/54/coca-cola-6090176_960_720.jpg'),
(11, 'Cupcake', 5, 'Feito com chocolate e baunilha.', 'https://cdn.pixabay.com/photo/2015/03/26/09/39/cupcakes-690040_960_720.jpg'),
(9, 'Yakisoba', 30, 'Yakisoba de carne, molho shoyo e legumes.', 'https://cdn.pixabay.com/photo/2017/07/04/10/51/yakisoba-2470654_960_720.jpg'),
(10, 'Coxinha', 10, 'Coxinha de frango com catupiry.', 'https://cdn.pixabay.com/photo/2019/04/27/23/13/coxinha-4161606_960_720.jpg'),
(8, 'Hamburguer', 20, 'Hamburguer com carne, alface, queijo, molho especial, cebola, picles e um pão com gergilim.', 'https://cdn.pixabay.com/photo/2015/04/20/13/25/burgers-731298_960_720.jpg'),
(15, 'Guaraná', 7, 'Guaraná Antartica Lata.', 'https://cdn.pixabay.com/photo/2021/04/23/06/35/soda-6200841_960_720.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adm` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `recuperar_senha` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `adm`, `username`, `email`, `password`, `recuperar_senha`, `created_at`) VALUES
(5, 1, 'leonanthomaz', '', 'leonan2knet', '$2y$10$SekhvKq7Cl73p/ldBaSUXepqN', '2021-10-04 08:10:17'),
(11, 0, 'NedoDoBorel', 'leonanthomaz.projetos@gmail.com', '$2y$10$C9/4.INWZIzWHzu79D3Q9uQ8ZxTHiJ4c6AGjvbpDqnHn6H2mVZyfm', '$2y$10$PcNjH21mvdOrJUDBVVkIk.Log', '2021-10-05 01:28:58'),
(10, 0, 'Leonan', 'leonan.thomaz@gmail.com', '$2y$10$2WO50aFRltbqxbYQ5GPqQ.36NxL/KmKx2rLrY6YcC/87SPOzLzaJO', '$2y$10$1lP.nV4W1ezcODX4soBSXeLT4', '2021-10-04 20:02:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
