-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 يونيو 2024 الساعة 03:03
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comment` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tokenComp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`id`, `token`, `comment`, `tokenComp`) VALUES
(2, '', 'شركة مميزة', '240126105053160'),
(3, '240128113450182', 'ترتيبهم حلو ورحلاتهم احلى', '240126105053160'),
(4, '240128113637113', 'ماتوقعت هيج راح تكون رحلاتهم حلوه', '240126105053160'),
(5, '240128113645183', 'شركة مميزه', '240126105053160'),
(6, '240128115139149', 'الفنادق راقيه ', '240126105053160'),
(7, '240220115022173', 'شركة مميزه', '240220114846121'),
(8, '240220120835169', 'ماتوقعت هيج راح تكون رحلاتهم حلوه', '240220120635151');

-- --------------------------------------------------------

--
-- بنية الجدول `company`
--

CREATE TABLE `company` (
  `id` int(255) NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mainPhoto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `top` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `company`
--

INSERT INTO `company` (`id`, `token`, `name`, `location`, `mainPhoto`, `top`) VALUES
(34, '240126105053160', 'فلامنكو', 'بغداد - الكاظمية', 'image -65b4293d8025d9.25727003.jpg', 1),
(64, '240426122920181', 'العراق', 'بغداد - المنصور ', 'hx-662b8206e2e402.20515385.jpg', 0),
(65, '240426024257144', 'البغدادي', 'بغداد - المنصور ', 'image -662ba1517e7671.20148152.jpg', 1),
(66, '240501122529120', 'العالم العربي', 'بغداد العراق', 'image -66321899ebaa50.56881305.jpg', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `hotel`
--

CREATE TABLE `hotel` (
  `id` int(255) NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `valuation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tokenComp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `hotel`
--

INSERT INTO `hotel` (`id`, `token`, `name`, `location`, `image`, `valuation`, `tokenComp`) VALUES
(1, '240128090249140', 'فندق الريماس', 'بغداد - الحارثية', 'image -65b6b2e9c08af7.60734690.jpeg', '2', '240126105053160'),
(2, '240128090342123', 'فندق ليالي اشبيلة', 'اربيل - القرية اللبنانية', 'image -65b6b31ed98ab2.73265218.jpg', '5', '240126105053160'),
(3, '240128090414131', 'فندق السليمانية', 'العراق - سليمانية', 'image -65b6b33ea731e5.63509192.jpg', '3', '240126105053160'),
(4, '240220114914141', 'فندق الريماس', 'بغداد - الحارثية', 'image -65d483aa3952c4.53353610.jpg', '4', '240220114846121'),
(5, '240220120817105', 'فندق ليالي اشبيلة', 'اربيل - القرية اللبنانية', 'image -65d48821da7814.21178431.jpeg', '3', '240220120635151'),
(7, '240406030712198', 'فندق برج بغداد', 'بغداد -السعدون', 'image -66114900c273c0.52719398.jpg', '4', '240126105053160');

-- --------------------------------------------------------

--
-- بنية الجدول `location`
--

CREATE TABLE `location` (
  `id` int(255) NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nameLocation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `detels` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photolocation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photolocationtow` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photolocationthree` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photolocationfour` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photolocationfife` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `location`
--

INSERT INTO `location` (`id`, `token`, `nameLocation`, `location`, `detels`, `photolocation`, `photolocationtow`, `photolocationthree`, `photolocationfour`, `photolocationfife`) VALUES
(15, '240501115416111', 'ارض الياقوت', 'بغداد -الكفاح', '', 'image -66321148e87de9.11299131.jpg', 'image -66321148e8a2c0.72975517.jpg', 'image -66321148e8c122.60131554.jpg', 'image -66321148e8df34.74477543.jpg', 'image -66321148e8fc16.40625889.jpg'),
(17, '240501120940143', 'بوابه اول', 'الناصرية', 'ولله مادري شكتب ', 'image -663214e442d448.22074512.jpg', 'image -663214e4430674.40873074.jpg', 'image -663214e4433798.83018008.jpg', 'image -663214e4436a84.28126139.jpg', 'image -663214e443a210.48483433.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `photocomp`
--

CREATE TABLE `photocomp` (
  `id` int(255) NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photp1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photp2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photp3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photp4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `photp5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tokencomp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `photocomp`
--

INSERT INTO `photocomp` (`id`, `token`, `photp1`, `photp2`, `photp3`, `photp4`, `photp5`, `tokencomp`) VALUES
(5, '240127125357121', 'image -65b4eed59ef559.77925378.jpg', 'image -65b4eed59f3274.31097355.jpg', 'image -65b4eed59f60b9.94010611.jpg', 'image -65b4eed59f8aa0.76704948.jpg', 'image -65b4eed59fc4a0.10383092.jpg', '240126105053160'),
(7, '240220115001142', 'image -65d483d9e5d8c2.48038349.jpg', 'image -65d483d9e620a0.32490958.jpg', 'image -65d483d9e658a8.69283900.jpg', 'image -65d483d9e690d5.39184274.jpeg', 'image -65d483d9e6c664.96494368.jpg', '240220114846121'),
(8, '240501122850173', 'image -66321962be7d07.03205896.jpg', 'image -66321962beda83.30642871.jpg', 'image -66321962bf1ae0.27271112.jpg', 'image -66321962bf5b13.36329619.jpg', 'image -66321962bfa0f3.66291989.jpg', '240501122529120');

-- --------------------------------------------------------

--
-- بنية الجدول `trips`
--

CREATE TABLE `trips` (
  `id` int(255) NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nameTrips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `detilsTrips` varchar(2000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fromTrips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `toTrips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `companyToken` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `availability` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `trips`
--

INSERT INTO `trips` (`id`, `token`, `nameTrips`, `detilsTrips`, `fromTrips`, `toTrips`, `companyToken`, `availability`) VALUES
(2, '240405053448138', 'اربيل', 'مدينة أربيل ذات مناخ انتقالي بين مناخ البحر المتوسط والمناخ الصحراوي وتنخفض فيها الرطوبة ودرجات الحرارة في الشتاء بينما يكون الجو معتدلاً في الصيف، وكانت مدينة أربيل تعتبر العاصمة الصيفية للعراق في زمن النظام السابق، وذلك لأهميتها التاريخية عبر العصور ولكونها مركزا ثقافيا وحضاريا موثرا في شمال العراق.\n\nالبيانات المناخية لـأربيل\nالشهر	يناير	فبراير	مارس	أبريل	مايو	يونيو	يوليو	أغسطس	سبتمبر	أكتوبر	نوفمبر	ديسمبر	المعدل السنوي', '2024-04-25', '2024-05-07', '240126105053160', 'غير متوفرة'),
(3, '240405053520121', 'اربيل', 'أربيل مدينة تاريخية يعود تاريخها إلى 6000 عام، واستضافت العديد من الحضارات. على الرغم من تعرض أربيل للكثير من الصعوبات إلا أنها تعد مدينة نامية. حيث ولدت المدينة من جديد من تحت الأنقاض وأصبحت تملك شوارع واسعة، مكاتب أعمال ومراكز تسوق.', '2024-04-25', '2024-05-07', '240126105053160', 'متوفرة'),
(6, '240406024737124', 'اربيل', 'رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل رحله اربيل ', '2024-05-09', '2024-04-11', '240126104724158', 'غير متوفرة');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_admin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `user_token`, `email`, `user_password`, `user_admin`) VALUES
(1, '2584532025588', 'moamel@gmail.com', '123123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photocomp`
--
ALTER TABLE `photocomp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `photocomp`
--
ALTER TABLE `photocomp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
