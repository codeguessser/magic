CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) DEFAULT NULL,
  `passwd` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `emblema` varchar(20) DEFAULT NULL,
  `coins` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `usuario` VALUES (1,'v','v','','',0),(2,'f','f','f','',0);


CREATE TABLE `carta` (
  `IdCarta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(40) DEFAULT NULL,
  `clase` varchar(40) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `costoOro` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCarta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `carta` VALUES (1,'hechizo','luz','Bestaaa','Esta carta fue creada con odio',25,'img/0.jpg'),(2,'criatura','luz','Hypericia','Magica Carta lapicera',15,'img/1.jpg'),(3,'ambiente','trueno',NULL,'Alauk agbar',40,'img/4.jpg'),(4,'poder','naturaleza','Platano','Poder de los platanos',30,'img/5.jpg');



CREATE TABLE `jugable` (
  `IdJugable` int(11) NOT NULL,
  `IdAmbiente` int(11) NOT NULL,
  `CostoMana` int(11) DEFAULT NULL,
  `Habilidad` varchar(40) DEFAULT NULL,
  `HabilidadEntorno` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`IdJugable`),
  CONSTRAINT `fk_jCarta` FOREIGN KEY (`IdJugable`) REFERENCES `carta` (`IdCarta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `jugable` VALUES (1,1,10,'destello segador','Sol Intenso'),(2,1,15,'HyperMorber','Destello critico'),(4,1,34,'resbalarse','lluvia de platanos');


CREATE TABLE `ambiente` (
  `IdAmbiente` int(11) NOT NULL,
  `Ataque` int(11) DEFAULT NULL,
  `Defensa` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdAmbiente`),
  CONSTRAINT `fk_aCarta` FOREIGN KEY (`IdAmbiente`) REFERENCES `carta` (`IdCarta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ambiente` VALUES (3,12,3);


CREATE TABLE `hechizo` (
  `idHechizo` int(11) NOT NULL,
  `duracion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHechizo`),
  CONSTRAINT `fk_hJugable` FOREIGN KEY (`idHechizo`) REFERENCES `jugable` (`IdJugable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hechizo` VALUES (1,15);


CREATE TABLE `criatura` (
  `idCriatura` int(11) NOT NULL,
  `ataque` int(11) DEFAULT NULL,
  `defensa` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCriatura`),
  CONSTRAINT `fk_cJugable` FOREIGN KEY (`idCriatura`) REFERENCES `jugable` (`IdJugable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `criatura` VALUES (2,10,15);


CREATE TABLE `poder` (
  `IdPoder` int(11) NOT NULL,
  PRIMARY KEY (`IdPoder`),
  CONSTRAINT `fk_pJugable` FOREIGN KEY (`idPoder`) REFERENCES `jugable` (`IdJugable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `poder` VALUES (4);



CREATE TABLE `dado` (
  `idDado` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `moneda` (
  `idMoneda` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `entorno` (
  `idDado` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL,
  PRIMARY KEY (`idDado`,`idMoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `afecta` (
  `idDado` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL,
  `idJugable` int(11) NOT NULL,
  PRIMARY KEY (`idDado`,`idMoneda`,`idJugable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `mazo` (
  `idMazo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idMazo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `tiene` (
  `idUser` int(11) NOT NULL,
  `idCarta` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idCarta`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tienemazo` (
  `idUser` int(11) NOT NULL,
  `idMazo` int(11) NOT NULL,
  `idCarta` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idMazo`,`idCarta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
