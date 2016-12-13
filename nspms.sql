-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 02:03 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nspms`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(80) NOT NULL,
  `cpass` varchar(80) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_request`
--

CREATE TABLE IF NOT EXISTS `company_request` (
  `crid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`crid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE IF NOT EXISTS `marital_status` (
  `msid` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`msid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

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
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(80) NOT NULL,
  `nationality` varchar(80) NOT NULL,
  `noun` varchar(80) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=226 ;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nid`, `country`, `nationality`, `noun`) VALUES
(1, 'Abkhazia', 'Abkhazian', 'Abkhazians'),
(2, 'Afghanistan', 'Afghan', 'Afghans'),
(3, 'Albania', 'Albanian', 'Albanians'),
(4, 'Algeria', 'Algerian', 'Algerians'),
(5, 'American Samoa', 'American Samoan', 'American Samoans'),
(6, 'Andorra', 'Andorran', 'Andorrans'),
(7, 'Angola', 'Angolan', 'Angolans'),
(8, 'Anguilla', 'Anguillan', 'Anguillans'),
(9, 'Antigua and Barbuda', 'Antiguan', 'Antiguans'),
(10, 'Argentina', 'Argentinian', 'Argentinians'),
(11, 'Armenia', 'Armenian', 'Armenians'),
(12, 'Aruba', 'Aruban', 'Arubans'),
(13, 'Australia', 'Australian', 'Australians'),
(14, 'Austria', 'Austrian', 'Austrians'),
(15, 'Azerbaijan', 'Azerbaijani', 'Azerbaijanis'),
(16, 'Bahamas', 'Bahamian', 'Bahamians'),
(17, 'Bahrain', 'Bahraini', 'Bahrainis'),
(18, 'Bangladesh', 'Bangladeshi', 'Bangladeshis'),
(19, 'Barbados', 'Barbadian', 'Barbadians'),
(20, 'Belarus', 'Belarusian', 'Belarusians'),
(21, 'Belgium', 'Belgian', 'Belgians'),
(22, 'Belize', 'Belizean', 'Belizeans'),
(23, 'Benin', 'Beninese', 'Beninese'),
(24, 'Bermuda', 'Bermudan', 'Bermudans'),
(25, 'Bhutan', 'Bhutanese', 'Bhutanese'),
(26, 'Bolivia', 'Bolivian', 'Bolivians'),
(27, 'Botswana', 'Botswanan', 'Botswanans'),
(28, 'Brazil', 'Brazilian', 'Brazilians'),
(29, 'British Virgin Islands', 'British Virgin Islander', 'British Virgin Islanders'),
(30, 'Brunei', 'Bruneian', 'Bruneians'),
(31, 'Bulgaria', 'Bulgarian', 'Bulgarians'),
(32, 'Burkina Fasoa', 'Burkinabé', 'Burkinabé'),
(33, 'Burmab', 'Burmese', 'Burmese'),
(34, 'Burundi', 'Burundian', 'Burundians'),
(35, 'Cambodia', 'Cambodian', 'Cambodians'),
(36, 'Cameroon', 'Cameroonian', 'Cameroonians'),
(37, 'Canada', 'Canadian', 'Canadians'),
(38, 'Cape Verde', 'Cape Verdean', 'Cape Verdeans'),
(39, 'Cayman Islands', 'Caymanian', 'Caymanians'),
(40, 'Central African Republic', 'Central African', 'Central Africans'),
(41, 'Chad', 'Chadian', 'Chadians'),
(42, 'Chile', 'Chilean', 'Chileans'),
(43, 'People''s Republic of China', 'Chinese', 'Chinese'),
(44, 'Christmas Island', 'Christmas Island', 'Christmas Islanders'),
(45, 'Cocos (Keeling) Islands', 'Cocos Island', 'Cocos Islanders'),
(46, 'Colombia', 'Colombian', 'Colombians'),
(47, 'Comoros', 'Comorian', 'Comorians'),
(48, 'Dem. Republic of the Congo', 'Congolese (Dem. Rep.)', 'Congolese (Dem. Rep.)'),
(49, 'Republic of the Congo', 'Congolese (Rep.)', 'Congolese (Rep.)'),
(50, 'Cook Islands', 'Cook Islands', 'Cook Islanders'),
(51, 'Costa Rica', 'Costa Rican', 'Costa Ricans'),
(52, 'Côte d''Ivoire', 'Ivorian', 'Ivorians'),
(53, 'Croatia', 'Croatian', 'Croats'),
(54, 'Cuba', 'Cuban', 'Cubans'),
(55, 'Cyprus', 'Cypriot', 'Cypriots'),
(56, 'Czech Republic', 'Czech', 'Czechs'),
(57, 'Denmark', 'Danish', 'Danes'),
(58, 'Djibouti', 'Djiboutian', 'Djiboutians'),
(59, 'Dominica', 'Dominican', 'Dominicans'),
(60, 'Dominican Republic', 'Dominican', 'Dominicans'),
(61, 'East Timor', 'Timorese', 'Timorese'),
(62, 'Ecuador', 'Ecuadorian', 'Ecuadorians'),
(63, 'Egypt', 'Egyptian', 'Egyptians'),
(64, 'El Salvador', 'Salvadoran', 'Salvadorans'),
(65, 'England', 'English', 'English'),
(66, 'Equatorial Guinea', 'Equatorial Guinean', 'Equatorial Guineans'),
(67, 'Eritrea', 'Eritrean', 'Eritreans'),
(68, 'Estonia', 'Estonian', 'Estonians'),
(69, 'Ethiopia', 'Ethiopian', 'Ethiopians'),
(70, 'Falkland Islands', 'Falkland Island', 'Falkland Islanders'),
(71, 'Faroe Islands', 'Faroese', 'Faroese'),
(72, 'Fiji', 'Fijian', 'Fijians'),
(73, 'Finland', 'Finnish', 'Finns'),
(74, 'France', 'French', 'French'),
(75, 'French Guiana', 'French Guianese', 'French Guianese'),
(76, 'French Polynesia', 'French Polynesian', 'French Polynesians'),
(77, 'Gabon', 'Gabonese', 'Gabonese'),
(78, 'Gambia', 'Gambian', 'Gambians'),
(79, 'Georgia', 'Georgian', 'Georgians'),
(80, 'Germany', 'German', 'Germans'),
(81, 'Ghana', 'Ghanaian', 'Ghanaians'),
(82, 'Gibraltar', 'Gibraltar', 'Gibraltarians'),
(83, 'Great Britain', 'British', 'Britons'),
(84, 'Greece', 'Greek', 'Greeks'),
(85, 'Greenland', 'Greenlandic', 'Greenlanders'),
(86, 'Grenada', 'Grenadian', 'Grenadians'),
(87, 'Guadeloupe', 'Guadeloupe', 'Guadeloupians'),
(88, 'Guam', 'Guamanian', 'Guamanians'),
(89, 'Guatemala', 'Guatemalan', 'Guatemalans'),
(90, 'Guinea', 'Guinean', 'Guineans'),
(91, 'Guinea-Bissau', 'Guinea-Bissauan', 'Guinea-Bissauans'),
(92, 'Guyana', 'Guyanese', 'Guyanese'),
(93, 'Haiti', 'Haitian', 'Haitians'),
(94, 'Honduras', 'Honduran', 'Hondurans'),
(95, 'Hungary', 'Hungarian', 'Hungarians'),
(96, 'Iceland', 'Icelandic', 'Icelanders'),
(97, 'India', 'Indian', 'Indians'),
(98, 'Indonesia', 'Indonesian', 'Indonesians'),
(99, 'Iran', 'Iranian', 'Iranians'),
(100, 'Iraq', 'Iraqi', 'Iraqis'),
(101, 'Ireland', 'Irish', 'Irish'),
(102, 'Isle of Man', 'Manx', 'Manx'),
(103, 'Israel', 'Israeli', 'Israelis'),
(104, 'Italy', 'Italian', 'Italians'),
(105, 'Jamaica', 'Jamaican', 'Jamaicans'),
(106, 'Japan', 'Japanese', 'Japanese'),
(107, 'Jordan', 'Jordanian', 'Jordanians'),
(108, 'Kazakhstan', 'Kazakh', 'Kazakhs'),
(109, 'Kenya', 'Kenyan', 'Kenyans'),
(110, 'Kiribati', 'I-Kiribati', 'I-Kiribati'),
(111, 'North Korea', 'North Korean', 'North Koreans'),
(112, 'South Korea', 'South Korean', 'South Koreans'),
(113, 'Kosovo', 'Kosovar', 'Kosovars'),
(114, 'Kuwait', 'Kuwaiti', 'Kuwaitis'),
(115, 'Kyrgyzstan', 'Kyrgyzstani', 'Kyrgyzstanis'),
(116, 'Laos', 'Laotian', 'Laotians'),
(117, 'Latvia', 'Latvian', 'Latvians'),
(118, 'Lebanon', 'Lebanese', 'Lebanese'),
(119, 'Lesotho', 'Basotho', 'Basotho'),
(120, 'Liberia', 'Liberian', 'Liberians'),
(121, 'Libya', 'Libyan', 'Libyans'),
(122, 'Liechtenstein', 'Liechtenstein', 'Liechtensteiners'),
(123, 'Lithuania', 'Lithuanian', 'Lithuanians'),
(124, 'Luxembourg', 'Luxembourg', 'Luxembourgers'),
(125, 'Macau', 'Macanese', 'Macanese'),
(126, 'Republic of Macedonia', 'Macedonian', 'Macedonians'),
(127, 'Madagascar', 'Malagasy', 'Malagasy'),
(128, 'Malawi', 'Malawian', 'Malawians'),
(129, 'Malaysia', 'Malaysian', 'Malaysians'),
(130, 'Maldives', 'Maldivian', 'Maldivians'),
(131, 'Mali', 'Malian', 'Malians'),
(132, 'Malta', 'Maltese', 'Maltese'),
(133, 'Marshall Islands', 'Marshallese', 'Marshallese'),
(134, 'Martinique', 'Martiniquais', 'Martiniquais'),
(135, 'Mauritania', 'Mauritanian', 'Mauritanians'),
(136, 'Mauritius', 'Mauritian', 'Mauritians'),
(137, 'Mayotte', 'Mahoran', 'Mahorais'),
(138, 'Mexico', 'Mexican', 'Mexicans'),
(139, 'Moldova', 'Moldovan', 'Moldovans'),
(140, 'Monaco', 'Monacan', 'Monacans'),
(141, 'Mongolia', 'Mongolian', 'Mongolians'),
(142, 'Montenegro', 'Montenegrin', 'Montenegrins'),
(143, 'Montserrat', 'Montserratian', 'Montserratians'),
(144, 'Morocco', 'Moroccan', 'Moroccans'),
(145, 'Mozambique', 'Mozambican', 'Mozambicans'),
(146, 'Namibia', 'Namibian', 'Namibians'),
(147, 'Nauru', 'Nauruan', 'Nauruans'),
(148, 'Nepal', 'Nepalese', 'Nepalese'),
(149, 'Netherlands', 'Dutch', 'Dutch'),
(150, 'New Caledonia', 'New Caledonian', 'New Caledonians'),
(151, 'New Zealand', 'New Zealand', 'New Zealanders'),
(152, 'Nicaragua', 'Nicaraguan', 'Nicaraguans'),
(153, 'Niue', 'Niuean', 'Niueans'),
(154, 'Niger', 'Nigerien', 'Nigeriens'),
(155, 'Nigeria', 'Nigerian', 'Nigerians'),
(156, 'Norway', 'Norwegian', 'Norwegians'),
(157, 'Northern Ireland', 'Northern Irish', 'Northern Irish'),
(158, 'Northern Marianas', 'Northern Marianan', 'Northern Marianans'),
(159, 'Oman', 'Omani', 'Omanis'),
(160, 'Pakistan', 'Pakistani', 'Pakistanis'),
(161, 'Palestine', 'Palestinian', 'Palestinians'),
(162, 'Palau', 'Palauan', 'Palauans'),
(163, 'Panama', 'Panamanian', 'Panamanians'),
(164, 'Paraguay', 'Paraguayan', 'Paraguayans'),
(165, 'Peru', 'Peruvian', 'Peruvians'),
(166, 'Philippines', 'Filipino', 'Filipinos'),
(167, 'Poland', 'Polish', 'Poles'),
(168, 'Portugal', 'Portuguese', 'Portuguese'),
(169, 'Puerto Rico', 'Puerto Rican', 'Puerto Ricans'),
(170, 'Qatar', 'Qatari', 'Qataris'),
(171, 'Republic of Ireland', 'Irish', 'Irish'),
(172, 'Réunion', 'Réunionese', 'Réunionese'),
(173, 'Romania', 'Romanian', 'Romanians'),
(174, 'Russia', 'Russian', 'Russians'),
(175, 'Rwanda', 'Rwandan', 'Rwandans'),
(176, 'St. Helena', 'St. Helenian', 'St. Helenians'),
(177, 'St. Lucia', 'St. Lucian', 'St. Lucians'),
(178, 'Samoa', 'Samoan', 'Samoans'),
(179, 'San Marino', 'Sammarinese', 'Sammarinese'),
(180, 'Saudi Arabia', 'Saudi Arabian', 'Saudi Arabians'),
(181, 'Scotland', 'Scottish', 'Scots'),
(182, 'Senegal', 'Senegalese', 'Senegalese'),
(183, 'Serbia', 'Serbian', 'Serbians'),
(184, 'Seychelles', 'Seychellois', 'Seychellois'),
(185, 'Sierra Leone', 'Sierra Leonean', 'Sierra Leoneans'),
(186, 'Singapore', 'Singaporean', 'Singaporeans'),
(187, 'Slovakia', 'Slovak', 'Slovaks'),
(188, 'Slovenia', 'Slovenian', 'Slovenians'),
(189, 'Somalia', 'Somali', 'Somalis'),
(190, 'South Africa', 'South African', 'South Africans'),
(191, 'South Sudan', 'South Sudanese', 'South Sudanese'),
(192, 'Spain', 'Spanish', 'Spaniards'),
(193, 'Sri Lanka', 'Sri Lankan', 'Sri Lankans'),
(194, 'Sudan', 'Sudanese', 'Sudanese'),
(195, 'Surinam', 'Surinamese', 'Surinamers'),
(196, 'Swaziland', 'Swazi', 'Swazis'),
(197, 'Sweden', 'Swedish', 'Swedes'),
(198, 'Switzerland', 'Swiss', 'Swiss'),
(199, 'Syria', 'Syrian', 'Syrians'),
(200, 'Taiwan', 'Taiwanese', 'Taiwanese'),
(201, 'Tajikistan', 'Tajikistani', 'Tajikistanis'),
(202, 'Tanzania', 'Tanzanian', 'Tanzanians'),
(203, 'Thailand', 'Thai', 'Thai'),
(204, 'Togo', 'Togolese', 'Togolese'),
(205, 'Tonga', 'Tongan', 'Tongans'),
(206, 'Tunisia', 'Tunisian', 'Tunisians'),
(207, 'Turkey', 'Turkish', 'Turks'),
(208, 'Turkmenistan', 'Turkmen', 'Turkmens'),
(209, 'Tuvalu', 'Tuvaluan', 'Tuvaluans'),
(210, 'Uganda', 'Ugandan', 'Ugandans'),
(211, 'Ukraine', 'Ukrainian', 'Ukrainians'),
(212, 'United Arab Emirates', 'Emirati', 'Emiratis'),
(213, 'United Kingdom', 'British', 'Britons'),
(214, 'United States', 'American', 'Americans'),
(215, 'Uruguay', 'Uruguayan', 'Uruguayans'),
(216, 'Uzbekistan', 'Uzbek', 'Uzbeks'),
(217, 'Vanuatu', 'Vanuatuan', 'Vanuatuans'),
(218, 'Venezuela', 'Venezuelan', 'Venezuelans'),
(219, 'Vietnam', 'Vietnamese', 'Vietnamese'),
(220, 'Virgin Islands', 'Virgin Island', 'Virgin Islanders'),
(221, 'Wales', 'Welsh', 'Welsh'),
(222, 'Western Sahara', 'Sahrawian', 'Sahrawis'),
(223, 'Yemen', 'Yemeni', 'Yemenis'),
(224, 'Zambia', 'Zambian', 'Zambians'),
(225, 'Zimbabwe', 'Zimbabwean', 'Zimbabweans');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `options` varchar(80) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE IF NOT EXISTS `posting` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(80) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `shid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(80) NOT NULL,
  `spassword` varchar(80) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`shid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`shid`, `sname`, `spassword`, `added`) VALUES
(1, 'Valley View University', '21232f297a57a5a743894a0e4a801fc3', '2016-12-12 03:00:00'),
(2, 'University of Ghana', '21232f297a57a5a743894a0e4a801fc3', '2016-12-06 05:00:00'),
(3, 'Kwame Nkrumah University of Science and Technology', '21232f297a57a5a743894a0e4a801fc3', '2016-11-28 04:00:00'),
(4, 'University of Development Studies', '21232f297a57a5a743894a0e4a801fc3', '2016-12-29 05:00:00'),
(5, 'Ghana Telecom University College', '21232f297a57a5a743894a0e4a801fc3', '2016-12-01 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schoolfiles`
--

CREATE TABLE IF NOT EXISTS `schoolfiles` (
  `sfid` int(11) NOT NULL AUTO_INCREMENT,
  `files` varchar(80) NOT NULL,
  `year` varchar(4) NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`sfid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE IF NOT EXISTS `studentinfo` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fname` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mname` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phonenum` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('m','f') COLLATE utf8_unicode_ci DEFAULT NULL,
  `msid` int(11) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  `resaddress` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instituition` int(11) DEFAULT NULL,
  `next_of_kin_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kin_contact` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kin_email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kin_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kin_relationship` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `study_leave` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_contact` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disability` enum('0','1') COLLATE utf8_unicode_ci DEFAULT NULL,
  `disability_type` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`sid`, `studentid`, `fname`, `lname`, `mname`, `program`, `email`, `dob`, `phonenum`, `gender`, `msid`, `nid`, `resaddress`, `instituition`, `next_of_kin_name`, `kin_contact`, `kin_email`, `kin_address`, `kin_relationship`, `avatar`, `study_leave`, `organization_contact`, `disability`, `disability_type`, `time`, `year`) VALUES
(1, '214cs01001767', 'bright', 'asare', 'bright', 'Bsc.computer science', 'asarebright81@gmail.com', '2015-10-01', '0208499091', 'm', 1, NULL, 'hse no 10', 0, '0', '0', '0', '0', '0', '', '0', '', '0', '', '2016-11-23 17:49:08', ''),
(2, ' 214cs01001767', ' bright', 'Boamah', 'kofi', 'Bsc.Computer Science', ' kofiboamah@gmail.com ', NULL, '208499091', 'm', 0, NULL, ' hse n0 10', 0, '', '', '', '', '', '', '0', '', '0', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_request`
--

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `sid` int(11) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=102 ;

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
(100, '53a00c254a6699191b0cdc9ebaa491c0', '0', 0, '2016-11-25 12:30:32'),
(101, '8a11c69c7b0bc248889a2df8b0e393ad', '0', 0, '2016-12-12 23:27:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
