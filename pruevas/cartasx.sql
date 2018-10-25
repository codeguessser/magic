-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-10-2018 a las 18:59:46
-- Versión del servidor: 5.7.23-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cartasx`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cartas_iniciales` (IN `id` INT)  BEGIN
	INSERT INTO tienecarta VALUES(id,6);
	INSERT INTO tienecarta VALUES(id,10);
    INSERT INTO tienecarta VALUES(id,11);
    INSERT INTO tienecarta VALUES(id,12);
    INSERT INTO tienecarta VALUES(id,13);
    
    
    INSERT INTO tienemaso VALUES(id,1,6);
    INSERT INTO tienemaso VALUES(id,1,10);
    INSERT INTO tienemaso VALUES(id,1,11);
    INSERT INTO tienemaso VALUES(id,1,12);
    INSERT INTO tienemaso VALUES(id,1,13);
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `user_existe` (`user` VARCHAR(20)) RETURNS INT(11) BEGIN
	IF EXISTS( SELECT idUsuario FROM usuario WHERE userName = user ) THEN
		return 1;
	ELSE
		return 0;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `user_login` (`user` VARCHAR(20), `pwd` VARCHAR(20)) RETURNS INT(11) BEGIN
	IF EXISTS ( SELECT * FROM cartasx.usuario WHERE userName = user and passwd = pwd) THEN
		return 1;
	ELSE
		return 0;
    END IF;   
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afecta`
--

CREATE TABLE `afecta` (
  `idDado` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL,
  `idJugable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `idAmbiente` int(11) NOT NULL,
  `ataque` int(11) DEFAULT NULL,
  `defensa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`idAmbiente`, `ataque`, `defensa`) VALUES
(5, 2, 4),
(6, 3, 1),
(7, 3, 2),
(8, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `idCarta` int(11) NOT NULL,
  `tipo` varchar(40) DEFAULT NULL,
  `clase` varchar(40) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `costoOro` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`idCarta`, `tipo`, `clase`, `nombre`, `descripcion`, `costoOro`, `imagen`) VALUES
(5, 'ambiente', 'obscuridad', 'cueva sangriente', 'La cueva sangrienta entra al campo de batalla girada.\\n\\n Esta carta agrega + 1 de mana ', 100, 'img/cartas/amb/o/1.png'),
(6, 'ambiente', 'naturaleza', 'hondonada salvaje', '', 100, 'img/cartas/amb/n/1.png'),
(7, 'ambiente', 'luz', 'monasterio mistico', '', 100, 'img/cartas/amb/l/1.png'),
(8, 'ambiente', 'trueno', 'volcan activo', '', 100, 'img/cartas/amb/t/1.png'),
(9, 'criatura', 'obscuridad', 'ginete orco', 'Cuando el ginete orco entra a la batalla pierdes 4 vidas a menos que hallas atacado con una criatura en este turno', 100, 'img/cartas/cri/o/1.png'),
(10, 'criatura', 'naturaleza', 'muralla de flechas', 'Muralla de habiles arqueros que resisten a cualquier adversario', NULL, 'img/cartas/cri/n/6.png'),
(11, 'criatura', 'luz', 'guerrero de shan-ho', 'Este guerrero es habil con la espada solo en el dia', NULL, 'img/cartas/cri/l/10.png'),
(12, 'hechizo', 'luz', 'lider inspirador', 'Aumenta  0 / +1  a los tipos criatura de tu tablero', NULL, 'img/cartas/hec/l/1.png'),
(13, 'poder', 'luz', 'estandar temur', 'Aumenta +1 las reservas de mana, roba una carta al azar del rival', NULL, 'img/cartas/pod/l/1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criatura`
--

CREATE TABLE `criatura` (
  `id` int(11) NOT NULL,
  `ataque` int(11) DEFAULT NULL,
  `defensa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `criatura`
--

INSERT INTO `criatura` (`id`, `ataque`, `defensa`) VALUES
(9, 10, 10),
(10, 2, 10),
(11, 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dado`
--

CREATE TABLE `dado` (
  `idDado` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entorno`
--

CREATE TABLE `entorno` (
  `idDado` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hechizo`
--

CREATE TABLE `hechizo` (
  `id` int(11) NOT NULL,
  `duracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hechizo`
--

INSERT INTO `hechizo` (`id`, `duracion`) VALUES
(12, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugable`
--

CREATE TABLE `jugable` (
  `idJugable` int(11) NOT NULL,
  `idAmbiente` int(11) NOT NULL,
  `costoMana` int(11) DEFAULT NULL,
  `habilidad` varchar(40) DEFAULT NULL,
  `habilidadEntorno` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jugable`
--

INSERT INTO `jugable` (`idJugable`, `idAmbiente`, `costoMana`, `habilidad`, `habilidadEntorno`) VALUES
(9, 5, 0, 'incursion', 'incursion brutal'),
(10, 6, 0, 'lluvia de flechas', 'flecha certera'),
(11, 7, 0, 'corte limpio', 'corte critico'),
(12, 0, 20, '', ''),
(13, 0, 30, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maso`
--

CREATE TABLE `maso` (
  `idMaso` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `idMoneda` int(11) NOT NULL,
  `tiempo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poder`
--

CREATE TABLE `poder` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poder`
--

INSERT INTO `poder` (`id`) VALUES
(13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienecarta`
--

CREATE TABLE `tienecarta` (
  `idUser` int(11) NOT NULL,
  `idCarta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienecarta`
--

INSERT INTO `tienecarta` (`idUser`, `idCarta`) VALUES
(12, 6),
(13, 6),
(14, 6),
(12, 10),
(13, 10),
(14, 10),
(12, 11),
(13, 11),
(14, 11),
(12, 12),
(13, 12),
(14, 12),
(12, 13),
(13, 13),
(14, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienemaso`
--

CREATE TABLE `tienemaso` (
  `idUser` int(11) NOT NULL,
  `idMaso` int(11) NOT NULL,
  `idCarta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `passwd` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `emblema` varchar(20) DEFAULT NULL,
  `coins` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `userName`, `passwd`, `email`, `emblema`, `coins`) VALUES
(10, 'g', 'g', 'g', NULL, 0),
(11, 's', 's', 's', NULL, 0),
(12, 'h', 'h', 'h', NULL, 0),
(13, 'b', 'b', 'b', NULL, 0),
(14, 'f', 'f', 'f', NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afecta`
--
ALTER TABLE `afecta`
  ADD PRIMARY KEY (`idDado`,`idMoneda`,`idJugable`),
  ADD KEY `fk_afMoneda` (`idMoneda`),
  ADD KEY `kf_afJugable` (`idJugable`);

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`idAmbiente`);

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`idCarta`);

--
-- Indices de la tabla `criatura`
--
ALTER TABLE `criatura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dado`
--
ALTER TABLE `dado`
  ADD PRIMARY KEY (`idDado`);

--
-- Indices de la tabla `entorno`
--
ALTER TABLE `entorno`
  ADD PRIMARY KEY (`idDado`,`idMoneda`),
  ADD KEY `fk_eMoneda` (`idMoneda`);

--
-- Indices de la tabla `hechizo`
--
ALTER TABLE `hechizo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugable`
--
ALTER TABLE `jugable`
  ADD PRIMARY KEY (`idJugable`);

--
-- Indices de la tabla `maso`
--
ALTER TABLE `maso`
  ADD PRIMARY KEY (`idMaso`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`idMoneda`);

--
-- Indices de la tabla `poder`
--
ALTER TABLE `poder`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tienecarta`
--
ALTER TABLE `tienecarta`
  ADD PRIMARY KEY (`idUser`,`idCarta`),
  ADD KEY `fk_tcCarta` (`idCarta`);

--
-- Indices de la tabla `tienemaso`
--
ALTER TABLE `tienemaso`
  ADD PRIMARY KEY (`idUser`,`idMaso`,`idCarta`),
  ADD KEY `fk_tmCarta` (`idCarta`),
  ADD KEY `fk_tmMaso` (`idMaso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `idCarta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `dado`
--
ALTER TABLE `dado`
  MODIFY `idDado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `maso`
--
ALTER TABLE `maso`
  MODIFY `idMaso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `idMoneda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afecta`
--
ALTER TABLE `afecta`
  ADD CONSTRAINT `fk_afDado` FOREIGN KEY (`idDado`) REFERENCES `entorno` (`idDado`),
  ADD CONSTRAINT `fk_afMoneda` FOREIGN KEY (`idMoneda`) REFERENCES `entorno` (`idMoneda`),
  ADD CONSTRAINT `kf_afJugable` FOREIGN KEY (`idJugable`) REFERENCES `jugable` (`idJugable`);

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `fk_aCarta` FOREIGN KEY (`idAmbiente`) REFERENCES `carta` (`idCarta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `criatura`
--
ALTER TABLE `criatura`
  ADD CONSTRAINT `fk_cJugable` FOREIGN KEY (`id`) REFERENCES `jugable` (`idJugable`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entorno`
--
ALTER TABLE `entorno`
  ADD CONSTRAINT `fk_eDado` FOREIGN KEY (`idDado`) REFERENCES `dado` (`idDado`),
  ADD CONSTRAINT `fk_eMoneda` FOREIGN KEY (`idMoneda`) REFERENCES `moneda` (`idMoneda`);

--
-- Filtros para la tabla `hechizo`
--
ALTER TABLE `hechizo`
  ADD CONSTRAINT `fk_hJugable` FOREIGN KEY (`id`) REFERENCES `jugable` (`idJugable`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jugable`
--
ALTER TABLE `jugable`
  ADD CONSTRAINT `fk_jCarta` FOREIGN KEY (`idJugable`) REFERENCES `carta` (`idCarta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `poder`
--
ALTER TABLE `poder`
  ADD CONSTRAINT `fk_pJugable` FOREIGN KEY (`id`) REFERENCES `jugable` (`idJugable`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tienecarta`
--
ALTER TABLE `tienecarta`
  ADD CONSTRAINT `fk_tcCarta` FOREIGN KEY (`idCarta`) REFERENCES `carta` (`idCarta`),
  ADD CONSTRAINT `fk_tcUsuario` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `tienemaso`
--
ALTER TABLE `tienemaso`
  ADD CONSTRAINT `fk_tmCarta` FOREIGN KEY (`idCarta`) REFERENCES `carta` (`idCarta`),
  ADD CONSTRAINT `fk_tmMaso` FOREIGN KEY (`idMaso`) REFERENCES `maso` (`idMaso`),
  ADD CONSTRAINT `fk_tmUsuario` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
