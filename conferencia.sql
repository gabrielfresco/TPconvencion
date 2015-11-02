-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2015 a las 18:33:25
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `conferencia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `borrarInvitado`(IN valor INT(1))
BEGIN

	 DELETE 
		from invitados                
                WHERE id=valor;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `borrarUsuario`(IN `paramId` INT)
    NO SQL
DELETE FROM usuarios WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `empresas_TT`()
BEGIN
	
	select * from empresas;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `empresas_TxId`(IN id INT(1))
BEGIN
	
	select * from empresas where idEmpresa=id;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarInvitados`(IN nomb VARCHAR(25), IN ape VARCHAR(25), IN d INT(8), IN sex VARCHAR(1),IN idEmp INT(1))
BEGIN 

    INSERT INTO invitados(nombre,apellido,dni,sexo,idEmpresa)   VALUES(nomb,ape,d,sex,idEmp);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarQueja`(IN `paramMail` VARCHAR(50), IN `paramProblema` LONGTEXT, IN `paramFecha` DATE)
    NO SQL
INSERT INTO quejas VALUES(null,paramMail,paramProblema,paramFecha)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarUsuario`(IN `paramNombre` VARCHAR(25), IN `paramContra` VARCHAR(100), IN `paramMail` VARCHAR(50), IN `paramIdEmp` INT(1), IN `paramFoto` VARCHAR(50))
    NO SQL
INSERT INTO usuarios VALUES(null,paramNombre,paramContra,paramMail, paramIdEmp,paramFoto)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `invitados_TT`()
BEGIN
	SELECT * FROM invitados;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `invitadoTxId`(IN `paramId` INT)
    NO SQL
SELECT * FROM invitados WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarContra`(IN `paramMail` VARCHAR(50), IN `paramContra` VARCHAR(100))
    NO SQL
UPDATE usuarios SET contrasenia=paramContra WHERE mail=paramMail$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarInvitado`(IN `paramId` INT(1), IN `paramNom` VARCHAR(25), IN `paramApe` VARCHAR(25), IN `paramDni` INT(8), IN `paramSexo` VARCHAR(1), IN `paramIdEmp` INT(1))
BEGIN
	
	UPDATE invitados 
                set nombre=paramNom,
                apellido=paramApe,
                dni=paramDni,
                sexo=paramSexo,
                idEmpresa=paramIdEmp
                WHERE id=paramId;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarUsuario`(IN `paramId` INT, IN `paramNombre` VARCHAR(25), IN `paramContra` VARCHAR(100), IN `paramMail` VARCHAR(50), IN `paramIdEmp` INT)
    NO SQL
UPDATE usuarios SET  nombre=paramNombre,contraseña=paramContra, mail=paramMail, idEmpresa=paramIdEmp WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarios_TxNombre`(IN `nom` VARCHAR(25))
BEGIN

SELECT * FROM usuarios where nombre=nom;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioTxId`(IN `paramId` INT)
    NO SQL
SELECT * FROM usuarios WHERE id=paramId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuarioTxMail`(IN `paramMail` VARCHAR(50))
    NO SQL
SELECT * FROM usuarios WHERE mail=paramMail$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `nombre`) VALUES
(1, 'Probrando S.A.'),
(2, 'Funciona SRL'),
(3, '3er Empresa ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE IF NOT EXISTS `invitados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `sexo` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id`, `nombre`, `apellido`, `dni`, `sexo`, `idEmpresa`) VALUES
(54, 'Gabi', 'Fresco', 38404676, 'M', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas`
--

CREATE TABLE IF NOT EXISTS `quejas` (
  `id` int(11) NOT NULL,
  `mail` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `problema` longtext COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `quejas`
--

INSERT INTO `quejas` (`id`, `mail`, `problema`, `fecha`) VALUES
(7, 'gabriel.fresco@yahoo.com.ar', 'no anda nada maestro					', '2015-11-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `contrasenia` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `foto` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasenia`, `mail`, `idEmpresa`, `foto`) VALUES
(12, 'Gabifresco09', 'af892f709c31ca7df60e932d79b5a260', 'dsada@asdas', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quejas`
--
ALTER TABLE `quejas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `mail` (`mail`), ADD UNIQUE KEY `mail_2` (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `quejas`
--
ALTER TABLE `quejas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
