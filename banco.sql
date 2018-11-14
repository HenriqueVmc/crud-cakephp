CREATE DATABASE  IF NOT EXISTS `clinica` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clinica`;
-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: clinica
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.17.04.1

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
-- Table structure for table `especialidade`
--

DROP TABLE IF EXISTS `especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidade` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidade`
--

LOCK TABLES `especialidade` WRITE;
/*!40000 ALTER TABLE `especialidade` DISABLE KEYS */;
INSERT INTO `especialidade` VALUES (1,'Cardiologia'),(2,'Dermatologia'),(3,'Radiologia'),(4,'Oftalmologia');
/*!40000 ALTER TABLE `especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exame`
--

DROP TABLE IF EXISTS `exame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exame` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `codigo_paciente` int(11) NOT NULL,
  `codigo_medico` int(11) NOT NULL,
  `tipo_exame` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_consulta_1_idx` (`codigo_medico`),
  KEY `fk_consulta_2_idx` (`codigo_paciente`),
  CONSTRAINT `fk_consulta_1` FOREIGN KEY (`codigo_medico`) REFERENCES `medico` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_2` FOREIGN KEY (`codigo_paciente`) REFERENCES `paciente` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exame`
--

LOCK TABLES `exame` WRITE;
/*!40000 ALTER TABLE `exame` DISABLE KEYS */;
INSERT INTO `exame` VALUES (1,'2017-05-02',1,2,'Exame de pele'),(2,'2017-05-01',1,1,'Teste de esforço físico'),(3,'2017-05-04',2,1,'Exame pré-operatório'),(4,'2017-05-05',3,2,'Exame de rotina');
/*!40000 ALTER TABLE `exame` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laudo`
--

DROP TABLE IF EXISTS `laudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laudo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `texto` text NOT NULL,
  `codigo_medico` int(11) NOT NULL,
  `codigo_exame` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laudo`
--

LOCK TABLES `laudo` WRITE;
/*!40000 ALTER TABLE `laudo` DISABLE KEYS */;
INSERT INTO `laudo` VALUES (1,'2017-05-05','Exame Normal',1,1),(2,'2017-05-05','Exame alterado',1,2),(3,'2017-05-05','Exame Normal',2,3),(4,'2017-05-06','Segundo laudo do exame ',3,3);
/*!40000 ALTER TABLE `laudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medico` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cod_especialidade` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_medico_1_idx` (`cod_especialidade`),
  CONSTRAINT `fk_medico_1` FOREIGN KEY (`cod_especialidade`) REFERENCES `especialidade` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES (1,'Dr. Fulano',1,'4712348277',''),(2,'Dr. Computador',3,'55666778799','medico@email.com'),(3,'Dr. Beltrano',1,'15641564','email@email.com');
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'João de deus','M','1958-01-02','joao@email.com','4732123412'),(2,'Maria da Silva','F','1980-12-11','maria@email.com','4712345678'),(3,'Paulo dos Santos','M','1995-03-06','paulo@email.com','47883838333');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente_planosaude`
--

DROP TABLE IF EXISTS `paciente_planosaude`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente_planosaude` (
  `codigo_paciente` int(11) NOT NULL,
  `codigo_planosaude` int(11) NOT NULL,
  PRIMARY KEY (`codigo_paciente`,`codigo_planosaude`),
  KEY `pk_paciente_plano_idx` (`codigo_planosaude`),
  CONSTRAINT `pk_paciente_plano` FOREIGN KEY (`codigo_planosaude`) REFERENCES `plano_saude` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pk_plano_paciente` FOREIGN KEY (`codigo_paciente`) REFERENCES `paciente` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente_planosaude`
--

LOCK TABLES `paciente_planosaude` WRITE;
/*!40000 ALTER TABLE `paciente_planosaude` DISABLE KEYS */;
INSERT INTO `paciente_planosaude` VALUES (1,1),(2,1),(1,2),(2,2),(3,3);
/*!40000 ALTER TABLE `paciente_planosaude` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plano_saude`
--

DROP TABLE IF EXISTS `plano_saude`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plano_saude` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plano_saude`
--

LOCK TABLES `plano_saude` WRITE;
/*!40000 ALTER TABLE `plano_saude` DISABLE KEYS */;
INSERT INTO `plano_saude` VALUES (1,'Unimed'),(2,'Agemed'),(3,'SCSaude');
/*!40000 ALTER TABLE `plano_saude` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'clinica'
--

--
-- Dumping routines for database 'clinica'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-18 16:22:33
