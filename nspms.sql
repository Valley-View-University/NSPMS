-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 06:32 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nspms`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(80) NOT NULL,
  `cpass` varchar(80) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_request`
--

DROP TABLE IF EXISTS `company_request`;
CREATE TABLE IF NOT EXISTS `company_request` (
  `crid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`crid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

DROP TABLE IF EXISTS `marital_status`;
CREATE TABLE IF NOT EXISTS `marital_status` (
  `msid` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`msid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`msid`, `status`) VALUES
(1, 'single'),
(2, 'married'),
(3, 'divorced'),
(4, 'seperated');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `options` varchar(80) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

DROP TABLE IF EXISTS `posting`;
CREATE TABLE IF NOT EXISTS `posting` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(80) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `shid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(80) NOT NULL,
  `spassword` varchar(80) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`shid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schoolfiles`
--

DROP TABLE IF EXISTS `schoolfiles`;
CREATE TABLE IF NOT EXISTS `schoolfiles` (
  `sfid` int(11) NOT NULL AUTO_INCREMENT,
  `files` varchar(80) NOT NULL,
  `year` varchar(4) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`sfid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

DROP TABLE IF EXISTS `studentinfo`;
CREATE TABLE IF NOT EXISTS `studentinfo` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `program` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phonenum` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('m','f') COLLATE utf8_unicode_ci NOT NULL,
  `msid` int(11) NOT NULL,
  `nationality` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `resaddress` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `instituition` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`sid`, `studentid`, `fname`, `lname`, `mname`, `program`, `email`, `dob`, `phonenum`, `gender`, `msid`, `nationality`, `resaddress`, `instituition`, `time`) VALUES
(1, '214cs01001767', 'bright', 'asare', 'bright', 'Bsc.computer science', 'asarebright81@gmail.com', '2015-10-01', '0208499091', 'm', 1, 'ghanaian', 'hse no 10', 'valley view university', '2016-11-23 17:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `student_request`
--

DROP TABLE IF EXISTS `student_request`;
CREATE TABLE IF NOT EXISTS `student_request` (
  `srid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `region1` int(11) NOT NULL,
  `region2` int(11) NOT NULL,
  `region3` int(11) NOT NULL,
  `option1` int(11) NOT NULL,
  `option2` int(11) NOT NULL,
  `option3` int(11) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`srid`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

DROP TABLE IF EXISTS `voucher`;
CREATE TABLE IF NOT EXISTS `voucher` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `sid` int(11) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`vid`, `code`, `status`, `sid`, `time`) VALUES
(1, '2590459e8ae79cfe05650d527a10e249', '0', 1, '2016-11-25 12:28:44'),
(2, '5d24073ab4606328a0dbfef3fa42dd76', '0', 0, '2016-11-25 12:28:46'),
(3, '4306421fc482adb6a7c35817faa0f7b6', '0', 0, '2016-11-25 12:28:47'),
(4, 'd14a6ee2c3179a4853330acc5a3fc083', '0', 0, '2016-11-25 12:28:48'),
(5, 'd7fdf83f47d7b53b2c72992501e4f35b', '0', 0, '2016-11-25 12:28:49'),
(6, '33a548de4c94d63e12cac6cb877d0aa4', '0', 0, '2016-11-25 12:28:50'),
(7, '81bd5969452770bdcac6ea8580bf20aa', '0', 0, '2016-11-25 12:28:51'),
(8, '70c3489d879032a221c51feea1fdcffa', '0', 0, '2016-11-25 12:28:52'),
(9, 'b70c6315cde60267c25290ed895b2386', '0', 0, '2016-11-25 12:28:53'),
(10, '38e0187d145111cb7d943d4fc4241401', '0', 0, '2016-11-25 12:28:54'),
(11, 'c716faa9c08a05e87a936d926673b2a5', '0', 0, '2016-11-25 12:28:55'),
(12, '58f3e19cfdf4973bc14d0ce777601f42', '0', 0, '2016-11-25 12:28:56'),
(13, 'cae2ad029e0002e9952473c51fe8058c', '0', 0, '2016-11-25 12:28:58'),
(14, 'e25991e744a68e837a724b4b1cd474cb', '0', 0, '2016-11-25 12:28:59'),
(15, '1cb8b3c855cf1565aafce7472bf00896', '0', 0, '2016-11-25 12:29:00'),
(16, 'd5c306127e9a14026e9b7c2cd0adff5b', '0', 0, '2016-11-25 12:29:01'),
(17, '913dfd2d06421c63c1f4b7fa19899d48', '0', 0, '2016-11-25 12:29:02'),
(18, '621125617f37e2a9a905f95cbf389526', '0', 0, '2016-11-25 12:29:03'),
(19, '9dd27d9641444b0c855a3037aadcb121', '0', 0, '2016-11-25 12:29:04'),
(20, '99adcf7b22a0b20d2ca227724ae07c6d', '0', 0, '2016-11-25 12:29:05'),
(21, 'b7ee1a43d468a33aaaeedee0bf34a9db', '0', 0, '2016-11-25 12:29:06'),
(22, 'c83d9c5e90fffd77f6454757ca34df76', '0', 0, '2016-11-25 12:29:07'),
(23, '8cc5494c444b5b5471ca4245901972b5', '0', 0, '2016-11-25 12:29:09'),
(24, 'f4f10e459a13e0f30cceb413850248fa', '0', 0, '2016-11-25 12:29:10'),
(25, 'c789fe5797c13e408945cb7ae8a9e570', '0', 0, '2016-11-25 12:29:11'),
(26, 'd386748b14bd129f25920c75a2888ed3', '0', 0, '2016-11-25 12:29:12'),
(27, 'ba416e0ac3ee7a9fea0b7e74986ba994', '0', 0, '2016-11-25 12:29:13'),
(28, '1a85db0d5a0e04a01e746891e7190669', '0', 0, '2016-11-25 12:29:14'),
(29, '8cd79ed766c5c1386db712384ca53734', '0', 0, '2016-11-25 12:29:15'),
(30, '83ff8ef33fe7532b986eb3951cb6f3e6', '0', 0, '2016-11-25 12:29:16'),
(31, 'c1f7a33aac7a1b4a7edb54e1ffad3b02', '0', 0, '2016-11-25 12:29:17'),
(32, 'e883db61eda2e706cbf0e52ecc38756b', '0', 0, '2016-11-25 12:29:18'),
(33, '34b7d8ea3207962a110715c956842b09', '0', 0, '2016-11-25 12:29:19'),
(34, '3967f48f415b393de61503e7dc1acc5e', '0', 0, '2016-11-25 12:29:20'),
(35, 'b9e2eebab125966e63ea8876bc2899c3', '0', 0, '2016-11-25 12:29:21'),
(36, '2d781aae4241e76f2a55efea63e34bd2', '0', 0, '2016-11-25 12:29:23'),
(37, '6acc458c3ae9812bd2dff9c81ec4d1cf', '0', 0, '2016-11-25 12:29:24'),
(38, '798b8fcb13167c0c7f6fd0c3eae38e05', '0', 0, '2016-11-25 12:29:25'),
(39, 'c312dda9a45ad5e7cbeb2af7b0e22bdc', '0', 0, '2016-11-25 12:29:26'),
(40, '1e64a256e2c6b431905f81a8c57cdc33', '0', 0, '2016-11-25 12:29:27'),
(41, 'e310abc181cc86a0ae5571e9210052bd', '0', 0, '2016-11-25 12:29:28'),
(42, 'e287434f13db2ffcc36977eadb44596e', '0', 0, '2016-11-25 12:29:29'),
(43, '9ee52b71378254acdc3fbd48c292393b', '0', 0, '2016-11-25 12:29:30'),
(44, 'd28594c0ccdc09a9ebd435331d731016', '0', 0, '2016-11-25 12:29:31'),
(45, '0164d086fb6bd3827060e25e516aef1d', '0', 0, '2016-11-25 12:29:32'),
(46, 'e1b0772b88a08628222ba2da5cb89ff8', '0', 0, '2016-11-25 12:29:33'),
(47, 'b96860c32a7d88c527b806ed72b8fbb0', '0', 0, '2016-11-25 12:29:35'),
(48, 'e5458e20461f3bb7e8da32692cddae09', '0', 0, '2016-11-25 12:29:36'),
(49, '512c926e5f50f7274a80ef1872f83911', '0', 0, '2016-11-25 12:29:37'),
(50, '0a7042e4c18546420a8ea0a7e1c913bc', '0', 0, '2016-11-25 12:29:38'),
(51, 'd91b65c4b8211d389dce5d96bafda41c', '0', 0, '2016-11-25 12:29:39'),
(52, '985741eb7f72998e6f8abcf0d37339f4', '0', 0, '2016-11-25 12:29:40'),
(53, '82c0a908ac170a1a6c9ef03cc61e23fe', '0', 0, '2016-11-25 12:29:41'),
(54, '548ede7d4dd8aba760bb4344f2404336', '0', 0, '2016-11-25 12:29:42'),
(55, '2bcbb0dec9e1e81ea5ed869bb68f5cdb', '0', 0, '2016-11-25 12:29:43'),
(56, '62f938474c0207acc0a022c88e0f25ae', '0', 0, '2016-11-25 12:29:44'),
(57, '28af4aadef9a77eb48de72bdfcb73f59', '0', 0, '2016-11-25 12:29:45'),
(58, 'f2c47f7e689a67c1602ec31d6ffe04a2', '0', 0, '2016-11-25 12:29:46'),
(59, '65b8c121ecc9ea68455c69b6f9cd865b', '0', 0, '2016-11-25 12:29:48'),
(60, 'a2eff4c3c7f7ba7263dfe59529d5bb80', '0', 0, '2016-11-25 12:29:49'),
(61, '003cca999afde7ec727d496da929f5f1', '0', 0, '2016-11-25 12:29:50'),
(62, 'b58c3cf66463abc52db36cd2a04af3c5', '0', 0, '2016-11-25 12:29:51'),
(63, '8a142786dbf59106d4d21560bcdf8aab', '0', 0, '2016-11-25 12:29:52'),
(64, '97364479ff5bb8f9bc831e7cff747c0b', '0', 0, '2016-11-25 12:29:53'),
(65, 'd20d9832516ac6025c33b3c23fedada7', '0', 0, '2016-11-25 12:29:54'),
(66, '10ff8a44496a1fc83c9f25e848469e88', '0', 0, '2016-11-25 12:29:55'),
(67, 'd19f104d33a60b203a69fe6661a5cb8c', '0', 0, '2016-11-25 12:29:56'),
(68, 'e2cb6eb36cd1e1829cf8cec50a2bc58d', '0', 0, '2016-11-25 12:29:57'),
(69, '36718d9f71a303dc88541d8e542c774f', '0', 0, '2016-11-25 12:29:58'),
(70, '657b34e5ed97195b098c6f703a09675e', '0', 0, '2016-11-25 12:30:00'),
(71, '7123ab0fa29776dafe08599117c80fe9', '0', 0, '2016-11-25 12:30:01'),
(72, 'ad437e71663d11ffd0d783fa99513ce9', '0', 0, '2016-11-25 12:30:02'),
(73, 'f360d40dbdca7fc23343b5e42c0cf33a', '0', 0, '2016-11-25 12:30:03'),
(74, '361da0171d0a35a020b5e91913441c03', '0', 0, '2016-11-25 12:30:04'),
(75, '4f27d81cb54188797a4990a46dec2fb6', '0', 0, '2016-11-25 12:30:05'),
(76, '4c40e27c63f470234979761a1ec2ecd2', '0', 0, '2016-11-25 12:30:06'),
(77, 'da12fc73203ce7d2ef5d25e75de0e822', '0', 0, '2016-11-25 12:30:07'),
(78, 'a460e2397646bd27e57e905c024d4616', '0', 0, '2016-11-25 12:30:08'),
(79, '1f68c6bebd54bee4ba55814bfb83b783', '0', 0, '2016-11-25 12:30:09'),
(80, '373298749391441b2054d3627a648fa4', '0', 0, '2016-11-25 12:30:11'),
(81, '570cf7386bc5bacaae9dff4b3b26c75c', '0', 0, '2016-11-25 12:30:12'),
(82, 'a910f075e5e299aec52294ffb5391fb2', '0', 0, '2016-11-25 12:30:13'),
(83, '8b22932aef9580d058faa9eeb7c31cd3', '0', 0, '2016-11-25 12:30:14'),
(84, 'd8436cfc2026c6a21e5cad44253cf37a', '0', 0, '2016-11-25 12:30:15'),
(85, '2659080c38c56709c3dd57460987e8b1', '0', 0, '2016-11-25 12:30:16'),
(86, '7582d38ac82f2988c8ba8897c96e773d', '0', 0, '2016-11-25 12:30:17'),
(87, 'ccab3618265594db885896362079b0cd', '0', 0, '2016-11-25 12:30:18'),
(88, '53ed8ba5866b0beb6ee7330e109a81ca', '0', 0, '2016-11-25 12:30:19'),
(89, 'ac6576ee672ab3fa383c0159271b65c8', '0', 0, '2016-11-25 12:30:20'),
(90, 'ea51a96adb05d62db2462c2e566783f4', '0', 0, '2016-11-25 12:30:21'),
(91, '2d4f6e7c0b9ca7af582f2c7d991215e0', '0', 0, '2016-11-25 12:30:22'),
(92, '4e71d7cb465cb4477e28fe09a303ed96', '0', 0, '2016-11-25 12:30:23'),
(93, 'b0ae0a2629a86a816ae4cc2173976f96', '0', 0, '2016-11-25 12:30:24'),
(94, '28dfe3d39d92c9cf722ca84679b166b6', '0', 0, '2016-11-25 12:30:26'),
(95, '8a7aafdc706cb28553f7aa01c2cbd80e', '0', 0, '2016-11-25 12:30:27'),
(96, '349f564cdc2abe36b2b69d6ad4af5a4e', '0', 0, '2016-11-25 12:30:28'),
(97, 'a068d270496aa6e8e7e778e85b8ce717', '0', 0, '2016-11-25 12:30:29'),
(98, 'c651afe72c52b6e22765db2b06b454d1', '0', 0, '2016-11-25 12:30:30'),
(99, '704980e8bdf7f61d5520d789b8049827', '0', 0, '2016-11-25 12:30:31'),
(100, '53a00c254a6699191b0cdc9ebaa491c0', '0', 0, '2016-11-25 12:30:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
