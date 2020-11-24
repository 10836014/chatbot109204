-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-11-24 13:23:22
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
  `max_completion` int(11) NOT NULL,
  `original_intention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '養成習慣的初衷',
  `goodness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '養成習慣的好處',
  `badness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '不養成會造成的壞處',
  `days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `chatrooms`
--

INSERT INTO `chatrooms` (`chatroom_id`, `user_id`, `nick_name`, `role_id`, `role_name`, `role_photo`, `habbit_id`, `habbit_name`, `habbit_status`, `signed_time`, `completion`, `max_completion`, `original_intention`, `goodness`, `badness`, `days`, `created_at`, `updated_at`) VALUES
(1, 'test2', '乖女兒', 1, '寶寶', '1_rolePhoto.jpg', 3, '追完鬼滅之刃', '養成中', '20:45:00', 0, 0, '好看', '熱血一波', '跟不上流行00', 6, '2020-11-22 03:42:22', '2020-11-22 03:42:22'),
(2, 'test1', '芷0', 1, '寶寶', '2_rolePhoto.jpg', 3, '追完鬼滅之刃', '養成中', '20:45:00', 3, 0, '好看', '熱血一波', '跟不上流行00', 8, '2020-11-22 03:42:26', '2020-11-22 03:42:26'),
(3, '104560211270091', '寶貝', 4, '許老公', '3_rolePhoto.jpg', 3, '追完鬼滅之刃', '養成中', '20:45:00', 0, 0, '好看', '熱血一波', '跟不上流行00', 1, '2020-11-22 03:42:54', '2020-11-22 03:42:54'),
(4, '104560211270091', '芷0', 3, '老爸', '4_rolePhoto.jpg', 1, '多喝水', '養成中', '20:00:00', 0, 0, '增加代謝', '皮膚變好', '皮膚變差', 1, '2020-11-22 03:43:45', '2020-11-22 03:43:45'),
(5, '104560211270091', '芷0', 3, '老爸', '5_rolePhoto.jpg', 2, '讀英文', '養成中', '16:20:00', 0, 0, '提升英語能力', '考到畢業門檻', '畢不了業、不能交外國男朋友', 3, '2020-11-22 03:45:21', '2020-11-22 03:45:21');

-- --------------------------------------------------------

--
-- 資料表結構 `chitchat`
--

CREATE TABLE `chitchat` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `phase1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `chitchat`
--

INSERT INTO `chitchat` (`id`, `type`, `phase1`, `phase2`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 5, '泡麵不要吃太多', '', 2, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(2, 5, '多吃菜不然會便秘', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(3, 5, '晚餐煮香菇雞喔記得回家吃', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(4, 5, '不要太晚回家要注意安全', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(5, 5, '我今天去排了口罩好多人喔', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(6, 5, '你看我新燙的頭髮好看嗎', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(7, 5, '隔壁王太太的小孩好像畢業了', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(8, 5, '賀啦！賀啦！', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(9, 5, '巷口的乾麵還蠻好吃的', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(10, 5, '生活費還夠吧，不夠我也沒辦法', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(11, 5, '隔壁阿財的土狗好像生小狗了', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(12, 5, '要吃雞翅嗎，我明天買', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(13, 5, '聽說麥當勞大薯買一送一', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(14, 5, '每天都被自己帥到睡不著', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(15, 5, '下班買罐啤酒回來', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(16, 5, '好想吃熱炒喔', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(17, 5, '我每天都自己帥到睡不著', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(18, 5, '我剪的新頭髮好看嗎', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00');

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
(1, '健康', '2020-11-22 03:39:35'),
(2, '學習', '2020-11-22 03:39:35'),
(3, '娛樂', '2020-11-22 03:39:35'),
(4, '閱讀', '2020-11-22 03:39:35');

-- --------------------------------------------------------

--
-- 資料表結構 `joke`
--

CREATE TABLE `joke` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `phase1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `joke`
--

INSERT INTO `joke` (`id`, `type`, `phase1`, `phase2`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 5, '金猴金厲害', '', 2, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(2, 5, '唉呦~不錯嘛~', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(3, 5, '太棒了！繼續加油！', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(4, 5, '孺子可教也', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(5, 5, '堅持也是一個才能阿~', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(6, 5, '持之以恆方能成事。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(7, 5, '滴水能穿石。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(8, 5, '鍥而不捨，金石可鏤。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(9, 5, '天行健，君子以自強不息。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(10, 5, '如果你希望成功，當以恆心為良友，以經驗為參謀，以當心為兄弟，以希望為哨兵。 ', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(11, 5, '成功的秘訣在於恆心。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(12, 5, '天下無難事，唯堅忍二字，為成功之要訣。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(13, 5, 'ヾ(*´∀ ˋ*)ﾉ ', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(14, 5, '(๑•̀ω•́)ノ 還要繼續堅持下去喔!', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(15, 5, '｡:.ﾟヽ(*´∀`)ﾉﾟ.:｡ (灑花)', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(16, 5, '(๑•̀ㅂ•́)و✧ Fighting', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(17, 5, '我就知道你做得到<3', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(18, 5, '我就知道你一定可以的', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(19, 5, '太棒了，晚上一起去看電影吧', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(20, 5, '太棒了，晚上做飯給你吃', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(21, 5, '太棒了，下禮拜帶你去動物園當獎勵', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(22, 5, '就帶你吃麥當勞當獎勵吧', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00');

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
(1, 1, 'test1'),
(2, 2, 'test1'),
(3, 3, 'test1'),
(4, 4, 'test1'),
(5, 5, 'test1'),
(6, 5, 'test2');

-- --------------------------------------------------------

--
-- 資料表結構 `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `phase1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `notice`
--

INSERT INTO `notice` (`id`, `type`, `phase1`, `phase2`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 3, '怎麼還沒', '？你已經長大了，還不懂得自動自發嗎？', 2, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(2, 5, '好學近乎知，力行近乎仁，知恥近乎勇。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(3, 3, '不要浪費時間了，趕快去', '！', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(4, 5, '學如逆水行舟，不進則退', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(5, 3, '記得今天要', '喔', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(6, 5, '成功不是將來才有的，而是從決定去做的那一刻起，持續累積而成。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(7, 3, '還沒', '？我看你是皮在癢了', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(8, 3, '還沒', '?卡緊勒啦！', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(9, 3, '答應媽媽的', '完成了沒', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(10, 3, '還不快點去', '！', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(11, 4, '少在那邊拖拖拉拉!', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(12, 5, '書山有路勤為徑，學海無涯苦作舟', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(13, 3, '又在幹麻？是忘了要', '嗎？', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(14, 1, '記得要養成', '，不然我會難過', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(15, 3, '現在不完成', '，看你以後怎麼辦！', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(16, 6, '為了', '妳一定要乖乖', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(17, 5, '天下難事，必作於易，天下大事，必作於細。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(18, 5, '吾生也有涯而，知也無涯', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(19, 1, '記得要', '！', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(20, 3, '會被你氣死，趕快去', '！', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(21, 5, '天行健，正人以自強不息。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(22, 3, '不要那麼懶好嗎？趕快去', '！', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(23, 1, '記得要養成', '，堅持下去！讓我幫你加油', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(24, 5, '不經一翻徹骨寒，怎得梅花撲鼻香。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(25, 3, '不是說好每天都要', '嗎?', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(26, 5, '業精於勤，荒於嬉', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(27, 3, '想吃竹筍炒肉絲嗎？怎麼還沒', '?', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(28, 5, '言必信 ，行必果', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(29, 4, '不要三分鐘熱度', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00');

-- --------------------------------------------------------

--
-- 資料表結構 `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `habbit_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '貼文內容',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `habbit_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'test1', 1, '燕麥奶SOSO', '2020-11-22 04:05:25', '2020-11-22 04:05:25'),
(2, 'test2', 1, '我也覺得燕麥奶SOSO', '2020-11-22 04:05:40', '2020-11-22 04:05:40'),
(3, 'test1', 3, '今天寫完模擬題兩回', '2020-11-22 04:06:15', '2020-11-22 04:06:15'),
(4, '104560211270091', 3, '鬼滅有夠好看', '2020-11-22 04:07:32', '2020-11-22 04:07:32'),
(5, '104560211270091', 3, '我賣了很多鬼滅的周邊', '2020-11-22 04:07:46', '2020-11-22 04:07:46');

-- --------------------------------------------------------

--
-- 資料表結構 `praise`
--

CREATE TABLE `praise` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `phase1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phase2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `praise`
--

INSERT INTO `praise` (`id`, `type`, `phase1`, `phase2`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 5, '當我眼睛閉上時 我就看不到', '', 2, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(2, 5, '台灣人在睡覺的時候 美國人都在工作', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(3, 5, '研究顯示，過越多生日的人越長壽', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(4, 5, '人就像樹一樣，被斧頭砍，就會死', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(5, 5, '在非洲，每六十秒，就有一分鐘過去', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(6, 5, '隔壁嬸婆說，凡是每天喝水的人，有很高機率會在100年內死去', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(7, 5, '每呼吸60秒，就減少一分鐘的壽命', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(8, 5, '當蝴蝶在南半球拍了兩下翅膀，牠就會稍微飛高一點點', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(9, 5, '跟據統計，未婚生子的人數中有高機率為女性', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(10, 5, '只要每天省下買一杯奶茶的錢，十天後就能買十杯奶茶', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(11, 5, '當你的左臉被我打，你的左臉就會痛', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(12, 5, '今年中秋節剛好是滿月、今年母親節正好是星期日', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(13, 5, '人被殺，就會死。', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(14, 5, '台灣競爭力低落，在美國就連小學生都會說流利的英語', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00'),
(15, 5, '你知道嗎?熱美式潑在大腿上比用喝的還有效', '', 1, '2020-11-16 21:52:00', '2020-11-16 21:52:00');

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
(1, 1, '13:00:00');

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
(3, '爸爸'),
(4, '男神');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `gender`, `birthday`, `mail`, `user_photo`, `created_at`, `updated_at`) VALUES
('104560211270091', 'CL Kuo', '女性♀', '2028-07-12', '10836019@ntub.edu.tw', '', '2020-11-22 03:26:57', '2020-11-22 03:26:57'),
('304822997431751', '陳袁', '女性♀', '2006-07-11', 'chan1234@ntub.edu.tw', '', '2020-11-22 03:30:15', '2020-11-22 03:30:15'),
('test1', 'ruby1001', '女性♀', '2028-07-12', 'test1@ntub.edu.tw', '', '2020-11-22 03:28:11', '2020-11-22 03:28:11'),
('test2', 'ruby2020', '女性♀', '2028-07-12', 'test2@ntub.edu.tw', '', '2020-11-22 03:28:29', '2020-11-22 03:28:29');

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
-- 資料表索引 `chitchat`
--
ALTER TABLE `chitchat`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `habbit_cat`
--
ALTER TABLE `habbit_cat`
  ADD PRIMARY KEY (`habbit_id`),
  ADD UNIQUE KEY `habbit_cat_name` (`habbit_cat_name`);

--
-- 資料表索引 `joke`
--
ALTER TABLE `joke`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `post_id_2` (`post_id`,`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `habbit_index` (`habbit_id`);

--
-- 資料表索引 `praise`
--
ALTER TABLE `praise`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `chatroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `habbit_cat`
--
ALTER TABLE `habbit_cat`
  MODIFY `habbit_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '習慣分類', AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `remind_time`
--
ALTER TABLE `remind_time`
  MODIFY `remind_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `role_cat`
--
ALTER TABLE `role_cat`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
