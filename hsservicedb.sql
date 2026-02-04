-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 09:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hsservicedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `AdminID` int(11) NOT NULL,
  `AdminUsername` varchar(30) DEFAULT NULL,
  `AdminPassword` varchar(20) DEFAULT NULL,
  `AdminEmail` varchar(30) DEFAULT NULL,
  `Position` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`AdminID`, `AdminUsername`, `AdminPassword`, `AdminEmail`, `Position`) VALUES
(1, 'PSA', 'PSA123', 'RandomEmail@gmail.com', 'Admin'),
(2, 'Anna Stone', 'EE1122', 'EmmaStoned@gmail.com', 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `ServiceName` varchar(60) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Address_TownShip` varchar(30) DEFAULT NULL,
  `CleanerQty` int(11) DEFAULT NULL,
  `HoursQty` decimal(10,2) DEFAULT NULL,
  `Bedrooms` int(11) DEFAULT NULL,
  `Bathrooms` int(11) DEFAULT NULL,
  `BookingTime` time DEFAULT NULL,
  `BookingDate` date DEFAULT NULL,
  `PaymentStatus` varchar(20) DEFAULT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `Addons` text DEFAULT NULL,
  `Total` decimal(10,2) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `ServiceID` int(11) DEFAULT NULL,
  `BookingStatus` varchar(50) NOT NULL,
  `JobStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `ServiceName`, `Address`, `Address_TownShip`, `CleanerQty`, `HoursQty`, `Bedrooms`, `Bathrooms`, `BookingTime`, `BookingDate`, `PaymentStatus`, `Remarks`, `Addons`, `Total`, `CustomerID`, `ServiceID`, `BookingStatus`, `JobStatus`) VALUES
(8, 'Move-in/Move-out Cleaning', 'Build 24 A, Pyay Road', 'Insein', 2, 4.50, 2, 3, '05:00:00', '2024-09-21', 'Unpaid', 'Allergic to pollen', 'Waxing the Floor - $20, Window Cleaning - $25', 420.00, 1, 4, 'Canceled', 'Assigned'),
(9, 'Yard Work', 'Address 1 is one', 'Hlaing', 2, 5.50, 3, 3, '11:00:00', '2024-09-11', 'Unpaid', 'No no nonon', 'Fridge Cleaning - $15, Window Cleaning - $25', 15040.00, 1, 1, 'Pending', 'Assigned'),
(10, 'Move in Move Out', '12 rose road, Orchid Street, Building 221, Room 2', 'Sanchaung', 1, 2.50, 1, 2, '11:00:00', '2024-09-19', 'Unpaid', 'Have Dog at home', 'Waxing the Floor - $20', 450020.00, 1, 4, 'Pending', 'Assigned'),
(11, 'Standard Cleaning', '12 rose road, Orchid Street, Building 221, Room 2', 'Kamayut', 2, 3.50, 2, 2, '05:00:00', '2024-09-26', 'Unpaid', 'allergic to Pollen', 'Window Cleaning - $25', 30025.00, 1, 3, 'Pending', 'Assigned'),
(12, 'Standard Cleaning', '55 Oval Street, Square Apt, Room3', 'Kamayut', 2, 4.50, 2, 3, '02:00:00', '2024-09-13', 'Paid', 'No pollen', 'Waxing the Floor - $20, Carpet Cleaning - $30', 37550.00, 1, 3, 'Completed', 'Assigned'),
(13, 'Yard Work', 'Landing road 1123, building 3a', 'Sanchaung', 2, 3.50, 2, 2, '11:00:00', '2024-09-28', 'Pending', 'Have 2 dogs', 'Waxing the Floor - $20', 10020.00, 42, 1, 'Pending', 'Unassigned'),
(14, 'Yard Work', 'Thazin Street, Building 112 A', 'Sanchaung', 2, 4.00, 2, 3, '10:00:00', '2024-09-28', 'Pending', 'Knock on Door', 'Fridge Cleaning - MMK 7500', 20000.00, 43, 1, 'Pending', 'Unassigned'),
(15, 'Deep Cleaning', '22 A, 31 road, main street', 'Kyauktada', 2, 4.00, 2, 3, '02:00:00', '2024-10-05', 'Pending', 'Knock on the front door', 'Fridge Cleaning - MMK 7500', 1007500.00, 1, 5, 'Pending', 'Unassigned'),
(16, 'Standard Cleaning', '123 Cherry Road, Building A', 'Kyauktada', 3, 3.00, 3, 2, '13:00:00', '2024-10-09', 'Unpaid', 'Tell Reception for Entry', 'None', 45000.00, 23, 3, 'Pending', 'Unassigned'),
(18, 'Standard Cleaning', 'Building 2002, Main Road', 'Insein', 4, 4.00, 4, 3, '09:00:00', '2024-10-11', 'Unpaid', 'None', 'None', 50000.00, 24, 3, 'Pending', 'Unassigned'),
(19, 'Standard Cleaning', 'r3wrq4qq', 'Kyauktada', 4, 3.00, 2, 3, '12:00:00', '2024-10-03', 'Unpaid', 'areawrwa', 'aeraerae', 100000.00, 26, 3, 'Pending', 'Unassigned'),
(20, 'Deep Cleaning', '123 Road, 24 building, room 4', 'Insein', 4, 4.00, 2, 3, '14:00:00', '2024-10-04', 'Unpaid', 'Knock on door', 'None', 450000.00, 31, 5, 'Pending', 'Assigned'),
(21, 'Deep Cleaning', '13 Road, 4 building, room 43', 'Latha', 4, 4.00, 2, 3, '12:00:00', '2024-10-04', 'Unpaid', 'Knock on door', 'None', 480000.00, 33, 5, 'Pending', 'Unassigned'),
(22, 'Yard Work', '23 sky road 12 street', 'Mayangone', 2, 5.00, 3, 2, '10:00:00', '2024-10-16', 'Pending', 'No dogs', 'Waxing the Floor - MMK 15000, Window Cleaning - MMK 5000', 167500.00, 36, 1, 'Pending', 'Unassigned'),
(23, 'Move in Move Out', '123 road , 112 advenu', 'Hlaing', 2, 5.00, 3, 3, '04:00:00', '2024-10-09', 'Pending', 'No cats', 'Window Cleaning - MMK 5000', 905000.00, 1, 4, 'Pending', 'Unassigned'),
(24, 'Standard Cleaning', '112 building', 'Hlaing', 1, 0.50, 0, 1, '01:00:00', '2024-10-07', 'Pending', 'Knock please', '', 15000.00, 1, 3, 'Pending', 'Unassigned'),
(25, 'Standard Cleaning', '12 Building, 3rd main road', 'Hlaing', 2, 3.50, 2, 3, '11:00:00', '2024-10-17', 'Pending', 'Knock on door', '', 37500.00, 38, 3, 'Pending', 'Unassigned'),
(26, 'Standard Cleaning', '123 Moon Road', 'Insein', 3, 4.00, 4, 5, '13:00:00', '2024-10-09', 'Unpaid', 'None', 'None', 55000.00, 24, 3, 'Completed', 'Unassigned'),
(27, 'Standard Cleaning', '123 Sun Road, Building 123', 'Mayangone', 2, 3.50, 1, 4, '10:00:00', '2024-10-10', 'Pending', '', 'Fridge Cleaning - MMK 7500', 45000.00, 29, 3, 'Canceled', 'Unassigned');

-- --------------------------------------------------------

--
-- Table structure for table `cleaner`
--

CREATE TABLE `cleaner` (
  `CleanerID` int(11) NOT NULL,
  `CleanerPassword` varchar(100) NOT NULL,
  `CleanerName` varchar(200) DEFAULT NULL,
  `CleanerDOB` date DEFAULT NULL,
  `CleanerEmail` varchar(200) DEFAULT NULL,
  `CleanerPosition` varchar(200) DEFAULT NULL,
  `CleanerStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cleaner`
--

INSERT INTO `cleaner` (`CleanerID`, `CleanerPassword`, `CleanerName`, `CleanerDOB`, `CleanerEmail`, `CleanerPosition`, `CleanerStatus`) VALUES
(2, 'password123', 'Aung Aung', '1985-05-10', 'aungaung@example.com', 'Senior', 'Available'),
(3, 'password123', 'Mya Mya', '1990-12-08', 'myamya@example.com', 'Junior', 'Unavailable'),
(4, 'password123', 'Kyaw Kyaw', '1987-02-15', 'kyawkyaw@example.com', 'Senior', 'Available'),
(5, 'password123', 'Thandar', '1995-06-25', 'thandar@example.com', 'Junior', 'Available'),
(6, 'password123', 'Hla Hla', '1982-09-12', 'hlahla@example.com', 'Senior', 'Unavailable'),
(7, 'password123', 'Win Win', '1993-11-30', 'winwin@example.com', 'Junior', 'Available'),
(8, 'password123', 'Nay Lin', '1984-04-07', 'naylin@example.com', 'Senior', 'Available'),
(9, 'password123', 'Hnin Hnin', '1991-08-22', 'hninhnin@example.com', 'Junior', 'Unavailable'),
(10, 'password123', 'Zaw Zaw', '1992-01-19', 'zawzaw@example.com', 'Senior', 'Available'),
(11, 'password123', 'Soe Soe', '1996-03-17', 'soesoe@example.com', 'Junior', 'Available'),
(12, 'password123', 'Tun Tun', '1988-05-09', 'tuntun@example.com', 'Senior', 'Available'),
(13, 'password123', 'Nilar', '1994-07-11', 'nilar@example.com', 'Junior', 'Available'),
(14, 'password123', 'Ko Ko', '1990-02-25', 'koko@example.com', 'Senior', 'Available'),
(15, 'password123', 'Khin Khin', '1995-10-05', 'khinkhin@example.com', 'Junior', 'Unavailable'),
(16, 'password123', 'Moe Moe', '1987-03-08', 'moemoe@example.com', 'Senior', 'Available'),
(17, 'password123', 'Aye Aye', '1993-09-18', 'ayeaye@example.com', 'Junior', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `CustomerPassword` varchar(100) NOT NULL,
  `CustomerEmail` varchar(50) NOT NULL,
  `CustomerPhone` varchar(20) NOT NULL,
  `CustomerDOB` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerPassword`, `CustomerEmail`, `CustomerPhone`, `CustomerDOB`) VALUES
(1, 'Pyae Sone', '1122', 'psaung1229@gmail.com', '0922332123', '2024-09-10'),
(22, 'Thura', 'password123', 'thura@example.com', '0945001111', '1990-06-15'),
(23, 'Sanda', 'Password234', 'sanda@example.com', '091122334455', '1993-09-22'),
(24, 'Aye Chan', 'password123', 'ayechan@example.com', '0933448484', '1987-11-30'),
(25, 'Wai Yan', 'password123', 'waiyan@example.com', '0945004444', '1994-03-05'),
(26, 'Su Su', 'password123', 'susu@example.com', '0945005555', '1990-08-19'),
(27, 'Zin Mar', 'password123', 'zinmar@example.com', '0945006666', '1991-07-17'),
(28, 'Myo Myint', 'password123', 'myomyint@example.com', '0945007777', '1989-01-11'),
(29, 'Tin Tin', 'password123', 'tintin@example.com', '0945008888', '1992-12-09'),
(31, 'Kyaw Naing', 'password123', 'kyawnaing@example.com', '0945010000', '1988-05-14'),
(32, 'May Thida', 'password123', 'maythida@example.com', '0945011111', '1990-10-29'),
(33, 'Pyae Phyo', 'password123', 'pyaephyo@example.com', '0945012222', '1993-03-19'),
(34, 'Hlaing Min', 'password123', 'hlaingmin@example.com', '0945013333', '1991-09-01'),
(35, 'Than Than', 'password123', 'thanthan@example.com', '0945014444', '1992-06-24'),
(36, 'Nandar', 'password123', 'nandar@example.com', '0945015555', '1994-07-21'),
(37, 'Yamin', 'password123', 'yamin@example.com', '0945016666', '1987-10-10'),
(38, 'Aung Win', 'password123', 'aungwin@example.com', '0945017777', '1989-11-15'),
(39, 'Khin Maung', 'password123', 'khinmaung@example.com', '0945018888', '1993-02-28'),
(40, 'Mya Han', 'password123', 'myahan@example.com', '0945019999', '1995-12-18'),
(41, 'Soe Win', 'password123', 'soewin@example.com', '0945020000', '1992-01-20'),
(42, 'Jack Ronan', 'JJ1122', 'Jack@gmail.com', '092233212233', '2024-03-07'),
(43, 'Dr. Win Win Zaw', 'WWZ123', 'wwzadr@gmail.com', '09665372876', '2024-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `FeedbackType` varchar(50) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `FeedbackTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `CustomerID`, `FeedbackType`, `Message`, `FeedbackTime`) VALUES
(1, 36, 'Complaint', 'The cleaners left trash at the house\r\n', '2024-09-19 19:26:57'),
(2, 38, 'Suggestion', 'Good service, but i suggesst the company call before arriving the place', '2024-10-03 04:15:51'),
(3, 29, 'Suggestion', 'Add more services please', '2024-10-03 19:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `CleanerID` int(11) DEFAULT NULL,
  `BookingID` int(11) DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`CleanerID`, `BookingID`, `StartTime`, `EndTime`) VALUES
(10, 8, '05:00:00', '09:30:00'),
(4, 8, '05:00:00', '09:30:00'),
(4, 10, '11:00:00', '13:30:00'),
(5, 12, '02:00:00', '06:30:00'),
(4, 12, '02:00:00', '06:30:00'),
(4, 9, '11:00:00', '16:30:00'),
(16, 9, '11:00:00', '16:30:00'),
(12, 20, '14:00:00', '18:00:00'),
(14, 20, '14:00:00', '18:00:00'),
(4, 20, '14:00:00', '18:00:00'),
(8, 20, '14:00:00', '18:00:00'),
(5, 11, '05:00:00', '08:30:00'),
(2, 11, '05:00:00', '08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `BookingID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `PaymentMethod` varchar(100) DEFAULT NULL,
  `CardNumber` varchar(100) NOT NULL,
  `HolderName` varchar(100) NOT NULL,
  `ExpMonth` varchar(100) NOT NULL,
  `ExpYear` varchar(100) NOT NULL,
  `Zip` varchar(100) NOT NULL,
  `CVV` varchar(100) NOT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `DateandTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `PaymentStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `BookingID`, `CustomerID`, `PaymentMethod`, `CardNumber`, `HolderName`, `ExpMonth`, `ExpYear`, `Zip`, `CVV`, `Amount`, `DateandTime`, `PaymentStatus`) VALUES
(40, 12, 1, 'Credit', '1111222333444', 'Pyae Sone Aung', 'December', '2026', '8822', '332', 37550.00, '2024-09-16 17:46:31', 'Unapproved'),
(51, 13, 42, 'KBZPay', '092233212233', 'U Jack Ronan', '', '', '', '', 10020.00, '2024-10-03 19:10:18', 'Approved'),
(52, 14, 43, 'Cash', '', '', '', '', '', '', 20000.00, '2024-09-26 13:58:28', 'Pending'),
(53, 15, 1, 'Cash', '', '', '', '', '', '', 1007500.00, '2024-09-29 19:42:01', 'Pending'),
(54, 22, 36, 'Cash', '', '', '', '', '', '', 167500.00, '2024-10-02 16:27:03', 'Pending'),
(55, 23, 1, 'Cash', '', '', '', '', '', '', 905000.00, '2024-10-02 17:33:38', 'Pending'),
(56, 24, 1, 'Cash', '', '', '', '', '', '', 15000.00, '2024-10-02 18:08:04', 'Pending'),
(57, 25, 38, 'Cash', '', '', '', '', '', '', 37500.00, '2024-10-03 04:07:44', 'Pending'),
(58, 27, 29, 'Cash', '', '', '', '', '', '', 45000.00, '2024-10-03 19:39:04', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(100) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `ServicePhoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ServiceID`, `ServiceName`, `Price`, `Description`, `ServicePhoto`) VALUES
(1, 'Yard Work', 5000.00, 'Designed to keep your outdoor spaces neat and tidy, this service includes yard waste removal, leaf raking, mowing, trimming bushes, and gutter cleaning. Great for regular lawn care or seasonal yard maintenance.', 'Uploads/YardCleaning.jpg'),
(3, 'Standard Cleaning', 15000.00, 'A routine cleaning service focused on maintaining the cleanliness of your home. It includes dusting, vacuuming, mopping floors, wiping surfaces, cleaning bathrooms, and taking out the trash. Ideal for regular upkeep', 'Uploads/StandardCleaning.jpg'),
(4, 'Move in Move Out', 300000.00, 'A specialized service for preparing homes for new occupants or leaving a property spotless when moving out. It covers all rooms, including inside cabinets, closets, and appliances, ensuring the space is ready for its next residents.', 'Uploads/MovingCleaning.jpg'),
(5, 'Deep Cleaning', 400000.00, 'A more thorough cleaning service that goes beyond the basics. It targets hard-to-reach areas like grout, behind appliances, and detailed dusting of vents and ceiling fans. Perfect for a periodic or seasonal deep cleanse.', 'Uploads/DeepCleaning.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `cleaner`
--
ALTER TABLE `cleaner`
  ADD PRIMARY KEY (`CleanerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD KEY `CleanerID` (`CleanerID`),
  ADD KEY `BookingID` (`BookingID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `BookingID` (`BookingID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cleaner`
--
ALTER TABLE `cleaner`
  MODIFY `CleanerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `ServiceID` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`),
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`CleanerID`) REFERENCES `cleaner` (`CleanerID`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BookingID`) REFERENCES `booking` (`BookingID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
