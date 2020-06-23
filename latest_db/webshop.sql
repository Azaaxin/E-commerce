-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 18 jun 2020 kl 03:01
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
(4, 'ONEPLUS 8 PRO', 'OnePlus 8 Pro är kärlek vid första svajpen. Upptäck snabbheten i 6,78 tums displayen som levererar en överlägsen skärmupplevelse. De fyra kraftfulla kamerorna banar väg för din kreativitet och ger dig oändliga möjligheter.  En snabb 30-minutersladdning ger dig batteritid hela dagen.', 9995, 'https://www.telia.se/dam/jcr:3f93d682-1838-4572-95a8-f64775014941/Onyx-Black-Front-270x540.png'),
(5, 'SAMSUNG GALAXY S10', 'Samsung Galaxy S10 har banbrytande infinityskärm, fingeravtrycksläsare, och kamera i proffsklass. Samsung Galaxy S10 med Samsung Pay gör så att du kan betala tryggt och säkert med kort utan att ta fram plånboken. Samsung Galaxy S10 finns med 128GB minne, har trådlös laddning och Dual SIM.', 8495, 'https://www.telia.se/dam/jcr:1e43df8f-b28e-41ad-8d7c-e0c673282a60/galaxys10_front_white-252x540.png'),
(6, 'SONY XPERIA 1', 'Upplev nya Xperia 1 med Sonys nya avancerade displayteknologi. Ta proffsbilder med kamerasystemets tre linser för alla situationer och spela in filmer i 4K i hög kvalitet, oavsett ljusförhållanden.', 9495, 'https://www.telia.se/dam/jcr:c1e598d4-c223-4b9f-b263-fbe88996505f/xperia_1_front_grey_270x540.png'),
(15, 'ONEPLUS 8', 'OnePlus 8 maximerar din användarupplevelse med en 6.55 tums skärm som låter dig navigera och scrolla mjukare än någonsin. Med tre avancerade kameror skapar den oändliga möjligheter för dina bilder och endast 22 minuters laddning ger dig batteritid som räcker hela dagen.', 7695, 'https://www.telia.se/dam/jcr:3f93d682-1838-4572-95a8-f64775014941/Onyx-Black-Front-270x540.png'),
(16, 'SONY XPERIA 1 II', 'Xperia 1 II höjer ribban för hur snabb en smartphone kan vara. Den har den senaste tekniken och 5G-anslutning, samt en kamera med extremt snabbt autofokus.', 11495, 'https://www.telia.se/dam/jcr:b72d4fe7-6ced-4fdf-9224-97084363606a/xperia_1_II_black_front_270x540.png'),
(17, 'SONY XPERIA 10', '6\" 21:9-skärm ger den ultimata höjden och smidig design. 13MP och 5MP dubbelkamera med Bokeh-effekt som ger dina foton exeptionellt djup.', 2995, 'https://www.telia.se/dam/jcr:3c516f28-39aa-426e-af8b-b4a5d0db7db6/xperia_10_front_black_270x540.png'),
(18, 'SONY XPERIA 5', 'De senaste upplevelserna från Sony i en kompakt design gjord för att passa perfekt i din hand. Trippelkamera med Eye AF-teknik från Sonys Alpha-kameror. Sony Xperia 5 kommer med en otrolig ljud-, bild- och spelupplevelse och är en perfekt gaming mobil.', 6995, 'https://www.telia.se/dam/jcr:297c6925-55e1-4a2c-a987-97d74ee03f09/xperia5_front_red_270x540.png'),
(19, 'NOKIA 4.2', 'Nokia 4.2 ger dig en ren Android-upplevelse. Inga onödiga extrafunktioner men med genvägar och appar som gör den svår att lägga ifrån sig.', 1995, 'https://www.telia.se/dam/jcr:2ca7b8f6-b4f3-4034-bfa2-d71fa09dc4c3/Nokia%204.2%20Svart%20Front%20540x.png'),
(20, 'Motorola One Hyper', 'Capture incredible details with an ultra-high resolution 64 MP camera and 32 MP selfie cam, both with Quad Pixel technology and Night Vision. Enjoy uninterrupted edge-to-edge views with a 6.5 \"Full HD + Total Vision display.', 3990, 'https://cdn.webhallen.com/images/product/312990?trim'),
(21, 'ONEPLUS 7T', '90 Hz Fluid Display - Seamlessly Smooth.\r\nFast and razor-sharp display with a refresh rate of 90 Hz for a great user experience. The screen updates 90 times per second - 50% faster than most phones\' 60 Hz.\r\n\r\nBattery\r\n• Fully charged in one hour.\r\n• Our fastest charging ever is the end to charge overnight.\r\n\r\nOxygenOS\r\n• Faster and more responsive than ever.\r\n• Developed by our community: built and improved by our users\r\n• Fast and regular Android updates for 2 years.\r\n• Guaranteed security updates for 3 years.\r\n\r\nPerformance\r\n• Latest technology and outstanding performance with Qualcomm Snapdragon 855+.\r\n• As fast day 100 as day 1.\r\n• 8 GB RAM - Make more, faster and smoother.\r\n• Dual speakers - Real stereo sound with Dolby Atmos.\r\n• Haptic vibration for a natural and responsive vibration.\r\n\r\nCamera\r\n• Perfect photos in all situations with a 48 MP camera, ultra-wide and telephoto lens (including Macro Mode).\r\n• Take stunning photos in the dark with Nightscape 2.0.\r\n• UltraShot Engine lets you take great pictures anywhere, anytime.', 5490, 'https://cdn.webhallen.com/images/product/307757?trim&w=1400'),
(22, 'APPLE IPHONE 11 PRO', 'iPhone 11 Pro är den mest kraftfulla iPhone-modellen någonsin med många spännande features. Med ett banbrytande trippelkamerasystem, en oöverträfflig batteritidsförbättring och en ruskigt snabb processor tänjer den på gränserna för vad som är möjligt att göra med en smartphone. iPhone 11 Pro finns med 64GB, 256GB och 512GB minne och Dual SIM.', 12995, 'https://www.telia.se/dam/jcr:99ca6c32-9e0f-46fe-881d-16b800faeed5/iphone_11_pro_midnightgreen_front_270x540.png'),
(23, 'APPLE IPHONE 11 PRO MAX', 'iPhone 11 Pro Max är den mest kraftfulla iPhone-modellen någonsin. Med ett revolutionerande trippelkamerasystem, en makalös batteritid och en grymt snabb processor tänjer den på gränserna för vad som innan har varit möjligt att göra med en smartphone. iPhone 11 Pro Max finns med 64GB, 256GB och 512GB minne.', 14295, 'https://www.telia.se/dam/jcr:bd0cbb1c-fecc-4949-8989-2e12900fd1f2/iPhone_11_Pro_Max_Green_Front_270x540.png'),
(24, 'APPLE IPHONE 7', 'iPhone 7 har 12 MP-kamera med optisk bildstabilisering, 7 MP FaceTime HD-kamera och tål vatten, stänk och damm.', 3995, 'https://www.telia.se/dam/jcr:e77c133b-a058-43c0-a21d-e0f318c49c2d/iPhone7_Black_Front_270x540.png'),
(25, 'APPLE IPHONE 8', 'iPhone 8 har en helt ny och läcker design i glas och trådlös laddning. Dessutom avancerad kamera för ännu skarpare bilder och trådlös laddning.', 5895, 'https://www.telia.se/dam/jcr:2856cd6b-59e2-4c75-bfbf-edd80f15b55d/iPhone8_spacegrey_front_270x540.png'),
(26, 'APPLE IPHONE 8 PLUS', 'Design i glas som tål vatten och damm. 5,5-tums Retina-skräm och 12 MP-kamera för bättre porträttläge.\r\nDesign helt i glas och aluminium som står emot vatten och damm\r\n5,5-tums retina HD-skärm med stort färgomfång\r\nDubbel 12 MP-kamera för bättre porträttläge och ännu skarpare bilder\r\nTrådlös laddning', 7195, 'https://www.telia.se/dam/jcr:267b2727-893e-4297-b578-5bdf90b727a1/iphone-8plus-front-space-grey-270x540.png'),
(27, 'APPLE IPHONE XS MAX', 'iPhone XS Max kommer med vattentålig 6,5-tums Super Retina-skärm med Face ID samt dubbel 12 MP-kamera med skärpedjup.\r\n6,5-tums Super Retina-skärm (OLED) med HDR\r\nDubbel 12 MP-kamera med vidvinkel och teleobjektiv\r\nVattentålig ner till 2 meters djup\r\nLås upp mobilen och betala med Face ID', 14795, 'https://www.telia.se/dam/jcr:0fe74236-18ac-4eb4-a1fc-603de9f118b3/iphone-xs-max-silver-front-270x540.png');

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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
