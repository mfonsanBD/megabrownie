-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jun-2021 às 23:02
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `megabrownie`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog`
--

CREATE TABLE `blog` (
  `idBlog` int(11) NOT NULL,
  `tituloBlog` varchar(100) NOT NULL,
  `textoBlog` text NOT NULL,
  `dataBlog` datetime NOT NULL,
  `imagemBlog` varchar(36) NOT NULL DEFAULT 'padrao.jpg',
  `slug` varchar(104) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `blog`
--

INSERT INTO `blog` (`idBlog`, `tituloBlog`, `textoBlog`, `dataBlog`, `imagemBlog`, `slug`) VALUES
(1, 'Primeiro Texto', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', '2020-01-19 23:40:32', 'c4ca4238a0b923820dcc509a6f75849b.jpg', 'primeiro-texto'),
(2, 'Segundo Texto', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2021-06-17 01:05:53', '734e60f6367093e66e17ae8f529af1bc.jpg', 'segundo-texto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(45) NOT NULL,
  `sobrenomeCliente` varchar(45) NOT NULL,
  `telefoneCliente` varchar(15) NOT NULL,
  `whatsappCliente` varchar(15) NOT NULL,
  `emailCliente` varchar(100) NOT NULL,
  `senhaCliente` varchar(32) NOT NULL,
  `tipoCliente` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nomeCliente`, `sobrenomeCliente`, `telefoneCliente`, `whatsappCliente`, `emailCliente`, `senhaCliente`, `tipoCliente`) VALUES
(2, 'Mike', 'Santos', '(21) 97480-4758', '(21) 97480-4758', 'mike@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(4, 'Wellington', 'Santos', '(22) 98484-8484', '(22) 98484-8484', 'well@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(5, 'Mike', 'Santos', '(21) 97480-4758', '(21) 97480-4758', 'mfonsan3@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(7, 'Wellington', 'Santos', '(22) 98484-8484', '(22) 98484-8484', 'well@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(10, 'José', 'Rocha', '(21) 98765-4321', '(21) 98765-4321', 'joserocha@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(13, 'José', 'Rocha', '(21) 98765-4321', '(21) 98765-4321', 'joserocha@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(17, 'Mike', 'Santos', '(21) 97480-4758', '(21) 97480-4758', 'iddeiasimplesmike@gmail.com', '39ab4b1d396a3a520f66a9921eb90992', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `clienteId`, `logradouro`, `numero`, `complemento`, `referencia`, `bairro`, `cidade`) VALUES
(1, 11, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(2, 2, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(3, 3, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(4, 4, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(5, 5, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(6, 6, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(7, 7, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(8, 8, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(9, 9, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(10, 10, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(11, 12, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(12, 13, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios'),
(14, 17, 'Rua Christiano Lajas', 0, 'Quadra 32 Lote 14', 'Próximo ao barracão da Neusa', 'Retiro', 'Itaboraí'),
(15, 17, 'Rua Marcílio Dias', 2, 'Lote 26 Quadra 18', 'Fundos da casa do Gordo Carroceiro', 'Saracuruna', 'Duque de Caxias');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `enderecoId` int(11) NOT NULL,
  `produtoId` int(11) NOT NULL,
  `dataPedido` datetime NOT NULL,
  `qtdProduto` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idPedido`, `clienteId`, `enderecoId`, `produtoId`, `dataPedido`, `qtdProduto`, `total`, `estado`) VALUES
(1, 5, 1, 5, '2020-01-19 12:31:24', 2, '6.00', 3),
(2, 5, 1, 2, '2020-01-19 13:47:20', 6, '24.00', 3),
(3, 7, 1, 5, '2020-01-19 13:47:20', 1, '3.00', 3),
(6, 17, 14, 2, '2021-06-17 00:49:06', 7, '28.00', 3),
(7, 17, 15, 5, '2021-06-17 00:49:35', 17, '51.00', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(100) NOT NULL,
  `descricaoProduto` varchar(100) NOT NULL,
  `tipoProduto` varchar(30) NOT NULL,
  `sabor` varchar(30) NOT NULL,
  `precoUnd` decimal(10,2) NOT NULL,
  `fotoProduto` varchar(36) NOT NULL DEFAULT 'padrao.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nomeProduto`, `descricaoProduto`, `tipoProduto`, `sabor`, `precoUnd`, `fotoProduto`) VALUES
(2, 'Cocada', 'Muito bom', 'Doce', 'MM\'s', '4.00', 'c81e728d9d4c2f636f067f89cc14862c.jpg'),
(5, 'Brownie', 'Feito com chocolate', 'Doce', 'Nutella', '3.00', 'e4da3b7fbbce2345d7772b0674a318d5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idBlog`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `idBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
