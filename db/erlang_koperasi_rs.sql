-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3310
-- Generation Time: Jul 27, 2025 at 08:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erlang_koperasi_rs`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int NOT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `telp`, `fax`, `email`) VALUES
(1, 'PT Sinar Jaya', 'Jl. Merdeka No.1, Jakarta', '021-5551111', '021-5551112', 'info@sinarjaya.co.id'),
(2, 'CV Maju Mundur', 'Jl. Sudirman No.22, Bandung', '022-1234567', '022-1234568', 'contact@majumundur.co.id'),
(3, 'Toko Makmur', 'Jl. Gajah Mada No.45, Surabaya', '031-7890123', '031-7890124', 'toko@makmur.id'),
(4, 'PT Elektrindo', 'Jl. Diponegoro No.8, Semarang', '024-6789012', '024-6789013', 'cs@elektrindo.com'),
(5, 'CV Anugrah Abadi', 'Jl. Slamet Riyadi No.77, Solo', '0271-888999', '0271-889000', 'admin@anugrah.co.id'),
(6, 'PT Cahaya Timur', 'Jl. Ahmad Yani No.30, Malang', '0341-223344', '0341-223345', 'info@cahayatimur.com'),
(7, 'UD Sumber Rezeki', 'Jl. Pemuda No.9, Medan', '061-3344556', '061-3344557', 'sumber@rezeki.co.id'),
(8, 'PT Mega Surya', 'Jl. Pahlawan No.100, Balikpapan', '0542-112233', '0542-112234', 'support@megasurya.com'),
(9, 'CV Sentosa Abadi', 'Jl. Rajawali No.5, Yogyakarta', '0274-556677', '0274-556678', 'sentosa@abadi.id'),
(10, 'PT Inti Nusantara', 'Jl. Cendrawasih No.12, Makassar', '0411-778899', '0411-778900', 'admin@intinusantara.com');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int NOT NULL,
  `nama_identitas` varchar(100) DEFAULT NULL,
  `badan_hukum` varchar(100) DEFAULT NULL,
  `npwp` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `rekening` varchar(50) DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_identitas`, `badan_hukum`, `npwp`, `email`, `url`, `alamat`, `telp`, `fax`, `rekening`, `foto`) VALUES
(1, 'Koperasi Sejahtera Bersama', 'Koperasi', '12.345.678.9-012.345', 'info@ksb.or.id', 'https://ksb.or.id', 'Jl. Pancasila No.1, Jakarta', '021-55667788', '021-55667789', '1234567890 (BRI)', 'logo_ksb.jpg'),
(2, 'PT Mitra Mandiri', 'Perseroan Terbatas', '98.765.432.1-234.567', 'admin@mitramandiri.co.id', 'https://mitramandiri.co.id', 'Jl. Gatot Subroto No.99, Bandung', '022-33445566', '022-33445567', '9876543210 (BCA)', 'logo_mitra.jpg'),
(3, 'CV Maju Jaya', 'Commanditaire Vennootschap', '11.222.333.4-555.666', 'kontak@majujaya.com', 'http://majujaya.com', 'Jl. Merdeka Timur No.7, Surabaya', '031-77889900', '031-77889901', '1122334455 (Mandiri)', 'logo_majujaya.png'),
(4, 'Yayasan Cendekia', 'Yayasan', '09.876.543.2-111.222', 'info@cendekia.org', 'https://cendekia.org', 'Jl. Pendidikan No.10, Yogyakarta', '0274-667788', '0274-667789', '5566778899 (BNI)', 'logo_cendekia.svg'),
(5, 'Koperasi Karyawan Sukses', 'Koperasi', '10.101.010.1-010.101', 'koperasi@sukses.id', 'https://koperasisukses.id', 'Jl. Industri No.88, Bekasi', '021-99887766', '021-99887767', '9988776655 (BSI)', 'logo_sukses.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int NOT NULL,
  `nama_item` varchar(100) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `harga_beli` decimal(10,2) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `uom`, `harga_beli`, `harga_jual`) VALUES
(101, 'Pulpen Standard', 'pcs', 2000.00, 2500.00),
(102, 'Buku Tulis A5', 'pak', 8000.00, 10000.00),
(103, 'Kertas A4 70gsm', 'rim', 70000.00, 75000.00),
(104, 'Spidol Boardmarker', 'pcs', 18000.00, 20000.00),
(105, 'Penggaris Besi 30cm', 'pcs', 12000.00, 15000.00),
(106, 'Amplop Coklat Besar', 'pak', 35000.00, 40000.00),
(107, 'Pensil 2B', 'lusin', 4000.00, 5000.00),
(108, 'Stapler Kecil', 'pcs', 10000.00, 12500.00),
(109, 'Kalkulator Mini', 'pcs', 45000.00, 50000.00),
(110, 'Map Plastik A4', 'pak', 15000.00, 18000.00);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id_user` int NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_user` int NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'Administrator', 'petugas', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int NOT NULL,
  `tgl_sales` date DEFAULT NULL,
  `id_customer` int DEFAULT NULL,
  `do_number` varchar(50) DEFAULT NULL,
  `status` enum('baru','proses','selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `tgl_sales`, `id_customer`, `do_number`, `status`) VALUES
(1, '2025-07-01', 1, 'DO-20250701-001', 'proses'),
(3, '2025-07-03', 3, 'DO-20250703-003', 'selesai'),
(4, '2025-07-04', 4, 'DO-20250704-004', 'baru'),
(5, '2025-07-05', 5, 'DO-20250705-005', 'selesai'),
(8, '2025-07-08', 1, 'DO-20250708-008', 'selesai'),
(10, '2025-07-10', 5, 'DO-20250710-010', 'proses'),
(12, '2025-07-27', 2, 'DO-20250701-00ANA', 'selesai'),
(13, '2025-07-27', 4, 'DO-20250701-00TES1A', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int NOT NULL,
  `id_item` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_item`, `quantity`, `price`, `amount`, `session_id`, `remark`) VALUES
(1, 101, 2, 25000.00, 50000.00, NULL, NULL),
(2, 102, 5, 10000.00, 50000.00, NULL, NULL),
(3, 103, 1, 75000.00, 75000.00, NULL, NULL),
(4, 104, 3, 20000.00, 60000.00, NULL, NULL),
(5, 105, 4, 15000.00, 60000.00, NULL, NULL),
(6, 101, 1, 25000.00, 25000.00, NULL, NULL),
(7, 106, 2, 40000.00, 80000.00, NULL, NULL),
(8, 107, 6, 5000.00, 30000.00, NULL, NULL),
(9, 103, 2, 75000.00, 150000.00, NULL, NULL),
(10, 104, 3, 20000.00, 60000.00, NULL, NULL),
(11, 101, 2, 2500.00, 5000.00, 'sess_abc123', 'Pembelian rutin'),
(12, 102, 5, 10000.00, 50000.00, 'sess_xyz456', 'Pembelian awal semester'),
(13, 103, 1, 75000.00, 75000.00, 'sess_def789', 'Permintaan khusus'),
(14, 104, 3, 20000.00, 60000.00, 'sess_abc123', 'Kebutuhan kantor'),
(15, 105, 4, 15000.00, 60000.00, 'sess_ghi321', ''),
(16, 106, 1, 40000.00, 40000.00, 'sess_xyz456', 'Tambahan'),
(17, 107, 6, 5000.00, 30000.00, 'sess_ghi321', ''),
(18, 108, 2, 12500.00, 25000.00, 'sess_def789', 'Stok habis'),
(19, 109, 1, 50000.00, 50000.00, 'sess_abc123', 'Pengganti unit lama'),
(20, 110, 3, 18000.00, 54000.00, 'sess_xyz456', 'Map penting');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_temp`
--

CREATE TABLE `transaction_temp` (
  `id_transaction` int DEFAULT NULL,
  `id_item` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_item` (`id_item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
