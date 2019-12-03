-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2019 lúc 10:00 AM
-- Phiên bản máy phục vụ: 10.3.15-MariaDB
-- Phiên bản PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cat_product`
--

CREATE TABLE `tbl_cat_product` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_date` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `parent_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cat_product`
--

INSERT INTO `tbl_cat_product` (`cat_id`, `cat_name`, `cat_date`, `parent_cat`) VALUES
(28, 'Äá»“ng há»“ Thá»i Trang', '08/11/2019', 0),
(29, 'Äá»“ng há»“ Khuyáº¿n MÃ£i', '08/11/2019', 0),
(30, 'Äá»“ng há»“ Thuá»µ SÄ©', '08/11/2019', 0),
(31, 'CÃ¡c hÃ£ng bÃ¡n cháº¡y', '08/11/2019', 0),
(32, 'Äá»“ng há»“ Casio', '08/11/2019', 31),
(33, 'Äá»“ng há»“ Seiko', '08/11/2019', 31),
(34, 'Äá»“ng há»“ Daniel Wellington', '08/11/2019', 28),
(35, 'Äá»“ng há»“ G-Shock', '08/11/2019', 28),
(36, 'Äá»“ng há»“ Tissot', '08/11/2019', 30),
(37, 'Äá»“ng há»“ Calvin Klein', '21/11/2019', 30),
(38, 'Äá»“ng há»“ Alexandra Christie', '21/11/2019', 29),
(39, 'Äá»“ng há»“ Rythm', '21/11/2019', 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cus_note` text COLLATE utf8_unicode_ci NOT NULL,
  `cus_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`cus_id`, `cus_name`, `cus_email`, `cus_address`, `cus_phone`, `cus_note`, `cus_date`) VALUES
(7, 'asdasd', 'vvvvvvvv@gmail.com', 'asdhajsdhkj', '0379531098', 'adsasd', '24/11/2019'),
(8, 'kkkkkkkkkkkkkkkkkk', 'vvvvvvvv@gmail.com', 'asdhajsdhkj', '0379531098', 'asafsda', '24/11/2019'),
(9, 'asdasd', 'vvvvvvvv@gmail.com', 'asdhajsdhkj', '0379531098', 'asdasd', '24/11/2019'),
(10, 'nguyenvana', 'nvaaaaaaaaa@gmail.com', 'Hoang Dieu', '0379531099', '', '28/11/2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `detail_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `detail_qty` int(11) NOT NULL,
  `detail_total` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`detail_id`, `pro_id`, `detail_qty`, `detail_total`, `order_id`, `cus_id`) VALUES
(4, 15, 1, 888000, 5, 7),
(5, 27, 1, 4564574, 5, 7),
(6, 15, 1, 888000, 6, 8),
(7, 27, 1, 4564574, 6, 8),
(8, 15, 2, 1776000, 7, 9),
(9, 27, 1, 4564574, 7, 9),
(10, 24, 1, 1725000, 8, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `order_sub_total` int(11) NOT NULL,
  `order_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_id` int(11) NOT NULL,
  `status` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_sub_total`, `order_method`, `cus_id`, `status`) VALUES
(5, 5452574, 'Thanh toÃ¡n táº¡i cá»­a hÃ ng', 7, '2'),
(6, 5452574, 'Thanh toÃ¡n táº¡i cá»­a hÃ ng', 8, '2'),
(7, 6340574, 'Thanh toÃ¡n táº¡i cá»­a hÃ ng', 9, '2'),
(8, 1725000, 'Thanh toÃ¡n táº¡i nhÃ ', 10, '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `page_id` int(11) NOT NULL,
  `page_title` text COLLATE utf8_unicode_ci NOT NULL,
  `page_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `page_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `page_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `page_slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_pages`
--

INSERT INTO `tbl_pages` (`page_id`, `page_title`, `page_desc`, `page_detail`, `page_date`, `page_slug`) VALUES
(1, 'Giá»›i thiá»‡u', 'Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái...', '<p>M?t trong s? ?ï¿½ lï¿½ nhi?u ti?u bang cï¿½ lu?t ï¿½mua l?i ?i?nï¿½ ??i h?i cï¿½c cï¿½ng ty l??i ?i?n ph?i mua l?i l??ng ?i?n d? th?a mï¿½ khï¿½ch hï¿½ng t?o ra b?i n?ng l??ng m?t tr?i. C?ng cï¿½ nh?ng lo ng?i r?ng ng??i ta cï¿½ th? dï¿½ng ngï¿½i n?ng l??ng m?t tr?i t? s?n xu?t ?i?n n?ng l??ng m?t tr?i ??c l?p v?i l??i ï¿½ vï¿½ nh? v?y s? gi?m s? ng??i ph? thu?c vï¿½o l??i ?i?n vï¿½ chuy?n cï¿½c chi phï¿½ ?i?n l??i ?ï¿½ cho nh?ng ng??i khï¿½ng dï¿½ng ?i?n n?ng l??ng m?t tr?i. Phï¿½t bi?u t?i bu?i ra m?t s?n ph?m mï¿½i ngï¿½i n?ng l??ng m?t tr?i vï¿½ h? th?ng pin d? tr? m?i c?a Tesla vï¿½ SolarCity vï¿½o th? Sï¿½u v?a r?i, Musk, ng??i v?a lï¿½ ch? t?ch c?a c? hai cï¿½ng ty v?a lï¿½ CEO c?a Tesla, nï¿½i v? lï¿½ do t?i sao t?m nhï¿½n c?a ï¿½ng ?y v? ?i?n n?ng l??ng m?t tr?i t?i M? sï¿½u xa h?n s? cï¿½ nhi?u vi?c cho cï¿½c cï¿½ng l??i ?i?n ch? khï¿½ng ph?i ï¿½t h?n</p>\r\n', '1/11/2019', 'gioi-thieu.html'),
(2, 'Liên hệ', 'Sau bão số 5 Matmo, còn bao nhiêu cơn bão đổ bộ đất liền trong năm 2019?', 'Sáng sớm 31/10, bão số 5 Matmo đã đổ bộ đất liền các tỉnh từ Bình Định đến Phú Yên với sức gió cấp 8-9, giật cấp 11. Bão gây mưa to, gió giật nhiều nơi làm thiệt hại nặng nề cho người dân các tỉnh Nam Trung Bộ.\r\n\r\nTheo Văn phòng Ban chỉ đạo Trung ương về PCTT, bão số 5 đã làm 1 người mất tích và ít nhất 14 người bị thương ở Quảng Ngãi; hơn 4.000 ngôi nhà bị sập, hư hỏng, ngập nước; nhiều cây xanh bị gãy đổ, tàu thuyền hư hỏng và đặc biệt là sự cố mất điện xảy ra ở nhiều nơi thuộc Quảng Ngãi, Bình Định, Phú Yên…\r\n\r\nSo với trung bình nhiều năm (TBNN), tính đến tháng 11/2019, Trung tâm Dự báo khí tượng thủy văn Quốc gia nhận định, bão có xu hướng hoạt động ít hơn TBNN. Tuy nhiên, từ nay đến cuối năm 2019, mật độ bão trên khu vực Biển Đông lại có xu hướng cao hơn TBNN.', '1/11/2019', 'lien-he.html');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `post_id` int(11) NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_thumb` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_posts`
--

INSERT INTO `tbl_posts` (`post_id`, `post_title`, `post_content`, `post_thumb`, `post_status`, `post_date`) VALUES
(3, 'oooooo', '<p>kkkkkkk</p>\r\n', '1-Copy(3).jpg', 'ÄÃ£ chá»‰nh sá»­a', '08/11/2019'),
(4, 'LiÃªn káº¿t xÃ£ há»™i', '<p>Th&agrave;nh phá»‘ thiáº¿u váº¯ng em. Ng&agrave;y kh&ocirc;ng em cháº³ng &ecirc;m Ä‘á»m</p>\r\n', '', '', '02/11/2019'),
(6, 'asdasdasd', '<p>asdasdasd</p>\r\n', 'icon-to-top-Copy.png', 'ÄÃ£ chá»‰nh sá»­a', '02/11/2019'),
(7, 'ooooo', '<p>ooooooo</p>\r\n', 'icon-5.png', 'Hoáº¡t Ä‘á»™ng', '03/11/2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `pro_id` int(11) NOT NULL,
  `pro_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_price` int(25) NOT NULL,
  `pro_price_old` int(25) NOT NULL,
  `pro_gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `pro_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_time` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pro_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_view` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`pro_id`, `pro_code`, `pro_name`, `pro_price`, `pro_price_old`, `pro_gender`, `pro_desc`, `pro_detail`, `pro_time`, `pro_thumb`, `pro_view`, `cat_id`) VALUES
(15, 'B650WD-1ADF', 'Casio B650WD-1ADF Nam Quartz', 888000, 987000, 'male', '<p><strong>Báº£o h&agrave;nh ch&iacute;nh h&atilde;ng:</strong> Quá»‘c táº¿ 1 nÄƒm</p>\r\n\r\n<p><strong>Chá»‘ng nÆ°á»›c</strong> 5 ATM (50m)</p>\r\n\r\n<p><strong>Dáº¡ng máº·t sá»‘</strong> Vu&ocirc;ng</p>\r\n\r\n<p><strong>Giá»›i t&iacute;nh</strong> Nam</p>\r\n\r\n<p><strong>Loáº¡i d&acirc;y</strong> D&acirc;y Inox (Th&eacute;p Kh&ocirc;ng Gá»‰)</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong> Mineral Crystal (K&iacute;nh Cá»©ng)</p>\r\n\r\n<p><strong>Loáº¡i m&aacute;y</strong> Pin (Quartz)</p>\r\n\r\n<p><strong>Size máº·t sá»‘</strong> 43,1 mm</p>\r\n\r\n<p><strong>ThÆ°Æ¡ng hiá»‡u</strong> Casio</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong> Nháº­t Báº£n</p>\r\n', '<p>value=&quot;</p>\r\n\r\n<p>value=&quot;</p>\r\n\r\n<p>value=&quot;</p>\r\n\r\n<h2><strong>Ä&aacute;nh gi&aacute; Ä‘á»“ng há»“ Casio B650WD-1ADF: &nbsp;Thá»i trang v&agrave; phong c&aacute;ch</strong></h2>\r\n\r\n<p><strong>Äá»“ng há»“ Casio B650WD-1ADF</strong>&nbsp;l&agrave; thiáº¿t káº¿ d&agrave;nh cho nam giá»›i c&oacute; xuáº¥t xá»© tá»« Nháº­t Báº£n. Sáº£n pháº©m n&agrave;y Ä‘Æ°á»£c biáº¿t Ä‘áº¿n l&agrave; má»™t thiáº¿t káº¿ mang Ä‘áº­m cháº¥t cá»• Ä‘iá»ƒn cá»§a nhá»¯ng nÄƒm Ä‘áº§u tháº­p ni&ecirc;n &nbsp;tháº¿ ká»· trÆ°á»›c káº¿t há»£p h&agrave;i h&ograve;a vá»›i nhá»¯ng yáº¿u tá»‘ hiá»‡n Ä‘áº¡i , l&agrave;m ná»•i báº­t l&ecirc;n phong c&aacute;ch thá»i trang tháº¿ há»‡ má»›i. Vá»›i Casio báº¡n lu&ocirc;n Ä‘Æ°á»£c tráº£i nghiá»‡m nhá»¯ng Ä‘iá»u th&uacute; vá»‹ nháº¥t.</p>\r\n\r\n<h2><strong>T&igrave;m hiá»ƒu vá» Ä‘á»“ng há»“ Casio B650WD-1ADF</strong></h2>\r\n\r\n<p><strong>Äá»“ng há»“ Casio B650WD-1ADF</strong>&nbsp;&nbsp;l&agrave; má»™t thiáº¿t káº¿ cá»§a h&atilde;ng Ä‘á»“ng há»“ ná»•i tiáº¿ng Casio. Má»—i sáº£n pháº©m cá»§a Casio Ä‘á»u mang Ä‘áº¿n cho ngÆ°á»i d&ugrave;ng má»™t cáº£m gi&aacute;c kh&aacute;c biá»‡t. bá»Ÿi láº½ Casio Ä‘Æ°á»£c biáº¿t Ä‘áº¿n l&agrave; má»™t thÆ°Æ¡ng hiá»‡u ná»•i tiáº¿ng vá» cháº¥t lÆ°á»£ng, ngoáº¡i h&igrave;nh Ä‘á»™c Ä‘&aacute;o v&agrave; nhá»¯ng t&iacute;nh nÄƒng vÆ°á»£t trá»™i. Casio B650WD-1ADF Ä‘&atilde; trá»Ÿ th&agrave;nh má»™t sáº£n pháº©m cá»±c hot tr&ecirc;n thá»‹ trÆ°á»ng Viá»‡t Nam. C&ugrave;ng Ä‘iá»ƒm qua má»™t sá»‘ chi tiáº¿t Ä‘á»ƒ biáº¿t l&yacute; do táº¡i sao n&oacute; láº¡i hot nhÆ° tháº¿ nh&eacute;!</p>\r\n\r\n<h2><strong>Ä&aacute;nh gi&aacute; ngoáº¡i h&igrave;nh Ä‘á»“ng há»“ Casio B650WD-1ADF</strong></h2>\r\n\r\n<p>Casio B650WD-1ADF l&agrave; má»™t thiáº¿t káº¿ cá»• Ä‘iá»ƒn cá»™ng th&ecirc;m sá»± káº¿t há»£p h&agrave;i h&ograve;a giá»¯a hai gam m&agrave;u báº¡c v&agrave; m&agrave;u Ä‘en. Hai gam m&agrave;u n&agrave;y tuy kh&ocirc;ng pháº£i ná»•i báº­t nhÆ°ng hiá»‡u quáº£ khi ch&uacute;ng káº¿t há»£p vá»›i nhau láº¡i ho&agrave;n to&agrave;n má»›i láº¡i. M&agrave;u báº¡c táº¡o n&ecirc;n cáº£m gi&aacute;c sang trá»ng cuá»‘n h&uacute;t, c&ograve;n m&agrave;u Ä‘en láº¡i Ä‘em Ä‘áº¿n cáº£m gi&aacute;c huyá»n b&iacute; máº¡nh máº½. Äiá»u n&agrave;y Ä‘&atilde; gi&uacute;p Casio B650WD-1ADF ghi Ä‘Æ°á»£c nhá»¯ng Ä‘iá»ƒm sá»‘ Ä‘áº§u ti&ecirc;n trong máº¯t ngÆ°á»i ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<p>Vá» v&agrave; gá» Ä‘á»“ng há»“ Casio B650WD-1ADF Ä‘Æ°á»£c sáº£n xuáº¥t tá»« cháº¥t liá»‡u nhá»±a cao cáº¥p h&agrave;ng Ä‘áº§u cá»§a Nháº­t Báº£n, mang láº¡i cáº£m gi&aacute;c nháº¹ nh&agrave;ng thoáº£i m&aacute;i cho ngÆ°á»i sá»­ dá»¥ng. D&acirc;y Ä‘eo Ä‘Æ°á»£c l&agrave;m tá»« cháº¥t liá»‡u th&eacute;p kh&ocirc;ng gá»‰ máº¡ báº¡c, thiáº¿t káº¿ &ocirc;m s&aacute;t tay ngÆ°á»i d&ugrave;ng táº¡o cáº£m gi&aacute;c thoáº£i m&aacute;i. B&ecirc;n cáº¡nh Ä‘&oacute; cháº¥t liá»‡u th&eacute;p kh&ocirc;ng gá»‰ gi&uacute;p chiáº¿c Ä‘á»“ng há»“ cá»§a báº¡n l&uacute;c n&agrave;o c&ugrave;ng cÅ©ng s&aacute;ng b&oacute;ng v&agrave; cuá»‘n h&uacute;t.</p>\r\n\r\n<p>M&agrave;u máº·t sá»‘ Ä‘á»“ng há»“ l&agrave; m&agrave;u tráº¯ng l&agrave;m ná»•i báº­t m&agrave;n h&igrave;nh Ä‘iá»‡n tá»­ giá» tá»± Ä‘á»™ng, gi&uacute;p ngÆ°á»i d&ugrave;ng thuáº­n lá»£i quan s&aacute;t Ä‘Æ°á»£c thá»i gian, ng&agrave;y th&aacute;ng v&agrave; nhá»¯ng th&ocirc;ng sá»‘ kh&aacute;c tr&ecirc;n m&agrave;n h&igrave;nh.</p>\r\n\r\n<p>Th&ecirc;m má»™t Ä‘iá»ƒm cá»™ng cho sáº£n pháº©m Ä‘&oacute; ch&iacute;nh l&agrave; máº·t k&iacute;nh Ä‘Æ°á»£c l&agrave;m tá»« nhá»±a cao cáº¥p, c&oacute; kháº£ nÄƒng chá»‹u lá»±c , chá»‹u nhiá»‡t, v&agrave; Ä‘á»™ chá»‘ng nÆ°á»›c cá»±c cao. Báº¡n c&oacute; thá»ƒ&nbsp;thoáº£i m&aacute;i bÆ°ng b&ecirc; hay hoáº¡t Ä‘á»™ng m&agrave; kh&ocirc;ng cáº§n lo áº£nh hÆ°á»Ÿng Ä‘áº¿n máº·t Ä‘á»“ng há»“.pin Ä‘Æ°á»£c sá»­ dá»¥ng l&agrave; pin CR2016. Äáº·c Ä‘iá»ƒm cá»§a loáº¡i pin n&agrave;y l&agrave; c&oacute; tuá»•i thá» tÆ°Æ¡ng Ä‘á»‘i cao 7 nÄƒm. Tr&ecirc;n m&agrave;n h&igrave;nh c&ograve;n c&oacute; há»‡ thá»‘ng Ä‘&egrave;n LED ráº¥t thuáº­n lá»£i v&agrave; dá»… d&agrave;ng sá»­ dá»¥ng.</p>\r\n\r\n<p>Äá»“ng há»“ c&oacute; k&iacute;ch thÆ°á»›c 43.1 x 41.2 x 10.5 mm, tá»•ng trá»ng lÆ°á»£ng l&agrave; 63g . thiáº¿t káº¿ tÆ°Æ¡ng Ä‘á»‘i nhá» gá»n táº¡o cáº£m gi&aacute;c nháº¹ nh&agrave;ng thoáº£i m&aacute;i cho ngÆ°á»i sá»­ dá»¥ng.</p>\r\n\r\n<h2><strong>T&iacute;nh nÄƒng ná»•i trá»™i cá»§a Ä‘á»“ng há»“ Casio B650WD-1ADF</strong></h2>\r\n\r\n<p>CÅ©ng giá»‘ng nhÆ° báº¥t ká»³ chiáº¿c Ä‘á»“ng há»“ n&agrave;o kh&aacute;c, nhá»¯ng t&iacute;nh nÄƒng cá»§a chiáº¿c&nbsp;<em>Ä‘á»“ng há»“ nam Casio&nbsp;</em>háº§u Ä‘a Ä‘á»u xoay quanh váº¥n Ä‘á» thá»i gian. Ngo&agrave;i ra Casio B650WD-1ADF &nbsp;c&ograve;n c&oacute; nhá»¯ng t&iacute;nh nÄƒng ri&ecirc;ng biá»‡t Ä‘á»™c Ä‘&aacute;o.</p>\r\n\r\n<p>Casio B650WD-1ADF c&oacute; kháº£ nÄƒng báº¥m giá» tá»± Ä‘á»™ng, b&aacute;o thá»©c. co thá»ƒ Ä‘o Ä‘Æ°á»£c thá»i gian Ä‘&atilde; tr&ocirc;i qua. B&ecirc;n cáº¡nh Ä‘&oacute; n&oacute; c&ograve;n c&oacute; t&iacute;n hiá»‡u thá»i gian theo giá», lá»‹ch ng&agrave;y tá»± Ä‘á»™ng dá»… d&agrave;ng quan s&aacute;t.</p>\r\n\r\n<h2><strong>Äá»™ sai sá»‘ cá»§a Ä‘á»“ng há»“ Casio B650WD-1ADF</strong></h2>\r\n\r\n<p>Báº¡n c&oacute; biáº¿t báº¥t ká»³ má»™t chiáº¿c Ä‘á»“ng há»“ d&ugrave; gi&aacute; th&agrave;nh cao hay tháº¥p th&igrave; ch&uacute;ng Ä‘á»u c&oacute; Ä‘á»™ sai sá»‘ á»Ÿ má»™t má»©c Ä‘á»™ n&agrave;o Ä‘&oacute;. Tuy nhi&ecirc;n Ä‘á»™ sai sá»‘ cao hay tháº¥p c&ograve;n t&ugrave;y thuá»™c v&agrave;o cháº¥t lÆ°á»£ng cá»§a má»—i thÆ°Æ¡ng hiá»‡u v&agrave; sáº£n pháº©m. &nbsp;Vá»›i B650WD-1ADF báº¡n ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m &nbsp;v&igrave; Ä‘áº³ng cáº¥p cá»§a n&oacute; Ä‘&atilde; pháº§n n&agrave;o thá»ƒ hiá»‡n qua thÆ°Æ¡ng hiá»‡u. Äá»™ sai sá»‘ cá»§a n&oacute; l&agrave; 30 gi&acirc;y má»—i th&aacute;ng.</p>\r\n\r\n<p>Báº¡n Ä‘&atilde; sá»Ÿ há»¯u&nbsp;<strong>Ä‘á»“ng há»“ Casio B650WD-1ADF</strong>&nbsp;chÆ°a nhá»‰? Náº¿u chÆ°a th&igrave; h&atilde;y sá»Ÿ há»¯u ngay má»™t em Ä‘á»ƒ tráº£i nghiá»‡m t&iacute;nh nÄƒng má»›i m&agrave; n&oacute; Ä‘em láº¡i nh&eacute;!</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n', '30/11/2019', '2.jpg', 16, 38),
(16, 'MTP-1374D-1AVDF', 'Casio MTP-1374D-1AVDF Nam Quartz', 1777000, 1974000, 'male', 'Báº£o hÃ nh chÃ­nh hÃ£ng	\r\nQuá»‘c táº¿ 1 nÄƒm\r\n\r\nChá»‘ng nÆ°á»›c	\r\n5 ATM (50m)\r\n\r\nDáº¡ng máº·t sá»‘	\r\nTrÃ²n\r\n\r\nGiá»›i tÃ­nh	\r\nNam\r\n\r\nLoáº¡i dÃ¢y	\r\nDÃ¢y Inox (ThÃ©p KhÃ´ng Gá»‰)\r\n\r\nLoáº¡i kÃ­nh	\r\nMineral Crystal (KÃ­nh Cá»©ng)\r\n\r\nLoáº¡i mÃ¡y	\r\nPin (Quartz)\r\n\r\nSize máº·t sá»‘	\r\n42 mm\r\n\r\nThÆ°Æ¡ng hiá»‡u	\r\nCasio\r\n\r\nXuáº¥t xá»©	\r\nNháº­t Báº£n\r\n\r\n', '<p>value=&quot;</p>\r\n\r\n<h2><strong>Sáº£n pháº©m Ä‘á»“ng há»“ Casio MTP-1374D-1AVDF vá»›i thiáº¿t káº¿ hiá»‡n Ä‘áº¡i, máº¡nh máº½</strong></h2>\r\n\r\n<p><strong>Äá»“ng há»“ Casio MTP-1374D-1AVDF&nbsp;</strong>l&agrave; chiáº¿c Ä‘á»“ng há»“ nam giá»›i hiá»‡n Ä‘áº¡i tráº» trung Ä‘áº§y máº¡nh máº½. Sáº£n pháº©m n&agrave;y c&oacute; thiáº¿t káº¿ hiá»‡n Ä‘áº¡i, vá»›i nhá»¯ng t&iacute;nh nÄƒng Ä‘a dáº¡ng tiá»‡n lá»£i khiáº¿n ngÆ°á»i ti&ecirc;u d&ugrave;ng y&ecirc;u th&iacute;ch. Vá»›i bá» ngo&agrave;i áº¥n tÆ°á»£ng sáº£n pháº©m n&agrave;y Ä‘&atilde; nhanh ch&oacute;ng thu h&uacute;t ngÆ°á»i ti&ecirc;u d&ugrave;ng lá»±a chá»n sá»­ dá»¥ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://shopdongho.com/wp-content/uploads/2018/09/chi-tiet-dong-ho-casio-mtp-1374d-1avdf-nam-pin-day-inox-a-hinh-2-600x360.jpg.webp\" style=\"height:409px; width:682px\" /></p>\r\n\r\n<h2><strong>1. Thiáº¿t káº¿ sáº£n pháº©m Ä‘á»“ng há»“ Casio MTP-1374D-1AVDF</strong></h2>\r\n\r\n<p>Sáº£n pháº©m&nbsp;<strong>Ä‘á»“ng há»“ Casio MTP-1374D-1AVDF&nbsp;</strong>Ä‘Æ°á»£c thiáº¿t káº¿ vá»›i phong c&aacute;ch hiá»‡n Ä‘áº¡i, tráº» trung v&agrave; máº¡nh máº½. Sáº£n pháº©m Ä‘á»“ng há»“ nam Casio n&agrave;y c&oacute; sá»± káº¿t há»£p giá»¯a m&agrave;u s&aacute;ng báº¡c vá»›i máº·t ná»n m&agrave;u Ä‘en táº¡o ra sá»± tÆ°Æ¡ng pháº£n hiá»‡n Ä‘áº¡i. Vá»›i sá»± káº¿t há»£p nhÆ° váº­y, sáº£n pháº©m ph&ugrave; há»£p vá»›i ngÆ°á»i d&ugrave;ng y&ecirc;u th&iacute;ch phong c&aacute;ch nÄƒng Ä‘á»™ng v&agrave; nam t&iacute;nh, Ä‘áº·c biá»‡t ráº¥t ph&ugrave; há»£p cho nam giá»›i tráº» trung hiá»‡n Ä‘áº¡i.</p>\r\n\r\n<p>Thiáº¿t káº¿ d&acirc;y Ä‘eo l&agrave; kim loáº¡i th&eacute;p kh&ocirc;ng gá»‰ c&oacute; Ä‘áº·c t&iacute;nh cá»©ng cháº¯c v&agrave; bá»n Ä‘áº¹p. Lá»›p d&acirc;y Ä‘eo n&agrave;y Ä‘Æ°á»£c thiáº¿t káº¿ vá»›i gam m&agrave;u s&aacute;ng báº¡c khiáº¿n cho bá» ngo&agrave;i sáº£n pháº©m tr&ocirc;ng tháº­t hiá»‡n Ä‘áº¡i v&agrave; tráº» trung. Thiáº¿t káº¿ d&acirc;y Ä‘eo n&agrave;y ráº¥t ph&ugrave; há»£p táº¡o n&ecirc;n phong c&aacute;ch máº¡nh máº½ v&agrave; tráº» trung cho ngÆ°á»i d&ugrave;ng. Ná»‘i thiáº¿t káº¿ c&aacute;c máº¯t ná»‘i kim loáº¡i táº¡o n&ecirc;n d&aacute;ng váº» Ä‘áº·c biá»‡t cho sáº£n pháº©m d&acirc;y Ä‘eo n&agrave;y khiáº¿n cho ngÆ°á»i d&ugrave;ng cáº£m tháº¥y bá»‹ áº¥n tÆ°á»£ng ngay tá»« c&aacute;i nh&igrave;n Ä‘áº§u ti&ecirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"https://shopdongho.com/wp-content/uploads/2018/09/chi-tiet-dong-ho-casio-mtp-1374d-1avdf-nam-pin-day-inox-a-hinh-3-600x360.jpg.webp\" style=\"height:391px; width:652px\" /></p>\r\n\r\n<p>Bá» máº·t Ä‘á»“ng há»“ kh&aacute; áº¥n tÆ°á»£ng vá»›i k&iacute;ch thÆ°á»›c lá»›n. Bá» máº·t n&agrave;y c&oacute; gam m&agrave;u chá»§ Ä‘áº¡o l&agrave; m&agrave;u Ä‘en táº¡o ra Ä‘áº·c t&iacute;nh máº¡nh máº½ cho nhá»¯ng sáº£n pháº©m mang m&agrave;u sáº¯c nhÆ° váº­y. Vá»›i c&aacute;c t&iacute;nh máº¡nh máº½ n&agrave;y, sáº£n pháº©m ph&ugrave; há»£p cho nam giá»›i thá»ƒ hiá»‡n phong c&aacute;ch cá»§a báº£n th&acirc;n.</p>\r\n\r\n<p>Tr&ecirc;n bá» máº·t n&agrave;y c&aacute;c chi tiáº¿t nhÆ° kim Ä‘á»“ng há»“, má»‘c thá»i gian Ä‘Æ°á»£c thá»ƒ hiá»‡n báº±ng gam m&agrave;u tráº¯ng kh&aacute; ná»•i báº­t tr&ecirc;n ná»n máº·t m&agrave;u Ä‘en. Háº§u háº¿t c&aacute;c chi tiáº¿t á»Ÿ váº¡ch má»‘c thá»i gian Ä‘á»u kh&ocirc;ng Ä‘Æ°á»£c hiá»ƒn thá»‹ sá»‘ trá»« vá»‹ tr&iacute; sá»‘ 12 l&agrave; con sá»‘ r&otilde; r&agrave;ng gi&uacute;p ngÆ°á»i d&ugrave;ng ph&acirc;n biá»‡t Ä‘Æ°á»£c vá»‹ tr&iacute; giá»¯a Ä‘iá»ƒm Ä‘áº§u v&agrave; Ä‘iá»ƒm cuá»‘i. Tr&ecirc;n máº·t ná»n n&agrave;y c&ograve;n c&oacute; c&aacute;c Ä‘á»“ng há»“ phá»¥ Ä‘Æ°á»£c bá»‘ tr&iacute; á»Ÿ vá»‹ tr&iacute; 3, 6, 9 giá» Ä‘áº·t s&aacute;t cáº¡nh nhau. C&aacute;c Ä‘á»“ng há»“ phá»¥ n&agrave;y mang láº¡i c&aacute;c t&iacute;nh nÄƒng th&uacute; vá»‹ cho sáº£n pháº©m.</p>\r\n\r\n<h2><strong>2. Ä&aacute;nh gi&aacute; cháº¥t lÆ°á»£ng cá»§a sáº£n pháº©m Ä‘á»“ng há»“ Casio MTP-1374D-1AVDF</strong></h2>\r\n\r\n<p>Sáº£n pháº©m&nbsp;<strong>Ä‘á»“ng há»“ Casio MTP-1374D-1AVDF&nbsp;</strong>Ä‘Æ°á»£c Ä‘&aacute;nh gi&aacute; l&agrave; sáº£n pháº©m cá»±c ká»³ cháº¥t lÆ°á»£ng. Sáº£n pháº©m n&agrave;y Ä‘Æ°á»£c trang bá»‹ nhiá»u t&iacute;nh nÄƒng kh&aacute;c nhau. Nhá» váº­y m&agrave; ngÆ°á»i d&ugrave;ng c&oacute; nhá»¯ng gi&acirc;y ph&uacute;t tráº£i nghiá»‡m v&ocirc; c&ugrave;ng th&uacute; vá»‹. C&aacute;c t&iacute;nh nÄƒng cá»§a sáº£n pháº©m n&agrave;y bao gá»“m:</p>\r\n\r\n<p>T&iacute;nh nÄƒng chá»‰ 24 giá»: Vá»›i t&iacute;nh nÄƒng n&agrave;y, ngÆ°á»i d&ugrave;ng c&oacute; thá»ƒ biáº¿t Ä‘Æ°á»£c giá» ban ng&agrave;y v&agrave; giá» ban Ä‘&ecirc;m. Nhá» váº­y m&agrave; c&oacute; nhá»¯ng lá»±a chá»n sinh hoáº¡t ph&ugrave; há»£p.</p>\r\n\r\n<p>T&iacute;nh nÄƒng chá»‰ thá»© v&agrave; ng&agrave;y trong tuáº§n, th&aacute;ng: T&iacute;nh nÄƒng n&agrave;y cho ph&eacute;p ngÆ°á»i d&ugrave;ng nháº­n biáº¿t Ä‘Æ°á»£c thá»i Ä‘iá»ƒm hiá»‡n táº¡i ra sao? Tá»« Ä‘&oacute; c&oacute; nhá»¯ng sáº¯p xáº¿p lá»‹ch c&ocirc;ng viá»‡c ph&ugrave; há»£p.</p>\r\n\r\n<p>T&iacute;nh nÄƒng chá»‘ng tháº¥m nÆ°á»›c cá»§a sáº£n pháº©m Ä‘á»“ng há»“ Casio ch&iacute;nh h&atilde;ng n&agrave;y ráº¥t tá»‘t. NgÆ°á»i d&ugrave;ng c&oacute; thá»ƒ sá»­ dá»¥ng á»Ÿ m&ocirc;i trÆ°á»ng nÆ°á»›c s&acirc;u 50m m&agrave; váº«n c&oacute; thá»ƒ hoáº¡t Ä‘á»™ng b&igrave;nh thÆ°á»ng, kh&ocirc;ng lo bá»‹ há»ng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://shopdongho.com/wp-content/uploads/2018/09/chi-tiet-dong-ho-casio-mtp-1374d-1avdf-nam-pin-day-inox-a-hinh-1-600x360.jpg.webp\" style=\"height:396px; width:660px\" /></p>\r\n\r\n<p>Äá»“ng há»“ Casio ch&iacute;nh h&atilde;ng Ä‘Æ°á»£c cáº¥u táº¡o vá»›i lá»›p k&iacute;nh cá»©ng ph&iacute;a tr&ecirc;n gi&uacute;p chá»‘ng va Ä‘áº­p cá»±c tá»‘t. Kháº£ nÄƒng n&agrave;y gi&uacute;p cho ngÆ°á»i d&ugrave;ng tá»± do hoáº¡t Ä‘á»™ng á»Ÿ m&ocirc;i trÆ°á»ng thá»ƒ thao c&oacute; nhiá»u va cháº¡m m&agrave; kh&ocirc;ng lo bá»‹ há»ng.</p>\r\n\r\n<p>Vá»›i c&aacute;c th&ocirc;ng tin ká»ƒ tr&ecirc;n, ch&uacute;ng ta Ä‘&atilde; biáº¿t Ä‘Æ°á»£c sáº£n pháº©m&nbsp;<strong>Ä‘á»“ng há»“ Casio MTP-1374D-1AVDF&nbsp;</strong>c&oacute; thiáº¿t káº¿ hiá»‡n Ä‘áº¡i, tráº» trung v&agrave; máº¡nh máº½. Vá»›i sáº£n pháº©m n&agrave;y, ngÆ°á»i d&ugrave;ng gi&uacute;p thá»ƒ hiá»‡n phong c&aacute;ch cá»§a c&aacute;nh m&agrave;y r&acirc;u th&ecirc;m pháº§n máº¡nh máº½, hiá»‡n Ä‘áº¡i hÆ¡n. V&igrave; váº­y sáº£n pháº©m n&agrave;y kh&ocirc;ng chá»‰ mang láº¡i lá»£i &iacute;ch vá» máº·t thá»i gian m&agrave; c&ograve;n mang láº¡i lá»£i &iacute;ch nhÆ° nhá»¯ng váº­t trang tr&iacute;.</p>\r\n\r\n<p>&quot;</p>\r\n', '18/11/2019', '3.jpg', 0, 33),
(17, 'SRP669K1', 'Seiko 5 SRP669K1 Nam CÆ¡ Tá»± Äá»™ng', 5488000, 6860000, 'male', 'Báº£o hÃ nh chÃ­nh hÃ£ng	\r\nQuá»‘c táº¿ 1 nÄƒm\r\n\r\nChá»‘ng nÆ°á»›c	\r\n10 ATM (100m)\r\n\r\nDáº¡ng máº·t sá»‘	\r\nTrÃ²n\r\n\r\nGiá»›i tÃ­nh	\r\nNam\r\n\r\nLoáº¡i dÃ¢y	\r\nDÃ¢y Inox (ThÃ©p KhÃ´ng Gá»‰)\r\n\r\nLoáº¡i kÃ­nh	\r\nMineral Crystal (KÃ­nh Cá»©ng)\r\n\r\nLoáº¡i mÃ¡y	\r\nCÆ¡ TÆ°Ì£ Ä‘Ã´Ì£ng (Automatic)\r\n\r\nSize máº·t sá»‘	\r\n44 mm\r\n\r\nThÆ°Æ¡ng hiá»‡u	\r\nSeiko\r\n\r\nXuáº¥t xá»©	\r\nNháº­t Báº£n', '<h1>Seiko 5 SRP669K1 Nam CÆ¡ Tá»± Äá»™ng</h1>\r\n', '18/11/2019', 'sk2.jpg', 0, 33),
(18, 'SRP123K1', 'Seiko 5 SRP123K1 Nam CÆ¡ Tá»± Äá»™ng', 4425000, 0, 'male', 'Báº£o hÃ nh chÃ­nh hÃ£ng	\r\nQuá»‘c táº¿ 1 nÄƒm\r\n\r\nChá»‘ng nÆ°á»›c	\r\n10 ATM (100m)\r\n\r\nDáº¡ng máº·t sá»‘	\r\nTrÃ²n\r\n\r\nGiá»›i tÃ­nh	\r\nNam\r\n\r\nLoáº¡i dÃ¢y	\r\nDÃ¢y Inox (ThÃ©p KhÃ´ng Gá»‰)\r\n\r\nLoáº¡i kÃ­nh	\r\nMineral Crystal (KÃ­nh Cá»©ng)\r\n\r\nLoáº¡i mÃ¡y	\r\nCÆ¡ TÆ°Ì£ Ä‘Ã´Ì£ng (Automatic)\r\n\r\nSize máº·t sá»‘	\r\n42 mm\r\n\r\nThÆ°Æ¡ng hiá»‡u	\r\nSeiko\r\n\r\nXuáº¥t xá»©	\r\nNháº­t Báº£n', '<p>Seiko 5 SRP123K1 Nam CÆ¡ Tá»± Äá»™ng</p>\r\n', '18/11/2019', 'sk3.jpg', 2, 33),
(19, 'SRP435K1', 'Seiko 5 SRP435K1 Nam CÆ¡ Tá»± Äá»™ng', 6736000, 0, 'male', 'Báº£o hÃ nh chÃ­nh hÃ£ng	\r\nQuá»‘c táº¿ 1 nÄƒm\r\n\r\nChá»‘ng nÆ°á»›c	\r\n10 ATM (100m)\r\n\r\nDáº¡ng máº·t sá»‘	\r\nTrÃ²n\r\n\r\nGiá»›i tÃ­nh	\r\nNam\r\n\r\nLoáº¡i dÃ¢y	\r\nDÃ¢y Inox (ThÃ©p KhÃ´ng Gá»‰)\r\n\r\nLoáº¡i kÃ­nh	\r\nMineral Crystal (KÃ­nh Cá»©ng)\r\n\r\nLoáº¡i mÃ¡y	\r\nCÆ¡ TÆ°Ì£ Ä‘Ã´Ì£ng (Automatic)\r\n\r\nSize máº·t sá»‘	\r\n44 mm\r\n\r\nThÆ°Æ¡ng hiá»‡u	\r\nSeiko\r\n\r\nXuáº¥t xá»©	\r\nNháº­t Báº£n', '', '18/11/2019', 'sk4.jpg', 0, 33),
(20, 'SRW829P1', 'Seiko SRW829P1 Ná»¯ Quartz', 6144000, 7680000, 'female', 'Báº£o hÃ nh chÃ­nh hÃ£ng	\r\nQuá»‘c táº¿ 1 nÄƒm\r\n\r\nChá»‘ng nÆ°á»›c	\r\n10 ATM (100m)\r\n\r\nDáº¡ng máº·t sá»‘	\r\nTrÃ²n\r\n\r\nGiá»›i tÃ­nh	\r\nNá»¯\r\n\r\nLoáº¡i dÃ¢y	\r\nDÃ¢y Inox (ThÃ©p KhÃ´ng Gá»‰)\r\n\r\nLoáº¡i kÃ­nh	\r\nSapphire (KiÌnh ChÃ´Ìng TrÃ¢Ì€y)\r\n\r\nLoáº¡i mÃ¡y	\r\nPin (Quartz)\r\n\r\nSize máº·t sá»‘	\r\n36 mm\r\n\r\nThÆ°Æ¡ng hiá»‡u	\r\nSeiko\r\n\r\nXuáº¥t xá»©	\r\nNháº­t Báº£n', '', '18/11/2019', 'sknu1.jpg', 0, 33),
(21, 'SRW827P1', 'Seiko SRW827P1 Ná»¯ Quartz', 6144000, 7680000, 'female', 'Báº£o hÃ nh chÃ­nh hÃ£ng	\r\nQuá»‘c táº¿ 1 nÄƒm\r\n\r\nChá»‘ng nÆ°á»›c	\r\n10 ATM (100m)\r\n\r\nDáº¡ng máº·t sá»‘	\r\nTrÃ²n\r\n\r\nGiá»›i tÃ­nh	\r\nNá»¯\r\n\r\nLoáº¡i dÃ¢y	\r\nDÃ¢y Inox (ThÃ©p KhÃ´ng Gá»‰)\r\n\r\nLoáº¡i kÃ­nh	\r\nSapphire (KiÌnh ChÃ´Ìng TrÃ¢Ì€y)\r\n\r\nLoáº¡i mÃ¡y	\r\nPin (Quartz)\r\n\r\nSize máº·t sá»‘	\r\n34 mm\r\n\r\nThÆ°Æ¡ng hiá»‡u	\r\nSeiko\r\n\r\nXuáº¥t xá»©	\r\nNháº­t Báº£n', '', '18/11/2019', 'sknu2.jpg', 0, 33),
(22, 'SRW825P1', 'Seiko SRW825P1 Ná»¯ Quartz', 6144000, 7680000, 'female', 'Báº£o hÃ nh chÃ­nh hÃ£ng	\r\nQuá»‘c táº¿ 1 nÄƒm\r\n\r\nChá»‘ng nÆ°á»›c	\r\n10 ATM (100m)\r\n\r\nDáº¡ng máº·t sá»‘	\r\nTrÃ²n\r\n\r\nGiá»›i tÃ­nh	\r\nNá»¯\r\n\r\nLoáº¡i dÃ¢y	\r\nDÃ¢y Inox (ThÃ©p KhÃ´ng Gá»‰)\r\n\r\nLoáº¡i kÃ­nh	\r\nSapphire (KiÌnh ChÃ´Ìng TrÃ¢Ì€y)\r\n\r\nLoáº¡i mÃ¡y	\r\nPin (Quartz)\r\n\r\nSize máº·t sá»‘	\r\n34 mm\r\n\r\nThÆ°Æ¡ng hiá»‡u	\r\nSeiko\r\n\r\nXuáº¥t xá»©	\r\nNháº­t Báº£n', '', '18/11/2019', 'sknu3.jpg', 0, 33),
(23, 'SXDF20P1', 'Seiko SXDF20P1 Ná»¯ Quartz', 3191520, 3989400, 'female', 'Báº£o hÃ nh chÃ­nh hÃ£ng	\r\nQuá»‘c táº¿ 1 nÄƒm\r\n\r\nChá»‘ng nÆ°á»›c	\r\n3 ATM (30m)\r\n\r\nDáº¡ng máº·t sá»‘	\r\nTrÃ²n\r\n\r\nGiá»›i tÃ­nh	\r\nNá»¯\r\n\r\nLoáº¡i dÃ¢y	\r\nDÃ¢y Inox (ThÃ©p KhÃ´ng Gá»‰)\r\n\r\nLoáº¡i kÃ­nh	\r\nHardlex Crystal\r\n\r\nLoáº¡i mÃ¡y	\r\nPin (Quartz)\r\n\r\nSize máº·t sá»‘	\r\n30 mm\r\n\r\nThÆ°Æ¡ng hiá»‡u	\r\nSeiko\r\n\r\nXuáº¥t xá»©	\r\nNháº­t Báº£n\r\n\r\n', '', '18/11/2019', 'sknu4.jpg', 2, 33),
(24, 'FI1605S03-MK', 'Rhythm FI1605S03-MK Nam Quartz', 1725000, 3450000, 'female', '<p>Báº£o h&agrave;nh ch&iacute;nh h&atilde;ng Quá»‘c táº¿ 1 nÄƒm Chá»‘ng nÆ°á»›c 3 ATM (30m) Dáº¡ng máº·t sá»‘ Tr&ograve;n Giá»›i t&iacute;nh Nam Loáº¡i d&acirc;y D&acirc;y Inox (Th&eacute;p Kh&ocirc;ng Gá»‰) Loáº¡i k&iacute;nh Sapphire (KiÌnh Ch&ocirc;Ìng Tr&acirc;Ì€y) Loáº¡i m&aacute;y Pin (Quartz) ThÆ°Æ¡ng hiá»‡u Rhythm Xuáº¥t xá»© Nháº­t Báº£n</p>\r\n', '<p>&quot;</p>\r\n', '21/11/2019', 'rt1.jpg', 15, 39),
(26, '4347468', 'sdszx', 786897, 57568, 'female', '<p>uhihokv</p>\r\n', '<p>bjbkf</p>\r\n', '22/11/2019', 'rt1-Copy.jpg', 18, 39),
(27, '7980897', 'ooooooooooo', 4564574, 3235262, 'male', '<p>xvz</p>\r\n', '<p>asagfd</p>\r\n', '22/11/2019', 'nu1-Copy.jpg', 20, 32),
(28, 'okljk;', 'ppppppppppp', 4564574, 9009090, 'female', '<p>klnkl</p>\r\n', '<p>hjklhj</p>\r\n', '22/11/2019', 'sk1-Copy.jpg', 7, 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sliders`
--

INSERT INTO `tbl_sliders` (`slide_id`, `slide_name`, `slide_thumb`, `slide_link`, `slide_date`) VALUES
(19, 'slide quáº£ng cÃ¡o', 'abc.jpg', 'asd.com', '03/12/2019'),
(20, 'sl2', 'backiee-82528.jpg', 'sl2222', '03/12/2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `number_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`, `number_phone`, `address`, `time`, `user_role`) VALUES
(6, 'tuongvi', 'nntvi.2609@gmail.com', '51d2e4df3822965fe5f2c7a44fc1efee', '0379531098', 'Thá»§ Äá»©c, TPHCM', '31/10/2019', 7),
(8, 'phuocthuong', 'asdasd@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0379531099', 'asdasd', '03/12/2019', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cat_product`
--
ALTER TABLE `tbl_cat_product`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Chỉ mục cho bảng `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`detail_id`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Chỉ mục cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Chỉ mục cho bảng `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`slide_id`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_cat_product`
--
ALTER TABLE `tbl_cat_product`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
