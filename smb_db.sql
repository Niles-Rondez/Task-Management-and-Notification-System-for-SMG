-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 08:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `taskID` int(11) DEFAULT NULL,
  `completionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportID`, `userID`, `taskID`, `completionDate`) VALUES
(1, 1000000001, 601100419, '2024-05-12'),
(2, 1000000002, 601095968, '2024-05-04'),
(3, 1000000003, 601099767, '2024-05-13'),
(4, 1000000004, 601099762, '2024-05-26'),
(5, 1000000005, 601099770, '2024-05-16'),
(6, 1000000006, 601099763, '2024-05-26'),
(7, 1000000007, 601099768, '2024-05-16'),
(8, 1000000008, 601099765, '2024-05-26'),
(9, 1000000009, 601099771, '2024-05-19'),
(10, 1000000010, 601099766, '2024-05-26'),
(11, 1000000011, 601099772, '2024-05-16'),
(12, 1000000012, 601100284, '2024-05-03'),
(13, 1000000013, 601094854, '2024-05-02'),
(14, 1000000014, 601108963, '2024-05-10'),
(15, 1000000015, 601108964, '2024-05-10'),
(16, 1000000016, 601108965, '2024-05-07'),
(17, 1000000017, 601108966, '2024-05-07'),
(18, 1000000018, 601108968, '2024-05-19'),
(19, 1000000019, 601108967, '2024-05-10'),
(20, 1000000020, 601071480, '2024-05-15'),
(21, 1000000021, 601071481, '2024-05-18'),
(22, 1000000022, 601108969, '2024-05-10'),
(23, 1000000023, 601101636, '2024-05-15'),
(24, 1000000024, 601101635, '2024-05-15'),
(25, 1000000025, 601101640, '2024-05-14'),
(26, 1000000026, 601071500, '2024-05-18'),
(27, 1000000027, 601071499, '2024-05-18'),
(28, 1000000028, 601101744, '2024-05-13'),
(29, 1000000029, 601094911, '2024-05-03'),
(30, 1000000001, 601100419, '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskID` int(11) NOT NULL,
  `startDate` date DEFAULT NULL,
  `orderType` varchar(255) DEFAULT NULL,
  `orderDescription` varchar(255) DEFAULT NULL,
  `maintenance_plan` varchar(255) DEFAULT NULL,
  `mpDescription` varchar(255) DEFAULT NULL,
  `mainWorkCtr` varchar(255) DEFAULT NULL,
  `systemStatus` varchar(255) DEFAULT NULL,
  `ssDescription` varchar(255) DEFAULT NULL,
  `plannerGroup` varchar(255) DEFAULT NULL,
  `costCenter` varchar(255) DEFAULT NULL,
  `equipmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskID`, `startDate`, `orderType`, `orderDescription`, `maintenance_plan`, `mpDescription`, `mainWorkCtr`, `systemStatus`, `ssDescription`, `plannerGroup`, `costCenter`, `equipmentID`) VALUES
(601071480, '2024-05-15', 'PM14', 'Servicing of Hoist Drive Motor(1y)', '6PKGE-PAL201', 'Drive Motors', 'MDE-031', 'REL NMAT PRC SETC', 'Palletizer 2', 'P14', '610-3151', 20075229),
(601071481, '2024-05-18', 'PM14', 'Servicing of Cross Travel Drive Motor(1y)', '6PKGE-PAL202', 'Drive Motors', 'MDE-031', 'REL NMAT PRC SETC', 'Palletizer 2', 'P14', '610-3151', 20075229),
(601071499, '2024-05-18', 'PM14', 'Servicing of Conveyor Motor(1y)', '6PKGE-UNC304', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Uncaser 3', 'P14', '610-3152', 20075253),
(601071500, '2024-05-18', 'PM14', 'Servicing of Main Drive Motor(1y)', '6PKGE-UNC305', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Uncaser 3', 'P14', '610-3152', 20075253),
(601094854, '2024-05-02', 'PM14', 'Servicing of Crowner Mill Drive (1y)', '6PKGE-FLR301', 'Drive Crown Mill Motor', 'MDE-031', 'REL NMAT PRC SETC', 'Filler 3', 'P14', '610-3151', 20058927),
(601094911, '2024-05-03', 'PM14', 'Servicing of Geared Motor Brake(6m)', '6PKGE-UNC306', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Uncaser 3', 'P14', '610-3152', 20075253),
(601095968, '2024-05-04', 'PM14', 'INSPECT/CLEAN/TIGHTEN MCC CONTROLS 182D:', '6EL-PCV02017', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, Loading Table to DPL-3,4 & P-Turner', 'P14', '610-3152', 20042910),
(601099762, '2024-05-26', 'PM14', 'INSPECT/SERVICE MOTOR BRAKE 63D:', '6EL-PCV02005', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, DPL Out, P-Turner-4 to 7 & P-Magazine', 'P14', '610-3152', 20042911),
(601099763, '2024-05-26', 'PM14', 'INSPECT/SERVICE MOTOR BRAKE 63D:', '6EL-PCV02006', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, DPL-3, In-Machine Conveyor', 'P14', '610-3152', 20042912),
(601099765, '2024-05-26', 'PM14', 'INSPECT/SERVICE MOTOR BRAKE 63D:', '6EL-PCV02008', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, Pallet Magazine, (Loading/Unloading)', 'P14', '610-3152', 20042913),
(601099766, '2024-05-26', 'PM14', 'INSPECT/SERVICE MOTOR BRAKE 63D:', '6EL-PCV02009', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCF, PAL-3 & 4 Outfeed to Unloading Table', 'P14', '610-3152', 20042914),
(601099767, '2024-05-13', 'PM14', 'PCE, DPL3-4, Infd, Load/M-Tst, Chk Consol, 2m', '6EL-PCV02010', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, Loading Table to DPL-3,4 & P-Turner', 'P14', '610-3152', 20042910),
(601099768, '2024-05-16', 'PM14', 'PCE, DPL3 In-Mac, Load/M-Tst, Chk Consol, 2m', '6EL-PCV02011', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, DPL-3, In-Machine Conveyor', 'P14', '610-3152', 20042912),
(601099769, '2024-05-19', 'PM14', 'PCE, DPL4 In-Mac, Load/M-Tst, Chk Consol, 2m', '6EL-PCV02012', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, DPL-4 In-Machine Conveyor', 'P14', '610-3152', 20042915),
(601099770, '2024-05-16', 'PM14', 'PCE, DPL3-4, PAL3-4 Load/M-Tst, Chk Cnsol, 2m', '6EL-PCV02013', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, DPL Out, P-Turner-4 to 7 & P-Magazine', 'P14', '610-3152', 20042911),
(601099771, '2024-05-19', 'PM14', 'PCE, Mke-up/PAL3-4 Load/M-Tst, Chk Cnsol, 2m', '6EL-PCV02014', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCE, Pallet Magazine, (Loading/Unloading)', 'P14', '610-3152', 20042913),
(601099772, '2024-05-16', 'PM14', 'PCF, PAL3-4 Outfd, Load/M-Tst, Chk Cnsol, 2m', '6EL-PCV02015', 'Geared Motors', 'MDE-033', 'REL NMAT PRC SETC', 'PCF, PAL-3 & 4 Outfeed to Unloading Table', 'P14', '610-3152', 20042914),
(601100284, '2024-05-03', 'PM14', 'Serv of Crowner Height Adj. Motor(1.5y)', '6PKGE-FLR204', 'Height Adjustment Corker Motor', 'MDE-031', 'REL NMAT PRC SETC', 'Filler 2', 'P14', '610-3151', 20058876),
(601100419, '2024-05-12', 'PM14', 'KEG, Inspect / Service of Motors, (3m)', '6EL-KEG01003', 'Electrical & Controls', 'MDE-033', 'REL NMAT PRC SETC', 'KEG Racking, Electrical', 'P14', '610-3151', 20023241),
(601101635, '2024-05-15', 'PM14', 'Servicing of Head Table Drive Motor(2m)', '6PKGE-PAL203', 'Drive Motors', 'MDE-031', 'REL NMAT PRC SETC', 'Palletizer 2', 'P14', '610-3151', 20075229),
(601101636, '2024-05-15', 'PM14', 'Servicing of Case Row Pusher Drive Motor', '6PKGE-PAL205', 'Drive Motors', 'MDE-031', 'REL NMAT PRC SETC', 'Palletizer 2', 'P14', '610-3151', 20075229),
(601101640, '2024-05-14', 'PM14', 'Load Monitoring of Motors (2m)', '6PKGE-PAL406', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Palletizer 4', 'P14', '610-3152', 20075244),
(601101744, '2024-05-13', 'PM14', 'Load Monitoring(2m)', '6PKGE-UNC301', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Uncaser 3', 'P14', '610-3152', 20075253),
(601108963, '2024-05-10', 'PM14', 'Load Monitoring of Drive Motors(2m)', '6PKGE-DPL105', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Depalletizer 1', 'P14', '610-3151', 20073726),
(601108964, '2024-05-10', 'PM14', 'Load Monitoring of Drive Motors(2m)', '6PKGE-DPL206', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Depalletizer 2', 'P14', '610-3151', 20073746),
(601108965, '2024-05-07', 'PM14', 'Load Monitoring of Drive Motors(2m)', '6PKGE-DPL306', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Depalletizer 3', 'P14', '610-3152', 20074477),
(601108966, '2024-05-07', 'PM14', 'Load Monitoring of Drive Motors(2m)', '6PKGE-DPL406', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Depalletizer 4', 'P14', '610-3152', 20074514),
(601108967, '2024-05-10', 'PM14', 'Load Monitoring of Motors (2m)', '6PKGE-PAL106', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Palletizer 1', 'P14', '610-3151', 20075217),
(601108968, '2024-05-19', 'PM14', 'Service of Geared Motor Brakes (3m)', '6PKGE-PAL109', 'Drive Motors', 'MDE-033', 'REL NMAT PRC SETC', 'Palletizer 1', 'P14', '610-3151', 20075217),
(601108969, '2024-05-10', 'PM14', 'Load Monitoring of Motors (2m)', '6PKGE-PAL206', 'Drive Motors', 'MDE-031', 'REL NMAT PRC SETC', 'Palletizer 2', 'P14', '610-3151', 20075229);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `middleName`, `lastName`, `contact`, `address`, `email`, `role`, `password`) VALUES
(1000000001, 'Jimmy', 'Ando', 'Montebon', 2147483647, '789 Ramos Street, Cebu City', 'jimmymontebon@yahoo.com', 'superintendent', '4afe2148'),
(1000000002, 'Maria', 'Dela Cruz', 'Santos', 2147483647, '456 Gorordo Avenue, Cebu City', 'mariadelacruz@gmail.com', 'technician', 'ecc8367a'),
(1000000003, 'Juan', 'Carlos', 'Perez', 2147483647, '123 Osmeña Boulevard, Cebu City', 'juancarlosperez@hotmail.com', 'manager', 'b7c3579e'),
(1000000004, 'Sofia', 'Garcia', 'Reyes', 2147483647, '987 Archbishop Reyes Avenue, Cebu City', 'sofiagr@gmail.com', 'technician', 'ba64fe18'),
(1000000005, 'Miguel', 'Lim', 'Tan', 2147483647, '321 Mango Street, Cebu City', 'miguellimtan@yahoo.com', 'superintendent', '40694d0b'),
(1000000006, 'Anna', 'Reyes', 'Cruz', 2147483647, '543 Salinas Drive, Lahug, Cebu City', 'annareyescruz@gmail.com', 'technician', 'cd6855a1'),
(1000000007, 'Carlos', 'Santos', 'Garcia', 2147483647, '210 Escario Street, Cebu City', 'carlossantos@yahoo.com', 'manager', '88696e85'),
(1000000008, 'Camille', 'Dela Cruz', 'Rivera', 2147483647, '876 Juan Luna Avenue, Mabolo, Cebu City', 'camillerivera@gmail.com', 'technician', 'cd85fc43'),
(1000000009, 'Mark', 'Reyes', 'Cruz', 2147483647, '234 V. Rama Avenue, Cebu City', 'markreyes@yahoo.com', 'technician', 'f1a29fb5'),
(1000000010, 'Julia', 'Santos', 'Lim', 2147483647, '890 M.J. Cuenco Avenue, Cebu City', 'juliasantoslim@gmail.com', 'manager', '71d81ec8'),
(1000000011, 'Pedro', 'Cruz', 'Reyes', 2147483647, '111 Mango Street, Cebu City', 'pedrocreyes@yahoo.com', 'superintendent', '8fb2e521'),
(1000000012, 'Isabel', 'Lim', 'Garcia', 2147483647, '654 Hernan Cortes Street, Mandaue City', 'isabellimgarcia@gmail.com', 'technician', '24a7299d'),
(1000000013, 'Diego', 'Santos', 'Cruz', 2147483647, '777 P. del Rosario Street, Cebu City', 'diegosantoscruz@yahoo.com', 'technician', '1b894289'),
(1000000014, 'Sofia', 'Cruz', 'Lim', 2147483647, '432 Gorordo Avenue, Cebu City', 'sofialim@gmail.com', 'manager', '2e2bf2a1'),
(1000000015, 'Lorenzo', 'Garcia', 'Santos', 2147483647, '543 Archbishop Reyes Avenue, Cebu City', 'lorenzogarcia@gmail.com', 'technician', '0e51ebc4'),
(1000000016, 'Andrea', 'Reyes', 'Lim', 2147483647, '210 Osmeña Boulevard, Cebu City', 'andrealim@yahoo.com', 'technician', '2db201e1'),
(1000000017, 'Lucas', 'Santos', 'Cruz', 2147483647, '123 A.S. Fortuna Street, Mandaue City', 'lucassantoscruz@gmail.com', 'superintendent', '3478602c'),
(1000000018, 'Sofia', 'Lim', 'Cruz', 2147483647, '890 M.C. Briones Street, Mandaue City', 'sofialim@yahoo.com', 'technician', 'e90cc7d4'),
(1000000019, 'Diego', 'Garcia', 'Lim', 2147483647, '111 M.J. Cuenco Avenue, Cebu City', 'diegogarcia@gmail.com', 'technician', '39cc11df'),
(1000000020, 'Julia', 'Cruz', 'Lim', 2147483647, '654 P. Burgos Street, Cebu City', 'juliacruzlim@yahoo.com', 'manager', 'd3e32fc8'),
(1000000021, 'Santiago', 'Lim', 'Santos', 2147483647, '777 Mango Street, Cebu City', 'santiagolim@gmail.com', 'technician', '3551f23c'),
(1000000022, 'Isabella', 'Santos', 'Reyes', 2147483647, '432 M.J. Cuenco Avenue, Cebu City', 'isabellasantos@yahoo.com', 'technician', '3ec989f2'),
(1000000023, 'Leonardo', 'Cruz', 'Garcia', 2147483647, '543 Salinas Drive, Lahug, Cebu City', 'leonardocruz@gmail.com', 'superintendent', 'b68928b3'),
(1000000024, 'Gabriela', 'Lim', 'Cruz', 2147483647, '890 Escario Street, Cebu City', 'gabrielalim@yahoo.com', 'technician', 'a098ce08'),
(1000000025, 'Mateo', 'Garcia', 'Lim', 2147483647, '111 Gorordo Avenue, Cebu City', 'mateogarcia@gmail.com', 'manager', '0fcfb715'),
(1000000026, 'Camila', 'Lim', 'Santos', 2147483647, '654 Archbishop Reyes Avenue, Cebu City', 'camilalim@yahoo.com', 'technician', 'a07430c4'),
(1000000027, 'Alejandro', 'Santos', 'Cruz', 2147483647, '777 Osmeña Boulevard, Cebu City', 'alejandrosantoscruz@gmail.com', 'technician', 'a8336f06'),
(1000000028, 'Valentina', 'Lim', 'Reyes', 2147483647, '432 A.S. Fortuna Street, Mandaue City', 'valentinalim@gmail.com', 'manager', 'e15f4bfd'),
(1000000029, 'Lucas', 'Cruz', 'Lim', 2147483647, '543 M.C. Briones Street, Mandaue City', 'lucascruz@yahoo.com', 'technician', '2b85d61f'),
(1000000030, 'Ana', 'Lim', 'Garcia', 2147483647, '210 P. del Rosario Street, Cebu City', 'analimgarcia@gmail.com', 'superintendent', 'bd88146f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `taskID` (`taskID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`taskID`) REFERENCES `tasks` (`taskID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
