-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2025 年 8 月 01 日 07:58
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai10_php_all`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `kadai_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `comment`
--

INSERT INTO `comment` (`id`, `nickname`, `comment`, `created_at`, `updated_at`, `deleted_at`, `kadai_id`, `user_id`) VALUES
(12, 'session', 'sessuin', '2025-07-08 01:39:59', '2025-07-08 01:39:59', NULL, 7, 1),
(13, 'Koh', 'asas', '2025-07-08 01:40:22', '2025-07-08 01:40:22', NULL, 7, 1),
(14, 'ひで', 'fal;j', '2025-07-08 01:41:40', '2025-07-08 01:41:40', NULL, 7, 1),
(15, 'サファリ', 'ユーザ２', '2025-07-08 01:46:42', '2025-07-08 01:46:42', NULL, 7, 2),
(16, 'ユーザ３', 'クローム', '2025-07-09 20:51:04', '2025-07-09 20:51:04', NULL, 7, 3),
(17, 'Koh', 'あｆｋｌｆ', '2025-07-09 20:51:41', '2025-07-09 20:51:41', NULL, 8, 3),
(18, 'Koh２', 'XAMPPリスタート', '2025-07-09 20:56:12', '2025-07-09 20:56:12', NULL, 8, 3),
(19, '非同期同期', 'どっち', '2025-07-09 21:02:36', '2025-07-09 21:02:36', NULL, 8, 3),
(20, 'kl;k', 'lj；', '2025-07-09 21:02:50', '2025-07-09 21:02:50', NULL, 8, 3),
(21, 'l；；；ｌｋ', 'l；k；', '2025-07-09 21:02:57', '2025-07-09 21:02:57', NULL, 8, 3),
(22, 'update', 'updateeeeeeeeee', '2025-07-09 22:21:53', '2025-07-10 23:22:49', NULL, 7, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `developer`
--

CREATE TABLE `developer` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `developer`
--

INSERT INTO `developer` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ずす', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'test', '2025-07-09 21:10:22', '2025-07-09 21:10:22', NULL),
(3, 'test2', '2025-07-27 12:41:50', '2025-07-27 12:41:50', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai`
--

CREATE TABLE `kadai` (
  `id` int(11) NOT NULL,
  `kadai_no` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `repositoryUrl` text NOT NULL,
  `deployUrl` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `developer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `kadai`
--

INSERT INTO `kadai` (`id`, `kadai_no`, `title`, `repositoryUrl`, `deployUrl`, `created_at`, `updated_at`, `deleted_at`, `developer_id`) VALUES
(1, 1, 'チーズアカデミー LP', 'https://github.com/zusu14/kadai00_cheese', 'https://zusu14.github.io/kadai00_cheese/', '0000-00-00 00:00:00', '2025-07-27 14:31:29', NULL, 1),
(2, 2, '終わりなきCDジャケットクイズ', 'https://github.com/zusu14/kadai01_janken', 'https://zusu14.github.io/kadai01_janken/', '0000-00-00 00:00:00', '2025-07-27 14:31:47', NULL, 1),
(3, 3, 'イントロクイズ', 'https://github.com/zusu14/kadai02_janken_rich-3', 'https://zusu14.github.io/kadai02_janken_rich/', '0000-00-00 00:00:00', '2025-07-27 14:31:52', NULL, 1),
(4, 4, 'フライング・ラプター', 'https://github.com/zusu14/kadai03_memo', 'https://zusu14.github.io/kadai03_memo/', '0000-00-00 00:00:00', '2025-07-27 14:31:58', NULL, 1),
(5, 5, 'Co-Sketch', 'https://github.com/zusu14/kadai04_chat', 'https://zusu14.github.io/kadai04_chat/', '0000-00-00 00:00:00', '2025-07-27 14:32:04', NULL, 1),
(6, 6, 'Astronomy Picture of the Day（NASA API）', 'https://github.com/zusu14/kadai05_api', 'https://zusu14.github.io/kadai05_api/', '0000-00-00 00:00:00', '2025-07-27 14:32:18', NULL, 1),
(7, 7, '掲示板サイト', 'https://github.com/zusu14/kadai06_basic_php', 'https://zusu.sakura.ne.jp/kadai06_basic_php/', '0000-00-00 00:00:00', '2025-07-27 14:32:28', NULL, 1),
(8, 8, '掲示板サイトv2', 'https://github.com/zusu14/kadai07_db1', 'https://zusu.sakura.ne.jp/gs/kadai07_db1/kadai_list.php', '0000-00-00 00:00:00', '2025-07-27 14:32:47', NULL, 1),
(9, 1, 'kadai00', '', '', '2025-07-27 15:02:43', '2025-07-27 15:06:58', NULL, 2),
(10, 2, 'kadai01', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(11, 3, 'kadai02', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(12, 4, 'kadai03', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(13, 5, 'kadai04', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(14, 6, 'kadai05', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(15, 7, 'kadai06', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(16, 8, 'kadai07', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(17, 9, 'kadai08', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(18, 10, 'kadai09', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(19, 11, 'kadai10', '', '', '2025-07-27 15:04:24', '2025-07-27 15:06:58', NULL, 2),
(20, 1, 'kadai00', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(21, 2, 'kadai01', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(22, 3, 'kadai02', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(23, 4, 'kadai03', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(24, 5, 'kadai04', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(25, 6, 'kadai05', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(26, 7, 'kadai06', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(27, 8, 'kadai07', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(28, 9, 'kadai08', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(29, 10, 'kadai09', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3),
(30, 11, 'kadai10', '', '', '2025-07-27 15:04:56', '2025-07-27 15:07:04', NULL, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai_theme`
--

CREATE TABLE `kadai_theme` (
  `kadai_no` int(11) NOT NULL,
  `kadai_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `kadai_theme`
--

INSERT INTO `kadai_theme` (`kadai_no`, `kadai_name`) VALUES
(1, 'kadai00_cheese'),
(2, 'kadai01_janken'),
(3, 'kadai02_janken_rich'),
(4, 'kadai03_memo'),
(5, 'kadai04_chat'),
(6, 'kadai05_api'),
(7, 'kadai06_basic_php'),
(8, 'kadai07_db1'),
(9, 'kadai08_db2'),
(10, 'kadai09_auth'),
(11, 'kadai10_php_all');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `uuid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3801b6c7485b06b9f3b34860fb84306e', '2025-07-08 00:07:04', '2025-07-08 00:07:04', NULL),
(2, '5d163a4af81e8219eec95b975309be7d', '2025-07-08 01:46:42', '2025-07-08 01:46:42', NULL),
(3, 'c7aabfaa0efb04576f6a6c3c05363eda', '2025-07-09 20:51:04', '2025-07-09 20:51:04', NULL),
(4, 'd32c3821e01c1f3e1c26192f08abb3e2', '2025-07-15 22:49:48', '2025-07-15 22:49:48', NULL),
(5, 'cf6939fe9bebadd9e2c3dc4e6301f368', '2025-07-27 16:58:08', '2025-07-27 16:58:08', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `kadai`
--
ALTER TABLE `kadai`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `kadai_theme`
--
ALTER TABLE `kadai_theme`
  ADD PRIMARY KEY (`kadai_no`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- テーブルの AUTO_INCREMENT `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `kadai`
--
ALTER TABLE `kadai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
