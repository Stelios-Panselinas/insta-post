-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 08 Σεπ 2023 στις 13:10:35
-- Έκδοση διακομιστή: 8.0.31
-- Έκδοση PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `eshop`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(125) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `password` int DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `first_name`, `last_name`, `password`) VALUES
(1, 'panselinas@eshop.gr', 'Stelios', 'Panselinas', 1234567890),
(2, 'michos@eshop.gr', 'Rafail', 'Michos', 1234567890),
(3, 'papagellis@eshop.gr', 'Ilias', 'Papagellis', 1234567890);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Βρεφικά Είδη'),
(2, 'Για κατοικίδια'),
(3, 'Καθαριότητα'),
(4, 'Ποτά-Αναψυκτικά');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `eshop_main`
--

DROP TABLE IF EXISTS `eshop_main`;
CREATE TABLE IF NOT EXISTS `eshop_main` (
  `eshop_id` int NOT NULL,
  `eshop_name` varchar(255) NOT NULL,
  `total_tokens` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `eshop_main`
--

INSERT INTO `eshop_main` (`eshop_id`, `eshop_name`, `total_tokens`) VALUES
(1, 'Insta Shop', 1300),
(1, 'Insta Shop', 1300);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `offer_id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `sub_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `price` float(4,2) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `user_id` int NOT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `dislikes` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`offer_id`),
  KEY `cat` (`category_id`),
  KEY `subcat` (`sub_id`),
  KEY `product` (`product_id`),
  KEY `shop` (`shop_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `offers`
--

INSERT INTO `offers` (`offer_id`, `shop_id`, `category_id`, `sub_id`, `product_id`, `price`, `valid`, `user_id`, `likes`, `dislikes`) VALUES
(1, 45, 2, 3, 14, 2.35, 1, 1, 0, 0),
(2, 0, 1, 1, 14, 2.35, 1, 1, 1, 2),
(3, 0, 1, 1, 14, 2.35, 1, 1, 2, 1),
(4, 45, 2, 3, 14, 2.35, 1, 1, 0, 0),
(5, 45, 2, 3, 14, 2.00, 1, 1, 0, 0),
(6, 45, 2, 3, 14, 2.35, 1, 1, 0, 0),
(7, 45, 2, 3, 14, 2.00, 1, 1, 0, 0),
(8, 20, 1, 1, 4, 2.35, 1, 1, 6, 2),
(9, 84, 1, 1, 4, 2.00, 1, 1, 18, 10);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT NULL,
  `prod_sub_id` int DEFAULT NULL,
  `initial_price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `prod_sub_id` (`prod_sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `product`
--

INSERT INTO `product` (`product_id`, `name`, `prod_sub_id`, `initial_price`) VALUES
(1, 'Nutricia Biskotti Ζωάκια 180γρ', 1, '0.00'),
(2, 'Nutricia Biskotti 180γρ', 1, '0.00'),
(3, 'Γιώτης Ανθός Ορύζης 150γρ', 1, '0.00'),
(4, 'Nestle Φαρίν Λακτέ 350γρ', 1, '0.00'),
(5, 'Γιώτης Μπισκοτόκρεμα 300γρ', 1, '0.00'),
(6, 'Nestle Ρόφημα Γαλακτ Junior 2+ Rtd 1λιτ', 2, '0.00'),
(7, 'Neslac Επιδόρπιο Γάλακτος Μπισκότο 4Χ100γρ', 2, '0.00'),
(8, 'Neslac Επιδόρπιο Γάλακτος Βανίλια 4Χ100γρ', 2, '0.00'),
(9, 'Γιώτης Sanilac 3 Γάλα Σκόνη 400γρ', 2, '0.00'),
(10, 'Nan Optipro 1 Γάλα Σε Σκόνη Πρώτης Βρεφικής Ηλικίας 400', 2, '0.00'),
(11, 'Whiskas Γατ/Φή Πουλ Σε Σάλτσα 100γρ', 3, '0.00'),
(12, 'Purina Gold Gourmet Γατ/Φή Βοδ/Κοτ 85γρ', 3, '0.00'),
(13, 'Friskies Γατ/Φή Πατέ Κοτ/Λαχ 400γρ', 3, '0.00'),
(14, 'Whiskas Γατ/Φή Κοτόπουλο 400γρ', 3, '0.00'),
(15, 'Friskies Adult Ξηρά Γατ/Φή Κουν/Κοτ/Λαχ 400γρ', 3, '0.00'),
(16, 'Pedigree Schmackos Μπισκότα Σκύλου 43γρ', 4, '0.00'),
(17, 'Cesar Clasicos Σκυλ/Φή Μοσχ 150γρ', 4, '0.00'),
(18, 'Friskies Σκυλ/Φή Βοδ/Κοτ/Λαχ 400γρ', 4, '0.00'),
(19, 'Pedigree Rodeo Σκυλ/Φή Μοσχ 70γρ', 4, '0.00'),
(20, 'Pedigree Υγ Σκυλ/Φή 3 Ποικ Πουλερικών 400γρ', 4, '0.00'),
(21, 'Palmolive Υγρό Πιάτων Regular 500ml', 5, '0.00'),
(22, 'Palmolive Υγρό Πιάτων Λεμόνι 500ml', 5, '0.00'),
(23, 'Svelto Gel Υγρό Πιάτων Λεμόνι 500ml', 5, '0.00'),
(24, 'Rol Σκόνη Για Πλυσ Στο Χέρι 380γρ', 5, '0.00'),
(25, 'Ava Υγρό Πιάτων Perle Σύμπλεγμα Βιταμινών 430ml', 5, '0.00'),
(26, 'Glade Αντ/Κο Αποσμ Χώρου Λεβάντα', 6, '0.00'),
(27, 'Airwick Αποσμ Χώρου Stick Up 120γρ 2τεμ', 6, '0.00'),
(28, 'Airwick Αντ/Κο Αποσμ Χώρου Βαν/Ορχιδ', 6, '0.00'),
(29, 'Airwick Αντ/Κο Freshmatic Βαν/Ορχιδ 250ml', 6, '0.00'),
(34, 'Μαλαματίνα Ρετσίνα 500ml', 7, '0.00'),
(35, 'Κουρτάκη Ρετσίνα 500ml', 7, '0.00'),
(36, 'Ρούσσος Νάμα Κρασί Ερυθρό Γλυκο 375ml', 7, '0.00'),
(37, 'Don Simon Kρασί Sangria Χαρτ 1λιτ', 7, '0.00'),
(38, 'Αλλοτινό Οίνος Ερυθρ Ημιγλυκ 0,5ml', 7, '0.00'),
(39, 'Βεργίνα Μπύρα 500ml', 8, '0.00'),
(40, 'Mythos Μπύρα 330ml', 8, '0.00'),
(41, 'Stella Artois Μπύρα 330ml', 8, '0.00'),
(42, 'Fix Hellas Mπύρα 330ml', 8, '0.00'),
(43, 'Amstel Μπύρα 330ml', 8, '0.00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int NOT NULL,
  `latitude` double(8,6) DEFAULT NULL,
  `longtitude` double(8,6) DEFAULT NULL,
  `name` varchar(27) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `type` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Άδειασμα δεδομένων του πίνακα `shop`
--

INSERT INTO `shop` (`id`, `latitude`, `longtitude`, `name`, `type`) VALUES
(0, 38.208031, 21.712654, 'Lidl', 'supermarket'),
(1, 38.289310, 21.780656, 'The Mart', 'supermarket'),
(2, 38.263351, 21.743426, 'Lidl', 'supermarket'),
(3, 38.295208, 21.790802, 'Σουπερμάρκετ Ανδρικόπουλος', 'supermarket'),
(4, 38.210436, 21.764207, 'Σκλαβενίτης', 'supermarket'),
(5, 38.235530, 21.762277, 'Papakos', 'convenience'),
(6, 38.261290, 21.754023, NULL, 'convenience'),
(7, 38.231292, 21.740082, 'Lidl', 'supermarket'),
(8, 38.301308, 21.781495, 'Σκλαβενίτης', 'supermarket'),
(9, 38.294937, 21.790383, NULL, 'supermarket'),
(10, 38.285236, 21.766672, NULL, 'convenience'),
(11, 38.291112, 21.771454, NULL, 'convenience'),
(12, 38.291333, 21.766607, NULL, 'convenience'),
(13, 38.277912, 21.762547, NULL, 'convenience'),
(14, 38.275163, 21.757403, NULL, 'convenience'),
(15, 38.275694, 21.762917, NULL, 'supermarket'),
(16, 38.259647, 21.748966, 'Σκλαβενίτης', 'supermarket'),
(17, 38.294503, 21.788312, NULL, 'convenience'),
(18, 38.212647, 21.756873, NULL, 'supermarket'),
(19, 38.261380, 21.743612, 'Ρουμελιώτης SUPER Market', 'supermarket'),
(20, 38.258523, 21.741582, 'Σκλαβενίτης', 'supermarket'),
(21, 38.299138, 21.785498, NULL, 'convenience'),
(22, 38.291540, 21.771280, NULL, 'convenience'),
(23, 38.232389, 21.747326, 'My market', 'supermarket'),
(24, 38.232237, 21.725729, 'ΑΒ Βασιλόπουλος', 'supermarket'),
(25, 38.264497, 21.760362, 'Markoulas', 'supermarket'),
(26, 38.265786, 21.759325, NULL, 'convenience'),
(27, 38.306756, 21.805133, 'Lidl', 'supermarket'),
(28, 38.239986, 21.736371, 'Ανδρικόπουλος', 'supermarket'),
(29, 38.237714, 21.739900, NULL, 'convenience'),
(30, 38.236494, 21.737340, 'Σκλαβενίτης', 'supermarket'),
(31, 38.242705, 21.734236, 'My Market', 'supermarket'),
(32, 38.280381, 21.768939, NULL, 'convenience'),
(33, 38.276738, 21.764631, NULL, 'convenience'),
(34, 38.256861, 21.739670, 'My market', 'supermarket'),
(35, 38.195196, 21.732329, 'Ανδρικόπουλος', 'supermarket'),
(36, 38.256558, 21.741850, 'ΑΒ ΒΑΣΙΛΟΠΟΥΛΟΣ', 'supermarket'),
(37, 38.245009, 21.736528, NULL, 'supermarket'),
(38, 38.243485, 21.733285, 'Σκλαβενίτης', 'supermarket'),
(39, 38.243824, 21.733954, NULL, 'convenience'),
(40, 38.252428, 21.741421, NULL, 'supermarket'),
(41, 38.251273, 21.742392, NULL, 'supermarket'),
(42, 38.242796, 21.730255, 'Ανδρικόπουλος', 'supermarket'),
(43, 38.245412, 21.733719, NULL, 'supermarket'),
(44, 38.272580, 21.836499, 'Mini Market', 'convenience'),
(45, 38.279537, 21.766713, 'Carna', 'convenience'),
(46, 38.305240, 21.777001, 'Mini Market', 'convenience'),
(47, 38.242579, 21.729643, 'Kronos', 'supermarket'),
(48, 38.258563, 21.750468, 'Φίλιππας', 'convenience'),
(49, 38.301501, 21.794098, NULL, 'supermarket'),
(50, 38.249806, 21.736334, 'No supermarket', 'supermarket'),
(51, 38.249085, 21.735128, 'Kiosk', 'convenience'),
(52, 38.249316, 21.734911, 'Kiosk', 'convenience'),
(53, 38.248956, 21.734442, 'Kiosk', 'convenience'),
(54, 38.256987, 21.741306, 'Kiosk', 'convenience'),
(55, 38.256143, 21.740953, 'Kiosk', 'convenience'),
(56, 38.252367, 21.740070, NULL, 'supermarket'),
(57, 38.269193, 21.748150, 'Ανδρικόπουλος - Supermarket', 'supermarket'),
(58, 38.269096, 21.749701, 'Σκλαβενίτης', 'supermarket'),
(59, 38.233827, 21.725165, NULL, 'supermarket'),
(60, 38.327738, 21.876422, 'Mini Market', 'convenience'),
(61, 38.217093, 21.735778, 'ΑΒ Βασιλόπουλος', 'supermarket'),
(62, 38.216025, 21.732120, 'Mini Market', 'convenience'),
(63, 38.312741, 21.820345, NULL, 'supermarket'),
(64, 38.245186, 21.731241, NULL, 'supermarket'),
(65, 38.250451, 21.739668, '3A', 'supermarket'),
(66, 38.248631, 21.738977, 'Spar', 'supermarket'),
(67, 38.248154, 21.738322, 'ΑΝΔΡΙΚΟΠΟΥΛΟΣ', 'supermarket'),
(68, 38.242946, 21.730804, 'ΑΝΔΡΙΚΟΠΟΥΛΟΣ', 'supermarket'),
(69, 38.239283, 21.726528, 'MyMarket', 'supermarket'),
(70, 38.265336, 21.757534, NULL, 'supermarket'),
(71, 38.234662, 21.725347, 'Ena Cash And Carry', 'supermarket'),
(72, 38.235800, 21.729491, 'ΚΡΟΝΟΣ - (Σκαγιοπουλείου)', 'supermarket'),
(73, 38.237917, 21.730640, 'Ανδρικόπουλος Super Market', 'supermarket'),
(74, 38.237506, 21.732898, '3Α Αράπης', 'supermarket'),
(75, 38.236112, 21.733787, 'Γαλαξίας', 'supermarket'),
(76, 38.236012, 21.728312, 'Super Market Θεοδωρόπουλος', 'supermarket'),
(77, 38.239044, 21.734072, 'Super Market ΚΡΟΝΟΣ', 'supermarket'),
(78, 38.264227, 21.739685, NULL, 'supermarket'),
(79, 38.265823, 21.739881, NULL, 'supermarket'),
(80, 38.260180, 21.742870, 'Σκλαβενίτης', 'supermarket'),
(81, 38.258642, 21.746007, '3A ARAPIS', 'supermarket'),
(82, 38.245466, 21.735505, 'Μασούτης', 'supermarket'),
(83, 38.249570, 21.738028, 'ΑΒ Shop & Go', 'supermarket'),
(84, 38.239878, 21.745555, '3Α ΑΡΑΠΗΣ', 'supermarket'),
(85, 38.255444, 21.740874, 'Περίπτερο', 'convenience'),
(86, 38.149422, 21.623220, NULL, 'convenience'),
(87, 38.147741, 21.620628, NULL, 'convenience'),
(88, 38.156306, 21.645479, NULL, 'convenience');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `sub_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `subcategory`
--

INSERT INTO `subcategory` (`sub_id`, `name`, `category_id`) VALUES
(1, 'Βρεφικές τροφές', 1),
(2, 'Γάλα', 1),
(3, 'Pet shop/Τροφή γάτας', 2),
(4, 'Pet shop/Τροφή σκύλου', 2),
(5, 'Απορρυπαντικά', 3),
(6, 'Αποσμητικά', 3),
(7, 'Κρασιά', 4),
(8, 'Μπύρες', 4);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(125) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `password` int DEFAULT NULL,
  `cur_tokens` int DEFAULT NULL,
  `total_tokens` int DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`user_id`, `email`, `first_name`, `last_name`, `password`, `cur_tokens`, `total_tokens`) VALUES
(1, 'user1@eshop.gr', 'Panos', 'Papadopoulos', 123456, 12, 20),
(2, 'giannis@gmail.com', 'Giannis', 'Georgiou', 654321, 17, 19),
(3, 'gianpap@gmail.com', 'Giannis', 'Papadopoulos', 412141, 13, 21),
(4, 'nikospap@gmail.com', 'Nikos', 'Papadopoulos', 321312, 4, 5),
(5, 'kostaspap@gmail.com', 'Kostas', 'Papadopoulos', 231414, 11, 12),
(6, 'giorgospap@gmail.com', 'Giorgos', 'Papadopoulos', 342322, 6, 15),
(7, 'kosan@gmail.com', 'Kostas', 'Anastasiou', 954583, 8, 10),
(8, 'timoskos@gmail.com', 'Timos', 'kostakos', 366782, 9, 12),
(9, 'hliasrap@gmail.com', 'Hlias', 'Raptopoulos', 994233, 13, 22),
(10, 'steliostrig@gmail.com', 'Stelios', 'Trigkas', 321111, 4, 25),
(11, 'robkos@gmail.com', 'Roberto', 'kostakos', 932114, 5, 7);

--
-- Δείκτες `user`
--
DROP TRIGGER IF EXISTS `add_tokens`;
DELIMITER $$
CREATE TRIGGER `add_tokens` AFTER INSERT ON `user` FOR EACH ROW BEGIN
    
    UPDATE eshop_main
    SET total_tokens = total_tokens+100
    WHERE eshop_id = 1; 
END
$$
DELIMITER ;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `ca` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offer_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subcategory` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prod_sub_id`) REFERENCES `subcategory` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
