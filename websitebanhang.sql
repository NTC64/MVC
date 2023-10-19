-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 19, 2023 at 02:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create  database 'websitebanhang';
--

-- --------------------------------------------------------

--
-- Table structure for table `adproducttype`
--

CREATE TABLE `adproducttype` (
  `ma_loaisp` varchar(30) NOT NULL,
  `ten_loaisp` varchar(50) NOT NULL,
  `mota_loaisp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adproducttype`
--

INSERT INTO `adproducttype` (`ma_loaisp`, `ten_loaisp`, `mota_loaisp`) VALUES
('DT', 'Điện thoại2222', 'DT'),
('TL', 'Tủ lạnh', 'TL');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `makh` int(10) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi_lienhe` varchar(100) NOT NULL,
  `diachi_giaohang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`makh`, `tenkh`, `dienthoai`, `email`, `diachi_lienhe`, `diachi_giaohang`) VALUES
(30, 'chung', '0368808518', 'nguyenthanhchung.06042002@gmail.com', 'hòa bình', 'hà nội'),
(31, 'nguyễn thành chung', '2', 'ntchung.642002@gmail.com', 'hb', 'hb'),
(32, 'chung', '2', 'chungvvvv@gmail.com', 'hb', 'hb');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `mahd` int(10) NOT NULL,
  `ma_sp` varchar(30) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`mahd`, `ma_sp`, `tensp`, `soluong`, `dongia`, `khuyenmai`) VALUES
(23, 'TL2', '3', 17, 222, 2),
(23, 'TL1', 'TỦ lẹnh', 4, 2, 2),
(23, 'DT2', 'điện thoại', 3, 100000, 0),
(24, 'DT2', 'điện thoại 2', 8, 100000, 0),
(25, 'DT2', 'điện thoại 2', 8, 100000, 0),
(25, 'TL1', 'TỦ lẹnh', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ordersp`
--

CREATE TABLE `ordersp` (
  `mahd` int(10) NOT NULL,
  `date` date NOT NULL,
  `tongtien` int(11) NOT NULL,
  `makh` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordersp`
--

INSERT INTO `ordersp` (`mahd`, `date`, `tongtien`, `makh`) VALUES
(23, '2030-09-23', 300042, 30),
(24, '2023-10-05', 800000, 31),
(25, '2023-10-05', 800002, 32);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ma_loaisp` varchar(30) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `ma_sp` varchar(30) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `tensp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `hinhanh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `dongia` int(20) NOT NULL,
  `soluong` int(20) NOT NULL,
  `khuyenmai` int(10) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ma_loaisp`, `ma_sp`, `tensp`, `hinhanh`, `dongia`, `soluong`, `khuyenmai`, `create_date`) VALUES
('DT2', 'DT2', 'điện thoại 2', '', 100000, 2, 0, '2005-10-23'),
('TL1', 'TL1', 'TỦ lẹnh', 'Screenshot 2023-09-05 163723.png', 2, 2, 2, '2027-09-23'),
('TL2', 'TL2', '3', '5a9cddf20e46ce189757.jpg', 222, 2, 2, '2027-09-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adproducttype`
--
ALTER TABLE `adproducttype`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `ordersp`
--
ALTER TABLE `ordersp`
  ADD PRIMARY KEY (`mahd`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ma_sp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `makh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ordersp`
--
ALTER TABLE `ordersp`
  MODIFY `mahd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
