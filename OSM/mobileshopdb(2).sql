-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 03, 2020 at 12:20 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `phone`, `address`, `created_at`, `update_at`) VALUES
(1, 'ADMIN', '123456', 'admin@gmail.com', '0167892615', 'hn', '2019-04-23 09:16:16', '2020-09-03 22:25:46'),
(2, 'Lê Ngọc Xuân', '202cb962ac59075b964b07152d234b70', 'lexuan281294@gmail.com', '0987541656', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc', '2020-09-04 12:36:19', '2020-09-03 22:36:19'),
(3, 'abc', 'e10adc3949ba59abbe56e057f20f883e', 'lexuan@gmail.com', '01234679', 'vy', '2020-10-02 12:59:14', '2020-10-01 22:59:14'),
(4, 'lee xuan', '202cb962ac59075b964b07152d234b70', 'lexuanvtca@gmail.com', '0987541656', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc', '2020-10-16 17:22:03', '2020-10-16 03:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `sort_order`, `status`, `created_at`) VALUES
(5, 0, 'Iphone 11 Series', 1, 1, '0000-00-00 00:00:00'),
(6, 0, 'Iphone X series', 2, 1, '0000-00-00 00:00:00'),
(7, 0, 'Iphone 8 Series', 3, 1, '0000-00-00 00:00:00'),
(8, 0, 'Iphone 7 Series', 4, 1, '0000-00-00 00:00:00'),
(9, 0, 'Iphone 6 Series', 5, 1, '0000-00-00 00:00:00'),
(10, 0, 'IPAD', 6, 1, '0000-00-00 00:00:00'),
(11, 0, 'Apple Watch', 7, 1, '0000-00-00 00:00:00'),
(12, 0, 'Airpods', 8, 1, '0000-00-00 00:00:00'),
(13, 5, 'Iphone 11', 1, 1, '2020-08-27 17:00:00'),
(14, 5, 'Iphone 11 Pro', 2, 1, '2020-08-27 17:00:00'),
(15, 5, 'Iphone 11 pro max', 3, 1, '2020-08-27 17:00:00'),
(16, 6, 'Iphone X', 1, 1, '2020-08-27 17:00:00'),
(17, 6, 'Iphone XS', 2, 1, '2020-08-27 17:00:00'),
(18, 6, 'Iphone XS Max', 3, 1, '2020-08-27 17:00:00'),
(19, 6, 'Iphone XR', 4, 1, '2020-08-27 17:00:00'),
(20, 7, 'Iphone 8', 1, 1, '2020-08-27 17:00:00'),
(21, 7, 'Iphone 8plus', 2, 1, '2020-08-27 17:00:00'),
(22, 8, 'Iphone 7', 1, 1, '2020-08-27 17:00:00'),
(23, 8, 'Iphone 7 Plus', 3, 1, '2020-08-27 17:00:00'),
(24, 9, 'Iphone 6', 1, 1, '2020-08-27 17:00:00'),
(25, 9, 'Iphone 6 Plus', 2, 1, '2020-08-27 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id`, `name`, `password`, `email`, `phone`, `address`, `created_at`, `update_at`, `active`) VALUES
(102, 'vanuoc1', '1', 'uoctv.nde18034@vtc.edu.vn', '0965804067', 'hn', '2020-09-16 18:44:48', '2020-09-16 04:44:48', 0),
(103, 'vanuoc2', '2', 'uoctv.nde181034@vtc.edu.vn', '0965804067', '1', '2020-09-16 18:45:04', '2020-09-16 04:45:04', 0),
(104, 'vanuoc', '1', 'admin18@gmail.com', '09658040672', '2', '2020-09-16 18:45:23', '2020-09-16 04:45:23', 0),
(105, 'vanuoc3', '1', 'admin183@gmail.com', '09658040672', '2', '2020-09-16 18:45:36', '2020-09-16 04:45:36', 1),
(106, 'vanuoc4', '3', 'admin183@gmail.com', '096580406721', '21', '2020-09-16 18:45:47', '2020-09-16 04:45:47', 1),
(107, 'vanuoc', '2', 'uoctv.nde18034@vtc.edu.vn2', '0965804067', 'hn', '2020-09-16 18:45:59', '2020-09-16 04:45:59', 1),
(108, 'vanuoc34', '1', 'uoctv.nde18034@vtc.edu.vn2', '0965804067', 'hn', '2020-09-16 18:46:04', '2020-09-16 04:46:04', 1),
(109, 'vanuoc344', '1', 'uoctv.nde18034@vtc.edu.vn2', '0965804067', 'hn', '2020-09-16 18:46:12', '2020-09-16 04:46:12', 1),
(110, 'vanuoc3442', '1', 'uoctv.nde18034@vtc.edu.vn2', '0965804067', 'hn', '2020-09-16 18:49:44', '2020-09-16 04:49:44', 1),
(111, 'Lê Ngọc Xuân', 'e10adc3949ba59abbe56e057f20f883e', 'lexuan@gmail.com', '00987541656', 'tòa nhà VTC 18 Tam Trinh Hà Nội', '2020-11-04 15:33:47', '2020-11-04 15:33:47', NULL),
(112, 'Thư Cute ', '279e5895fb008c7981a9b1408c40c34c', 'anhthu2462002@gmail.com', '0834846650', 'ấp 3, Xã Mỹ Hòa Huyện Tháp Mười, Đồng Tháp, ngang cầu kinh 9000,  phía bên kia sông', '2020-11-04 16:56:46', '2020-11-04 16:56:46', NULL),
(113, 'Mei', 'e10adc3949ba59abbe56e057f20f883e', 'Mei2002@gmail.com', '0123456789', 'Hà Nội', '2020-11-05 14:23:26', '2020-11-05 14:23:26', NULL),
(114, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@gmail.com', '031546895', 'hn', '2020-11-05 20:07:34', '2020-11-05 20:07:34', NULL),
(115, 'Lê Ngọc Xuân', 'e10adc3949ba59abbe56e057f20f883e', 'lexuan1@gmail.com', '0987541656', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc', '2020-11-06 12:41:46', '2020-11-06 12:41:46', NULL),
(116, 'xuân lê', '202cb962ac59075b964b07152d234b70', 'xuan@gmail.com', '123456', 'tầng 4 tòa nhà VTC, 18 Tam Trinh, Hai Bà Trưng, Hà Nội', '2020-12-03 15:40:14', '2020-12-03 08:40:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `product_id`) VALUES
(16, 'ip_xs_max___den_600x600.jpg', 40),
(18, 'promax_den.jpg', 42),
(19, 'promax xanh.png', 42),
(20, 'promax xanh.png', 19),
(21, 'ip11 vang.jpg', 22),
(22, 'Iphone8PsQt.jpg', 18),
(23, 'iPXSvang.jpg', 14),
(24, 'iphone6Sqt.jpg', 15),
(25, 'xsblack.jpg', 20),
(26, 'iphone6s.jpg', 16),
(27, '7_hong_900x900.jpg', 17),
(28, '7pden.jpg', 55),
(29, 'ipad_den.jpg', 60),
(30, 'ipad_grey.jpg', 60);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(5) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `intro`, `content`, `image_link`, `status`, `created`) VALUES
(18, 'Giá sốc cơn lốc quà tặng chào mừng MediaMart khai trương siêu thị thứ 76 tại Hải Dương', 'Giá sốc cơn lốc quà tặng chào mừng MediaMart khai trương siêu thị thứ 76 tại Hải Dương', 'Sáng thứ 7, ngày 27/1/2018, MediaMart sẽ chào đón thêm thành viên mới MEDIAMART PHẠM NGŨ LÃO tại Ngã tư nhà máy sứ Hải Dương, đường Phạm Ngũ Lão, thành phố Hải Dương (cạnh nhà máy sứ Hải Dương), nâng tổng số trung tâm trên toàn hệ thống lên 76 siêu thị. Nhân dịp này, MediaMart mang đến chuỗi chương trình khuyến mại “Khai trương giá sốc cơn lốc quà tặng” áp dụng từ ngày 27/1-2/2/2018. MediaMart Phạm Ngũ Lão là siêu thị điện máy thứ 5 tại Hải Dương. Được ra mắt trong những ngày cuối năm Đinh Dậu, chào xuân Mậu Tuất, MediaMart Phạm Ngũ Lão hứa hẹn đem đến cơ hội tận hưởng ngàn sản phẩm với mức giá cực rẻ dành cho người tiêu dùng trong 10 ngày đầu khai trương.Theo đó, tâm điểm của đợt khai trương lần này là chương trình : “Giá sốc cơn lốc quà tặng” , tài trợ trả góp 0% lãi xuất trong vòng 6 tháng. Mua Tivi tặng tủ lạnh, loa soundbar, điện thoại Samsung Galaxy, lò vi sóng 20L, vali Lock & Lock, nồi chiên không dầu,…Tổng trị giá lên đến 14.990.000đ. Ngoài ra, khách hàng còn được hoàn tiền 10% khi thanh toán qua thẻ Vietcombank với các giao dịch từ 5 triệu đồng trở lên. Bên cạnh đó, các sản phẩm gia dụng, máy tính, phụ kiện đều có mức giá ưu đãi từ 20-30%. Giảm giá sâu hơn cả phải kể đến dòng Tivi LED HD 32inch giá khai trương chỉ 3.490.000đ, Smart Tivi 4K UHD 40inch giá cực sốc 6.291.000đ, Tivi 4K Ultra HD 55inch rẻ hơn Tivi thường giá cực sốc 11.990.000đ, Smart Tivi 43inch LG 43UJ632T giá sau trừ khuyến mại 11.500.000đ, Smart Tivi 43inch Sony model 43X7500E giảm 17% giá khai trương 14.500.000đ, Tivi 50 inch Samsung 4K Ultra HD 50MU6100 giảm 32% giá chỉ còn 16.200.000đ tặng vali Travel Zone, lò vi sóng 20L…', 'tragop.jpg', 1, '2018-01-26 15:55:46'),
(19, 'Xiaomi Mi 8: flagship đầu bảng giá chưa đến 10 triệu đồng', 'Xiaomi gây bất ngờ lớn khi trình làng Mi 8 với cấu hình và những tính năng đầu bảng trong tầm giá bán chỉ chưa đến 10 triệu đồng.', '<p><a href=\"https://fptshop.com.vn/tin-tuc/tin-moi/xiaomi-mi-8-ra-mat-giong-iphone-x-diem-antutu-cao-nhat-camera-105-diem-dxomark-70371\" target=\"_blank\">Xiaomi Mi 8 chắc chắn là cái tên hot nhất ngày hôm nay</a>.&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/xiaomi\" target=\"_blank\">Xiaomi</a>&nbsp;đã mang đến một sản phẩm tuyệt vời ở mọi khía cạnh, những tính năng và công nghệ hàng đầu trong tầm giá rất khó tin. Xiaomi Mi 8 sở hữu cấu hình mạnh nhất, camera được DxOMark đánh giá vượt qua&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/iphone-x\" target=\"_blank\">iPhone X</a>, nhận diện khuôn mặt bằng hồng ngoại chính xác và thiết kế màn hình AMOLED không viền đẹp mắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Thiết kế Xiaomi Mi 8</strong></h3>\r\n\r\n<p>Xiaomi Mi 8 có thiết kế theo xu hướng màn hình “tai thỏ” mới nhưng Xiaomi vẫn giữ được kiểu dáng đặc trưng của dòng Mi đó là thân máy thanh mảnh cùng mặt lưng kính cong bo tròn tinh tế. Phần khung của Mi 8 làm từ nhôm series 7000, chất liệu nhẹ và rất cứng cáp. Vật liệu chủ đạo trong lớp vỏ Mi 8 là kính, thiết kế cong đều giống như các thế hệ Mi 5 và Mi 6 trước đây. Nếu là fan của Xiaomi, bạn sẽ nhận ra sự thân thuộc trong ngôn ngữ thiết kế Xiaomi Mi 8.</p>\r\n\r\n<p>Cụm camera của Mi 8 được thiết kế đặt dọc và hơi lồi lên giống như Mi Mix 2S, cảm biến vân tay nằm ở phần mặt lưng để nhường chỗ cho màn hình FullView mặt trước. Sẽ có 4 tùy chọn màu cho Mi 8 là Xanh lam, Vàng, Trắng và Đen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>Màn hình Xiaomi Mi 8</strong></h3>\r\n\r\n<p>Màn hình là một điểm rất đáng nói trên Mi 8 khi cuối cùng Xiaomi cũng đã theo xu hướng “tai thỏ” thay vì màn hình Full như Mi Mix 2S. Xiaomi Mi 8 sử dụng màn hình AMOLED của Samsung có kích thước lớn 6,21 inch độ phân giải Full HD+ 2248 x 1080 pixesl (18,7:9). Nhờ viền màn hình mỏng mà Mi 8 có kích thước tổng thể chỉ tương đương một chiếc máy 5,5 inch thông thường. Ngoài ra, Xiaomi cũng đã biết cách tận dụng lợi thế từ màn hình AMOLED khi thêm vào tính năng màn hình luôn bật Always On tương tự như các máy Samsung Galaxy.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '7_den.jpg', 1, '2018-05-31 01:34:02'),
(20, 'Laptop chạy chip Snapdragon 850 đầu tiên sắp ra mắt', 'Một laptop siêu di động, thời lượng pin dài, kết nối 4G mọi lúc mọi nơi có thể là điều bạn đang mong muốn?', '<p>Sau khi chip Snapdragon 845 ra đời, các tin đồn về chip Snapdragon 855 liên tiếp xuất hiện, nó sẽ ra mắt vào cuối năm 2018. Snapdragon 855 được tin sẽ áp dụng quy trình 7 nm, tích hợp băng tần mạng 5G Qualcomm X50. Mặc dù vậy, Qualcomm cũng đang chuẩn bị một phiên bản chip khác, nằm giữa Snapdragon 845 và 855, đó là Snapdragon 850.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Theo “người rò rỉ” Roland Quandt, Qualcomm sẽ sớm ra mắt Snapdragon 850, và có thể hiểu đây là phiên bản nâng cấp của Snapdragon 845. Nhưng lần này, Snapdragon 850 sẽ được sử dụng trên&nbsp;<a href=\"https://fptshop.com.vn/may-tinh-xach-tay\" target=\"_blank\">laptop</a>&nbsp;chạy Windows 10, thay vì cho smartphone.</p>\r\n\r\n<p>Laptop Windows 10 chạy chip ARM đầu tiên ra mắt vào năm ngoái, đó là HP Envy x2 và Lenovo Miix 630, cả 2 dùng chip Snapdragon 835 với mục tiêu kết nối internet, mạng 4G mọi lúc mọi nơi. Tuy nhiên do hiệu năng hạn chế cũng như không thể chạy được nhiều ứng dụng x86 vì vậy mà nó không hấp dẫn người dùng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vài ngày trước đây, một laptop của Lenovo dùng chip Snapdragon 845 cũng đã xuất hiện trên Geekbench, nó đạt 1.353 điểm đơn lõi và 4.288 điểm đa lõi. So với Snapdragon 835 thì hiệu năng lõi đơn đã tăng 50%, đa lõi tăng 25%.</p>\r\n\r\n<p>Snapdragon 850 sẽ có lõi xung nhịp đạt tới 3 GHz, các laptop Windows 10 ARM dùng chip này sẽ gồm Lenovo ELZE1 (châu Âu), Hewlett-Packard Chimera 2 và Asus Thanos, cả 3 sẽ tung ra trong mùa hè này. Trong khi Dell cũng sẽ ra mắt laptop chip Snapdragon 850 nhưng muộn hơn.</p>\r\n', '11do2.jpg', 1, '2018-05-31 01:35:21'),
(21, 'Thanh toán hóa đơn qua Payoo tại FPT Shop, nhận ngay SmartTV 49 Samsung', 'Trong tháng 6 này, FPT Shop phối hợp với Payoo tặng 8 SmartTV Samsung trị giá 13.890.000 đồng/chiếc cho tất cả khách hàng đến thanh toán các loại hóa đơn,vé và dịch vụ khác qua Payoo (bao gồm hóa đơn điện, nước, điện thoại, truyền hình, trả góp v.v...).', '<p>Theo đó, từ nay đến ngày 30/6, chọn thanh toán các loại hóa đơn qua Payoo, bao gồm: hóa đơn điện, nước, thanh toán thẻ cào, trả góp,..tại cửa hàng FPT Shop bất kỳ trên toàn quốc, bạn có ngay cơ hội trúng 1 trong 8 SmartTV Samsung trị giá 13.890.000 đồng/chiếc thông qua hình thức quay số trên hệ thống.</p>\r\n\r\n<p>Với&nbsp;<a href=\"https://fptshop.com.vn/cua-hang\">hệ thống 500 cửa hàng</a>&nbsp;trên khắp cả nước, hoạt động từ 8h00 – 22h00 tất cả các ngày trong tuần, FPT Shop là địa điểm giúp bạn thanh toán các loại hóa đơn hàng tháng cách dễ dàng và thuận tiện hơn. Hấp dẫn hơn nữa, trong tháng 5 này, đến FPT Shop thanh toán hóa đơn bạn còn có thêm cơ hội nhận quà tặng giá trị. Mỗi hóa đơn sẽ tương ứng với 1 lần tham gia, như vậy, càng nhiều hóa đơn được thanh toán, bạn càng có nhiều cơ hội trở thành chủ nhân của 8 SmartTV Samsung từ FPT Shop.&nbsp;Đây là ưu đãi cực hấp dẫn và thiết thực với mong muốn tất cả khách hàng được hưởng thêm nhiều lợi ích gia tăng khi chọn trải nghiệm dịch vụ tại đây.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chương trình tháng 6 sẽ có 4 đợt quay số may mắn, cụ thể:</p>\r\n\r\n<p>•&nbsp;Đợt 1: ngày 7/6 dành cho các khách hàng đã thanh toán hóa đơn qua Payoo tại FPT Shop từ ngày 1 - 6/6.</p>\r\n\r\n<p>• Đợt 2: ngày 14/6 dành cho các khách hàng đã thanh toán hóa đơn qua Payoo tại FPT Shop từ ngày 1 - 13/6.</p>\r\n\r\n<p>• Đợt 3: ngày 21/6 dành cho các khách hàng đã thanh toán hóa đơn qua Payoo tại FPT Shop từ ngày 1 - 20/5.</p>\r\n\r\n<p>• Đợt 4: ngày 2/7 dành cho các khách hàng đã thanh toán hóa đơn qua Payoo tại FPT Shop từ ngày 1 - 30/6.</p>\r\n\r\n<p>FPT Shop sẽ liên hệ và tiến hành trao giải cho những khách hàng may mắn nhất sau 20 ngày kể từ ngày công bố kết quả.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hệ thống bán lẻ FPT Shop là chuỗi chuyên bán lẻ các sản phẩm kỹ thuật số bao gồm điện thoại di động, máy tính bảng, laptop, phụ kiện và dịch vụ công nghệ… Ngay từ những ngày đầu thành lập, FPT Shop đã phối hợp Payoo cùng thực hiện những chương trình thanh toán hóa đơn tại tất cả các cửa hàng trên hệ thống, vừa giúp khách hàng chi trả các hóa đơn tiện lợi và nhanh chóng, vừa có thêm nhiều ưu đãi hấp dẫn.&nbsp;</p>\r\n', 'ip11vang.jpg', 1, '2018-05-31 01:36:39'),
(22, 'Điều gì khiến OnePlus duy trì sức hút suốt những năm qua?', 'Điều gì khiến OnePlus vẫn duy trì sức hút mạnh mẽ trên thị trường dù ngày càng có nhiều đối thủ cạnh tranh xuất sắc?', '<p>Mới đây,&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/tin-moi/oneplus-6-chinh-thuc-ra-mat-man-hinh-19-9-snapdragon-845-6gb-8gb-ram-gia-tu-14-trieu-dong-69933\" target=\"_blank\">OnePlus đã trình làng chiếc điện thoại OnePlus 6</a>, đây là sản phẩm thứ 8 trong loạt điện thoại mà nhà sản xuất nổi danh này tung ra thị trường suốt 4 năm tồn tại trên thị trường di động.</p>\r\n\r\n<p>Đã bao giờ bạn thắc mắc là giữa một “rừng” các thương hiệu đối thủ sở hữu nhiều dòng thiết bị xuất sắc, điều gì khiến smartphone OnePlus vẫn trụ vững, phát triển và có lượng người dùng đông đảo khắp thế giới?</p>\r\n\r\n<h3><strong>Tập trung vào chất lượng hơn số lượng</strong></h3>\r\n\r\n<p>Khác với đa số các thương hiệu smartphone&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/danh-gia/tim-hieu-ve-he-dieu-hanh-android-35517\" target=\"_blank\">Android</a>&nbsp;trên thị trường, OnePlus chỉ tung ra một hoặc hai sản phẩm mới mỗi năm và dốc hết sức lực để hoàn thiện thiết bị một cách tối ưu nhất. Việc tung ra số ít model điện thoại không chỉ giúp OnePlus có nhiều thời gian phát triển máy mà còn tạo điều kiện tốt hơn cho việc hỗ trợ người dùng trong quá trình sử dụng về sau, giúp dòng OnePlus thu hút rất nhiều khách hàng trung thành.</p>\r\n\r\n<h3><strong>Sở hữu bộ giao diện người dùng xuất sắc</strong></h3>\r\n\r\n<p>Ngoài việc được hỗ trợ cập nhật phần mềm thường xuyên, OnePlus còn là dòng máy sở hữu bộ giao diện Android được đánh giá cao hàng đầu hiện nay. Bộ giao diện này có hai phiên bản, trong đó OxygenOS được phát triển độc quyền để cài đặt trên những chiếc smartphone OnePlus bán ra thị trường quốc tế, và HydrogenOS được thiết kế để cài đặt trên những chiếc điện thoại OnePlus phát hành tại thị trường nội địa.</p>\r\n\r\n<p>Phiên bản OxygenOS từ lâu đã được giới công nghệ đánh giá cao nhờ sự nhẹ nhàng, mượt mà và tính thân thiện đối với người sử dụng. Phiên bản mới nhất là OxygenOS 5.1.0 ra mắt cùng với Android Oreo 8.1 hiện đã được cập nhật cho OnePlus 5 và OnePlus 5T.</p>\r\n\r\n<h3><strong>Có ít tính năng, nhưng tất cả đều thiết thực và hữu dụng</strong></h3>\r\n\r\n<p>Hầu hết những chiếc smartphone mà OnePlus tung ra thị trường đều sở hữu cấu hình cực mạnh, xứng đáng với biệt danh “flagship killer” nhờ chạy chip Snapdragon phiên bản mới và bộ nhớ RAM mạnh mẽ vượt trội các đối thủ cùng phân khúc.</p>\r\n\r\n<p>Tuy nhiên,&nbsp;<a href=\"https://fptshop.com.vn/tim-kiem/oneplus/tin-tuc\" target=\"_blank\">OnePlus</a>&nbsp;lại khá bảo thủ trong việc đưa vào smartphone của họ những tính năng mới chưa được thử nghiệm thành công. Thương hiệu này không đi đầu trong việc đưa vào cảm biến vân tay, camera kép hay tính năng nhận diện khuôn mặt lên smartphone. Họ chỉ thực sự đưa một chức năng nào đó lên sản phẩm của mình sau khi đã kiểm nghiệm được tính hữu dụng của chức năng này.</p>\r\n', 'iP11pro.jpg', 1, '2018-05-31 01:38:15'),
(23, 'OPPO F17 và F17 Pro ra mắt: Màn hình đục lỗ, 4 camera vuông, sạc nhanh 30W', 'Theo OPPO, F17 Pro là smartphone có thiết kế \"mượt mà\" nhất năm 2020, đồng thời cũng là mẫu điện thoại mỏng và nhẹ nhất trong F-series', 'Sau khi ra mắt F15 vào đầu năm nay, OPPO mới đây vừa giới thiệu thêm hai mẫu smartphone mới thuộc dòng F tại Ấn Độ, có tên gọi là OPPO F17 và OPPO F17 Pro. Cả hai chiếc điện thoại này đều có màn hình đục lỗ, 4 camera xếp theo hình vuông ở mặt lưng và thiết kế tổng thể khá giống nhau.\r\nOPPO F17 Pro được quảng cáo là smartphone mỏng nhất và nhẹ nhất trong F-series. Nó nặng 164 gam và có độ dày 7.48mm, mặc dù đi kèm viên pin 4015mAh khá lớn.\r\n\r\nThiết bị sử dụng màn hình Super AMOLED có kích thước 6.43 inch, độ phân giải Full HD+ (2400 x 1080 pixel) và chiếm 90.7% diện tích mặt trước. Ngoài ra, máy cũng được tích hợp cảm biến vân tay dưới màn hình, có thể mở khóa chỉ trong vòng 0.3 giây.\r\n\r\nỞ bên trong, F17 Pro mang sức mạnh phần cứng đến từ vi xử lý Helio P95 của MediaTek, kết hợp với 8GB RAM và 128GB bộ nhớ chuẩn UFS 2.1. Mặt khác, nó cũng hỗ trợ mở rộng dung lượng lưu trữ bằng thẻ nhớ, tích hợp công nghệ HyperEngine để mang đến trải nghiệm chơi game tốt nhất cho người sử dụng.', 'IPAD.jpg', 1, '2020-09-03 02:56:12'),
(24, 'iPhone 11 là smartphone bán chạy nhất nửa đầu năm 2020, bỏ xa vị trí thứ hai', 'iPhone 11 mang đến nhiều cải tiến và có giá bán rẻ hơn đáng kể so với iPhone XR, do đó cũng không có gì quá ngạc nhiên khi chiếc điện thoại này là smartphone bán chạy nhất trong nửa đầu năm nay.', 'Yếu tố then chốt mang lại thành công cho iPhone 11 có lẽ chính là mức giá khởi điểm hấp dẫn của nó, rẻ hơn đến 50 USD so với iPhone XR, mặc dù được bổ sung thêm nhiều cải tiến đáng kể về phần cứng. Báo cáo từ Omdia cho rằng nhờ những cải tiến này, doanh số iPhone vẫn tăng mạnh vào năm 2020, bất chấp cuộc khủng hoảng từ đại dịch COVID-19 trên toàn cầu.\r\n\r\n\r\nMẫu smartphone phổ biến thứ hai trong năm 2020 là Galaxy A51 của Samsung (11.4 triệu chiếc được xuất xưởng), tiếp theo là Redmi Note 8 của Xiaomi (11 triệu chiếc) và Redmi Note 8 Pro (10.2 triệu chiếc).\r\n\r\nMột vài mẫu iPhone khác cũng lọt vào top 10 trong bảng xếp hạng, bao gồm iPhone SE 2020 ở vị trí thứ năm (xuất xưởng 8.7 triệu chiếc), tiếp đến là iPhone XR (8 triệu chiếc), iPhone 11 Pro Max (7.7 triệu chiếc) và cuối cùng là iPhone 11 Pro (6.7 triệu chiếc) ở vị trí thứ 10.', 'iphonexr2.jpg', 1, '2020-09-02 20:02:26'),
(25, 'Cận cảnh Galaxy Tab S7 : thiết kế sang trọng, màn hình 12.4 inch 120Hz, Snapdragon 865 giá 24 triệu đồng', 'Đây có thể được xem là mẫu tablet Android hoàn thiện và cao cấp nhất hiện nay.', 'Nằm trong hệ sinh thái công nghệ Galaxy vừa được ra mắt cách đây ít lâu, Samsung Galaxy Tab S7+ chính là mẫu máy tính bảng Android được xem là mạnh mẽ nhất hiện nay. Tablet này vẫn sở hữu thiết kế kim loại nguyên khối với 4 góc được bo tròn nhẹ nhàng cùng các cạnh phẳng cứng cáp mang tới dáng vẻ cao cấp sang trọng.\r\nVới độ dày chỉ khoảng 5.7mm và nặng 575g, Galaxy Tab S7+ cho cảm giác cầm nắm khá chắc chắn và đầm tay. Các cạnh viền đều được cắt vát kỹ càng tuy nhiên vẫn sẽ gây ra cảm giác hơi \"cấn\" khi sử dụng trong thời gian dài.', 'xsblack.jpg', 1, '2020-09-03 03:03:58'),
(26, 'Samsung ra mắt Galaxy Tab A7 (2020): Màn hình 10.4 inch, Snapdragon 662, 4 loa', 'Galaxy Tab A7 (2020) là mẫu máy tính bảng tầm trung mới nhất của Samsung, sở hữu màn hình lớn, pin khủng và nhiều tính năng phục vụ cho nhu cầu giải trí của người dùng.', 'Thị trường máy tính bảng năm nay đã vô tình được \"hồi sinh\" nhờ đại dịch COVID-19, trong đó nhu cầu làm việc, học tập và giải trí tại nhà đang ngày một tăng cao. Với mong muốn mang đến cho người dùng nhiều lựa chọn phong phú hơn, Samsung hôm nay vừa ra mắt một mẫu máy tính bảng tầm trung hoàn toàn mới, có tên gọi là Galaxy Tab A7 (2020).\r\nMẫu máy tính bảng mới của Samsung đi kèm viên pin 7040mAh nhưng không có sạc nhanh. Nó được trang bị camera 8MP ở mặt sau và camera 5MP ở mặt trước, cho phép mở khóa bằng khuôn mặt và đồng thời, đây cũng là tính năng bảo mật sinh trắc học duy nhất có trên thiết bị này. Ngoài ra, nó cũng hỗ trợ kết nối mạng LTE và được cài sẵn Android 10 với giao diện One UI 2.5 khi bán ra.', 'AppleWatch.jpg', 1, '2020-09-03 03:07:04'),
(27, 'iOS 13.7 chính thức: Phát hiện phơi nhiễm COVID-19 hoạt động độc lập, không cần tải ứng dụng bên thứ ba', 'Bản cập nhật iOS 13.7 mang tới một số thay đổi đáng chú ý liên quan tới tính năng phát hiện phơi nhiễm COVID-19.', 'Sau một thời gian ngắn phát hành phiên bản thử nghiệm dành cho lập trình viên, hôm nay, Apple đã chính thức tung ra phiên bản iOS 13.7 dành cho các thiết bị iPhone, iPad và iPod touch. Bản cập nhật mới nâng cấp tính năng thông báo phơi nhiễm COVID-19 khi có thể tự hoạt động mà không cần tới một ứng dụng bên thứ 3.Trước đó Apple và Google đã bắt tay hợp tác cùng nhau để công bố tính năng thông báo phơi nhiễm COVID-19 trên smartphone Android và iPhone. Hai công ty cho biết sẽ có hai giai đoạn trong quá trình phát triển công nghệ này. Giai đoạn đầu tiên xuất hiện lần đầu trên iOS 13.5, yêu cầu người dùng phải tải về một ứng dụng bên thứ 3 do địa phương nơi người đó sinh sống cung cấp để có thể kích hoạt tính năng thông báo phơi nhiễm.', 'vanchuyen.jpg', 1, '2020-09-03 03:08:24'),
(28, 'Realme X7 & X7 Pro ra mắt: Màn hình 120Hz, hỗ trợ 5G, camera 64MP, sạc nhanh 65W, giá từ 6.1 triệu đồng', '\r\nRealme X7 và X7 Pro là hai mẫu smartphone 5G mới nhất của Realme, sở hữu thông số kỹ thuật mạnh mẽ nhưng đi kèm giá bán cực kì phải chăng.', 'Hôm nay (1/9), Realme - thương hiệu phụ của OPPO vừa ra mắt dòng smartphone cận cao cấp Realme X7 tại Trung Quốc. Trong khi Realme X7 là smartphone chạy chip Dimensity 800U đầu tiên trên thế giới, Realme X7 Pro lại sử dụng con chip Dimensity 1000+ để cạnh tranh với Redmi K30 Ultra.Realme X7 được trang bị màn hình AMOLED 6.4 inch, độ phân giải Full HD+ và tỷ lệ khung hình 20:9. Màn hình của máy có tần số quét 120Hz, tốc độ lấy mẫu cảm ứng 180Hz và chiếm 90.8% diện tích mặt trước.\r\n\r\nĐối với Realme X7 Pro, chiếc điện thoại này sở hữu màn hình S-AMOLED 6.55 inch lớn hơn, tần số quét 120Hz và tốc độ lấy mẫu cảm ứng lên đến 240Hz. Ngoài ra, nó cũng có gam màu 100% DCI-P3 và tỷ lệ diện tích màn hình hiển thị so với mặt trước là 91.6%.\r\n\r\nỞ bên trong, cả Realme X7 và X7 Pro đều được trang bị RAM LPDDR4x lên đến 8GB và bộ nhớ UFS 2.1 lên đến 256GB. Bộ đôi smartphone mới của Realme được tích hợp cảm biến vân tay dưới màn hình, cài sẵn hệ điều hành Android 10 với giao diện Realme UI khi bán ra.', 'iphone11.jpg', 1, '2020-09-02 20:10:53'),
(29, 'Galaxy Z Fold2 phiên bản Thom Browne có giá lên tới 3299 USD, chỉ bán 5000 chiếc', 'Để có thể sở hữu phiên bản Thom Browne giới hạn không đụng hàng này, bạn sẽ phải bỏ ra tới hơn 3000 USD.', 'Hôm nay, tại sự kiện đặc biệt được Samsung tổ chức dành riêng để giới thiệu cho chiếc Galaxy Z Fold2 mới, bên cạnh công bố chi tiết cũng như giá bán của chiếc smartphone màn hình gập này, Samsung còn giới thiệu một phiên bản giới hạn đặc biệt của Galaxy Z Fold2 hợp tác cùng nhà thiết kế Thom Browne. Phiên bản lần này có mức giá cực kỳ đắt đỏ, lên tới 3299 USD.\r\n\r\nTất nhiên, giống với chiếc Galaxy Z Flip trước đó, Galaxy Z Fold2 bản Thom Browne lần này cũng đi kèm với một bộ sưu tập bao gồm một chiếc Galaxy Z Fold2, một chiếc Galaxy Watch3 và một chiếc Galaxy Buds Live, tất cả đều có thiết kế đặc trưng của nhà thiết kế Thom Browne, sử dụng tông màu xám và điểm nhấn là màu đỏ, trắng và xanh đậm.', 'promax_den.jpg', 1, '2020-09-03 03:10:03'),
(30, 'Samsung ra mắt Galaxy Z Fold2: Khắc phục nhiều vấn đề của thế hệ đầu tiên, riêng giá bán vẫn đắt đỏ', '\r\nKhông chỉ nâng cấp cấu hình và camera, phiên bản thứ hai của chiếc Galaxy Fold còn được Samsung cải thiện mạnh mẽ về thiết kế, bản lề, độ bền và công năng sử dụng.', 'Sau khi được \"nhá hàng\" lần đầu tại sự kiện hồi đầu tháng 8, mới đây, Samsung đã chính thức công bố chiếc Galaxy Z Fold2. Đây là phiên bản kế nhiệm của chiếc smartphone màn hình gập Galaxy Fold được Samsung ra mắt hồi năm ngoái.Galaxy Z Fold2 được sinh ra nhằm khắc phục những vấn đề lớn nhất của Galaxy Fold. Vậy, Samsung đã mang đến cho Galaxy Z Fold2 những nâng cấp gì?\r\n\r\nMàn hình nâng cấp toàn diện\r\n\r\nGalaxy Z Fold2 vẫn mang thiết kế cơ bản giống với thế hệ Galaxy Fold năm ngoái với một màn hình phụ nhỏ ở ngoài và màn hình gập lớn ở bên trong. Nếu như ở thế hệ Galaxy Fold đầu tiên, cả hai màn hình này đều có điểm trừ (màn hình ngoài quá nhỏ và viền dày, màn hình trong bị cắt khoét một phần \"tai thỏ\" cho camera), thì trên Z Fold2, những khiếm khuyết này đã được khắc phục triệt để.\r\n\r\nMàn hình phụ của máy có kích thước 6.2 inch, lớn hơn đáng kể và phần viền ở trên/dưới gần như đã được triệt tiêu. Kích thước màn hình phụ lớn hơn khiến cho nó không còn trở nên \"vô dụng\" như ở thế hệ đầu tiên, giúp cho người dùng có thể thực hiện nhanh một số tác vụ mà không cần thiết phải mở máy ra. ', 'promax_trang.jpg', 1, '2020-09-03 03:12:11'),
(31, 'Smartphone đầu tiên có camera selfie ẩn dưới màn hình ra mắt, nhưng không phải Vsmart Aris', 'ZTE chính thức trở thành nhà sản xuất đầu tiên thương mại hóa công nghệ camera ẩn dưới màn hình trên chiếc Axon 20 5G.', 'Sau một thời gian \"nhá hàng\" công nghệ camera ẩn dưới màn hình thì hôm nay (1/9), ZTE, thương hiệu smartphone tới từ Trung Quốc, đã chính thức cho ra mắt chiếc smartphone đầu tiên trên thế giới được trang bị công nghệ này: ZTE Axon 20 5G.Công nghệ camera ẩn dưới màn hình từ lâu đã được coi là một bước đi đột phá mới trong kỷ nguyên công nghệ đang dần trở nên bão hòa. Trước đó OPPO cũng đã từng thử nghiệm và trình diễn công nghệ này, tuy nhiên do thời điểm đó OPPO chưa thể hoàn thiện công nghệ này do một số hạn chế nhất định. Tới hôm nay, ZTE đã chính thức triển khai công nghệ camera ẩn trong màn hình trên một chiếc smartphone được thương mại hóa, trở thành nhà sản xuất đầu tiên trên thế giới đạt được cột mốc đáng chú ý này.', 'xsblack.jpg', 1, '2020-09-03 03:13:12'),
(32, 'Thị phần bị Xiaomi và Samsung \"gặm nhấm\", AirPods dần dần đi theo số phận của iPhone ngày trước', 'Một mặt, Apple đang mất dần chỗ đứng trước các đối thủ giá rẻ hơn trong cuộc chiến True Wireless. Mặt khác, Airpods vẫn còn tương lai vô cùng tươi sáng chờ đợi phía trước.', 'Kể từ khi ra mắt vào năm 2016, AirPods đã luôn được biết đến với vai trò là sản phẩm thống trị thị trường tai nghe True Wireless. Nhưng đến năm nay, vị thế ấy có vẻ đã bị bào mòn: theo số liệu của Counterpoint, thị phần của AirPods trong quý 2 vừa qua đã giảm chỉ còn 35%, thấp hơn hẳn so với mức 49% của năm 2019. Đáng ngạc nhiên hơn, điều này xảy ra khi AirPods vẫn chưa thoái trào: cũng theo Counterpoint, tổng doanh số AirPods năm nay sẽ tăng lên mức 82 triệu đơn vị, tăng mạnh so với mức 61 triệu của năm ngoái.\r\n\r\nTình cảnh của AirPods hiện tại gợi nhắc rất nhiều về những gì đã xảy ra với iPhone ngày trước. Ra mắt vào năm 2007, chiếc điện thoại này đã cách mạng hóa toàn bộ thị trường, xóa sổ toàn bộ các kiểu dáng đi trước và \"đồng hóa\" thế giới di động thành những thiết bị  mỏng nhẹ có 4 góc bo tròn. Sự xuất hiện của iPhone có thể coi là nguyên nhân trực tiếp dẫn đến cái chết của \"cục gạch\" Nokia và cỗ máy nhắn tin BlackBerry, cùng lúc truyền cảm hứng trực tiếp cho sự ra đời của Android.', 'iphonexr2.jpg', 1, '2020-09-03 03:16:00'),
(33, 'OnePlus 8T lộ diện: Thiết kế giữ nguyên, ra mắt trong tháng 9 này?', 'Không chỉ OnePlus 8T, một vài dòng sản phẩm tầm trung cũng được OnePlus lên lịch ra mắt trong thời gian tới.', 'OnePlus mỗi năm đều tung ra tới hai thế hệ flagship. Ở thời điểm hiện tại, tin đồn về bộ đôi OnePlus 8T và 8T Pro đã xuất hiện khá nhiều. Mới đây, một lập trình viên tại diễn đàn XDA-Developers đã \"mổ xẻ\" phiên bản beta 4 của hệ điều hành OxygenOS và tìm thấy những thông tin thú vị, bao gồm một hình ảnh render của chiếc OnePlus 8T.\r\n\r\nHình ảnh này thực chất là một tệp ảnh được tìm thấy trong ứng dụng Cài đặt của OnePlus với tên \"oneplus 8t.webp\". Hình ảnh này sẽ được hiển thị trong mục About Phone (Giới thiệu về điện thoại) với thông số cấu hình kèm theo. Tuy nhiên, chúng ta chưa thể chắc được liệu đây là hình ảnh thật của chiếc OnePlus 8T sắp ra mắt hay chỉ đơn thuần là một hình ảnh dùng để \"giữ chỗ\".', '11do2.jpg', 1, '2020-09-03 03:18:33'),
(34, 'Realme ra mắt smartphone 5G rẻ nhất thế giới: RAM 6GB, pin 5000mAh, giá chỉ 3.4 triệu', 'Chỉ với hơn 3 triệu đồng, người dùng đã có thể sở hữu một chiếc smartphone có hỗ trợ mạng 5G', 'Ở thời điểm hiện tại, công nghệ mạng 5G mới chỉ được trang bị lên các dòng sản phẩm tầm trung hoặc cao cấp có mức giá cao. Tuy nhiên, Realme mới đây đã cho ra mắt một chiếc smartphone mới có tên Realme V3, mức giá của sản phẩm này chỉ hơn 3 triệu đồng, nhưng lại hỗ trợ cả mạng 5G và có thông số cấu hình tương đối hấp dẫn.Realme V3 có thiết kế bằng nhựa khá quen thuộc với các dòng sản phẩm Realme gần đây. Máy được trang bị một màn hình \"giọt nước\" kích thước lớn 6.5 inch, sử dụng tấm nền LCD IPS và có độ phân giải dừng ở mức HD+ (720 x 1600). Realme cho biết màn hình này có diện tích hiển thị so với mặt trước chiếm 88.7%.\r\n\r\nMặt lưng của máy nổi bật với cụm 3 camera chính được đặt trong một mô-đun hình vuông. Cụm camera này bao gồm một camera góc rộng 13MP f/2.2, một camera macro 2MP (khoảng cách lấy nét 4cm) và một camera 2MP đo chiều sâu, không có camera tele và camera góc siêu rộng. Cụm camera này có khả năng quay 1080p ở 60fps và 720p ở 120fps (chuyển động chậm). Ngoài ra, Realme V3 cũng có thêm một camera selfie 8MP ở mặt trước.', 'ip11vang.jpg', 1, '2020-09-03 03:19:25'),
(35, 'Samsung ra mắt Galaxy Tab S7 và S7+ tại VN, giá từ 19 triệu đồng', '\r\nBộ đôi Galaxy Tab S7 mới mang tới nhiều nâng cấp về màn hình, hiệu năng và bút S Pen.\r\n', 'Hôm nay (1/9), Samsung chính thức cho ra mắt bộ đôi Galaxy Tab S7 và S7+ với bút S Pen thế hệ mới tại thị trường Việt Nam. Đây là hai mẫu máy tính bảng cao cấp tiếp theo kế nhiệm cho dòng Tab S6 trước đó của Samsung.\r\n\r\nBộ đôi Galaxy Tab S7 sở hữu thiết kế được nâng cấp từ phiên bản Tab S6 từng được nhiều người dùng đánh giá cao. Máy được hoàn thiện hoàn toàn từ chất liệu kim loại cao cao cấp. Thiết kế màn hình với các viền bezel được làm mỏng mang tới trải nghiệm sử dụng tốt hơn', 'iphone11.jpg', 1, '2020-09-03 03:21:00'),
(36, 'Hé lộ bằng sáng smartphone màn hình gập với cơ chế gập ra ngoài vô cùng độc đáo của Oppo', '\r\nMột bằng sáng chế mới liên quan đến smartphone màn hình gập của Oppo đang mở ra những cách tiếp cận mới đầy thú vị với xu hướng này của ngành công nghiệp di động', 'Trong cuộc đua trên thị trường smartphone màn hình gập, Samsung đang dẫn đầu khi cho ra mắt Galaxy Fold và Galaxy Z Fold và mới đây nhất là Galaxy Z Fold 2. Huawei cũng có dòng Mate X với màn hình gập ra ngoài. Một model khác là Moto Razr cũng sở hữu thiết kế vỏ sò. Trong khi đó các hãng smartphone Trung Quốc khác như Oppo, Xiaomi cũng được cho đang nghiên cứu smartphone màn hình gập.\r\n\r\nSự khác biệt trong ý tưởng của Oppo so với hầu hết các hãng là smartphone màn hình gập ra ngoài theo chiều ngang thay vì chiều dọc như truyền thống.\r\n\r\nTheo tiết lộ từ trang LetsGoDigital, Văn phòng Sở hữu trí tuệ thế giới (WIPO) mới đây đã cấp bằng sáng chế về một chiếc smartphone màn hình gập mới cho Oppo.\r\n\r\nBằng sáng chế mô tả một thiết kế độc đáo trên chiếc smartphone màn hình cong này. Không giống như Galaxy Z Flip và Motorola Razr, màn hình uốn cong của nó hướng ra ngoài và gập theo chiều ngang.', 'promax_den.jpg', 1, '2020-09-03 03:21:52'),
(37, '“Ông đồng” Ming-Chi Kuo cho rằng Huawei có thể sẽ phải rút lui khỏi thị trường smartphone', 'Trường hợp tốt nhất là thị phần của Huawei sẽ sụt giảm, còn trường hợp xấu nhất là Huawei sẽ phải rút lui khỏi thị trường smartphone.', 'Theo chuyên gia phân tích Ming-Chi Kuo, người được mệnh danh là “ông đồng” với những nhận định và dự đoán rất chính xác về các sản phẩm sắp ra mắt của Apple, Huawei có thể sẽ sụp đổ và phải rút lui khỏi thị trường smartphone, nếu như mọi chuyện tiếp tục diễn ra theo chiều hướng xấu hơn.\r\n\r\nMỹ đã bắt đầu nhắm vào Huawei từ năm ngoái. Bắt đầu với việc đưa Huawei vào danh sách thực thể, dẫn đến việc không thể hợp tác với các công ty công nghệ của Mỹ như Google. Cũng vì vậy, smartphone của Huawei không thể cài đặt các ứng dụng và dịch vụ quen thuộc của Google.', 'IPAD.jpg', 1, '2020-09-03 03:22:54'),
(38, 'OPPO vượt mặt Samsung để trở thành nhà sản xuất smartphone số 1 tại Đông Nam Á', 'Sự thay đổi vị thế lần này của các hãng smartphone tại thị trường Đông Nam Á một phần do ảnh hưởng của đại dịch COVID-19.', 'OPPO mới đây đã chính thức vượt mặt Samsung để trở thành nhà sản xuất smartphone phổ biến nhất thị trường Đông Nam Á trong Quý 2/2020.\r\n\r\nCụ thể, theo thống kê từ công ty nghiên cứu thị trường Counterpoint Research, OPPO dẫn đầu danh sách với thị phần smartphone cao nhất, chiếm tới 20.3%. Kế đến là Samsung đứng ở vị trí thứ 2. Nhà sản xuất tới từ xứ sở kim chi có thị phần ở mức 19.5% theo ngay sát OPPO. Ở vị trí thứ 3 là Vivo với 17.9% thị phần, Xiaomi ở vị trí thứ 4 với 14% thị phần và Realme với 12.8% thị phần đứng ở vị trí thứ 5. Như vậy là trong top 5 thương hiệu smartphone phổ biến nhất khu vực Đông Nam Á, có tới 4 trên 5 thương hiệu là những cái tên tới từ Trung Quốc.\r\n\r\n', 'xsblack.jpg', 1, '2020-09-03 03:23:10'),
(39, 'Nhìn lại Kin: tưởng là át chủ bài của Microsoft và Verizon nhưng bị khai tử chỉ sau 48 ngày, rồi hồi sinh và khai tử lần nữa', 'Nếu nói rằng sự ra mắt của Microsoft Kin diễn ra không tốt thì sẽ là một cách nói quá nhẹ. Thảm họa thì đúng hơn.', 'Andy Rubin được nhiều người biết đến như là “cha đẻ của Android\", hay người tạo ra chiếc Essential Phone và có nhiều “scandal\". Tuy nhiên, có thể bạn không biết ngoài Essential thì Andy Rubin còn từng thành lập một công ty khác, là Danger Hiptop và công ty này từng tạo ra chiếc Sidekick cho T-Mobile. Điều này xảy ra còn trước khi Rubin tạo ra công ty Android Inc. và sau này được Google mua lại.Vài năm sau khi Rubin rời khỏi Danger, công ty được Microsoft tiếp nhận, gã khổng lồ phần mềm này cũng đang tìm kiếm hệ điều hành điện thoại thông minh lớn tiếp theo kể từ khi Windows Mobile lụi tàn.', 'vanchuyen.jpg', 1, '2020-09-03 03:24:29'),
(40, 'Xiaomi tìm thấy hai chìa khóa thành công mới: Những chiếc Mi đắt đỏ, và... Huawei', '\r\nNhững tưởng sẽ phải chịu ảnh hưởng nặng nề từ dịch bệnh, Xiaomi lại vừa ghi nhận kết quả rất đáng khich lệ trong 6 tháng đầu năm.', 'Cũng giống như các thương hiệu khác, Xiaomi đã phải đối mặt với nhiều khó khăn do Covid-19 gây ra. Các cửa hàng Mi Store và Mi Home trên toàn cầu phải sớm đóng cửa, sản xuất bị đình trệ, mẫu đầu bảng mới nhất của hãng này là Mi 10 đã phải ra mắt trực tuyến thay vì tại sự kiện riêng. Trong quý 2, lượng smartphone xuất xưởng cũng giảm 3 triệu máy, còn 28 triệu đơn vị.\r\n\r\nNhưng đứng trước nghịch cảnh này, Xiaomi vừa qua đã công bố kết quả kinh doanh vô cùng tươi sáng cho 6 tháng đầu năm. Cổ phiếu của Tiểu Mễ cũng liên tục lên giá, thể hiện lòng tin ngày một vững chắc của các nhà đầu tư. Vậy, giữa muôn trùng khó khăn - thậm chí lượng điện thoại bán ra cũng giảm, đâu là chìa khóa thành công của \"Apple Trung Quốc\"?', 'promax_trang.jpg', 1, '2020-09-03 03:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `ordere`
--

CREATE TABLE `ordere` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `transaction_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordere`
--

INSERT INTO `ordere` (`id`, `product_id`, `quantity`, `name`, `price`, `image`, `amount`, `transaction_id`, `created_at`) VALUES
(1, 18, 1, 'Iphone8 Plus', 11815000, 'iphone8.jpg', 11815000, 3, '2020-10-02 05:48:48'),
(2, 18, 5, 'Iphone8 Plus', 11815000, 'iphone8.jpg', 59075000, 4, '2020-10-02 06:00:50'),
(4, 22, 1, 'Iphone 11 Lock', 11519200, 'iP11proden.jpg', 11519200, 6, '2020-10-02 11:40:12'),
(5, 22, 1, 'Iphone 11 Lock', 11519200, 'iP11proden.jpg', 11519200, 7, '2020-10-05 07:15:27'),
(6, 22, 1, 'Iphone 11 Lock', 11519200, 'iP11proden.jpg', 11519200, 8, '2020-10-07 05:42:47'),
(7, 22, 1, 'Iphone 11 Lock', 11519200, 'iP11proden.jpg', 11519200, 9, '2020-10-07 05:46:15'),
(8, 15, 1, 'Iphone6 Plus Quốc Tế', 3240000, 'iphone6s.jpg', 3240000, 10, '2020-10-07 05:46:36'),
(9, 19, 1, 'Iphone11 Pro Max Lock', 13992000, 'iP11lock.jpg', 13992000, 11, '2020-10-09 11:24:16'),
(10, 18, 1, 'Iphone8 Plus', 11815000, 'iphone8.jpg', 11815000, 12, '2020-10-09 11:25:53'),
(11, 19, 1, 'Iphone11 Pro Max Lock', 13992000, 'iP11lock.jpg', 13992000, 13, '2020-10-09 11:28:30'),
(12, 14, 1, 'Iphone XS Max Quốc Tế', 11250000, 'IPXSMaxQT.jpg', 11250000, 14, '2020-10-09 11:29:00'),
(13, 14, 1, 'Iphone XS Max Quốc Tế', 11250000, 'IPXSMaxQT.jpg', 11250000, 15, '2020-10-09 11:30:42'),
(14, 19, 1, 'Iphone11 Pro Max Lock', 13992000, 'iP11lock.jpg', 13992000, 16, '2020-10-14 02:07:46'),
(15, 18, 1, 'Iphone8 Plus', 11815000, 'iphone8.jpg', 11815000, 17, '2020-10-14 03:25:26'),
(16, 14, 1, 'Iphone XS Max Quốc Tế', 11250000, 'IPXSMaxQT.jpg', 11250000, 18, '2020-10-14 04:53:54'),
(17, 22, 1, 'Iphone 11 Lock', 11519200, 'iP11proden.jpg', 11519200, 19, '2020-10-14 10:13:52'),
(18, 14, 1, 'Iphone XS Max Quốc Tế', 11250000, 'IPXSMaxQT.jpg', 11250000, 19, '2020-10-14 10:13:52'),
(19, 42, 1, 'Iphone 11 Pro Max White 256GB', 17100000, 'promax_trang.jpg', 17100000, 20, '2020-11-04 16:39:08'),
(20, 29, 1, 'Iphone 11 Pro Quốc Tế', 15750000, 'iP11pro.jpg', 15750000, 21, '2020-11-04 16:57:56'),
(21, 19, 1, 'Iphone 11 Pro Max Lock Red 64GB', 13992000, 'iP11lock.jpg', 13992000, 22, '2020-11-05 14:25:11'),
(22, 18, 1, 'Iphone 8 Plus Black 64GB', 11815000, 'iphone8.jpg', 11815000, 23, '2020-11-05 16:13:57'),
(23, 19, 3, 'Iphone 11 Pro Max Lock Red 64GB', 13992000, 'iP11lock.jpg', 41976000, 24, '2020-11-06 12:42:31'),
(24, 16, 1, 'Iphone 6 QT Pink 32GB', 2700000, 'iphone6Sqt.jpg', 2700000, 25, '2020-11-12 15:29:01'),
(25, 14, 1, 'Iphone XS Max QT White 256GB', 11250000, 'ipxsmax.jpg', 11250000, 26, '2020-11-12 15:36:06'),
(26, 14, 1, 'Iphone XS Max QT White 256GB', 11250000, 'ipxsmax.jpg', 11250000, 27, '2020-11-12 15:36:36'),
(27, 17, 1, 'Iphone 7 QT Black 32GB', 3330000, 'iphone7.jpg', 3330000, 28, '2020-11-12 15:37:39'),
(28, 19, 1, 'Iphone 11 Pro Max Lock Red 64GB', 13992000, 'iP11lock.jpg', 13992000, 28, '2020-11-12 15:37:39'),
(29, 15, 2, 'Iphone 6s Plus QT White 32GB', 3240000, 'iphone6s.jpg', 6480000, 29, '2020-11-18 02:38:06'),
(30, 17, 1, 'Iphone 7 QT Black 32GB', 3330000, 'iphone7.jpg', 3330000, 30, '2020-11-18 02:39:32'),
(31, 21, 1, 'Iphone X QT Black 64GB', 9531000, 'iphoneXden.jpg', 9531000, 31, '2020-11-18 05:30:56'),
(32, 15, 1, 'Iphone 6s Plus QT White 32GB', 3240000, 'iphone6s.jpg', 3240000, 32, '2020-11-18 06:18:13'),
(33, 16, 1, 'Iphone 6 QT Pink 32GB', 2700000, 'iphone6Sqt.jpg', 2700000, 33, '2020-11-18 06:21:57'),
(34, 17, 1, 'Iphone 7 QT Black 32GB', 3330000, 'iphone7.jpg', 3330000, 34, '2020-11-18 06:23:06'),
(35, 18, 1, 'Iphone 8 Plus Black 64GB', 11815000, 'iphone8.jpg', 11815000, 35, '2020-11-18 06:24:34'),
(36, 29, 2, 'Iphone 11 Pro Quốc Tế', 15750000, 'iP11pro.jpg', 31500000, 36, '2020-12-02 06:15:41'),
(37, 15, 1, 'Iphone 6s Plus QT White 32GB', 3240000, 'iphone6s.jpg', 3240000, 37, '2020-12-02 06:16:25'),
(38, 22, 1, 'Iphone 11 Lock Black 256GB', 11519200, 'iP11proden.jpg', 11519200, 37, '2020-12-02 06:16:25'),
(39, 19, 1, 'Iphone 11 Pro Max Lock Red 64GB', 13992000, 'iP11lock.jpg', 13992000, 38, '2020-12-02 06:30:55'),
(40, 16, 1, 'Iphone 6 QT Pink 32GB', 2700000, 'iphone6Sqt.jpg', 2700000, 38, '2020-12-02 06:30:55'),
(41, 21, 1, 'Iphone X QT Black 64GB', 9531000, 'iphoneXden.jpg', 9531000, 39, '2020-12-03 08:41:10'),
(42, 17, 1, 'Iphone 7 QT Black 32GB', 3330000, 'iphone7.jpg', 3330000, 39, '2020-12-03 08:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `quantity` int(11) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT NULL,
  `buyed` int(5) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `display` varchar(100) DEFAULT NULL,
  `ram` varchar(11) DEFAULT NULL,
  `rom` varchar(11) DEFAULT NULL,
  `cpu` varchar(200) DEFAULT NULL,
  `camera_front` varchar(50) DEFAULT NULL,
  `rear_camera` varchar(50) DEFAULT NULL,
  `operating_system` varchar(100) DEFAULT NULL,
  `graphics_chip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `sale`, `category_id`, `content`, `quantity`, `hot`, `buyed`, `avatar`, `status`, `created_at`, `display`, `ram`, `rom`, `cpu`, `camera_front`, `rear_camera`, `operating_system`, `graphics_chip`) VALUES
(14, 'Iphone XS Max QT White 256GB', 12500000, 10, 18, 'Nổi bật với chip A12 Bionic mạnh mẽ, màn hình rộng đến 6.5 inch, cùng camera kép trí tuệ nhân tạo và Face ID được nâng cấp.', 20, 1, 3, 'IPXSMaxQT.jpg', 1, '2020-08-28 12:44:05', '	6.5 inchs, 1242 x 2688 Pixels', '	4 GB', '256GB', 'Apple A12 Bionic, 6, Đang cập nhật', '	7.0 MP', '	12.0 MP', '	iOS 12', 'Apple GPU 4 nhân'),
(15, 'Iphone 6s Plus QT White 32GB', 3600000, 10, 25, 'Được đổi mới mạnh mẽ về thiết kế, cấu hình cùng một màn hình kích thước lớn đi cùng mang đến nhiều thích thú hơn trong sử dụng', 17, 1, NULL, 'iphone6s.jpg', 1, '2020-08-28 17:04:50', '	5.5 inchs, IPS LCD Full HD (1080 x 1920 Pixels)', '2 GB', '32GB', 'Apple A9 2 nhân 64-bit, 1.8 GHz', '	5.0 MP', '12.0 MP', 'iOS 12', 'PowerVR GT7600'),
(16, 'Iphone 6 QT Pink 32GB', 3000000, 10, 24, '- Iphone 6 quốc tế bản chính hãng apple\r\n- Vân tay đầy đủ, rất nhạy\r\n- Máy hình thức rất đẹp không một lỗi lầm\r\n- Đủ Màu xám/vàng/trắng bạn muốn chọn màu ghi ở lưu ý hoặc inbox cho shop.', 20, 0, NULL, 'iphone6Sqt.jpg', 1, '2020-08-28 17:04:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Iphone 7 QT Black 32GB', 3700000, 10, 22, 'Máy có ngoại hình rất mới và trải nghiệm ổn định tại Việt Nam. Sản phẩm được bán ra tại Di Động Việt, bảo hành 6 tháng và hỗ trợ 1 đổi 1 cùng nhiều chính sách mua hàng ưu đãi khác.', 19, 0, NULL, 'iphone7.jpg', 1, '2020-08-29 02:10:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Iphone 8 Plus Black 64GB', 13900000, 15, 21, 'iPhone 8 Series giữ nguyên hoàn toàn những đường nét thiết kế đã hoàn thiện từ thế hệ trước nhưng sử dụng phong cách 2 mặt kính cường lực kết hợp bộ khung kim loại', 10, 1, 4, 'iphone8.jpg', 1, '2020-08-29 02:14:19', '	5.5 inches, 1080 x 1920 pixels', '3 GB', '64 GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', '	iOS 11', 'Apple GPU 3 nhân'),
(19, 'Iphone 11 Pro Max Lock Red 64GB', 15900000, 12, 15, 'Chiếc iPhone mạnh mẽ nhất, lớn nhất, thời lượng pin tốt nhất đã xuất hiện. iPhone 11 Pro Max chắc chắn là chiếc điện thoại mà ai cũng ao ước khi sở hữu những tính năng xuất sắc nhất, đặc biệt là camera và pin.\r\n\r\n', 10, 1, 5, 'iP11lock.jpg', 1, '2020-08-29 02:17:34', 'Super Retina XDR 6.5 inchs, 1242 x 2688 Pixels', '	6 GB', '64 GB', '	Apple A13 Bionic, 6, Đang cập nhật', '12.0 MP ', '	12.0 MP (4K 60fps)', '	iOS 13', 'Apple GPU 4 nhân'),
(20, 'Iphone XS Max QT 64GB White', 12800000, 10, 6, 'Xs Max sử dụng thép không gỉ và hợp kim được thiết kế tùy chỉnh đặc biệt để tạo ra các dải cấu trúc. Với mặt kính bền, điện thoại thông minh này cũng cung cấp khả năng chống nước và bụi đáng kể. Mặt lưng bằng kính của nó cũng cho phép điện thoại sạc không dây.', 10, 1, 9, 'IPXSMaxQT.jpg', 1, '2020-08-29 02:30:10', '6.5 inchs, 1242 x 2688 Pixels', '	4 GB', '64GB', 'Apple A12 Bionic, 6, Đang cập nhật', '7.0 MP', '12.0 MP', 'iOS 12', 'Apple GPU 4 nhân'),
(21, 'Iphone X QT Black 64GB', 10590000, 10, 16, 'Có màn hình 5,8inch sắc nét, thiết kế tai thỏ thời thượng, camera kép chất lượng cao và con chip Apple A11 mạnh mẽ, tiết kiệm điện năng. iPhone X  phù hợp với người dùng cần một smartphone thương hiệu lớn, vóc dáng vừa phải, cấu hình hàng đầu và chụp ảnh đẹp', 10, 1, 12, 'iphoneXden.jpg', 1, '2020-08-29 02:36:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Iphone 11 Lock Black 256GB', 13090000, 12, 13, 'Apple iPhone Lock 11 với 6 phiên bản màu sắc. Camera có khả năng chụp ảnh vượt trội, thời lượng pin cực dài và bộ vi xử lý mạnh nhất từ trước đến nay. Mang đến trải nghiệm tuyệt vời dành cho bạn', 10, 1, 13, 'iP11proden.jpg', 1, '2020-08-29 02:45:46', '	Liquid Retina 6.1 inchs, 828 x 1792 Pixels', '4 GB', '	256 GB', 'Apple A13 Bionic, 6, Đang cập nhật', '12.0 MP (4K 60fps) Slo-motion', '12.0 MP (4K 60fps)', 'iOS 13', 'Apple GPU 4 nhân'),
(23, 'Iphone 11 Quốc Tế', 11000000, 10, 16, 'Chiếc iPhone 11 với khung máy được làm bằng nhôm và kính, thiết kế màn hình ‘tai thỏ’ LCD 6.1 inch (Liquid Retina) quen thuộc, cụm camera kép được đặt trong khung vuông giúp máy trông cao cấp và sang trọng hơn. Tuy nhiên nếu bạn không thích thiết kế cụm camera nằm trong khung vuông thì hẳn rằng, sẽ không có mẫu iPhone 11 nào có thể hấp dẫn bạn qua vẻ bề ngoài.', 10, 0, 5, 'iphone11den.jpg', 1, '2020-08-29 02:50:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'IPAD 10.2 2019 Wi-Fi 32GB', 8600000, 10, 10, 'Về mặt thiết kế, mẫu iPad 10.2 inch không có nhiều điểm mới so với các dòng iPad tiền nhiệm, tuy nhiên phần khung của máy được làm từ kim loại nhôm tái chế để thân thiện hơn với môi trường. Các chi tiết máy được hoàn thiện rất tỷ mỷ và chau chuốt, các góc cạnh được bo rất tinh tế mang lại sử sang trọng và đẳng cấp cho chiếc iPad này.', 10, 0, 8, 'IPADapple.jpg', 1, '2020-08-29 03:07:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Apple Watch', 8990000, 10, 11, 'Đồng hồ thông minh Apple Watch S3 LTE 38mm viền nhôm dây cao su mang đến người dùng những đường nét thiết kế hoàn hảo, khả năng hỗ trợ tập luyện thể thao cũng như nhiều tiện ích chăm sóc sức khỏe cũng được tích hợp trong chiếc smartwatch này.', 10, 1, 8, 'AppleWatch.jpg', 1, '2020-08-29 03:16:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Airpods', 4190000, 10, 12, 'Thế hệ thứ 2 lần này không có nhiều sự khác biệt so với thế hệ đầu về ngoại hình, trừ một số chi tiết về đèn báo hiệu cũng như ra mắt thêm phiên bản sạc không dây và sạc thường (sạc có dây). Ngoài ra, bạn có thể tham khảo thêm Apple Airpods 3, sắp được ra mắt trong thời gian tới.', 10, 0, 7, 'Airpods1.jpg', 1, '2020-08-29 03:25:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Iphone 8 Lock', 8900000, 10, 7, 'iPhone 8 Series giữ nguyên hoàn toàn những đường nét thiết kế đã hoàn thiện từ thế hệ trước nhưng sử dụng phong cách 2 mặt kính cường lực kết hợp bộ khung kim loại', 10, 0, NULL, 'Iphone8PsQt.jpg', 1, '2020-08-29 03:25:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'ip X Lock White 64GB', 10250000, 10, 16, 'Có màn hình 5,8inch sắc nét, thiết kế tai thỏ thời thượng, camera kép chất lượng cao và con chip Apple A11 mạnh mẽ, tiết kiệm điện năng. iPhone X  phù hợp với người dùng cần một smartphone thương hiệu lớn, vóc dáng vừa phải, cấu hình hàng đầu và chụp ảnh đẹp', 10, 0, NULL, 'IphoneXtrang.jpg', 1, '2020-08-29 03:25:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Iphone 11 Pro Quốc Tế', 17500000, 10, 14, 'Apple iPhone 11 Pro với 6 phiên bản màu sắc. Camera có khả năng chụp ảnh vượt trội, thời lượng pin cực dài và bộ vi xử lý mạnh nhất từ trước đến nay. Mang đến trải nghiệm tuyệt vời dành cho bạn', 10, 0, NULL, 'iP11pro.jpg', 1, '2020-08-29 03:25:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Iphone XS Lock Gold 64GB', 10500000, 10, 17, 'Xs sử dụng thép không gỉ và hợp kim được thiết kế tùy chỉnh đặc biệt để tạo ra các dải cấu trúc. Với mặt kính bền, điện thoại thông minh này cũng cung cấp khả năng chống nước và bụi đáng kể. Mặt lưng bằng kính của nó cũng cho phép điện thoại sạc không dây.', 10, 0, NULL, 'iPXSvang.jpg', 1, '2020-08-29 02:30:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Iphone XR Lock Yellow 64GB', 9200000, 10, 19, 'Iphone XR  không có nhiều sự khác biệt so với thế hệ đầu về ngoại hình, trừ một số chi tiết về đèn báo hiệu cũng như ra mắt thêm phiên bản sạc không dây và sạc thường (sạc có dây). Ngoài ra, bạn có thể tham khảo thêm Apple Airpods 3, sắp được ra mắt trong thời gian tới.', 10, 0, NULL, 'Iphonexr.jpg', 1, '2020-08-29 03:25:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Iphone 8 Quốc Tế', 6170000, 10, 20, 'Iphone 8 không có nhiều sự khác biệt so với thế hệ đầu về ngoại hình, trừ một số chi tiết về đèn báo hiệu cũng như ra mắt thêm phiên bản sạc không dây và sạc thường (sạc có dây). Ngoài ra, bạn có thể tham khảo thêm Apple Airpods 3, sắp được ra mắt trong thời gian tới.', 10, 0, NULL, 'Iphone8PsQt.jpg', 1, '2020-08-29 03:25:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Iphone 7 Lock', 4200000, 10, 22, 'Máy có ngoại hình rất mới và trải nghiệm ổn định tại Việt Nam. Sản phẩm được bán ra tại Di Động Việt, bảo hành 6 tháng và hỗ trợ 1 đổi 1 cùng nhiều chính sách mua hàng ưu đãi khác.', 19, 0, NULL, 'iphone7.jpg', 1, '2020-08-29 02:10:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'iphone Pro Max Black 64GB', 18000000, 8, 15, '<p>test</p>\r\n', 3, 0, NULL, 'promax_den.jpg', 1, '2020-10-28 16:36:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'iphone 11 white 64GB', 13000000, 5, 13, '<p>test</p>\r\n', 2, 1, NULL, '11_trang.jpg', 1, '2020-10-28 17:42:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Iphone 11 Pro Max White 256GB', 19000000, 10, 15, '<p>test</p>\r\n', 5, 1, NULL, 'promax_trang.jpg', NULL, '2020-11-03 14:19:27', '	Super Retina XDR 6.5 inchs, 1242 x 2688 Pixels', '6 GB', '	64 GB', '	Apple A13 Bionic, 6, Đang cập nhật', '12.0 MP ', '	12.0 MP (4K 60fps)\r\n', 'iOS 13', 'Apple GPU 4 nhân'),
(43, 'Iphone 8 Plus QT Red 64GB', 7400000, 5, 21, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 4, 0, NULL, '8_do.jpg', NULL, '2020-11-05 09:11:03', '5.5 inches, 1080 x 1920 pixels', NULL, '64 GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(44, 'Iphone 8 Plus  Lock Red 64GB', 5400000, 5, 21, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 4, 0, NULL, '8_do.jpg', NULL, '2020-11-05 09:14:54', '5.5 inches, 1080 x 1920 pixels', NULL, '64 GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(45, 'Iphone 7  Plus QT Black 64GB', 6000000, 0, 23, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 5, 0, NULL, '7_den.jpg', NULL, '2020-11-05 09:20:18', '5.5 inches, 1080 x 1920 pixels', NULL, '64 GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(46, 'Iphone 7 Plus QT Gold 64GB', 6000000, 5, 23, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 5, 0, NULL, '7_vang.jpg', NULL, '2020-11-05 09:23:53', '5.5 inches, 1080 x 1920 pixels', NULL, '64 GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(50, 'Iphone  7 QT Pink 64GB', 4000000, 5, 22, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 5, 0, NULL, '7_hong.jpg', NULL, '2020-11-05 09:38:53', '5.5 inches, 1080 x 1920 pixels', '3 GB', '64 GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(51, 'Iphone  7 Lock Pink 64GB', 3000000, 5, 22, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 5, 0, NULL, '7_hong.jpg', NULL, '2020-11-05 09:40:31', '5.5 inches, 1080 x 1920 pixels', '3 GB', '64 GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(53, 'Iphone  6 Lock Pink 32GB', 2000000, 5, 24, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 5, 0, NULL, '7_hong.jpg', NULL, '2020-11-05 09:53:24', '5.5 inches, 1080 x 1920 pixels', '3 GB', '32GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(54, 'Iphone  6 Plus QT Pink 32GB', 2600000, 5, 25, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 5, 0, NULL, '7_hong.jpg', NULL, '2020-11-05 09:54:57', '5.5 inches, 1080 x 1920 pixels', '3 GB', '32GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(55, 'Iphone  6 Plus QT Gold 32GB', 2600000, 5, 25, '<p><strong><ins><var>Gía máy Likenew 99%:&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành cao nhất</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Full phụ kiện: sạc, cáp cao cấp&nbsp;(bảo hành 6&nbsp;tháng)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí trọn đời. Tặng ốp silicon</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n\r\n<p>✔&nbsp;Với máy Lock hỗ trợ lắp sim ghép&nbsp;lên Quốc tế miễn phí</p>\r\n', 5, 0, NULL, '7_vang.jpg', NULL, '2020-11-05 09:59:08', '5.5 inches, 1080 x 1920 pixels', '3 GB', '32GB', 'Apple A11 Bionic 6 nhân, 2.1 GHz', '7.0 MP', '12.0 MP', 'iOS 11', '	Apple GPU 3 nhân'),
(56, 'iPad Pro 2017 9.7 inchs  Gold 32GB', 7990000, 5, 10, '<p><ins><var>Máy tính bảng&nbsp;iPad&nbsp;Likenew 99%:&nbsp;được cập nhật giá&nbsp;24/24&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành:</var></ins></p>\r\n\r\n<p>✔&nbsp;Bảo hành 6&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n', 4, 0, NULL, 'ipad_gold.jpg', NULL, '2020-11-05 10:05:37', 'Retina IPS 9.7 inchs,  (2048 x 1536 pixels)', '2 GB', '32 GB', 'Apple A9X 2 nhân 64-bit, 2.16 GHz', '5 MP', '12.0 MP Full HD 1080p@30fps', 'iOS 12', '	PowerVR Series 7'),
(57, 'iPad Pro 2017 9.7 inchs  BLack 32GB', 7990000, 5, 10, '<p><ins><var>Máy tính bảng&nbsp;iPad&nbsp;Likenew 99%:&nbsp;được cập nhật giá&nbsp;24/24&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành:</var></ins></p>\r\n\r\n<p>✔&nbsp;Bảo hành 6&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n', 4, 0, NULL, 'ipad_grey.jpg', NULL, '2020-11-05 10:07:43', 'Retina IPS 9.7 inchs,  (2048 x 1536 pixels)', '2 GB', '32 GB', 'Apple A9X 2 nhân 64-bit, 2.16 GHz', '5 MP', '12.0 MP Full HD 1080p@30fps', 'iOS 12', '	PowerVR Series 7'),
(58, 'iPad Pro 2017 9.7 inchs  BLack 32GB', 7990000, 5, 10, '<p><ins><var>Máy tính bảng&nbsp;iPad&nbsp;Likenew 99%:&nbsp;được cập nhật giá&nbsp;24/24&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành:</var></ins></p>\r\n\r\n<p>✔&nbsp;Bảo hành 6&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n', 4, 0, NULL, 'ipad_grey.jpg', NULL, '2020-11-05 12:37:47', 'Retina IPS 9.7 inchs,  (2048 x 1536 pixels)', '2 GB', '32 GB', 'Apple A9X 2 nhân 64-bit, 2.16 GHz', '5 MP', '12.0 MP Full HD 1080p@30fps', 'iOS 12', '	PowerVR Series 7'),
(59, 'iPad 2018 9.7 inchs  Grey 32GB', 8990000, 5, 10, '<p><ins><var>Máy tính bảng&nbsp;iPad&nbsp;Likenew 99%:&nbsp;được cập nhật giá&nbsp;24/24&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành:</var></ins></p>\r\n\r\n<p>✔&nbsp;Bảo hành 6&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n', 4, 0, NULL, 'ipad_grey.jpg', NULL, '2020-11-05 12:46:14', 'Retina IPS 9.7 inchs,  (2048 x 1536 pixels)', '2 GB', '32 GB', 'Apple A9X 2 nhân 64-bit, 2.16 GHz', '5 MP', '12.0 MP Full HD 1080p@30fps', 'iOS 12', '	PowerVR Series 7'),
(60, 'iPad 2018 9.7 inchs  Gold 32GB', 8990000, 5, 10, '<p><ins><var>Máy tính bảng&nbsp;iPad&nbsp;Likenew 99%:&nbsp;được cập nhật giá&nbsp;24/24&nbsp;luôn mặc định TẶNG&nbsp;MIỄN PHÍ&nbsp;gói bảo hành:</var></ins></p>\r\n\r\n<p>✔&nbsp;Bảo hành 6&nbsp;tháng (phần cứng + phần mềm)</p>\r\n\r\n<p>✔&nbsp;Dán cường lực miễn phí</p>\r\n\r\n<p>✔&nbsp;Dùng thử 39&nbsp;ngày, đổi lỗi Miễn phí</p>\r\n', 4, 0, NULL, 'ipad_gold.jpg', NULL, '2020-11-05 12:47:52', 'Retina IPS 9.7 inchs,  (2048 x 1536 pixels)', '2 GB', '32 GB', 'Apple A9X 2 nhân 64-bit, 2.16 GHz', '5 MP', '12.0 MP Full HD 1080p@30fps', 'iOS 12', '	PowerVR Series 7'),
(61, 'Tai nghe Airpods 2 - Fullbox 100% (phiên bản sạc không dây)', 4400000, 5, 12, '<p><strong><ins><var>Tai nghe Airpods&nbsp;Fullbox&nbsp;new 100% luôn mặc định được&nbsp;bảo hành:</var></ins></strong></p>\r\n\r\n<p>✔&nbsp;Bảo hành 12&nbsp;tháng chính hãng Apple và 12 tháng tại cửa hàng</p>\r\n\r\n<p>✔&nbsp;Bảo hành Hộp,&nbsp;cáp zin chính hãng Apple</p>\r\n', 5, 0, NULL, 'Airpods2.jpg', NULL, '2020-11-06 08:05:39', '1', '12', '123', '123', '23', '45', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `shipping` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(5) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `name`, `address`, `phone`, `amount`, `email`, `message`, `payment`, `shipping`, `active`, `created_at`, `product_id`, `status`, `user_id`) VALUES
(3, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11815000, 'lexuan281294@gmail.com', NULL, '', '', 1, '2020-10-02 05:48:48', NULL, 0, NULL),
(4, 'Lê Ngọc Xuân', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc', '0987541656', 59075000, 'lexuan281294@gmail.com', NULL, '', '', 1, '2020-10-02 06:00:50', NULL, 3, NULL),
(5, 'abc ', 'ha noi', '01234679 ', 11815000, 'lexuan@gmail.com', NULL, '', '', 1, '2020-10-02 10:52:03', NULL, 6, NULL),
(6, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11519200, 'lexuan281294@gmail.com', NULL, '', '', 1, '2020-10-02 11:40:12', NULL, 0, NULL),
(7, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11519200, 'lexuan281294@gmail.com', NULL, '', '', 1, '2020-10-05 07:15:26', NULL, 0, NULL),
(8, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11519200, 'lexuan281294@gmail.com', NULL, 'cod', '', 1, '2020-10-07 05:42:47', NULL, 0, NULL),
(9, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11519200, 'lexuan281294@gmail.com', NULL, 'COD', '', 1, '2020-10-07 05:46:15', NULL, 0, NULL),
(10, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 3240000, 'lexuan281294@gmail.com', NULL, 'Chuyển Khoản', '', 1, '2020-10-07 05:46:36', NULL, 0, NULL),
(11, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 13992000, 'lexuan281294@gmail.com', NULL, 'COD', 'on', 1, '2020-10-09 11:24:16', NULL, 0, NULL),
(12, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11815000, 'lexuan281294@gmail.com', NULL, 'COD', 'on', 1, '2020-10-09 11:25:53', NULL, 0, NULL),
(13, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 13992000, 'lexuan281294@gmail.com', NULL, 'COD', 'J&T\r\n                                                        Express', 1, '2020-10-09 11:28:30', NULL, 0, NULL),
(14, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11250000, 'lexuan281294@gmail.com', NULL, 'COD', 'Giao Hàng\r\n                                                        Tiết Kiệm', 1, '2020-10-09 11:28:59', NULL, 0, NULL),
(15, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11250000, 'lexuan281294@gmail.com', NULL, 'COD', 'GHTK', 1, '2020-10-09 11:30:42', NULL, 0, NULL),
(16, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 13992000, 'lexuan281294@gmail.com', NULL, 'COD', 'GHTK', 1, '2020-10-14 02:07:46', NULL, 0, NULL),
(17, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11815000, 'lexuan281294@gmail.com', NULL, 'COD', 'GHTK', 1, '2020-10-14 03:25:26', NULL, 0, NULL),
(18, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 11250000, 'lexuan281294@gmail.com', NULL, 'COD', 'GHTK', 1, '2020-10-14 04:53:54', NULL, 0, NULL),
(19, 'Lê Ngọc Xuân ', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 22769200, 'lexuan281294@gmail.com', NULL, 'COD', 'GHTK', 1, '2020-10-14 10:13:52', NULL, 0, NULL),
(20, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 17100000, 'lexuan@gmail.com', '1234', 'COD', 'GHTK', 0, '2020-11-04 16:39:08', NULL, 6, NULL),
(21, ' Thư Cute ', 'ấp 3, Xã Mỹ Hòa Huyện Tháp Mười, Đồng Tháp, ngang cầu kinh 9000,  phía bên kia sông ', '0834846650 ', 15750000, 'anhthu2462002@gmail.com', 'ANH XUÂN TRẢ TIỀN Ạ ', 'chuyển khoản', 'GHTK', 0, '2020-11-04 16:57:56', NULL, NULL, NULL),
(22, ' Mei', 'Hà Nội ', '0123456789 ', 13992000, 'Mei2002@gmail.com', NULL, 'COD', 'J&T', 0, '2020-11-05 14:25:11', NULL, NULL, NULL),
(23, ' Mei', 'Hà Nội ', '0123456789 ', 11815000, 'Mei2002@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-05 16:13:57', NULL, NULL, NULL),
(24, ' Lê Ngọc Xuân', 'tổ dân phố Đôn Hậu, phường Khai Quang,tp Vĩnh Yên, tỉnh Vĩnh Phúc ', '0987541656 ', 41976000, 'lexuan1@gmail.com', '123', 'COD', 'GHTK', 0, '2020-11-06 12:42:31', NULL, NULL, NULL),
(25, ' demo', 'hn ', '031546895 ', 2700000, 'demo@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-12 15:29:01', NULL, NULL, NULL),
(26, ' demo', 'hn ', '031546895 ', 11250000, 'demo@gmail.com', NULL, 'chuyển khoản', 'GHTK', 0, '2020-11-12 15:36:06', NULL, NULL, NULL),
(27, ' demo', 'hn ', '031546895 ', 11250000, 'demo@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-12 15:36:36', NULL, NULL, NULL),
(28, ' demo', 'hn ', '031546895 ', 17322000, 'demo@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-12 15:37:39', NULL, NULL, NULL),
(29, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 6480000, 'lexuan@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-18 02:38:06', NULL, 6, NULL),
(30, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 3330000, 'lexuan@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-18 02:39:32', NULL, 6, NULL),
(31, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 9531000, 'lexuan@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-18 05:30:56', NULL, 6, NULL),
(32, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 3240000, 'lexuan@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-18 06:18:13', NULL, 6, NULL),
(33, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 2700000, 'lexuan@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-18 06:21:57', NULL, 6, NULL),
(34, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 3330000, 'lexuan@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-11-18 06:23:06', NULL, 6, NULL),
(35, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 11815000, 'lexuan@gmail.com', NULL, 'chuyển khoản', 'GHTK', 0, '2020-11-18 06:24:33', NULL, 6, NULL),
(36, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 31500000, 'lexuan@gmail.com', NULL, 'chuyển khoản', 'GHTK', 0, '2020-12-02 06:15:41', NULL, 6, NULL),
(37, ' Lê Ngọc Xuân', 'hà nội ', '0987541656 ', 14759200, 'lexuan@gmail.com', NULL, 'chuyển khoản', 'GHTK', 0, '2020-12-02 06:16:25', NULL, NULL, NULL),
(38, ' Lê Ngọc Xuân', 'tòa nhà VTC 18 Tam Trinh Hà Nội ', '00987541656 ', 16692000, 'lexuan@gmail.com', NULL, 'chuyển khoản', 'GHTK', 0, '2020-12-02 06:30:55', NULL, NULL, NULL),
(39, ' xuân lê', 'tầng 4 tòa nhà VTC, 18 Tam Trinh, Hai Bà Trưng, Hà Nội ', '123456 ', 12861000, 'xuan@gmail.com', NULL, 'COD', 'GHTK', 0, '2020-12-03 08:41:10', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_pro_img` (`product_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `news` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `ordere`
--
ALTER TABLE `ordere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trans_product` (`product_id`),
  ADD KEY `fk_trans_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ordere`
--
ALTER TABLE `ordere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_pro_img` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `ordere`
--
ALTER TABLE `ordere`
  ADD CONSTRAINT `fk_pro_order` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_pro_cate` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_trans_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_trans_user` FOREIGN KEY (`user_id`) REFERENCES `db_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
