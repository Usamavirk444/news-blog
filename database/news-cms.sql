-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 08:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'Sports', 3),
(31, 'Entertainment', 1),
(32, 'Politics', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(42, 'These Three Top Cricketers Have Chosen To Play BPL Over PSL', 'dates of the Pakistan Super League (PSL) and Bangladesh Premier League (BPL) are expected to clash as both the tournaments will take place in January. Although, Bangladesh Cricket Board (BCB) hasn’t announced the schedule yet but the BPL will most likely start in January. PSL will also commence from January 27th.\r\n\r\n“We are not worried about the PSL and we are expecting to host the players draft of this month but the only thing that we are worried about is the corona situation,” Sheikh Sohel, BPL governing council member said on Monday.\r\n\r\nThe clash of dates between the two tournaments has left the foreign cricketers with the choice of choosing only one tournament. Now, according to reports, three top cricketers have preferred BPL over PSL. The three cricketers include Faf du Plessis, Sunil Narine and Moeen Ali. They will represent the Comilla Victorians, the two-time champions of the BPL.It was confirmed by the managing director of Comilla, Nafisa Kamal. She said that the three cricketers will play for her’s team in the upcoming edition of BPL. Their decision to play in the BPL was the reason behind them not registering for PSL. The players were also not part of the PSL draft ', '30', '19 Feb, 2022', 24, '522041_37898760.jpg'),
(37, 'PSL 7 Presenter Erin Holland Winning Hearts With Her Stunning Shalwar Kameez Looks', 'The gorgeous Australian star Erin Holland is back with her stunning looks in desi outfits. She recently stunned everyone with her perfect looks at the opening matches of PSL 7 in Karachi.\r\n\r\nErin has been winning the hearts of Pakistanis with her elegant and beautiful attires.\r\nErin Holland is an Australian singer, television host, model, dancer, and charity worker. She was crowned Miss World Australia in July of 2013. \r\n\r\nHolland is the wife of Australian cricketer Ben Cutting, who is currently playing for Peshawar Zalmi in the Pakistan Super League. She is presently a Pakistan Super League presenter.', '30', '19 Feb, 2022', 24, 'er.jpg'),
(45, 'Selena Gomez\'s', 'Hello all –\r\n\r\nBased briefly on the title, I’m sure you can all guess what this will be about. Whether you are posting a comment here on my blog or on any of my other more public sites, please be sure you don’t leave any personal information such as your address or phone number. Though you may not be aware of the dangers you are bringing to yourself, I just want all of you to be as safe as possible!\r\n\r\nAlso, I would like to bring to light that I’ve seen some people trying to pass as me and reply to some of you all. Please note that even though I don’t make blog posts as often as I used to, I do log on from time to time. I do try to reply to you all when I have the time, but it’s not very often. If you are unsure of whether I am the person you are talking to, here’s a quick way to know. My profile when I’m commenting looks a little something like this:\r\n\r\n', '31', '19 Feb, 2022', 24, '1000x1000.jpg.crdownload'),
(44, 'PSL 2022: Here’s Why Namibian Captain Offered To Play For Free', 'Namibian captain Gerhard Erasmus has offered to play for free in the Pakistan Super League (PSL) 7. Gerhard Erasmus was replying to a tweet on social networking site.\r\n\r\nEarlier, Wicketkeeper-batter Kamran Akmal had refused to play for the Peshawar Zalmi after the former PSL champions picked him in the lowest category of players.“If it has to end like this, so be it, but I am not going to play with such humiliation. This is an embarrassment. You don’t treat a player like this. With all the runs I have scored in the league, I deserve better,” Kamran Akmal had said.\r\n\r\nReplying to an ESPNcricinfo tweet, the Namibian skipper wrote: “Pick me, I’ll be there for free.”', '30', '19 Feb, 2022', 24, 'DA6378636D0F.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'Usama', 'Virk', 'usama4444', 'admin', 1),
(25, 'Rehan', 'Ch', 'rehan406', 'user', 1),
(27, 'test', '1', 'teast01', 'test1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
