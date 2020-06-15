-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 15 jun 2020 kl 23:46
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `total_price` int(6) NOT NULL,
  `billing_full_name` varchar(150) NOT NULL,
  `billing_street` varchar(150) NOT NULL,
  `billing_postal_code` varchar(20) NOT NULL,
  `billing_city` varchar(90) NOT NULL,
  `billing_country` varchar(90) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `order_items`
--

CREATE TABLE `order_items` (
  `id` int(9) NOT NULL,
  `order_id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `quantity` int(9) NOT NULL,
  `unit_price` int(9) NOT NULL,
  `product_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `id` int(9) NOT NULL,
  `title` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `price` int(9) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `img_url`) VALUES
(1, 'APPLE IPHONE 11', 'Ett nytt dubbelkamerasystem fångar mer av det du ser. En supersnabb processor och ett batteri som räcker hela dagen hjälper dig att göra mer. Med den förbättrade videokvaliteten ser dina minnen dessutom bättre ut än någonsin. iPhone 11 finns med 64GB, 128GB och 256GB minne, har Dual SIM för dubbla simkort, och kommer i flera olika färger - välj mellan svart, röd och vit design.', 9195, 'https://www.telia.se/dam/jcr:eecc7b54-e1aa-4981-9073-ae88ba6c2db4/11rodfram.png'),
(2, 'SAMSUNG GALAXY S20 5G', 'Galaxy S20 har en skärm som täcker ännu mer av mobilens yta och en kamera som gör det möjligt att fånga hela din värld och upptäcka alla de detaljer som du tidigare missade, både på bild och film. Samsung Galaxy S20 är 5G Ready och fungerar med både Nano, E-sim och Dual SIM.', 10995, 'https://www.telia.se/dam/jcr:52c8d280-ef03-4661-a6bd-b1109b10e4ea/GalaxyS20_5G_front_gray-ny-270x540.png'),
(3, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(4, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(5, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(6, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(7, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(8, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(9, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(10, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(11, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(12, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(13, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png'),
(14, 'HUAWEI P30 PRO', 'Huawei P30 Pro kommer med 4 Leica-kameror, banbrytande 10 x Hybrid Zoom och fyra fantastiska färger. Med den här mobilen blir du en riktig proffsfotograf! Huawei P30 Pro kommer med 128GB minne, batteri för trådlös laddning och Dual SIM.', 7995, 'https://www.telia.se/dam/jcr:b300df84-04be-40af-a1aa-5f1c80019f1d/Huawei-P30-Vogue_Blue_Front-251x540.png');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(90) NOT NULL,
  `country` varchar(90) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
