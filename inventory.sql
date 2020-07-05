-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 09:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advanced_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advance_salaries`
--

INSERT INTO `advance_salaries` (`id`, `emp_id`, `month`, `year`, `advanced_salary`, `created_at`, `updated_at`) VALUES
(1, 1, 'July', '2020', '5000', '2020-06-12 21:37:03', NULL),
(2, 1, 'January', '2020', '2000', '2020-06-12 21:48:48', NULL),
(3, 2, 'July', '2020', '5000', '2020-06-12 21:48:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `att_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_date` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `att_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `att_date`, `edit_date`, `att_year`, `month`, `attendance`, `created_at`, `updated_at`) VALUES
(9, '1', '14/06/2020', '14_06_20', '2020', 'June', 'Present', '2020-06-14 15:09:00', '2020-06-14 10:23:27'),
(10, '2', '14/06/2020', '14_06_20', '2020', 'June', 'Present', '2020-06-14 15:09:00', NULL),
(11, '3', '14/06/2020', '14_06_20', '2020', 'June', 'Present', '2020-06-14 15:09:00', '2020-06-14 10:38:22'),
(12, '5', '14/06/2020', '14_06_20', '2020', 'June', 'Absent', '2020-06-14 15:09:00', '2020-06-14 10:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 'Hyundai', NULL, NULL),
(2, 'Toyota', NULL, NULL),
(3, 'Scania', NULL, NULL),
(5, 'Smart Phone', '2020-06-13 18:28:01', NULL),
(6, 'Features Phone', '2020-06-13 18:28:12', NULL),
(7, 'Laptop', '2020-06-13 18:28:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `shopname`, `photo`, `account_holder`, `account_number`, `bank_branch`, `bank_name`, `city`, `created_at`, `updated_at`) VALUES
(1, 'customer1', 'customer1@gmail.com', 'customer1234', 'customer1address', 'Samsung', 'customer/24187238253219092.png', 'customer1', 'customer001', 'Mirpur', 'Dutch Bangla', 'Dhaka', NULL, NULL),
(3, 'customer2', 'customer2@gmail.com', 'customer2343', 'customer2Address', 'HP', 'customer/24187240281588360.jpg', 'customer2', 'customer23234', 'MIrpur', 'Islamic', 'Dhaka', '2020-06-11 22:09:21', NULL),
(5, 'customer3', 'customer3@gmail.com', 'customer3', 'customer3', 'customer3', 'customer/24187518713973913.png', 'customer3', 'customer3', NULL, 'customer3', 'customer3', '2020-06-14 23:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `experience`, `photo`, `nid_no`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(1, 'asus', 'asus@gmail.com', '01671763399', 'Mirpur DOHS', '3 years', 'employee/24187153829667062.jpg', '46566098777', '50000', '30', 'Dhaka', '2020-06-10 23:15:14', NULL),
(2, 'HP', 'hp@gmail.com', '5555555555', 'HP, BD', '3 years', 'employee/24187163751390490.jpg', 'hp87698997', '5000', '14', 'Dhaka', '2020-06-10 23:18:37', NULL),
(3, 'dell', 'dell@gmail.com', 'del123123123', 'dell, BD', '2', 'employee/24187154176599977.webp', 'dll23123123', '4000', '12', 'dhaka', '2020-06-10 23:20:45', NULL),
(5, 'lenovo', 'lenovo@gmail.com', 'lenovo123', 'lenovoAddress', '4 years', 'employee/24187334128773581.webp', 'lenovo423', '4000', '14', 'Dhaka', '2020-06-12 23:01:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `year`, `month`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Cleaning', '5000', '2019', 'June', '13/06/2019', '2020-06-13 20:42:03', NULL),
(2, 'miscellaneous', '1000', '2020', 'June', '13/06/2020', '2020-06-13 20:51:53', NULL),
(9, 'Food', '550', '2020', 'June', '14/06/2020', '2020-06-13 21:15:58', NULL),
(10, 'Miscellaneous', '1024', '2020', 'June', '14/06/2020', '2020-06-13 22:03:51', NULL),
(11, 'food', '100', '2020', 'July', '03/07/2020', '2020-07-02 20:38:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_10_163008_create_employees_table', 2),
(5, '2020_06_11_204115_create_customers_table', 3),
(6, '2020_06_11_221154_create_suppliers_table', 4),
(7, '2020_06_12_202051_create_salaries_table', 5),
(8, '2020_06_12_205533_create_advance_salaries_table', 6),
(9, '2020_06_12_222812_create_salaries_table', 7),
(10, '2020_06_12_234111_create_categories_table', 8),
(11, '2020_06_13_010507_create_products_table', 9),
(12, '2020_06_13_200834_create_expenses_table', 10),
(13, '2020_06_14_002154_create_attendances_table', 11),
(14, '2020_06_14_171215_create_settings_table', 12),
(15, '2020_06_15_195237_create_orders_table', 13),
(16, '2020_06_15_195330_create_orderdetails_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitcost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `unitcost`, `total`, `created_at`, `updated_at`) VALUES
(7, 3, 2, '1', '17000', '20570', NULL, NULL),
(8, 3, 3, '1', '175000', '211750', NULL, NULL),
(9, 3, 4, '1', '1500', '1815', NULL, NULL),
(10, 4, 2, '2', '17000', '41140', NULL, NULL),
(11, 5, 3, '1', '175000', '211750', NULL, NULL),
(12, 6, 3, '1', '175000', '211750', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(3, 3, '15/06/20', 'success', '3', '193,500.00', '40,635.00', '234,135.00', 'HandCash', '234135', '0', NULL, NULL),
(4, 3, '15/06/20', 'success', '2', '34,000.00', '7,140.00', '41,140.00', 'HandCash', '41140', '0', NULL, NULL),
(5, 1, '15/06/20', 'success', '1', '175,000.00', '36,750.00', '211,750.00', 'HandCash', '211750', '0', NULL, NULL),
(6, 3, '15/06/20', 'success', '1', '175,000.00', '36,750.00', '211,750.00', 'HandCash', '211700', '50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$7jiZLLyp5Hxp9gOzh/DLIumXE0fv.B9Mx7VItTS.vgNo3atKZqkue', '2020-07-03 12:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_garage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `cat_id`, `sup_id`, `product_code`, `product_garage`, `product_route`, `product_image`, `buy_date`, `exp_date`, `buying_price`, `selling_price`, `created_at`, `updated_at`) VALUES
(2, 'Redmi Note 3 Pro', 5, 4, 'redmi_note_3_pro_001', 'A', '1', 'product/24187410277548232.jpg', '2020-06-01', '2025-12-31', '15000', '17000', '2020-06-13 19:11:22', NULL),
(3, 'Dell XPS 15', 7, 6, 'dell_xps_15_01', 'D', '1', 'product/24187413514781416.jpg', '2020-06-01', '2025-12-31', '150000', '175000', '2020-06-13 19:44:02', NULL),
(4, 'Lenovo', 7, 5, 'test123', 'C', '1', 'product/testing.jpg', '43983', '44713', '1200', '1500', '2020-06-14 14:16:36', '2020-06-14 14:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_address`, `company_email`, `company_phone`, `company_mobile`, `company_logo`, `company_city`, `company_country`, `company_zipcode`, `created_at`, `updated_at`) VALUES
(1, 'Company', 'Dhaka,Bangladesh', 'company@gmail.com', 'Unknown123', 'Unknown456', 'company/123123123123.png', 'Dhaka', 'Bangladesh', '1216', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `type`, `shopname`, `account_holder`, `account_number`, `branch_name`, `bank_name`, `city`, `created_at`, `updated_at`) VALUES
(1, 'supplier1', 'supplier1@gmail.com', 'supplier1123', 'supplier1Address', 'supplier/24187318130416379.png', 'Distributor', 'supplier1Shop', 'supplier1', 'supplier13423', 'ABC', 'Mirpur-1', 'Dhaka', '2020-06-12 18:46:43', NULL),
(3, 'supplier2', 'supplier2@gmail.com', 'supplier2312', 'supplier2Address', 'supplier/24187321091512587.jpg', 'Distributor', 'supplier2Shop', 'supplier2', 'supplier22342', 'supplier2Branch', 'supplier2Bank', 'supplier2Dhaka', '2020-06-12 19:33:47', NULL),
(4, 'Xiaomi', 'Xiaomi@gmail.com', '1234567890', 'Dhanmondi,Dhaka, Bangladesh.', 'supplier/24187408082812822.png', 'Distributor', 'Xiaomi', 'Xiaomi', 'Xiaomi123', 'Dhanmondi', 'Bangladesh Bank', 'Dhaka', '2020-06-13 18:36:29', NULL),
(5, 'ASUS', 'ASUS@gmail.com', '08657616381', 'IDB,Dhaka, Bangladesh.', 'supplier/24187408238016256.png', 'WholeSeller', 'Asus', 'Asus', 'Asus123', 'Agargaon', 'Bangladesh Bank', 'Dhaka', '2020-06-13 18:38:57', NULL),
(6, 'Dell', 'Dell@gmail.com', '8289242387', 'IDB,Dhaka, Bangladesh.', 'supplier/24187408306470680.jpg', 'Distributor', 'Dell', 'Dell', 'Dell123', 'Agargaon', 'Bangladesh Bank', 'Dhaka', '2020-06-13 18:40:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$xjyr6nlCTNBwryR6PaiyDOej9aZAva67LbBPaS82sapTYNP8cju2S', 'jxBTx5UBCa9KDBQhgRuHbmbg1Z1OscGgz5lFs5imVKQePEz5xnUzHBV7RSxH', '2020-06-09 14:26:57', '2020-06-09 14:26:57'),
(9, 'admin1', 'admin@admin.com', '2020-06-09 16:42:58', '$2y$10$wH07wk34sCqZ1kr0140pDu.YepgnfelIxOXDhR7kJpwSspIDsyrDC', NULL, '2020-06-09 16:34:25', '2020-06-09 16:42:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
