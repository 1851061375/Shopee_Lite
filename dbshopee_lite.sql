-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 18, 2021 lúc 06:32 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopee_lite`
--
CREATE DATABASE IF NOT EXISTS `shopee_lite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci;
USE `shopee_lite`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(150) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PASSWORD` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ID`, `EMAIL`, `PASSWORD`) VALUES
(24, 'lapphung99@gmail.com', 'lapphung'),
(32, 'zgu09445@eoopy.com', '123456'),
(33, 'lapphung99@gmail.com', '123456'),
(34, 'lapphung99@gmail.com', '123456'),
(35, 'lapphung99@gmail.com', '09122000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `TYPE` int(11) NOT NULL,
  `C_NAME` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`TYPE`, `C_NAME`) VALUES
(0, 'Sản phẩm'),
(1, 'Hunter nữ'),
(2, 'Hunter nam'),
(3, 'Giày dép trẻ em'),
(4, 'Sản phẩm đặc biệt'),
(5, 'Khuyến mãi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `PICTURE` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `NAME` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `PRICE` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ORIGIN` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `TYPE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `PICTURE`, `NAME`, `PRICE`, `ORIGIN`, `TYPE`) VALUES
(1, 'bitis_1.jpeg', 'Giày Biti\'s HunterX2k20 Multi Layer Forest DSMH02800DEN/DSWH02800DEN', 'đ829.000 - đ899.000', 'TP. Hồ  Chí Minh', 2),
(2, 'bitis_2.jpeg', 'Giày Biti\'s Hunter Street Americano 2k20 DSWH03700DEN/DSMH03700DEN', 'đ749.000', 'TP.Hồ Chí Minh', 1),
(6, 'bitis_4.jpeg', 'Giày Thể Thao Nam Bitis Hunter X Festive Frosty White Season 3 - 2k20 DSMH03500TRG (Trắng)', 'đ899.000', 'TP. Hồ  Chí Minh', 2),
(7, 'bitis_5.jpeg', 'Giày Biti\'s Hunter Street Festive Low-Cut Frosty White Season 3 - 2k20 DSWH04300TRG/ DSMH04300TRG', 'đ699.000', 'TP. Hồ  Chí Minh', 1),
(8, 'bitis_6.jpeg', 'Giày Biti\'s Hunter Street Festive Low-Cut Frosty White Season 3 - 2k20 DSWH04300TRG/ DSMH04300TRG', 'đ549.000', 'TP. Hồ  Chí Minh', 2),
(9, 'bitis_7.jpeg', 'Giày Thể Thao Biti\'s Hunter X 2k19 Jet Navy DSMH02200XNH/ DSWH02200XNH', 'đ829.000 - đ899.000', 'TP. Hồ  Chí Minh', 2),
(10, 'bitis_8.jpeg', 'Giày Biti’s Hunter X - Summer 2K19 ADVENTURE COLLECTION DSMH01100XAM', 'đ899.000', 'TP.Hồ Chí Minh', 2),
(15, 'bitis_9.jpeg', 'Giày Biti\'s Hunter Street Mid-Top 2k20 DSWH03601TRG/DSMH03601TRG', 'đ699.000', 'TP.Hồ Chí Minh', 2),
(16, 'bitis_3.jpeg', 'Giày Bitis Hunter Street Festive Low-Cut Frosty White Season 3 - 2k20 DSWH04300TRG/ DSMH04300TRG', 'đ699.000', 'TP.Hồ Chí Minh', 1),
(17, 'bitis_10.jpeg', 'Giày Thể Thao Biti\'s Hunter X 2k20 Matcha DSMH03400XMN (Xanh Nhớt)', 'đ999.000', 'TP.Hồ Chí Minh', 2),
(18, 'bitis_14.jpeg', 'Giày Nữ Biti\'s Hunter X 2k20 Multi Layer Desert Pink DSWH02800HOG', 'đ829.000', 'TP.Hồ Chí Minh', 1),
(19, 'bitis_11.jpeg', 'Sandal Nam Biti\'s Hunter Festive Zig-Zag Brown Tint S3 DEMH00600DEN', 'đ429.000', 'TP.Hồ Chí Minh', 3),
(20, 'bitis_12.jpeg', 'Sandal Nữ Biti\'s Hunter Festive Starbright Pink DEWH00500HOG (Hồng)', 'đ399.000', 'TP.Hồ Chí Minh', 3),
(21, 'bitis_13.jpeg', 'Giày Trẻ Em Biti\'s H.I.P.H.O.P Sandals Milkshake Pink DTG073600XDG', 'đ245.000', 'TP.Hồ Chí Minh', 3),
(22, 'bitis_15.jpeg', 'Giày thể thao Bitis Hunter x Dentsu Redder DWH03001TRG (Trắng)', 'đ949.000', 'TP.Hồ Chí Minh', 4),
(23, 'bitis_16.jpeg', 'Giày Thể Thao Biti’s Hunter X - Summer 2K19 ADVENTURE - DSMH01100TRG', 'đ899.000', 'TP.Hồ Chí Minh', 1),
(24, 'bitis_17.jpeg', 'Giày Cao Cấp Nam Biti\'s Hunter X Retro Essential Pack DSUH00800TRG', 'đ799.000', 'TP.Hồ Chí Minh', 5),
(25, 'bitis_18.jpeg', 'Giày Biti’s Hunter X - Summer 2K19 ADVENTURE COLLECTION DSWH01100DOO', 'đ729.000', 'TP.Hồ Chí Minh', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`TYPE`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE` (`TYPE`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`TYPE`) REFERENCES `category` (`TYPE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
