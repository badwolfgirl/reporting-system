-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2015 at 03:49 PM
-- Server version: 5.1.73-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mycolors_reports`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `Sales 2015`
--
CREATE TABLE IF NOT EXISTS `Sales 2015` (
`ID` int(11)
,`adID` int(11)
,`franID` int(11)
,`sales_month` date
,`units` int(11)
,`techs` int(11)
,`vehicles_repaired` int(11)
,`days_worked` int(11)
,`accounts_worked` int(11)
,`paint_sales` decimal(19,2)
,`PDR_sales` decimal(19,2)
,`interior_sales` decimal(19,2)
,`other_sales` decimal(19,2)
,`retail_dollars` decimal(19,2)
,`dealer_new_dollars` decimal(19,2)
,`dealer_used_dollars` decimal(19,2)
,`dealer_service_dollars` decimal(19,2)
,`fleet_dollars` decimal(19,2)
,`other_dollars` decimal(19,2)
,`total_month_sales_dollars` decimal(19,2)
,`service_type_total` decimal(19,2)
,`customer_type_total` decimal(19,2)
,`service_type_difference` decimal(19,2)
,`customer_type_difference` decimal(19,2)
,`adjusted_paint_sales` decimal(19,2)
,`addjusted_retail_sales` decimal(19,2)
,`billCollects` decimal(19,2)
,`adFundRoyalty` decimal(19,2)
,`royaltyDue` decimal(19,2)
,`notes` text
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Sales Feb 2015`
--
CREATE TABLE IF NOT EXISTS `Sales Feb 2015` (
`ID` int(11)
,`adID` int(11)
,`franID` int(11)
,`sales_month` date
,`units` int(11)
,`techs` int(11)
,`vehicles_repaired` int(11)
,`days_worked` int(11)
,`accounts_worked` int(11)
,`paint_sales` decimal(19,2)
,`PDR_sales` decimal(19,2)
,`interior_sales` decimal(19,2)
,`other_sales` decimal(19,2)
,`retail_dollars` decimal(19,2)
,`dealer_new_dollars` decimal(19,2)
,`dealer_used_dollars` decimal(19,2)
,`dealer_service_dollars` decimal(19,2)
,`fleet_dollars` decimal(19,2)
,`other_dollars` decimal(19,2)
,`total_month_sales_dollars` decimal(19,2)
,`service_type_total` decimal(19,2)
,`customer_type_total` decimal(19,2)
,`service_type_difference` decimal(19,2)
,`customer_type_difference` decimal(19,2)
,`adjusted_paint_sales` decimal(19,2)
,`addjusted_retail_sales` decimal(19,2)
,`billCollects` decimal(19,2)
,`adFundRoyalty` decimal(19,2)
,`royaltyDue` decimal(19,2)
,`notes` text
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Sales Jan 2015`
--
CREATE TABLE IF NOT EXISTS `Sales Jan 2015` (
`ID` int(11)
,`adID` int(11)
,`franID` int(11)
,`sales_month` date
,`units` int(11)
,`techs` int(11)
,`vehicles_repaired` int(11)
,`days_worked` int(11)
,`accounts_worked` int(11)
,`paint_sales` decimal(19,2)
,`PDR_sales` decimal(19,2)
,`interior_sales` decimal(19,2)
,`other_sales` decimal(19,2)
,`retail_dollars` decimal(19,2)
,`dealer_new_dollars` decimal(19,2)
,`dealer_used_dollars` decimal(19,2)
,`dealer_service_dollars` decimal(19,2)
,`fleet_dollars` decimal(19,2)
,`other_dollars` decimal(19,2)
,`total_month_sales_dollars` decimal(19,2)
,`service_type_total` decimal(19,2)
,`customer_type_total` decimal(19,2)
,`service_type_difference` decimal(19,2)
,`customer_type_difference` decimal(19,2)
,`adjusted_paint_sales` decimal(19,2)
,`addjusted_retail_sales` decimal(19,2)
,`billCollects` decimal(19,2)
,`adFundRoyalty` decimal(19,2)
,`royaltyDue` decimal(19,2)
,`notes` text
);
-- --------------------------------------------------------

--
-- Table structure for table `area_developer`
--

CREATE TABLE IF NOT EXISTS `area_developer` (
  `adID` int(11) NOT NULL AUTO_INCREMENT,
  `franID` int(11) NOT NULL,
  `region_color` enum('1','2','3','4') NOT NULL,
  `region_office_name` varchar(256) DEFAULT NULL,
  `corporate_business_name` varchar(256) DEFAULT NULL,
  `special_sales_report_name` varchar(256) DEFAULT NULL,
  `30_club` date DEFAULT NULL COMMENT 'YYYY-MM-DD',
  `50_club` date DEFAULT NULL COMMENT 'YYYY-MM-DD',
  `100_club` date DEFAULT NULL COMMENT 'YYYY-MM-DD',
  `200_club` date DEFAULT NULL COMMENT 'YYYY-MM-DD',
  `termination` date DEFAULT NULL COMMENT 'YYYY-MM-DD',
  `DMA_location` varchar(256) DEFAULT NULL,
  `amount_financed` decimal(19,4) DEFAULT NULL,
  `terms_in_months` int(11) DEFAULT NULL,
  `lrf_contract_goal` int(11) DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `royalty7` enum('yes','no') NOT NULL DEFAULT 'yes',
  `adFund1` enum('yes','no') NOT NULL DEFAULT 'no',
  `billColl2` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`adID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

-- --------------------------------------------------------

--
-- Table structure for table `brandVotes`
--

CREATE TABLE IF NOT EXISTS `brandVotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipAddress` varchar(24) NOT NULL,
  `surveyOpt` enum('opt1','opt2','opt3') NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_leads`
--

CREATE TABLE IF NOT EXISTS `contact_leads` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `type` enum('0','1') NOT NULL COMMENT '''0=sales'',''1=prospect''',
  `name` varchar(256) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` text,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `month` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=724 ;

-- --------------------------------------------------------

--
-- Table structure for table `damage_pics`
--

CREATE TABLE IF NOT EXISTS `damage_pics` (
  `picID` int(11) NOT NULL AUTO_INCREMENT,
  `picCatID` int(11) NOT NULL,
  `picPath` text NOT NULL,
  `picTitle` varchar(255) NOT NULL,
  PRIMARY KEY (`picID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Table structure for table `damage_pics_categories`
--

CREATE TABLE IF NOT EXISTS `damage_pics_categories` (
  `picCatID` int(11) NOT NULL AUTO_INCREMENT,
  `picCatName` varchar(255) NOT NULL,
  PRIMARY KEY (`picCatID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_surveys`
--

CREATE TABLE IF NOT EXISTS `dealer_surveys` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `dateSubmit` date NOT NULL,
  `repair_quality` enum('Poor','Satisfactory','Good','Great','Outstanding') NOT NULL,
  `cycle_time` enum('Poor','Satisfactory','Good','Great','Outstanding') NOT NULL,
  `customer_service` enum('Poor','Satisfactory','Good','Great','Outstanding') NOT NULL,
  `professionalism` enum('Poor','Satisfactory','Good','Great','Outstanding') NOT NULL,
  `communication` enum('Poor','Satisfactory','Good','Great','Outstanding') NOT NULL,
  `recommend` int(2) NOT NULL,
  `dealerName` varchar(128) DEFAULT NULL,
  `dealerContact` varchar(128) DEFAULT NULL,
  `dealerAddress` varchar(256) NOT NULL,
  `dealerCity` varchar(128) NOT NULL,
  `dealerState` varchar(2) NOT NULL,
  `dealerZip` varchar(5) DEFAULT NULL,
  `dealerPhone` varchar(13) DEFAULT NULL,
  `dealerEmail` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `dev_users`
--

CREATE TABLE IF NOT EXISTS `dev_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `franID` int(11) NOT NULL,
  `adID` int(11) NOT NULL,
  `reportADs` varchar(256) NOT NULL,
  `access_type` enum('TCFC Admin','TCFC','Area Dev','Area Man','Operator Fran') NOT NULL DEFAULT 'Operator Fran',
  `active` enum('yes','no') NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `firstName` varchar(128) NOT NULL,
  `lastName` varchar(128) NOT NULL,
  `suffix` varchar(36) DEFAULT NULL,
  `nickname` varchar(64) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `social_security` varchar(12) DEFAULT NULL,
  `ein` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` decimal(19,2) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=726 ;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_update`
--

CREATE TABLE IF NOT EXISTS `monthly_update` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `month` date NOT NULL,
  `week1_attempt` enum('yes','no') NOT NULL,
  `week2_attempt` enum('yes','no') NOT NULL,
  `week3_attempt` enum('yes','no') NOT NULL,
  `week4_attempt` enum('yes','no') NOT NULL,
  `meeting_held` enum('yes','no') NOT NULL,
  `meeting_attended` enum('yes','no') NOT NULL,
  `inperson_meeting` enum('yes','no') NOT NULL,
  `comments` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2139 ;

-- --------------------------------------------------------

--
-- Table structure for table `picVotes`
--

CREATE TABLE IF NOT EXISTS `picVotes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `picID` int(11) NOT NULL,
  `use_it` enum('yes','no') NOT NULL,
  `picCatID` int(11) NOT NULL,
  `price` decimal(5,0) NOT NULL,
  `comments` text,
  `dateVoted` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `sales_month` date NOT NULL COMMENT 'YYYY-MM-DD',
  `units` int(11) DEFAULT NULL,
  `techs` int(11) DEFAULT NULL,
  `vehicles_repaired` int(11) DEFAULT NULL,
  `days_worked` int(11) DEFAULT NULL,
  `accounts_worked` int(11) DEFAULT NULL,
  `paint_sales` decimal(19,2) DEFAULT NULL,
  `PDR_sales` decimal(19,2) DEFAULT NULL,
  `interior_sales` decimal(19,2) DEFAULT NULL,
  `other_sales` decimal(19,2) DEFAULT NULL,
  `retail_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_new_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_used_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_service_dollars` decimal(19,2) DEFAULT NULL,
  `fleet_dollars` decimal(19,2) DEFAULT NULL,
  `other_dollars` decimal(19,2) DEFAULT NULL,
  `total_month_sales_dollars` decimal(19,2) DEFAULT NULL,
  `service_type_total` decimal(19,2) DEFAULT NULL,
  `customer_type_total` decimal(19,2) DEFAULT NULL,
  `service_type_difference` decimal(19,2) DEFAULT NULL,
  `customer_type_difference` decimal(19,2) DEFAULT NULL,
  `adjusted_paint_sales` decimal(19,2) DEFAULT NULL,
  `addjusted_retail_sales` decimal(19,2) DEFAULT NULL,
  `billCollects` decimal(19,2) DEFAULT NULL,
  `adFundRoyalty` decimal(19,2) DEFAULT NULL,
  `royaltyDue` decimal(19,2) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16028 ;

-- --------------------------------------------------------

--
-- Table structure for table `saved_sales`
--

CREATE TABLE IF NOT EXISTS `saved_sales` (
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `sales_month` date NOT NULL COMMENT 'YYYY-MM-DD',
  `units` int(11) DEFAULT NULL,
  `techs` int(11) DEFAULT NULL,
  `vehicles_repaired` int(11) DEFAULT NULL,
  `days_worked` int(11) DEFAULT NULL,
  `accounts_worked` int(11) DEFAULT NULL,
  `paint_sales` decimal(19,2) DEFAULT NULL,
  `PDR_sales` decimal(19,2) DEFAULT NULL,
  `interior_sales` decimal(19,2) DEFAULT NULL,
  `other_sales` decimal(19,2) DEFAULT NULL,
  `retail_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_new_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_used_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_service_dollars` decimal(19,2) DEFAULT NULL,
  `fleet_dollars` decimal(19,2) DEFAULT NULL,
  `other_dollars` decimal(19,2) DEFAULT NULL,
  `total_month_sales_dollars` decimal(19,2) DEFAULT NULL,
  `service_type_total` decimal(19,2) DEFAULT NULL,
  `customer_type_total` decimal(19,2) DEFAULT NULL,
  `service_type_difference` decimal(19,2) DEFAULT NULL,
  `customer_type_difference` decimal(19,2) DEFAULT NULL,
  `adjusted_paint_sales` decimal(19,2) DEFAULT NULL,
  `addjusted_retail_sales` decimal(19,2) DEFAULT NULL,
  PRIMARY KEY (`franID`),
  UNIQUE KEY `franID` (`franID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saved_sales_ttls`
--

CREATE TABLE IF NOT EXISTS `saved_sales_ttls` (
  `adID` int(11) NOT NULL,
  `sales_month` date NOT NULL COMMENT 'YYYY-MM-DD',
  `units` int(11) DEFAULT NULL,
  `techs` int(11) DEFAULT NULL,
  `vehicles_repaired` int(11) DEFAULT NULL,
  `days_worked` int(11) DEFAULT NULL,
  `accounts_worked` int(11) DEFAULT NULL,
  `paint_sales` decimal(19,2) DEFAULT NULL,
  `PDR_sales` decimal(19,2) DEFAULT NULL,
  `interior_sales` decimal(19,2) DEFAULT NULL,
  `other_sales` decimal(19,2) DEFAULT NULL,
  `retail_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_new_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_used_dollars` decimal(19,2) DEFAULT NULL,
  `dealer_service_dollars` decimal(19,2) DEFAULT NULL,
  `fleet_dollars` decimal(19,2) DEFAULT NULL,
  `other_dollars` decimal(19,2) DEFAULT NULL,
  `total_month_sales_dollars` decimal(19,2) DEFAULT NULL,
  `service_type_total` decimal(19,2) DEFAULT NULL,
  `customer_type_total` decimal(19,2) DEFAULT NULL,
  `billCollects` decimal(19,2) DEFAULT NULL,
  `adFundRoyalty` decimal(19,2) DEFAULT NULL,
  `royaltyDue` decimal(19,2) NOT NULL,
  `total_dues` decimal(19,2) DEFAULT NULL,
  `emailTags` text,
  `comments` text,
  PRIMARY KEY (`adID`),
  UNIQUE KEY `adID` (`adID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `techs`
--

CREATE TABLE IF NOT EXISTS `techs` (
  `franID` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `reportADs` varchar(128) NOT NULL,
  `contract_type` enum('1','2','3','4') NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `lastName` varchar(256) NOT NULL,
  `suffix` varchar(256) DEFAULT NULL,
  `nickname` varchar(256) DEFAULT NULL,
  `custom_sales_report_name` varchar(256) DEFAULT NULL,
  `company` varchar(256) DEFAULT NULL,
  `birth_date` date DEFAULT NULL COMMENT 'YYYY-MM-DD',
  `social_security` varchar(256) DEFAULT NULL,
  `ein` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL COMMENT 'YYYY-MM-DD',
  `payment_amount` decimal(9,4) DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`franID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100013 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstName` varchar(256) NOT NULL,
  `lastName` varchar(256) NOT NULL,
  `type` enum('0','1','2') NOT NULL COMMENT '0=Corporate, 1=Area Developer, 2=Other',
  `adID` varchar(11) NOT NULL,
  `alt_adID` varchar(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `emails` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

-- --------------------------------------------------------

--
-- Table structure for table `year_end_checks`
--

CREATE TABLE IF NOT EXISTS `year_end_checks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `year` varchar(4) NOT NULL COMMENT 'YYYY',
  `submitted` date NOT NULL COMMENT 'YYYY-MM-DD',
  `meet_attended` enum('yes','no') NOT NULL,
  `unit_check` enum('yes','no') NOT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

-- --------------------------------------------------------

--
-- Table structure for table `year_end_expenses`
--

CREATE TABLE IF NOT EXISTS `year_end_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `year` varchar(4) NOT NULL COMMENT 'YYYY',
  `submitted` date NOT NULL COMMENT 'YYYY-MM-DD',
  `royalty` decimal(19,2) NOT NULL,
  `insurance` decimal(19,2) NOT NULL,
  `billcoll` decimal(19,2) NOT NULL,
  `fuel` decimal(19,2) NOT NULL,
  `maintenance` decimal(19,2) NOT NULL,
  `cellphone` decimal(19,2) NOT NULL,
  `officephone` decimal(19,2) NOT NULL,
  `officesupp` decimal(19,2) NOT NULL,
  `bussmeetings` decimal(19,2) DEFAULT NULL,
  `zeerecognition` decimal(19,2) DEFAULT NULL,
  `adFund` decimal(19,2) DEFAULT NULL,
  `localAd` decimal(19,2) DEFAULT NULL,
  `licensefees` decimal(19,2) DEFAULT NULL,
  `busstax` decimal(19,2) DEFAULT NULL,
  `paintsupp` decimal(19,2) DEFAULT NULL,
  `labor` decimal(19,2) DEFAULT NULL,
  `vanexpense` decimal(19,2) DEFAULT NULL,
  `uniform` decimal(19,2) DEFAULT NULL,
  `payrolltax` decimal(19,2) DEFAULT NULL,
  `other` decimal(19,2) DEFAULT NULL,
  `total` decimal(19,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `year_end_recognition`
--

CREATE TABLE IF NOT EXISTS `year_end_recognition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `year` varchar(4) NOT NULL COMMENT 'YYYY',
  `submitted` date NOT NULL COMMENT 'YYYY-MM-DD',
  `recognition_meet` enum('yes','no') NOT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `yec_saves`
--

CREATE TABLE IF NOT EXISTS `yec_saves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `year` varchar(4) NOT NULL COMMENT 'YYYY',
  `submitted` date NOT NULL COMMENT 'YYYY-MM-DD',
  `meet_attended` enum('yes','no') DEFAULT NULL,
  `unit_check` enum('yes','no') DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

-- --------------------------------------------------------

--
-- Table structure for table `yee_saves`
--

CREATE TABLE IF NOT EXISTS `yee_saves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `year` varchar(4) NOT NULL COMMENT 'YYYY',
  `submitted` date NOT NULL COMMENT 'YYYY-MM-DD',
  `royalty` decimal(19,2) DEFAULT NULL,
  `insurance` decimal(19,2) DEFAULT NULL,
  `billcoll` decimal(19,2) DEFAULT NULL,
  `fuel` decimal(19,2) DEFAULT NULL,
  `maintenance` decimal(19,2) DEFAULT NULL,
  `cellphone` decimal(19,2) DEFAULT NULL,
  `officephone` decimal(19,2) DEFAULT NULL,
  `officesupp` decimal(19,2) DEFAULT NULL,
  `bussmeetings` decimal(19,2) DEFAULT NULL,
  `zeerecognition` decimal(19,2) DEFAULT NULL,
  `adFund` decimal(19,2) DEFAULT NULL,
  `localAd` decimal(19,2) DEFAULT NULL,
  `licensefees` decimal(19,2) DEFAULT NULL,
  `busstax` decimal(19,2) DEFAULT NULL,
  `paintsupp` decimal(19,2) DEFAULT NULL,
  `labor` decimal(19,2) DEFAULT NULL,
  `vanexpense` decimal(19,2) DEFAULT NULL,
  `uniform` decimal(19,2) DEFAULT NULL,
  `payrolltax` decimal(19,2) DEFAULT NULL,
  `other` decimal(19,2) DEFAULT NULL,
  `total` decimal(19,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `yer_saves`
--

CREATE TABLE IF NOT EXISTS `yer_saves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) NOT NULL,
  `franID` int(11) NOT NULL,
  `year` varchar(4) NOT NULL COMMENT 'YYYY',
  `submitted` date NOT NULL COMMENT 'YYYY-MM-DD',
  `recognition_meet` enum('yes','no') DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Structure for view `Sales 2015`
--
DROP TABLE IF EXISTS `Sales 2015`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mycolors`@`localhost` SQL SECURITY DEFINER VIEW `Sales 2015` AS select `sales`.`ID` AS `ID`,`sales`.`adID` AS `adID`,`sales`.`franID` AS `franID`,`sales`.`sales_month` AS `sales_month`,`sales`.`units` AS `units`,`sales`.`techs` AS `techs`,`sales`.`vehicles_repaired` AS `vehicles_repaired`,`sales`.`days_worked` AS `days_worked`,`sales`.`accounts_worked` AS `accounts_worked`,`sales`.`paint_sales` AS `paint_sales`,`sales`.`PDR_sales` AS `PDR_sales`,`sales`.`interior_sales` AS `interior_sales`,`sales`.`other_sales` AS `other_sales`,`sales`.`retail_dollars` AS `retail_dollars`,`sales`.`dealer_new_dollars` AS `dealer_new_dollars`,`sales`.`dealer_used_dollars` AS `dealer_used_dollars`,`sales`.`dealer_service_dollars` AS `dealer_service_dollars`,`sales`.`fleet_dollars` AS `fleet_dollars`,`sales`.`other_dollars` AS `other_dollars`,`sales`.`total_month_sales_dollars` AS `total_month_sales_dollars`,`sales`.`service_type_total` AS `service_type_total`,`sales`.`customer_type_total` AS `customer_type_total`,`sales`.`service_type_difference` AS `service_type_difference`,`sales`.`customer_type_difference` AS `customer_type_difference`,`sales`.`adjusted_paint_sales` AS `adjusted_paint_sales`,`sales`.`addjusted_retail_sales` AS `addjusted_retail_sales`,`sales`.`billCollects` AS `billCollects`,`sales`.`adFundRoyalty` AS `adFundRoyalty`,`sales`.`royaltyDue` AS `royaltyDue`,`sales`.`notes` AS `notes` from `sales` where (`sales`.`sales_month` like '%2015%');

-- --------------------------------------------------------

--
-- Structure for view `Sales Feb 2015`
--
DROP TABLE IF EXISTS `Sales Feb 2015`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mycolors`@`localhost` SQL SECURITY DEFINER VIEW `Sales Feb 2015` AS select `sales`.`ID` AS `ID`,`sales`.`adID` AS `adID`,`sales`.`franID` AS `franID`,`sales`.`sales_month` AS `sales_month`,`sales`.`units` AS `units`,`sales`.`techs` AS `techs`,`sales`.`vehicles_repaired` AS `vehicles_repaired`,`sales`.`days_worked` AS `days_worked`,`sales`.`accounts_worked` AS `accounts_worked`,`sales`.`paint_sales` AS `paint_sales`,`sales`.`PDR_sales` AS `PDR_sales`,`sales`.`interior_sales` AS `interior_sales`,`sales`.`other_sales` AS `other_sales`,`sales`.`retail_dollars` AS `retail_dollars`,`sales`.`dealer_new_dollars` AS `dealer_new_dollars`,`sales`.`dealer_used_dollars` AS `dealer_used_dollars`,`sales`.`dealer_service_dollars` AS `dealer_service_dollars`,`sales`.`fleet_dollars` AS `fleet_dollars`,`sales`.`other_dollars` AS `other_dollars`,`sales`.`total_month_sales_dollars` AS `total_month_sales_dollars`,`sales`.`service_type_total` AS `service_type_total`,`sales`.`customer_type_total` AS `customer_type_total`,`sales`.`service_type_difference` AS `service_type_difference`,`sales`.`customer_type_difference` AS `customer_type_difference`,`sales`.`adjusted_paint_sales` AS `adjusted_paint_sales`,`sales`.`addjusted_retail_sales` AS `addjusted_retail_sales`,`sales`.`billCollects` AS `billCollects`,`sales`.`adFundRoyalty` AS `adFundRoyalty`,`sales`.`royaltyDue` AS `royaltyDue`,`sales`.`notes` AS `notes` from `sales` where (`sales`.`sales_month` = '2015-02-01');

-- --------------------------------------------------------

--
-- Structure for view `Sales Jan 2015`
--
DROP TABLE IF EXISTS `Sales Jan 2015`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mycolors`@`localhost` SQL SECURITY DEFINER VIEW `Sales Jan 2015` AS select `sales`.`ID` AS `ID`,`sales`.`adID` AS `adID`,`sales`.`franID` AS `franID`,`sales`.`sales_month` AS `sales_month`,`sales`.`units` AS `units`,`sales`.`techs` AS `techs`,`sales`.`vehicles_repaired` AS `vehicles_repaired`,`sales`.`days_worked` AS `days_worked`,`sales`.`accounts_worked` AS `accounts_worked`,`sales`.`paint_sales` AS `paint_sales`,`sales`.`PDR_sales` AS `PDR_sales`,`sales`.`interior_sales` AS `interior_sales`,`sales`.`other_sales` AS `other_sales`,`sales`.`retail_dollars` AS `retail_dollars`,`sales`.`dealer_new_dollars` AS `dealer_new_dollars`,`sales`.`dealer_used_dollars` AS `dealer_used_dollars`,`sales`.`dealer_service_dollars` AS `dealer_service_dollars`,`sales`.`fleet_dollars` AS `fleet_dollars`,`sales`.`other_dollars` AS `other_dollars`,`sales`.`total_month_sales_dollars` AS `total_month_sales_dollars`,`sales`.`service_type_total` AS `service_type_total`,`sales`.`customer_type_total` AS `customer_type_total`,`sales`.`service_type_difference` AS `service_type_difference`,`sales`.`customer_type_difference` AS `customer_type_difference`,`sales`.`adjusted_paint_sales` AS `adjusted_paint_sales`,`sales`.`addjusted_retail_sales` AS `addjusted_retail_sales`,`sales`.`billCollects` AS `billCollects`,`sales`.`adFundRoyalty` AS `adFundRoyalty`,`sales`.`royaltyDue` AS `royaltyDue`,`sales`.`notes` AS `notes` from `sales` where (`sales`.`sales_month` = '2015-01-01') order by `sales`.`ID`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
