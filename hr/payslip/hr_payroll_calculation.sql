-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 01:46 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `hr_payroll_calculation`
--

CREATE TABLE `hr_payroll_calculation` (
  `id` int(11) NOT NULL,
  `e_code` int(20) NOT NULL,
  `e_name` varchar(250) NOT NULL,
  `dep` varchar(250) NOT NULL,
  `total_days` varchar(25) NOT NULL,
  `basic_salary` varchar(25) NOT NULL,
  `worked_days` varchar(25) NOT NULL,
  `nhd` varchar(250) NOT NULL,
  `wage_day` decimal(9,2) NOT NULL,
  `lww` decimal(9,2) NOT NULL,
  `basic_da` decimal(9,2) NOT NULL,
  `hra_1` decimal(9,2) NOT NULL,
  `wa_all` decimal(9,2) NOT NULL,
  `basic_da_wages` decimal(9,2) NOT NULL,
  `hra` decimal(9,2) NOT NULL,
  `wash_all` decimal(9,2) NOT NULL,
  `cr_wage` decimal(9,2) NOT NULL,
  `pf` decimal(9,2) NOT NULL,
  `esi` decimal(9,2) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `net_wages` decimal(9,2) NOT NULL,
  `month_pay` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_payroll_calculation`
--

INSERT INTO `hr_payroll_calculation` (`id`, `e_code`, `e_name`, `dep`, `total_days`, `basic_salary`, `worked_days`, `nhd`, `wage_day`, `lww`, `basic_da`, `hra_1`, `wa_all`, `basic_da_wages`, `hra`, `wash_all`, `cr_wage`, `pf`, `esi`, `total`, `net_wages`, `month_pay`) VALUES
(136, 38, 'S.JANNAKI', 'SPG', '30', '8000', '28', '2', '266.67', '1.50', '160.00', '66.67', '40.00', '4800.00', '2000.00', '1200.00', '8000.00', '576.00', '119.00', '695.00', '7305.00', '2018-09'),
(137, 40, 'C.PANDIYAN', 'FHR', '30', '9000', '28', '2', '300.00', '1.50', '180.00', '75.00', '45.00', '5400.00', '2250.00', '1350.00', '9000.00', '648.00', '133.88', '781.88', '8218.13', '2018-09'),
(138, 41, 'GNANAKUMAR.V', 'FHR', '30', '10000', '28', '2', '333.33', '1.50', '200.00', '83.33', '50.00', '6000.00', '2500.00', '1500.00', '10000.00', '720.00', '148.75', '868.75', '9131.25', '2018-09'),
(139, 42, 'A.ANDIAMMAL', 'SPG', '30', '12000', '28', '2', '400.00', '1.50', '240.00', '100.00', '60.00', '7200.00', '3000.00', '1800.00', '12000.00', '864.00', '178.50', '1042.50', '10957.50', '2018-09'),
(140, 43, 'S.PADMAVATHI', 'A/C', '30', '9500', '28', '2', '316.67', '1.50', '190.00', '79.17', '47.50', '5700.00', '2375.00', '1425.00', '9500.00', '684.00', '141.31', '825.31', '8674.69', '2018-09'),
(141, 44, 'S.VASANTHA', 'PRE', '30', '9800', '28', '2', '326.67', '1.50', '196.00', '81.67', '49.00', '5880.00', '2450.00', '1470.00', '9800.00', '705.60', '145.78', '851.38', '8948.63', '2018-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr_payroll_calculation`
--
ALTER TABLE `hr_payroll_calculation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr_payroll_calculation`
--
ALTER TABLE `hr_payroll_calculation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
