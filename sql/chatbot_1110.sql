-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-11-10 13:23:20
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `chatbot`
--

-- --------------------------------------------------------

--
-- 資料表結構 `chatrooms`
--

CREATE TABLE `chatrooms` (
  `chatroom_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nick_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '在聊天室中對user的稱呼',
  `role_id` int(11) DEFAULT NULL COMMENT '角色類型，如媽媽、老師',
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '聊天室中對角色的稱呼',
  `role_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '聊天角色的照片',
  `habbit_id` int(11) DEFAULT NULL COMMENT '習慣分類，如學習、健康',
  `habbit_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '要養成的習慣名稱',
  `habbit_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '當前習慣狀態',
  `signed_time` time DEFAULT '00:00:00' COMMENT '每日簽到、打卡的時間點',
  `completion` int(11) DEFAULT 0 COMMENT '完成次數',
  `original_intention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '養成習慣的初衷',
  `goodness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '養成習慣的好處',
  `badness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '不養成會造成的壞處',
  `days` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `chatrooms`
--

INSERT INTO `chatrooms` (`chatroom_id`, `user_id`, `nick_name`, `role_id`, `role_name`, `role_photo`, `habbit_id`, `habbit_name`, `habbit_status`, `signed_time`, `completion`, `original_intention`, `goodness`, `badness`, `days`, `created_at`, `updated_at`) VALUES
(1, '1', '花花', 1, '老媽', 'photo test', 1, '我愛喝水', '養成中', '17:45:00', 106, '變水水', '皮膚好', '便祕', 0, '2020-09-27 17:46:24', '2020-09-27 17:46:24'),
(2, '1', '乖女兒', 1, '阿姆', 'data/image/hello.jpg', 1, '減肥', '養成中', '09:00:00', 0, '', '交男朋友', '交不到', 0, '2020-10-20 15:08:32', '2020-10-20 15:08:32'),
(20, 'ruby1001', '乖女兒', 1, '阿姆', 'data/image/hello.jpg', 2, '減肥哈哈哈哈哈哈', '養成中', '09:00:00', 0, '變水水哈哈哈哈哈哈', '交男朋友哈哈哈哈哈哈', '交不到哈哈哈哈哈哈', 45, '2020-11-10 20:14:44', '2020-11-10 20:14:44'),
(21, 'ruby1001', '乖女兒', 2, '母', 'data/image/hello.jpg', 2, '減肥哈哈哈哈哈哈', '養成中', '09:00:00', 0, '變水水哈哈哈哈哈哈', '交男朋友哈哈哈哈哈哈', '交不到哈哈哈哈哈哈', 45, '2020-11-10 20:15:05', '2020-11-10 20:15:05'),
(22, 'ruby1001', '卡啦雞', 3, '鬼助', 'data/image/hello.jpg', 3, '追完鬼滅之刃', '養成中', '20:45:00', 0, '好看', '熱血一波', '跟不上流行', 33, '2020-11-10 20:17:18', '2020-11-10 20:17:18');

-- --------------------------------------------------------

--
-- 資料表結構 `habbit_cat`
--

CREATE TABLE `habbit_cat` (
  `habbit_id` int(11) NOT NULL COMMENT '習慣分類',
  `habbit_cat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '習慣類名稱',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `habbit_cat`
--

INSERT INTO `habbit_cat` (`habbit_id`, `habbit_cat_name`, `created_at`) VALUES
(1, '健康', '2020-11-07 05:52:59'),
(2, '教育', '2020-11-07 05:52:59'),
(3, '閱讀', '2020-11-07 05:54:26');

-- --------------------------------------------------------

--
-- 資料表結構 `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `user_id`) VALUES
(19, 1, '1'),
(20, 1, 'ruby1001'),
(22, 1, 'ruby2020'),
(25, 3, 'ruby1001'),
(38, 3, 'ruby2020'),
(28, 15, 'ruby1001'),
(35, 15, 'ruby2020'),
(30, 16, 'ruby1001'),
(36, 16, 'ruby2020'),
(31, 18, 'ruby1001'),
(32, 18, 'ruby2020');

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `habbit_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '貼文內容',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `habbit_id`, `content`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'ㄚㄚㄚㄚㄚ', '2020-11-07 13:00:45', '2020-11-07 21:26:37'),
(3, '1', 1, '我在改資料--', '2020-11-07 13:02:46', '2020-11-07 13:15:05'),
(4, '1', 1, '好可愛，好吃', '2020-11-07 13:20:03', '2020-11-07 13:20:03'),
(6, 'ruby1001', 2, '好可愛，好吃', '2020-11-10 20:18:02', '2020-11-10 20:18:02'),
(7, 'ruby1001', 1, '好可愛，好吃', '2020-11-10 20:18:07', '2020-11-10 20:18:07'),
(8, 'ruby1001', 3, '好可愛，好吃', '2020-11-10 20:18:11', '2020-11-10 20:18:11'),
(9, 'ruby2020', 3, '沙沙沙', '2020-11-10 20:18:26', '2020-11-10 20:18:26'),
(10, 'ruby2020', 3, '沙沙沙', '2020-11-10 20:18:26', '2020-11-10 20:18:26'),
(11, 'ruby2020', 1, '沙沙沙', '2020-11-10 20:18:29', '2020-11-10 20:18:29'),
(15, 'ruby1001', 2, '沙沙沙111', '2020-11-10 20:20:03', '2020-11-10 20:20:03'),
(16, 'ruby1001', 1, '燕麥奈SOSO', '2020-11-10 20:20:27', '2020-11-10 20:20:27'),
(18, 'ruby1001', 2, '燕麥奈SOSO', '2020-11-10 20:20:41', '2020-11-10 20:20:41');

-- --------------------------------------------------------

--
-- 資料表結構 `remind_time`
--

CREATE TABLE `remind_time` (
  `remind_id` int(11) NOT NULL,
  `chatroom_id` int(11) DEFAULT NULL,
  `remind_time` time DEFAULT NULL COMMENT '提醒時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `remind_time`
--

INSERT INTO `remind_time` (`remind_id`, `chatroom_id`, `remind_time`) VALUES
(1, 1, '09:00:00'),
(2, 1, '12:00:00'),
(3, 2, '12:00:00'),
(9, 2, '12:30:00'),
(10, 2, '12:31:00');

-- --------------------------------------------------------

--
-- 資料表結構 `role_cat`
--

CREATE TABLE `role_cat` (
  `role_id` int(11) NOT NULL,
  `role_cat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '角色分類名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `role_cat`
--

INSERT INTO `role_cat` (`role_id`, `role_cat_name`) VALUES
(1, '媽媽'),
(2, '老師'),
(3, '爸爸');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userPhoto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `gender`, `birthday`, `mail`, `userPhoto`, `created_at`, `updated_at`) VALUES
('1', '小花', '女', '2028-07-12', 'test', '', '2020-11-07 03:46:45', '2020-11-07 03:59:45'),
('1234', 'cute_ruby', NULL, NULL, 'test10@gmail.com', '', '2020-11-07 03:48:13', '2020-11-07 03:48:13'),
('9898', 'cute_ruby', '女', '2028-07-12', 'test10@gmail.com', '', '2020-11-07 03:49:12', '2020-11-07 04:00:34'),
('ruby00', 'cute_ruby', NULL, NULL, 'test10@gmail.com', '', '2020-11-07 03:47:51', '2020-11-07 03:47:51'),
('ruby1001', 'cute_ruby', NULL, NULL, 'test10@gmail.com', '', '2020-11-07 03:46:45', '2020-11-07 03:46:45'),
('ruby2020', 'cute_ruby', NULL, NULL, 'test10@gmail.com', '', '2020-11-07 03:46:45', '2020-11-07 03:46:45'),
('ruby2121', 'cute_ruby', NULL, NULL, 'test10@gmail.com', '', '2020-11-07 03:46:45', '2020-11-07 03:46:45'),
('ruby2122', 'cute_ruby', NULL, NULL, 'test10@gmail.com', '', '2020-11-07 03:46:45', '2020-11-07 03:46:45');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `chatrooms`
--
ALTER TABLE `chatrooms`
  ADD PRIMARY KEY (`chatroom_id`),
  ADD KEY `chatrooms_index_0` (`role_id`),
  ADD KEY `chatrooms_index_1` (`habbit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `habbit_cat`
--
ALTER TABLE `habbit_cat`
  ADD PRIMARY KEY (`habbit_id`),
  ADD UNIQUE KEY `habbit_cat_name` (`habbit_cat_name`);

--
-- 資料表索引 `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `post_id_2` (`post_id`,`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `habbit_index` (`habbit_id`);

--
-- 資料表索引 `remind_time`
--
ALTER TABLE `remind_time`
  ADD PRIMARY KEY (`remind_id`),
  ADD UNIQUE KEY `chatroom_id_2` (`chatroom_id`,`remind_time`),
  ADD KEY `chatroom_id` (`chatroom_id`);

--
-- 資料表索引 `role_cat`
--
ALTER TABLE `role_cat`
  ADD PRIMARY KEY (`role_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `chatrooms`
--
ALTER TABLE `chatrooms`
  MODIFY `chatroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `habbit_cat`
--
ALTER TABLE `habbit_cat`
  MODIFY `habbit_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '習慣分類', AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `remind_time`
--
ALTER TABLE `remind_time`
  MODIFY `remind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `role_cat`
--
ALTER TABLE `role_cat`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `chatrooms`
--
ALTER TABLE `chatrooms`
  ADD CONSTRAINT `chatrooms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `chatrooms_ibfk_2` FOREIGN KEY (`habbit_id`) REFERENCES `habbit_cat` (`habbit_id`),
  ADD CONSTRAINT `chatrooms_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `role_cat` (`role_id`);

--
-- 資料表的限制式 `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 資料表的限制式 `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`habbit_id`) REFERENCES `habbit_cat` (`habbit_id`);

--
-- 資料表的限制式 `remind_time`
--
ALTER TABLE `remind_time`
  ADD CONSTRAINT `remind_time_ibfk_1` FOREIGN KEY (`chatroom_id`) REFERENCES `chatrooms` (`chatroom_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
