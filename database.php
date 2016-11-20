<?php
$connection->query("
CREATE TABLE `comentarios` (
  `id_comentario` int(10) NOT NULL AUTO_INCREMENT,
  `contenido` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(10) NOT NULL,
  `id_pelicula` int(10) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_pelicula` (`id_pelicula`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `comentarios` VALUES (1,'votando sin parar','2016-02-28 01:23:07',1,1),(3,'me acuesto pero ya','2016-02-28 03:19:02',1,1),(6,'pelicula malisimaaaaaaa','2016-02-29 00:19:24',1,1),(12,'no te rindas','2016-03-01 18:41:01',1,1),(13,'lo conseguiste','2016-03-01 18:41:47',1,1),(14,'vamos allaaaaaa','2016-06-10 18:32:33',1,35);
");
$connection->query("
CREATE TABLE `directores` (
  `id_director` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `pais` varchar(30) NOT NULL,
  PRIMARY KEY (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `directores` VALUES (1,'Quentin Tarantino','EEUU'),(2,'Eli Roth','EEUU'),(3,'Christopher Nolan','Inglaterra'),(4,'Steven Spielberg','EEUU'),(5,'Sylvester Stallone','EEUU'),(9,'Lee Tamahori','Nueva Zelanda'),(10,'Chris Buck','EEUU'),(11,'Robert Cohen','EEUU'),(12,'David Ayer','EEUU'),(13,'James Wan','Malasia');
");
$connection->query("
CREATE TABLE `dirigida_por` (
  `id_director` int(10) NOT NULL,
  `id_pelicula` int(10) NOT NULL,
  PRIMARY KEY (`id_pelicula`,`id_director`),
  KEY `id_director` (`id_director`),
  CONSTRAINT `dirigida_por_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE,
  CONSTRAINT `dirigida_por_ibfk_2` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id_director`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `dirigida_por` VALUES (1,1),(1,2),(1,3),(1,5),(1,6),(2,4),(3,7),(3,8),(3,9),(4,10),(4,11),(4,12),(5,18),(10,35),(11,34),(12,36),(13,37);
");
$connection->query("
CREATE TABLE `es` (
  `id_pelicula` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  PRIMARY KEY (`id_pelicula`,`id_genero`),
  KEY `es_ibfk_2` (`id_genero`),
  CONSTRAINT `es_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE,
  CONSTRAINT `es_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `es` VALUES (2,0),(4,0),(5,0),(6,0),(8,0),(9,0),(10,0),(18,0),(34,0),(36,1),(1,2),(3,2),(7,2),(11,3),(12,4),(35,6),(37,7);
");
$connection->query("
CREATE TABLE `generos` (
  `id_genero` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `generos` VALUES (0,'Accion'),(1,'Belico'),(2,'Thriller'),(3,'Aventura'),(4,'Comedia'),(6,'Infantil'),(7,'Miedo');
");
$connection->query("
CREATE TABLE `peliculas` (
  `id_pelicula` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `duracion` varchar(10) NOT NULL,
  `anio` int(10) NOT NULL,
  `nota_media` int(10) DEFAULT NULL,
  `imagen` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_pelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `peliculas` VALUES (1,'Pulp fiction','153 min',1994,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/pull.png\'>'),(2,'Death Proof ','114 min',2007,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/deat.png\'>'),(3,'Jackie Brown','154 min',1997,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/brown.png\'>'),(4,'Malditos Bastardos','153 min',2009,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/malditos.png\'>'),(5,'Kill Bill: Volumen 1','110 min',2003,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/kill_1.png\'>'),(6,'Kill Bill: Volumen 2','137 min',2004,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/kill_2.png\'>'),(7,'Memento','115 min',2000,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/memento.png\'>'),(8,'Insomnio','118 min',2002,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/inso.png\'>'),(9,'Batman Begins ','140 min',2005,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/begin.png\'>'),(10,'La Guerra de los Mundos','116 min',2005,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/guerra_mundos.png\'>'),(11,'Jurassic Park ','120 min',1993,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/jurasico.png\'>'),(12,'Atrapame si puedes','120 min',2002,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/atrapame.png\'>'),(18,'Los Mercenarios','103 min',2010,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/los_mercenarios.jpg\'>'),(34,'xXx','124 min',2002,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/triple_x_1.jpg\'>'),(35,'Frozen','102 min',2013,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/frozen.jpg\'>'),(36,'Corazones de Acero','128 min',2014,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/corazones de acero.jpg\'>'),(37,'Expediente Warren','112 min',2013,0,'<img width=\'150\' height=\'200\' src=\'/Proyecto/img/expedientewarren.jpg\'>');
");
$connection->query("
CREATE TABLE `posee` (
  `id_pelicula` int(10) NOT NULL,
  `id_valoracion` int(10) NOT NULL,
  PRIMARY KEY (`id_pelicula`,`id_valoracion`),
  KEY `id_valoracion` (`id_valoracion`),
  CONSTRAINT `posee_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE,
  CONSTRAINT `posee_ibfk_2` FOREIGN KEY (`id_valoracion`) REFERENCES `valoraciones` (`id_valoracion`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `posee` VALUES (35,28),(1,29),(34,30),(4,31),(5,32),(6,33),(1,34);
");
$connection->query("
CREATE TABLE `tienen` (
  `id_pelicula` int(10) NOT NULL,
  `id_comentario` int(10) NOT NULL,
  PRIMARY KEY (`id_pelicula`,`id_comentario`),
  KEY `id_comentario` (`id_comentario`),
  CONSTRAINT `tienen_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`) ON DELETE CASCADE,
  CONSTRAINT `tienen_ibfk_2` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id_comentario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `tienen` VALUES (4,1),(1,3),(1,6),(1,12),(1,13),(35,14);
");
$connection->query("
CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `tipo` enum('estandar','admin') NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `usuarios` VALUES (1,'velasco','velasco','velasco@velasco.com','admin'),(2,'sanchez','sanchez','sanchez@sanchez.com','estandar'),(3,'jdiego','jdiego','jdiego@jdiego.com','admin');
");
$connection->query("
CREATE TABLE `valoraciones` (
  `id_valoracion` int(10) NOT NULL AUTO_INCREMENT,
  `nota` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_valoracion`,`id_usuario`),
  KEY `valoraciones_ibfk_1` (`id_usuario`),
  CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
");
$connection->query("
INSERT INTO `valoraciones` VALUES (28,7,1,'2016-10-05 18:12:18'),(29,6,1,'2016-09-05 18:12:18'),(30,7,1,'2016-11-05 19:13:08'),(31,7,1,'2016-11-05 21:09:03'),(32,9,1,'2016-11-07 18:23:51'),(33,9,1,'2016-11-07 18:24:10'),(34,8,2,'2016-11-14 23:54:23');
");

 ?>
