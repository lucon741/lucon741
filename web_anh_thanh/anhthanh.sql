-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2021 lúc 01:49 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `anhthanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `stt` smallint(6) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`stt`, `username`, `password`, `date`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `content`, `date`) VALUES
(1, '[value-2]', '<p style=\"margin-left: 80px;\"><span style=\"color:#FF0000\"><strong>Cửa h&agrave;ng cơ kh&iacute; Thuận Th&agrave;nh</strong></span></p>\r\n\r\n<p><strong><span style=\"color:#FF0000\">Chuy&ecirc;n </span><span style=\"color:#0000CD\">cửa sắt - lan can - cầu thang - xưởng - nh&agrave; kho</span></strong></p>\r\n\r\n<p><strong><span style=\"color:#FF0000\">Đặc biệt</span> <span style=\"color:#0000CD\">uốn hoa văn - l&agrave;m sắt mĩ nghệ</span></strong></p>\r\n\r\n<p><span style=\"color:#FF0000\"><strong>Địa chỉ:</strong></span><span style=\"color:#0000CD\"><strong> 454 H&agrave; Huy Gi&aacute;p , p Thạnh Lộc , Quận 12 , Tp HCM</strong></span></p>\r\n\r\n<p><strong><span style=\"color:#FF0000\">Số ĐT li&ecirc;n hệ :</span> <span style=\"color:#FF0000\">xxx-xxx-xxxx</span></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-05-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `count_view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `content`, `price`, `count_view`) VALUES
(4, '[value-2]', '[value-3]', '[value-4]', 0, 0),
(5, '[value-2]', '[value-3]', '[value-4]', 0, 0),
(6, '[value-2]', '[value-3]', '[value-4]', 0, 0),
(7, '[value-2]', '[value-3]', '[value-4]', 0, 0),
(8, '[value-2]', '[value-3]', '[value-4]', 0, 0),
(9, '[value-2]', '[value-3]', '[value-4]', 0, 0),
(10, '[value-2]', '[value-3]', '[value-4]', 0, 0),
(11, '[value-2]', '/uploads/28-05-2021/cuasat04.jpg', '<p>[value-4]</p>\r\n', 3213, 0),
(12, 'cua sat 2', '/uploads/28-05-2021/cuasat02(1).jpg', '<p>cua sat so 2</p>\r\n', 222, 0),
(13, 'Cua sat 1', '/uploads/28-05-2021/CS01(1).jpg', '<p><span style=\"color:#FF0000\"><big><strong>cua sat 1</strong></big></span></p>\r\n\r\n<ol style=\"margin-left: 240px;\">\r\n	<li>Cửa sắt 1</li>\r\n	<li>Cửa sắt 1</li>\r\n	<li>Cửa sắt 1</li>\r\n	<li>Cửa sắt 1</li>\r\n	<li>Cửa sắt 1</li>\r\n	<li>Cửa sắt 1</li>\r\n</ol>\r\n\r\n<p>Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;</p>\r\n\r\n<p>Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1&nbsp;Cửa sắt 1', 111, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `name`, `img`, `content`, `price`) VALUES
(6, 'Dịch Vụ 01', '/uploads/24-05-2021/shoes-1(1).jpg', '<p>1111</p>\r\n', 1111),
(7, 'Dịch Vụ 02', '/uploads/24-05-2021/shoes-2(1).jpg', '<p>222</p>\r\n', 2222),
(8, 'Dịch Vụ 03', '/uploads/24-05-2021/shoes-3.jpg', '<p>3333</p>\r\n', 3333),
(9, 'Dịch Vụ 04', '/uploads/24-05-2021/shoes-4(1).jpg', '<p>4444</p>\r\n', 4444),
(10, 'Dịch Vụ 05', '/uploads/28-05-2021/cuasat02.jpg', '<p>5555</p>\r\n', 5555);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
