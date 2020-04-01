-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: teste
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `codCliente` int NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(18) NOT NULL DEFAULT '',
  `contacCliente` int NOT NULL DEFAULT '0',
  `emailCliente` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`codCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (8,'asdasd',1231,'asda');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doccab`
--

DROP TABLE IF EXISTS `doccab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doccab` (
  `idCab` int NOT NULL,
  `codTipoDoc` int NOT NULL,
  `tipoDoc` varchar(10) NOT NULL,
  `codCliente` int NOT NULL,
  `nomeCliente` varchar(20) NOT NULL,
  `docNo` int NOT NULL,
  `Data` date NOT NULL,
  PRIMARY KEY (`idCab`),
  KEY `codCliente_idx` (`codCliente`),
  KEY `codTipoDoc_idx` (`codTipoDoc`),
  KEY `nomeCliente_idx` (`nomeCliente`),
  KEY `tipoDoc_idx` (`tipoDoc`),
  CONSTRAINT `codCliente` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doccab`
--

LOCK TABLES `doccab` WRITE;
/*!40000 ALTER TABLE `doccab` DISABLE KEYS */;
INSERT INTO `doccab` VALUES (1,1,'FT',8,'asdasd',1,'2020-03-17');
/*!40000 ALTER TABLE `doccab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doclin`
--

DROP TABLE IF EXISTS `doclin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doclin` (
  `idLin` int NOT NULL,
  `idCab` int NOT NULL,
  `refProduto` varchar(18) NOT NULL,
  `descProduto` varchar(60) NOT NULL,
  `Quantidade` int NOT NULL,
  `precoUni` decimal(10,2) NOT NULL,
  `precoTot` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idLin`),
  KEY `idCab_idx` (`idCab`),
  KEY `refProduto_idx` (`refProduto`),
  KEY `descProduto_idx` (`descProduto`),
  CONSTRAINT `descProduto` FOREIGN KEY (`descProduto`) REFERENCES `produto` (`descProduto`),
  CONSTRAINT `refProduto` FOREIGN KEY (`refProduto`) REFERENCES `produto` (`refProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doclin`
--

LOCK TABLES `doclin` WRITE;
/*!40000 ALTER TABLE `doclin` DISABLE KEYS */;
/*!40000 ALTER TABLE `doclin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedor` (
  `codForne` int NOT NULL AUTO_INCREMENT,
  `nomeForne` varchar(18) NOT NULL DEFAULT '',
  `contacForne` int NOT NULL DEFAULT '0',
  `emailForne` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`codForne`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'teste3',987654321,'test@fornecedor.com');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `refProduto` varchar(18) NOT NULL DEFAULT '',
  `descProduto` varchar(60) NOT NULL DEFAULT '',
  `unidadeProduto` varchar(4) NOT NULL DEFAULT '',
  `familiaProduto` varchar(18) NOT NULL DEFAULT '',
  `preco1Produto` decimal(18,2) DEFAULT '0.00',
  `preco2Produto` decimal(18,2) DEFAULT '0.00',
  `preco3Produto` decimal(18,2) DEFAULT '0.00',
  PRIMARY KEY (`refProduto`),
  KEY `descProduto` (`descProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES ('1234','aguaUP','L','M',1.50,2.00,0.00);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposdoc`
--

DROP TABLE IF EXISTS `tiposdoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiposdoc` (
  `codTiposDoc` int NOT NULL AUTO_INCREMENT,
  `nomeTiposDoc` varchar(30) NOT NULL,
  `tipoDoc` varchar(10) NOT NULL,
  PRIMARY KEY (`codTiposDoc`),
  UNIQUE KEY `tipoDoc` (`tipoDoc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposdoc`
--

LOCK TABLES `tiposdoc` WRITE;
/*!40000 ALTER TABLE `tiposdoc` DISABLE KEYS */;
INSERT INTO `tiposdoc` VALUES (1,'Fatura','FT'),(2,'Nota de credito','NC'),(3,'Nota de debito','ND');
/*!40000 ALTER TABLE `tiposdoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilizador` (
  `codUtil` int NOT NULL AUTO_INCREMENT,
  `primeiroNome` varchar(18) NOT NULL,
  `ultimoNome` varchar(18) NOT NULL,
  `emailUtil` varchar(20) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(18) NOT NULL,
  PRIMARY KEY (`codUtil`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilizador`
--

LOCK TABLES `utilizador` WRITE;
/*!40000 ALTER TABLE `utilizador` DISABLE KEYS */;
INSERT INTO `utilizador` VALUES (1,'Admin','admin','admin@admin.com','admin','1234'),(2,'test1','teste','test@test.com','test','1234');
/*!40000 ALTER TABLE `utilizador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-20 18:33:04
