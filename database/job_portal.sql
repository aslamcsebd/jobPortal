-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 02:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `blood_Group` varchar(50) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `division` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `father`, `mother`, `gender`, `dob`, `blood_Group`, `mobile`, `email`, `password`, `division`, `image`, `address`) VALUES
(7, 'Asma', 'Father', 'Mother', 'Female', '2019-03-05', 'A+', '01680607294', 'candidate@gmail.com', '1234', 'Chittagong', '', 'agrabad'),
(8, 'Md Aslam3', 'Father', 'Mother', 'Male', '2019-08-04', 'A-', '016806072933', 'candidate3@gmail.com', '1234', 'Rangpur', '../profile_picture/12.jpg', 'agrabad'),
(9, 'Asma2', 'Father', 'Mother', 'Female', '2019-07-29', 'O+', '01685978546', 'candidate4@gmail.com', '1234', 'Khulna', '../profile_picture/13.jpg', 'agrabad'),
(10, 'Asma2', 'Father', 'Mother', 'Female', '2019-07-29', 'O-', '016806072988', 'candidate5@gmail.com', '1234', 'Mymensingh', '', 'agrabad'),
(11, 'Md Aslam', 'Father', 'Mother', 'Male', '2019-07-29', 'O-', '018317587998', 'candidate6@gmail.com', '1234', 'Rajshahi', '../profile_picture/14.jpg', 'agrabad');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `mobile`, `email`, `password`) VALUES
(1, 'Tiger IT', '01831758799', 'company@gmail.com', '1234'),
(2, 'IT firm dhaka', '01680607293', 'company2@gmail.com', '1234'),
(3, 'IT firm ctg', '0168029322', 'company3@gmail.com', '1234'),
(4, 'IT firm', '01680607294', 'company4@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `division_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `division_name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Barishal'),
(4, 'Khulna'),
(5, 'Mymensingh'),
(6, 'Rajshahi'),
(7, 'Rangpur'),
(8, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `job_details` text NOT NULL,
  `requirements` text NOT NULL,
  `vacancy` varchar(255) NOT NULL,
  `benefits` text NOT NULL,
  `experience` text NOT NULL,
  `salary` varchar(22) NOT NULL,
  `emp_status` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `category`, `location`, `division`, `contact`, `job_details`, `requirements`, `vacancy`, `benefits`, `experience`, `salary`, `emp_status`, `company`, `company_id`) VALUES
(14, 'Junior developer2', '101', 'agrabad', 'Rajshahi', '016809075842', '123', '123', '22', '321', '5 years', '25000', 'Part Time', 'Tiger IT', 'company2@gmail.com'),
(15, 'Junior developer3', '103', 'agrabad', 'Chittagong', '01685758685', 'good job', 'good job', '12', 'good job', '5 years', '', 'Full Time', 'Tiger IT', 'company3@gmail.com'),
(16, 'Junior developer5', '107', 'agrabad, ctg', 'Chittagong', '01680607293', 'We are looking for a self-motivated technical consultant who enjoys exploring the details of programmable systems and stretching their capabilities.', 'We are looking for a self-motivated technical consultant who enjoys exploring the details of programmable systems and stretching their capabilities.', '11', 'We are looking for a self-motivated technical consultant who enjoys exploring the details of programmable systems and stretching their capabilities.', '4 years', '15,000/=', 'Part Time', 'IT firm', 'company4@gmail.com'),
(17, 'Junior develope4', '102', 'agrabad, ctg', 'Chittagong', '01680607293', 'We are looking for a self-motivated technical consultant who enjoys exploring the details of programmable systems and stretching their capabilities.', 'We are looking for a self-motivated technical consultant who enjoys exploring the details of programmable systems and stretching their capabilities.', '22', 'We are looking for a self-motivated technical consultant who enjoys exploring the details of programmable systems and stretching their capabilities.', '4 years', '10,000/=', 'Part Time', 'IT firm', 'company4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `category_name`, `category_id`) VALUES
(1, 'Banking', 101),
(2, 'Education', 102),
(3, 'Information Technology', 103),
(4, 'Developer', 104),
(5, 'Software Engineer', 105),
(6, 'Medical', 106),
(7, 'Designer', 107),
(8, 'Others', 108);

-- --------------------------------------------------------

--
-- Table structure for table `job_request`
--

CREATE TABLE `job_request` (
  `id` int(30) NOT NULL,
  `candidate_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `company_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_request`
--

INSERT INTO `job_request` (`id`, `candidate_id`, `name`, `division`, `contact`, `category`, `title`, `location`, `company_id`) VALUES
(19, 9, 'Md Aslam4', 'Khulna', '', 'Developer', 'Sr. Web Developer', 'GEC,Chittagong', ''),
(20, 9, 'Md Aslam4', 'Khulna', '', 'Information Technology', 'Junior developer3', 'agrabad', 'company2@gmail.com'),
(21, 7, 'Md Aslam2', 'Chittagong', '01680607294', 'Developer', 'Sr. Web Developer', 'GEC,Chittagong', 'company@gmail.com'),
(22, 7, 'Md Aslam2', 'Chittagong', '01680607294', 'Software Engineer', 'Junior developer', 'agrabad', 'company@gmail.com'),
(23, 7, 'Md Aslam2', 'Chittagong', '01680607294', 'Banking', 'Junior developer2', 'agrabad', 'company4@gmail.com'),
(24, 7, 'Md Aslam2', 'Chittagong', '01680607294', 'Banking', 'Junior developer2', 'agrabad', 'company2@gmail.com'),
(25, 9, 'Md Aslam4', 'Khulna', '01685978546', 'Information Technology', 'Junior developer3', 'agrabad', 'company3@gmail.com'),
(26, 9, 'Md Aslam4', 'Khulna', '01685978546', 'Software Engineer', 'Junior developer', 'agrabad', 'company4@gmail.com'),
(27, 8, 'Md Aslam3', 'Rangpur', '016806072933', 'Banking', 'Junior developer2', 'agrabad', 'company4@gmail.com'),
(28, 8, 'Md Aslam3', 'Rangpur', '016806072933', 'Information Technology', 'Junior developer3', 'agrabad', 'company3@gmail.com'),
(29, 11, 'Md Aslam6', 'Rajshahi', '018317587998', 'Education', 'Junior develope4', 'agrabad, ctg', 'company3@gmail.com'),
(30, 11, 'Md Aslam6', 'Rajshahi', '018317587998', 'Banking', 'Junior developer2', 'agrabad', 'company2@gmail.com'),
(31, 11, 'Md Aslam6', 'Rajshahi', '018317587998', 'Software Engineer', 'Junior developer', 'agrabad', 'company@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_request`
--
ALTER TABLE `job_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_request`
--
ALTER TABLE `job_request`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
