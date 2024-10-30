-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 30, 2024 lúc 09:20 AM
-- Phiên bản máy phục vụ: 8.0.39-0ubuntu0.22.04.1
-- Phiên bản PHP: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `iotlight`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dulieu_moitruong`
--

CREATE TABLE `dulieu_moitruong` (
  `id` int NOT NULL,
  `thongtin` text COLLATE utf8mb4_vietnamese_ci,
  `loai_thongtin` enum('nhiet do','do am') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `id` int NOT NULL,
  `ten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`id`, `ten`, `user_id`) VALUES
(1, 'Phòng khách', 1),
(2, 'Phòng ngủ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_thietbi`
--

CREATE TABLE `loai_thietbi` (
  `id` int NOT NULL,
  `ten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci,
  `default_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_thietbi`
--

INSERT INTO `loai_thietbi` (`id`, `ten`, `default_image`) VALUES
(1, 'Đèn', '                                                        <svg id=\"Layer_1\" style=\"fill: #EFC70D\" height=\"20\" viewBox=\"0 0 24 24\" width=\"20\" xmlns=\"http://www.w3.org/2000/svg\" data-name=\"Layer 1\"><path d=\"m5.868 15.583a8.938 8.938 0 0 1 -2.793-7.761 9 9 0 1 1 14.857 7.941 5.741 5.741 0 0 0 -1.594 2.237h-3.338v-7.184a3 3 0 0 0 2-2.816 1 1 0 0 0 -2 0 1 1 0 0 1 -2 0 1 1 0 0 0 -2 0 3 3 0 0 0 2 2.816v7.184h-3.437a6.839 6.839 0 0 0 -1.695-2.417zm2.132 4.417v.31a3.694 3.694 0 0 0 3.69 3.69h.62a3.694 3.694 0 0 0 3.69-3.69v-.31z\"/></svg>    '),
(2, 'Quạt', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" style=\"fill: blue  \" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\">\r\n  <path d=\"m9.501,9.557c-.553-1.536-1.174-3.732-1.07-5.641.06-1.104.546-2.119,1.368-2.857C10.623.321,11.676-.054,12.789.006c1.104.06,2.119.546,2.857,1.369.738.823,1.112,1.884,1.053,2.989-.095,1.744-1.634,3.358-2.878,4.661-.532-.327-1.152-.525-1.82-.525-.979,0-1.863.407-2.499,1.057Zm.999,2.443c0,.827.673,1.5,1.5,1.5s1.5-.673,1.5-1.5-.673-1.5-1.5-1.5-1.5.673-1.5,1.5Zm12.441-2.245c-.738-.823-1.754-1.31-2.858-1.369-1.924-.104-4.141.528-5.678,1.083.671.638,1.095,1.534,1.095,2.53,0,.657-.193,1.265-.509,1.791,1.302,1.244,2.898,2.863,4.645,2.863,1.48,0,2.224-.365,2.989-1.052.822-.739,1.309-1.753,1.368-2.857.061-1.104-.313-2.166-1.052-2.989Zm-10.941,5.745c-.645,0-1.242-.188-1.762-.493-1.244,1.303-2.753,2.885-2.848,4.629-.123,2.28,1.628,4.358,3.909,4.358,1.263,0,2.224-.365,2.99-1.052.822-.738,1.309-1.753,1.368-2.857.106-1.939-.537-4.178-1.096-5.717-.64.692-1.547,1.133-2.562,1.133Zm-3.5-3.5c0-.668.198-1.287.524-1.819-1.303-1.244-2.872-2.741-4.616-2.835-1.112-.061-2.166.314-2.989,1.052-.822.739-1.309,1.753-1.368,2.857-.061,1.104.313,2.166,1.052,2.989.738.823,1.897,1.38,3.288,1.38,1.806,0,3.794-.572,5.216-1.084-.678-.639-1.108-1.538-1.108-2.541Z\"/>\r\n</svg>\r\n'),
(3, 'Đo độ ẩm', '\r\n<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"fill: #274fc8 ;\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" width=\"20\" height=\"20\"><path d=\"M15.213,1.177a4.947,4.947,0,0,0-6.426,0C2.706,6.231-2.63,13.491,4.222,20.778a11.052,11.052,0,0,0,15.556,0C26.636,13.442,21.3,6.257,15.213,1.177ZM8,10a1,1,0,0,1,2,0A1,1,0,0,1,8,10Zm2.832,6.555a1,1,0,1,1-1.664-1.11l4-6a1,1,0,0,1,1.664,1.11ZM15,17a1,1,0,0,1,0-2A1,1,0,0,1,15,17Z\"/></svg>\r\n'),
(4, 'Đo nhiệt độ ', '<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"fill: red\" id=\"Layer_1\" data-name=\"Layer 1\" viewBox=\"0 0 24 24\" width=\"20\" height=\"20\"><path d=\"M18,17a7.008,7.008,0,0,1-7,7c-6.078.117-9.334-7.638-5-11.89V5c.211-6.609,9.791-6.6,10,0v7.11A7.009,7.009,0,0,1,18,17Zm-4,0a3,3,0,0,0-2-2.828V12a1,1,0,0,0-2,0v2.172A3,3,0,1,0,14,17ZM24,3a3,3,0,0,0-6,0,3,3,0,0,0,6,0ZM22,3a1,1,0,1,1-1-1A1,1,0,0,1,22,3Z\"/></svg>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha`
--

CREATE TABLE `nha` (
  `id` int NOT NULL,
  `ten` text COLLATE utf8mb4_vietnamese_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nha`
--

INSERT INTO `nha` (`id`, `ten`, `created_at`, `updated_at`) VALUES
(1, 'Nhà của Mai Huy Hoạt', '2024-10-28 00:09:54', '2024-10-28 00:09:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int NOT NULL,
  `permission_type` enum('control','view') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `thietbi_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `ten`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thietbi`
--

CREATE TABLE `thietbi` (
  `id` int NOT NULL,
  `ten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Tên thiết bị iot trong nhà ',
  `thong_tin` text COLLATE utf8mb4_general_ci,
  `trangthai` int NOT NULL,
  `parent_id` int DEFAULT NULL COMMENT 'Thiết bị phụ thuộc',
  `nha_id` int DEFAULT NULL COMMENT 'Thiết bị thuộc ngôi nhà nào',
  `khuvuc_id` int NOT NULL,
  `loai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thietbi`
--

INSERT INTO `thietbi` (`id`, `ten`, `thong_tin`, `trangthai`, `parent_id`, `nha_id`, `khuvuc_id`, `loai_id`) VALUES
(1, 'Đèn phòng khách', NULL, 1, NULL, 1, 1, 1),
(2, 'Đèn phòng ngủ', NULL, 1, NULL, 1, 1, 1),
(3, 'Đèn nhà bếp\r\n', NULL, 1, NULL, 1, 2, 1),
(4, 'Đèn sân', NULL, 1, NULL, 1, 2, 1),
(5, 'Quạt ', NULL, 1, NULL, 1, 1, 2),
(6, 'Điều hòa', NULL, 0, NULL, 1, 1, 1),
(7, 'Đèn nhà vệ sinh', NULL, 1, NULL, 1, 2, 1),
(8, 'Đo độ ẩm', '48%', 1, NULL, 1, 1, 3),
(9, 'Đo nhiệt độ', '20 độ C', 1, NULL, 1, 2, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci,
  `image` text COLLATE utf8mb4_general_ci,
  `nha_id` int DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `image`, `nha_id`, `role_id`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, 1),
(2, 'hoat', '1', NULL, NULL, 1, 2),
(7, 'h.anh', '1', NULL, NULL, 1, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dulieu_moitruong`
--
ALTER TABLE `dulieu_moitruong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_thietbi`
--
ALTER TABLE `loai_thietbi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nha`
--
ALTER TABLE `nha`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dulieu_moitruong`
--
ALTER TABLE `dulieu_moitruong`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loai_thietbi`
--
ALTER TABLE `loai_thietbi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nha`
--
ALTER TABLE `nha`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
