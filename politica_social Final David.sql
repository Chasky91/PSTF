-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-04-2016 a las 18:24:40
-- Versión del servidor: 5.6.28-0ubuntu0.15.10.1
-- Versión de PHP: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `politica_social`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Agua`
--

CREATE TABLE IF NOT EXISTS `Agua` (
  `idAgua` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Agua`
--

INSERT INTO `Agua` (`idAgua`, `descripcion`) VALUES
(1, 'por cañería dentro de la vivienda'),
(2, 'fuera de la vivienda pero dentro del terreno'),
(3, 'Por fuera del Terreo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AguaLug`
--

CREATE TABLE IF NOT EXISTS `AguaLug` (
  `idAguaLug` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `AguaLug`
--

INSERT INTO `AguaLug` (`idAguaLug`, `descripcion`) VALUES
(1, 'Red Pública'),
(2, 'Perforación con bomba a motor'),
(3, 'Perforación con bomba manual'),
(4, 'Pozo'),
(5, 'Transporte por Cisterna'),
(6, 'Agua lluvia'),
(7, 'Río'),
(8, 'Canal'),
(9, 'Arroyo'),
(10, 'Acequia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Beneficiario`
--

CREATE TABLE IF NOT EXISTS `Beneficiario` (
  `idBeneficiario` int(11) NOT NULL,
  `dni` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idprof` int(11) DEFAULT NULL,
  `lugnac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechanac` datetime NOT NULL,
  `domben` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resben` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telfben` bigint(50) DEFAULT NULL,
  `idEstcivil` int(11) DEFAULT NULL,
  `idEd` int(11) DEFAULT NULL,
  `fechaAlta` datetime NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Beneficiario`
--

INSERT INTO `Beneficiario` (`idBeneficiario`, `dni`, `nombre`, `apellido`, `idprof`, `lugnac`, `fechanac`, `domben`, `resben`, `telfben`, `idEstcivil`, `idEd`, `fechaAlta`, `ciudad`, `provincia`, `estado`) VALUES
(1, 29159085, 'Andres', 'Garcia', 45, 'Cipolleti', '1984-05-15 00:00:00', 'Italia 520', 'Catriel', 2994912326, 2, 8, '2016-02-04 02:53:42', 'Catriel', 'Rio Negro', 'Rechazado'),
(2, 28500120, 'Maribel', 'Mandioca', 4, 'Bolson', '1980-12-10 00:00:00', 'Dinamarca s/n', 'Catriel', 2994913559, 5, 7, '2016-02-04 02:56:38', 'Catriel', 'Rio Negro', 'Aprobado'),
(3, 25489147, 'Santiago Roberto', 'Amaranto', 2, 'San Antonio Oeste', '1954-10-24 00:00:00', 'Iran 221', '3 mese aprox', 2994912580, 1, 8, '2016-02-12 02:00:30', 'Catriel', 'Rio Negro', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CieloR`
--

CREATE TABLE IF NOT EXISTS `CieloR` (
  `idCieloR` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CieloR`
--

INSERT INTO `CieloR` (`idCieloR`, `descripcion`) VALUES
(1, 'Madera'),
(2, 'Durlock'),
(3, 'Nylon'),
(4, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Desague`
--

CREATE TABLE IF NOT EXISTS `Desague` (
  `idDesague` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Desague`
--

INSERT INTO `Desague` (`idDesague`, `descripcion`) VALUES
(1, 'Cloaca'),
(2, 'Cámara Séptica y Pozo Ciego'),
(3, 'Pozo Ciego'),
(4, 'Hoyo'),
(5, 'Excavación a tierra'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetalleDeEntrega`
--

CREATE TABLE IF NOT EXISTS `DetalleDeEntrega` (
  `idDetalle` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fechaEntrega` datetime NOT NULL,
  `beneficiarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Economia`
--

CREATE TABLE IF NOT EXISTS `Economia` (
  `idben` int(11) DEFAULT NULL,
  `idEconomia` int(11) NOT NULL,
  `trabajo` tinyint(1) DEFAULT NULL,
  `nomTrab` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ingreso` tinyint(1) DEFAULT NULL,
  `canIng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiempoIng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obser1` longtext COLLATE utf8_unicode_ci,
  `ayuda` tinyint(1) DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `canAyuda` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiempoA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obser2` longtext COLLATE utf8_unicode_ci,
  `obser3` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Economia`
--

INSERT INTO `Economia` (`idben`, `idEconomia`, `trabajo`, `nomTrab`, `ingreso`, `canIng`, `tiempoIng`, `obser1`, `ayuda`, `tipo`, `canAyuda`, `tiempoA`, `obser2`, `obser3`) VALUES
(2, 1, 0, 'Panaderia "La canchera"', 1, '1500', 'Mensual', 'Es lo que recibe por el pago de alimento de uno de sus hijos', 1, 'Plan Social', '1000', 'Mensual', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Educacion`
--

CREATE TABLE IF NOT EXISTS `Educacion` (
  `idEducacion` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Educacion`
--

INSERT INTO `Educacion` (`idEducacion`, `descripcion`) VALUES
(1, 'Inicial'),
(2, 'Inicial Incompleto'),
(3, 'Primario'),
(4, 'Primario Incompleto'),
(5, 'EGB'),
(6, 'EGB Incompleto'),
(7, 'Secundario'),
(8, 'Secundario Incompleto'),
(9, 'Polimodal'),
(10, 'Polimodal Incompleto'),
(12, 'Superior no univ.'),
(13, 'Superior no univ. Incompl'),
(14, 'Universitario'),
(16, 'Universitario Incompleto'),
(17, 'Educación especial'),
(18, 'Educación especial Incomp'),
(19, 'No estudia'),
(20, 'Otra situación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `fechaAlta` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `sector_id`, `dni`, `nombre`, `apellido`, `fechaAlta`, `email`, `contrasena`, `salt`, `activo`, `rol`) VALUES
(20, 7, 1346548, 'antonio', 'marcial', '2015-11-21 18:11:04', 'admin@admin.com', '$5$rounds=1000$b7dea08506aacb65$.E4O9cN1ta007JNl8KKqS.DvnjHX4vAzIWNKnaXeOT/', 'b7dea08506aacb65fb84f82053757563f4402f03', 0, 'admin'),
(31, 1, 94856789, 'Maria', 'Riberios', '2015-12-22 02:43:35', 'asdsd@sasdsa.com', '$5$rounds=1000$be6cbb84b0b5e676$RzCTVg8qjGMRtqCaUMOlA9KUVt/WADwa3M5nCsSnm79', 'be6cbb84b0b5e67647d756a3a55542347bd31a70', 0, 'mesaentrada'),
(34, 1, 45645456, 'fdsdfsdf', 'dfsfsfs', '2015-12-22 03:42:55', 'asd@asd.com', '$5$rounds=1000$cc83c9f0c4f3a261$ErySpbrCNmaULaSN6KGVHCQH8ujnLwsy7GtPrIe08H0', 'cc83c9f0c4f3a261a4552d3936d5109ba8b56cc4', 0, 'mesaentrada'),
(36, 1, 12345689, 'marta', 'marta', '2015-12-22 09:15:22', 'marta@marta.com', '$5$rounds=1000$27ed3e585289cdbc$g4OJW7S3.5pJRFjBdSRLOMKV9ZIvRgz5mYr2J5EvEjA', '27ed3e585289cdbcf20b7097a03784684ba35f4b', 0, 'mesaentrada'),
(37, 1, 789456, 'jose', 'martinez', '2015-12-22 09:17:22', 'jose@jose.com', '$5$rounds=1000$4a84dd2e520a63ea$klZK8j3sTSuYeughxCLgPq9ksxw2esJszwKNzCoCUjC', '4a84dd2e520a63ea0be3190a8e3dc88241a155bc', 0, 'mesaentrada'),
(40, 3, 8545855, 'Rut', 'rut', '2015-12-22 09:50:56', 'rut@rut.com', '$5$rounds=1000$f2863716cd0207e6$eUpfqMtjvwOOnDdQQuoP.BH9xZF07LKZaeaAzfmP0r6', 'f2863716cd0207e671b9468d5a7a1ac43496af56', 0, 'mesaentrada'),
(41, 2, 852456, 'Carlos', 'Blanco', '2015-12-22 10:04:01', 'carlos@carlos.com', '$5$rounds=1000$1181257c8d93e323$yqEIjBZ1Uv.4EH9eoW4p8fQ3VyXnXFVAv6zg0kN1VV/', '1181257c8d93e3232fc2caa7dd7ea159e8c3a6b1', 0, 'director'),
(43, 1, 8976465, 'ricardo', 'luz', '2015-12-22 10:50:58', 'ricardo@ricardo', '$5$rounds=1000$1019e07b129c399c$PtnyOC14Le64vambaDacAcEHrreyxERuWNKScRtV9gC', '1019e07b129c399c3ebdc515ba92eebaf3a0c11a', 1, 'mesaentrada'),
(44, 1, 122456456, 'ester', 'es', '2015-12-22 10:53:37', 'ester@ester.com', '$5$rounds=1000$6a70165c3b4d027f$o2Lj7.T/.zGjQPthYEMykKDUG2dcSv1FOi/TF25jOv4', '6a70165c3b4d027f2a3d1192e5eff0a10bb74a6c', 0, 'mesaentrada'),
(45, 3, 8524556, 'kevin', 'lusss', '2015-12-22 10:59:03', 'kevin@kevin.com', '$5$rounds=1000$7f7bb2f169c81518$OYGm/nMpUWCojB89MBGrWPGJZXc0qrDWZSu966ei9W3', '7f7bb2f169c8151828ecb91eb19cfd0251ee0cba', 1, 'asistentesocial'),
(46, 3, 952363541, 'celia', 'celia', '2015-12-22 11:00:16', 'celia@celia.com', '$5$rounds=1000$643b4c546d8e936f$FgB4ajKPCpa1igeSnSrW.Zf7TJU/WEkN0YLPYLsFpf7', '643b4c546d8e936f651a69530405fed3763c2fab', 1, 'asistentesocial'),
(47, 3, 852526645, 'ale', 'boiser', '2015-12-22 11:21:59', 'ale@ale.com', '$5$rounds=1000$e73215eddea62597$CuZeVsykvusPI6Tl8CyFD3PsfKr7nFqi2CLfZINpbnB', 'e73215eddea625974cf53efa0656a63d9efff92d', 1, 'asistentesocial'),
(48, 1, 9515552, 'luz', 'maria', '2015-12-22 11:23:16', 'luz@luz.com', '$5$rounds=1000$7ff3a1ebb9d8b939$ngjRFxCfyhYbRha4TByr4RKc/oYnBUoSOe3EniS1xv0', '7ff3a1ebb9d8b93953efd59333f136f89e573808', 1, 'mesaentrada'),
(49, 3, 35492374, 'Alejandra', 'Ojeda', '2016-01-19 16:10:37', 'alejandra@politicasocial.com', '$5$rounds=1000$4b54ba36d8cf7f72$zZ0C8aPVCB02xzWE2gMkPTXKHAQ4iP31VU4rUY89KfA', '4b54ba36d8cf7f72cf429271aa4c42284585ef15', 1, 'asistentesocial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EstadoCivil`
--

CREATE TABLE IF NOT EXISTS `EstadoCivil` (
  `idEstado` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `EstadoCivil`
--

INSERT INTO `EstadoCivil` (`idEstado`, `descripcion`) VALUES
(1, 'Casado/a'),
(2, 'Soltero/a'),
(3, 'Divorciado/a'),
(4, 'Viudo/a'),
(5, 'Concubinato/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Familia`
--

CREATE TABLE IF NOT EXISTS `Familia` (
  `idprof` int(11) DEFAULT NULL,
  `idrel` int(11) DEFAULT NULL,
  `nroF` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lugnac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechanac` datetime NOT NULL,
  `idEstcivil` int(11) DEFAULT NULL,
  `idEd` int(11) DEFAULT NULL,
  `idben` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Familia`
--

INSERT INTO `Familia` (`idprof`, `idrel`, `nroF`, `dni`, `nombre`, `apellido`, `lugnac`, `fechanac`, `idEstcivil`, `idEd`, `idben`) VALUES
(2, 2, 1, 28992361, 'Fabricio', 'Lorenzo', 'Catriel', '1980-08-25 00:00:00', 5, 8, 2),
(23, 3, 2, 39152114, 'Guillermo Jhonathan', 'Mandioca', 'Catriel', '2003-02-19 00:00:00', 2, 17, 2),
(52, 3, 3, 41258963, 'Jennyfer Thalia', 'Lorenzo Mandioca', 'Catriel', '2015-08-08 00:00:00', 2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gas`
--

CREATE TABLE IF NOT EXISTS `Gas` (
  `idGas` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Gas`
--

INSERT INTO `Gas` (`idGas`, `descripcion`) VALUES
(1, 'Gas de red'),
(2, 'Gas a Granel'),
(3, 'Gas en tubo'),
(4, 'Gas en  Garrafa'),
(5, 'Electricidad'),
(6, 'Leña y carbon'),
(7, 'Leña'),
(8, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Luz`
--

CREATE TABLE IF NOT EXISTS `Luz` (
  `idLuz` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Luz`
--

INSERT INTO `Luz` (`idLuz`, `descripcion`) VALUES
(1, 'Red Eléctrica '),
(2, 'Generación Propia a motor'),
(3, 'Generación propia por otros medios '),
(4, 'No Tiene');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `idModulo` int(11) NOT NULL,
  `nombre` varchar(140) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pared`
--

CREATE TABLE IF NOT EXISTS `Pared` (
  `idPared` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Pared`
--

INSERT INTO `Pared` (`idPared`, `descripcion`) VALUES
(1, 'Ladrillo'),
(2, 'piedra'),
(3, 'Bloque'),
(4, 'Hormigón'),
(5, 'Adobe'),
(6, 'Madera'),
(7, 'Chapa de Metal'),
(8, 'Fibrocemento'),
(9, 'Cartón'),
(10, 'Palma'),
(11, 'Paja'),
(12, 'Material de Desecho'),
(13, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesion`
--

CREATE TABLE IF NOT EXISTS `Profesion` (
  `idProfesion` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Profesion`
--

INSERT INTO `Profesion` (`idProfesion`, `descripcion`) VALUES
(1, 'Adminstrador/a'),
(2, 'Albañir'),
(3, 'Almacenero'),
(4, 'Ama de Casa'),
(5, 'Asistente'),
(6, 'Barrendero/a'),
(7, 'Bibliotecario'),
(8, 'Bombero'),
(9, 'Biologo'),
(10, 'Bioquimico'),
(11, 'Botanico'),
(12, 'Camionero'),
(13, 'Carnicero'),
(14, 'Cartero'),
(15, 'Carpinetero'),
(16, 'Cocinero'),
(17, 'Comisionista'),
(18, 'Conserje'),
(19, 'Delegado'),
(20, 'Dentista'),
(21, 'Electricista'),
(22, 'Enfermero'),
(23, 'Estudiante'),
(24, 'Estilista'),
(25, 'Farmaceutico'),
(26, 'Florista'),
(27, 'Fotografo'),
(28, 'Gasista'),
(29, 'Granjero'),
(30, 'Jardinero'),
(31, 'Maestro'),
(32, 'Mecanico'),
(33, 'Mesero/a'),
(34, 'Panadero'),
(35, 'Pescador'),
(36, 'Plomero'),
(37, 'Policia'),
(38, 'Portero'),
(39, 'Profesor'),
(40, 'Recepcionista'),
(41, 'Radiotecnico'),
(42, 'Radiotelefonista'),
(43, 'Sastre'),
(44, 'Secretario/a'),
(45, 'Taxista'),
(46, 'Tecnico'),
(47, 'Telefonista'),
(48, 'Vendedor'),
(49, 'Veterinario'),
(50, 'Viticultor'),
(51, 'Zapatero'),
(52, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Registro`
--

CREATE TABLE IF NOT EXISTS `Registro` (
  `idRegistro` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fechaEntrega` datetime NOT NULL,
  `beneficiarioId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RegistroDeEntrega`
--

CREATE TABLE IF NOT EXISTS `RegistroDeEntrega` (
  `idRegistro` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fechaEntrega` datetime NOT NULL,
  `beneficiarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RegistroOtro`
--

CREATE TABLE IF NOT EXISTS `RegistroOtro` (
  `idRegistro` int(11) NOT NULL,
  `otro` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Relacion`
--

CREATE TABLE IF NOT EXISTS `Relacion` (
  `idRelacion` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Relacion`
--

INSERT INTO `Relacion` (`idRelacion`, `descripcion`) VALUES
(1, 'Esposa/o'),
(2, 'Conyuge'),
(3, 'Hijo/a'),
(4, 'Yerno'),
(5, 'Nuera'),
(6, 'Nieto/a'),
(7, 'Padre'),
(8, 'Madre'),
(9, 'Suegro/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sanidad`
--

CREATE TABLE IF NOT EXISTS `Sanidad` (
  `idben` int(11) DEFAULT NULL,
  `idSanidad` int(11) NOT NULL,
  `cobertura` tinyint(1) DEFAULT NULL,
  `obraS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `famOS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `atenHC` tinyint(1) DEFAULT NULL,
  `otroCS` tinyint(1) DEFAULT NULL,
  `nomCS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discapacidad` tinyint(1) DEFAULT NULL,
  `famDisc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificado` tinyint(1) DEFAULT NULL,
  `detalles` longtext COLLATE utf8_unicode_ci,
  `observacion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Sanidad`
--

INSERT INTO `Sanidad` (`idben`, `idSanidad`, `cobertura`, `obraS`, `famOS`, `atenHC`, `otroCS`, `nomCS`, `discapacidad`, `famDisc`, `tipo`, `certificado`, `detalles`, `observacion`) VALUES
(2, 1, 0, '', '', 1, 0, '', 1, 'Guillermo', 'Sindrome de Down', 1, 'El niño nació con problemas de respiración ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `nombre`) VALUES
(1, 'Mesa de Entrada'),
(2, 'Direccion'),
(3, 'Asistente Social'),
(7, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Suelo`
--

CREATE TABLE IF NOT EXISTS `Suelo` (
  `idSuelo` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Suelo`
--

INSERT INTO `Suelo` (`idSuelo`, `descripcion`) VALUES
(1, 'Cerámica'),
(2, 'Baldosa'),
(3, 'Mosaico'),
(4, 'Mármol'),
(5, 'Madera'),
(6, 'Alfombrado'),
(7, 'Cemento'),
(8, 'Ladrillo Fijo'),
(9, 'Tierra'),
(10, 'Ladrillo Suelto'),
(11, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Techo`
--

CREATE TABLE IF NOT EXISTS `Techo` (
  `idTecho` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Techo`
--

INSERT INTO `Techo` (`idTecho`, `descripcion`) VALUES
(1, 'Cubierta asfáltica'),
(2, 'Membrana'),
(3, 'Losa sin Cubierta'),
(4, 'Teja'),
(5, 'Chapa de metal sin cubierta'),
(6, 'Chapa de Fibrocemento'),
(7, 'Chapa de plastico'),
(8, 'Chapa de Carton'),
(9, 'Caña'),
(10, 'Paja sin barro'),
(11, 'Paja con barro'),
(12, 'Palma'),
(13, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tenencia`
--

CREATE TABLE IF NOT EXISTS `Tenencia` (
  `idTenencia` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Tenencia`
--

INSERT INTO `Tenencia` (`idTenencia`, `descripcion`) VALUES
(1, 'Propia'),
(2, 'Alquilada'),
(3, 'Prestada'),
(4, 'Cedida'),
(5, 'Otra Situación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vivienda`
--

CREATE TABLE IF NOT EXISTS `Vivienda` (
  `idben` int(11) DEFAULT NULL,
  `idciel` int(11) DEFAULT NULL,
  `idVivienda` int(11) NOT NULL,
  `montAlq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `propAlq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiemAlq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cedida` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terrPropio` tinyint(1) DEFAULT NULL,
  `terrPago` tinyint(1) DEFAULT NULL,
  `escritura` tinyint(1) DEFAULT NULL,
  `habitacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pieza` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `baño` tinyint(1) DEFAULT NULL,
  `dasague` tinyint(1) DEFAULT NULL,
  `boton` tinyint(1) DEFAULT NULL,
  `uso` tinyint(1) DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cama` tinyint(1) DEFAULT NULL,
  `camcant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mesa` tinyint(1) DEFAULT NULL,
  `cocina` tinyint(1) DEFAULT NULL,
  `heladera` tinyint(1) DEFAULT NULL,
  `obser1` longtext COLLATE utf8_unicode_ci,
  `luz` tinyint(1) DEFAULT NULL,
  `agua` tinyint(1) DEFAULT NULL,
  `gas` tinyint(1) DEFAULT NULL,
  `obser2` longtext COLLATE utf8_unicode_ci,
  `auto` tinyint(1) DEFAULT NULL,
  `modelo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `año` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otraPropiedad` tinyint(1) DEFAULT NULL,
  `detalleprop` longtext COLLATE utf8_unicode_ci,
  `idTen` int(11) DEFAULT NULL,
  `idDes` int(11) DEFAULT NULL,
  `idLuz` int(11) DEFAULT NULL,
  `idAg` int(11) DEFAULT NULL,
  `idAglg` int(11) DEFAULT NULL,
  `idG` int(11) DEFAULT NULL,
  `idMuro` int(11) DEFAULT NULL,
  `idS` int(11) DEFAULT NULL,
  `idTec` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `Vivienda`
--

INSERT INTO `Vivienda` (`idben`, `idciel`, `idVivienda`, `montAlq`, `propAlq`, `tiemAlq`, `cedida`, `terrPropio`, `terrPago`, `escritura`, `habitacion`, `pieza`, `baño`, `dasague`, `boton`, `uso`, `ubicacion`, `estado`, `cama`, `camcant`, `mesa`, `cocina`, `heladera`, `obser1`, `luz`, `agua`, `gas`, `obser2`, `auto`, `modelo`, `año`, `otraPropiedad`, `detalleprop`, `idTen`, `idDes`, `idLuz`, `idAg`, `idAglg`, `idG`, `idMuro`, `idS`, `idTec`) VALUES
(2, 3, 1, '4500', 'Jose Perez', '1 año', '', 0, 0, 0, '2', '3', 1, NULL, 1, 1, 'Interno', 'Semi instalado', 1, '3', 1, 1, 1, '', 1, 1, 1, '', 1, 'Fiat', '1991', 0, '', 2, 2, 1, 1, 1, 1, 6, 5, 5),
(1, 4, 2, '', '', '', '', 0, 0, 0, '1', '2', 0, NULL, 0, 0, 'externo', 'Semi instalado', 1, '1', 1, 0, 0, '', 0, 0, 0, 'La persona se encuentra allegado a un toma, en el lote que se encuentra cercano al Río Colorado.\r\nPor tal razón no presenta titulo de dominio de la "casa" y terreno. No posee ningún tipo de otros bienes.\r\nLa construcción de la casa es totalmente precaria', 0, '', '', 0, '', 5, 4, 4, 3, 7, 7, 9, 9, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Agua`
--
ALTER TABLE `Agua`
  ADD PRIMARY KEY (`idAgua`);

--
-- Indices de la tabla `AguaLug`
--
ALTER TABLE `AguaLug`
  ADD PRIMARY KEY (`idAguaLug`);

--
-- Indices de la tabla `Beneficiario`
--
ALTER TABLE `Beneficiario`
  ADD PRIMARY KEY (`idBeneficiario`),
  ADD UNIQUE KEY `UNIQ_F0E16DEF7F8F253B` (`dni`),
  ADD KEY `IDX_F0E16DEFDB4282E7` (`idEstcivil`),
  ADD KEY `IDX_F0E16DEFEF651A68` (`idEd`),
  ADD KEY `IDX_F0E16DEF8875811B` (`idprof`);

--
-- Indices de la tabla `CieloR`
--
ALTER TABLE `CieloR`
  ADD PRIMARY KEY (`idCieloR`);

--
-- Indices de la tabla `Desague`
--
ALTER TABLE `Desague`
  ADD PRIMARY KEY (`idDesague`);

--
-- Indices de la tabla `DetalleDeEntrega`
--
ALTER TABLE `DetalleDeEntrega`
  ADD PRIMARY KEY (`idDetalle`),
  ADD UNIQUE KEY `UNIQ_AB7A9CDA908017C2` (`idDetalle`),
  ADD KEY `IDX_AB7A9CDAD3C390D` (`beneficiarioId`);

--
-- Indices de la tabla `Economia`
--
ALTER TABLE `Economia`
  ADD PRIMARY KEY (`idEconomia`),
  ADD UNIQUE KEY `UNIQ_CC610F3D1F974E86` (`idben`);

--
-- Indices de la tabla `Educacion`
--
ALTER TABLE `Educacion`
  ADD PRIMARY KEY (`idEducacion`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D9D9BF52BF396750` (`id`),
  ADD UNIQUE KEY `UNIQ_D9D9BF527F8F253B` (`dni`),
  ADD KEY `IDX_D9D9BF52DE95C867` (`sector_id`);

--
-- Indices de la tabla `EstadoCivil`
--
ALTER TABLE `EstadoCivil`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `Familia`
--
ALTER TABLE `Familia`
  ADD PRIMARY KEY (`nroF`),
  ADD KEY `IDX_91D4FBD3DB4282E7` (`idEstcivil`),
  ADD KEY `IDX_91D4FBD3EF651A68` (`idEd`),
  ADD KEY `IDX_91D4FBD38875811B` (`idprof`),
  ADD KEY `IDX_91D4FBD3EDBF8CDA` (`idrel`),
  ADD KEY `IDX_91D4FBD31F974E86` (`idben`);

--
-- Indices de la tabla `Gas`
--
ALTER TABLE `Gas`
  ADD PRIMARY KEY (`idGas`);

--
-- Indices de la tabla `Luz`
--
ALTER TABLE `Luz`
  ADD PRIMARY KEY (`idLuz`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idModulo`),
  ADD UNIQUE KEY `UNIQ_EB5DCA008FE067AC` (`idModulo`);

--
-- Indices de la tabla `Pared`
--
ALTER TABLE `Pared`
  ADD PRIMARY KEY (`idPared`);

--
-- Indices de la tabla `Profesion`
--
ALTER TABLE `Profesion`
  ADD PRIMARY KEY (`idProfesion`);

--
-- Indices de la tabla `Registro`
--
ALTER TABLE `Registro`
  ADD PRIMARY KEY (`idRegistro`),
  ADD UNIQUE KEY `UNIQ_C00ACA0D6ADF8200` (`idRegistro`),
  ADD KEY `IDX_C00ACA0DD3C390D` (`beneficiarioId`);

--
-- Indices de la tabla `RegistroDeEntrega`
--
ALTER TABLE `RegistroDeEntrega`
  ADD PRIMARY KEY (`idRegistro`),
  ADD UNIQUE KEY `UNIQ_E571AAA16ADF8200` (`idRegistro`),
  ADD KEY `IDX_E571AAA1D3C390D` (`beneficiarioId`);

--
-- Indices de la tabla `RegistroOtro`
--
ALTER TABLE `RegistroOtro`
  ADD PRIMARY KEY (`idRegistro`),
  ADD UNIQUE KEY `UNIQ_7E16D1376ADF8200` (`idRegistro`);

--
-- Indices de la tabla `Relacion`
--
ALTER TABLE `Relacion`
  ADD PRIMARY KEY (`idRelacion`);

--
-- Indices de la tabla `Sanidad`
--
ALTER TABLE `Sanidad`
  ADD PRIMARY KEY (`idSanidad`),
  ADD UNIQUE KEY `UNIQ_55321D551F974E86` (`idben`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Suelo`
--
ALTER TABLE `Suelo`
  ADD PRIMARY KEY (`idSuelo`);

--
-- Indices de la tabla `Techo`
--
ALTER TABLE `Techo`
  ADD PRIMARY KEY (`idTecho`);

--
-- Indices de la tabla `Tenencia`
--
ALTER TABLE `Tenencia`
  ADD PRIMARY KEY (`idTenencia`);

--
-- Indices de la tabla `Vivienda`
--
ALTER TABLE `Vivienda`
  ADD PRIMARY KEY (`idVivienda`),
  ADD UNIQUE KEY `UNIQ_D489C9881F974E86` (`idben`),
  ADD KEY `IDX_D489C9883F71D7A4` (`idTen`),
  ADD KEY `IDX_D489C9884051180D` (`idDes`),
  ADD KEY `IDX_D489C9887D5CE340` (`idLuz`),
  ADD KEY `IDX_D489C98812008ED6` (`idAg`),
  ADD KEY `IDX_D489C98886251C11` (`idAglg`),
  ADD KEY `IDX_D489C988516E532D` (`idG`),
  ADD KEY `IDX_D489C9889CB635A` (`idMuro`),
  ADD KEY `IDX_D489C9884BB48750` (`idS`),
  ADD KEY `IDX_D489C98841C0AB19` (`idTec`),
  ADD KEY `IDX_D489C988C090346F` (`idciel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Agua`
--
ALTER TABLE `Agua`
  MODIFY `idAgua` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `AguaLug`
--
ALTER TABLE `AguaLug`
  MODIFY `idAguaLug` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `Beneficiario`
--
ALTER TABLE `Beneficiario`
  MODIFY `idBeneficiario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `CieloR`
--
ALTER TABLE `CieloR`
  MODIFY `idCieloR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Desague`
--
ALTER TABLE `Desague`
  MODIFY `idDesague` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `DetalleDeEntrega`
--
ALTER TABLE `DetalleDeEntrega`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Economia`
--
ALTER TABLE `Economia`
  MODIFY `idEconomia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Educacion`
--
ALTER TABLE `Educacion`
  MODIFY `idEducacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `EstadoCivil`
--
ALTER TABLE `EstadoCivil`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Familia`
--
ALTER TABLE `Familia`
  MODIFY `nroF` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Gas`
--
ALTER TABLE `Gas`
  MODIFY `idGas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `Luz`
--
ALTER TABLE `Luz`
  MODIFY `idLuz` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Pared`
--
ALTER TABLE `Pared`
  MODIFY `idPared` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `Profesion`
--
ALTER TABLE `Profesion`
  MODIFY `idProfesion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `Registro`
--
ALTER TABLE `Registro`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `RegistroDeEntrega`
--
ALTER TABLE `RegistroDeEntrega`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `RegistroOtro`
--
ALTER TABLE `RegistroOtro`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Relacion`
--
ALTER TABLE `Relacion`
  MODIFY `idRelacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `Sanidad`
--
ALTER TABLE `Sanidad`
  MODIFY `idSanidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Suelo`
--
ALTER TABLE `Suelo`
  MODIFY `idSuelo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `Techo`
--
ALTER TABLE `Techo`
  MODIFY `idTecho` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `Tenencia`
--
ALTER TABLE `Tenencia`
  MODIFY `idTenencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Vivienda`
--
ALTER TABLE `Vivienda`
  MODIFY `idVivienda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Beneficiario`
--
ALTER TABLE `Beneficiario`
  ADD CONSTRAINT `FK_F0E16DEF8875811B` FOREIGN KEY (`idprof`) REFERENCES `Profesion` (`idProfesion`),
  ADD CONSTRAINT `FK_F0E16DEFDB4282E7` FOREIGN KEY (`idEstcivil`) REFERENCES `EstadoCivil` (`idEstado`),
  ADD CONSTRAINT `FK_F0E16DEFEF651A68` FOREIGN KEY (`idEd`) REFERENCES `Educacion` (`idEducacion`);

--
-- Filtros para la tabla `Economia`
--
ALTER TABLE `Economia`
  ADD CONSTRAINT `FK_CC610F3D1F974E86` FOREIGN KEY (`idben`) REFERENCES `Beneficiario` (`idBeneficiario`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_D9D9BF52DE95C867` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`);

--
-- Filtros para la tabla `Familia`
--
ALTER TABLE `Familia`
  ADD CONSTRAINT `FK_91D4FBD31F974E86` FOREIGN KEY (`idben`) REFERENCES `Beneficiario` (`idBeneficiario`),
  ADD CONSTRAINT `FK_91D4FBD38875811B` FOREIGN KEY (`idprof`) REFERENCES `Profesion` (`idProfesion`),
  ADD CONSTRAINT `FK_91D4FBD3DB4282E7` FOREIGN KEY (`idEstcivil`) REFERENCES `EstadoCivil` (`idEstado`),
  ADD CONSTRAINT `FK_91D4FBD3EDBF8CDA` FOREIGN KEY (`idrel`) REFERENCES `Relacion` (`idRelacion`),
  ADD CONSTRAINT `FK_91D4FBD3EF651A68` FOREIGN KEY (`idEd`) REFERENCES `Educacion` (`idEducacion`);

--
-- Filtros para la tabla `Sanidad`
--
ALTER TABLE `Sanidad`
  ADD CONSTRAINT `FK_55321D551F974E86` FOREIGN KEY (`idben`) REFERENCES `Beneficiario` (`idBeneficiario`);

--
-- Filtros para la tabla `Vivienda`
--
ALTER TABLE `Vivienda`
  ADD CONSTRAINT `FK_D489C98812008ED6` FOREIGN KEY (`idAg`) REFERENCES `Agua` (`idAgua`),
  ADD CONSTRAINT `FK_D489C9881F974E86` FOREIGN KEY (`idben`) REFERENCES `Beneficiario` (`idBeneficiario`),
  ADD CONSTRAINT `FK_D489C9883F71D7A4` FOREIGN KEY (`idTen`) REFERENCES `Tenencia` (`idTenencia`),
  ADD CONSTRAINT `FK_D489C9884051180D` FOREIGN KEY (`idDes`) REFERENCES `Desague` (`idDesague`),
  ADD CONSTRAINT `FK_D489C98841C0AB19` FOREIGN KEY (`idTec`) REFERENCES `Techo` (`idTecho`),
  ADD CONSTRAINT `FK_D489C9884BB48750` FOREIGN KEY (`idS`) REFERENCES `Suelo` (`idSuelo`),
  ADD CONSTRAINT `FK_D489C988516E532D` FOREIGN KEY (`idG`) REFERENCES `Gas` (`idGas`),
  ADD CONSTRAINT `FK_D489C9887D5CE340` FOREIGN KEY (`idLuz`) REFERENCES `Luz` (`idLuz`),
  ADD CONSTRAINT `FK_D489C98886251C11` FOREIGN KEY (`idAglg`) REFERENCES `AguaLug` (`idAguaLug`),
  ADD CONSTRAINT `FK_D489C9889CB635A` FOREIGN KEY (`idMuro`) REFERENCES `Pared` (`idPared`),
  ADD CONSTRAINT `FK_D489C988C090346F` FOREIGN KEY (`idciel`) REFERENCES `CieloR` (`idCieloR`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
