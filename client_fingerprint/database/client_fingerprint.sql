-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2022 at 09:37 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `client_fingerprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fp_access`
--

CREATE TABLE `fp_access` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `owner` varchar(20) collate utf8_unicode_ci NOT NULL,
  `uname` varchar(20) collate utf8_unicode_ci NOT NULL,
  `download_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fp_access`
--

INSERT INTO `fp_access` (`id`, `fid`, `owner`, `uname`, `download_st`) VALUES
(1, 9, 'rahul', 'ajai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fp_down`
--

CREATE TABLE `fp_down` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `fid` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `rdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fp_down`
--

INSERT INTO `fp_down` (`id`, `uname`, `fid`, `filename`, `rdate`) VALUES
(1, 'dinesh', 1, 'F1doc.txt', '09-02-2022'),
(2, 'vino', 5, 'F5doc.txt', '16-03-2022');

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
(1, 'vinoth', 'text/plain', 1106, 'my data', 'F1doc.txt', '07-02-2022', 1),
(2, 'vinoth', 'image/jpeg', 16778, 'image', 'F2asus.jpg', '07-02-2022', 1),
(3, 'vinoth', 'image/png', 154295, 'image', 'F3acer.png', '07-02-2022', 1),
(4, 'vinoth', 'text/plain', 2378, 'data', 'F4doc.txt', '16-03-2022', 0),
(5, 'oviya', 'text/plain', 2378, 'data', 'F5doc.txt', '16-03-2022', 1),
(6, 'rahul', 'text/plain', 2362, 'data', 'F6docs.txt', '06-04-2022', 0),
(7, 'rahul', 'image/png', 54393, 'data', 'F77_prev_ui.png', '06-04-2022', 1),
(8, 'rahul', '', 2362, 'data124', 'F6docs.txt', '', 1),
(9, 'rahul', '', 42100, 'mm', 'F78_prev_ui.png', '', 1),
(10, 'rahul', '', 476, 'data', 'F33data_description.txt', '', 1),
(11, 'rahul', '', 8680, 'data', 'F34m1.jpg', '', 1);

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
  `pass` varchar(20) NOT NULL,
  `finger_st` int(11) NOT NULL,
  `utype` varchar(20) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `fimg1` varchar(50) NOT NULL,
  `fimg2` varchar(50) NOT NULL,
  `fimg3` varchar(50) NOT NULL,
  `img_key` varchar(100) NOT NULL,
  PRIMARY KEY  (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fp_owner`
--

INSERT INTO `fp_owner` (`id`, `name`, `mobile`, `email`, `city`, `uname`, `pass`, `finger_st`, `utype`, `owner`, `fimg1`, `fimg2`, `fimg3`, `img_key`) VALUES
(2, 'Ajai', 9054621096, 'ajai@gmail.com', '', 'ajai', '1234', 0, 'user', 'rahul', 'm4.jpg', 'm6.jpg', 'm7.jpg', ''),
(1, 'Rahul', 9054621096, 'rahul@gmail.com', '', 'rahul', '1234', 0, 'owner', '', 'm1.jpg', 'm2.jpg', 'm3.jpg', '');

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
  `pass` varchar(20) NOT NULL,
  `fimg1` varchar(50) NOT NULL,
  `fimg2` varchar(50) NOT NULL,
  `fimg3` varchar(50) NOT NULL,
  PRIMARY KEY  (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fp_user`
--

INSERT INTO `fp_user` (`id`, `owner`, `name`, `mobile`, `email`, `city`, `uname`, `pass`, `fimg1`, `fimg2`, `fimg3`) VALUES
(2, 'surya', 'Dinesh', 8867533241, 'dinesh@gmail.com', 'Tanjore', 'dinesh', '1234', 'm4.jpg', 'm6.jpg', 'm7.jpg'),
(1, 'surya', 'Sathish', 9736428961, 'sathish@gmail.com', 'Trichy', 'sathish', '1234', 'm4.jpg', 'm6.jpg', 'm7.jpg');
