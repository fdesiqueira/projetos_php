-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema receitas_culinarias
--

CREATE DATABASE IF NOT EXISTS imobiliaria;
USE imobiliaria;

--
-- Definition of table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `desc_categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id_categoria`,`categoria`,`desc_categoria`) VALUES 
 (1,'Casa','Casas lineares'),
 (2,'Apartamento','Apartamentos'),
 (3,'Loja','Loja'),
 (4,'Sala Comercial','Sala Comercial'),
 (5,'Terreno','Terreno');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


--
-- Definition of table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Definition of table `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
CREATE TABLE `imoveis` (
  `id_imovel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `desc_imovel` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `categoria` int(10) unsigned NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `adicionada_quando` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_imovel`),
  KEY `FK_receitas_categoria` (`categoria`),
  CONSTRAINT `FK_receitas_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Definition of table `fotos`
--

DROP TABLE IF EXISTS `imoveis_fotos`;
CREATE TABLE `imoveis_fotos` (
  `id_foto` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `id_imovel` int(10) unsigned NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `adicionada_quando` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_foto`),
  KEY `FK_imovel` (`id_imovel`),
  CONSTRAINT `FK_fotos_imovel` FOREIGN KEY (`id_imovel`) REFERENCES `imoveis` (`id_imovel`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `cadastrado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`,`usuario`,`senha`,`ativo`,`cadastrado_em`) VALUES 
 (1,'mestrecuca','cozinhar123',1,'2012-01-23 21:55:26');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
