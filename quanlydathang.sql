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
-- Cơ sở dữ liệu: `quanlydathang`
--
CREATE DATABASE IF NOT EXISTS `quanlydathang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quanlydathang`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDHChiTiet` char(13) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDonHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDHChiTiet`, `MSHH`, `SoLuong`, `GiaDonHang`) VALUES
('1_0', 20, 1, 440000),
('1_1', 19, 2, 900000),
('1_2', 18, 5, 2350000),
('2_0', 20, 1, 440000),
('2_1', 19, 2, 900000),
('2_2', 18, 5, 2350000),
('2_3', 9, 13, 780000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `LoiNhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSNV` int(11) NOT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date NOT NULL,
  `TongGiaTri` int(11) NOT NULL,
  `TrangThaiDH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `LoiNhan`, `MSNV`, `NgayDH`, `NgayGH`, `TongGiaTri`, `TrangThaiDH`) VALUES
(1, 1, 'Test mua lần thứ n+1', 0, '2021-11-29', '2021-12-06', 3690000, 'Đã duyệt'),
(2, 1, 'Test típ lần n+1+1', 0, '2021-11-29', '0000-00-00', 4470000, 'Chưa xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(1, 'Đâu đó trên hành tinh này :) Thử độ dài.. dài.. dài.. dài..', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `QuyCach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Quy cách đóng gói (quyển, mô hình, đĩa, cái,..)',
  `MoTa` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaihang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `MoTa`, `Gia`, `SoLuongHang`, `MaLoaihang`) VALUES
(1, 'Your Name', 'Quyển', 'Nhà cung cấp:IPM Tác giả:Shinkai Makoto\r\n Nhà xuất bản:NXB Hồng Đức Hình thức bìa:Bìa Mềm', 60000, 50, 5),
(2, 'Khu Vườn Ngôn Từ', 'Quyển', 'Nhà cung cấp:IPM Tác giả:Shinkai Makoto\r\n Nhà xuất bản:IPM Hình thức bìa:Bìa Mềm', 75000, 50, 5),
(3, 'Đứa Con Của Thời Tiết', 'Quyển', 'Nhà cung cấp:IPM Tác giả:Shinkai Makoto \r\nNhà xuất bản:Hà Nội Hình thức bìa:Bìa Mềm', 70000, 50, 5),
(4, 'Thần Chết Làm Thêm 300Yên/Giờ', 'Quyển', 'Nhà cung cấp:AZ Việt Nam Tác giả:Fujimaru\r\n Nhà xuất bản:NXB Thế Giới Hình thức bìa:Bìa Mềm', 85000, 50, 5),
(5, '3 Ngày Hạnh Phúc', 'Quyển', 'Nhà cung cấp:IPM Tác giả:Miaki Sugaru\r\n Nhà xuất bản:NXB Hồng Đức Hình thức bìa:Bìa Mềm', 65000, 50, 5),
(6, 'Thế Giới Đầy「Khoảng Trống」', 'Quyển', '\r\nNhà cung cấp:AZ Việt Nam Tác giả:Iiyo Sakura \r\nNhà xuất bản:NXB Thế Giới Hình thức bìa:Bìa Mềm', 60000, 50, 5),
(7, 'Anohana - Đóa Hoa Ngày Ấy', 'Quyển', 'Nhà cung cấp:IPM Tác giả:Okada Mari\r\n Nhà xuất bản:NXB Hà Nội Hình thức bìa:Bìa Mềm', 80000, 50, 5),
(8, 'Và Rồi Tháng 9 Không Có Cậu Đã Tới', 'Quyển', 'Nhà cung cấp:AZ Việt Nam Tác giả:Natsuki Amasawa\r\n Nhà xuất bản:NXB Thế Giới Hình thức bìa:Bìa Mềm', 85000, 50, 5),
(9, 'Pháo Hoa, Ngắm Từ Dưới Hay Bên Cạnh', 'Quyển', 'Nhà cung cấp:IPM Tác giả:Shunji Iwai, Hitoshi One\r\n Nhà xuất bản:NXB Hà Nội Hình thức bìa:Bộ Hộp', 60000, 20, 5),
(10, 'Ame & Yuki - Những Đứa Con Của Sói', 'Quyển', 'Nhà cung cấp:IPM Tác giả:Hosoda Mamoru\r\n Nhà xuất bản:Văn Học Hình thức bìa:Bìa Mềm', 50000, 50, 5),
(11, 'Mô hình figure: FATE/GRAND ORDER LANCER / Kiyohime 1/7', 'Mô hình', 'Chiều cao: 25 cm \r\n\r\nBộ sản phẩm gồm: nhân vật cơ bản \r\n\r\nChất liệu: PVC Kiểu: cố định, không thể cử động \r\n\r\n*Sử dụng: Trang trí bàn làm việc, trưng bày, sưu tập, quà tặng… \r\n\r\n*Sx : hàng nội địa Trung Quốc ', 650000, 10, 2),
(12, 'Mô hình figure: Yae Sakura Shinen Sakimitama Ver. - Honkai Impact', 'Mô hình', 'Tên nhân vật: Yae Sakura \r\n\r\nSeries​: Honkai impact \r\n\r\nChiều cao: 31 cm \r\n\r\nBộ sản phẩm gồm: nhân vật cơ bản \r\n\r\nChất liệu: PVC \r\n\r\nKiểu: cố định, không thể cử động \r\n\r\nBộ sản phẩm đầy đủ như hình Honkai Impact 3 dựa theo cốt truyện manga cùng tên, tiếp ', 690000, 10, 2),
(13, 'Mô hình figure: Nezuko - Kimetsu no Yaiba', 'Mô hình', 'Tên nhân vật: Nezuko\r\n\r\nSeries​: Kimetsu no yaiba\r\n\r\nChiều cao: 31 cm\r\n\r\nBộ sản phẩm gồm: nhân vật cơ bản \r\n\r\nChất liệu: PVC \r\n\r\nKiểu: cố định, không thể cử động \r\n\r\n*Sử dụng: Trang trí bàn làm việc, trưng bày, sưu tập, quà tặng… \r\n\r\n*Sx : hàng nội địa Tr', 900000, 10, 2),
(14, 'Mô hình figure: Albedo flying – Overlord', 'Mô hình', 'Mô hình Figure Albedo Flying – Overlord\r\n\r\n \r\n\r\nChất liệu: PVC\r\nchiều cao : 29cm\r\n\r\n*Sử dụng: Trang trí bàn làm việc, trưng bày, sưu tập, quà tặng…\r\n*Sx : hàng nội địa Trung Quốc', 470000, 10, 2),
(15, 'Mô hình figure: DARLING IN THE FRANXX - Zero Two', 'Mô hình', 'DARLING IN THE FRANXX - ZERO TWO\r\nChất liệu: PVC\r\nChiều cao : 29 cm\r\n\r\n*Sử dụng: Trang trí bàn làm việc, trưng bày, sưu tập, quà tặng…\r\n*Sx : hàng nội địa Trung Quốc', 550000, 10, 2),
(16, 'Mô hình figure: Date A Live - Tohka Yatogami Inverted ver 1/7', 'Mô hình', 'Chất liệu: PVC \r\n\r\nChiều cao: 24 cm \r\n\r\nVào ngày 10 tháng Tư, khi xuất hiện và gây ra một trận không gian chấn, Tohka đã bị lực lượng AST tấn công. Đó cũng đồng thời là lúc Shidou chạm mặt Tohka và khám phá ra nguyên nhân thực sự gây nên các trận không gi', 540000, 10, 2),
(17, 'Mô hình figure: Tokisaki Kurumi Fantasia 30th Ver - Date A Live', 'Mô hình', 'Mô hình Figure Tokisaki Kurumi Fantasia 30th Ver - Date A Live\r\n\r\nChất liệu: PVC\r\nchiều cao : 23 cm\r\n\r\n*Sử dụng: Trang trí bàn làm việc, trưng bày, sưu tập, quà tặng…\r\n*Sx : hàng nội địa Trung Quốc', 430000, 10, 2),
(18, 'Mô hình figure: Kaneki Ken - Awakened Ver - Đuôi Đỏ Đen', 'Mô hình', 'Mô hình Figure: Kaneki Ken - Awakened Ver - Đuôi Đỏ Đen\r\n\r\nChất liệu: PVC\r\nchiều cao : 25 cm\r\n\r\n*Sử dụng: Trang trí bàn làm việc, trưng bày, sưu tập, quà tặng…\r\n*Sx : hàng nội địa Trung Quốc', 470000, 10, 2),
(19, 'Mô hình figure: Re:Zero kara Hajimeru Isekai Seikatsu – Rem – Phục vụ trà', 'Mô hình', 'Nhân vật: Rem trong Re: Zero kara Hajimeru Isekai Seikatsu \r\n\r\nChất liệu: Nhựa PVC \r\n\r\nTỉ lệ: 1/7, kích thước 22,5cm\r\n\r\n *Sử dụng: Trang trí bàn làm việc, trưng bày, sưu tập, quà tặng… \r\n\r\n*Sx : hàng nội địa Trung Quốc', 450000, 10, 2),
(20, 'Mô hình figure: Black Heart - Four Goddesses Online', 'Mô hình', 'Mô hình Figure Black Heart - Four Goddesses Online\r\n\r\nChất liệu: PVC\r\nchiều cao : 23 cm\r\n\r\n*Sử dụng: Trang trí bàn làm việc, trưng bày, sưu tập, quà tặng…\r\n*Sx : hàng nội địa Trung Quốc', 440000, 10, 2),
(21, 'Đĩa Blu-ray: Goblin Slayer [1-12]', 'Đĩa', 'Đây là ví dụ thêm sản phẩm', 260000, 20, 6),
(22, 'Maquia When the Promised Flower Blooms Blu-ray', 'Đĩa', '<p><span style=\"color: #0000ff;\">&nbsp;Tuyệt t&aacute;c !</span></p>', 1255000, 10, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(1, 'LN-1.jpg', 1),
(2, 'LN-2.jpg', 2),
(3, 'LN-3.jpg', 3),
(4, 'LN-4.jpg', 4),
(5, 'LN-5.jpg', 5),
(6, 'LN-6.jpg', 6),
(7, 'LN-7.jpg', 7),
(8, 'LN-8.jpg', 8),
(9, 'LN-9.jpg', 9),
(10, 'LN-10.jpg', 10),
(11, 'Firuge-1.jpg', 11),
(12, 'Firuge-2.jpg', 12),
(13, 'Firuge-3.jpg', 13),
(14, 'Firuge-4.jpg', 14),
(15, 'Firuge-5.jpg', 15),
(16, 'Firuge-6.jpg', 16),
(17, 'Firuge-7.jpg', 17),
(18, 'Firuge-8.jpg', 18),
(19, 'Firuge-9.jpg', 19),
(20, 'Firuge-10.jpg', 20),
(21, 'Bluray_Goblin_Slayer.png', 21),
(22, 'Maquia.png', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` char(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KyDanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ký danh (Tên tài khoản) đăng nhập',
  `MatKhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu đăng nhập'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `SoDienThoai`, `Email`, `KyDanh`, `MatKhau`) VALUES
(1, 'Huỳnh Quốc Ngạn', '84337***009', 'Ngan@gmail.com', 'wkGenji', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'Đĩa Blu-ray'),
(2, 'Mô hình Figure'),
(3, 'Áo phông Anime'),
(4, 'Lót chuột Anime'),
(5, 'Light Novel'),
(6, 'Manga');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChucVu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` char(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KyDanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `KyDanh`, `MatKhau`) VALUES
(0, 'Chờ tiếp nhận', 'Biến tạm', '', '', '', ''),
(1, 'Huỳnh Quốc Ngạn', 'Nhân viên', '', '', 'nhanvien', 'nhanvienpass');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDHChiTiet`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaihang` (`MaLoaihang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaihang`) REFERENCES `loaihanghoa` (`MaLoaihang`);

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
