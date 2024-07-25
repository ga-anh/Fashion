-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 04, 2024 lúc 01:07 PM
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
-- Cơ sở dữ liệu: `fashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(9) NOT NULL,
  `madh` varchar(50) NOT NULL,
  `iduser` int(6) NOT NULL,
  `nguoidat_ten` varchar(50) NOT NULL,
  `nguoidat_email` varchar(50) NOT NULL,
  `nguoidat_tel` varchar(20) NOT NULL,
  `nguoidat_diachi` varchar(100) NOT NULL,
  `nguoinhan_ten` varchar(50) DEFAULT NULL,
  `nguoinhan_diachi` varchar(100) DEFAULT NULL,
  `nguoinhan_tel` varchar(20) DEFAULT NULL,
  `total` int(9) NOT NULL,
  `ship` int(6) NOT NULL DEFAULT 0,
  `voucher` int(6) NOT NULL DEFAULT 0,
  `tongthanhtoan` int(9) NOT NULL,
  `pttt` tinyint(1) NOT NULL COMMENT '0: COD; 1: ck; 2: ví điện tử',
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `madh`, `iduser`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_tel`, `nguoidat_diachi`, `nguoinhan_ten`, `nguoinhan_diachi`, `nguoinhan_tel`, `total`, `ship`, `voucher`, `tongthanhtoan`, `pttt`, `status`) VALUES
(1, 'Zhope11-064753-08102023', 1, 'fsdfsd', 'fsdfdsfds', 'fsdfdsfds', 'fsdfdsfds', '', '', '', 1200, 0, 0, 1200, 1, 'Chờ lấy hàng'),
(4, 'CHANEL-HCM-062036-27012024', 0, 'anhtu', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 81000, 0, 0, 81000, 0, 'Chờ xác nhận'),
(5, 'CHANEL-HCM-062135-27012024', 0, 'anhtu', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 81000, 0, 0, 81000, 0, 'Chờ xác nhận'),
(6, 'CHANEL-HCM-062154-27012024', 0, 'anhtu', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 81000, 0, 0, 81000, 0, 'Chờ xác nhận'),
(7, 'CHANEL-HCM-063054-27012024', 0, 'anhtu', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 0, 0, 0, 0, 0, 'Chờ xác nhận'),
(8, 'CHANEL-HCM-063725-27012024', 0, 'anhkhang', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 36000, 0, 0, 36000, 0, 'Chờ xác nhận'),
(9, 'CHANEL-HCM-063803-27012024', 0, 'anhkhang', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 0, 0, 0, 0, 0, 'Chờ xác nhận'),
(10, 'CHANEL-HCM-064004-27012024', 0, 'anhkhangga', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 50000, 0, 0, 50000, 0, 'Chờ xác nhận'),
(11, 'CHANEL-HCM26-064546-27012024', 26, 'anhkhanggh', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 36000, 0, 0, 36000, 0, 'Chờ xác nhận'),
(12, 'CHANEL-HCM27-064707-27012024', 27, 'anhkm', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 36000, 0, 0, 36000, 0, 'Chờ xác nhận'),
(13, 'CHANEL-HCM28-064945-27012024', 28, 'anhkm', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 36000, 0, 0, 36000, 0, 'Chờ xác nhận'),
(14, 'CHANEL-HCM29-065417-27012024', 29, 'anhminh', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 50000, 0, 0, 50000, 0, 'Chờ xác nhận'),
(15, 'CHANEL-HCM30-065519-27012024', 30, 'anhminhfa', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 50000, 0, 0, 50000, 0, 'Chờ lấy hàng'),
(16, 'CHANEL-HCM31-065911-27012024', 31, 'anhminhfa', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 0, 0, 0, 0, 0, 'Chờ xác nhận'),
(17, 'CHANEL-HCM32-070003-27012024', 32, 'anhminhfa', 'tuanh703lap@gmail.com', '0915762444', 'cong vien go vap', '', '', '', 0, 0, 0, 0, 0, 'Chờ lấy hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(6) NOT NULL,
  `idpro` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(6) NOT NULL,
  `idbill` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `idpro`, `price`, `name`, `img`, `soluong`, `thanhtien`, `idbill`) VALUES
(1, 4, 23000, 'Sản phẩm 4', 'product-4.jpg', 1, 23000, 1),
(2, 0, 45000, 'Sản phẩm 7', 'product-7.jpg', 1, 45000, 0),
(3, 0, 36000, 'Sản phẩm 6', 'product-6.jpg', 1, 36000, 0),
(4, 0, 36000, 'Sản phẩm 6', 'product-6.jpg', 1, 36000, 0),
(5, 0, 50000, 'Sản phẩm 5', 'product-5.jpg', 1, 50000, 0),
(6, 5, 50000, 'Sản phẩm 5', 'product-5.jpg', 1, 50000, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `stt` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `home`, `stt`) VALUES
(1, 'Áo khoác', 1, 1),
(2, 'Áo thun', 0, 2),
(3, 'Ba Lô', 1, 3),
(4, 'Quần', 0, 4),
(5, 'Mũ', 0, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `price` int(6) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `dacbiet` tinyint(1) NOT NULL DEFAULT 0,
  `view` int(9) NOT NULL DEFAULT 0,
  `bestseller` tinyint(1) NOT NULL DEFAULT 0,
  `iddm` int(4) NOT NULL,
  `trangthai` int(7) NOT NULL DEFAULT 0 COMMENT 'Ẩn,Hiện',
  `decrise` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `price`, `hide`, `dacbiet`, `view`, `bestseller`, `iddm`, `trangthai`, `decrise`) VALUES
(1, 'Sản phẩm 1', 'product-1.jpg', 20000, 1, 0, 235, 0, 1, 0, ''),
(2, 'Sản phẩm 2', 'product-2.jpg', 30000, 0, 0, 33, 0, 3, 0, ''),
(3, 'Sản phẩm 3', 'product-3.jpg', 40000, 0, 0, 44, 1, 3, 0, ''),
(4, 'Sản phẩm 4', 'product-4.jpg', 23000, 0, 0, 0, 0, 2, 0, ''),
(5, 'Sản phẩm 5', 'product-5.jpg', 50000, 0, 0, 0, 0, 2, 0, ''),
(6, 'Sản phẩm 6', 'product-6.jpg', 36000, 0, 0, 0, 0, 2, 0, ''),
(7, 'Sản phẩm 7', 'product-7.jpg', 45000, 0, 0, 0, 0, 2, 0, ''),
(8, 'Sản phẩm 8', 'product-8.jpg', 29000, 0, 0, 0, 0, 4, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `ten`, `diachi`, `email`, `dienthoai`, `role`) VALUES
(1, 'tuda', '123', NULL, 'QTSC 9, CVPM QUang Trung', 'tudaps34360@fpt.edu.vn', '012345678', 1),
(14, 'tuanh', '20072004', 'doan anh tu', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762441', 0),
(15, 'guest378', '123456', 'anhtu', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(16, 'guest894', '123456', 'anhtu', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(17, 'guest792', '123456', 'anhtu', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(18, 'guest386', '123456', 'anhtu', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(19, 'guest300', '123456', 'anhtu', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(20, 'guest555', '123456', 'anhtu', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(21, 'guest849', '123456', 'anhkhang', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(22, 'guest283', '123456', 'anhkhang', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(23, 'guest214', '123456', 'anhkhangga', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(24, 'guest51', '123456', 'anhkhangga', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(25, 'guest784', '123456', 'anhkhangfa', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(26, 'guest355', '123456', 'anhkhanggh', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(27, 'guest388', '123456', 'anhkm', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(28, 'guest496', '123456', 'anhkm', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(29, 'guest878', '123456', 'anhminh', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(30, 'guest505', '123456', 'anhminhfa', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(31, 'guest299', '123456', 'anhminhfa', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0),
(32, 'guest970', '123456', 'anhminhfa', 'cong vien go vap', 'tuanh703lap@gmail.com', '0915762444', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_bill` (`idbill`),
  ADD KEY `fk_cart_sp` (`idpro`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_dm` (`iddm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `fk_cart_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
