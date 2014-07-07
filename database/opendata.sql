-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2014 at 08:28 PM
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
