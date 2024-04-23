-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2023 pada 03.57
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahmakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bahanbaku`
--

CREATE TABLE `t_bahanbaku` (
  `kd_bahanbaku` varchar(5) NOT NULL,
  `nama_bahanbaku` varchar(50) DEFAULT NULL,
  `jumlah_bahanbaku` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_bahanbaku`
--

INSERT INTO `t_bahanbaku` (`kd_bahanbaku`, `nama_bahanbaku`, `jumlah_bahanbaku`) VALUES
('BB001', 'Ikan Gurame', 19.1),
('BB002', 'Jeruk Nipis', 1.98509),
('BB003', 'Garam', 3.11744),
('BB004', 'Kecap', 3.06345),
('BB005', 'Bawang Merah', 5.54),
('BB006', 'Bawang Putih', 3.6906),
('BB007', 'Ketumbar', 1.5196),
('BB008', 'Merica', 4.8348),
('BB009', 'Tepung Maizena', 7.925),
('BB010', 'Ikan Lele', 21.5),
('BB011', 'Saus Tiram', 4.3),
('BB012', 'Kunyit', 3.4026),
('BB013', 'Ayam', 26.28),
('BB014', 'Lengkuas', 1.971),
('BB015', 'Bebek', 25.775),
('BB016', 'Tahu', 6.246),
('BB017', 'Tempe', 7.064),
('BB018', 'Ati Ayam', 8.553),
('BB019', 'Usus Ayam', 12.49),
('BB020', 'Cabe', 5.38),
('BB021', 'Tomat', 4.36),
('BB022', 'Daun Salam', 1.3712),
('BB023', 'Daun Kemangi', 1.336),
('BB024', 'Kentang', 6.12),
('BB025', 'Tepung Terigu', 4.8952),
('BB026', 'Telur', 11.9),
('BB027', 'Lada', 2.09424),
('BB028', 'Beras', 29.795),
('BB029', 'Air', 17.1763),
('BB030', 'Teh', 2.176),
('BB031', 'Gula', 6.512),
('BB032', 'Mangga', 7.07),
('BB033', 'Jambu', 8.16),
('BB034', 'Buah Naga', 5.52),
('BB035', 'Sirsak', 8.935);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bbkeluar`
--

CREATE TABLE `t_bbkeluar` (
  `jumlah_terpakai` float DEFAULT NULL,
  `kd_produk` varchar(5) DEFAULT NULL,
  `kd_bahanbaku` varchar(5) DEFAULT NULL,
  `kd_transaksi` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_bbkeluar`
--

INSERT INTO `t_bbkeluar` (`jumlah_terpakai`, `kd_produk`, `kd_bahanbaku`, `kd_transaksi`) VALUES
(0.12, 'MK006', 'BB013', 'TR0001'),
(0.0135, 'MK006', 'BB005', 'TR0001'),
(0.018, 'MK006', 'BB006', 'TR0001'),
(0.0144, 'MK006', 'BB012', 'TR0001'),
(0.0144, 'MK006', 'BB007', 'TR0001'),
(0.0144, 'MK006', 'BB014', 'TR0001'),
(0.2259, 'MN001', 'BB029', 'TR0001'),
(0.004, 'MN001', 'BB030', 'TR0001'),
(0.0192, 'MN001', 'BB031', 'TR0001'),
(0.315, 'MK015', 'BB028', 'TR0001'),
(0.09, 'MK007', 'BB015', 'TR0002'),
(0.005, 'MK007', 'BB005', 'TR0002'),
(0.004, 'MK007', 'BB006', 'TR0002'),
(0.006875, 'MK007', 'BB004', 'TR0002'),
(0.0096, 'MK007', 'BB012', 'TR0002'),
(0.0096, 'MK007', 'BB003', 'TR0002'),
(0.0275, 'MK007', 'BB007', 'TR0002'),
(0.11295, 'MN002', 'BB029', 'TR0002'),
(0.09, 'MN002', 'BB032', 'TR0002'),
(0.0144, 'MN002', 'BB031', 'TR0002'),
(0.11295, 'MN004', 'BB029', 'TR0002'),
(0.36, 'MN004', 'BB034', 'TR0002'),
(0.0144, 'MN004', 'BB031', 'TR0002'),
(0.3, 'MK001', 'BB001', 'TR0003'),
(0.0048, 'MK001', 'BB002', 'TR0003'),
(0.0024, 'MK001', 'BB003', 'TR0003'),
(0.034375, 'MK001', 'BB004', 'TR0003'),
(0.018, 'MK001', 'BB005', 'TR0003'),
(0.009, 'MK001', 'BB006', 'TR0003'),
(0.0048, 'MK001', 'BB007', 'TR0003'),
(0.12, 'MK006', 'BB013', 'TR0003'),
(0.0135, 'MK006', 'BB005', 'TR0003'),
(0.018, 'MK006', 'BB006', 'TR0003'),
(0.0144, 'MK006', 'BB012', 'TR0003'),
(0.0144, 'MK006', 'BB007', 'TR0003'),
(0.0144, 'MK006', 'BB014', 'TR0003'),
(0.525, 'MK015', 'BB028', 'TR0003'),
(0.045, 'MK007', 'BB015', 'TR0003'),
(0.0025, 'MK007', 'BB005', 'TR0003'),
(0.002, 'MK007', 'BB006', 'TR0003'),
(0.0034375, 'MK007', 'BB004', 'TR0003'),
(0.0048, 'MK007', 'BB012', 'TR0003'),
(0.0048, 'MK007', 'BB003', 'TR0003'),
(0.01375, 'MK007', 'BB007', 'TR0003'),
(0.33885, 'MN002', 'BB029', 'TR0003'),
(0.27, 'MN002', 'BB032', 'TR0003'),
(0.0432, 'MN002', 'BB031', 'TR0003'),
(0.2259, 'MN001', 'BB029', 'TR0003'),
(0.004, 'MN001', 'BB030', 'TR0003'),
(0.0192, 'MN001', 'BB031', 'TR0003'),
(0.036, 'MK009', 'BB016', 'TR0004'),
(0.012, 'MK009', 'BB006', 'TR0004'),
(0.0028, 'MK009', 'BB003', 'TR0004'),
(0.016, 'MK009', 'BB008', 'TR0004'),
(0.036, 'MK010', 'BB017', 'TR0004'),
(0.012, 'MK010', 'BB006', 'TR0004'),
(0.0028, 'MK010', 'BB003', 'TR0004'),
(0.016, 'MK010', 'BB008', 'TR0004'),
(0.315, 'MK015', 'BB028', 'TR0004'),
(0.2, 'MK004', 'BB010', 'TR0004'),
(0.0048, 'MK004', 'BB003', 'TR0004'),
(0.01375, 'MK004', 'BB002', 'TR0004'),
(0.0096, 'MK004', 'BB006', 'TR0004'),
(0.0275, 'MK004', 'BB007', 'TR0004'),
(0.0096, 'MK004', 'BB012', 'TR0004'),
(0.04, 'MK006', 'BB013', 'TR0004'),
(0.0045, 'MK006', 'BB005', 'TR0004'),
(0.006, 'MK006', 'BB006', 'TR0004'),
(0.0048, 'MK006', 'BB012', 'TR0004'),
(0.0048, 'MK006', 'BB007', 'TR0004'),
(0.0048, 'MK006', 'BB014', 'TR0004'),
(0.33885, 'MN001', 'BB029', 'TR0004'),
(0.006, 'MN001', 'BB030', 'TR0004'),
(0.0288, 'MN001', 'BB031', 'TR0004'),
(0.3, 'MK002', 'BB001', 'TR0005'),
(0.0048, 'MK002', 'BB003', 'TR0005'),
(0.0012, 'MK002', 'BB008', 'TR0005'),
(0.0024, 'MK002', 'BB002', 'TR0005'),
(0.075, 'MK002', 'BB009', 'TR0005'),
(0.03, 'MK012', 'BB019', 'TR0005'),
(0.02055, 'MK012', 'BB002', 'TR0005'),
(0.0036, 'MK012', 'BB005', 'TR0005'),
(0.0024, 'MK012', 'BB006', 'TR0005'),
(0.00825, 'MK012', 'BB007', 'TR0005'),
(0.0054, 'MK012', 'BB014', 'TR0005'),
(0.024, 'MK012', 'BB008', 'TR0005'),
(0.0054, 'MK012', 'BB012', 'TR0005'),
(0.0042, 'MK012', 'BB003', 'TR0005'),
(0.11295, 'MN001', 'BB029', 'TR0005'),
(0.002, 'MN001', 'BB030', 'TR0005'),
(0.0096, 'MN001', 'BB031', 'TR0005'),
(0.105, 'MK015', 'BB028', 'TR0005'),
(0.04, 'MK006', 'BB013', 'TR0006'),
(0.0045, 'MK006', 'BB005', 'TR0006'),
(0.006, 'MK006', 'BB006', 'TR0006'),
(0.0048, 'MK006', 'BB012', 'TR0006'),
(0.0048, 'MK006', 'BB007', 'TR0006'),
(0.0048, 'MK006', 'BB014', 'TR0006'),
(0.105, 'MK015', 'BB028', 'TR0006'),
(0.11295, 'MN003', 'BB029', 'TR0006'),
(0.04, 'MN003', 'BB033', 'TR0006'),
(0.0096, 'MN003', 'BB031', 'TR0006'),
(0.045, 'MK008', 'BB015', 'TR0007'),
(0.0045, 'MK008', 'BB005', 'TR0007'),
(0.006, 'MK008', 'BB006', 'TR0007'),
(0.0048, 'MK008', 'BB012', 'TR0007'),
(0.0048, 'MK008', 'BB007', 'TR0007'),
(0.0048, 'MK008', 'BB014', 'TR0007'),
(0.018, 'MK009', 'BB016', 'TR0007'),
(0.006, 'MK009', 'BB006', 'TR0007'),
(0.0014, 'MK009', 'BB003', 'TR0007'),
(0.008, 'MK009', 'BB008', 'TR0007'),
(0.105, 'MK015', 'BB028', 'TR0007'),
(0.11295, 'MN001', 'BB029', 'TR0007'),
(0.002, 'MN001', 'BB030', 'TR0007'),
(0.0096, 'MN001', 'BB031', 'TR0007'),
(0.045, 'MK007', 'BB015', 'TR0008'),
(0.0025, 'MK007', 'BB005', 'TR0008'),
(0.002, 'MK007', 'BB006', 'TR0008'),
(0.0034375, 'MK007', 'BB004', 'TR0008'),
(0.0048, 'MK007', 'BB012', 'TR0008'),
(0.0048, 'MK007', 'BB003', 'TR0008'),
(0.01375, 'MK007', 'BB007', 'TR0008'),
(0.105, 'MK015', 'BB028', 'TR0008'),
(0.11295, 'MN002', 'BB029', 'TR0008'),
(0.09, 'MN002', 'BB032', 'TR0008'),
(0.0144, 'MN002', 'BB031', 'TR0008'),
(0.042, 'MK011', 'BB018', 'TR0009'),
(0.012, 'MK011', 'BB005', 'TR0009'),
(0.012, 'MK011', 'BB006', 'TR0009'),
(0.0064, 'MK011', 'BB012', 'TR0009'),
(0.0024, 'MK011', 'BB014', 'TR0009'),
(0.004, 'MK011', 'BB007', 'TR0009'),
(0.04, 'MK014', 'BB024', 'TR0009'),
(0.0024, 'MK014', 'BB025', 'TR0009'),
(0.05, 'MK014', 'BB026', 'TR0009'),
(0.0144, 'MK014', 'BB005', 'TR0009'),
(0.016, 'MK014', 'BB006', 'TR0009'),
(0.00768, 'MK014', 'BB003', 'TR0009'),
(0.00288, 'MK014', 'BB027', 'TR0009'),
(0.105, 'MK015', 'BB028', 'TR0009'),
(0.11295, 'MN001', 'BB029', 'TR0009'),
(0.002, 'MN001', 'BB030', 'TR0009'),
(0.0096, 'MN001', 'BB031', 'TR0009'),
(0.06, 'MK013', 'BB019', 'TR0010'),
(0.0036, 'MK013', 'BB022', 'TR0010'),
(0.0048, 'MK013', 'BB014', 'TR0010'),
(0.015, 'MK013', 'BB020', 'TR0010'),
(0.03, 'MK013', 'BB021', 'TR0010'),
(0.008, 'MK013', 'BB023', 'TR0010'),
(0.0044, 'MK013', 'BB012', 'TR0010'),
(0.048, 'MK013', 'BB005', 'TR0010'),
(0.18, 'MK013', 'BB006', 'TR0010'),
(0.0096, 'MK013', 'BB003', 'TR0010'),
(0.04, 'MK014', 'BB024', 'TR0010'),
(0.0024, 'MK014', 'BB025', 'TR0010'),
(0.05, 'MK014', 'BB026', 'TR0010'),
(0.0144, 'MK014', 'BB005', 'TR0010'),
(0.016, 'MK014', 'BB006', 'TR0010'),
(0.00768, 'MK014', 'BB003', 'TR0010'),
(0.00288, 'MK014', 'BB027', 'TR0010'),
(0.315, 'MK015', 'BB028', 'TR0010'),
(0.12, 'MK005', 'BB013', 'TR0010'),
(0.0103125, 'MK005', 'BB004', 'TR0010'),
(0.0036, 'MK005', 'BB005', 'TR0010'),
(0.027, 'MK005', 'BB006', 'TR0010'),
(0.0144, 'MK005', 'BB012', 'TR0010'),
(0.0144, 'MK005', 'BB003', 'TR0010'),
(0.2259, 'MN004', 'BB029', 'TR0010'),
(0.72, 'MN004', 'BB034', 'TR0010'),
(0.0288, 'MN004', 'BB031', 'TR0010'),
(0.11295, 'MN001', 'BB029', 'TR0010'),
(0.002, 'MN001', 'BB030', 'TR0010'),
(0.0096, 'MN001', 'BB031', 'TR0010'),
(0.6, 'MK001', 'BB001', 'TR0011'),
(0.0096, 'MK001', 'BB002', 'TR0011'),
(0.0048, 'MK001', 'BB003', 'TR0011'),
(0.06875, 'MK001', 'BB004', 'TR0011'),
(0.036, 'MK001', 'BB005', 'TR0011'),
(0.018, 'MK001', 'BB006', 'TR0011'),
(0.0096, 'MK001', 'BB007', 'TR0011'),
(0.04, 'MK006', 'BB013', 'TR0011'),
(0.0045, 'MK006', 'BB005', 'TR0011'),
(0.006, 'MK006', 'BB006', 'TR0011'),
(0.0048, 'MK006', 'BB012', 'TR0011'),
(0.0048, 'MK006', 'BB007', 'TR0011'),
(0.0048, 'MK006', 'BB014', 'TR0011'),
(0.21, 'MK015', 'BB028', 'TR0011'),
(0.2259, 'MN002', 'BB029', 'TR0011'),
(0.18, 'MN002', 'BB032', 'TR0011'),
(0.0288, 'MN002', 'BB031', 'TR0011'),
(0.04, 'MK006', 'BB013', 'TR0012'),
(0.0045, 'MK006', 'BB005', 'TR0012'),
(0.006, 'MK006', 'BB006', 'TR0012'),
(0.0048, 'MK006', 'BB012', 'TR0012'),
(0.0048, 'MK006', 'BB007', 'TR0012'),
(0.0048, 'MK006', 'BB014', 'TR0012'),
(0.11295, 'MN001', 'BB029', 'TR0013'),
(0.002, 'MN001', 'BB030', 'TR0013'),
(0.0096, 'MN001', 'BB031', 'TR0013'),
(0.3, 'MK004', 'BB010', 'TR0014'),
(0.0072, 'MK004', 'BB003', 'TR0014'),
(0.020625, 'MK004', 'BB002', 'TR0014'),
(0.0144, 'MK004', 'BB006', 'TR0014'),
(0.04125, 'MK004', 'BB007', 'TR0014'),
(0.0144, 'MK004', 'BB012', 'TR0014'),
(2.7, 'MK001', 'BB001', 'TR0014'),
(0.0432, 'MK001', 'BB002', 'TR0014'),
(0.0216, 'MK001', 'BB003', 'TR0014'),
(0.309375, 'MK001', 'BB004', 'TR0014'),
(0.162, 'MK001', 'BB005', 'TR0014'),
(0.081, 'MK001', 'BB006', 'TR0014'),
(0.0432, 'MK001', 'BB007', 'TR0014'),
(0.042, 'MK011', 'BB018', 'TR0015'),
(0.012, 'MK011', 'BB005', 'TR0015'),
(0.012, 'MK011', 'BB006', 'TR0015'),
(0.0064, 'MK011', 'BB012', 'TR0015'),
(0.0024, 'MK011', 'BB014', 'TR0015'),
(0.004, 'MK011', 'BB007', 'TR0015'),
(0.2259, 'MN005', 'BB029', 'TR0016'),
(0.165, 'MN005', 'BB035', 'TR0016'),
(0.0192, 'MN005', 'BB031', 'TR0016'),
(0.2, 'MK006', 'BB013', 'TR0017'),
(0.0225, 'MK006', 'BB005', 'TR0017'),
(0.03, 'MK006', 'BB006', 'TR0017'),
(0.024, 'MK006', 'BB012', 'TR0017'),
(0.024, 'MK006', 'BB007', 'TR0017'),
(0.024, 'MK006', 'BB014', 'TR0017'),
(0.42, 'MK013', 'BB019', 'TR0018'),
(0.0252, 'MK013', 'BB022', 'TR0018'),
(0.0336, 'MK013', 'BB014', 'TR0018'),
(0.105, 'MK013', 'BB020', 'TR0018'),
(0.21, 'MK013', 'BB021', 'TR0018'),
(0.056, 'MK013', 'BB023', 'TR0018'),
(0.0308, 'MK013', 'BB012', 'TR0018'),
(0.336, 'MK013', 'BB005', 'TR0018'),
(1.26, 'MK013', 'BB006', 'TR0018'),
(0.0672, 'MK013', 'BB003', 'TR0018'),
(0.063, 'MK011', 'BB018', 'TR0019'),
(0.018, 'MK011', 'BB005', 'TR0019'),
(0.018, 'MK011', 'BB006', 'TR0019'),
(0.0096, 'MK011', 'BB012', 'TR0019'),
(0.0036, 'MK011', 'BB014', 'TR0019'),
(0.006, 'MK011', 'BB007', 'TR0019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detproduk`
--

CREATE TABLE `t_detproduk` (
  `jumlah_dibutuhkan` float DEFAULT NULL,
  `kd_produk` varchar(5) DEFAULT NULL,
  `kd_bahanbaku` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_detproduk`
--

INSERT INTO `t_detproduk` (`jumlah_dibutuhkan`, `kd_produk`, `kd_bahanbaku`, `created_at`) VALUES
(0.3, 'MK001', 'BB001', '2020-09-06 10:32:16'),
(0.0048, 'MK001', 'BB002', '2020-09-06 10:32:36'),
(0.0024, 'MK001', 'BB003', '2020-09-06 10:32:48'),
(0.034375, 'MK001', 'BB004', '2020-09-06 10:33:03'),
(0.018, 'MK001', 'BB005', '2020-09-06 10:33:20'),
(0.009, 'MK001', 'BB006', '2020-09-06 10:33:34'),
(0.0048, 'MK001', 'BB007', '2020-09-06 10:33:47'),
(0.3, 'MK002', 'BB001', '2020-09-06 10:34:36'),
(0.0048, 'MK002', 'BB003', '2020-09-06 10:34:53'),
(0.0012, 'MK002', 'BB008', '2020-09-06 10:35:16'),
(0.0024, 'MK002', 'BB002', '2020-09-06 10:35:29'),
(0.075, 'MK002', 'BB009', '2020-09-06 10:35:43'),
(0.1, 'MK003', 'BB010', '2020-09-06 10:36:14'),
(0.0012, 'MK003', 'BB008', '2020-09-06 10:36:23'),
(0.0048, 'MK003', 'BB003', '2020-09-06 10:36:32'),
(0.0024, 'MK003', 'BB002', '2020-09-06 10:36:47'),
(0.006875, 'MK003', 'BB011', '2020-09-06 10:37:00'),
(0.00825, 'MK003', 'BB004', '2020-09-06 10:37:11'),
(0.0048, 'MK003', 'BB006', '2020-09-06 10:37:20'),
(0.1, 'MK004', 'BB010', '2020-09-06 10:37:45'),
(0.0024, 'MK004', 'BB003', '2020-09-06 10:38:00'),
(0.006875, 'MK004', 'BB002', '2020-09-06 10:38:12'),
(0.0048, 'MK004', 'BB006', '2020-09-06 10:38:26'),
(0.01375, 'MK004', 'BB007', '2020-09-06 10:38:37'),
(0.0048, 'MK004', 'BB012', '2020-09-06 10:38:48'),
(0.04, 'MK005', 'BB013', '2020-09-06 10:39:44'),
(0.0034375, 'MK005', 'BB004', '2020-09-06 10:39:57'),
(0.0012, 'MK005', 'BB005', '2020-09-06 10:40:07'),
(0.009, 'MK005', 'BB006', '2020-09-06 10:40:17'),
(0.0048, 'MK005', 'BB012', '2020-09-06 10:40:30'),
(0.0048, 'MK005', 'BB003', '2020-09-06 10:40:36'),
(0.04, 'MK006', 'BB013', '2020-09-06 10:41:08'),
(0.0045, 'MK006', 'BB005', '2020-09-06 10:41:17'),
(0.006, 'MK006', 'BB006', '2020-09-06 10:41:30'),
(0.0048, 'MK006', 'BB012', '2020-09-06 10:41:39'),
(0.0048, 'MK006', 'BB007', '2020-09-06 10:41:47'),
(0.0048, 'MK006', 'BB014', '2020-09-06 10:41:53'),
(0.045, 'MK007', 'BB015', '2020-09-06 10:42:42'),
(0.0025, 'MK007', 'BB005', '2020-09-06 10:42:58'),
(0.002, 'MK007', 'BB006', '2020-09-06 10:43:13'),
(0.0034375, 'MK007', 'BB004', '2020-09-06 10:43:33'),
(0.0048, 'MK007', 'BB012', '2020-09-06 10:43:47'),
(0.0048, 'MK007', 'BB003', '2020-09-06 10:43:57'),
(0.01375, 'MK007', 'BB007', '2020-09-06 10:44:07'),
(0.045, 'MK008', 'BB015', '2020-09-06 10:44:41'),
(0.0045, 'MK008', 'BB005', '2020-09-06 10:44:49'),
(0.006, 'MK008', 'BB006', '2020-09-06 10:44:57'),
(0.0048, 'MK008', 'BB012', '2020-09-06 10:45:05'),
(0.0048, 'MK008', 'BB007', '2020-09-06 10:45:12'),
(0.0048, 'MK008', 'BB014', '2020-09-06 10:45:19'),
(0.018, 'MK009', 'BB016', '2020-09-06 10:45:56'),
(0.006, 'MK009', 'BB006', '2020-09-06 10:46:04'),
(0.0014, 'MK009', 'BB003', '2020-09-06 10:46:13'),
(0.008, 'MK009', 'BB008', '2020-09-06 10:46:21'),
(0.018, 'MK010', 'BB017', '2020-09-06 10:46:45'),
(0.006, 'MK010', 'BB006', '2020-09-06 10:46:55'),
(0.0014, 'MK010', 'BB003', '2020-09-06 10:47:07'),
(0.008, 'MK010', 'BB008', '2020-09-06 10:47:14'),
(0.021, 'MK011', 'BB018', '2020-09-06 10:47:59'),
(0.006, 'MK011', 'BB005', '2020-09-06 10:48:07'),
(0.006, 'MK011', 'BB006', '2020-09-06 10:48:19'),
(0.0032, 'MK011', 'BB012', '2020-09-06 10:48:32'),
(0.0012, 'MK011', 'BB014', '2020-09-06 10:48:40'),
(0.002, 'MK011', 'BB007', '2020-09-06 10:48:53'),
(0.01, 'MK012', 'BB019', '2020-09-06 10:49:28'),
(0.00685, 'MK012', 'BB002', '2020-09-06 10:49:38'),
(0.0012, 'MK012', 'BB005', '2020-09-06 10:49:47'),
(0.0008, 'MK012', 'BB006', '2020-09-06 10:49:59'),
(0.00275, 'MK012', 'BB007', '2020-09-06 10:50:10'),
(0.0018, 'MK012', 'BB014', '2020-09-06 10:50:18'),
(0.008, 'MK012', 'BB008', '2020-09-06 10:50:27'),
(0.0018, 'MK012', 'BB012', '2020-09-06 10:50:35'),
(0.0014, 'MK012', 'BB003', '2020-09-06 10:50:41'),
(0.03, 'MK013', 'BB019', '2020-09-06 10:51:11'),
(0.0018, 'MK013', 'BB022', '2020-09-06 10:51:20'),
(0.0024, 'MK013', 'BB014', '2020-09-06 10:51:31'),
(0.0075, 'MK013', 'BB020', '2020-09-06 10:51:42'),
(0.015, 'MK013', 'BB021', '2020-09-06 10:51:51'),
(0.004, 'MK013', 'BB023', '2020-09-06 10:51:57'),
(0.0022, 'MK013', 'BB012', '2020-09-06 10:52:09'),
(0.024, 'MK013', 'BB005', '2020-09-06 10:52:17'),
(0.09, 'MK013', 'BB006', '2020-09-06 10:52:23'),
(0.0048, 'MK013', 'BB003', '2020-09-06 10:52:30'),
(0.02, 'MK014', 'BB024', '2020-09-06 10:53:04'),
(0.0012, 'MK014', 'BB025', '2020-09-06 10:53:11'),
(0.025, 'MK014', 'BB026', '2020-09-06 10:53:18'),
(0.0072, 'MK014', 'BB005', '2020-09-06 10:53:34'),
(0.008, 'MK014', 'BB006', '2020-09-06 10:53:41'),
(0.00384, 'MK014', 'BB003', '2020-09-06 10:53:49'),
(0.00144, 'MK014', 'BB027', '2020-09-06 10:53:56'),
(0.105, 'MK015', 'BB028', '2020-09-06 10:54:26'),
(0.11295, 'MN001', 'BB029', '2020-09-06 10:55:22'),
(0.002, 'MN001', 'BB030', '2020-09-06 10:55:29'),
(0.0096, 'MN001', 'BB031', '2020-09-06 10:55:36'),
(0.11295, 'MN002', 'BB029', '2020-09-06 10:56:06'),
(0.09, 'MN002', 'BB032', '2020-09-06 10:56:15'),
(0.0144, 'MN002', 'BB031', '2020-09-06 10:56:23'),
(0.11295, 'MN003', 'BB029', '2020-09-06 10:57:03'),
(0.04, 'MN003', 'BB033', '2020-09-06 10:57:16'),
(0.0096, 'MN003', 'BB031', '2020-09-06 10:57:23'),
(0.11295, 'MN004', 'BB029', '2020-09-06 10:58:03'),
(0.36, 'MN004', 'BB034', '2020-09-06 10:58:11'),
(0.0144, 'MN004', 'BB031', '2020-09-06 10:58:24'),
(0.11295, 'MN005', 'BB029', '2020-09-06 10:58:58'),
(0.0825, 'MN005', 'BB035', '2020-09-06 10:59:11'),
(0.0096, 'MN005', 'BB031', '2020-09-06 10:59:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_dettransaksi`
--

CREATE TABLE `t_dettransaksi` (
  `qty` int(2) DEFAULT NULL,
  `sub_total` bigint(20) DEFAULT NULL,
  `kd_produk` varchar(5) DEFAULT NULL,
  `kd_transaksi` varchar(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_dettransaksi`
--

INSERT INTO `t_dettransaksi` (`qty`, `sub_total`, `kd_produk`, `kd_transaksi`, `created_at`) VALUES
(3, 39000, 'MK006', 'TR0001', '2020-09-06 11:03:56'),
(2, 10000, 'MN001', 'TR0001', '2020-09-06 11:04:45'),
(3, 15000, 'MK015', 'TR0001', '2020-09-06 11:04:53'),
(2, 56000, 'MK007', 'TR0002', '2020-09-06 11:07:06'),
(1, 10000, 'MN002', 'TR0002', '2020-09-06 11:07:14'),
(1, 10000, 'MN004', 'TR0002', '2020-09-06 11:07:21'),
(1, 55000, 'MK001', 'TR0003', '2020-09-06 11:09:49'),
(3, 39000, 'MK006', 'TR0003', '2020-09-06 11:10:03'),
(5, 25000, 'MK015', 'TR0003', '2020-09-06 11:10:14'),
(1, 28000, 'MK007', 'TR0003', '2020-09-06 11:10:25'),
(3, 30000, 'MN002', 'TR0003', '2020-09-06 11:10:37'),
(2, 10000, 'MN001', 'TR0003', '2020-09-06 11:10:42'),
(2, 2000, 'MK009', 'TR0004', '2020-09-06 11:11:40'),
(2, 2000, 'MK010', 'TR0004', '2020-09-06 11:11:45'),
(3, 15000, 'MK015', 'TR0004', '2020-09-06 11:11:50'),
(2, 30000, 'MK004', 'TR0004', '2020-09-06 11:11:56'),
(1, 13000, 'MK006', 'TR0004', '2020-09-06 11:12:00'),
(3, 15000, 'MN001', 'TR0004', '2020-09-06 11:12:08'),
(1, 55000, 'MK002', 'TR0005', '2020-09-06 11:13:18'),
(3, 15000, 'MK012', 'TR0005', '2020-09-06 11:13:43'),
(1, 5000, 'MN001', 'TR0005', '2020-09-06 11:13:52'),
(1, 5000, 'MK015', 'TR0005', '2020-09-06 11:13:59'),
(1, 13000, 'MK006', 'TR0006', '2020-09-06 11:14:32'),
(1, 5000, 'MK015', 'TR0006', '2020-09-06 11:14:36'),
(1, 10000, 'MN003', 'TR0006', '2020-09-06 11:14:41'),
(1, 28000, 'MK008', 'TR0007', '2020-09-06 11:15:05'),
(1, 1000, 'MK009', 'TR0007', '2020-09-06 11:15:10'),
(1, 5000, 'MK015', 'TR0007', '2020-09-06 11:15:16'),
(1, 5000, 'MN001', 'TR0007', '2020-09-06 11:15:20'),
(1, 28000, 'MK007', 'TR0008', '2020-09-06 11:16:00'),
(1, 5000, 'MK015', 'TR0008', '2020-09-06 11:16:05'),
(1, 10000, 'MN002', 'TR0008', '2020-09-06 11:16:11'),
(2, 10000, 'MK011', 'TR0009', '2020-09-06 11:16:49'),
(2, 8000, 'MK014', 'TR0009', '2020-09-06 11:16:56'),
(1, 5000, 'MK015', 'TR0009', '2020-09-06 11:17:00'),
(1, 5000, 'MN001', 'TR0009', '2020-09-06 11:17:04'),
(2, 8000, 'MK013', 'TR0010', '2020-09-06 11:17:45'),
(2, 8000, 'MK014', 'TR0010', '2020-09-06 11:17:58'),
(3, 15000, 'MK015', 'TR0010', '2020-09-06 11:18:04'),
(3, 39000, 'MK005', 'TR0010', '2020-09-06 11:18:11'),
(2, 20000, 'MN004', 'TR0010', '2020-09-06 11:18:16'),
(1, 5000, 'MN001', 'TR0010', '2020-09-06 11:18:21'),
(2, 110000, 'MK001', 'TR0011', '2020-09-07 03:25:08'),
(1, 13000, 'MK006', 'TR0011', '2020-09-07 03:25:25'),
(2, 10000, 'MK015', 'TR0011', '2020-09-07 03:25:33'),
(2, 20000, 'MN002', 'TR0011', '2020-09-07 03:25:40'),
(1, 13000, 'MK006', 'TR0012', '2020-09-08 14:23:37'),
(1, 5000, 'MN001', 'TR0013', '2020-09-08 14:50:02'),
(3, 45000, 'MK004', 'TR0014', '2022-06-09 20:29:52'),
(9, 495000, 'MK001', 'TR0014', '2022-06-09 20:30:09'),
(2, 10000, 'MK011', 'TR0015', '2022-06-09 20:42:38'),
(2, 20000, 'MN005', 'TR0016', '2022-06-10 05:01:29'),
(5, 65000, 'MK006', 'TR0017', '2022-06-10 12:24:41'),
(14, 56000, 'MK013', 'TR0018', '2022-07-04 12:25:46'),
(3, 15000, 'MK011', 'TR0019', '2023-01-30 13:18:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_meja`
--

CREATE TABLE `t_meja` (
  `kd_meja` varchar(4) NOT NULL,
  `nama_meja` varchar(10) DEFAULT NULL,
  `status_meja` smallint(1) DEFAULT NULL,
  `kd_transaksi` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_meja`
--

INSERT INTO `t_meja` (`kd_meja`, `nama_meja`, `status_meja`, `kd_transaksi`) VALUES
('MJ01', 'Meja01', 0, '0'),
('MJ02', 'Meja02', 0, '0'),
('MJ03', 'Meja03', 0, '0'),
('MJ04', 'Meja04', 0, '0'),
('MJ05', 'Meja05', 0, '0'),
('MJ06', 'Meja06', 0, '0'),
('MJ07', 'Meja07', 0, '0'),
('MJ08', 'Meja08', 0, '0'),
('MJ09', 'Meja09', 0, '0'),
('MJ10', 'Meja10', 0, '0'),
('MJ11', 'Meja11', 0, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembelianbb`
--

CREATE TABLE `t_pembelianbb` (
  `jumlah_beli` float DEFAULT NULL,
  `harga_kg` int(15) DEFAULT NULL,
  `kd_supplier` varchar(5) DEFAULT NULL,
  `kd_bahanbaku` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk`
--

CREATE TABLE `t_produk` (
  `kd_produk` varchar(5) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `kategori_produk` varchar(20) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_produk`
--

INSERT INTO `t_produk` (`kd_produk`, `nama_produk`, `kategori_produk`, `harga`) VALUES
('MK001', 'Gurame Bakar', 'Makanan', 55000),
('MK002', 'Gurame Goreng', 'Makanan', 55000),
('MK003', 'Lele Bakar', 'Makanan', 15000),
('MK004', 'Lele Goreng', 'Makanan', 15000),
('MK005', 'Ayam Bakar', 'Makanan', 13000),
('MK006', 'Ayam Goreng', 'Makanan', 13000),
('MK007', 'Bebek Bakar', 'Makanan', 28000),
('MK008', 'Bebek Goreng', 'Makanan', 28000),
('MK009', 'Tahu Goreng', 'Makanan', 1000),
('MK010', 'Tempe Goreng', 'Makanan', 1000),
('MK011', 'Ati Ampela Goreng', 'Makanan', 5000),
('MK012', 'Usus Goreng', 'Makanan', 5000),
('MK013', 'Pepes Usus', 'Makanan', 4000),
('MK014', 'Perkedel Kentang', 'Makanan', 4000),
('MK015', 'Nasi', 'Makanan', 5000),
('MN001', 'Teh Manis', 'Minuman', 5000),
('MN002', 'Jus Mangga', 'Minuman', 10000),
('MN003', 'Jus Jambu', 'Minuman', 10000),
('MN004', 'Jus Buah Naga', 'Minuman', 10000),
('MN005', 'Jus Sirsak', 'Minuman', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_supplier`
--

CREATE TABLE `t_supplier` (
  `kd_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat_supplier` text DEFAULT NULL,
  `telp_supplier` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_supplier`
--

INSERT INTO `t_supplier` (`kd_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`) VALUES
('SUP01', 'Jajang Sudrajat', 'Jln. Mekarwangi No. 9', '089981239398'),
('SUP02', 'Gunawan Wawan', 'Jln. Aspal Butut No. 10', '089839123849'),
('SUP03', 'Yudha Gunanjar', 'Jln. Sae Bagus No. 99', '081238448899'),
('SUP04', 'Ginanjar Zidan', 'Jln. Panghegar Mulia No. 1', '084582832139'),
('SUP05', 'Bagus Fitrah', 'Jln. Lollapaloza No. 23', '087378812331'),
('SUP06', 'Haikal Kaminin', 'Jln. Jigen No. 7', '082618248448'),
('SUP07', 'Pinanji Guyat', 'Jln. Vinaldo No. 88', '086828312834'),
('SUP08', 'Uus Guhanjur', 'Jln. Isin Maju No. 14', '081292948834'),
('SUP09', 'Ius Sunandar', 'Jln. Ki Haji Dewantara No. 18', '089812312834'),
('SUP10', 'Putra Angkasa', 'Jln. Jinjing Kajinjing No. 19', '085723884721');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `kd_transaksi` varchar(6) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `nama_pembeli` varchar(50) DEFAULT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `bayar` bigint(20) DEFAULT NULL,
  `kembalian` bigint(20) DEFAULT NULL,
  `status_transaksi` smallint(1) DEFAULT NULL,
  `kd_user` smallint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`kd_transaksi`, `tgl_transaksi`, `nama_pembeli`, `total_bayar`, `bayar`, `kembalian`, `status_transaksi`, `kd_user`) VALUES
('TR0001', '2020-08-28 13:05:34', 'Vevo', 64000, 70000, 6000, 1, 2),
('TR0002', '2020-08-29 14:07:23', 'Guhal Annar', 76000, 80000, 4000, 1, 2),
('TR0003', '2020-08-30 16:40:55', 'Ipoh Sufi', 187000, 200000, 13000, 1, 2),
('TR0004', '2020-08-31 11:16:20', 'Sufik Andriyani', 77000, 80000, 3000, 1, 2),
('TR0005', '2020-09-01 15:32:04', 'Bernard As Salim', 80000, 80000, 0, 1, 2),
('TR0006', '2020-09-01 19:14:46', 'Aura Nadhira', 28000, 30000, 2000, 1, 2),
('TR0007', '2020-09-02 17:15:24', 'Agung Mardianto', 39000, 40000, 1000, 1, 2),
('TR0008', '2020-09-02 18:40:14', 'Indra Nur Hamdani', 43000, 50000, 7000, 1, 2),
('TR0009', '2020-09-02 21:13:08', 'Acheron Hidayat', 28000, 30000, 2000, 1, 2),
('TR0010', '2020-09-03 20:18:26', 'Nebula Ichira', 95000, 100000, 5000, 1, 2),
('TR0011', '2020-09-07 08:27:25', 'Rendy Perdana', 153000, 155000, 2000, 1, 2),
('TR0012', '2020-09-08 19:37:29', 'asd', 13000, 15000, 2000, 1, 2),
('TR0013', '2020-09-08 19:50:08', 'qwe', 5000, 10000, 5000, 1, 2),
('TR0014', '2022-06-10 01:35:42', 'Rendy Perdana', 540000, 600000, 60000, 1, 2),
('TR0015', '2022-06-10 01:43:04', 'Pooh', 10000, 90000, 80000, 1, 2),
('TR0016', '2022-06-10 10:01:47', 'Jojo', 20000, 30000, 10000, 1, 2),
('TR0017', '2023-01-30 19:17:55', 'Perdana', 65000, 70000, 5000, 1, 2),
('TR0018', '2023-01-30 19:18:06', 'Re', 56000, 60000, 4000, 1, 2),
('TR0019', '2023-01-30 19:19:50', 'Qwe', 15000, 20000, 5000, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `kd_user` smallint(2) NOT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(8) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` smallint(1) DEFAULT NULL,
  `file` varchar(255) DEFAULT 'defaultuser.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`kd_user`, `no_ktp`, `nama`, `jk`, `agama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `email`, `username`, `password`, `level`, `file`) VALUES
(1, '3273121507990001', 'Rendy Perdana', 'Laki-laki', 'Islam', 'Kota Bandung', '1999-07-15', 'Jln. Gng. Babakan Jatimulya 4 RT006/RW007 Kel. Gumuruh Kec. Batununggal Kota Bandung', '082216460861', 'rendyperdana74@mahasiswa.unikom.ac.id', 'admin123', '$2y$10$nluLIvkXPGFCjfyXoZl0s.6xS/PcdJR86eWEMaPZvjbAdd1r9kkNy', 1, 'Tanjiro.jpg'),
(2, '3273121507990002', 'Anatashia Kallen', 'Perempuan', 'Islam', 'Kota Bandung', '2020-07-15', 'Jln. Cempaka Harum No.17', '082216460861', 'natas77@email.com', 'natas123', '$2y$10$QVQnMQVt5IuHGxv36Gm6nuwavt9KPGHoLgD72aasGjXZL4FcrtABW', 0, 'Kallen.jpg'),
(3, '3273121507990003', 'Fitriani Sofia', 'Perempuan', 'Islam', 'Cirebon', '1998-07-07', 'Jln. Bangau Siam No. 9', '089831235748', 'fitria88@gmail.com', 'fitri123', '$2y$10$1Z2jaWuFmBdudNQq0//XhO5fmkoqkAJ/hYyN5rAQzn/QXD4auRHgS', 0, '2.jpg'),
(4, '3273121507990004', 'Lazuardi Yasratcha', 'Laki-laki', 'Islam', 'Bandung', '1999-09-22', 'Jln. Geger Kalong No. 22', '084312123885', 'lazuardi123@gmail.com', 'ardi9999', '$2y$10$pw7MnNcmPcClVZCDDiKAju..CqiI08OaEaUxQjROO03VCP/zx1Tsy', 0, '1002728.jpg'),
(5, '3273121507990005', 'Leitourgia Agnis', 'Perempuan', 'Kristen', 'Jakarta Selatan', '1998-02-09', 'Jln. Hegar Rapi No. 11', '087899123854', 'leitourgia09@gmail.com', 'agnis123', '$2y$10$Dpw97Bq81jeHlGf1dX1RBeerhRqL/PDzzbYS3DcAyPI.d/1GOVDqO', 0, 'z-w-gu-excal3b.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_bahanbaku`
--
ALTER TABLE `t_bahanbaku`
  ADD PRIMARY KEY (`kd_bahanbaku`);

--
-- Indeks untuk tabel `t_meja`
--
ALTER TABLE `t_meja`
  ADD PRIMARY KEY (`kd_meja`);

--
-- Indeks untuk tabel `t_pembelianbb`
--
ALTER TABLE `t_pembelianbb`
  ADD KEY `fk_pembelian` (`kd_bahanbaku`);

--
-- Indeks untuk tabel `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indeks untuk tabel `t_supplier`
--
ALTER TABLE `t_supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- Indeks untuk tabel `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `kd_user` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_pembelianbb`
--
ALTER TABLE `t_pembelianbb`
  ADD CONSTRAINT `fk_pembelian` FOREIGN KEY (`kd_bahanbaku`) REFERENCES `t_bahanbaku` (`kd_bahanbaku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
