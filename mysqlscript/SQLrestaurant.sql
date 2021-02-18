-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 18 Φεβ 2021 στις 21:00:21
-- Έκδοση διακομιστή: 10.4.17-MariaDB
-- Έκδοση PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `restaurant`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `menu`
--

CREATE TABLE `menu` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) COLLATE utf8_bin NOT NULL,
  `userProfession` varchar(255) COLLATE utf8_bin NOT NULL,
  `userPic` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `menu`
--

INSERT INTO `menu` (`userID`, `userName`, `userProfession`, `userPic`) VALUES
(2, 'Tandori', 'Rosted', '828541.jpg'),
(3, 'Sushi', 'Xin Zhao Way!!', '524615.jpg'),
(4, 'Salmon', 'Rosted', '349985.jpg'),
(5, 'Greek Barramundi', 'Greek Fish!!', '969879.jpg'),
(6, 'Beaf Steak', 'On The Grill', '292913.jpg'),
(7, 'Chicken Fillet', 'With Chardonne', '120265.jpg'),
(8, 'Mix Grill', 'Variety of meat', '338248.jpg'),
(9, 'Pork Steak', 'On the grill', '992806.jpg'),
(10, 'Pasta', 'Vegeterian', '28712.jpg'),
(11, 'Pasta', 'With Sausage', '80723.jpg'),
(12, 'Pasta', 'With olives and prochuto', '323004.jpg'),
(13, 'Salmon Salad', 'With dill and lime', '265414.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `reservations`
--

CREATE TABLE `reservations` (
  `resid` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `tableid` int(5) NOT NULL,
  `date` date NOT NULL,
  `timeid` int(10) NOT NULL,
  `reservedfrom` varchar(15) COLLATE utf8_bin NOT NULL,
  `reservedfor` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tables`
--

CREATE TABLE `tables` (
  `tableid` int(11) NOT NULL,
  `tdescription` varchar(255) COLLATE utf8_bin NOT NULL,
  `people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `tables`
--

INSERT INTO `tables` (`tableid`, `tdescription`, `people`) VALUES
(1, 'Near Window', 2),
(2, 'Near Window', 4),
(3, 'Center', 6),
(4, 'Second Floor', 8);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `time`
--

CREATE TABLE `time` (
  `timeid` int(10) NOT NULL,
  `timefrom` time NOT NULL,
  `timeto` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `time`
--

INSERT INTO `time` (`timeid`, `timefrom`, `timeto`) VALUES
(1, '12:00:00', '14:00:00'),
(2, '14:00:00', '16:00:00'),
(3, '16:00:00', '18:00:00'),
(4, '18:00:00', '20:00:00'),
(5, '20:00:00', '22:00:00'),
(6, '22:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `Firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `Lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `Email` varchar(255) COLLATE utf8_bin NOT NULL,
  `Zip_Code` int(10) NOT NULL,
  `Phone_Number` int(20) NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  `password2` varchar(20) COLLATE utf8_bin NOT NULL,
  `Username` varchar(30) COLLATE utf8_bin NOT NULL,
  `userrole` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `Firstname`, `Lastname`, `Email`, `Zip_Code`, `Phone_Number`, `password`, `password2`, `Username`, `userrole`) VALUES
(1, 'giannis', 'lp', 'giannis@lp.com', 1, 111233, '$2y$10$jgqO1r9enYPja', '$2y$10$aSB5DzSnzbK9W', 'giannislp', 2);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`userID`);

--
-- Ευρετήρια για πίνακα `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`resid`),
  ADD KEY `id` (`id`),
  ADD KEY `tableid` (`tableid`),
  ADD KEY `timeid` (`timeid`);

--
-- Ευρετήρια για πίνακα `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`tableid`);

--
-- Ευρετήρια για πίνακα `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`timeid`),
  ADD KEY `timeid` (`timeid`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `menu`
--
ALTER TABLE `menu`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT για πίνακα `reservations`
--
ALTER TABLE `reservations`
  MODIFY `resid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT για πίνακα `tables`
--
ALTER TABLE `tables`
  MODIFY `tableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT για πίνακα `time`
--
ALTER TABLE `time`
  MODIFY `timeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`tableid`) REFERENCES `tables` (`tableid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`timeid`) REFERENCES `time` (`timeid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
