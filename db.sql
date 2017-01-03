-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2015 at 03:50 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clustering`
--
DROP DATABASE `clustering`;
CREATE DATABASE IF NOT EXISTS `clustering`
  DEFAULT CHARACTER SET latin1
  COLLATE latin1_swedish_ci;
USE `clustering`;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

DROP TABLE IF EXISTS `sekolah`;
CREATE TABLE IF NOT EXISTS `sekolah` (
  `No`           INT(11)     NOT NULL,
  `Nama`         VARCHAR(50) NOT NULL,
  `Alamat`       TEXT        NOT NULL,
  `Jumlah_Guru`  INT(11)     NOT NULL,
  `kGuruS1`      INT(11)     NOT NULL DEFAULT '0',
  `kTeknis`      INT(11)     NOT NULL DEFAULT '0',
  `kPrasarana`   INT(11)     NOT NULL DEFAULT '0',
  `kBuku`        INT(11)     NOT NULL DEFAULT '0',
  `kMutu`        INT(11)     NOT NULL DEFAULT '0',
  `kJumlah`      INT(11)     NOT NULL DEFAULT '0',
  `kSNP`         INT(11)     NOT NULL DEFAULT '0',
  `kLulusan`     INT(11)     NOT NULL DEFAULT '0',
  `kJumlah_Guru` INT(11)     NOT NULL DEFAULT '0',
  `kSarana`      INT(11)     NOT NULL DEFAULT '0',
  `Dc1`          FLOAT       NOT NULL DEFAULT '0',
  `Dc2`          FLOAT       NOT NULL DEFAULT '0'
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 14
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`No`, `Nama`, `Alamat`, `Jumlah_Guru`, `kGuruS1`, `kTeknis`, `kPrasarana`, `kBuku`, `kMutu`, `kJumlah`, `kSNP`, `kLulusan`, `kJumlah_Guru`, `kSarana`, `Dc1`, `Dc2`)
VALUES
  (1, 'SD N 1 Malang', 'Jl. Semarang no.127', 45, 1, 1, 1, 2, 1, 2, 1, 1, 1, 1, 0, 15.3559),
  (5, 'SD N 2 Malang', 'Jl. Malang no.12', 65, 1, 2, 2, 2, 3, 2, 2, 2, 3, 2, 36.0555, 28.7174),
  (6, 'SDN 30 Malang', 'Jl. Malang no.123', 34, 1, 2, 3, 1, 1, 1, 1, 1, 1, 1, 26.4575, 17.0692),
  (7, 'SDN 4 Malang', 'Jl. Malang no.4', 32, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 14.1421, 16.7406),
  (8, 'SDN 55 Malang', 'bbb', 65, 1, 1, 1, 3, 1, 3, 1, 1, 1, 1, 14.1421, 24.3179),
  (9, 'SD N 7 Malang', 'Jl. Malang no.12bb', 34, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 14.1421, 16.7406),
  (10, 'SD N 8 Malang', 'Jl. Malang no.19', 33, 1, 1, 1, 4, 1, 1, 1, 1, 1, 1, 22.3607, 25.4345),
  (11, 'SD N 9 Malang', 'Jl. Malang no 56', 23, 1, 2, 4, 3, 1, 1, 3, 4, 1, 1, 50, 38.0383),
  (12, 'SD N 10 Malang', 'Jl. Malang no 565', 23, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 17.3205, 15.7135),
  (13, 'SD N 15 Malang', 'Jl. Malang no 565', 23, 3, 3, 3, 1, 1, 1, 2, 2, 1, 1, 40, 27.7333);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Username` VARCHAR(50) NOT NULL,
  `Password` VARCHAR(32) NOT NULL,
  `Nama`     VARCHAR(50) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Nama`) VALUES
  ('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
ADD PRIMARY KEY (`No`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
MODIFY `No` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 14;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
CREATE DATABASE IF NOT EXISTS `lkp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lkp`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: lkp
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1
