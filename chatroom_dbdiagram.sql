CREATE TABLE `users` (
  `user_id` int PRIMARY KEY,
  `user_name` varchar(255) UNIQUE NOT NULL,
  `gender` varchar(255),
  `birthday` date,
  `mail` varchar(255),
  `user_photo` varchar(255) COMMENT '使用者照片'
);

CREATE TABLE `chatrooms` (
  `chatroom_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `nick_name` varchar(255) COMMENT '在聊天室中對user的稱呼',
  `role_id` int(11) COMMENT '角色類型，如媽媽、老師',
  `role_name` varchar(255) COMMENT '聊天室中對角色的稱呼',
  `role_photo` varchar(255) COMMENT '聊天角色的照片',
  `habbit_id` int(11) COMMENT '習慣分類，如學習、健康',
  `habbit_name` varchar(255) COMMENT '要養成的習慣名稱',
  `habbit_status` varchar(255) COMMENT '當前習慣狀態',
  `signed_time` time COMMENT '每日簽到、打卡的時間點',
  `original_intention` varchar(255) COMMENT '養成習慣的初衷',
  `goodnees` varchar(255) COMMENT '養成習慣的好處',
  `badnees` varchar(255) COMMENT '不養成會造成的壞處',
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime DEFAULT (now())
);

CREATE TABLE `remind_time` (
  `remind_id` int PRIMARY KEY AUTO_INCREMENT,
  `chatroom_id` int,
  `remind_time` time COMMENT '提醒時間'
);

CREATE TABLE `posts` (
  `post_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `title` varchar(255) COMMENT '貼文標題',
  `content` varchar(255) COMMENT '貼文內容',
  `created_at` datetime DEFAULT (now()),
  `updated_at` datetime DEFAULT (now())
);

CREATE TABLE `likes` (
  `like_id` int PRIMARY KEY AUTO_INCREMENT,
  `post_id` int,
  `user_id` int NOT NULL
);

CREATE TABLE `habbit_cat` (
  `habbit_id` int PRIMARY KEY AUTO_INCREMENT COMMENT '習慣分類',
  `habbit_cat_name` varchar(255)  COMMENT '習慣類名稱'
);

CREATE TABLE `role_cat` (
  `role_id` int PRIMARY KEY AUTO_INCREMENT,
  `role_cat_name` varchar(255) COMMENT '角色分類名稱'
);

CREATE INDEX `chatrooms_index_0` ON `chatrooms` (`role_id`);

CREATE INDEX `chatrooms_index_1` ON `chatrooms` (`habbit_id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

ALTER TABLE `chatrooms` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `posts` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `remind_time` ADD FOREIGN KEY (`chatroom_id`) REFERENCES `chatrooms` (`chatroom_id`);

ALTER TABLE `likes` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `chatrooms` ADD FOREIGN KEY (`habbit_id`) REFERENCES `habbit_cat` (`habbit_id`);

ALTER TABLE `chatrooms` ADD FOREIGN KEY (`role_id`) REFERENCES `role_cat` (`role_id`);

