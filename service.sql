-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2015 at 05:53 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL,
  `pegawai_type_id` int(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `pegawai_type_id`, `nama`, `alamat`, `no_telp`) VALUES
(111, 3, 'Wawan', 'Jl. Raya Janti', 2147483647),
(112, 3, 'Ayek', 'jl monjali', 2147483647),
(113, 6, 'Amin', 'Jl. Belibis', 2147483647),
(114, 6, 'Azonk', 'Jl. Karang Jambe', 814748364),
(115, 2, 'Rio', 'jl. Kanoman', 2147483647),
(116, 2, 'Suid', 'Jl. samping', 2147483647),
(117, 2, 'Endi', ',Jl. Terus', 2147483647),
(118, 2, 'Ariyadi', 'Jl. Belibis', 2147483647),
(119, 1, 'Oka', 'Jl. Penyesalan', 2147483647),
(120, 1, 'Doyok', 'Jl. Kemana', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_type`
--

CREATE TABLE IF NOT EXISTS `pegawai_type` (
  `id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_type`
--

INSERT INTO `pegawai_type` (`id`, `nama`) VALUES
(1, 'OB'),
(2, 'Teknisi'),
(3, 'Operator'),
(6, 'Pencatatan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `tipe_kendaraan` int(11) DEFAULT NULL,
  `no_polisi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telp`, `tipe_kendaraan`, `no_polisi`) VALUES
('PLG-3', 'Pian', 'Jl. Hidup', '0855555675665', 3, 'AB 2345 GL'),
('PLG-4', 'Bobi', 'Jl. Yuk', '0855555675665', 1, 'AB 6101 L'),
('PLG-5', 'Febri', 'Jl. Monjali', '086524352425', 2, 'AB 5678 Y'),
('PLG-6', 'Mak Piyek', 'Jl. Jalan', '086545664435', 1, 'AE 2312 YG'),
('PLG-7', 'Didi', 'Jl. Lobang', '08765456754', 2, 'KB 1412 C'),
('PLG-8', 'Dodo', 'Jl. Mundur', '0821874657684', 2, 'BM 2121 BM'),
('PLG-9', 'Sukoco', 'Jl. Derita', '08219484755', 1, 'BL 4015 BL');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `type_id`, `nama`, `harga`, `stok`) VALUES
(1, 101, 'Daytona', 100000, 0),
(2, 102, 'Yamalube', 45000, 0),
(3, 104, 'Nissin', 50000, 0),
(4, 105, 'Aspire', 15000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_detail`
--

CREATE TABLE IF NOT EXISTS `produk_detail` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `stok` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_type`
--

CREATE TABLE IF NOT EXISTS `produk_type` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_type`
--

INSERT INTO `produk_type` (`id`, `nama`) VALUES
(101, 'Rantai'),
(102, 'Oli'),
(103, 'Gear'),
(104, 'Kampas'),
(105, 'Tali Gas'),
(106, 'V-Belt');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `no_telp`, `alamat`) VALUES
(1, 'Toko C', '086544354643', 'Jl. Boleh'),
(2, 'Toko Alat', '085243546473', 'Jl. Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE IF NOT EXISTS `tipe_kendaraan` (
  `id_tipe` int(6) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`id_tipe`, `nama_tipe`) VALUES
(1, 'Motor Matic'),
(2, 'Motor Sport'),
(3, 'Motor Bebek');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pelanggan` varchar(11) DEFAULT NULL,
  `id_teknisi` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `tanggal`, `id_pelanggan`, `id_teknisi`) VALUES
(1, 'ererer', '2015-08-17', 'PLG-3', 115),
(2, 'TRNS', '2015-08-21', 'PLG-3', 116),
(3, 'TRNS', '2015-08-25', 'PLG-4', 117),
(4, 'TRNS', '2015-08-31', 'PLG-6', 118),
(5, 'TRNS', '2015-08-19', 'PLG-7', 116),
(6, 'TRNS', '2015-09-02', 'PLG-4', 115),
(7, 'TRNS', '2015-09-11', 'PLG-3', 117),
(8, 'TRNS', '2015-08-26', 'PLG-8', 117),
(9, 'TRNS', '1970-01-01', 'PLG-9', 118);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beli`
--

CREATE TABLE IF NOT EXISTS `transaksi_beli` (
  `id_beli` varchar(15) NOT NULL,
  `tgl_beli` date DEFAULT NULL,
  `id_supplier` int(15) DEFAULT NULL,
  `id_barang` int(20) DEFAULT NULL,
  `jumlah_beli` int(15) DEFAULT NULL,
  `harga_beli` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_beli`
--

INSERT INTO `transaksi_beli` (`id_beli`, `tgl_beli`, `id_supplier`, `id_barang`, `jumlah_beli`, `harga_beli`) VALUES
('TRNBL-2', '2015-08-06', 1, 1, 2, 50000),
('TRNBL-3', '2015-09-09', 1, 1, 4, 10000),
('TRNBL-4', '2015-08-26', 2, 4, 20, 10000),
('TRNBL-5', '2015-12-15', 1, 2, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_item`
--

CREATE TABLE IF NOT EXISTS `transaksi_item` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_item`
--

INSERT INTO `transaksi_item` (`id`, `transaksi_id`, `produk_id`, `jumlah`, `diskon`, `subtotal`) VALUES
(1, 1, 1, 12, NULL, 1200000),
(2, 1, 2, 11, NULL, 495000),
(3, 2, 2, 2, NULL, 90000),
(4, 2, 1, 4, NULL, 400000),
(5, 3, 3, 1, NULL, 50000),
(6, 4, 2, 1, NULL, 45000),
(7, 5, 1, 1, NULL, 100000),
(8, 6, 3, 2, NULL, 100000),
(9, 7, 1, 3, NULL, 300000),
(10, 8, 4, 1, 0, 15000),
(11, 9, 2, 2, NULL, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `username` varchar(25) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` int(1) DEFAULT '1',
  `profil` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `modifiedBy` int(11) DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  `deletedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `level`, `username`, `password_hash`, `auth_key`, `email`, `status`, `profil`, `created_at`, `created_by`, `updated_at`, `modifiedBy`, `deleted`, `deletedBy`) VALUES
(2, 1, 'admin', '$2y$13$m1mad/ULZE7J0fXa8i/rPe3H0pFnGaKQocXpiNb/ixc5LvH/k0Cq2', '6LK2JcyIbiVEn1k91-We32LeAWMBHE1L', 'admin@gmail.com', 10, NULL, 1433079080, NULL, 1433079080, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`), ADD KEY `pegawai_type_id` (`pegawai_type_id`);

--
-- Indexes for table `pegawai_type`
--
ALTER TABLE `pegawai_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`), ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `produk_detail`
--
ALTER TABLE `produk_detail`
  ADD PRIMARY KEY (`id`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk_type`
--
ALTER TABLE `produk_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`), ADD KEY `id_teknisi` (`id_teknisi`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  ADD PRIMARY KEY (`id_beli`), ADD KEY `id_barang` (`id_barang`), ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `transaksi_item`
--
ALTER TABLE `transaksi_item`
  ADD PRIMARY KEY (`id`), ADD KEY `transaksi_id` (`transaksi_id`), ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD KEY `fk_tb_admin_tb_employee1` (`level`), ADD KEY `level` (`level`), ADD KEY `profil` (`profil`), ADD KEY `profil_2` (`profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai_type`
--
ALTER TABLE `pegawai_type`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  MODIFY `id_tipe` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transaksi_item`
--
ALTER TABLE `transaksi_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`pegawai_type_id`) REFERENCES `pegawai_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `produk_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_detail`
--
ALTER TABLE `produk_detail`
ADD CONSTRAINT `produk_detail_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_teknisi`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
ADD CONSTRAINT `transaksi_beli_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `transaksi_beli_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_item`
--
ALTER TABLE `transaksi_item`
ADD CONSTRAINT `transaksi_item_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `transaksi_item_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
