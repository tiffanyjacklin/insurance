-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 08:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurance`
--
CREATE DATABASE IF NOT EXISTS `insurance` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `insurance`;

-- --------------------------------------------------------

--
-- Table structure for table `car_insurance`
--

DROP TABLE IF EXISTS `car_insurance`;
CREATE TABLE IF NOT EXISTS `car_insurance` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(50) NOT NULL,
  `1-4` int(11) NOT NULL,
  `5-6` int(11) NOT NULL,
  `7-8` int(11) NOT NULL,
  `9-10` int(11) NOT NULL,
  `11-15` int(11) NOT NULL,
  `16-20` int(11) NOT NULL,
  `21-25` int(11) NOT NULL,
  `26-30` int(11) NOT NULL,
  `366` int(11) NOT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_insurance`
--

INSERT INTO `car_insurance` (`id_car`, `provinsi`, `1-4`, `5-6`, `7-8`, `9-10`, `11-15`, `16-20`, `21-25`, `26-30`, `366`) VALUES
(1, 'Nanggroe Aceh Darussalam', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(2, 'Sumatra Utara', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(3, 'Sumatra Selatan', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(4, 'Sumatra Barat', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(5, 'Bengkulu', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(6, 'Riau', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(7, 'Kepulauan Riau', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(8, 'Jambi', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(9, 'Lampung', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(10, 'Bangka Belitung', 55000, 65000, 85000, 100000, 140000, 190000, 235000, 280000, 1375000),
(11, 'Kalimantan Barat', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(12, 'Kalimantan Timur', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(13, 'Kalimantan Selatan', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(14, 'Kalimantan Tengah', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(15, 'Kalimantan Utara', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(16, 'Banten', 45000, 50000, 70000, 85000, 115000, 160000, 200000, 240000, 1200000),
(17, 'DKI Jakarta', 45000, 50000, 70000, 85000, 115000, 160000, 200000, 240000, 1200000),
(18, 'Jawa Barat', 45000, 50000, 70000, 85000, 115000, 160000, 200000, 240000, 1200000),
(19, 'Jawa Tengah', 45000, 50000, 70000, 85000, 115000, 160000, 200000, 240000, 1200000),
(20, 'Daerah Istimewa Yogyakarta', 45000, 50000, 70000, 85000, 115000, 160000, 200000, 240000, 1200000),
(21, 'Jawa Timur', 45000, 50000, 70000, 85000, 115000, 160000, 200000, 240000, 1200000),
(22, 'Bali', 47500, 55000, 75000, 90000, 125000, 175000, 215000, 255000, 1250000),
(23, 'Nusa Tenggara Timur', 50000, 60000, 80000, 95000, 130000, 180000, 220000, 260000, 1300000),
(24, 'Nusa Tenggara Barat', 50000, 60000, 80000, 95000, 130000, 180000, 220000, 260000, 1300000),
(25, 'Gorontalo', 52500, 62000, 82000, 98000, 135000, 185000, 225000, 270000, 1350000),
(26, 'Sulawesi Barat', 52500, 62000, 82000, 98000, 135000, 185000, 225000, 270000, 1350000),
(27, 'Sulawesi Tengah', 52500, 62000, 82000, 98000, 135000, 185000, 225000, 270000, 1350000),
(28, 'Sulawesi Utara', 52500, 62000, 82000, 98000, 135000, 185000, 225000, 270000, 1350000),
(29, 'Sulawesi Tenggara', 52500, 62000, 82000, 98000, 135000, 185000, 225000, 270000, 1350000),
(30, 'Sulawesi Selatan', 52500, 62000, 82000, 98000, 135000, 185000, 225000, 270000, 1350000),
(31, 'Maluku Utara', 55000, 65000, 85000, 105000, 145000, 195000, 240000, 285000, 1400000),
(32, 'Maluku', 55000, 65000, 85000, 105000, 145000, 195000, 240000, 285000, 1400000),
(33, 'Papua Barat', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(34, 'Papua', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(35, 'Papua Tengah', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(36, 'Papua Pegunungan', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(37, 'Papua Selatan', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000),
(38, 'Papua Barat Daya', 60000, 70000, 90000, 110000, 150000, 200000, 250000, 300000, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_asuransi`
--

DROP TABLE IF EXISTS `kategori_asuransi`;
CREATE TABLE IF NOT EXISTS `kategori_asuransi` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_asuransi`
--

INSERT INTO `kategori_asuransi` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Travel Insurance'),
(2, 'Car Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_asuransi`
--

DROP TABLE IF EXISTS `pembayaran_asuransi`;
CREATE TABLE IF NOT EXISTS `pembayaran_asuransi` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_bayar` float NOT NULL,
  `pajak` float NOT NULL,
  `jenis_pembayaran` int(11) NOT NULL,
  `nomor_kartu` varchar(16) DEFAULT NULL,
  `nomor_rekening` varchar(20) DEFAULT NULL,
  `nomor_telepon` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran_asuransi`
--

INSERT INTO `pembayaran_asuransi` (`id_pembayaran`, `id_user`, `id_pembelian`, `timestamp`, `total_bayar`, `pajak`, `jenis_pembayaran`, `nomor_kartu`, `nomor_rekening`, `nomor_telepon`) VALUES
(1, 1, 1, '2024-06-04 05:20:46', 47500, 5225, 3, NULL, NULL, '081111111111'),
(2, 1, 3, '2024-06-04 06:48:14', 85000, 9350, 2, NULL, '1234567890', NULL),
(3, 1, 2, '2024-06-04 05:21:04', 675000, 74250, 3, NULL, NULL, '085512341234'),
(4, 1, 5, '2024-06-04 06:48:36', 45000, 4950, 3, NULL, NULL, '081111111111');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_asuransi`
--

DROP TABLE IF EXISTS `pembelian_asuransi`;
CREATE TABLE IF NOT EXISTS `pembelian_asuransi` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_booking` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tipe_asuransi` int(11) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_pembayaran` int(11) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_asuransi`
--

INSERT INTO `pembelian_asuransi` (`id_pembelian`, `id_user`, `id_booking`, `id_kategori`, `id_tipe_asuransi`, `jumlah_orang`, `jumlah_hari`, `start_date`, `end_date`, `total_bayar`, `timestamp`, `status_pembayaran`) VALUES
(1, 1, NULL, 1, 1, 1, 3, '2024-06-07', '2024-06-09', 47500, '2024-06-04 05:17:09', 1),
(2, 1, NULL, 1, 45, 3, 10, '2024-08-01', '2024-08-10', 675000, '2024-06-04 05:17:32', 1),
(3, 1, NULL, 2, 2, 2, 7, '2024-06-10', '2024-06-16', 85000, '2024-06-04 06:47:05', 1),
(4, 1, NULL, 1, 15, 1, 6, '2024-10-13', '2024-10-18', 360000, '2024-06-04 05:19:02', 0),
(5, 1, NULL, 2, 21, 3, 3, '2024-06-07', '2024-06-09', 45000, '2024-06-04 06:46:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `travel_insurance`
--

DROP TABLE IF EXISTS `travel_insurance`;
CREATE TABLE IF NOT EXISTS `travel_insurance` (
  `id_travel` int(11) NOT NULL AUTO_INCREMENT,
  `wilayah` int(1) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `1-4` int(11) NOT NULL,
  `5-6` int(11) NOT NULL,
  `7-8` int(11) NOT NULL,
  `9-10` int(11) NOT NULL,
  `11-15` int(11) NOT NULL,
  `16-20` int(11) NOT NULL,
  `21-25` int(11) NOT NULL,
  `26-30` int(11) NOT NULL,
  `366` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_insurance`
--

INSERT INTO `travel_insurance` (`id_travel`, `wilayah`, `negara`, `1-4`, `5-6`, `7-8`, `9-10`, `11-15`, `16-20`, `21-25`, `26-30`, `366`) VALUES
(1, 1, 'Indonesia', 47500, 55000, 75000, 90000, 125000, 175000, 215000, 255000, 1250000),
(2, 2, 'Afganistan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(3, 2, 'Albania', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(4, 2, 'Algeria', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(5, 2, 'American Samoa', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(6, 2, 'Andorra', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(7, 2, 'Angola', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(8, 2, 'Anguilla', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(9, 2, 'Antarctica', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(10, 2, 'Antigua and Barbuda', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(11, 2, 'Argentina', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(12, 2, 'Armenia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(13, 2, 'Aruba', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(14, 2, 'Australia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(15, 2, 'Austria', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(16, 2, 'Azerbaijan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(17, 2, 'Bahamas', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(18, 2, 'Bahrain', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(19, 2, 'Bangladesh', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(20, 2, 'Barbadoos', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(21, 2, 'Belarus', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(22, 2, 'Belgium', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(23, 2, 'Belize', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(24, 2, 'Benin', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(25, 2, 'Bermuda', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(26, 2, 'Bhutan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(27, 2, 'Bolivia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(28, 2, 'Bosnia and Herzegovina', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(29, 2, 'Botswana', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(30, 2, 'Bouvet Island', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(31, 2, 'Brazil', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(32, 2, 'British Indian Ocean Territory', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(33, 2, 'British Virgin Island', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(34, 2, 'Brunei', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(35, 2, 'Bulgaria', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(36, 2, 'Burkina Faso', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(37, 2, 'Burundi', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(38, 2, 'Cambodia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(39, 2, 'Cameroon', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(40, 2, 'Canada', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(41, 2, 'Cape Verde', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(42, 2, 'Central African Republic', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(43, 2, 'Chad', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(44, 2, 'Chile', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(45, 2, 'China', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(46, 2, 'Christmas Island', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(47, 2, 'Colombia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(48, 2, 'Comoros', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(49, 2, 'Congo Democratic Republic', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(50, 2, 'Congo Republic', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(51, 2, 'Cook Islands', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(52, 2, 'Costa Rica', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(53, 2, 'Croatia', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(54, 2, 'Cyprus', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(55, 2, 'Czech Republic', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(56, 2, 'Denmark', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(57, 2, 'Djibouti', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(58, 2, 'Dominica', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(59, 2, 'Dominican Republic', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(60, 2, 'Ecuador', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(61, 2, 'Egypt', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(62, 2, 'El Salvador', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(63, 2, 'Equatorial Guinea', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(64, 2, 'Eritrea', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(65, 2, 'Estonia', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(66, 2, 'Ethiopia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(67, 2, 'Falkland Islands', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(68, 2, 'Fiji', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(69, 2, 'Finland', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(70, 2, 'France', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(71, 2, 'French Polynesia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(72, 2, 'French Southern Territories', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(73, 2, 'Gabon', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(74, 2, 'Gambia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(75, 2, 'Georgia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(76, 2, 'Germany', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(77, 2, 'Ghana', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(78, 2, 'Gibraltar', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(79, 2, 'Greece', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(80, 2, 'Greenland', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(81, 2, 'Grenada', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(82, 2, 'Guam', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(83, 2, 'Guatemala', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(84, 2, 'Guernsey', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(85, 2, 'Guinea', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(86, 2, 'Guinea-Bissau', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(87, 2, 'Guyana', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(88, 2, 'Haiti', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(89, 2, 'Holy See', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(90, 2, 'Honduras', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(91, 2, 'Hong Kong', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(92, 2, 'Hungary', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(93, 2, 'Iceland', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(94, 2, 'India', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(95, 2, 'Iraq', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(96, 2, 'Ireland', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(97, 2, 'Isle of Man', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(98, 2, 'Israel', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(99, 2, 'Italy', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(100, 2, 'Ivory Coast', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(101, 2, 'Jamaica', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(102, 2, 'Japan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(103, 2, 'Jersey', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(104, 2, 'Jordan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(105, 2, 'Kazakhstan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(106, 2, 'Kenya', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(107, 2, 'Kiribati', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(108, 2, 'Kuwait', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(109, 2, 'Kyrgyzstan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(110, 2, 'Laos', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(111, 2, 'Latvia', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(112, 2, 'Lebanon', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(113, 2, 'Lesotho', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(114, 2, 'Liberia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(115, 2, 'Libya', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(116, 2, 'Liechtenstein', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(117, 2, 'Lithuania', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(118, 2, 'Luxembourg', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(119, 2, 'Macau', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(120, 2, 'Macedonia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(121, 2, 'Madagascar', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(122, 2, 'Malawi', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(123, 2, 'Malaysia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(124, 2, 'Maldives', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(125, 2, 'Mali', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(126, 2, 'Malta', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(127, 2, 'Marshall Islands', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(128, 2, 'Mauritania', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(129, 2, 'Mauritius', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(130, 2, 'Mexico', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(131, 2, 'Micronesia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(132, 2, 'Moldova', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(133, 2, 'Monaco', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(134, 2, 'Mongolia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(135, 2, 'Montenegro', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(136, 2, 'Morocco', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(137, 2, 'Mozambique', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(138, 2, 'Myanmar', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(139, 2, 'Namibia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(140, 2, 'Nauru', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(141, 2, 'Nepal', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(142, 2, 'Netherlands', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(143, 2, 'Netherlands Antilles', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(144, 2, 'New Zealand', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(145, 2, 'Nicaragua', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(146, 2, 'Niger', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(147, 2, 'Nigeria', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(148, 2, 'Niue', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(149, 2, 'Norfolk Island', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(150, 2, 'Northern Mariana Island', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(151, 2, 'Norway', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(152, 2, 'Oman', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(153, 2, 'Pakistan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(154, 2, 'Palau', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(155, 2, 'Palestinian Territory', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(156, 2, 'Panama', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(157, 2, 'Papua New Guinea', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(158, 2, 'Paraguay', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(159, 2, 'Peru', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(160, 2, 'Philippines', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(161, 2, 'Pitcairn', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(162, 2, 'Poland', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(163, 2, 'Portugal', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(164, 2, 'Puerto Rico', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(165, 2, 'Qatar', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(166, 2, 'Romania', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(167, 2, 'Russia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(168, 2, 'Rwanda', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(169, 2, 'Saint Bathelemy', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(170, 2, 'Saint Helena Ascension and Tristan da Cunha', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(171, 2, 'Saint Kitts and Nevis', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(172, 2, 'Saint Lucia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(173, 2, 'Saint Martin', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(174, 2, 'Saint Pierre and Miquelon', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(175, 2, 'Saint Vincent and the Grenadines', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(176, 2, 'Samoa', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(177, 2, 'San Marino', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(178, 2, 'Sao Tome and Principe', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(179, 2, 'Saudi Arabia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(180, 2, 'Senegal', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(181, 2, 'Serbia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(182, 2, 'Seychelles', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(183, 2, 'Sierra Leone', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(184, 2, 'Singapore', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(185, 2, 'Slovakia', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(186, 2, 'Slovenia', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(187, 2, 'Solomon Islands', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(188, 2, 'Somalia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(189, 2, 'South Africa', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(190, 2, 'South Korea', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(191, 2, 'Spain', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(192, 2, 'Sri Lanka', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(193, 2, 'Suriname', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(194, 2, 'Svalbard', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(195, 2, 'Swaziland', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(196, 2, 'Sweden', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(197, 2, 'Switzerland', 187500, 360000, 502500, 637500, 712500, 928500, 1062000, 1192500, 1250000),
(198, 2, 'Taiwan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(199, 2, 'Tajikistan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(200, 2, 'Tanzania', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(201, 2, 'Thailand', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(202, 2, 'Togo', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(203, 2, 'Tokelau', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(204, 2, 'Tonga', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(205, 2, 'Trinidad and Tobago', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(206, 2, 'Tunisia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(207, 2, 'Turkey', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(208, 2, 'Turkmenistan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(209, 2, 'Turks and Caicos Islands', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(210, 2, 'Tuvalu', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(211, 2, 'Uganda', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(212, 2, 'Ukraine', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(213, 2, 'United Arab Emirates', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(214, 2, 'United Kingdom', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(215, 2, 'United States', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(216, 2, 'Uruguay', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(217, 2, 'Uzbekistan', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(218, 2, 'Vanuatu', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(219, 2, 'Venezuela', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(220, 2, 'Vietnam', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(221, 2, 'Virgin Islands', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(222, 2, 'Wallis and Futuna', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(223, 2, 'Yemen', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(224, 2, 'Zambia', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000),
(225, 2, 'Zimbabwe', 115000, 133500, 185000, 225000, 305000, 425000, 520000, 650000, 1250000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
