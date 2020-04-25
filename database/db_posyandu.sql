-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 12:08 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `no_antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(20) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_telp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `username`, `password`, `no_telp`) VALUES
('DK001', 'Rusdi', 'rusdi123', '123', 723523451);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `isi`, `tgl_dibuat`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in orci a libero hendrerit condimentum sit amet quis nisi. Vestibulum lorem eros, egestas vel eleifend eget, suscipit sed dui. Vivamus faucibus velit mauris, in accumsan dolor vestibulum', '2020-04-20 09:25:35'),
(3, 'baru\r\n', '2020-04-20 09:48:14'),
(4, 'sangat baru\r\n', '2020-04-20 10:00:19'),
(5, 'sangat sangat sangat baru', '2020-04-20 10:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_praktek`
--

CREATE TABLE `jadwal_praktek` (
  `id_jadwal` int(11) NOT NULL,
  `jam_praktek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO 'jadwal_praktek'('id_jadwal','jam_praktek') values(12052020,'13.00 WIB')
-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_praktek` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `pendaftar` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `tanggal`, `jam_praktek`, `tgl_lahir`, `kategori`, `pendaftar`) VALUES
(1, 'Ahmad Fikri', '2020-04-01', '10.00', '2020-03-09', 'Umum', ''),
(2, 'Andi', '2020-04-08', '13.00', '2020-01-20', 'Anak', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `id_pengelola` varchar(20) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id_pengelola`, `nama`, `username`, `password`) VALUES
('PG001', 'Master Aplikasi', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `kualitas` varchar(30) NOT NULL,
  `kritik` varchar(255) NOT NULL,
  `saran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` varchar(20) NOT NULL,
  `hasil_pemeriksaan` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_pasien`, `id_dokter`, `hasil_pemeriksaan`, `status`) VALUES
(1, 1, 'DK001', 'Sangat Bagus Sehat\r\n', 0),
(2, 2, 'DK001', '\r\n\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et lectus purus. Proin a quam dolor. Donec dapibus nulla elementum mauris hendrerit luctus. Suspendisse aliquam lectus arcu, at mollis ex porta ac. Nullam at velit id nisl mattis sagittis vitae at arcu. Duis sed malesuada ligula, vel facilisis nunc. Donec vulputate neque velit, id ullamcorper quam placerat vel. Duis sed est finibus, laoreet ipsum faucibus, convallis diam. Curabitur mollis mollis erat, vitae faucibus tellus dapibus in. Quisque a nibh bibendum, molestie turpis quis, venenatis neque. Morbi finibus neque id nisi bibendum commodo. Vivamus ac cursus erat.\r\n\r\nAenean sem nibh, maximus nec odio a, aliquam consectetur dui. Nam nec mi vel neque vehicula vulputate suscipit sed libero. Vestibulum auctor orci nec eros finibus convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et dictum enim. Maecenas massa nisl, posuere in eros in, condimentum feugiat ligula. Phasellus ut placerat erat.\r\n\r\nEtiam facilisis eros vel justo gravida tincidunt. Duis ac felis semper ligula vestibulum facilisis. Nulla vel felis diam. Sed turpis nulla, cursus quis lacinia nec, tempus non erat. Nulla metus metus, cursus vitae dui sit amet, interdum laoreet felis. Proin sagittis quam in turpis convallis, eget dignissim odio porttitor. Donec nunc augue, fringilla eu odio et, auctor mollis massa. In sollicitudin metus at velit accumsan, sed tincidunt tellus gravida. Vivamus vestibulum, ante quis commodo venenatis, eros felis varius ipsum, ut pulvinar est dui eu est. Aenean congue, velit ac condimentum accumsan, elit lacus finibus quam, a dapibus ex libero vitae lorem. Sed dictum nisl pharetra, viverra urna quis, vehicula dui. Proin at consectetur lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nFusce malesuada ante eu mauris dapibus, vel dictum felis dapibus. Nulla eget pharetra arcu. Nulla porttitor cursus pulvinar. Suspendisse potenti. Curabitur vulputate mollis auctor. Sed malesuada lorem vitae justo tincidunt, at euismod leo vulputate. Morbi porttitor dictum dui, in ullamcorper ligula vehicula quis. Phasellus eu ex felis. In vehicula odio nisl, eu mollis dolor molestie vel. Donec elementum fringilla vulputate. Aenean auctor, ex cursus tincidunt venenatis, nisl nisl varius lacus, sed imperdiet ipsum nisl ac tortor. Phasellus commodo malesuada lacus sit amet sagittis. Nam purus arcu, fermentum in leo vel, volutpat tempor urna. Mauris id arcu eros.\r\n\r\nPhasellus mattis, mauris eget pellentesque ornare, nunc sapien pretium nunc, vitae aliquet velit nisi vel nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam leo libero, lobortis ac porta sed, rhoncus sit amet tortor. Nulla vitae suscipit massa, ut feugiat erat. Aenean sodales sapien sed sapien interdum tristique. Proin tempus est et ipsum tincidunt, eu maximus ipsum placerat. Aenean porta viverra odio vitae aliquet. Quisque nec purus dictum, pharetra lacus vel, varius erat. Cras at velit dignissim nisl finibus suscipit. Nulla consectetur sodales nisi id eleifend. Donec tincidunt auctor leo eget euismod.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et lectus purus. Proin a quam dolor. Donec dapibus nulla elementum mauris hendrerit luctus. Suspendisse aliquam lectus arcu, at mollis ex porta ac. Nullam at velit id nisl mattis sagittis vitae at arcu. Duis sed malesuada ligula, vel facilisis nunc. Donec vulputate neque velit, id ullamcorper quam placerat vel. Duis sed est finibus, laoreet ipsum faucibus, convallis diam. Curabitur mollis mollis erat, vitae faucibus tellus dapibus in. Quisque a nibh bibendum, molestie turpis quis, venenatis neque. Morbi finibus neque id nisi bibendum commodo. Vivamus ac cursus erat.\r\n\r\nAenean sem nibh, maximus nec odio a, aliquam consectetur dui. Nam nec mi vel neque vehicula vulputate suscipit sed libero. Vestibulum auctor orci nec eros finibus convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et dictum enim. Maecenas massa nisl, posuere in eros in, condimentum feugiat ligula. Phasellus ut placerat erat.\r\n\r\nEtiam facilisis eros vel justo gravida tincidunt. Duis ac felis semper ligula vestibulum facilisis. Nulla vel felis diam. Sed turpis nulla, cursus quis lacinia nec, tempus non erat. Nulla metus metus, cursus vitae dui sit amet, interdum laoreet felis. Proin sagittis quam in turpis convallis, eget dignissim odio porttitor. Donec nunc augue, fringilla eu odio et, auctor mollis massa. In sollicitudin metus at velit accumsan, sed tincidunt tellus gravida. Vivamus vestibulum, ante quis commodo venenatis, eros felis varius ipsum, ut pulvinar est dui eu est. Aenean congue, velit ac condimentum accumsan, elit lacus finibus quam, a dapibus ex libero vitae lorem. Sed dictum nisl pharetra, viverra urna quis, vehicula dui. Proin at consectetur lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nFusce malesuada ante eu mauris dapibus, vel dictum felis dapibus. Nulla eget pharetra arcu. Nulla porttitor cursus pulvinar. Suspendisse potenti. Curabitur vulputate mollis auctor. Sed malesuada lorem vitae justo tincidunt, at euismod leo vulputate. Morbi porttitor dictum dui, in ullamcorper ligula vehicula quis. Phasellus eu ex felis. In vehicula odio nisl, eu mollis dolor molestie vel. Donec elementum fringilla vulputate. Aenean auctor, ex cursus tincidunt venenatis, nisl nisl varius lacus, sed imperdiet ipsum nisl ac tortor. Phasellus commodo malesuada lacus sit amet sagittis. Nam purus arcu, fermentum in leo vel, volutpat tempor urna. Mauris id arcu eros.\r\n\r\nPhasellus mattis, mauris eget pellentesque ornare, nunc sapien pretium nunc, vitae aliquet velit nisi vel nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam leo libero, lobortis ac porta sed, rhoncus sit amet tortor. Nulla vitae suscipit massa, ut feugiat erat. Aenean sodales sapien sed sapien interdum tristique. Proin tempus est et ipsum tincidunt, eu maximus ipsum placerat. Aenean porta viverra odio vitae aliquet. Quisque nec purus dictum, pharetra lacus vel, varius erat. Cras at velit dignissim nisl finibus suscipit. Nulla consectetur sodales nisi id eleifend. Donec tincidunt auctor leo eget euismod.\r\n', 0),
(3, 1, 'DK001', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et lectus purus. Proin a quam dolor. Donec dapibus nulla elementum mauris hendrerit luctus. Suspendisse aliquam lectus arcu, at mollis ex porta ac. Nullam at velit id nisl mattis sagittis vitae at arcu. Duis sed malesuada ligula, vel facilisis nunc. Donec vulputate neque velit, id ullamcorper quam placerat vel. Duis sed est finibus, laoreet ipsum faucibus, convallis diam. Curabitur mollis mollis erat, vitae faucibus tellus dapibus in. Quisque a nibh bibendum, molestie turpis quis, venenatis neque. Morbi finibus neque id nisi bibendum commodo. Vivamus ac cursus erat.\r\n\r\nAenean sem nibh, maximus nec odio a, aliquam consectetur dui. Nam nec mi vel neque vehicula vulputate suscipit sed libero. Vestibulum auctor orci nec eros finibus convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus et dictum enim. Maecenas massa nisl, posuere in eros in, condimentum feugiat ligula. Phasellus ut placerat erat.\r\n\r\nEtiam facilisis eros vel justo gravida tincidunt. Duis ac felis semper ligula vestibulum facilisis. Nulla vel felis diam. Sed turpis nulla, cursus quis lacinia nec, tempus non erat. Nulla metus metus, cursus vitae dui sit amet, interdum laoreet felis. Proin sagittis quam in turpis convallis, eget dignissim odio porttitor. Donec nunc augue, fringilla eu odio et, auctor mollis massa. In sollicitudin metus at velit accumsan, sed tincidunt tellus gravida. Vivamus vestibulum, ante quis commodo venenatis, eros felis varius ipsum, ut pulvinar est dui eu est. Aenean congue, velit ac condimentum accumsan, elit lacus finibus quam, a dapibus ex libero vitae lorem. Sed dictum nisl pharetra, viverra urna quis, vehicula dui. Proin at consectetur lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nFusce malesuada ante eu mauris dapibus, vel dictum felis dapibus. Nulla eget pharetra arcu. Nulla porttitor cursus pulvinar. Suspendisse potenti. Curabitur vulputate mollis auctor. Sed malesuada lorem vitae justo tincidunt, at euismod leo vulputate. Morbi porttitor dictum dui, in ullamcorper ligula vehicula quis. Phasellus eu ex felis. In vehicula odio nisl, eu mollis dolor molestie vel. Donec elementum fringilla vulputate. Aenean auctor, ex cursus tincidunt venenatis, nisl nisl varius lacus, sed imperdiet ipsum nisl ac tortor. Phasellus commodo malesuada lacus sit amet sagittis. Nam purus arcu, fermentum in leo vel, volutpat tempor urna. Mauris id arcu eros.\r\n\r\nPhasellus mattis, mauris eget pellentesque ornare, nunc sapien pretium nunc, vitae aliquet velit nisi vel nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam leo libero, lobortis ac porta sed, rhoncus sit amet tortor. Nulla vitae suscipit massa, ut feugiat erat. Aenean sodales sapien sed sapien interdum tristique. Proin tempus est et ipsum tincidunt, eu maximus ipsum placerat. Aenean porta viverra odio vitae aliquet. Quisque nec purus dictum, pharetra lacus vel, varius erat. Cras at velit dignissim nisl finibus suscipit. Nulla consectetur sodales nisi id eleifend. Donec tincidunt auctor leo eget euismod.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(70) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `alamat`, `no_telp`) VALUES
(5, 'Ahmad Kamal', 'ad', '$2y$10$sjpJruoE6Rl.a4EKHy.Yd.yBsscv17kgXTSEmWMwB./NXS3vAUj..', 'adf@email.cpm', 'cirebon', 2147483647),
(6, 'tt', 'test', '$2y$10$dQVojqhHZM.h7WQHzC/UGOIDq7HtJMLfcFmx1rP7QcqYYmif2Axae', 'fikriahmad705@gmail.com', 'cirebon', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;