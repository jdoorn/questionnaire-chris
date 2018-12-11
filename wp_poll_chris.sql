-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2018 at 03:27 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_poll_chris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll_a`
--

CREATE TABLE `tbl_poll_a` (
  `aQuestion_Id` int(6) NOT NULL,
  `aResponse` varchar(250) NOT NULL,
  `aComment` varchar(250) DEFAULT NULL,
  `aResponse_Id` int(6) NOT NULL,
  `answer_Id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poll_a`
--

INSERT INTO `tbl_poll_a` (`aQuestion_Id`, `aResponse`, `aComment`, `aResponse_Id`, `answer_Id`) VALUES
(18, 'No', '', 11, 228),
(19, 'The Balance is about right', '', 11, 229),
(20, 'No Opinion', '', 11, 230),
(21, 'Yes', '', 11, 231),
(22, 'No ', '', 11, 232),
(18, 'Maybe', '', 12, 233),
(19, 'Other, Please Specify', '', 12, 234),
(20, 'Yes', '', 12, 235),
(21, 'No ', '', 12, 236),
(22, 'Yes', '', 12, 237),
(18, 'Maybe', '', 13, 238),
(19, 'The Balance is about right', '', 13, 240),
(20, 'Yes', '', 13, 241),
(21, 'Yes', '', 13, 242),
(22, 'No ', '', 13, 243),
(18, 'Maybe', '', 14, 244),
(19, 'Other, Please Specify', '', 14, 246),
(20, 'No ', '', 14, 247),
(21, 'Yes', '', 14, 248),
(22, 'No Opinion', '', 14, 249),
(18, '', '', 15, 250),
(19, '', 'This is a test of the comment length', 15, 251),
(20, 'Yes', '', 15, 252),
(21, 'Yes', '', 15, 253),
(22, 'Yes', '', 15, 254),
(24, 'No ', '', 15, 255),
(25, 'No ', '', 15, 256),
(26, 'No ', '', 15, 257),
(27, 'No Opinion', '', 15, 258),
(28, 'Yes', '', 15, 259),
(29, 'Yes', '', 15, 260),
(30, 'Other, Please Specify', '', 15, 261),
(31, 'No ', '', 15, 262),
(33, 'No ', '', 15, 263),
(34, 'Yes', '', 15, 264),
(35, 'Yes', '', 15, 265),
(36, 'Other, Please Specify', 'Yes, if a GPA of 3.0 or greater is obtained', 15, 266),
(37, 'No ', '', 15, 267),
(38, 'No ', '', 15, 268),
(39, 'No ', '', 15, 269),
(40, 'Yes', '', 15, 270),
(41, 'Yes', '', 15, 271),
(42, 'No ', '', 15, 272),
(43, 'No ', '', 15, 273),
(44, 'Yes', '', 15, 274),
(45, 'Yes', '', 15, 275),
(46, 'No ', '', 15, 276),
(47, 'Yes', '', 15, 277),
(48, 'Yes', '', 15, 278);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll_q`
--

CREATE TABLE `tbl_poll_q` (
  `qQuestionNumber` int(3) NOT NULL,
  `qQuestion` varchar(250) NOT NULL,
  `qResponse1` varchar(50) NOT NULL,
  `qResponse2` varchar(50) NOT NULL,
  `qResponse3` varchar(50) NOT NULL,
  `qResponse4` varchar(50) NOT NULL,
  `qIncludeComment` tinyint(1) DEFAULT NULL,
  `qQuestion_Id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poll_q`
--

INSERT INTO `tbl_poll_q` (`qQuestionNumber`, `qQuestion`, `qResponse1`, `qResponse2`, `qResponse3`, `qResponse4`, `qIncludeComment`, `qQuestion_Id`) VALUES
(11, 'Should undocumented immigrants enjoy the same civil rights protections as U.S. citizens?', 'Yes', 'Maybe', 'No', 'Other, Please Specify', NULL, 18),
(15, 'Does the Federal Government have too much power to overrule State laws?', 'Yes', 'The Balance is about right', 'No', 'Other, Please Specify', NULL, 19),
(20, 'Is the Supreme Court independent enough of partisan politics?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 20),
(25, 'Should police be allowed to “stop and frisk” with no probable cause to believe a crime has been committed?', 'Yes', 'No ', 'Sometimes', 'Other, Please Specify', NULL, 21),
(30, 'Does the military have too much influence over foreign policy?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 22),
(32, 'Should marijuana be legalized?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 24),
(34, 'Should prostitution be legalized?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 25),
(36, 'Should the death penalty be abolished?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 26),
(38, 'Was the “Citizen’s United” Supreme Court Decision right?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 27),
(40, 'Was the “Roe v. Wade” supreme court decision a good one?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 28),
(42, 'Should the government subsidize fuel ethanol made from food crops?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 29),
(44, 'Is Julian Assange (Wikileaks) a hero or a traitor?', 'Hero', 'Traitor', 'Neutral', 'Other, Please Specify', NULL, 30),
(46, 'Should there be a higher minimum wage?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 31),
(48, 'Should the Electoral College system be changed to a Popular Vote?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 33),
(50, 'Should there be a tax on assets?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 34),
(52, 'Should there be a tax on income?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 35),
(54, 'Should the government subsidize education past the 12th grade?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 36),
(56, 'Should the government bail out insurance companies which make bad bets and then can’t pay claims?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 37),
(58, 'Is America obligated to accept refugees from conflicts in which we ARE engaged?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 38),
(60, 'Is America obligated to accept refugees from conflicts in which we are NOT engaged?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 39),
(62, 'Is racial profiling ever acceptable?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 40),
(64, 'Is torture ever permissible?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 41),
(66, 'Is it every American’s duty and obligation to vote?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 42),
(68, 'Do you think felons should have their civil rights restored when they’ve completed their sentences?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 43),
(70, 'Do you believe every law abiding American has the right to own a gun?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 44),
(72, 'Do you think political corruption is a big problem in America?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 45),
(74, 'Do you think government has too much power to keep secrets from the American People?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 46),
(76, 'Do you think women should get equal pay for the same job description?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 47),
(78, 'Do you believe America needs a viable third party?', 'Yes', 'No ', 'No Opinion', 'Other, Please Specify', NULL, 48);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_poll_a`
--
ALTER TABLE `tbl_poll_a`
  ADD PRIMARY KEY (`answer_Id`),
  ADD UNIQUE KEY `answer_Id` (`answer_Id`);

--
-- Indexes for table `tbl_poll_q`
--
ALTER TABLE `tbl_poll_q`
  ADD PRIMARY KEY (`qQuestion_Id`),
  ADD UNIQUE KEY `QuestionNumber` (`qQuestionNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_poll_a`
--
ALTER TABLE `tbl_poll_a`
  MODIFY `answer_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `tbl_poll_q`
--
ALTER TABLE `tbl_poll_q`
  MODIFY `qQuestion_Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
