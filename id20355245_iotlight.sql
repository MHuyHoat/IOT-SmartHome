-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 12, 2023 lúc 04:29 PM
-- Phiên bản máy phục vụ: 10.5.20-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id20355245_iotlight`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_iot`
--

CREATE TABLE `db_iot` (
  `id` int(2) NOT NULL,
  `thietbi` varchar(4) NOT NULL,
  `trangthai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_iot`
--

INSERT INTO `db_iot` (`id`, `thietbi`, `trangthai`) VALUES
(1, '0010', 0),
(2, '0100', 0),
(3, '1000', 0),
(4, '0110', 0),
(5, '1010', 0),
(6, '1100', 0),
(7, '1110', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_thoitiet`
--

CREATE TABLE `db_thoitiet` (
  `nhietdo` varchar(10) NOT NULL,
  `doam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `db_thoitiet`
--

INSERT INTO `db_thoitiet` (`nhietdo`, `doam`) VALUES
('37', '89');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanhdong`
--

CREATE TABLE `hanhdong` (
  `name` varchar(20) NOT NULL,
  `thoigian` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `thietbi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanhdong`
--

INSERT INTO `hanhdong` (`name`, `thoigian`, `action`, `thietbi`) VALUES
('admin', '13:22:42 22/04/2023', 'bật', 'tất cả thiết bị'),
('admin', '13:22:50 22/04/2023', 'tắt', 'đèn phòng ngủ'),
('admin', '15:34:02 30/04/2023', 'bật', 'đèn phòng ngủ'),
('admin', '14:44:45 02/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '10:49:26 04/05/2023', 'bật', 'đèn phòng khách'),
('admin', '10:49:30 04/05/2023', 'bật', 'đèn sân'),
('admin', '10:49:48 04/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '12:42:49 10/05/2023', 'bật', 'đèn sân'),
('admin', '14:04:53 10/05/2023', 'tắt', 'đèn sân'),
('admin', '14:08:11 10/05/2023', 'bật', 'đèn phòng ngủ'),
('admin', '14:08:21 10/05/2023', 'bật', 'đèn phòng khách'),
('admin', '14:35:21 10/05/2023', 'bật', 'đèn bếp'),
('admin', '14:35:26 10/05/2023', 'bật', 'đèn vệ sinh'),
('admin', '14:35:30 10/05/2023', 'bật', 'đèn sân'),
('child1', '15:19:22 10/05/2023', 'tắt', 'đèn phòng khách'),
('child1', '15:19:29 10/05/2023', 'tắt', 'đèn bếp'),
('child1', '15:19:32 10/05/2023', 'tắt', 'đèn phòng ngủ'),
('child1', '15:19:41 10/05/2023', 'bật', 'đèn phòng khách'),
('child1', '15:19:43 10/05/2023', 'bật', 'đèn bếp'),
('admin', '15:19:55 10/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '15:20:07 10/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '15:20:17 10/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '15:21:15 10/05/2023', 'tắt', 'đèn sân'),
('admin', '15:21:19 10/05/2023', 'tắt', 'đèn bếp'),
('admin', '15:21:23 10/05/2023', 'tắt', 'quạt trần'),
('admin', '15:21:24 10/05/2023', 'bật', 'quạt trần'),
('admin', '15:21:41 10/05/2023', 'bật', 'đèn bếp'),
('admin', '15:22:01 10/05/2023', 'bật', 'đèn sân'),
('admin', '15:22:16 10/05/2023', 'tắt', 'đèn sân'),
('admin', '15:22:18 10/05/2023', 'bật', 'đèn sân'),
('admin', '15:22:30 10/05/2023', 'tắt', 'đèn phòng ngủ'),
('child1', '15:23:01 10/05/2023', 'tắt', 'đèn phòng khách'),
('child1', '15:23:04 10/05/2023', 'tắt', 'đèn bếp'),
('child1', '15:23:06 10/05/2023', 'bật', 'đèn phòng ngủ'),
('child1', '15:23:08 10/05/2023', 'tắt', 'quạt trần'),
('child1', '15:24:25 10/05/2023', 'tắt', 'đèn phòng ngủ'),
('admin', '15:24:30 10/05/2023', 'tắt', 'đèn vệ sinh'),
('child1', '15:24:45 10/05/2023', 'bật', 'đèn phòng ngủ'),
('child1', '15:24:58 10/05/2023', 'tắt', 'đèn phòng ngủ'),
('child1', '15:26:11 10/05/2023', 'bật', 'đèn phòng khách'),
('child1', '15:26:15 10/05/2023', 'tắt', 'đèn phòng khách'),
('child1', '15:26:20 10/05/2023', 'bật', 'đèn bếp'),
('admin', '15:35:59 10/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '15:36:02 10/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '15:36:05 10/05/2023', 'bật', 'tất cả thiết bị'),
('child1', '15:47:00 10/05/2023', 'tắt', 'đèn bếp'),
('child1', '15:47:02 10/05/2023', 'tắt', 'đèn phòng ngủ'),
('child2', '15:49:34 10/05/2023', 'bật', 'đèn phòng khách'),
('child2', '15:49:35 10/05/2023', 'bật', 'đèn bếp'),
('123', '15:53:09 10/05/2023', 'tắt', 'đèn bếp'),
('admin', '8:50:11 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '8:51:37 24/05/2023', 'tắt', 'đèn sân'),
('admin', '8:51:43 24/05/2023', 'tắt', 'đèn phòng ngủ'),
('admin', '8:51:48 24/05/2023', 'tắt', 'đèn bếp'),
('admin', '8:53:28 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:22:47 24/05/2023', 'tắt', 'điều hòa'),
('admin', '9:22:52 24/05/2023', 'tắt', 'quạt trần'),
('admin', '9:23:08 24/05/2023', 'tắt', 'đèn vệ sinh'),
('admin', '9:23:12 24/05/2023', 'tắt', 'đèn phòng ngủ'),
('admin', '9:24:01 24/05/2023', 'bật', 'quạt trần'),
('admin', '9:24:10 24/05/2023', 'bật', 'điều hòa'),
('admin', '9:24:24 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:24:35 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:24:50 24/05/2023', 'bật', 'đèn bếp'),
('admin', '9:24:57 24/05/2023', 'bật', 'quạt trần'),
('admin', '9:25:01 24/05/2023', 'tắt', 'quạt trần'),
('admin', '9:25:07 24/05/2023', 'bật', 'đèn vệ sinh'),
('admin', '9:26:55 24/05/2023', 'bật', 'đèn phòng ngủ'),
('admin', '9:26:59 24/05/2023', 'bật', 'đèn sân'),
('admin', '9:27:08 24/05/2023', 'bật', 'quạt trần'),
('admin', '9:28:37 24/05/2023', 'tắt', 'quạt trần'),
('admin', '9:28:41 24/05/2023', 'bật', 'quạt trần'),
('admin', '9:28:47 24/05/2023', 'bật', 'điều hòa'),
('admin', '9:28:56 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:31:31 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:32:56 24/05/2023', 'bật', 'đèn sân'),
('admin', '9:33:59 24/05/2023', 'tắt', 'đèn sân'),
('admin', '9:34:39 24/05/2023', 'bật', 'đèn sân'),
('admin', '9:34:49 24/05/2023', 'bật', 'đèn phòng khách'),
('admin', '9:34:51 24/05/2023', 'bật', 'đèn bếp'),
('admin', '9:34:52 24/05/2023', 'bật', 'đèn phòng ngủ'),
('admin', '9:34:54 24/05/2023', 'bật', 'đèn vệ sinh'),
('admin', '9:34:54 24/05/2023', 'bật', 'quạt trần'),
('admin', '9:34:56 24/05/2023', 'bật', 'điều hòa'),
('admin', '9:34:57 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:35:00 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:35:07 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:35:22 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:35:44 24/05/2023', 'tắt', 'đèn phòng khách'),
('admin', '9:35:48 24/05/2023', 'tắt', 'đèn sân'),
('admin', '9:36:26 24/05/2023', 'tắt', 'đèn bếp'),
('admin', '9:36:39 24/05/2023', 'tắt', 'đèn phòng ngủ'),
('admin', '9:36:52 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:37:23 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:38:02 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:38:11 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:38:14 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:38:30 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:38:52 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:39:01 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:39:07 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:39:28 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:39:46 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:39:53 24/05/2023', 'tắt', 'điều hòa'),
('admin', '9:39:58 24/05/2023', 'tắt', 'quạt trần'),
('admin', '9:40:05 24/05/2023', 'tắt', 'đèn phòng khách'),
('admin', '9:40:18 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:40:21 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:40:27 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:40:32 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:40:36 24/05/2023', 'bật', 'đèn phòng ngủ'),
('admin', '9:40:41 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:40:48 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:40:53 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:41:00 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:41:17 24/05/2023', 'bật', 'đèn phòng khách'),
('admin', '9:41:21 24/05/2023', 'bật', 'đèn sân'),
('admin', '9:41:33 24/05/2023', 'bật', 'đèn bếp'),
('admin', '9:41:38 24/05/2023', 'bật', 'đèn phòng ngủ'),
('admin', '9:41:49 24/05/2023', 'bật', 'điều hòa'),
('admin', '9:42:00 24/05/2023', 'bật', 'quạt trần'),
('admin', '9:42:10 24/05/2023', 'bật', 'đèn vệ sinh'),
('admin', '9:42:12 24/05/2023', 'tắt', 'đèn vệ sinh'),
('admin', '9:42:14 24/05/2023', 'bật', 'đèn vệ sinh'),
('admin', '9:42:17 24/05/2023', 'tắt', 'đèn phòng khách'),
('admin', '9:42:30 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:42:39 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:52:03 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '9:52:50 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '9:53:10 24/05/2023', 'bật', 'đèn bếp'),
('admin', '9:53:19 24/05/2023', 'bật', 'đèn phòng ngủ'),
('admin', '9:54:08 24/05/2023', 'bật', 'đèn phòng khách'),
('admin', '9:55:18 24/05/2023', 'bật', 'đèn phòng khách'),
('admin', '9:55:48 24/05/2023', 'bật', 'quạt trần'),
('admin', '9:56:37 24/05/2023', 'tắt', 'quạt trần'),
('admin', '9:56:52 24/05/2023', 'tắt', 'đèn phòng khách'),
('admin', '9:59:38 24/05/2023', 'tắt', 'đèn phòng khách'),
('admin', '10:04:40 24/05/2023', 'bật', 'đèn sân'),
('admin', '10:48:21 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '10:48:27 24/05/2023', 'tắt', 'đèn sân'),
('admin', '10:48:34 24/05/2023', 'tắt', 'điều hòa'),
('admin', '10:48:37 24/05/2023', 'tắt', 'đèn vệ sinh'),
('admin', '10:48:40 24/05/2023', 'tắt', 'đèn phòng khách'),
('admin', '10:48:43 24/05/2023', 'tắt', 'đèn bếp'),
('admin', '10:48:46 24/05/2023', 'tắt', 'đèn phòng ngủ'),
('admin', '10:48:51 24/05/2023', 'tắt', 'quạt trần'),
('admin', '10:51:07 24/05/2023', 'bật', 'quạt trần'),
('admin', '10:51:17 24/05/2023', 'tắt', 'quạt trần'),
('admin', '10:56:32 24/05/2023', 'bật', 'quạt trần'),
('admin', '10:56:39 24/05/2023', 'tắt', 'quạt trần'),
('admin', '11:09:11 24/05/2023', 'bật', 'tất cả thiết bị'),
('admin', '11:09:17 24/05/2023', 'tắt', 'tất cả thiết bị'),
('admin', '11:09:35 24/05/2023', 'bật', 'đèn sân'),
('admin', '11:09:43 24/05/2023', 'tắt', 'đèn sân'),
('admin', '11:09:47 24/05/2023', 'bật', 'đèn sân'),
('admin', '11:09:50 24/05/2023', 'tắt', 'đèn sân'),
('admin', '19:29:25 24/05/2023', 'tắt', 'tất cả thiết bị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `id` int(6) UNSIGNED NOT NULL,
  `nhietdo` varchar(30) DEFAULT NULL,
  `doam` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`id`, `nhietdo`, `doam`) VALUES
(1, '29.00', '57.00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `posi` varchar(10) NOT NULL,
  `act` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `posi`, `act`) VALUES
('admin', 'admin', 'admin', '1234567'),
('child1', '12345678', 'user', '346'),
('123', '123', 'user', '345'),
('ok', 'ok', 'user', '13'),
('man', 'man', 'user', '1'),
('nam', 'nam', 'user', '15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
