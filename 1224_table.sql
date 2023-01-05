-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-01-05 20:02:53
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db_1224`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `1224_table`
--

CREATE TABLE `1224_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `fname` varchar(225) NOT NULL,
  `uname` varchar(64) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `1224_table`
--

INSERT INTO `1224_table` (`id`, `title`, `content`, `fname`, `uname`, `indate`) VALUES
(2, 'タイトル', '内容', 'スクリーンショット_20221027_215520.png', 'ああああ', '2023-01-06 03:43:28'),
(3, 'ウユニ塩湖', 'ウユニ塩湖行ってきた', 'ウユニ.jpg', '田中', '2023-01-05 21:16:12'),
(4, 'スイス', 'ヨーロッパ行ってきた', 'ヨーロッパ.jfif', '⸜(๑’ᵕ’๑)⸝｜kawaiiものが好き', '2023-01-05 21:21:17'),
(5, '富士山', '富士山行ってきた', '富士山.jfif', '山内征四郎', '2023-01-06 03:44:17');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `1224_table`
--
ALTER TABLE `1224_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `1224_table`
--
ALTER TABLE `1224_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
