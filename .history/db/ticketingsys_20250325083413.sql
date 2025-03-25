-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 01:33 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketingsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `AdminId` varchar(25) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Position` varchar(25) DEFAULT NULL,
  `Department` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_asset`
--

CREATE TABLE `t_asset` (
  `AssetId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `AssetName` varchar(55) NOT NULL,
  `AssetTypeId` int(11) NOT NULL,
  `SerialNumber` varchar(55) DEFAULT NULL,
  `PurchasedDate` date DEFAULT NULL,
  `AssetStatus` enum('Available','In Use','Maintenance','Disposed','Transferred','Transfer Request') DEFAULT 'In Use',
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_assettransfer`
--

CREATE TABLE `t_assettransfer` (
  `TransferId` int(11) NOT NULL,
  `AssetId` int(11) NOT NULL,
  `fromBranchId` int(11) NOT NULL,
  `toBranchId` int(11) NOT NULL,
  `requestedByBranchAdminId` varchar(25) NOT NULL,
  `approvedByITstaffId` varchar(30) DEFAULT NULL,
  `requestDate` date DEFAULT NULL,
  `transferDate` date DEFAULT NULL,
  `transferStatus` enum('Pending','Approved','Rejected','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `t_assettransfer`
--
DELIMITER $$
CREATE TRIGGER `after_transfer_request` AFTER INSERT ON `t_assettransfer` FOR EACH ROW BEGIN
    UPDATE t_asset
    SET AssetStatus = 'Transfer Request'
    WHERE AssetId = NEW.AssetId;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_transfer_update` AFTER UPDATE ON `t_assettransfer` FOR EACH ROW BEGIN
	/*If transfer   is approved but not yet completed*/
    IF NEW.TransferStatus = 'Approved' THEN
    	UPDATE t_asset
        SET AssetStatus = 'Transfer Request'
        WHERE AssetId = NEW.AssetId;
    END IF; 

	/*If transfer is marked as completed */
    IF NEW.TransferStatus = 'Completed' THEN 
    	UPDATE t_asset
        SET AssetStatus = 'Transferred'
        WHERE AssetId = NEW.AssetId;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_assettype`
--

CREATE TABLE `t_assettype` (
  `AssetTypeId` int(11) NOT NULL,
  `AssetTypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_branch`
--

CREATE TABLE `t_branch` (
  `BranchId` int(11) NOT NULL,
  `BranchName` varchar(50) NOT NULL,
  `DistrictId` int(11) NOT NULL,
  `Location` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_branchadmin`
--

CREATE TABLE `t_branchadmin` (
  `BranchAdminId` varchar(25) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Position` varchar(25) DEFAULT NULL,
  `Department` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_district`
--

CREATE TABLE `t_district` (
  `DistrictId` int(11) NOT NULL,
  `DistricTName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_issuedsubtype`
--

CREATE TABLE `t_issuedsubtype` (
  `SubtypeId` int(11) NOT NULL,
  `IssueId` int(11) NOT NULL,
  `SubtypeName` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_issuedtype`
--

CREATE TABLE `t_issuedtype` (
  `IssueId` int(11) NOT NULL,
  `IssueType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_itstaff`
--

CREATE TABLE `t_itstaff` (
  `ITstaffId` varchar(30) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Position` varchar(25) DEFAULT NULL,
  `Department` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_notifs`
--

CREATE TABLE `t_notifs` (
  `NotifId` int(11) NOT NULL,
  `NotifType` enum('Ticket','Transfer') DEFAULT NULL,
  `ReferencesId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `NotifMessage` text,
  `Notifstatus` enum('Unread','Read') DEFAULT 'Unread',
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_roles`
--

CREATE TABLE `t_roles` (
  `RoleId` int(11) NOT NULL,
  `RoleName` enum('UserEmp','ITstaff','BranchAdmin','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_tickets`
--

CREATE TABLE `t_tickets` (
  `TicketsId` int(11) NOT NULL,
  `EmployeeId` varchar(20) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `DistrictId` int(11) NOT NULL,
  `AssignedITstaffId` varchar(30) DEFAULT NULL,
  `AssetId` int(11) NOT NULL,
  `IssueId` int(11) NOT NULL,
  `SubtypeId` int(11) NOT NULL,
  `Description` text,
  `TicketStatus` enum('Pending','Completed','Ongoing','Cancelled') DEFAULT 'Pending',
  `Priority` enum('Low','Medium','High') DEFAULT 'Low',
  `TimeSubmitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TimeResolved` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `t_tickets`
--
DELIMITER $$
CREATE TRIGGER `update_ticket_priority` BEFORE UPDATE ON `t_tickets` FOR EACH ROW BEGIN
    -- Check if the status is 'Pending' and it's more than 7 days since created
    IF NEW.TicketStatus = 'Pending' AND DATEDIFF(CURRENT_DATE, NEW.TimeSubmitted) > 7 THEN
        SET NEW.Priority = 'High';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_useremp`
--

CREATE TABLE `t_useremp` (
  `EmployeeId` varchar(20) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Position` varchar(25) DEFAULT NULL,
  `Department` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Contactno` int(11) NOT NULL,
  `DistrictId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `RoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`AdminId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `t_asset`
--
ALTER TABLE `t_asset`
  ADD PRIMARY KEY (`AssetId`);

--
-- Indexes for table `t_assettransfer`
--
ALTER TABLE `t_assettransfer`
  ADD PRIMARY KEY (`TransferId`),
  ADD KEY `AssetId` (`AssetId`),
  ADD KEY `fromBranchId` (`fromBranchId`),
  ADD KEY `toBranchId` (`toBranchId`),
  ADD KEY `requestedByBranchAdminId` (`requestedByBranchAdminId`),
  ADD KEY `approvedByITstaffId` (`approvedByITstaffId`);

--
-- Indexes for table `t_assettype`
--
ALTER TABLE `t_assettype`
  ADD PRIMARY KEY (`AssetTypeId`);

--
-- Indexes for table `t_branch`
--
ALTER TABLE `t_branch`
  ADD PRIMARY KEY (`BranchId`),
  ADD KEY `DistrictId` (`DistrictId`);

--
-- Indexes for table `t_branchadmin`
--
ALTER TABLE `t_branchadmin`
  ADD PRIMARY KEY (`BranchAdminId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `t_district`
--
ALTER TABLE `t_district`
  ADD PRIMARY KEY (`DistrictId`);

--
-- Indexes for table `t_issuedsubtype`
--
ALTER TABLE `t_issuedsubtype`
  ADD PRIMARY KEY (`SubtypeId`);

--
-- Indexes for table `t_issuedtype`
--
ALTER TABLE `t_issuedtype`
  ADD PRIMARY KEY (`IssueId`);

--
-- Indexes for table `t_itstaff`
--
ALTER TABLE `t_itstaff`
  ADD PRIMARY KEY (`ITstaffId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `t_notifs`
--
ALTER TABLE `t_notifs`
  ADD PRIMARY KEY (`NotifId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `t_roles`
--
ALTER TABLE `t_roles`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `t_tickets`
--
ALTER TABLE `t_tickets`
  ADD PRIMARY KEY (`TicketsId`),
  ADD KEY `EmployeeId` (`EmployeeId`),
  ADD KEY `BranchId` (`BranchId`),
  ADD KEY `DistrictId` (`DistrictId`),
  ADD KEY `AssignedITstaffId` (`AssignedITstaffId`),
  ADD KEY `AssetId` (`AssetId`),
  ADD KEY `IssueId` (`IssueId`),
  ADD KEY `SubtypeId` (`SubtypeId`);

--
-- Indexes for table `t_useremp`
--
ALTER TABLE `t_useremp`
  ADD PRIMARY KEY (`EmployeeId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `DistrictId` (`DistrictId`),
  ADD KEY `BranchId` (`BranchId`),
  ADD KEY `RoleId` (`RoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_asset`
--
ALTER TABLE `t_asset`
  MODIFY `AssetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_assettransfer`
--
ALTER TABLE `t_assettransfer`
  MODIFY `TransferId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_assettype`
--
ALTER TABLE `t_assettype`
  MODIFY `AssetTypeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_branch`
--
ALTER TABLE `t_branch`
  MODIFY `BranchId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_district`
--
ALTER TABLE `t_district`
  MODIFY `DistrictId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_issuedsubtype`
--
ALTER TABLE `t_issuedsubtype`
  MODIFY `SubtypeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_issuedtype`
--
ALTER TABLE `t_issuedtype`
  MODIFY `IssueId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_notifs`
--
ALTER TABLE `t_notifs`
  MODIFY `NotifId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_roles`
--
ALTER TABLE `t_roles`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tickets`
--
ALTER TABLE `t_tickets`
  MODIFY `TicketsId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD CONSTRAINT `t_admin_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `t_users` (`UserId`);

--
-- Constraints for table `t_assettransfer`
--
ALTER TABLE `t_assettransfer`
  ADD CONSTRAINT `t_assettransfer_ibfk_1` FOREIGN KEY (`AssetId`) REFERENCES `t_asset` (`AssetId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_assettransfer_ibfk_2` FOREIGN KEY (`fromBranchId`) REFERENCES `t_branch` (`BranchId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_assettransfer_ibfk_3` FOREIGN KEY (`toBranchId`) REFERENCES `t_branch` (`BranchId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_assettransfer_ibfk_4` FOREIGN KEY (`requestedByBranchAdminId`) REFERENCES `t_branchadmin` (`BranchAdminId`),
  ADD CONSTRAINT `t_assettransfer_ibfk_5` FOREIGN KEY (`approvedByITstaffId`) REFERENCES `t_itstaff` (`ITstaffId`);

--
-- Constraints for table `t_branch`
--
ALTER TABLE `t_branch`
  ADD CONSTRAINT `t_branch_ibfk_1` FOREIGN KEY (`DistrictId`) REFERENCES `t_district` (`DistrictId`);

--
-- Constraints for table `t_branchadmin`
--
ALTER TABLE `t_branchadmin`
  ADD CONSTRAINT `t_branchadmin_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `t_users` (`UserId`);

--
-- Constraints for table `t_itstaff`
--
ALTER TABLE `t_itstaff`
  ADD CONSTRAINT `t_itstaff_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `t_users` (`UserId`);

--
-- Constraints for table `t_notifs`
--
ALTER TABLE `t_notifs`
  ADD CONSTRAINT `t_notifs_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `t_users` (`UserId`);

--
-- Constraints for table `t_tickets`
--
ALTER TABLE `t_tickets`
  ADD CONSTRAINT `t_tickets_ibfk_1` FOREIGN KEY (`EmployeeId`) REFERENCES `t_useremp` (`EmployeeId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_tickets_ibfk_2` FOREIGN KEY (`BranchId`) REFERENCES `t_branch` (`BranchId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_tickets_ibfk_3` FOREIGN KEY (`DistrictId`) REFERENCES `t_district` (`DistrictId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_tickets_ibfk_4` FOREIGN KEY (`AssignedITstaffId`) REFERENCES `t_itstaff` (`ITstaffId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_tickets_ibfk_5` FOREIGN KEY (`AssetId`) REFERENCES `t_asset` (`AssetId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_tickets_ibfk_6` FOREIGN KEY (`IssueId`) REFERENCES `t_issuedtype` (`IssueId`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_tickets_ibfk_7` FOREIGN KEY (`SubtypeId`) REFERENCES `t_issuedsubtype` (`SubtypeId`) ON DELETE CASCADE;

--
-- Constraints for table `t_useremp`
--
ALTER TABLE `t_useremp`
  ADD CONSTRAINT `t_useremp_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `t_users` (`UserId`) ON DELETE CASCADE;

--
-- Constraints for table `t_users`
--
ALTER TABLE `t_users`
  ADD CONSTRAINT `t_users_ibfk_1` FOREIGN KEY (`DistrictId`) REFERENCES `t_district` (`DistrictId`),
  ADD CONSTRAINT `t_users_ibfk_2` FOREIGN KEY (`BranchId`) REFERENCES `t_branch` (`BranchId`),
  ADD CONSTRAINT `t_users_ibfk_3` FOREIGN KEY (`RoleId`) REFERENCES `t_roles` (`RoleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
