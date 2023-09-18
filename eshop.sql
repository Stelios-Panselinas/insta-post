-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 18 Σεπ 2023 στις 09:05:32
-- Έκδοση διακομιστή: 8.0.31
-- Έκδοση PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `eshop`
--

DELIMITER $$
--
-- Διαδικασίες
--
DROP PROCEDURE IF EXISTS `tokens_distribution`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tokens_distribution` ()  NO SQL BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE user_id INT;
    DECLARE user_points INT;
    DECLARE percentage DECIMAL(5, 2);
    DECLARE tokens INT;
    
    
	
    DECLARE user_cursor CURSOR FOR SELECT user_id, score FROM user;
   
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
    
    SELECT total_tokens INTO tokens FROM eshop_main;

    SET done = FALSE;

    OPEN user_cursor;

    user_loop: LOOP
        FETCH user_cursor INTO user_id, user_points;

        IF done THEN
            LEAVE user_loop;
        END IF;

        IF user_points > 0 THEN
            SET percentage = (user_points / (SELECT SUM(points) FROM user_points_table)) * 100;
        ELSE
            SET percentage = 0;
        END IF;

        UPDATE user SET total_tokens = total_tokens + percentage*tokens WHERE user_id = user_id;

    END LOOP;

    CLOSE user_cursor;
END$$

DELIMITER ;

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
(1, 'Insta Shop', 1600),
(1, 'Insta Shop', 1600);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `interactions`
--

DROP TABLE IF EXISTS `interactions`;
CREATE TABLE IF NOT EXISTS `interactions` (
  `interaction_id` int NOT NULL AUTO_INCREMENT,
  `offer_id` int NOT NULL,
  `user_id` int NOT NULL,
  `entry_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `interaction` enum('Like','Dislike') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`interaction_id`),
  KEY `interaction_offers` (`offer_id`),
  KEY `interaction_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `interactions`
--

INSERT INTO `interactions` (`interaction_id`, `offer_id`, `user_id`, `entry_datetime`, `interaction`) VALUES
(0, 9, 1, '2023-09-16 23:05:33', 'Like'),
(6, 9, 1, '2023-09-04 21:06:28', 'Like'),
(7, 9, 1, '2023-09-04 21:09:29', 'Dislike'),
(8, 9, 1, '2023-09-04 23:31:20', 'Like'),
(9, 9, 1, '2023-09-04 23:31:21', 'Dislike'),
(10, 2, 1, '2023-09-05 00:22:28', 'Like'),
(11, 3, 1, '2023-09-05 00:22:31', 'Like'),
(12, 2, 1, '2023-09-05 00:23:48', 'Dislike'),
(13, 3, 1, '2023-09-05 00:23:52', 'Dislike'),
(14, 1, 1, '2023-09-05 21:06:48', 'Like'),
(15, 4, 1, '2023-09-05 21:06:51', 'Like'),
(16, 5, 1, '2023-09-05 21:06:53', 'Like'),
(17, 6, 1, '2023-09-05 21:06:55', 'Dislike'),
(18, 7, 1, '2023-09-05 21:06:58', 'Dislike'),
(19, 8, 1, '2023-09-05 21:10:15', 'Like');

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
  `entry_daytime` date NOT NULL,
  PRIMARY KEY (`offer_id`),
  KEY `cat` (`category_id`),
  KEY `subcat` (`sub_id`),
  KEY `product` (`product_id`),
  KEY `shop` (`shop_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `offers`
--

INSERT INTO `offers` (`offer_id`, `shop_id`, `category_id`, `sub_id`, `product_id`, `price`, `valid`, `user_id`, `likes`, `dislikes`, `entry_daytime`) VALUES
(1, 45, 2, 3, 14, 2.35, 1, 2, 1, 0, '2023-09-08'),
(2, 0, 1, 1, 14, 2.35, 1, 6, 2, 3, '2023-09-08'),
(3, 0, 1, 1, 14, 2.35, 1, 4, 3, 2, '2023-09-01'),
(4, 45, 2, 3, 14, 2.35, 1, 3, 1, 0, '2023-09-08'),
(5, 45, 2, 3, 14, 2.00, 1, 1, 1, 0, '2023-09-06'),
(6, 45, 2, 3, 14, 2.35, 1, 2, 0, 1, '2023-09-06'),
(7, 45, 2, 3, 14, 2.00, 1, 7, 0, 1, '2023-09-08'),
(8, 20, 1, 1, 4, 2.35, 1, 4, 7, 2, '2023-09-06'),
(9, 84, 1, 1, 4, 2.00, 1, 3, 35, 13, '2023-09-02'),
(10, 3, 1, 2, 14, 1.20, 1, 1, 0, 0, '2023-09-09'),
(11, 3, 1, 2, 14, 1.20, 1, 2, 0, 0, '2023-09-09'),
(12, 3, 1, 2, 14, 1.20, 1, 2, 0, 0, '2023-09-09'),
(13, 3, 1, 2, 14, 1.20, 1, 4, 0, 0, '2023-09-09'),
(14, 3, 1, 2, 14, 1.20, 1, 1, 0, 0, '2023-09-09'),
(15, 3, 1, 2, 14, 1.00, 1, 6, 0, 0, '2023-09-09'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '0000-00-00'),
(17, 3, 1, 2, 14, 1.00, 1, 1, 0, 0, '2023-09-09');

--
-- Δείκτες `offers`
--
DROP TRIGGER IF EXISTS `add_interaction`;
DELIMITER $$
CREATE TRIGGER `add_interaction` AFTER UPDATE ON `offers` FOR EACH ROW BEGIN
    IF NEW.likes <> OLD.likes THEN
        INSERT INTO interactions 
        (interaction_id,offer_id,user_id,entry_datetime,interaction)
        VALUES (DEFAULT, New.offer_id, NEW.user_id, DEFAULT, 'Like');
    ELSEIF NEW.dislikes <> OLD.dislikes THEN
    	INSERT INTO interactions 
        (interaction_id,offer_id,user_id,entry_datetime,interaction)
        VALUES (DEFAULT, New.offer_id, NEW.user_id, DEFAULT, 'Dislike');
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `add_score`;
DELIMITER $$
CREATE TRIGGER `add_score` AFTER INSERT ON `offers` FOR EACH ROW BEGIN
    DECLARE last_day_price DECIMAL(10, 2);
    DECLARE last_week_price DECIMAL(10, 2);

    
    SELECT AVG(price) INTO last_day_price
    FROM offers
    WHERE entry_daytime > DATE_SUB(NEW.entry_daytime, INTERVAL 1 DAY);
    
    SELECT AVG(price) INTO last_week_price
    FROM offers
    WHERE entry_daytime > DATE_SUB(NEW.entry_daytime, INTERVAL 7 DAY);

    
    IF NEW.price <= 0.8*last_day_price  THEN
        
        UPDATE user
        SET score = score + 50
        WHERE user_id = NEW.user_id;
    ELSEIF NEW.price <= 0.8*last_week_price  THEN
        
        UPDATE user
        SET score = score + 20
        WHERE user_id = NEW.user_id;
    END IF;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(43, 'Amstel Μπύρα 330ml', 8, '0.00'),
(44, NULL, NULL, '0.00'),
(45, 'qqq', 1, '24.00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `latitude` double(8,6) DEFAULT NULL,
  `longtitude` double(8,6) DEFAULT NULL,
  `name` varchar(27) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `type` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb3;

--
-- Άδειασμα δεδομένων του πίνακα `shop`
--

INSERT INTO `shop` (`id`, `latitude`, `longtitude`, `name`, `type`) VALUES
(1, 21.123456, 21.255555, 'sss', 'qsqwsq'),
(2, 38.208031, 21.712654, 'Lidl', 'supermarket'),
(3, 38.289310, 21.780656, 'The Mart', 'supermarket'),
(4, 38.263351, 21.743426, 'Lidl', 'supermarket'),
(5, 38.295208, 21.790802, 'Σουπερμάρκετ Ανδρικόπουλος', 'supermarket'),
(6, 38.210436, 21.764207, 'Σκλαβενίτης', 'supermarket'),
(7, 38.235530, 21.762277, 'Papakos', 'convenience'),
(8, 38.261290, 21.754023, NULL, 'convenience'),
(9, 38.231292, 21.740082, 'Lidl', 'supermarket'),
(10, 38.301308, 21.781495, 'Σκλαβενίτης', 'supermarket'),
(11, 38.294937, 21.790383, NULL, 'supermarket'),
(12, 38.285236, 21.766672, NULL, 'convenience'),
(13, 38.291112, 21.771454, NULL, 'convenience'),
(14, 38.291333, 21.766607, NULL, 'convenience'),
(15, 38.277912, 21.762547, NULL, 'convenience'),
(16, 38.275163, 21.757403, NULL, 'convenience'),
(17, 38.275694, 21.762917, NULL, 'supermarket'),
(18, 38.259647, 21.748966, 'Σκλαβενίτης', 'supermarket'),
(19, 38.294503, 21.788312, NULL, 'convenience'),
(20, 38.212647, 21.756873, NULL, 'supermarket'),
(21, 38.261380, 21.743612, 'Ρουμελιώτης SUPER Market', 'supermarket'),
(22, 38.258523, 21.741582, 'Σκλαβενίτης', 'supermarket'),
(23, 38.299138, 21.785498, NULL, 'convenience'),
(24, 38.291540, 21.771280, NULL, 'convenience'),
(25, 38.232389, 21.747326, 'My market', 'supermarket'),
(26, 38.232237, 21.725729, 'ΑΒ Βασιλόπουλος', 'supermarket'),
(27, 38.264497, 21.760362, 'Markoulas', 'supermarket'),
(28, 38.265786, 21.759325, NULL, 'convenience'),
(29, 38.306756, 21.805133, 'Lidl', 'supermarket'),
(30, 38.239986, 21.736371, 'Ανδρικόπουλος', 'supermarket'),
(31, 38.237714, 21.739900, NULL, 'convenience'),
(32, 38.236494, 21.737340, 'Σκλαβενίτης', 'supermarket'),
(33, 38.242705, 21.734236, 'My Market', 'supermarket'),
(34, 38.280381, 21.768939, NULL, 'convenience'),
(35, 38.276738, 21.764631, NULL, 'convenience'),
(36, 38.256861, 21.739670, 'My market', 'supermarket'),
(37, 38.195196, 21.732329, 'Ανδρικόπουλος', 'supermarket'),
(38, 38.256558, 21.741850, 'ΑΒ ΒΑΣΙΛΟΠΟΥΛΟΣ', 'supermarket'),
(39, 38.245009, 21.736528, NULL, 'supermarket'),
(40, 38.243485, 21.733285, 'Σκλαβενίτης', 'supermarket'),
(41, 38.243824, 21.733954, NULL, 'convenience'),
(42, 38.252428, 21.741421, NULL, 'supermarket'),
(43, 38.251273, 21.742392, NULL, 'supermarket'),
(44, 38.242796, 21.730255, 'Ανδρικόπουλος', 'supermarket'),
(45, 38.245412, 21.733719, NULL, 'supermarket'),
(46, 38.272580, 21.836499, 'Mini Market', 'convenience'),
(47, 38.279537, 21.766713, 'Carna', 'convenience'),
(48, 38.305240, 21.777001, 'Mini Market', 'convenience'),
(49, 38.242579, 21.729643, 'Kronos', 'supermarket'),
(50, 38.258563, 21.750468, 'Φίλιππας', 'convenience'),
(51, 38.301501, 21.794098, NULL, 'supermarket'),
(52, 38.249806, 21.736334, 'No supermarket', 'supermarket'),
(53, 38.249085, 21.735128, 'Kiosk', 'convenience'),
(54, 38.249316, 21.734911, 'Kiosk', 'convenience'),
(55, 38.248956, 21.734442, 'Kiosk', 'convenience'),
(56, 38.256987, 21.741306, 'Kiosk', 'convenience'),
(57, 38.256143, 21.740953, 'Kiosk', 'convenience'),
(58, 38.252367, 21.740070, NULL, 'supermarket'),
(59, 38.269193, 21.748150, 'Ανδρικόπουλος - Supermarket', 'supermarket'),
(60, 38.269096, 21.749701, 'Σκλαβενίτης', 'supermarket'),
(61, 38.233827, 21.725165, NULL, 'supermarket'),
(62, 38.327738, 21.876422, 'Mini Market', 'convenience'),
(63, 38.217093, 21.735778, 'ΑΒ Βασιλόπουλος', 'supermarket'),
(64, 38.216025, 21.732120, 'Mini Market', 'convenience'),
(65, 38.312741, 21.820345, NULL, 'supermarket'),
(66, 38.245186, 21.731241, NULL, 'supermarket'),
(67, 38.250451, 21.739668, '3A', 'supermarket'),
(68, 38.248631, 21.738977, 'Spar', 'supermarket'),
(69, 38.248154, 21.738322, 'ΑΝΔΡΙΚΟΠΟΥΛΟΣ', 'supermarket'),
(70, 38.242946, 21.730804, 'ΑΝΔΡΙΚΟΠΟΥΛΟΣ', 'supermarket'),
(71, 38.239283, 21.726528, 'MyMarket', 'supermarket'),
(72, 38.265336, 21.757534, NULL, 'supermarket'),
(73, 38.234662, 21.725347, 'Ena Cash And Carry', 'supermarket'),
(74, 38.235800, 21.729491, 'ΚΡΟΝΟΣ - (Σκαγιοπουλείου)', 'supermarket'),
(75, 38.237917, 21.730640, 'Ανδρικόπουλος Super Market', 'supermarket'),
(76, 38.237506, 21.732898, '3Α Αράπης', 'supermarket'),
(77, 38.236112, 21.733787, 'Γαλαξίας', 'supermarket'),
(78, 38.236012, 21.728312, 'Super Market Θεοδωρόπουλος', 'supermarket'),
(79, 38.239044, 21.734072, 'Super Market ΚΡΟΝΟΣ', 'supermarket'),
(80, 38.264227, 21.739685, NULL, 'supermarket'),
(81, 38.265823, 21.739881, NULL, 'supermarket'),
(82, 38.260180, 21.742870, 'Σκλαβενίτης', 'supermarket'),
(83, 38.258642, 21.746007, '3A ARAPIS', 'supermarket'),
(84, 38.245466, 21.735505, 'Μασούτης', 'supermarket'),
(85, 38.249570, 21.738028, 'ΑΒ Shop & Go', 'supermarket'),
(86, 38.239878, 21.745555, '3Α ΑΡΑΠΗΣ', 'supermarket'),
(87, 38.255444, 21.740874, 'Περίπτερο', 'convenience'),
(88, 38.149422, 21.623220, NULL, 'convenience'),
(89, 38.147741, 21.620628, NULL, 'convenience'),
(90, 38.156306, 21.645479, NULL, 'convenience'),
(91, 12.123456, 12.123456, 'sssss', 'sssssss'),
(92, 21.123456, 21.255555, 'stelan', 'qsqwsq');

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
  `password` varchar(255) DEFAULT NULL,
  `cur_tokens` int DEFAULT NULL,
  `total_tokens` int DEFAULT NULL,
  `score` int NOT NULL,
  `total_score` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`user_id`, `email`, `first_name`, `last_name`, `password`, `cur_tokens`, `total_tokens`, `score`, `total_score`) VALUES
(1, 'user1@eshop.gr', 'stelaras', 'Papadopoulos', '123456', 0, 100, 150, 0),
(2, 'giannis@gmail.com', 'Giannis', 'Georgiou', '654321', 0, 100, 0, 0),
(3, 'user1@eshop.gr', 'Panos', 'Papadopoulos', '123456', 0, 100, 0, 0),
(5, 'gianpap@gmail.com', 'Giannis', 'Papadopoulos', '412141', 0, 100, 0, 0),
(6, 'nikospap@gmail.com', 'Nikos', 'Papadopoulos', '321312', 0, 100, 0, 0),
(7, 'kostaspap@gmail.com', 'Kostas', 'Papadopoulos', '231414', 0, 100, 0, 0),
(8, 'giorgospap@gmail.com', 'Giorgos', 'Papadopoulos', '342322', 0, 100, 0, 0),
(9, 'kosan@gmail.com', 'Kostas', 'Anastasiou', '954583', 0, 100, 0, 0),
(10, 'timoskos@gmail.com', 'Timos', 'kostakos', '366782', 0, 100, 0, 0),
(11, 'hliasrap@gmail.com', 'Hlias', 'Raptopoulos', '994233', 0, 100, 0, 0),
(12, 'steliostrig@gmail.com', 'Stelios', 'Trigkas', '321111', 0, 100, 0, 0),
(13, 'robkos@gmail.com', 'Roberto', 'kostakos', '932114', 0, 100, 0, 0),
(15, 'user@user.gr', NULL, NULL, NULL, NULL, NULL, 0, 0),
(16, 'user@user.gr', NULL, NULL, NULL, NULL, NULL, 0, 0);

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
-- Περιορισμοί για πίνακα `interactions`
--
ALTER TABLE `interactions`
  ADD CONSTRAINT `interaction_offers` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`offer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interaction_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
