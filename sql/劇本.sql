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
(1, 5, '泡麵不要吃太多', '', 2, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(2, 5, '多吃菜不然會便秘', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(3, 5, '晚餐煮香菇雞喔記得回家吃', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(4, 5, '不要太晚回家要注意安全', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(5, 5, '我今天去排了口罩好多人喔', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(6, 5, '你看我新燙的頭髮好看嗎', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(7, 5, '隔壁王太太的小孩好像畢業了', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(8, 5, '賀啦！賀啦！', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(9, 5, '巷口的乾麵還蠻好吃的', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(10, 5, '生活費還夠吧，不夠我也沒辦法', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(11, 5, '隔壁阿財的土狗好像生小狗了', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(12, 5, '要吃雞翅嗎，我明天買', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(13, 5, '聽說麥當勞大薯買一送一', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(14, 5, '每天都被自己帥到睡不著', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(15, 5, '下班買罐啤酒回來', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(16, 5, '好想吃熱炒喔', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(17, 5, '我每天都自己帥到睡不著', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(18, 5, '我剪的新頭髮好看嗎', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00');

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
(1, 5, '金猴金厲害', '', 2, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(2, 5, '唉呦~不錯嘛~', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(3, 5, '太棒了！繼續加油！', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(4, 5, '孺子可教也', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(5, 5, '堅持也是一個才能阿~', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(6, 5, '持之以恆方能成事。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(7, 5, '滴水能穿石。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(8, 5, '鍥而不捨，金石可鏤。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(9, 5, '天行健，君子以自強不息。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(10, 5, '如果你希望成功，當以恆心為良友，以經驗為參謀，以當心為兄弟，以希望為哨兵。 ', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(11, 5, '成功的秘訣在於恆心。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(12, 5, '天下無難事，唯堅忍二字，為成功之要訣。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(13, 5, 'ヾ(*´∀ ˋ*)ﾉ ', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(14, 5, '(๑•̀ω•́)ノ 還要繼續堅持下去喔!', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(15, 5, '｡:.ﾟヽ(*´∀`)ﾉﾟ.:｡ (灑花)', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(16, 5, '(๑•̀ㅂ•́)و✧ Fighting', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(17, 5, '我就知道你做得到<3', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(18, 5, '我就知道你一定可以的', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(19, 5, '太棒了，晚上一起去看電影吧', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(20, 5, '太棒了，晚上做飯給你吃', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(21, 5, '太棒了，下禮拜帶你去動物園當獎勵', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(22, 5, '就帶你吃麥當勞當獎勵吧', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00');

-- --------------------------------------------------------
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
(1, 3, '怎麼還沒', '？你已經長大了，還不懂得自動自發嗎？', 2, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(2, 5, '好學近乎知，力行近乎仁，知恥近乎勇。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(3, 3, '不要浪費時間了，趕快去', '！', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(4, 5, '學如逆水行舟，不進則退', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(5, 3, '記得今天要', '喔', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(6, 5, '成功不是將來才有的，而是從決定去做的那一刻起，持續累積而成。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(7, 3, '還沒', '？我看你是皮在癢了', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(8, 3, '還沒', '?卡緊勒啦！', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(9, 3, '答應媽媽的', '完成了沒', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(10, 3, '還不快點去', '！', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(11, 4, '少在那邊拖拖拉拉!', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(12, 5, '書山有路勤為徑，學海無涯苦作舟', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(13, 3, '又在幹麻？是忘了要', '嗎？', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(14, 1, '記得要養成', '，不然我會難過', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(15, 3, '現在不完成', '，看你以後怎麼辦！', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(16, 6, '為了', '妳一定要乖乖', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(17, 5, '天下難事，必作於易，天下大事，必作於細。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(18, 5, '吾生也有涯而，知也無涯', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(19, 1, '記得要', '！', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(20, 3, '會被你氣死，趕快去', '！', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(21, 5, '天行健，正人以自強不息。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(22, 3, '不要那麼懶好嗎？趕快去', '！', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(23, 1, '記得要養成', '，堅持下去！讓我幫你加油', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(24, 5, '不經一翻徹骨寒，怎得梅花撲鼻香。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(25, 3, '不是說好每天都要', '嗎?', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(26, 5, '業精於勤，荒於嬉', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(27, 3, '想吃竹筍炒肉絲嗎？怎麼還沒', '?', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(28, 5, '言必信 ，行必果', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(29, 4, '不要三分鐘熱度', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00');

-- --------------------------------------------------------
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
(1, 5, '當我眼睛閉上時 我就看不到', '', 2, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(2, 5, '台灣人在睡覺的時候 美國人都在工作', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(3, 5, '研究顯示，過越多生日的人越長壽', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(4, 5, '人就像樹一樣，被斧頭砍，就會死', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(5, 5, '在非洲，每六十秒，就有一分鐘過去', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(6, 5, '隔壁嬸婆說，凡是每天喝水的人，有很高機率會在100年內死去', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(7, 5, '每呼吸60秒，就減少一分鐘的壽命', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(8, 5, '當蝴蝶在南半球拍了兩下翅膀，牠就會稍微飛高一點點', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(9, 5, '跟據統計，未婚生子的人數中有高機率為女性', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(10, 5, '只要每天省下買一杯奶茶的錢，十天後就能買十杯奶茶', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(11, 5, '當你的左臉被我打，你的左臉就會痛', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(12, 5, '今年中秋節剛好是滿月、今年母親節正好是星期日', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(13, 5, '人被殺，就會死。', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(14, 5, '台灣競爭力低落，在美國就連小學生都會說流利的英語', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00'),
(15, 5, '你知道嗎?熱美式潑在大腿上比用喝的還有效', '', 1, '2020-11-17 05:52:00', '2020-11-17 05:52:00');

-- --------------------------------------------------------

--
-- 資料表索引 `chitchat`
--
ALTER TABLE `chitchat`
  ADD PRIMARY KEY (`id`);
-- 資料表索引 `joke`
--
ALTER TABLE `joke`
  ADD PRIMARY KEY (`id`);

--
--
-- 資料表索引 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `praise`
--
ALTER TABLE `praise`
  ADD PRIMARY KEY (`id`);