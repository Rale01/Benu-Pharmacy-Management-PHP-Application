-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 07:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benu`
--

-- --------------------------------------------------------

--
-- Table structure for table `apoteke`
--

CREATE TABLE `apoteke` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `opstina` varchar(255) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `farmaceut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apoteke`
--

INSERT INTO `apoteke` (`id`, `naziv`, `opstina`, `korisnik_id`, `farmaceut_id`) VALUES
(5, 'Benu Centar', 'Stari Grad', 1, 1),
(8, 'Benu Zarkovo', 'Cukarica', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `farmaceuti`
--

CREATE TABLE `farmaceuti` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `strucnaSprema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmaceuti`
--

INSERT INTO `farmaceuti` (`id`, `ime`, `prezime`, `strucnaSprema`) VALUES
(1, 'Dragana', 'Jokic', 'Magistar farmacije'),
(2, 'Jelena', 'Bozic', 'Farmaceut tehnicar');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `datumRodjenja` date NOT NULL,
  `pol` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`, `ime`, `prezime`, `datumRodjenja`, `pol`) VALUES
(1, 'admin', 'admin', 'Rastko', 'Jokic', '2022-05-11', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apoteke`
--
ALTER TABLE `apoteke`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmaceuti` (`farmaceut_id`),
  ADD KEY `korisnik` (`korisnik_id`);

--
-- Indexes for table `farmaceuti`
--
ALTER TABLE `farmaceuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apoteke`
--
ALTER TABLE `apoteke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `farmaceuti`
--
ALTER TABLE `farmaceuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apoteke`
--
ALTER TABLE `apoteke`
  ADD CONSTRAINT `farmaceuti` FOREIGN KEY (`farmaceut_id`) REFERENCES `farmaceuti` (`id`),
  ADD CONSTRAINT `korisnik` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
