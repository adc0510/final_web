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
-- Table structure for table `puzzle_game`
--

CREATE TABLE `puzzle_game` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `des` text NOT NULL,
  `info` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `puzzle_game`
--

INSERT INTO `puzzle_game` (`id`, `name`, `img`, `des`, `info`, `comment`) VALUES
(1, '2048', 'game_img/puzzle_img/2048.png', '4.7', '2048 là một trò chơi giải đố do tác giả Gabriele Cirulli, một lập trình viên web trẻ 19 tuổi người Ý, tạo ra vào tháng 3 năm 2014. Mục tiêu của trò chơi là trượt các khối vuông có mang số trên một lưới vuông để kết hợp chúng lại và tạo ra khối vuông có giá trị 2048.\r\n/n\r\nNgày phát hành ban đầu: 9 tháng 3, 2014\r\n/\r\nNhà xuất bản: Solebon LLC\r\n/n\r\nChế độ: Trò chơi điện tử một người chơi\r\n/n\r\nThể loại: Trò chơi video giải đố\r\n/n\r\nNhà phát triển: Gabriele Cirulli\r\nCác nền tảng: Microsoft Windows, iOS, Android, Nintendo 3DS\r\n/n\r\nNgôn ngữ lập trình: JavaScript', ''),
(2, 'Atomas', 'game_img/puzzle_img/atomas.png', '4.2', 'Được dịch từ tiếng Anh-Atomas là một trò chơi giải đố theo chủ đề khoa học có sẵn trên IOS và Android. Mục tiêu là đạt điểm cao nhất bằng cách kết hợp các yếu tố. Atomas được phát triển bởi Sirnic Games và phát hành vào ngày 24 tháng 2 năm 2015.\r\n/n\r\nNgày phát hành ban đầu: 24 tháng 2, 2015\r\n/n\r\nNhà xuất bản: Max Gittel\r\n/n\r\nCác nền tảng: Android, iOS', ''),
(3, 'Brain Training', 'game_img/puzzle_img/braintraining.png', '4.6', 'Nhà xuất bản: Senior Games\r\n/n\r\nNền tảng: Android', ''),
(4, 'Cut The Rope', 'game_img/puzzle_img/cutherope.png', '4.5', 'Cut the Rope là một trò chơi điện tử thể loại giải đố dựa trên vật lý nhiều phần của nhà phát triển Nga ZeptoLab thiết kế cho nhiều dạng máy và thiết bị chơi. Loạt trò chơi bao gồm Cut the Rope, Cut the Rope: Experiments, Cut the Rope: Time Travel và Cut the Rope 2\r\n/n\r\nNhà phát triển: ZeptoLab', ''),
(5, 'IQ dungeon', 'game_img/puzzle_img/iqdungeon.png', '4.8', 'Nhà xuất bản: Hirameku\r\n/n\r\nNền tảng: Android', ''),
(6, 'Mekorama', 'game_img/puzzle_img/mekorama.png', '4.6', 'Mekorama là một trò chơi giải đố của nhà phát triển Thụy Điển Martin Magni được phát hành trên Android, iOS và Nintendo Switch. Trò chơi cho phép người chơi tạo ra các cấp độ tùy chỉnh của riêng mình. Nó đã được trao Giải thưởng Danh dự của Ban giám khảo trong Giải thưởng Trò chơi Di động Quốc tế 2017.\r\n/n\r\nNgày phát hành ban đầu: 15 tháng 5, 2016\r\n/n\r\nChế độ: Trò chơi điện tử một người chơi\r\n/n\r\nNgười thiết kế: Martin Magni\r\nCác nền tảng: Nintendo Switch, PlayStation 4, Xbox One, Android, iOS, PlayStation Vita, Nintendo 3DS\r\n/n\r\nCác nhà phát triển: Martin Magni, Ratalaika Games S.L.\r\n/n\r\nThể loại: Trò chơi video giải đố, Interactive novel\r\n/n\r\nCác nhà xuất bản: Martin Magni, Rainy Frog', ''),
(7, 'Push & Pop', 'game_img/puzzle_img/push&pop.png', '4.1', 'Nhà xuất bản: Rocky Hong\r\n/n\r\nNền tảng: Android', ''),
(8, 'Sum Sudoku', 'game_img/puzzle_img/sumsudoku.png', '4.7', 'Ứng dụng Sudoku.com có hàng ngàn câu đố sudoku cổ điển để giúp bạn thử thách trí não của mình hoặc đơn giản là giảm căng thẳng và thư giãn. Cài đặt để chơi ngay! Sudoku cổ điển dành cho người mới bắt đầu và người chơi có kinh nghiệm.\r\n/n\r\nNhà xuất bản: Easybrain\r\n/n\r\nNền tảng: Android', ''),
(9, 'Tetris', 'game_img/puzzle_img/tetris.png', '4.8', 'Tetris là một trò chơi điện tử đầu tiên được thiết kế và phát triển bởi nhà khoa học máy tính người Liên Xô Alexey Pajitnov. Trò chơi được tạo ra vào ngày 6 tháng 6 năm 1984, trong lúc ông đang làm việc tại Trung tâm Tính toán Dorodnicyn của Viện hàn lâm Khoa học Liên Xô tại Moskva.\r\n/n\r\nNgày phát hành ban đầu: 6 tháng 6, 1984\r\nChế độ: Trò chơi điện tử nhiều người chơi\r\nCác nhà phát triển: Alexey Pajitnov, Sega, Philips\r\n/n\r\nCác nhà xuất bản: Nintendo, Vanguard Works, PLAYSTUDIOS, Spectrum HoloByte, EA Mobile, Tandy Corporation, Mirrorsoft\r\n/n\r\nCác nền tảng: Game Boy, Nintendo Entertainment System\r\n/n\r\nThể loại: falling block puzzle game, Trò chơi điện tử xếp hình, Trò chơi điện tử chiến lược\r\n/n\r\nNhững người thiết kế: Alexey Pajitnov, Vladimir Pokhilko', ''),
(10, 'Wood Block Puzzle', 'game_img/puzzle_img/woodblockpuzzle.png', '4.6', 'Nhà xuất bản: Beetles Studio\r\n/n\r\nNền tảng: Android', ''),
(11, 'ZHED', 'game_img/puzzle_img/zhed.png', '4.9', 'Ngày phát hành ban đầu: 21 tháng 4, 2017\r\n/n\r\nNhà phát triển: Filipe Abrantx\r\n/n\r\nNhà xuất bản: Filipe Abrantx\r\n/n\r\nThể loại: Trò chơi video giải đố, Trò chơi phổ thông, Dòng game độc lập\r\n/n\r\nCác nền tảng: Nintendo Switch, Android, Microsoft Windows, iOS, macOS, Mac OS', ''),
(12, 'Candy Crush Saga', 'game_img/puzzle_img/candycrushsaga.png', '5.0', 'Candy Crush Saga là trò chơi điện tử được phát triển bởi hãng King Mobile. Trò chơi đã thu hút được lượng người chơi khổng lồ và mang về những khoản lợi nhuận lớn.\r\n/n\r\nNgày phát hành ban đầu: 12 tháng 4, 2012\r\n/n\r\nThể loại: Trò chơi video giải đố\r\n/n\r\nNhà phát triển: King\r\n/n\r\nNhà xuất bản: King\r\n/n\r\nGiải thưởng: Giải Sự lựa chọn của Công chúng cho Game di động được yêu thích nhất\r\n/n\r\nĐề cử: Giải Sự lựa chọn của trẻ em của kênh Nickelodeon cho Trò chơi điện tử được yêu thích nhất\r\n/n\r\nCác nền tảng: Android, Trình duyệt web, Microsoft Windows, iOS, Windows Phone, Tizen, Fire OS\r\n', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `puzzle_game`
--
ALTER TABLE `puzzle_game`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `puzzle_game`
--
ALTER TABLE `puzzle_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
