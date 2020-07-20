-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para erp
CREATE DATABASE IF NOT EXISTS `erp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `erp`;

-- Copiando estrutura para tabela erp.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `email` varchar(100) DEFAULT '0',
  `phone` varchar(50) DEFAULT '0',
  `adress` varchar(100) DEFAULT '0',
  `adress_neighb` varchar(100) DEFAULT '0',
  `adress_city` varchar(100) DEFAULT '0',
  `adress_state` varchar(100) DEFAULT '0',
  `adress_country` varchar(100) DEFAULT '0',
  `adress_zipcode` varchar(100) DEFAULT '0',
  `stars` int(11) NOT NULL DEFAULT '3',
  `internal_obs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.clients: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `date_subscrive` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.companies: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name`, `date_subscrive`) VALUES
	(1, 'Unidasnet System', '2020-07-16 19:47:06');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.inventory
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `quant` int(11) NOT NULL DEFAULT '0',
  `min_quant` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.inventory: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.inventory_history
CREATE TABLE IF NOT EXISTS `inventory_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `id_product` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `action` varchar(3) NOT NULL DEFAULT '0',
  `date_action` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.inventory_history: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `inventory_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_history` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.permission_groups
CREATE TABLE IF NOT EXISTS `permission_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `params` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.permission_groups: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_groups` DISABLE KEYS */;
INSERT INTO `permission_groups` (`id`, `id_company`, `name`, `params`) VALUES
	(1, 1, 'Grupo Fictício', '1,2');
/*!40000 ALTER TABLE `permission_groups` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.permission_params
CREATE TABLE IF NOT EXISTS `permission_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.permission_params: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_params` DISABLE KEYS */;
INSERT INTO `permission_params` (`id`, `id_company`, `name`) VALUES
	(1, 1, 'logout'),
	(2, 1, 'permission_view');
/*!40000 ALTER TABLE `permission_params` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `date_purchase` datetime NOT NULL,
  `total_price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.purchases: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.purchases_products
CREATE TABLE IF NOT EXISTS `purchases_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `id_purchase` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '0',
  `quant` varchar(100) NOT NULL DEFAULT '0',
  `purchase_price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.purchases_products: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `purchases_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases_products` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `id_client` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `date_sale` datetime NOT NULL,
  `total_price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.sales: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.sales_products
CREATE TABLE IF NOT EXISTS `sales_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `id_sale` int(11) NOT NULL DEFAULT '0',
  `id_product` int(11) NOT NULL DEFAULT '0',
  `quant` int(11) NOT NULL DEFAULT '0',
  `sale_price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.sales_products: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sales_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_products` ENABLE KEYS */;

-- Copiando estrutura para tabela erp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL DEFAULT '0',
  `group` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela erp.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `id_company`, `email`, `password`, `group`) VALUES
	(1, 1, 'admin@unidasnet.com', '202cb962ac59075b964b07152d234b70', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
