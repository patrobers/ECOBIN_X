-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2019 at 01:50 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waste_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `bin_master`
--

CREATE TABLE `bin_master` (
  `bin_id` varchar(35) NOT NULL,
  `bin_location_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bin_master`
--
INSERT INTO `bin_master` (`bin_id`, `bin_location_name`, `description`, `created_by`, `created_on`, `latitude`, `longitude`) VALUES
('KE001', 'Nairobi CBD', 'Nairobi CBD first bin', 1, '2025-03-15 10:30:00', '-1.286389', '36.817223'),
('KE002', 'Westlands', 'Westlands first bin', 1, '2025-03-14 12:15:45', '-1.2674', '36.8052'),
('KE003', 'Kilimani', 'Kilimani first bin', 1, '2025-03-13 14:40:20', '-1.2921', '36.7871'),
('KE004', 'Kasarani', 'Kasarani first bin', 1, '2025-03-12 09:05:10', '-1.2091', '36.8969'),
('KE005', 'Karen', 'Karen first bin', 1, '2025-03-11 16:20:30', '-1.3356', '36.7123'),
('KE006', 'Mombasa CBD', 'Mombasa CBD first bin', 1, '2025-03-10 08:50:15', '-4.0435', '39.6682'),
('KE007', 'Nakuru Town', 'Nakuru Town first bin', 1, '2025-03-09 11:35:55', '-0.3031', '36.0800'),
('KE008', 'Eldoret CBD', 'Eldoret CBD first bin', 1, '2025-03-08 07:45:25', '0.5143', '35.2698');

-- --------------------------------------------------------

--
-- Table structure for table `bin_sensor_data`
--

CREATE TABLE `bin_sensor_data` (
  `id` bigint(20) NOT NULL,
  `fk_bin_id` varchar(35) NOT NULL,
  `is_bin_present` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 - bin present at the location, 0 - bin missing',
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `bin_level` int(10) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bin_sensor_data`
--

INSERT INTO `bin_sensor_data` (`id`, `fk_bin_id`, `is_bin_present`, `latitude`, `longitude`, `bin_level`, `created_time`) VALUES
(988, 'KE002', 1, '-1.2674', '36.8052', 40, '2025-03-15 13:34:46'),
(989, 'KE003', 1, '-1.2921', '36.7871', 21, '2025-03-15 13:34:46'),
(990, 'KE004', 1, '-1.2091', '36.8969', 58, '2025-03-15 13:34:46'),

(1508, 'KE002', 0, '-1.2674', '36.8052', 0, '2025-03-14 09:39:34'),
(1509, 'KE003', 1, '-1.2921', '36.7871', 0, '2025-03-14 09:39:35'),
(1510, 'KE004', 1, '-1.2091', '36.8969', 0, '2025-03-14 09:39:35'),
(1511, 'KE005', 1, '-1.3356', '36.7123', 34, '2025-03-14 09:39:35'),
(1512, 'KE002', 0, '-1.2674', '36.8052', 0, '2025-03-14 09:39:36'),
(1513, 'KE003', 1, '-1.2921', '36.7871', 0, '2025-03-14 09:39:37'),
(1514, 'KE004', 1, '-1.2091', '36.8969', 0, '2025-03-14 09:39:37'),
(1515, 'KE005', 1, '-1.3356', '36.7123', 33, '2025-03-14 09:39:37'),
(1516, 'KE002', 0, '-1.2674', '36.8052', 0, '2025-03-14 09:39:38'),
(1517, 'KE003', 1, '-1.2921', '36.7871', 0, '2025-03-14 09:39:39'),
(1518, 'KE004', 1, '-1.2091', '36.8969', 0, '2025-03-14 09:39:39'),
(1519, 'KE005', 1, '-1.3356', '36.7123', 40, '2025-03-14 09:39:39'),
(1520, 'KE002', 0, '-1.2674', '36.8052', 0, '2025-03-14 09:39:41'),

(1736, 'KE002', 1, '-1.2674', '36.8052', 62, '2025-03-14 09:41:33');

INSERT INTO bin_sensor_data (id, fk_bin_id, is_bin_present, latitude, longitude, bin_level, created_time) VALUES
(1737, 'KE001', 1, '-1.2921', '36.8219', 0, '2025-03-15 09:41:34'),
(1738, 'KE002', 1, '-1.2864', '36.8172', 0, '2025-03-15 09:41:34'),
(1739, 'KE003', 1, '-1.2833', '36.8280', 35, '2025-03-15 09:41:34'),
(1740, 'KE004', 1, '-1.3054', '36.8266', 60, '2025-03-15 09:41:35'),
(1741, 'KE001', 1, '-1.2921', '36.8219', 6, '2025-03-15 09:41:36'),
(1742, 'KE002', 1, '-1.2864', '36.8172', 0, '2025-03-15 09:41:36'),
(1743, 'KE003', 1, '-1.2833', '36.8280', 33, '2025-03-15 09:41:36'),
(1744, 'KE004', 1, '-1.3054', '36.8266', 62, '2025-03-15 09:41:38'),
(1745, 'KE001', 1, '-1.2921', '36.8219', 6, '2025-03-15 09:41:38'),
(1746, 'KE002', 1, '-1.2864', '36.8172', 0, '2025-03-15 09:41:38'),
(1747, 'KE003', 1, '-1.2833', '36.8280', 42, '2025-03-15 09:41:38'),
(1748, 'KE004', 1, '-1.3054', '36.8266', 59, '2025-03-15 09:41:40'),
(1749, 'KE001', 1, '-1.2921', '36.8219', 6, '2025-03-15 09:41:40'),
(1750, 'KE002', 1, '-1.2864', '36.8172', 0, '2025-03-15 09:41:40'),
(1751, 'KE003', 1, '-1.2833', '36.8280', 32, '2025-03-15 09:41:40'),
(1752, 'KE004', 1, '-1.3054', '36.8266', 75, '2025-03-15 09:41:42'),
(1753, 'KE001', 1, '-1.2921', '36.8219', 7, '2025-03-15 09:41:42'),
(1754, 'KE002', 1, '-1.2864', '36.8172', 0, '2025-03-15 09:41:42'),
(1755, 'KE003', 1, '-1.2833', '36.8280', 35, '2025-03-15 09:41:42');


-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'ADMIN'),
(2, 'MANAGER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `phone`, `full_name`, `role`, `last_login`) VALUES
(1, 'user1@gmail.com', '12345', 0798597545, 'Rue Mutanu', 1, '2025-03-20 00:00:00');
-- Procedure to Clear All Alerts
DELIMITER //
CREATE PROCEDURE ClearAllGrievances()
BEGIN
    -- Optionally log the clearing action
    INSERT INTO grievance_logs (action, timestamp)
    VALUES ('CLEAR_ALL', NOW());
    
    -- Delete all grievances
    DELETE FROM grievances;
END //
DELIMITER ;

-- Procedure to Delete Single Alert
DELIMITER //
CREATE PROCEDURE DeleteSingleGrievance(IN grievance_id INT)
BEGIN
    -- Log the deletion action
    INSERT INTO grievance_logs (action, reference_id, timestamp)
    VALUES ('DELETE_SINGLE', grievance_id, NOW());
    
    -- Delete the specific grievance
    DELETE FROM grievances WHERE id = grievance_id;
END //
DELIMITER ;

-- Optional: Create a log table to track alert management actions
CREATE TABLE grievance_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(50) NOT NULL,
    reference_id INT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `bin_master`
--
ALTER TABLE `bin_master`
  ADD PRIMARY KEY (`bin_id`);

--
-- Indexes for table `bin_sensor_data`
--
ALTER TABLE `bin_sensor_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email id` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bin_sensor_data`
--
ALTER TABLE `bin_sensor_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1844;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- Add missing columns
ALTER TABLE sensor_data
ADD COLUMN bin_id INT NOT NULL AFTER id,
ADD COLUMN distance1 INT AFTER bin_id,
ADD COLUMN distance2 INT AFTER distance1,
ADD COLUMN distance3 INT AFTER distance2,
ADD COLUMN fill_level FLOAT AFTER temperature,
ADD COLUMN weight FLOAT AFTER fill_level,
ADD COLUMN bin_status BOOLEAN AFTER weight;

-- Modify recorded_at column to match required name
ALTER TABLE sensor_data 
CHANGE COLUMN recorded_at created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;