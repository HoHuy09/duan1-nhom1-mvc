-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2021 lúc 03:50 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoppings`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_bl` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `thoi_gian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id_bl`, `id_user`, `id_sp`, `noi_dung`, `thoi_gian`) VALUES
(39, 20, 59, 'abc', '2021-06-21'),
(40, 20, 46, 'doankaka', '2021-06-21'),
(41, 20, 46, 'doankaka', '2021-06-21'),
(42, 20, 43, 'abd', '2021-06-21'),
(43, 20, 43, 'abd', '2021-06-21'),
(44, 20, 55, 'fffffffffff', '2021-06-21'),
(45, 20, 55, 'gggggggggg', '2021-06-21'),
(46, 20, 55, 'aaaaaaaaaaaaaa', '2021-06-21'),
(47, 20, 47, 'abcd\r\n', '2021-06-21'),
(48, 20, 42, 'abc', '2021-06-22'),
(49, 20, 42, 'ddn\r\n', '2021-06-22'),
(50, 20, 42, 'kkk', '2021-06-22'),
(51, 20, 42, 'aaaaa', '2021-06-22'),
(52, 23, 55, 'âmmammam\r\n', '2021-06-22'),
(53, 20, 54, 'aa', '2021-09-22'),
(54, 20, 54, 'đẹp', '2021-09-22'),
(55, 20, 42, 'a2', '2021-09-22'),
(57, 24, 46, 'ádasd', '2021-10-07'),
(58, 20, 42, 'acc', '2021-12-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`) VALUES
(5, 20, 69),
(6, 20, 48),
(7, 20, 42),
(9, 20, 43),
(10, 20, 42),
(11, 20, 49),
(12, 20, 42),
(13, 20, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_dm` int(11) NOT NULL,
  `ten_dm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id_dm`, `ten_dm`) VALUES
(24, 'Đồng Hồ Nam'),
(25, 'Đồng Hồ Nữ'),
(26, 'Đồng Hồ Đôi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_products`
--

CREATE TABLE `favorite_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite_products`
--

INSERT INTO `favorite_products` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(1, 20, 46, '2021-12-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `customer_name`, `customer_phone_number`, `customer_email`, `customer_address`, `note`, `total_price`) VALUES
(6, 'Huy Hồ Thích', '0965422573', 'huyhtph07087@fpt.edu.vn', 'Ngách 16/47 Số 8 Phố Đỗ Xuân Hợp', 'mua 1', 4750000),
(7, 'Huy Hồ Thích', '0965422573', 'duyen.khotan', 'Ngách 16/47 Số 8 Phố Đỗ Xuân Hợp', 'avc', 3000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_detail`
--

INSERT INTO `invoice_detail` (`id`, `invoice_id`, `product_id`, `quantity`, `unit_price`) VALUES
(7, 6, 46, 1, 4750000),
(8, 7, 69, 1, 0),
(9, 7, 42, 1, 3000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id_sp` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `anh_sp` text NOT NULL,
  `gia_sp` float NOT NULL,
  `id_th` int(11) NOT NULL,
  `giam_gia` int(3) NOT NULL,
  `mo_ta` varchar(1000) NOT NULL,
  `bao_hanh` varchar(30) NOT NULL,
  `luot_xem` int(11) NOT NULL,
  `trang_thai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `id_th`, `giam_gia`, `mo_ta`, `bao_hanh`, `luot_xem`, `trang_thai`) VALUES
(42, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG AOUKE AK10-5', 'img/dong-ho-aouke-AK10-avt-5.png', 3000000, 22, 50, '<p>Nh&atilde;n hiệu&nbsp;Aouke</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;AK10-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz ( Chạy pin )</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;38 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;7 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n\r\n<p>Bảo h&agrave;nh&nbsp;24 th&aacute;ng</p>\r\n', '6', 176, 4),
(43, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG AOUKE AK08-3', 'img/dong-ho-aouke-AK08-avt-3.jpg', 5150000, 22, 10, '<p>Nh&atilde;n hiệu&nbsp;Aouke</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;AK08-3</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;42 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11,5 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 22, 3),
(44, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG AOUKE AK03-1', 'img/dong-ho-aouke-AK03-avt-1.jpg', 6750000, 22, 0, '<p>Nh&atilde;n hiệu&nbsp;Aouke</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;AK03-1</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40,5 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;9,5 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 10, 5),
(45, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG BORMAN BM3739-5', 'img/dong-ho-borman-bm3739-5-avt.jpg', 5250000, 23, 10, '<p>Nh&atilde;n hiệu&nbsp;Borman</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;BM3739-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;42 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;12 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 13, 5),
(46, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG BORMAN BM3869-1', 'img/dong-ho-borman-bm3869-1-avt.jpg', 4750000, 23, 15, '<p>Nh&atilde;n hiệu&nbsp;Borman</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;BM3869-1</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;41 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '12', 95, 10),
(47, 24, 'ĐỒNG HỒ NAM CHÍNH HÃNG BORMAN BM3541-4', 'img/dong-ho-borman-bm3541-4-avt.jpg', 5750000, 23, 10, '<p>Nh&atilde;n hiệu&nbsp;Borman</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;BM3541-4</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;41,5 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '12', 15, 6),
(48, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG LOBINNI NO.026-2', 'img/lobinni_no-026-2_avt.png', 3550000, 24, 5, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.026-2</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;36mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;10mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5ATM</p>\r\n', '6', 14, 12),
(49, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG LOBINNI NO.2002-4', 'img/dong-ho-lobinni-no-2002-4-avt.jpg', 4550000, 24, 5, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.2002-4</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;36 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 10, 10),
(50, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG LOBINNI NO.2007-2', 'img/LOBINNI_L2007-2_(4).jpg', 4950000, 24, 0, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.2007-2</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;34 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;10 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 9, 10),
(51, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG TEINTOP T8629-4', ' img/591d4bdbN831c884d.jpg', 2600000, 25, 6, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T8629-4</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;28mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '12', 15, 8),
(52, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG TEINTOP T7005-3', 'img/dong-ho-teintop-t7005-3-avt.jpg', 2750000, 25, 6, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T7005-3</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;32 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;12 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 12),
(53, 25, 'ĐỒNG HỒ NỮ CHÍNH HÃNG TEINTOP T7018-5', 'img/dong-ho-nu-teintop-t7018-5-avt.jpg', 1950000, 25, 0, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T7018-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz ( Chạy pin )</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;34x23 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;5 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 12),
(54, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG TEINTOP T8629-5', ' img/T8629_6_dong_ho_doi.jpg', 4950000, 25, 10, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T8629-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40 &amp; 28mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;11 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 24, 12),
(55, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG LOBINNI NO.5016-5', ' img/lobinni_5016.jpg', 11500000, 24, 15, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.5016-5</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Automatic (M&aacute;y Cơ)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;41 &amp; 34mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;9 &amp; 8mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;5 ATM</p>\r\n', '6', 38, 15),
(56, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG TEINTOP T7004-16', 'img/dong-ho-doi-teintop-t7004-16-avt.jpg', 2950000, 25, 0, '<p>Nh&atilde;n hiệu&nbsp;Teintop</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;T7004-16</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz ( Chạy pin )</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;41 mm - 27 mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;6 mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y vải</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 15),
(57, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG LOBINNI NO.3001-1', 'img/lobinni_no-3001_avt.jpg', 4450000, 24, 0, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.3001-1</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz (Chạy pin)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40x30mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;7mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;D&acirc;y da cao cấp</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 13),
(58, 26, 'ĐỒNG HỒ ĐÔI CHÍNH HÃNG LOBINNI NO.1651-4', 'img/lobinni_no-1651-5_avt1.jpg', 5650000, 24, 0, '<p>Nh&atilde;n hiệu&nbsp;Lobinni</p>\r\n\r\n<p>M&atilde; sản phẩm&nbsp;No.1651-4</p>\r\n\r\n<p>Giới t&iacute;nh&nbsp;Nam - Nữ</p>\r\n\r\n<p>Kiểu m&aacute;y&nbsp;Quartz (Chạy pin)</p>\r\n\r\n<p>Đường k&iacute;nh mặt&nbsp;40 &amp; 28mm</p>\r\n\r\n<p>Độ d&agrave;y&nbsp;7 &amp; 6mm</p>\r\n\r\n<p>Chất liệu vỏ&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316L</p>\r\n\r\n<p>Chất liệu d&acirc;y&nbsp;Th&eacute;p kh&ocirc;ng gỉ 316l</p>\r\n\r\n<p>Chất liệu mặt k&iacute;nh&nbsp;Sapphire</p>\r\n\r\n<p>Khả năng chịu nước&nbsp;3 ATM</p>\r\n', '6', 9, 5),
(59, 26, 'aaaaaaaaaaa2', 'img/dong-ho-aouke-AK14-avt-2.jpg', 3880000, 22, 0, '<p>Nhãn hiệu Aouke</p>\r\n\r\n<p>Mã sản phẩm AK14-2</p>\r\n\r\n<p>Giới tính Nam - Nữ</p>\r\n\r\n<p>Kiểu máy Quartz ( Chạy pin )</p>\r\n\r\n<p>Đường kính mặt 40mm - 30mm</p>\r\n\r\n<p>Độ dày 7 mm</p>\r\n\r\n<p>Chất liệu vỏ Thép không gỉ 316L</p>\r\n\r\n<p>Chất liệu dây Thép không gỉ 316L</p>\r\n\r\n<p>Chất liệu mặt kính Sapphire Crystal</p>\r\n\r\n<p>Khả năng chịu nước 3 ATM</p>\r\n', '12', 14, 6),
(68, 26, 'ád', 'img/619b9dee22d81-mt9-800x450-1.jpg', 1200000, 22, 12, 'k', '12', 0, 1),
(69, 26, '123', 'img/619ba629c119b-mt10-800x450-2.jpg', 0, 22, 23, '', '', 7, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `ten_slide` varchar(50) NOT NULL,
  `anh_slide` text NOT NULL,
  `link_slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `ten_slide`, `anh_slide`, `link_slide`) VALUES
(7, 'a3', 'img/omega-banner.jpg', ' https://kenh14.vn/ '),
(15, 'a4', 'img/shop-OMEGA-banner.jpg', '        https://baomoi.com/        '),
(18, 'aca', 'img/crazysales_com_au_watch_banner_by_keiravanhell_d3h9bzq-fullview.jpg', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `id_th` int(11) NOT NULL,
  `ten_th` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`id_th`, `ten_th`) VALUES
(22, 'Aouke'),
(23, 'Borman'),
(24, 'Lobinni'),
(25, 'Teintop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `ma_tin_tuc` int(11) NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `ngay_dang_tin` date NOT NULL,
  `anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bl` int(11) NOT NULL,
  `nd_ngan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nd_dai` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`ma_tin_tuc`, `tieu_de`, `id_user`, `ngay_dang_tin`, `anh`, `id_bl`, `nd_ngan`, `nd_dai`) VALUES
(1, 'áddsa', 1, '2021-11-13', 'https://upload.wikimedia.org/wikipedia/vi/1/1d/N%C6%A1i_n%C3%A0y_c%C3%B3_anh_-_Single_Cover.jpg', 1, 'saddsa', 'saddddddddddddddddadasdasd'),
(2, 'áddsa', 1, '2021-11-13', 'https://upload.wikimedia.org/wikipedia/vi/1/1d/N%C6%A1i_n%C3%A0y_c%C3%B3_anh_-_Single_Cover.jpg', 1, 'saddsa', 'saddddddddddddddddadasdasd'),
(3, 'ádasdbvvasd', 2, '2021-11-12', 'https://upload.wikimedia.org/wikipedia/vi/1/1d/N%C6%A1i_n%C3%A0y_c%C3%B3_anh_-_Single_Cover.jpg', 2, 'ádsadasd', 'ádasdasd'),
(4, 'ádasdbvvasd', 2, '2021-11-12', 'https://upload.wikimedia.org/wikipedia/vi/1/1d/N%C6%A1i_n%C3%A0y_c%C3%B3_anh_-_Single_Cover.jpg', 2, 'ádsadasd', 'ádasdasd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `account` varchar(40) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `avatar` text NOT NULL,
  `roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `account`, `passwd`, `name`, `email`, `avatar`, `roles`) VALUES
(20, 'admin', '$2y$10$dL1yCYfyMLUJTGgvaW6J2.mRC1wlL1beEjVo7KWSBlrMUbcNuDdiC', 'hothichhuy', 'huyhtph07087@fpt.edu.vn', 'logo.jpg', 1),
(21, 'hothichhhuy', '$2y$10$u4AbX8se2gm1CXwm.wXHg.we1wC.B.3DXXyDRra53MdkIeiAiPp7y', 'hothichhuy', 'hothichhuy12@gmail.com', '591d4bdbN831c884d.jpg', 0),
(22, 'abcd', '$2y$10$vJizcK9hyhQI6fX7A8R5z..jE8po7YB45SO/Mp70P8m0UixjTt5xe', 'Doan Le', 'admin@gmail.com', 'ZmL2FbH.jpg', 0),
(23, 'maimai', '$2y$10$u4AbX8se2gm1CXwm.wXHg.we1wC.B.3DXXyDRra53MdkIeiAiPp7y', 'maimai', 'admin@gmail.com', 'avatar.jpg', 0),
(24, 'admin2', '$2y$10$wttsP9gUOnFNAsnrrpfXLOIah54W2ulvOqZG7.jpl29dcM3CBfeuW', 'Huy Hồ Thích', 'huyhtph07087@fpt.edu.vn', 'adminpicture.jpg', 0),
(25, 'quynhln', '$2y$10$bNPgvcwc1KTseNLm9pYtw.qr3P6rGxIr6tPvAeo6OSbVMrRd/XJo.', 'Lê Ngọc Quỳnh', 'Quynhltph@fpt.edi.vn', 'pr1.png', 2),
(26, 'tutv', '$2y$10$swbhtYK4weScYnM0lja5E.s1/HAOe7heROAkeV3lI9U8M/ARGodMe', 'Trịnh Văn Tú', 'tutv@fpt.edu.vn', 'pr1.png', 2),
(36, 'admin123', '$2y$10$KN.sEPO6ISWo6xPqrJhGlenPGXR9W4im24md1HGA2kxkjh7FAl.Pe', 'Huy Hồ Thích', 'huyhtph07087@fpt.edu.vn', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_dm`),
  ADD UNIQUE KEY `ten_dm` (`ten_dm`);

--
-- Chỉ mục cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_sp`),
  ADD UNIQUE KEY `ten_sp` (`ten_sp`),
  ADD KEY `id_dm` (`id_dm`),
  ADD KEY `id_th` (`id_th`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`),
  ADD UNIQUE KEY `ten_slide` (`ten_slide`);

--
-- Chỉ mục cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`id_th`),
  ADD UNIQUE KEY `ten_th` (`ten_th`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`ma_tin_tuc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `account` (`account`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `favorite_products`
--
ALTER TABLE `favorite_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `id_th` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `ma_tin_tuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id_sp`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danh_muc` (`id_dm`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`id_th`) REFERENCES `thuong_hieu` (`id_th`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
