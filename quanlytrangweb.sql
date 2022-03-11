-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 09:30 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlytrangweb`
--
CREATE DATABASE IF NOT EXISTS `quanlytrangweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quanlytrangweb`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `KyDanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID`, `KyDanh`, `MatKhau`) VALUES
(1, 'admin', 'fb47fde2fbd4931d05aa33dd9b21831c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `ID` int(11) NOT NULL,
  `Banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`ID`, `Banner`) VALUES
(1, 'Banner.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `TenMenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `LoaiMenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`ID`, `TenMenu`, `NoiDung`, `LoaiMenu`) VALUES
(1, 'Giới thiệu', '<p>\r\nTrang web của cửa hàng wkGenji Shop<br>\r\nChuyên kinh doanh các mặt hàng liên quan đến Anime, Light Novel, Manga,...<br><br>\r\nChủ cửa hàng (kiêm Administrator): Huỳnh Quốc Ngạn _ B1805892<br>\r\nLớp học phần CT24801\r\n</p>', ''),
(2, 'Sản phẩm', 'Tất cả sản phẩm', 'san_pham'),
(3, 'Hướng dẫn', '<p>\r\n* Để mua hàng, vui lòng chọn menu \"Sản phẩm\" để hiện tất cả sản phẩm của cửa hàng, hoặc chọn các \"DANH MỤC\" để hiện các sản phẩm theo danh mục.<br><br>\r\n* Chọn sản phẩm bạn quan tâm.<br>\r\nNếu muốn mua sản phẩm, mời bạn chọn \"Thêm vào giỏ hàng\" (Đăng nhập nếu được yêu cầu).<br>\r\n* Sau khi xác đinh muốn mua hàng, mời chọn \"Xem giỏ hàng\" và tùy chỉnh số lượng sản phẩm nếu muốn.<br>\r\n* Nhập các thông tin cần thiết (bắt buộc nhập các phần có dấu (*) và chọn nút \"Mua hàng\".\r\n</p>', ''),
(4, 'Liên hệ', '<p>\r\nThông tin liên hệ:<br>\r\n&nbsp;Huỳnh Quốc Ngạn<br>\r\n&nbsp;MSSV: B1805892<br>\r\n&nbsp;Email: NganB1805892@student.ctu.edu.vn\r\n</p>', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(255) NOT NULL,
  `hinh_anh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `thuoc_menu` int(255) NOT NULL,
  `noi_bat` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `trang_chu` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `sap_xep_trang_chu` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `gia`, `hinh_anh`, `noi_dung`, `thuoc_menu`, `noi_bat`, `trang_chu`, `sap_xep_trang_chu`) VALUES
(1, 'Sản phẩm 1', 55000, '1.jpg', '<p>Nội dung của sản phẩm 1</p>', 1, 'co', '', 0),
(2, 'Sản phẩm 3', 82000, '3.jpg', '<p>Nội dung sản phẩm 3</p>', 3, '', 'co', 7),
(3, 'Sản phẩm 1_2', 86000, '1_2.jpg', 'Nội dung của sản phẩm 1_2', 1, '', '', 0),
(4, 'Sản phẩm 1_3', 97000, '1_3.jpg', 'Nội dung của sản phẩm 1_3', 1, '', 'co', 3),
(5, 'Sản phẩm 1_4', 42000, '1_4.jpg', 'Nội dung của sản phẩm 1_4', 1, '', '', 0),
(6, 'Sản phẩm 1_5', 100000, '1_5.jpg', '<p>Nội dung của sản phẩm 1_5</p>', 1, '', 'co', 0),
(7, 'Sản phẩm 1_6', 120000, '1_6.jpg', 'Nội dung của sản phẩm 1_6', 1, '', 'co', 2),
(8, 'Sản phẩm 1_7', 80000, '1_7.jpg', 'Nội dung của sản phẩm 1_7', 1, '', '', 0),
(9, 'Sản phẩm 1_8', 160000, '1_8.jpg', 'Nội dung của sản phẩm 1_8', 1, '', '', 0),
(10, 'Sản phẩm 1_9', 160000, '1_9.jpg', 'Nội dung của sản phẩm 1_9', 1, '', 'co', 7),
(11, 'Sản phẩm 1_10', 135000, '1_10.jpg', '<p>Nội dung của sản phẩm 1_10</p>', 1, '', 'co', 0),
(12, 'Sản phẩm 1_11', 55000, '1_11.jpg', '<p>Nội dung của sản phẩm 1_11</p>', 1, '', 'co', 13),
(13, 'Sản phẩm 1_12', 72000, '1_12.jpg', '<p>Nội dung của sản phẩm 1_12</p>', 1, '', '', 0),
(14, 'Sản phẩm 1_13', 78000, '1_13.jpg', '<p>Nội dung của sản phẩm 1_13</p>', 1, '', 'co', 11),
(15, 'Sản phẩm 1_14', 123000, '1_14.jpg', '<p>Nội dung của sản phẩm 1_14</p>', 1, '', 'co', 0),
(16, 'Sản phẩm 1_15', 125000, '1_15.jpg', 'Nội dung của sản phẩm 1_15', 1, 'co', 'co', 5),
(17, 'Sản phẩm 1_16', 99000, '1_16.jpg', 'Nội dung của sản phẩm 1_16', 1, '', '', 0),
(18, 'Sản phẩm 1_17', 145000, '1_17.jpg', '<p>Nội dung của sản phẩm 1_17</p>', 1, '', 'co', 1),
(19, 'Sản phẩm 1_18', 145000, '1_18.jpg', 'Nội dung của sản phẩm 1_18', 1, '', '', 0),
(20, 'Sản phẩm 1_19', 170000, '1_19.jpg', 'Nội dung của sản phẩm 1_19', 1, '', '', 0),
(21, 'Sản phẩm 1_20', 85000, '1_20.jpg', 'Nội dung của sản phẩm 1_20', 1, '', '', 0),
(22, 'Sản phẩm 3_2', 30000, '3_2.jpg', '<p>Nội dung của sản phẩm 3_2</p>', 3, '', 'co', 8),
(23, 'Sản phẩm 3_3', 40000, '3_3.jpg', 'Nội dung của sản phẩm 3_3', 3, '', '', 6),
(24, 'Sản phẩm 3_4', 50000, '3_4.jpg', 'Nội dung của sản phẩm 3_4', 3, '', '', 0),
(25, 'Sản phẩm 3_5', 60000, '3_5.jpg', 'Nội dung của sản phẩm 3_5', 3, '', '', 9),
(26, 'Sản phẩm 3_6', 70000, '3_6.jpg', '<p>Nội dung của sản phẩm 3_6</p>', 3, '', 'co', 12),
(27, 'Sản phẩm 3_7', 80000, '3_7.jpg', 'Nội dung của sản phẩm 3_7', 3, '', '', 0),
(28, 'Sản phẩm 3_8', 90000, '3_8.jpg', '<p>Nội dung của sản phẩm 3_8</p>', 3, '', '', 8),
(29, 'Sản phẩm 3_9', 100000, '3_9.jpg', 'Nội dung của sản phẩm 3_9', 3, '', '', 0),
(30, 'Sản phẩm 3_10', 110000, '3_10.jpg', 'Nội dung của sản phẩm 3_10', 3, '', '', 7),
(31, 'Sản phẩm 3_11', 120000, '3_11.jpg', '<p>Nội dung của sản phẩm 3_11</p>', 3, '', 'co', 9),
(32, 'Sản phẩm 3_12', 50000, '3_12.jpg', 'Nội dung của sản phẩm 3_12', 3, '', '', 12),
(33, 'Sản phẩm 3_13', 60000, '3_13.jpg', '<p>Nội dung của sản phẩm 3_13</p>', 3, '', '', 1),
(34, 'Sản phẩm 3_14', 70000, '3_14.jpg', 'Nội dung của sản phẩm 3_14', 3, '', '', 11),
(35, 'Sản phẩm 3_15', 80000, '3_15.jpg', '<p>Nội dung của sản phẩm 3_15</p>', 3, '', '', 0),
(36, 'Sản phẩm 3_16', 90000, '3_16.jpg', 'Nội dung của sản phẩm 3_16', 3, '', '', 16),
(37, 'Sản phẩm 3_17', 170000, '3_17.jpg', 'Nội dung của sản phẩm 3_17', 3, '', '', 15),
(38, 'Sản phẩm 3_18', 180000, '3_18.jpg', 'Nội dung của sản phẩm 3_18', 3, '', '', 0),
(39, 'Sản phẩm 3_19', 190000, '3_19.jpg', '<p>Nội dung của sản phẩm 3_19</p>', 3, 'co', '', 0),
(40, 'Sản phẩm 3_20', 200000, '3_20.jpg', '<p>Nội dung của sản phẩm 3_20</p>', 3, '', 'co', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshow`
--

CREATE TABLE `slideshow` (
  `ID` int(11) NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slideshow`
--

INSERT INTO `slideshow` (`ID`, `HinhAnh`) VALUES
(1, 'Quote-1.jpg'),
(2, 'Quote-2.jpg'),
(3, 'Quote-3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
