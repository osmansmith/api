-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2016 a las 05:26:10
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `licitacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjudicacion`
--

CREATE TABLE IF NOT EXISTS `adjudicacion` (
  `id_adjudicacion` int(11) NOT NULL AUTO_INCREMENT,
  `tip_adjudicacion` int(11) DEFAULT NULL,
  `fec_adjudicacion` datetime DEFAULT NULL,
  `num_adjudicacion` varchar(100) DEFAULT NULL,
  `numofe_adjudicacion` int(11) DEFAULT NULL,
  `url_adjudicacion` text,
  PRIMARY KEY (`id_adjudicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

CREATE TABLE IF NOT EXISTS `comprador` (
  `id_comprador` int(11) NOT NULL AUTO_INCREMENT,
  `cod_org_comprador` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nom_org_comprador` varchar(510) CHARACTER SET utf8 DEFAULT NULL,
  `rut_uni_comprador` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cod_uni_comprador` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nom_uni_comprador` varchar(510) CHARACTER SET utf8 DEFAULT NULL,
  `dir_uni_comprador` varchar(510) CHARACTER SET utf8 DEFAULT NULL,
  `com_uni_comprador` varchar(510) CHARACTER SET utf8 DEFAULT NULL,
  `reg_uni_comprador` varchar(510) CHARACTER SET utf8 DEFAULT NULL,
  `rut_usu_comprador` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cod_usu_comprador` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nom_usu_comprador` text,
  `car_usu_comprador` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_comprador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `diacie_estado` int(11) DEFAULT NULL,
  `inf_estado` bit(1) DEFAULT NULL,
  `codtip_estado` int(11) DEFAULT NULL,
  `tip_estado` varchar(20) DEFAULT NULL,
  `tipcon_estado` int(11) DEFAULT NULL,
  `mon_estado` varchar(100) DEFAULT NULL,
  `eta_estado` int(11) DEFAULT NULL,
  `esteta_estado` int(11) DEFAULT NULL,
  `tomraz_estado` int(11) DEFAULT NULL,
  `estpubofe_estado` smallint(2) DEFAULT NULL,
  `juspub_estado` varchar(500) DEFAULT NULL,
  `estcs_estado` int(11) DEFAULT NULL,
  `con_estado` int(11) DEFAULT NULL,
  `obr_estado` int(11) DEFAULT NULL,
  `canrec_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE IF NOT EXISTS `fecha` (
  `id_fecha` int(11) NOT NULL AUTO_INCREMENT,
  `creacion_fecha` datetime DEFAULT NULL,
  `cierre_fecha` datetime DEFAULT NULL,
  `inicio_fecha` datetime DEFAULT NULL,
  `final_fecha` datetime DEFAULT NULL,
  `pubres_fecha` datetime DEFAULT NULL,
  `actapetec_fecha` datetime DEFAULT NULL,
  `actapeeco_fecha` datetime DEFAULT NULL,
  `pub_fecha` datetime DEFAULT NULL,
  `adj_fecha` datetime DEFAULT NULL,
  `estadj_fecha` datetime DEFAULT NULL,
  `sopfis_fecha` datetime DEFAULT NULL,
  `tieeva_fecha` datetime DEFAULT NULL,
  `estfir_fecha` datetime DEFAULT NULL,
  `usu_fecha` datetime DEFAULT NULL,
  `vister_fecha` datetime DEFAULT NULL,
  `entant_fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general`
--

CREATE TABLE IF NOT EXISTS `general` (
  `id_general` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad_general` int(11) DEFAULT NULL,
  `fecha_general` datetime DEFAULT NULL,
  `version_general` text,
  PRIMARY KEY (`id_general`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licitacion`
--

CREATE TABLE IF NOT EXISTS `licitacion` (
  `id_licitacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_adjudicacion` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_fecha` int(11) NOT NULL,
  `id_general` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_producto_servicio` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `codext_licitacion` varchar(100) DEFAULT NULL,
  `nom_licitacion` varchar(255) DEFAULT NULL,
  `codest_licitacion` int(11) DEFAULT NULL,
  `des_licitacion` varchar(510) DEFAULT NULL,
  `feccie_licitacion` datetime DEFAULT NULL,
  `est_licitacion` varchar(510) DEFAULT NULL,
  PRIMARY KEY (`id_licitacion`),
  KEY `id_adjudicacion` (`id_adjudicacion`,`id_comprador`,`id_estado`,`id_fecha`,`id_general`,`id_pago`,`id_producto_servicio`,`id_proveedor`,`id_responsable`),
  KEY `id_comprador` (`id_comprador`),
  KEY `id_estado` (`id_estado`),
  KEY `id_fecha` (`id_fecha`),
  KEY `id_general` (`id_general`),
  KEY `id_pago` (`id_pago`),
  KEY `id_producto_servicio` (`id_producto_servicio`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_responsable` (`id_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `unitieeva_pago` int(4) DEFAULT NULL,
  `dirvis_pago` varchar(500) DEFAULT NULL,
  `dirent_pago` varchar(500) DEFAULT NULL,
  `est_pago` varchar(500) DEFAULT NULL,
  `fuefin_pago` int(4) DEFAULT NULL,
  `vismon_pago` bit(1) DEFAULT NULL,
  `monest_pago` double DEFAULT NULL,
  `tie_pago` varchar(100) DEFAULT NULL,
  `unitie_pago` int(4) DEFAULT NULL,
  `mod_pago` int(4) DEFAULT NULL,
  `tippag_pago` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_servicio`
--

CREATE TABLE IF NOT EXISTS `producto_servicio` (
  `id_producto_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `cannum_producto_servicio` int(11) DEFAULT NULL,
  `cor_producto_servicio` int(11) DEFAULT NULL,
  `codpro_producto_servicio` int(11) DEFAULT NULL,
  `codcat_producto_servicio` varchar(100) DEFAULT NULL,
  `cat_producto_servicio` varchar(400) DEFAULT NULL,
  `nompro_producto_servicio` varchar(510) DEFAULT NULL,
  `des_producto_servicio` varchar(510) DEFAULT NULL,
  `unimed_producto_servicio` varchar(510) DEFAULT NULL,
  `can_producto_servicio` float DEFAULT NULL,
  PRIMARY KEY (`id_producto_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `rut_proveedor` varchar(100) DEFAULT NULL,
  `nombre_proveedor` varchar(500) DEFAULT NULL,
  `cantidad_proveedor` varchar(500) DEFAULT NULL,
  `monto_proveedor` float DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `id_responsable` int(11) NOT NULL AUTO_INCREMENT,
  `nomrespag_responsable` varchar(200) DEFAULT NULL,
  `emarespag_responsable` varchar(200) DEFAULT NULL,
  `nomrescon_responsable` varchar(200) DEFAULT NULL,
  `emarescon_responsable` varchar(200) DEFAULT NULL,
  `fonrescon_responsable` varchar(200) DEFAULT NULL,
  `procon_responsable` varchar(510) DEFAULT NULL,
  `sub_responsable` bit(1) DEFAULT NULL,
  `unitiedurcon_responsable` int(11) DEFAULT NULL,
  `tiedurcon_responsable` int(11) DEFAULT NULL,
  `tipdurcon_responsable` varchar(510) DEFAULT NULL,
  `jusmonest_responsable` varchar(255) DEFAULT NULL,
  `obscon_responsable` text,
  `extpla_responsable` smallint(2) DEFAULT NULL,
  `esbastip_responsable` bit(1) DEFAULT NULL,
  `unitieconlic_responsable` int(11) DEFAULT NULL,
  `esren_responsable` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `licitacion`
--
ALTER TABLE `licitacion`
  ADD CONSTRAINT `RESPONSABILIZA` FOREIGN KEY (`id_responsable`) REFERENCES `responsable` (`id_responsable`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ADJUDICA` FOREIGN KEY (`id_adjudicacion`) REFERENCES `adjudicacion` (`id_adjudicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CALIFICA` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CARACTERIZA` FOREIGN KEY (`id_general`) REFERENCES `general` (`id_general`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `COMPRA` FOREIGN KEY (`id_comprador`) REFERENCES `comprador` (`id_comprador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `INFORMA` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id_fecha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PAGA` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PRODUCE` FOREIGN KEY (`id_producto_servicio`) REFERENCES `producto_servicio` (`id_producto_servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PROVEE` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
