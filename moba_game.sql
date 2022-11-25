-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 04:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `moba_game`
--

CREATE TABLE `moba_game` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `des` text NOT NULL,
  `info` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moba_game`
--

INSERT INTO `moba_game` (`id`, `name`, `img`, `des`, `info`, `comment`) VALUES
(1, 'Arena Of Valor', 'game_img/moba_img/aov.png', '4.8', 'Garena Liên Quân Mobile là một trò chơi đấu trường trận chiến trực tuyến nhiều người chơi do TiMi Studios, một studio trực thuộc Tencent Games phát triển và phát hành bởi Garena, phân phối trên các nền tảng di động Android, iOS và Nintendo Switch, bắt đầu từ cuối năm 2016\r\n/n\r\nNgày phát hành ban đầu: 13 tháng 10, 2016\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nĐề cử: Giải The Game cho Trò chơi Trung Quốc xuất sắc nhất\r\n/n\r\nThể loại: Đấu trường trận chiến trực tuyến nhiều người chơi, Trò chơi nhập vai hành động\r\n/n\r\nCác nhà xuất bản: Garena, Tencent Games, Level Infinite\r\n/n\r\nCác nhà phát triển: Timi Studio Group, Tencent Games\r\n/n\r\nCác nền tảng: iOS, Android, Nintendo Switch, iPadOS\r\n', ''),
(2, 'Dota Underlords', 'game_img/moba_img/dotaunderlords.png', '4.1', 'Dota Underlords là một trò chơi chiến đấu tự động năm 2020 được phát triển và xuất bản bởi Valve. Trò chơi dựa trên chế độ chơi nổi tiếng do cộng đồng tạo ra trong Dota 2 có tên là Dota Auto Chess, được phát hành vào tháng 1 năm 2019.\r\n/n\r\nNgày phát hành ban đầu: tháng 6 năm 2019 \r\n/n\r\nLoạt trò chơi: Dota\r\n/n\r\nNhà xuất bản: Valve\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nNhà phát triển: Valve\r\n/n\r\nThể loại: Auto battler, Trò chơi điện tử chiến lược, Free-to-play, Trò chơi phổ thông, Strategy\r\n/n\r\nCác nền tảng: Linux, macOS, GeForce Now, Android, Microsoft Windows, iOS, Mac OS cổ điển, Mac OS', ''),
(3, 'Extraordinary Ones', 'game_img/moba_img/extraordinaryones.png', '5.0', 'Extraordinary Ones là tựa game mobile thể loại MOBA 5vs5, với mỗi nhân vật trong game đều mang trên mình một phong cách anime Nhật bản.\r\n/n\r\nNgày phát hành ban đầu: 15 tháng 1, 2020\r\n/n\r\nNhà xuất bản: NetEase\r\n/n\r\nCác nền tảng: Android, iOS', ''),
(4, 'Frayhem', 'game_img/moba_img/frayhem.png', '4.4', 'Nhà xuất bản: Gearage\r\n/n\r\nNền tảng: Android', ''),
(5, 'Heroes Evolved', 'game_img/moba_img/heroesevolved.png', '3.9', 'Được biết, Heroes Evolved là một tân binh MOBA được phát hành lên nền tảng di động đưa người chơi đến với những trận chiến 5v5 gây cấn, kịch tính không kém gì trên PC.\r\n/n\r\nNhà phát triển: Net Dragon\r\n/n\r\nCác nhà xuất bản: NetDragon Websoft, R2games\r\n/n\r\nThể loại: Trò chơi nhập vai, Trò chơi hành động, Free-to-play, Trò chơi phổ thông, Massively Multiplayer, Strategy\r\n/n\r\nCác nền tảng: Android, iOS, Microsoft Windows', ''),
(6, 'Heroes Of Order & Chaos', 'game_img/moba_img/heroesoforder&chaos.png', '4.1', 'GameHub.vn - Heroes of Order & Chaos là một tựa game Moba đình đám trên Mobile do Gameloft phát triển dành cho cả hai nền tảng là iOS và Android. Trong game, người chơi sẽ được trải nghiệm 30 anh hùng với những sức mạnh khác nhau trong các trận chiến 3 vs 3 hay 5 vs 5 đầy khốc liệt.\r\n/n\r\nNgày phát hành ban đầu: 21 tháng 11, 2012\r\n/n\r\nNhà phát triển: Gameloft\r\n/n\r\nNhà xuất bản: Gameloft\r\n/n\r\nLoạt trò chơi: Order and Chaos\r\n/n\r\nCác nền tảng: Android, Microsoft Windows', ''),
(7, 'League Of Masters', 'game_img/moba_img/leagueofmasters.png', '4.7', 'Nhà xuất bản: Lunosoft\r\n/n\r\nNền tảng: Android', ''),
(8, 'Legend Of Ace', 'game_img/moba_img/legendoface.png', '4.4', 'Nhà xuất bản: Still Gaming\r\n/n\r\nNền tảng: Android', ''),
(9, 'League Of Legends: Wild Rift', 'game_img/moba_img/LMHT.png', '4.8', 'Liên Minh Huyền Thoại: Tốc Chiến hay rút gọn lại là Tốc Chiến là một trò chơi điện tử đấu trường trận chiến trực tuyến nhiều người chơi được phát triển và phát hành bởi Riot Games, dành cho các thiết bị di dộng Android, iOS và máy chơi game cầm tay. Trò chơi là phiên bản di động của Liên Minh Huyền Thoại.\r\n/n\r\nNgày phát hành ban đầu: 2020\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nNhà xuất bản: Riot Games\r\n/n\r\nNhà phát triển: Riot Games\r\n/n\r\nĐề cử: Giải The Game cho Game di động xuất sắc nhất\r\n/n\r\nThể loại: Đấu trường trận chiến trực tuyến nhiều người chơi, Trò chơi nhập vai hành động\r\n/n\r\nCác nền tảng: Android, iOS, iPadOS', ''),
(10, 'Mobile Legends', 'game_img/moba_img/mobilelegends.png', '4.7', 'Mobile Legends: Bang Bang là một trò chơi đấu trường trực truyến nhiều người chơi trên nền tảng di động được phát triển và phát hành bởi Shanghai Moonton Technology. Trò chơi đã trở nên phổ biến tại Đông Nam Á và sẽ là môn thi đấu có huy chương tại Đại hội Thể thao Đông Nam Á 2019.\r\n/n\r\nNgày phát hành ban đầu: 14 tháng 7, 2016\r\n/n\r\nNhà xuất bản: Moonton\r\n/n\r\nNhà phát triển: Moonton\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nCông nghệ: Unity\r\n/n\r\nThể loại: Đấu trường trận chiến trực tuyến nhiều người chơi, Trò chơi nhập vai hành động\r\n/n\r\nCác nền tảng: iOS, Android', ''),
(11, 'Onmyoji Arena', 'game_img/moba_img/onmyojiarena.png', '5.0', 'Tham gia chơi Onmyoji Arena, game thủ sẽ được tham gia vào một trận chiến 5v5 với những người trong vai các Thức Thần của thế giới Onmyoji. Ở đó, game thủ sẽ sở hữu đầy đủ các yếu tố chính như bản đồ 3 lane, creep, hệ thống lên cấp độ, cộng skill cũng như trang bị phong phú.\r\n/n\r\nNhà xuất bản: NetEase\r\n/n\r\nCác nền tảng: iOS, Android', ''),
(12, 'TheTan Arena', 'game_img/moba_img/thetanarena.png', '4.5', 'Nhà phát triển: Wolffun Pte Ltd\r\n/n\r\nNhà xuất bản: Wolffun Pte Ltd\r\n/n\r\nCác nền tảng: Android, iOS, Microsoft Windows', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moba_game`
--
ALTER TABLE `moba_game`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `moba_game`
--
ALTER TABLE `moba_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
