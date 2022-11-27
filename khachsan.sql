-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2022 lúc 03:54 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `khachsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_comment` int(11) NOT NULL,
  `noidung` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `ngaybinhluan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_comment`, `noidung`, `id_user`, `ngaybinhluan`) VALUES
(1, 'fgfhf', 1, '2022-11-19'),
(2, 'hggh', 1, '2022-11-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datphong`
--

CREATE TABLE `datphong` (
  `id_order` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sokhach` int(2) NOT NULL,
  `ngayden` date NOT NULL,
  `ngaytra` date NOT NULL,
  `tinhtrang` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `datphong`
--

INSERT INTO `datphong` (`id_order`, `id_phong`, `id_user`, `sokhach`, `ngayden`, `ngaytra`, `tinhtrang`) VALUES
(1, 4, 1, 2, '2022-11-17', '2022-11-20', 1),
(2, 50, 2, 2, '2022-11-27', '2022-11-29', 1),
(3, 69, 1, 2, '2022-12-02', '2022-12-04', 1),
(5, 64, 1, 2, '2022-12-08', '2022-12-10', 1),
(6, 63, 1, 2, '2022-12-04', '2022-12-06', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_bill` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_phong` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id_bill`, `id_order`, `id_phong`, `id_user`, `tongtien`) VALUES
(1, 1, 50, 1, 700000),
(2, 1, 4, 4, 500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotro`
--

CREATE TABLE `hotro` (
  `id_hotro` int(11) NOT NULL,
  `name_user` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `ghichu` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hotro`
--

INSERT INTO `hotro` (`id_hotro`, `name_user`, `tel`, `ghichu`) VALUES
(1, 'LeLanAnh', 838397376, 'fffgfgf'),
(2, 'LeLanAnh', 838397376, 'thỵytjyj'),
(3, 'LeLanAnh', 838397376, 'thỵytjyj'),
(4, 'LeLanAnh', 838397376, 'thỵytjyj'),
(5, 'LeLanAnh', 838397376, 'gnhgkh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `id_loaiphong` int(11) NOT NULL,
  `name_loaiphong` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`id_loaiphong`, `name_loaiphong`) VALUES
(2, 'Superior Room'),
(3, 'Deluxe Room'),
(4, 'Signature Room'),
(7, 'Luxury Suite Room');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id_phong` int(11) NOT NULL,
  `name_phong` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `price_sale` double(10,2) NOT NULL,
  `sokhach` int(2) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mota` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_loaiphong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id_phong`, `name_phong`, `price`, `price_sale`, `sokhach`, `img`, `mota`, `id_loaiphong`) VALUES
(1, 'superior room S20', 150.00, 0.00, 3, 'room4_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 2),
(2, 'superior room P21', 150.00, 0.00, 3, 'room2_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 2),
(4, 'superior room P22', 150.00, 0.00, 3, 'room3_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 2),
(49, 'superior room P23', 150.00, 0.00, 3, 'food-on-a-table-in-a-hotel-room-PU969F8.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 2),
(50, 'deluxe room D20', 120.00, 0.00, 3, 'food-on-a-table-in-a-hotel-room-PU969F8.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 3),
(51, 'deluxe room D21', 120.00, 0.00, 3, 'room1_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 3),
(59, 'deluxe room D22', 150.00, 0.00, 3, 'room2_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 3),
(63, 'deluxe room D23', 150.00, 0.00, 3, 'room3_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 3),
(64, 'signature room S20', 150.00, 0.00, 3, 'food-on-a-table-in-a-hotel-room-PU969F8.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 4),
(65, 'signature room S21', 150.00, 0.00, 3, 'room4_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 4),
(66, 'signature room S22', 160.00, 0.00, 3, 'room3_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 4),
(67, 'signature room S23', 160.00, 0.00, 3, 'room2_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 4),
(68, 'luxury room L20', 170.00, 0.00, 3, 'room1_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 7),
(69, 'luxury room L21', 170.00, 0.00, 3, 'room2_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 7),
(70, 'luxury room L22', 180.00, 0.00, 3, 'room4_portrait.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 7),
(71, 'luxury room L23', 180.00, 0.00, 3, 'food-on-a-table-in-a-hotel-room-PU969F8.jpg', 'The generous living room area with couch can accommodate one extra bed. While sitting on lounge chairs of the south-facing balcony, you can enjoy the\r\n                                                                                    stunning views of the Matterhorn, some fresh mountain air and the mild afternoon sun.', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tel` int(10) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_user`, `username`, `password`, `email`, `tel`, `address`, `role`) VALUES
(1, 'lananh', '12345', 'anhllph19505@fpt.edu.vn', 838397376, '512 tran khat chan,p.Pho Hue, HBT, HN', 0),
(3, 'lla', '12345', '', 0, '', 0),
(4, 'lananh261', '123456', '', 0, '', 1),
(5, 'lananh12345', '12345', 'anhllph19505@fpt.edu.vn', 838397376, '512 tran khat chan', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_phong` (`id_phong`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `iduser` (`id_user`),
  ADD KEY `idphong` (`id_phong`);

--
-- Chỉ mục cho bảng `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`id_hotro`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`id_loaiphong`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id_phong`),
  ADD KEY `iddm` (`id_loaiphong`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `datphong`
--
ALTER TABLE `datphong`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hotro`
--
ALTER TABLE `hotro`
  MODIFY `id_hotro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `id_loaiphong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`);

--
-- Các ràng buộc cho bảng `datphong`
--
ALTER TABLE `datphong`
  ADD CONSTRAINT `id_phong` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id_phong`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `idphong` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id_phong`),
  ADD CONSTRAINT `iduser` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `iddm` FOREIGN KEY (`id_loaiphong`) REFERENCES `loaiphong` (`id_loaiphong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
