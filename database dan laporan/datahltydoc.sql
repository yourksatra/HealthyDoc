-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 01:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datahltydoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `NIP` char(16) NOT NULL,
  `NAMA` varchar(30) DEFAULT NULL,
  `TMPLAHIR` varchar(30) DEFAULT NULL,
  `TGLLAHIR` date DEFAULT NULL,
  `JENKELCUS` char(1) DEFAULT NULL CHECK (`JENKELCUS` in ('L','P')),
  `ALAMAT` varchar(50) DEFAULT NULL,
  `IMG` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD_DOKTER` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`NIP`, `NAMA`, `TMPLAHIR`, `TGLLAHIR`, `JENKELCUS`, `ALAMAT`, `IMG`, `EMAIL`, `PASSWORD_DOKTER`) VALUES
('0000000000000000', 'Dede Syara', 'Yogyakarta', '1989-11-19', 'L', 'Bantul', '', 'dede@hotmail.com', '123456'),
('1111111111111111', 'Satria Bagass', 'Sumbawa', '2000-07-11', 'L', 'Bantul, Banguntapan', 'aku.jpg', 'abc@gmail.com', '123qwe'),
('7777777777777777', 'Caca', 'Malang', '1994-11-03', 'P', 'Malang', '', 'caca@gmail.com', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `NIK` char(16) NOT NULL,
  `NAMA` varchar(30) DEFAULT NULL,
  `TMPLAHIR` varchar(30) DEFAULT NULL,
  `TGLLAHIR` date DEFAULT NULL,
  `JENKELCUS` char(1) DEFAULT NULL CHECK (`JENKELCUS` in ('L','P')),
  `ALAMAT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`NIK`, `NAMA`, `TMPLAHIR`, `TGLLAHIR`, `JENKELCUS`, `ALAMAT`) VALUES
('0011223300112233', 'Farros Syah', 'Yogyakarta', '2022-11-22', 'L', 'Bantul'),
('0012300123001230', 'Satria Bagas', 'Sumbawa', '1999-07-11', 'L', 'Mataram'),
('9879879879879870', 'Aulia El Fatih', 'Malang', '1989-07-12', 'P', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Stand-in structure for view `riwayat`
-- (See below for the actual view)
--
CREATE TABLE `riwayat` (
`NIK` char(16)
,`NAMA` varchar(30)
,`TGLRME` date
,`KELUHAN` varchar(30)
,`DIAGNOSA` varchar(30)
,`TGL` date
,`DOKTER` varchar(30)
,`NIP` char(16)
);

-- --------------------------------------------------------

--
-- Table structure for table `rme`
--

CREATE TABLE `rme` (
  `NIK` char(16) DEFAULT NULL,
  `keluhan` varchar(30) DEFAULT NULL,
  `diagnosa` varchar(30) DEFAULT NULL,
  `tglperiksa` date DEFAULT NULL,
  `tindakan` varchar(30) DEFAULT NULL,
  `TglRME` date DEFAULT curdate(),
  `NIP` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rme`
--

INSERT INTO `rme` (`NIK`, `keluhan`, `diagnosa`, `tglperiksa`, `tindakan`, `TglRME`, `NIP`) VALUES
('0011223300112233', 'Batuk Pilek', 'Flu dan Sinus', '2022-11-19', 'Antibiotik, Paracetamol dan Vi', '2022-11-22', '7777777777777777'),
('0012300123001230', 'Sakit Punggung', 'Osteroporosis', '2022-11-19', 'Terapi berkelanjutan (Fisioter', '2022-11-22', '7777777777777777'),
('0012300123001230', 'Cidera betis', 'Tennis Leg', '2022-11-01', 'Terapi berkelanjutan (Fisioter', '2022-11-22', '7777777777777777'),
('0012300123001230', 'Susah menelan, batuk kering', 'Radang dan Panas Dalam', '2022-11-18', 'Pemberian obat radang dan vita', '2022-11-22', '0000000000000000'),
('9879879879879870', 'Batuk Pilek', 'Flu dan Sinus', '2022-11-19', 'Antibiotik, Paracetamol dan Vi', '2022-11-22', '0000000000000000'),
('0012300123001230', 'Demam', 'Pireksia', '2022-11-17', 'Antibiotik, Paracetamol dan Vi', '2022-11-22', '1111111111111111');

-- --------------------------------------------------------

--
-- Structure for view `riwayat`
--
DROP TABLE IF EXISTS `riwayat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `riwayat`  AS SELECT `pasien`.`NIK` AS `NIK`, `pasien`.`NAMA` AS `NAMA`, `rme`.`TglRME` AS `TGLRME`, `rme`.`keluhan` AS `KELUHAN`, `rme`.`diagnosa` AS `DIAGNOSA`, `rme`.`tglperiksa` AS `TGL`, `dokter`.`NAMA` AS `DOKTER`, `dokter`.`NIP` AS `NIP` FROM ((`pasien` join `rme` on(`pasien`.`NIK` = `rme`.`NIK`)) join `dokter` on(`rme`.`NIP` = `dokter`.`NIP`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `rme`
--
ALTER TABLE `rme`
  ADD KEY `NIK` (`NIK`),
  ADD KEY `NIP` (`NIP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rme`
--
ALTER TABLE `rme`
  ADD CONSTRAINT `rme_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `pasien` (`NIK`),
  ADD CONSTRAINT `rme_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `dokter` (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
