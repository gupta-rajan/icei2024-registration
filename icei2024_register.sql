-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 08:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `specom_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` char(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(5) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `phone`, `cid`) VALUES
(1, 'AF', 'Afghanistan', 93, 0),
(2, 'AX', 'Aland Islands', 358, 1),
(3, 'AL', 'Albania', 355, 1),
(4, 'DZ', 'Algeria', 213, 1),
(5, 'AS', 'American Samoa', 1684, 1),
(6, 'AD', 'Andorra', 376, 1),
(7, 'AO', 'Angola', 244, 1),
(8, 'AI', 'Anguilla', 1264, 1),
(9, 'AQ', 'Antarctica', 672, 1),
(10, 'AG', 'Antigua and Barbuda', 1268, 1),
(11, 'AR', 'Argentina', 54, 1),
(12, 'AM', 'Armenia', 374, 1),
(13, 'AW', 'Aruba', 297, 1),
(14, 'AU', 'Australia', 61, 1),
(15, 'AT', 'Austria', 43, 1),
(16, 'AZ', 'Azerbaijan', 994, 1),
(17, 'BS', 'Bahamas', 1242, 1),
(18, 'BH', 'Bahrain', 973, 1),
(19, 'BD', 'Bangladesh', 880, 0),
(20, 'BB', 'Barbados', 1246, 1),
(21, 'BY', 'Belarus', 375, 1),
(22, 'BE', 'Belgium', 32, 1),
(23, 'BZ', 'Belize', 501, 1),
(24, 'BJ', 'Benin', 229, 1),
(25, 'BM', 'Bermuda', 1441, 1),
(26, 'BT', 'Bhutan', 975, 0),
(27, 'BO', 'Bolivia', 591, 1),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', 599, 1),
(29, 'BA', 'Bosnia and Herzegovina', 387, 1),
(30, 'BW', 'Botswana', 267, 1),
(31, 'BV', 'Bouvet Island', 55, 1),
(32, 'BR', 'Brazil', 55, 1),
(33, 'IO', 'British Indian Ocean Territory', 246, 1),
(34, 'BN', 'Brunei Darussalam', 673, 1),
(35, 'BG', 'Bulgaria', 359, 1),
(36, 'BF', 'Burkina Faso', 226, 1),
(37, 'BI', 'Burundi', 257, 1),
(38, 'KH', 'Cambodia', 855, 1),
(39, 'CM', 'Cameroon', 237, 1),
(40, 'CA', 'Canada', 1, 1),
(41, 'CV', 'Cape Verde', 238, 1),
(42, 'KY', 'Cayman Islands', 1345, 1),
(43, 'CF', 'Central African Republic', 236, 1),
(44, 'TD', 'Chad', 235, 1),
(45, 'CL', 'Chile', 56, 1),
(46, 'CN', 'China', 86, 1),
(47, 'CX', 'Christmas Island', 61, 1),
(48, 'CC', 'Cocos (Keeling) Islands', 672, 1),
(49, 'CO', 'Colombia', 57, 1),
(50, 'KM', 'Comoros', 269, 1),
(51, 'CG', 'Congo', 242, 1),
(52, 'CD', 'Congo, Democratic Republic of the Congo', 242, 1),
(53, 'CK', 'Cook Islands', 682, 1),
(54, 'CR', 'Costa Rica', 506, 1),
(55, 'CI', 'Cote D\'Ivoire', 225, 1),
(56, 'HR', 'Croatia', 385, 1),
(57, 'CU', 'Cuba', 53, 1),
(58, 'CW', 'Curacao', 599, 1),
(59, 'CY', 'Cyprus', 357, 1),
(60, 'CZ', 'Czech Republic', 420, 1),
(61, 'DK', 'Denmark', 45, 1),
(62, 'DJ', 'Djibouti', 253, 1),
(63, 'DM', 'Dominica', 1767, 1),
(64, 'DO', 'Dominican Republic', 1809, 1),
(65, 'EC', 'Ecuador', 593, 1),
(66, 'EG', 'Egypt', 20, 1),
(67, 'SV', 'El Salvador', 503, 1),
(68, 'GQ', 'Equatorial Guinea', 240, 1),
(69, 'ER', 'Eritrea', 291, 1),
(70, 'EE', 'Estonia', 372, 1),
(71, 'ET', 'Ethiopia', 251, 1),
(72, 'FK', 'Falkland Islands (Malvinas)', 500, 1),
(73, 'FO', 'Faroe Islands', 298, 1),
(74, 'FJ', 'Fiji', 679, 1),
(75, 'FI', 'Finland', 358, 1),
(76, 'FR', 'France', 33, 1),
(77, 'GF', 'French Guiana', 594, 1),
(78, 'PF', 'French Polynesia', 689, 1),
(79, 'TF', 'French Southern Territories', 262, 1),
(80, 'GA', 'Gabon', 241, 1),
(81, 'GM', 'Gambia', 220, 1),
(82, 'GE', 'Georgia', 995, 1),
(83, 'DE', 'Germany', 49, 1),
(84, 'GH', 'Ghana', 233, 1),
(85, 'GI', 'Gibraltar', 350, 1),
(86, 'GR', 'Greece', 30, 1),
(87, 'GL', 'Greenland', 299, 1),
(88, 'GD', 'Grenada', 1473, 1),
(89, 'GP', 'Guadeloupe', 590, 1),
(90, 'GU', 'Guam', 1671, 1),
(91, 'GT', 'Guatemala', 502, 1),
(92, 'GG', 'Guernsey', 44, 1),
(93, 'GN', 'Guinea', 224, 1),
(94, 'GW', 'Guinea-Bissau', 245, 1),
(95, 'GY', 'Guyana', 592, 1),
(96, 'HT', 'Haiti', 509, 1),
(97, 'HM', 'Heard Island and Mcdonald Islands', 0, 1),
(98, 'VA', 'Holy See (Vatican City State)', 39, 1),
(99, 'HN', 'Honduras', 504, 1),
(100, 'HK', 'Hong Kong', 852, 1),
(101, 'HU', 'Hungary', 36, 1),
(102, 'IS', 'Iceland', 354, 1),
(103, 'IN', 'India', 91, 0),
(104, 'ID', 'Indonesia', 62, 1),
(105, 'IR', 'Iran, Islamic Republic of', 98, 1),
(106, 'IQ', 'Iraq', 964, 1),
(107, 'IE', 'Ireland', 353, 1),
(108, 'IM', 'Isle of Man', 44, 1),
(109, 'IL', 'Israel', 972, 1),
(110, 'IT', 'Italy', 39, 1),
(111, 'JM', 'Jamaica', 1876, 1),
(112, 'JP', 'Japan', 81, 1),
(113, 'JE', 'Jersey', 44, 1),
(114, 'JO', 'Jordan', 962, 1),
(115, 'KZ', 'Kazakhstan', 7, 1),
(116, 'KE', 'Kenya', 254, 1),
(117, 'KI', 'Kiribati', 686, 1),
(118, 'KP', 'Korea, Democratic People\'s Republic of', 850, 1),
(119, 'KR', 'Korea, Republic of', 82, 1),
(120, 'XK', 'Kosovo', 383, 1),
(121, 'KW', 'Kuwait', 965, 1),
(122, 'KG', 'Kyrgyzstan', 996, 1),
(123, 'LA', 'Lao People\'s Democratic Republic', 856, 1),
(124, 'LV', 'Latvia', 371, 1),
(125, 'LB', 'Lebanon', 961, 1),
(126, 'LS', 'Lesotho', 266, 1),
(127, 'LR', 'Liberia', 231, 1),
(128, 'LY', 'Libyan Arab Jamahiriya', 218, 1),
(129, 'LI', 'Liechtenstein', 423, 1),
(130, 'LT', 'Lithuania', 370, 1),
(131, 'LU', 'Luxembourg', 352, 1),
(132, 'MO', 'Macao', 853, 1),
(133, 'MK', 'Macedonia, the Former Yugoslav Republic of', 389, 1),
(134, 'MG', 'Madagascar', 261, 1),
(135, 'MW', 'Malawi', 265, 1),
(136, 'MY', 'Malaysia', 60, 1),
(137, 'MV', 'Maldives', 960, 0),
(138, 'ML', 'Mali', 223, 1),
(139, 'MT', 'Malta', 356, 1),
(140, 'MH', 'Marshall Islands', 692, 1),
(141, 'MQ', 'Martinique', 596, 1),
(142, 'MR', 'Mauritania', 222, 1),
(143, 'MU', 'Mauritius', 230, 1),
(144, 'YT', 'Mayotte', 262, 1),
(145, 'MX', 'Mexico', 52, 1),
(146, 'FM', 'Micronesia, Federated States of', 691, 1),
(147, 'MD', 'Moldova, Republic of', 373, 1),
(148, 'MC', 'Monaco', 377, 1),
(149, 'MN', 'Mongolia', 976, 1),
(150, 'ME', 'Montenegro', 382, 1),
(151, 'MS', 'Montserrat', 1664, 1),
(152, 'MA', 'Morocco', 212, 1),
(153, 'MZ', 'Mozambique', 258, 1),
(154, 'MM', 'Myanmar', 95, 1),
(155, 'NA', 'Namibia', 264, 1),
(156, 'NR', 'Nauru', 674, 1),
(157, 'NP', 'Nepal', 977, 0),
(158, 'NL', 'Netherlands', 31, 1),
(159, 'AN', 'Netherlands Antilles', 599, 1),
(160, 'NC', 'New Caledonia', 687, 1),
(161, 'NZ', 'New Zealand', 64, 1),
(162, 'NI', 'Nicaragua', 505, 1),
(163, 'NE', 'Niger', 227, 1),
(164, 'NG', 'Nigeria', 234, 1),
(165, 'NU', 'Niue', 683, 1),
(166, 'NF', 'Norfolk Island', 672, 1),
(167, 'MP', 'Northern Mariana Islands', 1670, 1),
(168, 'NO', 'Norway', 47, 1),
(169, 'OM', 'Oman', 968, 1),
(170, 'PK', 'Pakistan', 92, 0),
(171, 'PW', 'Palau', 680, 1),
(172, 'PS', 'Palestinian Territory, Occupied', 970, 1),
(173, 'PA', 'Panama', 507, 1),
(174, 'PG', 'Papua New Guinea', 675, 1),
(175, 'PY', 'Paraguay', 595, 1),
(176, 'PE', 'Peru', 51, 1),
(177, 'PH', 'Philippines', 63, 1),
(178, 'PN', 'Pitcairn', 64, 1),
(179, 'PL', 'Poland', 48, 1),
(180, 'PT', 'Portugal', 351, 1),
(181, 'PR', 'Puerto Rico', 1787, 1),
(182, 'QA', 'Qatar', 974, 1),
(183, 'RE', 'Reunion', 262, 1),
(184, 'RO', 'Romania', 40, 1),
(185, 'RU', 'Russia', 7, 1),
(186, 'RW', 'Rwanda', 250, 1),
(187, 'BL', 'Saint Barthelemy', 590, 1),
(188, 'SH', 'Saint Helena', 290, 1),
(189, 'KN', 'Saint Kitts and Nevis', 1869, 1),
(190, 'LC', 'Saint Lucia', 1758, 1),
(191, 'MF', 'Saint Martin', 590, 1),
(192, 'PM', 'Saint Pierre and Miquelon', 508, 1),
(193, 'VC', 'Saint Vincent and the Grenadines', 1784, 1),
(194, 'WS', 'Samoa', 684, 1),
(195, 'SM', 'San Marino', 378, 1),
(196, 'ST', 'Sao Tome and Principe', 239, 1),
(197, 'SA', 'Saudi Arabia', 966, 1),
(198, 'SN', 'Senegal', 221, 1),
(199, 'RS', 'Serbia', 381, 1),
(200, 'CS', 'Serbia and Montenegro', 381, 1),
(201, 'SC', 'Seychelles', 248, 1),
(202, 'SL', 'Sierra Leone', 232, 1),
(203, 'SG', 'Singapore', 65, 1),
(204, 'SX', 'Sint Maarten', 721, 1),
(205, 'SK', 'Slovakia', 421, 1),
(206, 'SI', 'Slovenia', 386, 1),
(207, 'SB', 'Solomon Islands', 677, 1),
(208, 'SO', 'Somalia', 252, 1),
(209, 'ZA', 'South Africa', 27, 1),
(210, 'GS', 'South Georgia and the South Sandwich Islands', 500, 1),
(211, 'SS', 'South Sudan', 211, 1),
(212, 'ES', 'Spain', 34, 1),
(213, 'LK', 'Sri Lanka', 94, 0),
(214, 'SD', 'Sudan', 249, 1),
(215, 'SR', 'Suriname', 597, 1),
(216, 'SJ', 'Svalbard and Jan Mayen', 47, 1),
(217, 'SZ', 'Swaziland', 268, 1),
(218, 'SE', 'Sweden', 46, 1),
(219, 'CH', 'Switzerland', 41, 1),
(220, 'SY', 'Syrian Arab Republic', 963, 1),
(221, 'TW', 'Taiwan, Province of China', 886, 1),
(222, 'TJ', 'Tajikistan', 992, 1),
(223, 'TZ', 'Tanzania, United Republic of', 255, 1),
(224, 'TH', 'Thailand', 66, 1),
(225, 'TL', 'Timor-Leste', 670, 1),
(226, 'TG', 'Togo', 228, 1),
(227, 'TK', 'Tokelau', 690, 1),
(228, 'TO', 'Tonga', 676, 1),
(229, 'TT', 'Trinidad and Tobago', 1868, 1),
(230, 'TN', 'Tunisia', 216, 1),
(231, 'TR', 'Turkey', 90, 1),
(232, 'TM', 'Turkmenistan', 7370, 1),
(233, 'TC', 'Turks and Caicos Islands', 1649, 1),
(234, 'TV', 'Tuvalu', 688, 1),
(235, 'UG', 'Uganda', 256, 1),
(236, 'UA', 'Ukraine', 380, 1),
(237, 'AE', 'United Arab Emirates', 971, 1),
(238, 'GB', 'United Kingdom', 44, 1),
(239, 'US', 'United States', 1, 1),
(240, 'UM', 'United States Minor Outlying Islands', 1, 1),
(241, 'UY', 'Uruguay', 598, 1),
(242, 'UZ', 'Uzbekistan', 998, 1),
(243, 'VU', 'Vanuatu', 678, 1),
(244, 'VE', 'Venezuela', 58, 1),
(245, 'VN', 'Viet Nam', 84, 1),
(246, 'VG', 'Virgin Islands, British', 1284, 1),
(247, 'VI', 'Virgin Islands, U.s.', 1340, 1),
(248, 'WF', 'Wallis and Futuna', 681, 1),
(249, 'EH', 'Western Sahara', 212, 1),
(250, 'YE', 'Yemen', 967, 1),
(251, 'ZM', 'Zambia', 260, 1),
(252, 'ZW', 'Zimbabwe', 263, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_id_info`
--

CREATE TABLE `order_id_info` (
  `s_no` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `register_id` varchar(20) NOT NULL DEFAULT 'Pending',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `s_no` int(11) NOT NULL,
  `register_id` varchar(20) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `bank_ref_no` varchar(50) DEFAULT NULL,
  `payment_mode` varchar(30) DEFAULT NULL,
  `currency` varchar(20) DEFAULT 'INR',
  `billing_name` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_status` varchar(11) NOT NULL DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register_info`
--

CREATE TABLE `register_info` (
  `s_no` int(11) NOT NULL,
  `register_id` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `country_pcode` varchar(10) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `num_papers` int(11) NOT NULL DEFAULT 0,
  `paper_id1` varchar(100) DEFAULT NULL,
  `paper_id2` varchar(100) DEFAULT NULL,
  `paper_id3` varchar(100) DEFAULT NULL,
  `paper_id4` varchar(100) DEFAULT NULL,
  `paper_id5` varchar(100) DEFAULT NULL,
  `paper_id6` varchar(100) DEFAULT NULL,
  `paper_id7` varchar(100) DEFAULT NULL,
  `paper_id8` varchar(100) DEFAULT NULL,
  `paper_id9` varchar(100) DEFAULT NULL,
  `paper_id10` varchar(100) DEFAULT NULL,
  `paper_id11` varchar(100) DEFAULT NULL,
  `paper_id12` varchar(100) DEFAULT NULL,
  `paper_id13` varchar(100) DEFAULT NULL,
  `paper_id14` varchar(100) DEFAULT NULL,
  `paper_id15` varchar(100) DEFAULT NULL,
  `category` varchar(300) NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `isca_id` varchar(50) DEFAULT NULL,
  `register_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `mail_status` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-----------------------------------------------------------

CREATE TABLE ieee_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- --------------------------------------------------------

--
-- Table structure for table `reg_category`
--

CREATE TABLE `reg_category` (
  `s_no` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `country_id` int(11) NOT NULL,
  `early_amount_INR` int(11) NOT NULL,
  `normal_amount_INR` int(11) NOT NULL,
  `early_amount_ISCA` int(11) NOT NULL,
  `normal_amount_ISCA` int(11) NOT NULL,
  `full_registeration_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_category`
--

INSERT INTO `reg_category` (`s_no`,`category_name`, `country_id`, `early_amount_INR`, `normal_amount_INR`, `early_amount_ISCA`, `normal_amount_ISCA`, `full_registeration_status`) VALUES
(1,'Co-author (Non Student) Registration', 0, 6000, 7000, 6000, 7000, 1),
(2,'Industry Registration (non-author)', 0, 6000, 7000, 7000, 8000, 0),
(3,'Academia Registration (non-author)', 0, 5000, 6000, 6000, 7000, 0),
(4,'Students', 0, 2000, 3000, 2000, 3000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_id_info`
--
ALTER TABLE `order_id_info`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `register_id` (`register_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `register_info`
--
ALTER TABLE `register_info`
  ADD PRIMARY KEY (`s_no`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `register_id` (`register_id`);

--
-- Indexes for table `reg_category`
--
ALTER TABLE `reg_category`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `order_id_info`
--
ALTER TABLE `order_id_info`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_info`
--
ALTER TABLE `register_info`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE register_info ADD COLUMN student_id_card_path VARCHAR(255);
ALTER TABLE register_info ADD COLUMN ieee_membership_card_path VARCHAR(255);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
