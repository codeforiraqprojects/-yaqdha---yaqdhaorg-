-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 10:50 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yaqdha`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_desc` text NOT NULL,
  `activity_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_desc`, `activity_date`) VALUES
(1, 'الندوة الحوارية الثانية بعنوان الحلول الآنية للمرحلة الحالية التي ادارها وقدمها فريق يقظة\r\nبتأريخ 5 ديسمبر 2019 بواقع ساعتين\r\nبحضور عدد من طلبة جامعة القادسية\r\nحيث حظيت الجلسة بمشاركة افكار وآراء بصورة رائعة جدا وخرجت بنتائج ايجابية بخصوص المادة المقدمة\r\n\r\nملخص الندوة :\r\n-توضيح معنى الحلول الانية السريعة والحلول البعيدة المدى وتقسيم انواع الحلول ببساطة. -طرح امثل الحلول المتوفرة بخصوص الوضع والمتمثلة في وقتها بمسارين اما المطالبة برئيس وزراء نزيه مباشرةً في نفس الاوضاع \"والذي تم الوصول لنتيجة عدم فاعلية هذا المسار وترجيح المسار الثاني\" او البدأ بتعديلات على قانون الانتخابات ثم مفوضية نزيهة ثم انتخابات وتوصلت النقاشات بالاتفاق حول هذا الحل في النهاية. -مدخل بسيط للحلول بعيدة المدى والتخطيط الاستراتيجي وضرورته بعد استقرار البلد. -طرح بعض الآراء العلمية في الانتخابات. -توضيح وشرح نظام الانتخابات المقترح (نظام الدوائر الانتخابية). -الفرق بين الاشراف الدولي والرقابة الدولية.\r\n#يقظة\r\n#فريق_يقظة\r\n#أعمال_الفريق\r\n#ارشيف_يقظة #العراق', '2020-04-12 12:52:49'),
(2, ' قام الفريق بإدارة وتنظيم ندوة بواقع ساعتين بيّن من خلالها الطريقة الصحيحة للإحتجاج..\r\nبحضور عدد من طلبة جامعة القادسية وكانت تتضمن التالي :\r\n- اسباب فشل الاحتجاجات والمظاهرات في السنين السابقة.\r\n- ماهي مراحل الاحتجاج ونحن في اي مرحلة منها.\r\n- طرق الاحتجاج التي ممكن أن تعطي أفضل حلول.\r\n- السيناريوهات الممكن حدوثها، مخاطرها وايجابياتها.\r\n- افضل سيناريو ممكن تطبيقه لافضل نتائج واقل اضرار (حفظ الارواح والممتلكات وعدم الاندفاع بغير السلمية).\r\n- توضيح الحقوق القانونية والتشريعية المكفولة لنا.\r\n- الاستفادة من هذه الحقوق للضغط بشكل فعال.\r\n- المطالب التي تؤدي الى حلول عملية.\r\n-ماذا عن الانتخابات القادمة وكيف تحدث.\r\n- ضرورة وماهية المطالب الي توصل لسحب يد الفساد ومنعه من التلاعب بأصواتنا.\r\n- اسباب غياب البديل السياسي وطرق المعالجة (مع ملاحظة ان ثلثي الاسباب يتم معالجتها بصورة تلقائية بمجرد تحديدها وطرح اسلوب حل الثلث الاخير منها بكل بساطة من خلال النهضة الفكرية).\r\n-ضرورة توحيد الاهداف ونشرها لتحقيق التغيير الصحيح والسليم.\r\n\r\n#يقظة\r\n#فريق_يقظة\r\n#أعمال_الفريق', '2019-11-24 10:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `activity_comment`
--

CREATE TABLE `activity_comment` (
  `acomment_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_comment`
--

INSERT INTO `activity_comment` (`acomment_id`, `activity_id`, `username`, `comment`) VALUES
(1, 2, 'علي', 'ابطاال'),
(2, 2, 'زين', 'عاشت الايادي'),
(3, 2, 'الاء', 'جانت ندوه جيده'),
(4, 2, 'كريم', 'الله كريم'),
(5, 2, 'زيد', 'فريق جيد'),
(6, 2, 'محمد', 'تيست'),
(7, 2, 'zayn', 'test2'),
(8, 1, 'زين', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),
(9, 1, 'توومي', 'زين حلو واني قردده');

-- --------------------------------------------------------

--
-- Table structure for table `activity_image`
--

CREATE TABLE `activity_image` (
  `aimage_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_image`
--

INSERT INTO `activity_image` (`aimage_id`, `activity_id`, `image`) VALUES
(1, 1, '22.jpg'),
(2, 1, '23.jpg'),
(3, 1, '24.jpg'),
(4, 1, '26.jpg'),
(5, 1, '27.jpg'),
(6, 1, '28.jpg'),
(7, 1, '29.jpg'),
(8, 1, '30.jpg'),
(9, 1, '31.jpg'),
(10, 1, '32.jpg'),
(11, 2, '1.jpg'),
(12, 2, '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`username`, `password`) VALUES
('zayn_n97', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_desc` text NOT NULL,
  `post_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_desc`, `post_date`) VALUES
(3, ' ومفروشة الخدين وردًا مضرجا\r\nأذا جمشته العين عاد بنفسجا\r\nكل عام وأنتُنَّ #يقظة\r\n#يوم_المرأة_العالمي', '2020-04-12 12:50:01'),
(4, 'رؤية الفريق\r\nصناعةُ مجتمعٍ مُبادر...\r\n.\r\nرسالة الفريق\r\nتمكين المجتمع بأشخاصه...\r\n.\r\nالأهداف\r\n\r\nخدمة البلد وتمكين المجتمع.\r\n\r\nتعزيز روح المبادرة لدى الشباب وتفعيل دورهم.\r\n\r\nالسعي إلى إعادة هيكلة وتطوير المنظومة التعليمية في البلد.\r\n\r\nتوفير المساعدات الطبية للمحتاجين وتعزيز الوعي الصحي لدى المجتمع.\r\n\r\nتقريب القاعدة الشعبية من منظمات المجتمع المدني الفاعلة والمؤثرة بشكل واضح.\r\n\r\nإكساب أعضاء الفريق والقائمين عليه القدرة على إدارة وتنظيم الأعمال، ونسعى لنشر هذه الثقافة في المجتمع.', '2020-04-12 12:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `pcomment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`pcomment_id`, `post_id`, `username`, `comment`) VALUES
(1, 4, 'زين', 'عاشت ايديكم'),
(12, 4, 'عباس', 'شغل طيب'),
(13, 4, 'محمد', 'الدزاين لطيف'),
(14, 4, 'فاطمه', 'هذا الكومنت لابد'),
(15, 4, 'Zayn', 'aaaaaa'),
(16, 3, 'zayn', 'counter');

-- --------------------------------------------------------

--
-- Table structure for table `post_image`
--

CREATE TABLE `post_image` (
  `pimage_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_image`
--

INSERT INTO `post_image` (`pimage_id`, `post_id`, `image`) VALUES
(3, 3, '13.jpg'),
(4, 4, '123.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `activity_comment`
--
ALTER TABLE `activity_comment`
  ADD PRIMARY KEY (`acomment_id`),
  ADD KEY `activityid` (`activity_id`);

--
-- Indexes for table `activity_image`
--
ALTER TABLE `activity_image`
  ADD PRIMARY KEY (`aimage_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`pcomment_id`),
  ADD KEY `postid` (`post_id`);

--
-- Indexes for table `post_image`
--
ALTER TABLE `post_image`
  ADD PRIMARY KEY (`pimage_id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `activity_comment`
--
ALTER TABLE `activity_comment`
  MODIFY `acomment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `activity_image`
--
ALTER TABLE `activity_image`
  MODIFY `aimage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `pcomment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_image`
--
ALTER TABLE `post_image`
  MODIFY `pimage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_comment`
--
ALTER TABLE `activity_comment`
  ADD CONSTRAINT `activityid` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `activity_image`
--
ALTER TABLE `activity_image`
  ADD CONSTRAINT `activity_id` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `postid` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_image`
--
ALTER TABLE `post_image`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
