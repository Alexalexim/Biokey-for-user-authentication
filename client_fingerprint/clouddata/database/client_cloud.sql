-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2022 at 01:21 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iotcl6k4_project22`
--

-- --------------------------------------------------------

--
-- Table structure for table `fp_access`
--

CREATE TABLE `fp_access` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `owner` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `download_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fp_access`
--

INSERT INTO `fp_access` (`id`, `fid`, `owner`, `uname`, `download_st`) VALUES
(2, 1, 'vinoth', 'dinesh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fp_admin`
--

CREATE TABLE `fp_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `utype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fp_admin`
--

INSERT INTO `fp_admin` (`username`, `password`, `utype`) VALUES
('admin', 'admin', 'admin'),
('weadmin', 'admin', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `fp_det`
--

CREATE TABLE `fp_det` (
  `id` int(11) NOT NULL,
  `details` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rdate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rtime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fp_det`
--

INSERT INTO `fp_det` (`id`, `details`, `rdate`, `rtime`, `bcode`) VALUES
(1, 'T1/3', '07-02-2022', '02:46:36 PM', 'T1'),
(2, 'T1/5', '08-02-2022', '12:47:12 PM', 'T1');

-- --------------------------------------------------------

--
-- Table structure for table `fp_files`
--

CREATE TABLE `fp_files` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `file_size` double NOT NULL,
  `file_content` varchar(50) NOT NULL,
  `upload_file` varchar(50) NOT NULL,
  `rdate` varchar(15) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fp_files`
--

INSERT INTO `fp_files` (`id`, `uname`, `file_type`, `file_size`, `file_content`, `upload_file`, `rdate`, `status`) VALUES
(1, 'vinoth', 'text/plain', 1476, '', 'F1doc.txt', '07-02-2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fp_owner`
--

CREATE TABLE `fp_owner` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fp_owner`
--

INSERT INTO `fp_owner` (`id`, `name`, `mobile`, `email`, `city`, `uname`, `pass`) VALUES
(1, 'Vinoth', 9034566264, 'vinoth@gmail.com', 'Chennai', 'vinoth', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `fp_status`
--

CREATE TABLE `fp_status` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `rdate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rtime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `log_st` int(11) NOT NULL,
  `vdate` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `election_st` int(11) NOT NULL,
  `stime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `etime` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fp_status`
--

INSERT INTO `fp_status` (`id`, `status`, `fid`, `rdate`, `rtime`, `bcode`, `uname`, `pass`, `log_st`, `vdate`, `election_st`, `stime`, `etime`) VALUES
(1, 1, 0, '', '', '', 'admin', 'webadmin', 2, '02-02-2022', 0, '7', '7'),
(2, 1, 0, '01-02-2022', '08:13:09 AM', 'T1', 'vino', '12345', 1, '02-02-2022', 0, '7', '7');

-- --------------------------------------------------------

--
-- Table structure for table `fp_user`
--

CREATE TABLE `fp_user` (
  `id` int(11) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fp_user`
--

INSERT INTO `fp_user` (`id`, `owner`, `name`, `mobile`, `email`, `city`, `uname`, `pass`) VALUES
(1, 'vinoth', 'Dinesh', 8856733472, 'dinesh@gmail.com', 'Salem', 'dinesh', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fp_access`
--
ALTER TABLE `fp_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_admin`
--
ALTER TABLE `fp_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `fp_files`
--
ALTER TABLE `fp_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fp_owner`
--
ALTER TABLE `fp_owner`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `fp_status`
--
ALTER TABLE `fp_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `fp_user`
--
ALTER TABLE `fp_user`
  ADD PRIMARY KEY (`uname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
