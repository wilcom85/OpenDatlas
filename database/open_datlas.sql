-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2014 at 07:04 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `open_datlas`
--
CREATE DATABASE IF NOT EXISTS `open_datlas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `open_datlas`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerDatasetsDepto`(idDep int)
select * from opendata as o  
            inner join departamentos as d on (o.fk_id_depmun = d.codigoDane)
    where fk_id_depmun = idDep$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerDatasetsMunicipio`(idMun int)
select * from opendata as o  
            inner join municipios as m on (o.fk_id_depmun = m.codigoDane)
    where fk_id_depmun = idMun$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `codigoDane` int(11) DEFAULT NULL,
  `nombre` text NOT NULL,
  `googlemap` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`codigoDane`, `nombre`, `googlemap`) VALUES
(5, 'ANTIOQUIA', NULL),
(8, 'ATLÁNTICO', NULL),
(11, 'BOGOTÁ', NULL),
(13, 'BOLIVAR', NULL),
(15, 'BOYACÁ', NULL),
(17, 'CALDAS', NULL),
(18, 'CAQUETÁ', NULL),
(19, 'CAUCA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2041357.2783271861!2d-76.83763269999996!3d2.1437500000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2fc88eecc8b6ed%3A0x628742ce26b7fc7f!2sCauca!5e0!3m2!1ses!2ses!4v1404759354470'),
(20, 'CESAR', NULL),
(23, 'CORDOBA', NULL),
(25, 'CUNDINAMARCA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2035676.8336641241!2d-73.970755!3d4.7818000000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f28eb1616af2b%3A0x933cbcb5fad108ed!2sCundinamarca!5e0!3m2!1sen!2ses!4v1404152660620'),
(27, 'CHOCO', NULL),
(41, 'HUILA', NULL),
(44, 'LA GUAJIRA', NULL),
(47, 'MAGDALENA', NULL),
(50, 'META', NULL),
(52, 'NARIÑO', NULL),
(54, 'NORTE DE SANTANDER', NULL),
(63, 'QUINDIO', NULL),
(66, 'RISARALDA', NULL),
(68, 'SANTANDER', NULL),
(70, 'SUCRE', NULL),
(73, 'TOLIMA', NULL),
(76, 'VALLE DEL CAUCA', NULL),
(81, 'ARAUCA', NULL),
(85, 'CASANARE', NULL),
(86, 'PUTUMAYO', NULL),
(88, 'SAN ANDRES', NULL),
(91, 'AMAZONAS', NULL),
(94, 'GUAINÍA', NULL),
(95, 'GUAVIARE', NULL),
(97, 'VAUPES', NULL),
(99, 'VICHADA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4072807.0737674497!2d-69.24374!3d4.530714999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e0cb8c960064c2f%3A0xeab4c3e89eec144a!2sDepartamento+del+Vichada!5e0!3m2!1ses!2ses!4v1404759094858');

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `codigoDane` int(11) DEFAULT NULL,
  `nombre` bit(1) NOT NULL,
  `fk_id_depto` int(11) NOT NULL,
  `googleMap` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `opendata`
--

CREATE TABLE IF NOT EXISTS `opendata` (
  `id` int(11) NOT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `fk_id_depmun` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opendata`
--

INSERT INTO `opendata` (`id`, `url`, `fk_id_depmun`, `nombre`) VALUES
(0, 'http://servicedatosabiertoscolombia.cloudapp.net/v1/Gobernacion_de_Cundinamarca/datasetdirectorioalcaldiasmunicipioscundinamarca?&$format=json', 25, 'Directorio Alcaldías Cund'),
(1, 'http://servicedatosabiertoscolombia.cloudapp.net/v1/Gobernacion_de_Cundinamarca/directorioestablecimientoseducacioncundinamarca?&$format=json', 25, 'Establecimientos Educativos cund'),
(2, 'http://servicedatosabiertoscolombia.cloudapp.net/v1/Gobernacion_del_Vichada/apdadatasetgobernacionvichada?&$format=json', 99, 'Resguardos Indígenas de Vichada'),
(3, 'http://servicedatosabiertoscolombia.cloudapp.net/v1/Gobernacion_del_Cauca/directoriopublico?&$format=json', 19, 'Directorio P&uacute;blico del Cauca'),
(5, 'http://servicedatosabiertoscolombia.cloudapp.net/v1/Gobernacion_del_Cauca/plandemejoramiento?&$format=json', 19, 'Pl&aacute;n de Mejoramiento');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
