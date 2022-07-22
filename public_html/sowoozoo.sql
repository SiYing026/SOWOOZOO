-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 04:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sowoozoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(1, 'Memorable Helicopter Experiences', 'Our beautiful planet is home to an abundance of spectacular scenery and epic cities, some of which are best explored from above. Taking a helicopter tour not only provides travelers with an unforgettable bird’s-eye perspective of an area, it also offers a thrilling and entertaining experience and plenty of postcard-perfect photo-ops.\r\n</br></br>\r\nIn addition, helicopter tours are often the only way visitors can enjoy viewing more remote areas of a region.', 'images/about_1.jpg'),
(2, 'Pilot For A Day Experience', 'Stop Dreaming and Start Flying. Like the philosopher said \"A journey of a thousand miles begins with the first step\" and your first step is to get into an airplane and experience piloting first hand.\r\n</br></br>\r\nThe best way to find out what flying is all about is to try it yourself. That\'s why we specially offer One Day Pilot Flying Experience just for you. They\'re designed to get you into the air for a hand’s on evaluation of flight. Pilot for a day is fun, safe, and inexpensive!', 'images/about_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `package` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `participants` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `email`, `name`, `package`, `phone`, `date`, `time`, `participants`) VALUES
(1, 'js_jackson@gmail.com', 'Jackson', 'grandCanyon', '016-4864906', '2022-10-01', '1030', 2),
(2, 'bam052@gmail.com', 'Bam', 'cityExplorer', '014-89456781', '2022-09-01', '1200', 2),
(3, 'js_jackson@gmail.com', 'Jackson', 'cityExplorer', '016-4864906', '2022-09-31', '1230', 5),
(5, 'minnie12@gmail.com', 'Minnie', 'jungleEscape', '8978451555', '2022-08-10', '1600', 4),
(6, 'bam052@gmail.com', 'Bam Bam', 'grandCanyon', '497948618989', '2022-08-09', '1600', 6),
(7, 'lily_ly@gmail.com', 'Pam Lily', 'jungleEscape', '59894948', '2022-08-27', '1630', 17),
(8, 'minnie12@gmail.com', 'Ong Minnie', 'klExpress', '59894948', '2022-09-22', '1200', 17),
(9, 'lily_ly@gmail.com', 'Pam Lily', 'jungleEscape', '59894948', '2022-09-27', '1030', 13),
(10, 'mickey12@gmail.com', 'Mickey', 'cityExplorer', '018-9168148', '2022-07-29', '1500', 3),
(11, 'yg_yugyeom@gmail.com', 'Yugyeom', 'grandCanyon', '016-4864906', '2022-10-31', '1230', 5),
(12, 'yg_yugyeom@gmail.com', 'Yugyeom', 'grandCanyon', '016-4864906', '2022-10-31', '1230', 5),
(13, 'jackson_js@gmail.com', 'Jackson', 'weddingTour', '015-7894856', '2022-09-15', '1200', 3),
(14, 'siying060202@gmail.com', 'Mickey', 'cityExplorer', '0157894856', '2022-07-13', '1630', 2),
(15, 'yg_yugyeom@gmail.com', 'Yugyeom', 'grandCanyon', '016-4864906', '2022-10-31', '1230', 5),
(17, 'yg_yugyeom@gmail.com', 'Yugyeom', 'grandCanyon', '016-4864906', '2022-10-31', '1230', 5),
(18, 'siying060202@gmail.com', 'Mickey', 'klExpress', '0157894856', '2022-07-31', '1700', 7),
(19, 'siying060202@gmail.com', 'Mickey', 'jungleEscape', 'nouno', '2022-07-29', '1600', 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `tourHighlights` text NOT NULL,
  `tourInfo` text NOT NULL,
  `addInfo` text NOT NULL,
  `image` text NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `price`, `tourHighlights`, `tourInfo`, `addInfo`, `image`, `video`) VALUES
(1, 'Grand Canyon Tour', 'One of SOWOOZOO\'s hallmark tours takes you above Kuala Lumpur\'s sparkling skyscrapers to the Genting Highlands\' undulating hills. It will be your best heli ride to enjoy the most breathtaking scenery.', 'RM 2,699.00', '<i class=\"fas fa-map-pin\"></i>Lake Titiwangsa<br>\r\n<i class=\"fas fa-map-pin\"></i>Genting Highlands<br>\r\n<i class=\"fas fa-map-pin\"></i>Templer Park<br>\r\n<i class=\"fas fa-map-pin\"></i>Batu Cave<br>\r\n<i class=\"fas fa-map-pin\"></i>KL Tower<br>\r\n<i class=\"fas fa-map-pin\"></i>KLCC\r\n<br>', '<i class=\"fa fa-road\"></i>50 km<br>\r\n<i class=\"fa fa-solid fa-clock\"></i>40 - 45 minutes<br>\r\n<i class=\"fas fa-plane-departure\"></i>Depart from Lake Titiwangsa\r\n<br>', '<tr>                                   <td>Max. Passenger</td>                            <td>2 persons</td>\r\n</tr>\r\n<tr>                               <td>Min. Passenger</td>\r\n<td>4 persons</td>\r\n</tr>\r\n<tr>                                  <td>Max. Passengers Weight</td>         <td>300 kg</td>\r\n</tr>', 'images/package_1.jpg', 'videos/grandCanyon.mp4'),
(2, 'City Explorer Private Tour', 'SOWOOZOO\'s City Explorer offers a one-of-a-kind heli tour experience. Fly as high as the tallest skyscrapers in Southeast Asia, such as KLCC and KL Tower, before heli cruising above the lush sceneries of Batu Caves. The excellent aerial view Kuala Lumpur has to offer will amazed you.', 'RM 1,199.00', '<i class=\"fas fa-map-pin\"></i>KL Tower<br>\r\n<i class=\"fas fa-map-pin\"></i>Dataran Merdeka<br>\r\n<i class=\"fas fa-map-pin\"></i>National Mosque<br>\r\n<i class=\"fas fa-map-pin\"></i>National Palace<br>\r\n<i class=\"fas fa-map-pin\"></i>KLCC<br>\r\n<i class=\"fas fa-map-pin\"></i>Batu Caves<br>', '<i class=\"fa fa-road\"></i>15 km<br>\r\n<i class=\"fa fa-solid fa-clock\"></i>15 - 20 minutes<br>\r\n<i class=\"fas fa-plane-departure\"></i>Depart from Lake Titiwangsa<br>', '<tr>                               <td>Max. Passenger</td>          \r\n<td>2 persons</td>\r\n</tr>\r\n<tr>                                <td>Min. Passenger</td>                                  <td>4 persons</td>\r\n</tr>\r\n<tr>                                <td>Max. Passengers Weight</td>                   <td>300 kg</td>\r\n</tr>', 'images/package_2.jpg', 'videos/cityexplorer.mp4'),
(3, 'Jungle Escape Private Tour', 'Take a heli and escape the concrete jungle to marvel at Kuala Lumpur\'s best kept secret, its natural beauty, as you soar over lush jungles and sparkling lakes.', 'RM 2,389.00', '<i class=\"fas fa-map-pin\"></i>Batu Dam<br>\r\n<i class=\"fas fa-map-pin\"></i>Quartz Ridge<br>\r\n<i class=\"fas fa-map-pin\"></i>TM Tower<br>\r\n<i class=\"fas fa-map-pin\"></i>National Palace<br>\r\n<i class=\"fas fa-map-pin\"></i>KLCC\r\n<br>', '<i class=\"fa fa-road\"></i>60 km<br>\r\n<i class=\"fa fa-solid fa-clock\"></i>25 - 30 minutes<br>\r\n<i class=\"fas fa-plane-departure\"></i>Depart from Lake Titiwangsa\r\n<br>', '<tr>\r\n<td>Max. Passenger</td>\r\n<td>2 persons</td>\r\n</tr>\r\n<tr>\r\n<td>Min. Passenger</td>             \r\n<td>4 persons</td>\r\n</tr>\r\n<tr>                                 <td>Max. Passengers Weight</td>\r\n<td>300 kg</td>\r\n</tr>', 'images/package_3.jpg', 'videos/jungleEscape.mp4'),
(4, 'Kuala Lumpur Express Tour', 'Fly over the most important landmarks in Kuala Lumpur and get a new perspective on Malaysia\'s thriving capital city. You\'ll want to go on another heli trip after this one.', 'RM 598.00', '<i class=\"fas fa-map-pin\"></i>KL Tower<br>\r\n<i class=\"fas fa-map-pin\"></i>Dataran Merdeka<br>\r\n<i class=\"fas fa-map-pin\"></i>National Mosque<br>\r\n<i class=\"fas fa-map-pin\"></i>National Palace<br>\r\n<i class=\"fas fa-map-pin\"></i>KLCC\r\n<br>', '<i class=\"fa fa-road\"></i>5 km<br>\r\n<i class=\"fa fa-solid fa-clock\"></i>8 - 12 minutes<br>\r\n<i class=\"fas fa-plane-departure\"></i>Depart from Lake Titiwangsa\r\n<br>', '<tr>\r\n<td>Max. Passenger</td>\r\n<td>2 persons</td>\r\n</tr>\r\n<tr>                                  <td>Min. Passenger</td>\r\n<td>4 persons</td>\r\n</tr>\r\n<tr>\r\n<td>Max. Passengers Weight</td>\r\n<td>300 kg</td>\r\n</tr>', 'images/package_4.jpg', 'videos/express.mp4'),
(5, 'Wonders Of KL Tour', 'Enjoy a helicopter flight near Titiwangsa, KLCC Tower, KL Tower, National Palace, National Mosque, TRX Tower, Merdeka Square, and Batu Caves, which flies near Titiwangsa, KLCC Tower, KL Tower, National Palace, National Mosque, TRX Tower, Merdeka Square, and Batu Caves.', 'RM 1,574.00', '<i class=\"fas fa-map-pin\"></i>KL Tower<br>\r\n<i class=\"fas fa-map-pin\"></i>Lake Titiwangsa<br>\r\n<i class=\"fas fa-map-pin\"></i>National Mosque<br>\r\n<i class=\"fas fa-map-pin\"></i>National Palace<br>\r\n<i class=\"fas fa-map-pin\"></i>KLCC<br>\r\n<i class=\"fas fa-map-pin\"></i>Merdeka Square<br>\r\n<i class=\"fas fa-map-pin\"></i>TRX Tower<br>\r\n<i class=\"fas fa-map-pin\"></i>Batu Caves\r\n<br>', '<i class=\"fa fa-road\"></i>50 km<br>\r\n<i class=\"fa fa-solid fa-clock\"></i>18 - 25 minutes<br>\r\n<i class=\"fas fa-plane-departure\"></i>Depart from Lake Titiwangsa\r\n<br>', '<tr>\r\n<td>Max. Passenger</td>\r\n<td>2 persons</td>\r\n</tr>\r\n<tr>\r\n<td>Min. Passenger</td>\r\n<td>4 persons</td>\r\n</tr>\r\n<tr>\r\n<td>Max. Passengers Weight</td>\r\n<td>300 kg</td>\r\n</tr>', 'images/package_5.jpg', 'videos/wonders.mp4'),
(6, 'Wedding Tour - Magical KL Private Tour', 'Discover Kuala Lumpur\'s magnificent nature and landscape, as well as its famous landmarks. Fly above Genting Highlands, Bukit Tinggi, Janda Baik, Templer Park, Batu Caves, KL Tower, KLCC Tower, and Merdeka Square to see all of the city\'s beauties.', 'RM 5,998.00', '<i class=\"fas fa-map-pin\"></i>Bukit Tinggi<br>\r\n<i class=\"fas fa-map-pin\"></i>Genting Highlands<br>\r\n<i class=\"fas fa-map-pin\"></i>Janda Baik<br>\r\n<i class=\"fas fa-map-pin\"></i>Batu Cave<br>\r\n<i class=\"fas fa-map-pin\"></i>KL Tower<br>\r\n<i class=\"fas fa-map-pin\"></i>KLCC<br>\r\n<i class=\"fas fa-map-pin\"></i>Templer Park<br>\r\n<i class=\"fas fa-map-pin\"></i>Merdeka Square<br>', '<i class=\"fa fa-road\"></i>120 km<br>\r\n<i class=\"fa fa-solid fa-clock\"></i>90 - 110 minutes<br>\r\n<i class=\"fas fa-plane-departure\"></i>Depart from Lake Titiwangsa<br>', '<i class=\"fas fa-rocket\"></i>Private aircraft<br>\r\n<i class=\"fas fa-user-tie\"></i>Minister<br>\r\n<i class=\"fas fa-photo-video\"></i>Photographer (30 photos delivered)<br>\r\n<i class=\"fas fa-shuttle-van\"></i>Limousine transportation<br>\r\n<i class=\"fas fa-spa\"></i>Wedding bouquet & boutonniere<br>\r\n<i class=\"fas fa-glass-cheers\"></i>Champagne toast<br>', 'images/package_6.jpg', 'videos/wedding.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `position`, `comments`, `rating`, `image`) VALUES
(1, 'Jackson Ong', 'Company Director', 'This is an awesome anniversary treat! My wife and I saw everything KL had to offer and so much more. I was smiling the entire time. Dave was perfect making sure we saw all the amazing sights. If you\'ve lived in Malaysia your whole life and been in the traffic, this will give you an whole new perspective! From the lake Titiwangsa sign to KLCC it was the best anniversary treat ever!', 5, 'images/pic_1.jpg'),
(2, 'Marlon & Nathalie', 'Entrepreneur', 'Thank you for the amazing flight around KL area! Best customer service ever. Special thanks to our pilot Dave, not only did he knew his stuff but he was an amazing tour guide and a great host during our mountain top landing. You guys made our engagement all the more special! Hope to see you guys soon!', 4, 'images/pic_2.jpg'),
(3, 'Darren P.', 'Sales Manager', 'Great experience, flying over Kuala Lumpur and across, with my wife and my daughter. Super professional pilot, absolutely recommendable.', 5, 'images/pic_3.jpg'),
(4, 'Shirley', 'Project Manager', 'This was my first helicopter tour and I loved it. It was a birthday present for my husband and he was very happy! This company is very professional and I highly recommend them. I felt very comforted by the pilot and the staff is great!', 5, 'images/pic_4.jpg'),
(5, 'Jim & Deandrea', 'IT Professional', 'We enjoyed the flight. The views were amazing. We grew up in Hollywood and seeing it from the sky was so exciting. Our pilot, Merlinda, was terrific. Can\'t wait to fly with you again!', 5, 'images/pic_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `firstName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `lastName`, `firstName`) VALUES
('Bamm', 'bam052@gmail.com', 'Bam*123', 'bam', 'Bam'),
('Its_me', 'its_me@gmail.com', 'Its_me*123', 'Ooi', 'Danna'),
('Jack', 'js_jackson@gmail.com', 'Jack*123', 'Ong', 'Jk'),
('Jinnie_jn', 'jinnie97@gmail.com', 'Jinnie#457', 'Ong', 'Jinnie'),
('Lili_pamn', 'lily_ly@gmail.com', 'Lili*1278', 'Pamn', 'Lili'),
('Mickey', 'mickey12@gmail.com', 'Micey#12453', 'Mouse', 'Mickey'),
('Minnie', 'minnie12@gmail.com', 'Minnie*578', 'Ong', 'Minnie'),
('SY', 'siying060202@gmail.com', 'Siying#1245', 'kjoi', 'SiYing'),
('Yugyeom_K', 'yg_yugyeom@gmail.com', 'Yugyeom*123', 'Kim', 'Yugyeom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
