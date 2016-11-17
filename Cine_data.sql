-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cine
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Dumping data for table `comentarios`
--
--CREATE DATABASE IF NOT EXISTS `Cine`;
--use `Cine`;

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,'votando sin parar','2016-02-28 01:23:07',1,1),(3,'me acuesto pero ya','2016-02-28 03:19:02',1,1),(6,'pelicula malisimaaaaaaa','2016-02-29 00:19:24',1,1),(12,'no te rindas','2016-03-01 18:41:01',1,1),(13,'lo conseguiste','2016-03-01 18:41:47',1,1),(14,'vamos allaaaaaa','2016-06-10 18:32:33',1,35);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `directores`
--

LOCK TABLES `directores` WRITE;
/*!40000 ALTER TABLE `directores` DISABLE KEYS */;
INSERT INTO `directores` VALUES (1,'Quentin Tarantino','EEUU'),(2,'Eli Roth','EEUU'),(3,'Christopher Nolan','Inglaterra'),(4,'Steven Spielberg','EEUU'),(5,'Sylvester Stallone','EEUU'),(9,'Lee Tamahori','Nueva Zelanda'),(10,'Chris Buck','EEUU'),(11,'Robert Cohen','EEUU'),(12,'David Ayer','EEUU'),(13,'James Wan','Malasia');
/*!40000 ALTER TABLE `directores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dirigida_por`
--

LOCK TABLES `dirigida_por` WRITE;
/*!40000 ALTER TABLE `dirigida_por` DISABLE KEYS */;
INSERT INTO `dirigida_por` VALUES (1,1),(1,2),(1,3),(1,5),(1,6),(2,4),(3,7),(3,8),(3,9),(4,10),(4,11),(4,12),(5,18),(10,35),(11,34),(12,36),(13,37);
/*!40000 ALTER TABLE `dirigida_por` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `es`
--

LOCK TABLES `es` WRITE;
/*!40000 ALTER TABLE `es` DISABLE KEYS */;
INSERT INTO `es` VALUES (2,0),(4,0),(5,0),(6,0),(8,0),(9,0),(10,0),(18,0),(34,0),(36,1),(1,2),(3,2),(7,2),(11,3),(12,4),(35,6),(37,7);
/*!40000 ALTER TABLE `es` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (0,'Accion'),(1,'Belico'),(2,'Thriller'),(3,'Aventura'),(4,'Comedia'),(6,'Infantil'),(7,'Miedo');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `peliculas`
--

LOCK TABLES `peliculas` WRITE;
/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
INSERT INTO `peliculas` VALUES (1,'Pulp fiction','153 min',1994,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/pull.png\'>'),(2,'Death Proof ','114 min',2007,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/deat.png\'>'),(3,'Jackie Brown','154 min',1997,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/brown.png\'>'),(4,'Malditos Bastardos','153 min',2009,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/malditos.png\'>'),(5,'Kill Bill: Volumen 1','110 min',2003,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/kill_1.png\'>'),(6,'Kill Bill: Volumen 2','137 min',2004,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/kill_2.png\'>'),(7,'Memento','115 min',2000,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/memento.png\'>'),(8,'Insomnio','118 min',2002,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/inso.png\'>'),(9,'Batman Begins ','140 min',2005,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/begin.png\'>'),(10,'La Guerra de los Mundos','116 min',2005,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/guerra_mundos.png\'>'),(11,'Jurassic Park ','120 min',1993,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/jurasico.png\'>'),(12,'Atrapame si puedes','120 min',2002,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/atrapame.png\'>'),(18,'Los Mercenarios','103 min',2010,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/los_mercenarios.jpg\'>'),(34,'xXx','124 min',2002,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/triple_x_1.jpg\'>'),(35,'Frozen','102 min',2013,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/frozen.jpg\'>'),(36,'Corazones de Acero','128 min',2014,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/corazones de acero.jpg\'>'),(37,'Expediente Warren','112 min',2013,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/expedientewarren.jpg\'>');
/*!40000 ALTER TABLE `peliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `posee`
--

LOCK TABLES `posee` WRITE;
/*!40000 ALTER TABLE `posee` DISABLE KEYS */;
INSERT INTO `posee` VALUES (35,28),(1,29),(34,30),(4,31),(5,32),(6,33),(1,34);
/*!40000 ALTER TABLE `posee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tienen`
--

LOCK TABLES `tienen` WRITE;
/*!40000 ALTER TABLE `tienen` DISABLE KEYS */;
INSERT INTO `tienen` VALUES (4,1),(1,3),(1,6),(1,12),(1,13),(35,14);
/*!40000 ALTER TABLE `tienen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'velasco','velasco','velasco@velasco.com','admin'),(2,'sanchez','sanchez','sanchez@sanchez.com','estandar'),(3,'jdiego','jdiego','jdiego@jdiego.com','admin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `valoraciones`
--

LOCK TABLES `valoraciones` WRITE;
/*!40000 ALTER TABLE `valoraciones` DISABLE KEYS */;
INSERT INTO `valoraciones` VALUES (28,7,1,'2016-10-05 18:12:18'),(29,6,1,'2016-09-05 18:12:18'),(30,7,1,'2016-11-05 19:13:08'),(31,7,1,'2016-11-05 21:09:03'),(32,9,1,'2016-11-07 18:23:51'),(33,9,1,'2016-11-07 18:24:10'),(34,8,2,'2016-11-14 23:54:23');
/*!40000 ALTER TABLE `valoraciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-16 11:47:07
