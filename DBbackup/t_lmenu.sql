-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 09:16 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tidi`
--

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
(4, 'Service Type', 'fa fa-dropbox', 'master/service_type/m_service_type.php', '1', 8),
(5, 'Complaints List', 'fa fa-dropbox', 'master/complaints_type/m_complaints_type.php', '-1', 9),
(6, 'Spares / Item Category', 'fa fa-dropbox', 'master/spare_type/m_spare_type_view.php', '1', 5),
(7, 'Spares / Item Brand', 'fa fa-dropbox', 'master/spares_brand/m_spare_brand_view.php', '1', 6),
(8, 'Spares / Item', 'fa fa-link', 'master/spares/m_spares_view.php', '1', 7),
(9, 'GST', 'fa fa-adjust', 'master/gst/gst.php', '-1', 10),
(10, 'Member Ship', 'fa fa-user', 'master/membership/membership.php', '1', 11),
(11, 'Coupon', 'fa fa-adjust', 'master/coupon/coupon.php', '1', 12),
(12, 'Financial Year', 'fa fa-circle-o', 'master/financial_year/financial_year.php', '1', 13),
(13, 'User Create', 'fa fa-male', 'master/user_create/f_user_create_view.php', '1', 2),
(14, 'HR', 'fa fa-users', '#', '0', 0),
(15, 'Department', 'fa fa-male', 'hr/department/h_department.php', '14', 2),
(16, 'Designation', 'fa fa-male', 'hr/designation/h_designation.php', '14', 1),
(17, 'Employee Master', 'fa fa-male', 'hr/employee/h_employee.php', '14', 3),
(18, 'Accounts', 'fa fa-calculator', '#', '0', 0),
(19, 'Payment Voucher', 'fa fa-wrench', 'accounts/payment_voucher/a_voucher_f.php', '18', 1),
(20, 'Receipt Voucher', 'fa fa-print', 'accounts/receipt_voucher/a_receipt_f.php', '18', 2),
(21, 'Services', 'fa fa-bars', '#', '0', 1),
(22, 'Job Card', 'fa fa-hourglass-half', 'services/job_card/s_jobcard_view.php', '21', 1),
(23, 'Spares Prepick View(or)Edit', 'fa fa-archive', 'services/spare_prepick/s_spare_prepick_view.php', '-32', 2),
(24, 'Estimate', 'fa fa-shopping-bag', 'services/estimate/s_estimate.php', '-32', 4),
(25, 'Pending Services', 'fa fa-truck', 'services/pending/s_pending_view.php', '-32', 3),
(26, 'Store', 'fa fa-cart-plus', '#', '0', 2),
(27, 'Purchase Entry', 'fa fa-cart-plus', 'store/purchase/s_purchase_view.php', '26', 1),
(28, 'Inventory', 'fa fa-cart-plus', 'store/inventory/s_inventory.php', '26', 3),
(29, 'Final Bill', 'fa fa-circle-o', 'store/final_bill/f_bill_view.php', '-26', 4),
(30, 'Change Password', 'glyphicon glyphicon-cog', '#', '0', 0),
(31, 'Report', 'fa fa-file', '#', '0', 0),
(32, 'Sales-Mode Of Payment', 'fa fa-circle-o', 'reports/sales_report_mode/sales_report_payment_mode.php', '-31', 0),
(33, 'Over All Final Bill', 'fa fa-circle-o', 'reports/overall/overall_report.php', '31', 1),
(34, 'Company r', 'fa fa-circle-o', 'master/company/company.php', '1', 1),
(35, 'Purchase Return', 'fa fa-cart-plus', 'store/purchase/s_purchase_return_view.php', '-37', 2),
(36, 'Company', 'fa fa-dropbox', 'master/franchisee/franchisee.php', '1', 14),
(37, 'Package Master', 'fa fa-link', 'master/package_master/package_master.php', '1', 16),
(38, 'Change Password', 'glyphicon glyphicon-cog', 'change_password/change_password.php', '30', 1),
(39, 'Job card Open', 'fa fa-hourglass-half', 'services/job_card/s_jobcard_view_open.php', '-32', 4),
(40, 'Closed Job Cards', 'fa fa-hourglass-half', 'services/job_card/s_jobcard_view_close.php', '21', 5),
(41, 'Jobcard Report', 'fa fa-hourglass-half', 'reports/jobcard_reports/jobcard_reports.php', '31', 2),
(42, 'Purchase Report', 'fa fa-hourglass-half', 'reports/purchase Report/purchase_reports.php', '31', 4),
(43, 'Purchase Return Report', 'fa fa-hourglass-half', 'reports/purchase Return Report/purchase_return_reports.php', '31', 7),
(44, 'Sales', 'fa fa-hourglass-half', 'store/sales/sales_invoice_view.php', '26', 4),
(45, 'Offer Letter', 'fa fa-male', 'hr/offerletter/o_offerletter.php', '14', 5),
(46, 'Process Salary ', 'fa fa-money	\n', 'hr/payslip/p_payslip.php', '14', 6),
(47, 'Relieving Letter', 'fa fa-male', 'hr\\relievingletter\\r_relievingletter_view.php', '14', 7),
(48, 'Print Salary Slip', 'fa fa-print', 'hr/salary generate/salary_generate_month.php', '14', 8),
(49, 'Cash Handover', 'fa fa-gift', 'accounts/cash_hand_over/cash_hand_over.php', '18', 5),
(50, 'Vehicle Type', 'fa fa-gift', 'master/vehicle_type/m_vehicle_type.php', '-1', 18),
(51, 'Vehicle Brand', 'fa fa-gift', 'master/vehicle_brand/m_vehicle_brand.php', '1', 17),
(52, 'Mode of Payment', 'fa fa-gift', 'master/mode_payment/m_payment_mode.php', '-1', 20),
(53, 'Cash A/C', 'fa fa-gift', 'accounts/cash_account/a_cash_acc.php', '18', 0),
(54, 'Unit Of Measure ', 'glyphicon glyphicon-cog', 'master/uom/m_uom_type.php', '1', 16),
(55, 'Ledger Group', 'glyphicon glyphicon-cog', 'master\\ledger_group\\m_ledger_group_view.php', '1', 0),
(56, 'Purchase Order', 'fa fa-cart-plus', 'store/purchase_order/s_purchase_order_view.php', '26', 1),
(57, 'Customer List 2018', 'fa fa-circle-o', 'reports/overall/old_visit_report.php', '31', 7),
(58, 'Expenses Type', 'fa fa-server	', 'accounts/expensetype/a_expense_type.php', '18', 3),
(59, 'Expenses', 'fa fa-server	', 'accounts/expenseentry/a_expense_entry.php', '18', 4),
(60, 'Profit & Loss', 'fa fa-file', 'accounts/profit_loss/profit_loss.php', '18', 7),
(61, 'Balance Sheet', 'fa fa-file', 'accounts/Balancesheeet/balance_sheet.php', '18', 8),
(62, 'Cash/Bank Summary', 'fa fa-file', 'accounts/cash_account/a_cash_report.php', '31', 11),
(63, 'Day Book', 'fa fa-file', 'accounts/day_book/day_book.php', '18', 12),
(64, 'Trial Blanace', 'fa fa-file', 'accounts/trial_balance/trial_balance.php', '18', 13),
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
(78, 'Employee Attendance', 'fa fa-users', 'hr/employee_attendance/employee_attendance_date.php', '14', 4),
(79, 'Painter Master', 'fa fa-list-alt', 'master/paniters_master/m_painter.php', '-1', 4),
(80, 'Painter voucher', 'fa fa-wrench', 'accounts/Painter_voucher/Painter_voucher.php', '26', 3),
(81, 'CRM', 'fa fa-link', '#', '0', 2),
(82, 'Enquiry Entry', 'fa fa-comments', 'crm/enquiry/enquiry.php', '81', 0),
(83, 'Open Enquiry', 'glyphicon glyphicon-open', 'crm/enquiry/open_service_enquiry.php', '81', 0),
(84, 'Close Enquiry', 'fa fa-thumbs-up', 'crm/enquiry/closed_service_enquiry.php', '81', 0),
(85, 'Lead Report', 'glyphicon glyphicon-pencil', 'crm/enquiry/status_enquiry.php', '31', 0),
(86, 'Telecalling Report', 'glyphicon glyphicon-earphone', 'crm/enquiry/call_enquiry.php', '31', 0),
(87, 'Filter Enquiry', 'glyphicon glyphicon-filter', 'crm/enquiry/filter_enquiry.php', '81', 0),
(88, 'Vehicle service Status', 'glyphicon glyphicon-filter', 'reports/vehicle_service_status/vehicle_service_status.php', '31', 10),
(89, 'Vehicle Segment', 'fa fa-gift', 'master/vehicle_segment/m_vehicle_segment.php', '-1', 19),
(90, 'Vehicle Master', 'fa fa-gift', 'master/vehicle_master/m_vehicle_master.php', '1', 18),
(91, 'Daily Report', 'fa fa-cart-plus', 'reports/daily_report/daily_report_report.php', '-31', 3),
(92, 'Customer Details Report', 'fa fa-cart-plus', 'reports/customer_details_report/customer_details.php', '31', 3),
(93, 'Lead Sheet', 'glyphicon glyphicon-pencil', 'crm/enquiry/recomdetails.php', '81', 0),
(94, 'Referral Discount', 'fa fa-dropbox', 'master/referral_scheme/referral_scheme.php', '1', 14),
(95, 'Referrer Discount', 'fa fa-dropbox', 'master/referrer_scheme/referrer_scheme.php', '1', 15),
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
(106, 'GST Report', 'fa fa-percent', 'reports/gst_report/gst_report.php', '31', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_lmenu`
--
ALTER TABLE `t_lmenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_lmenu`
--
ALTER TABLE `t_lmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
