-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 04:42 AM
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
-- Table structure for table `action_game`
--

CREATE TABLE `action_game` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `des` text NOT NULL,
  `info` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `action_game`
--

INSERT INTO `action_game` (`id`, `name`, `img`, `des`, `info`, `comment`) VALUES
(1, 'Call of Duty', 'game_img/action_img/callofduty.png', '4.9', 'Call of Duty: Mobile là một trò chơi được tải miễn phí trên di động, tập hợp các bản đồ, vũ khí và nhân vật trong toàn bộ series Call Of Duty mang đến cho người chơi trải nghiệm hoàn hảo nhất. Được xuất bản bởi Activision\r\n/n\r\nNgày phát hành ban đầu: 1 tháng 10, 2019\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nCác nhà phát triển: Activision, Timi Studio Group, Tencent Games\r\n/n\r\nCác nền tảng: Android, iOS, iPadOS', 'adc05102002@gmail.com_aa/nadc05102002@gmail.com_aaa aaa/nadc05102002@gmail.com_good game/n'),
(2, 'Apex Legends', 'game_img/action_img/apexlegends.png', '3.8', 'Apex Legends là một trò chơi battle royale chơi miễn phí được phát triển bởi Respawn Entertainment và phát hành bởi Electronic Arts. Lấy bối cảnh cùng vũ trụ với Titanfall, trò chơi được phát hành cho các nền tảng Microsoft Windows, PlayStation 4, và Xbox One vào ngày 4 tháng 2 năm 2019\r\n/n\r\nNgày phát hành ban đầu: 4 tháng 2, 2019\r\n/n\r\nLoạt trò chơi: Titanfall\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nNhà xuất bản: Electronic Arts\r\n/n\r\nCác nền tảng: PlayStation 4, Nintendo Switch, PlayStation 5', ''),
(3, 'Brawlhalla', 'game_img/action_img/brawlhalla.png', '5.0', 'Brawlhalla là một trò chơi chiến đấu miễn phí được phát triển bởi Blue Mammoth Games và được xuất bản bởi Ubisoft cho macOS, Microsoft Windows, PlayStation 4, PlayStation 5, Nintendo Switch, Xbox One, Xbox Series S & X, Android và iOS, với đầy đủ -chơi trên tất cả các nền tảng.\r\n/n\r\nNgày phát hành ban đầu: 30 tháng 4, 2014\r\n/n\r\nNhà phát triển: Blue Mammoth Games\r\n/n\r\nCác nền tảng: PlayStation 4, Nintendo Switch, Android, Xbox One\r\n/n\r\nThể loại: Trò chơi điện tử đối kháng, Trò chơi đi cảnh, Dòng game độc lập, Party\r\n', ''),
(4, 'Brawl Stars', 'game_img/action_img/brawlstars.png', '4.8', 'Brawl Stars là một trò chơi điện tử đấu trường chiến đấu trực tuyến nhiều người chơi, bắn súng anh hùng góc nhìn thứ ba được phát triển và phát hành bởi công ty trò chơi điện tử Phần Lan Supercell. Nó đã được phát hành trên toàn thế giới vào ngày 12 tháng 12 năm 2018 trên iOS và Android.\r\n/n\r\nNgày phát hành ban đầu: 15 tháng 6, 2017\r\n/n\r\nNhà phát triển: Supercell\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/\r\nNhà xuất bản: Supercell\r\n/n\r\nĐề cử: Giải thưởng Video Game của Viện Hàn lâm Anh quốc cho Game di động EE của năm\r\n/n\r\nThể loại: Đấu trường trận chiến trực tuyến nhiều người chơi, Trò chơi nhập vai hành động\r\n/n\r\nCác nền tảng: Android, iOS, iPadOS', ''),
(5, 'Last Hope 3', 'game_img/action_img/lasthope3.png', '4.5', 'Last Hope 3 là một game offline với đồ họa 3D chân thực. Trải nghiệm một chiến dịch câu chuyện ly kỳ và vui nhộn. Sử dụng súng trường bắn tỉa của bạn để ám sát các mục tiêu đã chết của bạn và sống sót trong các trận đánh trùm nguy hiểm với vũ khí tấn công của bạn.\r\n/n\r\nNhà xuất bản: JE Software AB\r\n/n\r\nNền tảng: Android', ''),
(6, 'Modern Combat 5', 'game_img/action_img/moderncombat5.png', '4.7', 'Modern Combat 5, còn được gọi là Modern Combat 5: Blackout là một game bắn súng góc nhìn thứ nhất năm 2014 được phát triển bởi Gameloft Bucharest và được xuất bản bởi Gameloft. Đây là phần thứ năm của loạt phim Modern Combat và phần tiếp theo của Modern Combat 4: Zero Hour.\r\n/n\r\nNgày phát hành ban đầu: tháng 7 năm 2014\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nNhà xuất bản: Gameloft\r\n/n\r\nLoạt trò chơi: Modern Combat\r\n/n\r\nThể loại: Bắn súng góc nhìn người thứ nhất, Free-to-play, Massively Multiplayer\r\n/n\r\nCác nhà phát triển: Gameloft, Gameloft Bucharest\r\n/n\r\nCác nền tảng: Nintendo Switch, GeForce Now, Android, Microsoft Windows, iOS, BlackBerry, Windows Phone, Tizen, tvOS', ''),
(7, 'PUBG Mobile', 'game_img/action_img/pupg.png', '4.6', 'PUBG Mobile là một trò chơi điện tử battle royale miễn phí được phát triển bởi LightSpeed ​​& Quantum Studio, một bộ phận của Tencent Games. Nó là một trò chơi di động chuyển thể từ PUBG: Battlegrounds. Ban đầu nó được phát hành cho Android và iOS vào ngày 19 tháng 3 năm 2018. \r\n/n\r\nNgày phát hành ban đầu: 19 tháng 3, 2018\r\n/n\r\nThể loại: Chiến đấu sinh tồn\r\n/n\r\nCác chế độ: Trò chơi điện tử nhiều người chơi, Trò chơi điện tử một người chơi\r\n/n\r\nCác nhà xuất bản: Tencent Games, Krafton\r\n/n\r\nCác nhà phát triển: Lightspeed & Quantum, Tencent Games\r\n/n\r\nĐề cử: Giải The Game cho Game di động xuất sắc nhất\r\n/n\r\nCác nền tảng: Android, iOS, iPadOS', ''),
(8, 'Shadow Fight 2', 'game_img/action_img/shadowfight2.png', '5.0', 'Shadow Fight 2 là một trò chơi chiến đấu nhập vai được xuất bản và phát triển bởi Nekki có trụ sở tại Cyprus. Đây là phần thứ hai trong sê-ri Shadow Fight và được phát hành mềm vào ngày 22 tháng 10 năm 2013.\r\n/n\r\nNgày phát hành ban đầu: 9 tháng 10, 2013\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nNhà xuất bản: Nekki\r\n/n\r\nCác nhà phát triển: Nekki, iLogos Europe\r\nCác nền tảng: Android, iOS, Nintendo Switch, Microsoft Windows, Windows Phone, Mac OS\r\n/n\r\nThể loại: Trò chơi điện tử đối kháng, Trò chơi hành động, Trò chơi điện tử nhập vai\r\n', ''),
(9, 'Shadow Fight 3', 'game_img/action_img/shadowfight3.png', '4.9', 'Shadow Fight 2 là một trò chơi chiến đấu nhập vai được xuất bản và phát triển bởi Nekki có trụ sở tại Cyprus. Đây là phần thứ hai trong sê-ri Shadow Fight và được phát hành mềm vào ngày 22 tháng 10 năm 2013.\r\n/n\r\nNhà phát triển: Nekki\r\n/n\r\nNhà xuất bản: Nekki\r\n/n\r\nLoạt trò chơi: Shadow Fight\r\n/n\r\nThể loại: Trò chơi điện tử đối kháng, Trò chơi nhập vai\r\n/n\r\nCác nền tảng: Android, iOS\r\n', ''),
(10, 'World War Heroes', 'game_img/action_img/worldwarheroes.png', '4.4', 'Lấy bối cảnh Thế chiến II ở Châu Âu, World War Heroes là tựa game bắn súng FPS tự động đỉnh cao với chất lượng đồ họa cực khủng. Người chơi sẽ hòa mình vào bối cảnh chiến tranh tàn khốc và khoác lên mình lớp áo lính của những phe tham chiến.\r\n/n\r\nNgày phát hành ban đầu: 4 tháng 7, 2017\r\n/n\r\nNhà xuất bản: Azur Interactive Games Limited\r\n/n\r\nCác nền tảng: Android, iOS\r\n', ''),
(11, 'Zooba', 'game_img/action_img/zooba.png', '4.8', 'Ngày phát hành ban đầu: 2 tháng 10, 2019\r\n/n\r\nNhà xuất bản: Wildlife Studios\r\n/n\r\nNhà phát triển: Wildlife Studios\r\n/n\r\nCác nền tảng: Android, iOS', ''),
(12, 'Dan The Man', 'game_img/action_img/dantheman.png', '4.9', 'Dan The Man là một trò chơi điện tử đánh bại nền tảng di động năm 2015 được phát triển và xuất bản bởi Halfbrick Studios với sự hợp tác của Studio JOHO. Dựa trên một loạt web cùng tên, nó đã được phát hành cho iOS và Android.\r\n/n\r\nNgày phát hành ban đầu: 25 tháng 11, 2015\r\n/n\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\n/n\r\nNhà xuất bản: HalfBrick Studios\r\n/n\r\nNhà phát triển: HalfBrick Studios\r\n/n\r\nCác nền tảng: Android, iOS\r\n/n\r\nThể loại: Trò chơi đi cảnh, Trò chơi điện tử đối kháng, Beat \'em up', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_game`
--
ALTER TABLE `action_game`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_game`
--
ALTER TABLE `action_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
