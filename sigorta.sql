-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2022 at 01:31 AM
-- Server version: 8.0.28
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigorta`
--

-- --------------------------------------------------------

--
-- Table structure for table `ana_brans`
--

CREATE TABLE `ana_brans` (
  `id` int NOT NULL,
  `brans_adi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ana_brans`
--

INSERT INTO `ana_brans` (`id`, `brans_adi`) VALUES
(1, 'test1'),
(2, 'test2'),
(6, 'example_updated');

-- --------------------------------------------------------

--
-- Table structure for table `kayitlar`
--

CREATE TABLE `kayitlar` (
  `id` int NOT NULL,
  `plaka` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ruhsat_seri_no` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sigorta_sirketi` int NOT NULL,
  `ana_brans_id` int NOT NULL,
  `police_no` int NOT NULL,
  `police_bitis_tarih` date NOT NULL,
  `iptal_durum` int NOT NULL,
  `musteri_id` int NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kayitlar`
--

INSERT INTO `kayitlar` (`id`, `plaka`, `ruhsat_seri_no`, `sigorta_sirketi`, `ana_brans_id`, `police_no`, `police_bitis_tarih`, `iptal_durum`, `musteri_id`, `tarih`) VALUES
(2, '34bjk34', '234234', 1, 2, 234324, '2022-06-30', 0, 3, '2022-06-10'),
(4, '20AAA20', '23432', 3, 2, 324234234, '2022-06-28', 1, 2, '2022-06-10'),
(5, '20AAA20', '23432', 3, 2, 324234234, '2022-06-28', 1, 2, '2022-06-10'),
(6, '20H5673', '23423', 2, 3, 234234324, '2022-06-26', 1, 4, '2022-06-10'),
(7, '34S345', '2024320', 1, 2, 123123, '2022-03-21', 0, 3, '2022-06-10'),
(8, '34S345', '2024320', 1, 2, 123123, '2022-03-21', 0, 3, '2022-06-10');

--
-- Triggers `kayitlar`
--
DELIMITER $$
CREATE TRIGGER `son_kayitlar_ekle` AFTER INSERT ON `kayitlar` FOR EACH ROW INSERT INTO son_kayitlar (kayit_id) VALUES (NEW.id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `musteriler`
--

CREATE TABLE `musteriler` (
  `id` int NOT NULL,
  `musteri_adi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `telefon` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `mail_adresi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tc_kimlik` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `musteri_tipi_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musteriler`
--

INSERT INTO `musteriler` (`id`, `musteri_adi`, `dogum_tarihi`, `telefon`, `mail_adresi`, `tc_kimlik`, `musteri_tipi_id`) VALUES
(1, 'ali', '2022-06-15', '923490892', 'asfsd', '234', 1),
(2, 'berra', '2022-06-17', '345345', '34345', '234234', 3),
(3, 'kadir yaren update', '2022-06-30', '123123', 'test@gmail.com', '123123', 5),
(5, 'kadir yaren test', '2022-06-30', '123123', 'test@gmail.com', '123123', 5);

-- --------------------------------------------------------

--
-- Table structure for table `musteri_tipi`
--

CREATE TABLE `musteri_tipi` (
  `id` int NOT NULL,
  `musteri_tipi_adi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `komisyon_orani` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musteri_tipi`
--

INSERT INTO `musteri_tipi` (`id`, `musteri_tipi_adi`, `komisyon_orani`) VALUES
(1, 'test_update', 20),
(2, 'Y den gelen musteriler', 30);

-- --------------------------------------------------------

--
-- Table structure for table `sigorta_sirketleri`
--

CREATE TABLE `sigorta_sirketleri` (
  `id` int NOT NULL,
  `sirket_adi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sigorta_sirketleri`
--

INSERT INTO `sigorta_sirketleri` (`id`, `sirket_adi`) VALUES
(1, 'deneme'),
(2, 'Test Update'),
(3, ''),
(5, 'Bereket Sigorta');

-- --------------------------------------------------------

--
-- Table structure for table `son_kayitlar`
--

CREATE TABLE `son_kayitlar` (
  `id` int NOT NULL,
  `kayit_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `son_kayitlar`
--

INSERT INTO `son_kayitlar` (`id`, `kayit_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'kadir', 'yaren');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ana_brans`
--
ALTER TABLE `ana_brans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kayitlar`
--
ALTER TABLE `kayitlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musteri_tipi`
--
ALTER TABLE `musteri_tipi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sigorta_sirketleri`
--
ALTER TABLE `sigorta_sirketleri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `son_kayitlar`
--
ALTER TABLE `son_kayitlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ana_brans`
--
ALTER TABLE `ana_brans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kayitlar`
--
ALTER TABLE `kayitlar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `musteri_tipi`
--
ALTER TABLE `musteri_tipi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sigorta_sirketleri`
--
ALTER TABLE `sigorta_sirketleri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `son_kayitlar`
--
ALTER TABLE `son_kayitlar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
