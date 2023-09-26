-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 14, 2023 lúc 04:35 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitebanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproducttype`
--

CREATE TABLE `adproducttype` (
  `ma_loaisp` varchar(30) NOT NULL,
  `ten_loaisp` varchar(50) NOT NULL,
  `mota_loaisp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `adproducttype`
--

INSERT INTO `adproducttype` (`ma_loaisp`, `ten_loaisp`, `mota_loaisp`) VALUES
('trang', '123', 'trang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ma_loaisp`, `ma_sp`, `tensp`, `hinhanh`, `dongia`, `soluong`, `khuyenmai`, `create_date`) VALUES
('ip', 'ip13', 'iphone13', '', 12344, 12, 100, '2023-09-20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adproducttype`
--
ALTER TABLE `adproducttype`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ma_sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
