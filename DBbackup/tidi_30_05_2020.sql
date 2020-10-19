-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 12:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tidi_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_bank`
--

CREATE TABLE `account_bank` (
  `Id` int(11) NOT NULL,
  `TransactionDate` date NOT NULL,
  `LedgerGroup` int(11) NOT NULL,
  `TransactionType` varchar(10) NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  `ReferenceNo` text NOT NULL,
  `TransactionFrom` varchar(25) NOT NULL,
  `Remarks` text NOT NULL,
  `BankId` int(11) NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `Reference1` varchar(5) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_bank`
--

INSERT INTO `account_bank` (`Id`, `TransactionDate`, `LedgerGroup`, `TransactionType`, `Amount`, `ReferenceNo`, `TransactionFrom`, `Remarks`, `BankId`, `LedgerId`, `Reference1`, `franchisee_id`, `vendor_id`) VALUES
(27, '2020-04-25', 33, 'Credit', '0.00', '-18', 's_job_card', 'Service Advance', 0, 21, '', 0, ''),
(29, '2020-05-11', 33, 'Credit', '29.00', 'F2-20', 's_job_card', 'Service Advance', 0, 21, '', 0, ''),
(30, '2020-05-11', 33, 'Credit', '100.00', '7-7', 'a_final_bill', 'Service Amount from Finall Bill', 0, 21, '', 0, ''),
(31, '2020-05-11', 33, 'Credit', '100.00', '7-7', 'a_final_bill', 'Service Amount from Finall Bill', 0, 21, '', 9, '7'),
(32, '2020-05-11', 33, 'Credit', '29.00', 'F2-21', 's_job_card', 'Service Advance', 0, 21, '', 9, '7'),
(33, '2020-05-11', 33, 'Credit', '100.00', 'F2-24', 's_job_card', 'Service Advance', 1, 21, '', 9, '7'),
(34, '2020-05-12', 11, 'Debit', '100.00', '2', 'expense_details', 'Expenses', 1, 0, '', 9, '7'),
(35, '2020-05-12', 33, 'Credit', '24.00', '', 'sales_order', 'Sales', 0, 0, '', 0, '7'),
(36, '2020-05-12', 33, 'Credit', '800.00', '', 'sales_order', 'Sales', 0, 0, '', 9, '7'),
(37, '2020-05-13', 32, 'Debit', '10.00', '6', 'expense_details', 'Expenses', 1, 0, '', 9, '7'),
(38, '2020-05-13', 40, 'Debit', '1500.00', '8', 'expense_details', 'Expenses', 1, 0, '', 9, '7'),
(39, '2020-05-13', 40, 'Debit', '1500.00', '9', 'expense_details', 'Expenses', 1, 0, '', 9, '7'),
(40, '2020-05-13', 40, 'Debit', '1500.00', '10', 'expense_details', 'Expenses', 1, 0, '', 9, '7'),
(41, '2020-05-12', 33, 'Credit', '169.00', 'SI8', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(42, '2020-05-12', 33, 'Credit', '169.00', 'SI8', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(43, '2020-05-12', 33, 'Credit', '169.00', 'SI8', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(44, '2020-05-12', 33, 'Credit', '169.00', 'SI8', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(45, '2020-05-12', 33, 'Credit', '169.00', 'SI8', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(46, '2020-05-12', 33, 'Credit', '169.00', 'SI8', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(47, '2020-05-12', 33, 'Credit', '169.00', 'SI8', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(48, '2020-05-12', 33, 'Credit', '169.00', 'SI8', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(49, '2020-05-15', 33, 'Debit', '29.00', 'F2-21', 's_job_card', 'Service Advance Cancel', 0, 103, '', 0, ''),
(50, '2020-05-15', 21, 'Debit', '123.00', '1', 's_purchase', 'Purchase', 0, 0, '', 0, ''),
(51, '2020-05-20', 23, 'Debit', '100.00', '4', 'sup_outstanding', 'Payment Voucher', 0, 22, '1', 0, ''),
(52, '2020-05-20', 62, 'Credit', '30.00', '7-17', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(53, '2020-05-20', 62, 'Credit', '29.00', '7-18', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(54, '2020-05-20', 62, 'Credit', '29.00', '7-18', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(55, '2020-05-20', 62, 'Credit', '100.00', '7-20', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(56, '2020-05-20', 62, 'Credit', '50.00', '7-21', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(57, '2020-05-20', 62, 'Credit', '50.00', '7-22', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(58, '2020-05-20', 62, 'Credit', '50.00', '7-22', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(59, '2020-05-20', 62, 'Credit', '50.00', '7-22', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(60, '2020-05-20', 62, 'Credit', '50.00', '7-22', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(61, '2020-05-20', 62, 'Credit', '50.00', '7-22', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(62, '2020-05-20', 62, 'Credit', '50.00', '7-22', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(63, '2020-05-23', 62, 'Credit', '120.00', '7-28', 'a_final_bill', 'Service Amount from Finall Bill', 0, 25, '', 9, '7'),
(64, '2020-05-23', 62, 'Credit', '123.00', '7-29', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(65, '2020-05-26', 62, 'Credit', '259.00', '7-30', 'a_final_bill', 'Service Amount from Finall Bill', 0, 0, '', 9, '7'),
(66, '2020-05-28', 62, 'Credit', '129.00', '7-31', 'a_final_bill', 'Service Amount from Finall Bill', 0, 112, '', 9, '7'),
(67, '2020-05-30', 62, 'Credit', '110.00', '7-32', 'a_final_bill', 'Service Amount from Finall Bill', 0, 103, '', 9, '7'),
(68, '2020-05-30', 33, 'Credit', '0.00', 'F2-36 ', 's_job_card', 'Service Advance', 0, 103, '', 0, ''),
(69, '2020-05-30', 33, 'Credit', '0.00', 'F2-37  ', 's_job_card', 'Service Advance', 0, 112, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `account_cash`
--

CREATE TABLE `account_cash` (
  `Id` int(11) NOT NULL,
  `TransactionDate` date NOT NULL,
  `LedgerGroup` int(11) NOT NULL,
  `TransactionType` varchar(10) NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  `ReferenceNo` text NOT NULL,
  `TransactionFrom` varchar(25) NOT NULL,
  `Remarks` text NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `Reference1` varchar(5) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_cash`
--

INSERT INTO `account_cash` (`Id`, `TransactionDate`, `LedgerGroup`, `TransactionType`, `Amount`, `ReferenceNo`, `TransactionFrom`, `Remarks`, `LedgerId`, `Reference1`, `franchisee_id`, `vendor_id`) VALUES
(37, '2020-04-25', 33, 'Credit', '129.00', '-1', 'a_final_bill', 'Service Amount from Finall Bill', 0, '', 0, ''),
(38, '2020-05-04', 23, 'Debit', '141.00', '2', 's_purchase', 'Purchase', 24, '', 0, ''),
(39, '2020-05-11', 33, 'Credit', '120.00', 'F2-19', 's_job_card', 'Service Advance', 21, '', 0, ''),
(40, '2020-05-11', 33, 'Credit', '9.00', '7-1', 'a_final_bill', 'Service Amount from Finall Bill', 0, '', 0, ''),
(41, '2020-05-11', 33, 'Credit', '9.00', '7-2', 'a_final_bill', 'Service Amount from Finall Bill', 21, '', 0, ''),
(42, '2020-05-11', 33, 'Credit', '29.00', 'F2-20', 's_job_card', 'Service Advance', 21, '', 9, '7'),
(43, '2020-05-11', 33, 'Credit', '100.00', 'F2-22', 's_job_card', 'Service Advance', 21, '', 9, '7'),
(44, '2020-05-11', 33, 'Credit', '29.00', 'F2-23', 's_job_card', 'Service Advance', 21, '', 9, '7'),
(45, '2020-05-11', 33, 'Credit', '100.00', 'F2-25', 's_job_card', 'Service Advance', 21, '', 9, '7'),
(46, '2020-05-11', 33, 'Credit', '100.00', '7-12', 'a_final_bill', 'Service Amount from Finall Bill', 21, '', 9, '7'),
(47, '2020-05-11', 33, 'Credit', '100.00', '7-12', 'a_final_bill', 'Service Amount from Finall Bill', 21, '', 9, '7'),
(48, '2020-05-12', 23, 'Debit', '2.00', '1', 'sup_outstanding', 'Payment Voucher', 22, '', 9, '7'),
(49, '2020-05-12', 11, 'Debit', '100.00', '1', 'expense_details', '', 0, '', 9, '7'),
(50, '2020-05-12', 33, 'Credit', '29.00', '7-15', 'a_final_bill', 'Service Amount from Finall Bill', 21, '', 9, '7'),
(51, '2020-05-12', 33, 'Credit', '1200.00', '', 'sales_order', 'Sales', 0, '', 9, '7'),
(52, '2020-05-13', 35, 'Debit', '5000.00', '3', 'expense_details', 'test', 0, '', 9, '7'),
(53, '2020-05-13', 33, 'Credit', '2528.55', '', 'sales_order', 'Sales', 0, '', 0, '7'),
(54, '2020-05-13', 9, 'Debit', '110.00', '4', 'expense_details', '', 0, '', 9, '7'),
(55, '2020-05-13', 32, 'Debit', '5000.00', '5', 'expense_details', 'Test', 0, '', 9, '7'),
(56, '0000-00-00', 33, 'Credit', '0.00', 'SI2', 'a_final_bill', 'Service Amount from Finall Bill', 0, '', 9, '7'),
(57, '2020-05-12', 33, 'Credit', '0.00', 'SI2', 'a_final_bill', 'Service Amount from Finall Bill', 0, '', 9, '7'),
(58, '2020-05-12', 33, 'Credit', '169.00', 'SI3', 'a_final_bill', 'Service Amount from Finall Bill', 0, '', 9, '7'),
(59, '2020-05-12', 33, 'Credit', '169.00', 'SI4', 'a_final_bill', 'Service Amount from Finall Bill', 0, '', 9, '7'),
(60, '2020-05-12', 33, 'Credit', '160.00', 'SI5', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(61, '2020-05-12', 33, 'Credit', '169.00', 'SI7', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(62, '2020-05-12', 33, 'Credit', '160.00', 'SI16', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(63, '2020-05-12', 33, 'Credit', '100.00', 'SI17', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(64, '2020-05-12', 33, 'Credit', '100.00', 'SI17', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(65, '2020-05-12', 33, 'Credit', '100.00', 'SI17', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(66, '2020-05-14', 33, 'Credit', '268.00', 'SI20', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(67, '2020-05-12', 33, 'Credit', '169.00', 'SI21', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(68, '2020-05-14', 33, 'Credit', '134.00', 'SI22', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(69, '2020-05-14', 33, 'Credit', '130.00', 'SI23', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(70, '2020-05-14', 33, 'Credit', '797.00', 'SI24', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(71, '2020-05-12', 23, 'Credit', '100.00', '1', 's_purchase', 'Purchase Cancel', 22, '', 0, ''),
(72, '2020-05-12', 23, 'Credit', '100.00', '1', 's_purchase', 'Purchase Cancel', 22, '', 0, ''),
(73, '2020-05-14', 0, 'Credit', '134.00', '2', 's_purchase', 'Purchase Cancel', 22, '', 0, ''),
(74, '2020-05-12', 23, 'Credit', '1400.00', '6', 's_purchase', 'Purchase Cancel', 0, '', 0, ''),
(75, '2020-05-19', 23, 'Credit', '100.00', '1', 's_purchase', 'Purchase Cancel', 22, '', 0, ''),
(76, '2020-05-18', 58, 'Debit', '10000.00', '11', 'expense_details', 'Salary', 0, '', 9, '7'),
(77, '2020-05-19', 33, 'Credit', '144.01', '', 'sales_order', 'Sales', 0, '', 0, '7'),
(78, '2020-05-19', 32, 'Debit', '5000.00', '12', 'expense_details', '', 0, '', 9, '7'),
(79, '2020-05-19', 40, 'Debit', '500.00', '13', 'expense_details', '', 0, '', 9, '7'),
(80, '2020-05-19', 40, 'Debit', '12.00', '14', 'expense_details', '', 0, '', 9, '7'),
(81, '2020-05-19', 51, 'Debit', '122.00', '15', 'expense_details', '', 0, '', 9, '7'),
(82, '2020-05-19', 32, 'Debit', '122.00', '16', 'expense_details', '', 0, '', 9, '7'),
(83, '2020-05-19', 51, 'Debit', '12.00', '18', 'expense_details', '', 0, '', 9, '7'),
(84, '2020-05-19', 9, 'Debit', '10.00', '20', 'expense_details', '', 0, '', 9, '7'),
(85, '2020-05-20', 62, 'Credit', '0.00', '7-16', 'a_final_bill', 'Service Amount from Finall Bill', 103, '', 9, '7'),
(86, '2020-05-20', 33, 'Credit', '50.00', 'F2-27', 's_job_card', 'Service Advance', 103, '', 9, '7'),
(87, '2020-05-20', 33, 'Credit', '29.00', 'F2-28', 's_job_card', 'Service Advance', 25, '', 9, '7'),
(88, '2020-05-26', 33, 'Credit', '120.01', '', 'sales_order', 'Sales', 0, '', 0, '7');

-- --------------------------------------------------------

--
-- Table structure for table `account_cash_bank`
--

CREATE TABLE `account_cash_bank` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ledger_group_id` int(30) NOT NULL,
  `ledger_id` int(30) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `Narration` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `table_id` int(30) NOT NULL,
  `franchisee_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_cash_bank`
--

INSERT INTO `account_cash_bank` (`id`, `date`, `ledger_group_id`, `ledger_id`, `payment_mode`, `Narration`, `type`, `amount`, `table_id`, `franchisee_id`, `vendor_id`) VALUES
(211, '2020-05-14', 24, 0, 'Cash', 'Sales', 'Debit', '0.00', 28, '9', '7'),
(212, '2020-05-14', 5, 5, 'Cash', 'Sales', 'Debit', '0.00', 28, '9', '7'),
(213, '2020-05-14', 24, 24, 'Cash', 'Sales', 'Credit', '100.00', 28, '9', '7'),
(214, '2020-05-14', 28, 28, 'Cash', 'Sales', 'Debit', '0.00', 28, '9', '7'),
(215, '2020-05-14', 35, 35, 'Cash', 'Sales', 'Debit', '0.00', 28, '9', '7'),
(216, '2020-05-14', 44, 44, 'Cash', 'Sales', 'Debit', '0.00', 28, '9', '7'),
(217, '2020-05-14', 51, 51, 'Cash', 'Sales', 'Debit', '0.00', 28, '9', '7'),
(218, '2020-05-14', 51, 51, 'Cash', 'Sales', 'Debit', '4.40', 28, '9', '7'),
(219, '2020-05-14', 51, 51, 'Cash', 'Account Receivable', 'Debit', '130.00', 28, '9', '7'),
(220, '2020-05-14', 24, 103, 'Cash', 'Sales', 'Debit', '0.00', 29, '9', '7'),
(221, '2020-05-14', 5, 5, 'Cash', 'Sales', 'Debit', '0.00', 29, '9', '7'),
(222, '2020-05-14', 24, 24, 'Cash', 'Sales', 'Debit', '0.00', 29, '9', '7'),
(223, '2020-05-14', 28, 28, 'Cash', 'Sales', 'Debit', '0.00', 29, '9', '7'),
(224, '2020-05-14', 35, 35, 'Cash', 'Sales', 'Debit', '0.00', 29, '9', '7'),
(225, '2020-05-14', 44, 44, 'Cash', 'Sales', 'Debit', '0.00', 29, '9', '7'),
(226, '2020-05-14', 51, 51, 'Cash', 'Sales', 'Debit', '0.00', 29, '9', '7'),
(227, '2020-05-14', 51, 51, 'Cash', 'Sales', 'Debit', '0.44', 29, '9', '7'),
(228, '2020-05-14', 51, 51, 'Cash', 'Account Receivable', 'Debit', '797.00', 29, '9', '7'),
(229, '2020-05-18', 5, 5, 'Cash', 'Petty Cash', 'Debit', '1000.00', 3, '', ''),
(230, '2020-05-18', 36, 9, 'Cash', 'Petty Cash', 'Debit', '1000.00', 3, '', ''),
(231, '2020-05-18', 5, 5, 'Cash', 'Petty Cash', 'Debit', '100.00', 4, '9', '7'),
(232, '2020-05-18', 36, 67, 'Cash', 'Petty Cash', 'Debit', '100.00', 4, '9', '7'),
(233, '2020-05-18', 58, 58, 'Cash', 'Expenses Details', 'Debit', '10000.00', 11, '9', '7'),
(234, '2020-05-18', 5, 5, 'Cash', 'Expenses Details', 'Debit', '10000.00', 11, '9', '7'),
(235, '2020-05-18', 21, 22, 'Cash', 'Purchase', 'Credit', '2508.80', 10, '9', '7'),
(236, '2020-05-18', 5, 5, 'Cash', 'Purchase', 'Credit', '2508.80', 10, '9', '7'),
(237, '2020-05-18', 21, 21, 'Cash', 'Purchase', 'Credit', '2508.80', 10, '9', '7'),
(238, '2020-05-18', 27, 27, 'Cash', 'Purchase', 'Credit', '2508.80', 10, '9', '7'),
(239, '2020-05-18', 61, 91, 'Cash', 'Purchase', 'Credit', '268.80', 10, '9', '7'),
(240, '2020-05-18', 40, 40, 'Cash', 'Purchase', 'Credit', '2508.80', 10, '9', '7'),
(241, '2020-05-18', 40, 40, 'Cash', 'Purchase', 'Credit', '508.80', 10, '9', '7'),
(242, '2020-05-18', 40, 40, 'Cash', 'Account Payable', 'Credit', '2000.00', 10, '9', '7'),
(243, '2020-05-19', 32, 10, 'Cash', 'Expenses Details', 'Debit', '5000.00', 12, '9', '7'),
(244, '2020-05-19', 5, 5, 'Cash', 'Expenses Details', 'Debit', '5000.00', 12, '9', '7'),
(245, '2020-05-19', 40, 11, 'Cash', 'Expenses Details', 'Debit', '500.00', 13, '9', '7'),
(246, '2020-05-19', 5, 5, 'Cash', 'Expenses Details', 'Debit', '500.00', 13, '9', '7'),
(247, '2020-05-19', 40, 0, 'Cash', 'Expenses Details', 'Debit', '12.00', 14, '9', '7'),
(248, '2020-05-19', 5, 5, 'Cash', 'Expenses Details', 'Debit', '12.00', 14, '9', '7'),
(249, '2020-05-19', 51, 0, 'Cash', 'Expenses Details', 'Debit', '122.00', 15, '9', '7'),
(250, '2020-05-19', 5, 5, 'Cash', 'Expenses Details', 'Debit', '122.00', 15, '9', '7'),
(251, '2020-05-19', 32, 32, 'Cash', 'Expenses Details', 'Debit', '122.00', 16, '9', '7'),
(252, '2020-05-19', 5, 5, 'Cash', 'Expenses Details', 'Debit', '122.00', 16, '9', '7'),
(253, '2020-05-19', 51, 51, 'Cash', 'Expenses Details', 'Debit', '12.00', 18, '9', '7'),
(254, '2020-05-19', 5, 5, 'Cash', 'Expenses Details', 'Debit', '12.00', 18, '9', '7'),
(255, '2020-05-19', 9, 32, 'Cash', 'Expenses Details', 'Debit', '10.00', 20, '9', '7'),
(256, '2020-05-19', 5, 5, 'Cash', 'Expenses Details', 'Debit', '10.00', 20, '9', '7'),
(257, '2020-05-20', 27, 5, 'Cash', 'Payment Voucher', 'Debit', '100.00', 44, '', ''),
(258, '2020-05-20', 5, 5, 'Cash', 'Payment Voucher', 'Debit', '100.00', 44, '', ''),
(259, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '100.00', 8, '', ''),
(260, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '200.00', 8, '', ''),
(261, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '100.00', 8, '', ''),
(262, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '100.00', 9, '', ''),
(263, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '200.00', 9, '', ''),
(264, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '100.00', 9, '', ''),
(265, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '100.00', 10, '9', ''),
(266, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '200.00', 10, '9', ''),
(267, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '100.00', 10, '9', ''),
(268, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 11, '9', ''),
(269, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '290.00', 11, '9', ''),
(270, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 11, '9', ''),
(271, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 12, '9', ''),
(272, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '290.00', 12, '9', ''),
(273, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 12, '9', ''),
(274, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 13, '9', ''),
(275, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '290.00', 13, '9', ''),
(276, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 13, '9', ''),
(277, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 14, '9', ''),
(278, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '290.00', 14, '9', ''),
(279, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 14, '9', ''),
(280, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 15, '9', ''),
(281, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '290.00', 15, '9', ''),
(282, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 15, '9', ''),
(283, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 16, '9', ''),
(284, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '290.00', 16, '9', ''),
(285, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 16, '9', ''),
(286, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '100.00', 17, '9', ''),
(287, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '200.00', 17, '9', ''),
(288, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '100.00', 17, '9', ''),
(289, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 18, '9', ''),
(290, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '290.00', 18, '9', ''),
(291, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 18, '9', ''),
(292, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 19, '9', ''),
(293, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '-20.00', 19, '9', ''),
(294, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 19, '9', ''),
(295, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 20, '9', ''),
(296, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '-30.00', 20, '9', ''),
(297, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 20, '9', ''),
(298, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 21, '9', ''),
(299, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '0.00', 21, '9', ''),
(300, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 21, '9', ''),
(301, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 22, '9', ''),
(302, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '-50.00', 22, '9', ''),
(303, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 22, '9', ''),
(304, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 23, '9', ''),
(305, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '-60.00', 23, '9', ''),
(306, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 23, '9', ''),
(307, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '10.00', 24, '9', ''),
(308, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '-70.00', 24, '9', ''),
(309, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '10.00', 24, '9', ''),
(310, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '100.00', 25, '9', ''),
(311, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '200.00', 25, '9', ''),
(312, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '100.00', 25, '9', ''),
(313, '2020-05-20', 5, 5, 'Cash', 'Receipt voucher', 'Credit', '50.00', 26, '9', ''),
(314, '2020-05-20', 51, 51, 'Cash', 'Receipt voucher', 'Credit', '150.00', 26, '9', ''),
(315, '2020-05-20', 24, 103, 'Cash', 'Receipt voucher', 'Credit', '50.00', 26, '9', '');

-- --------------------------------------------------------

--
-- Table structure for table `a_bank_acc`
--

CREATE TABLE `a_bank_acc` (
  `Id` int(11) NOT NULL,
  `AccountNumber` varchar(17) NOT NULL,
  `AccountName` varchar(25) NOT NULL,
  `BankName` varchar(55) NOT NULL,
  `IFSCCode` varchar(17) NOT NULL,
  `MICRCode` varchar(17) NOT NULL,
  `SwiftCode` varchar(17) NOT NULL,
  `Branch` varchar(55) NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `LedgerGroup` int(11) NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `default_acc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_bank_acc`
--

INSERT INTO `a_bank_acc` (`Id`, `AccountNumber`, `AccountName`, `BankName`, `IFSCCode`, `MICRCode`, `SwiftCode`, `Branch`, `Amount`, `Status`, `LedgerGroup`, `LedgerId`, `franchisee_id`, `vendor_id`, `default_acc`) VALUES
(1, '9658965896589', 'Suki', 'UNION BANK OF INDIA', 'unmiu4569', '123', '321', 'udt', '10000.00', 'Active', 2, 26, 9, '7', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `a_cash_acc`
--

CREATE TABLE `a_cash_acc` (
  `id` int(11) NOT NULL,
  `cdate` date NOT NULL,
  `cash` decimal(9,2) NOT NULL,
  `ledger` varchar(300) NOT NULL,
  `StartedOpening` decimal(9,2) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_cash_acc`
--

INSERT INTO `a_cash_acc` (`id`, `cdate`, `cash`, `ledger`, `StartedOpening`, `Status`, `franchisee_id`, `vendor_id`) VALUES
(2, '2020-04-25', '100.00', 'Cash A/C', '100.00', 'Active', 9, '7'),
(3, '2020-05-12', '100.00', 'Cash A/C', '100.00', 'Active', 9, '7'),
(4, '2020-05-14', '100.00', 'Cash A/C', '100.00', 'Active', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `a_customer`
--

CREATE TABLE `a_customer` (
  `id` int(11) NOT NULL,
  `cust_no` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `s_cust_name` varchar(20) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `s_addr` varchar(200) NOT NULL,
  `mobile1` varchar(250) NOT NULL,
  `s_mobile1` varchar(20) NOT NULL,
  `mobile2` varchar(250) NOT NULL,
  `s_mobile2` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `cus_out_amt` varchar(250) NOT NULL,
  `FrachiseeId` varchar(10) NOT NULL,
  `vendor_id` int(12) NOT NULL,
  `UserId` varchar(10) NOT NULL,
  `MemberShip` varchar(50) NOT NULL,
  `status` varchar(250) NOT NULL,
  `TAccountNo` int(11) NOT NULL,
  `ledger_group` varchar(250) NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `GSTN` varchar(20) NOT NULL,
  `refer` varchar(10) NOT NULL,
  `s_refer` varchar(10) NOT NULL,
  `AMC` varchar(12) NOT NULL,
  `AMCEarned` decimal(9,2) NOT NULL,
  `AMCUsed` decimal(9,2) NOT NULL,
  `s_city` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `s_state` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `s_pincode` int(11) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `s_gst` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_customer`
--

INSERT INTO `a_customer` (`id`, `cust_no`, `company_name`, `cust_name`, `last_name`, `s_cust_name`, `addr`, `s_addr`, `mobile1`, `s_mobile1`, `mobile2`, `s_mobile2`, `email`, `s_email`, `cus_out_amt`, `FrachiseeId`, `vendor_id`, `UserId`, `MemberShip`, `status`, `TAccountNo`, `ledger_group`, `LedgerId`, `GSTN`, `refer`, `s_refer`, `AMC`, `AMCEarned`, `AMCUsed`, `s_city`, `city`, `s_state`, `state`, `pincode`, `s_pincode`, `gst`, `s_gst`) VALUES
(3, 'C1', '', 'SUHAIL', '', 'SUHAIL', 'PODANOORR', 'PODANOORR', '9876443214', '7010546939', '7010546939', '9876443214', 'suhail@gmail.com', 'suhail@gmail.com', '0', '9', 7, '12', '', 'Active', 0, '24', 103, '', 'Mr', 'Mr', 'No', '0.00', '0.00', 'CBE', 'CBE', 'TN', 'TN', 434675, 434675, '33awq65gj654645', ''),
(4, 'C2', '', 'SUHAIL', '', 'SUHAIL', 'RAM NAGAR', 'RAM NAGAR', '7339015392', '7339015392', '7456595656', '', 'suhail@gmail.com', 'suhail@gmail.com', '0', '7', 9, '12', '', 'Active', 0, '26', 25, '', 'Mr', 'Mr', 'No', '0.00', '0.00', 'CBE', 'CBE', '24', '24', 641023, 641023, '', ''),
(6, 'C4', 'Vertex', 'MUTHU', '', 'MUTHU', 'GANDHIPURAM', 'GANDHIPURAM', '9988776655', '9988776655', '8877445566', '8877445566', 'muthu@gmail.com', 'muthu@gmail.com', '0', '9', 7, '12', '', 'Active', 0, '63', 110, '', 'Mr', 'Mr', '', '0.00', '0.00', 'CBE', 'CBE', '24', '24', 6544321, 6544321, '33fsdfg5646fggh', ''),
(7, 'C5', '', 'KUMARESAN', '', 'KUMARESAN', 'THUDIYALUR', 'THUDIYALUR', '9865322154', '9865322154', '7845128956', '7845128956', 'kumaresan@gmail.com', 'kumaresan@gmail.com', '0', '9', 7, '12', '', 'Active', 0, '63', 111, '', 'Mr', 'Mr', '', '0.00', '0.00', 'CBE', 'CBE', '24', '24', 654321, 654321, '33hdf34ghcfh', ''),
(8, 'C5', 'IPROXIMUS', 'SUBHA', 'SRI', 'SUBHA', 'DFG', 'DFG', '7708745120', '7708745120', '', '', 'subha@gmail.com', 'subha@gmail.com', '0', '9', 7, '12', '2', 'Active', 0, '26', 112, '', 'Mr', 'Mr', '', '0.00', '0.00', 'FGH', 'FGH', '1', '1', 76866, 76866, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `a_customer_vehicle_details`
--

CREATE TABLE `a_customer_vehicle_details` (
  `id` int(11) NOT NULL,
  `cust_no` varchar(250) NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `VehicleModel` varchar(100) NOT NULL,
  `VehicleBrand` varchar(100) NOT NULL,
  `VehicleSegment` varchar(100) NOT NULL,
  `VehicleType` varchar(100) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `vehicle_no` varchar(250) NOT NULL,
  `InsuranceCompnayName` varchar(150) NOT NULL,
  `InsuranceNumber` varchar(150) NOT NULL,
  `InsuranceNumberExpiryDate` date NOT NULL,
  `FrachiseeId` varchar(10) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `UserId` varchar(10) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_customer_vehicle_details`
--

INSERT INTO `a_customer_vehicle_details` (`id`, `cust_no`, `cust_name`, `last_name`, `VehicleModel`, `VehicleBrand`, `VehicleSegment`, `VehicleType`, `Year`, `vehicle_no`, `InsuranceCompnayName`, `InsuranceNumber`, `InsuranceNumberExpiryDate`, `FrachiseeId`, `vendor_id`, `UserId`, `status`) VALUES
(5, '3', 'SUHAIL', '', '175', 'HYUNDAI', 'SEDAN', 'FOUR WHEELER', '2020', 'TN07AS1526', 'VERTEX', '33AS', '2020-04-30', '', '', '12', 'Active'),
(6, '4', 'SUHAIL', '', '175', 'HYUNDAI', 'SEDAN', 'FOUR WHEELER', '2020', 'TN07AS1526', 'VERTEX', '', '0000-00-00', '9', '7', '12', 'Active'),
(8, '6', 'MUTHU', '', '478', 'MAHINDRA', 'LUXURY', 'FOUR WHEELER', '', 'TN02AS3214', '', '', '0000-00-00', '9', '7', '12', 'Active'),
(9, '7', 'KUMARESAN', '', '473', 'MARUTHI SUZUKI', 'HATCH BACK', 'FOUR WHEELER', '', 'TN03AS4567', '', '', '0000-00-00', '9', '7', '12', 'Active'),
(10, '8', 'SUBHA', '', '83', 'MARUTHI SUZUKI', 'SEDAN', 'FOUR WHEELER', '', 'TN09AS1234', '', '', '0000-00-00', '9', '7', '12', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `a_final_bill`
--

CREATE TABLE `a_final_bill` (
  `id` int(11) NOT NULL,
  `FrachiseeId` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `bill_date` date NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `job_card_no` varchar(250) NOT NULL,
  `cname` varchar(250) NOT NULL,
  `cmobile` varchar(250) NOT NULL,
  `caddrs` varchar(250) NOT NULL,
  `cvehile` varchar(250) NOT NULL,
  `cust_out_amt` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `TotalServiceAmount` float NOT NULL,
  `SpareAmt` decimal(9,2) NOT NULL,
  `gst_amt` decimal(9,2) NOT NULL,
  `gst` decimal(9,2) NOT NULL,
  `cgst` decimal(9,1) NOT NULL,
  `igst` decimal(9,1) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `tot_amt` varchar(250) NOT NULL,
  `OutSourcesAmt` float NOT NULL,
  `bill_amt` varchar(250) NOT NULL,
  `Total_bill_Amount` decimal(9,2) NOT NULL,
  `ActualSellingPrice` decimal(9,2) NOT NULL,
  `paid_amt` decimal(9,2) NOT NULL,
  `from_off_amt` decimal(9,2) NOT NULL,
  `ptype` varchar(250) NOT NULL,
  `rec_amt` varchar(250) NOT NULL,
  `bal_amt` varchar(250) NOT NULL,
  `sms` varchar(250) NOT NULL,
  `bill_status` varchar(250) NOT NULL,
  `LedgerGroup` varchar(100) NOT NULL,
  `AccountNo` varchar(300) NOT NULL,
  `ChequeNumber` varchar(200) NOT NULL,
  `LedgerId` int(20) NOT NULL,
  `JobcardId` int(25) NOT NULL,
  `ServiceAmountAfterGst` float NOT NULL,
  `ServiceBalanceAmount` float NOT NULL,
  `financial_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_final_bill`
--

INSERT INTO `a_final_bill` (`id`, `FrachiseeId`, `vendor_id`, `bill_date`, `inv_no`, `job_card_no`, `cname`, `cmobile`, `caddrs`, `cvehile`, `cust_out_amt`, `remarks`, `TotalServiceAmount`, `SpareAmt`, `gst_amt`, `gst`, `cgst`, `igst`, `discount`, `tot_amt`, `OutSourcesAmt`, `bill_amt`, `Total_bill_Amount`, `ActualSellingPrice`, `paid_amt`, `from_off_amt`, `ptype`, `rec_amt`, `bal_amt`, `sms`, `bill_status`, `LedgerGroup`, `AccountNo`, `ChequeNumber`, `LedgerId`, `JobcardId`, `ServiceAmountAfterGst`, `ServiceBalanceAmount`, `financial_year`) VALUES
(21, 0, '', '2020-04-25', '-1', '-18', '', '', '', '', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '129.80', '0.00', '0.00', '0.00', 'Cash', '129', '0.80', '', '', '33', '', '', 0, 0, 129.8, 129.8, ''),
(22, 9, '7', '2020-05-11', '7-1', 'F2-19', '', '', '', '', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '9.00', '0.00', '120.00', '0.00', 'Cash', '9', '0.00', '', '', '33', '', '', 0, 0, 129.8, 9, ''),
(23, 9, '7', '2020-05-11', '7-2', 'F2-19', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '9.00', '0.00', '120.00', '0.00', 'Cash', '9', '0.00', '', '', '33', '', '', 0, 206, 129.8, 9, ''),
(24, 9, '7', '2020-05-11', '7-3', 'F2-20', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Bank', '100', '0.00', '', '', '33', '', '', 0, 207, 129.8, 100, ''),
(25, 9, '7', '2020-05-11', '7-4', 'F2-20', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Bank', '100', '0.00', '', '', '33', '', '', 0, 207, 129.8, 100, ''),
(26, 9, '7', '2020-05-11', '7-4', 'F2-20', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Bank', '100', '0.00', '', '', '33', '', '', 0, 207, 129.8, 100, ''),
(27, 9, '7', '2020-05-11', '7-4', 'F2-20', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Bank', '100', '0.00', '', '', '33', '', '', 0, 207, 129.8, 100, ''),
(28, 9, '7', '2020-05-11', '7-7', 'F2-20', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Bank', '100', '0.00', '', '', '33', '', '', 0, 207, 129.8, 100, ''),
(29, 9, '7', '2020-05-11', '7-7', 'F2-20', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Bank', '100', '0.00', '', '', '33', '', '', 0, 207, 129.8, 100, ''),
(30, 9, '7', '2020-05-11', '7-7', 'F2-20', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Bank', '100', '0.00', '', '', '33', '', '', 0, 207, 129.8, 100, ''),
(31, 9, '7', '2020-05-11', '7-7', 'F2-20', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Bank', '100', '0.00', '', '', '33', '', '', 0, 207, 129.8, 100, ''),
(32, 9, '7', '2020-05-11', '7-11', 'F2-23', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Yes', '100', '0.00', '', '', '33', '', '', 0, 210, 129.8, 100, ''),
(33, 9, '7', '2020-05-11', '7-12', 'F2-23', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Yes', '100', '0.00', '', '', '33', '', '', 0, 210, 129.8, 100, ''),
(34, 9, '7', '2020-05-11', '7-12', 'F2-23', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Yes', '100', '0.00', '', '', '33', '', '', 0, 210, 129.8, 100, ''),
(35, 9, '7', '2020-05-11', '7-12', 'F2-23', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'Yes', '100', '0.00', '', '', '33', '', '', 0, 210, 129.8, 100, ''),
(36, 9, '7', '2020-05-12', '7-15', 'F2-25', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '29.00', '0.00', '100.00', '0.00', 'Yes', '29', '0.00', '', '', '33', '', '', 0, 212, 129.8, 29, ''),
(37, 9, '7', '2020-05-20', '7-16', 'F2-24', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '29.00', '0.00', '100.00', '0.00', 'Yes', '00', '29.00', '', '', '', '', '', 0, 211, 129.8, 29, '2019-2020'),
(38, 9, '7', '2020-05-20', '7-17', 'F2-22', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '29.00', '0.00', '100.00', '0.00', 'No', '30', '-1.00', '', '', '', '', '', 0, 209, 129.8, 29, ''),
(39, 9, '7', '2020-05-20', '7-18', 'F2-27', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '79.00', '0.00', '50.00', '0.00', 'No', '29', '50.00', '', '', '', '', '', 0, 214, 129.8, 79, ''),
(40, 9, '7', '2020-05-20', '7-18', 'F2-27', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '79.00', '0.00', '50.00', '0.00', 'No', '29', '50.00', '', '', '', '', '', 0, 214, 129.8, 79, ''),
(41, 9, '7', '2020-05-20', '7-20', 'F2-26', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '129.80', '0.00', '0.00', '0.00', 'No', '100', '29.80', '', '', '', '', '', 0, 213, 129.8, 129.8, ''),
(42, 9, '7', '2020-05-20', '7-21', 'F2-28', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'No', '50', '50.00', '', '', '', '', '', 0, 215, 129.8, 100, ''),
(43, 9, '7', '2020-05-20', '7-22', 'F2-28', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'No', '50', '50.00', '', '', '', '', '', 0, 215, 129.8, 100, ''),
(44, 9, '7', '2020-05-20', '7-22', 'F2-28', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'No', '50', '50.00', '', '', '', '', '', 0, 215, 129.8, 100, ''),
(45, 9, '7', '2020-05-20', '7-22', 'F2-28', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'No', '50', '50.00', '', '', '', '', '', 0, 215, 129.8, 100, ''),
(46, 9, '7', '2020-05-20', '7-22', 'F2-28', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'No', '50', '50.00', '', '', '', '', '', 0, 215, 129.8, 100, ''),
(47, 9, '7', '2020-05-20', '7-22', 'F2-28', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'No', '50', '50.00', '', '', '', '', '', 0, 215, 129.8, 100, ''),
(48, 9, '7', '2020-05-20', '7-22', 'F2-28', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '100.00', '0.00', '29.00', '0.00', 'No', '50', '50.00', '', '', '', '', '', 0, 215, 129.8, 100, ''),
(49, 9, '7', '2020-05-23', '7-28', 'F2-29', '4', '7339015392', 'RAM NAGAR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '9.00', '', 0, '', '120.80', '0.00', '0.00', '0.00', 'No', '120', '0.80', '', '', '24', '', '', 0, 216, 129.8, 120.8, ''),
(50, 9, '7', '2020-05-23', '7-29', 'F2-30', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '129.80', '0.00', '0.00', '0.00', 'No', '123', '6.80', '', '', '24', '', '', 0, 217, 129.8, 129.8, ''),
(51, 9, '7', '2020-05-26', '7-30', 'F2-31', '3', '7010546939', 'PODANOORR', 'TN07AS1526', '', '', 220, '0.00', '39.60', '18.00', '0.0', '0.0', '0.00', '', 0, '', '259.60', '0.00', '0.00', '0.00', 'No', '259', '0.60', '', '', '24', '', '', 0, 218, 259.6, 259.6, ''),
(52, 9, '7', '2020-05-28', '7-31', 'F2-32', '8', '7708745120', 'DFG', 'TN09AS1234', '', '', 110, '0.00', '19.80', '18.00', '0.0', '0.0', '0.00', '', 0, '', '129.80', '0.00', '0.00', '0.00', 'No', '129', '0.80', '', '', '24', '', '', 0, 219, 129.8, 129.8, ''),
(53, 9, '7', '2020-05-30', '7-32', 'F2-34', '3', '9876443214', 'PODANOORR', 'TN07AS1526', '', '', 110, '0.00', '0.00', '0.00', '0.0', '0.0', '0.00', '', 0, '', '110.00', '0.00', '0.00', '0.00', 'No', '110', '0.00', '', '', '24', '', '', 0, 221, 110, 110, '');

-- --------------------------------------------------------

--
-- Table structure for table `a_final_bill_details`
--

CREATE TABLE `a_final_bill_details` (
  `id` int(11) NOT NULL,
  `bill_date` varchar(250) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `job_card_no` varchar(250) NOT NULL,
  `service` varchar(250) NOT NULL,
  `c_remarks` varchar(250) NOT NULL,
  `r_remarks` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `amount` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `a_final_bill_spare_details`
--

CREATE TABLE `a_final_bill_spare_details` (
  `id` int(11) NOT NULL,
  `bill_date` varchar(250) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `job_card_no` varchar(250) NOT NULL,
  `scategory` varchar(300) NOT NULL,
  `sbrand` varchar(300) NOT NULL,
  `sname` varchar(300) NOT NULL,
  `sqty` varchar(300) NOT NULL,
  `smrp` varchar(300) NOT NULL,
  `stotal` varchar(300) NOT NULL,
  `SpareFrom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_final_bill_spare_details`
--

INSERT INTO `a_final_bill_spare_details` (`id`, `bill_date`, `inv_no`, `job_card_no`, `scategory`, `sbrand`, `sname`, `sqty`, `smrp`, `stotal`, `SpareFrom`) VALUES
(1, '2020-04-25', '-1', '-18', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(2, '2020-04-25', '-1', '-18', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(3, '2020-04-25', '-1', '-18', '', '', '4', '10.00', '12.00', '', 'Service'),
(4, '2020-05-11', '7-1', 'F2-19', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(5, '2020-05-11', '7-1', 'F2-19', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(6, '2020-05-11', '7-1', 'F2-19', '', '', '4', '10.00', '12.00', '', 'Service'),
(7, '2020-05-11', '7-2', 'F2-19', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(8, '2020-05-11', '7-2', 'F2-19', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(9, '2020-05-11', '7-2', 'F2-19', '', '', '4', '10.00', '12.00', '', 'Service'),
(10, '2020-05-11', '7-3', 'F2-20', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(11, '2020-05-11', '7-3', 'F2-20', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(12, '2020-05-11', '7-3', 'F2-20', '', '', '4', '10.00', '12.00', '', 'Service'),
(13, '2020-05-11', '7-4', 'F2-20', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(14, '2020-05-11', '7-4', 'F2-20', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(15, '2020-05-11', '7-4', 'F2-20', '', '', '4', '10.00', '12.00', '', 'Service'),
(16, '2020-05-11', '7-7', 'F2-20', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(17, '2020-05-11', '7-7', 'F2-20', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(18, '2020-05-11', '7-7', 'F2-20', '', '', '4', '10.00', '12.00', '', 'Service'),
(19, '2020-05-11', '7-11', 'F2-23', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(20, '2020-05-11', '7-11', 'F2-23', '', '', '4', '10.00', '12.00', '', 'Service'),
(21, '2020-05-11', '7-12', 'F2-23', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(22, '2020-05-11', '7-12', 'F2-23', '', '', '4', '10.00', '12.00', '', 'Service'),
(23, '2020-05-12', '7-15', 'F2-25', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(24, '2020-05-12', '7-15', 'F2-25', '', '', '4', '10.00', '12.00', '', 'Service'),
(25, '2020-05-20', '7-16', 'F2-24', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(26, '2020-05-20', '7-16', 'F2-24', '', '', '4', '10.00', '12.00', '', 'Service'),
(27, '2020-05-20', '7-17', 'F2-22', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(28, '2020-05-20', '7-17', 'F2-22', '', '', '4', '10.00', '12.00', '', 'Service'),
(29, '2020-05-20', '7-18', 'F2-27', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(30, '2020-05-20', '7-18', 'F2-27', '', '', '4', '10.00', '12.00', '', 'Service'),
(31, '2020-05-20', '7-20', 'F2-26', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(32, '2020-05-20', '7-20', 'F2-26', '', '', '4', '10.00', '12.00', '', 'Service'),
(33, '2020-05-20', '7-21', 'F2-28', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(34, '2020-05-20', '7-21', 'F2-28', '', '', '4', '10.00', '12.00', '', 'Service'),
(35, '2020-05-20', '7-22', 'F2-28', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(36, '2020-05-20', '7-22', 'F2-28', '', '', '4', '10.00', '12.00', '', 'Service'),
(37, '2020-05-23', '7-28', 'F2-29', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(38, '2020-05-23', '7-28', 'F2-29', '', '', '7', '50.00', '1200.00', '', 'RecommendedService'),
(39, '2020-05-23', '7-28', 'F2-29', '', '', '4', '10.00', '12.00', '', 'Service'),
(40, '2020-05-23', '7-28', 'F2-29', '', '', '7', '50.00', '1200.00', '', 'Service'),
(41, '2020-05-23', '7-29', 'F2-30', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(42, '2020-05-23', '7-29', 'F2-30', '', '', '7', '50.00', '1200.00', '', 'RecommendedService'),
(43, '2020-05-23', '7-29', 'F2-30', '', '', '4', '10.00', '12.00', '', 'Service'),
(44, '2020-05-23', '7-29', 'F2-30', '', '', '7', '50.00', '1200.00', '', 'Service'),
(45, '2020-05-26', '7-30', 'F2-31', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(46, '2020-05-26', '7-30', 'F2-31', '', '', '7', '50.00', '1200.00', '', 'RecommendedService'),
(47, '2020-05-26', '7-30', 'F2-31', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(48, '2020-05-26', '7-30', 'F2-31', '', '', '7', '50.00', '1200.00', '', 'RecommendedService'),
(49, '2020-05-26', '7-30', 'F2-31', '', '', '4', '10.00', '12.00', '', 'Service'),
(50, '2020-05-26', '7-30', 'F2-31', '', '', '7', '50.00', '1200.00', '', 'Service'),
(51, '2020-05-26', '7-30', 'F2-31', '', '', '4', '10.00', '12.00', '', 'Service'),
(52, '2020-05-26', '7-30', 'F2-31', '', '', '7', '50.00', '1200.00', '', 'Service'),
(53, '2020-05-28', '7-31', 'F2-32', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(54, '2020-05-28', '7-31', 'F2-32', '', '', '7', '50.00', '1200.00', '', 'RecommendedService'),
(55, '2020-05-28', '7-31', 'F2-32', '', '', '4', '10.00', '12.00', '', 'Service'),
(56, '2020-05-28', '7-31', 'F2-32', '', '', '7', '50.00', '1200.00', '', 'Service'),
(57, '2020-05-30', '7-32', 'F2-34', '', '', '4', '10.00', '12.00', '', 'RecommendedService'),
(58, '2020-05-30', '7-32', 'F2-34', '', '', '7', '50.00', '1200.00', '', 'RecommendedService'),
(59, '2020-05-30', '7-32', 'F2-34', '', '', '4', '10.00', '12.00', '', 'Service'),
(60, '2020-05-30', '7-32', 'F2-34', '', '', '7', '50.00', '1200.00', '', 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `a_final_bill_spare_temp`
--

CREATE TABLE `a_final_bill_spare_temp` (
  `id` int(11) NOT NULL,
  `bill_date` varchar(250) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `job_card_no` varchar(250) NOT NULL,
  `sname` varchar(300) NOT NULL,
  `qty` varchar(300) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `SpareFrom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `a_hand_over_cash`
--

CREATE TABLE `a_hand_over_cash` (
  `id` int(11) NOT NULL,
  `CDate` date NOT NULL,
  `camount` decimal(9,2) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CBranch` int(50) NOT NULL,
  `franchisee_id` varchar(12) NOT NULL,
  `vendor_id` varchar(12) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_hand_over_cash`
--

INSERT INTO `a_hand_over_cash` (`id`, `CDate`, `camount`, `Description`, `CBranch`, `franchisee_id`, `vendor_id`, `status`) VALUES
(1, '2020-05-12', '100.00', 'Test', 7, '9', '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `a_petty_cash`
--

CREATE TABLE `a_petty_cash` (
  `id` int(11) NOT NULL,
  `Inv_no` varchar(100) NOT NULL,
  `PDate` date NOT NULL,
  `PaymentMode` varchar(100) NOT NULL,
  `LedgerGroup` varchar(50) NOT NULL,
  `PettyType` varchar(50) NOT NULL,
  `PettyAmount` decimal(9,2) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `franchisee_id` int(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_petty_cash`
--

INSERT INTO `a_petty_cash` (`id`, `Inv_no`, `PDate`, `PaymentMode`, `LedgerGroup`, `PettyType`, `PettyAmount`, `Description`, `franchisee_id`, `vendor_id`, `status`) VALUES
(3, '1', '2020-05-18', 'Cash', '36', '9', '1000.00', 'Tea', 9, '7', 'Active'),
(4, '2', '2020-05-18', 'Cash', '36', '67', '100.00', '', 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `a_petty_type`
--

CREATE TABLE `a_petty_type` (
  `id` int(11) NOT NULL,
  `PettyType` varchar(100) NOT NULL,
  `LedgerType` varchar(100) NOT NULL,
  `franchisee_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_petty_type`
--

INSERT INTO `a_petty_type` (`id`, `PettyType`, `LedgerType`, `franchisee_id`, `vendor_id`, `status`) VALUES
(7, 'Bank Account', '1', '9', '', 'Active'),
(8, 'Tea', '9', '9', '', 'Active'),
(9, 'Office Rent', '32', '9', '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `a_rec_voucher`
--

CREATE TABLE `a_rec_voucher` (
  `id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `v_date` varchar(250) NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `out_amt` int(11) NOT NULL,
  `out_inv` varchar(250) NOT NULL,
  `amt` int(11) NOT NULL,
  `trans_type` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contra_entry`
--

CREATE TABLE `contra_entry` (
  `id` int(12) NOT NULL,
  `contra_entry_no` varchar(12) NOT NULL,
  `cdate` date NOT NULL,
  `c_from` varchar(50) NOT NULL,
  `c_to` varchar(50) NOT NULL,
  `c_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contra_main`
--

CREATE TABLE `contra_main` (
  `ContraMainID` int(11) NOT NULL,
  `ContraNo` varchar(10) NOT NULL,
  `ContraDate` date NOT NULL,
  `ContraFrom` int(11) NOT NULL,
  `ContraTo` int(11) NOT NULL,
  `TransactionAmount` decimal(9,2) NOT NULL,
  `franchisee_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contra_main`
--

INSERT INTO `contra_main` (`ContraMainID`, `ContraNo`, `ContraDate`, `ContraFrom`, `ContraTo`, `TransactionAmount`, `franchisee_id`, `vendor_id`, `Status`) VALUES
(2, 'C1', '2020-05-18', 17, 1, '100.00', '', '', 'Active'),
(3, 'C2', '2020-05-18', 1, 17, '200.00', '', '', 'Active'),
(4, 'C3', '2020-05-18', 17, 1, '10.00', '9', '7', 'Active'),
(5, 'C4', '2020-05-18', 1, 17, '10.00', '9', '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contra_sub`
--

CREATE TABLE `contra_sub` (
  `ContraSubId` int(11) NOT NULL,
  `ContraMainID` int(11) NOT NULL,
  `ContraDate` date NOT NULL,
  `AcName` int(11) NOT NULL,
  `AvailableAmount` decimal(9,2) NOT NULL,
  `Debit` decimal(9,2) NOT NULL,
  `Credit` decimal(9,2) NOT NULL,
  `CurrentBalance` decimal(9,2) NOT NULL,
  `RelatedAccount` int(11) NOT NULL,
  `franchisee_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contra_sub`
--

INSERT INTO `contra_sub` (`ContraSubId`, `ContraMainID`, `ContraDate`, `AcName`, `AvailableAmount`, `Debit`, `Credit`, `CurrentBalance`, `RelatedAccount`, `franchisee_id`, `vendor_id`, `Status`) VALUES
(3, 2, '2020-05-18', 17, '0.00', '100.00', '0.00', '-100.00', 1, '', '', 'Active'),
(4, 2, '2020-05-18', 1, '0.00', '0.00', '100.00', '100.00', 17, '', '', 'Active'),
(5, 3, '2020-05-18', 17, '0.00', '0.00', '200.00', '200.00', 1, '', '', 'Active'),
(6, 3, '2020-05-18', 1, '0.00', '200.00', '0.00', '-200.00', 17, '', '', 'Active'),
(7, 4, '2020-05-18', 17, '0.00', '10.00', '0.00', '-10.00', 1, '9', '7', 'Active'),
(8, 4, '2020-05-18', 1, '0.00', '0.00', '10.00', '10.00', 17, '9', '7', 'Active'),
(9, 5, '2020-05-18', 17, '0.00', '0.00', '10.00', '10.00', 1, '9', '7', 'Active'),
(10, 5, '2020-05-18', 1, '0.00', '10.00', '0.00', '-10.00', 17, '9', '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `Id` int(11) NOT NULL,
  `CouponCode` varchar(25) NOT NULL,
  `CouponDiscount` int(11) NOT NULL,
  `CouponType` varchar(25) NOT NULL,
  `CouponMember` varchar(25) NOT NULL,
  `CouponDescription` text NOT NULL,
  `GeneratedDate` date NOT NULL,
  `ExpiryDate` date NOT NULL,
  `UsedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_callpurpose`
--

CREATE TABLE `crm_callpurpose` (
  `Id` int(11) NOT NULL,
  `CallPurpose` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_enquiry`
--

CREATE TABLE `crm_enquiry` (
  `Id` int(11) NOT NULL,
  `CustomerFirstName` varchar(25) NOT NULL,
  `CustomerLastName` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Address` varchar(250) NOT NULL,
  `LeadSource` varchar(250) NOT NULL,
  `CustomerMobile1` varchar(15) NOT NULL,
  `CustomerMobile2` varchar(15) NOT NULL,
  `CustomerEmailID` varchar(50) NOT NULL,
  `ServiceId` int(20) NOT NULL,
  `FranchiseeId` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_enquiry_status`
--

CREATE TABLE `crm_enquiry_status` (
  `Id` int(11) NOT NULL,
  `EnquiryStatus` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_enquiry_vehicle_details`
--

CREATE TABLE `crm_enquiry_vehicle_details` (
  `id` int(11) NOT NULL,
  `crm_enquiry_no` int(12) NOT NULL,
  `cust_name` varchar(250) NOT NULL,
  `VehicleModel` varchar(100) NOT NULL,
  `VehicleBrand` varchar(100) NOT NULL,
  `VehicleSegment` varchar(100) NOT NULL,
  `VehicleType` varchar(100) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `vehicle_no` varchar(250) NOT NULL,
  `InsuranceCompnayName` varchar(150) NOT NULL,
  `InsuranceNumber` varchar(150) NOT NULL,
  `InsuranceNumberExpiryDate` date NOT NULL,
  `FrachiseeId` varchar(10) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `UserId` varchar(10) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_folllowup`
--

CREATE TABLE `crm_folllowup` (
  `Id` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `CallPurpose` varchar(50) NOT NULL,
  `RelatedTo` varchar(50) NOT NULL,
  `EnquiryDate` date NOT NULL,
  `NextFollowDate` date NOT NULL,
  `Remarks` text NOT NULL,
  `CallByUser` int(11) NOT NULL,
  `EnquiryStatus` int(11) NOT NULL,
  `RefNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_folllowup_main`
--

CREATE TABLE `crm_folllowup_main` (
  `Id` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `CallPurpose` varchar(50) NOT NULL,
  `RelatedTo` varchar(50) NOT NULL,
  `EnquiryDate` date NOT NULL,
  `NextFollowDate` date NOT NULL,
  `Remarks` text NOT NULL,
  `CallByUser` int(11) NOT NULL,
  `EnquiryStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_relatedto`
--

CREATE TABLE `crm_relatedto` (
  `Id` int(12) NOT NULL,
  `RelatedTo` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_old_data`
--

CREATE TABLE `customer_old_data` (
  `Id` int(11) NOT NULL,
  `ServiceDate` date NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `VehicleModel` varchar(50) NOT NULL,
  `CustomerMobile` varchar(11) NOT NULL,
  `ServiceName` varchar(100) NOT NULL,
  `VehicleNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_old_data1`
--

CREATE TABLE `customer_old_data1` (
  `Id` int(11) NOT NULL,
  `ServiceDate` varchar(20) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `VehicleModel` varchar(50) NOT NULL,
  `CustomerMobile` varchar(11) NOT NULL,
  `ServiceName` varchar(100) NOT NULL,
  `VehicleNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust_outstanding`
--

CREATE TABLE `cust_outstanding` (
  `id` int(11) NOT NULL,
  `Voucher_Id` int(20) NOT NULL,
  `cust_name` varchar(300) NOT NULL,
  `invoice` varchar(300) NOT NULL,
  `invoice_amt` varchar(300) NOT NULL,
  `p_date` varchar(300) NOT NULL,
  `paid_amt` varchar(300) NOT NULL,
  `paid_date` varchar(300) NOT NULL,
  `balance_amt` varchar(300) NOT NULL,
  `total_outstanding` varchar(300) NOT NULL,
  `ad_amount` varchar(11) NOT NULL,
  `tran_amount` varchar(11) NOT NULL,
  `payment_mode` text NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_outstanding`
--

INSERT INTO `cust_outstanding` (`id`, `Voucher_Id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`, `franchisee_id`, `vendor_id`) VALUES
(1, 1, '3', '1', '500', '20-05-2020', '200', '20-05-2020', '300', '150', '200', '200', 'Cash', 9, '7'),
(2, 2, '3', '7-17', '', '', '0', '', '-1', '-1', '', '0', '', 9, '7'),
(3, 0, '', '7-18', '', '', '0', '', '79.00', '49', '50.00', '0', '', 9, '7'),
(5, 23, '', '7-20', '129.80', '', '0.00', '', '129.80', '78.8', '0.00', '0', '', 9, '7'),
(6, 0, '', '7-21', '129.80', '', '29.00', '', '100.00', '99', '29.00', '0', '', 9, '7'),
(7, 23, '4', '7-22', '129.80', '2020-05-20', '29.00', '', '100.00', '99', '29.00', '0', '', 9, '7'),
(13, 23, '4', '7-28', '129.80', '2020-05-23', '0.00', '', '120.80', '99.8', '0.00', '0', '', 9, '7'),
(14, 23, '3', '7-29', '129.80', '2020-05-23', '0.00', '', '129.80', '156.8', '0.00', '0', '', 9, '7'),
(15, 23, '', '7-30', '259.60', '2020-05-26', '0.00', '', '259.60', '49.6', '0.00', '0', '', 9, '7'),
(16, 23, '8', '7-31', '129.80', '2020-05-28', '0.00', '', '129.80', '0.8', '0.00', '0', '', 9, '7'),
(17, 0, 'SUBHA', '0', '0', '2020-05-28', '0', '2020-05-28', '0', '0', '0', '0', 'cash', 0, ''),
(18, 0, 'SUBHA', '0', '0', '2020-05-28', '0', '2020-05-28', '0', '0', '0', '0', 'cash', 0, ''),
(19, 23, '3', '7-32', '110.00', '2020-05-30', '0.00', '', '110.00', '150', '0.00', '0', '', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `expense_details`
--

CREATE TABLE `expense_details` (
  `Id` int(11) NOT NULL,
  `ExpenseDate` date NOT NULL,
  `LedgerGroup` int(11) NOT NULL,
  `ExpenseType` int(11) NOT NULL,
  `AccountNo` int(11) NOT NULL,
  `ExpenseAmount` decimal(9,2) NOT NULL,
  `TaxAmount` decimal(9,2) NOT NULL,
  `ExpenseDescription` text NOT NULL,
  `Status` varchar(10) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_details`
--

INSERT INTO `expense_details` (`Id`, `ExpenseDate`, `LedgerGroup`, `ExpenseType`, `AccountNo`, `ExpenseAmount`, `TaxAmount`, `ExpenseDescription`, `Status`, `franchisee_id`, `vendor_id`) VALUES
(1, '2020-05-12', 11, 0, 0, '100.00', '10.00', '', 'Deactive', 9, '7'),
(2, '2020-05-12', 11, 0, 0, '100.00', '10.00', '', 'Deactive', 9, '7'),
(3, '2020-05-13', 35, 0, 0, '5000.00', '2000.00', 'test', 'Active', 9, '7'),
(4, '2020-05-13', 9, 0, 0, '110.00', '10.00', '', 'Active', 9, '7'),
(5, '2020-05-13', 32, 0, 0, '5000.00', '1000.00', 'Test', 'Active', 9, '7'),
(6, '2020-05-13', 32, 0, 0, '10.00', '10.00', '', 'Active', 9, '7'),
(7, '2020-05-13', 40, 11, 0, '500.00', '100.00', '', 'Active', 9, '7'),
(8, '2020-05-13', 40, 11, 0, '1500.00', '100.00', '', 'Active', 9, '7'),
(11, '2020-05-18', 58, 0, 0, '10000.00', '2000.00', 'Salary', 'Active', 9, '7'),
(12, '2020-05-19', 32, 10, 0, '5000.00', '100.00', '', 'Active', 9, '7'),
(13, '2020-05-19', 40, 11, 0, '500.00', '12.00', '', 'Active', 9, '7'),
(14, '2020-05-19', 40, 0, 0, '12.00', '0.00', '', 'Active', 9, '7'),
(15, '2020-05-19', 51, 0, 0, '122.00', '11.00', '', 'Active', 9, '7'),
(16, '2020-05-19', 32, 0, 0, '122.00', '1.00', '', 'Active', 9, '7'),
(17, '2020-05-19', 9, 0, 0, '12.00', '12.00', '', 'Active', 9, '7'),
(18, '2020-05-19', 51, 0, 0, '12.00', '12.00', '', 'Active', 9, '7'),
(19, '2020-05-19', 9, 0, 0, '10.00', '0.00', '', 'Active', 9, '7'),
(20, '2020-05-19', 9, 0, 0, '10.00', '0.00', '', 'Active', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `expense_master`
--

CREATE TABLE `expense_master` (
  `Id` int(11) NOT NULL,
  `LedgerType` varchar(50) NOT NULL,
  `ExpenseType` varchar(80) NOT NULL,
  `ecategory` varchar(100) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_master`
--

INSERT INTO `expense_master` (`Id`, `LedgerType`, `ExpenseType`, `ecategory`, `Status`, `LedgerId`, `franchisee_id`, `vendor_id`) VALUES
(7, '2', 'tea', 'test', 'Active', 23, 0, ''),
(8, '11', 'Snacks', 'Snacks', 'Active', 28, 9, '7'),
(9, '35', 'Office Rent', 'Office Rent', 'Active', 29, 9, '7'),
(10, '32', 'Office Rent', 'Office Rent', 'Active', 101, 9, '7'),
(11, '40', 'Accounts Payable', 'Accounts Payable', 'Active', 102, 9, '7'),
(12, '58', 'Salary provision', 'Salary provision', 'Active', 108, 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `fb_outstanding`
--

CREATE TABLE `fb_outstanding` (
  `id` int(11) NOT NULL,
  `bno` varchar(20) NOT NULL,
  `bdate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `pamount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rno` varchar(25) NOT NULL,
  `cname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fb_outstanding_history`
--

CREATE TABLE `fb_outstanding_history` (
  `id` int(11) NOT NULL,
  `vdate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `pno` varchar(25) NOT NULL,
  `rno` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finalbillpackage`
--

CREATE TABLE `finalbillpackage` (
  `id` int(11) NOT NULL,
  `BillNo` varchar(100) NOT NULL,
  `JobCardNo` varchar(100) NOT NULL,
  `PDate` date NOT NULL,
  `PackageName` varchar(200) NOT NULL,
  `ServiceName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE `financial_year` (
  `id` int(11) NOT NULL,
  `fyear` varchar(100) NOT NULL,
  `sdescription` varchar(100) NOT NULL,
  `userid` int(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_year`
--

INSERT INTO `financial_year` (`id`, `fyear`, `sdescription`, `userid`, `status`) VALUES
(1, '2019-2020', '', 5, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `f_financial_year`
--

CREATE TABLE `f_financial_year` (
  `id` int(11) NOT NULL,
  `year_id` varchar(250) NOT NULL,
  `financial_year` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sdescription` varchar(200) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_financial_year`
--

INSERT INTO `f_financial_year` (`id`, `year_id`, `financial_year`, `start_date`, `end_date`, `sdescription`, `status`) VALUES
(1, '', '2019-2020', '2019-04-01', '2020-03-31', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `f_user_create`
--

CREATE TABLE `f_user_create` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `financial_year` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_user_create`
--

INSERT INTO `f_user_create` (`id`, `user_id`, `financial_year`, `user_name`, `company_name`, `branch_name`, `password`, `user_role`) VALUES
(12, 'US6', '2019-2020', 'admin', '7', '9', 'admin', 'Admin'),
(14, 'US3', '2019-2020', 'manager', '6', '', 'manager', 'manager'),
(18, 'US3', '2019-2020', 'divakaran', '6', '8', 'divakaran123', 'user'),
(19, 'US4', '2019-2020', 'nazeer', '7', '9', 'nazeer123', 'Employee'),
(20, 'US5', '2019-2020', 'suhail', '7', '9', 'vertex123', 'Vendor'),
(23, 'US6', '2019-2020', 'Subha', '6', '8', '123', 'Admin'),
(24, 'US7', '2019-2020', 'Ram', '6', '8', '123', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `h_department`
--

CREATE TABLE `h_department` (
  `id` int(11) NOT NULL,
  `dname` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_department`
--

INSERT INTO `h_department` (`id`, `dname`, `status`, `description`, `franchisee_id`, `vendor_id`) VALUES
(2, 'HR', 'Active', 'HR', 0, ''),
(3, 'DEV', 'Active', 'DEV', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `h_designation`
--

CREATE TABLE `h_designation` (
  `id` int(11) NOT NULL,
  `dname` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_designation`
--

INSERT INTO `h_designation` (`id`, `dname`, `status`, `description`, `franchisee_id`, `vendor_id`) VALUES
(2, 'DEV', 'Active', 'DEV', 0, ''),
(3, 'DEV', 'Active', 'DEV', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `h_employee`
--

CREATE TABLE `h_employee` (
  `id` int(11) NOT NULL,
  `Franchiseeid` varchar(250) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `ename` varchar(250) NOT NULL,
  `emobile` varchar(250) NOT NULL,
  `smobile` varchar(250) NOT NULL,
  `eaddr` varchar(250) NOT NULL,
  `ecity` varchar(250) NOT NULL,
  `estate` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `joindate` date NOT NULL,
  `edesign` varchar(250) NOT NULL,
  `edepart` varchar(250) NOT NULL,
  `salary` int(11) NOT NULL,
  `blood_group` varchar(250) NOT NULL,
  `FrachiseeId` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ecode` varchar(15) NOT NULL,
  `TAccountNo` int(11) NOT NULL,
  `LedgerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_employee`
--

INSERT INTO `h_employee` (`id`, `Franchiseeid`, `vendor_id`, `ename`, `emobile`, `smobile`, `eaddr`, `ecity`, `estate`, `email`, `joindate`, `edesign`, `edepart`, `salary`, `blood_group`, `FrachiseeId`, `remarks`, `status`, `ecode`, `TAccountNo`, `LedgerId`) VALUES
(1, '6', '7', 'NIYAS', '8825915441', '', 'Kuniyamuthur', 'CBE', 'TAMILNADU', 'niyas@gmail.com', '2020-05-12', '2', '2', 10000, 'o+', '9', '+', 'Active', 'EC1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `h_employee_attendance_entry`
--

CREATE TABLE `h_employee_attendance_entry` (
  `Id` int(11) NOT NULL,
  `EmployeeId` int(11) NOT NULL,
  `AttendanceDate` date NOT NULL,
  `Attendance` float NOT NULL,
  `Shift` decimal(9,2) NOT NULL,
  `Total_Hours` decimal(9,2) NOT NULL,
  `Late_Hours` decimal(9,2) NOT NULL,
  `Working_Hours` decimal(9,2) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `h_employee_proof`
--

CREATE TABLE `h_employee_proof` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `ecode` varchar(300) NOT NULL,
  `EmployeePhoto` varchar(300) NOT NULL,
  `AatherCard` varchar(300) NOT NULL,
  `Pancard` varchar(300) NOT NULL,
  `DrivingLicence` varchar(300) NOT NULL,
  `VoterId` varchar(300) NOT NULL,
  `OtherDocuments` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_employee_proof`
--

INSERT INTO `h_employee_proof` (`id`, `emp_id`, `ecode`, `EmployeePhoto`, `AatherCard`, `Pancard`, `DrivingLicence`, `VoterId`, `OtherDocuments`) VALUES
(1, 1, 'EC1', 'employeefiles/1/1499337090.', 'employeefiles/1/869125391.', 'employeefiles/1/1479641983.', 'employeefiles/1/1293988186.', 'employeefiles/1/1183363100.', 'employeefiles/1/2103107600.');

-- --------------------------------------------------------

--
-- Table structure for table `h_offer_letter`
--

CREATE TABLE `h_offer_letter` (
  `id` int(20) NOT NULL,
  `ecode` varchar(50) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `emobile` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `state` varchar(30) NOT NULL,
  `joindate` date NOT NULL,
  `edesignation` varchar(100) NOT NULL,
  `edepart` varchar(100) NOT NULL,
  `perannulsalary` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `FranchiseeId` int(10) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `h_payroll_calculation`
--

CREATE TABLE `h_payroll_calculation` (
  `id` int(11) NOT NULL,
  `month_pay` varchar(250) NOT NULL,
  `e_code` varchar(200) NOT NULL,
  `eid` int(11) NOT NULL,
  `e_name` varchar(250) NOT NULL,
  `dep` varchar(250) NOT NULL,
  `basic_salary` varchar(25) NOT NULL,
  `PerDaysalary` decimal(9,2) NOT NULL,
  `PerHoursalary` decimal(9,2) NOT NULL,
  `total_days` varchar(25) NOT NULL,
  `worked_days` varchar(25) NOT NULL,
  `Total_Hours` decimal(9,2) NOT NULL,
  `work_hour` decimal(9,2) NOT NULL,
  `NoOFHourLeft` decimal(9,2) NOT NULL,
  `phd` int(10) NOT NULL,
  `MonthlyIncentive` decimal(9,2) NOT NULL,
  `deduction` decimal(9,2) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `h_relieving`
--

CREATE TABLE `h_relieving` (
  `id` int(11) NOT NULL,
  `ecode` varchar(100) NOT NULL,
  `ename` varchar(250) NOT NULL,
  `designa` int(11) NOT NULL,
  `depart` int(11) NOT NULL,
  `joindate` date NOT NULL,
  `relive_date` date NOT NULL,
  `experience` varchar(250) NOT NULL,
  `FranchiseeId` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `Id` int(11) NOT NULL,
  `FranchiseeId` varchar(5) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `ItemId` varchar(5) NOT NULL,
  `Uom` varchar(60) NOT NULL,
  `StockQuantity` decimal(9,2) NOT NULL,
  `hsn_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`Id`, `FranchiseeId`, `vendor_id`, `ItemId`, `Uom`, `StockQuantity`, `hsn_code`) VALUES
(1, '6', '', '5', '1', '20.00', ''),
(2, '9', '7', '5', '1', '8.00', ''),
(3, '9', '7', '4', '1', '-284.00', ''),
(4, '9', '7', '6', '1', '-1.00', ''),
(5, '9', '7', '8', '1', '26.00', ''),
(6, '9', '7', '10', '1', '158.00', '54641');

-- --------------------------------------------------------

--
-- Table structure for table `job_card_no`
--

CREATE TABLE `job_card_no` (
  `id` int(11) NOT NULL,
  `qn` int(11) NOT NULL,
  `jcn` int(11) NOT NULL,
  `inv_no` int(11) NOT NULL,
  `purchase_order` varchar(50) NOT NULL,
  `rv` int(50) NOT NULL,
  `vendor_id` int(30) NOT NULL,
  `branch_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_card_no`
--

INSERT INTO `job_card_no` (`id`, `qn`, `jcn`, `inv_no`, `purchase_order`, `rv`, `vendor_id`, `branch_id`) VALUES
(1, 24, 38, 25, '20', 23, 8, 9),
(2, 1, 1, 1, '1', 1, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `journal_entry`
--

CREATE TABLE `journal_entry` (
  `id` int(15) NOT NULL,
  `journal_entry_no` int(12) NOT NULL,
  `date` date NOT NULL,
  `journal_by` varchar(50) NOT NULL,
  `journal_to` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `franchisee_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_entry`
--

INSERT INTO `journal_entry` (`id`, `journal_entry_no`, `date`, `journal_by`, `journal_to`, `amount`, `franchisee_id`, `vendor_id`, `Status`) VALUES
(1, 1, '2020-05-18', '1', '5', 100, '9', '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `master_vehicle`
--

CREATE TABLE `master_vehicle` (
  `Id` int(11) NOT NULL,
  `VehicleType` int(11) NOT NULL,
  `VehicleSegment` int(11) NOT NULL,
  `VehicleBrand` int(11) NOT NULL,
  `VehicleModel` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_vehicle`
--

INSERT INTO `master_vehicle` (`Id`, `VehicleType`, `VehicleSegment`, `VehicleBrand`, `VehicleModel`, `Status`) VALUES
(4, 2, 3, 1, 'A3', 'Active'),
(5, 2, 3, 1, 'A4', 'Active'),
(6, 2, 3, 1, 'A5', 'Active'),
(7, 2, 3, 1, 'A6', 'Active'),
(8, 2, 3, 1, 'A7', 'Active'),
(9, 2, 3, 1, 'A8', 'Active'),
(10, 2, 3, 1, 'R8', 'Active'),
(11, 2, 3, 1, 'RS6', 'Active'),
(12, 2, 3, 1, 'RS7', 'Active'),
(13, 2, 3, 1, 'Q3', 'Active'),
(14, 2, 3, 1, 'Q5', 'Active'),
(15, 2, 3, 1, 'Q7', 'Active'),
(16, 2, 3, 1, 'TT', 'Active'),
(17, 2, 3, 1, 'RS5', 'Active'),
(18, 2, 3, 1, 'S8', 'Active'),
(19, 2, 3, 2, 'X1', 'Active'),
(20, 2, 3, 2, 'X3', 'Active'),
(21, 2, 3, 2, 'X5', 'Active'),
(22, 2, 3, 2, 'X6', 'Active'),
(23, 2, 3, 2, '3 SERIES', 'Active'),
(24, 2, 3, 2, '5 SERIES', 'Active'),
(25, 2, 3, 2, '6 SERIES', 'Active'),
(26, 2, 3, 2, '7 SERIES', 'Active'),
(27, 2, 3, 2, 'M3 ', 'Active'),
(28, 2, 3, 2, 'M4', 'Active'),
(29, 2, 3, 2, 'M5', 'Active'),
(30, 2, 3, 2, 'Z4', 'Active'),
(31, 2, 3, 2, 'i8', 'Active'),
(32, 2, 3, 2, 'Z3', 'Active'),
(33, 2, 3, 2, '1 SERIES', 'Active'),
(34, 2, 4, 3, 'Spark ', 'Active'),
(35, 2, 4, 3, 'Beat ', 'Active'),
(36, 2, 1, 3, 'Sail ', 'Active'),
(37, 2, 2, 3, 'Enjoy', 'Active'),
(38, 2, 1, 3, 'Cruze', 'Active'),
(39, 2, 2, 3, 'Captica', 'Active'),
(40, 2, 2, 3, 'Tavera', 'Active'),
(41, 2, 4, 3, 'Aveo ', 'Active'),
(42, 2, 1, 3, 'Magnum', 'Active'),
(43, 2, 1, 3, 'Aveo ', 'Active'),
(44, 2, 4, 4, '500', 'Active'),
(45, 2, 4, 4, 'Auventura', 'Active'),
(46, 2, 4, 4, 'Urban Cross', 'Active'),
(47, 2, 1, 4, 'Linea', 'Active'),
(48, 2, 4, 4, 'Abrth', 'Active'),
(49, 2, 4, 0, 'Punto ', 'Active'),
(50, 2, 4, 4, 'Palio ', 'Active'),
(51, 2, 3, 5, 'Endeavour', 'Active'),
(52, 2, 2, 5, 'Eco Sports', 'Active'),
(53, 2, 4, 5, 'Figo ', 'Active'),
(54, 2, 1, 5, 'Mustang', 'Active'),
(55, 2, 1, 5, 'Aspire', 'Active'),
(56, 2, 1, 5, 'Fiesta', 'Active'),
(57, 2, 1, 5, 'Classic', 'Active'),
(58, 2, 1, 5, 'Fusion', 'Active'),
(59, 2, 1, 5, 'Ikon', 'Active'),
(60, 2, 1, 6, 'City', 'Active'),
(61, 2, 4, 6, 'Brio ', 'Active'),
(62, 2, 1, 6, 'Amaze', 'Active'),
(63, 2, 1, 6, 'Jazz ', 'Active'),
(64, 2, 1, 6, 'WR V', 'Active'),
(65, 2, 2, 6, 'BR V', 'Active'),
(66, 2, 2, 6, 'CR V', 'Active'),
(67, 2, 2, 6, 'Accord', 'Active'),
(68, 2, 1, 6, 'Civic', 'Active'),
(69, 2, 2, 6, 'Mobilio', 'Active'),
(70, 2, 4, 7, 'Wagnor ', 'Active'),
(71, 2, 4, 7, 'Swift ', 'Active'),
(72, 2, 1, 7, 'Swift Dzire', 'Active'),
(73, 2, 4, 7, 'Alto', 'Active'),
(74, 2, 4, 7, 'Alto 800 ', 'Active'),
(75, 2, 4, 7, 'Celerio ', 'Active'),
(76, 2, 4, 7, 'Zen ', 'Active'),
(77, 2, 4, 7, '800', 'Active'),
(78, 2, 2, 7, 'Ertiga', 'Active'),
(79, 2, 2, 7, 'Eeco', 'Active'),
(80, 2, 1, 7, 'Omni', 'Active'),
(81, 2, 4, 7, 'Gypsy ', 'Active'),
(82, 2, 4, 7, 'Ignis ', 'Active'),
(83, 2, 1, 7, 'Baleno ', 'Active'),
(84, 2, 2, 7, 'Breeza', 'Active'),
(85, 2, 1, 7, 'Ciaz', 'Active'),
(86, 2, 2, 7, 'S Cross', 'Active'),
(87, 2, 4, 7, 'Ritz ', 'Active'),
(88, 2, 1, 7, 'Kizashi', 'Active'),
(89, 2, 4, 7, 'A star ', 'Active'),
(90, 2, 1, 7, 'SX4', 'Active'),
(91, 2, 2, 0, 'Scorpio', 'Active'),
(92, 2, 2, 0, 'Bolero', 'Active'),
(93, 2, 2, 8, 'XUV500', 'Active'),
(94, 2, 2, 0, 'TUV300', 'Active'),
(95, 2, 1, 0, 'KUV100 ', 'Active'),
(96, 2, 2, 8, 'XUV300 ', 'Active'),
(97, 2, 1, 8, 'Thar', 'Active'),
(98, 2, 2, 8, 'Xylo', 'Active'),
(99, 2, 4, 8, 'E2O ', 'Active'),
(100, 2, 4, 8, 'Nuvo', 'Active'),
(101, 2, 1, 8, 'Verito ', 'Active'),
(102, 2, 4, 8, 'Reva ', 'Active'),
(103, 2, 1, 8, 'Logon', 'Active'),
(104, 2, 4, 8, 'Verito Vibe ', 'Active'),
(105, 2, 3, 9, 'A Class', 'Active'),
(106, 2, 3, 9, 'B Class', 'Active'),
(107, 2, 3, 9, 'C Class', 'Active'),
(108, 2, 3, 9, 'E Class', 'Active'),
(109, 2, 3, 9, 'GLS', 'Active'),
(110, 2, 3, 9, 'CLA', 'Active'),
(111, 2, 3, 9, 'GLA', 'Active'),
(112, 2, 3, 9, 'G Class', 'Active'),
(113, 2, 3, 9, 'GLE Class', 'Active'),
(114, 2, 3, 9, 'GLC Class', 'Active'),
(115, 2, 3, 9, 'S Class', 'Active'),
(116, 2, 1, 10, 'GTR', 'Active'),
(117, 2, 2, 10, 'Terrano', 'Active'),
(118, 2, 4, 10, 'Micra ', 'Active'),
(119, 2, 1, 10, 'Sunny', 'Active'),
(120, 2, 2, 10, 'X Trail', 'Active'),
(121, 2, 1, 11, 'Rapid', 'Active'),
(122, 2, 1, 11, 'Octovia', 'Active'),
(123, 2, 2, 11, 'Superb', 'Active'),
(124, 2, 2, 11, 'Kodia', 'Active'),
(125, 2, 4, 11, 'Fabia ', 'Active'),
(126, 2, 1, 11, 'Laura', 'Active'),
(127, 2, 2, 11, 'Yeti', 'Active'),
(128, 2, 4, 12, 'Nano', 'Active'),
(129, 2, 1, 12, 'Indigo', 'Active'),
(130, 2, 4, 12, 'Indica', 'Active'),
(131, 2, 2, 12, 'Safari', 'Active'),
(132, 2, 4, 12, 'Bolt', 'Active'),
(133, 2, 1, 12, 'Zest ', 'Active'),
(134, 2, 1, 12, 'Tigor', 'Active'),
(135, 2, 3, 12, 'Hexa', 'Active'),
(136, 2, 2, 12, 'Nexon', 'Active'),
(137, 2, 4, 12, 'Taigo', 'Active'),
(138, 2, 1, 12, 'Sumo', 'Active'),
(139, 2, 2, 12, 'Aria', 'Active'),
(140, 2, 1, 12, 'Manza', 'Active'),
(141, 2, 2, 12, 'Venture', 'Active'),
(142, 2, 2, 12, 'Winger ', 'Active'),
(143, 2, 2, 12, 'Xenon', 'Active'),
(144, 2, 3, 13, 'Ghost', 'Active'),
(145, 2, 3, 13, 'Phantom', 'Active'),
(146, 2, 3, 13, 'Phantom Coupe', 'Active'),
(147, 2, 3, 13, 'Phantom Drop Head Coupe', 'Active'),
(148, 2, 4, 14, 'Polo', 'Active'),
(149, 2, 1, 14, 'Ameo ', 'Active'),
(150, 2, 1, 14, 'Vento', 'Active'),
(151, 2, 2, 14, 'Tiguon ', 'Active'),
(152, 2, 1, 14, 'Passat', 'Active'),
(153, 2, 1, 14, 'Jetta', 'Active'),
(154, 2, 3, 15, 'XC 90', 'Active'),
(155, 2, 3, 15, 'XC 40', 'Active'),
(156, 2, 3, 15, 'S 60', 'Active'),
(157, 2, 3, 15, 'S 90', 'Active'),
(158, 2, 3, 15, 'V 40', 'Active'),
(159, 2, 3, 15, 'XC 60', 'Active'),
(160, 2, 3, 15, 'S 60', 'Active'),
(161, 2, 3, 15, 'V 90', 'Active'),
(162, 2, 3, 15, 'V 60', 'Active'),
(163, 2, 3, 15, 'XC 30', 'Active'),
(164, 2, 1, 0, 'Altis', 'Active'),
(165, 2, 1, 16, 'Etios', 'Active'),
(166, 2, 4, 16, 'Etios Liva ', 'Active'),
(167, 2, 2, 16, 'Fortuner ', 'Active'),
(168, 2, 2, 16, 'Innova ', 'Active'),
(169, 2, 2, 16, 'Land Cruiser', 'Active'),
(170, 2, 2, 16, 'Camry', 'Active'),
(171, 2, 2, 16, 'Prado', 'Active'),
(172, 2, 2, 17, 'Creta', 'Active'),
(173, 2, 4, 0, 'i20', 'Active'),
(174, 2, 4, 17, 'i10', 'Active'),
(175, 2, 1, 17, 'Verna', 'Active'),
(176, 2, 1, 17, 'X Cent', 'Active'),
(177, 2, 1, 17, 'Elantra', 'Active'),
(178, 2, 2, 17, 'Tucson', 'Active'),
(179, 2, 4, 17, 'Eon', 'Active'),
(180, 2, 1, 17, 'Accent', 'Active'),
(181, 2, 4, 17, 'Santro', 'Active'),
(182, 2, 2, 17, 'Sonata', 'Active'),
(183, 2, 1, 17, 'Terracan', 'Active'),
(184, 2, 3, 18, 'Pajero ', 'Active'),
(185, 2, 3, 18, 'Montero', 'Active'),
(186, 2, 3, 18, 'Out Lander', 'Active'),
(187, 2, 1, 18, 'Lancer', 'Active'),
(188, 2, 1, 18, 'Cedia', 'Active'),
(189, 2, 2, 19, 'Cooper', 'Active'),
(190, 2, 2, 19, 'Convertible', 'Active'),
(191, 2, 2, 19, 'Clubman Cooper', 'Active'),
(192, 2, 4, 20, 'Redigo', 'Active'),
(193, 2, 4, 20, 'Go ', 'Active'),
(194, 2, 2, 20, 'Go+ ', 'Active'),
(195, 2, 2, 21, 'Duster', 'Active'),
(196, 2, 4, 21, 'Kwid', 'Active'),
(197, 2, 2, 21, 'Capture', 'Active'),
(198, 2, 2, 21, 'Lodgy', 'Active'),
(199, 2, 1, 21, 'Scala', 'Active'),
(200, 2, 4, 21, 'Pulse', 'Active'),
(201, 2, 1, 21, 'Fluence', 'Active'),
(202, 2, 3, 22, 'Aventador', 'Active'),
(203, 2, 3, 22, 'Huracan', 'Active'),
(204, 2, 3, 22, 'Urus', 'Active'),
(205, 2, 3, 23, 'Discovery', 'Active'),
(206, 2, 3, 23, 'Range Rover', 'Active'),
(207, 2, 3, 23, 'Sports', 'Active'),
(208, 2, 3, 23, 'Evoque', 'Active'),
(209, 2, 3, 23, 'Velar', 'Active'),
(210, 2, 3, 23, 'Free Lander', 'Active'),
(211, 2, 3, 23, 'Defender', 'Active'),
(212, 2, 3, 24, 'F', 'Active'),
(213, 2, 3, 24, 'XF', 'Active'),
(214, 2, 3, 24, 'XJ', 'Active'),
(215, 2, 3, 24, 'F Pace', 'Active'),
(216, 2, 3, 24, 'XE', 'Active'),
(217, 2, 3, 24, 'XK', 'Active'),
(218, 2, 3, 25, 'V8 Vantage', 'Active'),
(219, 2, 3, 25, 'DB 9', 'Active'),
(220, 2, 3, 25, 'V 12 Vantage', 'Active'),
(221, 2, 3, 25, 'Rapide', 'Active'),
(222, 2, 3, 25, 'Vanquish', 'Active'),
(223, 2, 2, 26, 'Compass', 'Active'),
(224, 2, 3, 27, 'NX', 'Active'),
(225, 2, 3, 27, 'LX', 'Active'),
(226, 2, 3, 27, 'LS', 'Active'),
(227, 2, 3, 27, 'ES', 'Active'),
(228, 2, 3, 27, 'RS', 'Active'),
(229, 1, 4, 37, 'Duke', 'Active'),
(230, 1, 4, 10, 'sunny', 'Active'),
(232, 1, 5, 28, 'CBR 250R', 'Active'),
(233, 1, 5, 28, 'XBLADE', 'Active'),
(234, 1, 5, 28, 'CB Hornet 160R', 'Active'),
(235, 1, 5, 28, 'CB Unicorn160', 'Active'),
(236, 1, 5, 28, 'CB unicorn', 'Active'),
(237, 1, 5, 28, 'CB Shine SP', 'Active'),
(238, 1, 5, 28, 'CB Shine', 'Active'),
(239, 1, 5, 28, 'Livo', 'Active'),
(240, 1, 5, 28, 'Dream Yuga', 'Active'),
(241, 1, 5, 28, 'Dream Neo', 'Active'),
(242, 1, 5, 28, 'CD110 Dream', 'Active'),
(243, 1, 5, 29, 'Gixxer', 'Active'),
(244, 1, 5, 29, 'Gixxer SF', 'Active'),
(245, 1, 5, 29, 'Gixxer SP', 'Active'),
(246, 1, 5, 29, 'Gixxer SF SP', 'Active'),
(247, 1, 5, 29, 'Intruder', 'Active'),
(248, 1, 5, 29, 'Intruder SP', 'Active'),
(249, 1, 5, 29, 'Hayate EP', 'Active'),
(250, 1, 5, 29, 'Access 125', 'Active'),
(251, 1, 5, 29, 'Access 125 SE', 'Active'),
(252, 1, 5, 29, 'Burgman Street', 'Active'),
(253, 1, 5, 29, 'Let?s', 'Active'),
(254, 1, 5, 29, 'Hayabusa', 'Active'),
(255, 1, 5, 29, 'V Strom 650 XT', 'Active'),
(256, 1, 5, 29, 'GSX-S750', 'Active'),
(257, 1, 5, 29, 'GSX-R1000', 'Active'),
(258, 1, 5, 29, 'V-Strom 1000', 'Active'),
(259, 1, 5, 30, 'Xtreme 200R', 'Active'),
(260, 1, 5, 30, 'Karizma ZMR', 'Active'),
(261, 1, 5, 30, 'Xtreme Sports', 'Active'),
(262, 1, 5, 30, 'ACHIEVER 150', 'Active'),
(263, 1, 5, 30, 'New Glamour', 'Active'),
(264, 1, 5, 30, 'Glamour Programmed FI', 'Active'),
(265, 1, 5, 30, 'Glamour', 'Active'),
(266, 1, 5, 30, 'Super Splendor', 'Active'),
(267, 1, 5, 30, 'New Super Splendor', 'Active'),
(268, 1, 5, 30, 'PASSION PRO', 'Active'),
(269, 1, 5, 30, 'PASSION PRO 110', 'Active'),
(270, 1, 5, 30, 'Passion X Pro', 'Active'),
(271, 1, 5, 30, 'Splendor iSmart+', 'Active'),
(272, 1, 5, 30, 'Splendor PRO', 'Active'),
(273, 1, 5, 30, 'Splendor plus', 'Active'),
(274, 1, 5, 30, 'HF Deluxe Eco', 'Active'),
(275, 1, 5, 30, 'HF Dawn', 'Active'),
(276, 1, 5, 30, 'HF Deluxe IBS i3S', 'Active'),
(277, 1, 5, 30, 'Destini 125', 'Active'),
(278, 1, 5, 30, 'Duet', 'Active'),
(279, 1, 5, 30, 'Maestro Edge', 'Active'),
(280, 1, 5, 30, 'Pleasure', 'Active'),
(281, 1, 5, 31, 'Dominar', 'Active'),
(282, 1, 5, 31, 'Pulsar', 'Active'),
(283, 1, 5, 31, 'Avenger', 'Active'),
(284, 1, 5, 31, 'V', 'Active'),
(285, 1, 5, 31, 'Discover', 'Active'),
(286, 1, 5, 31, 'CT100', 'Active'),
(287, 1, 5, 32, 'Aprilia', 'Active'),
(288, 1, 5, 32, 'Derbi', 'Active'),
(289, 1, 5, 32, 'Gilera', 'Active'),
(290, 1, 5, 32, 'Moto Guzzi', 'Active'),
(291, 1, 5, 32, 'Piaggio', 'Active'),
(292, 1, 5, 32, 'Scarabeo', 'Active'),
(293, 1, 5, 32, 'Vespa', 'Active'),
(294, 1, 5, 33, 'BMW G 310 R', 'Active'),
(295, 1, 5, 33, 'BMW G310GS', 'Active'),
(296, 1, 5, 33, 'BMW F750 GS', 'Active'),
(297, 1, 5, 33, 'BMW F850 GS', 'Active'),
(298, 1, 5, 33, 'BMW R1200 R', 'Active'),
(299, 1, 5, 33, 'BMW R Nine T Scrambler', 'Active'),
(300, 1, 5, 33, 'BMW R 1200 RS', 'Active'),
(301, 1, 5, 33, 'BMW R1200 GS', 'Active'),
(302, 1, 5, 33, 'BMW S 1000 R', 'Active'),
(303, 1, 5, 33, 'BMW R nineT Racer', 'Active'),
(304, 1, 5, 33, 'BMW R 1250 GS', 'Active'),
(305, 1, 5, 33, 'BMW R1200 GS Adventure', 'Active'),
(306, 1, 5, 33, 'BMW R nineT', 'Active'),
(307, 1, 5, 33, 'BMW S 1000 XR', 'Active'),
(308, 1, 5, 33, 'BMW S1000 RR', 'Active'),
(309, 1, 5, 33, 'BMW R1200 RT', 'Active'),
(310, 1, 5, 33, 'BMW R 1250 GS Adventure [2019]', 'Active'),
(311, 1, 5, 33, 'BMW K 1600 B', 'Active'),
(312, 1, 5, 33, 'BMW K1600 GTL', 'Active'),
(313, 1, 5, 34, 'Ducati Scrambler Icon', 'Active'),
(314, 1, 5, 34, 'Ducati Monster 797', 'Active'),
(315, 1, 5, 34, 'Ducati Scrambler Full Throttle', 'Active'),
(316, 1, 5, 34, 'Ducati Scrambler Classic', 'Active'),
(317, 1, 5, 34, 'Ducati Scrambler Mach 2.0', 'Active'),
(318, 1, 5, 34, 'Ducati Scrambler Cafe Racer', 'Active'),
(319, 1, 5, 34, 'Ducati Scrambler Desert Sled', 'Active'),
(320, 1, 5, 34, 'Ducati Monster 821', 'Active'),
(321, 1, 5, 34, 'Ducati Scrambler 1100', 'Active'),
(322, 1, 5, 34, 'Ducati Hypermotard 939', 'Active'),
(323, 1, 5, 34, 'Ducati SuperSport', 'Active'),
(324, 1, 5, 34, 'Ducati Hyperstrada 939', 'Active'),
(325, 1, 5, 34, 'Ducati Multistrada 950', 'Active'),
(326, 1, 5, 34, 'Ducati 959 Panigale', 'Active'),
(327, 1, 5, 34, 'Ducati Multistrada 1260', 'Active'),
(328, 1, 5, 34, 'Ducati Diavel', 'Active'),
(329, 1, 5, 34, 'Ducati XDiavel', 'Active'),
(330, 1, 5, 34, 'Ducati Multistrada 1200 Enduro', 'Active'),
(331, 1, 5, 34, 'Ducati Diavel Carbon', 'Active'),
(332, 1, 5, 34, 'Ducati Monster 1200', 'Active'),
(333, 1, 5, 34, 'Ducati Panigale V4', 'Active'),
(334, 1, 5, 34, 'Ducati Monster 1200 S 2018', 'Active'),
(335, 1, 5, 34, 'Ducati Panigale V4 S', 'Active'),
(336, 1, 5, 34, 'Ducati 1299 Panigale R Final Edition', 'Active'),
(337, 1, 5, 34, 'Ducati Panigale V4 R', 'Active'),
(338, 1, 5, 35, 'Harley-Davidson Street 750', 'Active'),
(339, 1, 5, 35, 'Harley-Davidson Street Rod', 'Active'),
(340, 1, 5, 35, 'Harley-Davidson Iron 883', 'Active'),
(341, 1, 5, 35, 'Harley-Davidson 1200 Custom', 'Active'),
(342, 1, 5, 35, 'Harley-Davidson Forty Eight', 'Active'),
(343, 1, 5, 35, 'Harley-Davidson Roadster', 'Active'),
(344, 1, 5, 35, 'Harley-Davidson Street Bob', 'Active'),
(345, 1, 5, 35, 'Harley-Davidson Low Rider', 'Active'),
(346, 1, 5, 35, 'Harley-Davidson Fat Bob', 'Active'),
(347, 1, 5, 35, 'Harley-Davidson Fat Boy', 'Active'),
(348, 1, 5, 35, 'Harley-Davidson Deluxe', 'Active'),
(349, 1, 5, 35, 'Harley-Davidson Fat Boy 114', 'Active'),
(350, 1, 5, 35, 'Harley-Davidson Heritage Classic', 'Active'),
(351, 1, 5, 35, 'Harley-Davidson Road King', 'Active'),
(352, 1, 5, 35, 'Harley-Davidson Street Glide Special', 'Active'),
(353, 1, 5, 35, 'Harley-Davidson Road Glide Special', 'Active'),
(354, 1, 5, 35, 'Harley-Davidson CVO Limited', 'Active'),
(355, 1, 5, 36, 'Kawasaki Ninja ZX 10R', 'Active'),
(356, 1, 5, 36, 'Kawasaki Ninja 650', 'Active'),
(357, 1, 5, 36, 'Kawasaki Ninja 400', 'Active'),
(358, 1, 5, 36, 'Kawasaki Z1000', 'Active'),
(359, 1, 5, 36, 'Kawasaki Z900', 'Active'),
(360, 1, 5, 36, 'Kawasaki Ninja 1000', 'Active'),
(361, 1, 5, 36, 'Kawasaki Vulcan S', 'Active'),
(362, 1, 5, 36, 'Kawasaki Ninja H2', 'Active'),
(363, 1, 5, 36, 'Kawasaki Z250', 'Active'),
(364, 1, 5, 36, 'Kawasaki Z650', 'Active'),
(365, 1, 5, 36, 'Kawasaki Ninja ZX 14R', 'Active'),
(366, 1, 5, 36, 'Kawasaki Ninja ZX-6R', 'Active'),
(367, 1, 5, 36, 'Kawasaki Ninja ZX-10RR', 'Active'),
(368, 1, 5, 36, 'Kawasaki Z900RS', 'Active'),
(369, 1, 5, 36, 'Kawasaki KLX 450R', 'Active'),
(370, 1, 5, 36, 'Kawasaki KX 450F', 'Active'),
(371, 1, 5, 36, 'Kawasaki KLX 140', 'Active'),
(372, 1, 5, 36, 'Kawasaki Ninja H2 SX', 'Active'),
(373, 1, 5, 36, 'Kawasaki KLX 110', 'Active'),
(374, 1, 5, 36, 'Kawasaki Versys 650', 'Active'),
(375, 1, 5, 36, 'Kawasaki Versys X 300', 'Active'),
(376, 1, 5, 36, 'Kawasaki KX 100', 'Active'),
(377, 1, 5, 36, 'Kawasaki KX 250', 'Active'),
(378, 1, 5, 37, 'KTM 200 Duke', 'Active'),
(379, 1, 5, 37, 'KTM 125 Duke', 'Active'),
(380, 1, 5, 37, 'KTM 390 Duke', 'Active'),
(381, 1, 5, 37, 'KTM RC 200', 'Active'),
(382, 1, 5, 37, 'KTM RC 390', 'Active'),
(383, 1, 5, 37, 'KTM 250 Duke', 'Active'),
(384, 1, 5, 37, 'KTM 790 Duke', 'Active'),
(385, 1, 5, 37, 'KTM 390 Adventure', 'Active'),
(386, 1, 5, 37, 'KTM 1050 Adventure', 'Active'),
(387, 1, 5, 38, 'JAWA', 'Active'),
(388, 1, 5, 38, 'Mahindra Mojo', 'Active'),
(389, 1, 5, 38, 'Mahindra Centuro', 'Active'),
(390, 1, 5, 38, 'Mahindra Duro DZ', 'Active'),
(391, 1, 5, 38, 'Mahindra Rodeo Uzo', 'Active'),
(392, 1, 5, 38, 'Mahindra Gusto', 'Active'),
(393, 1, 5, 39, 'Interceptor 650', 'Active'),
(394, 1, 5, 39, 'Continental GT', 'Active'),
(395, 1, 5, 39, 'Thunderbird 500', 'Active'),
(396, 1, 5, 39, 'Thunderbird 500 X', 'Active'),
(397, 1, 5, 39, 'Thunderbird 350', 'Active'),
(398, 1, 5, 39, 'Thunderbird 350 X', 'Active'),
(399, 1, 5, 39, 'Himalayan', 'Active'),
(400, 1, 5, 39, 'Classic Squadron Blue', 'Active'),
(401, 1, 5, 39, 'Classic Desert Storm', 'Active'),
(402, 1, 5, 39, 'Classic Redditch', 'Active'),
(403, 1, 5, 39, 'Classic Chrome', 'Active'),
(404, 1, 5, 39, 'Classic 350', 'Active'),
(405, 1, 5, 39, 'Classic 500', 'Active'),
(406, 1, 5, 39, 'Classic Stealth Black', 'Active'),
(407, 1, 5, 39, 'Classic Gunmetal Grey', 'Active'),
(408, 1, 5, 39, 'Classic Pegasus', 'Active'),
(409, 1, 5, 39, 'Classic Squadron Blue', 'Active'),
(410, 1, 5, 39, 'Classic Desert Storm', 'Active'),
(411, 1, 5, 39, 'Classic Redditch', 'Active'),
(412, 1, 5, 39, 'Classic Chrome', 'Active'),
(413, 1, 5, 39, 'Classic 350', 'Active'),
(414, 1, 5, 39, 'Classic 500', 'Active'),
(415, 1, 5, 39, 'Classic Stealth Black', 'Active'),
(416, 1, 5, 39, 'Classic Gunmetal Grey', 'Active'),
(417, 1, 5, 39, 'Classic Pegasus', 'Active'),
(418, 1, 5, 40, 'TVS NTORQ', 'Active'),
(419, 1, 5, 40, 'TVS Jupiter', 'Active'),
(420, 1, 5, 40, 'TVS WEGO', 'Active'),
(421, 1, 5, 40, 'Scooty ZEST', 'Active'),
(422, 1, 5, 40, 'Scooty PEP', 'Active'),
(423, 1, 5, 40, 'TVS Apache RTR 160', 'Active'),
(424, 1, 5, 40, 'TVS Apache RTR 160 4V', 'Active'),
(425, 1, 5, 40, 'TVS Apache RTR 180', 'Active'),
(426, 1, 5, 40, 'TVS Apache RTR 200 4V Race Edition 2.0', 'Active'),
(427, 1, 5, 40, 'TVS Apache RR 310', 'Active'),
(428, 1, 5, 40, 'TVS Jupiter', 'Active'),
(429, 1, 5, 40, 'TVS NTORQ 125', 'Active'),
(430, 1, 5, 40, 'TVS Radeon', 'Active'),
(431, 1, 5, 40, 'TVS Sport', 'Active'),
(432, 1, 5, 40, 'TVS XL100', 'Active'),
(433, 1, 5, 40, 'TVS Scooty Pep Plus', 'Active'),
(434, 1, 5, 40, 'TVS Star City Plus', 'Active'),
(435, 1, 5, 40, 'TVS Scooty Zest', 'Active'),
(436, 1, 5, 40, 'TVS Victor', 'Active'),
(437, 1, 5, 40, 'TVS Jupiter Grande', 'Active'),
(438, 1, 5, 40, 'TVS Wego', 'Active'),
(439, 1, 5, 41, 'Vespa Notte', 'Active'),
(440, 1, 5, 41, 'Vespa LX 125', 'Active'),
(441, 1, 5, 41, 'Vespa VXL 125', 'Active'),
(442, 1, 5, 41, 'Vespa RED', 'Active'),
(443, 1, 5, 41, 'Vespa SXL 125', 'Active'),
(444, 1, 5, 41, 'Vespa VXL 150', 'Active'),
(445, 1, 5, 41, 'Vespa SXL 150', 'Active'),
(446, 1, 5, 41, 'Vespa Elegante 150', 'Active'),
(447, 1, 5, 42, 'Yamaha YZF R15 V3', 'Active'),
(448, 1, 5, 42, 'Yamaha FZ V 3.0', 'Active'),
(449, 1, 5, 42, 'Yamaha FZ25', 'Active'),
(450, 1, 5, 42, 'Yamaha FZ S V 3.0', 'Active'),
(451, 1, 5, 42, 'Yamaha FZ S V 2.0', 'Active'),
(452, 1, 5, 42, 'Yamaha FZ V 2.0', 'Active'),
(453, 1, 5, 42, 'Yamaha YZF-R15 S', 'Active'),
(454, 1, 5, 42, 'Yamaha Fascino', 'Active'),
(455, 1, 5, 42, 'Yamaha SZ RR V 2.0', 'Active'),
(456, 1, 5, 42, 'Yamaha YZF R3', 'Active'),
(457, 1, 5, 42, 'Yamaha Saluto RX', 'Active'),
(458, 1, 5, 42, 'Yamaha Saluto', 'Active'),
(459, 1, 5, 42, 'Yamaha Fazer 25', 'Active'),
(460, 1, 5, 42, 'Yamaha Ray-Z', 'Active'),
(461, 1, 5, 42, 'Yamaha Cygnus Ray ZR', 'Active'),
(462, 1, 5, 42, 'Yamaha YZF R1', 'Active'),
(463, 1, 5, 42, 'Yamaha Fazer FI V 2.0', 'Active'),
(464, 1, 5, 42, 'Yamaha Alpha', 'Active'),
(465, 1, 5, 42, 'Yamaha MT-09', 'Active'),
(466, 1, 5, 30, 'KARIZMA', 'Active'),
(467, 1, 5, 39, 'ENFIELD', 'Active'),
(468, 1, 5, 31, 'PLATINA', 'Active'),
(469, 1, 5, 6, 'ACTIVA', 'Active'),
(470, 1, 5, 0, 'HONDA', 'Active'),
(471, 1, 5, 28, 'DIO', 'Active'),
(472, 1, 5, 30, 'HUNK', 'Active'),
(473, 2, 4, 7, 'ALTO K10', 'Active'),
(474, 1, 5, 45, '302', 'Active'),
(475, 2, 4, 17, 'GRAND i10', 'Active'),
(476, 1, 5, 6, 'Unicorn', 'Active'),
(477, 2, 1, 3, 'OPTRA magnum', 'Active'),
(478, 2, 2, 8, 'MARAZZO', 'Active'),
(479, 2, 1, 16, 'YARIS', 'Active'),
(480, 2, 1, 17, 'i20 ACTIVE', 'Active'),
(481, 2, 1, 16, 'COROLLA', 'Active'),
(482, 1, 5, 31, 'CHETAK', 'Active'),
(483, 1, 5, 45, 'TNT 25', 'Active'),
(484, 1, 5, 45, '300', 'Active'),
(485, 2, 1, 16, 'ETIOS CROSS', 'Active'),
(486, 2, 3, 46, 'AVANTI', 'Active'),
(487, 2, 1, 5, 'FREE STYLE', 'Active'),
(488, 1, 5, 45, 'Tornado 600i', 'Active'),
(489, 1, 5, 6, 'CBR 150', 'Active'),
(490, 2, 3, 10, 'Evalia', 'Active'),
(491, 2, 3, 12, 'HARRIER', 'Active'),
(492, 1, 5, 29, 'Swiss 125', 'Active'),
(493, 1, 5, 42, 'RX100', 'Active'),
(494, 1, 5, 36, 'NINJA 300', 'Active'),
(495, 1, 5, 42, 'RX 135', 'Active'),
(496, 2, 1, 47, 'CORSA', 'Active'),
(497, 2, 1, 17, 'Elite i20', 'Active'),
(498, 2, 4, 17, 'Getz', 'Active'),
(499, 2, 1, 7, 'Esteem', 'Active'),
(500, 2, 3, 48, 'HECTOR', 'Active'),
(501, 2, 2, 17, 'Venue', 'Active'),
(502, 2, 1, 49, 'Ambassador', 'Active'),
(503, 1, 5, 6, 'CB TRIGGER', 'Active'),
(504, 1, 5, 30, 'X PULSE 200', 'Active'),
(505, 2, 1, 16, 'GLANZA', 'Active'),
(506, 2, 2, 12, 'GRANDE', 'Active'),
(507, 1, 5, 50, 'COMMANDO', 'Active'),
(508, 2, 2, 21, 'TRIBER', 'Active'),
(509, 2, 3, 51, 'SELTOS', 'Active'),
(510, 2, 3, 52, 'MU - X', 'Active'),
(511, 2, 3, 52, 'MU-7', 'Active'),
(512, 2, 3, 7, 'XL6', 'Active'),
(513, 2, 3, 15, 'XC90', 'Active'),
(514, 2, 4, 7, 'S- PRESSO', 'Active'),
(515, 1, 5, 0, 'GT', 'Active'),
(516, 2, 2, 10, 'Kicks', 'Active'),
(517, 2, 4, 4, 'UNO', 'Active'),
(518, 1, 5, 53, 'Street triple', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `master_vehicle_segment`
--

CREATE TABLE `master_vehicle_segment` (
  `Id` int(11) NOT NULL,
  `VehicleSegment` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_vehicle_segment`
--

INSERT INTO `master_vehicle_segment` (`Id`, `VehicleSegment`, `Status`) VALUES
(1, 'Sedan', 'Active'),
(2, 'Luxury', 'Active'),
(3, 'Super Luxury', 'Active'),
(4, 'Hatch Back', 'Active'),
(5, 'Two Wheeler', 'Active'),
(6, 'Four Wheeler', 'Ative'),
(7, 'SUV', 'Active'),
(8, 'MUV', 'Active'),
(9, 'Scooter', 'Active'),
(10, 'Super Bikes', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `MemberShip` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `MemberShip`, `Description`, `franchisee_id`, `vendor_id`, `Status`) VALUES
(2, 'Gold', 'test', 0, '', 'Active'),
(3, 'Silver', 'Silver', 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `myautocart_service_bookings`
--

CREATE TABLE `myautocart_service_bookings` (
  `id` int(11) NOT NULL,
  `service_order_no` text NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_service_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myautocart_service_bookings`
--

INSERT INTO `myautocart_service_bookings` (`id`, `service_order_no`, `vendor_id`, `appointment_date`, `appointment_time`, `user_id`, `vendor_service_id`, `category_id`, `customer_id`, `vehicle_number`, `status`) VALUES
(7, 'MY-32', 21, '2020-05-27', '10 AM - 11 AM', 21, 15, 10, 34, '', 'Job created'),
(8, 'MY-33', 20, '2020-05-27', '05 PM - 06 PM', 20, 8, 10, 35, '', 'Job created'),
(9, 'MY-34', 21, '2020-05-27', '10 AM - 11 AM', 21, 15, 10, 35, '', 'Job created'),
(10, 'MY-34', 20, '2020-05-27', '06 PM - 07 PM', 20, 8, 10, 36, '', 'Job created'),
(11, 'MY-35', 20, '2020-05-28', '08 AM - 09 AM', 20, 8, 10, 36, '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_asset_brand`
--

CREATE TABLE `m_asset_brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_brand`
--

CREATE TABLE `m_brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_company`
--

CREATE TABLE `m_company` (
  `id` int(11) NOT NULL,
  `company_code` varchar(250) NOT NULL,
  `cus_name` varchar(250) NOT NULL,
  `a_addrs` varchar(250) NOT NULL,
  `mobile1` varchar(250) NOT NULL,
  `mobile2` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `gstin` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `ac_holder_name` varchar(250) NOT NULL,
  `b_name` varchar(250) NOT NULL,
  `ac_no` varchar(250) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `ifsc_code` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_complaints_type`
--

CREATE TABLE `m_complaints_type` (
  `cid` int(11) NOT NULL,
  `ctype` text NOT NULL,
  `cdescription` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_franchisee`
--

CREATE TABLE `m_franchisee` (
  `id` int(11) NOT NULL,
  `franchisee_id` varchar(250) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `franchisee_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `cen_manager` varchar(250) NOT NULL,
  `con_number` varchar(25) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `img` varchar(300) NOT NULL,
  `Remarks` text NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `website` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_franchisee`
--

INSERT INTO `m_franchisee` (`id`, `franchisee_id`, `vendor_id`, `branch_id`, `franchisee_name`, `address`, `city`, `mobile`, `cen_manager`, `con_number`, `gst_no`, `status`, `img`, `Remarks`, `LedgerId`, `website`, `email`) VALUES
(6, 'F1', 6, 8, 'RAGHAVENDRA MOTORS', 'CHENNAI', '', '9567488374', 'Divakaran', '665445433', '', 'Active', 'company_logo/', '', 0, '', ''),
(7, 'F2', 7, 9, 'VERTEX SOLUTIONS', '198, NEHRU STREET, RAMNAGAR, COIMBATORE', 'CBE', '9566969517', '', '9988776655', '33AS2315DD9TH4321', 'Active', 'company_logo/Vertex logo.jpg', '', 0, 'www.vertexsolution.co.in', 'vertex@gmail.com'),
(8, 'F3', 7, 10, 'VERTEX2', 'CBE', '', '9566874598', '', '', '', 'Active', 'company_logo/', '', 0, '', 'vertex@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `m_gst`
--

CREATE TABLE `m_gst` (
  `id` int(11) NOT NULL,
  `gid` varchar(250) NOT NULL,
  `gst` decimal(9,2) NOT NULL,
  `sgst` decimal(9,2) NOT NULL,
  `igst` decimal(9,2) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_gst`
--

INSERT INTO `m_gst` (`id`, `gid`, `gst`, `sgst`, `igst`, `status`) VALUES
(1, '1', '18.00', '9.00', '18.00', 'Active'),
(2, '2', '0.00', '0.00', '0.00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_labour`
--

CREATE TABLE `m_labour` (
  `id` int(11) NOT NULL,
  `labour` varchar(250) NOT NULL,
  `amt` int(11) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_ledger`
--

CREATE TABLE `m_ledger` (
  `Id` int(11) NOT NULL,
  `LedgerGroup` int(11) NOT NULL,
  `LedgerName` varchar(50) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `franchisee_id` varchar(20) NOT NULL,
  `vendor_id` varchar(20) NOT NULL,
  `ledid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ledger`
--

INSERT INTO `m_ledger` (`Id`, `LedgerGroup`, `LedgerName`, `ContactNo`, `franchisee_id`, `vendor_id`, `ledid`) VALUES
(1, 1, 'Bank Accounts', 'F1', '', '', 1),
(4, 4, 'Capital Account', 'F1', '', '', 4),
(5, 5, 'Cash-in-Hand', 'F1', '', '', 5),
(9, 9, 'Direct Expenses', 'F1', '', '', 9),
(12, 12, 'Indirect Expenses', 'F1', '', '', 12),
(13, 13, 'Fixed Assets', 'F1', '', '', 13),
(19, 19, 'Misc. Expenses', 'F1', '', '', 19),
(20, 20, 'Provisions', 'F1', '', '', 20),
(21, 21, 'Purchase Accounts', 'F1', '', '', 21),
(24, 24, 'Sales Accounts', 'F1', '', '', 24),
(26, 26, 'Stock-In-Hand', 'F1', '', '', 26),
(27, 27, 'Sundry Creditors', 'F1', '', '', 27),
(28, 28, 'Sundry Debtors', 'F1', '', '', 28),
(32, 32, 'Office Rent', 'F1', '', '', 32),
(35, 35, 'Round Off', 'F1', '', '', 35),
(36, 36, 'Petty Cash', 'F1', '', '', 36),
(40, 40, 'Accounts Payable', 'F1', '9', '7', 40),
(41, 41, 'Petrol Expense', 'F1', '', '', 41),
(42, 42, 'Packing And Forwarding', 'F1', '', '', 42),
(43, 43, 'Repairing And Maintanance', 'F1', '', '', 43),
(44, 44, 'Output VAT', 'F1', '', '', 44),
(46, 46, 'IT Accessories', 'F1', '', '', 46),
(48, 48, 'Other Equipments', 'F1', '', '', 48),
(51, 51, 'Account Receivable', 'F1', '', '', 51),
(63, 4, 'Immovable Assets', 'ET01', '', '', 44),
(64, 32, 'Rent', 'ET01', '', '', 45),
(65, 4, 'Movable Assets', 'ET01', '', '', 46),
(66, 7, 'Maintenance Charges', 'ET01', '', '', 47),
(67, 9, 'Daily Expenses', 'ET01', '', '', 48),
(68, 21, 'Supplier Payables', 'ET01', '', '', 49),
(69, 9, 'Electricity Charges', 'ET01', '', '', 50),
(70, 9, 'Cable & Data Charges', 'ET01', '', '', 51),
(71, 9, 'Subscription Charges', 'F1', '', '', 52),
(72, 11, '(VAT) Value Added Tax', 'F1', '', '', 53),
(73, 19, 'Donations', 'F1', '', '', 54),
(74, 9, 'Maintenance Charges', 'F1', '', '', 55),
(75, 9, 'Marketing Expenditure', 'F1', '', '', 56),
(76, 9, 'Printing & Stationery', 'F1', '', '', 57),
(77, 60, 'Tea Expense', 'F1', '', '', 58),
(78, 41, 'petrol expenses', 'F1', '', '', 59),
(80, 32, 'Office Rent', 'F1', '', '', 61),
(82, 58, 'Salary Provision', 'F1', '', '', 63),
(84, 42, 'Packing And Forwarding', 'F1', '', '', 65),
(85, 43, 'Repairing And Maintanance', 'F1', '', '', 66),
(87, 46, 'Software Accessories', 'F1', '', '', 68),
(88, 46, 'IT Accessories', 'F1', '', '', 69),
(89, 48, 'Office Equipments', 'F1', '', '', 70),
(90, 48, 'Other Equipments', 'F1', '', '', 71),
(91, 61, 'Input VAT', 'F1', '', '', 72),
(97, 60, 'Tea Expenses', 'F1', '', '', 60),
(98, 58, 'Employee salary', 'ET01', '', '', 78),
(99, 21, 'vertex', '9876543210', '', '', 1),
(100, 24, 'KUMAR', 'C1', '', '', 1),
(101, 32, 'Office Rent', '', '9', '7', 0),
(102, 40, 'Accounts Payable', 'F1', '9', '7', 0),
(103, 24, 'SUHAIL', '9876443214', '0', '', 0),
(104, 1, 'Bank Account', 'F1', '', '', 0),
(105, 1, 'Bank Account', 'F1', '9', '', 7),
(106, 9, 'Tea', 'F1', '9', '7', 8),
(107, 32, 'Office Rent', 'F1', '9', '7', 9),
(108, 58, 'Salary provision', '', '9', '7', 0),
(109, 26, 'SUBHA', '7708715263', '9', '7', 0),
(110, 26, 'MUTHU', '9988776655', '9', '7', 0),
(111, 26, 'KUMARESAN', '9865322154', '9', '7', 0),
(112, 26, 'SUBHA', '7708745120', '9', '7', 0),
(113, 26, 'ERTG', '3453453452', '9', '7', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_ledger_group`
--

CREATE TABLE `m_ledger_group` (
  `id` int(11) NOT NULL,
  `ledger_group` varchar(100) NOT NULL,
  `opening_bal` decimal(9,2) NOT NULL,
  `ldate` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ledger_group`
--

INSERT INTO `m_ledger_group` (`id`, `ledger_group`, `opening_bal`, `ldate`, `status`) VALUES
(1, 'Bank Accounts', '10000.00', '2020-02-26', 'Active'),
(4, 'Capital Account', '10000.00', '2020-02-26', 'Active'),
(5, 'Cash-in-Hand', '10000.00', '2020-02-26', 'Active'),
(9, 'Direct Expenses', '-10000.00', '2020-02-26', 'Active'),
(12, 'Indirect Expenses', '-10000.00', '2020-02-26', 'Active'),
(13, 'Fixed Assets', '10000.00', '2020-02-26', 'Active'),
(19, 'Misc. Expenses', '-10000.00', '2020-02-26', 'Active'),
(20, 'Provisions', '-10000.00', '2020-02-26', 'Active'),
(21, 'Purchase Accounts', '-10000.00', '2020-02-26', 'Active'),
(24, 'Sales Accounts', '10000.00', '2020-02-26', 'Active'),
(26, 'Stock-In-Hand', '10000.00', '2020-02-26', 'Active'),
(27, 'Sundry Creditors', '10000.00', '2020-02-26', 'Active'),
(28, 'Sundry Debtors', '10000.00', '2020-02-26', 'Active'),
(32, 'Office Rent', '0.00', '2020-02-26', 'Active'),
(35, 'Round Off', '10000.00', '2020-02-26', 'Active'),
(36, 'Petty Cash', '10000.00', '2020-02-26', 'Active'),
(40, 'Accounts Payable', '10000.00', '2020-02-26', 'Active'),
(41, 'Petrol Expense', '10000.00', '2020-02-26', 'Active'),
(42, 'Packing And Forwarding', '10000.00', '2020-02-26', 'Active'),
(43, 'Repairing And Maintanance', '10000.00', '2020-02-26', 'Active'),
(44, 'Output VAT', '10000.00', '2020-02-26', 'Active'),
(46, 'IT Accessories', '10000.00', '2020-02-26', 'Active'),
(48, 'Other Equipments', '10000.00', '2020-02-26', 'Active'),
(51, 'Account Receivable', '10000.00', '2020-02-26', 'Active'),
(58, 'Salary Provision', '10000.00', '2020-02-26', 'Active'),
(60, 'Tea Expenses', '0.00', '2020-02-27', 'Active'),
(61, 'Input Vat', '0.00', '2020-02-27', 'Active'),
(62, 'Service Accounts', '10000.00', '2020-05-14', 'Active'),
(63, 'Customer Account', '0.00', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_package`
--

CREATE TABLE `m_package` (
  `id` int(11) NOT NULL,
  `package_no` varchar(250) NOT NULL,
  `package_name` varchar(250) NOT NULL,
  `Camount` decimal(9,2) NOT NULL,
  `Tamount` decimal(9,2) NOT NULL,
  `v_type` int(30) NOT NULL,
  `v_brand` int(30) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `NoOfTerms` varchar(50) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_package`
--

INSERT INTO `m_package` (`id`, `package_no`, `package_name`, `Camount`, `Tamount`, `v_type`, `v_brand`, `amount`, `NoOfTerms`, `Remarks`, `franchisee_id`, `vendor_id`, `status`) VALUES
(8, 'P1', 'mega', '100.00', '200.00', 1, 1, '180', '', 'test', 0, '', 'Active'),
(9, 'P2', 'Gold', '100.00', '280.00', 1, 1, '250', '', 'Test', 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_package_service`
--

CREATE TABLE `m_package_service` (
  `id` int(11) NOT NULL,
  `package_no` varchar(250) NOT NULL,
  `service` varchar(250) NOT NULL,
  `package_name` varchar(250) NOT NULL,
  `Camount` decimal(9,2) NOT NULL,
  `Tamount` decimal(9,2) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_package_service`
--

INSERT INTO `m_package_service` (`id`, `package_no`, `service`, `package_name`, `Camount`, `Tamount`, `franchisee_id`, `vendor_id`, `status`) VALUES
(9, 'P1', 'wash', 'mega', '100.00', '200.00', 0, '', 'Active'),
(10, 'P1', 'wash', 'mega', '100.00', '200.00', 0, '', 'Active'),
(11, 'P2', 'wash', 'Gold', '100.00', '280.00', 9, '7', 'Active'),
(12, 'P2', 'mega', 'Gold', '180.00', '280.00', 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_package_service_temp`
--

CREATE TABLE `m_package_service_temp` (
  `id` int(11) NOT NULL,
  `package_no` varchar(250) NOT NULL,
  `package` varchar(250) NOT NULL,
  `v_type` int(30) NOT NULL,
  `v_brand` int(30) NOT NULL,
  `service` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `Tamount` decimal(9,2) NOT NULL,
  `Camount` decimal(9,2) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_painters_master`
--

CREATE TABLE `m_painters_master` (
  `Id` int(11) NOT NULL,
  `PainterName` text NOT NULL,
  `PainterMobile` varchar(25) NOT NULL,
  `PainterSecondaryMobile` varchar(250) NOT NULL,
  `GstNo` varchar(50) NOT NULL,
  `PainterAddress` text NOT NULL,
  `PainterCity` varchar(250) NOT NULL,
  `Painterstate` varchar(250) NOT NULL,
  `PainterEmail` text NOT NULL,
  `sbrand` text NOT NULL,
  `sdescription` text NOT NULL,
  `opening_balance` varchar(300) NOT NULL,
  `ledger_group` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `TAccountNo` int(11) NOT NULL,
  `LedgerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_payment_mode`
--

CREATE TABLE `m_payment_mode` (
  `Id` int(11) NOT NULL,
  `PaymentMode` varchar(90) NOT NULL,
  `PaymentDescription` text NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_payment_mode`
--

INSERT INTO `m_payment_mode` (`Id`, `PaymentMode`, `PaymentDescription`, `Status`) VALUES
(1, 'Cash', 'Cash', 'Active'),
(2, 'Bank', 'Bank', 'Active'),
(3, 'Cheque', 'Cheque', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_service_type`
--

CREATE TABLE `m_service_type` (
  `id` int(11) NOT NULL,
  `stype_no` varchar(10) NOT NULL,
  `vcategory` varchar(100) NOT NULL,
  `stype` text NOT NULL,
  `installation_amt` decimal(9,2) NOT NULL,
  `labour_amt` decimal(9,2) NOT NULL,
  `v_type` int(30) NOT NULL,
  `v_brand` int(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ownership` varchar(75) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_service_type`
--

INSERT INTO `m_service_type` (`id`, `stype_no`, `vcategory`, `stype`, `installation_amt`, `labour_amt`, `v_type`, `v_brand`, `status`, `ownership`, `franchisee_id`, `vendor_id`) VALUES
(11, 'ST1', 'Wash', 'wash', '100.00', '10.00', 1, 1, 'Active', 'Protouch', 0, ''),
(12, '', '', 'mega', '180.00', '0.00', 0, 0, 'Active', '', 0, ''),
(13, 'ST3', 'Wash', 'Wash', '500.00', '0.00', 1, 1, 'Active', 'Protouch', 9, '7'),
(15, 'ST4', 'Wash', 'ery', '565.00', '0.00', 1, 1, 'Deactive', 'Protouch', 9, '7'),
(16, 'ST5', 'Wash', 'kjbhjk', '564.00', '564.00', 1, 1, 'Deactive', 'VERTEX SOLUTIONS', 9, '7'),
(17, 'ST6', 'Wash', 'Interior', '500.00', '0.00', 4, 4, 'Active', 'VERTEX SOLUTIONS', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `m_service_type_details`
--

CREATE TABLE `m_service_type_details` (
  `id` int(11) NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `spare_name` varchar(250) NOT NULL,
  `qty` decimal(9,2) NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `others` varchar(250) NOT NULL,
  `show_option` varchar(250) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_service_type_details`
--

INSERT INTO `m_service_type_details` (`id`, `service_type`, `spare_name`, `qty`, `hsn_code`, `others`, `show_option`, `franchisee_id`, `vendor_id`, `status`) VALUES
(1, '11', '4', '10.00', '564', '1', 'Invisible', 0, '', 'Active'),
(2, '13', '7', '50.00', '', '', 'Invisible', 9, '7', 'Active'),
(3, '15', '4', '12.00', '', '', 'Invisible', 9, '7', 'Deactive'),
(4, '16', '7', '354.00', '564', '564', 'Invisible', 9, '7', 'Deactive'),
(5, '17', '7', '12.00', '456', '', 'Invisible', 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_service_type_temp`
--

CREATE TABLE `m_service_type_temp` (
  `id` int(11) NOT NULL,
  `stype_no` varchar(250) NOT NULL,
  `vcategory` varchar(100) NOT NULL,
  `spare_name` varchar(250) NOT NULL,
  `stype_name` varchar(250) NOT NULL,
  `installation_amt` decimal(9,2) NOT NULL,
  `labour_amt` decimal(9,2) NOT NULL,
  `qty` decimal(9,2) NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `others` varchar(250) NOT NULL,
  `show_option` varchar(250) NOT NULL,
  `v_type` int(30) NOT NULL,
  `v_brand` int(30) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ownership` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_spare`
--

CREATE TABLE `m_spare` (
  `sid` int(11) NOT NULL,
  `stype` varchar(15) NOT NULL,
  `sbrand` varchar(10) NOT NULL,
  `sname` text NOT NULL,
  `spartno` varchar(25) NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `smrp` varchar(25) NOT NULL,
  `ssupplier` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `units` int(25) NOT NULL,
  `min_stock` decimal(9,2) NOT NULL,
  `TaxRate` decimal(9,2) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_spare`
--

INSERT INTO `m_spare` (`sid`, `stype`, `sbrand`, `sname`, `spartno`, `hsn_code`, `smrp`, `ssupplier`, `status`, `units`, `min_stock`, `TaxRate`, `franchisee_id`, `vendor_id`) VALUES
(4, '3', '7', 'test', '123', '321', '12', '5', 'Active', 1, '100.00', '18.00', 0, ''),
(5, '3', '8', 'TVS Brake Shoe', '543', '54656', '1200', '6', 'Active', 1, '5.00', '18.00', 0, ''),
(6, '3', '8', 'TVS Accelerator cable', '456456', '4554', '800', '6', 'Active', 1, '5.00', '18.00', 0, ''),
(7, '3', '8', 'Gear', '654456', '4534', '1200', '6', 'Active', 1, '5.00', '18.00', 9, '7'),
(8, '6', '9', 'Mirror', '456', '654', '200', '7', 'Active', 1, '100.00', '12.00', 9, '7'),
(9, '6', '9', 'Break Shoe', '457786', '56756', '120', '7', 'Deactive', 1, '10.00', '10.00', 9, '7'),
(10, '6', '10', 'Break Shoe', '5661', '54641', '12', '7', 'Active', 1, '10.00', '10.00', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `m_spare_brand`
--

CREATE TABLE `m_spare_brand` (
  `sid` int(11) NOT NULL,
  `stype` int(11) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `sbrand` varchar(250) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_spare_brand`
--

INSERT INTO `m_spare_brand` (`sid`, `stype`, `supplier`, `sbrand`, `franchisee_id`, `vendor_id`, `status`) VALUES
(7, 3, '5', 'BMWs', 0, '', 'Active'),
(8, 3, '6', 'TVS', 0, '', 'Active'),
(9, 6, '5', 'vw', 9, '7', 'Active'),
(10, 6, '7', 'VolksWagan', 9, '7', 'Active'),
(11, 5, '7', 'Honda', 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_spare_type`
--

CREATE TABLE `m_spare_type` (
  `sid` int(11) NOT NULL,
  `stype` text NOT NULL,
  `sdescription` varchar(300) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_spare_type`
--

INSERT INTO `m_spare_type` (`sid`, `stype`, `sdescription`, `franchisee_id`, `vendor_id`, `status`) VALUES
(3, 'Accessories', 'Accessories', 0, '', 'Active'),
(4, 'Consumables', 'Consumables', 0, '', 'Active'),
(5, 'Spares', 'Spares', 9, '7', 'Active'),
(6, 'Acessories', '', 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_sub_brand`
--

CREATE TABLE `m_sub_brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `sub_brand` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `sid` int(11) NOT NULL,
  `sname` text NOT NULL,
  `shipping_name` varchar(50) NOT NULL,
  `smobile1` varchar(25) NOT NULL,
  `shipping_mobile1` varchar(20) NOT NULL,
  `smobile2` varchar(250) NOT NULL,
  `shipping_mobile2` varchar(20) NOT NULL,
  `GstNo` varchar(50) NOT NULL,
  `saddress` text NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `scity` varchar(250) NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `sstate` varchar(250) NOT NULL,
  `shipping_state` varchar(100) NOT NULL,
  `semail` text NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `sbrand` text NOT NULL,
  `sdescription` text NOT NULL,
  `opening_balance` varchar(300) NOT NULL,
  `ledger_group` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `TAccountNo` int(11) NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`sid`, `sname`, `shipping_name`, `smobile1`, `shipping_mobile1`, `smobile2`, `shipping_mobile2`, `GstNo`, `saddress`, `shipping_address`, `scity`, `shipping_city`, `sstate`, `shipping_state`, `semail`, `shipping_email`, `sbrand`, `sdescription`, `opening_balance`, `ledger_group`, `status`, `TAccountNo`, `LedgerId`, `franchisee_id`, `vendor_id`) VALUES
(5, 'vertex', 'vertex', '9876543212', '9876543212', '1234556789', '1234556789', '33ed34567cgh87', 'Ram Nagar', 'Ram Nagar', 'cbe', 'cbe', 'TAMILNADU', 'TAMILNADU', 'vertex@gmail.com', 'vertex@gmail.com', '', 'test', '548.76', '23', 'Active', 0, 22, 0, ''),
(6, 'TVS Motors', 'TVS Motors', '', '', '', '', '', '', '', '', '', 'TAMILNADU', 'TAMILNADU', '', '', '', '', '23600.6', '23', 'Active', 0, 24, 0, ''),
(7, 'vertex', 'vertex', '9566856985', '9566856985', '', '', '33asd54875aad', 'ram nagar', 'ram nagar', 'cbe', 'cbe', 'TAMILNADU', 'TAMILNADU', 'vertex@gmail.com', 'vertex@gmail.com', '', 'Test', '20800', '23', 'Active', 0, 27, 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `m_unit_master`
--

CREATE TABLE `m_unit_master` (
  `id` int(11) NOT NULL,
  `u_id` varchar(250) NOT NULL,
  `u_name` varchar(250) NOT NULL,
  `u_description` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_unit_master`
--

INSERT INTO `m_unit_master` (`id`, `u_id`, `u_name`, `u_description`, `status`) VALUES
(1, '', 'Nos', 'Nos', 'Active'),
(2, '', 'NA', 'Not applicable', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_vehicle_brand`
--

CREATE TABLE `m_vehicle_brand` (
  `Id` int(11) NOT NULL,
  `VehicleBrand` varchar(90) NOT NULL,
  `VehicleDescription` text NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_vehicle_brand`
--

INSERT INTO `m_vehicle_brand` (`Id`, `VehicleBrand`, `VehicleDescription`, `Status`) VALUES
(1, 'Audi', 'Audi', 'Active'),
(2, 'BMW', 'BMW', 'Active'),
(3, 'Chevrolet', 'Chevrolet', 'Active'),
(4, 'Fiat', 'Fiat', 'Active'),
(5, 'Ford', 'Ford', 'Active'),
(6, 'Honda', 'Honda', 'Active'),
(7, 'Maruthi Suzuki', 'Maruthi Suzuki', 'Active'),
(8, 'Mahindra', 'Mahindra', 'Active'),
(9, 'ML320CDI', 'ML320CDI', 'Active'),
(10, 'Nissan', 'Nissan', 'Active'),
(11, 'Skoda', 'Skoda', 'Active'),
(12, 'Tata', 'Tata', 'Active'),
(13, 'Rolls Royce', 'Rolls Royce', 'Active'),
(14, 'Volkswagen', 'Volkswagen', 'Active'),
(15, 'Volvo', 'Volvo', 'Active'),
(16, 'Toyota', 'Toyota', 'Active'),
(17, 'Hyundai', 'Hyundai', 'Active'),
(18, 'Mitsubishi', 'Mitsubishi', 'Active'),
(19, 'Mini', 'Mini', 'Active'),
(20, 'Datsun', 'Datsun', 'Active'),
(21, 'Renault', 'Renault', 'Active'),
(22, 'Lamborghini', 'Lamborghini', 'Active'),
(23, 'Land Rover', 'Land Rover', 'Active'),
(24, 'Jaguar', 'Jaguar', 'Active'),
(25, 'Aston Martin', 'Aston Martin', 'Active'),
(26, 'Jeep', 'Jeep', 'Active'),
(27, 'Lexus', 'Lexus', 'Active'),
(28, 'Honda', 'Honda', 'Active'),
(29, 'Suzuki', 'Suzuki', 'Active'),
(30, 'Hero', 'Hero', 'Active'),
(31, 'Bajaj', 'Bajaj', 'Active'),
(32, 'Piaggio', 'Piaggio', 'Active'),
(33, 'BMW', 'BMW', 'Active'),
(34, 'Ducati', 'Ducati', 'Active'),
(35, 'Harley Davidson', 'Harley Davidson', 'Active'),
(36, 'Kawasaki', 'Kawasaki', 'Active'),
(37, 'KTM', 'KTM', 'Active'),
(38, 'Mahindra', 'Mahindra', 'Active'),
(39, 'Royal Enfield', 'Royal Enfield', 'Active'),
(40, 'TVS', 'TVS', 'Active'),
(41, 'Vespa', 'Vespa', 'Active'),
(42, 'Yamaha', 'Yamaha', 'Active'),
(43, 'Enfield', '', 'Active'),
(44, 'HERO HONDA', 'HERO HONDA', 'Active'),
(45, 'BENELLI', 'BENELLI', 'Active'),
(46, 'DC', 'Dc', 'Active'),
(47, 'OPEL', 'OPEL', 'Active'),
(48, 'MG HECTOR', 'MG HECTOR', 'Active'),
(49, 'Hindustan motors', 'Hindustan motors', 'Active'),
(50, 'RENEGADE', 'RENEGADE', 'Active'),
(51, 'KIA', 'KIA', 'Active'),
(52, 'ISUZU', 'ISUZU', 'Active'),
(53, 'TRIUMPH', 'TRIUMPH', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_vehicle_type`
--

CREATE TABLE `m_vehicle_type` (
  `Id` int(11) NOT NULL,
  `VehicleType` varchar(90) NOT NULL,
  `VehicleDescription` text NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_vehicle_type`
--

INSERT INTO `m_vehicle_type` (`Id`, `VehicleType`, `VehicleDescription`, `Status`) VALUES
(1, 'Two wheeler', 'Two wheeler', 'Active'),
(2, 'Four wheeler', 'Four wheeler', 'Active'),
(3, 'NA', 'Not Applicable', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `m_vendor`
--

CREATE TABLE `m_vendor` (
  `id` int(11) NOT NULL,
  `franchisee_id` varchar(250) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `franchisee_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `cen_manager` varchar(250) NOT NULL,
  `con_number` varchar(25) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `img` varchar(300) NOT NULL,
  `Remarks` text NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `website` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_vendor`
--

INSERT INTO `m_vendor` (`id`, `franchisee_id`, `vendor_id`, `franchisee_name`, `address`, `city`, `mobile`, `cen_manager`, `con_number`, `gst_no`, `status`, `img`, `Remarks`, `LedgerId`, `website`, `email`) VALUES
(6, 'F1', 6, 'RAGHAVENDRA MOTORS', 'NO.4, ERIKARAI STREET, NESAPAKKAM, CHENNAI-78', '', '9841041999', 'DIVAKARAN', '9841041999', '', 'Active', 'company_logo/', '', 0, 'www.raghavendramotors.com', 'd9841259999@gmail.com'),
(7, 'F2', 7, 'VERTEX SOLUTIONS', '198, NEHRU STREET, RAMNAGAR, COIMBATORE', 'COIMBATORE', '9566969517', '', '', '', 'Active', 'company_logo/Vertex logo.jpg', '', 0, '', ''),
(8, 'F1', 36, 'SS CAR SERVICE', '', '', '7708714543', 'Prabha', '7708714543', '', 'Active', '', '', 0, '', 'subhasribaskar@gmail.com'),
(9, 'F4', 20, 'ECO CAR SPA - CAR SERVICES', 'NO: 3, LIBRARY STREET ', '', '9790420994', 'Lokesh  ', '9790420994', '', 'Active', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `painter_outstanding`
--

CREATE TABLE `painter_outstanding` (
  `Id` int(11) NOT NULL,
  `PainterName` int(11) NOT NULL,
  `InvoiceId` int(11) NOT NULL,
  `PaidDate` date NOT NULL,
  `PaidAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_voucher`
--

CREATE TABLE `payment_voucher` (
  `id` int(12) NOT NULL,
  `v_id` varchar(12) NOT NULL,
  `v_date` date NOT NULL,
  `cust_name` varchar(20) NOT NULL,
  `out_amt` decimal(9,2) NOT NULL,
  `out_amt_ad` decimal(9,2) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `cdetails` varchar(50) NOT NULL,
  `Cashamt` decimal(20,0) NOT NULL,
  `Totamt` decimal(20,0) NOT NULL,
  `BankName` varchar(50) NOT NULL,
  `AccountNo` varchar(50) NOT NULL,
  `ChequeNumber` varchar(50) NOT NULL,
  `ETransfer` varchar(50) NOT NULL,
  `ChequeDeposit` varchar(50) NOT NULL,
  `BankId` varchar(50) NOT NULL,
  `LedgerId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_service`
--

CREATE TABLE `pending_service` (
  `id` int(11) NOT NULL,
  `pending_no` varchar(300) NOT NULL,
  `pending_date` date NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `vehicle_no` varchar(300) NOT NULL,
  `mobile` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `date_since` date NOT NULL,
  `pending_days` varchar(300) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `other` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_outstanding`
--

CREATE TABLE `p_outstanding` (
  `id` int(11) NOT NULL,
  `pno` varchar(20) NOT NULL,
  `pdate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `pamount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rno` varchar(25) NOT NULL,
  `supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_outstanding_history`
--

CREATE TABLE `p_outstanding_history` (
  `id` int(11) NOT NULL,
  `vdate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `pno` varchar(25) NOT NULL,
  `rno` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_voucher`
--

CREATE TABLE `receipt_voucher` (
  `id` int(11) NOT NULL,
  `sid` int(50) NOT NULL,
  `stid` int(50) NOT NULL,
  `Voucher_Id` int(20) NOT NULL,
  `cust_id` varchar(300) NOT NULL,
  `invoice` varchar(300) NOT NULL,
  `invoice_amt` varchar(300) NOT NULL,
  `p_date` varchar(300) NOT NULL,
  `paid_amt` varchar(300) NOT NULL,
  `paid_date` varchar(300) NOT NULL,
  `balance_amt` varchar(300) NOT NULL,
  `total_outstanding` varchar(300) NOT NULL,
  `ad_amount` varchar(11) NOT NULL,
  `tran_amount` varchar(11) NOT NULL,
  `payment_mode` text NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `Rtype` varchar(50) NOT NULL,
  `franchisee_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference_scheme`
--

CREATE TABLE `reference_scheme` (
  `Id` int(11) NOT NULL,
  `ReferenceId` varchar(300) NOT NULL,
  `ReferenceAmount` float NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_scheme`
--

INSERT INTO `reference_scheme` (`Id`, `ReferenceId`, `ReferenceAmount`, `franchisee_id`, `vendor_id`, `status`) VALUES
(2, 'RLS-1', 100, 0, '', 'Active'),
(3, 'RLS-2', 100, 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `referrer_scheme`
--

CREATE TABLE `referrer_scheme` (
  `Id` int(11) NOT NULL,
  `ReferenceId` varchar(300) NOT NULL,
  `ReferenceAmount` float NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referrer_scheme`
--

INSERT INTO `referrer_scheme` (`Id`, `ReferenceId`, `ReferenceAmount`, `franchisee_id`, `vendor_id`, `status`) VALUES
(2, 'RRS-1', 100, 0, '', 'Active'),
(3, 'RRS-2', 100, 9, '7', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice`
--

CREATE TABLE `sales_invoice` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `sdate` date NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `cname` varchar(250) NOT NULL,
  `cust_out_stand` int(11) NOT NULL,
  `gstin` varchar(250) NOT NULL,
  `total_amt` decimal(9,2) NOT NULL,
  `discount_per` decimal(9,2) NOT NULL,
  `dicount_amt` decimal(9,2) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `TotalTaxAmount` decimal(9,2) NOT NULL,
  `bill_amt` decimal(9,2) NOT NULL,
  `ActualSellingPrice` decimal(9,2) NOT NULL,
  `rec_amt` decimal(9,2) NOT NULL,
  `bal_amt` decimal(9,2) NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `bill_status` varchar(250) NOT NULL,
  `LedgerGroup` varchar(100) NOT NULL,
  `LedgerId` int(20) NOT NULL,
  `AccountNo` varchar(300) NOT NULL,
  `ChequeNumber` varchar(200) NOT NULL,
  `AMCUsed` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_invoice`
--

INSERT INTO `sales_invoice` (`id`, `inv_no`, `sdate`, `branch_name`, `cname`, `cust_out_stand`, `gstin`, `total_amt`, `discount_per`, `dicount_amt`, `total`, `TotalTaxAmount`, `bill_amt`, `ActualSellingPrice`, `rec_amt`, `bal_amt`, `payment_mode`, `FranchiseeId`, `vendor_id`, `description`, `bill_status`, `LedgerGroup`, `LedgerId`, `AccountNo`, `ChequeNumber`, `AMCUsed`) VALUES
(1, 'SA1', '2020-05-04', '7', '4', 0, '', '1016.95', '0.00', '0.00', '0.00', '183.05', '0.00', '1200.00', '0.00', '0.00', '', '9', '7', '', 'Open', '', 0, '', '', '0.00'),
(2, 'SA2', '2020-05-04', '7', '4', 0, '', '1016.95', '0.00', '0.00', '0.00', '183.05', '0.00', '1200.00', '0.00', '0.00', '', '9', '7', '', 'Open', '', 0, '', '', '0.00'),
(3, 'SA3', '2020-05-12', '7', '4', 0, '', '20.34', '0.00', '0.00', '0.00', '3.66', '0.00', '24.00', '0.00', '0.00', '', '9', '7', '', 'Open', '', 0, '', '', '0.00'),
(4, 'SA4', '2020-05-12', '7', '4', 0, '', '1016.95', '0.00', '0.00', '0.00', '183.05', '0.00', '1200.00', '0.00', '0.00', '', '9', '7', '', 'Open', '', 0, '', '', '0.00'),
(5, 'SA5', '2020-05-12', '7', '4', 0, '', '677.97', '0.00', '0.00', '0.00', '122.03', '0.00', '800.00', '0.00', '0.00', '', '9', '7', '', 'Open', '', 0, '', '', '0.00'),
(6, 'SA6', '2020-05-13', '7', '4', 0, '', '2142.84', '0.00', '0.00', '0.00', '385.71', '0.00', '2528.55', '0.00', '0.00', '', '9', '7', '', 'Open', '', 0, '', '', '0.00'),
(7, 'SA7', '2020-05-18', '7', '4', 0, '', '122.04', '0.00', '0.00', '0.00', '21.97', '0.00', '144.01', '0.00', '0.00', '', '9', '7', '', 'Open', '', 0, '', '', '0.00'),
(8, 'SA8', '2020-05-26', '7', '3', 0, '', '101.70', '0.00', '0.00', '0.00', '18.31', '0.00', '120.01', '0.00', '0.00', '', '9', '7', '', 'Open', '', 0, '', '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice_details`
--

CREATE TABLE `sales_invoice_details` (
  `id` int(11) NOT NULL,
  `inv_id` int(20) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `spard_brand` int(20) NOT NULL,
  `spare_name` int(20) NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `mrp` float NOT NULL,
  `TaxOfMrp` float NOT NULL,
  `BeforeTaxOfMrp` float NOT NULL,
  `qty` float NOT NULL,
  `total` float NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float NOT NULL,
  `igst` float NOT NULL,
  `tax_amt` float NOT NULL,
  `total_amount` float NOT NULL,
  `sdate` date NOT NULL,
  `bill_status` varchar(10) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_invoice_details`
--

INSERT INTO `sales_invoice_details` (`id`, `inv_id`, `inv_no`, `spard_brand`, `spare_name`, `hsn_code`, `mrp`, `TaxOfMrp`, `BeforeTaxOfMrp`, `qty`, `total`, `cgst`, `sgst`, `igst`, `tax_amt`, `total_amount`, `sdate`, `bill_status`, `franchisee_id`, `vendor_id`) VALUES
(1, 1, 'SA1', 8, 5, '', 1200, 18, 1016.95, 1, 1016.95, 9, 9, 0, 183.05, 1200, '2020-05-04', 'Open', 9, '7'),
(2, 2, 'SA2', 8, 5, '', 1200, 18, 1016.95, 1, 1016.95, 9, 9, 0, 183.05, 1200, '2020-05-04', 'Open', 9, '7'),
(3, 3, 'SA3', 7, 4, '', 12, 18, 10.17, 2, 20.34, 9, 9, 0, 3.66, 24, '2020-05-12', 'Open', 9, '7'),
(4, 4, 'SA4', 8, 5, '', 1200, 18, 1016.95, 1, 1016.95, 9, 9, 0, 183.05, 1200, '2020-05-12', 'Open', 9, '7'),
(5, 5, 'SA5', 8, 6, '', 800, 18, 677.97, 1, 677.97, 9, 9, 0, 122.03, 800, '2020-05-12', 'Open', 9, '7'),
(6, 6, 'SA6', 9, 8, '', 200, 12, 178.57, 12, 2142.84, 9, 9, 0, 385.71, 2528.55, '2020-05-13', 'Open', 9, '7'),
(7, 7, 'SA7', 7, 4, '', 12, 18, 10.17, 12, 122.04, 9, 9, 0, 21.97, 144.01, '2020-05-18', 'Open', 9, '7'),
(8, 8, 'SA8', 7, 4, '321	  ', 12, 18, 10.17, 10, 101.7, 9, 9, 0, 18.31, 120.01, '2020-05-26', 'Open', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice_return`
--

CREATE TABLE `sales_invoice_return` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(300) NOT NULL,
  `rdate` date NOT NULL,
  `branch_name` int(12) NOT NULL,
  `cust_name` int(30) NOT NULL,
  `spare_brand` int(16) NOT NULL,
  `spare_name` int(16) NOT NULL,
  `mrp` decimal(9,3) NOT NULL,
  `qty` decimal(9,3) NOT NULL,
  `total_amt` decimal(9,3) NOT NULL,
  `discount_per` decimal(9,3) NOT NULL,
  `discount_amt` decimal(9,3) NOT NULL,
  `total` decimal(9,3) NOT NULL,
  `sgst` decimal(9,2) NOT NULL,
  `cgst` decimal(9,2) NOT NULL,
  `igst` decimal(9,2) NOT NULL,
  `gst_amt` decimal(9,3) NOT NULL,
  `net_amt` decimal(9,3) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `q_no` varchar(50) NOT NULL,
  `pdate` date NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `outstand` varchar(250) NOT NULL,
  `gstin` varchar(200) NOT NULL,
  `status` varchar(250) NOT NULL,
  `description` varchar(300) NOT NULL,
  `paymentoption` varchar(100) NOT NULL,
  `FranchiseeId` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `purchase_details` varchar(250) NOT NULL,
  `LedgerGroup` int(11) NOT NULL,
  `GstAmount` decimal(9,2) NOT NULL,
  `TotalPurchaseAmount` decimal(9,2) NOT NULL,
  `PaidAmount` decimal(9,2) NOT NULL,
  `PendingAmount` decimal(9,2) NOT NULL,
  `AccountNo` varchar(300) NOT NULL,
  `ChequeNumber` varchar(300) NOT NULL,
  `PurchasePhoto` varchar(250) NOT NULL,
  `PurchaseOrderNo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `inv_no`, `q_no`, `pdate`, `supplier_name`, `outstand`, `gstin`, `status`, `description`, `paymentoption`, `FranchiseeId`, `vendor_id`, `purchase_details`, `LedgerGroup`, `GstAmount`, `TotalPurchaseAmount`, `PaidAmount`, `PendingAmount`, `AccountNo`, `ChequeNumber`, `PurchasePhoto`, `PurchaseOrderNo`) VALUES
(28, 'SI23', 'Q21', '2020-05-14', '3', '0.00', '', 'Active', '', 'Cash', 9, '7', 'Open', 21, '14.40', '134.40', '130.00', '4.40', '', '', '2135251512.', ''),
(29, 'SI24', 'Q22', '2020-05-14', '3', '0.00', '', 'Active', '', 'Cash', 9, '7', 'Open', 21, '85.44', '797.44', '797.00', '0.44', '', '', '394883672.', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_details`
--

CREATE TABLE `sales_order_details` (
  `id` int(11) NOT NULL,
  `inv_no` int(11) NOT NULL,
  `q_no` varchar(50) NOT NULL,
  `supplier_name` int(30) NOT NULL,
  `spare_brand` int(30) NOT NULL,
  `spare_name` int(30) NOT NULL,
  `spare_part_no` varchar(200) NOT NULL,
  `unit` int(30) NOT NULL,
  `mrp` decimal(9,2) NOT NULL,
  `discount_per` decimal(9,2) NOT NULL,
  `discount_amt` decimal(9,2) NOT NULL,
  `purchase_rate` decimal(9,2) NOT NULL,
  `qty` float NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `igst` float NOT NULL,
  `gst_amt` decimal(9,2) NOT NULL,
  `TotalGstPer` int(11) NOT NULL,
  `total_amount` decimal(9,2) NOT NULL,
  `status` text NOT NULL,
  `pdate` date NOT NULL,
  `purchase_details` varchar(30) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_details`
--

INSERT INTO `sales_order_details` (`id`, `inv_no`, `q_no`, `supplier_name`, `spare_brand`, `spare_name`, `spare_part_no`, `unit`, `mrp`, `discount_per`, `discount_amt`, `purchase_rate`, `qty`, `total`, `sgst`, `cgst`, `igst`, `gst_amt`, `TotalGstPer`, `total_amount`, `status`, `pdate`, `purchase_details`, `franchisee_id`, `vendor_id`) VALUES
(20, 28, 'Q21', 3, 9, 8, '456', 1, '0.00', '0.00', '0.00', '8.00', 15, '120.00', 6, 6, 0, '14.40', 12, '134.40', 'Active', '2020-05-14', 'Open', 9, '7'),
(21, 29, 'Q22', 3, 9, 8, '456', 1, '0.00', '0.00', '0.00', '89.00', 8, '712.00', 6, 6, 0, '85.44', 12, '797.44', 'Active', '2020-05-14', 'Open', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_details_temp`
--

CREATE TABLE `sales_order_details_temp` (
  `id` int(11) NOT NULL,
  `q_no` varchar(100) NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `outstand` decimal(9,2) NOT NULL,
  `gstin` varchar(300) NOT NULL,
  `spare_brand` int(30) NOT NULL,
  `spare_name` int(30) NOT NULL,
  `spare_part_no` varchar(200) NOT NULL,
  `unit` int(30) NOT NULL,
  `mrp` decimal(9,3) NOT NULL,
  `discount` decimal(9,2) NOT NULL,
  `discount_amt` decimal(9,2) NOT NULL,
  `purchase_rate` decimal(9,2) NOT NULL,
  `qty` decimal(9,3) NOT NULL,
  `total` decimal(9,3) NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `igst` float NOT NULL,
  `TotalGstPer` int(11) NOT NULL,
  `gst_amt` decimal(9,3) NOT NULL,
  `net_amount` decimal(9,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_receipt_transaction`
--

CREATE TABLE `sales_receipt_transaction` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `vid` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` varchar(50) NOT NULL,
  `sbid` int(11) NOT NULL,
  `srid` int(50) NOT NULL,
  `jid` int(10) NOT NULL,
  `cdate` date NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `BankNameT` varchar(50) NOT NULL,
  `BCash` decimal(9,2) NOT NULL,
  `BCashP` decimal(9,2) NOT NULL,
  `BCashS` decimal(9,2) NOT NULL,
  `apamount` decimal(9,2) NOT NULL,
  `bpamount` decimal(9,2) NOT NULL,
  `franchisee_id` varchar(12) NOT NULL,
  `vtype` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sup_outstanding`
--

CREATE TABLE `sup_outstanding` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(300) NOT NULL,
  `invoice` varchar(300) NOT NULL,
  `invoice_amt` varchar(300) NOT NULL,
  `p_date` varchar(300) NOT NULL,
  `paid_amt` varchar(300) NOT NULL,
  `paid_date` varchar(300) NOT NULL,
  `balance_amt` varchar(300) NOT NULL,
  `total_outstanding` varchar(300) NOT NULL,
  `ad_amount` varchar(11) NOT NULL,
  `tran_amount` varchar(11) NOT NULL,
  `payment_mode` varchar(10) NOT NULL,
  `AccountNo` varchar(300) NOT NULL,
  `ChequeNumber` varchar(300) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sup_outstanding`
--

INSERT INTO `sup_outstanding` (`id`, `cust_name`, `invoice`, `invoice_amt`, `p_date`, `paid_amt`, `paid_date`, `balance_amt`, `total_outstanding`, `ad_amount`, `tran_amount`, `payment_mode`, `AccountNo`, `ChequeNumber`, `franchisee_id`, `vendor_id`) VALUES
(13, 'vertex', '0', '0', '2020-04-25', '0', '2020-04-25', '0', '0', '', '0', 'cash', '', '', 0, ''),
(14, 'TVS Motors', '0', '0', '2020-04-27', '0', '2020-04-27', '0', '0', '', '0', 'cash', '', '', 0, ''),
(15, '6', '665', '23600', '2020-04-27', '0', '', '23600', '23600', '', '0', '', '', '', 0, ''),
(16, '', '', '', '0000-00-00', '0', '', '0', '0', '', '0', '', '', '', 0, ''),
(17, '6', '2', '141.6', '2020-05-04', '0', '', '23600.6', '23600.6', '', '0', '', '', '', 0, ''),
(18, '', 'Q1', '287.92', '2020-05-05', '0', '', '0', '0', '', '0', '', '', '', 0, ''),
(19, '3', 'Q2', '7080', '2020-05-06', '0', '', '7080', '7080', '', '0', '', '', '', 0, ''),
(20, '3', 'Q3', '11969.92', '2020-05-06', '0', '', '7080', '7080', '', '0', '', '', '', 0, ''),
(21, '3', 'Q4', '138.63', '2020-05-06', '0', '', '7080', '7080', '', '0', '', '', '', 0, ''),
(22, '', '6', '', '', '0', '', '0', '0', '', '0', '', '', '', 0, ''),
(23, '3', 'Q6', '169.92', '2020-05-11', '0', '', '7080', '7080', '', '0', '', '', '', 0, ''),
(24, 'vertex', '0', '0', '2020-05-12', '0', '2020-05-12', '0', '0', '', '0', 'cash', '', '', 0, ''),
(25, '5', '1', '141.6', '2020-05-12', '0', '', '41.6', '41.6', '', '0', '', '', '', 0, ''),
(26, '--Select The Name--', '6', '1416', '2020-05-12', '0', '', '16', '16', '', '0', '', '', '', 0, ''),
(27, '3', 'Q6', '', '2020-05-11', '0', '', '7080.52', '7080.52', '', '0', '', '', '', 0, ''),
(28, '3', 'Q6', '', '2020-05-11', '0', '', '7081.04', '7081.04', '', '0', '', '', '', 0, ''),
(29, '3', 'Q6', '', '2020-05-11', '0', '', '7081.56', '7081.56', '', '0', '', '', '', 0, ''),
(30, '3', 'Q6', '0', '2020-05-11', '0', '', '7082.08', '7082.08', '', '0', '', '', '', 0, ''),
(31, '3', 'Q11', '7844.64', '2020-05-12', '0', '', '7082.08', '7082.08', '', '0', '', '', '', 0, ''),
(32, '3', 'Q11', '0', '2020-05-12', '0', '', '7082.72', '7082.72', '', '0', '', '', '', 0, ''),
(33, '3', 'Q11', '0', '2020-05-12', '0', '', '7083.36', '7083.36', '', '0', '', '', '', 0, ''),
(34, '3', 'Q11', '0', '2020-05-12', '0', '', '7084', '7084', '', '0', '', '', '', 0, ''),
(35, '3', 'Q16', '169.92', '2020-05-12', '0', '', '7084', '7084', '', '0', '', '', '', 0, ''),
(36, '3', 'Q17', '169.92', '2020-05-12', '0', '', '7084', '7084', '', '0', '', '', '', 0, ''),
(37, '3', 'Q17', '0', '2020-05-12', '0', '', '7084.92', '7084.92', '', '0', '', '', '', 0, ''),
(38, '5', '2', '134.4', '2020-05-14', '0', '', '42', '42', '', '0', '', '', '', 0, ''),
(39, '5', '3', '161.28', '2020-05-14', '0', '', '42.28', '42.28', '', '0', '', '', '', 0, ''),
(40, '3', 'Q17', '0', '2020-05-12', '0', '', '7085.84', '7085.84', '', '0', '', '', '', 0, ''),
(41, '3', 'Q11', '0', '2020-05-12', '0', '', '7086.48', '7086.48', '', '0', '', '', '', 0, ''),
(42, '3', 'Q16', '0', '2020-05-12', '0', '', '7087.4', '7087.4', '', '0', '', '', '', 0, ''),
(43, '3', 'Q17', '0', '2020-05-12', '0', '', '7088.32', '7088.32', '', '0', '', '', '', 0, ''),
(44, '3', 'Q17', '0', '2020-05-12', '0', '', '7098.24', '7098.24', '', '0', '', '', '', 0, ''),
(45, '3', 'Q17', '0', '2020-05-12', '0', '', '7108.16', '7108.16', '', '0', '', '', '', 0, ''),
(46, '3', 'Q17', '0', '2020-05-12', '0', '', '7109.08', '7109.08', '', '0', '', '', '', 0, ''),
(47, '3', 'Q17', '0', '2020-05-12', '0', '', '7110', '7110', '', '0', '', '', '', 0, ''),
(48, '3', 'Q17', '0', '2020-05-12', '0', '', '7110.92', '7110.92', '', '0', '', '', '', 0, ''),
(49, '3', 'Q17', '0', '2020-05-12', '0', '', '7111.84', '7111.84', '', '0', '', '', '', 0, ''),
(50, '3', 'Q17', '0', '2020-05-12', '0', '', '7112.76', '7112.76', '', '0', '', '', '', 0, ''),
(51, '3', 'Q17', '0', '2020-05-12', '0', '', '7113.68', '7113.68', '', '0', '', '', '', 0, ''),
(52, '3', 'Q17', '0', '2020-05-12', '0', '', '7114.6', '7114.6', '', '0', '', '', '', 0, ''),
(53, '3', 'Q17', '0', '2020-05-12', '0', '', '7115.52', '7115.52', '', '0', '', '', '', 0, ''),
(54, '3', 'Q17', '0', '2020-05-12', '0', '', '7116.44', '7116.44', '', '0', '', '', '', 0, ''),
(55, '3', 'Q17', '0', '2020-05-12', '0', '', '7126.36', '7126.36', '', '0', '', '', '', 0, ''),
(56, '3', 'Q17', '0', '2020-05-12', '0', '', '7196.28', '7196.28', '', '0', '', '', '', 0, ''),
(57, '3', 'Q17', '0', '2020-05-12', '0', '', '7266.2', '7266.2', '', '0', '', '', '', 0, ''),
(58, '3', 'Q17', '0', '2020-05-12', '0', '', '7336.12', '7336.12', '', '0', '', '', '', 0, ''),
(59, '3', 'Q20', '268.8', '2020-05-14', '0', '', '7336.12', '7336.12', '', '0', '', '', '', 0, ''),
(60, '3', 'Q20', '0', '2020-05-14', '0', '', '7336.92', '7336.92', '', '0', '', '', '', 0, ''),
(61, '3', 'Q17', '0', '2020-05-12', '0', '', '7337.84', '7337.84', '', '0', '', '', '', 0, ''),
(62, '3', 'Q21', '134.4', '2020-05-14', '0', '', '7337.84', '7337.84', '', '0', '', '', '', 0, ''),
(63, '3', 'Q21', '0', '2020-05-14', '0', '', '7338.24', '7338.24', '', '0', '', '', '', 0, ''),
(64, '3', 'Q21', '0', '2020-05-14', '0', '', '7342.64', '7342.64', '', '0', '', '', '', 0, ''),
(65, '', 'Q22', '797.44', '2020-05-14', '0', '', '0', '0', '', '0', '', '', '', 0, ''),
(66, '3', 'Q22', '0', '2020-05-14', '0', '', '7343.08', '7343.08', '', '0', '', '', '', 0, ''),
(67, '5', '1', '89.68', '2020-05-12', '0', '', '42.96', '42.96', '', '0', '', '', '', 0, ''),
(68, '5', '1', '120.00', '2020-05-12', '0', '', '39.96', '39.96', '', '0', '', '', '', 0, ''),
(69, '5', '1', '', '2020-05-12', '', '', '41.6', '39.96', '', '', '', '', '', 0, ''),
(70, '5', '1', '', '2020-05-12', '', '', '41.6', '39.96', '', '', '', '', '', 0, ''),
(71, '5', '2', '', '2020-05-14', '', '', '42', '39.96', '', '', '', '', '', 0, ''),
(72, '--Select The Name--', '6', '', '2020-05-12', '', '', '16', '16', '', '', '', '', '', 0, ''),
(73, '5', '1', '', '2020-05-12', '', '', '41.6', '39.96', '', '', '', '', '', 0, ''),
(74, '5', '4', '2508.8', '2020-05-18', '0', '', '548.76', '548.76', '', '0', '', '', '', 9, '7'),
(75, '7', '13', '2360.00', '2020-05-19', '0', '', '0', '0', '', '0', '', '', '', 0, ''),
(76, '7', '20', '70800.00', '2020-05-20', '0', '', '20800', '20800', '', '0', '', '', '', 0, ''),
(77, '5', '1', '', '2020-05-20', '41.6', '', '0', '507.16', '0', '100', '', '', '', 0, ''),
(78, '7', '22', '708.00', '2020-05-26', '0', '', '20800', '20800', '', '0', '', '', '', 0, ''),
(79, '3', 'Q23', '1008', '2020-05-27', '0', '', '7343.08', '7343.08', '', '0', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `s_add_package`
--

CREATE TABLE `s_add_package` (
  `Id` int(11) NOT NULL,
  `PackageId` int(11) NOT NULL,
  `VehicleId` varchar(25) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `AvailableAmount` decimal(9,2) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_estimate`
--

CREATE TABLE `s_estimate` (
  `id` int(11) NOT NULL,
  `eno` varchar(300) NOT NULL,
  `edate` date NOT NULL,
  `evehicle_no` varchar(300) NOT NULL,
  `ejcn` varchar(300) NOT NULL,
  `emobile` varchar(300) NOT NULL,
  `ename` varchar(300) NOT NULL,
  `eppn` varchar(300) NOT NULL,
  `esce` varchar(300) NOT NULL,
  `elce` varchar(300) NOT NULL,
  `tce` varchar(300) NOT NULL,
  `remarks` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_jobcard_accesories_main`
--

CREATE TABLE `s_jobcard_accesories_main` (
  `id` int(12) NOT NULL,
  `job_card_no` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `smrp` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_jobcard_accessories`
--

CREATE TABLE `s_jobcard_accessories` (
  `id` int(12) NOT NULL,
  `session_id` varchar(70) NOT NULL,
  `job_card_no` varchar(50) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `smrp` decimal(9,2) NOT NULL,
  `FranchiseeId` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `UserId` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_jobcard_images`
--

CREATE TABLE `s_jobcard_images` (
  `id` int(11) NOT NULL,
  `JobCardId` int(11) NOT NULL,
  `VImage1` varchar(300) NOT NULL,
  `VImage2` varchar(300) NOT NULL,
  `VImage3` varchar(300) NOT NULL,
  `VImage4` varchar(300) NOT NULL,
  `VImage5` varchar(300) NOT NULL,
  `VImage6` varchar(300) NOT NULL,
  `VImage7` varchar(300) NOT NULL,
  `VImage8` varchar(300) NOT NULL,
  `VImage9` varchar(300) NOT NULL,
  `VImage10` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_jobcard_images`
--

INSERT INTO `s_jobcard_images` (`id`, `JobCardId`, `VImage1`, `VImage2`, `VImage3`, `VImage4`, `VImage5`, `VImage6`, `VImage7`, `VImage8`, `VImage9`, `VImage10`) VALUES
(1, 205, '', '', '', '', '', '', '', '', '', ''),
(2, 206, '', '', '', '', '', '', '', '', '', ''),
(3, 207, '', '', '', '', '', '', '', '', '', ''),
(4, 208, '', '', '', '', '', '', '', '', '', ''),
(5, 209, '', '', '', '', '', '', '', '', '', ''),
(6, 210, '', '', '', '', '', '', '', '', '', ''),
(7, 211, '', '', '', '', '', '', '', '', '', ''),
(8, 212, '', '', '', '', '', '', '', '', '', ''),
(9, 213, '', '', '', '', '', '', '', '', '', ''),
(10, 214, '', '', '', '', '', '', '', '', '', ''),
(11, 215, '', '', '', '', '', '', '', '', '', ''),
(12, 216, '', '', '', '', '', '', '', '', '', ''),
(13, 217, '', '', '', '', '', '', '', '', '', ''),
(14, 218, '', '', '', '', '', '', '', '', '', ''),
(15, 219, '', '', '', '', '', '', '', '', '', ''),
(16, 220, '', '', '', '', '', '', '', '', '', ''),
(17, 221, '', '', '', '', '', '', '', '', '', ''),
(18, 222, '', '', '', '', '', '', '', '', '', ''),
(19, 223, '', '', '', '', '', '', '', '', '', ''),
(20, 224, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card`
--

CREATE TABLE `s_job_card` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `jdate` date NOT NULL,
  `vehicle_no` varchar(300) NOT NULL,
  `smobile` varchar(300) NOT NULL,
  `sname` varchar(300) NOT NULL,
  `saddress` varchar(300) NOT NULL,
  `kms` varchar(300) NOT NULL,
  `fuel` varchar(300) NOT NULL,
  `follow` varchar(300) NOT NULL,
  `total_amt` decimal(9,3) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `UserId` varchar(250) NOT NULL,
  `status` varchar(300) NOT NULL,
  `jcard_status` varchar(250) NOT NULL,
  `ServiceAdvisor` int(11) NOT NULL,
  `TechnicianName` int(11) NOT NULL,
  `DeliveryDate` date NOT NULL,
  `DeliveryTime` varchar(10) NOT NULL,
  `PaidAmount` decimal(9,2) NOT NULL,
  `BalanceAmount` decimal(9,2) NOT NULL,
  `Remarks` text NOT NULL,
  `ParticularInstructions` text NOT NULL,
  `description` varchar(300) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `AccountNo` varchar(100) NOT NULL,
  `ChequeNumber` varchar(100) NOT NULL,
  `LedgerId` int(20) NOT NULL,
  `BankId` int(20) NOT NULL,
  `ServiceAdditionalInfo` varchar(500) NOT NULL,
  `gst` decimal(9,2) NOT NULL,
  `gst_amt` decimal(9,2) NOT NULL,
  `IncludeGst` decimal(9,2) NOT NULL,
  `SecretPin` int(11) NOT NULL,
  `DiscountAmount` decimal(9,2) NOT NULL,
  `DiscountPercentage` float NOT NULL,
  `q1` decimal(9,2) NOT NULL,
  `q2` decimal(9,2) NOT NULL,
  `q3` decimal(9,2) NOT NULL,
  `q4` decimal(9,2) NOT NULL,
  `q5` decimal(9,2) NOT NULL,
  `q6` decimal(9,1) NOT NULL,
  `q7` decimal(9,1) NOT NULL,
  `RecommendUs` varchar(10) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `ReferencedBy` varchar(300) NOT NULL,
  `ReferencedMobileNo` int(11) NOT NULL,
  `ReferencedNote` varchar(300) NOT NULL,
  `CustomerSignature` longtext NOT NULL,
  `ReferralDiscount` varchar(5) NOT NULL,
  `acc_t_amt` decimal(9,2) NOT NULL,
  `financial_year` varchar(200) NOT NULL,
  `bookingid` int(11) NOT NULL,
  `source` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_job_card`
--

INSERT INTO `s_job_card` (`id`, `job_card_no`, `jdate`, `vehicle_no`, `smobile`, `sname`, `saddress`, `kms`, `fuel`, `follow`, `total_amt`, `FranchiseeId`, `vendor_id`, `UserId`, `status`, `jcard_status`, `ServiceAdvisor`, `TechnicianName`, `DeliveryDate`, `DeliveryTime`, `PaidAmount`, `BalanceAmount`, `Remarks`, `ParticularInstructions`, `description`, `customer_id`, `payment_mode`, `AccountNo`, `ChequeNumber`, `LedgerId`, `BankId`, `ServiceAdditionalInfo`, `gst`, `gst_amt`, `IncludeGst`, `SecretPin`, `DiscountAmount`, `DiscountPercentage`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `RecommendUs`, `Comments`, `ReferencedBy`, `ReferencedMobileNo`, `ReferencedNote`, `CustomerSignature`, `ReferralDiscount`, `acc_t_amt`, `financial_year`, `bookingid`, `source`) VALUES
(205, '-18', '2020-04-25', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '10000', '', '', '110.000', '', '', '12', 'Active', 'Ready To Delivery', 0, 0, '2020-04-25', '', '0.00', '129.80', '', '', '', 3, '', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(206, 'F2-19', '2020-05-11', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-11', '', '120.00', '9.00', '', '', '', 3, 'Cash', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(207, 'F2-20', '2020-05-11', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-11', '14:01', '29.00', '100.00', '', '', '', 3, 'Cash', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(209, 'F2-22', '2020-05-11', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-11', '', '100.00', '29.00', '', '', '', 3, 'Cash', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(210, 'F2-23', '2020-05-11', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-11', '', '29.00', '100.00', '', '', '', 3, 'Cash', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(211, 'F2-24', '2020-05-11', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-11', '', '100.00', '29.00', '', '', '', 3, 'Bank', '1', '', 26, 1, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(212, 'F2-25', '2020-05-11', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-11', '', '100.00', '29.00', '', '', '', 3, 'Cash', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(213, 'F2-26', '2020-05-20', 'TN07AS1526', '7339015392', 'SUHAIL', ' RAM NAGAR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-20', '', '0.00', '129.80', '', '', '', 4, '', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(214, 'F2-27', '2020-05-20', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-20', '', '50.00', '79.00', '', '', '', 3, 'Cash', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(215, 'F2-28', '2020-05-20', 'TN07AS1526', '7339015392', 'SUHAIL', ' RAM NAGAR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-20', '', '29.00', '100.00', '', '', '', 4, 'Cash', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(216, 'F2-29', '2020-05-22', 'TN07AS1526', '7339015392', 'SUHAIL', ' RAM NAGAR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-22', '', '0.00', '120.80', '', '', '', 4, '', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '9.00', 6.93, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(217, 'F2-30', '2020-05-23', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-23', '', '0.00', '129.80', '', '', '', 3, '', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(218, 'F2-31', '2020-05-26', 'TN07AS1526', '7010546939', 'SUHAIL', ' PODANOORR  ', '', '', '', '220.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-26', '', '0.00', '259.60', '', '', '', 0, '', '', '', 0, 0, '', '18.00', '39.60', '259.60', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(219, 'F2-32', '2020-05-28', 'TN09AS1234', '7708745120', 'SUBHA', ' DFG ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-28', '', '0.00', '129.80', '', '', '', 8, '', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(220, 'F2-33', '2020-05-30', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR    ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Ready To Delivery', 0, 0, '2020-05-30', '', '0.00', '110.00', '', '', '', 3, '', '', '', 0, 0, '', '0.00', '19.80', '110.00', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(221, 'F2-34', '2020-05-30', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Close', 0, 0, '2020-05-30', '', '0.00', '110.00', '', '', '', 3, '', '', '', 0, 0, '', '0.00', '0.00', '110.00', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(222, 'F2-35', '2020-05-30', 'TN09AS1234', '7708745120', 'SUBHA', ' DFG ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Open', 0, 0, '2020-05-30', '', '0.00', '129.80', '', '', '', 8, '', '', '', 0, 0, '', '18.00', '19.80', '129.80', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(223, 'F2-36 ', '2020-05-30', 'TN07AS1526', '9876443214', 'SUHAIL', ' PODANOORR  ', '', '', '', '0.000', '9', '7', '12', 'Active', 'Open', 0, 0, '2020-05-30', '', '0.00', '0.00', '', '', '', 3, '', '', '', 0, 0, '', '18.00', '0.00', '0.00', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, ''),
(224, 'F2-37  ', '2020-05-30', 'TN09AS1234', '7708745120', 'SUBHA', ' DFG  ', '', '', '', '110.000', '9', '7', '12', 'Active', 'Open', 0, 0, '2020-05-30', '', '0.00', '110.00', '', '', '', 8, '', '', '', 0, 0, '', '0.00', '39.60', '110.00', 0, '0.00', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '0.0', '0.0', '', '', '', 0, '', '', '', '0.00', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_check_list`
--

CREATE TABLE `s_job_card_check_list` (
  `id` int(11) NOT NULL,
  `JobCardId` int(8) NOT NULL,
  `DashBoardFull` int(11) NOT NULL,
  `DoorPads` int(11) NOT NULL,
  `Top` int(11) NOT NULL,
  `ACGrill` int(11) NOT NULL,
  `DoorPadTray` int(11) NOT NULL,
  `FloarMats` int(11) NOT NULL,
  `MicSystem` int(11) NOT NULL,
  `PowerWindowSwitchRear` int(11) NOT NULL,
  `PowerWindowSwitchFront` int(11) NOT NULL,
  `Steering` int(11) NOT NULL,
  `HeadRest` int(11) NOT NULL,
  `Floor` int(11) NOT NULL,
  `GearKnobArea` int(11) NOT NULL,
  `Seats` int(11) NOT NULL,
  `Dickey` int(11) NOT NULL,
  `Bonnet` int(11) NOT NULL,
  `SideMirrors` int(11) NOT NULL,
  `Tiers` int(11) NOT NULL,
  `DoorsTop` int(11) NOT NULL,
  `DoorInsideArea` int(11) NOT NULL,
  `AlloyWheels` int(11) NOT NULL,
  `Bumpers` int(11) NOT NULL,
  `WindscreenDoorGlassesRearGlass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_job_card_check_list`
--

INSERT INTO `s_job_card_check_list` (`id`, `JobCardId`, `DashBoardFull`, `DoorPads`, `Top`, `ACGrill`, `DoorPadTray`, `FloarMats`, `MicSystem`, `PowerWindowSwitchRear`, `PowerWindowSwitchFront`, `Steering`, `HeadRest`, `Floor`, `GearKnobArea`, `Seats`, `Dickey`, `Bonnet`, `SideMirrors`, `Tiers`, `DoorsTop`, `DoorInsideArea`, `AlloyWheels`, `Bumpers`, `WindscreenDoorGlassesRearGlass`) VALUES
(1, 205, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 206, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 210, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 212, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 211, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(7, 209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1),
(8, 213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 214, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1),
(10, 215, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 216, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 217, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 218, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 219, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 220, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 221, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_damge`
--

CREATE TABLE `s_job_card_damge` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `VehiclePartName` varchar(300) NOT NULL,
  `TypeOfDamage` varchar(300) NOT NULL,
  `Note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_damge_temp`
--

CREATE TABLE `s_job_card_damge_temp` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `jdate` date NOT NULL,
  `VehiclePartName` varchar(300) NOT NULL,
  `TypeOfDamage` varchar(300) NOT NULL,
  `Note` varchar(300) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `UserId` varchar(250) NOT NULL,
  `status` varchar(300) NOT NULL,
  `session_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_inventory`
--

CREATE TABLE `s_job_card_inventory` (
  `id` int(11) NOT NULL,
  `JobCardId` int(8) NOT NULL,
  `ServiceBook` int(11) NOT NULL,
  `Idol` int(11) NOT NULL,
  `WheelCaps` int(11) NOT NULL,
  `ToolKit` int(11) NOT NULL,
  `StereoSpeakers` int(11) NOT NULL,
  `FloarMats1` int(11) NOT NULL,
  `FloarMats2` int(11) NOT NULL,
  `FloarMats3` int(11) NOT NULL,
  `FloarMats4` int(11) NOT NULL,
  `MudFlaps` int(11) NOT NULL,
  `SafetyTriangle` int(11) NOT NULL,
  `AirFreshner` int(11) NOT NULL,
  `WiperBlades` int(11) NOT NULL,
  `SpareWheel` int(11) NOT NULL,
  `Jack` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_job_card_inventory`
--

INSERT INTO `s_job_card_inventory` (`id`, `JobCardId`, `ServiceBook`, `Idol`, `WheelCaps`, `ToolKit`, `StereoSpeakers`, `FloarMats1`, `FloarMats2`, `FloarMats3`, `FloarMats4`, `MudFlaps`, `SafetyTriangle`, `AirFreshner`, `WiperBlades`, `SpareWheel`, `Jack`) VALUES
(1, 205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 206, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 211, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 212, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 214, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 215, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 216, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 217, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 218, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 219, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 220, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 221, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 222, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 223, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 223, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 223, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 224, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 224, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_package_service_details`
--

CREATE TABLE `s_job_card_package_service_details` (
  `id` int(11) NOT NULL,
  `JobcradPackageId` int(11) NOT NULL,
  `job_card_no` varchar(50) NOT NULL,
  `JobcardId` int(11) NOT NULL,
  `PackageName` varchar(200) NOT NULL,
  `Service` varchar(300) NOT NULL,
  `ServiceStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_pdetails`
--

CREATE TABLE `s_job_card_pdetails` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `jdate` date NOT NULL,
  `package_type` varchar(300) NOT NULL,
  `package_amt` decimal(9,2) NOT NULL,
  `pac_remarks` varchar(300) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ServiceStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_pdetails_temp`
--

CREATE TABLE `s_job_card_pdetails_temp` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `jdate` date NOT NULL,
  `package_type` varchar(300) NOT NULL,
  `package_amt` decimal(9,2) NOT NULL,
  `pac_remarks` varchar(300) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `UserId` varchar(250) NOT NULL,
  `status` varchar(300) NOT NULL,
  `session_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_recomdetails`
--

CREATE TABLE `s_job_card_recomdetails` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `service_type` varchar(250) NOT NULL,
  `st_amt` varchar(300) NOT NULL,
  `qty` varchar(300) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `remarks_1` varchar(300) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ServiceStatus` varchar(100) NOT NULL,
  `RecomDate` date NOT NULL,
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_job_card_recomdetails`
--

INSERT INTO `s_job_card_recomdetails` (`id`, `job_card_no`, `service_type`, `st_amt`, `qty`, `remarks`, `remarks_1`, `status`, `ServiceStatus`, `RecomDate`, `customerId`) VALUES
(1, '205', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(2, '205', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(3, '205', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(4, '206', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(5, '206', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(6, '206', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(7, '207', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(8, '207', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(9, '207', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(10, '208', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(11, '208', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(12, '209', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(13, '209', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(14, '210', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(15, '210', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(16, '211', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(17, '211', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(18, '212', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(19, '212', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(20, '213', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(21, '213', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(22, '214', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(23, '214', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(24, '215', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(25, '215', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(26, '216', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(27, '216', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(28, '217', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(29, '217', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(30, '218', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(31, '218', 'Wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(32, '218', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(33, '219', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(34, '219', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(35, '220', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(36, '220', 'Wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(37, '220', 'Wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(38, '220', 'Wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(39, '220', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(40, '221', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(41, '221', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(42, '222', 'Wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(45, '222', 'wash', '0	  ', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(46, '222', 'Wash', '110	  ', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(47, '222', 'Wash', '110	  ', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(48, '223', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(49, '223', 'Wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(50, '223', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(51, '223', 'Wash', '110	  ', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(52, '224', 'wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(53, '224', 'Wash', '110.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(54, '224', '', '0.00', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(55, '224', 'Wash', '110	  ', '1', '', '', 'Active', 'Pending', '0000-00-00', 0),
(56, '224', 'Wash', '110	  ', '1', '', '', 'Active', 'Pending', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_recomdetails_temp`
--

CREATE TABLE `s_job_card_recomdetails_temp` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `jdate` date NOT NULL,
  `service_type` varchar(300) NOT NULL,
  `st_amt` decimal(9,2) NOT NULL,
  `qty` varchar(300) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `remarks_1` varchar(300) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `UserId` varchar(250) NOT NULL,
  `status` varchar(300) NOT NULL,
  `RecomDate` date NOT NULL,
  `session_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_job_card_recomdetails_temp`
--

INSERT INTO `s_job_card_recomdetails_temp` (`id`, `job_card_no`, `jdate`, `service_type`, `st_amt`, `qty`, `remarks`, `remarks_1`, `FranchiseeId`, `UserId`, `status`, `RecomDate`, `session_id`) VALUES
(40, 'F2-25', '2020-05-11', '', '0.00', '', '', '', '9', '12', 'Active', '0000-00-00', '6l7770suhupppim64gg8f5h8e5'),
(41, 'F2-24', '2020-05-11', '', '0.00', '', '', '', '9', '12', 'Active', '0000-00-00', '6l7770suhupppim64gg8f5h8e5'),
(42, 'F2-22', '2020-05-11', '', '0.00', '', '', '', '9', '12', 'Active', '0000-00-00', '1mtfbinn2h749vndl6h3ps9rgh'),
(51, 'F2-28', '2020-05-20', '', '0.00', '', '', '', '9', '12', 'Active', '0000-00-00', '3e28nuta3ftg4gmv7iq7r1ro5o'),
(55, 'F2-29', '2020-05-22', '', '0.00', '', '', '', '9', '12', 'Active', '0000-00-00', 'f472gc5lo40ae8e69bapoon739'),
(58, 'F2-30', '2020-05-23', '', '0.00', '', '', '', '9', '12', 'Active', '0000-00-00', '30r4hlgukeknh3vdrejpq3m977'),
(72, 'F2-33', '2020-05-30', 'wash', '110.00', '1', '', '', '9', '12', 'Active', '0000-00-00', 'j8s1io52aedj3n43dhppjpl2av');

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_sdetails`
--

CREATE TABLE `s_job_card_sdetails` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `jdate` date NOT NULL,
  `service_type` varchar(250) NOT NULL,
  `st_amt` varchar(300) NOT NULL,
  `qty` varchar(300) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `remarks_1` varchar(300) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ServiceStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_job_card_sdetails`
--

INSERT INTO `s_job_card_sdetails` (`id`, `job_card_no`, `jdate`, `service_type`, `st_amt`, `qty`, `remarks`, `remarks_1`, `status`, `ServiceStatus`) VALUES
(8, '205', '2020-04-25', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(9, '206', '2020-05-11', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(10, '207', '2020-05-11', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(12, '209', '2020-05-11', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(13, '210', '2020-05-11', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(14, '211', '2020-05-11', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(15, '212', '2020-05-11', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(16, '213', '2020-05-20', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(17, '214', '2020-05-20', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(18, '215', '2020-05-20', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(19, '216', '2020-05-22', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(20, '217', '2020-05-23', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(21, '218', '2020-05-26', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(22, '218', '2020-05-26', 'Wash', '110.00', '1', '', '', 'Active', 'Pending'),
(23, '219', '2020-05-28', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(24, '220', '2020-05-30', 'Wash', '110.00', '1', '', '', 'Active', 'Pending'),
(25, '221', '2020-05-30', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(26, '222', '2020-05-30', 'Wash', '110.00', '1', '', '', 'Active', 'Pending'),
(31, '223', '2020-05-30', 'wash', '110.00', '1', '', '', 'Active', 'Pending'),
(36, '224', '2020-05-30', 'Wash', '110	  ', '1', '', '', 'Active', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_sdetails_temp`
--

CREATE TABLE `s_job_card_sdetails_temp` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(300) NOT NULL,
  `jdate` date NOT NULL,
  `service_type` varchar(300) NOT NULL,
  `st_amt` decimal(9,2) NOT NULL,
  `qty` varchar(300) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `remarks_1` varchar(300) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `UserId` varchar(250) NOT NULL,
  `status` varchar(300) NOT NULL,
  `session_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_job_card_sdetails_temp`
--

INSERT INTO `s_job_card_sdetails_temp` (`id`, `job_card_no`, `jdate`, `service_type`, `st_amt`, `qty`, `remarks`, `remarks_1`, `FranchiseeId`, `UserId`, `status`, `session_id`) VALUES
(3, 'F2-21', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'qm8bp6j8b4abn7m7vll5teho8r'),
(4, 'F2-21 ', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'qm8bp6j8b4abn7m7vll5teho8r'),
(5, 'F2-21  ', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'qm8bp6j8b4abn7m7vll5teho8r'),
(6, 'F2-21  ', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'qm8bp6j8b4abn7m7vll5teho8r'),
(7, 'F2-21  ', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'qm8bp6j8b4abn7m7vll5teho8r'),
(8, 'F2-21   ', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'qm8bp6j8b4abn7m7vll5teho8r'),
(9, 'F2-21    ', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'qm8bp6j8b4abn7m7vll5teho8r'),
(10, 'F2-21', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'eq550epevueb128f9mljtiug19'),
(11, 'F2-21 ', '2020-05-11', 'wash', '110.00', '1', '', '', '9', '12', 'Active', 'eq550epevueb128f9mljtiug19');

-- --------------------------------------------------------

--
-- Table structure for table `s_job_card_temp`
--

CREATE TABLE `s_job_card_temp` (
  `id` int(11) NOT NULL,
  `job_card_no` varchar(250) NOT NULL,
  `jdate` date NOT NULL,
  `vehicle_no` varchar(250) NOT NULL,
  `smobile` varchar(250) NOT NULL,
  `sname` varchar(250) NOT NULL,
  `saddress` varchar(250) NOT NULL,
  `kms` varchar(250) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `UserId` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `cmodel` varchar(50) NOT NULL,
  `DiscountAmount` decimal(9,2) NOT NULL,
  `ReferencedMobileNo` varchar(100) NOT NULL,
  `ReferencedNote` varchar(300) NOT NULL,
  `ServiceBook` int(11) NOT NULL,
  `Idol` int(11) NOT NULL,
  `WheelCaps` int(11) NOT NULL,
  `ToolKit` int(11) NOT NULL,
  `StereoSpeakers` int(11) NOT NULL,
  `FloarMats1` int(11) NOT NULL,
  `FloarMats2` int(11) NOT NULL,
  `FloarMats3` int(11) NOT NULL,
  `FloarMats4` int(11) NOT NULL,
  `MudFlaps` int(11) NOT NULL,
  `SafetyTriangle` int(11) NOT NULL,
  `AirFreshner` int(11) NOT NULL,
  `WiperBlades` int(11) NOT NULL,
  `SpareWheel` int(11) NOT NULL,
  `Jack` int(11) NOT NULL,
  `InteriorOne` int(11) NOT NULL,
  `InteriorTwo` int(11) NOT NULL,
  `ExteriorOne` int(11) NOT NULL,
  `ExteriorTwo` int(11) NOT NULL,
  `ExteriorThree` int(11) NOT NULL,
  `ReferedDiscount` decimal(9,2) NOT NULL,
  `cvisit` varchar(5) NOT NULL,
  `session_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_job_card_temp`
--

INSERT INTO `s_job_card_temp` (`id`, `job_card_no`, `jdate`, `vehicle_no`, `smobile`, `sname`, `saddress`, `kms`, `FranchiseeId`, `UserId`, `status`, `cemail`, `cmodel`, `DiscountAmount`, `ReferencedMobileNo`, `ReferencedNote`, `ServiceBook`, `Idol`, `WheelCaps`, `ToolKit`, `StereoSpeakers`, `FloarMats1`, `FloarMats2`, `FloarMats3`, `FloarMats4`, `MudFlaps`, `SafetyTriangle`, `AirFreshner`, `WiperBlades`, `SpareWheel`, `Jack`, `InteriorOne`, `InteriorTwo`, `ExteriorOne`, `ExteriorTwo`, `ExteriorThree`, `ReferedDiscount`, `cvisit`, `session_id`) VALUES
(3, 'F2-21', '2020-05-11', 'TN07AS1526', ' 9876443214', ' SUHAIL', ' PODANOORR', '', '9', '12', 'Active', ' suhail@gmail.com', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10', 'qm8bp6j8b4abn7m7vll5teho8r'),
(4, 'F2-21 ', '2020-05-11', 'TN07AS1526', ' 9876443214 ', ' SUHAIL ', ' PODANOORR ', '', '9', '12', 'Active', ' suhail@gmail.com ', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10 2', 'qm8bp6j8b4abn7m7vll5teho8r'),
(5, 'F2-21  ', '2020-05-11', 'TN07AS1526', ' 9876443214  ', ' SUHAIL  ', ' PODANOORR  ', '', '9', '12', 'Active', ' suhail@gmail.com  ', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10 2 ', 'qm8bp6j8b4abn7m7vll5teho8r'),
(6, 'F2-21  ', '2020-05-11', 'TN07AS1526', ' 9876443214   ', ' SUHAIL   ', ' PODANOORR   ', '', '9', '12', 'Active', ' suhail@gmail.com   ', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10 2 ', 'qm8bp6j8b4abn7m7vll5teho8r'),
(7, 'F2-21  ', '2020-05-11', 'TN07AS1526', ' 9876443214   ', ' SUHAIL   ', ' PODANOORR   ', '', '9', '12', 'Active', ' suhail@gmail.com   ', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10 2 ', 'qm8bp6j8b4abn7m7vll5teho8r'),
(8, 'F2-21   ', '2020-05-11', 'TN07AS1526', ' 9876443214    ', ' SUHAIL    ', ' PODANOORR    ', '', '9', '12', 'Active', ' suhail@gmail.com    ', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10 2 ', 'qm8bp6j8b4abn7m7vll5teho8r'),
(9, 'F2-21    ', '2020-05-11', 'TN07AS1526', ' 9876443214     ', ' SUHAIL     ', ' PODANOORR     ', '', '9', '12', 'Active', ' suhail@gmail.com     ', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10 2 ', 'qm8bp6j8b4abn7m7vll5teho8r'),
(10, 'F2-21', '2020-05-11', 'TN07AS1526', ' 9876443214', ' SUHAIL', ' PODANOORR', '', '9', '12', 'Active', ' suhail@gmail.com', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10', 'eq550epevueb128f9mljtiug19'),
(11, 'F2-21 ', '2020-05-11', 'TN07AS1526', ' 9876443214 ', ' SUHAIL ', ' PODANOORR ', '', '9', '12', 'Active', ' suhail@gmail.com ', 'Verna	  ', '0.00', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '10 2', 'eq550epevueb128f9mljtiug19');

-- --------------------------------------------------------

--
-- Table structure for table `s_outsources`
--

CREATE TABLE `s_outsources` (
  `Id` int(11) NOT NULL,
  `JobcardId` int(11) NOT NULL,
  `job_card_no` varchar(200) NOT NULL,
  `OutsourcesDate` date NOT NULL,
  `PainterName` int(25) NOT NULL,
  `Note` varchar(500) NOT NULL,
  `FranchiseeId` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_outsources_details`
--

CREATE TABLE `s_outsources_details` (
  `Id` int(11) NOT NULL,
  `OutsourcesId` int(11) NOT NULL,
  `Outsources` int(11) NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  `Tax` decimal(9,2) NOT NULL,
  `TaxTotalAmount` decimal(9,2) NOT NULL,
  `TotalAmount` decimal(9,2) NOT NULL,
  `JobcardId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_outsources_temp`
--

CREATE TABLE `s_outsources_temp` (
  `Id` int(11) NOT NULL,
  `JobcardId` int(11) NOT NULL,
  `Outsources` int(11) NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  `Tax` float NOT NULL,
  `TaxTotalAmount` decimal(9,2) NOT NULL,
  `TotalAmount` decimal(9,2) NOT NULL,
  `FranchiseeId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase`
--

CREATE TABLE `s_purchase` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `outstand` varchar(250) NOT NULL,
  `gstin` varchar(200) NOT NULL,
  `status` varchar(250) NOT NULL,
  `description` varchar(300) NOT NULL,
  `paymentoption` varchar(100) NOT NULL,
  `FranchiseeId` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `purchase_details` varchar(250) NOT NULL,
  `LedgerGroup` int(11) NOT NULL,
  `GstAmount` decimal(9,2) NOT NULL,
  `TotalPurchaseAmount` decimal(9,2) NOT NULL,
  `PaidAmount` decimal(9,2) NOT NULL,
  `PendingAmount` decimal(9,2) NOT NULL,
  `AccountNo` varchar(300) NOT NULL,
  `ChequeNumber` varchar(300) NOT NULL,
  `PurchasePhoto` varchar(250) NOT NULL,
  `PurchaseOrderNo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_purchase`
--

INSERT INTO `s_purchase` (`id`, `inv_no`, `pdate`, `supplier_name`, `outstand`, `gstin`, `status`, `description`, `paymentoption`, `FranchiseeId`, `vendor_id`, `purchase_details`, `LedgerGroup`, `GstAmount`, `TotalPurchaseAmount`, `PaidAmount`, `PendingAmount`, `AccountNo`, `ChequeNumber`, `PurchasePhoto`, `PurchaseOrderNo`) VALUES
(4, '1', '2020-05-12', '5', '0.00', '33ed34567cgh87', 'Active', '', 'Cash', 9, '7', 'Close', 23, '21.60', '141.60', '100.00', '41.60', '', '', '1942756326.', ''),
(5, '6', '2020-05-12', '--Select The Name--', '0.00', '', 'Active', '', 'Cash', 9, '7', 'Close', 23, '216.00', '1416.00', '1400.00', '16.00', '', '', '1427665170.', ''),
(6, '2', '2020-05-14', '5', '41.60', '33ed34567cgh87', 'Active', '', 'Cash', 9, '7', 'Open', 0, '14.40', '134.40', '134.00', '0.40', '', '', '1278152294.', ''),
(7, '3', '2020-05-14', '5', '42.00', '33ed34567cgh87', 'Active', '', 'Cash', 9, '7', 'Open', 21, '17.28', '161.28', '161.00', '0.28', '', '', '1991731690.', ''),
(8, '1', '2020-05-15', '7', '', '0.00', 'Active', '', 'Cash', 9, '7', 'Close', 21, '0.00', '89.68', '89.00', '0.68', '', '', '1432568110.', ''),
(9, '1', '2020-05-15', '7', '', '0.00', 'Active', '', '', 9, '7', 'Close', 21, '0.00', '120.00', '123.00', '-3.00', '', '', '1396071590.', ''),
(10, '4', '2020-05-18', '5', '39.96', '33ed34567cgh87', 'Active', '', 'Cash', 9, '7', 'Open', 21, '268.80', '2508.80', '2000.00', '508.80', '', '', '1100224612.', ''),
(11, '13', '2020-05-19', '7', '', '0.00', 'Active', '', 'Cash', 9, '7', 'Open', 21, '0.00', '2360.00', '2360.00', '0.00', '', '', '1791900464.', ''),
(12, '20', '2020-05-20', '7', '0', '0.00', 'Active', '', 'Cash', 9, '7', 'Open', 21, '0.00', '70800.00', '50000.00', '20800.00', '', '', '1898919954.', ''),
(13, '22', '2020-05-26', '7', '20800', '0.00', 'Active', '', 'Cash', 9, '7', 'Open', 21, '0.00', '708.00', '708.00', '0.00', '', '', '858217953.', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_asset`
--

CREATE TABLE `s_purchase_asset` (
  `id` int(11) NOT NULL,
  `InvoiceNo` varchar(300) NOT NULL,
  `PaDate` date NOT NULL,
  `FranchiseeId` varchar(5) NOT NULL,
  `SupplierName` varchar(300) NOT NULL,
  `ProductName` varchar(300) NOT NULL,
  `ProductBrand` varchar(300) NOT NULL,
  `ProductModel` varchar(300) NOT NULL,
  `OtherSpecificaton` varchar(300) NOT NULL,
  `PurchaseRate` decimal(9,2) NOT NULL,
  `Quantity` decimal(9,2) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `ExpiryDate` date NOT NULL,
  `ServicePerson` varchar(300) NOT NULL,
  `Remarks` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL,
  `purchase_details` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_asset_temp`
--

CREATE TABLE `s_purchase_asset_temp` (
  `id` int(11) NOT NULL,
  `InvoiceNo` varchar(300) NOT NULL,
  `PaDate` date NOT NULL,
  `FranchiseeId` varchar(5) NOT NULL,
  `SupplierName` varchar(300) NOT NULL,
  `ProductName` varchar(300) NOT NULL,
  `ProductBrand` varchar(300) NOT NULL,
  `ProductModel` varchar(300) NOT NULL,
  `OtherSpecificaton` varchar(300) NOT NULL,
  `PurchaseRate` decimal(9,2) NOT NULL,
  `Quantity` decimal(9,2) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `ExpiryDate` date NOT NULL,
  `ServicePerson` varchar(300) NOT NULL,
  `Remarks` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_details`
--

CREATE TABLE `s_purchase_details` (
  `id` int(11) NOT NULL,
  `inv_no` int(11) NOT NULL,
  `supplier_name` int(30) NOT NULL,
  `spare_brand` int(30) NOT NULL,
  `spare_name` int(30) NOT NULL,
  `spare_part_no` varchar(200) NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `unit` int(30) NOT NULL,
  `mrp` decimal(9,2) NOT NULL,
  `discount_per` decimal(9,2) NOT NULL,
  `discount_amt` decimal(9,2) NOT NULL,
  `purchase_rate` decimal(9,2) NOT NULL,
  `qty` float NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `igst` float NOT NULL,
  `gst_amt` decimal(9,2) NOT NULL,
  `TotalGstPer` int(11) NOT NULL,
  `total_amount` decimal(9,2) NOT NULL,
  `status` text NOT NULL,
  `pdate` date NOT NULL,
  `purchase_details` varchar(30) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_purchase_details`
--

INSERT INTO `s_purchase_details` (`id`, `inv_no`, `supplier_name`, `spare_brand`, `spare_name`, `spare_part_no`, `hsn_code`, `unit`, `mrp`, `discount_per`, `discount_amt`, `purchase_rate`, `qty`, `total`, `sgst`, `cgst`, `igst`, `gst_amt`, `TotalGstPer`, `total_amount`, `status`, `pdate`, `purchase_details`, `franchisee_id`, `vendor_id`) VALUES
(3, 4, 5, 7, 4, '123', '', 1, '0.00', '0.00', '0.00', '12.00', 10, '120.00', 9, 9, 0, '21.60', 18, '141.60', 'Active', '2020-05-12', 'Close', 9, '7'),
(4, 5, 0, 8, 6, '456456', '', 1, '0.00', '0.00', '0.00', '12.00', 100, '1200.00', 9, 9, 0, '216.00', 18, '1416.00', 'Active', '2020-05-12', 'Close', 9, '7'),
(5, 6, 5, 9, 8, '456', '', 1, '0.00', '0.00', '0.00', '12.00', 10, '120.00', 6, 6, 0, '14.40', 12, '134.40', 'Active', '2020-05-14', 'Close', 9, '7'),
(6, 7, 5, 9, 8, '456', '', 1, '0.00', '0.00', '0.00', '12.00', 12, '144.00', 6, 6, 0, '17.28', 12, '161.28', 'Active', '2020-05-14', 'Open', 9, '7'),
(7, 8, 7, 10, 10, '5661', '', 1, '0.00', '5.00', '4.00', '8.00', 10, '80.00', 9, 9, 0, '13.68', 18, '89.68', 'Active', '2020-05-15', 'Open', 9, '7'),
(8, 9, 7, 10, 10, '5661', '', 1, '0.00', '0.00', '0.00', '10.00', 12, '120.00', 0, 0, 0, '0.00', 0, '120.00', 'Active', '2020-05-15', 'Open', 9, '7'),
(9, 10, 5, 9, 8, '456', '', 1, '0.00', '0.00', '0.00', '560.00', 4, '2240.00', 6, 6, 0, '268.80', 12, '2508.80', 'Active', '2020-05-18', 'Open', 9, '7'),
(10, 11, 7, 10, 10, '5661', '', 1, '0.00', '0.00', '0.00', '500.00', 4, '2000.00', 9, 9, 0, '360.00', 18, '2360.00', 'Active', '2020-05-19', 'Open', 9, '7'),
(11, 12, 7, 10, 10, '5661', '', 1, '0.00', '0.00', '0.00', '500.00', 120, '60000.00', 9, 9, 0, '10800.00', 18, '70800.00', 'Active', '2020-05-20', 'Open', 9, '7'),
(12, 13, 7, 10, 10, '5661', '54641', 1, '0.00', '0.00', '0.00', '50.00', 12, '600.00', 9, 9, 0, '108.00', 18, '708.00', 'Active', '2020-05-26', 'Open', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_details_temp`
--

CREATE TABLE `s_purchase_details_temp` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(100) NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `outstand` decimal(9,2) NOT NULL,
  `gstin` varchar(300) NOT NULL,
  `spare_brand` int(30) NOT NULL,
  `spare_name` int(30) NOT NULL,
  `spare_part_no` varchar(200) NOT NULL,
  `unit` int(30) NOT NULL,
  `mrp` decimal(9,3) NOT NULL,
  `discount` decimal(9,2) NOT NULL,
  `discount_amt` decimal(9,2) NOT NULL,
  `purchase_rate` decimal(9,2) NOT NULL,
  `qty` decimal(9,3) NOT NULL,
  `total` decimal(9,3) NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `igst` float NOT NULL,
  `TotalGstPer` int(11) NOT NULL,
  `gst_amt` decimal(9,3) NOT NULL,
  `net_amount` decimal(9,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_order`
--

CREATE TABLE `s_purchase_order` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `outstand` varchar(250) NOT NULL,
  `gstin` varchar(200) NOT NULL,
  `total` decimal(9,3) NOT NULL,
  `status` varchar(250) NOT NULL,
  `description` varchar(300) NOT NULL,
  `FranchiseeId` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `purchase_details` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_purchase_order`
--

INSERT INTO `s_purchase_order` (`id`, `inv_no`, `pdate`, `supplier_name`, `outstand`, `gstin`, `total`, `status`, `description`, `FranchiseeId`, `vendor_id`, `purchase_details`) VALUES
(19, 'PO15', '2020-05-15', '7', '', '0.00', '0.000', 'Active', '', 9, '7', 'Open'),
(20, 'PO16', '2020-05-15', '7', '', '0.00', '0.000', 'Active', '', 9, '7', 'Open'),
(21, 'PO17', '2020-05-19', '7', '', '0.00', '0.000', 'Active', '', 9, '7', 'Open'),
(22, 'PO18', '2020-05-20', '7', '0', '0.00', '0.000', 'Active', '', 9, '7', 'Open'),
(23, 'PO19', '2020-05-22', '7', '20800', '0.00', '0.000', 'Active', 'DG', 9, '7', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_order_details`
--

CREATE TABLE `s_purchase_order_details` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(100) NOT NULL,
  `supplier_name` int(30) NOT NULL,
  `spare_brand` int(30) NOT NULL,
  `spare_name` int(30) NOT NULL,
  `spare_part_no` varchar(200) NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `unit` int(30) NOT NULL,
  `mrp` decimal(9,2) NOT NULL,
  `discount_per` decimal(9,2) NOT NULL,
  `discount_amt` decimal(9,2) NOT NULL,
  `purchase_rate` decimal(9,2) NOT NULL,
  `qty` decimal(9,3) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `gst` decimal(9,2) NOT NULL,
  `gst_amt` decimal(9,2) NOT NULL,
  `total_amount` decimal(9,2) NOT NULL,
  `status` text NOT NULL,
  `purchase_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_purchase_order_details`
--

INSERT INTO `s_purchase_order_details` (`id`, `inv_no`, `supplier_name`, `spare_brand`, `spare_name`, `spare_part_no`, `hsn_code`, `unit`, `mrp`, `discount_per`, `discount_amt`, `purchase_rate`, `qty`, `total`, `gst`, `gst_amt`, `total_amount`, `status`, `purchase_status`) VALUES
(9, '19', 7, 10, 10, '5661', '', 1, '12.00', '0.00', '0.00', '10.00', '12.000', '120.00', '0.00', '0.00', '0.00', 'Active', 'Complete'),
(10, '20', 7, 10, 10, '5661', '', 1, '12.00', '0.00', '0.00', '8.00', '10.000', '80.00', '0.00', '0.00', '0.00', 'Active', 'Complete'),
(11, '22', 7, 10, 10, '5661', '', 1, '12.00', '0.00', '0.00', '500.00', '4.000', '2000.00', '0.00', '0.00', '0.00', 'Active', 'Complete'),
(12, '22', 7, 10, 10, '5661', '', 1, '12.00', '0.00', '0.00', '500.00', '120.000', '60000.00', '0.00', '0.00', '0.00', 'Active', 'Complete'),
(13, '23', 7, 10, 10, '5661', '54641', 1, '12.00', '0.00', '0.00', '50.00', '12.000', '600.00', '0.00', '0.00', '0.00', 'Active', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_order_details_temp`
--

CREATE TABLE `s_purchase_order_details_temp` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(100) NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `spare_brand` int(30) NOT NULL,
  `spare_name` int(30) NOT NULL,
  `spare_part_no` varchar(200) NOT NULL,
  `hsn_code` varchar(50) NOT NULL,
  `unit` int(30) NOT NULL,
  `mrp` decimal(9,3) NOT NULL,
  `discount` decimal(9,2) NOT NULL,
  `discount_amt` decimal(9,2) NOT NULL,
  `purchase_rate` decimal(9,2) NOT NULL,
  `qty` decimal(9,3) NOT NULL,
  `total` decimal(9,3) NOT NULL,
  `gst` decimal(9,2) NOT NULL,
  `gst_amt` decimal(9,3) NOT NULL,
  `net_amount` decimal(9,3) NOT NULL,
  `franchisee_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_purchase_order_details_temp`
--

INSERT INTO `s_purchase_order_details_temp` (`id`, `inv_no`, `supplier_name`, `spare_brand`, `spare_name`, `spare_part_no`, `hsn_code`, `unit`, `mrp`, `discount`, `discount_amt`, `purchase_rate`, `qty`, `total`, `gst`, `gst_amt`, `net_amount`, `franchisee_id`) VALUES
(27, 'PO15', '7', 10, 10, '5661', '', 1, '12.000', '0.00', '0.00', '10.00', '12.000', '120.000', '0.00', '0.000', '0.000', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_order_temp`
--

CREATE TABLE `s_purchase_order_temp` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `FrachiseeId` varchar(5) NOT NULL,
  `outstand` varchar(250) NOT NULL,
  `gstin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_purchase_order_temp`
--

INSERT INTO `s_purchase_order_temp` (`id`, `inv_no`, `pdate`, `supplier_name`, `FrachiseeId`, `outstand`, `gstin`) VALUES
(2, '2', '2020-05-04', '5', '9', '', ''),
(16, 'PO15', '2020-05-15', '7', '9', '', ''),
(17, 'PO15', '2020-05-15', '7', '9', '', ''),
(21, 'PO15', '2020-05-15', '7', '9', '', ''),
(22, 'PO18', '2020-05-20', '7', '9', '0', ''),
(23, 'PO18', '2020-05-20', '7', '9', '0', ''),
(27, 'PO15', '2020-05-15', '7', '9', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_return`
--

CREATE TABLE `s_purchase_return` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `rdate` date NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `FrachiseeId` varchar(10) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `outstand` varchar(250) NOT NULL,
  `sbrand` varchar(250) NOT NULL,
  `sname` varchar(250) NOT NULL,
  `spart_no` varchar(250) NOT NULL,
  `prate` int(11) NOT NULL,
  `return_qty` decimal(9,3) NOT NULL,
  `total_qty` decimal(9,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_purchase_temp`
--

CREATE TABLE `s_purchase_temp` (
  `id` int(11) NOT NULL,
  `inv_no` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `FrachiseeId` varchar(5) NOT NULL,
  `outstand` varchar(250) NOT NULL,
  `gstin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_quotation`
--

CREATE TABLE `s_quotation` (
  `id` int(11) NOT NULL,
  `q_no` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `outstand` varchar(250) NOT NULL,
  `gstin` varchar(200) NOT NULL,
  `status` varchar(250) NOT NULL,
  `description` varchar(300) NOT NULL,
  `paymentoption` varchar(100) NOT NULL,
  `FranchiseeId` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `purchase_details` varchar(250) NOT NULL,
  `LedgerGroup` int(11) NOT NULL,
  `GstAmount` decimal(9,2) NOT NULL,
  `TotalPurchaseAmount` decimal(9,2) NOT NULL,
  `PaidAmount` decimal(9,2) NOT NULL,
  `PendingAmount` decimal(9,2) NOT NULL,
  `AccountNo` varchar(300) NOT NULL,
  `ChequeNumber` varchar(300) NOT NULL,
  `PurchasePhoto` varchar(250) NOT NULL,
  `PurchaseOrderNo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_quotation`
--

INSERT INTO `s_quotation` (`id`, `q_no`, `pdate`, `supplier_name`, `outstand`, `gstin`, `status`, `description`, `paymentoption`, `FranchiseeId`, `vendor_id`, `purchase_details`, `LedgerGroup`, `GstAmount`, `TotalPurchaseAmount`, `PaidAmount`, `PendingAmount`, `AccountNo`, `ChequeNumber`, `PurchasePhoto`, `PurchaseOrderNo`) VALUES
(13, 'Q21', '2020-05-14', '3', '0.00', '', 'Active', '', '', 9, '7', 'Open', 0, '14.40', '134.40', '0.00', '0.00', '', '', '1194947557.', ''),
(14, 'Q22', '2020-05-14', '3', '0.00', '', 'Active', '', '', 9, '7', 'Open', 0, '85.44', '797.44', '0.00', '0.00', '', '', '1418517056.', ''),
(15, 'Q23', '2020-05-27', '3', '0.00', '', 'Active', '', '', 9, '7', 'Open', 0, '108.00', '1008.00', '0.00', '0.00', '', '', '972590164.', '');

-- --------------------------------------------------------

--
-- Table structure for table `s_quotation_details`
--

CREATE TABLE `s_quotation_details` (
  `id` int(11) NOT NULL,
  `q_no` varchar(50) NOT NULL,
  `supplier_name` int(30) NOT NULL,
  `spare_brand` int(30) NOT NULL,
  `spare_name` int(30) NOT NULL,
  `spare_part_no` varchar(200) NOT NULL,
  `unit` int(30) NOT NULL,
  `mrp` decimal(9,2) NOT NULL,
  `discount_per` decimal(9,2) NOT NULL,
  `discount_amt` decimal(9,2) NOT NULL,
  `purchase_rate` decimal(9,2) NOT NULL,
  `qty` float NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `igst` float NOT NULL,
  `gst_amt` decimal(9,2) NOT NULL,
  `TotalGstPer` int(11) NOT NULL,
  `total_amount` decimal(9,2) NOT NULL,
  `status` text NOT NULL,
  `pdate` date NOT NULL,
  `purchase_details` varchar(30) NOT NULL,
  `franchisee_id` int(12) NOT NULL,
  `vendor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_quotation_details`
--

INSERT INTO `s_quotation_details` (`id`, `q_no`, `supplier_name`, `spare_brand`, `spare_name`, `spare_part_no`, `unit`, `mrp`, `discount_per`, `discount_amt`, `purchase_rate`, `qty`, `total`, `sgst`, `cgst`, `igst`, `gst_amt`, `TotalGstPer`, `total_amount`, `status`, `pdate`, `purchase_details`, `franchisee_id`, `vendor_id`) VALUES
(15, '13', 3, 9, 8, '456', 1, '0.00', '0.00', '0.00', '8.00', 15, '120.00', 6, 6, 0, '14.40', 12, '134.40', 'Active', '2020-05-14', 'Open', 9, '7'),
(16, '14', 3, 9, 8, '456', 1, '0.00', '0.00', '0.00', '89.00', 8, '712.00', 6, 6, 0, '85.44', 12, '797.44', 'Active', '2020-05-14', 'Open', 9, '7'),
(17, '15', 3, 9, 8, '456', 1, '0.00', '0.00', '0.00', '450.00', 2, '900.00', 6, 6, 0, '108.00', 12, '1008.00', 'Active', '2020-05-27', 'Open', 9, '7');

-- --------------------------------------------------------

--
-- Table structure for table `s_quotation_details_temp`
--

CREATE TABLE `s_quotation_details_temp` (
  `id` int(11) NOT NULL,
  `q_no` varchar(100) NOT NULL,
  `supplier_name` varchar(250) NOT NULL,
  `pdate` date NOT NULL,
  `outstand` decimal(9,2) NOT NULL,
  `gstin` varchar(300) NOT NULL,
  `spare_brand` int(30) NOT NULL,
  `spare_name` int(30) NOT NULL,
  `spare_part_no` varchar(200) NOT NULL,
  `unit` int(30) NOT NULL,
  `mrp` decimal(9,3) NOT NULL,
  `discount` decimal(9,2) NOT NULL,
  `discount_amt` decimal(9,2) NOT NULL,
  `purchase_rate` decimal(9,2) NOT NULL,
  `qty` decimal(9,3) NOT NULL,
  `total` decimal(9,3) NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `igst` float NOT NULL,
  `TotalGstPer` int(11) NOT NULL,
  `gst_amt` decimal(9,3) NOT NULL,
  `net_amount` decimal(9,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_spare_prepick`
--

CREATE TABLE `s_spare_prepick` (
  `id` int(11) NOT NULL,
  `s_pick_no` varchar(300) NOT NULL,
  `sdate` date NOT NULL,
  `s_job_card_no` varchar(300) NOT NULL,
  `JobcardId` int(20) NOT NULL,
  `vehicle_no` varchar(300) NOT NULL,
  `mobile` varchar(300) NOT NULL,
  `sname` varchar(300) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `UserId` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_spare_prepick_details`
--

CREATE TABLE `s_spare_prepick_details` (
  `id` int(11) NOT NULL,
  `s_pick_no` varchar(250) NOT NULL,
  `spare_cat` varchar(250) NOT NULL,
  `spare_brd` varchar(250) NOT NULL,
  `spare_name` varchar(250) NOT NULL,
  `mrp` decimal(9,3) NOT NULL,
  `qty` decimal(9,3) NOT NULL,
  `total` decimal(9,3) NOT NULL,
  `TaxRate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_spare_prepick_temp`
--

CREATE TABLE `s_spare_prepick_temp` (
  `id` int(11) NOT NULL,
  `s_pick_no` varchar(250) NOT NULL,
  `sdate` varchar(250) NOT NULL,
  `s_job_card_no` varchar(250) NOT NULL,
  `JobcardId` int(20) NOT NULL,
  `vehicle_no` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `sname` varchar(250) NOT NULL,
  `spare_cat` varchar(250) NOT NULL,
  `spare_brd` varchar(250) NOT NULL,
  `spare_name` varchar(250) NOT NULL,
  `mrp` decimal(9,2) NOT NULL,
  `qty` decimal(9,3) NOT NULL,
  `total` decimal(9,3) NOT NULL,
  `FranchiseeId` varchar(250) NOT NULL,
  `UserId` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `TaxRate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblattendancelog`
--

CREATE TABLE `tblattendancelog` (
  `CID` int(11) NOT NULL,
  `EmployeeCode` varchar(50) DEFAULT NULL,
  `ATDate` varchar(50) DEFAULT NULL,
  `ATIn` varchar(50) DEFAULT NULL,
  `ATOut` varchar(50) DEFAULT NULL,
  `InsertOn` varchar(50) DEFAULT NULL,
  `ModifyOn` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbankname`
--

CREATE TABLE `tblbankname` (
  `bankid` bigint(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbankname`
--

INSERT INTO `tblbankname` (`bankid`, `bank_name`, `status`) VALUES
(109, 'ABHYUDAYA CO-OP BANK LTD', 0),
(110, 'ABN AMRO BANK', 0),
(111, 'ABU DHABI COMMERCIAL BANK', 0),
(112, 'ALLAHABAD BANK', 1),
(113, 'ANDHRA BANK', 1),
(114, 'AXIS BANK', 1),
(115, 'BANK OF AMERICA', 0),
(116, 'BANK OF BAHRAIN AND KUWAIT', 0),
(117, 'BANK OF BARODA', 1),
(118, 'BANK OF INDIA', 1),
(119, 'BANK OF MAHARASHTRA', 1),
(120, 'BANK OF TOKYO-MITSUBISHI UFJ LTD.', 0),
(121, 'BARCLAYS BANK PLC', 0),
(122, 'BNP PARIBAS', 0),
(123, 'CALYON BANK', 0),
(124, 'CANARA BANK', 1),
(125, 'CATHOLIC SYRIAN BANK LTD.', 1),
(126, 'CENTRAL BANK OF INDIA', 1),
(127, 'CHINATRUST COMMERCIAL BANK', 0),
(128, 'CITI BANK', 1),
(129, 'CITIZENCREDIT CO-OPERATIVE BANK LTD', 0),
(130, 'CITY UNION BANK LTD', 1),
(131, 'CORPORATION BANK', 1),
(132, 'DBS BANK LTD', 0),
(133, 'DENA BANK', 1),
(134, 'DEUTSCHE BANK', 0),
(135, 'DEVELOPMENT CREDIT BANK LIMITED', 0),
(136, 'DICGC', 0),
(137, 'DOMBIVLI NAGARI SAHAKARI BANK LIMITED', 0),
(138, 'HDFC BANK LTD', 1),
(139, 'HSBC', 1),
(140, 'ICICI BANK LTD', 1),
(141, 'IDBI BANK LTD', 1),
(142, 'INDIAN BANK', 1),
(143, 'INDIAN OVERSEAS BANK', 1),
(144, 'INDUSIND BANK LTD', 1),
(145, 'ING VYSYA BANK LTD', 1),
(146, 'JANAKALYAN SAHAKARI BANK LTD', 0),
(147, 'JPMORGAN CHASE BANK N.A', 0),
(148, 'KAPOLE CO OP BANK', 0),
(149, 'KARNATAKA BANK LTD', 1),
(150, 'KARUR VYSYA BANK', 1),
(151, 'KOTAK MAHINDRA BANK', 1),
(152, 'MAHANAGAR CO-OP BANK LTD', 0),
(153, 'MAHARASHTRA STATE CO OPERATIVE BANK', 0),
(154, 'MASHREQBANK PSC', 0),
(155, 'MIZUHO CORPORATE BANK LTD', 0),
(156, 'NEW  INDIA CO-OPERATIVE  BANK  LTD.', 0),
(157, 'NKGSB CO-OP BANK LTD', 0),
(158, 'NUTAN NAGARIK SAHAKARI BANK LTD', 0),
(159, 'OMAN INTERNATIONAL BANK SAOG', 0),
(160, 'ORIENTAL BANK OF COMMERCE', 1),
(161, 'PARSIK JANATA SAHAKARI BANK LTD', 0),
(162, 'PUNJAB AND MAHARASHTRA CO-OP BANK LTD.', 0),
(163, 'PUNJAB AND SIND BANK', 0),
(164, 'RESERVE BANK OF INDIA', 0),
(165, 'SHINHAN BANK', 0),
(166, 'SOCIETE GENERALE', 0),
(167, 'SOUTH INDIAN BANK', 1),
(168, 'STANDARD CHARTERED BANK', 0),
(169, 'STATE BANK OF BIKANER AND JAIPUR', 0),
(170, 'STATE BANK OF HYDERABAD', 0),
(171, 'STATE BANK OF INDIA', 1),
(172, 'STATE BANK OF INDORE', 0),
(173, 'STATE BANK OF MAURITIUS LTD', 0),
(174, 'STATE BANK OF MYSORE', 0),
(175, 'STATE BANK OF PATIALA', 0),
(176, 'STATE BANK OF TRAVANCORE', 0),
(177, 'SYNDICATE BANK', 1),
(178, 'TAMILNAD MERCANTILE BANK LTD', 1),
(179, 'THE AHMEDABAD MERCANTILE CO-OPERATIVE BANK LTD', 0),
(180, 'THE BANK OF NOVA SCOTIA', 0),
(181, 'THE BANK OF RAJASTHAN LTD', 0),
(182, 'THE BHARAT CO-OPERATIVE BANK (MUMBAI) LTD', 0),
(183, 'THE COSMOS CO-OPERATIVE BANK LTD.', 0),
(184, 'THE DHANALAKSHMI BANK LTD', 0),
(185, 'THE FEDERAL BANK LTD', 1),
(186, 'THE GREATER BOMBAY CO-OP. BANK LTD', 0),
(187, 'THE JAMMU AND KASHMIR BANK LTD', 0),
(188, 'THE KALUPUR COMMERCIAL CO. OP. BANK LTD.', 0),
(189, 'THE KALYAN JANATA SAHAKARI BANK LTD.', 0),
(190, 'THE LAKSHMI VILAS BANK LTD', 0),
(191, 'THE RATNAKAR BANK LTD', 0),
(192, 'THE SARASWAT CO-OPERATIVE BANK LTD', 0),
(193, 'THE SHAMRAO VITHAL CO-OPERATIVE BANK LIMITED', 0),
(194, 'THE TAMILNADU STATE APEX COOPERATIVE BANK LIMITED', 0),
(195, 'THE THANE JANATA SAHAKARI BANK LTD', 0),
(196, 'UCO BANK', 1),
(197, 'UNION BANK OF INDIA', 1),
(198, 'UNITED BANK OF INDIA', 1),
(199, 'VIJAYA BANK', 0),
(200, 'YES BANK LTD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `StateName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `StateName`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chattisgarh'),
(6, 'Goa'),
(7, 'Gujrat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jammu & Kashmir'),
(11, 'Jharkhand'),
(12, 'Karnataka'),
(13, 'Kerala'),
(14, 'Madhya Pradesh'),
(15, 'Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Orissa'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, 'Telangana'),
(26, 'Tripura'),
(27, 'Uttaranchal'),
(28, 'Uttar Pradesh'),
(29, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_main`
--

CREATE TABLE `transfer_main` (
  `Id` int(11) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `TransferDate` date NOT NULL,
  `FromFranchiseeId` varchar(5) NOT NULL,
  `ToFranchiseeId` varchar(5) NOT NULL,
  `TransferItem` decimal(9,2) NOT NULL,
  `TransferValue` decimal(9,2) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_sub`
--

CREATE TABLE `transfer_sub` (
  `Id` int(12) NOT NULL,
  `TransferId` int(11) NOT NULL,
  `ItemId` varchar(5) NOT NULL,
  `ItemMRP` decimal(9,2) NOT NULL,
  `Discount` decimal(9,2) NOT NULL,
  `TransferQuantity` decimal(9,2) NOT NULL,
  `TotalAmount` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_sub`
--

INSERT INTO `transfer_sub` (`Id`, `TransferId`, `ItemId`, `ItemMRP`, `Discount`, `TransferQuantity`, `TotalAmount`) VALUES
(1, 0, '1', '500.00', '0.00', '12.00', '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `trans_temp`
--

CREATE TABLE `trans_temp` (
  `id` int(12) NOT NULL,
  `TransferId` varchar(300) NOT NULL,
  `TransferDate` date NOT NULL,
  `from_franchisee` varchar(300) NOT NULL,
  `FranchiseeId` varchar(300) NOT NULL,
  `TransferItem` varchar(300) NOT NULL,
  `UnitId` int(20) NOT NULL,
  `mrp` varchar(300) NOT NULL,
  `total_qty` varchar(300) NOT NULL,
  `transf_qty` varchar(300) NOT NULL,
  `disc_perc` varchar(300) NOT NULL,
  `disc_rate` varchar(300) NOT NULL,
  `trans_rate` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_lmenu`
--

CREATE TABLE `t_lmenu` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `cicon` text NOT NULL,
  `url` text NOT NULL,
  `parent` varchar(50) NOT NULL,
  `orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_lmenu`
--

INSERT INTO `t_lmenu` (`id`, `category`, `cicon`, `url`, `parent`, `orders`) VALUES
(1, 'Master', 'fa fa-list-alt', '#', '0', 1),
(2, 'Customer Entry', 'fa fa-dropbox', 'master/customer/customer_view.php', '1', 3),
(3, 'Supplier', 'fa fa-dropbox', 'master/supplier/m_supplier_view.php', '1', 4),
(4, 'Service Type', 'fa fa-dropbox', 'master/service_type/m_service_type_view.php', '1', 8),
(5, 'Complaints List', 'fa fa-dropbox', 'master/complaints_type/m_complaints_type.php', '-1', 9),
(6, 'Spares / Item Category', 'fa fa-dropbox', 'master/spare_type/m_spare_type_view.php', '1', 5),
(7, 'Spares / Item Brand', 'fa fa-dropbox', 'master/spares_brand/m_spare_brand_view.php', '1', 6),
(8, 'Spares / Item', 'fa fa-link', 'master/spares/m_spares_view.php', '1', 7),
(9, 'GST', 'fa fa-adjust', 'master/gst/gst.php', '-1', 10),
(10, 'Member Ship', 'fa fa-user', 'master/membership/membership_view.php', '1', 11),
(11, 'Coupon', 'fa fa-adjust', 'master/coupon/coupon.php', '-1', 12),
(12, 'Financial Year', 'fa fa-circle-o', 'master/financial_year/financial_year_view.php', '1', 13),
(13, 'Role Create', 'fa fa-male', 'master/role_create/f_role_create.php', '-1', 2),
(14, 'HR', 'fa fa-users', '#', '0', 0),
(15, 'Department', 'fa fa-male', 'hr/department/h_department_view.php', '14', 2),
(16, 'Designation', 'fa fa-male', 'hr/designation/h_designation_view.php', '14', 1),
(17, 'Employee Master', 'fa fa-male', 'hr/employee/h_employee_view.php', '14', 3),
(18, 'Accounts', 'fa fa-calculator', '#', '0', 0),
(19, 'Payment Voucher', 'fa fa-wrench', 'accounts/payment_voucher/payment_voucher_view.php', '18', 1),
(20, 'Receipt Voucher', 'fa fa-print', 'accounts/receipt_voucher/receipt_voucher_view.php', '18', 2),
(21, 'Services', 'fa fa-bars', '#', '0', 1),
(22, 'Job Card', 'fa fa-hourglass-half', 'services/job_card/s_jobcard_view.php', '21', 1),
(23, 'Spares Prepick View(or)Edit', 'fa fa-archive', 'services/spare_prepick/s_spare_prepick_view.php', '-32', 2),
(24, 'Estimate', 'fa fa-shopping-bag', 'services/estimate/s_estimate.php', '-32', 4),
(25, 'Pending Services', 'fa fa-truck', 'services/pending/s_pending_view.php', '-32', 3),
(26, 'Store', 'fa fa-cart-plus', '#', '0', 2),
(27, 'Purchase Entry', 'fa fa-cart-plus', 'store/purchase/s_purchase_view.php', '26', 2),
(28, 'Inventory', 'fa fa-cart-plus', 'store/inventory/s_inventory.php', '26', 3),
(29, 'Final Bill', 'fa fa-circle-o', 'store/final_bill/f_bill_view.php', '-26', 4),
(30, 'Change Password', 'glyphicon glyphicon-cog', '#', '0', 0),
(31, 'Report', 'fa fa-file', '#', '0', 0),
(32, 'Sales-Mode Of Payment', 'fa fa-circle-o', 'reports/sales_report_mode/sales_report_payment_mode.php', '-31', 0),
(33, 'Over All Final Bill', 'fa fa-circle-o', 'reports/overall/overall_report.php', '31', 1),
(34, 'Company r', 'fa fa-circle-o', 'master/company/company.php', '-1', 1),
(35, 'Purchase Return', 'fa fa-cart-plus', 'store/purchase/s_purchase_return_view.php', '-37', 2),
(36, 'Company', 'fa fa-dropbox', 'master/franchisee/franchisee.php', '1', 14),
(37, 'Package Master', 'fa fa-link', 'master/package_master/package_master_view.php', '1', 16),
(38, 'Change Password', 'glyphicon glyphicon-cog', 'change_password/change_password.php', '30', 1),
(39, 'Job card Open', 'fa fa-hourglass-half', 'services/job_card/s_jobcard_view_open.php', '-32', 4),
(40, 'Closed Job Cards', 'fa fa-hourglass-half', 'services/job_card/s_jobcard_view_close.php', '21', 5),
(41, 'Jobcard Report', 'fa fa-hourglass-half', 'reports/jobcard_reports/jobcard_reports.php', '31', 2),
(42, 'Purchase Report', 'fa fa-hourglass-half', 'reports/purchase Report/purchase_reports.php', '31', 4),
(43, 'Purchase Return Report', 'fa fa-hourglass-half', 'reports/purchase Return Report/purchase_return_reports.php', '31', 7),
(44, 'Sales Order', 'fa fa-hourglass-half', 'store/sales/sales_invoice_view.php', '26', 4),
(45, 'Offer Letter', 'fa fa-male', 'hr/offerletter/o_offerletter.php', '-14', 5),
(46, 'Process Salary ', 'fa fa-money	\n', 'hr/payslip/p_payslip.php', '-14', 6),
(47, 'Relieving Letter', 'fa fa-male', 'hr\\relievingletter\\r_relievingletter_view.php', '-14', 7),
(48, 'Print Salary Slip', 'fa fa-print', 'hr/salary generate/salary_generate_month.php', '-14', 8),
(49, 'Cash Handover', 'fa fa-gift', 'accounts/cash_hand_over/cash_hand_over.php', '18', 5),
(50, 'Vehicle Type', 'fa fa-gift', 'master/vehicle_type/m_vehicle_type.php', '-1', 18),
(51, 'Vehicle Brand', 'fa fa-gift', 'master/vehicle_brand/m_vehicle_brand.php', '1', 17),
(52, 'Mode of Payment', 'fa fa-gift', 'master/mode_payment/m_payment_mode.php', '-1', 20),
(53, 'Cash A/C', 'fa fa-gift', 'accounts/cash_account/a_cash_acc_view.php', '18', 0),
(54, 'Unit Of Measure ', 'glyphicon glyphicon-cog', 'master/uom/m_uom_view.php', '1', 16),
(55, 'Ledger Group', 'glyphicon glyphicon-cog', 'master\\ledger_group\\m_ledger_group_view.php', '1', 0),
(56, 'Purchase Order', 'fa fa-cart-plus', 'store/purchase_order/s_purchase_order_view.php', '26', 1),
(57, 'Customer List 2018', 'fa fa-circle-o', 'reports/overall/old_visit_report.php', '31', 7),
(58, 'Expenses Type', 'fa fa-server	', 'accounts/expensetype/a_expense_type_view.php', '18', 3),
(59, 'Expenses', 'fa fa-server	', 'accounts/expenseentry/a_expense_entry_view.php', '18', 4),
(60, 'Profit & Loss', 'fa fa-file', 'accounts/profit_loss/profit_loss.php', '18', 7),
(61, 'Balance Sheet', 'fa fa-file', 'accounts/Balancesheeet/balance_sheet.php', '18', 8),
(62, 'Cash/Bank Summary', 'fa fa-file', 'accounts/cash_account/a_cash_report.php', '31', 11),
(63, 'Day Book', 'fa fa-file', 'accounts/day_book/day_book.php', '18', 12),
(64, 'Trial Balance', 'fa fa-file', 'accounts/trial_balance/trial_balance_date.php', '18', 13),
(65, 'Cash A/C Report', 'fa fa-gift', 'accounts/cash_account/a_cash_report.php', '31', 5),
(66, 'Bank A/c', 'fa fa-bank', 'master/bank_account/bank_account_view.php', '1', 1),
(67, 'Bank A/c Report', 'fa fa-bank', 'accounts/bank_account/a_bank_acc_report.php', '31', 6),
(68, 'Inventory Report', 'fa fa-hourglass-half', 'reports/inventory_report/inventory_report.php', '31', 5),
(69, 'Bills Receivable', 'fa fa-hourglass-half', 'reports/customer_invoice/invoice_report.php', '31', 6),
(70, 'Ledger Payment Report', 'fa fa-hourglass-half', 'reports/ledger_payment_report/ledger_payment_report.php', '31', 9),
(71, 'Purchase Asset', 'fa fa-cart-plus', 'store/purchase_asset/s_purchase_asset_view.php', '-37', 2),
(72, 'Bills Payable', 'fa fa-cart-plus', 'reports/suplier_payment_report/suplier_payment_report.php', '31', 7),
(73, 'Counter Sales Tax Report', 'fa fa-cart-plus', 'reports/sales_tax_report/sales_tax_report.php', '31', 8),
(74, 'Purchase Tax Report', 'fa fa-cart-plus', 'reports/purchase_tax_report/purchase_tax_report.php', '31', 11),
(75, 'Service Tax Report', 'fa fa-cart-plus', 'reports/service_tax_report/service_tax_report.php', '31', 9),
(76, 'Outsources View(or)Edit', 'fa fa-exchange', 'services/out_sources/out_sources_view.php', '-32', 3),
(77, 'Technician or advisor Report', 'fa fa-cart-plus', 'reports/technician_report/technician_report.php', '31', 6),
(78, 'Employee Attendance', 'fa fa-users', 'hr/employee_attendance/employee_attendance_date.php', '-14', 4),
(79, 'Painter Master', 'fa fa-list-alt', 'master/paniters_master/m_painter.php', '-1', 4),
(80, 'Painter voucher', 'fa fa-wrench', 'accounts/Painter_voucher/Painter_voucher.php', '-26', 3),
(81, 'CRM', 'fa fa-link', '#', '0', 2),
(82, 'Enquiry Entry', 'fa fa-comments', 'crm/enquiry/enquiry_view.php', '81', 0),
(83, 'Open Enquiry', 'glyphicon glyphicon-open', 'crm/enquiry/open_service_enquiry.php', '-81', 0),
(84, 'Close Enquiry', 'fa fa-thumbs-up', 'crm/enquiry/closed_service_enquiry.php', '-81', 0),
(85, 'Lead Report', 'glyphicon glyphicon-pencil', 'crm/enquiry/status_enquiry.php', '31', 0),
(86, 'Telecalling Report', 'glyphicon glyphicon-earphone', 'crm/enquiry/call_enquiry.php', '31', 0),
(87, 'Filter Enquiry', 'glyphicon glyphicon-filter', 'crm/enquiry/filter_enquiry.php', '-81', 0),
(88, 'Vehicle service Status', 'glyphicon glyphicon-filter', 'reports/vehicle_service_status/vehicle_service_status.php', '31', 10),
(89, 'Vehicle Segment', 'fa fa-gift', 'master/vehicle_segment/m_vehicle_segment.php', '-1', 19),
(90, 'Vehicle Master', 'fa fa-gift', 'master/vehicle_master/m_vehicle_master.php', '1', 18),
(91, 'Daily Report', 'fa fa-cart-plus', 'reports/daily_report/daily_report_report.php', '-31', 3),
(92, 'Customer Details Report', 'fa fa-cart-plus', 'reports/customer_details_report/customer_details.php', '31', 3),
(93, 'Lead Sheet', 'glyphicon glyphicon-pencil', 'crm/enquiry/recomdetails.php', '-81', 0),
(94, 'Referral Discount', 'fa fa-dropbox', 'master/referral_scheme/referral_scheme_view.php', '1', 14),
(95, 'Referrer Discount', 'fa fa-dropbox', 'master/referrer_scheme/referrer_scheme_view.php', '1', 15),
(96, 'Revenue Overview', 'glyphicon glyphicon-filter', 'reports/revenue_ovrview/revenue_ovrview.php', '31', 12),
(97, 'Daily Report', 'glyphicon glyphicon-filter', 'reports/daily_reports/daily_report_report.php', '31', 11),
(98, 'Expenses Overview', 'glyphicon glyphicon-filter', 'reports/expenses_overview/expenses_overview.php', '31', 13),
(99, 'Overall Overview', 'glyphicon glyphicon-filter', 'reports/overall_overview/overall_overview.php', '31', 14),
(100, 'Service Overview', 'glyphicon glyphicon-filter', 'reports/service_overview/service_overview.php', '31', 15),
(101, 'Login Report', 'fa fa-male', 'hr/login_details/h_login_details.php', '31', 9),
(102, 'Feedback Report', 'fa fa-cart-plus', 'reports/feedback_report/feedback_report.php', '31', 15),
(103, 'Service Type Report', 'fa fa-cart-plus', 'reports/jobcard_reports/service_type_report.php', '31', 16),
(104, 'Marketing', 'fa fa-puzzle-piece', '#', '0', 0),
(105, 'Bulk SMS', 'fa fa-commenting-o', 'marketing/sms/bulk_sms.php', '104', 1),
(106, 'GST Report', 'fa fa-percent', 'reports/gst_report/gst_report.php', '31', 3),
(107, 'User Role', 'fa fa-male', 'master/user_role/user_role_view.php', '1', 3),
(108, 'User Create', 'fa fa-male', 'master/user_create/f_user_create_view.php', '1', 4),
(109, 'Quotation', 'fa fa-cart-plus', 'store/quotation/s_quotation_view.php', '26', 3),
(110, 'Sales Invoice', 'fa fa-cart-plus', 'store/sales_invoice/sales_invoice_view.php', '26', 4),
(111, 'Bank Book Summary', 'fa fa-bank', 'accounts/bank_account/a_bank_acc_report.php', '18', 20),
(112, 'Cash Book Summary', 'fa fa-bank', 'accounts/cash_account/a_cash_report.php', '18', 21),
(113, 'Petty Cash Type', 'fa fa-bank', 'accounts/petty_type/a_petty_type.php', '18', 22),
(114, 'Petty Cash', 'fa fa-bank', 'accounts/petty_cash/a_petty_cash.php', '18', 23),
(115, 'Contra Entry', 'fa fa-cart-plus', 'accounts/contra_entry/contra_entry.php', '18', 20),
(116, 'Journal Entry', 'fa fa-cart-plus', 'accounts/journal_entry/journal_entry.php', '18', 19),
(117, 'General Ledger', 'fa fa-circle-o', 'reports/ledger_report/ledger_report.php', '31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_role_pages`
--

CREATE TABLE `t_role_pages` (
  `id` int(11) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `pageno` int(15) NOT NULL,
  `CreateData` int(11) NOT NULL,
  `EditData` int(11) NOT NULL,
  `ViewData` int(11) NOT NULL,
  `DeleteData` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role_pages`
--

INSERT INTO `t_role_pages` (`id`, `role_id`, `pageno`, `CreateData`, `EditData`, `ViewData`, `DeleteData`) VALUES
(250, '4', 2, 2, 2, 2, 2),
(251, '4', 3, 3, 3, 3, 3),
(252, '4', 4, 4, 4, 4, 4),
(253, '4', 6, 6, 6, 6, 6),
(254, '4', 7, 7, 7, 7, 7),
(255, '4', 8, 8, 8, 8, 8),
(256, '4', 10, 10, 10, 10, 10),
(257, '4', 12, 12, 12, 12, 12),
(258, '4', 37, 37, 37, 37, 37),
(259, '4', 51, 51, 51, 51, 51),
(260, '4', 54, 54, 54, 54, 54),
(261, '4', 55, 55, 55, 55, 55),
(262, '4', 66, 66, 66, 66, 66),
(263, '4', 90, 90, 90, 90, 90),
(264, '4', 94, 94, 94, 94, 94),
(265, '4', 95, 95, 95, 95, 95),
(266, '4', 1, 0, 0, 0, 0),
(267, '4', 2, 2, 2, 2, 2),
(268, '4', 3, 3, 3, 3, 3),
(269, '4', 4, 4, 4, 4, 4),
(270, '4', 6, 6, 6, 6, 6),
(271, '4', 7, 7, 7, 7, 7),
(272, '4', 8, 8, 8, 8, 8),
(273, '4', 10, 10, 10, 10, 10),
(274, '4', 12, 12, 12, 12, 12),
(275, '4', 13, 13, 13, 13, 13),
(276, '4', 36, 36, 36, 36, 36),
(277, '4', 37, 37, 37, 37, 37),
(278, '4', 51, 51, 51, 51, 51),
(279, '4', 54, 54, 54, 54, 54),
(280, '4', 55, 55, 55, 55, 55),
(281, '4', 66, 66, 66, 66, 66),
(282, '4', 90, 90, 90, 90, 90),
(283, '4', 94, 94, 94, 94, 94),
(284, '4', 95, 95, 95, 95, 95),
(285, '4', 107, 107, 107, 107, 107),
(286, '4', 108, 108, 108, 108, 108),
(287, '4', 1, 0, 0, 0, 0),
(288, '4', 2, 2, 2, 2, 2),
(289, '4', 3, 3, 3, 3, 3),
(290, '4', 4, 4, 4, 4, 4),
(291, '4', 6, 6, 6, 6, 6),
(292, '4', 7, 7, 7, 7, 7),
(293, '4', 8, 8, 8, 8, 8),
(294, '4', 10, 10, 10, 10, 10),
(295, '4', 12, 12, 12, 12, 12),
(296, '4', 13, 13, 13, 13, 13),
(297, '4', 36, 36, 36, 36, 36),
(298, '4', 37, 37, 37, 37, 37),
(299, '4', 51, 51, 51, 51, 51),
(300, '4', 54, 54, 54, 54, 54),
(301, '4', 55, 55, 55, 55, 55),
(302, '4', 66, 66, 66, 66, 66),
(303, '4', 90, 90, 90, 90, 90),
(304, '4', 94, 94, 94, 94, 94),
(305, '4', 95, 95, 95, 95, 95),
(306, '4', 107, 107, 107, 107, 107),
(307, '4', 108, 108, 108, 108, 108),
(308, '4', 14, 0, 0, 0, 0),
(309, '4', 15, 15, 15, 15, 15),
(310, '4', 16, 16, 16, 16, 16),
(311, '4', 17, 17, 17, 17, 17),
(312, '4', 18, 0, 0, 0, 0),
(313, '4', 19, 19, 19, 19, 19),
(314, '4', 20, 20, 20, 20, 20),
(315, '4', 49, 49, 49, 49, 49),
(316, '4', 53, 53, 53, 53, 53),
(317, '4', 58, 58, 58, 58, 58),
(318, '4', 59, 59, 59, 59, 59),
(319, '4', 60, 60, 60, 60, 60),
(320, '4', 61, 61, 61, 61, 61),
(321, '4', 63, 63, 63, 63, 63),
(322, '4', 64, 64, 64, 64, 64),
(323, '4', 21, 0, 0, 0, 0),
(324, '4', 22, 22, 22, 22, 22),
(325, '4', 40, 40, 40, 40, 40),
(326, '4', 26, 0, 0, 0, 0),
(327, '4', 27, 27, 27, 27, 27),
(328, '4', 28, 28, 28, 28, 28),
(329, '4', 44, 44, 44, 44, 44),
(330, '4', 56, 56, 56, 56, 56),
(331, '4', 30, 0, 0, 0, 0),
(332, '4', 38, 38, 38, 38, 38),
(333, '4', 31, 0, 0, 0, 0),
(334, '4', 33, 33, 33, 33, 33),
(335, '4', 41, 41, 41, 41, 41),
(336, '4', 42, 42, 42, 42, 42),
(337, '4', 43, 43, 43, 43, 43),
(338, '4', 57, 57, 57, 57, 57),
(339, '4', 62, 62, 62, 62, 62),
(340, '4', 65, 65, 65, 65, 65),
(341, '4', 67, 67, 67, 67, 67),
(342, '4', 68, 68, 68, 68, 68),
(343, '4', 69, 69, 69, 69, 69),
(344, '4', 70, 70, 70, 70, 70),
(345, '4', 72, 72, 72, 72, 72),
(346, '4', 73, 73, 73, 73, 73),
(347, '4', 74, 74, 74, 74, 74),
(348, '4', 75, 75, 75, 75, 75),
(349, '4', 77, 77, 77, 77, 77),
(350, '4', 85, 85, 85, 85, 85),
(351, '4', 86, 86, 86, 86, 86),
(352, '4', 88, 88, 88, 88, 88),
(353, '4', 92, 92, 92, 92, 92),
(354, '4', 96, 96, 96, 96, 96),
(355, '4', 97, 97, 97, 97, 97),
(356, '4', 98, 98, 98, 98, 98),
(357, '4', 99, 99, 99, 99, 99),
(358, '4', 100, 100, 100, 100, 100),
(359, '4', 101, 101, 101, 101, 101),
(360, '4', 102, 102, 102, 102, 102),
(361, '4', 103, 103, 103, 103, 103),
(362, '4', 106, 106, 106, 106, 106),
(363, '4', 81, 0, 0, 0, 0),
(364, '4', 82, 82, 82, 82, 82),
(365, '4', 104, 0, 0, 0, 0),
(366, '4', 105, 105, 105, 105, 105),
(367, '2', 1, 0, 0, 0, 0),
(368, '2', 2, 2, 2, 2, 0),
(369, '2', 3, 3, 3, 3, 0),
(450, '5', 1, 0, 0, 0, 0),
(451, '5', 2, 2, 2, 2, 2),
(452, '5', 3, 3, 3, 3, 3),
(453, '5', 4, 4, 4, 4, 4),
(454, '5', 6, 6, 6, 6, 6),
(455, '5', 7, 7, 7, 7, 7),
(456, '5', 8, 8, 8, 8, 8),
(457, '5', 10, 10, 10, 10, 10),
(458, '5', 12, 12, 12, 12, 12),
(459, '5', 13, 13, 13, 13, 13),
(460, '5', 36, 36, 36, 36, 36),
(461, '5', 37, 37, 37, 37, 37),
(462, '5', 51, 51, 51, 51, 51),
(463, '5', 54, 54, 54, 54, 54),
(464, '5', 55, 55, 55, 55, 55),
(465, '5', 66, 66, 66, 66, 66),
(466, '5', 90, 90, 90, 90, 90),
(467, '5', 94, 94, 94, 94, 94),
(468, '5', 95, 95, 95, 95, 95),
(469, '5', 107, 107, 107, 107, 107),
(470, '5', 108, 108, 108, 108, 108),
(471, '2', 1, 0, 0, 0, 0),
(472, '2', 2, 2, 2, 2, 2),
(473, '2', 3, 3, 3, 3, 3),
(474, '2', 4, 4, 4, 4, 4),
(475, '2', 6, 6, 6, 6, 6),
(476, '2', 7, 7, 7, 7, 7),
(477, '2', 8, 8, 8, 8, 8),
(478, '2', 10, 10, 10, 10, 10),
(479, '2', 12, 12, 12, 12, 12),
(480, '2', 13, 13, 13, 13, 13),
(481, '2', 36, 36, 36, 36, 36),
(482, '2', 37, 37, 37, 37, 37),
(483, '2', 51, 51, 51, 51, 51),
(484, '2', 54, 54, 54, 54, 54),
(485, '2', 55, 55, 55, 55, 55),
(486, '2', 66, 66, 66, 66, 66),
(487, '2', 90, 90, 90, 90, 90),
(488, '2', 94, 94, 94, 94, 94),
(489, '2', 95, 95, 95, 95, 95),
(490, '2', 107, 107, 107, 107, 107),
(491, '2', 108, 108, 108, 108, 108),
(492, '6', 1, 0, 0, 0, 0),
(493, '6', 2, 2, 2, 2, 2),
(494, '6', 3, 3, 3, 3, 3),
(495, '6', 4, 4, 4, 4, 4),
(496, '6', 6, 6, 6, 6, 6),
(497, '6', 7, 7, 7, 7, 7),
(498, '6', 8, 8, 8, 8, 8),
(499, '6', 10, 10, 10, 10, 10),
(500, '6', 12, 12, 12, 12, 12),
(501, '6', 13, 13, 13, 13, 13),
(502, '6', 36, 36, 36, 36, 36),
(503, '6', 37, 37, 37, 37, 37),
(504, '6', 51, 51, 51, 51, 51),
(505, '6', 54, 54, 54, 54, 54),
(506, '6', 55, 55, 55, 55, 55),
(507, '6', 66, 66, 66, 66, 66),
(508, '6', 90, 90, 90, 90, 90),
(509, '6', 94, 94, 94, 94, 94),
(510, '6', 95, 95, 95, 95, 95),
(511, '6', 107, 107, 107, 107, 107),
(512, '6', 108, 108, 108, 108, 108),
(513, '7', 1, 0, 0, 0, 0),
(514, '8', 1, 0, 0, 0, 0),
(515, '9', 1, 0, 0, 0, 0),
(516, '10', 1, 0, 0, 0, 0),
(517, '10', 2, 2, 2, 2, 2),
(518, '10', 3, 3, 3, 3, 3),
(519, '10', 4, 4, 4, 4, 4),
(520, '10', 6, 6, 6, 6, 6),
(521, '10', 7, 7, 7, 7, 7),
(522, '10', 8, 8, 8, 8, 8),
(523, '10', 10, 10, 10, 10, 10),
(524, '10', 12, 12, 12, 12, 12),
(525, '10', 13, 13, 13, 13, 13),
(526, '10', 36, 36, 36, 36, 36),
(527, '10', 37, 37, 37, 37, 37),
(528, '10', 51, 51, 51, 51, 51),
(529, '10', 54, 54, 54, 54, 54),
(530, '10', 55, 55, 55, 55, 55),
(531, '10', 66, 66, 66, 66, 66),
(532, '10', 90, 90, 90, 90, 90),
(533, '10', 94, 94, 94, 94, 94),
(534, '10', 95, 95, 95, 95, 95),
(535, '10', 107, 107, 107, 107, 107),
(536, '10', 108, 108, 108, 108, 108),
(537, '4', 1, 0, 0, 0, 0),
(538, '4', 2, 2, 2, 2, 2),
(539, '4', 3, 3, 3, 3, 3),
(540, '4', 4, 4, 4, 4, 4),
(541, '4', 6, 6, 6, 6, 6),
(542, '4', 7, 7, 7, 7, 7),
(543, '4', 8, 8, 8, 8, 8),
(544, '4', 10, 10, 10, 10, 10),
(545, '4', 12, 12, 12, 12, 12),
(546, '4', 13, 13, 13, 13, 13),
(547, '4', 36, 36, 36, 36, 36),
(548, '4', 37, 37, 37, 37, 37),
(549, '4', 51, 51, 51, 51, 51),
(550, '4', 54, 54, 54, 54, 54),
(551, '4', 55, 55, 55, 55, 55),
(552, '4', 66, 66, 66, 66, 66),
(553, '4', 90, 90, 90, 90, 90),
(554, '4', 94, 94, 94, 94, 94),
(555, '4', 95, 95, 95, 95, 95),
(556, '4', 107, 107, 107, 107, 107),
(557, '4', 108, 108, 108, 108, 108),
(565, '11', 1, 0, 0, 0, 0),
(566, '11', 0, 0, 0, 0, 0),
(567, '11', 2, 2, 2, 0, 2),
(986, '1', 1, 0, 0, 0, 0),
(987, '1', 0, 0, 0, 0, 0),
(988, '1', 2, 2, 2, 2, 2),
(989, '1', 3, 3, 3, 3, 3),
(990, '1', 4, 4, 4, 4, 4),
(991, '1', 6, 6, 6, 6, 6),
(992, '1', 7, 7, 7, 7, 7),
(993, '1', 8, 8, 8, 8, 8),
(994, '1', 10, 10, 10, 10, 10),
(995, '1', 12, 12, 12, 12, 12),
(996, '1', 36, 36, 36, 36, 36),
(997, '1', 37, 37, 37, 37, 37),
(998, '1', 51, 51, 51, 51, 51),
(999, '1', 54, 54, 54, 54, 54),
(1000, '1', 55, 55, 55, 55, 55),
(1001, '1', 66, 66, 66, 66, 66),
(1002, '1', 90, 90, 90, 90, 90),
(1003, '1', 94, 94, 94, 94, 94),
(1004, '1', 95, 95, 95, 95, 95),
(1005, '1', 107, 107, 107, 107, 107),
(1006, '1', 108, 108, 108, 108, 108),
(1007, '1', 14, 0, 0, 0, 0),
(1008, '1', 15, 15, 15, 15, 15),
(1009, '1', 16, 16, 16, 16, 16),
(1010, '1', 17, 17, 17, 17, 17),
(1011, '1', 18, 0, 0, 0, 0),
(1012, '1', 19, 19, 19, 19, 19),
(1013, '1', 20, 20, 20, 20, 20),
(1014, '1', 49, 49, 49, 49, 49),
(1015, '1', 53, 53, 53, 53, 53),
(1016, '1', 58, 58, 58, 58, 58),
(1017, '1', 59, 59, 59, 59, 59),
(1018, '1', 60, 60, 60, 60, 60),
(1019, '1', 61, 61, 61, 61, 61),
(1020, '1', 63, 63, 63, 63, 63),
(1021, '1', 64, 64, 64, 64, 64),
(1022, '1', 111, 111, 111, 111, 111),
(1023, '1', 112, 112, 112, 112, 112),
(1024, '1', 113, 113, 113, 113, 113),
(1025, '1', 114, 114, 114, 114, 114),
(1026, '1', 115, 115, 115, 115, 115),
(1027, '1', 116, 116, 116, 116, 116),
(1028, '1', 21, 0, 0, 0, 0),
(1029, '1', 22, 22, 22, 22, 22),
(1030, '1', 40, 40, 40, 40, 40),
(1031, '1', 26, 0, 0, 0, 0),
(1032, '1', 27, 27, 27, 27, 27),
(1033, '1', 28, 28, 28, 28, 28),
(1034, '1', 44, 44, 44, 44, 44),
(1035, '1', 56, 56, 56, 56, 56),
(1036, '1', 109, 109, 109, 109, 109),
(1037, '1', 110, 110, 110, 110, 110),
(1038, '1', 30, 0, 0, 0, 0),
(1039, '1', 38, 38, 38, 38, 38),
(1040, '1', 31, 0, 0, 0, 0),
(1041, '1', 33, 33, 33, 33, 33),
(1042, '1', 41, 41, 41, 41, 41),
(1043, '1', 42, 42, 42, 42, 42),
(1044, '1', 43, 43, 43, 43, 43),
(1045, '1', 57, 57, 57, 57, 57),
(1046, '1', 62, 62, 62, 62, 62),
(1047, '1', 65, 65, 65, 65, 65),
(1048, '1', 67, 67, 67, 67, 67),
(1049, '1', 68, 68, 68, 68, 68),
(1050, '1', 69, 69, 69, 69, 69),
(1051, '1', 70, 70, 70, 70, 70),
(1052, '1', 72, 72, 72, 72, 72),
(1053, '1', 73, 73, 73, 73, 73),
(1054, '1', 74, 74, 74, 74, 74),
(1055, '1', 75, 75, 75, 75, 75),
(1056, '1', 77, 77, 77, 77, 77),
(1057, '1', 85, 85, 85, 85, 85),
(1058, '1', 86, 86, 86, 86, 86),
(1059, '1', 88, 88, 88, 88, 88),
(1060, '1', 92, 92, 92, 92, 92),
(1061, '1', 96, 96, 96, 96, 96),
(1062, '1', 97, 97, 97, 97, 97),
(1063, '1', 98, 98, 98, 98, 98),
(1064, '1', 99, 99, 99, 99, 99),
(1065, '1', 100, 100, 100, 100, 100),
(1066, '1', 101, 101, 101, 101, 101),
(1067, '1', 102, 102, 0, 0, 0),
(1068, '1', 103, 103, 103, 103, 103),
(1069, '1', 106, 106, 106, 106, 106),
(1070, '1', 117, 117, 117, 117, 117),
(1071, '1', 81, 0, 0, 0, 0),
(1072, '1', 82, 82, 82, 82, 82);

-- --------------------------------------------------------

--
-- Table structure for table `t_user_pages`
--

CREATE TABLE `t_user_pages` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pageno` int(15) NOT NULL,
  `CreateData` int(11) NOT NULL,
  `EditData` int(11) NOT NULL,
  `ViewData` int(11) NOT NULL,
  `DeleteData` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_pages`
--

INSERT INTO `t_user_pages` (`id`, `uname`, `pageno`, `CreateData`, `EditData`, `ViewData`, `DeleteData`) VALUES
(2, 'outdoor1', 1, 0, 0, 0, 0),
(3, 'outdoor1', 2, 0, 0, 0, 0),
(4, 'outdoor1', 61, 0, 0, 0, 0),
(5, 'outdoor1', 62, 0, 0, 0, 0),
(6, 'outdoor1', 32, 0, 0, 0, 0),
(7, 'outdoor1', 33, 0, 0, 0, 0),
(8, 'outdoor1', 34, 0, 0, 0, 0),
(9, 'outdoor1', 50, 0, 0, 0, 0),
(10, 'outdoor1', 51, 0, 0, 0, 0),
(11, 'outdoor1', 37, 0, 0, 0, 0),
(12, 'outdoor1', 39, 0, 0, 0, 0),
(13, 'outdoor1', 40, 0, 0, 0, 0),
(14, 'outdoor1', 41, 0, 0, 0, 0),
(15, 'outdoor1', 49, 0, 0, 0, 0),
(16, 'service', 1, 0, 0, 0, 0),
(17, 'service', 2, 0, 0, 0, 0),
(18, 'service', 32, 0, 0, 0, 0),
(19, 'service', 33, 0, 0, 0, 0),
(20, 'service', 51, 0, 0, 0, 0),
(21, 'service', 37, 0, 0, 0, 0),
(22, 'service', 55, 0, 0, 0, 0),
(23, 'service', 41, 0, 0, 0, 0),
(24, 'service', 49, 0, 0, 0, 0),
(25, 'service', 42, 0, 0, 0, 0),
(26, 'service', 52, 0, 0, 0, 0),
(27, 'service', 82, 0, 0, 0, 0),
(28, 'service', 96, 0, 0, 0, 0),
(29, 'service', 108, 0, 0, 0, 0),
(30, 'manager', 1, 0, 0, 0, 0),
(31, 'manager', 2, 0, 0, 0, 0),
(32, 'manager', 4, 0, 0, 0, 0),
(33, 'manager', 11, 0, 0, 0, 0),
(34, 'manager', 12, 0, 0, 0, 0),
(35, 'manager', 13, 0, 0, 0, 0),
(36, 'manager', 15, 0, 0, 0, 0),
(37, 'manager', 17, 0, 0, 0, 0),
(38, 'manager', 21, 0, 0, 0, 0),
(39, 'manager', 48, 0, 0, 0, 0),
(40, 'manager', 62, 0, 0, 0, 0),
(41, 'manager', 66, 0, 0, 0, 0),
(42, 'manager', 80, 0, 0, 0, 0),
(43, 'manager', 105, 0, 0, 0, 0),
(44, 'manager', 109, 0, 0, 0, 0),
(45, 'manager', 110, 0, 0, 0, 0),
(46, 'manager', 22, 0, 0, 0, 0),
(47, 'manager', 23, 0, 0, 0, 0),
(48, 'manager', 24, 0, 0, 0, 0),
(49, 'manager', 25, 0, 0, 0, 0),
(50, 'manager', 56, 0, 0, 0, 0),
(51, 'manager', 57, 0, 0, 0, 0),
(52, 'manager', 58, 0, 0, 0, 0),
(53, 'manager', 59, 0, 0, 0, 0),
(54, 'manager', 93, 0, 0, 0, 0),
(55, 'manager', 117, 0, 0, 0, 0),
(56, 'manager', 26, 0, 0, 0, 0),
(57, 'manager', 27, 0, 0, 0, 0),
(58, 'manager', 28, 0, 0, 0, 0),
(59, 'manager', 60, 0, 0, 0, 0),
(60, 'manager', 64, 0, 0, 0, 0),
(61, 'manager', 70, 0, 0, 0, 0),
(62, 'manager', 71, 0, 0, 0, 0),
(63, 'manager', 72, 0, 0, 0, 0),
(64, 'manager', 73, 0, 0, 0, 0),
(65, 'manager', 76, 0, 0, 0, 0),
(66, 'manager', 77, 0, 0, 0, 0),
(67, 'manager', 78, 0, 0, 0, 0),
(68, 'manager', 95, 0, 0, 0, 0),
(69, 'manager', 32, 0, 0, 0, 0),
(70, 'manager', 33, 0, 0, 0, 0),
(71, 'manager', 51, 0, 0, 0, 0),
(72, 'manager', 37, 0, 0, 0, 0),
(73, 'manager', 38, 0, 0, 0, 0),
(74, 'manager', 39, 0, 0, 0, 0),
(75, 'manager', 55, 0, 0, 0, 0),
(76, 'manager', 41, 0, 0, 0, 0),
(77, 'manager', 49, 0, 0, 0, 0),
(78, 'manager', 42, 0, 0, 0, 0),
(79, 'manager', 44, 0, 0, 0, 0),
(80, 'manager', 52, 0, 0, 0, 0),
(81, 'manager', 69, 0, 0, 0, 0),
(82, 'manager', 88, 0, 0, 0, 0),
(83, 'manager', 90, 0, 0, 0, 0),
(84, 'manager', 92, 0, 0, 0, 0),
(85, 'manager', 103, 0, 0, 0, 0),
(86, 'manager', 107, 0, 0, 0, 0),
(87, 'manager', 111, 0, 0, 0, 0),
(88, 'manager', 112, 0, 0, 0, 0),
(89, 'manager', 114, 0, 0, 0, 0),
(90, 'manager', 115, 0, 0, 0, 0),
(91, 'manager', 116, 0, 0, 0, 0),
(92, 'manager', 118, 0, 0, 0, 0),
(93, 'manager', 119, 0, 0, 0, 0),
(94, 'manager', 96, 0, 0, 0, 0),
(95, 'manager', 108, 0, 0, 0, 0),
(96, 'manager', 120, 0, 0, 0, 0),
(97, 'manager', 121, 0, 0, 0, 0),
(755, '', 1, 0, 0, 6, 0),
(1006, 'divakaran', 2, 2, 2, 2, 2),
(1007, 'divakaran', 1, 2, 2, 2, 2),
(1008, 'divakaran', 3, 3, 3, 3, 3),
(1009, 'divakaran', 4, 4, 4, 4, 4),
(1010, 'divakaran', 6, 6, 6, 6, 6),
(1011, 'divakaran', 7, 7, 7, 7, 7),
(1012, 'divakaran', 8, 8, 8, 8, 8),
(1013, 'divakaran', 14, 0, 0, 0, 0),
(1014, 'divakaran', 0, 0, 0, 0, 0),
(1015, 'divakaran', 15, 0, 0, 0, 0),
(1016, 'divakaran', 16, 0, 0, 0, 0),
(1017, 'divakaran', 17, 0, 0, 0, 0),
(1018, 'divakaran', 45, 0, 0, 0, 0),
(1019, 'divakaran', 46, 0, 0, 0, 0),
(1020, 'divakaran', 47, 0, 0, 0, 0),
(1021, 'divakaran', 48, 0, 0, 0, 0),
(1022, 'divakaran', 78, 0, 0, 0, 0),
(1023, 'divakaran', 18, 0, 0, 0, 0),
(1024, 'divakaran', 19, 0, 0, 0, 0),
(1025, 'divakaran', 20, 0, 0, 0, 0),
(1026, 'divakaran', 49, 0, 0, 0, 0),
(1027, 'divakaran', 53, 0, 0, 0, 0),
(1028, 'divakaran', 58, 0, 0, 0, 0),
(1029, 'divakaran', 59, 0, 0, 0, 0),
(1030, 'divakaran', 60, 0, 0, 0, 0),
(1031, 'divakaran', 61, 0, 0, 0, 0),
(1032, 'divakaran', 63, 0, 0, 0, 0),
(1033, 'divakaran', 64, 0, 0, 0, 0),
(1034, 'divakaran', 21, 0, 0, 0, 0),
(1035, 'divakaran', 22, 0, 0, 0, 0),
(1036, 'divakaran', 40, 0, 0, 0, 0),
(1037, 'divakaran', 27, 27, 27, 27, 27),
(1038, 'divakaran', 26, 27, 27, 27, 27),
(1039, 'divakaran', 28, 28, 28, 28, 28),
(1040, 'divakaran', 44, 44, 44, 44, 44),
(1041, 'divakaran', 56, 56, 56, 56, 56),
(1042, 'divakaran', 33, 0, 0, 0, 0),
(1043, 'divakaran', 31, 0, 0, 0, 0),
(1044, 'divakaran', 41, 0, 0, 0, 0),
(1045, 'divakaran', 42, 0, 0, 0, 0),
(1046, 'divakaran', 43, 0, 0, 0, 0),
(1047, 'divakaran', 62, 0, 0, 0, 0),
(1048, 'divakaran', 65, 0, 0, 0, 0),
(1049, 'divakaran', 67, 0, 0, 0, 0),
(1050, 'divakaran', 68, 0, 0, 0, 0),
(1051, 'divakaran', 69, 0, 0, 0, 0),
(1052, 'divakaran', 70, 0, 0, 0, 0),
(1053, 'divakaran', 72, 0, 0, 0, 0),
(1054, 'divakaran', 73, 0, 0, 0, 0),
(1055, 'divakaran', 74, 0, 0, 0, 0),
(1056, 'divakaran', 75, 0, 0, 0, 0),
(1057, 'divakaran', 77, 0, 0, 0, 0),
(1058, 'divakaran', 85, 0, 0, 0, 0),
(1059, 'divakaran', 86, 0, 0, 0, 0),
(1060, 'divakaran', 88, 0, 0, 0, 0),
(1061, 'divakaran', 92, 0, 0, 0, 0),
(1062, 'divakaran', 96, 0, 0, 0, 0),
(1063, 'divakaran', 97, 0, 0, 0, 0),
(1064, 'divakaran', 98, 0, 0, 0, 0),
(1065, 'divakaran', 99, 0, 0, 0, 0),
(1066, 'divakaran', 100, 0, 0, 0, 0),
(1067, 'divakaran', 101, 0, 0, 0, 0),
(1068, 'divakaran', 102, 0, 0, 0, 0),
(1069, 'divakaran', 103, 0, 0, 0, 0),
(1070, 'divakaran', 106, 0, 0, 0, 0),
(1071, 'divakaran', 81, 0, 0, 0, 0),
(1072, 'divakaran', 82, 0, 0, 0, 0),
(1073, 'divakaran', 83, 0, 0, 0, 0),
(1074, 'divakaran', 84, 0, 0, 0, 0),
(1075, 'divakaran', 87, 0, 0, 0, 0),
(1076, 'divakaran', 93, 0, 0, 0, 0),
(1153, 'admin', 1, 0, 0, 0, 0),
(1154, 'admin', 0, 0, 0, 0, 0),
(1155, 'admin', 2, 2, 2, 2, 2),
(1156, 'admin', 3, 0, 0, 0, 0),
(1157, 'admin', 4, 0, 0, 0, 0),
(1158, 'admin', 6, 0, 0, 0, 0),
(1159, 'admin', 7, 0, 0, 0, 0),
(1160, 'admin', 8, 0, 0, 0, 0),
(1161, 'admin', 10, 0, 0, 0, 0),
(1162, 'admin', 11, 0, 0, 0, 0),
(1163, 'admin', 12, 0, 0, 0, 0),
(1164, 'admin', 13, 0, 0, 0, 0),
(1165, 'admin', 34, 0, 0, 0, 0),
(1166, 'admin', 36, 0, 0, 0, 0),
(1167, 'admin', 37, 0, 0, 0, 0),
(1168, 'admin', 51, 0, 0, 0, 0),
(1169, 'admin', 54, 0, 0, 0, 0),
(1170, 'admin', 55, 0, 0, 0, 0),
(1171, 'admin', 66, 0, 0, 0, 0),
(1172, 'admin', 90, 0, 0, 0, 0),
(1173, 'admin', 94, 0, 0, 0, 0),
(1174, 'admin', 95, 0, 0, 0, 0),
(1175, 'admin', 15, 0, 0, 0, 0),
(1176, 'admin', 14, 0, 0, 0, 0),
(1177, 'admin', 16, 0, 0, 0, 0),
(1178, 'admin', 17, 0, 0, 0, 0),
(1179, 'admin', 18, 0, 0, 0, 0),
(1180, 'admin', 19, 0, 0, 0, 0),
(1181, 'admin', 20, 0, 0, 0, 0),
(1182, 'admin', 49, 0, 0, 0, 0),
(1183, 'admin', 53, 0, 0, 0, 0),
(1184, 'admin', 58, 0, 0, 0, 0),
(1185, 'admin', 59, 0, 0, 0, 0),
(1186, 'admin', 60, 0, 0, 0, 0),
(1187, 'admin', 61, 0, 0, 0, 0),
(1188, 'admin', 63, 0, 0, 0, 0),
(1189, 'admin', 64, 0, 0, 0, 0),
(1190, 'admin', 21, 0, 0, 0, 0),
(1191, 'admin', 22, 0, 0, 0, 0),
(1192, 'admin', 40, 0, 0, 0, 0),
(1193, 'admin', 26, 0, 0, 0, 0),
(1194, 'admin', 27, 27, 27, 27, 27),
(1195, 'admin', 28, 0, 0, 0, 0),
(1196, 'admin', 44, 0, 0, 0, 0),
(1197, 'admin', 56, 0, 0, 0, 0),
(1198, 'admin', 80, 0, 0, 0, 0),
(1199, 'admin', 30, 0, 0, 0, 0),
(1200, 'admin', 38, 0, 0, 0, 0),
(1201, 'admin', 33, 0, 0, 0, 0),
(1202, 'admin', 31, 0, 0, 0, 0),
(1203, 'admin', 41, 0, 0, 0, 0),
(1204, 'admin', 42, 0, 0, 0, 0),
(1205, 'admin', 43, 0, 0, 0, 0),
(1206, 'admin', 62, 0, 0, 0, 0),
(1207, 'admin', 65, 0, 0, 0, 0),
(1208, 'admin', 67, 0, 0, 0, 0),
(1209, 'admin', 68, 0, 0, 0, 0),
(1210, 'admin', 69, 0, 0, 0, 0),
(1211, 'admin', 70, 0, 0, 0, 0),
(1212, 'admin', 72, 0, 0, 0, 0),
(1213, 'admin', 73, 0, 0, 0, 0),
(1214, 'admin', 74, 0, 0, 0, 0),
(1215, 'admin', 75, 0, 0, 0, 0),
(1216, 'admin', 77, 0, 0, 0, 0),
(1217, 'admin', 85, 0, 0, 0, 0),
(1218, 'admin', 86, 0, 0, 0, 0),
(1219, 'admin', 88, 0, 0, 0, 0),
(1220, 'admin', 92, 0, 0, 0, 0),
(1221, 'admin', 96, 0, 0, 0, 0),
(1222, 'admin', 97, 0, 0, 0, 0),
(1223, 'admin', 98, 0, 0, 0, 0),
(1224, 'admin', 99, 0, 0, 0, 0),
(1225, 'admin', 100, 0, 0, 0, 0),
(1226, 'admin', 101, 0, 0, 0, 0),
(1227, 'admin', 102, 0, 0, 0, 0),
(1228, 'admin', 103, 0, 0, 0, 0),
(1229, 'admin', 106, 0, 0, 0, 0),
(1230, 'admin', 82, 0, 0, 0, 0),
(1231, 'admin', 81, 0, 0, 0, 0),
(1232, 'admin', 93, 0, 0, 0, 0),
(1233, 'admin', 104, 0, 0, 0, 0),
(1234, 'admin', 105, 0, 0, 0, 0),
(1314, 'nazeer', 2, 0, 0, 0, 0),
(1315, 'nazeer', 1, 0, 0, 0, 0),
(1316, 'nazeer', 3, 0, 0, 0, 0),
(1317, 'nazeer', 4, 0, 0, 0, 0),
(1318, 'nazeer', 6, 0, 0, 0, 0),
(1319, 'nazeer', 7, 0, 0, 0, 0),
(1320, 'nazeer', 8, 0, 0, 0, 0),
(1321, 'nazeer', 10, 0, 0, 0, 0),
(1322, 'nazeer', 12, 0, 0, 0, 0),
(1323, 'nazeer', 13, 0, 0, 0, 0),
(1324, 'nazeer', 36, 0, 0, 0, 0),
(1325, 'nazeer', 37, 0, 0, 0, 0),
(1326, 'nazeer', 51, 0, 0, 0, 0),
(1327, 'nazeer', 54, 0, 0, 0, 0),
(1328, 'nazeer', 55, 0, 0, 0, 0),
(1329, 'nazeer', 66, 0, 0, 0, 0),
(1330, 'nazeer', 90, 0, 0, 0, 0),
(1331, 'nazeer', 94, 0, 0, 0, 0),
(1332, 'nazeer', 95, 0, 0, 0, 0),
(1333, 'nazeer', 14, 0, 0, 0, 0),
(1334, 'nazeer', 0, 0, 0, 0, 0),
(1335, 'nazeer', 15, 0, 0, 0, 0),
(1336, 'nazeer', 16, 0, 0, 0, 0),
(1337, 'nazeer', 17, 0, 0, 0, 0),
(1338, 'nazeer', 18, 0, 0, 0, 0),
(1339, 'nazeer', 19, 0, 0, 0, 0),
(1340, 'nazeer', 20, 0, 0, 0, 0),
(1341, 'nazeer', 49, 0, 0, 0, 0),
(1342, 'nazeer', 53, 0, 0, 0, 0),
(1343, 'nazeer', 58, 0, 0, 0, 0),
(1344, 'nazeer', 59, 0, 0, 0, 0),
(1345, 'nazeer', 60, 0, 0, 0, 0),
(1346, 'nazeer', 61, 0, 0, 0, 0),
(1347, 'nazeer', 63, 0, 0, 0, 0),
(1348, 'nazeer', 64, 0, 0, 0, 0),
(1349, 'nazeer', 21, 0, 0, 0, 0),
(1350, 'nazeer', 22, 0, 0, 0, 0),
(1351, 'nazeer', 40, 0, 0, 0, 0),
(1352, 'nazeer', 27, 27, 27, 27, 27),
(1353, 'nazeer', 26, 27, 27, 27, 27),
(1354, 'nazeer', 28, 28, 0, 0, 0),
(1355, 'nazeer', 44, 0, 0, 0, 0),
(1356, 'nazeer', 56, 0, 0, 0, 0),
(1357, 'nazeer', 30, 0, 0, 0, 0),
(1358, 'nazeer', 38, 0, 0, 0, 0),
(1359, 'nazeer', 31, 0, 0, 0, 0),
(1360, 'nazeer', 33, 0, 0, 0, 0),
(1361, 'nazeer', 41, 0, 0, 0, 0),
(1362, 'nazeer', 42, 0, 0, 0, 0),
(1363, 'nazeer', 43, 0, 0, 0, 0),
(1364, 'nazeer', 57, 0, 0, 0, 0),
(1365, 'nazeer', 62, 0, 0, 0, 0),
(1366, 'nazeer', 65, 0, 0, 0, 0),
(1367, 'nazeer', 67, 0, 0, 0, 0),
(1368, 'nazeer', 68, 0, 0, 0, 0),
(1369, 'nazeer', 69, 0, 0, 0, 0),
(1370, 'nazeer', 70, 0, 0, 0, 0),
(1371, 'nazeer', 72, 0, 0, 0, 0),
(1372, 'nazeer', 73, 0, 0, 0, 0),
(1373, 'nazeer', 74, 0, 0, 0, 0),
(1374, 'nazeer', 75, 0, 0, 0, 0),
(1375, 'nazeer', 77, 0, 0, 0, 0),
(1376, 'nazeer', 85, 0, 0, 0, 0),
(1377, 'nazeer', 86, 0, 0, 0, 0),
(1378, 'nazeer', 88, 0, 0, 0, 0),
(1379, 'nazeer', 92, 0, 0, 0, 0),
(1380, 'nazeer', 96, 0, 0, 0, 0),
(1381, 'nazeer', 97, 0, 0, 0, 0),
(1382, 'nazeer', 98, 0, 0, 0, 0),
(1383, 'nazeer', 99, 0, 0, 0, 0),
(1384, 'nazeer', 100, 0, 0, 0, 0),
(1385, 'nazeer', 101, 0, 0, 0, 0),
(1386, 'nazeer', 102, 0, 0, 0, 0),
(1387, 'nazeer', 103, 0, 0, 0, 0),
(1388, 'nazeer', 106, 0, 0, 0, 0),
(1389, 'nazeer', 81, 0, 0, 0, 0),
(1390, 'nazeer', 82, 0, 0, 0, 0),
(1391, 'nazeer', 104, 0, 0, 0, 0),
(1392, 'nazeer', 105, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(12) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`, `status`) VALUES
(1, 'Admin', 'Active'),
(2, 'Manager', 'Active'),
(4, 'Vendor', 'Active'),
(11, 'Employee', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(12) NOT NULL,
  `vdate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `vdate`, `amount`, `remarks`, `status`) VALUES
(1, '0000-00-00', 0, '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_bank`
--
ALTER TABLE `account_bank`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `account_cash`
--
ALTER TABLE `account_cash`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `account_cash_bank`
--
ALTER TABLE `account_cash_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_bank_acc`
--
ALTER TABLE `a_bank_acc`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `a_cash_acc`
--
ALTER TABLE `a_cash_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_customer`
--
ALTER TABLE `a_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_customer_vehicle_details`
--
ALTER TABLE `a_customer_vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_final_bill`
--
ALTER TABLE `a_final_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_final_bill_details`
--
ALTER TABLE `a_final_bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_final_bill_spare_details`
--
ALTER TABLE `a_final_bill_spare_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_final_bill_spare_temp`
--
ALTER TABLE `a_final_bill_spare_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_hand_over_cash`
--
ALTER TABLE `a_hand_over_cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_petty_cash`
--
ALTER TABLE `a_petty_cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_petty_type`
--
ALTER TABLE `a_petty_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_rec_voucher`
--
ALTER TABLE `a_rec_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contra_entry`
--
ALTER TABLE `contra_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contra_main`
--
ALTER TABLE `contra_main`
  ADD PRIMARY KEY (`ContraMainID`);

--
-- Indexes for table `contra_sub`
--
ALTER TABLE `contra_sub`
  ADD PRIMARY KEY (`ContraSubId`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `crm_callpurpose`
--
ALTER TABLE `crm_callpurpose`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `crm_enquiry`
--
ALTER TABLE `crm_enquiry`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `crm_enquiry_status`
--
ALTER TABLE `crm_enquiry_status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `crm_enquiry_vehicle_details`
--
ALTER TABLE `crm_enquiry_vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crm_folllowup`
--
ALTER TABLE `crm_folllowup`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `crm_folllowup_main`
--
ALTER TABLE `crm_folllowup_main`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `crm_relatedto`
--
ALTER TABLE `crm_relatedto`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer_old_data`
--
ALTER TABLE `customer_old_data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer_old_data1`
--
ALTER TABLE `customer_old_data1`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cust_outstanding`
--
ALTER TABLE `cust_outstanding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_details`
--
ALTER TABLE `expense_details`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `expense_master`
--
ALTER TABLE `expense_master`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fb_outstanding`
--
ALTER TABLE `fb_outstanding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fb_outstanding_history`
--
ALTER TABLE `fb_outstanding_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalbillpackage`
--
ALTER TABLE `finalbillpackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_year`
--
ALTER TABLE `financial_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_financial_year`
--
ALTER TABLE `f_financial_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_user_create`
--
ALTER TABLE `f_user_create`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_department`
--
ALTER TABLE `h_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_designation`
--
ALTER TABLE `h_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_employee`
--
ALTER TABLE `h_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_employee_attendance_entry`
--
ALTER TABLE `h_employee_attendance_entry`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `h_employee_proof`
--
ALTER TABLE `h_employee_proof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_offer_letter`
--
ALTER TABLE `h_offer_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_payroll_calculation`
--
ALTER TABLE `h_payroll_calculation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `h_relieving`
--
ALTER TABLE `h_relieving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `job_card_no`
--
ALTER TABLE `job_card_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_entry`
--
ALTER TABLE `journal_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_vehicle`
--
ALTER TABLE `master_vehicle`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `master_vehicle_segment`
--
ALTER TABLE `master_vehicle_segment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myautocart_service_bookings`
--
ALTER TABLE `myautocart_service_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_asset_brand`
--
ALTER TABLE `m_asset_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_brand`
--
ALTER TABLE `m_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_company`
--
ALTER TABLE `m_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_complaints_type`
--
ALTER TABLE `m_complaints_type`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `m_franchisee`
--
ALTER TABLE `m_franchisee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_gst`
--
ALTER TABLE `m_gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_labour`
--
ALTER TABLE `m_labour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_ledger`
--
ALTER TABLE `m_ledger`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `m_ledger_group`
--
ALTER TABLE `m_ledger_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_package`
--
ALTER TABLE `m_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_package_service`
--
ALTER TABLE `m_package_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_package_service_temp`
--
ALTER TABLE `m_package_service_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_painters_master`
--
ALTER TABLE `m_painters_master`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `m_payment_mode`
--
ALTER TABLE `m_payment_mode`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `m_service_type`
--
ALTER TABLE `m_service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_service_type_details`
--
ALTER TABLE `m_service_type_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_service_type_temp`
--
ALTER TABLE `m_service_type_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_spare`
--
ALTER TABLE `m_spare`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `m_spare_brand`
--
ALTER TABLE `m_spare_brand`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `m_spare_type`
--
ALTER TABLE `m_spare_type`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `m_sub_brand`
--
ALTER TABLE `m_sub_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `m_unit_master`
--
ALTER TABLE `m_unit_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_vehicle_brand`
--
ALTER TABLE `m_vehicle_brand`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `m_vehicle_type`
--
ALTER TABLE `m_vehicle_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `m_vendor`
--
ALTER TABLE `m_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `painter_outstanding`
--
ALTER TABLE `painter_outstanding`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `payment_voucher`
--
ALTER TABLE `payment_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_service`
--
ALTER TABLE `pending_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_outstanding`
--
ALTER TABLE `p_outstanding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_outstanding_history`
--
ALTER TABLE `p_outstanding_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_voucher`
--
ALTER TABLE `receipt_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_scheme`
--
ALTER TABLE `reference_scheme`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `referrer_scheme`
--
ALTER TABLE `referrer_scheme`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sales_invoice`
--
ALTER TABLE `sales_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_invoice_details`
--
ALTER TABLE `sales_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_invoice_return`
--
ALTER TABLE `sales_invoice_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order_details_temp`
--
ALTER TABLE `sales_order_details_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_receipt_transaction`
--
ALTER TABLE `sales_receipt_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sup_outstanding`
--
ALTER TABLE `sup_outstanding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_add_package`
--
ALTER TABLE `s_add_package`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `s_estimate`
--
ALTER TABLE `s_estimate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_jobcard_accesories_main`
--
ALTER TABLE `s_jobcard_accesories_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_jobcard_accessories`
--
ALTER TABLE `s_jobcard_accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_jobcard_images`
--
ALTER TABLE `s_jobcard_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card`
--
ALTER TABLE `s_job_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_check_list`
--
ALTER TABLE `s_job_card_check_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_damge`
--
ALTER TABLE `s_job_card_damge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_damge_temp`
--
ALTER TABLE `s_job_card_damge_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_inventory`
--
ALTER TABLE `s_job_card_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_package_service_details`
--
ALTER TABLE `s_job_card_package_service_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_pdetails`
--
ALTER TABLE `s_job_card_pdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_pdetails_temp`
--
ALTER TABLE `s_job_card_pdetails_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_recomdetails`
--
ALTER TABLE `s_job_card_recomdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_recomdetails_temp`
--
ALTER TABLE `s_job_card_recomdetails_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_sdetails`
--
ALTER TABLE `s_job_card_sdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_sdetails_temp`
--
ALTER TABLE `s_job_card_sdetails_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_job_card_temp`
--
ALTER TABLE `s_job_card_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_outsources`
--
ALTER TABLE `s_outsources`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `s_outsources_details`
--
ALTER TABLE `s_outsources_details`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `s_outsources_temp`
--
ALTER TABLE `s_outsources_temp`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `s_purchase`
--
ALTER TABLE `s_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_asset`
--
ALTER TABLE `s_purchase_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_asset_temp`
--
ALTER TABLE `s_purchase_asset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_details`
--
ALTER TABLE `s_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_details_temp`
--
ALTER TABLE `s_purchase_details_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_order`
--
ALTER TABLE `s_purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_order_details`
--
ALTER TABLE `s_purchase_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_order_details_temp`
--
ALTER TABLE `s_purchase_order_details_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_order_temp`
--
ALTER TABLE `s_purchase_order_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_return`
--
ALTER TABLE `s_purchase_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_purchase_temp`
--
ALTER TABLE `s_purchase_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_quotation`
--
ALTER TABLE `s_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_quotation_details`
--
ALTER TABLE `s_quotation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_quotation_details_temp`
--
ALTER TABLE `s_quotation_details_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_spare_prepick`
--
ALTER TABLE `s_spare_prepick`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_spare_prepick_details`
--
ALTER TABLE `s_spare_prepick_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_spare_prepick_temp`
--
ALTER TABLE `s_spare_prepick_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblattendancelog`
--
ALTER TABLE `tblattendancelog`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `tblbankname`
--
ALTER TABLE `tblbankname`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_main`
--
ALTER TABLE `transfer_main`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transfer_sub`
--
ALTER TABLE `transfer_sub`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `trans_temp`
--
ALTER TABLE `trans_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_lmenu`
--
ALTER TABLE `t_lmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_role_pages`
--
ALTER TABLE `t_role_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_pages`
--
ALTER TABLE `t_user_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_bank`
--
ALTER TABLE `account_bank`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `account_cash`
--
ALTER TABLE `account_cash`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `account_cash_bank`
--
ALTER TABLE `account_cash_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `a_bank_acc`
--
ALTER TABLE `a_bank_acc`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `a_cash_acc`
--
ALTER TABLE `a_cash_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `a_customer`
--
ALTER TABLE `a_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `a_customer_vehicle_details`
--
ALTER TABLE `a_customer_vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `a_final_bill`
--
ALTER TABLE `a_final_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `a_final_bill_details`
--
ALTER TABLE `a_final_bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_final_bill_spare_details`
--
ALTER TABLE `a_final_bill_spare_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `a_final_bill_spare_temp`
--
ALTER TABLE `a_final_bill_spare_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `a_hand_over_cash`
--
ALTER TABLE `a_hand_over_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `a_petty_cash`
--
ALTER TABLE `a_petty_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `a_petty_type`
--
ALTER TABLE `a_petty_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `a_rec_voucher`
--
ALTER TABLE `a_rec_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contra_entry`
--
ALTER TABLE `contra_entry`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contra_main`
--
ALTER TABLE `contra_main`
  MODIFY `ContraMainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contra_sub`
--
ALTER TABLE `contra_sub`
  MODIFY `ContraSubId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_callpurpose`
--
ALTER TABLE `crm_callpurpose`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_enquiry`
--
ALTER TABLE `crm_enquiry`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_enquiry_status`
--
ALTER TABLE `crm_enquiry_status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_enquiry_vehicle_details`
--
ALTER TABLE `crm_enquiry_vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_folllowup`
--
ALTER TABLE `crm_folllowup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_folllowup_main`
--
ALTER TABLE `crm_folllowup_main`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_relatedto`
--
ALTER TABLE `crm_relatedto`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_old_data`
--
ALTER TABLE `customer_old_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_old_data1`
--
ALTER TABLE `customer_old_data1`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cust_outstanding`
--
ALTER TABLE `cust_outstanding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expense_details`
--
ALTER TABLE `expense_details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `expense_master`
--
ALTER TABLE `expense_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fb_outstanding`
--
ALTER TABLE `fb_outstanding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fb_outstanding_history`
--
ALTER TABLE `fb_outstanding_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalbillpackage`
--
ALTER TABLE `finalbillpackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_year`
--
ALTER TABLE `financial_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `f_financial_year`
--
ALTER TABLE `f_financial_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `f_user_create`
--
ALTER TABLE `f_user_create`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `h_department`
--
ALTER TABLE `h_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `h_designation`
--
ALTER TABLE `h_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `h_employee`
--
ALTER TABLE `h_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `h_employee_attendance_entry`
--
ALTER TABLE `h_employee_attendance_entry`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `h_employee_proof`
--
ALTER TABLE `h_employee_proof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `h_offer_letter`
--
ALTER TABLE `h_offer_letter`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `h_payroll_calculation`
--
ALTER TABLE `h_payroll_calculation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `h_relieving`
--
ALTER TABLE `h_relieving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_card_no`
--
ALTER TABLE `job_card_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journal_entry`
--
ALTER TABLE `journal_entry`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_vehicle`
--
ALTER TABLE `master_vehicle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- AUTO_INCREMENT for table `master_vehicle_segment`
--
ALTER TABLE `master_vehicle_segment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `myautocart_service_bookings`
--
ALTER TABLE `myautocart_service_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_asset_brand`
--
ALTER TABLE `m_asset_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_brand`
--
ALTER TABLE `m_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_company`
--
ALTER TABLE `m_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_complaints_type`
--
ALTER TABLE `m_complaints_type`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_franchisee`
--
ALTER TABLE `m_franchisee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_gst`
--
ALTER TABLE `m_gst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_labour`
--
ALTER TABLE `m_labour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_ledger`
--
ALTER TABLE `m_ledger`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `m_ledger_group`
--
ALTER TABLE `m_ledger_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `m_package`
--
ALTER TABLE `m_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_package_service`
--
ALTER TABLE `m_package_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_package_service_temp`
--
ALTER TABLE `m_package_service_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_painters_master`
--
ALTER TABLE `m_painters_master`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_payment_mode`
--
ALTER TABLE `m_payment_mode`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_service_type`
--
ALTER TABLE `m_service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_service_type_details`
--
ALTER TABLE `m_service_type_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_service_type_temp`
--
ALTER TABLE `m_service_type_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_spare`
--
ALTER TABLE `m_spare`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_spare_brand`
--
ALTER TABLE `m_spare_brand`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_spare_type`
--
ALTER TABLE `m_spare_type`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_sub_brand`
--
ALTER TABLE `m_sub_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `m_unit_master`
--
ALTER TABLE `m_unit_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_vehicle_brand`
--
ALTER TABLE `m_vehicle_brand`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `m_vehicle_type`
--
ALTER TABLE `m_vehicle_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_vendor`
--
ALTER TABLE `m_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `painter_outstanding`
--
ALTER TABLE `painter_outstanding`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_voucher`
--
ALTER TABLE `payment_voucher`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pending_service`
--
ALTER TABLE `pending_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_outstanding`
--
ALTER TABLE `p_outstanding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_outstanding_history`
--
ALTER TABLE `p_outstanding_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_voucher`
--
ALTER TABLE `receipt_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reference_scheme`
--
ALTER TABLE `reference_scheme`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `referrer_scheme`
--
ALTER TABLE `referrer_scheme`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_invoice`
--
ALTER TABLE `sales_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_invoice_details`
--
ALTER TABLE `sales_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales_invoice_return`
--
ALTER TABLE `sales_invoice_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sales_order_details`
--
ALTER TABLE `sales_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales_order_details_temp`
--
ALTER TABLE `sales_order_details_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_receipt_transaction`
--
ALTER TABLE `sales_receipt_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sup_outstanding`
--
ALTER TABLE `sup_outstanding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `s_add_package`
--
ALTER TABLE `s_add_package`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_estimate`
--
ALTER TABLE `s_estimate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_jobcard_accesories_main`
--
ALTER TABLE `s_jobcard_accesories_main`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_jobcard_accessories`
--
ALTER TABLE `s_jobcard_accessories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_jobcard_images`
--
ALTER TABLE `s_jobcard_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `s_job_card`
--
ALTER TABLE `s_job_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `s_job_card_check_list`
--
ALTER TABLE `s_job_card_check_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `s_job_card_damge`
--
ALTER TABLE `s_job_card_damge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `s_job_card_damge_temp`
--
ALTER TABLE `s_job_card_damge_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_job_card_inventory`
--
ALTER TABLE `s_job_card_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `s_job_card_package_service_details`
--
ALTER TABLE `s_job_card_package_service_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_job_card_pdetails`
--
ALTER TABLE `s_job_card_pdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_job_card_pdetails_temp`
--
ALTER TABLE `s_job_card_pdetails_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_job_card_recomdetails`
--
ALTER TABLE `s_job_card_recomdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `s_job_card_recomdetails_temp`
--
ALTER TABLE `s_job_card_recomdetails_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `s_job_card_sdetails`
--
ALTER TABLE `s_job_card_sdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `s_job_card_sdetails_temp`
--
ALTER TABLE `s_job_card_sdetails_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `s_job_card_temp`
--
ALTER TABLE `s_job_card_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `s_outsources`
--
ALTER TABLE `s_outsources`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_outsources_details`
--
ALTER TABLE `s_outsources_details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_outsources_temp`
--
ALTER TABLE `s_outsources_temp`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_purchase`
--
ALTER TABLE `s_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `s_purchase_asset`
--
ALTER TABLE `s_purchase_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_purchase_asset_temp`
--
ALTER TABLE `s_purchase_asset_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_purchase_details`
--
ALTER TABLE `s_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `s_purchase_details_temp`
--
ALTER TABLE `s_purchase_details_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `s_purchase_order`
--
ALTER TABLE `s_purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `s_purchase_order_details`
--
ALTER TABLE `s_purchase_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `s_purchase_order_details_temp`
--
ALTER TABLE `s_purchase_order_details_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `s_purchase_order_temp`
--
ALTER TABLE `s_purchase_order_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `s_purchase_return`
--
ALTER TABLE `s_purchase_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_purchase_temp`
--
ALTER TABLE `s_purchase_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_quotation`
--
ALTER TABLE `s_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `s_quotation_details`
--
ALTER TABLE `s_quotation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `s_quotation_details_temp`
--
ALTER TABLE `s_quotation_details_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `s_spare_prepick`
--
ALTER TABLE `s_spare_prepick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_spare_prepick_details`
--
ALTER TABLE `s_spare_prepick_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_spare_prepick_temp`
--
ALTER TABLE `s_spare_prepick_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblattendancelog`
--
ALTER TABLE `tblattendancelog`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbankname`
--
ALTER TABLE `tblbankname`
  MODIFY `bankid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `transfer_main`
--
ALTER TABLE `transfer_main`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_sub`
--
ALTER TABLE `transfer_sub`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trans_temp`
--
ALTER TABLE `trans_temp`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_lmenu`
--
ALTER TABLE `t_lmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `t_role_pages`
--
ALTER TABLE `t_role_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1073;

--
-- AUTO_INCREMENT for table `t_user_pages`
--
ALTER TABLE `t_user_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1393;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
