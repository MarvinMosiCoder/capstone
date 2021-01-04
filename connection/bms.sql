-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 11:36 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `process_name` varchar(255) NOT NULL,
  `process_type` text NOT NULL,
  `process_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `process_name`, `process_type`, `process_time`) VALUES
(1, 'admin1', 'Updated Residence Information', '2019-10-29 21:03:42'),
(2, 'admin1', 'Added Residence Information', '2019-10-29 21:29:19'),
(3, 'admin1', 'Added Blotter Record', '2019-10-29 21:47:41'),
(4, 'admin1', 'Downloaded Residence Information', '2019-10-29 21:56:21'),
(5, 'admin1', 'Generate PDF for Residence Information', '2019-10-29 21:59:11'),
(6, 'admin1', 'Generated PDF for Residence Information', '2019-10-29 22:02:25'),
(7, 'admin2', 'Generated PDF for Residence Information', '2019-10-29 22:57:28'),
(8, 'admin2', 'Added Blotter Record', '2019-11-01 21:23:10'),
(9, 'admin2', 'Added Residence Information', '2019-11-01 21:42:04'),
(10, 'admin2', 'Added Residence Information', '2019-11-01 21:45:51'),
(11, 'admin2', 'Generated PDF for Residence Information', '2019-11-04 13:30:08'),
(12, 'admin2', 'Added Blotter Record', '2019-11-04 13:34:10'),
(13, 'admin2', 'Added Blotter Record', '2019-11-04 13:54:54'),
(14, 'admin2', 'Added Blotter Record', '2019-11-24 14:32:27'),
(15, 'admin2', 'Added Blotter Record', '2019-11-24 14:34:58'),
(16, 'admin2', 'Added Residence Information', '2019-12-17 04:41:19'),
(17, 'admin2', 'Updated Residence Information', '2019-12-17 04:42:39'),
(18, 'admin2', 'Added Residence Information', '2019-12-17 04:50:29'),
(19, 'admin2', 'Added Blotter Record', '2019-12-17 04:56:25'),
(20, 'admin2', 'Added Blotter Record', '2019-12-17 06:04:51'),
(21, 'admin2', 'Updated Residence Information', '2020-01-16 21:18:11'),
(22, 'admin2', 'Updated Residence Information', '2020-01-16 21:22:18'),
(23, 'admin1', 'Added Blotter Record', '2020-03-02 23:15:23'),
(24, 'admin1', 'Updated Residence Information', '2020-03-04 20:17:01'),
(25, 'admin1', 'Added Blotter Record', '2020-03-04 20:18:56'),
(26, 'admin1', 'Added Residence Information', '2020-03-04 22:24:01'),
(27, 'admin1', 'Added Residence Information', '2020-03-12 20:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'adminpassword'),
(2, 'admin2', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `blotter_records`
--

CREATE TABLE `blotter_records` (
  `blotter_id` int(11) NOT NULL,
  `compFname` varchar(255) NOT NULL,
  `compAge` int(11) NOT NULL,
  `compGender` varchar(255) NOT NULL,
  `compNat` varchar(255) NOT NULL,
  `compAddress` varchar(255) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `respondent_Fullname` varchar(255) NOT NULL,
  `resAge` int(11) NOT NULL,
  `resGender` varchar(255) NOT NULL,
  `resNat` varchar(255) NOT NULL,
  `resAddress` varchar(255) NOT NULL,
  `serial_number` int(11) NOT NULL,
  `b_date` date NOT NULL,
  `b_time` varchar(50) NOT NULL,
  `blotterType` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `compStatement` text NOT NULL,
  `resStatement` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blotter_records`
--

INSERT INTO `blotter_records` (`blotter_id`, `compFname`, `compAge`, `compGender`, `compNat`, `compAddress`, `residence_id`, `respondent_Fullname`, `resAge`, `resGender`, `resNat`, `resAddress`, `serial_number`, `b_date`, `b_time`, `blotterType`, `location`, `compStatement`, `resStatement`, `status`) VALUES
(26, 'Marvin Mosico', 24, 'Male', 'Filipino', 'Valenzuela', 9, 'Cyrill jane  Novera', 23, 'Female', 'arabo', 'Navotas', 112119, '2019-03-02', '12:12 AM', 'Mataba', 'Cmu', 'asdasd', 'asdasd', 'Settled'),
(27, 'Kenneth Adrian Bago', 24, 'Male', 'Filipino', 'asfsa', 7, 'JohnKenneth Quirante Candelario', 24, 'Male', 'arabo', 'asdasd', 123123, '2019-12-16', '12:31 PM', 'natalo sa pusathan', 'Cmu', 'asdasd', 'asdadsd', 'Settled'),
(28, 'Artz Fabillar', 23, 'Male', 'Filipino', 'asdasd', 8, 'Kenenth Adrian  Bago', 23, 'Female', 'arabo', 'asdasd', 123144, '2020-03-02', '03:22 AM', 'Abuse', 'Cmu', 'asdasd', 'asdasd', 'Appeal to Court'),
(29, 'JohnKenneth Candelario', 23, 'Male', 'Filipino', 'malabon', 9, 'Cyrill jane  Novera', 24, 'Male', 'Japanese', 'asdasd', 112219, '2020-03-04', '12:32 AM', 'Violence', 'Cmu', 'asdasd', 'asdasd', 'Settled');

-- --------------------------------------------------------

--
-- Table structure for table `case_history`
--

CREATE TABLE `case_history` (
  `id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `record_type` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_hearing` date NOT NULL,
  `officer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_history`
--

INSERT INTO `case_history` (`id`, `case_id`, `residence_id`, `record_type`, `status`, `date_hearing`, `officer`) VALUES
(3, 9, 6, 'Pogi', 'Dismiss', '2020-05-15', 'Candelario');

-- --------------------------------------------------------

--
-- Table structure for table `case_records`
--

CREATE TABLE `case_records` (
  `case_id` int(11) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `susp_fullname` varchar(255) NOT NULL,
  `susp_age` int(11) NOT NULL,
  `susp_gender` varchar(255) NOT NULL,
  `susp_nat` varchar(255) NOT NULL,
  `susp_address` varchar(255) NOT NULL,
  `c_date` date NOT NULL,
  `r_time` time NOT NULL,
  `record_type` varchar(255) NOT NULL,
  `susp_statement` text NOT NULL,
  `active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_records`
--

INSERT INTO `case_records` (`case_id`, `residence_id`, `susp_fullname`, `susp_age`, `susp_gender`, `susp_nat`, `susp_address`, `c_date`, `r_time`, `record_type`, `susp_statement`, `active`) VALUES
(5, 7, 'JohnKenneth Quirante Candelario', 24, 'Male', 'Filipino', 'Malabon', '2019-12-16', '12:31:00', 'Nagvape', 'Kala niya pwedi pa', 'Dismiss'),
(6, 6, 'Marvin Quillope Mosico', 23, 'Male', 'filipino', 'Valenzuela', '2020-05-15', '00:32:00', 'Nagvape', 'asdasdasdasdasd', 'Dismiss'),
(7, 6, 'Marvin Quillope Mosico', 25, 'Male', 'filipino', 'Valenzuela City', '2020-05-15', '13:11:00', 'Pogi', 'Sobrang Pogi', 'Dismiss'),
(8, 6, 'Marvin Quillope Mosico', 25, 'Male', 'filipino', 'Valenzuela City', '2020-05-15', '23:11:00', 'Pogi', 'Sobrang Pogi', 'Dismiss'),
(9, 6, 'Marvin Quillope Mosico', 25, 'Male', 'filipino', 'valenzuela City', '2020-05-15', '23:01:00', 'Pogi', 'Sobrang Pogi', 'Dismiss');

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`id`, `username`, `log_date`) VALUES
(1, 'admin1', '2019-10-28 01:52:55'),
(2, 'admin1', '2019-10-29 18:15:57'),
(3, 'admin1', '2019-10-29 21:30:43'),
(4, 'admin2', '2019-10-29 22:57:11'),
(5, 'admin2', '2019-10-31 20:57:07'),
(6, 'admin2', '2019-11-01 19:30:42'),
(7, 'admin2', '2019-11-04 13:09:04'),
(8, 'admin2', '2019-11-05 03:53:09'),
(9, 'admin2', '2019-11-05 04:11:16'),
(10, 'admin2', '2019-11-05 04:13:58'),
(11, 'admin2', '2019-11-24 13:14:46'),
(12, 'admin2', '2019-11-26 22:29:17'),
(13, 'admin2', '2019-12-02 21:57:21'),
(14, 'admin2', '2019-12-04 20:23:56'),
(15, 'admin2', '2019-12-12 21:20:48'),
(16, 'admin2', '2019-12-17 04:26:19'),
(17, 'admin2', '2019-12-17 05:55:30'),
(18, 'admin2', '2020-01-09 21:29:02'),
(19, 'admin2', '2020-01-16 20:28:04'),
(20, 'admin2', '2020-01-24 20:05:06'),
(21, 'admin1', '2020-02-29 19:56:27'),
(22, 'admin1', '2020-03-02 20:36:56'),
(23, 'admin1', '2020-03-04 20:13:05'),
(24, 'admin1', '2020-03-05 20:43:19'),
(25, 'admin1', '2020-03-12 19:48:13'),
(26, 'admin1', '2020-04-28 22:19:27'),
(27, 'admin1', '2020-05-03 21:39:01'),
(28, 'admin1', '2020-05-08 21:12:52'),
(29, 'admin1', '2020-05-15 16:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `issued_cert`
--

CREATE TABLE `issued_cert` (
  `id` int(11) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `com_tax` int(11) NOT NULL,
  `issued_at` varchar(50) NOT NULL,
  `cert_date_issued` date NOT NULL,
  `endorsed` varchar(50) NOT NULL,
  `cert_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_cert`
--

INSERT INTO `issued_cert` (`id`, `residence_id`, `fullname`, `age`, `address`, `purpose`, `com_tax`, `issued_at`, `cert_date_issued`, `endorsed`, `cert_type`) VALUES
(24, 0, '', 0, '', 'Educational Assistance', 0, '', '1970-01-01', '', 'Barangay Clearance'),
(25, 0, '', 0, '', 'Educational Assistance', 0, '', '1970-01-01', '', 'Barangay Clearance'),
(26, 0, '', 0, '', 'Educational Assistance', 0, '', '1970-01-01', '', 'Barangay Clearance'),
(27, 0, '', 0, '', 'Educational Assistance', 0, '', '1970-01-01', '', 'Barangay Clearance');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `offcommitte` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `fname`, `mname`, `lname`, `offcommitte`, `position`) VALUES
(2, 'Kenneth', 'Adrian', 'Bago', '', 'Kapitan');

-- --------------------------------------------------------

--
-- Table structure for table `residences`
--

CREATE TABLE `residences` (
  `residenceID` int(11) NOT NULL,
  `profile_image` text NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Month` varchar(255) NOT NULL,
  `Day` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `BirthPlace` varchar(255) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `CivilStatus` varchar(255) NOT NULL,
  `VoterStatus` varchar(255) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residences`
--

INSERT INTO `residences` (`residenceID`, `profile_image`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `Month`, `Day`, `Year`, `Address`, `BirthPlace`, `Contact`, `Email`, `area`, `CivilStatus`, `VoterStatus`, `date_register`) VALUES
(6, '', 'Marvin', 'Quillope', 'Mosico', 'Male', 'January', 1, 1985, 'malabon', 'Cagayan De Oro City', '2147483647', 'marvinmosicoo@gmail.com', 'Phase 1B', 'Married', 'YES', '2020-01-16 21:24:39'),
(7, '', 'JohnKenneth', 'Quirante', 'Candelario', 'Male', 'January', 1, 1985, 'malabon', 'dasdasd', '909090909', 'asd', 'Kapitbahayan', 'Married', 'YES', '2020-01-16 21:24:39'),
(8, '', 'Kenenth Adrian', '', 'Bago', 'Male', 'January', 1, 1985, 'navotas', 'dasdasd', '2147483647', 'mossione01@gmail.com', 'Phase 1A', 'Single', 'YES', '2020-01-16 21:24:39'),
(9, '', 'Cyrill jane', '', 'Novera', 'Female', 'June', 16, 2018, 'navotas', 'Navotas', '2147483647', 'asdasd', 'Kapitbahayan', 'Single', 'YES', '2020-01-16 21:24:39'),
(10, '', 'kaps', 'asd', 'asd', 'Male', 'January', 1, 1985, 'asd', 'asdasd', '909090909', 'asdasdasd', 'Kapitbahayan', 'Married', 'YES', '2020-01-16 21:24:39'),
(11, '', 'Iron', 'Q', 'Tenorio', 'Male', 'December', 1, 1985, 'malabon', 'malabon', '123', 'asdasd', 'Kapitbahayan', 'Single', 'YES', '2020-01-16 21:24:39'),
(12, '', 'Joey', 'Ann ', 'Montil', 'Female', 'October', 19, 2001, 'navotas', 'Navotas', '123123', 'asd', 'Kapitbahayan', 'Single', 'YES', '2020-01-16 21:24:39'),
(22, '', 'Jp ', '', 'Pring', 'Male', 'January', 1, 2019, 'navotas', 'Cagayan De Oro City', '909090909', 'mossione01@gmail.com', 'Kapitbahayan', 'Single', 'YES', '2020-02-16 08:00:00'),
(24, '', 'Beejay', 'Paule', 'Triallana', 'Male', 'January', 1, 1995, 'asdasdasd', 'Cagayan de Oro City', '09872656178', 'asdasasd', 'Kapitbahayan', 'Single', 'YES', '2020-01-16 21:24:39'),
(25, '', 'Merasol', 'Q', 'Mosico', 'Female', 'March', 19, 2003, 'Valenzuela City', 'Cagayan De Oro City', '09878672819', 'mossione01@gmail.com', 'Phase 1C', 'Single', 'NO', '2020-03-04 22:24:01'),
(26, '', 'Dianne', 'Grace', 'Agtap', 'Female', 'February', 3, 1995, 'navotas', 'Cagayan De Oro City', '09782671621', 'diannnegrace@gmail.com', 'Phase 1A', 'Married', 'NO', '2020-03-12 20:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `settlement_history`
--

CREATE TABLE `settlement_history` (
  `settle_id` int(11) NOT NULL,
  `blotterId` int(11) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `blotter_type` varchar(50) NOT NULL,
  `prev_status` varchar(255) NOT NULL,
  `date_hearing` date NOT NULL,
  `officer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settlement_history`
--

INSERT INTO `settlement_history` (`settle_id`, `blotterId`, `residence_id`, `blotter_type`, `prev_status`, `date_hearing`, `officer`) VALUES
(1, 29, 9, 'Violence', 'Ongoing', '2020-05-16', 'Candelario'),
(7, 29, 9, 'Violence', 'Settled', '2020-05-15', 'Candelario'),
(9, 28, 8, 'Abuse', 'Appeal to Court', '2020-05-15', 'Candelario');

-- --------------------------------------------------------

--
-- Table structure for table `settlement_records`
--

CREATE TABLE `settlement_records` (
  `settle_id` int(11) NOT NULL,
  `blotterId` int(11) NOT NULL,
  `residence_id` int(11) NOT NULL,
  `blotter_type` varchar(50) NOT NULL,
  `prev_status` varchar(255) NOT NULL,
  `date_hearing` date NOT NULL,
  `officer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settlement_records`
--

INSERT INTO `settlement_records` (`settle_id`, `blotterId`, `residence_id`, `blotter_type`, `prev_status`, `date_hearing`, `officer`) VALUES
(17, 26, 9, 'Mataba', 'Settled', '2020-05-16', 'Mosico'),
(18, 26, 9, 'Mataba', 'Settled', '2020-06-01', 'Candelario'),
(19, 26, 9, 'Mataba', 'Settled', '2019-12-16', 'Mosico'),
(20, 27, 7, 'natalo sa pusathan', 'Settled', '2020-05-08', 'Mosico'),
(21, 28, 8, 'Abuse', 'Appeal to Court', '2020-05-15', 'Candelario'),
(22, 29, 9, 'Violence', 'Settled', '2020-05-15', 'Candelario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blotter_records`
--
ALTER TABLE `blotter_records`
  ADD PRIMARY KEY (`blotter_id`);

--
-- Indexes for table `case_history`
--
ALTER TABLE `case_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_records`
--
ALTER TABLE `case_records`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issued_cert`
--
ALTER TABLE `issued_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residences`
--
ALTER TABLE `residences`
  ADD PRIMARY KEY (`residenceID`);

--
-- Indexes for table `settlement_history`
--
ALTER TABLE `settlement_history`
  ADD PRIMARY KEY (`settle_id`);

--
-- Indexes for table `settlement_records`
--
ALTER TABLE `settlement_records`
  ADD PRIMARY KEY (`settle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blotter_records`
--
ALTER TABLE `blotter_records`
  MODIFY `blotter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `case_history`
--
ALTER TABLE `case_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `case_records`
--
ALTER TABLE `case_records`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `issued_cert`
--
ALTER TABLE `issued_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `residences`
--
ALTER TABLE `residences`
  MODIFY `residenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `settlement_history`
--
ALTER TABLE `settlement_history`
  MODIFY `settle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settlement_records`
--
ALTER TABLE `settlement_records`
  MODIFY `settle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
