-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: api-rest
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(210) DEFAULT NULL,
  `cpf` varchar(90) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (69,'carlos','879879','rua almirante','karla@gmail.com',1),(70,'carlos','879879','rua almirante','karla@gmail.com',1),(71,'carlos','879879','rua almirante','karla@gmail.com',1),(72,'carlos','879879','rua almirante','karla@gmail.com',1),(73,'carlos','879879','rua almirante','karla@gmail.com',1),(74,'calors da asil','879879','rua almirante','karla@gmail.com',1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locacao`
--

DROP TABLE IF EXISTS `locacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(210) DEFAULT NULL,
  `cpfCliente` varchar(90) DEFAULT NULL,
  `dataInicio` date DEFAULT '0000-00-00',
  `dataTermino` date DEFAULT '0000-00-00',
  `precoTotal` decimal(15,2) DEFAULT '0.00',
  `placaVeiculo` varchar(210) DEFAULT NULL,
  `statusLocacao` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locacao`
--

LOCK TABLES `locacao` WRITE;
/*!40000 ALTER TABLE `locacao` DISABLE KEYS */;
INSERT INTO `locacao` VALUES (68,'12234','88787878847','2020-10-05','2020-11-12',50.00,'POA9782',1),(69,'1111','999787878847','2020-10-05','2020-10-12',60.00,'POA9888',1),(70,'113411','999787878847','2020-10-05','2020-10-12',60.00,'POA9888',1);
/*!40000 ALTER TABLE `locacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(210) DEFAULT NULL,
  `modelo` varchar(200) DEFAULT NULL,
  `ano` varchar(250) DEFAULT NULL,
  `cor` varchar(200) DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT '0.00',
  `statusAluguel` int(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veiculo`
--

LOCK TABLES `veiculo` WRITE;
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` VALUES (67,'ER-1233','WW','2000','azl',50.00,1,'2019-12-12 00:00:00'),(68,'PWE-0128','FIA','1990','azul marinho',40.00,1,'2019-12-12 00:00:00'),(69,'PWE-0128','FIA','1990','amarelo',40.00,1,'0000-00-00 00:00:00'),(70,'PWE-0128','FIA','1990','amarelo',40.00,1,'2020-09-21 13:32:35'),(71,'PWE-0128','FIA','1990','azul marinho',40.00,1,'2020-09-21 13:32:54'),(72,'PWE-0128','FIA','1990','azul marinho',40.00,1,'2020-09-21 13:42:18');
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'api-rest'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-21 13:44:13
