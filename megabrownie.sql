-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela megabrownie.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `idBlog` int(11) NOT NULL AUTO_INCREMENT,
  `tituloBlog` varchar(100) NOT NULL,
  `textoBlog` text NOT NULL,
  `dataBlog` datetime NOT NULL,
  `imagemBlog` varchar(36) NOT NULL DEFAULT 'padrao.jpg',
  PRIMARY KEY (`idBlog`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela megabrownie.blog: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`idBlog`, `tituloBlog`, `textoBlog`, `dataBlog`, `imagemBlog`) VALUES
	(1, 'Primeiro Texto', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-01-19 23:40:32', 'padrao.jpg');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Copiando estrutura para tabela megabrownie.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(45) NOT NULL,
  `sobrenomeCliente` varchar(45) NOT NULL,
  `telefoneCliente` varchar(15) NOT NULL,
  `whatsappCliente` varchar(15) NOT NULL,
  `emailCliente` varchar(100) NOT NULL,
  `senhaCliente` varchar(32) NOT NULL,
  `tipoCliente` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela megabrownie.cliente: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idCliente`, `nomeCliente`, `sobrenomeCliente`, `telefoneCliente`, `whatsappCliente`, `emailCliente`, `senhaCliente`, `tipoCliente`) VALUES
	(2, 'Mike', 'Santos', '(21) 97480-4758', '(21) 97480-4758', 'mike@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
	(4, 'Wellington', 'Santos', '(22) 98484-8484', '(22) 98484-8484', 'well@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
	(5, 'Mike', 'Santos', '(21) 97480-4758', '(21) 97480-4758', 'mfonsan3@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
	(7, 'Wellington', 'Santos', '(22) 98484-8484', '(22) 98484-8484', 'well@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
	(10, 'José', 'Rocha', '(21) 98765-4321', '(21) 98765-4321', 'joserocha@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
	(13, 'José', 'Rocha', '(21) 98765-4321', '(21) 98765-4321', 'joserocha@gmail.com', '202cb962ac59075b964b07152d234b70', 1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela megabrownie.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `clienteId` int(11) NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  PRIMARY KEY (`idEndereco`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela megabrownie.endereco: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
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
	(12, 13, 'Rua 21', 9, 'lado praia', 'próximo ao prédio amarelo', 'Rasa', 'Armação dos Búzios');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

-- Copiando estrutura para tabela megabrownie.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `clienteId` int(11) NOT NULL,
  `enderecoId` int(11) NOT NULL,
  `produtoId` int(11) NOT NULL,
  `dataPedido` datetime NOT NULL,
  `qtdProduto` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela megabrownie.pedido: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`idPedido`, `clienteId`, `enderecoId`, `produtoId`, `dataPedido`, `qtdProduto`, `total`, `estado`) VALUES
	(1, 5, 1, 5, '2020-01-19 12:31:24', 2, 6.00, 3),
	(2, 5, 1, 2, '2020-01-19 13:47:20', 6, 24.00, 3),
	(3, 7, 1, 5, '2020-01-19 13:47:20', 1, 3.00, 2);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela megabrownie.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(100) NOT NULL,
  `descricaoProduto` varchar(100) NOT NULL,
  `tipoProduto` varchar(30) NOT NULL,
  `sabor` varchar(30) NOT NULL,
  `precoUnd` decimal(10,2) NOT NULL,
  `fotoProduto` varchar(32) NOT NULL DEFAULT 'padrao.jpg',
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela megabrownie.produto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idProduto`, `nomeProduto`, `descricaoProduto`, `tipoProduto`, `sabor`, `precoUnd`, `fotoProduto`) VALUES
	(2, 'Cocada', 'Muito bom', 'Doce', 'MM\'s', 4.00, 'padrao.jpg'),
	(5, 'Brownie', 'Feito com chocolate', 'Doce', 'Nutella', 3.00, 'padrao.jpg');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
