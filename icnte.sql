-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 07:44 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icnte`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email_address` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(1000) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `verified_hash` varchar(200) DEFAULT NULL,
  `verified_password_hash` varchar(11) DEFAULT NULL,
  `profile_picture` varchar(1000) NOT NULL,
  `about` text NOT NULL,
  `file` varchar(1000) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `username`, `email_address`, `password`, `gender`, `address`, `contact_no`, `verified`, `verified_hash`, `verified_password_hash`, `profile_picture`, `about`, `file`, `is_active`, `created_by`, `created_timestamp`) VALUES
(1, 'gautam lal', 'gautam', 'vnithinj@gmail.com', '2c314292e1180333cad7ddf73ffeffb1338b2ad5', 'Male', 'Nerul, Navi Mumbai', 2147483647, 0, NULL, NULL, '', '', NULL, 0, 0, '2014-09-27 14:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `advisory_committees`
--

CREATE TABLE `advisory_committees` (
  `id` int(11) NOT NULL,
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `institute` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisory_committees`
--

INSERT INTO `advisory_committees` (`id`, `sr_no`, `name`, `designation`, `institute`) VALUES
(1, 1, 'Dr. Prasanna M. Mujumdar', 'Deputy Director ( Finance & External Affairs) and Professor, Dept of Aerospace Engg', 'IIT Bombay (India)'),
(2, 3, 'Dr. Vivek Agarwal', 'Professor, Dept of Electrical Engg', 'IIT Bombay (India)'),
(3, 2, 'Dr. Mira Mitra', 'Assoc Professor, Dept of Aerospace Engg', 'IIT Bombay (India)'),
(4, 4, 'Dr. Peter Tse', 'Assoc Professor, Dept of Systems Engg and Engg Management', 'City University of Hong Kong (China)'),
(5, 5, 'Dr. Sheldon Williamson', 'Assoc Professor, Dept of Electrical, Computer, and Software Engg', 'University of Ontario (Canada)'),
(6, 6, 'Dr. Girish Kale', 'Assoc Professor and Reader, School of Chemical and Process Engg', 'University of Leeds (UK)');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `auid` int(11) NOT NULL,
  `auemail` varchar(255) NOT NULL,
  `auname` varchar(100) NOT NULL,
  `aucategory` varchar(100) NOT NULL,
  `auphone` bigint(100) NOT NULL,
  `aucountry` varchar(100) NOT NULL,
  `austate` varchar(100) NOT NULL,
  `auaddress` varchar(200) NOT NULL,
  `aupassword` varchar(100) NOT NULL,
  `auorg` varchar(256) NOT NULL,
  `phd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`auid`, `auemail`, `auname`, `aucategory`, `auphone`, `aucountry`, `austate`, `auaddress`, `aupassword`, `auorg`, `phd`) VALUES
(12, 'sini.george.9529@gmail.com', 'sinimol babu', 'Student', 9029337091, 'Bangladesh', 'Dhaka', '306, B-wing, Daffodil,Dosti Acres, Antophill', '25f9e794323b453885f5181f1b624d0b', 'FCRIT', ''),
(13, 'icnte.project@gmail.com', 'Alphonse Gordon', 'aa', 9029337091, 'Bangladesh', 'Dhaka', 'vashi', 'c5090882eb7aca48a16b8ba7d447d42b', 'agnelvashi', ''),
(15, 'alvinapaul19@gmail.com', 'ALVINA MALPAN', 'Student', 9029337091, 'Azerbaijan', 'Fuzuli Rayonu', 'c/4, 203 vedant complex,vartak nagar, thane(w)', '25f9e794323b453885f5181f1b624d0b', '', ''),
(16, 'celinbabugeorge@gmail.com', 'CELIN', 'Teacher', 9029337091, 'Azerbaijan', 'Calilabad Rayonu', '306, B-wing, Daffodil,Dosti Acres, Antophill', '63792dc1bee2f3f63716e4489e5acb0f', '', ''),
(17, 'vnithinj@gmail.com', 'Nithin Varghese', 'Student', 9029337092, 'Afghanistan', 'Badakhshan', 'Borivali West', '25f9e794323b453885f5181f1b624d0b', '', ''),
(19, 'vnithinj@gmail.com', 'Nithin Jacob', 'Student', 7208460825, 'India', 'Maharashtra', 'B 302, Acmr Amrut, Vaishali Nagar, Dahisar East', 'a3a6c6a0789969d59a7b2e457d10cfe3', '', ''),
(20, 'vnithinj@gmail.com', 'Nithin Jacob', 'Student', 7208460825, 'India', 'Maharashtra', 'B 302, Acmr Amrut, Vaishali Nagar, Dahisar East', 'a3a6c6a0789969d59a7b2e457d10cfe3', '', ''),
(21, 'vnithinj@gmail.com', 'Nithin Jacob', 'Student', 7208460825, 'India', 'Maharashtra', 'B 302, Acmr Amrut, Vaishali Nagar, Dahisar East', 'a3a6c6a0789969d59a7b2e457d10cfe3', '', ''),
(22, 'h@a', 'h', 'Student', 9029337091, 'Albania', 'Kukes', 'h', '25f9e794323b453885f5181f1b624d0b', '', ''),
(23, 'sibin.georgge@gmail.com', 'aq', 'Research Scholar', 9029337091, 'Bangladesh', 'Dhaka', 's', '25f9e794323b453885f5181f1b624d0b', '', ''),
(24, 'babu@gmail.com', 'Babu George', 'Student', 9029337091, 'Armenia', 'Tavush', 'ssa', '25f9e794323b453885f5181f1b624d0b', '', ''),
(25, 'a@gmail.com', 'aa', 'Student', 1234567891, 'Azerbaijan', 'Daskasan Rayonu', 'aa', '25f9e794323b453885f5181f1b624d0b', '', ''),
(26, 'ushapaul26@gmail.com', 'Usha', 'Teacher', 9930080950, 'Haiti', 'Nord-Est', 'Vashi', '51bde7e8e8fd955116c2ff61e537f55c', 'Fr Agnel', 'Yes'),
(27, 'a@s', 'a', 'Faculty', 919012345678, 'Albania', 'Bulqize', 'a', 'e807f1fcf82d132f9bb018ca6738a19f', 'a', 'No'),
(28, 'f@d', 'fff', 'Faculty', 959012345678, 'Azerbaijan', 'Davaci Rayonu', 'sf', 'e807f1fcf82d132f9bb018ca6738a19f', 'xf', 'No'),
(29, 'sini.george.9529@gmail.comssssssss', 's', 'Post Graduate Student', 239012345678, 'Bangladesh', 'Noakhali', 's', 'e807f1fcf82d132f9bb018ca6738a19f', 'SECTOR 9A, VASHI', 'No'),
(30, 'sini.geo@m', 'sib', 'Post Graduate Student', 919029337091, 'Bahamas', 'Nicholls Town and Berry Islands', 's', 'e807f1fcf82d132f9bb018ca6738a19f', '306,B-Wing,Daffodil,Dosti Acres, Antophill,Wadala(East)', 'No'),
(31, 'test@gmail.com', 'sini', 'Government Official', 919029337091, 'Australia', 'New South Wales', 'test', '25f9e794323b453885f5181f1b624d0b', 'test', 'No'),
(32, 's@h', 's', 'Research Scolar', 0, 'Albania', 'Kucove', 's', 'c20ad4d76fe97759aa27a0c99bff6710', 's', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `coauthors`
--

CREATE TABLE `coauthors` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `affiliation` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coauthors`
--

INSERT INTO `coauthors` (`cid`, `pid`, `name`, `email`, `affiliation`) VALUES
(1, 1, 'Sinimol', 'sini.george.9529@gmail.com', 'Student'),
(2, 1, 'sss', 'sini.george.9529@gmail.com', 'Teacher'),
(3, 1, 'abc', 'sini.george.9529@gmail.com', 'z'),
(4, 1, 'xys', 'sini.george.9529@gmail.com', 'z'),
(6, 36, 'aa1', 'aa1', 'aaxx1'),
(7, 92, 'a', 'a', 'asss11'),
(8, 4, 'Sinimol Babu', 'e3ss@gmail.com', 'Student'),
(10, 109, ' sinimol babu', 'sini.george.9529@gmail.com', 'asdsdfsd'),
(11, 109, 'sibin', 'sib2g@d', 'dadas'),
(12, 109, '', '', ''),
(13, 109, '', '', ''),
(15, 111, ' sinimol babu', 'sini.george.9529@gmail.com', 'asdf'),
(16, 111, 'b', 'e.9529@gmail.com', 'zxcvb'),
(17, 112, ' sinimol babu', 'sini.george.9529@gmail.com', ''),
(18, 112, ' sinimol babu', 'sinimol@gmail.com', 'student'),
(19, 113, ' sinimol babu', 'sini.george.9529@gmail.com', 'q'),
(20, 114, ' sinimol babu', 'sini.george.9529@gmail.com', 'd'),
(21, 115, ' sinimol babu', 'sini.george.9529@gmail.com', 'bb'),
(22, 116, ' sinimol babu', 'sini.george.9529@gmail.com', 'xx'),
(23, 117, ' sinimol babu', 'sini.george.9529@gmail.com', 'aa'),
(24, 118, ' sinimol babu', 'sini.george.9529@gmail.com', 'aa'),
(25, 119, ' Alphonse Gogo', 'icnte.project@gmail.com', 'Director General'),
(26, 120, ' Alphonse G', 'icnte.project@gmail.com', 'aa'),
(27, 1, 'sini', 'sini@g.com', 'sini'),
(28, 121, ' sinimol babu', 'sini.george.9529@gmail.com', 'ss'),
(29, 122, ' sinimol babu', 'sini.george.9529@gmail.com', 'Student'),
(30, 122, 'alvina', 'al@g.com', 'greedy'),
(31, 123, ' sinimol babu', 'sini.george.9529@gmail.com', 'aaaa'),
(32, 124, ' sinimol babu', 'sini.george.9529@gmail.com', 'asdf'),
(33, 125, ' sinimol babu', 'sini.george.9529@gmail.com', 'asdf'),
(34, 124, ' sinimol babu', 'sini.george.9529@gmail.com', 'test'),
(35, 4, 'Anurima Padwal', 'anu@gmail.com', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `collapse`
--

CREATE TABLE `collapse` (
  `id` int(10) NOT NULL DEFAULT '0',
  `no` text NOT NULL,
  `nohash` text NOT NULL,
  `class` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collapse`
--

INSERT INTO `collapse` (`id`, `no`, `nohash`, `class`) VALUES
(1, 'collapseOne', '#collapseOne', 'panel-collapse collapse in'),
(2, 'collapseTwo', '#collapseTwo', 'panel-collapse collapse'),
(3, 'collapseThree', '#collapseThree', 'panel-collapse collapse'),
(4, 'collapseFour', '#collapseFour', 'panel-collapse collapse'),
(5, 'collapseFive', '#collapseFive', 'panel-collapse collapse'),
(6, 'collapseSix', '#collapseSix', 'panel-collapse collapse'),
(7, 'collapseSeven', '#collapseSeven', 'panel-collapse collapse'),
(8, 'collapseEight', '#collapseEight', 'panel-collapse collapse'),
(9, 'collapseNine', '#collapseNine', 'panel-collapse collapse'),
(10, 'collapseTen', '#collapseTen', 'panel-collapse collapse'),
(11, 'collapseEleven', '#collapseEleven', 'panel-collapse collapse'),
(12, 'collapseTwelve', '#collapseTwelve', 'panel-collapse collapse'),
(13, 'collapseThirteen', '#collapseThirteen', 'panel-collapse collapse');

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(11) NOT NULL,
  `name` enum('Agnel Marathi Cultural Committee','Anti-Ragging Committee','Women Grievance Redressal Committee','Grievance Redressal Committee','Women Cell') NOT NULL,
  `member` varchar(128) NOT NULL,
  `designation` varchar(1500) NOT NULL,
  `post` varchar(256) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `created_by` tinyint(1) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `name`, `member`, `designation`, `post`, `image`, `created_by`, `created_timestamp`) VALUES
(1, '', 'Dr. S.M. Khot', 'Hon. President', 'HOD- Mech- FCRIT', 'http://eioapp.com/fcrit/cdn/committee/1415099015-no.user.icon.jpg', 1, '2014-11-04 12:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `committee_members`
--

CREATE TABLE `committee_members` (
  `id` int(11) NOT NULL,
  `organizing_committee_id` int(11) NOT NULL,
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(1000) NOT NULL,
  `department` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee_members`
--

INSERT INTO `committee_members` (`id`, `organizing_committee_id`, `sr_no`, `name`, `designation`, `department`, `institute`, `role`, `email`) VALUES
(1, 2, 0, 'Dr. Nitesh P. Yelve', 'Dean (PG Studies) and Assoc Professor, Dept of Mechanical Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'Mechanical Enginnering', 'FCRIT', 'Conference Chair', 'vnithinj@gmail.com'),
(2, 3, 1, 'Dr. Nilaj Deshmukh', 'Dean (Faculty) and Head, Dept of Mechanical Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India) ', 'Mechanical', 'FCRIT', 'abc', ''),
(3, 4, 0, 'Dr. Vivek Agarwal', 'Professor, Dept of Electrical Engg, IIT Bombay (India)', '', '', '', 'vnithinj@gmail.com'),
(4, 5, 0, 'Rev. Fr. Saturnino Almeida', 'Regional Superior, Managing Director, Agnel Technical Education Complex, Vashi (India)', '', '', '', ''),
(5, 5, 2, 'Rev. Fr. L. Dias', 'Procurator, Agnel Technical Education Complex, Vashi (India) ', '', '', '', ''),
(6, 5, 3, 'Dr. S.M. Khot', 'Principal, Fr. C. Rodrigues Institute of Technology, Vashi (India)', '', '', '', ''),
(7, 9, 2, 'Prof. Mritunjaykumar Ojha', 'Asst Professor, Dept of Computer Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'Computer Enginnering', 'Fr.CRIT', 'Conference Co-chair', ''),
(8, 9, 1, 'Prof. Aqleem Siddiqui', 'Asst Professor, Dept of Mechanical Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'Mechanical', 'Fr.CRIT', 'Conference Co-chair', ''),
(9, 3, 4, 'Dr. Bindu S', 'Dean (Student Affairs) and Head, Dept of Electrical Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India) ', 'Electrical Engineering', 'FCRIT', 'Track Chair', ''),
(10, 3, 3, 'Dr. Milind Shah', 'Dean (Academics) and Head, Department of Electronics and Telecom Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India) ', 'EXTC', 'FCRIT', 'Track Chair', ''),
(11, 3, 2, 'Dr. Lata Ragha', 'Head, Dept of Computer Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India) ', 'Computer Enginnering', 'FCRIT', 'Track Chair', ''),
(12, 4, 2, 'Prof. Smita Dange', 'Asst Professor, Dept of Computer Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India) ', 'Computer Enginnering', 'FCRIT', 'dummy', ''),
(14, 6, 2, 'Dr. Mira Mitra', 'Assoc Professor, Dept of Aerospace Engg, IIT Bombay (India)', 'dummy', 'dummy', 'dummy', 'vnithinj@gmail.com'),
(15, 6, 3, 'Dr. Sheldon Williamson', 'Assoc Professor, Dept of Electrical, Computer, and Software Engg, University of Ontario (Canada)', 'dummy', 'dummy', 'dummy', ''),
(17, 6, 5, 'Dr. Gopika Vinod', 'Head, PSS, Reactor Safety Division, Bhabha Atomic Research Center (India)', 'dummy', 'dummy', 'dummy', ''),
(18, 6, 6, 'Dr. R.D. Kulkarni', 'Head, Experimental Facilities Section, Reactor Engg Division, Bhabha Atomic Research Center (India)', 'dummy', 'dummy', 'dummy', ''),
(19, 6, 7, 'Mr. K. Jayarajan', 'Outstanding Scientist, Head, Safety Council Secretariat, Bhabha Atomic Research Center (India)', 'dummy', 'dummy', 'dummy', ''),
(20, 7, 1, 'Prof. Girish Dalvi', 'Asst Professor, Dept of Mechanical Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'Mechanical Enginnering', 'Fr.CRIT', '', ''),
(21, 8, 1, 'Dr. Sanjukta B.', 'Asst. Prof., Department of Humanities, Fr. C.R.I.T., Vashi', 'dummy', 'dummy', 'dummy', ''),
(22, 3, 5, 'Dr. H.K. Chavan', 'Head, Dept of Information Technology, Fr. C. Rodrigues Institute of Technology, Vashi (India) ', 'Information Technology', 'FCRIT', 'Track Chair', ''),
(23, 10, 1, 'Prof. Shweta Tripathi', 'Dept of Computer Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India) ', 'Computer Enginnering', 'FCRIT', '', ''),
(24, 15, 1, 'Prof. Sreedevi Nair', 'Asst Professor, Dept of Electrical Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'Electrical Engineering', 'FCRIT', '', ''),
(25, 14, 1, 'Prof. Sreedevi Nair', 'Asst Professor, Department of Electronics and Telecom Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'EXTC', 'FCRIT', '', ''),
(26, 13, 1, 'Dr. Sanjukta Bhoumik', 'Asst Professor, Dept of Humanities, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'Humanities', 'FCRIT', '', ''),
(27, 11, 1, 'Prof. Prasad Bari', 'Asst Professor, Dept of Mechanical Engg, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'Mechanical Enginnering', 'FCRIT', '', ''),
(28, 12, 1, 'Prof. Mukta Nivelkar', 'Asst Professor, Dept of Information Technology, Fr. C. Rodrigues Institute of Technology, Vashi (India)', 'Information Technology', 'FCRIT', '', ''),
(29, 5, 1, 'Rev. Dr. Ivon Almeida', 'Asst Director, Agnel Technical Education Complex, Vashi (India)', '', '', '', ''),
(30, 6, 3, 'Dr. Peter Tse', 'Assoc Professor, Dept of Systems Engg and Engg Management, City University of Hong Kong (China)', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `type` enum('Technical','Financial') NOT NULL,
  `displayhome` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(1) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `image`, `type`, `displayhome`, `created_by`, `created_timestamp`) VALUES
(4, 'Microsoft', './images/company/1423130583-lnt.logo.jpg', 'Technical', 1, 1, '2018-01-07 16:57:24'),
(5, 'IEEE India', './images/company/ieee.png', 'Financial', 1, 1, '2018-02-05 16:25:30'),
(9, 'Atos', './images/company/1423132484-atos.jpg', 'Technical', 1, 1, '2018-01-07 16:58:05'),
(10, 'CSI', './images/company/csilogo.jpg', 'Technical', 1, 1, '2018-01-07 16:57:24'),
(11, 'TCS', './images/company/1482863531-TCS.Logo.jpg', 'Financial', 1, 1, '2018-02-05 16:24:10'),
(12, 'Infosys', './images/company/1423132411-infosys.jpg', 'Financial', 1, 1, '2018-02-05 16:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `message` text NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `company`) VALUES
(6, 'smita.dange@fcrit.ac.in', '9967367372', 0, 'Frcrit', 'How can i do payment'),
(7, 'a@w.com', '123212312321', 0, '123213', '123213'),
(8, 'nithin', 'vnithinj@gmail.com', 0, 'what', 'qwerty'),
(9, 'nithin', 'icnte.project@gmail.com', 987654321, 'jsbcjdasbdcjdsm ', 'adadsadadxc'),
(10, 'nithin', 'icnte.project@gmail.com', 987654321, 'jsbcjdasbdcjdsm ', 'adadsadadxc'),
(11, 'nithin', 'icnte.project@gmail.com', 987654321, 'jsbcjdasbdcjdsm ', 'adadsadadxc'),
(12, 'nithin', 'vnithinj@gmail.com', 987654321, 'sqcjbdakwevjkbw,jbvmwbv,mbj\r\nadbjvcbdjbfcjlwv\r\nvdwjvkbwec', 'adadsadad'),
(13, 'nithin', 'vnithinj@gmail.com', 987654321, 'scmadnjcbdlcldb amc,bdm,c dc\r\ndcjndjkncje', 'adadsadad'),
(14, 'nithin', 'vnithinj@gmail.com', 987654321, 'dafsdfdsf', 'adadsadad'),
(15, 'Nithin', 'icnte.project@gmail.com', 987654321, 'bsbsnsns', 'bananan'),
(16, 'nithin', 'nithin@gmail.com', 1234567890, ' neftgh tedghtgh', 'qweretrt');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner_images`
--

CREATE TABLE `home_banner_images` (
  `id` int(11) NOT NULL,
  `file` varchar(1000) DEFAULT NULL,
  `heading` varchar(50) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `url_heading` varchar(50) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `created_by` int(1) DEFAULT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_banner_images`
--

INSERT INTO `home_banner_images` (`id`, `file`, `heading`, `description`, `url_heading`, `url`, `created_by`, `created_timestamp`) VALUES
(1, 'http://localhost/fcrit/cdn/homebannerimage/1423466718-bnr6.jpg', 'Welcome', 'Welcome to the fcrit', '', '', 1, '2015-02-09 02:55:19'),
(2, 'http://localhost/fcrit/cdn/homebannerimage/1423466934-bnr3.jpg', 'Slide 2', 'welcome to the slide 2', '', '', 1, '2015-02-09 02:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `important_dates`
--

CREATE TABLE `important_dates` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `event` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `important_dates`
--

INSERT INTO `important_dates` (`id`, `date`, `event`) VALUES
(1, '2018-01-01', 'Online paper submission begins'),
(2, '2018-05-31', 'Last date of paper submission'),
(10, '2018-08-31', 'Notification of acceptance and registration begins'),
(11, '2018-11-30', 'Last date of registration and submission of camera ready paper'),
(12, '2019-01-04', 'Conference begins');

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` int(11) NOT NULL,
  `type` enum('Under-graduate','Post-graduate','PhD') NOT NULL,
  `subject` varchar(128) NOT NULL,
  `description1` text NOT NULL,
  `description2` text NOT NULL,
  `file` varchar(1000) NOT NULL,
  `created_by` tinyint(1) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(11) NOT NULL,
  `instruction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `instruction`) VALUES
(1, 'For the first time, authors are required to click on the Login tab and create their account. '),
(2, 'Authors can submit multiple papers through their account.'),
(3, 'Submit paper(s) in the IEEE MS Word format only, otherwise, paper(s) will not be considered for review. The format is made available in the account.'),
(4, 'Authors can check review details and status of the paper(s) in their account. '),
(5, 'The registration fee is nontransferable and nonrefundable.'),
(6, 'Though accepted, paper(s) will not be published in the IEEE Xplore (technical cosponsorship awaited) in absentia of the registered author(s).');

-- --------------------------------------------------------

--
-- Table structure for table `keynotes`
--

CREATE TABLE `keynotes` (
  `id` int(11) NOT NULL,
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keynotes`
--

INSERT INTO `keynotes` (`id`, `sr_no`, `name`, `designation`, `description`) VALUES
(1, 1, 'ABC', 'ABC', 'ABC'),
(2, 2, 'ABC', 'ABC', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `id` int(11) NOT NULL,
  `topic` varchar(500) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `attachment` tinyint(1) DEFAULT NULL,
  `design` text,
  `file` varchar(1000) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `active_till` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `topic`, `description`, `attachment`, `design`, `file`, `is_active`, `active_till`, `created_by`, `created_timestamp`) VALUES
(12, NULL, 'ICNTE 2017 and ICNTE 2015 were both Technically Cosponsored by IEEE and proceedings were published in IEEE Xplore. ', 0, '', '/img/not_available', 1, '2018-08-05 11:20:00', 1, '2017-10-14 18:24:46'),
(13, NULL, 'The Organizing Committee is in process of getting Technical Cosponsorship from IEEE for the Conference. ', 0, '', '/img/not_available', 1, '2018-09-13 14:30:00', 1, '2017-10-14 18:36:55'),
(14, NULL, 'Best Paper Award in each Track . ', 0, '', '/img/not_available', 1, '2017-10-18 14:50:00', 1, '2017-10-17 20:52:03'),
(15, NULL, 'Young Researcher Award for students in each Track. ', 0, '', '/img/not_available', 1, '2017-10-18 18:50:00', 1, '2017-10-17 20:52:29'),
(16, NULL, 'Some of the modules of the website are under construction.  ', 0, '', '/img/not_available', 1, '2017-10-18 18:50:00', 1, '2017-10-17 21:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `type` enum('Under-graduate','Post-graduate','PhD') NOT NULL,
  `subject` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(1000) DEFAULT NULL,
  `comments` text,
  `active_till` datetime NOT NULL,
  `created_by` tinyint(1) NOT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `type`, `subject`, `description`, `attachment`, `comments`, `active_till`, `created_by`, `created_timestamp`) VALUES
(1, 'Under-graduate', 'New Notice Test', 'Dummy text Dummy text Dummy Text Dummy Text \r\nDummy text Dummy text Dummy text ', '/img/not_available', '', '2014-10-21 18:30:00', 1, '2014-10-18 11:33:55'),
(3, 'Under-graduate', 'Testing 1st few points', 'Dummy text Dummy text Dummy Text Dummy Text Dummy text Dummy text ', '/img/not_available', '', '2014-10-25 19:35:00', 1, '2014-10-18 11:41:19'),
(4, 'Under-graduate', 'notice 3', 'dummy text dummy text dummy text dummy text dummy text dummy text', '/img/not_available', '', '2017-01-01 23:35:00', 1, '2016-10-16 19:18:16'),
(5, 'Under-graduate', 'notice 4', 'dummy text dummy text dummy text dummy text dummy text', '/img/not_available', '', '2017-01-01 18:15:00', 1, '2016-10-16 19:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `organizing_committees`
--

CREATE TABLE `organizing_committees` (
  `id` int(11) NOT NULL,
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizing_committees`
--

INSERT INTO `organizing_committees` (`id`, `sr_no`, `name`) VALUES
(2, 2, 'Conference Chair'),
(3, 4, 'Track Chairs'),
(4, 5, 'Technical Program Committee Chairs'),
(5, 1, 'Patrons'),
(6, 6, 'Technical Program Committee Executive Members'),
(7, 8, 'Publicity Committee Chair'),
(9, 3, 'Conference Co-Chairs'),
(10, 6, 'Financial and Technical Sponsorship'),
(11, 7, 'IEEE Correspondance and Publication Committee Chair'),
(12, 9, 'Registration and Secretarial Assistance Committee Chair'),
(13, 10, 'Hospitality Committee Chairs'),
(14, 11, 'Venue Committee Chairs'),
(15, 12, 'Accounts Committee Chair');

-- --------------------------------------------------------

--
-- Table structure for table `overall_admin`
--

CREATE TABLE `overall_admin` (
  `oid` int(11) NOT NULL,
  `oemail` varchar(255) NOT NULL,
  `opwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overall_admin`
--

INSERT INTO `overall_admin` (`oid`, `oemail`, `opwd`) VALUES
(1, 'cdarshu2@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `pid` int(11) NOT NULL,
  `paperid` varchar(255) NOT NULL,
  `auid` int(11) NOT NULL,
  `pstatus1` varchar(100) NOT NULL,
  `pstatus2` varchar(256) NOT NULL,
  `pstatus3` varchar(256) NOT NULL,
  `opstatus` varchar(256) DEFAULT NULL,
  `premark1` varchar(256) NOT NULL,
  `premark2` varchar(256) NOT NULL,
  `premark3` varchar(256) NOT NULL,
  `ptitle` varchar(100) NOT NULL,
  `trackid` int(100) NOT NULL,
  `sessionid` int(100) NOT NULL,
  `pcameraready` varchar(100) NOT NULL,
  `pfilename` varchar(100) NOT NULL,
  `pdate` date NOT NULL,
  `rew1` int(11) DEFAULT NULL,
  `rew2` int(11) DEFAULT NULL,
  `rew3` int(11) DEFAULT NULL,
  `rewd1` tinyint(1) NOT NULL DEFAULT '0',
  `rewd2` tinyint(1) NOT NULL DEFAULT '0',
  `rewd3` tinyint(1) NOT NULL DEFAULT '0',
  `DateAssigned` date NOT NULL,
  `copyright` varchar(256) NOT NULL,
  `pabstract` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`pid`, `paperid`, `auid`, `pstatus1`, `pstatus2`, `pstatus3`, `opstatus`, `premark1`, `premark2`, `premark3`, `ptitle`, `trackid`, `sessionid`, `pcameraready`, `pfilename`, `pdate`, `rew1`, `rew2`, `rew3`, `rewd1`, `rewd2`, `rewd3`, `DateAssigned`, `copyright`, `pabstract`) VALUES
(1, '	 T1_S1_P1', 13, 'Sent', '', '', 'Accepted', 'well done', '', '', 'A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Agriculture', 8, 28, 'DONE', 'copyright-T8_S28_P1-A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Pre', '2017-10-17', 1, 2, 3, 1, 1, 1, '2017-10-24', 'T8_S28_P1-A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Agriculture-spam.docx', 'a'),
(2, '	 T1_S1_P2', 13, 'Accepted', '', '', 'Accepted', 'good job', '', '', 'MANET Routing Protocol Performance for Video Streaming', 8, 28, 'DONE', '14104-ieee.doc', '2017-10-17', 3, 2, 1, 1, 1, 1, '0000-00-00', '', ''),
(4, 'T1_S1_P4', 12, 'Waiting', '', '', 'Rejected', '', '', '', 'Automated Big-O Analysis of Algorithms', 1, 1, '-NA-', 'T1_S1_P4-Automated Big-O Analysis of Algorithms-FH-18-dept cal.docx', '2018-02-02', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', 'sini'),
(5, '	 T1_S1_P5', 12, 'Sent', '', '', 'Reviewed', '', '', '', 'Accident Detection System (ADS) ', 8, 28, '-NA-', '69579-finalresume.docx', '2017-10-17', 1, 2, 3, 0, 0, 0, '2017-10-24', '', ''),
(6, '	 T1_S1_P5', 12, 'Sent', '', '', 'Reviewed', '', '', '', 'Accident Detection System (ADS) for Mumbai-Pune Expressway using Vehicular Communication', 9, 31, '-NA-', '69579-finalresume.docx', '2017-10-17', 1, 2, 3, 0, 0, 0, '2017-10-24', '', ''),
(36, '	 T1_S1_P36', 12, 'Reviewed', '', '', 'Accepted', 'cool', '', '', 'Timed Efficient Asymmetric Cryptography for Enhancing Security in VANET ', 1, 1, 'YES', 'docu.docx', '2017-10-20', 2, 4, NULL, 0, 0, 0, '0000-00-00', '', 'Bootstrap. Build responsive, mobile-first projects on the web with the world\'s most popular front-end component library. Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with o'),
(82, '	 T1_S1_P82', 12, 'Sent', '', '', 'Accepted', '', '', '', 'Real Time 3D Depth Estimation and Measurement of Un-calibrated Stereo and Thermal Images', 1, 1, 'YES', '31730-finalresume.docx', '2017-10-17', 1, 2, NULL, 0, 0, 0, '2017-10-23', '', ''),
(85, '	 T1_S1_P85', 12, 'Sent', '', '', 'Accepted', '', '', '', 'Real Time 3D Depth Estimation and Measurement of Un-calibrated Stereo and Thermal Images', 1, 1, '-NA-', '36909-COMS.docx', '2017-10-17', 1, 2, NULL, 0, 0, 0, '2017-10-23', '', ''),
(89, '	 T11_S39_P89', 16, 'Waiting', '', '', 'Rejected', '', '', '', 'Timed Efficient Asymmetric Cryptography for Enhancing Security in VANET ', 11, 39, '-NA-', '54789-probs.docx', '2017-10-21', 1, 3, NULL, 0, 0, 0, '0000-00-00', '', ''),
(90, '	 T1_S1_P90', 16, 'Waiting', '', '', 'Rejected', '', '', '', 'A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Agriculture', 1, 1, '-NA-', '47490-probs.docx', '2017-10-22', 1, NULL, NULL, 0, 0, 0, '0000-00-00', '', ''),
(91, '	 T1_S1_P91', 12, 'Sent', '', '', 'Accepted', '', '', '', 'Real Time 3D Depth Estimation and Measurement of Un-calibrated Stereo and Thermal Images', 1, 1, '-NA-', '78696-docu.docx', '2017-10-22', 1, 2, NULL, 0, 0, 0, '2017-10-23', '', ''),
(92, '	 T1_S1_P92', 12, 'Waiting', '', '', 'Rejected', '', '', '', 'Timed Efficient Asymmetric Cryptography for Enhancing Security in VANET ', 1, 1, '-NA-', '95364-docu.docx', '2017-10-22', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', ''),
(93, '	 T2_S5_P93', 12, 'Waiting', '', '', 'Rejected', '', '', '', 'A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Agriculture', 2, 5, '-NA-', '78320-probs.docx', '2017-10-22', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', ''),
(94, '	 T1_S1_P94', 12, 'Sent', '', '', 'Reviewed', '', '', '', 'Real Time 3D Depth Estimation and Measurement of Un-calibrated Stereo and Thermal Images', 1, 1, '-NA-', '90379-IEEE_Final_Paper_T9_S3_P1_C63.docx', '2017-10-22', 1, 2, NULL, 0, 0, 0, '2017-10-23', '', ''),
(105, 'T5_S18_P105', 17, 'Waiting', '', '', 'Reviewed', '', '', '', 'Real Time 3D Depth Estimation ', 5, 18, '-NA-', '21959-css qb.docx', '2017-10-26', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', ''),
(111, 'T2_S5_P111', 12, 'Waiting', '', '', 'Reviewed', '', '', '', 'Real Time 3D ', 2, 5, '-NA-', 'T2_S5_P111-Reg_form.doc', '2017-12-20', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', 'real'),
(119, 'T1_S1_P119', 13, '', '', '', 'Under Review', '', '', '', 'A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Agriculture', 1, 1, '-NA-', 'T1_S1_P119-A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Ag', '2018-01-27', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', 'asdg'),
(120, 'T1_S1_P120', 13, '', '', '', 'Under Review', '', '', '', 'A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Agriculture', 1, 1, '-NA-', 'T1_S1_P120-A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Ag', '2018-01-27', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', 'asdg'),
(121, 'T1_S1_P121', 12, '', '', '', 'Under Review', '', '', '', 'A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Agriculture', 1, 1, '-NA-', 'T1_S1_P121-A Wireless Sensor Network Based Low Cost and Energy Efficient Frame Work for Precision Ag', '2018-01-27', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', 's'),
(122, 'T13_S49_P122', 12, '', '', '', 'Under Review', '', '', '', 'greedy basis', 13, 49, '-NA-', 'T13_S49_P122-greedy basis-test.docx', '2018-01-30', NULL, NULL, NULL, 0, 0, 0, '0000-00-00', '', 'greedy');

-- --------------------------------------------------------

--
-- Table structure for table `pspapers`
--

CREATE TABLE `pspapers` (
  `pid1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid6` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `psid` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pspapers`
--

INSERT INTO `pspapers` (`pid1`, `pid2`, `pid3`, `pid4`, `pid5`, `pid6`, `tid`, `sid`, `psid`) VALUES
('	 T1_S1_P82', '	 T1_S1_P36', '	 T1_S1_P36', '	 T1_S1_P36', '	 T1_S1_P36', '	 T1_S1_P36', '1', '1', 'mechS1'),
('', '', '', '', '', '', '2', '8', 'mechS2');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `description`) VALUES
(1, 'Applied to IEEE for technical cosponsorship. Both ICNTE 2015 ( http://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=7018204 ) and ICNTE 2017 ( http://ieeexplore.ieee.org/xpl/mostRecentIssue.jsp?punumber=7938143 ) were technically cosponsored by IEEE and papers were published in the IEEE Xplore.');

-- --------------------------------------------------------

--
-- Table structure for table `registration_fees`
--

CREATE TABLE `registration_fees` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `costrs` int(100) NOT NULL,
  `costd` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_fees`
--

INSERT INTO `registration_fees` (`id`, `category`, `costrs`, `costd`) VALUES
(1, 'Industry: Paper Registration', 8000, 200),
(2, 'Industry: Co-Author Registration (50% Less)', 4000, 100),
(3, 'Faculty/Govt. Organization: Paper Registration', 6000, 150),
(4, 'Faculty/Govt. Organization: Co-Author Registration (50% Less)', 3000, 75),
(5, 'Students: Paper Registration', 3000, 100),
(6, 'Students: Co-Author Registration (50% Less)', 1500, 50),
(7, 'Publishing Certificate to Co-Authors in Absentia', 1000, 25),
(8, 'Non-Author Attendee: Other Than Students', 2000, 50),
(9, 'Non-Author Attendee: Students', 1500, 25);

-- --------------------------------------------------------

--
-- Table structure for table `registration_instructions`
--

CREATE TABLE `registration_instructions` (
  `id` int(11) NOT NULL,
  `instruction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_instructions`
--

INSERT INTO `registration_instructions` (`id`, `instruction`) VALUES
(1, 'Through early bird registrations between September 15, 2016 and November 5, 2016, participants can avail a discount Rs. 1000/- or USD 100 for authors and Rs. 500/- or USD 50 for non-authors. In the case of paper rejection, early bird registration fee will be refunded to the authors, otherwise, early bird or regular registration fee'),
(2, 'Instruction 2');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `rewid` int(11) NOT NULL,
  `rewname` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `experience` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `trackid` int(255) NOT NULL,
  `sessionid` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `permanent` varchar(255) NOT NULL,
  `rpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`rewid`, `rewname`, `qualification`, `prefix`, `organization`, `experience`, `department`, `trackid`, `sessionid`, `email`, `mobile`, `address`, `permanent`, `rpassword`) VALUES
(1, 'Dr. Prasanna M. Mujumdar', 'M.Tech/M.E', 'Prof.', 'IIT Bombay', 3, 'Computer Engineering', 0, 0, 'chitreshchaudhari@gmail.com', 9167585633, 'Jan Shiv Shakti CHS,Chawl No-2,Room No-3', '', '9a55ca49907411b2b3b61b34a3dca790'),
(2, 'Mr Sam Clafin', 'Ph.D', 'Dr.', 'Harvard', 3, 'Mechanical Engineering', 0, 0, 'sini.george.9529@gmail.com', 9909102134, 'ffwshggjlk', '', '1e00996d70a49ff85e8269693709c490'),
(3, 'Mr. shah', 'M.Tech/M.E', 'Prof.', 'Princeton', 2, 'Computer Engineerin', 0, 0, 'icnte.project@gmail.com', 9757073222, 'xxxx', '', '25f9e794323b453885f5181f1b624d0b'),
(4, 'Celin Babu', 'Ph.D', 'Dr.', 'Stanford', 0, 'Mechanical Engineering', 0, 0, 'celinbabugeorge@gmail.com', 9757073222, 's', '', 'fbE2$'),
(5, 'Sibin', 'M.Tech/M.E', 'Prof.', 'BBTB', 5, 'Computer Engineering', 0, 0, 'sibingeorgge@gmail.com', 9757073222, 'sass', '', 'Ef$d3');

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `id` int(11) NOT NULL,
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewers`
--

INSERT INTO `reviewers` (`id`, `sr_no`, `name`, `designation`, `institute`) VALUES
(1, 1, 'Dr. Nitesh P. Yelve', 'Dean (PG Studies) and Assoc Professor, Dept of Mechanical Engg', 'Fr. C. Rodrigues Institute of Technology, Vashi (India)'),
(2, 2, 'Dr. Nitin Satpute', 'Dean (PG Studies) and Assoc Professor, Dept of Mechanical Engg', 'Fr. C. Rodrigues Institute of Technology, Vashi (India)'),
(3, 3, 'Dr. Nilaj Deshmukh', 'Assoc Professor, Dept of Mechanical Engg', 'Fr. C. Rodrigues Institute of Technology, Vashi (India)'),
(4, 4, 'Dr. Sushil Thale', 'Dean (R&D) and Professor, Dept of Electrical Engg', 'Fr. C. Rodrigues Institute of Technology, Vashi (India) '),
(5, 5, 'Dr. Bindu S.', 'Dean (Student Affairs) and Head, Dept of Electrical Engg', 'Fr. C. Rodrigues Institute of Technology, Vashi (India) '),
(6, 6, 'Dr. Milind Shah', 'Dean (Academics) and Head, Dept of Electronics and Telecom Engg', 'Fr. C. Rodrigues Institute of Technology, Vashi (India) '),
(7, 7, 'Dr. Lata Ragha', 'Head, Dept of Computer Engg', 'Fr. C. Rodrigues Institute of Technology, Vashi (India) ');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sid` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `sdate` varchar(100) DEFAULT NULL,
  `stime` varchar(100) DEFAULT NULL,
  `svennue` varchar(100) DEFAULT NULL,
  `schair` varchar(100) DEFAULT NULL,
  `scochair` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sid`, `dept`, `sdate`, `stime`, `svennue`, `schair`, `scochair`) VALUES
('compS1', 'cs/it', NULL, NULL, NULL, NULL, NULL),
('compS2', 'cs/it', NULL, NULL, NULL, NULL, NULL),
('compS3', 'cs/it', NULL, NULL, NULL, NULL, NULL),
('compS4', 'cs/it', NULL, NULL, NULL, NULL, NULL),
('compS5', 'cs/it', NULL, NULL, NULL, NULL, NULL),
('elecS1', 'elec', '4 January 2019', '2pm-4pm', 'seminar hall', 'abc', 'chsvchs'),
('elecS2', 'elec', NULL, NULL, NULL, NULL, NULL),
('elecS3', 'elec', NULL, NULL, NULL, NULL, NULL),
('elecS4', 'elec', NULL, NULL, NULL, NULL, NULL),
('elecS5', 'elec', NULL, NULL, NULL, NULL, NULL),
('extcS1', 'extc', NULL, NULL, NULL, NULL, NULL),
('extcS2', 'extc', NULL, NULL, NULL, NULL, NULL),
('extcS3', 'extc', NULL, NULL, NULL, NULL, NULL),
('extcS4', 'extc', NULL, NULL, NULL, NULL, NULL),
('extcS5', 'extc', NULL, NULL, NULL, NULL, NULL),
('mechS1', 'mech', '4 January 2019', '2pm-4pm', 'seminar hall', 'abc', 'def'),
('mechS2', 'mech', '4 January 2019', '4:30pm-6:30pm', 'seminar hall', 'abc', 'def'),
('mechS3', 'mech', NULL, NULL, NULL, NULL, NULL),
('mechS4', 'mech', NULL, NULL, NULL, NULL, NULL),
('mechS5', 'mech', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sid`, `tid`, `sname`) VALUES
(1, 1, 'Active Vibration Control and Health Monitoring of Structures'),
(2, 1, 'Linear and Nonlinear Dynamics of Nao, Micro, and Macro Systems'),
(3, 1, 'Vehicle Dynamics and Control'),
(4, 1, 'Structural Design, Optimization, and Experimental Techniques'),
(5, 2, 'Combustion, Thermo-acoustics, and Fuels'),
(6, 2, 'Refrigeration, Cryogenics, and Air Conditioning'),
(7, 2, 'Renewable and Non-Renewable Energy'),
(8, 2, 'Computational and Experimental Techniques in Thermal / Fluids Systems'),
(9, 3, 'Sustainable Manufacturing Technologies'),
(10, 3, 'Recent Trends in Material Science'),
(11, 3, 'Industrial Robotics and Automation'),
(12, 3, 'Technology and Knowledge Management'),
(13, 4, 'Electrical Machine Design and Modelling'),
(14, 4, 'Advanced Control of Electric Drives'),
(15, 4, 'Special Machine and Actuators'),
(16, 4, 'Fault Detection in Machine and Drives'),
(17, 5, 'HVAC, HVDC, FACTS'),
(18, 5, 'Switch Gear and Protection'),
(19, 5, 'Micro Grids and Smart Grids'),
(20, 5, 'Renewable Energy Systems'),
(21, 6, 'Power electronic devices'),
(22, 6, 'Power electronic Converters'),
(23, 6, 'Electric and Hybrid Electric Vehicles'),
(24, 6, 'EMI and EMC'),
(25, 7, 'Speech Processing'),
(26, 7, 'Image Processing'),
(27, 7, 'Bio-medical Signal Processing'),
(28, 8, 'Wireless Communication'),
(29, 8, 'Telecommunication Network'),
(30, 8, '4G Technology'),
(31, 9, 'VLSI Technology'),
(32, 9, 'RTOS'),
(33, 9, 'Embedded System H/W'),
(34, 10, 'Network Management, Measurement, and Monitoring.'),
(35, 10, 'Wireless, Sensor, and ADHOC networks.'),
(36, 10, 'Network Resilience, Security, and Robustness.'),
(37, 10, 'Routing, Multipath Routing.'),
(38, 11, 'Crypto Algorithms'),
(39, 11, 'Network, System, '),
(40, 11, 'Biometrics, Forensics,'),
(41, 11, 'Secure Communication Channel,'),
(42, 12, 'Software Engineering,'),
(43, 12, 'Data Warehousing and Data Mining,'),
(44, 12, 'Artificial Intelligence, Expert System, Machine learning'),
(45, 12, 'Computer Graphics, Visualization, .'),
(46, 13, 'Parallel and Distributed Algorithms .'),
(47, 13, 'Programming languages, Complexity, '),
(48, 13, 'Crypto Algorithms, '),
(49, 13, 'Greedy Methods, Amortized Analysis, Dynamic Programming,'),
(53, 10, 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `tid` int(11) NOT NULL,
  `trackname` varchar(255) NOT NULL,
  `dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`tid`, `trackname`, `dept`) VALUES
(1, 'Structural Control, Dynamics, and Health Monitoring', 'mech'),
(2, 'Thermal Engineering and Fluid Dynamics', 'mech'),
(3, 'Manufacturing and Management Strategies ', 'mech'),
(4, 'Electrical Machines and Drives', 'elec'),
(5, 'Power Systems', 'elec'),
(6, 'Power Electronics and Energy Conversion', 'elec'),
(7, 'Signal Processing', 'extc'),
(8, 'Communication Engineering', 'extc'),
(9, 'Embedded System', 'extc'),
(10, 'Networking', 'cs/it'),
(11, 'Security', 'cs/it'),
(12, 'Information and Computer Technologies', 'cs/it'),
(13, 'Analysis and Design of Algorithms', 'cs/it'),
(16, 'XYZ', 'cs/it');

-- --------------------------------------------------------

--
-- Table structure for table `track_admin`
--

CREATE TABLE `track_admin` (
  `taid` int(11) NOT NULL,
  `tadept` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tausername` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tapwd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `track_admin`
--

INSERT INTO `track_admin` (`taid`, `tadept`, `taname`, `taemail`, `tausername`, `tapwd`) VALUES
(2, 'elec', 'Mrs. Shweta Tripathi', 'cdarshu2@gmail.com', 'elec', '1234'),
(3, 'extc', 'darshana', 'cdarshu2@gmail.com', 'extc', '1234'),
(4, 'mech', 'Mrs. Krithika', 'cdarshu2@gmail.com', 'mech', '1234'),
(8, 'cs/it', 'Nitesh', 'niteshyelve@fcrit.ac.in', 'NiteshMech', 'nitesh@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisory_committees`
--
ALTER TABLE `advisory_committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`auid`);

--
-- Indexes for table `coauthors`
--
ALTER TABLE `coauthors`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `collapse`
--
ALTER TABLE `collapse`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_members`
--
ALTER TABLE `committee_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banner_images`
--
ALTER TABLE `home_banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `important_dates`
--
ALTER TABLE `important_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keynotes`
--
ALTER TABLE `keynotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizing_committees`
--
ALTER TABLE `organizing_committees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overall_admin`
--
ALTER TABLE `overall_admin`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `auid` (`auid`);

--
-- Indexes for table `pspapers`
--
ALTER TABLE `pspapers`
  ADD PRIMARY KEY (`psid`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_fees`
--
ALTER TABLE `registration_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_instructions`
--
ALTER TABLE `registration_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`rewid`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `track_admin`
--
ALTER TABLE `track_admin`
  ADD PRIMARY KEY (`taid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advisory_committees`
--
ALTER TABLE `advisory_committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `coauthors`
--
ALTER TABLE `coauthors`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `committee_members`
--
ALTER TABLE `committee_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `home_banner_images`
--
ALTER TABLE `home_banner_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `important_dates`
--
ALTER TABLE `important_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `keynotes`
--
ALTER TABLE `keynotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `organizing_committees`
--
ALTER TABLE `organizing_committees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `overall_admin`
--
ALTER TABLE `overall_admin`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `registration_fees`
--
ALTER TABLE `registration_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `registration_instructions`
--
ALTER TABLE `registration_instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `rewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `track_admin`
--
ALTER TABLE `track_admin`
  MODIFY `taid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_ibfk_1` FOREIGN KEY (`auid`) REFERENCES `author` (`auid`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tracks` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
