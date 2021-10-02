-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 01:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recipies`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about`) VALUES
(2, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut&nbsp;<a href="http://localhost/recipe%20system/recipe.php#">labore et dolore</a>&nbsp;a ut magna aliqua. Ut enim ad&nbsp;<strong>minim veniam</strong>, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do est tempor incididunt ut&nbsp;<em>labore et dolore magna ex est aliqua</em>. Ut enim ad minim veniam, quis&nbsp;<del>nostrud</del>&nbsp;exercitation ullamco laboris. Phasellus ornare sem quis dui aliquet facilisis. Sed ipsum eros, ultricies at turpis eu, mattis dictum risus.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut&nbsp;<a href="http://localhost/recipe%20system/recipe.php#">labore et dolore</a>&nbsp;a ut magna aliqua. Ut enim ad&nbsp;<strong>minim veniam</strong>, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do est tempor incididunt ut&nbsp;<em>labore et dolore magna ex est aliqua</em>. Ut enim ad minim veniam, quis&nbsp;<del>nostrud</del>&nbsp;exercitation ullamco laboris. Phasellus ornare sem quis dui aliquet facilisis. Sed ipsum eros, ultricies at turpis eu, mattis dictum risus.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(4, 'sidra@gmail.com', 'sidra'),
(5, 'sidra@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `country_name`) VALUES
(5, 'Qourma', 'Chinese'),
(6, 'Samosa', 'Pakistani'),
(7, 'Rice', 'Indian'),
(8, 'Sweets', 'Italian'),
(9, 'Vegeterian', 'Pakistani Dishes'),
(10, 'BreakFast', 'Italian'),
(11, 'Lunch', 'Chinese'),
(12, 'Dinner', 'Indian'),
(13, 'Beverages', 'Chinese'),
(14, 'Soups', 'Pakistani'),
(15, 'Breads', 'Pakistani'),
(16, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE IF NOT EXISTS `chefs` (
  `chef_id` int(11) NOT NULL AUTO_INCREMENT,
  `chef_name` varchar(255) NOT NULL,
  `chef_level` varchar(255) NOT NULL,
  `chef_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`chef_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`chef_id`, `chef_name`, `chef_level`, `chef_photo`) VALUES
(1, 'Ahmad Malik', 'Baryani', 'uploads/4207534156_3d39f51fbf92f7911f8b8bd94e85a5e9.jpg'),
(2, 'Hania', 'Qourma', 'uploads/6406385838_4.jpg'),
(3, 'Kashif', 'Salad', 'uploads/3465896617_13.jpg'),
(4, 'Usman', 'Soups', 'uploads/6156964188_50-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
  `dish_id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_name` varchar(255) NOT NULL,
  `dish_ingred` longtext NOT NULL,
  `dish_direction` longtext NOT NULL,
  `dish_detail` longtext NOT NULL,
  `cat_id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `dish_photo` varchar(255) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`dish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dish_id`, `dish_name`, `dish_ingred`, `dish_direction`, `dish_detail`, `cat_id`, `chef_id`, `dish_photo`, `country_name`) VALUES
(1, 'Baryani', 'lsksfdv lsdfiv spfoga asodifubga zopigb ldsibug fpvoisn ', 'lsksfdv lsdfiv spfoga asodifubga zopigb ldsibug fpvoisn ', '', 7, 4, 'uploads/9085223886_21.jpg', 'Pakistani'),
(2, 'Pulawo', 'lsksfdv lsdfiv spfoga asodifubga zopigb ldsibug fpvoisn ', 'lsksfdv lsdfiv spfoga asodifubga zopigb ldsibug fpvoisn ', '', 7, 3, 'uploads/3676630143_9.jpg', 'Chinese'),
(3, 'Chinese Rice', 'dfkn ldfnbvk dzf;lbzndf vdlfnbz bz;dfob lzfb/; ', 'dfkn ldfnbvk dzf;lbzndf vdlfnbz bz;dfob lzfb/; ', '', 7, 4, 'uploads/8504858606_6.jpg', 'Continental Food'),
(4, 'Mutton', '<p>labore et dolore&nbsp;a ut magna aliqua. Ut enim ad&nbsp;<strong>minim veniam</strong>, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet,&nbsp;</p>\r\n', '<p>labore et dolore&nbsp;a ut magna aliqua. Ut enim ad&nbsp;<strong>minim veniam</strong>, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do est tempor incididunt ut&nbsp;<em>labore et dolore magna ex est aliqua</em>. Ut enim ad minim veniam, quis&nbsp;<del>nostrud</del>&nbsp;exercitation ullamco laboris. Phasellus ornare sem quis dui aliquet facilisis. Sed ipsum eros, ultricies at turpis eu, mattis dictum risus.</p>\r\n', '', 5, 2, 'uploads/1529896775_bg.jpg', 'Pakistani'),
(8, 'Chicken', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut&nbsp;<a href="http://localhost/recipe%20system/recipe.php#">labore et dolore</a>&nbsp;a ut magna aliqua. Ut enim ad&nbsp;<strong>minim veniam</strong>,&nbsp;</p>\r\n', '<p>loremipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut&nbsp;<a href="http://localhost/recipe%20system/recipe.php#">labore et dolore</a>&nbsp;a ut magna aliqua. Ut enim ad&nbsp;<strong>minim veniam</strong>, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do est tempor incididunt ut&nbsp;<em>labore et dolore magna ex est aliqua</em>. Ut enim ad minim veniam, quis&nbsp;<del>nostrud</del>&nbsp;exercitation ullamco laboris. Phasellus ornare sem quis dui aliquet facilisis. Sed ipsum eros, ultricies at turpis eu, mattis dictum risus.</p>\r\n', '', 5, 2, 'uploads/1981622983_1.jpg', 'Indian'),
(9, 'Pygmaeus accelerare suspicio inncem tantum', '<p><a href="http://localhost/recipe%20system/recipe.php#">Chicken</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1(3 pound)</p>\r\n\r\n<p>Here are some additional notes regarding this ingredient. Aliquam eget vestibulum mauris, sed lacinia ante.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Olive oil</a></p>\r\n\r\n	<p>1 tablespoon</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Salt</a></p>\r\n\r\n	<p>1/4 teaspoon</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Ground black pepper</a></p>\r\n\r\n	<p>1/3 teaspoon</p>\r\n\r\n	<p>Mollis urna, a pharetra lectus bibendum et.</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Oregano</a></p>\r\n\r\n	<p>1/4 teaspoon</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Basil</a></p>\r\n\r\n	<p>1/2 teaspoon</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Paprika</a></p>\r\n\r\n	<p>1/4 teaspoon</p>\r\n\r\n	<p>Quisque in ornare mollis urna, a pharetra lectus bibendum et.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;Quisque in ornare mollis urna, a pharetra lectus bibendum et. Aenean sodales cursus nulla, faucibus tempor nibh porta id. Pellentesque non nibh eros. Nunc lectus lacus, interdum et consequat et, varius sit amet ipsum. Fusce convallis, lorem sit amet bibendum accumsan, consectetur adipisicing nec mattis dui nisi a lacus. Fusce non nisl pretium tellus eleifend tincidunt id id lorem. In hac habitasse platea dictumst. Pellentesque orci libero, fringilla et ultrices ut, cursus eu ipsum. Aenean bibendum dui quis pellentesque dictum. Cras aliquet risus id nisi feugiat vulputate.</p>\r\n', 'Curabitur massa tortor, euismod accumsan dui eu, interdum interdum sapien. Aenean sed dui lorem. Nullam quis hendrerit sem, nec mollis augue. Aenean dictum pulvinar lectus, eu vulputate leo ultricies quis. Morbi quis est lacinia, adipiscing enim ac, semper magna.', 5, 2, 'uploads/7009182752_1.jpg', 'Sweets'),
(10, 'Salad', '<p><a href="http://localhost/recipe%20system/recipe.php#">Chicken</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1(3 pound)</p>\r\n\r\n<p>Here are some additional notes regarding this ingredient. Aliquam eget vestibulum mauris, sed lacinia ante.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Olive oil</a></p>\r\n\r\n	<p>1 tablespoon</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Salt</a></p>\r\n\r\n	<p>1/4 teaspoon</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Ground black pepper</a></p>\r\n\r\n	<p>1/3 teaspoon</p>\r\n\r\n	<p>Mollis urna, a pharetra lectus bibendum et.</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Oregano</a></p>\r\n\r\n	<p>1/4 teaspoon</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Basil</a></p>\r\n\r\n	<p>1/2 teaspoon</p>\r\n	</li>\r\n	<li>\r\n	<p><a href="http://localhost/recipe%20system/recipe.php#">Paprika</a></p>\r\n\r\n	<p>1/4 teaspoon</p>\r\n\r\n	<p>Quisque in ornare mollis urna, a pharetra lectus bibendum et.</p>\r\n	</li>\r\n</ul>\r\n', '<ol>\r\n	<li>Quisque in ornare mollis urna, a pharetra lectus bibendum et. Aenean sodales cursus nulla, faucibus tempor nibh porta id. Pellentesque non nibh eros. Nunc lectus lacus, interdum et consequat et, varius sit amet ipsum. Fusce convallis, lorem sit amet bibendum accumsan, consectetur adipisicing nec mattis dui nisi a lacus. Fusce non nisl pretium tellus eleifend tincidunt id id lorem. In hac habitasse platea dictumst. Pellentesque orci libero, fringilla et ultrices ut, cursus eu ipsum. Aenean bibendum dui quis pellentesque dictum. Cras aliquet risus id nisi feugiat vulputate.</li>\r\n</ol>\r\n', 'Curabitur massa tortor, euismod accumsan dui eu, interdum interdum sapien. Aenean sed dui lorem. Nullam quis hendrerit sem, nec mollis augue. Aenean dictum pulvinar lectus, eu vulputate leo ultricies quis. Morbi quis est lacinia, adipiscing enim ac, semper magna.', 11, 3, 'uploads/2955709143_1.jpg', 'Italian');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(255) NOT NULL,
  `req_dishes` varchar(255) NOT NULL,
  `req_date` timestamp NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `u_id`, `req_dishes`, `req_date`, `status`) VALUES
(1, '1', 'baryani', '2017-08-19 07:37:05', '1'),
(2, '', 'Baryani', '0000-00-00 00:00:00', ''),
(3, '', 'Qourma', '0000-00-00 00:00:00', ''),
(4, '6', 'Baryani', '0000-00-00 00:00:00', ''),
(5, '6', 'Qourma', '0000-00-00 00:00:00', ''),
(6, '6', 'Qourma', '0000-00-00 00:00:00', '1'),
(7, '6', 'Chinese Rice', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_pass`, `u_photo`) VALUES
(4, 'Kamran', 'kam@gmail.com', '12345', '../uploads/887209027_5.jpg'),
(5, 'Kamran', 'kam@gmail.com', '12345', '../uploads/6478849770_5.jpg'),
(6, 'saleem', 'malik@gmail.com', '1234', '../uploads/376700859_50-2.jpg'),
(7, 'shahid', 'shah@gmail.com', '12345', '../uploads/3094606372_50-4.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
